<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Manage_upload_standards extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
 	}
	 
	function index(){
		$data['act_id']="setting";
	  	$tbl = "`tbl_upload_standards`";
		$select ="*";
		$where = array();
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);

		if($num_rec)
		{
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/upload_standards_list",$data);			
	}
	
	
	function manage($id=0,$mode='')
	{
	    if(isset($_POST['mode']))
	    {
	        $mode = $_POST['mode'];
	    }
	 
		$data['act_id']="setting";
		$data['id']=$id;
		$tbl = "`tbl_upload_standards`";
		$where =  array('id'=>$id);
	 	
	 	if($id>0)
	 	{
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id);
			$data['dataDs'] = $this->common->getOneRowArray($select, $tbl, $where);
		}
		else
		{
			$data['btnCapt'] = "add";
			$data['dataDs']['title'] = '';
			$data['dataDs']['description'] = '';
		}
        
        $value_array = array(
							'title'=>addslashes($this->security->xss_clean($this->input->post('title'))),
							'description'=>addslashes($this->security->xss_clean($this->input->post('description')))
				            );
				
      
		if ($mode=="add")
		{			
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/upload_standards/index");
		}

		if ($mode=="update")
		{
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/upload_standards/index","refresh");
		}
		
	    $this->load->view("webmaster/manage_upload_standards",$data);
	}
	
}
?>