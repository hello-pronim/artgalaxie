<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');
	}

	function index(){		
		$data['act_id']="product_attr";
		$data['sub_act_id'] = 'manageProduct';
		$tbl = "tbl_products";
		$select ="*";
		$where = "1=1";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/productlist",$data);			
	}
 	
 	function manage_products($id=0)
 	{
       	$data['userData']='';
 	 	$data['act_id']='product_attr';
 	 	$data['sub_act_id'] = 'manageProduct';
 	 	$data['id']=$id;
 	 	$tbl = 'tbl_products';
 	 	
		$data['dimetion']           = $this->common->getAllRowArray('*','tbl_product_dimensions',array('1' => 1 ));
		$data['color']              = $this->common->getAllRowArray('*','tbl_product_color',array('1' => 1 ));
		$data['artCatRs']           = $this->common->get_galleries();
		$data['artCatStyle']        = $this->common->get_styles();
		$data['artCatRegion']       = $this->common->get_region();
		$data['artCatSubject']      = $this->common->get_subject();
		$data['artCatPriceRange']   = $this->common->get_price_range();
		$data['artCatSize']         = $this->common->get_size();
		$data['artCatMedium']       = $this->common->get_medium();
		$data['artCatunits']        = $this->common->get_units();
		$data['artCatcountry']      = $this->common->get_country();
		$data['artCatcity']         = $this->common->get_city();
		$data['artOrientation']         = $this->common->get_orientation();
		
		
		$select ="id,first_name,last_name,user_type";
		$where = "user_type='artist'";
		$data['num_rec'] = $num_rec = $this->common->num_users($where);
		
		if($num_rec)
		{
			$data['artistDs'] = $this->common->getUserList($select,$where);
		}
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

		$this->form_validation->set_rules('product_title', 'Title', 'trim|required');
		
 		if($this->form_validation->run())
		{
			
			$flag=0;
		  	if($_FILES['prod_image']['name']!='')
		  	{
					$flag=0;
					$path_img = $_FILES['prod_image']['name'];
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
			 		if($_FILES['prod_image']['name']!=''){
					
						$file=$_FILES;	
						$_FILES['prod_image']['name'] = $file['prod_image']['name'];					
						
						$filename = str_replace(' ','_','product')."_".uniqid();
						$path = $_FILES['prod_image']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);							
						
						$final_img = $filename.".".$ext;					
						
						$this->load->library('upload');
						$config['file_name']     = $filename;
						$config['upload_path']   = './uploads/products';
						$config['allowed_types'] = 'png|jpeg|jpg|gif';
									
						$this->upload->initialize($config);					
						$_FILES['prod_image']['type']=$file['prod_image']['type'];
						$_FILES['prod_image']['tmp_name']=$file['prod_image']['tmp_name'];
						$_FILES['prod_image']['error']=$file['prod_image']['error'];
						$_FILES['prod_image']['size']=$file['prod_image']['size'];
						$this->upload->do_upload('prod_image');
						if($this->input->post('old_prod_image')!=''){
							@unlink('./uploads/products/'.$this->input->post('old_prod_image'));
						}

					}else{
						if($this->input->post('old_prod_image')!=''){
							$final_img = $this->input->post('old_prod_image');
						}
					}
                    
                    $sel_colour_type = $this->input->post('colour_type');
                    $ct ='';
                    foreach($sel_colour_type as $chk1) 
                    { 
                        $ct.= $chk1.","; 
                    } 
                    
                   
						$value_array = array(
										'product_title'=>$this->input->post('product_title'),
										'product_desc'=>$this->input->post('product_desc'),
										'product_year'=>$this->input->post('product_year'),
										'artist_id'=>$this->input->post('artist_id'),
										'art_cat'=>$this->input->post('art_cat'),
										'product_dimention'=>$this->input->post('dimetion'),
										'product_price'=>$this->input->post('product_price'),
										'colour_type'=>$ct,
										'medium'=>$this->input->post('medium'),
										'style'=>$this->input->post('style'),
										'subject'=>$this->input->post('subject'),
										'region'=>$this->input->post('region'),
										'country'=>$this->input->post('country'),
										'city'=>$this->input->post('city'),
										'size'=>$this->input->post('size'),
										'actual_size'=>$this->input->post('actual_size'),
										'pricerange'=>$this->input->post('pricerange'),
										'add_to_cart'=>$this->input->post('add_to_cart'),
										'add_to_cart2'=>$this->input->post('add_to_cart2'),
										'cur_choice'=>$this->input->post('cur_choice'),
										'sold'=>$this->input->post('sold'),
										'units'=>$this->input->post('units'),
										'orientation'=>$this->input->post('orientation'),
										'product_images'=>$final_img,
										'sort_order' => $this->input->post('sort_order')
						);
					
						if($id>0){
			 				$where_array=array('id'=>$id);
							$this->common->update_entry($tbl,$value_array,$where_array);
							$this->session->set_flashdata('Success','Products updated successfully.');
							redirect('webmaster/products/index','refresh');

						}else{
					 		$this->common->add_records($tbl,$value_array);
							$new_registration_id =	$this->db->insert_id();			
							
							$this->session->set_flashdata('Success','Products added successfully.');  
							redirect('webmaster/products/index','refresh');
						}
			}else{
				$this->session->set_flashdata('Error',"Please upload valid PNG/JPG/JPEG/GIF extension");
			}
		} 
 		$this->load->view('webmaster/manage_product',$data);
	} 
	 
	public function delete_products(){
		if($this->input->post('action')=="delete"){
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);
				$dataDs = $this->common->getOneRowArray('*',"tbl_products",$where);
				@unlink('./uploads/products/'.$dataDs['prod_image']);
				$this->common->delete_entry("tbl_products",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/products/index','refresh');
		}
		redirect('webmaster/products/index','refresh');
	}
	
	
	
	
}?>