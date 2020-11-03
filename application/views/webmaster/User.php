<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	 


	}
	//---------------------- Pages ----------------------------------
	function index(){		
		$data['act_id']="user";
		$select ="id,username,first_name,last_name,email_address,phone,user_type,is_featured";
		$where = "1=1";
		$data['num_rec'] = $num_rec = $this->common->num_users($where);
		if($num_rec){
			$data['dataDs'] = $this->common->getUserList($select,$where);
		}
		$this->load->view("webmaster/userlist",$data);			
	}
 	
 	function manage_user($userId=0){
 		 
 	 	$data['userData']='';
 	 	$data['act_id']='user';
 	 	$data['userId']=$userId;
 	 	$tbl = 'tbl_user_master';
 	 	$data['country'] = $this->common->get_country();
 	 	$data['style'] = $this->common->get_style();
 	 	$data['galleries'] = $this->common->get_galleries();
		
		if($userId>0)
		{  
			
			$btnCapt="Update"; 
			$where = array('id' => $userId);
			$data['userdata'] = $this->common->getOneRowArray( '*', $tbl, $where );   
			$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_unique_username['.$userId.']'); 
			$this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|callback_unique_email['.$userId.']');
		}else{
		   
			$btnCapt = "Add"; 
			$data['userdata'] = ''; 
			$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_unique_username'); 
			$this->form_validation->set_rules('email_address', 'Email', 'trim|required|valid_email|callback_unique_email');
		}
		$data['btnCapt']=$btnCapt;
 		$this->form_validation->set_rules('first_name', 'First name', 'trim|required|alpha');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required|alpha'); 

		$this->form_validation->set_rules('galleries_id', 'Gallery Category', 'trim|required'); 
		$this->form_validation->set_rules('style_id', 'Style Category', 'trim|required'); 


		$this->form_validation->set_rules('address', 'Address', 'trim|required'); 
		$this->form_validation->set_rules('country', 'Country', 'trim|required'); 
		$this->form_validation->set_rules('city', 'City', 'trim|required'); 
		$this->form_validation->set_rules('state', 'State', 'trim|required'); 
		$this->form_validation->set_rules('zip', 'Zip Code', 'trim|required|numeric|min_length[4]|max_length[8]');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|numeric|min_length[9]|max_length[12]'); 
		$this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
		


		if($this->form_validation->run())
		{

			if($userId>0){

				//=====Generate Pwd
				 $strPwd  =  $this->common->genRandomString();
				 $hashPwd = $this->common->generateHashPassword($strPwd);
				//=====
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
									'zip'=>$this->input->post('zip'),
									'user_type'=>$this->input->post('user_type'),
									'is_featured'=>$this->input->post('is_featured'),
									'notification_status'=>'1',
									'notification_des'=>'Profile Updated by '.$this->input->post('first_name')
									);
									
				$where_array=array('id'=>$userId);
				$this->common->update_entry($tbl,$update_array,$where_array);
				$this->session->set_flashdata('Success','User updated successfully .');
				redirect('webmaster/user/index','refresh');

			}else{
				$this->load->library('email');
	 			//=====Generate Pwd
				 $strPwd  =  $this->common->genRandomString();
				 $hashPwd = $this->common->generateHashPassword($strPwd);
				 $Name = $this->input->post('first_name').' '.$this->input->post('last_name');
				 $email = $this->input->post('email_address');
				//=====
				$insert_array = array(
									'first_name'=>$this->input->post('first_name'),
									'last_name'=>$this->input->post('last_name'),
									'galleries_id'=>$this->input->post('galleries_id'),
									'style_id'=>$this->input->post('style_id'),
									'username'=>$this->input->post('username'),
									'email_address'=>$this->input->post('email_address'),
									'password'=>$hashPwd,
									'phone'=>$this->input->post('phone'),
								 	'address'=>$this->input->post('address'),
									'address2'=>$this->input->post('address2'),
									'country'=>$this->input->post('country'),
									'state'=>$this->input->post('state'),
									'city'=>$this->input->post('city'),
									'zip'=>$this->input->post('zip'),
									'registration_date' => date('Y-m-d H:i:s'),
									'is_admin_active'=>1,
									'user_type'=>$this->input->post('user_type'),
									'is_featured'=>$this->input->post('is_featured'),
									'notification_status'=>'1',
									'notification_des'=>'New Profile of '.$this->input->post('first_name').$this->input->post('last_name').' Added'
									);
				$this->common->add_records($tbl,$insert_array);
				$new_registration_id =	$this->db->insert_id();			
				//=======Add new user to tbl_artist_user
				$this->common->add_records('tbl_artist_user',array('user_id' => $new_registration_id));
				//======Send emial to user about his account creation
				$site_logo = $this->common->getLogo();
				$email_content = '';
				$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello '.$Name.',</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">You have been successfully registered on '.SITENAME.'. You can login to site with following login details.<br/><bold>Username : </bold>'.$email.'<br/><bold>Passowrd : </bold>'.$strPwd.'<br/>You need to active your account before login.To active your account please <a href="'.site_url("#activate_account/".$new_registration_id).'"><u>click here</u></a>.</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
				 
				$subject1 = SITENAME.": Activate your account";
				$this->email->from(ADMIN_EMAIL);
				$this->email->to($email); //
				$this->email->cc(BCC_EMAIL);
				$this->email->subject($subject1);
				$this->email->message($email_content);//$email_content
				$this->email->send();
				//======
				$this->session->set_flashdata('Success','User added successfully .');
				redirect('webmaster/user/index','refresh');
			}
		} 
 		$this->load->view('webmaster/manage_user',$data);
	}

	public function details($userId){
	 
		$data['act_id'] = 'user';
		$data['userId'] = $userId;
		$tbl = 'tbl_user_master as u';
		$where =  array('id'=>$userId);
		$isExists = $this->common->getnumRow( $tbl, $where );
	 	if($isExists==1){
	 	//	$where2 =  array('id'=>$userId, 'u.galleries_id' => 'g.cat_id');
			//$data['userdata'] = $this->common->getOneRowArray('*',$tbl.',tbl_galleries as g',$where);
		    $this->db->select('tbl_user_master.*, tbl_galleries.cat_name as galName, tbl_style.cat_name as styleName' );
            $this->db->from( 'tbl_user_master');
     		$this->db->where( array('tbl_user_master.id'=>$userId) );
            $this->db->join('tbl_galleries', 'tbl_user_master.galleries_id = tbl_galleries.cat_id');
            $this->db->join('tbl_style', 'tbl_user_master.style_id = tbl_style.cat_id');
            $query = $this->db->get();
            $data['userdata'] =  $query->row_array();
        }else{
			redirect('webmaster/userlist/index','refresh');
		}
		$this->load->view('webmaster/user_details',$data);
	}

	public function delete_user(){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);
				$this->common->delete_entry("tbl_artist_user",array('user_id' => $delid[$i]));
				$this->common->delete_entry("tbl_user_master",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/user/index','refresh');
		}
		redirect('webmaster/user/index','refresh');
	}
	//=========Form validation
 	public function unique_username($str,$id)//entry already exist or not
	{

		$chk_array=array();

		if($str!="" && $id!="")
		{
			$chk_array=array('username'=>$str,'id !='=>$id);
		}
		else
		{
			$chk_array=array('username'=>$str);
		}
		//print_r($chk_array); 
		$result = $this->db->get_where('tbl_user_master',$chk_array);
		//echo $this->db->last_query();
		//exit();
		if($result->num_rows()>0)
		{   $this->form_validation->set_message('unique_username','Username already exists.');
			return false;
		} 
		else 
		{
			return true;
		}
	}
	public function unique_email($str,$id)
	{
		$chk_array=array();

		if($str!="" && $id!="")
		{
			$chk_array=array('email_address'=>$str,'id !='=>$id);
		}
		else
		{
			$chk_array=array('email_address'=>$str);
		}
		
		$result = $this->db->get_where('tbl_user_master',$chk_array);
		if($result->num_rows()>0)
		{   $this->form_validation->set_message('unique_email','Email Address already exists.');
			return false;
		} 
		else 
		{
			return true;
		}
	}
	//=========Form validation

	function othersections($userId){
		$data['act_id']="user";
		$data['userId'] = $userId;
		$where = array('id' => $userId );
		$isExists = $this->common->num_users($where);
		if($isExists>0){

			$data['userDetails'] = $userDetails = $this->common->getUserDetails($userId);
			if($userDetails['user_type']=='artist'){
				$data['styleName'] = $this->common->getStyleName($userDetails['style_id']);
				$data['galleryName'] = $this->common->getGalleryName($userDetails['galleries_id']);
				$this->load->view('webmaster/user_other_sections',$data);
			}else{
				redirect('webmaster/user');
			}
		}else{
				redirect('webmaster/user');
		}

	}

	//======Interview
	function interviews($userId,$id=0){
		$data['act_id']="user";
		$data['userId'] = $userId;
		$data['id'] = $id;
		$tbl = 'tbl_interview';
		$where = array('id' => $userId );
		$isExists = $this->common->num_users($where);
		if($id>0){
			$data['btnCapt'] = 'Update';
			$where = array('id' => $id);
			$data['dataDs'] = $this->common->getOneRowArray( '*', $tbl, $where );
		}else{
			$data['btnCapt'] = 'Add';
		}

		if($isExists>0){
			//====common code for top header of artist
			$data['userDetails'] = $userDetails = $this->common->getUserDetails($userId);
		 	$data['styleName'] = $this->common->getStyleName($userDetails['style_id']);
			$data['galleryName'] = $this->common->getGalleryName($userDetails['galleries_id']); 
			//====common code
			$data['interviewData'] = $this->common->getInterviewsOfUser($userId);
			$this->load->view('webmaster/interviews',$data);
		}else{
			redirect('webmaster/user','refresh');
		}
	}

	function manage_interview($userId,$id){
		$data['act_id']='user';
 	 	$data['userId']=$userId;
 	 	$data['id']=$id;
 	 	$tbl = 'tbl_interview';
 	  	if($id>0)
		{  
			$btnCapt="Update"; 
			$where = array('id' => $id);
			$data['dataDs'] = $this->common->getOneRowArray( '*', $tbl, $where );
		}else{
			$btnCapt = "Add"; 
			$data['dataDs'] = ''; 
			
		}
		$data['btnCapt']=$btnCapt;
 		$this->form_validation->set_rules('question', 'Question', 'trim|required');
		$this->form_validation->set_rules('questions_answer', 'Answer', 'trim|required'); 

		//====common code for top header of artist
		$data['userDetails'] = $userDetails = $this->common->getUserDetails($userId);
	 	$data['styleName'] = $this->common->getStyleName($userDetails['style_id']);
		$data['galleryName'] = $this->common->getGalleryName($userDetails['galleries_id']); 
		//====common code

		if($this->form_validation->run())
		{

			$update_array = array(
								'question'=>$this->input->post('question'),
								'questions_answer'=>$this->input->post('questions_answer'),
								'added_by'=>0,
								'user_id'=>$userId,
								'added_date'=>date('Y-m-d h:m:s')
								);

			if($id>0){
				$where_array=array('id'=>$id);
				$this->common->update_entry($tbl,$update_array,$where_array);
				$this->session->set_flashdata('Success','Record updated successfully .');
				redirect('webmaster/user/interviews/'.$userId.'/0','refresh');

			}else{
				$this->common->add_records($tbl,$update_array);
				$new_registration_id =	$this->db->insert_id();			
				$this->session->set_flashdata('Success','Record added successfully .');
				redirect('webmaster/user/interviews/'.$userId.'/0','refresh');
			}
		} 

		$data['interviewData'] = $this->common->getInterviewsOfUser($userId);
		$this->load->view('webmaster/interviews',$data);
 	}

 	function delete_interview($userId){
 		$tbl = 'tbl_interview';
 		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/user/interviews/".$userId,"refresh");
 	  
 	}

 	// descriptions for all featured sections.
 	function manage_desc($userId,$field){
 		$data['act_id']="user";
		$data['userId'] = $userId;
		$data['field'] = $field;
		$where = array('id' => $userId );
		$isExists = $this->common->num_users($where);
		if($isExists>0){
			//====common code for top header of artist
			$data['userDetails'] = $userDetails = $this->common->getUserDetails($userId);
		 	$data['styleName'] = $this->common->getStyleName($userDetails['style_id']);
			$data['galleryName'] = $this->common->getGalleryName($userDetails['galleries_id']); 
			//====common code


			$tbl = 'tbl_artist_user';
			$where_array =  array('user_id' => $userId );
			$fieldName = '';
			if($field=='interviews'){
				$fieldName = "interview_desc";
			}else if($field=='artgallery'){
				$fieldName = "feature_artwork_gallery_desc";
			}else if($field=='insidethestudio'){
				$fieldName = "feature_inside_the_studio_desc";
			}else if($field=='featurevideo'){
				$fieldName = "feature_video_desc";
			}
			
			$data['fieldName'] = $fieldName;
			$data['artist_data'] = $this->common->getOneRowArray('*',$tbl,$where_array);
			
			$this->form_validation->set_rules('description','Description','trim|required');
			if($this->form_validation->run()){

				$update = array( $fieldName => $this->db->escape_str($this->input->post('description')) );
				$this->common->update_entry($tbl,$update,$where_array);
				$this->session->set_flashdata('Success','Record updated successfully .');
				redirect('webmaster/user/manage_desc/'.$userId.'/'.$field);
			}
			$this->load->view('webmaster/feature_artist_desc',$data);
		}else 		redirect('webmaster/user');
	}

	//sliders
	function sliders($userId,$type,$id=0){
		$data['act_id']="user";
		$data['userId'] = $userId;
		$data['type'] = $type;
		$data['id'] = $id;
		$where = array('id' => $userId );
		$isExists = $this->common->num_users($where);
		if($isExists>0){
			//====common code for top header of artist
			$data['userDetails'] = $userDetails = $this->common->getUserDetails($userId);
		 	$data['styleName'] = $this->common->getStyleName($userDetails['style_id']);
			$data['galleryName'] = $this->common->getGalleryName($userDetails['galleries_id']); 
			//====common code

			$tbl = 'tbl_artist_slider';
			$where_array =  array('user_id' => $userId,'type' => $type );
			$data['artistData'] = $this->common->getAllRowArray('*',$tbl,$where_array);

			if($id>0){
				$data['btnCapt'] = 'Update';
				$data['artist_data'] = $this->common->getOneRowArray('*',$tbl,$where_array);
			}else{
				$data['btnCapt'] = 'Add';
			}
			
			 
			if($this->input->post('mode')=='1'){
				if(!is_dir('./uploads/artist_images')){
					mkdir('./uploads/artist_images');
				}

			$flag=0;
		  	if($_FILES['image_name']['name']!=''){
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
			if($flag==0){

					$final_img  = '';
			 		if($_FILES['image_name']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['image_name']['name'] = $file['image_name']['name'];					
						
						$filename = str_replace(' ','_','artist_art')."_".uniqid();
						$path = $_FILES['image_name']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/artist_images';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image_name']['type']=$file['image_name']['type'];
						$_FILES['image_name']['tmp_name']=$file['image_name']['tmp_name'];
						$_FILES['image_name']['error']=$file['image_name']['error'];
						$_FILES['image_name']['size']=$file['image_name']['size'];
						$this->upload->do_upload('image_name');
						if($this->input->post('old_image_name')!=''){
							@unlink('./uploads/artist_images/'.$this->input->post('old_image_name'));
						}

					}else{
						if($this->input->post('old_image_name')!=''){
							$final_img = $this->input->post('old_image_name');
						}
					}

				$valueArray = array( 
									'user_id' => $userId,
									'image_name' => $final_img,
									'type' => $type
								);
				if($id>0){
					$whereSlider =  array('id' => $id, 'user_id' =>$userId );
					$this->common->update_entry($tbl,$valueArray,$whereSlider);
					$this->session->set_flashdata('Success','Record updated successfully .');
					redirect('webmaster/user/sliders/'.$userId.'/'.$type);
				}else{
					$this->common->add_records($tbl,$valueArray);
					$this->session->set_flashdata('Success','Record added successfully .');
					redirect('webmaster/user/sliders/'.$userId.'/'.$type);
				}
				
			}
			}
			$this->load->view('webmaster/feature_artist_slider',$data);
		}else redirect('webmaster/user');
	}


	function delete_slider($userId,$type){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);
				$dataRs = $this->common->getOneRowArray("*","tbl_artist_slider",$where);
				@unlink('./uploads/artist_images/'.$dataRs['image_name']);
				$this->common->delete_entry("tbl_artist_slider",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/user/sliders/'.$userId.'/'.$type);
		}
		redirect('webmaster/user/sliders/'.$userId.'/'.$type);
	}

	//video
	function feature_videos($userId){	 
		$data['act_id']="user";
		$data['userId'] = $userId;
		$where = array('id' => $userId );
		$isExists = $this->common->num_users($where);
		if($isExists>0){
			//====common code for top header of artist
			$data['userDetails'] = $userDetails = $this->common->getUserDetails($userId);
		 	$data['styleName'] = $this->common->getStyleName($userDetails['style_id']);
			$data['galleryName'] = $this->common->getGalleryName($userDetails['galleries_id']); 
			//====common code
			$data['artist_data'] = $this->common->getUserArtist($userId);
			if(!is_dir('./uploads/artist_video/')){
				mkdir('./uploads/artist_video/');
			}
			if($this->input->post('mode')=='1'){
				if ($_FILES['feature_video']['name']!=""){
					$allowedExts = array( "mp4", "wma","flv","mpg","mpeg");
					$extension = pathinfo($_FILES['feature_video']['name'], PATHINFO_EXTENSION);
					if (( (($_FILES["feature_video"]["type"] == "video/mp4")
						|| ($_FILES["feature_video"]["type"] == "video/mpeg")
						|| ($_FILES["feature_video"]["type"] == "video/flv")
						|| ($_FILES["feature_video"]["type"] == "video/mpg")
						|| ($_FILES["feature_video"]["type"] == "video/wma")
						 )		
						 && in_array($extension, $allowedExts)))//($_FILES["feature_video"]["size"] < 200000)	&&
						{	 
							if ($_FILES["feature_video"]["error"] > 0){
							  $data['error']	=  $error = $_FILES["feature_video"]["error"];
							}else{
							  $rand=rand('99','9999');
							  $extension=strtolower(strstr($_FILES['feature_video']['name'],"."));
							  $V_name="video_".$rand."_".rand(00000,99999);
							  $thumbpath=$V_name.$extension;
							  move_uploaded_file($_FILES["feature_video"]["tmp_name"],"./uploads/artist_video/" .$thumbpath);
							  $video_name=$thumbpath;
							  @unlink('./uploads/artist_video/'.$this->input->post('old_feature_video'));
							} 
						}
				}else if($this->input->post('old_feature_video')!=''){
						$video_name = $this->input->post('old_feature_video');
				}
				

				$where_array = array('user_id' => $userId);
				$update = array( 
				 	'feature_video' => $video_name
					);
				$this->common->update_entry('tbl_artist_user',$update,$where_array);
				$this->session->set_flashdata('Success','Record updated successfully .');
				redirect('webmaster/user/feature_videos/'.$userId);
			}

			$this->load->view('webmaster/featurevideo',$data);
		}else redirect('webmaster/user');

	}


}?>