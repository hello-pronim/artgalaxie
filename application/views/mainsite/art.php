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
<meta name="description" content="">
<meta name="author" content="">
<title>Art Galaxie – Art Services</title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<!--<link href="css/custom.css" rel="stylesheet">-->
<link href="<?=base_url()?>front_assets/css/custom3.css" rel="stylesheet">
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

</head>
<body >


<div class="modal fade cnt-form art-services-modal" id="myModalas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form id="artservicescontactus">
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Enquiry on Art Services</h2>
            </div>
           <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name"   name="artservice_contact_name" id="artservice_contact_name">
            <input type="email" class="form-control" placeholder="Email" name="artservice_contact_email" id="artservice_contact_email" >
             <select class="form-control" name="artservice_profile" id="artservice_profile">
              <option value="">Profile</option>
              <option value="Artist">Artist</option> 
              <option value="Gallery">Gallery</option> 
              <option value="Collector/Buyer">Collector/Buyer</option> 
              <option value="Other">Other</option> 
            </select>
            <input type="text" class="form-control" placeholder="Website (Optional)" name="artservice_website" id="artservice_website" >
            <select class="form-control" name="artservice_enquiry_type" id="artservice_enquiry_type">
              <option value="">Select the type of Art Services you require</option>
              <option value="Art Agent">Art Agent</option> 
              <option value="Commissioned Artwork">Commissioned Artwork</option> 
              <option value="Art Consulting">Art Consulting</option> 
              <option value="Curating Services">Curating Services</option> 
              <option value="Artist Career Coaching">Artist Career Coaching </option> 
              <option value="Art Critic">Art Critic </option> 
            </select>
            <textarea class="form-control" placeholder="Kindly provide us with additional information." rows="5" name="artservice_contact_message" id="artservice_contact_message"></textarea>
            <div class="text-right">
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" ></div>
            </div>
             <br/>
            <div class="clearfix">&nbsp;</div>
            <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="artservice_sub">Send</button>
             </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade cnt-form" id="thanksmodalas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


<? $this->load->view('mainsite/common/header');?>

<?php  //if(!empty($sliderData)){  ?>
<!--banner-->
<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container">
      
    <?php N2SmartSlider(27); ?>
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
<!-- Page Content -->
<?php //}  ?>

<div class="gallery-page-in "> 
  
  <!--page midd Content-->
  <div class="section listartist-section dark-shadwoand-bot-border middle-tab-section-bg bord-none z-index7" style="background: #4c6605;box-shadow: none;">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc" style="padding:0;">
        <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
        <div class="text text-center color-fff video-txt" data-aos="fade-up" data-aos-once="true" >
          <p><?=stripslashes($cmsData['page_desc'])?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="light-blue-bg bot-shadow z-index2" style="background: #425905;box-shadow: inset 0 8px 10px rgba(0,0,0,0.5);">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
    <a class="dark-gray-btn talk-with-us-btn" href="#" data-toggle="modal" data-target="#myModalas"><span class="large-btn">Talk with us</span></a></div>
  </div>
  <!--page midd Content End--> 
  <!--Exibition Pakages-->
  <div class="xxexibition-packages art-consulting-bg">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="art-services art-consulting-blog">
		<img src="<?=base_url()?>/uploads/art/<?=stripslashes($services[1]['services_page_images'])?>" />
        <h2><?=stripslashes($services[1]['title'])?></h2>
        <div class="art-content-first"><?=stripslashes($services[1]['services_icone_images'])?></div>
        <?=nl2br(stripslashes($services[1]['services_short_description']))?>
        <a href="#" data-toggle="modal" data-target="#myModalas">More information</a> </div><br><br>
		<div class="art-consulting-bot-border">&nbsp;</div>
    </div>
  </div>
  <!--Exibition Pakages End--> 
  <!--Exibition Pakages-->
  <div class="xxexibition-packages art-agent-bg">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="art-services art-agent-blog">
		<img src="<?=base_url()?>/uploads/art/<?=stripslashes($services[0]['services_page_images'])?>" />
        <h2><?=stripslashes($services[0]['title'])?></h2>
        <div class="art-content-first"><?=stripslashes($services[0]['services_icone_images'])?></div>
        <?=nl2br(stripslashes($services[0]['services_short_description']))?>
        <a class="" href="#" data-toggle="modal" data-target="#myModalas">Find out more</a> </div><br><br>
		<div class="art-agent-bot-border">&nbsp;</div>
    </div>
  </div>
  <!--Exibition Pakages End-->
   <!--Exibition Pakages-->
  <div class="xxexibition-packages art-commissioned-bg">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="art-services art-commissioned-blog">
		<img src="<?=base_url()?>/uploads/art/<?=stripslashes($services[5]['services_page_images'])?>" />
        <h2><?=stripslashes($services[5]['title'])?></h2>
        <div class="art-content-first"><?=stripslashes($services[5]['services_icone_images'])?></div>
        <?=nl2br(stripslashes($services[5]['services_short_description']))?>
        <a href="#" data-toggle="modal" data-target="#myModalas">Learn More</a> </div><br><br>
		<div class="art-commissioned-bot-border">&nbsp;</div>
    </div>
  </div>
  <!--Exibition Pakages End--> 
  <!--Exibition Pakages-->
  <div class="xxexibition-packages art-curating-bg">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="art-services art-curating-blog">
		<img src="<?=base_url()?>/uploads/art/<?=stripslashes($services[2]['services_page_images'])?>" />
        <h2><?=stripslashes($services[2]['title'])?></h2>
        <div class="art-content-first"><?=stripslashes($services[2]['services_icone_images'])?></div>
        <?=nl2br(stripslashes($services[2]['services_short_description']))?>
        <a href="#" data-toggle="modal" data-target="#myModalas" >View more details</a> </div><br><br>
		<div class="art-curating-bot-border">&nbsp;</div>
    </div>
  </div>
  <!--Exibition Pakages End-->
  <!--Exibition Pakages-->
  <div class="xxexibition-packages  art-coaching-bg">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="art-services art-coaching-blog">
		<img src="<?=base_url()?>/uploads/art/<?=stripslashes($services[3]['services_page_images'])?>" />
        <h2><?=stripslashes($services[3]['title'])?></h2>
        <div class="art-content-first"><?=stripslashes($services[3]['services_icone_images'])?></div>
       <?=stripslashes($services[3]['services_short_description'])?><br>
        <a href="#" data-toggle="modal" data-target="#myModalas">Learn more</a> </div><br><br>
		<div class="art-coaching-bot-border">&nbsp;</div>
    </div>
  </div>
  <!--Exibition Pakages End-->  
  <!--Exibition Pakages-->
  <div class="xxexibition-packages art-critic-bg">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="art-services art-critic-blog">
		<img src="<?=base_url()?>/uploads/art/<?=stripslashes($services[4]['services_page_images'])?>" />
        <h2><?=stripslashes($services[4]['title'])?></h2>
        <div class="art-content-first"><?=stripslashes($services[4]['services_icone_images'])?></div>
        <?=nl2br(stripslashes($services[4]['services_short_description']))?>
        <a href="#" data-toggle="modal" data-target="#myModalas">Find out more</a> </div><br><br>
		<div class="art-critic-bot-border">&nbsp;</div>
    </div>
  </div>
  <!--Exibition Pakages End--> 
</div>
<? $this->load->view('mainsite/common/footer');?>

<!-- /.container --> 
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
<script src='https://www.google.com/recaptcha/api.js'></script> 
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
        
<script type='text/javascript'>

    function nocontext(e) {
        var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
        if (clickedTag == "IMG") {
        return false;
    }
}
document.oncontextmenu = nocontext;
</script>
<script type="text/javascript">
//art services
$('#artservicescontactus').submit(function(e)
{
    e.preventDefault(); 
    var contact_name = $('#artservice_contact_name').val();
    var contact_email = $('#artservice_contact_email').val();
    var profile = $('#artservice_profile').val();
    var website = $('#artservice_website').val();
    var enquiry_type = $('#artservice_enquiry_type').val();
    var contact_message = $('#artservice_contact_message').val();

    if(contact_name=='')
    {
        $('#msg').html('<span class="text-danger">Please enter name.</span>');
        $('#contact_name').focus();
        return false
    }
    if(contact_email=='')
    {
        $('#msg').html('<span class="text-danger">Please enter email address.</span>');
        $('#contact_email').focus();
        return false
    }
    if(profile=='')
    {
        $('#msg').html('<span class="text-danger">Please select profile.</span>');
        $('#profile').focus();
        return false
    }
    if(enquiry_type=='')
    {
        $('#msg').html('<span class="text-danger">Please select enquiry type.</span>');
        $('#enquiry_type').focus();
        return false
    }
    if(contact_message=='')
    {
        $('#msg').html('<span class="text-danger">Please enter message.</span>');
        $('#contact_message').focus();
        return false
    }
 
    jQuery.ajax({
            type: "POST",
            url: "<?=site_url('home/art_services_contact_us')?>",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data)
            {
                //alert(data);
                if(data=='done')
                {
                    $('#msg').html('<span class="text-success">Mail sent successfully!!</span>');
                    $('#myModalas').modal('hide');
                    $('#thanksmodalas').modal('toggle');
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
