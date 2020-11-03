<?php
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
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src='https://www.google.com/recaptcha/api.js'></script>    
</head>
<body >
<? $this->load->view('mainsite/common/header');?>

<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container">
      
        <?php N2SmartSlider(29); ?>
    <?php N2Native::beforeClosingBody(); ?>
    
    <?php /* ?>
    <div id="myCarousel" class="carousel slide carousel-fade" > <!-- Indicators -->
      
      <ol class="carousel-indicators">
      <?php for($i=0;$i<count($sliderData);$i++){ ?>
      <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
      <?php } ?>
      </ol>
      
      <!-- Wrapper for slides -->
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
        <iframe height="100%" width="100%" frameborder="0" src="<?=$sliderDataRs['str_name']?>?autoplay=0&rel=0"></iframe>
        <?php } ?>

        </div>
      </div>
        <?php $p++; } ?>
       </div>
    </div>
      <?php */ ?>
    
  </div>
</div>


<div class="gallery-page-in "> 
  
  <!--page midd Content-->
  <div class="section listartist-section dark-shadwoand-bot-border bg-color-darkcyan bord-none z-index2" style="background: #165a57;">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc" style="padding:0;">
        <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
        <div class="text text-center color-fff video-txt" data-aos="fade-up" data-aos-once="true" ><?=stripslashes($cmsData['page_desc'])?></div>
      </div>
    </div>
  </div>
  <div class="xxocar-box-btn middle-tab-section-bg dark-gray-bg  z-index1" style="background: #2d8c8a;box-shadow: inset 0 8px 10px rgba(0,0,0,0.5);">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
	<a class="dark-gray-btn enquire_now" href="<?=base_url()?>smartslider/sliders/124/index.html" target="_blank" style="margin-right: 20px;"><span class="large-btn print-contact-btn">More info</span></a>
	<a class="dark-gray-btn enquire_now" href="#" data-toggle="modal" data-target="#myModalds"><span class="large-btn print-contact-btn">Let's Start</span></a></div>
  </div>
  <!--page midd Content End--> 
  
  <!--Exibition Pakages-->
  <div class="xxexibition-packages design-services-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4" data-aos="fade-right" data-aos-once="true">
          <img src="<?=base_url()?>uploads/services/<?=stripslashes($services[0]['services_page_images'])?>" class="img-responsive img-center" alt="<?=stripslashes($services[0]['services_page_images'])?>"> </div>
        <div class="col-lg-8 col-md-8 col-sm-8" data-aos="fade-up" data-aos-once="true">
        <div class="design-services desing-branding-blog">
          <h3><?=stripslashes($services[0]['title'])?></h3>
          <?=stripslashes($services[0]['services_icone_images'])?>
          <div data-aos="fade-up" data-aos-once="true"><?=nl2br(stripslashes($services[0]['services_short_description']))?></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--Exibition Pakages End-->
  <div class="brandingbot-border">&nbsp;</div>
 <!--Exibition Pakages-->
  <div class="xxexibition-packages design-services-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4" data-aos="fade-right" data-aos-once="true"><img src="<?=base_url()?>uploads/services/<?=stripslashes($services[1]['services_page_images'])?>"  alt="<?=stripslashes($services[1]['services_page_images'])?>" class="img-responsive img-center"  > </div>
        <div class="col-lg-8 col-md-8 col-sm-8" data-aos="fade-up" data-aos-once="true">
        <div class="design-services digital-design-blog">
          <h3><?=stripslashes($services[1]['title'])?></h3>
          <?=stripslashes($services[1]['services_icone_images'])?> 
          <div data-aos="fade-up" data-aos-once="true"><?=nl2br(stripslashes($services[1]['services_short_description']))?></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--Exibition Pakages End-->
  
  <!--Pakeges Info-->
  
  <div class="digital-designbot-border">&nbsp;</div>
  
  <!--Exibition Pakages-->
  <div class="xxexibition-packages design-services-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4" data-aos="fade-right" data-aos-once="true"> <img  src="<?=base_url()?>uploads/services/<?=stripslashes($services[2]['services_page_images'])?>"  alt="<?=stripslashes($services[2]['services_page_images'])?>" class="img-responsive img-center"  > </div>
        <div class="col-lg-8 col-md-8 col-sm-8" data-aos="fade-up" data-aos-once="true">
        <div class="design-services design-promotional-material-blog">
          <h3><?=stripslashes($services[2]['title'])?></h3>
         <?=stripslashes($services[2]['services_icone_images'])?> 
          <div data-aos="fade-up" data-aos-once="true"><?=nl2br(stripslashes($services[2]['services_short_description']))?></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--Exibition Pakages End-->
  <div class="promotional-materialbot-border">&nbsp;</div>
  
  <!--Exibition Pakages-->
  <div class="xxexibition-packages design-services-bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4" data-aos="fade-right" data-aos-once="true"> <img   src="<?=base_url()?>uploads/services/<?=stripslashes($services[3]['services_page_images'])?>"  alt="<?=stripslashes($services[3]['services_page_images'])?>" class="img-responsive img-center" > </div>
        <div class="col-lg-8 col-md-8 col-sm-8" data-aos="fade-up" data-aos-once="true">
        <div class="design-services design-publications-blog">
          <h3><?=stripslashes($services[3]['title'])?></h3>
          <?=stripslashes($services[3]['services_icone_images'])?> 
          <div data-aos="fade-up" data-aos-once="true"><?=nl2br(stripslashes($services[3]['services_short_description']))?></div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--Exibition Pakages End-->
  <div class="design-publications-blogbot-border">&nbsp;</div>
 <!--Exibition Pakages-->
  <div class="xxexibition-packages design-services-bg-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4" data-aos="fade-right" data-aos-once="true"> <img   src="<?=base_url()?>uploads/services/<?=stripslashes($services[4]['services_page_images'])?>"  alt="<?=stripslashes($services[4]['services_page_images'])?>" class="img-responsive img-center" > </div>
        <div class="col-lg-8 col-md-8 col-sm-8" data-aos="fade-up" data-aos-once="true">
        <div class="design-services design-other-blog">
          <h3><?=stripslashes($services[4]['title'])?></h3>
          <?=stripslashes($services[4]['services_icone_images'])?> 
          <div data-aos="fade-up" data-aos-once="true"><?=nl2br(stripslashes($services[4]['services_short_description']))?></div>
<a class="dark-gray-btn" href="#" data-toggle="modal" data-target="#myModalds"><span class="lt"></span><span class="large-btn">Enquire now</span><span class="rt"></span></a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!--Exibition Pakages End-->
  
  <!--Pakeges Info End-->
  <div class="design-otherbot-sect">&nbsp;</div>
   <!--Representation Program --> 
  </div>
  <? $this->load->view('mainsite/common/footer');?>
<!-- /.container --> 
<div class="modal fade cnt-form art-services-modal" id="myModalds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form id="design_services_contact_us">
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Enquiry on Design Services</h2>
            </div>
           <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name"  name="ds_contact_name" id="ds_contact_name">
            <input type="email" class="form-control" placeholder="Email" name="ds_contact_email" id="ds_contact_email" >
             <select class="form-control" name="ds_profile" id="ds_profile">
              <option value="">Profile</option>
              <option value="Artist">Artist</option> 
              <option value="Gallery">Gallery</option> 
              <option value="Art Dealer">Art Dealer</option> 
              <option value="Other">Other</option> 
            </select>
            <input type="text" class="form-control" placeholder="Website (Optional)" name="ds_website" id="ds_website" >
            <select class="form-control" name="ds_enquiry_type" id="ds_enquiry_type">
              <option value="">Select the type of Design Services you require</option>
              <option value="Branding">Branding</option> 
              <option value="Digital Design / Website">Digital Design / Website</option> 
              <option value="Promotional Material">Promotional Material</option> 
              <option value="Publications">Publications</option> 
              <option value="Other">Other </option> 
            </select>
            <textarea class="form-control" placeholder="Kindly provide us with additional information." rows="5"  name="ds_contact_message" id="ds_contact_message"></textarea>
            <div class="text-right">
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" ></div>
            </div><br/>
            <div class="clearfix">&nbsp;</div>
            <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="ds_sub">Send</button>
             </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal  Thanks Carrer -->
<div class="modal fade cnt-form car-form" id="thanksmodalds" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Thank you</h2>
              <div class="text-center">Your message has been successfully submitted.<br/> Our team will get back to you at the earliest possible.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
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
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
</script> 

<script>
$('#design_services_contact_us').submit(function(e)
{
    e.preventDefault(); 
    var contact_name    = $('#ds_contact_name').val();
    var contact_email   = $('#ds_contact_email').val();
    var profile         = $('#ds_profile').val();
    var website         = $('#ds_website').val();
    var enquiry_type    = $('#ds_enquiry_type').val();
    var contact_message = $('#ds_contact_message').val();

    if(contact_name=='')
    {
        $('#msg').html('<span class="text-danger">Please enter name.</span>');
        $('#ds_contact_name').focus();
        return false
    }
    if(contact_email=='')
    {
        $('#msg').html('<span class="text-danger">Please enter email address.</span>');
        $('#ds_contact_email').focus();
        return false
    }
    if(profile=='')
    {
        $('#msg').html('<span class="text-danger">Please select profile.</span>');
        $('#ds_profile').focus();
        return false
    }
    if(enquiry_type=='')
    {
        $('#msg').html('<span class="text-danger">Please select enquiry type.</span>');
        $('#ds_enquiry_type').focus();
        return false
    }
    if(contact_message=='')
    {
        $('#msg').html('<span class="text-danger">Please enter message.</span>');
        $('#ds_contact_message').focus();
        return false
    }
    
    jQuery.ajax({
            type: "POST",
            url: "<?=site_url('home/design_services_contact_us')?>",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data)
            {
                if(data=='done')
                {
                    $('#msg').html('<span class="text-success">Mail sent successfully!!</span>');
                    $('#myModalds').modal('hide');
                    $('#thanksmodalds').modal('toggle');
                }
                else
                {
                    $('#msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
                }
            }
        });
});
</script> 

  
<?php $this->load->view('mainsite/common/login-registration-common-js'); ?>
<script src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
</body>
</html>
