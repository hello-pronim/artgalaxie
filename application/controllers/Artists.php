<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Artists extends CI_Controller{
		public function __construct(){
		parent::__construct();
		$this->load->model('Frontend_model','frontend');
		
	}

	function index(){

		$data['act_id'] = "artist";
		$data['atod'] = $this->frontend->getAllArtistByNamesAndImage('A-D');
		$data['etoj'] = $this->frontend->getAllArtistByNamesAndImage('E-J');
		$data['ktom'] = $this->frontend->getAllArtistByNamesAndImage('K-M');
		$data['ntos'] = $this->frontend->getAllArtistByNamesAndImage('N-S');
		$data['ttoz'] = $this->frontend->getAllArtistByNamesAndImage('T-Z');

		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('artist');
		
		$data['atodName'] = $this->frontend->getAllArtistByNames('A-D','');
		$data['etojName'] = $this->frontend->getAllArtistByNames('E-J','');
		$data['ktomName'] = $this->frontend->getAllArtistByNames('K-M','');
		$data['ntosName'] = $this->frontend->getAllArtistByNames('N-S','');
		$data['ttozName'] = $this->frontend->getAllArtistByNames('T-Z','');
		
		
		$this->load->view('mainsite/artist',$data);
	}
	
	function details($id,$artistName){

		$data['act_id'] = "artist";
		$ifExists = $this->common->num_users(array('id' => $id));
		if($ifExists>0){
		
			$where =  array('user_id' => $id );
			
			$where_artist_feature       =  array('user_id' => $id,'is_feature' => 1 );
			$where_artist_not_feature   =  array('user_id' => $id,'is_feature' => 0 );
			
			$data['artistsData'] =  $artistsData = $this->frontend->getArtistDetails($id);
			
			$data['numGallery'] = $numGallery = $this->common->num_ArtistGallery($where);

			$data['featurenumGallery'] = $numGallery = $this->common->num_ArtistGallery($where_artist_feature);
			
			$data['notfeaturenumGallery'] = $numGallery = $this->common->num_ArtistGallery($where_artist_not_feature);
			
		    $limit='';
			
			/*if($numGallery>10){
				$limit = "10";
				$data['galleryNext'] = $this->common->getArtistGallery($where,10,10);
			}*/
			
			$data['gallery']    = $this->common->getArtistGalleryf($where_artist_feature,$limit);
			$data['nfgallery']  = $this->common->getArtistGallery($where_artist_not_feature,$limit);
			
			$data['numVideos'] = $this->common->num_artistVideos($where);
			
			$data['videos'] = $videos = $this->common->getArtistVideoList($id);
			 
			//track user 
			  $count = $artistsData['count'] + 1;
	          $in_data =   array('count' =>$count);
	          $this->common->update_entry("tbl_user_master",$in_data,array('id' => $id ));
	        //------------------  

			$this->load->view('mainsite/artist_profile',$data);
		}else redirect('artists');

	}
	
function artist_contact_email()
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->load->library('email');
	$this->load->helper('url');
    
    $contactName        = $this->input->post('contact_name');
    $contact_email      = $this->input->post('contact_email');
    $contact_message    = $this->input->post('contact_message');
    $artist_name        = $this->input->post('artist_name');
    
    $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
    $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
    
    if($this->form_validation->run()== FALSE)
    {
        echo "notdone";
    }
    else
    {
        $contactMessage = '';
        $site_logo = $this->common->getLogo();
        $email_content = '';
        if($contact_message!='')
        {
        	$contactMessage = '<bold>Message : </bold>'.$contact_message;	
        }
        $email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with artist <bold>'.$artist_name.'</bold><br/><bold>Email : </bold>'.$contact_email.'<br/>'.$contactMessage.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
        $subject1 = SITENAME.": Contact Artist";
        $this->email->from($contact_email);
        $this->email->to('contact@artgalaxie.com');  
        $this->email->cc(BCC_EMAIL);
        $this->email->subject($subject1);
        $this->email->message($email_content);//$email_content
        $this->email->send();
        echo 'done';
    }
}

    	function artist_mostly_viewed(){
    
    		$data['act_id'] = "artist"; 
    		$data['allArtist'] = $this->frontend->getAllMostlyViewedArtist();
    		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('artist');
    
    		$data['atodName'] = $this->frontend->getAllArtistByNames('A-D','');
    		$data['etojName'] = $this->frontend->getAllArtistByNames('E-J','');
    		$data['ktomName'] = $this->frontend->getAllArtistByNames('K-M','');
    		$data['ntosName'] = $this->frontend->getAllArtistByNames('N-S','');
    		$data['ttozName'] = $this->frontend->getAllArtistByNames('T-Z','');
    		$this->load->view('mainsite/artist_mostly_viewd',$data);
    	}
    
    	function artist_recently_added(){
    
    		$data['act_id'] = "artist"; 
    		$data['allArtist'] = $this->frontend->getRecentlyAddedArtist();
    		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('artist');
    		
    		$data['atodName'] = $this->frontend->getAllArtistByNames('A-D','');
    		$data['etojName'] = $this->frontend->getAllArtistByNames('E-J','');
    		$data['ktomName'] = $this->frontend->getAllArtistByNames('K-M','');
    		$data['ntosName'] = $this->frontend->getAllArtistByNames('N-S','');
    		$data['ttozName'] = $this->frontend->getAllArtistByNames('T-Z','');
    		$this->load->view('mainsite/artist_recently_added',$data);
    	}

	//gallery
	function categories(){
		$data['act_id'] = "gallery";
 
		$data['gallery_cat'] = $this->common->get_galleries();
		
		$this->load->view('mainsite/categories',$data);
	}

	function categories_details(){
		$data['act_id'] = "gallery";
		$data['gallery_cat'] = $this->common->get_galleries();
		$data['artist_gallery'] = $this->frontend->getArtistsAndTheirImageHavingGallery();
		$this->load->view('mainsite/categories_details',$data);
	}

	//style
	function styles(){
		$data['act_id'] = "style";
		$data['style_cat'] = $this->common->get_style();
		$this->load->view('mainsite/style',$data);
	}

	function style_details($id,$styleName){
		$data['act_id'] = "style";
		$data['styleName'] = $styleName;
		$data['styleId'] = $id;
		$where_array =  array('cat_id' => $id  );	
		$numRow = $this->common->num_style($where_array);
		if($numRow>0){
			$data['style_cat'] = $this->common->get_style();
			$data['act_id'] = "artist";
		    //$data['atod'] = $this->frontend->getAllArtistByNamesAndImage('A-D');
			$data['artist_style'] = $this->frontend->getArtistsAndTheirImageHavingStyle();
			//$data['artist_style'] = $this->frontend->getArtistsAndTheirImageHavingStyleId($id);
			$this->load->view('mainsite/style_details',$data);
		}else{
			redirect('styles');
		}
		
	}

	//country
	function artists_by_country(){
		$data['act_id'] = "artist";
		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('artistByCountry');
		$data['getCountryName'] = $getCountryName = $this->frontend->getCountryNameHavingMaxArtist();
	 	$data['artistByCountry'] = $this->frontend->getAllArtistByCountryAndImage($getCountryName[0]['country']);
        $data['getCountry'] = $this->common->get_country();
        $data['getCountryColOne'] = $this->frontend->get_country_one();
        $data['getCountryColTwo'] = $this->frontend->get_country_two();
        $data['getCountryColThree'] = $this->frontend->get_country_three();
        $data['getCountryColFour'] = $this->frontend->get_country_four();
		$data['getCountryMapCode'] = $this->frontend->get_country_map_code();

		$this->load->view('mainsite/artists_by_country',$data);
	}

	function getArtistsByCountry(){
	    if(extract($_POST)){
			$countryName = $this->input->post('countryName');
 			$data['artistByCountry'] = $this->frontend->getAllArtistByCountryAndImage($countryName);
			$this->load->view('mainsite/load_artist_by_country',$data);
		}
	}
 	
 	//videos
 	function artist_video($start=0){
 		$data['start'] = $start;
 		$data['next_start'] = $start+5;
 		$data['previous'] = $start-5;
 		$data['act_id'] = "artist";
 		$data['galleries'] = $this->common->get_galleries();
 		//$data['artistVideos'] = $artistVideos =  $this->frontend->getArtistNameIfVideosExists($start);//get those artist name whose videos are exists 
 		
        if(!isset($_GET['gcid'])) { $data['gcid'] = '1'; $cid_cond = " and user.galleries_id = 1"; }
        else { $data['gcid'] = $_GET['gcid']; $cid_cond = " and user.galleries_id = ".$data['gcid']; }
 		
 		$data['artistVideos'] = $artistVideos =  $this->frontend->getArtistNameIfVideosExists($start,$cid_cond);
 		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('video'); //exhibitions
 		$data['numRow'] = count($artistVideos);
        
 		//Total video count .i.e to hide the next button
 		$query = $this->db->query("Select user.id,user.first_name,user.last_name,user.galleries_id from tbl_user_master as user,tbl_artist_videos as video where user.user_type='artist' and user.id=video.user_id group by video.user_id order by user.first_name asc ");
 		//$query = $this->db->query("Select user.id,user.first_name,user.last_name,user.galleries_id from tbl_user_master as user,tbl_artist_videos as video where user.user_type='artist' ".$cid_cond."  and user.id=video.user_id group by video.user_id order by user.first_name asc ");
 		$totalCount = $query->result_array(); //remember this when u write query.
        $data['totalVideoCount'] = $totalVideoCount = count($totalCount);
        
       
 		$data['cmsData'] =   $this->frontend->getCMSdata(29);
		$this->load->view('mainsite/artist_videos',$data);
 	}
 	
 	function likeartist() {
 	    if(extract($_POST))
 		{
 		    $compId = $this->input->post('compId');
 		    $artistId = $this->input->post('artistId');
 		    $userId = $this->input->post('userId');
		 	$value_array =   array(
				'comp_id' => $compId,
				'artist_id' => $artistId,
				'member_id' => $userId,
			);
			$this->common->add_records('tbl_artist_like',$value_array);
			$count = $this->common->getTotalLikeForArtist($userId,$compId);  
			echo "Done####".$count;
 		}
 	}

 	function validate_captcha() {
        $captcha = $this->input->post('g-recaptcha-response');
         $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc_sF8UAAAAAAZHROD-RSbKxI1q26CY10pXJD6b&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if ($response . 'success' == false) {
            return FALSE;
        } else {
            return TRUE;
        }
    }
    
 	function search(){
	if(extract($_POST)){
		$data['searchText'] = $searchText =  $this->input->post('search_text');

		$data['act_id'] = '';
 
        $searchText = str_replace(' ', '|', $searchText); // Replaces all spaces with hyphens.
        $searchText = preg_replace('/[^A-Za-z0-9\-]/', '|', $searchText);
        
        $query = $this->db->query("Select user.id,user.first_name,user.last_name,user.profile_pic,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where ( user.first_name REGEXP  '".$searchText."' or  user.last_name REGEXP '".$searchText."' )  and user.user_type='artist' and user.id=gal.user_id group by gal.user_id order by user.id desc");
        //$query = $this->db->query("Select user.id,user.first_name,user.last_name,user.profile_pic,gal.image_name from tbl_user_master as user,tbl_artist_gallery as gal where ( user.first_name like '%".$searchText."%' or  user.last_name like '%".$searchText."%' )  and user.user_type='artist' and user.id=gal.user_id group by gal.user_id order by user.id desc");
       	$data['allArtist'] =   $query->result_array(); 

       	$this->load->view('mainsite/search',$data); 
	}

 }

 
}?>