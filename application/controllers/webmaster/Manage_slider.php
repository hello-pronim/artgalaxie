<?php  ob_start(); if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_slider extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');
	}
	//---------------------- Pages ----------------------------------
	function index(){		
		$data['act_id']="CMS";
		$data['sub_act_id']="homePage";
		$data['sub_sub_act_id']="homeMainSlider";

		$select ="*";
		$tbl = "tbl_banners";
		$where = "type=0";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/sliderlist",$data);			
	}
 	
 	function manage($id=0){
 		 
 	 	$data['userData']='';
 	 	$data['act_id']='CMS';
 	 	$data['sub_act_id']="homePage";
 	 	$data['sub_sub_act_id']="homeMainSlider";
		$data['banner_id']=$id;
 	 	$tbl = 'tbl_banners';
		
		if($id>0)
		{  
			$btnCapt="Update"; 
			$where = array('banner_id' => $id);
			$data['dataDs'] = $this->common->getOneRowArray( '*', $tbl, $where );   
		 
		}else{
			$btnCapt = "Add"; 
			$data['dataDs'] = ''; 
		//	$this->form_validation->set_rules('str_name', 'Image', 'required');   
		}
		$data['btnCapt']=$btnCapt;
 		$this->form_validation->set_rules('banner_status', 'Status', 'required'); 
 		$this->form_validation->set_rules('order_no', 'Order No', 'required|numeric'); 
 
		


		if($this->input->post('slider_mode')=='1' &&  $this->form_validation->run())
		{	 
			$flag=0;
		  	if($_FILES['banner_image']['name']!=''){
					$flag=0;
					//==validaye image exists 
					$path_img = $_FILES['banner_image']['name'];
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
			 		if($_FILES['banner_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['banner_image']['name'] = $file['banner_image']['name'];					
						
						$filename = str_replace(' ','_','banner')."_".uniqid();
						$path = $_FILES['banner_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/banner';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['banner_image']['type']=$file['banner_image']['type'];
						$_FILES['banner_image']['tmp_name']=$file['banner_image']['tmp_name'];
						$_FILES['banner_image']['error']=$file['banner_image']['error'];
						$_FILES['banner_image']['size']=$file['banner_image']['size'];
						$this->upload->do_upload('banner_image');
						$this->common->create_thumb_resize($final_img,'./uploads/banner/','1600','1018');
						if($this->input->post('old_str_name')!=''){
							@unlink('./uploads/banner/'.$this->input->post('old_str_name'));
						}

					}else{
						if($this->input->post('old_banner_image')!=''){
							$final_img = $this->input->post('old_banner_image');
						}
					}

						
						$value_array = array(
										'banner_image'=>$final_img,
										'banner_status'=>$this->input->post('banner_status'),
										'order_no'=>$this->input->post('order_no'),
						);
						if($id>0){
			 				$where_array=array('banner_id'=>$id);
							$this->common->update_entry($tbl,$value_array,$where_array);
							$this->session->set_flashdata('Success','Slider updated successfully.');
							redirect('webmaster/manage_slider/index','refresh');

						}else{
					 		$this->common->add_records($tbl,$value_array);
							$new_registration_id =	$this->db->insert_id();			
							
							$this->session->set_flashdata('Success','Slider added successfully.');  
							redirect('webmaster/manage_slider/index','refresh');
						}
			}else{
				$this->session->set_flashdata('Error',"Please upload valid PNG/JPG/JPEG/GIF extension");
				redirect('webmaster/manage_slider/other_pages_sliders');
			}
		} 
 		$this->load->view('webmaster/manage_slider',$data);
	} 
 

	public function delete_slider(){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("banner_id " => $delid[$i]);
				$dataRs = $this->common->getOneRowArray("*","tbl_banners",$where);
				@unlink('./uploads/banner/'.$dataRs['str_name']);
				$this->common->delete_entry("tbl_banners",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/manage_slider/index','refresh');
		}
		redirect('webmaster/manage_slider/index','refresh');
	}
 	
 	//==========other section slider
	function other_pages_sliders($id=0){
		$data['act_id']="CMS";
	//	$data['sub_act_id']="homePage";
		$data['sub_sub_act_id']="other_pages_sliders";
		$data['id']=$id;
		
		$tbl = 'tbl_image_video_slider';
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['sliderData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		if($this->input->post('mode')==1){

			if(!is_dir('./uploads/page_slider_content/')){
				mkdir('./uploads/page_slider_content/');

			}
			$type= $this->input->post('type');			
			if($type=='video'){
				    
			$final_img  = 0;
		  	if($_FILES['str_name']['name']!=''){
				$final_img  = 0;
					//==validaye image exists 
					$path_img = $_FILES['str_name']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('mp4','AVI','flv','wmv','mov');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$final_img = 1;	
						$this->session->set_flashdata('Error',"Please upload valid MP4/FLV/AVI/WMV extension");
					    redirect('webmaster/manage_slider/other_pages_sliders');
					  //	break;
					}

			} 
			$final_img  = '';
			if($final_img==0){
 
			 		if($_FILES['str_name']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['str_name']['name'] = $file['str_name']['name'];					
						
						$filename = str_replace(' ','_','image-gallery-video')."_".uniqid();
						$path = $_FILES['str_name']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/page_slider_content/';
						$config['allowed_types'] = '*';
									
						$this->upload->initialize($config);					
						$_FILES['str_name']['type']=$file['str_name']['type'];
						$_FILES['str_name']['tmp_name']=$file['str_name']['tmp_name'];
						$_FILES['str_name']['error']=$file['str_name']['error'];
						$_FILES['str_name']['size']=$file['str_name']['size'];
						$this->upload->do_upload('str_name');
					 	if($this->input->post('old_representation_video')!=''){
							@unlink('./uploads/page_slider_content/'.$this->input->post('old_representation_video'));
						}

					}else{
						if($this->input->post('old_representation_video')!=''){
							$final_img = $this->input->post('old_representation_video');
							var_dump($final_img);
						exit();
						}
					}
			}

				 
				
				
}
				/*if ($_FILES['str_name']['name']!=""){
					$allowedExts = array( "mp4", "wma","flv","mpg","mpeg");
					$extension = pathinfo($_FILES['str_name']['name'], PATHINFO_EXTENSION);

						var_dump($_FILES["str_name"]["type"]);
						exit();
					if (( (($_FILES["str_name"]["type"] == "video/mp4")
						|| ($_FILES["str_name"]["type"] == "video/mpeg")
						|| ($_FILES["str_name"]["type"] == "video/flv")
						|| ($_FILES["str_name"]["type"] == "video/mpg")
						|| ($_FILES["str_name"]["type"] == "video/wma")
						 )		
						 && in_array($extension, $allowedExts)))//($_FILES["str_name"]["size"] < 200000)	&&
						{	 
							if ($_FILES["str_name"]["error"] > 0){
							  $data['error']	=  $error = $_FILES["str_name"]["error"];
							  var_dump($data);
								exit();
							}else{
							  $rand=rand('99','9999');
							  $extension=strtolower(strstr($_FILES['str_name']['name'],"."));

							  $V_name="video_".$rand."_".rand(00000,99999);
							  $thumbpath=$V_name.$extension;
							  move_uploaded_file($_FILES["str_name"]["tmp_name"],"./uploads/page_slider_content/" .$thumbpath);
							  $video_name=$thumbpath;
							  
							  @unlink('./uploads/page_slider_content/'.$this->input->post('old_str_name'));
							} 
						}
				}else if($this->input->post('old_str_name')!=''){
						$video_name = $this->input->post('old_str_name');
						
				}
				$final_img = $video_name;
			}*/else if($type=='image'){

				$flag=0;
			  	if($_FILES['str_name']['name']!=''){
						$flag=0;
						//==validaye image exists 
						$path_img = $_FILES['str_name']['name'];
						$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
							
						$valid_ext_arr = array('png','jpg','jpeg','gif');
						if(!in_array(strtolower($ext_img),$valid_ext_arr))
						{
							$flag = 1;						
							//break;
						}

				} 
				if($flag==0){

						$final_img  = '';
				 		if($_FILES['str_name']['name']!=''){
						
							$file=$_FILES;	
							$_FILES['str_name']['name'] = $file['str_name']['name'];					
							
							$filename = str_replace(' ','_','banner')."_".uniqid();
							$path = $_FILES['str_name']['name'];
							$ext = pathinfo($path, PATHINFO_EXTENSION);							
							
							$final_img = $filename.".".$ext;					
							
							$this->load->library('upload');
							$config['file_name']     = $filename;
							$config['upload_path']   = './uploads/page_slider_content';
							$config['allowed_types'] = 'png|jpeg|jpg|gif';
										
							$this->upload->initialize($config);					
							$_FILES['str_name']['type']=$file['str_name']['type'];
							$_FILES['str_name']['tmp_name']=$file['str_name']['tmp_name'];
							$_FILES['str_name']['error']=$file['str_name']['error'];
							$_FILES['str_name']['size']=$file['str_name']['size'];
							$this->upload->do_upload('str_name');
							if($this->input->post('old_str_name')!=''){
								@unlink('./uploads/page_slider_content/'.$this->input->post('old_str_name'));
							}

						}else{
							if($this->input->post('old_str_name')!=''){
								$final_img = $this->input->post('old_str_name');
							}
						}

						 
				}else{
					$this->session->set_flashdata('Error',"Please upload valid PNG/JPG/JPEG/GIF extension");
					redirect('webmaster/manage_slider/other_pages_sliders');
				}
			}else if($type=="url"){
				$final_img = $this->input->post('str_name');
			}

			$value_array = array(
						'str_name'=>$final_img,
						'type'=>$type,
						'page_name'=>$this->input->post('page_name'),
						'sort_no' =>$this->input->post('sort_no')
			);

			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Slider updated successfully.');
					redirect('webmaster/manage_slider/other_pages_sliders','refresh');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Slider added successfully.');  
					redirect('webmaster/manage_slider/other_pages_sliders','refresh');

			}
		}

		$data['bannerNumRow']=$this->admin->getOtherPageSlidersNumRow();
		$data['bannerData']=$this->admin->getOtherPageSliders();
		

		$this->load->view('webmaster/other_pages_sliders',$data);
	}	


	public function deleteother_slider(){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);
				$dataRs = $this->common->getOneRowArray("*","tbl_image_video_slider",$where);
				@unlink('./uploads/page_slider_content/'.$dataRs['str_name']);
				$this->common->delete_entry("tbl_image_video_slider",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/manage_slider/other_pages_sliders','refresh');
		}
		redirect('webmaster/manage_slider/other_pages_sliders','refresh');
	}

}?>