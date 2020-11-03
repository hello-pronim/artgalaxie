<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Changepassword extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ADMIN_ID')==''){
			redirect('webmaster/login','refresh');
		}
	}
	
	function index(){
		$data['message']="";
		$data['act_id']="setting";
		$data['sub_act_id'] = 'ChangePass';
	 

		if($this->input->post('mode')=="change"){

			$user=$this->input->post('username'); 
			$opwd=$this->input->post('opassword');
			$cpwd=$this->input->post('cpassword');
			$npwd=$this->input->post('npassword');/**/
			if($cpwd!="" && $npwd!=""){
			 if($cpwd==$npwd){
				$where="where id =".$this->session->userdata('ADMIN_ID');
		 
				/*gteOneRow*/
				$this->db->select('password,id,username');
				$this->db->from('tbl_admin');
				$this->db->where('id','1');
				$query =   $this->db->get();
				$rs = $query->row();

				if($rs->password==$opwd){
				 	
					 $dataUp = array(
	             		'password' =>$npwd,
		 			 );
		 		 	 $whereUp = array(
			             'id' => '1',
		 		  	 );
				  	$this->common->update_entry('tbl_admin',$dataUp, $whereUp);
					
					$this->session->set_flashdata('Success','Your password is successfully updated!');
				}else{
					$this->session->set_flashdata('Error','Old Password is Incorrect!');
				}
			 }else{
			 	$this->session->set_flashdata('Error',"New password and confirm password doesn't match!");
			 }	
			}else{
				$this->session->set_flashdata('Error',"Password fields are Empty!");
			}
		}
		$this->load->view("webmaster/changepassword",$data);
	}
}?>