<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_cms extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
	}
	//---------------------- Pages ----------------------------------
	function page_list(){		
		$data['act_id']="CMS";
		
		$where = "pageid!= '' and pageid NOT IN(1,4,5,6) and page_type = 0 and parent_page_id = 0 ";
		$data['num_rec'] = $num_rec = $this->admin->num_cms_pages($where);
		if($num_rec){
			$data['list_data'] = $this->admin->get_cms_pages($where);
		}
		$this->load->view("webmaster/cms_page_list",$data);			
	}

	function manage_page($pageid=0){	
		if($pageid==2){
			$data['act_id']="allPages";	
			$data['sub_act_id']="regionwiseGallery";	
			$data['sub_sub_act_id']="galleryCms";	
		}else if($pageid==7){
			$data['act_id']="allPages";	
			$data['sub_act_id']="publication";	
			$data['sub_sub_act_id']="publicationCms";	
		}else if($pageid==8){
			$data['act_id']="allPages";	
			$data['sub_act_id']="aboutUs";	
			$data['sub_sub_act_id']="aboutUsCms";	
		}else if($pageid==9){
			$data['act_id']="allPages";	
			$data['sub_act_id']="services";	
			$data['sub_sub_act_id']="servicesCms";	
		}else if($pageid==10){
			$data['act_id']="allPages";	
    		$data['sub_act_id']="services";	
    		$data['sub_sub_act_id']="art_marketing";
    		$data['sub_sub_sub_act_id']="art_marketingCms";
		}else if($pageid==11){
			$data['act_id']="allPages";	
    		$data['sub_act_id']="services";	
    		$data['sub_sub_act_id']="website";
    		$data['sub_sub_sub_act_id']="websiteCms";
		}else if($pageid==12){
			$data['act_id']="allPages";	
    		$data['sub_act_id']="services";	
    		$data['sub_sub_act_id']="video-production";
    		$data['sub_sub_sub_act_id']="video-productionCms";
		}else if($pageid==13){
			$data['act_id']="allPages";	
    		$data['sub_act_id']="services";	
    		$data['sub_sub_act_id']="exhibitions";
    		$data['sub_sub_sub_act_id']="exibitionCms";
		}else if($pageid==14){
				$data['act_id']="allPages";	
    		$data['sub_act_id']="services";	
    		$data['sub_sub_act_id']="design";
    		$data['sub_sub_sub_act_id']="DesignSericesCms";
		}else if($pageid==15){
			$data['act_id']="allPages";	
    		$data['sub_act_id']="services";	
    		$data['sub_sub_act_id']="artServices";
    		$data['sub_sub_sub_act_id']="artSericesCms";
		}else if($pageid==16){
			$data['act_id']="blog";	
			$data['sub_act_id']="blogsCMS";
		}else if($pageid==17){
			$data['act_id']="allPages";	
			$data['sub_act_id']="video";
			$data['sub_sub_act_id']="videoCms";	
		}else if($pageid==18){
			$data['act_id']="allPages";	
			$data['sub_act_id']="termsConditions";
			$data['sub_sub_act_id']="";	
		}else if($pageid==19){
			$data['act_id']="allPages";	
			$data['sub_act_id']="privacyPolicy";
			$data['sub_sub_act_id']="";	
		}else if($pageid==20){
			$data['act_id']="allPages";	
    		$data['sub_act_id']="services";	
    		$data['sub_sub_act_id']="printing";
    		$data['sub_sub_sub_act_id']="printingCms";
		
		}else if($pageid==21){
			$data['act_id']="allPages";	
			$data['sub_act_id']="magzin";
			$data['sub_sub_act_id']="";	
		}else if($pageid==22){
			$data['act_id']="product_attr";	
			$data['sub_act_id']="manageProductcms";
			$data['sub_sub_act_id']="";	
		}	
		else if($pageid==23){
			$data['act_id']="allPages";	
			$data['sub_act_id']="art_of_giving";
			$data['sub_sub_act_id']="art_of_givingCms";	
		}
			else if($pageid==24){
			$data['act_id']="allPages";	
			$data['sub_act_id']="gallery_benefits";
			$data['sub_sub_act_id']="gallery_benefitsCms";	
		}
		else if($pageid==25){
			$data['act_id']="allPages";	
    		$data['sub_act_id']="art_of_giving";	
    		$data['sub_sub_act_id']="just_giving_book";
    		$data['sub_sub_sub_act_id']="just_giving_bookCms";
		}
		else if($pageid==26){
			
			$data['act_id']="allPages";	
    		$data['sub_act_id']="art_of_giving";	
    		$data['sub_sub_act_id']="just_giving_websites";
    		$data['sub_sub_sub_act_id']="just_giving_websitesCms";
    		
		}
		else if($pageid==27){
			
			$data['act_id']="allPages";	
    		$data['sub_act_id']="art_of_giving";	
    		$data['sub_sub_act_id']="just_giving_video";
    		$data['sub_sub_sub_act_id']="just_giving_videoCms";
    		
		}
		else if($pageid==28){
			$data['act_id']="allPages";	
    		$data['sub_act_id']="art_of_giving";	
    		$data['sub_sub_act_id']="view_competitions";
    		$data['sub_sub_sub_act_id']="view_competitionsCms";
		
		}
		else if($pageid==29){
			$data['act_id']="allPages";	
			$data['sub_act_id']="artist_video";
			$data['sub_sub_act_id']="artist_videoCms";
		}
							
		

		$data['pageid']= $pageid;
		$tbl = "tbl_cms_pages";
	
		//========== ckeditor  starts ============
		$data['ckeditor'] = array(		
			//ID of the page_descarea that will be replaced
			'id' 	=> 	'page_desc',
			'path'	=>	'js/ckeditor',	
			'filebrowserImageUploadUrl' =>	site_url('webmaster/manage_cms/ck_imageupload') //'imageupload.php',	
		);//========== ckeditor  ends ============		
	
		if($pageid>0){
			$data['btnCapt']="update";
			$select = "*";
			$where = array('pageid' => $pageid);
			$data['cmsData']=$cmsData= $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt']="add";
			$data['cmsData']['page_title']='';
			$data['cmsData']['material_title']='';
			$data['cmsData']['subtitle']='';
	        $data['cmsData']['meta_title']=''; 
	        $data['cmsData']['meta_description']=''; 
	        $data['cmsData']['meta_keyword']=''; 
	        $data['cmsData']['page_desc']=''; 
	        $data['cmsData']['page_image']=''; 
	        $data['cmsData']['parent_page_id']=0; 
	        $data['cmsData']['page_status']=1;  
		}

		$whereP = array('parent_page_id' => 0);
		$data['parentData']=$parentData= $this->admin->get_cms_pages($whereP);

		//=========== Add ============
		if($this->input->post('mode')=='add'){	
			$in_data['parent_page_id']= $this->security->xss_clean($this->input->post('parent_page_id'));
			$in_data['page_title']= $this->security->xss_clean($this->input->post('page_title'));
			$in_data['material_title']= $this->security->xss_clean($this->input->post('material_title'));
			$in_data['subtitle']= $this->security->xss_clean($this->input->post('subtitle'));
			$in_data['meta_title']= $this->security->xss_clean($this->input->post('meta_title')); 
			$in_data['meta_description']= $this->security->xss_clean($this->input->post('meta_description'));
			$in_data['meta_keyword']= $this->security->xss_clean($this->input->post('meta_keyword'));
			$in_data['cms_cat_id']= $this->security->xss_clean($this->input->post('cms_cat_id'));
				
			$in_data['page_desc']= $this->input->post('page_desc');
		
			if (@$_FILES['page_image']['name']!=""){
				$extension=strstr($_FILES['page_image']['name'],".");
				$up_file_1=time()."-".$_FILES['page_image']['name'];
				copy($_FILES['page_image']['tmp_name'],"uploads/page_image/".$up_file_1);
			}else{
	   			$up_file_1 = '';
			}
			
			$in_data['page_image']= $up_file_1;
			$in_data['page_status']= $this->input->post('page_status');
			
			$this->common->insert_entry("tbl_cms_pages",$in_data);
			$this->session->set_flashdata('Success','Record added successfully!');
			
			redirect('webmaster/manage_cms/page_list','refresh');
		}
		
		//========== Update =============
		if($this->input->post('mode')=='update'){	

			$up_data['parent_page_id']= $this->security->xss_clean($this->input->post('parent_page_id'));
			$up_data['page_title']= $this->security->xss_clean($this->input->post('page_title'));
				$up_data['material_title']= $this->security->xss_clean($this->input->post('material_title'));
			$up_data['subtitle']= $this->security->xss_clean($this->input->post('subtitle'));
			$up_data['meta_title']= $this->security->xss_clean($this->input->post('meta_title'));
			$up_data['meta_description']= $this->security->xss_clean($this->input->post('meta_description'));
			$up_data['meta_keyword']= $this->security->xss_clean($this->input->post('meta_keyword'));
			$up_data['cms_cat_id']= $this->security->xss_clean($this->input->post('cms_cat_id'));
			$up_data['page_desc']= $this->input->post('page_desc');	
							
			if (@$_FILES['page_image']['name']!=""){
				$extension=strstr($_FILES['page_image']['name'],".");
				$up_file_1=time()."-".$_FILES['page_image']['name'];
				copy($_FILES['page_image']['tmp_name'],"uploads/page_image/".$up_file_1);
				@unlink("uploads/page_image/".$_POST['old_image']);
			}else{
	   			$up_file_1 = $_POST['old_image'];
			}		 	
			
			$up_data['page_image']= $up_file_1;
			$up_data['page_status']= $this->input->post('page_status');
			
			$where=array( "pageid " => $pageid );
			$this->common->update_entry("tbl_cms_pages",$up_data,$where);
			$this->session->set_flashdata('Success','Record updated successfully!');
			redirect('webmaster/manage_cms/manage_page/'.$pageid);
		}				
		$this->load->view("webmaster/manage_cms_pages",$data);			
	}	
	
	function delete_page(){	
		$data['act_id']="CMS";
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array( "pageid " => $delid[$i] );
				$this->common->delete_entry("tbl_cms_pages",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/manage_cms/page_list','refresh');
		}
		redirect('webmaster/manage_cms/page_list','refresh');
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
	function ck_imageupload(){
		$data['kk']=1;
		$this->load->view("webmaster/imageupload",$data);	
	}
	//=====================
}?>