<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class social_links extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
 	}
	 
	function index(){
	    $data['act_id']="setting";
		$data['sub_act_id'] = 'SocialManage';
		
	  	$tbl = "`tbl_social_links`";
		$select ="*";
		$where = array();
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);

		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/social_links_list",$data);			
	}
	
	
	function manage($id=0)
	{
		$data['act_id']="setting";
		$data['id']=$id;
		$tbl = "`tbl_social_links`";
		$where =  array('id'=>$id);
		//$isExists = $this->common->getnumRow( $tbl, $where );
	 	
	 	if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id);
			$data['dataDs'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['dataDs']['link_for'] = '';
			$data['dataDs']['link'] = '';
		}

		$this->form_validation->set_rules('link', 'Link', 'trim|required|callback_valid_url_format');//callback_valid_url
		if($this->form_validation->run())
		{
			if($this->input->post('mode')=="add" || $this->input->post('mode')=="update")
			{
				if(!is_dir('front_assets/images/'))
				{
					mkdir('front_assets/images/');
				}

				$flagSocialImage=0;
			  	if($_FILES['social_image']['name']!='')
			  	{
					$flagSocialImage=0;
					//==validaye image exists 
					$path_img = $_FILES['social_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagSocialImage = 1;						
						break;
					}
				} 
				$final_imgSocialImage  = '';
				if($flagSocialImage==0)
				{
 			 		if($_FILES['social_image']['name']!='')
 			 		{
						$file=$_FILES;	
						$_FILES['social_image']['name'] = $file['social_image']['name'];					
						
						$filename = str_replace(' ','_','style-image')."_".uniqid();
						$path = $_FILES['social_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgSocialImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = 'front_assets/images';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['social_image']['type']=$file['social_image']['type'];
						$_FILES['social_image']['tmp_name']=$file['social_image']['tmp_name'];
						$_FILES['social_image']['error']=$file['social_image']['error'];
						$_FILES['social_image']['size']=$file['social_image']['size'];
						$this->upload->do_upload('social_image');
						$this->common->create_thumb_resize($final_imgSocialImage,'front_assets/images/','469','354');  
					 	if($this->input->post('old_social_image')!=''){
							@unlink('front_assets/images/'.$this->input->post('old_social_image'));
						}

					}else{
						if($this->input->post('old_social_image')!=''){
							$final_imgSocialImage = $this->input->post('old_social_image');
						}
					}
				} 

				$value_array = array(
								'link_for'=>addslashes($this->security->xss_clean($this->input->post('link_for'))),
								'link'=>addslashes($this->security->xss_clean($this->input->post('link'))),
								'icon' => $final_imgSocialImage
				);
			}
			if ($this->input->post('mode')=="add"){			
				$this->common->add_records($tbl, $value_array);
				$this->session->set_flashdata('Success',"Record added successfully!");
				redirect("webmaster/social_links/index");
			}

			if ($this->input->post('mode')=="update"){
				$this->common->update_entry($tbl, $value_array, $where);
				$this->session->set_flashdata('Success',"Record updated successfully!");
				redirect("webmaster/social_links/index","refresh");
			}
		}
		$this->load->view("webmaster/manage_social_links",$data);

		/*if($id>0)
	 	{
 	 		$data['dataDs']= $this->common->getOneRowArray('*',$tbl,$where);
			$this->form_validation->set_rules('link', 'Link', 'trim|required|callback_valid_url_format');//callback_valid_url
 	 		if($this->form_validation->run())
			{
					
					$updateArray = array(
							'link' => $this->input->post('link')
						);

					$this->common->update_entry($tbl,$updateArray,$where);
					$this->session->set_flashdata('Success','Record updayed successfully');					
					redirect("webmaster/social_links/index","refresh");
			}

			$this->load->view("webmaster/manage_social_links",$data);
		}else{
			//redirect('webmaster/social_links','refresh');
			$btnCapt = "Add"; 
			$data['dataDs'] = ''; 
			$data['catFilter'] = $catFilter = $this->admin->recursiveFilter(0,'');
		}*/
	}

	public function valid_url($url)
	{
	  
	    if (!preg_match("/^((ht|f)tp(s?)\:\/\/|~/|/)?([w]{2}([\w\-]+\.)+([\w]{2,5}))(:[\d]{1,5})?/", $url))
	    {
	    	$this->form_validation->set_message('valid_url','Invalid URL.');
	        return FALSE;
	    }

    	return TRUE;
	}

	public function valid_url_format($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->form_validation->set_message('valid_url_format', 'The URL you entered is not correctly formatted.');
            return FALSE;
        }
 
        return TRUE;
    }       
	  
	
}
?>