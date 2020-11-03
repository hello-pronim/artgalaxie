<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller{
		public function __construct(){
		parent::__construct();
		$this->load->model('Frontend_model','frontend');
		
	}
	function index(){

		$data['act_id'] = "blog";
		$data['cat'] = 0;
 		$data['subCat'] = 0;
 		$data['subSubCat'] =0;
 		$data['cmsData'] =   $this->frontend->getCMSdata(16);
 		$data['parentCat'] = $this->common->getFilterHavingParentId(0);
 		
 		$data['mem_id'] = $this->session->userdata('CUST_ID');
 		
 		$data['blogImages'] = $this->common->getOneRowArray('*','tbl_blog_images',array('id' => 1 ));
 		$where = array('is_feature' => 1);
 		$data['featuredBlog'] = $this->common->getAllRowArray( '*', 'tbl_blogs', $where, 'added_date' , 'desc' ,'6','0' ); 
 		$where2 = array('1' => 1);
 		$data['latestBlog'] = $this->common->getAllRowArray( '*', 'tbl_blogs', $where2, 'added_date' , 'desc' ,'6','0' );
        $query = $this->db->query("Select * from tbl_blogs where is_featured_artist_artical =1 order by added_date desc limit 6");
        $data['featuredBlog2'] =   $query->result_array(); 
        
        $this->load->view('mainsite/blog',$data);
	}
	function likeBlog()
	{
 		if(extract($_POST))
 		{
 			$blogId = $this->input->post('blogId');
		 	$userId = $this->input->post('userId');
		 	$value_array =   array(
				'blog_id' => $blogId,
				'member_id' => $userId,
			);
			$this->common->add_records('tbl_blog_like',$value_array);
			$count = $this->common->getTotalLikeForBlog($blogId);
			echo "Done####".$count;
 		}
	}
	function savedAsDraft()
	{
	    if(extract($_POST))
 		{
 		    $blogId = $this->input->post('blogId');
 		    $userId = $this->input->post('userId');
		 	$value_array =   array(
				'blog_id' => $blogId,
				'member_id' => $userId,
			);
			$this->common->add_records('tbl_blog_saved',$value_array);
			echo "Done";
 		}
	}
	function removedSaved() {
	    if(extract($_POST))
 		{
 		    $blogId = $this->input->post('blogId');
 		    $userId = $this->input->post('userId');
		 	$value_array =   array(
				'blog_id' => $blogId,
				'member_id' => $userId,
			);
			$this->common->delete_entry('tbl_blog_saved',$value_array);
			echo "Done";
 		}
	}
	
	
	function filter($cat=0)
	{
 		$data['act_id'] = "blog";
 		$str = 'Blog';
 		$title = '';
 		$data['cat'] = $cat;
 		$catName = '';
 	 

 		$data['type'] = $type =  $this->uri->segment(4);
 		$data['cmsData'] =   $this->frontend->getCMSdata(16);
 		$data['parentCat'] = $this->common->getFilterHavingParentId(0);

 		$data['mem_id'] = $this->session->userdata('CUST_ID');
 		$data['blogImages'] = $this->common->getOneRowArray('*','tbl_blog_images',array('id' => 1 ));
 		if($cat>0){
 				$catName = $this->common->getFilterName($cat);
 		}
		$this->db->select('*' );
		$this->db->from( 'tbl_blogs');
 		if($cat!=0){
 		
 			$title = 'Search: '.$catName;
 			$this->db->where("FIND_IN_SET('$cat',cat_id) !=", 0);
		}
        if($type=='latestBlog'){
        	$title = 'Latest Articles';
        	$this->db->order_by('added_date','desc');
        }else{
        	  $this->db->order_by('added_date','desc');
        }
        if($type=='featureBlog'){
        	$title = 'Featured Articles';
 			$this->db->where('is_feature',1);
        }
        if($type=='featureArtistArticle'){
        	$title = 'Featured Artist Article';
 			$this->db->where('is_featured_artist_artical',1);

        }

      /*  if($type!='' && $title!='' ){
        	$title = str_replace('-',' ',$type);
        }*/

      if($this->input->post('search_mode')==1){
        	 $keyword = stripslashes($this->input->post('search_blog'));
        	 $this->db->like('short_description', $keyword);
        	 $title = "Search: ".str_replace('-',' ',$keyword);

         }
 		
 		$data['blog_title'] = $title;
		$query = $this->db->get();
        $data['featuredBlog'] =  $featuredBlog = $query->result_array(); 
 		  
 		$this->load->view('mainsite/blog_filter',$data);
	}

	function saved(){
		if($this->session->userdata('CUST_ID')!=''){
		$data['blog_title'] = 'Saved Blogs';	
		$data['blogImages'] = $this->common->getOneRowArray('*','tbl_blog_images',array('id' => 1 ));
		$data['act_id'] = "blog";
 		$str = 'Blog';
 		$title = '';
 	 	$data['cmsData'] =   $this->frontend->getCMSdata(16);
 		$data['parentCat'] = $this->common->getFilterHavingParentId(0);

 		$data['mem_id'] = $mem_id = $this->session->userdata('CUST_ID');
 		$query = $this->db->query("Select blog.*  from tbl_blogs as blog,tbl_blog_saved as bs where bs.blog_id = 
            blog.id and bs.member_id=$mem_id   order by bs.id desc");
        $data['featuredBlog'] =   $query->result_array();
 		$this->load->view('mainsite/blog_filter',$data);

 		} else
 			redirect('blog');
	}


	function detail($id,$blogName){

		$data['act_id'] = "blog";
		$data['id'] = $id;
		$data['blogName'] = $blogName;
		$data['mem_id'] = $mem_id = $this->session->userdata('CUST_ID');
		$numRow = $this->common->getnumRow( 'tbl_blogs', array('id' => $id ) );
		if($numRow==1){
			$data['cmsData'] =   $this->frontend->getCMSdata(16);
			$data['totalCount'] = $this->common->getTotalLikeForBlog($id);
			$data['isILiked'] =    $isILiked =  $this->common->isLikedBlog($mem_id,$id);
			
			$data['blogDetail'] = $this->common->getOneRowArray('*','tbl_blogs', array('id' => $id ) );


			$this->db->select('id,blog_title' );
			$this->db->from( 'tbl_blogs');
 		 	$this->db->where('id <',$id);
 		 	$this->db->where('id >=',$id-1);
         	$query = $this->db->get();
	        $data['blogPrevious'] =  $query->row_array(); 


			$this->db->select('id,blog_title' );
			$this->db->from( 'tbl_blogs');
 		 	$this->db->where('id >',$id);
 		 	$this->db->where('id <=',$id+1);
         	$query = $this->db->get();
	        $data['blogNext'] =  $query->row_array(); 

	        $data['blogComments'] = $this->common->getBlogComments($id,1);
			$this->load->view('mainsite/blog_details',$data);
		}else{
			redirect('blog');
	 	}
 	 }

 	 function post_comments()
 	 {
 	 	if(extract($_POST))
 	 	{
 			
 			$blogId = $this->input->post('blogId');
		 	$userId = $this->session->userdata('CUST_ID');
		 	$comment = $this->input->post('comment');
		 	$added_date = date('Y-m-d H:i:s');
		 	$value_array =   array(
				'blog_id' => $blogId,
				'member_id' => $userId,
				'comment' => $comment,
				'added_date' =>$added_date
			);
			
			$data['userDetails'] = $userDetails = $this->common->getUserDetails($userId);
	    	$data1['blogDetails'] = $blogDetails = $this->common->getBlogDetails($blogId);
			
			$this->common->add_records('tbl_blog_comments',$value_array);
			
			//Notification added
			$pagename = preg_replace('/\s+/', '-', $data1['blogDetails']['blog_title']);
			$url = base_url().'blog/detail/'.$blogId.'/'.$pagename.'.html';
            $table_name = 'notifications';
            $insert_notify_array = array(
            					'notification_from_user_id'=> $data['userDetails']['first_name'].' '.$data['userDetails']['last_name'],
            					'notification_type'=>"New Comments",
            					'notification_text'=>$data['userDetails']['first_name'].' '.$data['userDetails']['last_name']." has comment on <b>".$data1['blogDetails']['blog_title']."</b>",
            					'notification_url'=>'#',
            					'notification_datetime'=>date("m/d/Y h:i:s"),
            					'notification_status'=>'Pending'
            					);
            $this->common->add_records_notification($table_name,$insert_notify_array);
                    
			echo "Done";
 		}
 	 }
}?>