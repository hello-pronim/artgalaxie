<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newsletters extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');


	}
	//---------------------- Pages ----------------------------------
	/*function subscriber(){		
		$data['act_id']="newsletters";	
	 	
		$select ="*";
		$where = array('1' => '1' );
		$tbl="tbl_newsletter";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/newsletterList",$data);			
	}*/
	
	function subscriber($id=0){		
		
		$data['act_id']="newsletters";
		$data['sub_act_id'] = 'newslettersList';
		
		$data['id'] = $id;
		
		$tbl="tbl_newsletter_link";
	 	if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		if($id!=0){
			 
			$this->form_validation->set_rules('name', 'message', 'required'); 
		}
		
		if($this->form_validation->run())
		{	
 			$value_array = array(
						'name'=>$this->input->post('name'),
						'newsletter_link'=>$this->input->post('newsletter_link')
			);

			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Newsletter Link updated successfully.');
					redirect('webmaster/newsletters/subscriber');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Newsletter Link added successfully.');  
					redirect('webmaster/newsletters/subscriber');

			}
		}
		
		$select ="*";
		$where = array('1' => '1' );
		
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/newsletterLink",$data);			
	}
 	 
  
 }	 
  ?>