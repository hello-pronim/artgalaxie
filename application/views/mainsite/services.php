 <?php
  //require_once(dirname(__FILE__) . "/../../../../smartslider/start.php");
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
  ?>
  <?php 
    $com_key = new  common(); 
    $gckey = $com_key->get_google_captcha_key();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?=stripslashes($cmsData['meta_description'])?>">
<meta name="keywords" content="<?=stripslashes($cmsData['meta_keyword'])?>">
<meta name="author" content=""> 
<title><?=SITENAME?> - <?=stripslashes($cmsData['meta_title'])?> </title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom-31012017.css" rel="stylesheet"> <!-- CSS from psd  31012017-->
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />
 
<style>
.no-paading a {
    line-height: 10px !important;
    width: 175px !important;
}
.nav-tabs>li {
    float: none;
}
.container-fluid.service-btn{
    background: #eee url(../images/service-page-bg6.jpg) no-repeat scroll center top;
    padding: 40px 0 40px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.5);
}
.no-paading {
    padding: 0;
    box-shadow: none;
    background: transparent;
    /*width: 13.5%;*/
}
.service-box-bg4 .btn-box a {
    background: rgba(0, 0, 0, 0) url(../front_assets/images/service-btn-bg4new.png) no-repeat scroll 0 0;
    color: #fff;
    display: inline-block;
    font-size: 18px;
    height: 45px;
    line-height: 43px;
    text-align: center;
    width: 190px;
}
.service-box-bg8 a{
    background: rgba(0, 0, 0, 0) url(../front_assets/images/purple.png) no-repeat scroll 0 0;
}

.service-box-bg8 a:hover{
    background-color: transparent;
    color: #fff !important;
     background: rgba(0, 0, 0, 0) url(../front_assets/images/service-btn-bg3.png) no-repeat scroll 0 0;
        background-position: 0 -45px;
       
}
.service-box-bg7 a{
     background: rgba(0, 0, 0, 0) url(../front_assets/images/blue.png) no-repeat scroll 0 0;
}
.service-box-bg7 a:hover{
    background-color: transparent;
    color: #fff !important;
     background: rgba(0, 0, 0, 0) url(../front_assets/images/service-btn-bg3.png) no-repeat scroll 0 0;
        background-position: 0 -45px;
       
}

@media (max-width:767px){
   .no-paading{
       width:100%;
       margin-bottom: 8px !important;
   } 
   .middle-menu ul li a{
           display: inline-block;
   }
    
}
</style>
</head>
<body >
    <script type='text/javascript'>
//<![CDATA[
function nocontext(e) {
var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
if (clickedTag == "IMG") {
return false;
}
}
document.oncontextmenu = nocontext;
//]]>
</script>
<?php $this->load->view('mainsite/common/header');?>

<div class="containerss3">
<?php

 N2SmartSlider(9);
 ?>

</div>
 

<!--
<?php  if(!empty($sliderData)){  ?>

<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container">
    <div id="myCarousel" class="carousel slide carousel-fade" > 
      
      <ol class="carousel-indicators">
      <?php for($i=0;$i<count($sliderData);$i++){ ?>
      <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
      <?php } ?>
      </ol>
      
     
      <div class="carousel-inner">
        <?php $p=0; foreach($sliderData as $sliderDataRs){  ?>
        <div class="item  <?php if($p==0){ ?> active  <?php } ?> ">
        <div class="fill">
        <?php if($sliderDataRs['type']=='video'){ ?>
         <video height="100%" width="100%" controls >
            <source src="<?=base_url()?>uploads/page_slider_content/<?=$sliderDataRs['str_name']?>" type="video/mp4">
        </video>
        <?php }else if($sliderDataRs['type']=='image'){ ?>
        <img src="<?=base_url()?>uploads/page_slider_content/<?=$sliderDataRs["str_name"]?>" alt="<?=$sliderDataRs["str_name"]?>"/>
        <?php }else if($sliderDataRs['type']=='url'){ ?>
        <iframe height="100%" width="100%" frameborder="0" src="<?=$sliderDataRs['str_name']?>?rel=0&autoplay=1"></iframe>
        <?php } ?>

        </div>
      </div>
        <?php $p++; } ?>
       </div>
    </div>
  </div>
</div>

<?php }  ?>
 -->

<div class="gallery-page-in ">
  <div class="section listartist-section dark-shadwoand-bot-border z-index2" style="background: #6d2c98;border: none;padding: 60px 0 10px;">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc" style="padding:0;">
        <h2 class="section-header text-center color-fff"><?=stripslashes($cmsData['page_title'])?></h2>
        <div class="blue-text" style="color: #fff;"><?=stripslashes($cmsData['subtitle'])?></div>
        <div class="text text-center color-fff video-txt text-center font-18 line-height-30" data-aos="fade-up" data-aos-once="true" ><p><?=stripslashes($cmsData['page_desc'])?></p>
        </div>
      </div>
    </div>
  </div>
  
	<div class="section listartist-section dark-shadwoand-bot-border z-index2" style="background: #58237c;box-shadow: inset 0 8px 10px rgba(0,0,0,0.5);border: none;padding: 40px 0;">
		<center><a class="print-contact-btn" href="#" data-toggle="modal" data-target="#myModalContactPrinting" style="font-size:18px;">Talk to us!</a></center>
	</div>
  
    <div class="container-fluid service-btn">
    <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="middle-menu">
            <ul class="nav nav-tabs">
              <!--<li class="service-box-bg6 no-paading"><div class="btn-box"> <a href="<?=site_url('art-services')?>" target="_blank">Art Services</a> </div></li>-->
              <li class="service-box-bg8 no-paading"><div class="btn-box"> <a href="<?=site_url('website')?>" target="_blank">Websites</a> </div></li>
              <li class="service-box-bg3 no-paading"><div class="btn-box"> <a href="<?=site_url('marketing-and-advertising')?>" target="_blank">Art Marketing</a> </div></li>
              <li class="service-box-bg4 no-paading"><div class="btn-box"> <a href="<?=site_url('design-services')?>" target="_blank">Design</a> </div></li>
              <li class="service-box-bg  no-paading"><div class="btn-box"> <a href="<?=site_url('publications')?>" target="_blank">Publishing</a> </div></li>
              <li class="service-box-bg7  no-paading"><div class="btn-box"><a href="<?=site_url('printing')?>" target="_blank"> Giclée Printing</a></div></li>
              <li class="service-box-bg5new no-paading"><div class="btn-box"> <a href="<?=site_url('video-production')?>" target="_blank">Video Production</a> </div></li>
              <!--<li class="service-box-bg5 no-paading"><div class="btn-box"> <a href="<?=site_url('exhibitions')?>" target="_blank">Exhibitions</a> </div></li>-->
            </ul>
          </div>
        </div>
    </div>
        
    <div class="service-section service-section2">
    <div class="service-box-bg service-box-bg2">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-7">
            <div class="section-hed">
                <span><img src="<?=base_url()?>uploads/services/<?=stripslashes($services[1]['services_icone_images'])?>" alt="<?=stripslashes($services[1]['services_icone_images'])?>"/></span>
                <span class="website-title"><a href="<?=site_url('website')?>" target="_blank"><?=stripslashes($services[1]['title'])?></a></span></div>
            <div class="service-txt"> <a class="black-text" href="<?=site_url('website')?>" target="_blank"><p><?=nl2br(stripslashes($services[1]['services_short_description']))?></p></a></div>
            <div class="btn-box"> <a href="<?=site_url('website')?>" target="_blank">Tell me more</a> </div>
          </div>
          <div class="col-md-5">
            <a href="<?=site_url('website')?>" target="_blank"><img  src="<?=base_url()?>uploads/services/<?=stripslashes($services[1]['services_page_images'])?>" alt="<?=stripslashes($services[1]['services_page_images'])?>" alt=""/></a></div>
        </div>
      </div>
    </div>
  </div>
    <div class="service-section service-section3">
    <div class="service-box-bg service-box-bg3">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-5"> <a href="<?=site_url('marketing-and-advertising')?>" target="_blank"><img src="<?=base_url()?>uploads/services/<?=stripslashes($services[2]['services_page_images'])?>" alt="<?=stripslashes($services[2]['services_page_images'])?>" class="bullb-mar bullb-mar2 mar-top-50" alt=""/></a> </div>
          <div class="col-md-7">
            <div class="section-hed"><span><img src="<?=base_url()?>uploads/services/<?=stripslashes($services[2]['services_icone_images'])?>" alt="<?=stripslashes($services[2]['services_icone_images'])?>"/></span>
            <span class="art-marketing"><a href="<?=site_url('marketing-and-advertising')?>" target="_blank"><?=stripslashes($services[2]['title'])?></a></span></div>
            <div class="service-txt"><a class="black-text" href="<?=site_url('marketing-and-advertising')?>" target="_blank"><p><?=nl2br(stripslashes($services[2]['services_short_description']))?></p></a>
            </div>
            <div class="btn-box"> <a href="<?=site_url('marketing-and-advertising')?>" target="_blank">Learn more</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="service-section service-section4 service-section4new">
    <div class="service-box-bg service-box-bg4">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-5"> 
          <a href="<?=site_url('design-services')?>" target="_blank">
            <img src="<?=base_url()?>uploads/services/<?=stripslashes($services[3]['services_page_images'])?>" alt="<?=stripslashes($services[3]['services_page_images'])?>"  class="mar-bot-minus-100 mar-top-50"/>
          </a>
          </div>
          <div class="col-md-7">
            <div class="section-hed"><span><img src="<?=base_url()?>uploads/services/<?=stripslashes($services[3]['services_icone_images'])?>" alt="<?=stripslashes($services[3]['services_icone_images'])?>"/></span>
            <span class="art-design"><a href="<?=site_url('design-services')?>" target="_blank"><?=stripslashes($services[3]['title'])?></a></span></div>
            <div class="service-txt"><a class="black-text" href="<?=site_url('design-services')?>" target="_blank"><p><?=nl2br(stripslashes($services[3]['services_short_description']))?></p></a>
            </div>
            <div class="btn-box"> <a href="<?=site_url('design-services')?>" target="_blank">Find out more</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="service-section">
    <div class="service-box-bg">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-6">
            <div class="section-hed"><span><img src="<?=base_url()?>uploads/services/<?=stripslashes($services[0]['services_icone_images'])?>" alt="<?=stripslashes($services[0]['services_icone_images'])?>"/></span>
            <span class="art-printing"><a href="<?=site_url('printing')?>" target="_blank"><?=stripslashes($services[0]['title'])?></a></span></div>
            <div class="service-txt"><a class="black-text" href="<?=site_url('printing')?>" target="_blank"><p><?=nl2br(stripslashes($services[0]['services_short_description']))?></p></a></div>
                <div class="btn-box">
                    <a href="<?=site_url('publications')?>" target="_blank">Visit our Library</a>&emsp;
                    <a href="<?=site_url('printing')?>" target="_blank">Giclée Printing</a>
                </div>
          </div>
          <div class="col-md-6 text-right">
           <a href="<?=site_url('printing')?>" target="_blank"> <img src="<?=base_url()?>uploads/services/<?=stripslashes($services[0]['services_page_images'])?>" alt="<?=stripslashes($services[0]['services_page_images'])?>" class="mar-top-40 max-width-90"/></a> </div>
        </div>
      </div>
    </div>
  </div>
  <div class="service-section service-section5new">
    <div class="service-box-bg service-box-bg5new">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-5"> <a href="<?=site_url('video-production')?>" target="_blank"><img src="<?=base_url()?>uploads/services/<?=stripslashes($services[4]['services_page_images'])?>" alt="<?=stripslashes($services[4]['services_page_images'])?>" class="mar-bot-minus-100 mar-top-50"/></a> </div>
          <div class="col-md-7">
            <div class="section-hed"><span><img src="<?=base_url()?>uploads/services/<?=stripslashes($services[4]['services_icone_images'])?>" alt="<?=stripslashes($services[4]['services_icone_images'])?>"/></span>
            <span class="art-production"><a href="<?=site_url('video-production')?>" target="_blank"><?=stripslashes($services[4]['title'])?></a></span></div>
             <div class="service-txt"><a class="black-text" href="<?=site_url('video-production')?>" target="_blank"><p><?=nl2br(stripslashes($services[4]['services_short_description']))?></p></a>
             </div>
            <div class="btn-box"> <a href="<?=site_url('video-production')?>" target="_blank">Find out more</a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--<div class="service-section service-section5">
    <div class="service-box-bg service-box-bg5">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-6">
            <div class="section-hed"><span>
                <img src="<?=base_url()?>uploads/services/<?=stripslashes($services[5]['services_icone_images'])?>" alt="<?=stripslashes($services[5]['services_icone_images'])?>" alt=""/></span>
                <span class="art-exhibitions"><a href="<?=site_url('exhibitions')?>" target="_blank"><?=stripslashes($services[5]['title'])?></a></span></div>
            <div class="service-txt"><a class="black-text" href="<?=site_url('exhibitions')?>" target="_blank"><p><?=nl2br(stripslashes($services[5]['services_short_description']))?></p></a>
            </div>
            <div class="btn-box"> <a href="<?=site_url('exhibitions')?>" target="_blank">See our packages</a> </div>
          </div>
          <div class="col-md-6"> <a href="<?=site_url('exhibitions')?>" target="_blank"><img  src="<?=base_url()?>uploads/services/<?=stripslashes($services[5]['services_page_images'])?>" alt="<?=stripslashes($services[5]['services_page_images'])?>" class="ex-img ex-img2"  /></a> </div>
        </div>
      </div>
    </div>
   
  </div>-->
  
  <div class="service-section service-section6">
    <div class="service-box-bg service-box-bg6">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
         <div class="col-md-5">
             <a href="<?=site_url('art-services')?>" target="_blank">
                <img src="<?=base_url()?>uploads/services/<?=stripslashes($services[6]['services_page_images'])?>" alt="<?=stripslashes($services[6]['services_page_images'])?>" alt=""/> 
             </a>
             </div>
          <div class="col-md-7">
            <div class="section-hed"><span>
              <img src="<?=base_url()?>uploads/services/<?=stripslashes($services[6]['services_icone_images'])?>" alt="<?=stripslashes($services[6]['services_icone_images'])?>"/></span>
              <span class="art-title"><a href="<?=site_url('art-services')?>" target="_blank"><?=stripslashes($services[6]['title'])?></a></span></div>
            <div class="service-txt"><p><a class="black-text" href="<?=site_url('art-services')?>" target="_blank"><?=nl2br(stripslashes($services[6]['services_short_description']))?></a></p></div>
            <div class="btn-box"> <a href="<?=site_url('art-services')?>" target="_blank">Find out more</a> </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>
  
</div>
<div class="modal fade cnt-form" id="myModalContactPrinting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <form>
                                            <div class="form-main">
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                              <div class="modal-body">
                                                <div class="cnt-frm-txt">
                                                  <h2>Contact us</h2>
                                                  <div class="text-center">If you have any question about our services, don't hesitate to contact us. Our team of specialists will get back to you at the earliest.</div>
                                                </div>
                                                <div id="printing_contact_msg" class="text-center"></div>
                                                <input type="text" class="form-control" placeholder="Name" name="pcontact_name" id="pcontact_name"  >
                                                <input type="text" class="form-control" placeholder="Email" name="pcontact_email" id="pcontact_email" >
                                           <!--     <select class="form-control" name="pdepartment" id="pdepartment">
                                                  <option value="">Select Services</option>
                                                  <option value="Canvas Print">Canvas Print</option> 
                                                  <option value="Acrylic Prints">Acrylic Prints</option>
                                                  <option value="Metal Prints">Metal Prints</option>
                                                  <option value="Bamboo Prints">Bamboo Prints</option>
                                                  <option value="Prints on Paper">Prints on Paper</option>
                                                </select>-->
                                                <input type="text" class="form-control" placeholder="Subject" name="pcontact_subject" id="pcontact_subject">
                                                <textarea class="form-control" placeholder="Type your message here." name="pcontact_message" id="pcontact_message"></textarea>
                                                <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" id="g-recaptcha-response"></div>
            </div>
                                                <div class="clearfix"></div><br>
                                                <div class="text-right">
                                                  <a class="dark-gray-btn" href="javascript:void(0)"  onclick="javascript:printing_contact_us_email();"><span class="lt"></span>
                                                    <span class="large-btn">Send</span><span class="rt"></span></a></div>
                                              </div>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <!-- Modal  Thanks Contact Printing -->
                                    <div class="modal fade cnt-form" id="thanksContactPrinting" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <form>
                                                <div class="form-main">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    <div class="modal-body">
                                                        <div class="cnt-frm-txt">
                                                            <h2>Thank you</h2>
                                                            <div class="text-center">Your message has successfully been submitted.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
<?php N2Native::beforeClosingBody(); ?>
<?php $this->load->view('mainsite/common/footer');?>

<!-- /.container --> 

<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 

<script>
    function printing_contact_us_email(){
  var contact_name = $('#pcontact_name').val();
  var contact_email = $('#pcontact_email').val();
  var contact_subject = $('#pcontact_subject').val();
  var contact_message = $('#pcontact_message').val();
/*  var department = $('#pdepartment').val();*/
  if(contact_name=='')
  {
     $('#printing_contact_msg').html('<span class="text-default">Please enter name.</span>');
     $('#pcontact_name').focus();
   return false
  }
   if(contact_email=='')
  {
     $('#printing_contact_msg').html('<span class="text-default">Please enter email address.</span>');
     $('#pcontact_email').focus();
   return false
  }
 /*  if(department=='')
  {
     $('#printing_contact_msg').html('<span class="text-danger">Please select service.</span>');
     $('#pdepartment').focus();
    return false
  }*/
  if(contact_subject=='')
  {
     $('#printing_contact_msg').html('<span class="text-default">Please enter subject.</span>');
     $('#pcontact_subject').focus();
    return false
  }
 
  if(contact_message=='')
  {
     $('#printing_contact_msg').html('<span class="text-default">Please enter message.</span>');
     $('#pcontact_message').focus();
    return false
  }
  if(contact_email!='' &&  contact_name!='') {

    jQuery.ajax({
              type: "POST",
              url: site_url+"home/talkto_us_email",
              data: {           
                    contact_name: contact_name,
                    contact_email: contact_email,
                    contact_message: contact_message,
                    contact_subject: contact_subject,
                   // department: department
                  },
              cache: false,
              success:  function(data)
              { 
                if(data=='done')
                {
                 $('#pcontact_name').val('')
                 $('#pcontact_email').val('')
                 $('#pcontact_message').val('')
                 $('#pcontact_subject').val('')
                 //$('#pdepartment').val('')
                 $('#printing_contact_msg').html('<span class="text-success">Mail sent successfully!!</span>')
                 $('#myModalContactPrinting').modal('hide')
                 $('#thanksContactPrinting').modal('toggle');
                }
                
                if(data=='NameBlank'){
                 $('#printing_contact_msg').html('<span class="text-default">Name can not be blank!!</span>');
                  $('#NameBlank').focus()
                 }
                if(data=='Emailblank'){
                 $('#printing_contact_msg').html('<span class="text-default">Email address can not be blank!!</span>');
                 $('#pcontact_email').focus();
                 }
               if(data=='InvalidEmail'){
                  $('#printing_contact_msg').html('<span class="text-default">Please enter valid e-mail address!!</span>');
                  $('#pcontact_email').focus();
                }
              }
            });
            
    }else{
        $('#printing_contact_msg').html('<span class="text-danger">Please fill details!!</span>');
    }

  }
</script>


<!-- Script to Activate the Carousel --> 

<!-- FlexSlider --> 

<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider.js"></script> 
<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script> 
<script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script> 
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<script type="text/javascript">
//function bsCarouselAnimHeight() {
    $('#myCarousel').carousel({
        interval: false
    });
//}
</script> 
<script src='https://www.google.com/recaptcha/api.js'></script>   
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
$(document).ready(function(){
// this part disables the right click
$('img').on('contextmenu', function(e) {
return false;
});
//this part disables dragging of image
$('img').on('dragstart', function(e) {
return false;
});

});
</script>

<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
</script>
<?php $this->load->view('mainsite/common/login-registration-common-js'); ?>
</body>
</html>
