<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends CI_Controller{
	public function __construct(){
		parent::__construct();

		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
		$this->load->model('Admin_model','admin');
	}
	
	//--------------------- Category -----------------------------------------
	function category_list(){
		$data['act_id']="CMS";
		$data['sub_act_id']="";
		$data['sub_sub_act_id']="category_list";

	 
		$data['num_rec'] = $num_rec = $this->common->num_galleries();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_galleries();
		}
		$this->load->view("webmaster/category_list",$data);
	}
	
	function manage_category($cat_id=0){
		$data['act_id']="CMS"; 
		
		$data['cat_id'] = $cat_id;
		$tbl = "tbl_galleries";
		
		if($cat_id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('cat_id' => $cat_id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['cat_name'] = '';
		}


		if($this->input->post('mode')=="add" || $this->input->post('mode')=="update"){
			if(!is_dir('./uploads/galleries/')){
				mkdir('./uploads/galleries/');
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
						$config['upload_path']   = './uploads/galleries';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image_name']['type']=$file['image_name']['type'];
						$_FILES['image_name']['tmp_name']=$file['image_name']['tmp_name'];
						$_FILES['image_name']['error']=$file['image_name']['error'];
						$_FILES['image_name']['size']=$file['image_name']['size'];
						$this->upload->do_upload('image_name');
						$this->common->create_thumb_resize($final_imgBlockImage,'./uploads/galleries/','469','354');  
					 	if($this->input->post('old_image_name')!=''){
							@unlink('./uploads/galleries/'.$this->input->post('old_image_name'));
						}

					}else{
						if($this->input->post('old_image_name')!=''){
							$final_imgBlockImage = $this->input->post('old_image_name');
						}
					}
			} 


			$final_img  = '';
	 		if($_FILES['cat_images']['name']!=''){
			
				$file=$_FILES;	
				$_FILES['cat_images']['name'] = $file['cat_images']['name'];					
				
				$filename = str_replace(' ','_','galleries')."_".uniqid();
				$path = $_FILES['cat_images']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);							
				
				$final_img = $filename.".".$ext;					
				
				$this->load->library('upload');
				$config['file_name']     = $filename;
				$config['upload_path']   = './uploads/galleries';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['cat_images']['type']=$file['cat_images']['type'];
				$_FILES['cat_images']['tmp_name']=$file['cat_images']['tmp_name'];
				$_FILES['cat_images']['error']=$file['cat_images']['error'];
				$_FILES['cat_images']['size']=$file['cat_images']['size'];
				$this->upload->do_upload('cat_images');
				if($this->input->post('old_cat_images')!=''){
					@unlink('./uploads/galleries/'.$this->input->post('old_cat_images'));
				}

			}else{
				if($this->input->post('old_cat_images')!=''){
					$final_img = $this->input->post('old_cat_images');
				}
			}

				 
			$value_array = array(
							'cat_images'=>$final_img,
							'cat_name'=>addslashes($this->security->xss_clean($this->input->post('cat_name'))),
							'colour_type' =>$this->security->xss_clean($this->input->post('colour_type')),
							'image_name' => $final_imgBlockImage,
							'sort_no' =>$this->security->xss_clean($this->input->post('sort_no')),
							
			);
			 
		}
		if ($this->input->post('mode')=="add"){
			///$add_data['cat_name']=;			
			$this->common->add_records($tbl, $value_array);
			$this->session->set_flashdata('Success',"Record added successfully!");
			redirect("webmaster/categories/category_list");
		}

		if ($this->input->post('mode')=="update"){
			//$up_data['cat_name']=addslashes($this->security->xss_clean($this->input->post('cat_name')));
			$this->common->update_entry($tbl, $value_array, $where);
			$this->session->set_flashdata('Success',"Record updated successfully!");
			redirect("webmaster/categories/category_list");
		}
		$this->load->view("webmaster/manage_category",$data);
	}
	
	function delete_category(){
		$data['act_id']="CMS"; $tbl = "tbl_galleries";

		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				
				$where = array( "cat_id " => $delid[$i] );
				$select = "*";
				$form_data  = $this->common->getOneRowArray($select, $tbl, $where);
				@unlink('./uploads/galleries/'.$form_data['cat_images']);
				@unlink('./uploads/galleries/'.$form_data['image_name']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/categories/category_list");
	}
	//---------Style 
	function style_list(){
		$data['act_id']="CMS";
		$data['sub_act_id']="";
		$data['sub_sub_act_id']="style_list";

		$where=" order by cms_cat_id,";
		$data['num_rec'] = $num_rec = $this->common->num_style();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_style();
		}
		$this->load->view("webmaster/style_list",$data);
	}
	
	function manage_style($cat_id=0){
		$data['act_id']="CMS"; 
		$data['cat_id'] = $cat_id;
		$tbl = "tbl_style";
		
		if($cat_id>0){
			$data['btnCapt'] = "update";
			$select = "cat_id, cat_name,colour_type,image_name";
			$where = array('cat_id' => $cat_id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['cat_name'] = '';
			$data['form_data']['colour_type'] = '';
		}

		$this->form_validation->set_rules('cat_name', 'Style Title', 'trim|required');
		if($this->form_validation->run())
		{

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

					if(!is_dir('./uploads/style_images/')){
						mkdir('./uploads/style_images/');
					}
			 		if($_FILES['image_name']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['image_name']['name'] = $file['image_name']['name'];					
						
						$filename = str_replace(' ','_','style-img')."_".uniqid();
						$path = $_FILES['image_name']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/style_images';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['image_name']['type']=$file['image_name']['type'];
						$_FILES['image_name']['tmp_name']=$file['image_name']['tmp_name'];
						$_FILES['image_name']['error']=$file['image_name']['error'];
						$_FILES['image_name']['size']=$file['image_name']['size'];
						$this->upload->do_upload('image_name');
						$this->common->create_thumb_resize($final_img,'./uploads/style_images/','302','255');
						if($this->input->post('old_image_name')!=''){
							@unlink('./uploads/style_images/'.$this->input->post('old_image_name'));
						}

					}else{
						if($this->input->post('old_image_name')!=''){
							$final_img = $this->input->post('old_image_name');
						}
					}
			} 



			$value_array = array(
					'cat_name'=>$this->input->post('cat_name'),
					'colour_type'=>$this->input->post('colour_type'),
					'image_name'=>$final_img
					);

			if($cat_id>0){
 				$this->common->update_entry($tbl,$value_array,$where);
				$this->session->set_flashdata('Success',"Record updated successfully!");
				redirect("webmaster/categories/style_list");

			}else{
		 		$this->common->add_records($tbl,$value_array);
				$this->session->set_flashdata('Success',"Record added successfully!");
				redirect("webmaster/categories/style_list");
			}
		}
		$this->load->view("webmaster/manage_style",$data);
	}
	
	function delete_style(){
		$data['act_id']="CMS";
		$tbl = "tbl_style";
		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where = array( "cat_id " => $delid[$i] );
				$dataDs = $this->common->getOneRowArray('*',$tbl,$where);
				@unlink('./uploads/style_images/'.$dataDs['image_name']);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/categories/style_list");
	}
    
    function more_featured_artists()
    {
        $data['act_id'] = "CMS";
        $data['sub_act_id']="";
        $data['sub_sub_act_id']='more_featured_artists';
        //$query = $this->db->query("Select user.id,user.first_name,user.last_name,user.style_id,user.is_featured,gal.user_id,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where user.is_featured !='0000-00-00' and user.user_type='artist' and user.id=gal.user_id and user.is_admin_active=1  group by gal.user_id order by user.is_featured asc, user.first_name asc, user.last_name asc");
        $query = $this->db->query("Select gal.id, user.id as uid,user.first_name,user.last_name,user.galleries_id,user.is_featured,gal.user_id,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where user.is_featured !='0000-00-00' and user.user_type='artist' and user.id=gal.user_id and user.is_admin_active=1  group by gal.user_id order by user.is_featured asc, user.first_name asc, user.last_name asc");
        //$query = $this->db->query("Select * from tbl_user_master as user where user.is_featured = '1' and user.user_type='artist' and user.is_admin_active=1 order by user.is_featured asc, user.first_name asc, user.last_name asc");       
        
        /*$this->CI->db->select('*');
        $this->CI->db->from('tbl_user_master user'); 
        $this->CI->db->join('tbl_country cn', 'cn.id=ct.country_id', 'left');
        $this->CI->db->where(array('id' => $id));
        $query = $this->CI->db->get(); */
        
        $data['remainingFeature'] = $query->result_array();
        
       //echo "<pre>";
       //print_r($query->result_array());
        
        $this->load->view("webmaster/more_featured_artists",$data);
    }

	//---------Country 
	function country_list(){
		$data['act_id']="CMS";
		$data['sub_act_id']="";
		$data['sub_sub_act_id']="country_list";

		$where=" order by cms_cat_id";
		$data['num_rec'] = $num_rec = $this->common->num_country();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_country();
		}
		$this->load->view("webmaster/country_list",$data);
	}
	
	function manage_country($id=0){
		$data['act_id']="CMS"; 
		$data['id'] = $id;
		$tbl = "tbl_country";
		
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "id, country_name";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['country_name'] = '';
		}

		$this->form_validation->set_rules('country_name', 'Country Name', 'trim|required');
		$this->form_validation->set_rules('country_code', 'Country Code', 'trim|required');
		if($this->form_validation->run())
		{
 			$value_array = array(
					'country_name'=>$this->input->post('country_name'),
					'country_code'=>$this->input->post('country_code')
			);
			if($id>0){
 				$this->common->update_entry($tbl,$value_array,$where);
				$this->session->set_flashdata('Success',"Record updated successfully!");
				redirect("webmaster/categories/country_list");

			}else{
		 		$this->common->add_records($tbl,$value_array);
				$this->session->set_flashdata('Success',"Record added successfully!");
				redirect("webmaster/categories/country_list");
			}
		}
		$this->load->view("webmaster/manage_country",$data);
	}
	
	function operation_country(){

    	if(isset($_POST['update']))
    	{
    	    $data['act_id']="CMS";
            $tbl = "tbl_country";
            
            for($i=0;$i<count($this->security->xss_clean($this->input->post('cid')));$i++)
            {
            	$allid  =   $this->security->xss_clean($this->input->post('cid'));
            	$cv = $this->security->xss_clean($this->input->post('cv'));
                   
            	if (empty($cv)) {
                    $update_all = array( "view_on_map" => 0 );
                } else {	
                    if (in_array($allid[$i], $cv)) {
                        $update_all = array( "view_on_map" => 1 );
                    } else {
                        $update_all = array( "view_on_map" => 0 );
                    }
            	}
            	
            	$where_all = array( "id " => $allid[$i] );

            	$this->common->update_entry( $tbl, $update_all, $where_all);
            }
            
            $this->session->set_flashdata("Success", "Record updated successfully!");	
            
            redirect("webmaster/categories/country_list");
            
    	}
    	if(isset($_POST['update_column']))
    	{
    	    $data['act_id']="CMS";
            $tbl = "tbl_country";
            
           
            for($i=0;$i<count($_POST['cid']);$i++)
            {
            	$allid  =   $this->security->xss_clean($this->input->post('cid'));
            	$vc = $this->security->xss_clean($this->input->post('view_on_column'));
                //print_r($vc);
                $update_all = array( "view_on_column" => $vc[$i] );
                /*if ($vc=='1') {
                    $update_all = array( "view_on_column" => 1 );
                } else {	
                    if (in_array($allid[$i], $vc)) {
                        $update_all = array( "view_on_column" => $vc[$i] );
                        //print_r($update_all);
                        //exit;
                    } else {
                        $update_all = array( "view_on_column" => 1 );
                    }
            	}*/
            	
            	
            	
            	$where_all = array( "id " => $allid[$i] );

            	$this->common->update_entry( $tbl, $update_all, $where_all);
            }
            
            $this->session->set_flashdata("Success", "Record updated successfully!");	
            
            redirect("webmaster/categories/country_list");
            
    	}
    	
    	if(isset($_POST['delete']))
    	{
            $data['act_id']="CMS";
            $tbl = "tbl_country";
            
            for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
            	$delid=$this->security->xss_clean($this->input->post('cb'));
            	
            	$where = array( "id " => $delid[$i] );
            	$this->common->delete_entry($tbl, $where);
            }
            $this->session->set_flashdata("Success", "Record deleted successfully!");	
            
            redirect("webmaster/categories/country_list");
        }
	}
	
	//---------City 
	function City_list(){
		$data['act_id']="CMS";
		$data['sub_act_id']="";
		$data['sub_sub_act_id']="city_list";

		$where=" order by id,";
		$data['num_rec'] = $num_rec = $this->common->num_city();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_city_list();
		}
		$this->load->view("webmaster/city_list",$data);
	}
	function manage_city($id=0){ 
	    $data['act_id']="CMS"; 
		$data['id'] = $id;
		$tbl = "tbl_city";
		
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['city_name'] = '';
			$data['form_data']['country_id'] = '';
		}

		$this->form_validation->set_rules('city_name', 'City Name', 'trim|required');
		$this->form_validation->set_rules('country_id', 'Country Id', 'trim|required');
		if($this->form_validation->run())
		{
 			$value_array = array(
				'city_name'=>$this->input->post('city_name'),
				'country_id'=>$this->input->post('country_id')
			);
			if($id>0){
 				$this->common->update_entry($tbl,$value_array,$where);
				$this->session->set_flashdata('Success',"Record updated successfully!");
				redirect("webmaster/categories/city_list");

			}else{
		 		$this->common->add_records($tbl,$value_array);
				$this->session->set_flashdata('Success',"Record added successfully!");
				redirect("webmaster/categories/city_list");
			}
		}
		$this->load->view("webmaster/manage_city",$data);
	}
	
	function delete_city(){
		$data['act_id']="CMS";
		$tbl = "tbl_city";
		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where = array( "id " => $delid[$i] );
				$dataDs = $this->common->getOneRowArray('*',$tbl,$where);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/categories/city_list");
	}
   
   
   //---------Region 
	function region_list(){
		$data['act_id']="CMS";
		$data['sub_act_id']="";
		$data['sub_sub_act_id']="region_list";

		$where=" order by id,";
		$data['num_rec'] = $num_rec = $this->common->num_region();

		if($num_rec>0){
			$data['list_data'] = $this->common->get_region_list();
		}
		$this->load->view("webmaster/region_list",$data);
	}
	function manage_region($id=0){ 
	    $data['act_id']="CMS"; 
		$data['id'] = $id;
		$tbl = "tbl_region";
		
		if($id>0){
			$data['btnCapt'] = "update";
			$select = "*";
			$where = array('id' => $id );
			$data['form_data'] = $this->common->getOneRowArray($select, $tbl, $where);
		}else{
			$data['btnCapt'] = "add";
			$data['form_data']['region_name'] = '';
			$data['form_data']['country_id'] = '';
		}

		$this->form_validation->set_rules('region_name', 'Region Name', 'trim|required');
		$this->form_validation->set_rules('country_id', 'Country Id', 'trim|required');
		if($this->form_validation->run())
		{
 			$value_array = array(
				'region_name'=>$this->input->post('region_name'),
				'country_id'=>$this->input->post('country_id')
			);
			if($id>0){
 				$this->common->update_entry($tbl,$value_array,$where);
				$this->session->set_flashdata('Success',"Record updated successfully!");
				redirect("webmaster/categories/region_list");

			}else{
		 		$this->common->add_records($tbl,$value_array);
				$this->session->set_flashdata('Success',"Record added successfully!");
				redirect("webmaster/categories/region_list");
			}
		}
		$this->load->view("webmaster/manage_region",$data);
	}
	
	function delete_region(){
		$data['act_id']="CMS";
		$tbl = "tbl_region";
		if($this->security->xss_clean($this->input->post('action')=="delete")){
			for($i=0;$i<count($this->security->xss_clean($this->input->post('cb')));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where = array( "id " => $delid[$i] );
				$dataDs = $this->common->getOneRowArray('*',$tbl,$where);
				$this->common->delete_entry($tbl, $where);
			}
			$this->session->set_flashdata("Success", "Record deleted successfully!");			
		}
		redirect("webmaster/categories/region_list");
	}
	 
}?>