<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Frontend_model','frontend');
    }
    function index()
    {
        $data['act_id'] = "home";
        $this->load->view('mainsite/profile',$data);
    }
    
    function save_collection_folder($userId)
	{
	    $data['act_id']="user";
		$data['userId'] = $userId;
		$where = array('id' => $userId );
		$tbl ="tbl_product_collection_folder";
		
		$valueArray = array(
						'user_id' => $userId,
						'collection_folder_name' => $this->input->post('collection_name'),
						'collection_folder_color' => $this->input->post('collection_color'),
					);
		$this->common->add_records($tbl,$valueArray);
		$this->session->set_flashdata('Success','Record added successfully .');
	
		redirect('my_collections');
	}
	function save_new_collection_folder($userId)
	{
	    $data['act_id']="user";
		$data['userId'] = $userId;
		$where = array('id' => $userId );
		$tbl ="tbl_product_collection_folder";
		
		$valueArray = array(
						'user_id' => $userId,
						'collection_folder_name' => $this->input->post('collection_name'),
						'collection_folder_color' => $this->input->post('collection_color'),
					);
		$this->common->add_records($tbl,$valueArray);
		
		
		//Get last folderid
		$wherenew = array('user_id' => $userId );
		$collectionfolderid = $this->common->getLastOneRowArray( 'id', $tbl, $wherenew );
	    $cf = $collectionfolderid['id'];
	    
	    
	    if(isset($_POST['productid']))
 		{
 		    $productid = $_POST['productid'];
 		}
 		$shopid = $_POST['shopid'];
	 	$userId = $_POST['userid'];
	 	$collId = $cf;
	 	
	 	$value_arraynew =   array(
			'product_id' => $productid,
			'shop_id' => $shopid,
			'member_id' => $userId,
			'collection_folder_id' => $collId,
		);
		$this->common->add_records('tbl_product_collection',$value_arraynew);
		
	    $this->session->set_flashdata('Success','Record added successfully .');
		redirect('shop');
	}
	function delete_collection_folder()
    {
        if(extract($_POST))
 		{
 		    $folderId = $this->input->post('folderId');
 		    
		 	$value_array =   array(
				'id' => $folderId,
			);
			
			$this->common->delete_entry('tbl_product_collection_folder',$value_array);
			
			
			$value_arrayt =   array(
				'collection_folder_id' => $folderId,
			);
			
			$this->common->delete_entry('tbl_product_collection',$value_arrayt);
			
			
			echo "Done";
 		}
       
    }
    
    function save_gallery($userId,$gallery_id=0)
	{
	    $data['act_id']="user";
		$data['userId'] = $userId;
		$where = array('id' => $userId );
		$isExists = $this->common->num_users($where);
		
		if($isExists>0)
		{
			$final_img  = '';
			$tbl ="tbl_artist_gallery";
			
	 		if($_FILES['image_name']['name']!='')
	 		{
				$file=$_FILES;	
				$_FILES['image_name']['name'] = $file['image_name']['name'];					
				
				$filename = str_replace(' ','_','artist_art')."_".uniqid();
				$path = $_FILES['image_name']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
			    $final_img = $filename.".".$ext;					
				$WaterMark = './uploads/artist-gallery/original/ArtGalaxie_Watermark.png';
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/artist-gallery/original';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['image_name']['type']=$file['image_name']['type'];
				$_FILES['image_name']['tmp_name']=$file['image_name']['tmp_name'];
				$_FILES['image_name']['error']=$file['image_name']['error'];
				$_FILES['image_name']['size']=$file['image_name']['size'];
				
    			if(!$this->upload->do_upload('image_name'))
                { 
                    $this->form_validation->set_error_delimiters('<p class="error">','</p>');
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('image', $error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $filename = $data['upload_data']['file_name'];
                    /* Image resize, crop, rotate, watermark code here */
    				$imgConfig = array();
    				$imgConfig = array();
    				$imgConfig['image_library'] = 'GD2';
    				$imgConfig['source_image']  = './uploads/artist-gallery/original/'.$filename;
    				$imgConfig['wm_type']       = 'overlay';
    				$imgConfig['wm_overlay_path'] = './uploads/artist-gallery/original/ArtGalaxie_Watermark.png';
    				$imgConfig['wm_opacity'] = '100';
                    $imgConfig['wm_vrt_alignment'] = 'bottom';
                    $imgConfig['wm_hor_alignment'] = 'right';
                    $imgConfig['wm_vrt_offset'] = '10';
    				
    				$this->load->library('image_lib', $imgConfig);
    				$this->image_lib->initialize($imgConfig);
    				$this->image_lib->watermark(); 
    			}
				
				$this->common->create_thumb_resize($final_img,'./uploads/artist-gallery/original/','356','360','thumb');
			 	$this->common->create_thumb_resize($final_img,'./uploads/artist-gallery/original/','470','360','gallery');
			}
		
			$valueArray = array(
							'user_id' => $userId,
							'image_name' => $final_img,
							'image_title' => $this->input->post('image_title'),
							'added_by' => 0,
							'added_date' => date('Y-m-d h:m:s'),
							'is_feature' => 0,
						);
			$this->common->add_records($tbl,$valueArray);
			$this->session->set_flashdata('Success','Record added successfully .');
			
		    $tbl = "tbl_user_master";
            $where = array('id' => $userId);
	        $a = $this->common->getOneRowArray( '*', $tbl, $where );
            
            $table_name = 'notifications';
            $insert_notify_array = array(
            					'notification_from_user_id'=> $a['first_name'].' '.$a['last_name'],
            					'notification_type'=>'New Gallery',
            					'notification_text'=>$a['first_name'].' '.$a['last_name']." has added new photo in <b>gallery section</b> successfully",
            					'notification_url'=>'#',
            					'notification_datetime'=>date("m/d/Y h:i:s"),
            					'notification_status'=>'Pending'
            					);
            $this->common->add_records_notification($table_name,$insert_notify_array);
        
		
			redirect('my_artwork');
			
		}
	}
	
	function update_gallery($userId,$gallery_id=0)
	{
	    //session_start();
        $_SESSION["morefeuURL"] = $_SERVER["HTTP_REFERER"];
     	$data['act_id']="user";
		$data['userId'] = $userId;
		$data['id'] = $gallery_id;
		$where = array('id' => $userId );
		$isExists = $this->common->num_users($where);
		
		
		
		if($isExists>0)
		{
			//print_r($_POST);
		
		
		    //====common code for top header of artist
			$data['userDetails'] = $userDetails = $this->common->getUserDetails($userId);
		 	$data['styleName'] = $this->common->getStyleName($userDetails['style_id']);
			$data['galleryName'] = $this->common->getGalleryName($userDetails['galleries_id']); 
			//====common code 
			$whereLinks = array('user_id' => $userId);
			$data['artistNumRow'] =  $artistNumRow = $this->common->num_ArtistGallery($whereLinks);
			$data['artistData'] = $this->common->getArtistGallery($whereLinks);
			$data['artistDetail']  = '';
			$tbl ="tbl_artist_gallery";
		
			$data['artistDetails']  = $this->common->getArtistGalleryDetails($gallery_id);
		
		   // print_r($data['artistDetails']);
		    //exit;
		    
			$flag=0;
		  	if($_FILES['image_name']['name']!='')
		  	{
				$flag=0;
				//==validaye image exists 
				$path_img = $_FILES['image_name']['name'];
				$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
				$valid_ext_arr = array('png','jpg','jpeg','gif');
				if(!in_array(strtolower($ext_img),$valid_ext_arr))
				{
					$flag = 1;						
					break;
				}
		    } 
		    if($flag==0)
		    {
				if(!is_dir('./uploads/artist-gallery'))
				{
					mkdir('./uploads/artist-gallery/');
					mkdir('./uploads/artist-gallery/original/');
					mkdir('./uploads/artist-gallery/thumb/');
				    //mkdir('./uploads/artist-gallery/large/');
					mkdir('./uploads/artist-gallery/gallery/');
					//mkdir('./uploads/artist-gallery/style/');
				}

				$final_img  = '';
		 		if($_FILES['image_name']['name']!='')
		 		{
					$file=$_FILES;	
					$_FILES['image_name']['name'] = $file['image_name']['name'];					
					
					$filename = str_replace(' ','_','artist_art')."_".uniqid();
					$path = $_FILES['image_name']['name'];
					$ext = pathinfo($path, PATHINFO_EXTENSION);							
					
				    $final_img = $filename.".".$ext;					
					$WaterMark = './uploads/artist-gallery/original/ArtGalaxie_Watermark.png';
					
					$this->load->library('upload');
					$config['file_name']     = $filename;
					$config['upload_path']   = './uploads/artist-gallery/original';
					$config['allowed_types'] = 'png|jpeg|jpg|gif';
								
					$this->upload->initialize($config);					
					$_FILES['image_name']['type']=$file['image_name']['type'];
					$_FILES['image_name']['tmp_name']=$file['image_name']['tmp_name'];
					$_FILES['image_name']['error']=$file['image_name']['error'];
					$_FILES['image_name']['size']=$file['image_name']['size'];
					//$this->upload->do_upload('image_name');
					///////
					if ( ! $this->upload->do_upload('image_name'))
                    {
                        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('image', $error);
                }
                else
                {
                    $data = array('upload_data' => $this->upload->data());
                    $filename = $data['upload_data']['file_name'];
                    /* Image resize, crop, rotate, watermark code here */
					$imgConfig = array();
					$imgConfig = array();
					$imgConfig['image_library'] = 'GD2';
					$imgConfig['source_image']  = './uploads/artist-gallery/original/'.$filename;
					$imgConfig['wm_type']       = 'overlay';    
					$imgConfig['wm_overlay_path'] = './uploads/artist-gallery/original/ArtGalaxie_Watermark.png';
					$imgConfig['wm_opacity'] = '100';
                    $imgConfig['wm_vrt_alignment'] = 'bottom';
                    $imgConfig['wm_hor_alignment'] = 'right';
                    $imgConfig['wm_vrt_offset'] = '10';
				
					$this->load->library('image_lib', $imgConfig);
					$this->image_lib->initialize($imgConfig);
					$this->image_lib->watermark(); 
			    }
					///////
					$this->common->create_thumb_resize($final_img,'./uploads/artist-gallery/original/','356','360','thumb');
				 	//$this->common->create_thumb_resize($final_img,'./uploads/artist-gallery/original/','1029','623','large');
				 	$this->common->create_thumb_resize($final_img,'./uploads/artist-gallery/original/','470','360','gallery');
				 	
					if($this->input->post('old_image_name')!='')
					{
						@unlink('./uploads/artist-gallery/original/'.$this->input->post('old_image_name'));
						@unlink('./uploads/artist-gallery/original/thumb/'.$this->input->post('old_image_name'));
						//@unlink('./uploads/artist-gallery/original/large/'.$this->input->post('old_image_name'));
						@unlink('./uploads/artist-gallery/original/gallery/'.$this->input->post('old_image_name'));
					}
				}
				else
				{
					if($this->input->post('old_image_name')!='')
					{
						$final_img = $this->input->post('old_image_name');
					}
				}
			}
			
			$valueArray = array(
			            'image_title' => $this->input->post('image_title'),
						'image_name' => $final_img,
						//'water_mark_image'=>$final_imgBlockwater
					);
					
		//	print_r($valueArray);
		//	exit;
			
			$whereGal = array('user_id' => $userId, 'id' => $gallery_id);
 		
 			$this->common->update_entry($tbl,$valueArray,$whereGal);
 	
 			// Added in notification table 
            $table_name = 'notifications';
            $insert_notify_array = array(
            					'notification_from_user_id'=> $data['userDetails']['first_name'].' '.$data['userDetails']['last_name'],
            					'notification_type'=>'artist',
            					'notification_text'=>$data['userDetails']['first_name'].' '.$data['userDetails']['last_name']." has updated Featured image gallery details.",
            					'notification_url'=>'/webmaster/user/gallery/'.$userId.".html",
            					'notification_datetime'=>date("m/d/Y h:i:s"),
            					'notification_status'=>'Pending'
            					);
            $this->common->add_records_notification($table_name,$insert_notify_array);
			$this->session->set_flashdata('Success','Record updated successfully .');
			
			redirect('my_artwork'); 
			 
		}
		else
		{
			 redirect('my_artwork'); 
		}
	}
	
	
	
    // Delete Image for artist
    function delete_gallery($userId)
    {
        
        if($this->input->post('action')=="delete")
        { 
        	for($i=0;$i<count($this->input->post('cb'));$i++)
        	{ 
        		$delid=$this->security->xss_clean($this->input->post('cb'));
        		$where= array("id " => $delid[$i]);
        		$dataRs = $this->common->getOneRowArray("*","tbl_artist_gallery",$where);
        		@unlink('./uploads/artist-gallery/original/'.$dataRs['image_name']);
        		@unlink('./uploads/artist-gallery/original/thumb/'.$dataRs['image_name']);
        		@unlink('./uploads/artist-gallery/original/gallery/'.$dataRs['image_name']);
        
        		$this->common->delete_entry("tbl_artist_gallery",$where);
        	}
        	$this->session->set_flashdata('Success','Record deleted successfully!');
        	redirect('my_artwork');
        }
        redirect('my_artwork');
    }
	
}
?>