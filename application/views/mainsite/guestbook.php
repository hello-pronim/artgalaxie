<?php 
    $com_key = new  common(); 
    $gckey = $com_key->get_google_captcha_key();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Art Galaxie - Guestbook</title>
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
<div class="modal fade cnt-form guestbook-info-modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Guestbook</h2>
            </div>
             <div id="msg" class="text-center"></div>
            <textarea class="form-control" placeholder="Type your message here." rows="5" name="contact_message" id="contact_message"></textarea>
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" id="g-recaptcha-response"></div>
            </div>
              <a class="dark-gray-btn mar-top-bot-20"  href="javascript:void(0)"  onclick="javascript:guestbook_contact_us();"><span class="lt"></span><span class="large-btn">Send</span><span class="rt"></span></a></div>
              <div class="clearfix"></div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  Thanks Guestbook -->
<div class="modal fade cnt-form" id="thankguestbookmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Thank you</h2>
              <div class="text-center">Your message has been successfully submitted.<br/><br />We will need to check it for spam <br/>before publishing it online.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<? $this->load->view('mainsite/common/header');?>

<!--banner-->
<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container"> &nbsp; </div>
</div>
<!-- Page Content -->

<div class="gallery-page-in "> 
  
  <!--page midd Content-->
  <div class="section xxlistartist-section dark-shadwoand-bot-border middle-tab-section-bg bord-none z-index7" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="xxvedio-page-disc">
        <h2 class="section-header text-center color-fff guestbook-header">Art Galaxie Guestbook 
          <!-- <div class="sm-txt">New York - USA</div>--> </h2>
      </div>
    </div>
  </div>
  <div class="bg-color-green gestbook-leave-btn bot-shadow z-index2">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
       <?php if($this->session->userdata('CUST_ID')!=""){ ?>
     <a class="dark-gray-btn" href="#" data-toggle="modal" data-target="#myModal"><span class="lt"></span><span class="large-btn">Leave us a note</span><span class="rt"></span></a>
      <?php }else{ ?>
      <a class="dark-gray-btn" href="#" data-toggle="modal" data-target="#myModalLogin"><span class="lt"></span><span class="large-btn">Leave us a note</span><span class="rt"></span></a>
     <?php } ?></div>
  </div>
  <!--page midd Content End--> 
  
  <!--Exibition Pakages-->
  <div class="xxexibition-packages guestbook-bg">
    <div class="container">
      <?php if(!empty($dataDs)){ 
        foreach($dataDs as $dataRs){
      ?>
      <div class=" guestbook-blog" data-aos="fade-up" data-aos-once="true">
        <div class="guestbook-blog-content"><?=stripslashes($dataRs['short_description'])?></div>
        <h5><?=stripslashes($dataRs['first_name'].' '.$dataRs['last_name'])?>, <?=ucfirst(stripslashes($dataRs['user_type']))?></h5> 
      </div>
      <?php }  }else{  ?>
      <div class=" guestbook-blog" data-aos="fade-up" data-aos-once="true">
        <div class="guestbook-blog-content">No Record Found.!</div>
     </div>
      <?php } ?>
    </div>
  </div>
  <!--Exibition Pakages End-->
  <div class="bg-color-green gestbook-leave-btn bot-shadow z-index2">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
    <?php if($this->session->userdata('CUST_ID')!=""){ ?>
     <a class="dark-gray-btn" href="#"  data-toggle="modal" data-target="#myModal"><span class="lt"></span><span class="large-btn">Share your thoughts with us</span><span class="rt"></span></a>
     <?php }else{ ?>
     <a class="dark-gray-btn" href="#"  data-toggle="modal" data-target="#myModalLogin"><span class="lt"></span><span class="large-btn">Share your thoughts with us</span><span class="rt"></span></a>
     <?php } ?>
   </div>
  </div>
</div>
<? $this->load->view('mainsite/common/footer');?>

<div class="modal fade cnt-form" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main green-form-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
            <div class="text-center" ><div class="popup-lg-text">You need to Login/Register to add your note.</div></div>
            </div>
           </div>
        </div>
      </form>
    </div>
  </div>
</div>

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
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
</body>
</html>
