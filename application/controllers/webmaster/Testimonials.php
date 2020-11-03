<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testimonials extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');


	}
	//---------------------- Pages ----------------------------------
	function index(){		
		
		$data['act_id']="testimonials";
		$data['sub_act_id'] = 'testimonialsList';
	 	
		$select ="*";
		$where = array('1' => '1' );
		$tbl="tbl_testimonials";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/testimonialsList",$data);			
	}
	
	function notification_testimonial()// Added by Raju
	{
		$data['act_id']="";
		$select ="*";
		$where = array('1' => '1','notification' => '0' );
		$tbl="tbl_testimonials";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}

		$value_array = array(
				'notification' =>'1'
			);

		$this->common->update_entry($tbl,$value_array,$where);
		$this->load->view("webmaster/testimonialsList",$data);
	}
 	
 	function manage($id=0){
 		 
 	 	 
 	 	$data['act_id']="testimonials";
		$data['sub_act_id'] = 'testimonialsList';
		
	 	$data['id']=$id;
 	 	$tbl = 'tbl_testimonials';
 	 	
 	 	
 	 	$select1 ="id,first_name,last_name,user_type";
		//$where1 = "user_type='artist'";
		$where1 = "id != '0'";
		$data['num_rec'] = $num_rec = $this->common->num_users($where1);
		
		if($num_rec)
		{
			$data['artistDs'] = $this->common->getUserList($select1,$where1);
		}
		
		
		
		if($id>0)
		{  
			$btnCapt="Update"; 
			$where = array('id' => $id);
			$data['dataDs'] = $this->common->getOneRowArray( '*', $tbl, $where );   
			
		}else{
			$btnCapt = "Add"; 
			$data['dataDs'] = ''; 
		}
		$data['btnCapt']=$btnCapt;
		 
		$this->form_validation->set_rules('testo_title', 'Testimonial Title', 'trim|required'); 
	 	$this->form_validation->set_rules('testo_description', 'Testimonial Description', 'trim|required'); 
 		$this->form_validation->set_rules('testo_about', 'Services', 'trim|required'); 
 		$this->form_validation->set_rules('is_approve', 'Approve', 'trim|required'); 
 		$this->form_validation->set_rules('display', 'Display', 'trim|required'); 
 		$this->form_validation->set_rules('artist_id', 'Artist Name', 'trim|required'); 
 			
	 	if($this->form_validation->run())
		{
			if(!is_dir('./uploads/testimonials/')){
				mkdir('./uploads/testimonials/');
			}
			//art marketing icone image
			$final_img  = '';
	 		if(@$_FILES['testo_image']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['testo_image']['name'] = $file['testo_image']['name'];					
				
				$filename = str_replace(' ','_','testimonials')."_".rand(0000,9999);
				$path = $_FILES['testo_image']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$final_img = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/testimonials';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['testo_image']['type']=$file['testo_image']['type'];
				$_FILES['testo_image']['tmp_name']=$file['testo_image']['tmp_name'];
				$_FILES['testo_image']['error']=$file['testo_image']['error'];
				$_FILES['testo_image']['size']=$file['testo_image']['size'];
				$this->upload->do_upload('testo_image');
				$this->common->create_thumb_resize($final_img,'./uploads/testimonials/','306','233','');
				if($this->input->post('old_testo_image')!=''){
					@unlink('./uploads/testimonials/'.$this->input->post('old_testo_image'));
				}
			}else{
				if($this->input->post('old_testo_image')!=''){
					$final_img = $this->input->post('old_testo_image');
				}
			}
 
            $uid = $this->session->userdata('CUST_ID');
            $cdate = date("Y-m-d h:i:s");
           
			$value_array = array(
				'testo_title'=>$this->input->post('testo_title'),
				'testo_description'=>$this->input->post('testo_description'),
				'testo_about'=>$this->input->post('testo_about'),
				'testo_image'=>$final_img,
				'testo_added_date'=>$cdate,
				'testo_added_by'=>$this->input->post('artist_id'),
				'is_approve' =>$this->input->post('is_approve'),
				'display'=>$this->input->post('display'),
				'notification' =>'1'
			);
			 
		 	if($id>0){
				$where_array=array('id'=>$id);
				$this->common->update_entry($tbl,$value_array,$where_array);
				$this->session->set_flashdata('Success','Testimonial updated successfully .'); 
			 	redirect('webmaster/testimonials/index');
			 
			}else{
				$this->common->add_records($tbl,$value_array);
			 	$this->session->set_flashdata('Success','Testimonial added successfully .');
			 	redirect('webmaster/testimonials/index');
			}
		} 
 		$this->load->view('webmaster/manage_testimonial',$data);
	}	
	
	public function delete_testimonial()
	{
		if($this->input->post('action')=="delete")
		{
			for($i=0;$i<count($this->input->post('cb'));$i++)
			{
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id" => $delid[$i]);
				$this->common->delete_entry("tbl_testimonials",array('id' => $delid[$i]));
				//$this->common->delete_entry("tbl_user_master",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/testimonials/index','refresh');
		}
		redirect('webmaster/testimonials/index','refresh');
	}
  
}	 
?>