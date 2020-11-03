<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shop extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('ADMIN_ID')=="") redirect('secure','refresh');
	 	$this->load->model('Admin_model','admin');
	}

	function index(){		
		$data['act_id']="product_attr";	
		$data['sub_act_id']="managebooks";
			
		$tbl = "tbl_shop_book";
		$select ="*";
		$where = "1=1";
		$data['num_rec'] = $num_rec = $this->common->getnumRow($tbl,$where);
		if($num_rec){
			$data['dataDs'] = $this->common->getAllRowArray($select,$tbl,$where);
		}
		$this->load->view("webmaster/books",$data);			
	}
	
 	function manage_book($id=0)
 	{
 	 	$data['userData']='';
 	 	$data['act_id']="product_attr";	
		$data['sub_act_id']="managebooks";
		
 	 	$data['id']=$id;
 	 	$tbl = 'tbl_shop_book';
 	 	$data['filter'] = $this->common->get_filter();
		//$data['dimetion'] = $dimetion = $this->common->getAllRowArray('*','tbl_product_dimensions',array('1' => 1 ));
		//$data['color'] =  $this->common->getAllRowArray('*','tbl_product_color',array('1' => 1 ));
		//$data['artCatRs'] = $this->common->get_galleries();
		//$select ="id,first_name,last_name,user_type";
		//$where = "user_type='artist'";
		//$data['num_rec'] = $num_rec = $this->common->num_users($where);
		//if($num_rec){
		//	$data['artistDs'] = $this->common->getUserList($select,$where);
		//}
		
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
 	
		$this->form_validation->set_rules('book_title', 'Title', 'trim|required');
		$this->form_validation->set_rules('look_inside', 'Take a look inside', 'trim');
		$this->form_validation->set_rules('book_desc', 'Long Description', 'trim|required'); 
		$this->form_validation->set_rules('number_of_pages', 'Number Of pages', 'trim|numeric|required'); 
		$this->form_validation->set_rules('hardcover', 'Hardcover', 'trim'); 
		$this->form_validation->set_rules('softcover', 'Softcover', 'trim'); 
		$this->form_validation->set_rules('ebook', 'eBook', 'trim'); 
		$this->form_validation->set_rules('isbn', 'ISBN', 'trim|required'); 
		$this->form_validation->set_rules('book_price', 'Book Price', 'trim|required|numeric'); 
		//$this->form_validation->set_rules('add_to_cart', 'Add To Cart', 'required'); 
		//$this->form_validation->set_rules('product_year', 'Product Year', 'trim|required|numeric|max_length[4]'); 
		//$this->form_validation->set_rules('is_book', 'Book', 'trim|required'); 
 		if($this->form_validation->run())
		{	  
			$flag=0;
		  	if($_FILES['book_image']['name']!='')
		  	{
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
			if($flag==0)
			{
        		$final_img  = '';
			 	if($_FILES['book_image']['name']!='')
			 	{
    				$file=$_FILES;	
    				$_FILES['book_image']['name'] = $file['book_image']['name'];					
    						
    				$filename = str_replace(' ','_','shop_book')."_".uniqid();
    				$path = $_FILES['book_image']['name'];
    				$ext = pathinfo($path, PATHINFO_EXTENSION);							
    						
    				$final_img = $filename.".".$ext;					
    						
    				$this->load->library('upload');
    				$config['file_name']     = $filename;
    				$config['upload_path']   = './uploads/shop/books';
    				$config['allowed_types'] = 'png|jpeg|jpg|gif';
    									
    				$this->upload->initialize($config);					
    				$_FILES['book_image']['type']=$file['book_image']['type'];
    				$_FILES['book_image']['tmp_name']=$file['book_image']['tmp_name'];
    				$_FILES['book_image']['error']=$file['book_image']['error'];
    				$_FILES['book_image']['size']=$file['book_image']['size'];
    				$this->upload->do_upload('book_image');
    				if($this->input->post('old_prod_image')!='')
    				{
    				    @unlink('./uploads/shop/book/'.$this->input->post('old_prod_image'));
    				}
            	}else{
					if($this->input->post('old_book_image')!='')
					{
						$final_img = $this->input->post('old_book_image');
					}
				}
				
				$filter = 0;
				if($this->input->post('book_type')!=''){
					$filter = @implode(',',$this->input->post('book_type'));
				}else{
					$filter = 0;
				}

				$html_code=$this->input->post('add_to_cart');
				$html_code2=$this->input->post('add_to_cart2');
				$val=htmlentities($html_code);
		 
				$value_array = array(
								'book_title'=>$this->input->post('book_title'),
								'book_type'=>$filter,
								'take_a_look_inside'=>$this->input->post('look_inside'),
								'book_desc'=>$this->input->post('book_desc'),
								'number_of_pages'=>$this->input->post('number_of_pages'),
								'hardcover'=>$this->input->post('hardcover'),
								'softcover'=>$this->input->post('softcover'),
								'ebook'=>$this->input->post('ebook'),
								'isbn'=>$this->input->post('isbn'),
								'book_price'=>$this->input->post('book_price'),
								'add_to_cart'=>$html_code,
								'add_to_cart2'=>$html_code2,
								'book_images'=>$final_img,
								'sort_order' => $this->input->post('sort_order')
						);
			//var_dump($value_array);
				if($id>0)
				{
			 		$where_array=array('id'=>$id);
					$this->common->update_entry($tbl,$value_array,$where_array);//echo $this->db->last_query();exit;
					$this->session->set_flashdata('Success','Products updated successfully.');
					redirect('webmaster/shop/index','refresh');
				}else
				{
					$this->common->add_records($tbl,$value_array);
					$new_registration_id =	$this->db->insert_id();			
	
					$this->session->set_flashdata('Success','Books added successfully.');  
					redirect('webmaster/shop/index','refresh');
				}
			}else{
				$this->session->set_flashdata('Error',"Please upload valid PNG/JPG/JPEG/GIF extension");
			}
		} 
 		$this->load->view('webmaster/manage_book',$data);
	}
	
	public function delete_book()
	{
		if($this->input->post('action')=="delete")
		{
			for($i=0;$i<count($this->input->post('cb'));$i++){
				$delid=$this->security->xss_clean($this->input->post('cb'));
				$where= array("id " => $delid[$i]);
				$dataDs = $this->common->getOneRowArray('*',"tbl_shop_book",$where);
				@unlink('./uploads/shop/books/'.$dataDs['book_images']);
				$this->common->delete_entry("tbl_shop_book",$where);
			}
			$this->session->set_flashdata('Success','Record deleted successfully!');
			redirect('webmaster/shop/index','refresh');
		}
		redirect('webmaster/shop/index','refresh');
	}
	
	
}