<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index(){
		if($this->session->userdata('ADMIN_ID')!=''){
			redirect('webmaster/dashboard','refresh');
		}
		$data['act_id']='Login';
		$data['msg']='';	print_r($this->session->userdata('ADMIN_ID'));
		$arr=array('ADMIN_ID'=>'','isADMINLogin'=>'','ADMIN_USER'=>'');
		$this->session->unset_userdata($arr);
		$data['site_Logo'] = $this->common->getSiteLogo();
		if($this->input->post('posted')==1){
			$username= $this->input->post('username');
			$pass= $this->input->post('password');
			$usrWhr="where username='".$username."' AND password='".$pass."' "; //AND is_merchant =0 //(or email ='".$username."' )
			
			$this->db->select('id,username');
			$this->db->from('tbl_admin');
			$this->db->where('username',$username);
			$this->db->where('password',$pass);
			$query = $this->db->get();
			
			if ($query->num_rows() > 0){
				$admin_data = $query->row_array();
				
				$admin_data_arr = array('ADMIN_ID' => $admin_data['id'] , 'ADMIN_USER'=>$admin_data['username'] , 'isADMINLogin'=>'true' );
				$this->session->set_userdata($admin_data_arr);
				redirect('webmaster/dashboard');
			}else{
				$this->session->set_flashdata('Error','Invalid username/Password');
			}
		}
		$this->load->view('webmaster/login',$data);
	}
	
	function logoff(){
		$newdata = array(
			'ADMIN_ID'  => '',
			'ADMIN_USER' => '',
			'isADMINLogin' => FALSE,
			);
		$this->session->set_userdata($newdata);
		redirect('webmaster/login','refresh');
	}
}?>
