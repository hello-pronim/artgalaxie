<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Art_marketing extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');


	}
	//---------------------- Pages ----------------------------------
	function index(){		
	
		$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="art_marketing";
		$data['sub_sub_sub_act_id']="manageArtMarketing";
		
    		
		$select ="*";
		$where = array('parent_id' => '0' );
		$tbl="tbl_art_marketing";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		//$orderby="numbering";
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/art_marketing",$data);			
	}
 	
 	function manage_art_marketing($id=0,$parent_id=0){
 		 
 	 	 
 	    $data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="art_marketing";
		$data['sub_sub_sub_act_id']="manageArtMarketing";
			

 	 	$data['id']=$id;
 	 	$data['parent_id']=$parent_id;	
 	 	$tbl = 'tbl_art_marketing';
		
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
		if($parent_id==0){
			$this->form_validation->set_rules('page_title', 'Page Title', 'trim|required'); 
		}
 		
 		$this->form_validation->set_rules('sub_title', 'Sub Title', 'trim|required'); 
 		//$this->form_validation->set_rules('sub_sub_titile', 'Sub sub Title', 'trim|required'); 
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
	 	if($this->form_validation->run())
		{
			if(!is_dir('./uploads/art_marketing/')){
				mkdir('./uploads/art_marketing/');
			}
			//art marketing icone image
			$finalArtMarketing  = '';
	 		if(@$_FILES['icone_image']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['icone_image']['name'] = $file['icone_image']['name'];					
				
				$filename = str_replace(' ','_','art-marketing-image')."_".rand(0000,9999);
				$path = $_FILES['icone_image']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalArtMarketing = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/art_marketing';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['icone_image']['type']=$file['icone_image']['type'];
				$_FILES['icone_image']['tmp_name']=$file['icone_image']['tmp_name'];
				$_FILES['icone_image']['error']=$file['icone_image']['error'];
				$_FILES['icone_image']['size']=$file['icone_image']['size'];
				$this->upload->do_upload('icone_image');
				if($this->input->post('old_icone_image')!=''){
					@unlink('./uploads/art_marketing/'.$this->input->post('old_icone_image'));
				}
			}else{
				if($this->input->post('old_icone_image')!=''){
					$finalArtMarketing = $this->input->post('old_icone_image');
				}
			}

			//Services page image icon
			$finalBannerImage  = '';
	 		if($_FILES['banner_image']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['banner_image']['name'] = $file['banner_image']['name'];					
				
				$filename = str_replace(' ','_','art-marketing-banner')."_".rand(0000,9999);
				$path = $_FILES['banner_image']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalBannerImage = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/art_marketing';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['banner_image']['type']=$file['banner_image']['type'];
				$_FILES['banner_image']['tmp_name']=$file['banner_image']['tmp_name'];
				$_FILES['banner_image']['error']=$file['banner_image']['error'];
				$_FILES['banner_image']['size']=$file['banner_image']['size'];
				$this->upload->do_upload('banner_image');
				if($this->input->post('old_banner_image')!=''){
					@unlink('./uploads/art_marketing/'.$this->input->post('old_banner_image'));
				}

			}else{
				if($this->input->post('old_banner_image')!=''){
					$finalBannerImage = $this->input->post('old_banner_image');
				}
			}
			$value_array = array(
				'page_title'=>$this->input->post('page_title'),
				'description'=>$this->input->post('description'),
				'sub_title'=>$this->input->post('sub_title'),
				'sub_sub_titile'=>$this->input->post('sub_sub_titile'),
				'banner_image'=>$finalBannerImage,
				'icone_image'=>$finalArtMarketing
			);
			 
		 	if($id>0){
				$where_array=array('id'=>$id);
				$this->common->update_entry($tbl,$value_array,$where_array);
				$this->session->set_flashdata('Success','Art Marketing updated successfully .'); 
				if($parent_id==0){
					redirect('webmaster/art_marketing/index');
				}else{
					redirect('webmaster/art_marketing/marketing_othersections/'.$parent_id,'refresh');
				}
			}else{
				$this->common->add_records($tbl,$value_array);
			 	$this->session->set_flashdata('Success','Art Marketing  added successfully .');
				if($parent_id==0){
					redirect('webmaster/art_marketing/index');
				}else{
					redirect('webmaster/art_marketing/marketing_othersections/'.$parent_id,'refresh');
				}
			}
		} 
 		$this->load->view('webmaster/manage_art_marketing',$data);
	}
 
 	//==manage other sections for marketing
 	function marketing_othersections($parent_id){
 		$data['parent_id'] = $parent_id;
 		$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="art_marketing";
		$data['sub_sub_sub_act_id']="manageArtMarketing";
			
		$select ="*";
		$where = array('parent_id' => $parent_id );
		$tbl="tbl_art_marketing";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
		    /*if($parent_id == 2) {
		        $orby = 'asc';
		    } else {
		        $orby = 'desc';
		    }*/
			//$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where,'sub_title',$orby);
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where,'sorting', 'ASC' );
			$data['parentDs'] = $this->common->getOneRowArray($select,$tbl,$where);
			$this->load->view("webmaster/art_marketing",$data);			
		}else{
			redirect('webmaster/art_marketing');
		}
	}
	//==manage other sections for marketing	

	//==manage box content
 	function box_content($parent_id, $id=0){  

		$data['id'] = $id;
		$data['parent_id'] = $parent_id;
 		$data['act_id']="allPages";	
		$data['sub_act_id']="services";	
		$data['sub_sub_act_id']="art_marketing";
		$data['sub_sub_sub_act_id']="manageArtMarketing";
			


		$tbl = 'tbl_art_marketing_boxes';
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

		//if($this->input->post('mode')==1){

			if(!is_dir('./uploads/art_marketing/')){
				mkdir('./uploads/art_marketing/');

			}
			 
			$finalArtMarketing  = '';
	 		if(@$_FILES['box_image']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['box_image']['name'] = $file['box_image']['name'];					
				
				$filename = str_replace(' ','_','art-marketing-image')."_".rand(0000,9999);
				$path = $_FILES['box_image']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalArtMarketing = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/art_marketing';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['box_image']['type']=$file['box_image']['type'];
				$_FILES['box_image']['tmp_name']=$file['box_image']['tmp_name'];
				$_FILES['box_image']['error']=$file['box_image']['error'];
				$_FILES['box_image']['size']=$file['box_image']['size'];
				$this->upload->do_upload('box_image');
				if($this->input->post('old_box_image')!=''){
					@unlink('./uploads/art_marketing/'.$this->input->post('old_box_image'));
				}
			}else{
				if($this->input->post('old_box_image')!=''){
					$finalArtMarketing = $this->input->post('old_box_image');
				}
			}

			$value_array = array(
						'art_id' =>$parent_id,
						'box_image'=>$finalArtMarketing,
						 
						'title'=>$this->input->post('title'),
						'description' =>$this->input->post('description')
			);

			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Box content updated successfully.');
					redirect('webmaster/art_marketing/box_content/'.$parent_id,'refresh');

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Box content added successfully.');  
					redirect('webmaster/art_marketing/box_content/'.$parent_id,'refresh');

			}
		}
		$where2 =  array('art_id' =>$parent_id );
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where2);
		if($num_rec){
		    $orderby = 'numbering';
			$data['dataDs'] = $this->common->getAllRowArray('*',$tbl,$where2,$orderby,'asc');
		}
		$data['parentDs'] = $this->common->getOneRowArray('*','tbl_art_marketing',array('id' =>$parent_id ));


	
 		$this->load->view('webmaster/box_content_art_marketing',$data);
	}

 }	 
  ?>