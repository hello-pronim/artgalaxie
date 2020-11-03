<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_benefits extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
	}
	
	function index(){
		$data['act_id']="allPages";	
			$data['sub_act_id']="gallery_benefits";
			$data['sub_sub_act_id']="gallery_benefitsCms";

		$data['num_rec'] = $num_rec = $this->common->num_gallery_benefits();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_gallery_benefits();
		}
		$this->load->view("webmaster/gallery_benefits_list",$data);
	}
	
	function manage_gallery_benefits($id=0)
	{
		//print_r($id);
		
		$data['act_id']         =   "allPages";	
		$data['sub_act_id']     =   "gallery_benefits";
		$data['sub_sub_act_id'] =   "gallery_benefits";	
		$data['id']             =   $id;
		
		$tbl = "tbl_gallery_benefits";  
        
 	    //========== ckeditor  starts ============
		$data['ckeditor'] = array(		
			//ID of the page_descarea that will be replaced
			'id' 	=> 	'benefits_text',
			'path'	=>	'js/ckeditor',	
			'filebrowserImageUploadUrl' =>	site_url('webmaster/manage_gallery_benefits/ck_imageupload') //'imageupload.php',	
		);//========== ckeditor  ends ============	
		
		if($id>0)
		{
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}
		else
		{
			$data['btnCapt'] = "add";
			$data['form_data']['benefits_title'] = '';
		}

		$this->form_validation->set_rules('benefits_title', 'Title', 'trim|required');
	    $this->form_validation->set_rules('benefits_text', 'Art Text', 'trim|required'); 
		$this->form_validation->set_rules('benefits2_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('benefits2_text', 'Art Text', 'trim|required'); 
		$this->form_validation->set_rules('benefits3_title', 'Button Title', 'trim|required'); 
		$this->form_validation->set_rules('benefits3_text', 'Button Url', 'trim|required'); 
		$this->form_validation->set_rules('benefits4_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('benefits4_text', 'Art Text', 'trim|required'); 
		$this->form_validation->set_rules('benefits5_title', 'Button Title', 'trim|required'); 
		$this->form_validation->set_rules('benefits5_text', 'Button Url', 'trim|required'); 
		$this->form_validation->set_rules('benefits6_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('benefits6_text', 'Art Text', 'trim|required');
		
		if($this->form_validation->run())
		{
            for($i=1; $i<7;$i++) {
                if($i==1) {
                    $benefits_icon = 'benefits_icon';
                } else {
                    $benefits_icon = 'benefits'.$i.'_icon';
                }
                
                if($_FILES[$benefits_icon]['name'] == "")
                {
                    
                } else {
                    $final_img[$i]  = array();
        	        $file=$_FILES;	
        	        //echo "<pre>"; print_r($_FILES); echo "</pre>";
        			$_FILES[$benefits_icon]['name'] = $file[$benefits_icon]['name'];
        					
        			$filename = str_replace(' ','_','shop_book')."_".uniqid();
        			$path = $_FILES[$benefits_icon]['name'];
        			$ext = pathinfo($path, PATHINFO_EXTENSION);
        			$final_img[$i] = $filename.".".$ext;
        			
        			$this->load->library('upload');
        			$config['file_name']     = $filename;
        			$config['upload_path']   = './uploads/shop/books';
        			$config['allowed_types'] = 'png|jpeg|jpg|gif';
        								
        			$this->upload->initialize($config);					
        			
        			$_FILES[$benefits_icon]['type']=$file[$benefits_icon]['type'];
        			$_FILES[$benefits_icon]['tmp_name']=$file[$benefits_icon]['tmp_name'];
        			$_FILES[$benefits_icon]['error']=$file[$benefits_icon]['error'];
        			$_FILES[$benefits_icon]['size']=$file[$benefits_icon]['size'];
        			$this->upload->do_upload($benefits_icon);
        			$value_icon_array[$benefits_icon] = $final_img[$i];
                }
                
                
                
            }
				
 		        $value_field_array = array(
						//'benefits_icon'=>$final_img[1],
						'benefits_title' =>$this->security->xss_clean($this->input->post('benefits_title')),
						'benefits_text' => $this->input->post('benefits_text'),
						//'benefits2_icon'=>$final_img[2],
						'benefits2_title' =>$this->security->xss_clean($this->input->post('benefits2_title')),
						'benefits2_text' => $this->input->post('benefits2_text'),
						//'benefits3_icon'=>$final_img[3],
						'benefits3_title' =>$this->security->xss_clean($this->input->post('benefits3_title')),
						'benefits3_text' => $this->input->post('benefits3_text'),
						//'benefits4_icon'=>$final_img[4],
						'benefits4_title' =>$this->security->xss_clean($this->input->post('benefits4_title')),
						'benefits4_text' => $this->input->post('benefits4_text'),
						//'benefits5_icon'=>$final_img[5],
						'benefits5_title' =>$this->security->xss_clean($this->input->post('benefits5_title')),
						'benefits5_text' => $this->input->post('benefits5_text'),
						//'benefits6_icon'=>$final_img[6],
						'benefits6_title' =>$this->security->xss_clean($this->input->post('benefits6_title')),
						'benefits6_text' => $this->input->post('benefits6_text')
		                );
		                
		         $value_array = array_merge($value_field_array,$value_icon_array);       
                //echo "<pre>"; print_r($value_array); echo "</pre>";
                //exit;
    		if ($id==0)
    		{
    			$this->common->add_records($tbl, $value_array);
    			$this->session->set_flashdata('Success',"Record added successfully!");
    			redirect("webmaster/gallery_benefits");
    		}
    		else
    		{
    			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
    			//print_r($value_array);die;
    			$this->common->update_entry($tbl, $value_array, $where);
    			$this->session->set_flashdata('Success',"Record updated successfully!");
    			redirect("webmaster/gallery_benefits");
    		}
		}
    	$this->load->view("webmaster/manage_gallery_benefits",$data);
	}
	 
	function delete_gallery_benefits(){
		 
		$tbl = "tbl_gallery_benefits";
 		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				//@unlink('./uploads/art_of_giving/'.$form_data['banner_image']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/gallery_benefits");
	} 

}?>