<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Services_page extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');


	}
	//---------------------- Pages ----------------------------------
	function index(){
		
		$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="services";
		$data['sub_sub_sub_act_id']="manageServices";
    		
		$select ="*";
		$where =    array('pid' => 0 );
		$tbl="tbl_services_pages";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/servicespagelist",$data);			
	}
 	
 	function manage_services($id=0){
 		 
 	 	 
 	 $data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="services";
		$data['sub_sub_sub_act_id']="manageServices";	

 	 	$data['id']=$id;
 	 	$tbl = 'tbl_services_pages';
		
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
 		$this->form_validation->set_rules('title', 'Name', 'trim|required'); 
		$this->form_validation->set_rules('services_short_description', 'Services Page Description', 'trim|required');
	 	if($this->form_validation->run())
		{

			//Services page image
			$finalServices_img  = '';
	 		if($_FILES['services_page_images']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['services_page_images']['name'] = $file['services_page_images']['name'];					
				
				$filename = str_replace(' ','_','services-page-image')."_".rand(0000,9999);
				$path = $_FILES['services_page_images']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalServices_img = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/services';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['services_page_images']['type']=$file['services_page_images']['type'];
				$_FILES['services_page_images']['tmp_name']=$file['services_page_images']['tmp_name'];
				$_FILES['services_page_images']['error']=$file['services_page_images']['error'];
				$_FILES['services_page_images']['size']=$file['services_page_images']['size'];
				$this->upload->do_upload('services_page_images');
				if($this->input->post('old_services_page_images')!=''){
					@unlink('./uploads/services/'.$this->input->post('old_services_page_images'));
				}

			}else{
				if($this->input->post('old_services_page_images')!=''){
					$finalServices_img = $this->input->post('old_services_page_images');
				}
			}

			//Services page image icon
			$finalServicesicone  = '';
	 		if($_FILES['services_icone_images']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['services_icone_images']['name'] = $file['services_icone_images']['name'];					
				
				$filename = str_replace(' ','_','services-page-image-icone')."_".rand(0000,9999);
				$path = $_FILES['services_icone_images']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalServicesicone = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/services';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['services_icone_images']['type']=$file['services_icone_images']['type'];
				$_FILES['services_icone_images']['tmp_name']=$file['services_icone_images']['tmp_name'];
				$_FILES['services_icone_images']['error']=$file['services_icone_images']['error'];
				$_FILES['services_icone_images']['size']=$file['services_icone_images']['size'];
				$this->upload->do_upload('services_icone_images');
				if($this->input->post('old_services_icone_images')!=''){
					@unlink('./uploads/services/'.$this->input->post('old_services_icone_images'));
				}

			}else{
				if($this->input->post('old_services_icone_images')!=''){
					$finalServicesicone = $this->input->post('old_services_icone_images');
				}
			}
			$value_array = array(
								'title'=>$this->input->post('title'),
								'services_short_description'=>$this->input->post('services_short_description'),
								'services_page_images'=>$finalServices_img,
								'services_icone_images'=>$finalServicesicone
							);
		 


			if($id>0){
				$where_array=array('id'=>$id);
				$this->common->update_entry($tbl,$value_array,$where_array);
				$this->session->set_flashdata('Success','Services updated successfully .');
				redirect('webmaster/services_page/index','refresh');
			}else{
				$this->common->add_records($tbl,$value_array);
			 	$this->session->set_flashdata('Success','Services added successfully .');
				redirect('webmaster/services_page/index','refresh');
			}
		} 
 		$this->load->view('webmaster/manage_services_page',$data);
	}
 
 //====Art design-services
	function design($id=0){

		$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="design";
		$data['sub_sub_sub_act_id']="manageDesignSerices";
		$data['id'] = $id;

		$tbl = 'tbl_services_pages';
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		if($id!=0){
			$this->form_validation->set_rules('title', 'Title', 'required'); 
			$this->form_validation->set_rules('services_short_description', 'Description', 'required'); 
			$this->form_validation->set_rules('services_icone_images', 'Shor Description', 'required'); 
			 
			
		}
 		if($this->form_validation->run())
		{	


			if(!is_dir('./uploads/services/')){
				mkdir('./uploads/services/');

			}
			 
		 
	 		$finalServices_img  = '';
	 		if(@$_FILES['services_page_images']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['services_page_images']['name'] = $file['services_page_images']['name'];					
				
				$filename = str_replace(' ','_','services-page-image')."_".rand(0000,9999);
				$path = $_FILES['services_page_images']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalServices_img = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/services';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['services_page_images']['type']=$file['services_page_images']['type'];
				$_FILES['services_page_images']['tmp_name']=$file['services_page_images']['tmp_name'];
				$_FILES['services_page_images']['error']=$file['services_page_images']['error'];
				$_FILES['services_page_images']['size']=$file['services_page_images']['size'];
				$this->upload->do_upload('services_page_images');
				if($this->input->post('old_services_page_images')!=''){
					@unlink('./uploads/services/'.$this->input->post('old_services_page_images'));
				}

			}else{
				if($this->input->post('old_services_page_images')!=''){
					$finalServices_img = $this->input->post('old_services_page_images');
				}
			}

			$value_array = array(
						'title'=>$this->input->post('title'),
						'services_short_description' =>$this->input->post('services_short_description'),
						'services_icone_images'=>$this->input->post('services_icone_images'),
						'services_page_images' =>$finalServices_img
			);
			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Services content updated successfully.');
					redirect('webmaster/services_page/design');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Services content added successfully.');  
					redirect('webmaster/services_page/design');

			}
		}
		$where2 =  array('pid' =>4 );
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where2);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray('*',$tbl,$where2);
		}
 		$this->load->view("webmaster/design",$data);		

	}

	function art($id=0){

		$data['act_id']="allPages";	
    		$data['sub_act_id']="services";	
    		$data['sub_sub_act_id']="artServices";
    		$data['sub_sub_sub_act_id']="manageArtSerices";	
		$data['id'] = $id;

		$tbl = 'tbl_services_pages';
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		if($id!=0){
			$this->form_validation->set_rules('title', 'Title', 'required'); 
			$this->form_validation->set_rules('services_short_description', 'Description', 'required'); 
			$this->form_validation->set_rules('services_icone_images', 'Shor Description', 'required'); 
			 
			
		}
 		if($this->form_validation->run())
		{	

            if(!is_dir('./uploads/art/')){
				mkdir('./uploads/art/');

			}
			 
		 
	 		$finalServices_img  = '';
	 		if(@$_FILES['services_page_images']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['services_page_images']['name'] = $file['services_page_images']['name'];					
				
				$filename = str_replace(' ','_','services-page-image')."_".rand(0000,9999);
				$path = $_FILES['services_page_images']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalServices_img = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/art';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['services_page_images']['type']=$file['services_page_images']['type'];
				$_FILES['services_page_images']['tmp_name']=$file['services_page_images']['tmp_name'];
				$_FILES['services_page_images']['error']=$file['services_page_images']['error'];
				$_FILES['services_page_images']['size']=$file['services_page_images']['size'];
				$this->upload->do_upload('services_page_images');
				if($this->input->post('old_services_page_images')!=''){
					@unlink('./uploads/services/'.$this->input->post('old_services_page_images'));
				}

			}else{
				if($this->input->post('old_services_page_images')!=''){
					$finalServices_img = $this->input->post('old_services_page_images');
				}
			}
			
			$value_array = array(
						'title'=>$this->input->post('title'),
						'services_short_description' =>$this->input->post('services_short_description'),
						'services_icone_images'=>$this->input->post('services_icone_images'),
						'services_page_images' =>$finalServices_img
			);

			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Services content updated successfully.');
					redirect('webmaster/services_page/art');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Services content added successfully.');  
					redirect('webmaster/services_page/art');

			}
		}
		$where2 =  array('pid' =>3 );
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where2);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray('*',$tbl,$where2);
		}
 		$this->load->view("webmaster/art",$data);		

	}
}?>