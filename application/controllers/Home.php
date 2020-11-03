<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
	    parent::__construct();
	    $this->load->model('Frontend_model','frontend');
    }

	function index()
	{
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
        
		$data['act_id'] = "home";
		
		$data['numBanner'] = $numBanner =  $this->frontend->num_banner();
		if($numBanner){ 
			$data['getBanner'] = $this->frontend->get_banner();
		}
		
		$data['num_galleries'] = $num_galleries =  $this->common->num_galleries();
		if($num_galleries)
		{
			$where = array('1' => 1 );
			$orderBy =  'sort_no'; //should be string
			$orderType =  'asc'; //should be string
			$limit = "4"; //string
			$data['getgalleries'] = $this->common->getAllRowArray('*','tbl_galleries',$where,$orderBy,$orderType,$limit);
		}

		$whereServices = array('1' => 1 );
		$data['numServices'] = $numServices =  $this->common->getnumRow('tbl_services',$whereServices);
		if($numServices)
		{ 
			$data['getServices'] = $this->common->getAllRowArray('*','tbl_services',$whereServices,'id','','5');
		}
		
		$data['numBlog'] = $numHomePageBlog =  $this->frontend->numHomePageBlog();
		if($numHomePageBlog)
		{ 
			$data['getBlog'] = $this->frontend->getHomePageBlog();
		}
		
		
		$data['getTesto'] = $this->frontend->getTestimonials();
		$data['numTesto'] = count($data['getTesto']);
		
		$data['numBanner2'] = $numBanner2 =  $this->frontend->num_banner(1);
		if($numBanner2)
		{ 
			$data['getBanner2'] = $this->frontend->get_banner(1);
		}

		$data['numBanner3'] = $numBanner3 =  $this->frontend->num_banner(2);
		if($numBanner3){ 
			$data['getBanner3'] = $this->frontend->get_banner(2);
		}

		//feature artist
	 	$data['isExists'] = $isExists =  $this->frontend->numRowFeatureArtist();  
	 	if($isExists>0)
	 	{ 
			$data['featureArtist'] = $this->frontend->getFeatureArtist();
		}

		$where = array('pageid' => "4");
 	 	$data['section1'] = $this->common->getOneRowArray('*','tbl_cms_pages',$where);

 	 	$where = array('pageid' => "5");
 	 	$data['section2'] = $this->common->getOneRowArray('*','tbl_cms_pages',$where);

 	 	$where = array('pageid' => "6"); 
 	 	$data['section3'] = $this->common->getOneRowArray('*','tbl_cms_pages',$where);
 	 	
 	 	//Other Links
 	 	$data['isOthersLinks'] = $isOthersLinks =  $this->frontend->numRowOtherLinks();
	 	if($isOthersLinks>0)
	 	{ 
			$data['otherLinkList'] = $this->frontend->getOtherLink();
		}
		$this->load->view('mainsite/index',$data);
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
    
	//login
	function login()
	{
	
		$data['act_id']='cust_login';	
		$data['msg']=$msg='';   
		//========================
	
		$msg='';
		$data['authUrl'] ='';
	 
		$usrWhr =  array('email_address' => $this->input->post('email') );		
		$chkExist=$this->common->getnumRow('tbl_user_master',$usrWhr);				
		if($this->input->post('email')=='')
		{			
			$msg='Please enter Email.';
		}
		else if($chkExist>0)
		{	
			$remember = $this->input->post('remember');			
			$usr=$this->common->getOneRowArray('id,email_address,first_name,is_activated,is_admin_active,password,user_type','tbl_user_master',$usrWhr);
			 
			if(sizeof($usr)>0)
			{
				$pass=$this->input->post('password');	
				if($this->common->verifyHashPassword($pass,$usr['password'] ))
				{	
				if($usr['is_admin_active']==1)
				{					
					if($usr['is_activated']==1)
					{
						$msg='Done';
						$arr=array('CUST_ID'=>$usr['id'],'isLogin'=>'true','email'=>$usr['email_address'],'CUSTOMER_TYPE'=>$usr['user_type'],'FB_LOGIN'=>'N');
						$this->session->set_userdata($arr);

						if($remember==1)
						{
							setcookie('email',$this->input->post('email'), time()+60*60*24*365,'/');
							setcookie('password',$pass, time()+60*60*24*365,'/');
							setcookie('remember',$remember, time()+60*60*24*365,'/');	
					  	}
                     
						$msg= 'Done';
					}
					else
					{
						$msg='Account not activated yet. Please check your email inbox for an activation link. ';
					}	
					}
					else
					{
						$msg='Your account is blocked by admin';
					}
					
				}
				else
				{
					$msg='Invalid login details';
				}
			}
			else
			{
				$msg='Invalid login details';
			}
 		}
 		else
 		{
			$msg ='Invalid Email / Password';
		}
		echo $msg;
	}
	
	// Register
	function register()
	{
		$data['act_id']='home';
		$data['msg']=$msg ="";

		$whereUser = $arrayName = array('email_address' => $this->input->post('email'));
		$chkuniq=$this->common->getnumRow('tbl_user_master',$whereUser);
		if($this->input->post('email')=='')
		{			
			$msg='Please enter Email address!';
		}
		else if(!$this->frontend->check_email(strtolower($this->input->post('email'))))
		{			
			$msg='Please enter a valid email address.';				
		}
		else if($chkuniq>0)
		{
			$msg='Account already exists. <br/><a class="btn1" href="'.site_url('home/forgot_password').'" >Forgot your password?</a>';
		}
		else
		{	
			$in_data['phone']=$this->input->post('phone');  
			$userPassword=$this->input->post('password');				
			$userPassword=$this->common->generateHashPassword($userPassword);
			$email = $this->input->post('email');
			$Name =$this->input->post('first_name').' '.$this->input->post('last_name');
			$username = $this->common->random_username($Name);
			$insert_array = array(
									'username'=>$username,
									'first_name'=>$this->input->post('first_name'),
									'last_name'=>$this->input->post('last_name'),
									'email_address'=>$this->input->post('email'),
									'password'=>$userPassword,
									'phone'=>$this->input->post('phone'),
								 	'address'=>$this->input->post('address'),
									'address2'=>$this->input->post('address2'),
									'country'=>$this->input->post('country'),
									'state'=>$this->input->post('state'),
									'city'=>$this->input->post('city'),
									'zip'=>$this->input->post('zip'),
									'registration_date' => date('Y-m-d H:i:s'),
									'is_admin_active'=>1,
									'user_type'=>'user'
									);
			
			$this->common->add_records('tbl_user_master',$insert_array);
			$new_registration_id =	$this->db->insert_id();	

			//=======Add new user to tbl_artist_user
			$this->common->add_records('tbl_artist_user',array('user_id' => $new_registration_id));

            	//Notification added
            $table_name = 'notifications';
            $insert_notify_array = array(
            					'notification_from_user_id'=> $this->input->post('first_name').' '.$this->input->post('last_name'),
            					'notification_type'=>'New User',
            					'notification_text'=>"New user ".$this->input->post('first_name').' '.$this->input->post('last_name')." has registered successfully",
            					'notification_url'=>'#',
            					'notification_datetime'=>date("m/d/Y h:i:s"),
            					'notification_status'=>'Pending'
            					);
            $this->common->add_records_notification($table_name,$insert_notify_array);
            
			//------- ACTIVATION EMAIL ----------
			$this->load->library('email');
			$site_logo = $this->common->getLogo();
			$email_content = '';
			$email_content.='<style>div ul li {margin-left: 0px;} p{margin: 0 !important;padding: 5px 0 0px 15px !important;}</style><div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"></br><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hi '.$Name.',</p><br/><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Welcome to Art Galaxie!</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left"><a href="'.site_url("home/activate_account/".$new_registration_id).'"><u>Click here</u></a> to activate your account.</p><br/><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left;font-weight:bold;">After activation, kindly login with the following details:</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left"><bold>Username : </bold>'.$email.'<br/><bold>Password : </bold>'.$this->input->post('password').'</p><br/><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">Hope Art Galaxie brings you inspiration as we find in it everyday.</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">Cheers,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">Art Galaxie Team</p></br><br/></div><br/><div style="display: block;"><p style="text-align:center;font-weight:bold;">Stay updated with Art Galaxie through Social Media</p>
<ul style="list-style: none;text-align: center;padding:0"><li style="display: inline-block;margin-right: 8px;"><a href="https://www.facebook.com/artgalaxie/" target="_blank"> <img src="'.base_url().'front_assets/images/fb.png" alt="" style="width: 40px;height: auto;"> </a></li><li style="display: inline-block;margin-right: 8px;"><a href="https://plus.google.com/u/0/+ArtGalaxie" target="_blank"> <img src="'.base_url().'front_assets/images/google.png" alt="" style="width: 40px;height: auto;"></a></li><li style="display: inline-block;margin-right: 8px;"><a href="https://twitter.com/ArtGalaxie" target="_blank"> <img src="'.base_url().'front_assets/images/Twitter-icon.png" alt="" style="width: 40px;height: auto;"></a></li><li style="display: inline-block;margin-right: 8px;"><a href="https://www.pinterest.com/artgalaxie/" target="_blank"> <img src="'.base_url().'front_assets/images/pinterest.png" alt="" style="width: 40px;height: auto;"></a></li><li style="display: inline-block;margin-right: 8px;"><a href="https://www.instagram.com/artgalaxie/" target="_blank"> <img src="'.base_url().'front_assets/images/Instagram_icon.png" alt="" style="width: 40px;height: auto;"></a></li></ul></div>';
			 
			$subject1 = SITENAME.": Activate your account";
			$this->email->from(ADMIN_EMAIL);
			$this->email->to($email); //
			$this->email->cc(BCC_EMAIL);
			$this->email->subject($subject1);
			$this->email->message($email_content);//$email_content
			$this->email->send();
			$msg= "Done";
		}
		echo $msg;  
    }

    // Account Activation
    function activate_account($registration_id=0)
    {
		if($registration_id>0)
		{
			$up_data2  = array('is_activated' => 1 );
			$up_where2 =  array('id' => $registration_id );
			$this->common->update_entry("tbl_user_master",$up_data2,$up_where2);
			$this->setSession($registration_id);
		    redirect('home');
    	}
    	else
    	{
    		redirect('home','refresh');
    	}
	}

    // Set Session
	function setSession($userId)
	{
		$usrWhr =  array('id' => $userId );
		$usr=$this->common->getOneRowArray('id,email_address,first_name,is_activated,is_admin_active,password,user_type','tbl_user_master',$usrWhr);
		$arr=array('CUST_ID'=>$usr['id'],'isLogin'=>'true','email'=>$usr['email_address'],'CUSTOMER_TYPE'=>$usr['user_type'],'FB_LOGIN'=>'N');
		$this->session->set_userdata($arr);
	}

    // Forgot Password
	function forgot_password()
	{
		$data['act_id']='home';	
		$data['msg']=$msg ="";
		$email_content="";
		
		if($this->input->post('mode')=="forgotpass")
		{
			$email = $this->input->post('email');
			
			if($this->input->post('email')=='')
			{			
				$data['msg'] = $msg ='Please enter Email address!';
			}
			else if(!$this->frontend->check_email(strtolower($this->input->post('email'))))
			{			
				$data['msg'] = $msg='Please enter a valid email address.';				
			}
			else
			{
				$whereArray =   array('email_address' =>$email );
				$chk_acc=$this->common->getnumRow('tbl_user_master',$whereArray); //and is_merchant =0
				
				if($chk_acc!=0)
				{
					$usr = $this->common->getOneRowArray('id,email_address,password,first_name,last_name','tbl_user_master',$whereArray); 
					$client_fname=stripslashes($usr['first_name']." ".$usr['last_name']);				
					$client_email=stripslashes($usr['email_address']);;
					$registration_id = $usr['id']; 
					
					//=============Used for has pwd........	
					$activation_string = $registration_id.$this->common->genRandomString();
					$data_in =  array( 'client_reset_key' => $activation_string );
					$where_array =  array('id' => $registration_id  );
					$this->common->update_entry("tbl_user_master",$data_in,$where_array);
				 	$reset_link=site_url("home/reset/".$activation_string);
					//===============
					
					$email_content='<style>div ul li {margin-left: 0px;} p{margin: 0 !important;padding: 5px 0 0px 15px !important;}</style><div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/logo_1526638538.png" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"></br><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hi '.$client_fname.',</p><br/><p style="font-size:14px; font-weight:400;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">You recently requested to reset the password for your Art Galaxie account.<br/>Click on the link below to reset it:
                    </p><br/><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left"><a href="'.$reset_link.'"><u>'.$reset_link.'</u></a></p><br/><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">If you did not request a password reset, please ignore this email or reply to let us know.</p><br/><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">Thanks,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">Art Galaxie Team</p></br><br/></div><br/><div style="display: block;"><p style="text-align:center;font-weight:bold;">Stay updated with Art Galaxie through Social Media</p>
                    <ul style="list-style: none;text-align: center;padding:0"><li style="display: inline-block;margin-right: 8px;"><a href="https://www.facebook.com/artgalaxie/" target="_blank"> <img src="'.base_url().'front_assets/images/fb.png" alt="" style="width: 40px;height: auto;"> </a></li><li style="display: inline-block;margin-right: 8px;"><a href="https://plus.google.com/u/0/+ArtGalaxie" target="_blank"> <img src="'.base_url().'front_assets/images/google.png" alt="" style="width: 40px;height: auto;"></a></li><li style="display: inline-block;margin-right: 8px;"><a href="https://twitter.com/ArtGalaxie" target="_blank"> <img src="'.base_url().'front_assets/images/Twitter-icon.png" alt="" style="height: 50px;"></a></li><li style="display: inline-block;margin-right: 8px;"><a href="https://www.pinterest.com/artgalaxie/" target="_blank"> <img src="'.base_url().'front_assets/images/pinterest.png" alt="" style="width: 40px;height: auto;"></a></li><li style="display: inline-block;margin-right: 8px;"><a href="https://www.instagram.com/artgalaxie/" target="_blank"> <img src="'.base_url().'front_assets/images/Instagram_icon.png" alt="" style="width: 40px;height: auto;"></a></li></ul></div>';

				
					$subject = "Password Recovery ::".SITENAME;
					$this->load->library('email');
					$this->email->from(ADMIN_EMAIL,SITENAME);
					$this->email->to($email,'Member');
					$this->email->bcc('hello@artgalaxie.com','Tester');					
					$this->email->subject($subject);
					$this->email->message($email_content);
					$this->email->send();
				
					$data['msg'] = $msg="Your password is sent to your Email Address.<br />Please check your Inbox/Spam Folder";
				}
				else
				{
					$data['msg'] = $msg = "The '".$email."' not present in our database.Please Sign Up";
				}
			}
			//echo $msg;
		}
		$this->load->view("mainsite/forgotpassword",$data);
	}

    // Reset
	function reset($act_str='')
	{
		$data['act_id']="home";
		$data['activation_id'] = 0;
		$data['msg']="";
		$data['errmsg']="";
		$data['wronglink']="";
		$where =  array('client_reset_key' =>  $act_str );
		$chk_acc=$this->common->getnumRow('tbl_user_master',$where);
 		if($act_str!='' && $chk_acc>0)
 		{
			$chk_acc=$this->common->getOneRowArray('*','tbl_user_master',$where);
			
			if($this->input->post('mode')=='changepw')
			{
				$pass = $this->input->post('pass');
				$pass1 = $this->input->post('cpass');
				
				if($pass==$pass1)
				{
							$userPassword=$this->common->generateHashPassword($pass);
							$data_in =  array(
											'password' => $userPassword,
											'client_reset_key' => ''
							            ); 
							$where_array =  array('client_reset_key' => $act_str  );
							$this->common->update_entry("tbl_user_master",$data_in,$where_array);
							$this->load->library('email');
							$data['msg']="Your password has been updated.";
							$email_content ='<table width="82%" border="0" cellpadding="5" cellspacing="0">
    										  <tr><td align="center" valign="middle"><h1>'.SITENAME.'</h1></td></tr>
    										  <tr><td align="left" valign="middle"><div>Hello Admin</div></td></tr>
    										  <tr><td align="left" valign="middle">'.$chk_acc['first_name'].' has just updated password on '.SITENAME.'. </td></tr>
    										  <tr><td align="left" valign="middle">Email Address: '.$chk_acc['email_address'].'</td></tr>
    										  <tr><td><p>&nbsp;</p></td></tr>
    										  <tr><td>Thanks </td></tr>
    										  <tr><td>'.SITENAME.' </td></tr>
    										</table>';
							$this->email->from(ADMIN_EMAIL, SITENAME);
							$this->email->to(ADMIN_EMAIL);
							//$this->email->cc("test@gmail.com");
							$this->email->bcc("hello@artgalaxie.com");
							$this->email->subject("Password Update Alert ::".SITENAME);
							$this->email->message($email_content);
							$this->email->send();
					 
				}
				else
				{
					$data['errmsg']="New password & repeat new password should be same.";
				}
			} 
			$data['regEmail'] = $chk_acc['email_address'];
			
		}
		else
		{
			$data['wronglink']="Wrong reset password link";
		}
		$data['act_str'] = $act_str;
		$this->load->view('mainsite/reset_password',$data);
	}

    //Logoff
    function logoff()
    {	
		$mem_id = $this->session->userdata('CUST_ID');
		$this->session->sess_destroy();		
		redirect('home','refresh');
	}

	//gallery of publication
 	function publications()
 	{
 		$data['act_id'] = "publication";
 		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('publication');
 		$data['cmsData'] =   $this->frontend->getCMSdata(7);
 		$data['publicationDs'] = $this->common->getPublication();
		$this->load->view('mainsite/publication',$data);
 	} 

 	// Email to publication
 	function publication_email()
 	{
		$this->load->library('email');
		if(extract($_POST))
		{	 
			$contactName = $this->input->post('contact_name');			
			$trim_size = $this->input->post('trim_size');
			$contact_email = $this->input->post('contact_email');
			$binding_type = $this->input->post('binding_type');
			$contact_message = $this->input->post('contact_message');
			$page_count = $this->input->post('page_count');
			$quantity = $this->input->post('quantity');
			$shipping_option = $this->input->post('shipping_option');
			$ship_to_province = $this->input->post('ship_to_province');
			$ship_to_postal_code = $this->input->post('ship_to_postal_code');
		//	$captcha = $_POST["captcha"];
			$strShippingOtherDetails = ""; 
			if($ship_to_province!='' || $ship_to_postal_code!='' )
		    {
				$strShippingOtherDetails = '<br/><bold>Ship To Province : </bold>'.$ship_to_province.'<br/>';
				if($ship_to_postal_code!='' )
				{
					$strShippingOtherDetails = $strShippingOtherDetails.'<bold>Ship To Postal Zip : </bold>'.$ship_to_postal_code.'<br/>';
				}
						
			}
			$contactMessage = '';
			if($contact_name!=''){
				if($contact_email!=""){
				if (preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/",$contact_email)){
			    /*$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfgAQ4UAAAAALko9zWPHdgcz0JO5VfrbakZAopz&response=".$captcha);

				$captcha_success=json_decode($verify);*/
 			    //if ($captcha_success->success==true) {
				//======Send emial to user about his account creation
				$site_logo = $this->common->getLogo();
				$email_content = '';
				if($contact_message!=''){
					$contactMessage = '<bold>Message : </bold>'.$contact_message;	
				}

                /*
				function sendEmail(){   
				  // Email configuration
				  $config = Array(
				     'protocol' => 'smtp',
				     'smtp_host' => 'smtp.gmail.com.',
				     'smtp_port' => 465,
				     'smtp_user' => 'prakash.prakash.g13@gmail.com', // change it to yours
				     'smtp_pass' => '******', // change it to yours
				     'mailtype' => 'html',
				     'charset' => 'iso-8859-1',
				     'wordwrap' => TRUE
				  ); 
				 
				  $this->load->library('email', $config);*/
				
				$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with Admin about his publication<br/><bold>Email : </bold>'.$contact_email.'<br/><bold>Trim Size : </bold>'.$trim_size.'<br/><bold>Binding Type : </bold>'.$binding_type.'<br/><bold>Page Count : </bold>'.$page_count.'<br/><bold>Quantity : </bold>'.$quantity.'<br/><bold>Shipping Option : </bold>'.$shipping_option.'<br/>'.$strShippingOtherDetails.'<bold>Other Details : </bold>'.$contact_message.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';

			 	// echo $email_content;
				$subject1 = SITENAME.": Contact Us";
				$this->email->from($contact_email);
				$this->email->to('publishing@artgalaxie.com'); //ADMIN_EMAIL
				$this->email->cc(BCC_EMAIL);
				$this->email->subject($subject1);
				$this->email->message($email_content);//$email_content
				$this->email->send();
				//======
				echo 'done'; 
				//} else{ echo 'InvalidCaptcha';  } 
				} 
				else
				{ 
				    echo 'InvalidEmail';  
				    
				} 
				}
				else
				{ 
				    echo 'Emailblank'; 
				    
				}
				}
				else
				{ echo "NameBlank"; }
				}
			
		}

 	function publication_details($publicationId,$bookName){
 		$data['act_id'] ='publication';
 		$where_array = array('id' => $publicationId );
		$numRow = $this->common->getnumRow('tbl_publication',$where_array);
		if($numRow==1){
			$tbl = 'tbl_publication';
			$data['publicationData'] = $publicationData = $this->common->getOneRowArray( '*', $tbl, $where_array );  
		 
			 
        	$data['getCategories'] = $this->common->get_galleries();   
        	$data['bookImages'] =  $books = $this->frontend->getBookImages($publicationId);
 

			$this->load->view('mainsite/publication_details',$data);
 		}else{
 			redirect('publications');
 		}
 	}	
 	
 	//gallery
 	//function art_services(){
 	function galleries(){
		$data['act_id'] = "regionwiseGallery";
		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('gallery');
		$data['cmsData'] =   $this->frontend->getCMSdata(2);
	 	$data['gallery'] = $this->common->get_regionwise_galleries();
		$this->load->view('mainsite/art-services',$data);
	}

	function gallery_details($id,$str){
		$data['act_id'] = "regionwiseGallery";
		//$data['atod'] = $this->frontend->getAllArtist($id);
		$data['cmsData'] =  $this->frontend->getCMSdata(2);
		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('gallery');  
		$data['galleryDetails'] = $galleryDetails= $this->common->getRegionWiseGalleryDetails($id);
		
		//echo $this->db->last_query();
	//	exit();

		$data['galleryView'] = $galleryDetails= $this->frontend->viewGalleryDetails($id);

		$data['photoGalleryExists'] = $photoGalleryExists = $this->common->getAllRowArray('*','tbl_regionwise_photogallery', array('cat_id' => $id ));
		 
		$this->load->view('mainsite/gallery_detail',$data);

	}
	//about Us
	function about_us(){

		$data['act_id'] = "about_us";
		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('aboutus');
		$data['cmsData'] =   $this->frontend->getCMSdata(8);
		$data['aboutUs'] =   $this->common->getAboutUs();
		
		//========Current LIVE site Total Count =====
		//$currentLiveSiteCount = 3480858; /*--13032017 when we took from current LIVE site---*/
		$currentLiveSiteCount = 4500000;
		$newSiteCunt  =  $this->common->getnumRow('tbl_visitor',array('1' => 1 ));
		$data['allCount'] =  $allCount  = $currentLiveSiteCount + $newSiteCunt;
		
        $query2 = $this->db->query(" select  * FROM tbl_visitor WHERE date( `visited_date_time` ) > DATE_SUB(NOW(), INTERVAL 1 DAY) ORDER BY id DESC");
        //$query2 = $this->db->query(" select  * FROM tbl_visitor WHERE date( `visited_date_time` ) > DATE_SUB( utc_timestamp()+1, INTERVAL 1 DAY) ORDER BY id DESC");
        //$query2 = $this->db->query(" select  * FROM tbl_visitor WHERE date( `visited_date_time` ) = CURDATE() ORDER BY id DESC");
        $data['todayCount'] = $query2->num_rows(); 


        //$query = $this->db->query("select * FROM tbl_visitor WHERE  date( `visited_date_time` ) = CURDATE() - INTERVAL 1 DAY");
       
        $query = $this->db->query("select * FROM tbl_visitor WHERE  date( `visited_date_time` ) = UTC_DATE() - INTERVAL 1 DAY");
        $data['yesterdaysCount'] = $query->num_rows();   
       

        $queryWeekdate = $this->db->query(" select * FROM tbl_visitor WHERE date( `visited_date_time` ) > DATE_SUB(NOW(), INTERVAL 1 WEEK) ORDER BY id DESC");
        $data['weekCount'] = $queryWeekdate->num_rows(); 

        $queryMonthdate = $this->db->query("  select * FROM tbl_visitor WHERE date( `visited_date_time` ) > DATE_SUB(NOW(), INTERVAL 1 MONTH) ORDER BY id DESC ");
        $data['monthCount'] = $queryMonthdate->num_rows(); 


        $queryLastMonth = $this->db->query("select * FROM tbl_visitor WHERE  date( `visited_date_time` ) = CURDATE() - INTERVAL 1 MONTH");
        $data['lastMonthCount'] = $queryLastMonth->num_rows();   

        $data['myIp'] = $this->input->ip_address();

       	$data['AllCountInSplit']  = str_split($allCount);

    	$this->load->view('mainsite/about_us',$data);
	}

	function about_us_email()
	{
		$this->load->library('email');
		$this->load->helper('url');
		
		$contactName            = $_POST['contact_name'];
		$contactSubject         = $_POST['contact_subject'];
		$contact_email          = $_POST['contact_email'];
		$conactDepartment       = $_POST['department'];
		$contact_message        = $_POST['contact_message1'];
		//$artist_name            = $_POST['artist_name'];
		$contactMessage = '';
		
		//print_r($_REQUEST);
		
		$this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
	    
	    if($this->form_validation->run()== FALSE)
        {
            echo "notdone";
        }
        else
        {
    		$site_logo = $this->common->getLogo();
    		$email_content = '';
    		
    		if($contact_message!='')
    		{
    		 	$contactMessage = '<bold>Message : </bold>'.$contact_message;	
    		}
    	
    		$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with Admin <br/><bold>Subject : </bold>'.$contactSubject.'<br/><bold>Department : </bold>'.$conactDepartment.'<br/><br/><bold>Email : </bold>'.$contact_email.'<br/>'.$contactMessage.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
    	 	
    		$subject1 = SITENAME.": Contact Us";
    		$this->email->from($contact_email);
    		$this->email->to('general@artgalaxie.com'); //ADMIN_EMAIL
    		$this->email->cc(BCC_EMAIL);
    		$this->email->subject($subject1);
    		$this->email->message($email_content);//$email_content
    		$this->email->send();
    		
    		echo 'done';
        }
	}
		
	function career_email()
	{
		$this->load->library('email');
		$this->load->helper('url');
		
		$firstName          = $_POST['career_first_name'];
		$lastName           = $_POST['career_last_name'];
		$career_email       = $_POST['career_email'];
		$websiteLink        = $_POST['career_website_link'];
		$careerDepartment   = $_POST['career_department'];
		$career_message     = $_POST['career_message'];
		//$career_file        = $_POST['career_file'];
	    //print_r($_POST);
	    
	    $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
	    
	    if($this->form_validation->run()== FALSE)
        {
            echo "notdone";
        }
        else
        {
            $final_file  = '';
    		if($_FILES['career_file']['name']!='')
    	  	{
    			$file=$_FILES;
    			$_FILES['career_file']['name'] = $file['career_file']['name'];
    			$generate_file_name = str_replace(' ','_','carrer_cv')."_".uniqid();
    			$upload_file_path = $_FILES['career_file']['name'];
    			$file_ext = pathinfo($upload_file_path, PATHINFO_EXTENSION);							
    					
    			$final_file = $generate_file_name.".".$file_ext;					
    					
    			$this->load->library('upload');
    			$config['mailtype']      = 'html';
    			$config['file_name']     = $generate_file_name;
    			$config['upload_path']   = './uploads/career_file';
    			$config['allowed_types'] = 'doc|docx|pdf|jpg';
    								
    			$this->upload->initialize($config);					
    			$_FILES['career_file']['type']=$file['career_file']['type'];
    			$_FILES['career_file']['tmp_name']=$file['career_file']['tmp_name'];
    			$_FILES['career_file']['error']=$file['career_file']['error'];
    			$_FILES['career_file']['size']=$file['career_file']['size'];
    			$this->upload->do_upload('career_file');
    		} 
			
		    $careerMessage = '';
		
 	        //======Send emial to user about his account creation
    		$site_logo = $this->common->getLogo();
    		$email_content = '';
    		if($career_message!='')
    		{
    		 	$careerMessage = '<bold>Message : </bold>'.$career_message;	
    		}
    		$file_fullpath = base_url()."uploads/career_file/".$final_file;
    		$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$firstName.' '.$lastName.' Wants to contact with Admin <br/><bold>Website Link : </bold>'.$websiteLink.'<br/><bold>Department : </bold>'.$careerDepartment.'<br/><br/><bold>Email : </bold>'.$career_email.'<br/>'.$career_message.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
    		$subject1 = SITENAME.": Career";
            $this->email->attach($file_fullpath);
            $this->email->set_newline("\r\n");
            $this->email->set_crlf("\r\n");
    		$this->email->from($career_email);
    		$this->email->to('general@artgalaxie.com'); //ADMIN_EMAIL
    		//$this->email->to('bhavinbvekariya@gmail.com'); //ADMIN_EMAIL
    		$this->email->cc(BCC_EMAIL);
    		$this->email->subject($subject1);
    		$this->email->message($email_content);//$email_content
    		$this->email->send();
		    echo 'done'; 
        }
	}
	
	function order_email()
	{
		$this->load->library('email');
		$this->load->helper('url');
		
		$order_first_name   = $_POST['order_first_name'];
		$order_last_name    = $_POST['order_last_name'];
		$order_email        = $_POST['order_email'];
        $order_address1     = $_POST['order_address1'];
        $order_address2     = $_POST['order_address2'];
        $order_city         = $_POST['order_city'];
        $order_state        = $_POST['order_state'];
        $order_postalcode   = $_POST['order_postalcode'];
        $order_country      = $_POST['order_country'];
		$order_message      = $_POST['order_message'];
		
		print_r($_POST);
		
	    $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
	    
	    if($this->form_validation->run()== FALSE)
        {
            echo "notdone";
        }
        else
        {
		    $orderMessage = '';
		
 	        //======Send emial to user about his account creation
    		$site_logo = $this->common->getLogo();
    		$email_content = '';
    		if($order_message!='')
    		{
    		 	$orderMessage = '<bold>Message : </bold>'.$order_message;	
    		}
    	
    		$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$order_first_name.' '.$order_last_name.' Wants to contact with Admin <br/><bold>Address : </bold>'.$order_address1.' '.$order_address2.'<br/><bold>City : </bold>'.$order_city.'<br/><br/><bold>State : </bold>'.$order_state.'<br/><br/><bold>Post Code : </bold>'.$order_postcode.'<br/><br/<bold><bold>Country : </bold>'.$order_country.'<br/><br/<bold>Email : </bold>'.$order_email.'<br/>'.$order_message.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
    		$subject1 = SITENAME.": Order";
            $this->email->set_newline("\r\n");
            $this->email->set_crlf("\r\n");
    		$this->email->from($order_email);
    		$this->email->to('artgalaxie@gmail.com'); //ADMIN_EMAIL
    		$this->email->cc(BCC_EMAIL);
    		$this->email->subject('Art Galaxie - Order');
    		$this->email->message($email_content);//$email_content
    		$this->email->send();
		    echo 'done'; 
        }
	}

	//services
 	function services(){
		$data['act_id'] = "services";
		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('services');
		$data['cmsData'] =   $this->frontend->getCMSdata(9);
	 	$data['services'] = $this->frontend->get_services_pages(0); //pid = 0
	 	$this->load->view('mainsite/services',$data);
	}
	
		function talkto_us_email(){
		$this->load->library('email');

		if(extract($_POST)){
			$contactName = $this->input->post('contact_name');
			$contactSubject = $this->input->post('contact_subject');
			$contact_email = $this->input->post('contact_email');
			//$conactDepartment = $this->input->post('department');
			$contact_message = $this->input->post('contact_message');
		//	$artist_name = $this->input->post('artist_name');
			 
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
				
				$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with Admin <br/><bold>Subject : </bold>'.$contactSubject.'<br/><bold>Services : </bold>'/*.$conactDepartment.'<br/><bold>Email : </bold>'*/.$contact_email.'<br/>'.$contactMessage.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
			 	 
				$subject1 = SITENAME.":Service Contact Us";
				$this->email->from($contact_email);
				$this->email->to('general@artgalaxie.com'); //ADMIN_EMAIL 
				//$this->email->to('subhalaxmi@cusplink.com');
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

	//Art Marketing
	function marketing_advertising(){

		$data['act_id'] = "artMarketing";
		$data['sub_act_id'] = "1";
		$data['cmsData'] =   $this->frontend->getCMSdata(10);
		$where = array('parent_id' => '0');
	 
	 	$data['navigationDs'] = $this->frontend->getArtMarketing('id,page_id,icone_image',$where);

	 	$data['marketing_advertising'] = $this->common->getOneRowArray('*','tbl_art_marketing',array('id' => '10'));
	 	$data['marketing_boxes'] = $this->frontend->getArtMarketingBoxes(array('art_id' => '10')); //box 1

	 	$data['section2'] = $this->common->getOneRowArray('*','tbl_art_marketing',array('id' => '4'));
		$data['marketing_boxes2'] = $this->frontend->getArtMarketingBoxes(array('art_id' => '4')); //box 2

		$data['section3'] = $this->common->getOneRowArray('*','tbl_art_marketing',array('id' => '5'));
		$data['marketing_boxes3'] = $this->frontend->getArtMarketingBoxes(array('art_id' => '5')); //box 2
		
		$this->load->view('mainsite/marketing_advertising',$data);
	}

	function digital_marketing(){

		$data['act_id'] = "artMarketing";
		$data['sub_act_id'] = "2";
		$data['cmsData'] =   $this->frontend->getCMSdata(10);
		 
		$where = array('parent_id' => '0');
	 	$data['navigationDs'] = $this->frontend->getArtMarketing('id,page_id,icone_image',$where);

	 	$data['section1'] = $this->common->getOneRowArray('*','tbl_art_marketing',array('id' => '11'));
		$data['marketing_boxes1'] = $this->frontend->getArtMarketingBoxes(array('art_id' => '11')); //box1
		
		$data['section2'] = $this->common->getOneRowArray('*','tbl_art_marketing',array('id' => '6'));
		$data['marketing_boxes2'] = $this->frontend->getArtMarketingBoxes(array('art_id' => '6')); //box2
		
		$data['section3'] = $this->common->getOneRowArray('*','tbl_art_marketing',array('id' => '7'));
		$data['marketing_boxes3'] = $this->frontend->getArtMarketingBoxes(array('art_id' => '7')); //box3
		
		$this->load->view('mainsite/digital_marketing',$data);
	}

	function content_marketing(){

		$data['act_id'] = "artMarketing";
		$data['sub_act_id'] = "3";
		$data['cmsData'] =   $this->frontend->getCMSdata(10);
		 
		$where = array('parent_id' => '0');
	 	$data['navigationDs'] = $this->frontend->getArtMarketing('id,page_id,icone_image',$where);

	 	$data['section1'] = $this->common->getOneRowArray('*','tbl_art_marketing',array('id' => '12'));
		$data['marketing_boxes1'] = $this->frontend->getArtMarketingBoxes(array('art_id' => '12')); //box1
		
		$this->load->view('mainsite/content_marketing',$data);
	}

	function art_marketing_contact_us()
	{
	    $this->load->library('email');
		$this->load->helper('url');
	    
	    $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
	
	 	$contactName    = $this->input->post('am_contact_name');
	 	$contact_email  = $this->input->post('am_contact_email');
		$profile        = $this->input->post('am_profile');
		$website        = $this->input->post('am_website');
		$enquiry_type   = $this->input->post('am_enquiry_type');
		$contact_message = $this->input->post('am_contact_message');
		$strWebsite      = '<bold>Website : </bold>'.$website.'<br/>';
		
		if($this->form_validation->run()== FALSE)
        {
            echo "notdone";
        }
        else
        {
    		$contactMessage = '';
    		$site_logo = $this->common->getLogo();
    		$email_content = '';
    	  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with Admin about art marketing<br/><bold>Email : </bold>'.$contact_email.'<br/><bold>Profile : </bold>'.$profile.'<br/><bold>Video Type : </bold>'.$enquiry_type.'<br/>'.$strWebsite.'<bold>Additional Information  : </bold>'.$contact_message.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
    	 	 
    		$subject1 = SITENAME.": Art Marketing Enquiry";
    		$this->email->from($contact_email);
    		//$this->email->to('marketing@artgalaxie.com'); // 
    		$this->email->to('bhavinbvekariya@gmail.com'); // 
    		$this->email->cc(BCC_EMAIL);
    		$this->email->subject($subject1);
    		$this->email->message($email_content);//$email_content
    		$this->email->send();
    		echo 'done'; 
        }
	}
 	
 	//Art Marketing end


	//website
 	function website(){
 		$data['act_id'] = "website";
	 	$data['cmsData'] =   $this->frontend->getCMSdata(11);
	 	$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('website'); //video-services
		
		$data['section1'] = $this->frontend->getWebsite();
		$this->load->view('mainsite/website',$data);
	}

	function website_contact_us(){
		$this->load->library('email');
		if(extract($_POST)){
		 	$website_contact_name = $this->input->post('website_contact_name');
		 	$website_contact_email = $this->input->post('website_contact_email');
			$package_id = $this->input->post('package_id');
			$contact_message = $this->input->post('website_contact_message');
		//	$captcha = $_POST["captcha"];
			 
		 

			$website_contact_message = '';
			if($website_contact_name!=''){
				if($website_contact_email!=""){
				if (preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/",$website_contact_email)){
				/*$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfgAQ4UAAAAALko9zWPHdgcz0JO5VfrbakZAopz&response=".$captcha);

				$captcha_success=json_decode($verify);*/
 			//	if ($captcha_success->success==true) {
				//======Send emial to user about his account creation
				$site_logo = $this->common->getLogo();
				$email_content = '';
			  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$website_contact_name.' Wants to contact with Admin about website<br/><bold>Email : </bold>'.$website_contact_email.'<br/><bold>Package : </bold>'.$package_id.'<br/><bold>Other Information : </bold>'.$contact_message.'<br/></p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
			 	 
				$subject1 = SITENAME.": Website Enquiry";
				$this->email->from($website_contact_email);
				$this->email->to('websites@artgalaxie.com');
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

	function video_production(){

		$data['act_id'] = "video_production";
	 	$data['cmsData'] =   $this->frontend->getCMSdata(12);
	 	$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('video-production'); //video-services 	
		$data['section1'] = $this->frontend->getVideoProduction();
		$this->load->view('mainsite/video-production',$data);
	}

	function video_production_contact_us()
	{
	    $this->load->library('email');
		$this->load->helper('url');
	    
	    $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
        
	 	$contactName = $this->input->post('vp_contact_name');
	 	$contact_email = $this->input->post('vp_contact_email');
		$profile = $this->input->post('vp_profile');
		$website = $this->input->post('vp_website');
		$enquiry_type = $this->input->post('vp_enquiry_type');
		$contact_message = $this->input->post('vp_contact_message');
		$strWebsite = '<bold>Website : </bold>'.$website.'<br/>';
		$strMessage = '<bold>Other Information : </bold>'.$contact_message.'<br/>';
	    $contactMessage = '';
	    
	    if($this->form_validation->run()== FALSE)
        {
            echo "notdone";
        }
        else
        {
            
    		$site_logo = $this->common->getLogo();
    		$email_content = '';
    	  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with Admin about video production<br/><bold>Email : </bold>'.$contact_email.'<br/><bold>Profile : </bold>'.$profile.'<br/><bold>Enquiry Type : </bold>'.$enquiry_type.'<br/>'.$strWebsite.' '.$strMessage.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
    	 	 
    		$subject1 = SITENAME.": Video Production Enquiry";
    		$this->email->from($contact_email);
    		$this->email->to('video@artgalaxie.com');
    		$this->email->cc(BCC_EMAIL);
    		$this->email->subject($subject1);
    		$this->email->message($email_content);//$email_content
    		$this->email->send();
    		echo 'done'; 
        }
	}
	
	
	//exhibition
	function exhibitions(){
	$data['act_id'] = "exhibitions";
	 	$data['cmsData'] =   $this->frontend->getCMSdata(13);
	 	$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('exhibitions'); //exhibitions
		$data['section1'] = $this->frontend->getExibition();
		$data['slider1'] = $this->frontend->getExibitionSliders(array('exibition_id' =>  4));
	   //$data['slider2'] = $data['slider21'] = $this->frontend->getExibitionSliders(array('exibition_id' =>  5));
	   
	    $countryName = $this->input->post('countryName');	
				
		$data['slider2'] = $data['slider21'] = $this->frontend->getExibitionSliders(array('exe_filter_id' => $countryName));
		
		$data['slider3'] =  $this->frontend->getExibitionSliders(array('exibition_id' =>  6));
		$data['gallery'] =  $this->common->getAllRowArray('*','tbl_regionwise_galleries', array('1' => 1 ), 'cat_id' ,'desc' 
			  );  
		
		//var_dump($id);
		//exit();
		$this->load->view('mainsite/exhibitions',$data);
	}
		function slider(){
	$data['act_id'] = "exhibitions";
	 	$data['cmsData'] =   $this->frontend->getCMSdata(13);
	 	$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('exhibitions'); //exhibitions
		$data['section1'] = $this->frontend->getExibition();
		$data['slider1'] = $this->frontend->getExibitionSliders(array('exibition_id' =>  4));
			$data_id = $this->uri->segment(3);
		$data['slider2'] = $data['slider21'] = $this->frontend->getExibitionSliders(array('art_id' =>  
			$data_id));
	//	$data['slider2'] = $data['slider21'] = $this->frontend->getExibitionSliders(array('exibition_id' =>  5));

		$data['slider3'] =  $this->frontend->getExibitionSliders(array('exibition_id' =>  6));
		$data['gallery'] =  $this->common->getAllRowArray('*','tbl_regionwise_galleries', array('1' => 1 ), 'cat_id' ,'desc' 
			  );  
		
		//var_dump($id);
		//exit();
		$this->load->view('mainsite/exhibitions',$data);
	}



	
	function exhibition_email()
	{
		$this->load->library('email');
		$this->load->helper('url');
		
	    $contactName    = $this->input->post('exh_contact_name');
	 	$contact_email  = $this->input->post('exh_contact_email');
		$profile        = $this->input->post('exh_profile');
		$website        = $this->input->post('exh_website');
		$enquiry_type   = $this->input->post('exh_enquiry_type');
		$contact_message = $this->input->post('exh_contact_message');
		$strWebsite      = '<bold>Website : </bold>'.$website.'<br/>';
	    
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
    	  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with Admin about exhibition<br/><bold>Email : </bold>'.$contact_email.'<br/><bold>Profile : </bold>'.$profile.'<br/><bold>Enquiry Type : </bold>'.$enquiry_type.'<br/>'.$strWebsite.'<bold>Message : </bold>'.$contact_message.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
    		$subject1 = SITENAME.": Exhibition Enquiry";
    		$this->email->from($contact_email);
    		$this->email->to('exhibitions@artgalaxie.com'); 
    		$this->email->cc(BCC_EMAIL);
    		$this->email->subject($subject1);
    		$this->email->message($email_content);//$email_content
    		$this->email->send();
    		echo 'done'; 
        }
	}
	

	//testimonials
 	function testimonials(){
 		$data['act_id'] = "testimonials";
 	 	$data['testimonials'] = $this->frontend->getTestimonials();
		$this->load->view('mainsite/testimonial',$data);
 	} 
 	function sent_testimonial()
 	{	 
 	    $this->load->library('email');
		if(extract($_POST)){
		 	$testo_title = $this->input->post('testo_title');
		 	$testo_description = $this->input->post('testo_description');
			$testo_about = $this->input->post('testo_about');
			$testo_id = $this->input->post('testo_id');
				
		  	//$captcha = $_POST["captcha"];
		 	//if($this->session->userdata('CUSTOMER_TYPE')=='artist' && $this->input->post('uploadedImage')!=''){ 
		 	if($this->session->userdata('CUSTOMER_TYPE')=='artist' && @$_FILES['my-file-selector']['name']!=''){ 
		 		//$testo_image = $this->input->post('uploadedImage');
		 		$testo_image = $_FILES['my-file-selector']['name'];
		 		$where= array("img_thumb " => $testo_image);
				$this->common->delete_entry("temp_image_upload_tbl",$where);				
				
				$file=$_FILES;	
				$_FILES['my-file-selector']['name'] = $file['my-file-selector']['name'];					
				
				$filenames = str_replace(' ','_','testimonial')."_".rand(0000,9999);
				$path = $_FILES['my-file-selector']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);						
						
				$filename = $filenames.".".$ext;
				
				$testo_image = $filename;
				
				//$filename = $_FILES['my-file-selector']['name'];
				
				$this->load->library('upload');
				$config['file_name']     = $filenames;
				$config['upload_path']   = './uploads/testimonials/';
				$config['allowed_types'] = 'png|jpeg|jpg|gif';
							
				$this->upload->initialize($config);					
				$_FILES['my-file-selector']['type']=$file['my-file-selector']['type'];
				$_FILES['my-file-selector']['tmp_name']=$file['my-file-selector']['tmp_name'];
				$_FILES['my-file-selector']['error']=$file['my-file-selector']['error'];
				$_FILES['my-file-selector']['size']=$file['my-file-selector']['size'];
				$this->upload->do_upload('my-file-selector');			
				
				
		 	}else{
		 		$testo_image = '';
		 	}
			
		 	if($testo_title!=''){
				if($testo_description!=""){
			 	//$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfgAQ4UAAAAALko9zWPHdgcz0JO5VfrbakZAopz&response=".$captcha);

				//$captcha_success=json_decode($verify);
				$contactName = $this->common->getUserName($this->session->userdata('CUST_ID'));
 				//if ($captcha_success->success==true) {
				//======Send emial to user about his account creation
				$site_logo = $this->common->getLogo();
				$email_content = '';
			  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' sent you testimonial as below<br/><bold>Title : </bold>'.$testo_title.'<br/><bold>About : </bold>'.$testo_about.'<br/><bold>Message : </bold>'.$testo_description.'<br/> Please chek <a href="'.site_url("secure").'"> link </a> to apprve this testimonial.</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
			 	 
				$subject1 = SITENAME.": Testimonial Received";
				$this->email->from(ADMIN_EMAIL);
				$this->email->to('testimonial@artgalaxie.com'); //
				$this->email->cc(BCC_EMAIL);
				$this->email->subject($subject1);
				$this->email->message($email_content);
				$this->email->send();
				//====== insert into db
				$value_array =   array(
									'testo_title' => $testo_title,
									'testo_description' => $testo_description,
									'testo_about' => $testo_about,
									'testo_added_by' => $testo_id,
									'testo_added_date' => date('Y-m-d h:i:s'),
									'testo_image' => $testo_image,
									'notification' => '0'
				);
				
				
				
				$this->common->add_records('tbl_testimonials',$value_array);
				$new_registration_id =	$this->db->insert_id();		

				//-deleted the record from temp table
			 	echo 'done'; 
				//} else{ echo 'InvalidCaptcha';  } 
				}else{ echo 'descriptionBlank'; }
				}else{ echo "titleBlank"; }
				}
 	}
	function likeTestimonial(){
 		if(extract($_POST)){
 			$testoId = $this->input->post('testoId');
		 	$userId = $this->input->post('userId');
		 	$value_array =   array(
				'testo_id' => $testoId,
				'member_id' => $userId,
			);
			$this->common->add_records('tbl_testo_like',$value_array);
			$count = $this->common->getTotalLikeForTesto($testoId);
			echo "Done####".$count;
 		}
 	}

 	//newsletter
 	function subscribe_newsletter(){
		$this->load->library('email');
		if(extract($_POST)){
		 	$contactName = $this->input->post('contact_name');
		 	$contact_email = $this->input->post('contact_email');
		//	$captcha = $_POST["captcha"];
			 
		 

			$contactMessage = '';
			if($contact_name!=''){
				if($contact_email!=""){
				if (preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/",$contact_email)){
			//	$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfgAQ4UAAAAALko9zWPHdgcz0JO5VfrbakZAopz&response=".$captcha);

			//	$captcha_success=json_decode($verify);
 				// if ($captcha_success->success==true) {
 				 //Check email already exists 
 				 $isExists = $this->common->getnumRow('tbl_newsletter',array('subscriber_email' => $contact_email));
 				 if($isExists==0){
 				//======Send emial to user about his account creation
				$site_logo = $this->common->getLogo();
				$email_content = '';
			  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' subscribe newsletter from site<br/><bold>Email : </bold>'.$contact_email.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
			 	 
				$subject1 = SITENAME.": Newsletter Subscribed";
				$this->email->from($contact_email);
				$this->email->to(ADMIN_EMAIL); // 'website@artgalaxie.com'
				$this->email->cc(BCC_EMAIL);
				$this->email->subject($subject1);
				$this->email->message($email_content);//$email_content
				$this->email->send();
				//======
				//insert into tbl
				$addData = array(
					'subscriber_email' => $contact_email,
					'subscriber_name' => $contactName,
					);
				$this->common->add_records('tbl_newsletter',$addData);
				echo 'done'; 
				}else{ echo 'AlreadyExists';  }
			//	}else{ echo 'InvalidCaptcha';  } 
				}else{ echo 'InvalidEmail';  } 
				}else{ echo 'Emailblank'; }
				}else{ echo "NameBlank"; }
				}
			
		}
		
		
	//Mail Us
 	function mail_us()
 	{
		$this->load->library('email');
		if(extract($_POST))
		{
		 	$to_email = $this->input->post('to_email');
		 	$from_email = $this->input->post('from_email');
		 	$email_content = $this->input->post('contact_message');
		//	$captcha = $_POST["captcha"];
			 
			//$contactMessage = '';
			//if($contact_name!=''){
			if($from_email!="")
			{
				if (preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/",$from_email))
				{
			//	$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfgAQ4UAAAAALko9zWPHdgcz0JO5VfrbakZAopz&response=".$captcha);

			//	$captcha_success=json_decode($verify);
 				// if ($captcha_success->success==true) {
 				 //Check email already exists 
 				 //$isExists = $this->common->getnumRow('tbl_newsletter',array('subscriber_email' => $contact_email));
 				 //if($isExists==0){
 				//======Send emial to user about his account creation
				$site_logo = $this->common->getLogo();
				$email_content = '';
			  	//$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' subscribe newsletter from site<br/><bold>Email : </bold>'.$contact_email.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
			 	 
				$subject1 = SITENAME.": Enquiry Mail";
				$this->email->from($from_email);
				//$this->email->to(ADMIN_EMAIL); // 'website@artgalaxie.com'
				$this->email->to("rajuteli2009@gmail.com"); // 'website@artgalaxie.com'
				//$this->email->cc(BCC_EMAIL);
				$this->email->subject($subject1);
				$this->email->message($email_content);//$email_content
				$this->email->send();
				//======
				//insert into tbl
/*				$addData = array(
					'subscriber_email' => $contact_email,
					'subscriber_name' => $contactName,
					);
				$this->common->add_records('tbl_newsletter',$addData);*/
				echo 'done'; 
			//	}else{ echo 'AlreadyExists';  }
			//	}else{ echo 'InvalidCaptcha';  } 
				}else{ echo 'Invalid Email';  } 
			}else{ echo 'Email Blank'; }
				//}else{ echo "NameBlank"; }
		}
	}

	//design
	function design(){
 		$data['act_id'] = "design";
	 	$data['cmsData'] =   $this->frontend->getCMSdata(14);
		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('design');
		$data['services'] = $this->frontend->get_services_pages(4); //pid = 4
	 	$this->load->view('mainsite/design',$data);
	}
	
	function design_services_contact_us()
	{
	    $this->load->library('email');
		$this->load->helper('url');
	   
        $contactName = $this->input->post('ds_contact_name');
	 	$contact_email = $this->input->post('ds_contact_email');
		$profile = $this->input->post('ds_profile');
		$website = $this->input->post('ds_website');
		$enquiry_type = $this->input->post('ds_enquiry_type');
		$contact_message = $this->input->post('ds_contact_message');
		$strWebsite = '<bold>Website : </bold>'.$website.'<br/>';
		
		$this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
        
        
	    $contactMessage = '';
	    
	    if($this->form_validation->run()== FALSE)
        {
            echo "notdone";
        }
        else
        {
    		$site_logo = $this->common->getLogo();
    		$email_content = '';
    	  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with Admin about exhibition<br/><bold>Email : </bold>'.$contact_email.'<br/><bold>Profile : </bold>'.$profile.'<br/><bold>Enquiry Type : </bold>'.$enquiry_type.'<br/>'.$strWebsite.'<bold>Message : </bold>'.$contact_message.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
    		$subject1 = SITENAME.": Design Services Enquiry";
    		$this->email->from($contact_email);
    		$this->email->to('design@artgalaxie.com');
    		$this->email->cc(BCC_EMAIL);
    		$this->email->subject($subject1);
    		$this->email->message($email_content);//$email_content
    		$this->email->send();
    		echo 'done';
        }
	}

	function art(){
 		$data['act_id'] = "art";
	 	$data['cmsData'] =   $this->frontend->getCMSdata(15);
		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('artservices');
		$data['services'] = $this->frontend->get_services_pages(3); //pid = 3
	 	$this->load->view('mainsite/art',$data);
	}

	function art_services_contact_us()
	{
		
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
    	$this->load->helper('url');
		
		$contactName = $this->input->post('artservice_contact_name');
	 	$contact_email = $this->input->post('artservice_contact_email');
		$profile = $this->input->post('artservice_profile');
		$website = $this->input->post('artservice_website');
		$enquiry_type = $this->input->post('artservice_enquiry_type');
		$contact_message = $this->input->post('artservice_contact_message');
		
		$strWebsite = '<bold>Website : </bold>'.$website.'<br/>';
	
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
		  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contactName.' Wants to contact with Admin about exhibition<br/><bold>Email : </bold>'.$contact_email.'<br/><bold>Profile : </bold>'.$profile.'<br/><bold>Enquiry Type : </bold>'.$enquiry_type.'<br/>'.$strWebsite.'<bold>Message : </bold>'.$contact_message.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
			$subject1 = SITENAME.": Art Services Enquiry";
			$this->email->from($contact_email);
			$this->email->to('artservice@artgalaxie.com');
			$this->email->subject($subject1);
            $this->email->message($email_content);//$email_content
            $this->email->send();
            echo 'done'; 
		}
	}

	function guestbook(){
		$data['act_id'] = "guestbook";
	 	$data['dataDs'] = $this->common->getGuestBook(1); //1==approved
	 	$this->load->view('mainsite/guestbook',$data);
	}	

	function guestbook_contact_us(){
		$this->load->library('email');
		if(extract($_POST)){
		 	 
			$contact_message = $this->input->post('contact_message');
		//	$captcha = $_POST["captcha"];
			 

			 
			if($contact_message!=''){
			 
				//$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfgAQ4UAAAAALko9zWPHdgcz0JO5VfrbakZAopz&response=".$captcha);

				//$captcha_success=json_decode($verify);
 				 //if ($captcha_success->success==true) {
 				 $mem_id = $this->session->userdata('CUST_ID');
 				 $userName = $this->common->getUserName($mem_id);
				//======Send emial to user about his account creation
				$site_logo = $this->common->getLogo();
				$email_content = '';
			  	$email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$userName.' Wants to contact with Admin about Guestbook<br/><bold>Message : </bold>'.$contact_message.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
			 	 
				$subject1 = SITENAME.": Guestbook";
				$this->email->from($this->session->userdata('email'));
				$this->email->to(ADMIN_EMAIL); //
				$this->email->cc(BCC_EMAIL);;
				$this->email->subject($subject1);
				$this->email->message($email_content);//$email_content
				$this->email->send();
				$addData = array(
					'added_by' => $mem_id,
					'short_description' => $contact_message,
					'added_date' =>date('Y-m-d H:i:s'),
					'is_approved' => '0',
					'notification' =>'0'
					);
				$this->common->add_records('tbl_guestbook',$addData);
				//======
				echo 'done'; 
				//} else{ echo 'InvalidCaptcha';  } 
				}else{ echo "BlankMessage"; }
				} 
	}
	function art_of_giving()
	{
		$data['act_id'] = "art_of_giving";
		$data['artgivingData'] =  $sliderData = $this->frontend->otherSliderContent('art_of_giving');
		$data['cmsData'] =   $this->frontend->getCMSdata(23);
		$data['artgivingDs'] = $this->common->get_art_giving();
		$data['artgivingcharity'] = $this->common->get_art_giving_charity();
		$data['justgivingartist'] = $this->common->get_just_giving_to_artist();
		$data['justgivingdonate'] = $this->common->get_otherways_to_donate();
		
		//	$data['navigationDs'] = $this->frontend->getArtMarketing('id,page_id,icone_image',$where);
	    //	$data['gallery'] = $this->common->get_regionwise_galleries();
		$this->load->view('mainsite/art_of_giving',$data);
	}
	function gallery_benefits(){
		$data['act_id'] = "gallery_benefits";
		$data['gallery_benefitsData'] =  $sliderData = $this->frontend->otherSliderContent('gallery_benefits');
		$data['cmsData'] =   $this->frontend->getCMSdata(24);
		$data['gallerybenefits'] = $this->common->get_gallerybenefits();
	 //	$data['gallery'] = $this->common->get_regionwise_galleries();
	    $data['getCountryMapCode'] = $this->frontend->get_country_map_code();
		$this->load->view('mainsite/gallery_benefits',$data);
	}
	
	
	function benefit_apply_email()
	{
	   
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('email');
    	$this->load->helper('url');
			 
		$contact_name_benefits = $this->input->post('contact_name_benefits');			
		$title  = $this->input->post('title');
		$gallery_name = $this->input->post('gallery_name');
		$email = $this->input->post('email');
		$gallery_website= $this->input->post('gallery_website');
		$contact_message = $this->input->post('contact_message_benefits');
	    
        $this->form_validation->set_rules('g-recaptcha-response', 'recaptcha validation', 'required|callback_validate_captcha');
        $this->form_validation->set_message('validate_captcha', 'Please check the the captcha form');
        
        if($this->form_validation->run()== FALSE)
        {
            echo "notdone";
        }
        else
        {
            $contact_message_benefits = '';
            $site_logo = $this->common->getLogo();
            $email_content = '';
            $email_content.='<div style="width:99%;margin:0 auto;background:#FFF; height:140px;border:1px solid #666;"><div style="text-align:center; padding:5px 0;"><img src="'.base_url().'uploads/sitelogo/'.$site_logo.'" width="150"></div></div><div style="background-color:#F6F6F6;margin:0 auto; width:99%; border:1px solid #666;"><p style="font-size:14px; font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif; color:#313131; padding:5px 0 5px 15px;text-align:left;">Hello Admin,</p><p style="font-size:14px;font-family:Verdana,Arial,Helvetica,sans-serif;padding:5px 0 5px 15px;text-align:left">'.$contact_name_benefits.' Wants to contact with Admin about his gallery benefits<br/><bold>Email : </bold>'.$email.'<br/><bold>Title : </bold>'.$title.'<br/><bold>Gallery Name : </bold>'.$gallery_name.'<br/><bold>Other Details : </bold>'.$contact_message.'</p><p>&nbsp;</p><p style="padding:5px 0 5px 0;font-size:12px;line-height:22px;text-align:left;padding-left:15px; font-weight:bold;">Thanks & Regards,<br/>'.SITENAME.'</p></div>';
            $subject1 = SITENAME.": Apply To Partner With Us";
            $this->email->from($email);
            $this->email->to('general@artgalaxie.com');
            $this->email->subject($subject1);
            $this->email->message($email_content);//$email_content
            $this->email->send();
            echo 'done'; 
        }
	}
			
	function just_giving_book(){
 		$data['act_id'] = "Just giving book";
 		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('publication');
 		$data['cmsData'] =   $this->frontend->getCMSdata(25);
 		$data['bookDs'] = $this->frontend->getbook();
 		$data['publicationDs'] = $this->common->getPublication();
 		
 	   // print_r($data['bookDs']);exit;
		$this->load->view('mainsite/just_giving_book',$data);
 	} 
 		function just_giving_websites(){
 		$data['act_id'] = "website";
	 	$data['cmsData'] =   $this->frontend->getCMSdata(26);
	 	//$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('website'); //video-services
		
		$data['websiteDs'] = $this->frontend->getartwebsite();
		//print_r($data);exit;
		$this->load->view('mainsite/just_giving_websites',$data);
	}
		function just_giving_video(){
 		$data['act_id'] = "video";
	 	$data['cmsData'] =   $this->frontend->getCMSdata(27);
	 //	$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('website'); //video-services
		
		$data['videoDs'] = $this->frontend->getjustgivingvideo();
	//	print_r($data);exit;
		//remember this when u write query.
       // $data['totalVideoCount'] = $totalVideoCount = count($totalCount);
        
       
 		//$data['cmsData'] =   $this->frontend->getCMSdata(17);
		$this->load->view('mainsite/just_giving_video',$data);
	}
	
	function view_competitions()
	{
 	    $data['act_id']     =   "view_competitions";
 	    $data['cmsData']    =   $this->frontend->getCMSdata(28);
 	    
 	    // For Running Cometition
 	    $data['compDs']     =   $this->frontend->get_view_competitions();
 	    
 	    if($data['compDs']=='0')
        {
            // Nothing
        }
        else{
            $data['compAr']     =   $this->frontend->get_view_competitions_artist();
        }

 	    
 	    
 	     // For Past Cometition
 	    $data['compDsPast']     =   $this->frontend->get_view_past_competitions();
 	    $data['compArPast']     =   $this->frontend->get_view_past_competitions_artist();
 	    $data['list_intro']     =   $this->common->get_competitions_intro();
 	    
 	    
	    $this->load->view('mainsite/view_competitions',$data);
     }
 
    function video($start=0){
 		$data['start'] = $start;
 		$data['next_start'] = $start+5;
 		$data['previous'] = $start-5;
 		$data['act_id'] = "artist";
 		$data['galleries'] = $this->common->get_galleries();
 		$data['artistVideos'] = $artistVideos =  $this->frontend->getArtistNameIfVideosExists($start,'');//get those artist name whose videos are exists 
 		$data['sliderData'] =  $sliderData = $this->frontend->otherSliderContent('video'); //exhibitions
 		$data['numRow'] = count($artistVideos);


 		//Total video count .i.e to hide the next button
 		$query = $this->db->query("Select user.id,user.first_name,user.last_name,user.galleries_id from tbl_user_master as user,tbl_artist_videos as video where    user.user_type='artist' and user.id=video.user_id group by video.user_id order by user.first_name asc ");
        $totalCount = $query->result_array(); //remember this when u write query.
        $data['totalVideoCount'] = $totalVideoCount = count($totalCount);
        
       
 		$data['cmsData'] =   $this->frontend->getCMSdata(17);
 		
 		//Other Videos
 	    $data['otherVideoList'] = $this->frontend->get_other_videos();
		
		
		$this->load->view('mainsite/video',$data);
 	}
 	
 	function refersion(){
 	    $data['act_id'] = "faqs";
 	    $this->load->view('mainsite/refersion',$data);
 	}
 	
 	function refersion_coming_soon(){
 	    $data['act_id'] = "faqs";
 	    $this->load->view('mainsite/refersion_coming_soon',$data);
 	}
 	function faqs(){
	    $data['act_id'] = "faqs";
 	    $data['faqData'] = $this->common->faqsdata();
	    $this->load->view('mainsite/faqs',$data);
	}
 	
} ?>