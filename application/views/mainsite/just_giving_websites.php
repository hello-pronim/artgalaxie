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
<style>
.service-box-bg2{box-shadow: none;}

.service-section2{
	box-shadow: 0 0 20px #666;
    position: relative;
    /*border-bottom: 10px solid #5f486d;*/
    border-bottom: 10px solid #664c72;
    width: 100%;
}
</style>         
</head>
      <body>
        <? $this->load->view('mainsite/common/header');?>


        <div class="gallery-page-in "> 
          <!--page midd Content-->
          <div class="listartist-section dark-shadwoand-bot-border bg-color-orchid bord-none" >
            <div class="container" data-aos="fade-up" data-aos-once="true">
              <div class="vedio-page-disc">
                <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
                <div class="text text-center color-fff video-txt" data-aos="fade-up" data-aos-once="true" >
                  <p><?=nl2br(stripslashes($cmsData['page_desc']))?></p></div>
                </div>
              </div>
            </div>
            </div>
                       
 <div class="" data-aos="fade-up" data-aos-once="true">
    <div class="service-section service-section2" style="background-color: white;">
          <?php  if(!empty($websiteDs)){
  foreach($websiteDs as $website) { ?>
         
    <div class="service-box-bg service-box-bg2" >
      <div class="container" data-aos="fade-up" data-aos-once="true">
            <h2 class="video-header" style="color:black;border-bottom: solid 2px #9B008E;" ><p> <?=stripslashes($website['first_name']." ".$website['last_name'])?></p></h2>
           <center>
           <img src="<?=base_url()?>uploads/art_of_giving/<?=stripslashes($website['banner1'])?>" alt="<?=stripslashes($website['banner1'])?>"/><br>
          </center>
          <div class="service-txt"><span><p><?=stripslashes($website['giving_websites_text'])?></p></span></div>
           <a href="<?=base_url('artists/details/'.$website['id'].'/'.$this->common->create_slug(stripslashes($website['first_name'].' '.$website['last_name'])))?>" class="package-website-btn"><center>View artist profile page</center></a>&emsp;
            <br>
            <?php if($website['giving_websites_link']){ ?>
                <a href="<?php echo $website['giving_websites_link'] ?>" target="_blank" class="package-book-btn"><center>View artist website</center></a>
            <?php }else{ ?>
                <a href="#" class="package-book-btn"><center>View artist website</center></a>
            <?php } ?>
      </div>
    </div>
   
  </div>
<?php } } ?>
</div>

<? $this->load->view('mainsite/common/footer');?>
<!-- /.container --> 


<!-- Modal -->
<div class="modal fade cnt-form" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main form-color2">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUs">Website Enquiry</h2>
            </div>
            <div id="contactUsFormId">
            <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="contact_name" id="contact_name"  >
            <input type="text" class="form-control" placeholder="Email" name="contact_email" id="contact_email" >
            <select class="form-control" name="package_id" id="package_id">
              <option value="">Select Package</option>
              <option value="Package 1">Package 1</option> 
              <option value="Package 2">Package 2</option> 
               <option value="Package 3">Package 3</option> 
              <option value="Package 4">Package 4</option> 
              <option value="Package 5">Package 5</option> 
              <option value="Other">Other</option> 
            </select>
            <textarea class="form-control" placeholder="Please feel free to tell us more of what you envision for your website" name="contact_message" id="contact_message"></textarea>
            <div class="g-recaptcha pull-right" data-sitekey="<?=$gckey?>" id="g-recaptcha-response"></div>
            <div class="clearfix"></div><br>
            <div class="text-right">
              <a class="dark-gray-btn" href="javascript:void(0)"  onclick="javascript:website_contact_us();"><span class="lt"></span>
                <span class="large-btn">Send</span><span class="rt"></span></a></div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- jQuery --> 

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
