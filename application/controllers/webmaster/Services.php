<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Services extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');


	}
	//---------------------- Pages ----------------------------------
	function index(){		
		$data['act_id']="CMS";
		$data['sub_act_id']="";
		$data['sub_sub_act_id']='services';
		$select ="*";
		$where =  array('1' => 1);
		$tbl="tbl_services";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/serviceslist",$data);			
	}
 	
 	function manage_services($id=0){
 		 
 	 	 
 	 	$data['act_id']='CMS';
 	 	$data['sub_sub_act_id']='services';
 	 	$data['id']=$id;
 	 	$tbl = 'tbl_services';
		
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
		$this->form_validation->set_rules('short_description', 'Description', 'trim|required');
	 	if($this->form_validation->run())
		{


			if(!is_dir('./uploads/services/')){
				mkdir('./uploads/services/');
			}

			$final_img  = '';
	 		if($_FILES['services_images']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['services_images']['name'] = $file['services_images']['name'];					
				
				$filename = str_replace(' ','_','services')."_".uniqid();
				$path = $_FILES['services_images']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$final_img = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/services';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['services_images']['type']=$file['services_images']['type'];
				$_FILES['services_images']['tmp_name']=$file['services_images']['tmp_name'];
				$_FILES['services_images']['error']=$file['services_images']['error'];
				$_FILES['services_images']['size']=$file['services_images']['size'];
				$this->upload->do_upload('services_images');
				if($this->input->post('old_services_images')!=''){
					@unlink('./uploads/services/'.$this->input->post('old_services_images'));
				}

			}else{
				if($this->input->post('old_services_images')!=''){
					$final_img = $this->input->post('old_services_images');
				}
			}

				 
		 
			$value_array = array(
								'title'=>$this->input->post('title'),
								'short_description'=>$this->input->post('short_description'),
								'services_images'=>$final_img
								);
		 


			if($id>0){
				$where_array=array('id'=>$id);
				$this->common->update_entry($tbl,$value_array,$where_array);
				$this->session->set_flashdata('Success','Services updated successfully .');
				redirect('webmaster/services/index','refresh');
			}else{
				$this->common->add_records($tbl,$value_array);
			 	$this->session->set_flashdata('Success','Services added successfully .');
				redirect('webmaster/services/index','refresh');
			}
		} 
 		$this->load->view('webmaster/manage_services',$data);
	}
 
}?>