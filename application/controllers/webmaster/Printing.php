<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Printing extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');


	}
	//---------------------- Pages ----------------------------------
	function index($id=0){		
		$data['id'] = $id;
		$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="printing";
		$data['sub_sub_sub_act_id']="manageprinting";
			
		$select ="*";
		$where = array('1' => '1' );
		$tbl="tbl_printing_categories";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}


		  
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('cat_id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		$this->form_validation->set_rules('cat_name', 'Title', 'required'); 
	 	if($this->form_validation->run())
		{	
			$value_array = array(
						'cat_name'=>$this->input->post('cat_name')
			);

			if($id>0){
					$where_array=array('cat_id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Printing Material updated successfully.');
					redirect('webmaster/printing/index','refresh');

			}else{
					$this->common->add_records($tbl,$value_array);
					$this->session->set_flashdata('Success','Printing Material  added successfully.');  
					redirect('webmaster/printing/index','refresh');

			}
		}
	 	$this->load->view("webmaster/printing",$data);			
	}
 	
 	function manage_other_printing($cat_id=0,$id=0)
 	{
 		 
 	    $data['id'] = $id;
		$data['act_id']="allPages";	
		$data['sub_act_id']="printing";	
		$data['sub_sub_act_id']="manageprinting";
		
 	 	$data['id']=$id;
 	 	$data['cat_id']=$cat_id;	
 	 	$tbl = 'tbl_printing_master';
		
		if($id>0)
		{  
			$btnCapt="Update"; 
			$where = array('id' => $id);
			$data['dataDs'] = $dataDs = $this->common->getOneRowArray( '*', $tbl, $where );   
		}else{
			$btnCapt = "Add"; 
			$data['dataDs'] = ''; 
		}
		$data['btnCapt']=$btnCapt;
		 
		 
		$this->form_validation->set_rules('description', 'Description', 'trim|required'); 
 	  	if($this->form_validation->run())
		{
			if(!is_dir('./uploads/printing/')){
				mkdir('./uploads/printing/');
			}
			//art marketing icone image
			$printingImg  = '';
	 		if(@$_FILES['image1']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['image1']['name'] = $file['image1']['name'];					
				
				$filename = str_replace(' ','_','printing')."_".rand(0000,9999);
				$path = $_FILES['image1']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$printingImg = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/printing';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['image1']['type']=$file['image1']['type'];
				$_FILES['image1']['tmp_name']=$file['image1']['tmp_name'];
				$_FILES['image1']['error']=$file['image1']['error'];
				$_FILES['image1']['size']=$file['image1']['size'];
				$this->upload->do_upload('image1');
				if($this->input->post('old_image1')!=''){
					@unlink('./uploads/printing/'.$this->input->post('old_image1'));
				}
			}else{
				if($this->input->post('old_image1')!=''){
					$printingImg = $this->input->post('old_image1');
				}
			}

			 
			$printingImage2  = '';
	 		if(@$_FILES['image2']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['image2']['name'] = $file['image2']['name'];					
				
				$filename = str_replace(' ','_','printing')."_".rand(0000,9999);
				$path = $_FILES['image2']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$printingImage2 = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/printing';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['image2']['type']=$file['image2']['type'];
				$_FILES['image2']['tmp_name']=$file['image2']['tmp_name'];
				$_FILES['image2']['error']=$file['image2']['error'];
				$_FILES['image2']['size']=$file['image2']['size'];
				$this->upload->do_upload('image2');
				if($this->input->post('old_image2')!=''){
					@unlink('./uploads/printing/'.$this->input->post('old_image2'));
				}

			}else{
				if($this->input->post('old_image2')!=''){
					$printingImage2 = $this->input->post('old_image2');
				}
			}
			$value_array = array(
				'title'=>$this->input->post('title'),
				'description'=>$this->input->post('description'),
				'cat_id'=>$cat_id,
				'image2'=>$printingImage2,
				'image1'=>$printingImg
			);
			 
		 	if($id>0){
				$where_array=array('id'=>$id);
				$this->common->update_entry($tbl,$value_array,$where_array);
				$this->session->set_flashdata('Success','Printing updated successfully .'); 
				redirect('webmaster/printing/manage_other_printing/'.$cat_id,'refresh');
			}else{
				$this->common->add_records($tbl,$value_array);
			 	$this->session->set_flashdata('Success','Printing added successfully.');
				redirect('webmaster/printing/manage_other_printing/'.$cat_id,'refresh');
				 
			}
		} 


		$select ="*";
		$where = array('cat_id' => $cat_id);
		$tbl="tbl_printing_master";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs1'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
 		$this->load->view('webmaster/manage_printing',$data);
	}

 }	 
  ?>