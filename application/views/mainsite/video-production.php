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
<link href="<?=base_url()?>front_assets/custom.css" rel="stylesheet"><!-- CSS from psd  31012017-->
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

<body>
<? $this->load->view('mainsite/common/header');?>

        <div class="top-slider image-with-video-slider" data-aos="fade-up">
        <div class="container">
            
              <?php N2SmartSlider(30); ?>
    <?php N2Native::beforeClosingBody(); ?>
    
    <?php /* ?>
    
          <div id="myCarousel" class="carousel slide carousel-fade" > <!-- Indicators -->
            
            <ol class="carousel-indicators">
              <?php for($i=0;$i<count($sliderData);$i++){ ?>
              <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
              <?php } ?>
             <!--  <li data-target="#myCarousel" data-slide-to="1"></li> -->
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
              <div class="item">
                <div class="fill"><img src="<?=base_url()?>front_assets/images/gallery-page-banner.jpg" alt=""/></div>
              </div>
            </div>
          </div>
          
          <?php */ ?>
          
        </div>
        </div>
       
<div class="gallery-page-in "> 
  
  <!--page midd Content-->
  <div class="listartist-section dark-shadwoand-bot-border bord-none" style="background: #460607;box-shadow: none;">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc" style="padding: 0;">
        <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
        <div class="text text-center color-fff video-txt" data-aos="fade-up" data-aos-once="true" >
          <p><?=nl2br(stripslashes($cmsData['page_desc']))?></p></div>
      </div>
    </div>
  </div>
  <div class="red-box-btn  z-index1" style="background: #5a0303;box-shadow: inset 0 8px 10px rgba(0,0,0,0.5);">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
	<a class="dark-gray-btn i_would_btn" href="<?=base_url()?>smartslider/sliders/134/index.html" target="_blank" style="margin-right: 20px;"><span class="large-btn" style="width: 140px;">More info</span></a>
	<a class="dark-gray-btn i_would_btn" href="#" data-toggle="modal" data-target="#myModalvp"><span class="large-btn" style="width: 140px;">Let's Start</span></a></div>
  </div>
  <!--page midd Content End--> 
  
  <!--Exibition Pakages-->
      <div class=" section bg-white bottom-shadow why-vdo-sect text-center pad-bot-0">
        <div class="container" data-aos="fade-up" data-aos-once="true">
          <div class="text" data-aos="fade-up" data-aos-once="true"><h3 class="colorpurple"><?=stripslashes($section1[0]['title'])?></h3>
       <p><?=nl2br(stripslashes($section1[0]['description']))?></p>
    </div>
    <img style="margin-bottom:-90px;" src="<?=base_url()?>uploads/video-production/<?=$section1[0]['desc_image']?>" alt="<?=$section1[0]['desc_image']?>"/></div>
  </div>
 <div class="sliderbot-sect bg-red z-index1">&nbsp;</div>
  
  <!--what we can offer-->
  <div class="section content-gray-bg bottom-shadow"> 
  
    <div class="container" data-aos="fade-up" data-aos-once="true">
   <div class="row">
   <div class="col-sm-6">
    <div class="why-do-txt why-do-txt-pad-right">
      <h3><?=stripslashes($section1[1]['title'])?></h3>
        <div  class="font-18">
          <?=stripslashes($section1[1]['description'])?>
        </div>
       </div>
    </div>
     <div class="col-sm-6">
        <div class="why-do-txt why-do-txt-pad-left">
          <h3><?=stripslashes($section1[2]['title'])?></h3>
            <div  class="font-18"><?=stripslashes($section1[2]['description'])?></div>
        </div>
      </div>
    </div> 
    </div>
  </div>
  <div class="sliderbot-sect bg-red z-index1">&nbsp;</div>
  
  
  
  <div class="middle-tab-section-bg dark-gray-bg shadow-none">
    <div data-aos-once="true" data-aos="fade-up" class="container aos-init aos-animate">
      <h3 class="color-fff mar-top-bot-20"><?=stripslashes($section1[3]['title'])?></h3>
    </div>
  </div>
  

 
  <div class=" section bg-white morevideo-fact">
      <div class="container">  
   
          <div class="row">
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box1" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                  <img src="<?=base_url()?>uploads/video-production/<?=$section1[4]['desc_image']?>" alt="<?=$section1[4]['desc_image']?>"/> </div>
                <div class="mrt-box-txt">
                  <h4><?=stripslashes($section1[4]['title'])?></h4>
                  <p><?=nl2br(stripslashes($section1[4]['description']))?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box2" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                  <img src="<?=base_url()?>uploads/video-production/<?=$section1[5]['desc_image']?>" alt="<?=$section1[5]['desc_image']?>"/> </div>
                <div class="mrt-box-txt">
                 <h4><?=stripslashes($section1[5]['title'])?></h4>
                 <p><?=nl2br(stripslashes($section1[5]['description']))?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box3" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img"> 
                  <img src="<?=base_url()?>uploads/video-production/<?=$section1[6]['desc_image']?>" alt="<?=$section1[6]['desc_image']?>"/>  </div>
                <div class="mrt-box-txt">
                  <h4><?=stripslashes($section1[6]['title'])?></h4>
                  <p><?=nl2br(stripslashes($section1[6]['description']))?></p>
                </div>
              </div>
            </div>
          </div>
   
          <div class="row">
            <div class="col-sm-12">
              <div class="mrt-content-box mrt-box4" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                  <img src="<?=base_url()?>uploads/video-production/<?=$section1[7]['desc_image']?>" alt="<?=$section1[4]['desc_image']?>"/> </div>
                <div class="mrt-box-txt">
                  <h4><?=stripslashes($section1[7]['title'])?></h4><br>
                  <p><?=nl2br(stripslashes($section1[7]['description']))?></p><br>
                </div>
              </div>
            </div>
          
          </div>
       </div>
  </div>
  <div class="red-box-btn  z-index1" style="background: #5a0303;box-shadow: inset 0 8px 10px rgba(0,0,0,0.5);">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
	<a class="dark-gray-btn i_would_btn" href="<?=base_url()?>smartslider/sliders/134/index.html" target="_blank" style="margin-right: 20px;"><span class="large-btn" style="width: 140px;">More info</span></a>
	<a class="dark-gray-btn i_would_btn" href="#" data-toggle="modal" data-target="#myModalvp"><span class="large-btn" style="width: 140px;">Let's Start</span></a></div>
  </div>
</div>
 <? $this->load->view('mainsite/common/footer');?>
<!-- Modal -->
<div class="modal fade cnt-form" id="myModalvp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="video_production_contact_us">
        <div class="form-main form-color3">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUs">Video Production Enquiry</h2>
            </div>
            <div id="contactUsFormId">
            <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="vp_contact_name" id="vp_contact_name"  >
            <input type="text" class="form-control" placeholder="Email" name="vp_contact_email" id="vp_contact_email" >
            <select class="form-control" name="vp_profile" id="vp_profile">
              <option value="">Profile</option>
              <option value="Artist">Artist</option> 
              <option value="Gallery">Gallery</option> 
              <option value="Gallery">Other</option> 
            </select>
            <input type="text" class="form-control" placeholder="Website (Optional)" name="vp_website" id="vp_website" >
             <select class="form-control" name="vp_enquiry_type" id="vp_enquiry_type">
              <option value="">Select the type of video you require</option>
              <option value="Biography Video">Biography Video</option> 
              <option value="Artwork Presentation">Artwork Presentation</option> 
              <option value="Video Portfolio">Video Portfolio</option> 
              <option value="Video Profile">Video Profile</option> 
              <option value="Documentary Film">Documentary Film</option> 
              <option value="Animation Video">Animation Video</option> 
              <option value="Other">Other</option> 
            </select>
            <textarea class="form-control" placeholder="Kindly provide us with additional information and links to existing videos you may already have (optional)" name="contact_message" id="contact_message"></textarea>
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>"></div>
            </div>
            <div class="clearfix"></div><br>
             <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="vp_sub">Send</button>
             </div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.container --> 
<!-- Modal  Thanks Carrer -->
<div class="modal fade cnt-form car-form" id="thanksmodalvp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body form-color3">
            <div class="cnt-frm-txt">
              <h2 style="color:#fff">Thank you</h2>
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
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script>

<script>
$('#video_production_contact_us').submit(function(e)
{
    e.preventDefault(); 
    var contact_name  = $('#vp_contact_name').val();
    var contact_email = $('#vp_contact_email').val();
    var profile       = $('#vp_profile').val();
    var website       = $('#vp_website').val();
    var enquiry_type  = $('#vp_enquiry_type').val();
    var contact_message = $('#vp_contact_message').val();

    if(contact_name=='')
    {
        $('#msg').html('<span class="text-default">Please enter name.</span>');
        $('#vp_contact_name').focus();
        return false
    }
    if(contact_email=='')
    {
        $('#msg').html('<span class="text-default">Please enter email address.</span>');
        $('#vp_contact_email').focus();
        return false
    }
    if(profile=='')
    {
        $('#msg').html('<span class="text-default">Please select profile.</span>');
        $('#vp_profile').focus();
        return false
    }
    if(enquiry_type=='')
    {
        $('#msg').html('<span class="text-default">Please select enquiry type.</span>');
        $('#vp_enquiry_type').focus();
        return false
    }
    
    jQuery.ajax({
            type: "POST",
            url: "<?=site_url('home/video_production_contact_us')?>",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data)
            {
                //alert(data);
                if(data=='done')
                {
                    $('#msg').html('<span class="text-success">Mail sent successfully!!</span>');
                    $('#myModalvp').modal('hide');
                    $('#thanksmodalvp').modal('toggle');
                }
                else
                {
                    $('#msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
                }
            }
        });
});
</script>

<script>
/* Thanks to CSS Tricks for pointing out this bit of jQuery
http://css-tricks.com/equal-height-blocks-in-rows/
It's been modified into a function called at page load and then each time the page is resized. One large modification was to remove the set height before each new calculation. */

equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

$(window).load(function() {
  equalheight('.mrt-content-box .mrt-box-txt');
});
$(window).resize(function(){
  equalheight('.mrt-content-box .mrt-box-txt');
});
</script>
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
</body>
</html>
