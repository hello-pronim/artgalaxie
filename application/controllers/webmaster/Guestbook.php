<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Guestbook extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');
        $this->CI =&get_instance();

	}
	//---------------------- Pages ----------------------------------
	function index($id=0){		
	  	
	  	$data['act_id']="guestbook";
		$data['sub_act_id'] = 'guestbookList';
		
		$data['id'] = $id;

		$tbl = 'tbl_guestbook';
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		if($id!=0){
			 
			$this->form_validation->set_rules('short_description', 'message', 'required'); 
		}
 		if($this->form_validation->run())
		{	
 			$value_array = array(
						'short_description'=>$this->input->post('short_description'),
						'is_approved'=>$this->input->post('is_approved'),
						'notification' =>'1'
			);

			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Guestbook updated successfully.');
					redirect('webmaster/guestbook/index');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Guestbook added successfully.');  
					redirect('webmaster/guestbook/index');

			}
		}
		 
	    $data['dataDs'] = $this->common->getGuestBook();
		 
 		$this->load->view("webmaster/guestbook",$data);		
	}
	
	function notification_guestbook()
	{
		$data['act_id']="";
		$select ="*";
		$where = array('1' => '1','notification' => '0' );
		$tbl="tbl_guestbook";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$query = $this->CI->db->query("Select gb.*, user.first_name, user.last_name, user.user_type from tbl_user_master as user, tbl_guestbook as gb where notification = '0' AND gb.added_by = user.id order by id desc");
			$data['dataDs'] = $query->result_array();
		}

		$value_array = array(
				'notification' =>'1'
			);

		$this->common->update_entry($tbl,$value_array,$where);
		//$data['dataDs'] = $this->common->getGuestBook();
		$this->load->view("webmaster/guestbook",$data);
	}
	
	public function delete_guestbook()
	{
		if($this->input->post('action')=="delete")
		{
			for($i=0;$i<count($this->input->post('cb'));$i++)
			{
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id" => $delid[$i]);
				$this->common->delete_entry("tbl_guestbook",array('id' => $delid[$i]));
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/guestbook','refresh');
		}
		redirect('webmaster/guestbook','refresh');
	}
 
 
}?>