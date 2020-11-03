<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Notification extends CI_Controller{
	public function __construct(){
		parent::__construct(); 

		//if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');
        $this->CI =&get_instance();

	}
	//---------------------- Pages ----------------------------------
	function index($id=0){		
	  	
		 
 		$this->load->view("webmaster/template/notification",$data);		
	}
 
}?>
