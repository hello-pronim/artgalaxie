<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Other_links extends CI_Controller
{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
	}
	
	//--------------------- Other Links -----------------------------------------
	function other_links_list()
	{
		$data['act_id']="CMS";
		$data['sub_act_id']="homePage";
	
		$data['sub_sub_act_id']="otherLinks";

		$data['num_rec'] = $num_rec = $this->common->num_other();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_others();
		}
		$this->load->view("webmaster/other_link_list",$data);
	}
	
	function manage_other_link($oth_id=0)
	{
		$data['act_id']="CMS"; 
		$data['oth_id'] = $oth_id;
		$tbl = "tbl_other_links";
		
		if($oth_id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $oth_id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['title'] = '';
		}


		if($this->input->post('mode')=="add" || $this->input->post('mode')=="update")
		{
			if(!is_dir('./uploads/other_links/'))
			{
				mkdir('./uploads/other_links/');
			}

			$flagBlockImage=0;
		  	if($_FILES['image_name']['name']!=''){
					$flagBlockImage=0;
					//==validaye image exists 
					$path_img = $_FILES['image_name']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagBlockImage = 1;						
						break;
					}

			} 
			$final_imgBlockImage  = '';
			if($flagBlockImage==0){
 
			 		if($_FILES['image_name']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['image_name']['name'] = $file['image_name']['name'];					
						
						$filename = str_replace(' ','_','style-image')."_".uniqid();
						$path = $_FILES['image_name']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgBlockImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/other_links';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image_name']['type']=$file['image_name']['type'];
						$_FILES['image_name']['tmp_name']=$file['image_name']['tmp_name'];
						$_FILES['image_name']['error']=$file['image_name']['error'];
						$_FILES['image_name']['size']=$file['image_name']['size'];
						$this->upload->do_upload('image_name');
						$this->common->create_thumb_resize($final_imgBlockImage,'./uploads/galleries/','469','354');  
					 	if($this->input->post('old_oth_images')!=''){
							@unlink('./uploads/other_links/'.$this->input->post('old_oth_images'));
						}

					}else{
						if($this->input->post('old_oth_images')!=''){
							$final_imgBlockImage = $this->input->post('old_oth_images');
						}
					}
			} 

			$value_array = array(
							'title'=>addslashes($this->security->xss_clean($this->input->post('oth_name'))),
							'image_name' => $final_imgBlockImage
			);
			 
		}
		if ($this->input->post('mode')=="add"){
			///$add_data['cat_name']=;			
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/other_links/other_links_list");
		}

		if ($this->input->post('mode')=="update"){
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/other_links/other_links_list");
		}
		$this->load->view("webmaster/manage_other_link",$data);
	}
	

	function delete_other_links()
	{
		$data['act_id']="CMS"; 
		$tbl = "tbl_other_links";

		if($this->security->xss_clean($this->input->post('action')=="delete"))
		{
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++)
			{
				$delid=$this->security->xss_clean($this->input->post('cb'));
				
				$where = array( "id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
				@unlink('./uploads/other_links/'.$form_data['image_name']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/other_links/other_links_list");
	}
	
	 
}?>