<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Art_of_giving extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
			$this->load->model('Frontend_model','frontend');
	}
	
	function index(){
		$data['act_id']="allPages";	
			$data['sub_act_id']="art_of_giving";
			$data['sub_sub_act_id']="art_of_giving";	

		$data['num_rec'] = $num_rec = $this->common->num_art_of_giving();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_art_of_giving();
		}
		$this->load->view("webmaster/art_of_giving_list",$data);
	}
	
	function manage_art_of_giving($id=0){
		$data['act_id']="allPages";	
			$data['sub_act_id']="art_of_giving";
			$data['sub_sub_act_id']="art_of_giving";	
		$data['id'] = $id;
		$tbl = "tbl_art_of_giving";  

		
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['art_title'] = '';
		}

		$this->form_validation->set_rules('art_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('art_text', 'Art Text', 'trim|required'); 
		$this->form_validation->set_rules('donate_title', 'Donate Title', 'trim|required'); 
		$this->form_validation->set_rules('donate_text', 'Donate Text', 'trim|required'); 
		$this->form_validation->set_rules('donate_title2', 'Donate Title2', 'trim|required'); 
		$this->form_validation->set_rules('donate_text2', 'Donate Text2', 'trim|required'); 
		$this->form_validation->set_rules('artist_title', 'Artist Title', 'trim|required'); 
		$this->form_validation->set_rules('artist_text', 'Artist_text', 'trim|required'); 
		$this->form_validation->set_rules('comp_title', 'Comp Title', 'trim|required'); 
		$this->form_validation->set_rules('comp_text', 'Comp Text', 'trim|required'); 
		$this->form_validation->set_rules('affilate_title', 'Affilate Title', 'trim|required'); 
		$this->form_validation->set_rules('affilate_text', 'Affilate Text', 'trim|required'); 
		if($this->form_validation->run()){

			if(!is_dir('./uploads/art_of_giving/')){
				mkdir('./uploads/art_of_giving/');
			}
            
			$flagBannerImage=0;
		  	if($_FILES['banner_image']['name']!=''){
					$flagBannerImage=0;
					//==validaye image exists 
					$path_img = $_FILES['banner_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagBannerImage = 1;						
						break;
					}

			} 
			$final_imgBannerImage  = '';
			if($flagBannerImage==0){
 
			 		if($_FILES['banner_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['banner_image']['name'] = $file['banner_image']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-image')."_".uniqid();
						$path = $_FILES['banner_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgBannerImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['banner_image']['type']=$file['banner_image']['type'];
						$_FILES['banner_image']['tmp_name']=$file['banner_image']['tmp_name'];
						$_FILES['banner_image']['error']=$file['banner_image']['error'];
						$_FILES['banner_image']['size']=$file['banner_image']['size'];
						$this->upload->do_upload('banner_image');
					 	if($this->input->post('old_banner_image')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_banner_image'));
						}

					}else{
						if($this->input->post('old_banner_image')!=''){
							$final_imgBannerImage = $this->input->post('old_banner_image');
						}
					}
			} 


			$flagBanner2Image=0;
		  	if($_FILES['banner2']['name']!=''){
					$flagBanner2Image=0;
					//==validaye image exists 
					$path_img = $_FILES['banner2']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagBanner2Image = 1;						
						break;
					}

			} 
			$final_Banner2Image  = '';
			if($flagBanner2Image==0){
 
			 		if($_FILES['banner2']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['banner2']['name'] = $file['banner2']['name'];					
						
						$filename = str_replace(' ','_','floorplan-gallery-image')."_".uniqid();
						$path = $_FILES['banner2']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_Banner2Image = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['banner2']['type']=$file['banner2']['type'];
						$_FILES['banner2']['tmp_name']=$file['banner2']['tmp_name'];
						$_FILES['banner2']['error']=$file['banner2']['error'];
						$_FILES['banner2']['size']=$file['banner2']['size'];
						$this->upload->do_upload('banner2');
					 	if($this->input->post('old_banner2')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_banner2'));
						}

					}else{
						if($this->input->post('old_banner2')!=''){
							$final_Banner2Image = $this->input->post('old_banner2');
						}
					}
			} 
			$flagBanner3Image=0;
		  	if($_FILES['banner3']['name']!=''){
					$flagBanner3Image=0;
					//==validaye image exists 
					$path_img = $_FILES['banner3']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagBanner3Image = 1;						
						break;
					}

			} 
			$final_Banner3Image  = '';
			if($flagBanner3Image==0){
 
			 		if($_FILES['banner3']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['banner3']['name'] = $file['banner3']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-image')."_".uniqid();
						$path = $_FILES['banner3']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_Banner3Image = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['banner3']['type']=$file['banner3']['type'];
						$_FILES['banner3']['tmp_name']=$file['banner3']['tmp_name'];
						$_FILES['banner3']['error']=$file['banner3']['error'];
						$_FILES['banner3']['size']=$file['banner3']['size'];
						$this->upload->do_upload('banner3');
					 	if($this->input->post('old_banner3')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_banner3'));
						}

					}else{
						if($this->input->post('old_banner3')!=''){
							$final_Banner3Image = $this->input->post('old_banner3');
						}
					}
			} 


 			$value_array = array(
							 
							'art_title' =>$this->security->xss_clean($this->input->post('art_title')),
							'art_text' => $this->security->xss_clean($this->input->post('art_text')),
							'banner_image'=>$final_imgBannerImage,
							'donate_title' =>$this->security->xss_clean($this->input->post('donate_title')),
							'donate_text' =>$this->security->xss_clean($this->input->post('donate_text')),
							'donate_title2' =>$this->security->xss_clean($this->input->post('donate_title2')),
							'donate_text2' =>$this->security->xss_clean($this->input->post('donate_text2')),
							'banner2' =>$final_Banner2Image,
							'artist_title' =>$this->security->xss_clean($this->input->post('artist_title')),
							'artist_text' =>$this->security->xss_clean($this->input->post('artist_text')),
							'banner3' =>$final_Banner3Image,
							'comp_title' =>$this->security->xss_clean($this->input->post('comp_title')),
							'comp_text' =>$this->security->xss_clean($this->input->post('comp_text')),
							'affilate_title' =>$this->security->xss_clean($this->input->post('affilate_title')),
							'affilate_text' =>$this->security->xss_clean($this->input->post('affilate_text'))
			 );
		//print_r($value_array);die;


		if ($id==0){
			 	
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/art_of_giving");
		}else{
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
			//print_r($value_array);die;
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/art_of_giving");
		}
		}	 
		 
		$this->load->view("webmaster/manage_art_of_giving",$data);
	
	}
		function manage_art_of_giving_charity($id=0){
	$data['act_id']="allPages";	
			$data['sub_act_id']="art_of_giving";
			$data['sub_sub_act_id']="art_of_giving";
		$data['id'] = $id;
		$tbl = "tbl_art_of_giving_charity";  

		
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['button_title'] = '';
		}

 
		$this->form_validation->set_rules('button_title', 'Button Title', 'trim|required'); 
		$this->form_validation->set_rules('button_url', 'Button Url', 'trim|required'); 
		if($this->form_validation->run()){

			if(!is_dir('./uploads/art_of_giving/')){
				mkdir('./uploads/art_of_giving/');
			}
            
            $flagButtonImage=0;
		  	if($_FILES['button_image']['name']!=''){
					$flagButtonImage=0;
					//==validaye image exists 
					$path_img = $_FILES['button_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagButtonImage = 1;						
						break;
					}

			} 
			$final_imgButtonImage  = '';
			if($flagButtonImage==0){
 
			 		if($_FILES['button_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['button_image']['name'] = $file['button_image']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-image')."_".uniqid();
						$path = $_FILES['button_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgButtonImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['button_image']['type']=$file['button_image']['type'];
						$_FILES['button_image']['tmp_name']=$file['button_image']['tmp_name'];
						$_FILES['button_image']['error']=$file['button_image']['error'];
						$_FILES['button_image']['size']=$file['button_image']['size'];
						$this->upload->do_upload('button_image');
					 	if($this->input->post('old_button_image')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_button_image'));
						}

					}else{
						if($this->input->post('old_button_image')!=''){
							$final_imgButtonImage = $this->input->post('old_button_image');
						}
					}
			} 
		


 			$value_array = array(
							'button_title' =>$this->security->xss_clean($this->input->post('button_title')),
							'button_url' =>$this->security->xss_clean($this->input->post('button_url')),
							'button_image'=>$final_imgButtonImage,
			 );
		//print_r($value_array);die;


		if ($id==0){
			 	
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/art_of_giving");
		}else{
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
			//print_r($value_array);die;
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/art_of_giving");
		}
		}	 
		$data['list_data'] = $this->common->get_art_of_giving_charity();
		$this->load->view("webmaster/manage_art_of_giving_charity",$data);
	
	}
	function delete_art_of_giving_charity(){
		 
		$tbl = "tbl_art_of_giving_charity";
		
 		if($this->security->xss_clean($this->input->post('action')=="delete"))
 		{
 		   
			for($i=0;$i<count($this->input->post('cb'));$i++)
			{
				//echo $_POST(); 
				$delid  =   $this->input->post('cb');
				
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				@unlink('./uploads/art_of_giving/'.$form_data['button_image']);
		
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/art_of_giving");
	}
	
		function delete_art_of_giving_donate(){
		 
		$tbl = "tbl_otherways_to_donate";
		
 		if($this->security->xss_clean($this->input->post('action')=="delete"))
 		{
 		   
			for($i=0;$i<count($this->input->post('cb'));$i++)
			{
				//echo $_POST(); 
				$delid  =   $this->input->post('cb');
				
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				@unlink('./uploads/art_of_giving/'.$form_data['image']);
		
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/art_of_giving/manage_otherways_to_donate");
	}
	
	
	 	function manage_just_giving_to_artist($id=0){
	      $data['act_id']="allPages";	
			$data['sub_act_id']="art_of_giving";
			$data['sub_sub_act_id']="art_of_giving";
		$data['id'] = $id;
		$tbl = "tbl_just_giving_artist";  

		
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['button_title'] = '';
		}

 
		$this->form_validation->set_rules('button_title', 'Button Title', 'trim|required'); 
		$this->form_validation->set_rules('button_url', 'Button Url', 'trim|required'); 
		if($this->form_validation->run()){

			if(!is_dir('./uploads/art_of_giving/')){
				mkdir('./uploads/art_of_giving/');
			}
            
            $flagButtonImage=0;
		  	if($_FILES['button_image']['name']!=''){
					$flagButtonImage=0;
					//==validaye image exists 
					$path_img = $_FILES['button_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagButtonImage = 1;						
						break;
					}

			} 
			$final_imgButtonImage  = '';
			if($flagButtonImage==0){
 
			 		if($_FILES['button_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['button_image']['name'] = $file['button_image']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-image')."_".uniqid();
						$path = $_FILES['button_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgButtonImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['button_image']['type']=$file['button_image']['type'];
						$_FILES['button_image']['tmp_name']=$file['button_image']['tmp_name'];
						$_FILES['button_image']['error']=$file['button_image']['error'];
						$_FILES['button_image']['size']=$file['button_image']['size'];
						$this->upload->do_upload('button_image');
					 	if($this->input->post('old_button_image')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_button_image'));
						}

					}else{
						if($this->input->post('old_button_image')!=''){
							$final_imgButtonImage = $this->input->post('old_button_image');
						}
					}
			} 
		


 			$value_array = array(
							'button_title' =>$this->security->xss_clean($this->input->post('button_title')),
							'button_url' =>$this->security->xss_clean($this->input->post('button_url')),
							'button_image'=>$final_imgButtonImage,
			 );
		//print_r($value_array);die;


		if ($id==0){
			 	
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/art_of_giving");
		}else{
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
			//print_r($value_array);die;
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/art_of_giving");
		}
		}	 
		$data['list_data'] = $this->common->get_just_giving_artist();
		$this->load->view("webmaster/manage_just_giving_artist",$data);
	
	}
	function delete_just_giving_to_artist(){
		 
		$tbl = "tbl_just_giving_artist";
 		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				@unlink('./uploads/art_of_giving/'.$form_data['button_image']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/art_of_giving");
	}
	function delete_art_of_giving(){
		 
		$tbl = "tbl_art_of_giving";
		
 		if($this->security->xss_clean($this->input->post('action')=="delete"))
 		{
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++)
			{
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				@unlink('./uploads/art_of_giving/'.$form_data['banner_image']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/art_of_giving");
	} 
	
	// Just Giving Book
	function just_giving_book()
	{
	    $data['act_id']="allPages";	
		$data['sub_act_id']="art_of_giving";	
		$data['sub_sub_act_id']="just_giving_book";
		$data['sub_sub_sub_act_id']="just_giving_bookmanage";	

		$data['num_rec'] = $num_rec = $this->common->num_just_giving_book();

		if($num_rec>0)
		{
			$data['list_data'] = $this->common->get_just_giving_book();
		}
		$this->load->view("webmaster/just_giving_book_list",$data);
	}
	function manage_just_giving_book($id=0)
	{
		$data['act_id']="allPages";	
		$data['sub_act_id']="art_of_giving";	
		$data['sub_sub_act_id']="just_giving_book";
		$data['sub_sub_sub_act_id']="just_giving_bookmanage";
		
		$data['id'] = $id;
		$tbl = "tbl_just_giving_book";  
        $data['user_artist'] = $this->common->getUserList('id,first_name,last_name',array('user_type'=>'artist'));
        
        //Publication Data
        $data['num_rec'] = $num_rec = $this->common->num_publication();
		if($num_rec){
			$data['Pdata'] = $this->common->getPublication();
		}
		
		
			//========== ckeditor  starts ============
		$data['ckeditor'] = array(		
			//ID of the page_descarea that will be replaced
			'id' 	=> 	'benefits_text',
			'path'	=>	'js/ckeditor',	
			'filebrowserImageUploadUrl' =>	site_url('webmaster/manage_just_giving_book/ck_imageupload') //'imageupload.php',	
		);//========== ckeditor  ends ============	 
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
			
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['giving_book_text'] = '';
		}

		$this->form_validation->set_rules('giving_book_text', 'Art Text', 'trim|required');  
		//$this->form_validation->set_rules('giving_book_text2', 'Donate Text', 'trim|required');  
		if($this->form_validation->run()){

			if(!is_dir('./uploads/art_of_giving/')){
				mkdir('./uploads/art_of_giving/');
			}

			$flagBannerImage=0;
		  	if($_FILES['banner_image']['name']!=''){
					$flagBannerImage=0;
					//==validaye image exists 
					$path_img = $_FILES['banner_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagBannerImage = 1;						
						break;
					}

			} 
			$final_imgBannerImage  = '';
			if($flagBannerImage==0){
 
			 		if($_FILES['banner_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['banner_image']['name'] = $file['banner_image']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-image')."_".uniqid();
						$path = $_FILES['banner_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgBannerImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['banner_image']['type']=$file['banner_image']['type'];
						$_FILES['banner_image']['tmp_name']=$file['banner_image']['tmp_name'];
						$_FILES['banner_image']['error']=$file['banner_image']['error'];
						$_FILES['banner_image']['size']=$file['banner_image']['size'];
						$this->upload->do_upload('banner_image');
					 	if($this->input->post('old_banner_image')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_banner_image'));
						}

					}else{
						if($this->input->post('old_banner_image')!=''){
							$final_imgBannerImage = $this->input->post('old_banner_image');
						}
					}
			}
          $artist = $this->input->post('user_artist');
		  $artistData = implode(',',$artist);
		  
		   $publication = $this->input->post('publication_id');
		  $publicationData = implode(',',$publication);

 			$value_array = array(
							'giving_book_text' =>($this->input->post('giving_book_text')),
							//'giving_book_text2' =>$this->security->xss_clean($this->input->post('giving_book_text2')),
							'banner_image' =>$final_imgBannerImage,
							'artist_id'=>0,
							'publication_id'=>$publicationData
							//'banner2' =>$final_Banner2Image
			 );
			 
		if ($id==0){
			 	
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/art_of_giving/just_giving_book");
		}else{
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
			//print_r($value_array);die;
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/art_of_giving/just_giving_book");
		}
		}	 
		 
		$this->load->view("webmaster/manage_just_giving_book",$data);
	
	}
	function delete_just_giving_book(){
		 
		$tbl = "tbl_just_giving_book";
		
 		if($this->security->xss_clean($this->input->post('action')=="delete"))
 		{
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++)
			{
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				@unlink('./uploads/art_of_giving/'.$form_data['banner_image']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/art_of_giving/just_giving_book");
	} 
	
	//Just Giving Websites
	function just_giving_websites()
	{
        $data['act_id']="allPages";	
        $data['sub_act_id']="art_of_giving";	
        $data['sub_sub_act_id']="just_giving_websites";
        $data['sub_sub_sub_act_id']="just_giving_websitesmanage";
        
        $data['num_rec'] = $num_rec = $this->common->num_just_giving_websites();
        if($num_rec>0)
        {
            $data['list_data'] = $this->common->get_just_giving_websites();
        }
        
        $this->load->view("webmaster/just_giving_websites_list",$data);
	} 

	function manage_just_giving_websites($id=0)
	{
        $data['act_id']="allPages";	
        $data['sub_act_id']="art_of_giving";	
        $data['sub_sub_act_id']="just_giving_websites";
        $data['sub_sub_sub_act_id']="just_giving_websitesmanage";
        
        $data['id'] = $id;
        $tbl = "tbl_just_giving_websites";  
        $data['user_artist'] = $this->common->getUserList('id,first_name,last_name',array('user_type'=>'artist'));
		
		//========== ckeditor  starts ============
	    $data['ckeditor'] = array(		
		//ID of the page_descarea that will be replaced
		'id' 	=> 	'benefits_text',
		'path'	=>	'js/ckeditor',	
		'filebrowserImageUploadUrl' =>	site_url('webmaster/manage_just_giving_websites/ck_imageupload') //'imageupload.php',	
	    );//========== ckeditor  ends ============
		
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['art_title'] = '';
		}

		$this->form_validation->set_rules('giving_websites_text', 'Art Text', 'trim|required');  
		if($this->form_validation->run()){

			if(!is_dir('./uploads/art_of_giving/')){
				mkdir('./uploads/art_of_giving/');
			}

			$flagBannerImage=0;
		  	if($_FILES['banner1']['name']!=''){
					$flagBannerImage=0;
					//==validaye image exists 
					$path_img = $_FILES['banner1']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagBannerImage = 1;						
						break;
					}

			} 
			$final_imgBannerImage  = '';
			if($flagBannerImage==0){
 
			 		if($_FILES['banner1']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['banner1']['name'] = $file['banner1']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-image')."_".uniqid();
						$path = $_FILES['banner1']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgBannerImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['banner1']['type']=$file['banner1']['type'];
						$_FILES['banner1']['tmp_name']=$file['banner1']['tmp_name'];
						$_FILES['banner1']['error']=$file['banner1']['error'];
						$_FILES['banner1']['size']=$file['banner1']['size'];
						$this->upload->do_upload('banner1');
					 	if($this->input->post('old_banner1')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_banner1'));
						}

					}else{
						if($this->input->post('old_banner1')!=''){
							$final_imgBannerImage = $this->input->post('old_banner1');
						}
					}
			}
                $artist = $this->input->post('user_artist');
		        $artistData = implode(',',$artist);
            
 			    $value_array = array(
							'giving_websites_text' =>($this->input->post('giving_websites_text')),
						    'giving_websites_link' =>$this->security->xss_clean($this->input->post('giving_websites_link')),
							'artist_id'=>$artistData,
							'banner1' =>$final_imgBannerImage
						    //'banner2' =>$final_Banner2Image
			 );

		if ($id==0){
			 	
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/art_of_giving/just_giving_websites");
		}else{
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
			//print_r($value_array);die;
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/art_of_giving/just_giving_websites");
		}
		}	 
		 
		$this->load->view("webmaster/manage_just_giving_websites",$data);
	
	}
	function delete_just_giving_website(){
		 
		$tbl = "tbl_just_giving_websites";
		
 		if($this->security->xss_clean($this->input->post('action')=="delete"))
 		{
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++)
			{
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				@unlink('./uploads/art_of_giving/'.$form_data['banner_image']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/art_of_giving/just_giving_websites");
	} 
	
	
	
	//Just Giving Video
	function just_giving_video()
	{
	    $data['act_id']="allPages";	
		$data['sub_act_id']="art_of_giving";	
		$data['sub_sub_act_id']="just_giving_video";
		$data['sub_sub_sub_act_id']="just_giving_videomanage";

		$data['num_rec'] = $num_rec = $this->common->num_just_giving_video();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_just_giving_video();
		}
		$this->load->view("webmaster/just_giving_video_list",$data);
	} 

	function manage_just_giving_video($id=0){
		$data['act_id']="allPages";	
		$data['sub_act_id']="art_of_giving";	
		$data['sub_sub_act_id']="just_giving_video";
		$data['sub_sub_sub_act_id']="just_giving_videomanage";
		
		$data['id'] = $id;
		$tbl = "tbl_just_giving_video";  
		$data['user_artist'] = $this->common->getUserList('id,first_name,last_name',array('user_type'=>'artist'));
            
            //========== ckeditor  starts ============
		$data['ckeditor'] = array(		
			//ID of the page_descarea that will be replaced
			'id' 	=> 	'benefits_text',
			'path'	=>	'js/ckeditor',	
			'filebrowserImageUploadUrl' =>	site_url('webmaster/manage_just_giving_video/ck_imageupload') //'imageupload.php',	
		);//========== ckeditor  ends ============
		
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['giving_video_text'] = '';
		}

		$this->form_validation->set_rules('giving_video_text', 'Art Text', 'trim|required');  
	//	$this->form_validation->set_rules('giving_video_text2', 'Donate Text', 'trim|required');  
		if($this->form_validation->run()){

			if(!is_dir('./uploads/art_of_giving/')){
				mkdir('./uploads/art_of_giving/');
			}
		/*	
			$flagjustgivingVideo=0;
		  	if($_FILES['str_name']['name']!=''){
					$flagjustgivingVideo=0;
					//==validaye image exists 
					$path_img = $_FILES['str_name']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('mp4','avi','webm','3gp','wmv','flv');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagjustgivingVideo = 1;						
						break;
					}

			} 
			$final_justgivingVideo  = '';
			if($flagjustgivingVideo==0){
 
			 		if($_FILES['str_name']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['str_name']['name'] = $file['str_name']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-video')."_".uniqid();
						$path = $_FILES['str_name']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_justgivingVideo = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'mp4|avi|webm|wmv|3gp|flv';
									
						$this->upload->initialize($config);					
						$_FILES['str_name']['type']=$file['str_name']['type'];
						$_FILES['str_name']['tmp_name']=$file['str_name']['tmp_name'];
						$_FILES['str_name']['error']=$file['str_name']['error'];
						$_FILES['str_name']['size']=$file['str_name']['size'];
						$this->upload->do_upload('str_name');
					 	if($this->input->post('old_representation_video')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_representation_video'));
						}

					}else{
						if($this->input->post('old_representation_video')!=''){
							$final_justgivingVideo = $this->input->post('old_representation_video');
						}
					}
			}
			
			*/
		
			$artist = $this->input->post('user_artist');
		  $artistData = implode(',',$artist);

 			$value_array = array(
							 
	
							'giving_video_text' =>($this->input->post('giving_video_text')),
						//	'giving_video_text2' =>$this->security->xss_clean($this->input->post('giving_video_text2')),
							
							'str_name' =>$this->input->post('str_name'),
							'type' =>$this->security->xss_clean($this->input->post('type')),
							'artist_id'=>$artistData
						 );
		//print_r($value_array);die;


		if ($id==0){
			 	
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/art_of_giving/just_giving_video");
		}else{
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
			//print_r($value_array);die;
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/art_of_giving/just_giving_video");
		}
		}	 
		 
		$this->load->view("webmaster/manage_just_giving_video",$data);
	
	}
	
	function delete_just_giving_video()
	{
    		$tbl = "tbl_just_giving_video";
     		if($this->security->xss_clean($this->input->post('action')=="delete")){
    			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
    				$delid=$this->security->xss_clean($this->input->post('cb'));
    				
    				$where = array( "id " => $delid[$i] );
    				$select = "*";
    				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
    			 
    				@unlink('./uploads/art_of_giving/'.$form_data['str_name']);
    				$this->common->delete_entry($tbl, $where);
    			}
    			$this->session->set_flashdata("Success", "Record deleted successfully!");			
    		}
    		redirect("webmaster/art_of_giving/just_giving_video");
	}
	
	
	// View Compititions
	function view_competitions()
	{
	    $data['act_id']="allPages";	
		$data['sub_act_id']="art_of_giving";	
		$data['sub_sub_act_id']="view_competitions";
		$data['sub_sub_sub_act_id']="view_competitionsmanage";	

		$data['num_rec'] = $num_rec = $this->common->num_view_competitions();

		if($num_rec>0)
		{
			$data['list_data'] = $this->common->get_view_competitions();
		}
		$this->load->view("webmaster/competitions_list",$data);
	}
	
	function manage_view_competitions($id=0)
	{
	     $data['act_id']="allPages";	
		$data['sub_act_id']="art_of_giving";	
		$data['sub_sub_act_id']="view_competitions";
		$data['sub_sub_sub_act_id']="view_competitionsmanage";		
		
		$data['id'] = $id;
		
		$tbl = "tbl_view_competitions";  
        $data['user_artist'] = $this->common->getUserList('id,first_name,last_name',array('user_type'=>'artist'));
		
		if($id>0)
		{
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}
		else
		{
			$data['btnCapt'] = "add";
			$data['form_data']['giving_book_text'] = '';
		}

		$this->form_validation->set_rules('comp_title', 'Art Text', 'trim|required');  
		$this->form_validation->set_rules('comp_intro', 'Donate Text', 'trim|required');  
		
		if($this->form_validation->run())
		{
            $artist = $this->input->post('user_artist');
		    $artistData = implode(',',$artist);
		    
		    $winner_user_id = $this->input->post('winner_user_id');
            
            if(!is_dir('./uploads/art_of_giving/')){
				mkdir('./uploads/art_of_giving/');
			}

			$flagBannerImage=0;
		  	if($_FILES['banner_image']['name']!=''){
					$flagBannerImage=0;
					//==validaye image exists 
					$path_img = $_FILES['banner_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagBannerImage = 1;						
						break;
					}

			} 
			$final_imgBannerImage  = '';
			if($flagBannerImage==0){
 
			 		if($_FILES['banner_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['banner_image']['name'] = $file['banner_image']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-image')."_".uniqid();
						$path = $_FILES['banner_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgBannerImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['banner_image']['type']=$file['banner_image']['type'];
						$_FILES['banner_image']['tmp_name']=$file['banner_image']['tmp_name'];
						$_FILES['banner_image']['error']=$file['banner_image']['error'];
						$_FILES['banner_image']['size']=$file['banner_image']['size'];
						$this->upload->do_upload('banner_image');
					 	if($this->input->post('old_banner_image')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_banner_image'));
						}

					}else{
						if($this->input->post('old_banner_image')!=''){
							$final_imgBannerImage = $this->input->post('old_banner_image');
						}
					}
			} 
			
 			$value_array = array(
							'comp_title' => $this->security->xss_clean($this->input->post('comp_title')),
							'banner_image' =>$final_imgBannerImage,
							'comp_intro' =>$this->security->xss_clean($this->input->post('comp_intro')),
							'from_date' =>$this->security->xss_clean($this->input->post('from_date')),
							'to_date' =>$this->security->xss_clean($this->input->post('to_date')),
							'artist_name'=>$artistData,
							'winner_user_id' => $winner_user_id,
							'comp_status' => $this->security->xss_clean($this->input->post('comp_status'))
	
			 );
		    
		    if ($id==0)
		    {
    			$this->common->add_records($tbl, $value_array);
    			$this->session->set_flashdata('Success',"Record added successfully!");
    			redirect("webmaster/art_of_giving/view_competitions");
    		}
    		else
    		{
    			$this->common->update_entry($tbl, $value_array, $where);
    			$this->session->set_flashdata('Success',"Record updated successfully!");
    			redirect("webmaster/art_of_giving/view_competitions");
    		}
		}
		
		$this->load->view("webmaster/manage_view_competitions",$data);
	
	}
	
	function past_competitions_intro()
	{
		$data['act_id']="allPages";	
		$data['sub_act_id']="art_of_giving";	
		$data['sub_sub_act_id']="view_competitions";
		$data['sub_sub_sub_act_id']="past_competitions_intro";
	   
		$data['list_intro'] = $this->common->get_competitions_intro();
		
		$this->load->view("webmaster/manage_competitions_intro",$data);
	}
	
	function manage_otherways_to_donate($id=0){
	      $data['act_id']="allPages";	
			$data['sub_act_id']="art_of_giving";
			$data['sub_sub_act_id']="art_of_giving";
		$data['id'] = $id;
		$tbl = "tbl_otherways_to_donate";  
       //========== ckeditor  starts ============
		$data['ckeditor'] = array(		
			//ID of the page_descarea that will be replaced
			'id' 	=> 	'benefits_text',
			'path'	=>	'js/ckeditor',	
			'filebrowserImageUploadUrl' =>	site_url('webmaster/manage_just_giving_video/ck_imageupload') //'imageupload.php',	
		);//========== ckeditor  ends ============
		
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['title'] = '';
		}

 
		$this->form_validation->set_rules('title', 'Title', 'trim|required'); 
		$this->form_validation->set_rules('price', 'Price', 'trim|required'); 
		$this->form_validation->set_rules('short_desc', 'Short Desc', 'trim|required');
		if($this->form_validation->run()){

			if(!is_dir('./uploads/art_of_giving/')){
				mkdir('./uploads/art_of_giving/');
			}
            
            $flagButtonImage=0;
		  	if($_FILES['image']['name']!=''){
					$flagButtonImage=0;
					//==validaye image exists 
					$path_img = $_FILES['image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagButtonImage = 1;						
						break;
					}

			} 
			$final_imgButtonImage  = '';
			if($flagButtonImage==0){
 
			 		if($_FILES['image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['image']['name'] = $file['image']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-image')."_".uniqid();
						$path = $_FILES['image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgButtonImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/art_of_giving';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image']['type']=$file['image']['type'];
						$_FILES['image']['tmp_name']=$file['image']['tmp_name'];
						$_FILES['image']['error']=$file['image']['error'];
						$_FILES['image']['size']=$file['image']['size'];
						$this->upload->do_upload('image');
					 	if($this->input->post('old_image')!=''){
							@unlink('./uploads/art_of_giving/'.$this->input->post('old_image'));
						}

					}else{
						if($this->input->post('old_image')!=''){
							$final_imgButtonImage = $this->input->post('old_image');
						}
					}
			} 
		


 			$value_array = array(
							'title' =>$this->security->xss_clean($this->input->post('title')),
							'short_desc' =>($this->input->post('short_desc')),
							'price' =>$this->security->xss_clean($this->input->post('price')),
							'add_to_cart' =>$this->security->xss_clean($this->input->post('add_to_cart')),
							'add_to_cart2' =>$this->security->xss_clean($this->input->post('add_to_cart2')),
							'image'=>$final_imgButtonImage,
			 );
		//print_r($value_array);die;


		if ($id==0){
			 	
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/art_of_giving");
		}else{
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
			//print_r($value_array);die;
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/art_of_giving");
		}
		}	 
		$data['list_data'] = $this->common->get_otherways_to_donate();
		$this->load->view("webmaster/manage_otherways_to_donate",$data);
	
	}
	function delete_otherways_to_donate(){
		 
		$tbl = "tbl_just_giving_artist";
 		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				@unlink('./uploads/art_of_giving/'.$form_data['button_image']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/art_of_giving");
	}
	
	function delete_competitions(){
		 
		$tbl = "tbl_view_competitions";
 		if($this->security->xss_clean($this->input->post('action')=="delete"))
 		{
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
				
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/art_of_giving/view_competitions");
	} 
	
	
	function manage_introtext($id=0)
	{
        $data['act_id']="allPages";	
        $data['sub_sub_act_id']="art_of_giving";
        $data['id'] = $id;
        $where = array('id' => $id );
        $tbl = "tbl_introtext_competitions";  
        
        $value_array = array(
							'introtext' =>($this->input->post('long_description')),
			 );
			 
        $this->common->update_entry($tbl, $value_array, $where);
        $this->session->set_flashdata('Success',"Record updated successfully!");
        redirect("webmaster/art_of_giving/past_competitions_intro");
    
	
	}
	
	
	

}?>