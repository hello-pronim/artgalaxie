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
<?php //$this->load->view('mainsite/common/top');?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Art Galaxie – Galleries</title>
<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/custom.css" rel="stylesheet"> <!-- PSD css 31st jan 2017 -->
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
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

 N2SmartSlider(3);
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

  <div class="section listartist-section dark-shadwoand-bot-border bg-color-green bord-none z-index2" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
   

    <div class="vedio-page-disc">
        <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($cmsData['page_title'])?>
          <div class="sm-txt"><!--<?=stripslashes($cmsData['subtitle'])?>--></div> </h2>
        <div class="text text-center color-fff video-txt aos-init aos-animate" data-aos="fade-up" data-aos-once="true"><?=stripslashes($cmsData['page_desc'])?></div>
      </div>
  </div>
  <div class="green-box-btn  z-index1">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
        <a class="dark-gray-btn"  href="<?=site_url('home/gallery_benefits')?>"><span class="lt"></span><span class="large-btn" style="padding:0 25px;">Benefits</span><span class="rt"></span></a>&emsp;
        <a class="dark-gray-btn" data-toggle="modal" data-target="#myModalBenefits" href="#"><span class="lt"></span><span class="large-btn">Apply Now</span><span class="rt"></span></a>
    </div>
  </div>

<div class=" middle-tab-section pad-bot-0">
    <div class="middle-tab-section-bg artist-information-menu box-shadow-block pad35px020px">
      <div data-aos="fade-down" data-aos-once="true" class="container">
       
         
      <div class="row" style="margin-left: 32px;">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="middle-menu">
            <ul class="nav nav-tabs">
              <li><a class="midd-menu11" onclick="gal_filter(0)">All</a></li>
              <li><a class="midd-menu12" onclick="gal_filter(2)">North America</a></li>
              <li><a class="midd-menu13"  onclick="gal_filter(3)">South America</a></li>
              <li><a class="midd-menu14" onclick="gal_filter(4)">Europe</a></li>
              <li><a class="midd-menu15" onclick="gal_filter(5)">Rest of the World</a></li>
            </ul>
          </div>
        </div>
   
    </div>
       
      </div>
    </div>
  </div>
  

<div class="section bg-white gallery-section">
    
  <div class="container" data-aos="zoom-in" data-aos-once="true" data-aos-duration="3000" >
    <div class="row two-by-two-gallery" id="cntry_dtl">
      <?php if(!empty($gallery)){ 

        foreach ($gallery as $galleryRs) { 
            $colour = $this->common->chooseColourClass($galleryRs['colour_type']); 
      ?>
      <div class="col-xs-6 col-xxs-12 gal_item gal<?=$galleryRs['category_id']; ?>"> <a 
        href="<?=site_url('gallery_details/'.$galleryRs['cat_id'].'/'.$this->common->create_slug($galleryRs["cat_name"]))?>">
        <div class="artist-block <?php echo $colour; ?>"  data-aos="zoom-in" data-aos-once="true" data-aos-duration="4000">
          <div class="artist-img"><span>
            <img class="img-responsive" src="<?=base_url()?>uploads/regionwise_galleries/<?=$galleryRs['image_name']?>" alt=""/></span>
            <div class="overlay"></div></div>
          <div class="artist-name partnername"><?=stripslashes($galleryRs['cat_name'])?><br>
                    <span><?=stripslashes($galleryRs['sub_name'])?></span> </div>
          
        </div>
        </a> </div>
        <?php }  }else{ ?>
        <div class="col-xs-12 col-xxs-12">  
        <div class="artist-block " data-aos="zoom-in" data-aos-once="true" data-aos-duration="4000">
          <div class="artist-name partnername">No record found! </div>
        </div>
        </div>
          <?php } ?>
        
    
    </div>
  </div>
</div>
</div>
<div class="modal fade cnt-form" id="myModalBenefits" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="contactusbenefits">
        <div class="form-main green-form-bg" style="background: #9A5A4B;">
          <button type="button" class="close" style="background: #9A5A4B;" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUsBenefits" style="color: #d4cd98;">Apply To Partner With Us</h2>
              <div class="text-center" id="header-subTitle-contactUsBenefits"></div>
            </div>
            <div id="contactUsFormIdBenefits">
            <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="contact_name_benefits" id="contact_name_benefits"  >
            <input type="text" class="form-control" placeholder="Title At Gallery" name="title" id="title" >
            <input type="text" class="form-control" placeholder="Gallery Name" name="gallery_name" id="gallery_name">
            <input type="text" class="form-control" placeholder="Email" name="email" id="email" >
            <input type="text" class="form-control" placeholder="Gallery Website" name="gallery_website" id="gallery_website">
            <textarea class="form-control" placeholder="Type your message here..." name="contact_message_benefits" id="contact_message_benefits"></textarea>
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" ></div>
            </div>
            <div class="clearfix"></div><br>
             <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="cb_sub">Send</button>
             </div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  Thanks Contact us -->
<div class="modal fade cnt-form" id="thanksmodalbenefits" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main" style="background: #9A5A4B;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="background: #9A5A4B;"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 style="color: #d4cd98;">Thank you for contacting us</h2>
              <div class="text-center">Your message has been successfully submitted.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php N2Native::beforeClosingBody(); ?>
<?php $this->load->view('mainsite/common/footer');?>


<!-- Contact us benifit Popup -->
<script type="text/javascript">
$('#contactusbenefits').submit(function(e)
{
    e.preventDefault(); 
    var contact_name_benefits = $('#contact_name_benefits').val();
    var title = $('#title').val();
    var gallery_name = $('#gallery_name').val();
    var email = $('#email').val();
    var gallery_website = $('#gallery_website').val();
    var contact_message_benefits = $('#contact_message_benefits').val();

    if(contact_name_benefits=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Name.</span>');
        $('#contact_name_benefits').focus();
        return false
    }
    if(title=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Title.</span>');
        $('#title').focus();
        return false
    }
    if(gallery_name=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Gallery Name.</span>');
        $('#gallery_name').focus();
        return false
    }
    if(email=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Email.</span>');
        $('#email').focus();
        return false
    }
    if(gallery_website=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Gallery Website.</span>');
        $('#gallery_website').focus();
        return false
    }
    if(contact_message_benefits=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Message.</span>');
        $('#contact_message_benefits').focus();
        return false
    }

    jQuery.ajax({
            type: "POST",
            url: "<?=site_url('home/benefit_apply_email')?>",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data)
            {
                if(data=='done')
                {
                    $('#msg').html('<span class="text-success">Mail sent successfully!!</span>');
                    $('#myModalBenefits').modal('hide');
                    $('#thanksmodalbenefits').modal('toggle');
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

    function gal_filter(id) {
        if(id==0) { 
            //$('.gal_item').show();
            $( '.gal_item').fadeIn( 2000, function() {  });
        } else {
            $('.gal_item').hide();
            $( '.gal_item.gal' + id).fadeIn( 2000, function() {  });
            //$('.gal_item.gal' + id).show(800,'swing'); 
            //$('.gal_item.gal' + id).show();
        }
    }
</script>
<!-- /.container --> 
<?php $this->load->view('mainsite/common/footer_script');?>

</body>
</html>
