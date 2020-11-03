<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class About_us extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure');
	 	$this->load->model('Admin_model','admin'); 	 
	}
	//---------------------- Pages ----------------------------------
	function index(){		
		$data['act_id']="allPages";	
		$data['sub_act_id']="aboutUs";	
		$data['sub_sub_act_id']="manageAboutUs";	
	 	 
		 
		 $data['dataDs'] = $this->common->getAboutUs();
	 
		$this->load->view("webmaster/about_us_list",$data);			
	}
 	
 	function manage($id=0){
 		 
 	 	$data['userData']='';
 	 	$data['act_id']="allPages";	
		$data['sub_act_id']="aboutUs";	
		$data['sub_sub_act_id']="manageAboutUs";	



 	 	$data['id']=$id;
 	 	$tbl = 'tbl_about_section';
 	 	$data['country'] = $this->common->get_country();
 	 	$data['style'] = $this->common->get_style();
 	 	$data['galleries'] = $this->common->get_galleries();
		
		if($id>0)
		{  
			$btnCapt="Update"; 
			$where = array('id' => $id);
			$data['userdata'] = $this->common->getOneRowArray( '*', $tbl, $where );   
			 
		}else{
			$btnCapt = "Add"; 
			$data['userdata'] = ''; 
		 
		}
		$data['btnCapt']=$btnCapt;
 		$this->form_validation->set_rules('desc1', 'Title', 'trim|required');
		$this->form_validation->set_rules('desc2', 'Description', 'trim'); 
		
 		if($this->form_validation->run())
		{
			// file upload
			$flag=0;
		  	if(@$_FILES['image1']['name']!=''){
					$flag=0;
					//==validaye image exists 
					$path_img = $_FILES['image1']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag = 1;						
						break;
					}

			} 
			
			$final_img  = '';
			if($flag==0){

					if(!is_dir('./uploads/about_us/')){
						mkdir('./uploads/about_us/');
					}
			 		if(@$_FILES['image1']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['image1']['name'] = $file['image1']['name'];					
						
						$filename = str_replace(' ','_','about_us')."_".rand(0000,9999);
						$path = $_FILES['image1']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/about_us';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image1']['type']=$file['image1']['type'];
						$_FILES['image1']['tmp_name']=$file['image1']['tmp_name'];
						$_FILES['image1']['error']=$file['image1']['error'];
						$_FILES['image1']['size']=$file['image1']['size'];
						$this->upload->do_upload('image1');
						//$this->common->create_thumb_resize($final_img,'./uploads/about_us/','356','360');
						if($this->input->post('old_image1')!=''){
							@unlink('./uploads/about_us/'.$this->input->post('old_image1'));
						}

					}else{
						if($this->input->post('old_image1')!=''){
							$final_img = $this->input->post('old_image1');
						}
					}
			} 

			$flag2=0;
			if(@$_FILES['image2']['name']!=''){
					$flag2=0;
					//==validaye image exists 
					$path_img = $_FILES['image2']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag2 = 1;						
						break;
					}

			} 

			$final_img2  = '';
			if($flag2==0){

					 
			 		if(@$_FILES['image2']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['image2']['name'] = $file['image2']['name'];					
						
						$filename = str_replace(' ','_','about_us')."_".rand(0000,9999);
						$path = $_FILES['image2']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img2 = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/about_us';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image2']['type']=$file['image2']['type'];
						$_FILES['image2']['tmp_name']=$file['image2']['tmp_name'];
						$_FILES['image2']['error']=$file['image2']['error'];
						$_FILES['image2']['size']=$file['image2']['size'];
						$this->upload->do_upload('image2');
						//$this->common->create_thumb_resize($final_img,'./uploads/about_us/','356','360');
						if($this->input->post('old_image2')!=''){
							@unlink('./uploads/about_us/'.$this->input->post('old_image2'));
						}

					}else{
						if($this->input->post('old_image2')!=''){
							$final_img2 = $this->input->post('old_image2');
						}
					}
			}

			//===Detail Page Banner image 
			$flag3=0;
			if(@$_FILES['image3']['name']!=''){
					$flag3=0;
					//==validaye image exists 
					$path_img = $_FILES['image3']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag3 = 1;						
						break;
					}

			} 

			$final_img3  = '';
			if($flag3==0){

					 
			 		if(@$_FILES['image3']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['image3']['name'] = $file['image3']['name'];					
						
						$filename = str_replace(' ','_','about_us')."_".rand(0000,9999);
						$path = $_FILES['image3']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img3 = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/about_us';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image3']['type']=$file['image3']['type'];
						$_FILES['image3']['tmp_name']=$file['image3']['tmp_name'];
						$_FILES['image3']['error']=$file['image3']['error'];
						$_FILES['image3']['size']=$file['image3']['size'];
						$this->upload->do_upload('image3');
						//$this->common->create_thumb_resize($final_img,'./uploads/about_us/','356','360');
						if($this->input->post('old_image3')!=''){
							@unlink('./uploads/about_us/'.$this->input->post('old_image3'));
						}

					}else{
						if($this->input->post('old_image3')!=''){
							$final_img3 = $this->input->post('old_image3');
						}
					}
			}

			//Book image from detail page
			$flag4=0;
			if(@$_FILES['image4']['name']!=''){
					$flag4=0;
					//==validaye image exists 
					$path_img = $_FILES['image4']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag4 = 1;						
						break;
					}

			}
			$final_img4  = '';
			if($flag4==0){

					 
			 		if(@$_FILES['image4']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['image4']['name'] = $file['image4']['name'];					
						
						$filename = str_replace(' ','_','about_us')."_".rand(0000,9999);
						$path = $_FILES['image4']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img4 = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/about_us';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image4']['type']=$file['image4']['type'];
						$_FILES['image4']['tmp_name']=$file['image4']['tmp_name'];
						$_FILES['image4']['error']=$file['image4']['error'];
						$_FILES['image4']['size']=$file['image4']['size'];
						$this->upload->do_upload('image4');
						//$this->common->create_thumb_resize($final_img,'./uploads/about_us/','356','360');
						if($this->input->post('old_image4')!=''){
							@unlink('./uploads/about_us/'.$this->input->post('old_image4'));
						}

					}else{
						if($this->input->post('old_image4')!=''){
							$final_img4 = $this->input->post('old_image4');
					}
			}
 
		}
			 
			if($id>0){
 
				$update_array = array(
									'desc1'=>$this->input->post('desc1'),
									'desc2'=>$this->input->post('desc2'),
									'image1'=>$final_img,
									'image2'=>$final_img2,
									'image3'=>$final_img3,
									'image4'=>$final_img4
									);

				$where_array=array('id'=>$id); 
				$this->common->update_entry($tbl,$update_array,$where_array);
				$this->session->set_flashdata('Success','Record updated successfully .');
				redirect('webmaster/about_us');

			}else{
				$insert_array = array(
									'desc1'=>$this->input->post('desc1'),
									'desc2'=>$this->input->post('desc2'),
									'image1'=>$final_img,
									'image2'=>$final_img2,
									'image3'=>$final_img3,
									'image4'=>$final_img4
									);
			 	
				$this->common->add_records($tbl,$insert_array);
				$this->session->set_flashdata('Success','Record added successfully .');
				redirect('webmaster/about_us');
			}
		} 
 		$this->load->view('webmaster/manage_about_us',$data);
	}
 
 
}?>