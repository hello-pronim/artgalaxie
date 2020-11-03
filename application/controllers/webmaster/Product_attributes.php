<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_attributes extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
	}
	//---------------------- Colours ----------------------------------
	function colours_list($msg=0){		
		$data['act_id']="product_attr"; $data['msg']=$msg;

		$tbl="tbl_product_color"; $where = array();	$select = "*";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl, $where);
		if($num_rec){
			$data['list_data'] = $this->common->getAllRowArray($select, $tbl, $where);
		}
		$this->load->view("webmaster/colours_list",$data);			
	}

	function manage_colours($id=0){				
		$data['act_id']="product_attr";	$data['id']= $id;
		$tbl = "tbl_product_color";
	
		if($id>0){
			$data['btnCapt']="update";

			$select = "*"; $where = array('id' => $id);
			$data['form_data']=$form_data= $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt']="add";
			$data['form_data']['title']='';
		}

		//=========== Add ============
		if($this->input->post('mode')=='add'){	
			$in_data['title']= $this->security->xss_clean($this->input->post('title'));
			
			/*
			if ($_FILES['page_image']['name']!=""){
				$extension=strstr($_FILES['page_image']['name'],".");
				$up_file_1=time()."-".$_FILES['page_image']['name'];
				copy($_FILES['page_image']['tmp_name'],"uploads/page_image/".$up_file_1);
			}else{
	   			$up_file_1 = '';
			}
			$in_data['page_image']= $up_file_1;*/
			
			$this->common->insert_entry($tbl, $in_data);
			$this->session->set_flashdata('Success','Record added successfully!');
			
			redirect('webmaster/product_attributes/colours_list','refresh');
		}
		
		//========== Update =============
		if($this->input->post('mode')=='update'){	
			$up_data['title']= $this->security->xss_clean($this->input->post('title'));

			/*if ($_FILES['page_image']['name']!=""){
				$extension=strstr($_FILES['page_image']['name'],".");
				$up_file_1=time()."-".$_FILES['page_image']['name'];
				copy($_FILES['page_image']['tmp_name'],"uploads/page_image/".$up_file_1);
				@unlink("uploads/page_image/".$_POST['old_image']);
			}else{
	   			$up_file_1 = $_POST['old_image'];
			}		 	
			$up_data['page_image']= $up_file_1;*/
			
			$where=array( "id " => $id );
			$this->common->update_entry($tbl, $up_data, $where);

			$this->session->set_flashdata('Success','Record updated successfully!');
			redirect('webmaster/product_attributes/colours_list','refresh');
		}				
		$this->load->view("webmaster/manage_colours",$data);			
	}	
	
	function delete_colours(){	
		$data['act_id']="product_attr";
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);
				$this->common->delete_entry("tbl_product_color",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/product_attributes/colours_list','refresh');
		}
		redirect('webmaster/product_attributes/colours_list','refresh');
	}
	
	function remove_image($pageid=0){
		if($pageid>0){
			$tbl = "tbl_cms_pages";
			$where="pageid =".$pageid;

			$data['cmsData']=$cmsData= $this->common->getOneRowArray('page_image', $tbl, $where);
			@unlink("uploads/page_image/".$_POST['old_image']);

			$up_data['page_image']='';
			$this->common->update_entry("tbl_cms_pages",$up_data,$where);

			$this->session->set_flashdata('Success','Image deleted successfully!');
			redirect('webmaster/manage_cms/manage_page/'.$pageid);
		}else redirect('webmaster/manage_cms/page_list','refresh');
	}
	
	//---------------------- Dimension ----------------------------------
	function dimensions_list($msg=0){		
		$data['act_id']="product_attr"; $data['msg']=$msg;

		$tbl="tbl_product_dimensions"; $where = array();	$select = "*";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl, $where);
		if($num_rec){
			$data['list_data'] = $this->common->getAllRowArray($select, $tbl, $where);
		}
		$this->load->view("webmaster/dimensions_list",$data);			
	}

	function manage_dimensions($id=0){				
		$data['act_id']="product_attr";	$data['id']= $id;
		$tbl = "tbl_product_dimensions";
	
		if($id>0){
			$data['btnCapt']="update";

			$select = "*"; $where = array('id' => $id);
			$data['form_data']=$form_data= $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt']="add";
			$data['form_data']['title']='';
			$data['form_data']['height']='';
			$data['form_data']['width']='';
			$data['form_data']['length']='';
		}

		//=========== Add ============
		if($this->input->post('mode')=='add'){	
			$in_data['title']= $this->security->xss_clean($this->input->post('title'));
			$in_data['height']= $this->security->xss_clean($this->input->post('height'));
			$in_data['width']= $this->security->xss_clean($this->input->post('width'));
			$in_data['length']= $this->security->xss_clean($this->input->post('length'));
			
			/*
			if ($_FILES['page_image']['name']!=""){
				$extension=strstr($_FILES['page_image']['name'],".");
				$up_file_1=time()."-".$_FILES['page_image']['name'];
				copy($_FILES['page_image']['tmp_name'],"uploads/page_image/".$up_file_1);
			}else{
	   			$up_file_1 = '';
			}
			$in_data['page_image']= $up_file_1;*/
			
			$this->common->insert_entry($tbl, $in_data);
			$this->session->set_flashdata('Success','Record added successfully!');
			
			redirect('webmaster/product_attributes/dimensions_list','refresh');
		}
		
		//========== Update =============
		if($this->input->post('mode')=='update'){	
			$up_data['title']= $this->security->xss_clean($this->input->post('title'));
			$up_data['height']= $this->security->xss_clean($this->input->post('height'));
			$up_data['width']= $this->security->xss_clean($this->input->post('width'));
			$up_data['length']= $this->security->xss_clean($this->input->post('length'));

			/*if ($_FILES['page_image']['name']!=""){
				$extension=strstr($_FILES['page_image']['name'],".");
				$up_file_1=time()."-".$_FILES['page_image']['name'];
				copy($_FILES['page_image']['tmp_name'],"uploads/page_image/".$up_file_1);
				@unlink("uploads/page_image/".$_POST['old_image']);
			}else{
	   			$up_file_1 = $_POST['old_image'];
			}		 	
			$up_data['page_image']= $up_file_1;*/
			
			$where=array( "id " => $id );
			$this->common->update_entry($tbl, $up_data, $where);

			$this->session->set_flashdata('Success','Record updated successfully!');
			redirect('webmaster/product_attributes/dimensions_list','refresh');
		}				
		$this->load->view("webmaster/manage_dimensions",$data);			
	}	
	
	function delete_dimensions(){	
		$data['act_id']="product_attr";
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);
				$this->common->delete_entry("tbl_product_dimensions",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/product_attributes/dimensions_list','refresh');
		}
		redirect('webmaster/product_attributes/dimensions_list','refresh');
	}
	
}?>