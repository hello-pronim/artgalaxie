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
<title>Art Galaxie – Most Viewed</title>
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
<style type="text/css">
.colour-black{
  color: #000;
}
</style>
<link rel="stylesheet" href="<?=base_url()?>/front_assets/js/bounceanimate2.css">
</head>
<body>
<? $this->load->view('mainsite/common/header');?>
<?php  if(!empty($sliderData)){  ?>
<!--banner-->
<div class="top-slider image-with-video-slider" data-aos="fade-up">
<div class="container">
    <?php N2SmartSlider(23); ?>
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
      <div class="item">
        <div class="fill"><img src="<?=base_url()?>front_assets/images/gallery-page-banner.jpg" alt=""/></div>
      </div>
    </div>
  </div>
  <?php */ ?>
  
</div>
</div>
<!-- Page Content -->
<?php } ?>
<div class="section middle-menu-section-bg bg-none" >
  <div class="middle-tab-section-bg artist-information-menu box-shadow-block" data-aos="fade-up" data-aos-duration="2500"   data-aos-once="true">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="middle-menu">
            <ul class="nav nav-tabs">
              <li><a class="midd-menu11" href="<?=site_url('artists')?>" style="width: 60px;">All</a></li>
              <li class="active"><a class="midd-menu13" href="<?=site_url('mostly-viewed')?>">Most Viewed</a></li>
              <li><a class="midd-menu14" href="<?=site_url('recently-added')?>">Recently Added</a></li>
              <li><a class="midd-menu15" href="<?=site_url('artists-by-country')?>">Artist by Country</a></li>
              <li><a class="midd-menu16" href="<?=site_url('feature_artists')?>">Featured Artist</a></li>
              <li><a class="midd-menu12" href="<?=site_url('artists-video/0')?>">Artist Videos</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section artists-section" >
  <div class="container" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true">
    <div class="col-lg-12">
      <h2 class="section-header text-center color-fff">Artists Most Viewed</h2>
    </div>
  </div>
</div>

<div class="section bg-white">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="tab-content">
          <div id="sectionAD" class="xtab-pane fade in active">
            <div class="row">
                <?php $fspeed1=1; ?>
              <?php if(!empty($allArtist)>0){    
                foreach($allArtist as $allArtistRs){ ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12"  data-aos="fade-up" data-aos-once="true" >
                  <a href="<?=base_url('artists/details/'.$allArtistRs['id'].'/'.$this->common->create_slug(stripslashes($allArtistRs['first_name'].' '.$allArtistRs['last_name'])))?>">
                       <? if($fspeed1>7){$fspeed1=1;}?>
                   
                        	<div class="artist-img-blog block animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.<? echo $fspeed1;?>s" >
                    <div class="tumb-img">
                      <img src="<?=base_url()?>uploads/user_profile_pic/<?=$allArtistRs['profile_pic']?>" alt="">
                    <div class="overlay"></div>
                    </div>
                    <p class="colour-black"><?=stripslashes($allArtistRs['first_name'].' '.$allArtistRs['last_name'])?></p>
                  </div></a><?php $fspeed1+=2;  ?>
                </div>
              <?php } }  ?>
            </div>
          </div>
         </div>
        </div>
      </div>
    </div>
  </div>

<? $this->load->view('mainsite/artist_common_section');?>
<?php $this->load->view('mainsite/common/footer');?>
<!-- /.container -->
<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
</script>
<?php $this->load->view('mainsite/common/login-registration-common-js');?>

<style>
.artist-img-blog img {
    height: 100%;
    max-width: none;
    width: auto; min-width:-1;
}
</style>
<script>
$(function() {
    var div = $('.tumb-img');
    var width = div.width();
    
    div.css('height', width);
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?=base_url()?>/front_assets/js/bounceanimation3.js"></script>
	<script>
		var jq = $.noConflict();
	jq('.animate').scrolla({
		mobile: false,
		once: false
	});

	</script>
</body>
</html>
