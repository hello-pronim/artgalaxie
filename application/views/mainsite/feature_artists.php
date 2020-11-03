<?php
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Art Galaxie – Featured Artist</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />

<script src="https://www.amcharts.com/lib/3/ammap.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldHigh.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/themes/dark.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyA8Wn0s2nK_tUMZvcEY3OTLrlfVRUG_e7s&libraries=places&region=uk&language=en&sensor=true"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
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
<?php $this->load->view('mainsite/common/header');?>
<!-- Page Content -->

<div class="top-slider image-with-video-slider" data-aos="fade-up">
<div class="container">
    
    <?php N2SmartSlider(26); ?>
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
        <iframe height="100%" width="100%" frameborder="0" src="<?=$sliderDataRs['str_name']?>"></iframe>
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

<div class="section middle-menu-section-bg bg-none" >
  <div class="middle-tab-section-bg artist-information-menu box-shadow-block" data-aos="fade-up" data-aos-duration="2500"   data-aos-once="true">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="middle-menu">
            <ul class="nav nav-tabs">
              <li class="active"><a class="midd-menu11" href="<?=site_url('artists')?>" style="width: 60px;">All</a></li>
              <li><a class="midd-menu13" href="<?=site_url('mostly-viewed')?>">Most Viewed</a></li>
              <li><a class="midd-menu14" href="<?=site_url('recently-added')?>">Recently Added</a></li>
              <li><a class="midd-menu15" href="<?=site_url('artists-by-country')?>">Artist by Country</a></li>
              <li  class="active"><a class="midd-menu16" href="<?=site_url('feature_artists')?>">Featured Artist</a></li>
              <li><a class="midd-menu12" href="<?=site_url('artists-video/0')?>">Artist Videos</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if($isExists>0){ ?>
<div class="section featured-section">
  <div class="container" >
    <div data-aos="fade-up">
      <h2 class="section-header section-header-large text-center" data-aos="fade-up" >Featured Artist<br>
        <div class="artist-name" data-aos="fade-up" data-aos-delay="1000" ><a href="<?=site_url('feature_artists/details/'.$featureArtist['id'].'/'.$this->common->create_slug($featureArtist['first_name'].' '.$featureArtist['last_name']))?>"><font  color="#587a21"><?=stripslashes($featureArtist['first_name'].' '.$featureArtist['last_name'])?></font></a></div>
      </h2>
    </div>
    <div class="row">
      <div class="col-sm-4 col-sm-push-4" data-aos="fade-up" data-aos-delay="1500" data-aos-easing="ease">
        <div class="artist-pic"><a href="<?=site_url('feature_artists/details/'.$featureArtist['id'].'/'.$this->common->create_slug($featureArtist['first_name'].' '.$featureArtist['last_name']))?>">
          <?php if($featureArtist['profile_pic']!=''){ ?>
          <img src="<?=base_url()?>uploads/user_profile_pic/<?=$featureArtist['profile_pic']?>" alt=""/>
          <?php }else{ ?> 
          <img src="<?=base_url()?>front_assets/images/sliderimage.png" alt=""/>
          <?php } ?>
        </a> 
        
            <a class="feature-artists-btn" href="<?=site_url('feature_artists/details/'.$featureArtist['id'].'/'.$this->common->create_slug($featureArtist['first_name'].' '.$featureArtist['last_name']))?>">
            <span class="large-btn">View Featured</span>
            </a>
        </div>
      </div>
      <div class="col-sm-4 col-sm-pull-4" >
        <div class="atist-txt atist-txt-mr-bottom" data-aos="fade-right" data-aos-delay="2500" data-aos-easing="ease">
          <h4>Interview</h4>
          <?=nl2br($featureArtist['interview_desc'])?></div>
        <div class="atist-txt" data-aos="fade-right" data-aos-delay="3000" data-aos-easing="ease">
          <h4>Artwork Gallery</h4>
          <?=nl2br($featureArtist['feature_artwork_gallery_desc'])?> </div>
      </div>
      <div class="col-sm-4" >
        <div class="atist-txt atist-txt-mr-bottom" data-aos="fade-left" data-aos-delay="2500" data-aos-easing="ease">
          <h4>Inside the Studio</h4>
           <?=nl2br($featureArtist['feature_short_inside_the_studio_desc'])?></div>
        <div class="atist-txt" data-aos="fade-left" data-aos-delay="3000" data-aos-easing="ease">
          <h4>Video </h4>
           <?=nl2br($featureArtist['feature_video_desc'])?></div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="section middle-menu-section-bg">
  <div data-aos-once="true" data-aos-duration="2500" data-aos="fade-up" class="middle-menu-section aos-init aos-animate" style="padding: 25px 0px 25px;">
    <div class="container">
        <div class="middle-menu mar-top-bot-20">            
            <div class="section-header text-center color-fff" style="padding:0;">More Featured Artists</div>   <!--class="orange-lg-btn art-galaxie-artists-btn" -->
        </div>
    </div>
  </div>
</div>
<div class="section section-artist-block">
  <div class="container">
    <div class="row">
      <?php $i=0; 
      foreach ($remainingFeature as $dataRs)
      { 
      $i++; ?>
      <div class="col-sm-4 col-xs-6 col-xxs-12 feature-three-col"> 
      <a href="<?=site_url('feature_artists/details/'.$dataRs['id'].'/'.$this->common->create_slug($dataRs['first_name'].' '.$dataRs['last_name']))?>">
        <div class="artist-block feature-three-block <?php if($dataRs['image_color']==1){ echo 'box-color-one'; }else if($dataRs['image_color']==2){  echo 'box-color-two'; }else if($dataRs['image_color']==3){  echo 'box-color-three'; }else if($dataRs['image_color']==4){  echo 'box-color-four'; }else if($dataRs['image_color']==5){  echo 'box-color-five'; }else if($dataRs['image_color']==6){  echo 'box-color-six'; }else if($dataRs['image_color']==7){  echo 'box-color-seven'; }else if($dataRs['image_color']==8){  echo 'box-color-eight'; }else if($dataRs['image_color']==9){  echo 'box-color-nine'; } ?>" data-aos="fade-up" data-aos-once="true">
          <div class="artist-img">
           <span>
            <?php if($dataRs['image_name']!=''){ ?>
            <img src="<?=base_url()?>uploads/artist-gallery/original/<?=$dataRs['image_name']?>" alt="">
            <?php }else{ ?>
             <img src="<?=base_url()?>front_assets/images/artist-page-img.jpg" alt=""/>
             <?php } ?>
          </span> <div class="overlay"></div> </div>
          <div class="artist-name"><?=stripslashes($dataRs['first_name']." ".$dataRs['last_name'])?><br>
            <span><?=date('F Y',strtotime($dataRs['is_featured']))?></span> </div>
        </div>
        </a> </div>
        <?php if($i>9){ $i=0; } } ?>
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
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script> 
<script type="text/javascript" src="<?=base_url()?>front_assets/js/jquery.waterwheelCarousel.js"></script> 
<script type="text/javascript">
      $(document).ready(function () {
        var carousel = $("#carousel").waterwheelCarousel({
          flankingItems: 3,
          movingToCenter: function ($item) {
            $('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
          },
          movedToCenter: function ($item) {
            $('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
          },
          movingFromCenter: function ($item) {
            $('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
          },
          movedFromCenter: function ($item) {
            $('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
          },
          clickedCenter: function ($item) {
            $('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
          }
        });

        $('#prev').bind('click', function () {
          carousel.prev();
          return false
        });

        $('#next').bind('click', function () {
          carousel.next();
          return false;
        });

        $('#reload').bind('click', function () {
          newOptions = eval("(" + $('#newoptions').val() + ")");
          carousel.reload(newOptions);
          return false;
        });

      });
    </script> 

<!-- FlexSlider --> 
<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider.js"></script> 
<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider2.js"></script> 
<script type="text/javascript">

    (function() {

      // store the slider in a local variable
      var $window = $(window),
          flexslider;

      // tiny helper function to add breakpoints
      function getGridSize() {
        return (window.innerWidth < 500) ? 1 :
         (window.innerWidth < 600) ? 2 :
               (window.innerWidth < 900) ? 3 : 3;
      }

      $(function() {
        SyntaxHighlighter.all();
      });

      $window.load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          animationSpeed: 400,
          animationLoop: false,
          itemWidth: 210,
          itemMargin: 5,
          minItems: getGridSize(), // use function to pull in initial value
          maxItems: getGridSize(), // use function to pull in initial value
          start: function(slider){
            $('body').removeClass('loading');
            flexslider = slider;
          }
        });
      });

      // check grid size on resize event
      $window.resize(function() {
        var gridSize = getGridSize();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
      });
    }());


  </script> 
<script type="text/javascript">

    (function() {

      // store the slider in a local variable
      var $window = $(window),
          flexslider2;

      // tiny helper function to add breakpoints
      function getGridSize() {
        return (window.innerWidth < 550) ? 1 :
         (window.innerWidth < 767) ? 2 :
               (window.innerWidth < 991) ? 3 : 4;
      }

      $(function() {
        SyntaxHighlighter.all();
      });

      $window.load(function() {
        $('.flexslider2').flexslider({
          animation: "slide",
          animationSpeed: 400,
          animationLoop: false,
          itemWidth: 210,
          itemMargin: 5,
          minItems: getGridSize(), // use function to pull in initial value
          maxItems: getGridSize(), // use function to pull in initial value
          start: function(slider){
            $('body').removeClass('loading');
            flexslider = slider;
          }
        });
      });

      // check grid size on resize event
      $window.resize(function() {
        var gridSize = getGridSize();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
      });
    }());
  </script> 
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
</script>
<?php $this->load->view('mainsite/common/login-registration-common-js');?>
 </body>
</html>