<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Publication extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure');
	 	$this->load->model('Admin_model','admin'); 	 
	}
	//---------------------- Pages ----------------------------------
	function index(){		
		$data['act_id']="allPages";	
		$data['sub_act_id']="publication";	
		$data['sub_sub_act_id']="managePublication";	
	 	$data['num_rec'] = $num_rec = $this->common->num_publication();
		if($num_rec){
			$data['dataDs'] = $this->common->getPublication();
		}
		$this->load->view("webmaster/publicationlist",$data);			
	}
 	
 	function manage($id=0){
 		 
 	 	$data['userData']='';
 	 	$data['act_id']="allPages";	
		$data['sub_act_id']="publication";	
		$data['sub_sub_act_id']="managePublication";	



 	 	$data['id']=$id;
 	 	$tbl = 'tbl_publication';
 	 	$data['country'] = $this->common->get_country();
 	 	$data['style'] = $this->common->get_style();
 	 	$data['galleries'] = $this->common->get_galleries();
		$data['user_artist'] = $this->common->getUserList('id,first_name,last_name',array('user_type'=>'artist'));

		if($id>0)
		{  
			$btnCapt="Update"; 
			$where = array('id' => $id);
			$data['userdata'] = $this->common->getOneRowArray( '*', $tbl, $where );   
			 
		}else{
			$btnCapt = "Add"; 
			$data['userdata'] = ''; 
		 
		}
		$data['btnCapt']=$btnCapt;
 		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('description', 'Description main page', 'trim|required');
		$this->form_validation->set_rules('description2', 'Detail page description', 'trim|required');  
		$this->form_validation->set_rules('number_of_pages', 'Number of pages', 'trim|required|numeric'); 
		$this->form_validation->set_rules('hardcover', 'Hardcover', 'trim'); 
		$this->form_validation->set_rules('softcover', 'softcover', 'trim');
		$this->form_validation->set_rules('isbn', 'isbn', 'trim|required'); 
		$this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
		//$this->form_validation->set_rules('add_to_cart', 'Add To Cart', 'trim|required');
	    //	$this->form_validation->set_rules('user_artist', 'Artist', 'trim|required');   
 		if($this->form_validation->run())
		{

			
			// file upload
			$flag=0;
		  	if($_FILES['book_image']['name']!=''){
					$flag=0;
					//==validaye image exists 
					$path_img = $_FILES['book_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag = 1;						
						break;
					}

			} 
			
			$final_img  = '';
			if($flag==0){

					if(!is_dir('./uploads/publication_book_image/')){
						mkdir('./uploads/publication_book_image/');
					}
			 		if($_FILES['book_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['book_image']['name'] = $file['book_image']['name'];					
						
						$filename = str_replace(' ','_','publication-book-image')."_".rand(0000,9999);
						$path = $_FILES['book_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/publication_book_image';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['book_image']['type']=$file['book_image']['type'];
						$_FILES['book_image']['tmp_name']=$file['book_image']['tmp_name'];
						$_FILES['book_image']['error']=$file['book_image']['error'];
						$_FILES['book_image']['size']=$file['book_image']['size'];
						$this->upload->do_upload('book_image');
						//$this->common->create_thumb_resize($final_img,'./uploads/publication_book_image/','356','360');
						if($this->input->post('old_book_image')!=''){
							@unlink('./uploads/publication_book_image/'.$this->input->post('old_book_image'));
						}

					}else{
						if($this->input->post('old_book_image')!=''){
							$final_img = $this->input->post('old_book_image');
						}
					}
			} 

			$flag2=0;
			if($_FILES['large_image']['name']!=''){
					$flag2=0;
					//==validaye image exists 
					$path_img = $_FILES['large_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag2 = 1;						
						break;
					}

			} 

			$final_img2  = '';
			if($flag2==0){

					 
			 		if($_FILES['large_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['large_image']['name'] = $file['large_image']['name'];					
						
						$filename = str_replace(' ','_','publication-large-image')."_".rand(0000,9999);
						$path = $_FILES['large_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img2 = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/publication_book_image';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['large_image']['type']=$file['large_image']['type'];
						$_FILES['large_image']['tmp_name']=$file['large_image']['tmp_name'];
						$_FILES['large_image']['error']=$file['large_image']['error'];
						$_FILES['large_image']['size']=$file['large_image']['size'];
						$this->upload->do_upload('large_image');
						//$this->common->create_thumb_resize($final_img,'./uploads/publication_book_image/','356','360');
						if($this->input->post('old_large_image')!=''){
							@unlink('./uploads/publication_book_image/'.$this->input->post('old_large_image'));
						}

					}else{
						if($this->input->post('old_large_image')!=''){
							$final_img2 = $this->input->post('old_large_image');
						}
					}
			}

			//===Detail Page Banner image 
			$flag3=0;
			if($_FILES['banner_image']['name']!=''){
					$flag3=0;
					//==validaye image exists 
					$path_img = $_FILES['banner_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag3 = 1;						
						break;
					}

			} 

			$final_img3  = '';
			if($flag3==0){

					 
			 		if($_FILES['banner_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['banner_image']['name'] = $file['banner_image']['name'];					
						
						$filename = str_replace(' ','_','publication-banner-image')."_".rand(0000,9999);
						$path = $_FILES['banner_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img3 = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/publication_book_image';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['banner_image']['type']=$file['banner_image']['type'];
						$_FILES['banner_image']['tmp_name']=$file['banner_image']['tmp_name'];
						$_FILES['banner_image']['error']=$file['banner_image']['error'];
						$_FILES['banner_image']['size']=$file['banner_image']['size'];
						$this->upload->do_upload('banner_image');
						//$this->common->create_thumb_resize($final_img,'./uploads/publication_book_image/','356','360');
						if($this->input->post('old_banner_image')!=''){
							@unlink('./uploads/publication_book_image/'.$this->input->post('old_banner_image'));
						}

					}else{
						if($this->input->post('old_banner_image')!=''){
							$final_img3 = $this->input->post('old_banner_image');
						}
					}
			}

			//Book image from detail page
			$flag4=0;
			if($_FILES['book_image2']['name']!=''){
					$flag4=0;
					//==validaye image exists 
					$path_img = $_FILES['book_image2']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flag4 = 1;						
						break;
					}

			}
			$final_img4  = '';
			if($flag4==0){

					 
			 		if($_FILES['book_image2']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['book_image2']['name'] = $file['book_image2']['name'];					
						
						$filename = str_replace(' ','_','publication-book-image')."_".rand(0000,9999);
						$path = $_FILES['book_image2']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img4 = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/publication_book_image';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['book_image2']['type']=$file['book_image2']['type'];
						$_FILES['book_image2']['tmp_name']=$file['book_image2']['tmp_name'];
						$_FILES['book_image2']['error']=$file['book_image2']['error'];
						$_FILES['book_image2']['size']=$file['book_image2']['size'];
						$this->upload->do_upload('book_image2');
						//$this->common->create_thumb_resize($final_img,'./uploads/publication_book_image/','356','360');
						if($this->input->post('old_book_image2')!=''){
							@unlink('./uploads/publication_book_image/'.$this->input->post('old_book_image2'));
						}

					}else{
						if($this->input->post('old_book_image2')!=''){
							$final_img4 = $this->input->post('old_book_image2');
					}
			}
 
		}
		$artist = $this->input->post('user_artist');
		$artistData = implode(',',$artist);
		
		$html_code=$this->input->post('add_to_cart');
		$html_code2=$this->input->post('add_to_cart2');
		
		$html_val = htmlentities($html_code);
		
  
			if($id>0){
 
				$update_array = array(
									'title'=>$this->input->post('title'),
									'description'=>$this->input->post('description'),
									'description2'=>$this->input->post('description2'), 
									'number_of_pages'=>$this->input->post('number_of_pages'),
									'hardcover'=>$this->input->post('hardcover'),
									'softcover' =>$this->input->post('softcover'),
									'isbn'=>$this->input->post('isbn'),
									'add_to_cart'=>$html_code,
									'add_to_cart2'=>$html_code2,
								 	'price'=>$this->input->post('price'),
									'book_image'=>$final_img,
									'large_image'=>$final_img2,
									'banner_image'=>$final_img3,
									'book_image2'=>$final_img4,
									'artist_name'=>$artistData
									);
									
				$where_array=array('id'=>$id); 
				$this->common->update_entry($tbl,$update_array,$where_array);
				$this->session->set_flashdata('Success','User updated successfully .');
				redirect('webmaster/publication');

			}else{
				
	 		 
				$insert_array = array(
									'title'=>$this->input->post('title'),
									'description'=>$this->input->post('description'),
									'description2'=>$this->input->post('description2'), 
									'number_of_pages'=>$this->input->post('number_of_pages'),
									'hardcover'=>$this->input->post('hardcover'),
									'softcover' =>$this->input->post('softcover'), 
									'isbn'=>$this->input->post('isbn'),
									'add_to_cart'=>$html_code,
									'add_to_cart2'=>$html_code2,
								 	'price'=>$this->input->post('price'),
									'book_image'=>$final_img,
									'large_image'=>$final_img2,
									'banner_image'=>$final_img3,
									'book_image2'=>$final_img4,
									'artist_name'=>$artistData
									);
			 	
				$this->common->add_records($tbl,$insert_array);
				 
				$this->session->set_flashdata('Success','Publication added successfully .');
				redirect('webmaster/publication');
			}
		} 
 		$this->load->view('webmaster/manage_publication',$data);
	}

	public function delete_publication(){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);

				$where= array("id " => $delid[$i]);
				$dataRs = $this->common->getOneRowArray("*","tbl_publication",$where);
				@unlink('./uploads/publication_book_image/'.$dataRs['book_image']);
				@unlink('./uploads/publication_book_image/'.$dataRs['large_image']);
				@unlink('./uploads/publication_book_image/'.$dataRs['banner_image']);
				@unlink('./uploads/publication_book_image/'.$dataRs['book_image2']);
				//Deleted the books take a look inside pages if exists
				$where_array = array('publication_id' => $delid[$i] );
				$ifExists = $this->common->getnumRow('tbl_publication_book_images',$where_array);
				if($ifExists>0){
					$bookDs = $this->common->getAllRowArray( 'id', 'tbl_publication_book_images', $where_array );   
					foreach($bookDs as $bookRs){ 
					$delid=$this->security->xss_clean($bookRs['id']);
					$this->admin->deletePublicationsBooks($delid);
					}
				}
				//Deleted the books take a look inside pages if exists
			
				$this->common->delete_entry("tbl_publication",array('id' => $delid[$i]));
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/publication');
		}
		redirect('webmaster/publication');
	}

	public function manage_books($bookId,$id=0)
	{
	   
	    
		$where_array = array('id' => $bookId );
		$numRow = $this->common->getnumRow('tbl_publication',$where_array);
		if($numRow==1)
		{
			$data['userData']='';
	 	 	$data['act_id']='publication';
	 	 	$data['bookId']=$bookId;
	 	 	$data['id']=$id;
	 	 	$tbl = 'tbl_publication';
	 	 
	 	 	$data['publicationData'] = $this->common->getOneRowArray( '*', $tbl, $where_array );   

	 	 	$where = array('publication_id' => $bookId );
	 	 	$data['bookNumRow'] = $this->common->getnumRow( 'tbl_publication_book_images', $where );   
	 	 	$data['bookDs'] = $this->common->getAllRowArray( '*', 'tbl_publication_book_images', $where );   
			//publications-book-images 
			 if($id>0){
			 	$data['btnCapt'] = 'Update';
			 	$where_array = array('publication_id' => $bookId , 'id' => $id);
			 	$data['publicationDataup'] = $this->common->getOneRowArray( '*', 'tbl_publication_book_images', $where_array );
			 	
			 }else{
			     
			 	$data['btnCapt'] = 'Add';
			 	
			 	$data['publicationDataup'] ='';
			 }

			if($this->input->post('mode')==1)
			{
				// file upload
				$flag=0;
			  	if($_FILES['image_name']['name']!=''){
						$flag=0;
						//==validaye image exists 
						$path_img = $_FILES['image_name']['name'];
						$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
							
						$valid_ext_arr = array('png','jpg','jpeg','gif');
						if(!in_array(strtolower($ext_img),$valid_ext_arr))
						{
							$flag = 1;						
							break;
						}

				} 
				
				$final_img  = '';
				if($flag==0){

						if(!is_dir('./page/')){
							mkdir('./page/');
						}
				 		if($_FILES['image_name']['name']!=''){
						
							$file=$_FILES;	
							$_FILES['image_name']['name'] = $file['image_name']['name'];					
							
							$filename = str_replace(' ','_','publication-book-image')."_".rand(0000,9999);
							$path = $_FILES['image_name']['name'];
							$ext = pathinfo($path, PATHINFO_EXTENSION);							
							
							$final_img = $filename.".".$ext;					
							
							$this->load->library('upload');
							$config['file_name']     = $filename;
							$config['upload_path']   = './page';
							$config['allowed_types'] = 'png|jpeg|jpg|gif';
										
							$this->upload->initialize($config);					
							$_FILES['image_name']['type']=$file['image_name']['type'];
							$_FILES['image_name']['tmp_name']=$file['image_name']['tmp_name'];
							$_FILES['image_name']['error']=$file['image_name']['error'];
							$_FILES['image_name']['size']=$file['image_name']['size'];
							$this->upload->do_upload('image_name');
							$this->common->create_thumb_resize($final_img,'./page/','500','650','thumb');
							if($this->input->post('old_book_image')!=''){
								@unlink('./page/'.$this->input->post('old_book_image'));
								@unlink('./page/thumb/'.$this->input->post('old_book_image'));
							}

						}else{
							if($this->input->post('old_image_name')!=''){
								$final_img = $this->input->post('old_image_name');
							}
						}
				} 


				if($id>0){
 
				$update_array = array(
									'image_name'=>$final_img
									);
				$where_array=array('id'=>$id); 
				$this->common->update_entry('tbl_publication_book_images',$update_array,$where_array);
				$this->session->set_flashdata('Success','Book Image updated successfully .');
				redirect('webmaster/publication/manage_books/'.$bookId);

			}else{
				$insert_array = array(
									'publication_id	'=>$bookId,
									'image_name'=>$final_img
									);
			 	
				$this->common->add_records('tbl_publication_book_images',$insert_array);
				 
				$this->session->set_flashdata('Success','Image added successfully .');
				redirect('webmaster/publication/manage_books/'.$bookId);
			}

			}
			$this->load->view('webmaster/manage_publications_books',$data);
		 }else{
			redirect('publication');
		}
	}
    
   
	function delete_publicationbooks($bookId){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){ 
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$this->admin->deletePublicationsBooks($delid[$i]);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/publication/manage_books/'.$bookId);
		}
		redirect('webmaster/publication/manage_books/'.$bookId);
	}
	
	
}?>