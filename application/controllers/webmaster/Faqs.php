<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class faqs extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
 	}
	 
	function index(){
		
		$data['act_id']="faqs";	
		$data['sub_act_id']="faq";
		
	  	$tbl = "`jam_faq_articles`";
		$select ="*";
		$where = array();
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);

		if($num_rec)
		{
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/faqlist",$data);			
	}
	
	
	function manage($id=0,$mode='')
	{
	    
	    $data['act_id']="faqs";	
		$data['sub_act_id']="faq";
	    
	    if(isset($_POST['mode']))
	    {
	        $mode = $_POST['mode'];
	    }
	 
		$data['act_id']="setting";
		$data['id']=$id;
		$tbl = "`jam_faq_articles`";
		$where =  array('article_id'=>$id);
	 	
	 	if($id>0)
	 	{
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('article_id' => $id);
			$data['dataDs'] = $this->common->getOneRowArray($select, $tbl, $where);
		}
		else
		{
			$data['btnCapt'] = "add";
			$data['dataDs']['content_title'] = '';
			$data['dataDs']['content_body'] = '';
		}
        
        $value_array = array(
							'content_title'=>addslashes($this->security->xss_clean($this->input->post('content_title'))),
							'content_body'=>addslashes($this->security->xss_clean($this->input->post('content_body')))
				            );
		
		if ($mode=="add")
		{			
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/faqs/index");
		}

		if ($mode=="update")
		{
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/faqs/index","refresh");
		}
		
	    $this->load->view("webmaster/manage_faqs",$data);
	}
	
	public function delete(){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("article_id " => $delid[$i]);
                $this->common->delete_entry("jam_faq_articles",array('article_id' => $delid[$i]));
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/faqs');
		}
		redirect('webmaster/faqs');
	}
	

	
}
?>