<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Feature_artists extends CI_Controller{
		public function __construct(){
		parent::__construct();
		$this->load->model('Frontend_model','frontend');
		
	}

	function index(){
		$data['act_id'] = "artist";
		
		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('artist');
		$data['isExists'] = $isExists =  $this->frontend->numRowFeatureArtist();  
	 	if($isExists>0){ 
			$data['featureArtist'] = $featureArtist = $this->frontend->getFeatureArtist();
		}
		$data['remainingFeature'] = $remainingFeature  = $this->frontend->getFeatureArtistsAndTheirImage($featureArtist['id']);
		
		//echo "<pre>";
	//	print_r($remainingFeature);
		
		$this->load->view('mainsite/feature_artists',$data);
	}
	
	function details($id,$artistName){
		$data['act_id'] = 'artist';
		$data['userId'] = $id;
		$ifExists = $this->common->num_users(array('id' => $id));
		if($ifExists>0){

			$data['featureArtist'] = $this->frontend->getFeatureArtistById($id);
			//var_dump($data['featureArtist']);
			//exit();
			$data['artWorkGallery'] = $this->frontend->getArtistSlider($id,'artWorkGallery'); //art work gallery
			$data['insideTheStudio'] = $this->frontend->getArtistSlider($id,'insideTheStudio'); //art work gallery
			$data['interview'] = $data['interview2'] =  $interview =  $this->common->getInterviewsOfUser($id); //art work gallery

		 	$this->load->view('mainsite/feature_artist_detail',$data);
		}else redirect('artists');

	}

 
}?>