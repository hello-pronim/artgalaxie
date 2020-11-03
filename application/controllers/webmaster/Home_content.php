<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_content extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
	}
	
	function section1(){
 		$data['act_id']='CMS';
 	 	$data['sub_act_id']="homePage";
 	 	$data['sub_sub_act_id']="section1";
 	 	$data['redirect'] = 1;
 	 	$data['pageid'] = $pageid =  4;
 	 	$where = array('pageid' => $pageid);
 	 	$data['cmsData'] = $this->common->getOneRowArray('*','tbl_cms_pages',$where);
 	 	$this->load->view('webmaster/manage_sections',$data);
	}	

	function section2(){ // our mission
 		$data['act_id']='CMS';
 	 	$data['sub_act_id']="homePage";
 	 	$data['sub_sub_act_id']="section2";
 	 	$data['redirect'] = 2;
 	 	$data['pageid'] = $pageid =  5;
 	 	$where = array('pageid' => $pageid);
 	 	$data['cmsData'] = $this->common->getOneRowArray('*','tbl_cms_pages',$where);
 	 	$this->load->view('webmaster/manage_sections',$data);
	}	 

	function section3(){ // our mission
 		$data['act_id']='CMS';
 	 	$data['sub_act_id']="homePage";
 	 	$data['sub_sub_act_id']="section3";
 	 	$data['redirect'] = 3;
 	 	$data['pageid'] = $pageid =  6;
 	 	$where = array('pageid' => $pageid);
 	 	$data['cmsData'] = $this->common->getOneRowArray('*','tbl_cms_pages',$where);
 	 	$this->load->view('webmaster/manage_sections',$data);
	}	 


	function content($pageid,$redirect){				
		$tbl = "tbl_cms_pages";
		$data['btnCapt']="update";
		$select = "*";
		$where = array('pageid' => $pageid);
		$data['cmsData']=$cmsData= $this->common->getOneRowArray($select, $tbl, $where);
	 

		$whereP = array('parent_page_id' => 0);
		$data['parentData']=$parentData= $this->admin->get_cms_pages($whereP);


		//========== Update =============
		if($this->input->post('mode')=='Update'){	
		
			$up_data['page_title']= $this->security->xss_clean($this->input->post('page_title'));
			$up_data['meta_title']= $this->security->xss_clean($this->input->post('meta_title'));
			$up_data['meta_description']= $this->security->xss_clean($this->input->post('meta_description'));
			$up_data['meta_keyword']= $this->security->xss_clean($this->input->post('meta_keyword'));
			
			$up_data['page_desc']= $this->input->post('page_desc');	

			 
			if($redirect==3){
				$up_file_2 = '';
				$up_file_1 = '';
				$up_data['meta_keyword']= $this->security->xss_clean($this->input->post('meta_keyword'));
				$up_data['page_url']= $this->security->xss_clean($this->input->post('page_url'));

				if ($_FILES['meta_description']['name']!=""){
					$extension=strstr($_FILES['meta_description']['name'],".");
					$up_file_1=time()."image1-".$_FILES['meta_description']['name'];
					copy($_FILES['meta_description']['tmp_name'],"uploads/page_image/".$up_file_1);
					@unlink("uploads/page_image/".$_POST['old_image1']);
				}else{
		   			$up_file_1 = $_POST['old_image1'];
				}		 	
				

				if ($_FILES['page_image']['name']!=""){
					$extension=strstr($_FILES['page_image']['name'],".");
					$up_file_2=time()."image2-".$_FILES['page_image']['name'];
					copy($_FILES['page_image']['tmp_name'],"uploads/page_image/".$up_file_2);
					@unlink("uploads/page_image/".$_POST['old_image2']);
				}else{
		   			$up_file_2 = $_POST['old_image2'];
				}	

				$up_data['meta_description']= $up_file_1;
				$up_data['page_image']= $up_file_2;	 	
				
				
			}
			
		
			$up_data['page_status']= $this->input->post('page_status');
		 
			$where=array( "pageid " => $pageid );
			$this->common->update_entry("tbl_cms_pages",$up_data,$where);

			$this->session->set_flashdata('Success','Record updated successfully!');
			if($redirect==1){
				redirect('webmaster/home_content/section1','refresh');
			}else if($redirect==2){
				redirect('webmaster/home_content/section2','refresh');
			}else if($redirect==3){
				redirect('webmaster/home_content/section3','refresh');
			}
			
		}				
	}	
	//=====================

	function sliders(){
		$data['act_id']="CMS";
		$data['sub_act_id']="homePage";
		$data['sub_sub_act_id']="otherSlider";
		$data['type'] = '1';
		$select ="*";
		$tbl = "tbl_banners";
		$where = "type!=0";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/othersliderlist",$data);			
	} 


	function manage($id=0){
 		 
 	 	$data['userData']='';
 	 	$data['act_id']='CMS';
 	 	$data['sub_act_id']="homePage";
 	 	$data['sub_sub_act_id']="otherSlider";
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
		//	$this->form_validation->set_rules('banner_image', 'Image', 'required');   
		}
		$data['btnCapt']=$btnCapt;
 		$this->form_validation->set_rules('banner_status', 'Status', 'required'); 
 		$this->form_validation->set_rules('type', 'Location', 'required'); 
 		$this->form_validation->set_rules('order_no', 'Order No', 'required|numeric'); 
 		$this->form_validation->set_rules('banner_text', 'Banner Link', 'required'); 
 
		


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
						if($this->input->post('old_banner_image')!=''){
							@unlink('./uploads/banner/'.$this->input->post('old_banner_image'));
						}

					}else{
						if($this->input->post('old_banner_image')!=''){
							$final_img = $this->input->post('old_banner_image');
						}
					}

						
						$value_array = array(
										'banner_image'=>$final_img,
										'banner_status'=>$this->input->post('banner_status'),
										'type'=>$this->input->post('type'),
										'order_no'=>$this->input->post('order_no'),
								 		'banner_text' =>$this->input->post('banner_text')
						);
						if($id>0){
			 				$where_array=array('banner_id'=>$id);
							$this->common->update_entry($tbl,$value_array,$where_array);
							$this->session->set_flashdata('Success','Slider updated successfully.');
							redirect('webmaster/home_content/sliders','refresh');

						}else{
					 		$this->common->add_records($tbl,$value_array);
							$new_registration_id =	$this->db->insert_id();			
							
							$this->session->set_flashdata('Success','Slider added successfully.');  
							redirect('webmaster/home_content/sliders','refresh');
						}
			}else{
				$this->session->set_flashdata('Error',"Please upload valid PNG/JPG/JPEG/GIF extension");
			}
		} 
 		$this->load->view('webmaster/manage_other_slider',$data);
	} 

	function delete_slider(){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("banner_id " => $delid[$i]);
				$this->common->delete_entry("tbl_banners",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/home_content/sliders','refresh');
		}
		redirect('webmaster/home_content/sliders','refresh');
	}
 
	
}?>