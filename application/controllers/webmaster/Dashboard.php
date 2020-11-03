<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('admin_model', 'admin');
	}

	public function index($msg=''){
		$data['msg']=$msg; $data['act_id'] = '';
		
		$this->load->view('webmaster/dashboard',$data);	
	}
}
