<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Regionwise_gallery extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
	}
	
	function index(){
		$data['act_id']="allPages";	
		$data['sub_act_id']="regionwiseGallery";	
		$data['sub_sub_act_id']="regiongallery";	
	 
		$data['num_rec'] = $num_rec = $this->common->num_regionwise_galleries();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_regionwise_galleries();
		}
		$this->load->view("webmaster/regionwise_gallery_list",$data);
	}
	
	function manage_region_galleries($cat_id=0){
		$data['act_id']="allPages";	
		$data['sub_act_id']="regionwiseGallery";	
		$data['sub_sub_act_id']="regiongallery";	
		$data['cat_id'] = $cat_id;
		$tbl = "tbl_regionwise_galleries";  
    
		$data['user_artist'] = $this->common->getUserList('id,first_name,last_name',array('user_type'=>'artist'));
		
		if($cat_id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('cat_id' => $cat_id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['cat_name'] = '';
		}

		$this->form_validation->set_rules('cat_name', 'Title', 'trim|required');
		$this->form_validation->set_rules('sub_name', 'Sub Title', 'trim|required'); 
		$this->form_validation->set_rules('category_id', 'Gallery Category', 'trim|required'); 
		$this->form_validation->set_rules('colour_type', 'Colour', 'trim|required'); 
		$this->form_validation->set_rules('representation_desc', 'Representation Description', 'trim'); 
		$this->form_validation->set_rules('short_description', 'Short Description', 'trim|required'); 
		$this->form_validation->set_rules('location_description', 'Location Description', 'trim|required'); 
		$this->form_validation->set_rules('google_map', 'Google Map', 'trim|required'); 
		if($this->form_validation->run()){
		    
		    //$artist = $this->input->post('user_artist');
		    //$artistData = implode(',',$artist);
		    
		    //$chk_status = $this->input->post('chk_status');
		    $chk_status = $this->input->post('chk_status',FALSE);
		    $chk_statusData = implode(',',$chk_status);
		    
		    $thumbnail_link = $this->input->post('thumbnail_link');
		    $thumbnail_linkData = implode(',',$thumbnail_link);
		    
		    $allartist = $this->input->post('artist_name');
		    $allartistData = implode(',',$allartist);
		    
			if(!is_dir('./uploads/regionwise_galleries/')){
				mkdir('./uploads/regionwise_galleries/');
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
						
						$filename = str_replace(' ','_','regionwise-gallery-image')."_".uniqid();
						$path = $_FILES['image_name']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_imgBlockImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/regionwise_galleries';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image_name']['type']=$file['image_name']['type'];
						$_FILES['image_name']['tmp_name']=$file['image_name']['tmp_name'];
						$_FILES['image_name']['error']=$file['image_name']['error'];
						$_FILES['image_name']['size']=$file['image_name']['size'];
						$this->upload->do_upload('image_name');
					 	if($this->input->post('old_image_name')!=''){
							@unlink('./uploads/regionwise_galleries/'.$this->input->post('old_image_name'));
						}

					}else{
						if($this->input->post('old_image_name')!=''){
							$final_imgBlockImage = $this->input->post('old_image_name');
						}
					}
			} 


			$flagFloorPlan=0;
		  	if($_FILES['floor_plan_image']['name']!=''){
					$flagFloorPlan=0;
					//==validaye image exists 
					$path_img = $_FILES['floor_plan_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagFloorPlan = 1;						
						break;
					}

			} 
			$final_FloorImage  = '';
			if($flagFloorPlan==0){
 
			 		if($_FILES['floor_plan_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['floor_plan_image']['name'] = $file['floor_plan_image']['name'];					
						
						$filename = str_replace(' ','_','floorplan-gallery-image')."_".uniqid();
						$path = $_FILES['floor_plan_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_FloorImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/regionwise_galleries';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['floor_plan_image']['type']=$file['floor_plan_image']['type'];
						$_FILES['floor_plan_image']['tmp_name']=$file['floor_plan_image']['tmp_name'];
						$_FILES['floor_plan_image']['error']=$file['floor_plan_image']['error'];
						$_FILES['floor_plan_image']['size']=$file['floor_plan_image']['size'];
						$this->upload->do_upload('floor_plan_image');
					 	if($this->input->post('old_floor_plan_image')!=''){
							@unlink('./uploads/regionwise_galleries/'.$this->input->post('old_floor_plan_image'));
						}

					}else{
						if($this->input->post('old_floor_plan_image')!=''){
							$final_FloorImage = $this->input->post('old_floor_plan_image');
						}
					}
			} 
			
			$tfile=$_FILES;
			$flagthumbnails=array();
			$thumb_count = count($tfile['thumbnail_image']['name']);
			for($i=0; $i<$thumb_count; $i++)
            {
                if($tfile['thumbnail_image']['name'][$i]!=''){
					$flagthumbnail=0;
					//==validaye image exists 
					$path_img = $tfile['thumbnail_image']['name'][$i];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagthumbnail = 1;						
						break;
					}
    			} 
    			$flagthumbnail  = '';
    			if($flagthumbnail==0){
    			    if($tfile['thumbnail_image']['name'][$i]!=''){
					
						$_FILES['thumbnail_image']['name'] = $tfile['thumbnail_image']['name'][$i];					
						
						$filename = str_replace(' ','_','thumbnail-gallery-image')."_".uniqid();
						$path = $tfile['thumbnail_image']['name'][$i];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$flagthumbnail = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/regionwise_galleries';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['thumbnail_image']['type']=$tfile['thumbnail_image']['type'][$i];
						$_FILES['thumbnail_image']['tmp_name']=$tfile['thumbnail_image']['tmp_name'][$i];
						$_FILES['thumbnail_image']['error']=$tfile['thumbnail_image']['error'][$i];
						$_FILES['thumbnail_image']['size']=$tfile['thumbnail_image']['size'][$i];
						$this->upload->do_upload('thumbnail_image');
					 	if($this->input->post('old_thumbnail_image')!=''){
							@unlink('./uploads/regionwise_galleries/'.$this->input->post('old_thumbnail_image'));
						}
						$flagthumbnails[$i] = $flagthumbnail;
					}else{
						if($this->input->post('old_thumbnail_image')!=''){
						    $flagthumbnail = $this->input->post('old_thumbnail_image');
							//echo "<br>inner array is <pre>"; print_r($flagthumbnail); echo "</pre>";
							$flagthumbnails[$i] = $flagthumbnail[$i];
						}
					}
				}
    		}
    		$flagthumbnailsData = implode(',',$flagthumbnails);

			$flagRepresentationImage=0;
		  	if($_FILES['representation_image']['name']!=''){
					$flagRepresentationImage=0;
					//==validaye image exists 
					$path_img = $_FILES['representation_image']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('png','jpg','jpeg','gif');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagRepresentationImage = 1;						
						break;
					}

			} 
			$final_RepresentationImage  = '';
			if($flagRepresentationImage==0){
 
			 		if($_FILES['representation_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['representation_image']['name'] = $file['representation_image']['name'];					
						
						$filename = str_replace(' ','_','represent_galleries-image')."_".uniqid();
						$path = $_FILES['representation_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_RepresentationImage = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/regionwise_galleries';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['representation_image']['type']=$file['representation_image']['type'];
						$_FILES['representation_image']['tmp_name']=$file['representation_image']['tmp_name'];
						$_FILES['representation_image']['error']=$file['representation_image']['error'];
						$_FILES['representation_image']['size']=$file['representation_image']['size'];
						$this->upload->do_upload('representation_image');
					 	if($this->input->post('old_representation_image')!=''){
							@unlink('./uploads/regionwise_galleries/'.$this->input->post('old_representation_image'));
						}

					}else{
						if($this->input->post('old_representation_image')!=''){
							$final_RepresentationImage = $this->input->post('old_representation_image');
						}
					}
			} 
        
            $type=$this->input->post('type');
            
			if($type=='video')
			{

			$flagRepresentationVideo=0;
		  	if($_FILES['str_name']['name']!=''){
					$flagRepresentationVideo=0;
					//==validaye image exists 
					$path_img = $_FILES['str_name']['name'];
					$ext_img = pathinfo($path_img, PATHINFO_EXTENSION);
						
					$valid_ext_arr = array('mp4','avi','webm','3gp','wmv','flv');
					if(!in_array(strtolower($ext_img),$valid_ext_arr))
					{
						$flagRepresentationVideo = 1;						
						break;
					}

			} 
			$flagRepresentationVideo  = '';
			if($flagRepresentationVideo==0){
 
			 		if($_FILES['str_name']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['str_name']['name'] = $file['str_name']['name'];					
						
						$filename = str_replace(' ','_','regionwise-gallery-video')."_".uniqid();
						$path = $_FILES['str_name']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$flagRepresentationVideo = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/regionwise_galleries';
						$config['allowed_types'] = 'mp4|avi|webm|wmv|3gp|flv';
									
						$this->upload->initialize($config);					
						$_FILES['str_name']['type']=$file['str_name']['type'];
						$_FILES['str_name']['tmp_name']=$file['str_name']['tmp_name'];
						$_FILES['str_name']['error']=$file['str_name']['error'];
						$_FILES['str_name']['size']=$file['str_name']['size'];
						$this->upload->do_upload('str_name');
					 	if($this->input->post('old_representation_video')!=''){
							@unlink('./uploads/regionwise_galleries/'.$this->input->post('old_representation_video'));
						}

					}else{
						if($this->input->post('old_representation_video')!=''){
							$flagRepresentationVideo = $this->input->post('old_representation_video');
						}
					}
			}
			}else if($type=="url"){
				$flagRepresentationVideo = $this->input->post('str_name');
				var_dump($flagRepresentationVideo);
				//exit();
			}

 			$value_array = array(
				'cat_name'=>addslashes($this->security->xss_clean($this->input->post('cat_name'))),
				'colour_type' =>$this->security->xss_clean($this->input->post('colour_type')),
				'image_name' => $final_imgBlockImage,
				'sub_name' =>$this->security->xss_clean($this->input->post('sub_name')),
				'category_id' =>$this->security->xss_clean($this->input->post('category_id')),
				'floor_plan_image' =>$final_FloorImage,
				'representation_image' =>$final_RepresentationImage,
				'short_description' =>$this->security->xss_clean($this->input->post('short_description')),
				'representation_desc' =>$this->security->xss_clean($this->input->post('representation_desc')),
				'location_description' =>$this->security->xss_clean($this->input->post('location_description')),
				'google_map' =>$this->security->xss_clean($this->input->post('google_map')),
				'str_name' =>$flagRepresentationVideo,
				'type' =>$type,
				//'thumbnail_image'=>$flagthumbnail,
				//'artist_name' =>$this->security->xss_clean($this->input->post('artist_name')),
				//'artist_names'=>$artistData,
				//'thumbnail_link' =>$this->security->xss_clean($this->input->post('thumbnail_link')),
				//'chk_status' =>$this->security->xss_clean($this->input->post('chk_status')),
				'thumbnail_image'=> $flagthumbnailsData,
				'artist_name' => $allartistData,
				'thumbnail_link' => $thumbnail_linkData,
				'chk_status' => $chk_statusData
			 );
		//	print_r($value_array);die;
    

		if ($cat_id==0){
			 	
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/regionwise_gallery");
		}else{
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
		//	print_r($value_array);die;
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/regionwise_gallery");
		}
		}	 
		 
		$this->load->view("webmaster/manage_regionwise_gallery",$data);
	
	}
	 
	function delete_regionwise_galleries(){
		 
		$tbl = "tbl_regionwise_galleries";
 		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				
				$where = array( "cat_id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
			 
				@unlink('./uploads/regionwise_galleries/'.$form_data['image_name']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/regionwise_gallery");
	} 


	function manage_photo_gallery($cat_id,$id=0){

		$data['act_id']="allPages";	
		$data['sub_act_id']="regionwiseGallery";	
		$data['sub_sub_act_id']="regiongallery";	
		$data['cat_id'] = $cat_id;
		$data['id'] = $id;
		$tbl = "tbl_regionwise_photogallery";  

		 $data['galleryDetails'] =  $xyz = $this->common->getRegionWiseGalleryDetails($cat_id);
		 
		if($id>0){
			$data['btnCapt']= "Edit";	
			$where =  array('id' =>$id );
			$data['boxData'] = $this->common->getOneRowArray('*',$tbl,$where);
		}else{
			$data['btnCapt']= "Add";
		}
		
		 
 		if($this->input->post('mode')==1)
		{	

			if(!is_dir('./uploads/regionwise_galleries/')){
				mkdir('./uploads/regionwise_galleries/');
			}
		 
	 		$finalimg  = '';
	 		if(@$_FILES['image_name']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['image_name']['name'] = $file['image_name']['name'];					
				
				$filename = str_replace(' ','_','photo-gallery-image')."_".rand(0000,9999);
				$path = $_FILES['image_name']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$finalimg = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/regionwise_galleries';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['image_name']['type']=$file['image_name']['type'];
				$_FILES['image_name']['tmp_name']=$file['image_name']['tmp_name'];
				$_FILES['image_name']['error']=$file['image_name']['error'];
				$_FILES['image_name']['size']=$file['image_name']['size'];
				$this->upload->do_upload('image_name');
				$this->common->create_thumb_resize($finalimg,'./uploads/regionwise_galleries/','1023','765');
				if($this->input->post('old_image_name')!=''){
					@unlink('./uploads/regionwise_galleries/'.$this->input->post('old_image_name'));
				}

			}else{
				if($this->input->post('old_image_name')!=''){
					$finalimg = $this->input->post('old_image_name');
				}
			}

			$value_array = array(
						'cat_id'=>$cat_id,
						'image_name' =>$finalimg
			);

			if($id>0){
					$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);
					$this->session->set_flashdata('Success','Image updated successfully.');
					redirect('webmaster/regionwise_gallery/manage_photo_gallery/'.$cat_id);

			}else{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
					
					$this->session->set_flashdata('Success','Image added successfully.');  
					redirect('webmaster/regionwise_gallery/manage_photo_gallery/'.$cat_id);

			}
		}

		$where2 =  array('cat_id' => $cat_id );
	 	$data['dataDs'] =   $this->common->getAllRowArray('*',$tbl,$where2);  
		$this->load->view("webmaster/regionwise_photo_gallery",$data);

	}

	function delete_photogallery($cat_id){
		$cat_id = $_POST['cat_id']; 
		
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));

				$where= array("id " => $delid[$i]);
				$dataDs = $this->common->getOneRowArray('*',"tbl_regionwise_photogallery",array('id' => $delid[$i]));
				@unlink('./uplods/regionwise_galleries/'.$dataDs['image_name']);
				$this->common->delete_entry("tbl_regionwise_photogallery",array('id' => $delid[$i]));
				 
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/regionwise_gallery/manage_photo_gallery/'.$cat_id);
		}
		redirect('webmaster/regionwise_gallery/manage_photo_gallery/'.$cat_id);
	}
}?>