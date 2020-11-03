<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Exhibitions extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');
	}
	//---------------------- Pages ----------------------------------
	function index(){
		$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="exhibitions";
		$data['sub_sub_sub_act_id']="manageExibition";
    		
		$select ="*";
		$where = array('1' => '1' );
		$tbl="tbl_exibition";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/exhibitionList",$data);			
	}

	//==manage box content
 	function manage($id){  

		$data['id'] = $id;
			$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="exhibitions";
		$data['sub_sub_sub_act_id']="manageExibition";


		$tbl = 'tbl_exibition';
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		$this->form_validation->set_rules('title', 'Title', 'required'); 
	 	$this->form_validation->set_rules('description', 'Description', 'required'); 
 		if($this->form_validation->run())
		{	

			$value_array = array(
					 	'title'=>$this->input->post('title'),
						'description' =>$this->input->post('description')
			);

			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Exhibitions content updated successfully.');
					redirect('webmaster/exhibitions');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Exhibitions content added successfully.');  
					redirect('webmaster/exhibitions');

			}
		}
		$where2 =  array('1' => '1');
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where2);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray('*',$tbl,$where2);
		}
		 
		$this->load->view('webmaster/exhibitionList',$data);
	}

	//box content
	function manage_sliders($parent_id, $id=0)
	{  
 		
 		$data['id'] = $id;
		$data['parent_id'] = $parent_id;
	 	$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="exhibitions";
		$data['sub_sub_sub_act_id']="manageExibition";


		$tbl = 'tbl_art_marketing_boxes';
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		if($parent_id==5){
			$this->form_validation->set_rules('title', 'Title', 'required'); 
			$this->form_validation->set_rules('description', 'Description', 'required'); 
			$this->form_validation->set_rules('package_title', 'Package Title', 'required'); 
			$this->form_validation->set_rules('package_description', 'Package Description', 'required'); 
			
		}
		
	    //print_r($_POST);
		//exit;
	
 		if($this->input->post('mode')==1)
		{

			if(!is_dir('./uploads/exhibitions/'))
			{
				mkdir('./uploads/exhibitions/');
			}
			
			$final_img  = '';
		 	if($_FILES['box_image']['name']!='')
		 	{
				$file=$_FILES;	
				$_FILES['box_image']['name'] = $file['box_image']['name'];					
						
				$filename = str_replace(' ','_','exibition-image')."_".uniqid();
				$path = $_FILES['box_image']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
				$final_img = $filename.".".$ext;					
						
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/exhibitions';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
				$this->upload->initialize($config);					
				$_FILES['box_image']['type']=$file['box_image']['type'];
				$_FILES['box_image']['tmp_name']=$file['box_image']['tmp_name'];
				$_FILES['box_image']['error']=$file['box_image']['error'];
				$_FILES['box_image']['size']=$file['box_image']['size'];
				$this->upload->do_upload('box_image');
				if($this->input->post('old_box_image')!='')
				{
				    @unlink('./uploads/exhibitions/'.$this->input->post('old_box_image'));
				}
        	}else{
				if($this->input->post('old_box_image')!='')
				{
					$final_img = $this->input->post('old_box_image');
				}
			}
            
			$value_array = array(
						'exe_filter_id' =>$this->input->post('exe_filter_id'),
						'exibition_id' =>$parent_id,
						'box_image'=>$final_img,
						'title'=>$this->input->post('title'),
						'description' =>$this->input->post('description'),
						'package_title'=>$this->input->post('package_title'),
						'package_description' =>$this->input->post('package_description')
			);

			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Slider content updated successfully.');
					redirect('webmaster/exhibitions/manage_sliders/'.$parent_id,'refresh');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Slider content added successfully.');  
					redirect('webmaster/exhibitions/manage_sliders/'.$parent_id,'refresh');

			}
		}
		$where2 =  array('exibition_id' =>$parent_id /*'art_id' =>0*/ );
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where2);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray('*',$tbl,$where2);
		}
		$data['parentDs'] = $this->common->getOneRowArray('*','tbl_exibition',array('id' =>$parent_id ));


	
 		$this->load->view('webmaster/exibition_slider',$data);
	}
 	
	function delete_sliders(){
	    
	    	$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="exhibitions";
		$data['sub_sub_sub_act_id']="manageExibition";
		
		 
		$tbl = "tbl_art_marketing_boxes";
 		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				@unlink('./uploads/exhibitions/'.$form_data['box_image']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");
		redirect('webmaster/exhibitions');
		}
	//	echo "fail";
		redirect('webmaster/exhibitions');
	}
  }?>