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
<meta name="description" content="">
<meta name="author" content="">
<title>Art Galaxie – Video</title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom3.css" rel="stylesheet">

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
<style type="text/css">
<?php $coursorID = 999; for($i=1;$i<=$numRow;$i++){  $coursorID ++;?>
   .all-video-box #carousel<?=$coursorID?> .slides li <?php if($i< $numRow){ ?>, <?php } ?> 
<?php  }  ?>
{  background: #000;
    border: 1px solid #000;
    display: block !important;
    float: left !important;
    margin: 0 1%!important;
    opacity: 1 !important;
    overflow: hidden;
    padding: 5px;
    width: 31.33% !important;}
<?php for($j=1;$j<=$numRow;$j++){ ?>
 .all-video-box #slider<?=$j?> .slides <?php if($j< $numRow){ ?> , <?php } ?> 
<?php  }  ?>
{
    background: #000 none repeat scroll 0 0;
    border: 10px solid #000;
    box-shadow: 0 0 5px #000;
}
#portfolio .item.video-sort{ width:100%;}
    </style>
</head>

<body >
<? $this->load->view('mainsite/common/header');?>

<div class="containerss3">
<?php

 N2SmartSlider(32);
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

<div class="gallery-page-in ">
 
 
    <div class="section listartist-section dark-shadwoand-bot-border" >
 
  <div class="section middle-menu-section-bg bg-none" style="display:none;" >
  <div class="middle-menu-section artist-information-menu shadow-none bg-none" data-aos="fade-up" data-aos-duration="2500"   data-aos-once="true">
    <div class="container">
       <!--  <div class="vedio-page-disc">
        <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
        <div class="blue-text"><?=stripslashes($cmsData['subtitle'])?></div>
        <div class="text text-center color-fff video-txt text-center font-18 line-height-30" data-aos="fade-up" data-aos-once="true" ><p><?=stripslashes($cmsData['page_desc'])?></p>
        </div>
      </div>-->
<!--      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="middle-menu">
            <ul class="nav nav-tabs">
              <li class="active"><a class="midd-menu11" href="<?=site_url('artists')?>" style="width: 60px;">All</a></li>
              <li><a class="midd-menu13" href="<?=site_url('mostly-viewed')?>">Most Viewed</a></li>
              <li><a class="midd-menu14" href="<?=site_url('recently-added')?>">Recently Added</a></li>
              <li><a class="midd-menu15" href="<?=site_url('artists-by-country')?>">Artist by Country</a></li>
              <li><a class="midd-menu16" href="<?=site_url('feature_artists')?>">Featured Artist</a></li>
              <li class="active"><a href="<?=site_url('artists-video/0')?>" class="midd-menu12">Artist Videos</a></li>
            </ul>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</div>
 <div class="container" data-aos="fade-up" data-aos-once="true">
     <h2 class="section-header text-center color-fff section-header-large" style="color: #b52121;"><?=stripslashes($cmsData['page_title'])?></h2>
     <div class="text text-center color-fff video-txt" > <?=stripslashes($cmsData['page_desc'])?> </div>
     <div class="mar-top-50 text-center">
     <a class="video-production-services-btn" href="<?=site_url('video-production'); ?>">Video Production Services </a>
     </div> 

  </div>
<!--    <div class="black-bg">
      <div class="container"  data-aos="fade-down">
          <div class="style-page-in">
              <ul id="filter-list" class="nav nav-tabs artistsect-tabs text-center">
                <?php $i=1; foreach($galleries as $galleriesRs){ ?>
                <li class="tab<?=$i?>"><a class="filter" data-filter="<?=$galleriesRs['cat_id']?>">
                  <?=ucfirst(stripslashes($galleriesRs['cat_name']))?> </a></li>
                <?php $i++; } ?>
               </ul>
            </div>
       </div>
    </div>-->
  </div>
    
    <div class="section artists-section" style="background: #b52121;">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true">
            <div class="col-lg-12">
              <h2 class="section-header text-center color-fff" style="font-size: 26px;padding: 0 0 15px;">Our Video Portfolio</h2>
            </div>
        </div>
    </div>

    <div class="section listartist-section dark-shadwoand-bot-border" data-aos="fade-up" data-aos-once="true">
        <div class="container">
            <div id="portfolio">
                <?php 
                foreach($otherVideoList as $othervideo)
                {
                ?>
                     <div class="item video-sort  1 mix_all" style="display: inline-block;  opacity: 1;">
                        <div class="slider artist-profile-slider artist-profile-video-slider">
                          <div id="slider1" class="flexslider flexslider-larg">
                                <ul class="slides">
                                    <li class="flex-active-slide" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; transition: opacity 0.6s ease; z-index: 2;">               
                                        <div class="fluid-width-video-wrapper">
                                            <?php
                                            $url = $othervideo['other_video_url'];
                                            $curl = preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                            if($curl == '0')
                                            {
                                            ?>
                                                <iframe id="ytplayer" type="text/html" width="100%" height="650px" src="<?=$othervideo['other_video_url']?>>" frameborder="0"></iframe>
                                            <?php
                                            }
                                            else
                                            {
                                                preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                                $id = $matches[1];
                                                $width = '100%';
                                                $height = '650px';
                                                ?>
                                                <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
                                                src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                                frameborder="0" allowfullscreen></iframe>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
        
    </div>
  
  
 <!-- <div class="section all-video-box" data-aos="fade-up" data-aos-once="true">
  <div class="container">
  <div id="portfolio">
    
 <?php if(!empty($artistVideos)){
  $I=0; $totalVideos=0; $coursorID = 999; /* coursor che id conflit hot hote so te 999 pasun start kele*/
  
 
  foreach($artistVideos as $artistVideosRs){ $I++; $coursorID ++;
    $videoLib = new common();
    $where =  array('user_id' => $artistVideosRs['id'] );
    $video = $video2 = $videoLib->getArtistVideoList('videos_link,id',$where);   
  ?>
    <div class="item video-sort  <?=$artistVideosRs['galleries_id']?>">
     
        <h2 class="video-header" ><?=stripslashes($artistVideosRs['first_name']." ".$artistVideosRs['last_name'])?></h2>
  
    
        <div class="slider artist-profile-slider artist-profile-video-slider">
          <div id="slider<?=$I?>" class="flexslider flexslider-larg">
            <ul class="slides">
                      
              <?php  
                 foreach($video as $videosRs){ $totalVideos++;  ?>
                  <li>               
                  <iframe id="player_<?=$totalVideos?>" src="<?=$videosRs['videos_link']?>?rel=0" width="1043" height="600" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></li>
                <?php   } ?>
            </ul>
          </div>
          <br>
        <div id="carousel<?=$coursorID?>" class="flexslider flexslider-thumb">
            <ul class="slides">
               <?php foreach($video2 as $videosRs2){  
                    $video_arr = $videoLib->parseVideos($videosRs2['videos_link']);      ?>
              <li><span class="flexslider-thumb-img"> 
                <img src="<?=$video_arr[0]['thumbnail'];?>" alt=""></span> </li>
               <?php  } ?>
            </ul>
          </div>
        </div>
      
    </div>
     <?php } }else{ ?>
     <div class="item video-sort">
      <h2 class="video-header" > No Record Found.</h2>
    </div>
    <?php } ?>


  
    </div>
    </div>
   </div>-->
  <!--  <div class="middle-tab-section-bg blog-sect-heding sigl-blog-btn-block">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-once="true">
        <div class="blog-btn-box text-center">
        <?php  if($previous>=0){ ?> 
        <a href="<?=site_url('artists-video/'.$previous)?>" class="blog-btn-style">Previous</a>
        <?php } ?>
        
       <?php  if($next_start<$totalVideoCount){ ?> 
        <a class="blog-btn-style" href="<?=site_url('artists-video/'.$next_start)?>">Next</a>
        <?php } ?>
        </div>
      </div>
    </div>-->
 
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
  <?php $coursorID = 999;
  for($p=1;$p<=$numRow;$p++){ $coursorID++; ?>
  <script type="text/javascript">
  $(window).load(function(){
      $('#carousel<?=$coursorID?>').flexslider({
       directionNav: false,  
        itemWidth: 348,
        itemMargin: 0,
        asNavFor: '#slider<?=$p?>'
    
    
      });

      $('#slider<?=$p?>').flexslider({
        animation: "fade",
        directionNav: false,  
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        smoothHeight: false,
        sync: "#carousel<?=$p?>",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script> 
  <?php } ?>
  
  
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script>
        
        <script src="<?=base_url()?>front_assets/js/jquery.mixitup.min.js"></script> 
        
    <script type="text/javascript">
$(function(){
  $('#portfolio').mixitup({
    targetSelector: '.item',
    transitionSpeed: 450
  });
});
</script>
<?php $videoPauseCount = 0;
for($q=1;$q<=count($artistVideos);$q++){$videoPauseCount ++;
   $where =  array('user_id' => $artistVideosRs['id'] );
    $video = $videoLib->getArtistVideoList('videos_link',$where); ?>
 
<script type="text/javascript">
  
    $(window).load(function(){

      // Vimeo API nonsense
    <?php //  for($r=1;$r<=count($video);$r++){     ?>
      var player = document.getElementById('player_<?=$videoPauseCount?>');
      <?php //} ?>
      $f(player).addEvent('ready', ready);

      function addEvent(element, eventName, callback) {
        (element.addEventListener) ? element.addEventListener(eventName, callback, false) : element.attachEvent(eventName, callback, false);
      }

      function ready(player_id) {
        var froogaloop = $f(player_id);

        froogaloop.addEvent('play', function(data) {
          $('.flexslider').flexslider("pause");
        });

        froogaloop.addEvent('pause', function(data) {
          $('.flexslider').flexslider("play");
        });
      }


      // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
      $(".flexslider")
        .fitVids()
        .flexslider2({
          animation: "slide2",
          useCSS: false,
          animationLoop: false,
          smoothHeight: true,
          start: function(slider<?=$q?>){
            $('body').removeClass('loading');
          },
          before: function(slider<?=$q?>){
            $f(player).api('pause');
          }
      });
    });
</script>
<?php }  ?>
  
  
 
   
 <?php N2Native::beforeClosingBody(); ?>
 <? $this->load->view('mainsite/common/login-registration-common-js');?>
</body>
</html>
