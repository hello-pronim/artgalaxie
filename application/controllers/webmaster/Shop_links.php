<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class shop_links extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
 	}
	 
	function index(){
		
		$data['act_id']="product_attr";	
		$data['sub_act_id']="shoplinks";
		
	  	$tbl = "`tbl_shop_links`";
		$select ="*";
		$where = array();
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);

		if($num_rec)
		{
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/shop_links_list",$data);			
	}
	
	
	function manage($id=0,$mode='')
	{
	    
	    $data['act_id']="product_attr";	
		$data['sub_act_id']="shoplinks";
	    
	    if(isset($_POST['mode']))
	    {
	        $mode = $_POST['mode'];
	    }
	 
		$data['act_id']="setting";
		$data['id']=$id;
		$tbl = "`tbl_shop_links`";
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
			$data['dataDs']['link_for'] = '';
			$data['dataDs']['link'] = '';
		}
        
        $value_array = array(
							'link_for'=>addslashes($this->security->xss_clean($this->input->post('link_for'))),
							'link'=>addslashes($this->security->xss_clean($this->input->post('link')))
				            );
				
      
		if ($mode=="add")
		{			
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/shop_links/index");
		}

		if ($mode=="update")
		{
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/shop_links/index","refresh");
		}
		
	    $this->load->view("webmaster/manage_shop_links",$data);
	}
	
}
?>