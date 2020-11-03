<!DOCTYPE html>
<html lang="en">
<head>
<?php  $this->load->view('mainsite/common/meta-files'); ?>

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

<!--banner-->
<!--<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container"> &nbsp; </div>
</div>-->
<!-- Page Content -->

<div class="gallery-page-in "> 
  
  <!--page midd Content-->
  <div class="section xxlistartist-section dark-shadwoand-bot-border middle-tab-section-bg bord-none z-index7" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="xxvedio-page-disc">
        <h2 class="section-header text-center color-fff guestbook-header">Art Tutorials 
          <!-- <div class="sm-txt">New York - USA</div>--> </h2>
      </div>
    </div>
  </div>
  <div class="art-coaching-bot-border light-shadwoand">&nbsp;</div>
  <!--<div class="bg-color-green gestbook-leave-btn bot-shadow z-index2">
    <div data-aos-once="true" data-aos="fade-up" class="text-center"> </div>
  </div>-->
  <!--page midd Content End--> 
  
  <!--Exibition Pakages-->
  <div class="exibition-packages xxguestbook-bg bg-white">
    <div class="container">
    <div class="row ">
    <div class="col-md-6 col-sm-6 text-center"> 
      <a href="<?=site_url('tutorials/categories/c-'.$buttonsDs[0]['id'].'/'.$this->common->create_slug($buttonsDs[0]['cat_name']))?>">
      <div class="tutorrials-main-img">
      <img src="<?=base_url()?>uploads/tutorials/<?=$buttonsDs[0]['cat_image']?>" class="img-responsive light-shadwoand" alt="<?=$buttonsDs[0]['cat_image']?>">
       <br>
      </div>
    </a>
    </div>
     <div class="col-md-6 col-sm-6 text-center"> 
      <a href="<?=site_url('tutorials/categories/c-'.$buttonsDs[1]['id'].'/'.$this->common->create_slug($buttonsDs[1]['cat_name']))?>">
      <div class="tutorrials-main-img">
         <img src="<?=base_url()?>uploads/tutorials/<?=$buttonsDs[1]['cat_image']?>" class="img-responsive light-shadwoand" alt="<?=$buttonsDs[1]['cat_image']?>">
         <br>
       </div>
       </a>
     </div>
    </div>
   
    <div class="row">
    <div class="col-md-4 col-sm-4 text-center">
      <a href="<?=site_url('tutorials/categories/c-'.$buttonsDs[2]['id'].'/'.$this->common->create_slug($buttonsDs[2]['cat_name']))?>">
      <div class="tutorrials-main-img">
        <img src="<?=base_url()?>uploads/tutorials/<?=$buttonsDs[2]['cat_image']?>" class="img-responsive light-shadwoand" alt="<?=$buttonsDs[2]['cat_image']?>">
        <br>
      </div>
      </a>
    </div>
    <div class="col-md-4 col-sm-4 text-center">
        <a href="<?=site_url('tutorials/categories/c-'.$buttonsDs[3]['id'].'/'.$this->common->create_slug($buttonsDs[3]['cat_name']))?>">
      <div class="tutorrials-main-img">
        <img src="<?=base_url()?>uploads/tutorials/<?=$buttonsDs[3]['cat_image']?>" class="img-responsive light-shadwoand" alt="<?=$buttonsDs[3]['cat_image']?>">
        <br>
      </div>
      </a>
    </div>
    <div class="col-md-4 col-sm-4 text-center">
    <a href="<?=site_url('tutorials/categories/c-'.$buttonsDs[4]['id'].'/'.$this->common->create_slug($buttonsDs[4]['cat_name']))?>">
     <div class="tutorrials-main-img">
        <img src="<?=base_url()?>uploads/tutorials/<?=$buttonsDs[4]['cat_image']?>" class="img-responsive light-shadwoand" alt="<?=$buttonsDs[4]['cat_image']?>">
      </div>
      </a>
    </div>    
    </div>
    <!--</div>-->
    <div class="text-center mar-top-50">
    <h2>Tutorials by Category</h2>
    </div>
    <div class="row mar-top-50">
      <?php foreach($gallery_cat as $gallery_catRs ){ ?>
    <div class="col-md-3 col-sm-3 text-center"> 
    <a href="<?=site_url('tutorials/categories/a-'.$gallery_catRs['cat_id'].'/'.$this->common->create_slug($gallery_catRs['cat_name']))?>">
      <div class="tutorrials-main-img">
        <img src="<?=base_url()?>uploads/tutorials/<?=$gallery_catRs['tutorials_images']?>" class="img-responsive light-shadwoand" alt="<?=$gallery_catRs['tutorials_images']?>">
        <br>
      </div>
    </a>
    </div>
    <?php } ?>
   <!--  <div class="col-md-3 col-sm-3 text-center"> <div class="tutorrials-main-img"><img src="<?=base_url()?>front_assets/images/tutorials-by-category2.jpg" class="img-responsive light-shadwoand" alt=""><br></div> </div>
    <div class="col-md-3 col-sm-3 text-center"> <div class="tutorrials-main-img"><img src="<?=base_url()?>front_assets/images/tutorials-by-category3.jpg" class="img-responsive light-shadwoand" alt=""><br></div> </div>
    <div class="col-md-3 col-sm-3 text-center"> <div class="tutorrials-main-img"><img src="<?=base_url()?>front_assets/images/tutorials-by-category4.jpg" class="img-responsive light-shadwoand" alt=""></div> </div> -->
  </div>
  </div>
  </div>
  
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
<script src="<?=base_url()?>front_assets/js/jquery.mixitup.min.js"></script> 
</body>
</html>
