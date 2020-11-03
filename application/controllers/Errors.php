<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
    }
	
	public function index(){
		$data['heading'] = "404";
		$data['message'] = "Page Not Found!";

		$this->load->view('errors/error_404',$data);
	}
	function page_missing(){
		$data['heading'] = "404 Not Found!";
		$data['message'] = "Page Not Found!";

		$this->load->view('errors/error_404',$data);
	}
}?>
