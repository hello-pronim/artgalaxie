 <?php
  //require_once(dirname(__FILE__) . "/../../../../smartslider/start.php");
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?=stripslashes($cmsData['meta_description'])?>">
<meta name="keywords" content="<?=stripslashes($cmsData['meta_keyword'])?>">
<title><?=SITENAME?> - <?=stripslashes($cmsData['meta_title'])?></title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<!--<link href="css/custom.css" rel="stylesheet">-->
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
<? $this->load->view('mainsite/common/header');?>

<?php

 N2SmartSlider(13);
 ?>
<!--
<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container"> &nbsp; </div>
</div>


<?php if($numBanner>0){ ?>
<
<div class="top-slider" data-aos="fade-up">
<div id="myCarousel" class="carousel slide carousel-fade" > 
      <ol class="carousel-indicators">
      <?php   for($i=0;$i<$numBanner;$i++){   ?>
         <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
            <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
      <?php } ?>
      </ol>
       
        <div class="carousel-inner">
          <?php $count=0; foreach($getBanner as $getBannerRs){  ?>
            <div class="item <?php if($count==0){ ?> active <?php } ?>">
                <div class="fill"><img src="<?=base_url()?>uploads/banner/<?=$getBannerRs['banner_image']?>" alt="<?=$getBannerRs['banner_image']?>"/></div>
            </div>
          <?php  $count++;  } ?>
         </div>
   </div>
</div>

<?php } ?> 
 -->

<div class="gallery-page-in "> 
  
  <!--page midd Content-->
  <div class="section xxlistartist-section dark-shadwoand-bot-border middle-tab-section-bg bord-none z-index7" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="xxvedio-page-disc">
        <h2 class="section-header text-center color-fff guestbook-header"><?=stripslashes($cmsData['page_title'])?></h2>
      </div>
    </div>
  </div>
  
    
    <div class="magazine-bot-border dark-shadwoand-slider">&nbsp;</div>
 
  <!--page midd Content End--> 
  
  <!--Exibition Pakages-->
  <div class="exibition-packages section xxguestbook-bg">
    <div class="container">
      <div class=" guestbook-blog magazine-blog text-left" data-aos="fade-up" data-aos-once="true">
        <div class="guestbook-blog-content "><?=stripslashes($cmsData['page_desc'])?>
</div>
        
      </div>
     
    </div>
  </div>
  <!--Exibition Pakages End-->
  
</div>
<?php N2Native::beforeClosingBody(); ?>
<? $this->load->view('mainsite/common/footer');?>

<!-- /.container --> 
<?php $this->load->view('mainsite/common/footer_script');?>
<!-- jQuery --> 
<!-- <script src="<?=base_url()?>front_assets/js/jquery.js"></script>  -->

<!-- Bootstrap Core JavaScript --> 
<!-- <script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script>  -->

<!-- Script to Activate the Carousel --> 

<!-- FlexSlider --> 

<!-- <script defer src="<?=base_url()?>front_assets/js/jquery.flexslider.js"></script> --> 
<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script> 
<script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script> 
<!-- <script src="<?=base_url()?>front_assets/js/aos.js"></script> --> 
<script type="text/javascript">  
  //function bsCarouselAnimHeight() {
   /* $('#myCarousel').carousel({
        interval: false
    });*/
//}
</script> 
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
/*      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });*/
    </script> 
<script src="js/jquery.mixitup.min.js"></script> 

</body>
</html>