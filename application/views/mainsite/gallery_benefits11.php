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

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src='https://www.google.com/recaptcha/api.js'></script>   
</head>

<body >
<?php $this->load->view('mainsite/common/header');?>
<?php  if(!empty($sliderData)){  ?>
<!--banner-->
<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container">
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
        <iframe height="100%" width="100%" frameborder="0" src="<?=$sliderDataRs['str_name']?>?rel=0&autoplay=1"></iframe>
        <?php } ?>

        </div>
      </div>
        <?php $p++; } ?>
       </div>
    </div>
  </div>
</div>
<!-- Page Content -->
<?php }  ?>

<div class="gallery-page-in ">
  <div class="section listartist-section dark-shadwoand-bot-border z-index2" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc">
        <h2 class="section-header text-center color-fff"><?=stripslashes($cmsData['page_title'])?></h2>
       <!-- <div class="blue-text"><?=stripslashes($cmsData['subtitle'])?></div>
        <div class="text text-center color-fff video-txt text-center font-18 line-height-30" data-aos="fade-up" data-aos-once="true" ><p><?=stripslashes($cmsData['page_desc'])?></p>
        </div>-->

    <div class="bttn-box">
       <center><a href="#" data-toggle="modal" data-target="#myModalBenefits">Apply Now</a></center>
    </div>
      </div>
    </div>
  </div>
  <div class="section bg-white ">
    <div class="xxexibition-packages art-services-bg" style="margin-left: 110px;
margin-right: 110px;">
      <div class="" style="margin-left:100px;margin-right:100px;">
  <?php  if(!empty($gallerybenefits)){
  foreach($gallerybenefits as $gallerybenefitsDs) { ?>
  <div class="service-section service-section5">
    <div class="service-box-bg service-box-bg5" style="background:#FFFFFF;height:180px;">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-6">
            <div class="section-hed" style="font-size:30px;margin-bottom: 60px;margin-top: -60px;margin-left: 60px;"><?=stripslashes($gallerybenefitsDs['benefits_title'])?></div>
          </div>
          <div class="col-md-5" style="margin-top:-50px;margin-left:-120px;">
          <?=stripslashes($gallerybenefitsDs['benefits_text'])?></div>
        </div>
      </div>
    </div>
  </div><br><br><br>
  <div class="service-section service-section6">
    <div class="service-box-bg service-box-bg6" style="background:#FFFFFF;height:200px;">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-6">
            <div class="section-hed" style="font-size:30px;margin-bottom: 60px;margin-top: -60px;margin-left: 60px;"><?=stripslashes($gallerybenefitsDs['benefits2_title'])?></div>
          </div>
          <div class="col-md-5" style="margin-top:-50px;margin-left:-120px;">
             <?=stripslashes($gallerybenefitsDs['benefits2_text'])?></div></div>
        </div>
      </div>
    </div><br><br><br>
 
  <div class="service-section service-section4 service-section4new">
    <div class="service-box-bg service-box-bg4" style="background:#FFFFFF;height:200px;">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <!-- <div class="col-md-5"></div> -->
          <div class="col-md-6">
           <div class="section-hed" style="font-size:30px;margin-bottom: 60px;margin-top: -60px;margin-left: 60px;"><span><p><?=stripslashes($gallerybenefitsDs['benefits3_title'])?></p></span></div>
            <!--  <div class="service-txt"></div> 
                <div class="btn-box">
                    <a href="<?=site_url('publications')?>">Visit our Library</a>&emsp;
                    <a href="<?=site_url('printing')?>">Giclee Printing</a>
                </div> -->
          </div>
          <div class="col-md-5" style="margin-top:-50px;margin-left:-120px;">
          <p><?=stripslashes($gallerybenefitsDs['benefits3_text'])?></p></div>
        </div>
          </div>
        </div>
      </div><br><br><br>
    
   <div class="service-section">
    <div class="service-box-bg" style="background:#FFFFFF;height:200px;">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
         <!--  <div class="col-md-5"></div> -->
          <div class="col-md-6">
           <div class="section-hed" style="font-size:30px;margin-bottom: 60px;margin-top: -30px;margin-left: 60px;"><span><p><?=stripslashes($gallerybenefitsDs['benefits4_title'])?></p></span></div>
            <!--  <div class="service-txt"></div> 
                <div class="btn-box">
                    <a href="<?=site_url('publications')?>">Visit our Library</a>&emsp;
                    <a href="<?=site_url('printing')?>">Giclee Printing</a>
                </div> -->
          </div>
          <div class="col-md-5" style="margin-top:-30px;margin-left:-120px;">
          <p><?=stripslashes($gallerybenefitsDs['benefits4_text'])?></p></div>
          </div>
        </div>
      </div>
    </div><br><br><br>
  <div class="service-section service-section3">
    <div class="service-box-bg service-box-bg3" style="background:#FFFFFF;height:200px;">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-6">
           <div class="section-hed" style="font-size:30px;margin-bottom: 60px;margin-top: -30px;margin-left: 60px;"><span><p><?=stripslashes($gallerybenefitsDs['benefits5_title'])?></p></span></div>
            <!--  <div class="service-txt"></div> 
                <div class="btn-box">
                    <a href="<?=site_url('publications')?>">Visit our Library</a>&emsp;
                    <a href="<?=site_url('printing')?>">Giclee Printing</a>
                </div> -->
          </div>
          <div class="col-md-5" style="margin-top:-30px;margin-left:-120px;">
          <p><?=stripslashes($gallerybenefitsDs['benefits5_text'])?></p></div>
           <!--<div id="map_canvas" style="height: 700px;width: 1150px;">
                            <p ></p>
                        </div>-->
          </div>
        </div>
      </div>
    </div><br><br><br>
  <div class="service-section service-section2">
    <div class="service-box-bg service-box-bg2" style="background:#FFFFFF;height:200px;">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-md-6">
         <div class="section-hed" style="font-size:30px;margin-bottom: 60px;margin-top: -30px;margin-left: 60px;"><span><p><?=stripslashes($gallerybenefitsDs['benefits6_title'])?></p></span></div>
            <!--  <div class="service-txt"></div> 
                <div class="btn-box">
                    <a href="<?=site_url('publications')?>">Visit our Library</a>&emsp;
                    <a href="<?=site_url('printing')?>">Giclee Printing</a>
                </div> -->
          </div>
          <div class="col-md-5" style="margin-top:-30px;margin-left:-120px;">
          <p><?=stripslashes($gallerybenefitsDs['benefits6_text'])?></p></div>
        </div>
      </div>
    </div>
   
  </div>

<?php } } ?>
  
</div></div></div>

<div class="modal fade cnt-form" id="myModalBenefits" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main green-form-bg" style="background: #9A5A4B;">
          <button type="button" class="close" style="background: #9A5A4B;" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUsBenefits" style="color: #d4cd98;">Apply to Partner with us</h2>
              <div class="text-center" id="header-subTitle-contactUsBenefits"></div>
            </div>
            <div id="contactUsFormIdBenefits">
            <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="contact_name_benefits" id="contact_name_benefits"  >
            <input type="text" class="form-control" placeholder="Title At Gallery" name="title" id="title" >
          
            <input type="text" class="form-control" placeholder="Gallery Name" name="gallery_name" id="gallery_name" maxlength="10">
            <input type="text" class="form-control" placeholder="Email" name="email" id="email" >
            <input type="text" class="form-control" placeholder="Gallery Website" name="gallery_website" id="gallery_website">
            <textarea class="form-control" placeholder="Type your message here..." name="contact_message_benefits" id="contact_message_benefits"></textarea>
            <div class="g-recaptcha pull-right" data-sitekey="6LfgAQ4UAAAAAHpzLSRjQ77wGdNKs48LxSVMi_3e" id="g-recaptcha-response"></div>
            <div class="clearfix"></div><br>
            <div class="text-right">
              <a class="dark-gray-btn" href="javascript:void(0)"  onclick="javascript:contact_us_benefits();"><span class="lt"></span>
                <span class="large-btn">Send</span><span class="rt"></span></a></div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  Thanks Contact us -->
<div class="modal fade cnt-form"  id="thanksModalBenefits" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main" style="background: #9A5A4B;">
          <button type="button" class="close" style="background: #9A5A4B;"  data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
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
 <div class="section listartist-section dark-shadwoand-bot-border z-index2" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc">
        <h2 class="section-header text-center color-fff">Feel free to drop us a line should you have any queries.</h2>
     

    <div class="bttn-box">
       <center><a href="#" data-toggle="modal" data-target="#myModalContact">Contact us</a></center>
    </div>
      </div>
    </div>
  </div>
<?php $this->load->view('mainsite/common/footer');?>

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
<script type="text/javascript">


  function contact_us_benefits(){
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

   /*if ($("#g-recaptcha-response").val()) {*/
      
    //xyz = $("#g-recaptcha-response").val();
    jQuery.ajax({
              type: "POST",
              url: "<?=site_url('home/benefit_apply_email')?>",
              data: {           
                    contact_name_benefits: contact_name_benefits,
                    title: title,
                    gallery_name: gallery_name,
                    email: email,
                    gallery_website: gallery_website,
                    contact_message_benefits: contact_message_benefits,
                    //THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
                    //captcha: xyz
                  },
              cache: false,
              success:  function(data)
            { 
             if(data=='done')
              {
              /*  $('#header-title-contactUsBenefits').text('Thank you');
                $('#header-subTitle-contactUsBenefits').html('<br/><div class="popup-lg-text">Your form has been submitted.</div><br/>will get back to you at the earliest.');
                 $('#contactUsFormIdBenefits').hide();*/
                
                
                $('#contact_name_benefits').val('')
                $('#title').val('')
                $('#gallery_name').val('')
                $('#email').val('')
                $('#gallery_website').val('')
                $('#contact_message_benefits').val('')
                $('#msg').html('<span class="text-success">Mail sent successfully!!</span>')
                $('#myModalBenefits').modal('hide')
                $('#thanksModalBenefits').modal('toggle');
              }
              
              if(data=='NameBlank'){
               $('#msg').html('<span class="text-danger">Name can not be blank!!</span>');
                $('#NameBlank').focus()
               }
              if(data=='Emailblank'){
               $('#msg').html('<span class="text-danger">Email address can not be blank!!</span>');
               $('#email').focus();
               }
             if(data=='InvalidEmail'){
                $('#msg').html('<span class="text-danger">Please enter valid e-mail address!!</span>');
                $('#email').focus();
              }
                }
            });
            
/*  }else{
        $('#msg').html('<span class="text-danger">Please fill details!!</span>');
    }*/

  }

</script>
<?php $this->load->view('mainsite/common/login-registration-common-js'); ?>
</body>
</html>
