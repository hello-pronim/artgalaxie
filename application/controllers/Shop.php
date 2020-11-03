<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Shop extends CI_Controller{
		public function __construct(){
		parent::__construct();
		$this->load->model('Frontend_model','frontend');
	}

 	function index(){
 	    
 	    //print_r($_POST);
 	    
		$id = 20;
		$data['act_id'] = "shop";

		$data['mem_id'] = $this->session->userdata('CUST_ID');
		$data['cmsData'] =   $this->frontend->getCMSdata($id);
		$data['shopData'] = $this->frontend->getShops(0);
	
		$bookfilterName = $this->input->post('bookfilterName');
		
		$data['bookShopData'] = $this->frontend->getShopBooks($bookfilterName);
		
		$cuid = $this->session->userdata('CUST_ID');
		
		$data['CollectionFolderName'] = $this->common->GetProductAddedInCollectionFolderNameAll($cuid);
	
		
		$data['bookShopLink'] = $this->frontend->getShopLinks();
		
		$data['dimetion']           = $this->common->getAllRowArray('*','tbl_product_dimensions',array('1' => 1 ));
		$data['color']              = $this->common->getAllRowArray('*','tbl_product_color',array('1' => 1 ));
		$data['artCatRs']           = $this->common->get_galleries();
		$data['artCatStyle']        = $this->common->get_styles();
		$data['artOrientation']     = $this->common->get_orientation();
		$data['artCatSubject']      = $this->common->get_subject();
		$data['artCatPriceRange']   = $this->common->get_price_range();
		$data['artCatSize']         = $this->common->get_size();
		$data['artCatMedium']       = $this->common->get_medium();
		$data['artCatunits']        = $this->common->get_units();
		
		/*$data['artCatcountry']      = $this->common->get_country();
		$data['artCatcity']         = $this->common->get_city();
		$data['artCatRegion']       = $this->common->get_region();
		
		$select ="id,first_name,last_name,user_type";
		$where = "user_type='artist'";
		$data['num_rec'] = $num_rec = $this->common->num_users($where);
		if($num_rec){
			$data['artistDs'] = $this->common->getUserList($select,$where);
		}*/
		
		$select= 'DISTINCT(pd.country), cn.*';
		$tbl= 'tbl_products pd';
		$join_tbl = 'tbl_country cn';
		$join_cond = 'cn.id = pd.country';
		$where = "";
		$data['num_rec1'] = $num_rec1 = $this->common->GetShopFieldearch(1,$select,$tbl,$join_tbl,$join_cond,$where);
		if($num_rec1){
			$data['artCatcountry'] = $this->common->GetShopFieldearch(0,$select,$tbl,$join_tbl,$join_cond,$where);
		}
		
		$select= 'DISTINCT(pd.city), ct.*';
		$tbl= 'tbl_products pd';
		$join_tbl = 'tbl_city ct';
		$join_cond = 'ct.id = pd.city';
		$where = "";
		$data['num_rec2'] = $num_rec2 = $this->common->GetShopFieldearch(1,$select,$tbl,$join_tbl,$join_cond,$where);
		if($num_rec2){
			$data['artCatcity'] = $this->common->GetShopFieldearch(0,$select,$tbl,$join_tbl,$join_cond,$where);
		}
		
		$select= 'DISTINCT(pd.region), r.*';
		$tbl= 'tbl_products pd';
		$join_tbl = 'tbl_region r';
		$join_cond = 'r.id = pd.region';
		$where = "";
		$data['num_rec3'] = $num_rec3 = $this->common->GetShopFieldearch(1,$select,$tbl,$join_tbl,$join_cond,$where);
		if($num_rec3){
			$data['artCatRegion'] = $this->common->GetShopFieldearch(0,$select,$tbl,$join_tbl,$join_cond,$where);
		}
		
		$select= 'DISTINCT(pd.artist_id), u.*';
		$tbl= 'tbl_products pd';
		$join_tbl = 'tbl_user_master u';
		$join_cond = 'u.id = pd.artist_id';
		$where = array('u.user_type'=>'artist');
		$data['num_rec'] = $num_rec = $this->common->GetShopFieldearch(1,$select,$tbl,$join_tbl,$join_cond,$where);
		if($num_rec){
			$data['artistDs'] = $this->common->GetShopFieldearch(0,$select,$tbl,$join_tbl,$join_cond,$where);
		}
		
		$this->load->view('mainsite/shop',$data);
	}

	function collectArtWork(){
		if(extract($_POST)){
 			$shopId = $this->input->post('shopId');
		 	$userId = $this->input->post('userId');
		 	$value_array =   array(
				'shop_id' => $shopId,
				'member_id' => $userId,
			);
			$this->common->add_records('tbl_product_collection',$value_array);
			echo "Done";
 		}else{
 			echo "Error";
 		}
	}
	
	function collectArtWorkAdd()
	{
 		if(isset($_POST['productid']))
 		{
 		    $productid = $_POST['productid'];
 		}
 		$shopid = $_POST['shopid'];
	 	$userId = $_POST['userid'];
	 	$collId = $_POST['collectionfolderid'];
	 	
	 	$value_array =   array(
			'product_id' => $productid,
			'shop_id' => $shopid,
			'member_id' => $userId,
			'collection_folder_id' => $collId,
		);
		$this->common->add_records('tbl_product_collection',$value_array);
		
		redirect('shop');
 	
	}

	function shopLike(){
 		if(extract($_POST)){
 			$shop_id = $this->input->post('shopId');
		 	$userId = $this->input->post('userId');
		 	$productId = $this->input->post('productId');
		 	$value_array =   array(
				'shop_id' => $shop_id,
				'product_id' => $productId,
				'member_id' => $userId
			);
			$this->common->add_records('tbl_product_like',$value_array);
			$count = $this->common->getTotalLikeForProduct($shop_id,$productId);  
			echo "Done####".$count;
 		}
	}
	
	
	function removedFav() 
	{
        if(extract($_POST))
     	{
     	    $bookId = $this->input->post('bookId');
     	    $userId = $this->input->post('userId');
     	    $productId = $this->input->post('productId');
    	 	$value_array =   array(
    			'shop_id' => $bookId,
    			'product_id' => $productId,
    			'member_id' => $userId
    		);
    		$this->common->delete_entry('tbl_product_like',$value_array);
    		echo "Done";
     	}
    }
    function removedCollectionShop() 
	{
        if(extract($_POST))
     	{
     	    $shopId = $this->input->post('shopId');
     	    $userId = $this->input->post('userId');
    	 	$value_array =   array(
    			'shop_id' => $shopId,
    			'member_id' => $userId
    		);
    		$this->common->delete_entry(' tbl_product_collection',$value_array);
			
    		echo "Done";
     	}
    }
    
    function removedCollectionPro() 
	{
        if(extract($_POST))
     	{
     	    $proId = $this->input->post('proId');
     	    $userId = $this->input->post('userId');
    	 	$value_array =   array(
    			'product_id' => $proId,
    			'member_id' => $userId
    		);
    		$this->common->delete_entry(' tbl_product_collection',$value_array);
    		
    		echo "Done";
     	}
    }
    
    
	
	function citylist(){
	    if(extract($_POST)){
 			$countryId = $this->input->post('countryId');
 			$value_array =   array(
				'country_id' => $countryId
			);
			if($countryId == 0){
			    $resDs = $this->common->get_city();
			} else {
			    $resDs = $this->common->get_city($value_array);
			}
			$result = "";
			foreach($resDs as $resRs){
			    $result .= "<option value='".$resRs['id']."'>".$resRs['city_name']."</option>";
			}
			echo "Done####".$result;
 		}
	}
	
	function countrylist(){
	    if(extract($_POST)){
	        $result = ""; $resDs = '';
 			$regionId = $this->input->post('regionId');
 			$value_array =   array(
				'id' => $regionId
			);
			if($regionId == 0){
			    $resRegionDs = $this->common->get_region();
			    $resDs = $this->common->get_country();
			    foreach($resDs as $resRs){
    			    $result .= "<option value='".$resRs['id']."'>".$resRs['country_name']."</option>";
    			}
			} else {
			    $resRegionDs = $this->common->get_region($value_array);
			    foreach($resRegionDs as $resRegionRs){
			        $resDs = '';
    			    $value_array_cntry = array(
    			        'id' => $resRegionRs['country_id']
    			    );
    			    $resDs = $this->common->get_country($value_array_cntry);
    			    foreach($resDs as $resRs){
        			    $result .= "<option value='".$resRs['id']."'>".$resRs['country_name']."</option>";
        			}
    			}
			}
			echo "Done####".$result;
 		}
	}
	
}?>