<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Video_production extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');
	}
	//---------------------- Pages ----------------------------------
	function index(){ 
		
        $data['act_id']="allPages";	
        $data['sub_act_id']="services";	
        $data['sub_sub_act_id']="video-production";
        $data['sub_sub_sub_act_id']="manageVideo-production";
    		
		$select ="*";
		$where = array('1' => '1' );
		$tbl="tbl_video_production";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/video-production-list",$data);			
	}

	//==manage box content
 	function manage($id){  

		$data['id'] = $id;
		$data['act_id']="allPages";	
        $data['sub_act_id']="services";	
        $data['sub_sub_act_id']="video-production";
        $data['sub_sub_sub_act_id']="manageVideo-production";


		$tbl = 'tbl_video_production';
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		$this->form_validation->set_rules('title', 'Title', 'required'); 
	 	if($this->form_validation->run())
		{	

		if(!is_dir('./uploads/video-production/')){
				mkdir('./uploads/video-production/');

			}
			 
			$finalArtMarketing  = '';
	 		if(@$_FILES['desc_image']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['desc_image']['name'] = $file['desc_image']['name'];					
				
				$filename = str_replace(' ','_','video-production')."_".rand(0000,9999);
				$path = $_FILES['desc_image']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalArtMarketing = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/video-production';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['desc_image']['type']=$file['desc_image']['type'];
				$_FILES['desc_image']['tmp_name']=$file['desc_image']['tmp_name'];
				$_FILES['desc_image']['error']=$file['desc_image']['error'];
				$_FILES['desc_image']['size']=$file['desc_image']['size'];
				$this->upload->do_upload('desc_image');
				if($this->input->post('old_desc_image')!=''){
					@unlink('./uploads/video_production/'.$this->input->post('old_desc_image'));
				}
			}else{
				if($this->input->post('old_desc_image')!=''){
					$finalArtMarketing = $this->input->post('old_desc_image');
				}
			}
			$value_array = array(
						'desc_image'=>$finalArtMarketing,
						'title'=>$this->input->post('title'),
						'description' =>$this->input->post('description')
			);
			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Box content updated successfully.');
					redirect('webmaster/video_production','refresh');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Box content added successfully.');  
					redirect('webmaster/video_production','refresh');

			}
		}
		$where2 =  array('1' => '1');
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where2);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray('*',$tbl,$where2);
		}
		$this->load->view('webmaster/video-production-list',$data);
	}

 }	 
  ?>