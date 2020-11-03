<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');
	}

	function index()
	{		
		$data['act_id']="blog";
		$data['sub_act_id']="blogs";
		
		$tbl = "tbl_blogs";
		$select ="*";
		$where = "1=1";
		$OrderBy="added_date";
		$orderType="desc";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where,$OrderBy,$orderType);
		}
		$this->load->view("webmaster/bloglist",$data);			
	}
 	
 	function manage_blog($id=0)
 	{
		$data['ckeditor'] = array(		
			//ID of the page_descarea that will be replaced
			'id' 	=> 	'long_description',
			'path'	=>	'js/ckeditor',	
			'filebrowserImageUploadUrl' =>	site_url('webmaster/blog/ck_imageupload') //'imageupload.php',	
		);//========== ckeditor  ends ============	
 		 
 	 	$data['userData']='';
 	 	$data['act_id']='blog';
 	 	$data['sub_act_id']="blogs";
 	 	$data['id']=$id;
 	 	$tbl = 'tbl_blogs';
		
		if($id>0)
		{  
			$btnCapt="Update"; 
			$where = array('id' => $id);
			$data['dataDs'] = $dataDs = $this->common->getOneRowArray( '*', $tbl, $where );

			if($dataDs['sub_cat']!=0){
				$data['subFilterDs'] = $this->common->getFilterHavingParentId($dataDs['cat_id']);
			}else{
				$data['subFilterDs'] = '';
			}

			if($dataDs['sub_sub_cat']!=0){
				$data['subSubFilterDs'] = $this->common->getFilterHavingParentId($dataDs['sub_cat']);
			}else{
				$data['subSubFilterDs'] = '';
			}

			$data['catFilter'] = $catFilter = $this->admin->recursiveFilter(0,$dataDs['cat_id']);
		}else{
			$btnCapt = "Add"; 
			$data['dataDs'] = ''; 
			$data['catFilter'] = $catFilter = $this->admin->recursiveFilter(0,'');
		
		}
		$data['btnCapt']=$btnCapt;
 		$this->form_validation->set_rules('blog_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required|max_length[800]'); 
		$this->form_validation->set_rules('long_description', 'Long Description', 'trim|required'); 
		$this->form_validation->set_rules('added_date', 'Date', 'trim|required'); 
		$this->form_validation->set_rules('added_by', 'Author', 'trim|required'); 
		//$this->form_validation->set_rules('cat_id', 'Filters', 'trim|required'); 

		$this->form_validation->set_rules('is_feature', 'Is Feature', 'trim|required'); 
		$this->form_validation->set_rules('show_home_page', 'Display on home page?', 'trim|required'); 
		$this->form_validation->set_rules('is_featured_artist_artical', 'Featured Artist Article?', 'trim|required'); 

		if($this->form_validation->run())
		{
			$flag=0;
			if($_FILES['blog_image']['name']!=''){
					$flag=0;
					//==validaye image exists 
					$path_img = $_FILES['blog_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag = 1;						
						break;
					}

			} 

			if($flag==0){

					$final_img  = '';
			 		if($_FILES['blog_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['blog_image']['name'] = $file['blog_image']['name'];					
						
						$filename = str_replace(' ','_','blog')."_".uniqid();
						$path = $_FILES['blog_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/blog';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['blog_image']['type']=$file['blog_image']['type'];
						$_FILES['blog_image']['tmp_name']=$file['blog_image']['tmp_name'];
						$_FILES['blog_image']['error']=$file['blog_image']['error'];
						$_FILES['blog_image']['size']=$file['blog_image']['size'];
						$this->upload->do_upload('blog_image');
						$this->common->create_thumb_resize($final_img,'./uploads/blog/','301','247');
						if($this->input->post('old_blog_image')!=''){
							@unlink('./uploads/blog/'.$this->input->post('old_blog_image'));
						}

					}else{
						if($this->input->post('old_blog_image')!=''){
							$final_img = $this->input->post('old_blog_image');
						}
					}

			$flagDetail=0;
			if($_FILES['blog_detail_image']['name']!=''){
					$flagDetail=0;
					//==validaye image exists 
					$path_img = $_FILES['blog_detail_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag = 1;						
						break;
					}

			} 	
			if($flagDetail==0){

					$blogDetail_img  = '';
			 		if($_FILES['blog_detail_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['blog_detail_image']['name'] = $file['blog_detail_image']['name'];					
						
						$filename = str_replace(' ','_','blogDetail')."_".rand(0000,9999);
						$path = $_FILES['blog_detail_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$blogDetail_img = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/blog';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['blog_detail_image']['type']=$file['blog_detail_image']['type'];
						$_FILES['blog_detail_image']['tmp_name']=$file['blog_detail_image']['tmp_name'];
						$_FILES['blog_detail_image']['error']=$file['blog_detail_image']['error'];
						$_FILES['blog_detail_image']['size']=$file['blog_detail_image']['size'];
						$this->upload->do_upload('blog_detail_image');
						//$this->common->create_thumb_resize($final_img,'./uploads/blog/','301','247');
						if($this->input->post('old_blog_detail_image')!=''){
							@unlink('./uploads/blog/'.$this->input->post('old_blog_detail_image'));
						}

					}else{
						if($this->input->post('old_blog_detail_image')!=''){
							$blogDetail_img = $this->input->post('old_blog_detail_image');
						}
					}
				}
			
			


						$cat = $this->input->post('cat_id');
						$subCat = implode(',',$cat);
 						$value_array = array(
										'blog_title'=>$this->input->post('blog_title'),
										'short_description'=>$this->input->post('short_description'),
										'long_description'=>$this->input->post('long_description'),
										'blog_image'=>$final_img,
										'added_date'=>$this->input->post('added_date'),
										'added_by'=>$this->input->post('added_by'),
										'cat_id'=>$subCat,
										'show_home_page'=>$this->input->post('show_home_page'),
										'is_feature'=>$this->input->post('is_feature'),
										'is_featured_artist_artical'=>$this->input->post('is_featured_artist_artical'),
										'blog_detail_image'=>$blogDetail_img 
										
						);
						if($id>0){
			 				$where_array=array('id'=>$id);
							$this->common->update_entry($tbl,$value_array,$where_array);
							$this->session->set_flashdata('Success','Blog updated successfully.');
							redirect('webmaster/blog/index','refresh');

						}else{
					 		$this->common->add_records($tbl,$value_array);
							$new_registration_id =	$this->db->insert_id();			
							
							$this->session->set_flashdata('Success','Blog added successfully.');  
							redirect('webmaster/blog/index','refresh');
						}
					
				
				 
			}else{
				$this->session->set_flashdata('Error',"Please upload valid PNG/JPG/JPEG/GIF extension");
			}

		} 

		$data['filterDs'] = 	 $this->common->getFilterHavingParentId(0);
 		$this->load->view('webmaster/manage_blog',$data);
	} 

	function ck_imageupload(){
		$data['kk']=1;
		$this->load->view("webmaster/imageupload",$data);	
	}

	public function delete_blog(){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);
				$dataDs = $this->common->getOneRowArray('*',"tbl_blogs",$where);
				@unlink('./uploads/blog/'.$dataDs['blog_image']);
				$this->common->delete_entry("tbl_blogs",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/blog/index','refresh');
		}
		redirect('webmaster/blog/index','refresh');
	}

 //==========Filter
	function filter($id=0,$pid=0){
		$data['act_id']="blog";	
		$data['sub_act_id']="blogfilter";
		
		$tbl = "tbl_blog_filter";
		$data['id'] = $id;
		$data['pid'] = $pid;

		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		 
 		if($this->input->post('mode')==1)
		{	
			
			if($id>0){
					$value_array = array(
						'cat_name'=>$this->input->post('cat_name')
					);
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Filter updated successfully.');
					redirect('webmaster/blog/filter/0/'.$pid);

			}else{
					$value_array = array(
						'cat_name'=>$this->input->post('cat_name'),
						'pid'=>$pid
					);
					$this->common->add_records($tbl,$value_array);
					$this->session->set_flashdata('Success','Filter added successfully.');  
					redirect('webmaster/blog/filter/0/'.$pid);

			}
		}

		$select ="*";
		$where =  array('pid' => $pid );
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			//check pid is having parent ?
			$isParent = $this->common->getOneRowArray('*',$tbl,array('id' =>$pid));
			if( $isParent['pid'] !=0){ 
				$data['main_cat'] = $this->common->getFilterName($isParent['pid']);
				$data['secount_cat'] = $this->common->getFilterName($pid);
				$data['main_cat_parent'] = $main_cat_parent = $this->common->getOneRowArray('*',$tbl,array('id' =>$isParent['pid']));
				//print_r($main_cat_parent); exit();

			}else{ 
				$data['main_cat'] = $this->common->getFilterName($pid);	
				$data['secount_cat'] = '';
				$data['main_cat_parent'] = 0;
			}
			
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/filterlist",$data);	

	}

	function delete_blog_filter($pid){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);
				$this->common->delete_entry("tbl_blog_filter",array('id' => $delid[$i]));
		 
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/blog/filter/0/'.$pid);
		}
		redirect('webmaster/blog/filter/0/'.$pid);
	}
	// images..
	function blog_images(){
		$data['act_id']="blog";	
		$data['sub_act_id']="pageImages";
  
 	 	$tbl = 'tbl_blog_images';
		$btnCapt="Update"; 
		$where = array('id' => 1);
		$data['dataDs'] = $this->common->getOneRowArray( '*', $tbl, $where );   
		
		
		$data['btnCapt']=$btnCapt;
 		if($this->input->post('mode')==1)
		{
 			$finalServices_img  = '';
	 		if($_FILES['image1']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['image1']['name'] = $file['image1']['name'];					
				
				$filename = str_replace(' ','_','blog-page-image')."_".rand(0000,9999);
				$path = $_FILES['image1']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalServices_img = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/blog';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['image1']['type']=$file['image1']['type'];
				$_FILES['image1']['tmp_name']=$file['image1']['tmp_name'];
				$_FILES['image1']['error']=$file['image1']['error'];
				$_FILES['image1']['size']=$file['image1']['size'];
				$this->upload->do_upload('image1');
				if($this->input->post('old_image1')!=''){
					@unlink('./uploads/blog/'.$this->input->post('old_image1'));
				}

			}else{
				if($this->input->post('old_image1')!=''){
					$finalServices_img = $this->input->post('old_image1');
				}
			}

			//Services page image icon
			$finalServicesicone  = '';
	 		if($_FILES['image2']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['image2']['name'] = $file['image2']['name'];					
				
				$filename = str_replace(' ','_','blog-page-image-icone2')."_".rand(0000,9999);
				$path = $_FILES['image2']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalServicesicone = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/blog';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['image2']['type']=$file['image2']['type'];
				$_FILES['image2']['tmp_name']=$file['image2']['tmp_name'];
				$_FILES['image2']['error']=$file['image2']['error'];
				$_FILES['image2']['size']=$file['image2']['size'];
				$this->upload->do_upload('image2');
				if($this->input->post('old_image2')!=''){
					@unlink('./uploads/blog/'.$this->input->post('old_image2'));
				}

			}else{
				if($this->input->post('old_image2')!=''){
					$finalServicesicone = $this->input->post('old_image2');
				}
			}


			$image3  = '';
	 		if($_FILES['image3']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['image3']['name'] = $file['image3']['name'];					
				
				$filename = str_replace(' ','_','blog-page-image-icone3')."_".rand(0000,9999);
				$path = $_FILES['image3']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$image3 = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/blog';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['image3']['type']=$file['image3']['type'];
				$_FILES['image3']['tmp_name']=$file['image3']['tmp_name'];
				$_FILES['image3']['error']=$file['image3']['error'];
				$_FILES['image3']['size']=$file['image3']['size'];
				$this->upload->do_upload('image3');
				if($this->input->post('old_image3')!=''){
					@unlink('./uploads/blog/'.$this->input->post('old_image3'));
				}

			}else{
				if($this->input->post('old_image3')!=''){
					$image3 = $this->input->post('old_image3');
				}
			}

			
			$value_array = array(
				'image1'=>$finalServices_img,
				'image2'=>$finalServicesicone,
				'image3'=>$image3
			);
		 
		$where_array=array('id'=>1);
		$this->common->update_entry($tbl,$value_array,$where_array);
		$this->session->set_flashdata('Success','Images updated successfully .');
		redirect('webmaster/blog/blog_images','refresh');
			 
		} 
		$this->load->view("webmaster/manage_blog_page_image",$data);			
	}

	function manage_comments($id=0,$blogId){

		$data['act_id']="blog";
		$tbl = "tbl_blog_comments";
		$data['id'] = $id;
		$data['blogId'] = $blogId;
		$data['blogTitle'] = $this->common->getOneRowArray('*','tbl_blogs',array('id' => $blogId ));
		if($id>0){  
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		} 
		
		if($id!=0){
			 
			$this->form_validation->set_rules('comment', 'Comment', 'required'); 
			//$this->form_validation->set_rules('Approed', 'is_approved', 'required');
		}
 		if($this->form_validation->run())
		{	
			 
			$value_array = array(
						'comment'=>$this->input->post('comment'),
						'is_approved'=> $this->input->post('is_approved')
			);
			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Comment updated successfully.');
					redirect('webmaster/blog/manage_comments/0/'.$blogId);

			}else{
					$this->common->add_records($tbl,$value_array);
					$this->session->set_flashdata('Success','Comment added successfully.');  
					redirect('webmaster/blog/manage_comments/0/'.$blogId);

			}
		}

	 
	 	$data['dataDs'] = $this->common->getBlogComments($blogId);
	 
		$this->load->view("webmaster/blogCommentlist",$data);
	}
}
?>