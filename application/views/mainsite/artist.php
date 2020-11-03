 <?php
  //require_once(dirname(__FILE__) . "/../../../../smartslider/start.php");
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  //require_once(constant("SLIDERPATH"));
  N2Native::beforeOutputStart();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Art Galaxie – Artists</title>
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
.bg-none {
    display: block;
}
</style>
<link rel="stylesheet" href="<?=base_url()?>/front_assets/js/bounceanimate2.css">
</head>
<body>
<?php $this->load->view('mainsite/common/header');?>
<div class="top-slider image-with-video-slider" data-aos="fade-up">
<div class="container">
    <?php N2SmartSlider(5); ?>
    <?php N2Native::beforeClosingBody(); ?>
    <?php /* ?>
  <div id="myCarousel" class="carousel slide carousel-fade" > 
    <ol class="carousel-indicators">
      <?php for($i=0;$i<count($sliderData);$i++){ ?>
      <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
      <?php } ?>
     <li data-target="#myCarousel" data-slide-to="1"></li> 
    </ol>
    <div class="carousel-inner">
      <?php $p=0; foreach($sliderData as $sliderDataRs){  ?>
      <div class="item  <?php if($p==0){ ?> active  <?php } ?> ">
        <div class="fill">
        <?php if($sliderDataRs['type']=='video'){ ?>
         <video height="100%" width="100%" controls>
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
              <li><a class="midd-menu15" id="listartist" href="<?=site_url('artists-by-country')?>">Artist by Country</a></li>
              <li><a class="midd-menu16"  href="<?=site_url('feature_artists')?>">Featured Artist</a></li>
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
      <h2 class="section-header text-center color-fff" style="margin:0;padding:0 0 50px;">Artists Alphabetically</h2>
    </div>
  </div>
</div>
<div class="middle-tab-section">
  <div class="middle-tab-section-bg shadow-none">
    <div class="container" >
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="">
            <ul class="nav nav-tabs artistsect-tabs text-center">
              <li class="active"><a data-toggle="tab" href="#sectionAD">A - D </a></li>
              <li><a data-toggle="tab" href="#sectionDJ">E - J</a></li>
              <li><a data-toggle="tab" href="#sectionJM">K - M</a></li>
              <li><a data-toggle="tab" href="#sectionMS">N - S</a></li>
              <li><a data-toggle="tab" href="#sectionSZ">T - Z</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section bg-white">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="tab-content">
          <div id="sectionAD" class="tab-pane fade in active">
            <div class="row">
              <?php $fspeed1=1; ?>
			  <?php if(count($atod)>0){  
			      //echo "<pre>"; print_r($atod); echo "</pre>";
                foreach($atod as $atodRs){ ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12"  data-aos="fade-up" data-aos-once="true" >
                  <a href="<?=base_url('artists/details/'.$atodRs['id'].'/'.$this->common->create_slug(stripslashes($atodRs['first_name'].' '.$atodRs['last_name'])))?>">
                    <? if($fspeed1>7){$fspeed1=1;}?>
					<div class="artist-img-blog block animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.<? echo $fspeed1;?>s" >
                    <div class="tumb-img">
                      <!--<img src="<?=base_url()?>uploads/artist-gallery/original/<?=$atodRs['image_name']?>" alt="">-->
                      <img src="<?=base_url()?>uploads/user_profile_pic/<?=$atodRs['profile_pic']?>" alt="<?=$atodRs['profile_pic']?>">
                    <div class="overlay"></div>
                    </div>
                    <p class="colour-black"><?=stripslashes($atodRs['first_name'].' '.$atodRs['last_name'])?></p>
                  </div></a> <?php $fspeed1+=2;  ?>
                </div>
              <?php } }  ?>
            </div>
          </div>
          <div id="sectionDJ" class="tab-pane fade">
            <div class="row">
               <?php  $fspeed2=1; if(count($etoj)>0){    
                foreach($etoj as $etojRs){ ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12" >
                 <a href="<?=base_url('artists/details/'.$etojRs['id'].'/'.$this->common->create_slug(stripslashes($etojRs['first_name'].' '.$etojRs['last_name'])))?>">
                  <? if($fspeed2>7){$fspeed2=1;}?>
					<div class="artist-img-blog block animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.<? echo $fspeed2;?>s" >
                    <div class="tumb-img">
                      <!--<img src="<?=base_url()?>uploads/artist-gallery/original/<?=$etojRs['image_name']?>" alt="">-->
                      <img src="<?=base_url()?>uploads/user_profile_pic/<?=$etojRs['profile_pic']?>" alt="">
                    <div class="overlay"></div>
                    </div>
                    <p class="colour-black"><?=stripslashes($etojRs['first_name'].' '.$etojRs['last_name'])?></p>
                  </div>
                </a><?php $fspeed2+=2; ?>
                </div>
              <?php } } ?>
             </div>
          </div>
          <div id="sectionJM" class="tab-pane fade">
            <div class="row">
              <?php $fspeed3=1; if(count($ktom)>0){    
                foreach($ktom as $ktomRs){ ?>
              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12" >
                <a href="<?=base_url('artists/details/'.$ktomRs['id'].'/'.$this->common->create_slug(stripslashes($ktomRs['first_name'].' '.$ktomRs['last_name'])))?>">
                <? if($fspeed3>7){$fspeed3=1;}?>
					<div class="artist-img-blog block animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.<? echo $fspeed3;?>s" >
                  <div class="tumb-img">
                    <!--<img src="<?=base_url()?>uploads/artist-gallery/original/<?=$ktomRs['image_name']?>" alt="">-->
                    <img src="<?=base_url()?>uploads/user_profile_pic/<?=$ktomRs['profile_pic']?>" alt="">
                  <div class="overlay"></div>
                  </div>
                  <p class="colour-black"><?=stripslashes($ktomRs['first_name'].' '.$ktomRs['last_name'])?></p>
                </div>
              </a><?php $fspeed3+=2;  ?>
              </div>
              <?php } } ?>
             </div>
          </div>
          <div id="sectionMS" class="tab-pane fade">
            <div class="row">
               <?php $fspeed4=1; if(count($ntos)>0){    
                foreach($ntos as $ntosRs){ ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12" >
                  <a href="<?=base_url('artists/details/'.$ntosRs['id'].'/'.$this->common->create_slug(stripslashes($ntosRs['first_name'].' '.$ntosRs['last_name'])))?>">
                 <? if($fspeed4>7){$fspeed4=1;}?>
					<div class="artist-img-blog block animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.<? echo $fspeed4;?>s" >
                    <div class="tumb-img">
                      <!--<img src="<?=base_url()?>uploads/artist-gallery/original/<?=$ntosRs['image_name']?>" alt="">-->
                      <img src="<?=base_url()?>uploads/user_profile_pic/<?=$ntosRs['profile_pic']?>" alt="">
                    <div class="overlay"></div>
                    </div>
                   <p class="colour-black"><?=stripslashes($ntosRs['first_name'].' '.$ntosRs['last_name'])?></p>
                  </div>
                </a><?php $fspeed4+=2; ?>
                </div>
              <?php } } ?>
             </div>
            </div>
            <div id="sectionSZ" class="tab-pane fade">
              <div class="row">
                 <?php $fspeed5=1; if(count($ttoz)>0){    
                foreach($ttoz as $ttozRs){ ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12" >
                  <a href="<?=base_url('artists/details/'.$ttozRs['id'].'/'.$this->common->create_slug(stripslashes($ttozRs['first_name'].' '.$ttozRs['last_name'])))?>">
                  <? if($fspeed5>7){$fspeed5=1;}?>
					<div class="artist-img-blog block animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.<? echo $fspeed5;?>s" >
                    <div class="tumb-img"> 
                        <!--<img src="<?=base_url()?>uploads/artist-gallery/original/<?=$ttozRs['image_name']?>" alt="">-->
                        <img src="<?=base_url()?>uploads/user_profile_pic/<?=$ttozRs['profile_pic']?>" alt="">
                    </div>
                    <p class="colour-black"><?=stripslashes($ttozRs['first_name'].' '.$ttozRs['last_name'])?></p>
                  </div>
                </a><?php $fspeed5+=2;  ?>
                </div>
                <?php }} ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php N2Native::beforeClosingBody(); ?>
<?php $this->load->view('mainsite/artist_common_section');?>
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
