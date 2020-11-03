<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_model extends CI_Model
{
    // Call the CI_Model constructor
    public function __construct()
    {
        parent::__construct();
    }
    
    function num_banner($type=0)
    {
    	$tbl="tbl_banners";
    	$where = array('banner_status' => '1','type' =>$type);
    	return $numRec = $this->common->getnumRow( $tbl, $where);
    }

    function get_banner($type=0)
    {
     	$select ="*";
        $tbl="tbl_banners";
        $where = array('banner_status' => '1','type' =>$type);
        if($this->num_banner($type)>0)
        {
            return $this->common->getAllRowArray( $select, $tbl, $where,'order_no','asc');
        }
        else
        {
            return 0;
        }
    }

    function numHomePageBlog()
    {
        $tbl="tbl_blogs";
        $where = array('show_home_page' => '1');
        return $numRec = $this->common->getnumRow( $tbl, $where );
    }
    
    function getHomePageBlog()
    {
        $select ="id,cat_id,blog_title,short_description,blog_image,added_by,added_date";
        $tbl="tbl_blogs";
        $where = array('show_home_page' => '1');
        $orderBy = "rand()";
        $limit = "12"; //string
        if($this->numHomePageBlog()>0)
        {
            return $this->common->getAllRowArray($select,$tbl,$where,$orderBy,'',$limit);
        }
        else 
        {
            return 0;
        }
    }
    
    //===============Other Links
    function numRowOtherLinks()
    {
        $this->db->select('*' );
        $this->db->from('tbl_other_links');
        $query = $this->db->get();
        return $query->num_rows();
    }
    function getOtherLink()
    {
      $this->db->select('*' );
      $this->db->from('tbl_other_links');
      $query = $this->db->get();
      return $query->result_array();
    }
    
    //===============FeatureArtist/user
    function numRowFeatureArtist($limit=1)
    {
        $this->db->select('tbl_user_master.*, tbl_artist_user.*' );
        $this->db->from( 'tbl_user_master');
        $this->db->where_not_in('tbl_user_master.is_featured','0000-00-00');
        $this->db->join('tbl_artist_user', 'tbl_user_master.id = tbl_artist_user.user_id');
        $this->db->order_by('tbl_user_master.is_featured','desc');
        $this->db->limit($limit);
        $query = $this->db->get();
        return  $this->db->count_all_results();
    }
    function getFeatureArtist($limit=1)
    {
        $this->db->select('tbl_user_master.*, tbl_artist_user.interview_desc,tbl_artist_user.feature_artwork_gallery_desc,tbl_artist_user.feature_short_inside_the_studio_desc,tbl_artist_user.feature_video_desc' );
        $this->db->from( 'tbl_user_master');
        $this->db->where_not_in('tbl_user_master.is_featured','0000-00-00');
        $this->db->where('tbl_user_master.user_type','artist');
        $this->db->join('tbl_artist_user', 'tbl_user_master.id = tbl_artist_user.user_id');
        $this->db->order_by('tbl_user_master.is_featured','desc');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->row_array();
    }
    function getFeatureArtistById($id)
    {
        $this->db->select('tbl_user_master.first_name,tbl_user_master.last_name,tbl_user_master.profile_pic, tbl_artist_user.interview_desc,tbl_artist_user.feature_artwork_gallery_desc,tbl_artist_user.feature_inside_the_studio_desc,tbl_artist_user.feature_video_desc,tbl_artist_user.featured_desc,tbl_artist_user.type,tbl_artist_user.feature_video' );
        $this->db->from( 'tbl_user_master');
        $this->db->where_not_in('tbl_user_master.is_featured','0000-00-00');
        $this->db->where('tbl_user_master.id',$id);
        $this->db->join('tbl_artist_user', 'tbl_user_master.id = tbl_artist_user.user_id');
        $this->db->order_by('tbl_user_master.id','desc');
       
        $query = $this->db->get();
        return $query->row_array();
    }
    
    // get artist name and their any one image
    function getArtistsAndTheirImageHavingGallery($limit='')
    { 
        $limits = ''; $uid = '';
        
        if($limit!='')
        {
            $limits = ' limit '.$limit;
        }
        
        /*if($_GET['id']!='')
        {
            $uid = $_GET['id'];
        }
        
        $query = $this->db->query("Select user.id,user.first_name,user.last_name,user.profile_pic,user.galleries_id,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where  user.user_type='artist' and user.id=gal.user_id  and user.galleries_id=".$uid." group by gal.user_id order by user.first_name,user.last_name asc ".$limits);
        */
        $query = $this->db->query("Select user.id,user.first_name,user.last_name,user.profile_pic,user.galleries_id,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where  user.user_type='artist' and user.id=gal.user_id group by gal.user_id order by user.first_name,user.last_name asc ".$limits);
        
        return $query->result_array();
        //$this->db->last_query();
    }
    
    // get artist name and their any one image
    function getFeatureArtistsAndTheirImage($id)
    { 
       //$query = $this->db->query("Select user.id,user.first_name,user.last_name,user.is_featured,gal.image_color,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where user.is_featured !='0000-00-00' and user.user_type='artist' and user.id=gal.user_id and user.is_admin_active=1 and user.id!=".$id." group by gal.user_id order by user.is_featured desc");
       $query = $this->db->query("Select user.id,user.first_name,user.last_name,user.is_featured,gal.image_color,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where user.is_featured !='0000-00-00' and user.user_type='artist' and user.id=gal.user_id and user.is_admin_active=1 group by gal.user_id order by user.is_featured desc");
       
       //$query = $this->db->query("Select * from tbl_user_master as user where user.is_featured = '1' and user.user_type='artist' and user.is_admin_active=1 order by user.is_featured asc, user.first_name asc, user.last_name asc");       
        //echo $this->db->last_query();
       // exit;
        return $query->result_array();
        
    }
    
    //===============FeatureArtist/user
    function getAllMostlyViewedArtist()
    { 
        //artist mostly viewed
        $query = $this->db->query("Select user.id,user.first_name,user.last_name,user.profile_pic,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where user.count > 0  AND  user.user_type='artist' and user.id=gal.user_id  and user.is_admin_active=1 group by gal.user_id order by user.count desc limit 0,24");
        return   $query->result_array(); //remember this when u write query.
    }
    
    function getRecentlyAddedArtist()
    { 
        //artist recently added
        //$query = $this->db->query("Select user.id,user.first_name,user.last_name,user.profile_pic,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where user.user_type='artist' and user.id=gal.user_id and user.is_admin_active=1 group by gal.user_id order by user.registration_date desc limit 0,4");
        $query = $this->db->query("Select user.id,user.first_name,user.last_name,user.profile_pic from tbl_user_master as user where user.user_type='artist' order by user.registration_date desc limit 0,12");
        return   $query->result_array(); //remember this when u write query.
    }
    
    //artist name by alphabetically
    function getAllArtistByNamesAndImage($stringOrder='') 
    { 
        /*$query = $this->db->query("Select user.id,user.first_name,user.last_name,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where user.first_name 
        REGEXP '^[$stringOrder].*$' and user.user_type='artist' and user.id=gal.user_id and user.is_admin_active=1 group by gal.user_id order by user.first_name asc, user.last_name asc");*/
        $query = $this->db->query("Select id, first_name, last_name, profile_pic from tbl_user_master where first_name 
                REGEXP '^[$stringOrder].*$' and user_type='artist' and is_admin_active=1 order by first_name ASC, last_name ASC");
        return   $query->result_array(); //remember this when u write query.
    }
    
    function getAllArtistByNames($stringOrder='',$limit='')
    {
       
        $limits='';
        if($limit!='')
        {
            $limits = " limit ".$limit;
        }
        $query = $this->db->query("Select id,first_name,last_name from tbl_user_master  where first_name 
        REGEXP '^[$stringOrder].*$' and user_type='artist' and is_admin_active=1  order by first_name ASC,last_name ASC ".$limits);
        return   $query->result_array(); //remember this when u write query.
    }
    
    function getArtistDetails($id)
    {
        $this->db->select('tbl_user_master.first_name,tbl_user_master.last_name,tbl_user_master.profile_pic, tbl_artist_user.essay, tbl_artist_user.biography,tbl_artist_user.statement,tbl_artist_user.exibition,tbl_artist_user.awards,tbl_artist_user.publication,tbl_user_master.count' );
        $this->db->from( 'tbl_user_master');
        $this->db->where('tbl_user_master.user_type','artist');
        $this->db->where('tbl_user_master.id',$id);
        $this->db->join('tbl_artist_user', 'tbl_user_master.id = tbl_artist_user.user_id');
        $query = $this->db->get();
        return $query->row_array();
    }
    
    function getArtistSlider($id,$type)
    {
        $tbl = "tbl_artist_slider";
        $where = array('user_id' => $id,'type' => $type );
        if($this->common->getnumRow($tbl,$where)>0)
        {
            return $this->common->getAllRowArray('*',$tbl,$where);
        }
        else
        {
            return '';
        }
    }
    
    // get artist name and their any one image
    function getStyleAndArtistImage($limit='')
    { 
        $limits = '';
        if($limit!='')
        {
            $limits = ' limit '.$limit;
        }
        $query = $this->db->query("select style.cat_id, style.cat_name, artist_gal.image_name FROM `tbl_style` AS style LEFT JOIN `tbl_user_master` AS user ON user.style_id = style.cat_id LEFT JOIN `tbl_artist_gallery` AS artist_gal ON artist_gal.user_id = user.id GROUP BY style.cat_id  ORDER BY artist_gal.is_feature desc ");
        $data = $query->result_array();
        return $data;
     }

    // get artist name and their any one image
    function getArtistsAndTheirImageHavingStyle($limit='')
    { 
        $limits = '';
        if($limit!='')
        {
            $limits = ' limit '.$limit;
        }
        $query = $this->db->query("Select user.id,user.first_name,user.last_name,user.style_id,user.profile_pic,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where  user.user_type='artist' and user.id=gal.user_id  and user.style_id!=0 group by gal.user_id order by user.first_name asc  ".$limits);
        return $query->result_array();
    }
    
    // get artist name and their any one image
    function getArtistsAndTheirImageHavingStyleId($id,$limit='')
    { 
        $limits = '';
        if($limit!='')
        {
            $limits = ' limit '.$limit;
        }
        $query = $this->db->query("Select user.id,user.first_name,user.last_name,user.style_id,user.profile_pic,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where  user.user_type='artist' and user.id=gal.user_id  and user.style_id=".$id." group by gal.user_id order by user.first_name asc  ".$limits);
        return $query->result_array();
    }
    
    //artist by country
    function getCountryNameHavingMaxArtist()
    {
      $query = $this->db->query(" select country, COUNT( `country` ) FROM `tbl_user_master` WHERE user_type ='artist' GROUP BY `country` ORDER BY country ASC LIMIT 0 , 1");
      return $query->result_array();
    }
    
    //country by Map Code
    function get_country_map_code()
    {
      $query = $this->db->query("select *FROM `tbl_country` WHERE view_on_map = 1");
      return $query->result_array();
    }
    
    function get_country_one()
    {
        $query = $this->db->query("select *FROM `tbl_country` WHERE view_on_column = 1  ORDER BY country_name ASC");
        return $query->result_array();
    }
    
    function get_country_two()
    {
        $query = $this->db->query("select *FROM `tbl_country` WHERE view_on_column = 2  ORDER BY country_name ASC");
        return $query->result_array();
    }
    
    function get_country_three()
    {
        $query = $this->db->query("select *FROM `tbl_country` WHERE view_on_column = 3  ORDER BY country_name ASC");
        return $query->result_array();
    }
    
    function get_country_four()
    {
        $query = $this->db->query("select *FROM `tbl_country` WHERE view_on_column = 4 ORDER BY country_name ASC");
        return $query->result_array();
    }

    function  getAllArtistByCountryAndImage($countryName)
    { 
        //$query = $this->db->query("Select user.id,user.first_name,user.last_name,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where country='".$countryName."' and user.user_type='artist' and user.id=gal.user_id group by gal.user_id order by user.first_name asc");
        $query = $this->db->query("Select * from tbl_user_master as user where country='".$countryName."' and user.user_type='artist' order by user.first_name asc");
		return $query->result_array(); //remember this when u write query.
    }
  
    //artist videos
    function getArtistNameIfVideosExists($start,$pcid)
    { 
        $cid_cond = $pcid;
        $query = $this->db->query("Select user.id,user.first_name,user.last_name,user.galleries_id from tbl_user_master as user,tbl_artist_videos as video where user.user_type='artist' ".$cid_cond." and user.id=video.user_id group by video.user_id order by user.first_name asc limit ".$start.", 5");
        return $query->result_array(); //remember this when u write query.
    }
    
    function otherSliderContent($type)
    {
        $where = array('page_name' => $type );
        $tbl = "tbl_image_video_slider";
        $numRow = $this->common->getnumRow($tbl,$where);   //echo $this->db->last_query();
        
        if($numRow>0)
        {
           return $this->common->getAllRowArray('*',$tbl,$where,'sort_no','desc','');
        }
        else
        {
          return "";
        }
    }

    function viewGalleryDetails($id)
    {
        $where = array('cat_id' => $id );
        $tbl = "tbl_regionwise_galleries";
        $numRow = $this->common->getnumRow($tbl,$where);
        
        if($numRow>0)
        {  
           return $this->common->getAllRowArray('*',$tbl,$where);
        }
        else
        {
          return "";
        }
    }

    function check_email($email)
    {
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
        
        if (preg_match($regex, $email)) 
        { 
           $vallid=1;
        } 
        else 
        { 
           $vallid=0;
        } 
        return $vallid;
    }
   
   function getCMSdata($id)
   {
        $tbl = "tbl_cms_pages";
        $where = array('pageid' => $id);
        if($this->common->getnumRow($tbl,$where)>0)
        {  
            return $this->common->getOneRowArray('*',$tbl,$where);

        }
        else
        {
            return '';
        }
    }
    
    /*----------------Services ---------------------*/
    function get_services_pages($pid)
    {
        $where = array('pid' => $pid );
        $select ="*";
        $tbl="tbl_services_pages";
        return $this->common->getAllRowArray( $select, $tbl, $where , 'id' , 'asc' ,'' );
    }
    /*----------------- Art Marketing ---------------------*/
    function getArtMarketing($select,$where  = array())
    {
        $select ="*";
        $tbl="tbl_art_marketing";
        return $this->common->getAllRowArray( $select, $tbl, $where , 'id' , 'asc' ,'' );
    }
    function getArtMarketingBoxes($where  = array())
    {
        $select ="*";
        $tbl="tbl_art_marketing_boxes";
        return $this->common->getAllRowArray( '*', $tbl, $where , 'id' , 'asc' ,'' );
    }
    /*----------------- Website ---------------------*/
    function getWebsite($where  = array())
    {
        $select ="*";
        $tbl="tbl_website";
        return $this->common->getAllRowArray( '*', $tbl, $where , 'id' , 'asc' ,'' );
    }
    /*----------------- VideoProduction ---------------------*/
    function getVideoProduction($where  = array())
    {
        $select ="*";
        $tbl="tbl_video_production";
        return $this->common->getAllRowArray( '*', $tbl, $where , 'id' , 'asc' ,'' );
    }
    /*----------------- exhibitions ---------------------*/
    function getExibition($where  = array())
    {
        $select ="*";
        $tbl="tbl_exibition";
        return $this->common->getAllRowArray( '*', $tbl, $where , 'id' , 'asc' ,'' );
    }
    function getExibitionSliders($where)
    {
        $select ="*";
        $tbl="tbl_art_marketing_boxes";
        return $this->common->getAllRowArray( '*', $tbl, $where , 'id' , 'asc' ,'' );
    }
    /*----------------Testimonials ---------------------*/
    function getTestimonials()
    {
        $where = array('is_approve' => 1, 'display'=>1);
        $select ="*";
        $tbl="tbl_testimonials";  
        return $this->common->getAllRowArray( $select, $tbl, $where , 'id' , 'desc' ,'' );
    }
    function getPrintingData()
    {  
        $query = $this->db->query("Select * from tbl_printing_categories as cat,tbl_printing_master as pri where  cat.cat_id=pri.cat_id    order by cat.cat_id asc ");
        return $query->result_array();
    }
    function get_tutorials()
    {
        if($this->numTutorials()>0)
        {
            $query = $this->db->query("Select tuto.title, tuto.id ,tuto.price, gal.tut_image from tbl_tutorials as tuto,tbl_tutorials_images as gal where    tuto.id=gal.tut_id group by gal.tut_id order by tuto.id desc");
            return $query->result_array(); 
        }
        else 
        {
            return 0;
        }
    }
    
    function numTutorials($id=0)
    {
        $tbl="tbl_tutorials";
        
        if($id==0)
        {
          $where = array('1' => '1');
        }
        else
        {
          $where = array($id  => $id);
        }
        return $numRec = $this->common->getnumRow( $tbl, $where );
    }
  
    function getOnetutorials($id)
    {
        if($this->numTutorials($id)>0)
        {
            $query = $this->db->query("Select *  from tbl_tutorials where id =".$id);
            return $query->row_array(); 
        }
        else 
        {
            return 0;
        }    
    }
    
    function getShops($type=0)
    {
        $tbl    = 'tbl_products';
        $where  = array('1' => 1);
        
        if($this->common->getnumRow( $tbl, $where) > 0 )
        {
            //$query = $this->db->query(" select p.* , g.cat_name, u.first_name, u.last_name,u.id as userID,u.country as country_name,pd.length, pd.width, pd.height, pc. title FROM tbl_products AS p, tbl_galleries AS g, tbl_user_master AS u,tbl_product_dimensions  as pd,  tbl_product_color as pc WHERE p.art_cat = g.cat_id AND p.artist_id = u.id AND p.product_dimention = pd.id and p.colour_type = pc.id  and p.is_book =".$type." ORDER BY p.sort_order ASC  ");
            $this->db->select('*, u.country as country_name,p.id as pid, ct.id as ctid, p.colour_type as pcolour_type');
            $this->db->from('tbl_products p');
            $this->db->join('tbl_galleries g', 'p.art_cat=g.cat_id', 'left');
            $this->db->join('tbl_user_master u', 'p.artist_id=u.id', 'left');
            $this->db->join('tbl_product_color pc', 'p.colour_type=pc.id', 'left');
            $this->db->join('tbl_units un', 'p.units=un.id', 'left');
            $this->db->join('tbl_city ct', 'p.city=ct.id', 'left');
            $this->db->where(array('p.is_book'=> $type));
            $this->db->order_by("p.sort_order",'ASC');
            $query = $this->db->get(); 
            //echo $this->db->last_query();
            //exit;
            return $query->result_array();
        }
        else
        {
            return 0;
        }
    }
  
    /*  function getShopBooks($type=0){
        $select ="*";
        //$where = array('1' => 1);
        $tbl="tbl_shop_book";
        return $this->common->getAllRowArray( $select, $tbl, $where );
        /*if($this->common->getnumRow( $tbl, $where) > 0 ){
          $query = $this->db->query("select * , g.cat_name, u.first_name, u.last_name,u.id as userID,u.country,pd.length, pd.width, pd.height, pc. title FROM tbl_products AS p, tbl_galleries AS g, tbl_user_master AS u,tbl_product_dimensions  as pd,  tbl_product_color as pc WHERE p.art_cat = g.cat_id AND p.artist_id = u.id AND p.product_dimention = pd.id and p.colour_type = pc.id  and p.is_book =".$type." ORDER BY p.id DESC  ");
          return $query->result_array();
        }else{
            return 0;
        }*/
    //  }*/
    
        function getShopBooks($bookfilterName)
        {
            $select ="*";
            $bookfilterName= $bookfilterName ? $bookfilterName : 1;
            $where = array('1' => 1);
            $tbl="tbl_shop_book";
            //$query = $this->db->query("select b.* FROM tbl_shop_book b WHERE find_in_set($bookfilterName,b.book_type) >0 ");
            $query = $this->db->query("select b.* FROM tbl_shop_book b order by sort_order ASC");
            return $query->result_array();
            //return $this->common->getAllRowArray( $select, $tbl, $where );
        }
        
        function getShopLinks()
        {
            $select ="*";
            $tbl="tbl_shop_links";
            $where = array('link_for' => 0);
            
            return $this->common->getAllRowArray( $select, $tbl, $where );
        }
        
        /* --------------- IP  Counter ------------------ */
        function ip_vistor()
        {
            // get the IP address
            $ip =$this->input->ip_address();  
            $where = array('visitor_ip' => $ip);
            $numRow =  $this->common->getnumRow("tbl_visitor",$where); 
            
            if($numRow == 0)
            //if($numRow >= 0)
            {
              $in_data =   array('visitor_ip' => $ip,  'visited_date_time' => date("Y-m-d  h:i:s"));
              $this->common->insert_entry("tbl_visitor",$in_data);
            }
        }
   
        /* --------------- IP Counter ------------------ */    
        function getAllArtist($id)
        {
            $query = $this->db->query("Select *  from tbl_regionwise_galleries where cat_id =".$id);
            return $query->row_array();  
        }
        
        /* function getbook($where  = array()){
        $select ="*";
        $tbl="tbl_just_giving_book";
        return $this->common->getAllRowArray( '*', $tbl, $where , 'id' , 'asc' ,'' );
        }*/
        /*    function getartwebsite($where  = array()){
        $select ="*";
        $tbl="tbl_just_giving_websites";
        return $this->common->getAllRowArray( '*', $tbl, $where , 'id' , 'asc' ,'' );
        }*/
        /*function getjustgivingvideo($where  = array()){
        $select ="*";
        $tbl="tbl_just_giving_video";
        return $this->common->getAllRowArray( '*', $tbl, $where , 'id' , 'asc' ,'' );
        }*/
        
        function getbook()
        {
            //$this->db->select('tbl_just_giving_book.id,tbl_just_giving_book.publication_id,tbl_just_giving_book.giving_book_text,tbl_just_giving_book.banner_image,tbl_user_master.id,tbl_user_master.first_name,tbl_user_master.last_name');
            //$this->db->from('tbl_just_giving_book');
            //$this->db->join('tbl_user_master', 'tbl_user_master.id=tbl_just_giving_book.artist_id');
            //$this->db->order_by('tbl_just_giving_book.id','asc');
            
            $this->db->select('*');
            $this->db->from('tbl_just_giving_book');
            //$this->db->join('tbl_user_master', 'tbl_user_master.id=tbl_just_giving_book.artist_id');
            $this->db->order_by('tbl_just_giving_book.id','desc');
            
            
            $query = $this->db->get();
            $data = $query->result_array();
            //echo   $this->db->last_query();
            return $data;
        }
        
        function getartwebsite()
        {
            $this->db->select('tbl_just_giving_websites.*,tbl_user_master.id,tbl_user_master.first_name,tbl_user_master.last_name');
            $this->db->from('tbl_just_giving_websites');
            //$this->db->where_not_in('tbl_just_giving_book.id','0');
            $this->db->join('tbl_user_master', 'tbl_user_master.id=tbl_just_giving_websites.artist_id');
            $this->db->order_by('tbl_just_giving_websites.id','asc');
            // $this->db->limit($limit);
            $query = $this->db->get();
            $data = $query->result_array();
            // echo   $this->db->last_query();
            return $data;
        }
        
        function getjustgivingvideo()
        {
            $this->db->select('tbl_just_giving_video.id,tbl_just_giving_video.giving_video_text,tbl_just_giving_video.str_name,tbl_just_giving_video.type,tbl_user_master.id,tbl_user_master.first_name,tbl_user_master.last_name');
            $this->db->from('tbl_just_giving_video');
            //$this->db->where_not_in('tbl_just_giving_book.id','0');
            $this->db->join('tbl_user_master', 'tbl_user_master.id=tbl_just_giving_video.artist_id');
            $this->db->order_by('tbl_just_giving_video.id','asc');
            // $this->db->limit($limit);
            $query = $this->db->get();
            $data = $query->result_array();
            // echo   $this->db->last_query();
            return $data;
        }

        function getBookImages($publicationId)
        {
            $this->db->select("tbl_publication.id,tbl_publication_book_images.publication_id,tbl_publication_book_images.image_name");
            $this->db->from('tbl_publication');
            $this->db->where('tbl_publication.id',$publicationId);
            $this->db->join('tbl_publication_book_images', 'tbl_publication_book_images.publication_id = tbl_publication.id');
            $query = $this->db->get();
            $data= $query->result_array();
            return $data;
        }
        
        function get_view_competitions()
        {
            //$this->db->select('tbl_view_competitions.*,tbl_user_master.id,tbl_user_master.first_name,tbl_user_master.last_name,tbl_user_master.profile_pic');
            //$this->db->from('tbl_view_competitions');
            //$this->db->where_not_in('tbl_just_giving_book.id','0');
            //$this->db->join('tbl_user_master', 'tbl_user_master.id=tbl_view_competitions.artist_name');
           // $this->db->order_by('tbl_view_competitions.id','asc');
            // $this->db->limit($limit);
            //$query = $this->db->get();
            //$data = $query->result_array();
            //  echo   $this->db->last_query();
            //return $data;
            
        $select ="*";
        $where = array('comp_status' => 'Running');
        $tbl="tbl_view_competitions";
         
        
        if($this->common->getnumRow( $tbl, $where) > 0 )
        {
                return $this->common->getAllRowArray( $select, $tbl, $where );
        }else{
            return 0;
        }
        
        
        
           
            
        }
        
        function get_view_competitions_artist()
        {
            $this->db->select('tbl_view_competitions.artist_name');
            $this->db->from('tbl_view_competitions');
            $this->db->where('tbl_view_competitions.comp_status',"Running");
            $query = $this->db->get();
            $arid= $query->result_array();
            $arrayid = explode(',',$arid[0]['artist_name']);
 
            $this->db->select('tbl_user_master.*,');
            $this->db->from('tbl_user_master');
            //$this->db->where_in('tbl_user_master.id',$arid[0]['artist_name']);
            $this->db->where("tbl_user_master.id IN (".$arid[0]['artist_name'].")",NULL, false);
            $query2 = $this->db->get();
            $data= $query2->result_array();
            return $data;
        }
        
        // Past Competitions 
        function get_view_past_competitions()
        {
            $limit = 1;
            
            $this->db->select('*');
            $this->db->from('tbl_view_competitions');
            $this->db->where('tbl_view_competitions.comp_status',"Close");
            $this->db->order_by('tbl_view_competitions.id','desc');
            //$this->db->limit($limit);
            $query = $this->db->get();
            $data= $query->result_array();
            return $data;
        }
        
        function get_view_past_competitions_artist()
        {
            $limit = 1;
            
            $this->db->select('tbl_view_competitions.winner_user_id');
            $this->db->from('tbl_view_competitions');
            $this->db->where('tbl_view_competitions.comp_status',"Close");
            $this->db->order_by('tbl_view_competitions.id','desc');
            $this->db->limit($limit);
            $query = $this->db->get();
            $arid= $query->result_array();
           
            if(!empty($arid))
            {
                $arrayid = $arid[0]['winner_user_id'];
                $this->db->select('tbl_user_master.*');
                $this->db->from('tbl_user_master');
                $this->db->where_in('tbl_user_master.id',$arrayid);
                $query2 = $this->db->get();
                $data= $query2->result_array();
                return $data;
            }
            else{
                return 0;
            }
            //$arrayid = explode(',',$arid[0]['artist_name']);
 
            
        }
        
        function get_other_videos()
        {
            $this->db->select('*');
            $this->db->from('tbl_other_videos');
            $query = $this->db->get();
            $arid= $query->result_array();
            
            return $arid;  
            
        }
        
        
        
}

?>