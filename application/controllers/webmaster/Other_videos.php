<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Other_videos extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
	}
	
	//--------------------- Other Video -----------------------------------------
	function other_video_list()
	{ 
		$data['act_id']="allPages";	
		$data['sub_act_id']="video";
		$data['sub_sub_act_id']="othervideo";

		$data['num_rec'] = $num_rec = $this->common->num_other_video();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_others_video();
		}
		
		$this->load->view("webmaster/other_video_list",$data);
	}
	
	function manage_video_link($oth_id=0)
	{
	    
	    
		$data['act_id']="CMS"; 
		$data['oth_id'] = $oth_id;
		$tbl = "tbl_other_videos";
		
		if($oth_id>0)
		{
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $oth_id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['other_video_url'] = '';
		}
        

		if($this->input->post('mode')=="add" || $this->input->post('mode')=="update")
		{
			$value_array = array('other_video_url'=>addslashes($this->security->xss_clean($this->input->post('other_video_url'))));
		}
		if ($this->input->post('mode')=="add")
		{
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/other_videos/other_video_list");
		}

		if ($this->input->post('mode')=="update"){
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/other_videos/other_video_list");
		}
		$this->load->view("webmaster/manage_other_video",$data);
	}
	

	function delete_other_video()
	{
		$data['act_id']="CMS"; 
		$tbl = "tbl_other_videos";

		if($this->security->xss_clean($this->input->post('action')=="delete"))
		{
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++)
			{
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/other_videos/other_video_list");
	}
	
	 
}?>