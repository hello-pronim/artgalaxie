<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tutorials extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');


	}
	//---------------------- Pages ----------------------------------
	function index(){	

		$data['act_id']="tuto";	
		$data['sub_act_id']="tutorialsmanage";
		
	  	$select ="*";
		$where =    array('1' => 1 );
		$tbl="tbl_tutorials";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/tutorialslist",$data);			
	}
 	 
 	function manage($id=0){
 		$data['act_id']="tuto";	
		$data['sub_act_id']="tutorialsmanage";	
	 
 

		$data['tutButton'] = $this->common->getAllRowArray('*','tbl_tutorials_categories',array('1' => 1 ));
		$data['artCats'] = $this->common->getAllRowArray('*','tbl_galleries',array('1' => 1 ));
		if($id>0){
			$data['tutorialsImagesDs'] = $this->common->getAllRowArray('*','tbl_tutorials_images',array('tut_id' => $id ));
		}else{
			$data['tutorialsImagesDs'] = "";
		}
		

 	 	$data['id']=$id;
 	 	$tbl = 'tbl_tutorials';
		
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
 		$this->form_validation->set_rules('title', 'Title', 'trim|required'); 
		$this->form_validation->set_rules('description', 'Tutorials Description', 'trim|required');
		$this->form_validation->set_rules('duration_hour', 'Duration hour', 'trim|numeric|max_length[12]'); 
		$this->form_validation->set_rules('duration_min', 'Duration min', 'trim|numeric|max_length[12]'); 
		$this->form_validation->set_rules('duration_sec', 'Duration sec', 'trim|numeric|max_length[12]'); 
		$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric|max_length[12]');
	//	$this->form_validation->set_rules('buy_button_code', 'Buy Button Code', 'trim|required');
		if($this->form_validation->run())
		{

		 	$tutCat = @implode(',',$this->input->post('tut_cat'));
			$art_cat = @implode(',',$this->input->post('art_cat'));
			$html_code=$this->input->post('buy_button_code');
            $val=htmlentities($html_code);

 			$value_array = array(
								'title'=>$this->input->post('title'),
								'description'=>$this->input->post('description'),
								'duration_hour'=>$this->input->post('duration_hour'),
								'duration_min'=>$this->input->post('duration_min'),
								'duration_sec'=>$this->input->post('duration_sec'),
								'price'=>$this->input->post('price'),
								'tut_cat'=>$tutCat,
								'art_cat'=>$art_cat,
								//'buy_button_code'=>$this->input->post('buy_button_code')
								'buy_button_code'=>$val
			); 
			//print_r($value_array);die;
		  	if($id>0){
		  		$tutorialId = $id;
				$where_array=array('id'=>$id);
				$this->common->update_entry($tbl,$value_array,$where_array);
				$this->session->set_flashdata('Success','Tutorials updated successfully .');
			}else{
				$this->common->add_records($tbl,$value_array);
			 	$this->session->set_flashdata('Success','Tutorials added successfully .');
			 	$tutorialId = $this->db->insert_id();
			}

			if (sizeof($_FILES['tutorials_images']['name'])>0){
				 
				$tutorialsImages = $_FILES['tutorials_images']['name'];
				$this->load->library('upload');
				for($i=0; $i< count($tutorialsImages); $i++){
					 		 
						$up_data_image = '';
						if ($tutorialsImages[$i]!=""){
					 
							$extension=strstr($_FILES['tutorials_images']['name'][$i],".");
							$up_file_3=time()."-".$_FILES['tutorials_images']['name'][$i];
							copy($_FILES['tutorials_images']['tmp_name'][$i],"uploads/tutorials/".$up_file_3);
							$dataNewp['tut_id'] = $tutorialId;
							$dataNewp['tut_image'] = $up_file_3;
							$this->common->add_records('tbl_tutorials_images',$dataNewp);
						}
					}
			} 
		 redirect('webmaster/tutorials/index','refresh');
		} 
		$this->load->view("webmaster/manage_tutorials",$data);
 	}
 

   

	function categories($id=0){
		$data['act_id']="tuto";	
		$data['sub_act_id']="tuto_cat";	
		 
		$data['id'] = $id;
 
		$tbl = 'tbl_tutorials_categories';
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		if($id!=0){
			$this->form_validation->set_rules('cat_name', 'Title', 'required'); 
		}
 		if($this->form_validation->run())
		{	


			if(!is_dir('./uploads/tutorials/')){
				mkdir('./uploads/tutorials/');

			}
			 
		 
	 		$finalServices_img  = '';
	 		if(@$_FILES['cat_image']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['cat_image']['name'] = $file['cat_image']['name'];					
				
				$filename = str_replace(' ','_','tutorials-image')."_".rand(0000,9999);
				$path = $_FILES['cat_image']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalServices_img = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/tutorials';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['cat_image']['type']=$file['cat_image']['type'];
				$_FILES['cat_image']['tmp_name']=$file['cat_image']['tmp_name'];
				$_FILES['cat_image']['error']=$file['cat_image']['error'];
				$_FILES['cat_image']['size']=$file['cat_image']['size'];
				$this->upload->do_upload('cat_image');
				if($this->input->post('old_cat_image')!=''){
					@unlink('./uploads/tutorials/'.$this->input->post('old_cat_image'));
				}

			}else{
				if($this->input->post('old_cat_image')!=''){
					$finalServices_img = $this->input->post('old_cat_image');
				}
			}

			$value_array = array(
						'cat_name'=>$this->input->post('cat_name'),
						'cat_image' =>$finalServices_img
			);

			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Buttons updated successfully.');
					redirect('webmaster/tutorials/categories');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Buttons added successfully.');  
					redirect('webmaster/tutorials/categories');

			}
		}
		$where2 =  array('1' => 1 );
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where2);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray('*',$tbl,$where2);
		}
 		$this->load->view("webmaster/tutorial_categories",$data);		

	}

	function art_categories($id=0){

		$data['act_id']="tuto";	
		$data['sub_act_id']="art_categories";	
	    $data['id'] = $id;

		$tbl = 'tbl_galleries';
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('cat_id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		 
 		if($this->input->post('mode')==1)
		{	


			$finalServices_img  = '';
	 		if(@$_FILES['tutorials_images']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['tutorials_images']['name'] = $file['tutorials_images']['name'];					
				
				$filename = str_replace(' ','_','cat-tutorials-image')."_".rand(0000,9999);
				$path = $_FILES['tutorials_images']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalServices_img = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/tutorials';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['tutorials_images']['type']=$file['tutorials_images']['type'];
				$_FILES['tutorials_images']['tmp_name']=$file['tutorials_images']['tmp_name'];
				$_FILES['tutorials_images']['error']=$file['tutorials_images']['error'];
				$_FILES['tutorials_images']['size']=$file['tutorials_images']['size'];
				$this->upload->do_upload('tutorials_images');
				if($this->input->post('old_tutorials_images')!=''){
					@unlink('./uploads/tutorials/'.$this->input->post('old_tutorials_images'));
				}

			}else{
				if($this->input->post('old_tutorials_images')!=''){
					$finalServices_img = $this->input->post('old_tutorials_images');
				}
			}

			$value_array = array(
					 'tutorials_images'=>$finalServices_img
			);

			if($id>0){
					$where_array=array('cat_id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Categories updated successfully.');
					redirect('webmaster/tutorials/art_categories');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					$this->session->set_flashdata('Success','Categories added successfully.');  
					redirect('webmaster/tutorials/art_categories');

			}
		}
		$where2 =  array('1' => 1);
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where2);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray('*',$tbl,$where2);
		}
 		$this->load->view("webmaster/tutorial_art_categories",$data);		

	}


	function delete_tutorials(){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));

				$ifExists = $this->common->getnumRow('tbl_tutorials_images', array("tut_id" => $delid[$i]));
				if(	$ifExists > 0){
					$dataDs = $this->common->getAllRowArray('*','tbl_tutorials_images', array("tut_id" => $delid[$i]));
					foreach ($dataDs as $dataRs) {
						@unlink('./uploads/tutorials/'.$dataRs['tut_image']);
						$this->common->delete_entry("tbl_tutorials_images",array("id" => $dataRs['id']));
					}
				}

				$where= array("id " => $delid[$i]);
				$this->common->delete_entry("tbl_tutorials",$where);
				 
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/tutorials/index','refresh');
		}
		redirect('webmaster/tutorials/index','refresh');
	}

	function removeImage(){
		if(extract($_POST)){
			$imgId = $this->input->post('id');
			$ifExists = $this->common->getnumRow('tbl_tutorials_images', array("id" => $imgId));
				if(	$ifExists > 0){
					$dataDs = $this->common->getOneRowArray('*','tbl_tutorials_images', array("id" => $imgId));
					@unlink('./uploads/tutorials/'.$dataDs['tut_image']);
					$this->common->delete_entry("tbl_tutorials_images",array("id" => $dataDs['id']));
					 echo "done";
				}else echo "error";
		}

	}
}?>