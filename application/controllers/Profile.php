<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		if($this->session->userdata('CUST_ID')=="") redirect('home');
	 	$this->load->model('Frontend_model','frontend');
	 	
	}
	function index()
	{
		$data['act_id'] = "profile"; 
 		$data['userId'] = $userId = $this->session->userdata('CUST_ID'); 
		$tbl = 'tbl_user_master';
 	 	$data['country'] = $this->common->get_country();
 	 	$data['style'] = $this->common->get_style();
 	 	$data['galleries'] = $this->common->get_galleries();
		 
		$where = array('id' => $userId);
		$data['userdata'] = $userdata = $this->common->getOneRowArray( '*', $tbl, $where ); 
	    
		$this->load->view('mainsite/my_profile',$data);
	}
	
	function update_profile(){
	    
	    $data['userId'] = $userId = $this->session->userdata('CUST_ID'); 
		$tbl = 'tbl_user_master';
 	 	$data['country'] = $this->common->get_country();
 	 	$data['style'] = $this->common->get_style();
 	 	$data['galleries'] = $this->common->get_galleries();
		 
		$where = array('id' => $userId);
		$data['userdata'] = $userdata = $this->common->getOneRowArray( '*', $tbl, $where ); 
	    
		$data['act_id']='my_profile';
	    
	    $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required'); 

		if($userdata['user_type'] == 'artist')
		{
			$this->form_validation->set_rules('galleries_id', 'Gallery Category', 'trim'); 
			$this->form_validation->set_rules('style_id', 'Style Category', 'trim'); 
		}
		
	   if($this->form_validation->run())
	   {
  			$update_array = array(
									'first_name'=>$this->input->post('first_name'),
									'last_name'=>$this->input->post('last_name'),
									'galleries_id'=>$this->input->post('galleries_id'),
									'style_id'=>$this->input->post('style_id'),
									'phone'=>$this->input->post('phone'),
								 	'address'=>$this->input->post('address'),
									'address2'=>$this->input->post('address2'),
									'country'=>$this->input->post('country'),
									'state'=>$this->input->post('state'),
									'city'=>$this->input->post('city'),
									'zip'=>$this->input->post('zip')
									);
									
				$where_array=array('id'=>$userId);
				$this->common->update_entry($tbl,$update_array,$where_array);
				$this->session->set_flashdata('Success','Profile information updated successfully.');
				
				//Notification added
    			//$pagename = preg_replace('/\s+/', '-', $data1['blogDetails']['blog_title']);
    			//$url = base_url().'blog/detail/'.$blogId.'/'.$pagename.'.html';
                $table_name = 'notifications';
                $insert_notify_array = array(
                					'notification_from_user_id'=> $this->input->post('first_name').' '.$this->input->post('last_name'),
                					'notification_type'=>"Profile Update",
                					'notification_text'=>$this->input->post('first_name').' '.$this->input->post('last_name')." has Profile information updated successfully",
                					'notification_url'=>'#',
                					'notification_datetime'=>date("m/d/Y h:i:s"),
                					'notification_status'=>'Pending'
                					);
                $this->common->add_records_notification($table_name,$insert_notify_array);
        
			redirect('profile');
 		}
 		$this->load->view('mainsite/my_profile',$data);
		
	}
	
	
	function changepassword(){
	    
		$data['act_id']='changepassword';
		$msg = '';
		$data['msg_change']=$msg;
		$data['user_id']=$user_id = $this->session->userdata('CUST_ID');		
		//========== Update pw =============
		if($this->input->post('mode')=='change')
		{	 
		 	$where =   array('id' => $user_id );
			//---check previous password matching or not
			$userData = $this->common->getOneRowArray('*','tbl_user_master',$where);
			$previousPwd = $this->input->post('curr_pass');
			$userPassword=$this->input->post('password');	
			if($this->common->verifyHashPassword($previousPwd,$userData['password'])){
				$userPassword=$this->common->generateHashPassword($userPassword);
				$up_data2 =  array('password' => $userPassword );
			 	$where_array=array('id'=>$user_id);
				$this->common->update_entry('tbl_user_master',$up_data2,$where_array);
				$this->session->set_flashdata('Success','Your password is updated successfully.');
			  	redirect("profile");
			}else{
				$this->session->set_flashdata('error','Old password does not matched');
			}
		}		
		$this->load->view('mainsite/change_password',$data);
	}
 	function manage_desc($field)
 	{
 	
 		$data['act_id']="my_profile";
		$data['userId'] = $userId = $this->session->userdata('CUST_ID');
		$data['field'] = $field;
		$successStr = "";
		$tabID = 0;
		$where = array('id' => $userId );
		  	$tbl = 'tbl_artist_user';
			$where_array =  array('user_id' => $userId );
			$fieldName = '';
			if($field=='interviews')
			{
				$fieldName = "interview_desc";
			}
			else if($field=='artgallery')
			{
				$fieldName = "feature_artwork_gallery_desc";
			}
			else if($field=='insidethestudio')
			{
				$fieldName = "feature_inside_the_studio_desc";
			}
			else if($field=='featurevideo')
			{
				$fieldName = "feature_video_desc";
			}
			else if($field=='biography')
			{
				$fieldName = "biography";
				$update = array( $fieldName => $this->input->post('biography') );
				$tabID = 1;
				$this->form_validation->set_rules('biography','Biography','trim');
				$successStr = "biography";
			}
			else if($field=='statement')
			{
				$fieldName = "statement";
				$update = array( $fieldName => $this->input->post('statement') );
				$tabID = 2;
				$this->form_validation->set_rules('statement','statement','trim');
				$successStr = "statement";
			}
			else if($field=='exhibition')
			{
				$fieldName = "exibition";
				$update = array( $fieldName => $this->input->post('exibition') );
				$tabID = 3;
				$this->form_validation->set_rules('exibition','exibition','trim');
				$successStr = "exibition";
			}
			else if($field=='awards')
			{
				$fieldName = "awards";
				$update = array( $fieldName => $this->input->post('awards') );
				$tabID = 4;
				$this->form_validation->set_rules('awards','awards','trim');
				$successStr = "awards";

			}
			else if($field=='publication')
			{
				$fieldName = "publication";
				$update = array( $fieldName => $this->input->post('publication') );
				$tabID = 5;
				$this->form_validation->set_rules('publication','publication','trim');
				$successStr = "publication";
			}
			else if($field=='my_videos')
			{
				$fieldName = "my_videos";
				$update = array( $fieldName => $this->input->post('my_videos') );
				$tabID = 6;
				$this->form_validation->set_rules('my_videos','my_videos','trim');
				$successStr = "my_videos";
        		
			}
			else if($field=='featureIntroduction')
			{
				$fieldName = "featured_desc";
			}
			
			$data['tabID'] = $tabID;
            
            $tbl_user = 'tbl_user_master';
     	 	$data['country'] = $this->common->get_country();
     	 	$data['style'] = $this->common->get_style();
     	 	$data['galleries'] = $this->common->get_galleries();
    		$where_user = array('id' => $userId);
            $data['userdata'] = $this->common->getOneRowArray( '*', $tbl_user, $where_user ); 
            
			$data['fieldName'] = $fieldName;
			$data['artist_data'] = $this->common->getOneRowArray('*',$tbl,$where_array);
		 	
		 	$tbl_video   = 'tbl_artist_videos';
     	    $where_video = array('id' => $userId);
        	$data['uservideo'] = $this->common->getOneRowArray( '*', $tbl_video, $where_video );
     		
    		$data['artistNumRow'] = $this->common->num_artistVideos($where_video);
    		//$data['artistData'] = $this->common->getArtistVideoList('id,videos_link,user_id',$where_video);
    		
    		$data['artistData'] = $this->common->getArtistVideoList($userId);
    		
    		
    		
			if($this->form_validation->run())
			{
                $notify ='';
                
                if(isset($update['biography']))
                {
                    $notify =  "Biography";
                }
                if(isset($update['publication']))
                {
                    $notify = "Publication";
                }
                if(isset($update['statement']))
                {
                    $notify = "Statement";
                }
                if(isset($update['exibition']))
                {
                    $notify = "Exibition";
                }
                if(isset($update['awards']))
                {
                    $notify = "Awards";
                }
               
               	$this->common->update_entry($tbl,$update,$where_array);
				$this->session->set_flashdata('Success_'.$successStr,'Record updated successfully .');
				
                $tbl = "tbl_user_master";
                $where = array('id' => $data['userId']);
		        $a = $this->common->getOneRowArray( '*', $tbl, $where );
                
                $table_name = 'notifications';
                $insert_notify_array = array(
                					'notification_from_user_id'=> $a['first_name'].' '.$a['last_name'],
                					'notification_type'=>'Text Update',
                					'notification_text'=>$a['first_name'].' '.$a['last_name']." has changed <b>".$notify."</b> successfully",
                					'notification_url'=>'#',
                					'notification_datetime'=>date("m/d/Y h:i:s"),
                					'notification_status'=>'Pending'
                					);
                $this->common->add_records_notification($table_name,$insert_notify_array);
                    
				redirect($field);
			}
			$this->load->view('mainsite/manage_descriptions',$data);
	}
	
	function my_videos_update($id=0)
	{	
	    
	    $data['act_id'] =   "profile";
		$userId         =   $this->session->userdata('CUST_ID');
		$data['id']     =   $id;
		$tbl            =   'tbl_artist_videos';
		$whereLinks     =   array('id' => $userId);
		
		$valueArray =  $_POST['videos_link'];
		
		$this->common->update_entry($tbl,$valueArray,$whereLinks);
		
		
		$this->session->set_flashdata('Success','Video record updated successfully .');
				
		$where = array('user_id' => $userId);
		$data['artistNumRow'] = $this->common->num_artistVideos($where);
		$data['artistData'] = $this->common->getArtistVideoList('id,videos_link,user_id',$where);
		
		
		$tbl = "tbl_user_master";
        $where = array('id' => $userId);
        $a = $this->common->getOneRowArray( '*', $tbl, $where );
        
        $table_name = 'notifications';
        $insert_notify_array = array(
        					'notification_from_user_id'=> $a['first_name'].' '.$a['last_name'],
        					'notification_type'=>'Video Update',
        					'notification_text'=>$a['first_name'].' '.$a['last_name']." has changed <b>".$notify."</b> successfully",
        					'notification_url'=>'#',
        					'notification_datetime'=>date("m/d/Y h:i:s"),
        					'notification_status'=>'Pending'
        					);
        $this->common->add_records_notification($table_name,$insert_notify_array);
		
		redirect('profile/manage_desc/my_videos/'.$userId.'.html');
	}
	function my_videos_add()
	{
	    $data['act_id'] =   "profile";
		$userId         =   $this->session->userdata('CUST_ID');
		$tbl            =   'tbl_artist_videos';
		
		$valueArray = array( 
		            'user_id'=> $userId,
		            'videos_link'=> $_POST['videos_link'],
		            );
	
		$this->common->insert_entry($tbl,$valueArray);
		
		
		
			$tbl = "tbl_user_master";
        $where = array('id' => $userId);
        $a = $this->common->getOneRowArray( '*', $tbl, $where );
        
        $notify = "New Video";
        $table_name = 'notifications';
        $insert_notify_array = array(
        					'notification_from_user_id'=> $a['first_name'].' '.$a['last_name'],
        					'notification_type'=>'New Video',
        					'notification_text'=>$a['first_name'].' '.$a['last_name']." has Added <b>".$notify."</b> successfully",
        					'notification_url'=>'#',
        					'notification_datetime'=>date("m/d/Y h:i:s"),
        					'notification_status'=>'Pending'
        					);
        $this->common->add_records_notification($table_name,$insert_notify_array);
        
        
		$this->session->set_flashdata('Success','Video record Added successfully .');
		redirect('video');
	}
 
    function my_videos_delete($userId)
    {
        
        
        	for($i=0;$i<count($this->input->post('cb'));$i++)
        	{ 
        		$delid=$this->security->xss_clean($this->input->post('cb'));
        		$where= array("id " => $delid[$i]);
        		$this->common->delete_entry("tbl_artist_videos",$where);
        	}
        	$this->session->set_flashdata('Success','Record deleted successfully!');
        		redirect('video');
        
    }
	function my_videos($id=0)
	{	
	    
	    $data['act_id'] =   "profile";
		$data['userId'] =   $userId = $this->session->userdata('CUST_ID');
		$data['id']     =   $id;
		$tbl            =   'tbl_artist_videos';
		$whereLinks     =   array('id' => $id, 'user_id' =>$userId );
		
		if($id>0)
		{
			$data['btnCapt'] = 'Update';
			$data['dataDs'] = $this->common->getVideoDetails($whereLinks);
		}
		else
		{ 
		    $data['btnCapt'] = 'Add'; 
		}
 		$this->form_validation->set_rules('videos_link','Link','required|trim|prep_url|callback_valid_url_format');
 		if($this->form_validation->run())
 		{
 			if($id>0)
 			{
 				
 				$valueArray = array(
 							 'videos_link' => $this->db->escape_str($_POST['videos_link']),
 				 );
				$this->common->update_entry($tbl,$valueArray,$whereLinks);
				$this->session->set_flashdata('Success','Video record updated successfully .');
				
				$tbl = "tbl_user_master";
                $where = array('id' => $data['userId']);
		        $a = $this->common->getOneRowArray( '*', $tbl, $where );
                
				$table_name = 'notifications';
                $insert_notify_array = array(
                					'notification_from_user_id'=> $a['first_name'].' '.$a['last_name'],
                					'notification_type'=>'Video Update',
                					'notification_text'=>$a['first_name'].' '.$a['last_name']." has changed ".$notify." successfully",
                					'notification_url'=>'#',
                					'notification_datetime'=>date("m/d/Y h:i:s"),
                					'notification_status'=>'Pending'
                					);
                $this->common->add_records_notification($table_name,$insert_notify_array);
                
				redirect('my_videos/0');
			}
			else
			{
			    
			    
				$valueArray = array(
 							'user_id' => $userId,
 							'videos_link' => $this->db->escape_str($this->input->post('videos_link')),
 							'added_date' => date('Y-m-d h:m:s'),
 							'added_by' => $userId
 				);
				$this->common->add_records($tbl,$valueArray);
				$this->session->set_flashdata('Success','Video added successfully .');
				
				$tbl = "tbl_user_master";
                $where = array('id' => $data['userId']);
		        $a = $this->common->getOneRowArray( '*', $tbl, $where );
		        
				$table_name = 'notifications';
                $insert_notify_array = array(
                					'notification_from_user_id'=> $a['first_name'].' '.$a['last_name'],
                					'notification_type'=>'New Video',
                					'notification_text'=>$a['first_name'].' '.$a['last_name']." has changed ".$notify." successfully",
                					'notification_url'=>'#',
                					'notification_datetime'=>date("m/d/Y h:i:s"),
                					'notification_status'=>'Pending'
                					);
                $this->common->add_records_notification($table_name,$insert_notify_array);
                
                
				redirect('my_videos/0');
			}
		 }
		$where = array('user_id' => $userId);
		$data['artistNumRow'] = $this->common->num_artistVideos($where);
		$data['artistData'] = $this->common->getArtistVideoList();
		
		redirect('profile/manage_desc/my_videos/'.$userId.'.html');
		//$this->load->view('profile/manage_desc/my_videos/22.html',$data); 
		
		//$this->load->view('mainsite/manage_descriptions',$data);
	}
    function delete_my_video($deletID)
    {
		//for($i=0;$i<count($this->input->post('cb'));$i++){
			$delid=$this->security->xss_clean($deletID);
			$where= array("id " => $delid);
			$this->common->delete_entry("tbl_artist_videos",$where);
	    //	}
		$this->session->set_flashdata('Success','Record deleted successfully!');
		redirect('my_videos/0');
    }
  	function valid_url_format($str)
  	{
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str))
        {
            $this->form_validation->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
            return FALSE;
        }
        return TRUE;
    }
    function my_artwork()
    {
        $data['act_id'] =   "artist";
		$userId = $this->session->userdata('CUST_ID');
		$where = array('id' => $userId );
		$isExists = $this->common->num_users($where);
	
		if($isExists>0)
		{
			//====common code for top header of artist
			$data['userDetails']    =   $userDetails = $this->common->getUserDetails($userId);
		 	$data['styleName']      =   $this->common->getStyleName($userDetails['style_id']);
			$data['galleryName']    =   $this->common->getGalleryName($userDetails['galleries_id']); 
			//====common code 
			$whereLinks = array('user_id' => $userId);
			$data['artistNumRow'] =  $artistNumRow = $this->common->num_ArtistGallery($whereLinks);
			$data['artistData'] = $this->common->getArtistGalleryFront($whereLinks);
			
			$data['uploadStandards'] = $this->common->getUploadStandards();
			
			$this->load->view('mainsite/my_artwork',$data);
			
		}
		else
		{
			 redirect('home'); 
		}
    }
    function gallery_update_popup($userId,$id=0)
	{
		$data['artistDetail']  = '';
		$tbl ="tbl_artist_gallery";
		$data['artistDetails']  = $this->common->getArtistGalleryDetails($id);
		
 		$this->load->view('my_artwork',$data);
	
	}
	
    /* --------- My Favourites ----------- */
    function my_favourites()
    {
         $data['act_id'] =   "my favourite";
         $userId = $this->session->userdata('CUST_ID');
         $data['artistFavouritesList']      = $this->common->GetProductAddedInFavourites($userId);
         
         //print_r($data['artistFavouritesList']);
        // echo "ttt";
         
         $data['artistFavouritesProdList']  = $this->common->GetProductAddedInProdFavourites($userId);
       
         $this->load->view('mainsite/my_favourites',$data);
    }
    
    /* --------- My Collections ----------- */
    function my_collections()
    {
         //$data['act_id'] =   "my collections";
         //$userId = $this->session->userdata('CUST_ID');
        // $data['artistCollectionList']  = $this->common->GetProductAddedInCollection($userId);
        // $this->load->view('mainsite/my_collections',$data);
         
         $data['act_id'] =   "my collections";
         $data['user_id'] = $userId = $this->session->userdata('CUST_ID');
         $data['artistCollectionFolderList']  = $this->common->GetProductAddedInCollectionFolder($userId);
         $this->load->view('mainsite/my_collections',$data);
    }
    
    /* --------- My Collections ----------- */
    function my_collections_folder($collection_id)
    {
        $data['act_id'] =   "my collections folder";
        $userId = $this->session->userdata('CUST_ID');
        $data['artistCollectionList']  = $this->common->GetProductAddedInCollection($userId,$collection_id);
        $data['artistCollectionProdList']  = $this->common->GetProductAddedInProdCollection($userId,$collection_id);
        $data['artistCollectionFolderName']  = $this->common->GetProductAddedInCollectionFolderName($collection_id);
        
       $this->load->view('mainsite/my_collections_folder',$data);
    }
    
    /* --------- Save For Later ----------- */
    function save_for_later()
    {
         $data['act_id'] =   "save for later";
         $userId = $this->session->userdata('CUST_ID');
         
         $data['mem_id'] = $this->session->userdata('CUST_ID');
         
         $data['artistBlogsaveList']  = $this->common->GetBlogSaveInCollection($userId);
         $this->load->view('mainsite/save_for_later',$data);
    }
    
    
    
    
}?>