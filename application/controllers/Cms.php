<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cms extends CI_Controller{
		public function __construct(){
		parent::__construct();
		$this->load->model('Frontend_model','frontend');
		
	}


	function index($id){
		if($id==18){
			$data['act_id'] = "termsAndConditions";
		}else if($id==19){
			$data['act_id'] = "privacyPolicy";
		}
		
		$data['cmsData'] =   $this->frontend->getCMSdata($id);
		$this->load->view('mainsite/cms',$data);
	}

	function magazine()
	{
		$data['act_id'] = "magzin";
		$data['cmsData'] =   $this->frontend->getCMSdata(21);
				
		$data['numBanner'] = $numBanner =  $this->frontend->num_banner();
		if($numBanner)
		{ 
			$data['getBanner'] = $this->frontend->get_banner();
		}
		$this->load->view('mainsite/magzine',$data);
	}




	function printing(){
		$data['act_id'] = "art";
	 	$data['cmsData'] =   $this->frontend->getCMSdata(20);
	 	$data['dataRs'] = $this->frontend->getPrintingData();
		$this->load->view('mainsite/printing',$data);
	}


	function printing_email(){
	    //alert('hiiiiii');
		$this->load->library('email');
		if(extract($_POST)){
		 	$contact_name_printing = $this->input->post('contact_name_printing');
		 	$contact_lname = $this->input->post('contact_lname_printing');
		 	$contact_email = $this->input->post('contact_email_printing');
			$number_of_artwork = $this->input->post('number_of_artwork');
			$number_of_prints_requireds = $this->input->post('number_of_prints_requireds');
			$material = $this->input->post('material');
			$canvas_finishing = $this->input->post('canvas_finishing');
			$canvas_wrap = $this->input->post('canvas_wrap');
			$colour = $this->input->post('colour');
			$size = $this->input->post('size');
			$finishing = $this->input->post('finishing');
			$shipping_address = $this->input->post('shipping_address');
	       	
			$city = $this->input->post('city');
			$postal_code = $this->input->post('postal_code');
			$country1 = $this->input->post('country1');
			$contact_message_printing = $this->input->post('contact_message_printing');
			
		 	//$captcha = $_POST["captcha"];
			 

			$contact_message_printing = '';
			if($contact_name_printing!=''){
				if($contact_email_printing!=""){
				if (preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/",$contact_email_printing)){
				 

			/*	$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfgAQ4UAAAAALko9zWPHdgcz0JO5VfrbakZAopz&response=".$captcha);

				$captcha_success=json_decode($verify);*/
 				//if ($captcha_success->success==true) {
				//======Send emial to user about his account creation
				$site_logo = $this->common->getLogo();
				$email_content = '';
			  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contact_name_printing.' '.$contact_lname.' Wants to contact with Admin about printing. Please check details as below <br/><bold>Email : </bold>'.$contact_email_printing.'<br/><bold>Number Of ArtWork : </bold>'.$number_of_artwork.'<br/><bold>Number Of Prints Required : </bold>'.$number_of_prints_requireds.'<br/><bold>Material : </bold>'.$material.'<br/><bold>Canvas Finising : </bold>'.$canvas_finishing.'<br/><bold>Canvas Wrap : </bold>'.$canvas_wrap.'<br/><bold>Colour : </bold>'.$colour.'<br/><bold>Size : </bold>'.$size.'<br/><bold>Shipping Address : </bold>'.$shipping_address.'<br/><bold>Finishing : </bold>'.$finishing.'<br/><bold>City : </bold>'.$city.'<br/><bold>Postal Code : </bold>'.$postal_code.'<br/><bold>Country : </bold>'.$country1.'<br/><bold>Message : </bold>'.$contact_message_printing.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
			 	 
				$subject1 = SITENAME.": Printing Order Form";
				$this->email->from($contact_email);
				$this->email->to('printing@artgalaxie.com'); 
				$this->email->cc(BCC_EMAIL);
				$this->email->subject($subject1);
				$this->email->message($email_content);//$email_content
				$this->email->send();
				//======
				echo 'done'; 
			//	} else{ echo 'InvalidCaptcha';  } 
				} else{ echo 'InvalidEmail';  } 
				}else{ echo 'Emailblank'; }
				}else{ echo "NameBlank"; }
				}
			
		}

	function printing_contact_us_email(){
		$this->load->library('email');

		if(extract($_POST)){
			$contactName = $this->input->post('contact_name');
			$contactSubject = $this->input->post('contact_subject');
			$contact_email = $this->input->post('contact_email');
			$conactDepartment = $this->input->post('department');
			$contact_message = $this->input->post('contact_message');
			$artist_name = $this->input->post('artist_name');
			 
			$contactMessage = '';
			if($contact_name!=''){
				if($contact_email!=""){
				if (preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/",$contact_email)){
				//======Send emial to user about his account creation
				$site_logo = $this->common->getLogo();
				$email_content = '';
				if($contact_message!=''){
					$contactMessage = '<bold>Message : </bold>'.$contact_message;	
				}
				
				$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with Admin <br/><bold>Subject : </bold>'.$contactSubject.'<br/><bold>Services : </bold>'.$conactDepartment.'<br/><bold>Email : </bold>'.$contact_email.'<br/>'.$contactMessage.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
			 	 
				$subject1 = SITENAME.":Printing Contact Us";
				$this->email->from($contact_email);
				$this->email->to('general@artgalaxie.com'); //ADMIN_EMAIL 
				$this->email->cc(BCC_EMAIL);
				$this->email->subject($subject1);
				$this->email->message($email_content);//$email_content
				$this->email->send();
				//======
				echo 'done'; 
				//} else{ echo 'InvalidCaptcha';  } 
				} else{ echo 'InvalidEmail';  } 
				}else{ echo 'Emailblank'; }
				}else{ echo "NameBlank"; }
				}
			
	}


	function tutorials(){
		$data['act_id'] = 'tutorials';
		$where =  array('1' => 1 );
		$data['buttonsDs'] = $this->common->getAllRowArray('*','tbl_tutorials_categories',$where);
		$data['gallery_cat'] = $this->common->get_galleries();
		$this->load->view('mainsite/tutorials',$data);
	}

	function tutorials_list(){

		$data['act_id'] = 'tutorials';
		$data['cat'] = 0;
		$data['price'] = '';
		$data['min'] = 0;

		$where =  array('1' => 1 );
		$data['buttonsDs'] =   $this->common->get_galleries(); //$this->common->getAllRowArray('*','tbl_tutorials_categories',$where);
		$data['tutoDs'] = $this->frontend->get_tutorials();
	 
		$this->load->view('mainsite/tutorials_list',$data);

	}

	function filter_tutorials(){ //$cat,$price,$min
		$data['act_id'] = 'tutorialss_filter';
		if(extract($_POST)){	
		 		 
		 		$data['cat'] = $cat = $this->input->post('category_id');
				$data['price'] = $price =  $this->input->post('price_range');
				$data['min'] = $min = $this->input->post('minutes');


			$this->db->select('tuto.title, tuto.id ,tuto.price, gal.tut_image' );
			$this->db->from( 'tbl_tutorials as tuto,tbl_tutorials_images as gal');
			if($cat!=0){
				 $this->db->where("FIND_IN_SET('$cat',tuto.art_cat) !=", 0);
			}
			if($price!=''){
				$priceArray  =  explode('####',$price);
				 
				if($priceArray[0]==0){
					$this->db->where("tuto.price <=".$priceArray[1]);
				}else if($priceArray[1]==0){
					$this->db->where("tuto.price >=".$priceArray[0]);
				}else{
					 $this->db->where("tuto.price BETWEEN  ".$priceArray[0]." AND ".$priceArray[1]);
				}


			}
			if($min!='' && $min!=0 ){

				$minArray  =  @explode('####',$min);
				 
				if($minArray[1]=='minutes'){
					$this->db->where("tuto.duration_min =".$minArray[0]);
					$this->db->where("tuto.duration_hour =",0);
					$this->db->where("tuto.duration_sec =",0);
				}else if($minArray[1]=='hour'){
					$this->db->where("tuto.duration_hour =".$minArray[0]);
					$this->db->where("tuto.duration_min =",0);
					$this->db->where("tuto.duration_sec =",0);
				}else if($minArray[1]=='more'){
					 $this->db->where("tuto.duration_hour >= ".$minArray[0]);
				}
			}
			$this->db->join('tbl_tutorials', 'tuto.id = gal.tut_id', 'right');
		 
			$this->db->group_by('gal.tut_id'); 

			$query = $this->db->get();
	        $data['tutoDs'] =  $tutoDs = $query->result_array();   
	        $data['buttonsDs'] =   $this->common->get_galleries();
	      	$this->load->view('mainsite/tutorials_list',$data);

		}else{
			redirect('tutorials_list');
		}

	}

	function tutorial_by_cats($id,$str){

		$data['act_id'] = 'tutorials_by_cat';
		$data['cat'] = 0;
		$data['price'] = '';
		$data['min'] = 0;
		$data['title'] = '';

		$idsArray = explode('-',$id);
		 
		$this->db->select('tuto.title, tuto.id ,tuto.price, gal.tut_image' );
		$this->db->from( 'tbl_tutorials as tuto,tbl_tutorials_images as gal');
		if($idsArray[0]=='a'){
			 $this->db->where("FIND_IN_SET('".$idsArray[1]."',tuto.art_cat) !=", 0);
		}else if($idsArray[0]=='c'){
			 $this->db->where("FIND_IN_SET('".$idsArray[1]."',tuto.tut_cat) !=", 0);
		}else{
			redirect('tutorials');
		}
		$this->db->join('tbl_tutorials', 'tuto.id = gal.tut_id', 'right');
		$this->db->group_by('gal.tut_id'); 
		$query = $this->db->get();
	    $data['tutoDs'] =  $tutoDs = $query->result_array();   

	     $title = explode('-',$str);
	    $data['title'] =  implode(' ',$title);
	 	$data['buttonsDs'] = $this->common->get_galleries();
		$this->load->view('mainsite/tutorials_list',$data);

	}

	function tutorials_details($id,$str){
		$data['act_id'] = 'tutorials';
		$data['id'] = $id;
		$data['str'] = $str;
		$isExists = $this->common->getnumRow('tbl_tutorials', array("id" => $id));
		if($isExists>0){
			$data['tutoRs'] = $tutoRs = $this->frontend->getOnetutorials($id); 
			$data['tutoImages'] =  $this->common->getAllRowArray('*','tbl_tutorials_images', array('tut_id' => $id ));	
	 		$this->load->view('mainsite/tutorials_details',$data);
		}else{
			redirect('tutorials');
		}
		

	}

}?>