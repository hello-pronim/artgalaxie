<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manage_logo extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ADMIN_ID')==''){
			redirect('webmaster/login','refresh');
		}
	}

	function index($msg=0){
		$data['act_id']="setting";
		$data['sub_act_id'] = 'ManageLogo';
		
	 	$data['msg']=$msg;
 		 
		$this->db->select('website_logo');
		$this->db->from('tbl_admin');
		$this->db->where('id','1');
		$query =   $this->db->get();
		$data['dataRs'] = $ret = $query->row_array();

		if($this->input->post('mode')=="update")
		{
			$logo_path = '';
			if(isset($_FILES['logo_path']['name']) && $_FILES['logo_path']['name']!='' )
			{
				$timeval = time();
				$extension= pathinfo($_FILES['logo_path']['name'], PATHINFO_EXTENSION);				
				
				if(!is_dir("uploads/sitelogo/"))
				{
					mkdir('uploads/sitelogo/');						 
				}
				$target_path = "uploads/sitelogo/";	
				
				//$target_path =$target_path .$timeval."_". basename( $_FILES['logo_path']['name']);
				$target_path =$target_path ."logo_".$timeval.".".$extension;
				if(move_uploaded_file($_FILES['logo_path']['tmp_name'], $target_path))
				{
				  $logo_path =basename( $_FILES['logo_path']['name']); 
				} 												
				//$logo_path=$timeval."_".$_FILES['logo_path']['name'];
				$logo_path="logo_".$timeval.".".$extension;

				@unlink('uploads/sitelogo/'.$this->input->post('old_logo'));
			}
			else
			{
				$logo_path=$this->input->post('old_logo');
			}	
			 
			$dataUp = array(
	             'website_logo' =>$logo_path,
 			);
 			$whereUp = array(
	             'id' => '1',
 			);
			$this->db->update('tbl_admin',$dataUp, $whereUp);
			$this->session->set_flashdata('Success','Logo updated successfully!');
   			redirect('webmaster/manage_logo','refresh');
		}
		$this->load->view("webmaster/manage_logo",$data);
	}
}?>