<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Site_activity extends CI_Controller
{
    	public function __construct()
    	{
    		parent::__construct(); 
    
    		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
    	 	$this->load->model('Admin_model','admin');
            $this->CI =&get_instance();
    
    	}
    	//---------------------- Pages ----------------------------------
    	function index($id=0)
    	{
    	  	$data['act_id']="";
    	  	$data_test['act_master_id']="user_master";
    		$select ="*";
    		$where = array('notification_status' => 'Pending');
    		//$data['num_rec'] = $num_rec = $this->common->num_notification($where);
    		$data['dataDs'] = $this->common->getNotificationList($select);
    		
    		$select_test ="*";
    	    $where_test = array('notification_status' => 'Pending');
    		$order_by = array('id'=>'DESC');
    		$data_test['dataDsn'] = $this->common->getNotificationList($select_test,$where_test,$order_by);
    		
    		$this->load->view("webmaster/site_activity",$data + $data_test);
    		//$this->load->view("webmaster/site_activity",$data);
    			
    	}
    	
    	function update($id=0)
    	{
    	    $data1['act_id'] =  "notification";
    	    $data1['id']     =  $id;
 	 	    $tbl            =  'notifications';
 	 	    
 	 	    $value_array = array(
								'notification_status'=>'Seen'
								); 
		  
			$where_array=array('id'=>$id);
			$this->common->update_entry($tbl,$value_array,$where_array);
			
			redirect('webmaster/site_activity/index','refresh');
				
    	}
    	function delete($id=0)
    	{
	        $data['act_id'] =  "notification";
    	    $data['id']     =  $id;
 	 	    $tbl            =  'notifications';
  	    
			$where= array("id" => $id);
			$this->common->delete_entry($tbl,$where);
		
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/site_activity/index','refresh');
	    
    	}
}
?>