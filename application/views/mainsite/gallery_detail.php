<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="<?=stripslashes($cmsData['meta_description'])?>">
<meta name="keywords" content="<?=stripslashes($cmsData['meta_keyword'])?>">
<meta name="author" content=""> 
<title><?=SITENAME?> - <?=stripslashes($cmsData['meta_title'])?> </title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/custom.css" rel="stylesheet"> <!-- PSD css 31st jan 2017 -->
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
    

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

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
      <?php $p=0; foreach($galleryView as $sliderDataRs){  ?>
      <div class="item  <?php if($p==0){ ?> active  <?php } ?> ">
        <div class="fill">
        <?php if($sliderDataRs['type']=='video'){ ?>
         <video height="100%" width="100%" controls>
            <source src="<?=base_url()?>uploads/regionwise_galleries/<?=$sliderDataRs['str_name']?>" type="video/mp4">
        </video>
        <?php }else if($sliderDataRs['type']=='image'){ ?>
        <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$sliderDataRs["str_name"]?>" alt="<?=$sliderDataRs["str_name"]?>"/>
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
  </div>
<?php }  ?>
<!-- Page Content -->

<div class="gallery-page-in "> 
  
  <!--page midd Content-->
  <div class="section listartist-section dark-shadwoand-bot-border bg-color-ocar bord-none z-index2" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc">
        <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($galleryDetails['cat_name'])?>
          <div class="sm-txt"><?=stripslashes($galleryDetails['sub_name'])?></div> </h2>
        <div class="text text-center color-fff video-txt" data-aos="fade-up" data-aos-once="true" >
          <?=stripslashes($galleryDetails['short_description'])?></div>
      </div>
    </div>
  </div>
  <?php if ($galleryDetails['representation_desc'] != '') { ?>
  <div class="ocar-box-btn  z-index1">
    <div data-aos-once="true" data-aos="fade-up" class="text-center"><a class="dark-gray-btn" href="#res_desc"><span class="lt"></span><span class="large-btn">Representation Program</span><span class="rt"></span></a></div>
  </div>
  <?php } ?>
  <!--page midd Content End--> 
  
  <!--Exibition Pakages-->
  <div class="exibition-packages mapsection">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <h3>Gallery Location</h3>
      <div data-aos="fade-up" data-aos-once="true"><?=stripslashes($galleryDetails['location_description'])?></div>
      <div class="map" data-aos="fade-up" data-aos-once="true">
        <div class="embed-responsive embed-responsive-16by9 ">
        <iframe src="<?php echo html_entity_decode($galleryDetails['google_map']); ?>"></iframe>
        </div>
      </div>
    </div>
  </div>
  <!--Exibition Pakages End-->
  <div class="sliderbot-sect  z-index1">&nbsp;</div>
  <!--Pakeges Heading-->
  <div class="middle-tab-section-bg dark-gray-bg">
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <h3><?=stripslashes($galleryDetails['cat_name'])?> Floor Plan</h3>
    </div>
  </div>
  <!--Pakeges Heading end--> 
  
  <?php if($galleryDetails['floor_plan_image']!=''){ ?>
  <!--Pakeges Info-->
  <div class="bg-white bottom-shadow"> <br>
    <br>
    <br>
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="build-graph-img text-center">
        <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$galleryDetails['floor_plan_image']?>" alt="<?=$galleryDetails['floor_plan_image']?>"/> </div>
      <br>
      <br>
      <br>
    </div>
  </div>
  <?php } ?>
  <div class="sliderbot-sect  z-index1">&nbsp;</div>
  <?php if(!empty($photoGalleryExists)){ ?>
  <div class="bot-shadow">
    <div class="section section-artist-block ">
      <div class="container" >
        <h2 data-aos="fade-up"  data-aos-once="true" data-aos-delay="1000" data-aos-easing="ease" class="section-header text-center color-arange">Inside <?=stripslashes($galleryDetails['cat_name'])?><br>
        </h2>
        <div class="top-slider" data-aos="fade-up" data-aos-delay="1000" data-aos-easing="ease"  data-aos-once="true">
          <div class="box-shadow-block">
            <div id="myCarousel1" class="carousel slide carousel-fade lg-arrow" > <!-- Indicators --> 
             
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <?php 
                $i=0;
                foreach($photoGalleryExists as $photoGalleryExistsRs){ $i++; ?>
                <div class="item <?php if($i==1){ ?>active <?php } ?>">
                  <div class="fill" style="height:auto;">
                    <img  src="<?=base_url()?>uploads/regionwise_galleries/<?=$photoGalleryExistsRs['image_name']?>" alt="<?=$photoGalleryExistsRs['image_name']?>"/></div>
                </div>
                <?php } } ?>
                
              </div>
              <!-- Controls --> 
              <a class="left carousel-control" href="#myCarousel1" data-slide="prev"> <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-left-arow.png" alt=""/></span></span> </a> <a class="right carousel-control" href="#myCarousel1" data-slide="next"> <span class="v-align"> <span><img src="<?=base_url()?>front_assets/images/slider-right-arow.png" alt=""/></span></span> </a>
              
              </div>
          </div>
        </div>
        <br>
        <br>
      </div>
    </div>
  </div>
   <div class="sliderbot-sect  z-index1">&nbsp;</div>
      <div class="bg-white bottom-shadow">
    <div class="container" data-aos="fade-up" data-aos-once="true"><br><br>
     <h2 data-aos="fade-up"  data-aos-once="true" data-aos-delay="1000" data-aos-easing="ease" class="section-header text-center color-arange">Represented Artists<br>
        </h2>
    <div class="row" style="padding-bottom:50px;">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="tab-content">
  <div class="row">
                <?php if($galleryDetails['floor_plan_image']!=''){ 
                $artist_name = explode(",",$galleryDetails['artist_name']);
                $artist_link = explode(",",$galleryDetails['thumbnail_link']);
                $artist_thumb = explode(",",$galleryDetails['thumbnail_image']);
                $artist_chk = explode(",",$galleryDetails['chk_status']);
                for($i=0;$i<count($artist_name);$i++) {
                ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12"  data-aos="fade-up" data-aos-once="true" >
                    <?php if($artist_chk[$i] == 1){ ?>    
                     <a href="<?=$artist_link[$i]?>">
                    <?php } ?>
                        <div class="artist-img-blog">
                            <div class="tumb-img">
                                <?php if($artist_thumb[$i]=="") { ?>
                                    <img src="<?=base_url()?>/uploads/user-profile-pic.jpeg" alt="<?=$artist_name[$i]?>">
                                <?php } else { ?>
                                    <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$artist_thumb[$i]?>" alt="<?=$artist_name[$i]?>">
                                <?php } ?>
                                <div class="overlay"></div>
                            </div>
                            <p class="colour-black"><?=$artist_name[$i]?></p>
                        </div>
                    <?php if($artist_chk[$i] == 1){  ?>    
                     </a>
                    <?php } ?>
                </div>
              <?php } }  ?>
  </div> </div></div></div></div></div>
  <div class="green-box-btn  z-index1">
    <div data-aos-once="true" data-aos="fade-up" class="text-center aos-init aos-animate">
        <a class="dark-gray-btn personal_art_book_enquiry return-to-galleries-link" href="/galleries.html">
            <span class="return-to-galleries">Return to Galleries</span>
        </a></div>
  </div>
  
  
  <!-- ARTIST NAMES -->
  <?php /* ?>
  <div class="sliderbot-sect  z-index1">&nbsp;</div>
    <div class="bg-white bottom-shadow">
    <div class="container" data-aos="fade-up" data-aos-once="true"><br><br>
     <h2 data-aos="fade-up"  data-aos-once="true" data-aos-delay="1000" data-aos-easing="ease" class="section-header text-center color-arange">Represented Artists<br>
        </h2>
	<div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="tab-content">
			<div class="row">
				<?php 
				$usersd = explode(",",$galleryDetails['artist_names']);
				$com = new Common();
				
				foreach($usersd as $userds){ 
					$userdetails = $com->getUserDetails($userds);
				?>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12"  data-aos="fade-up" data-aos-once="true" >
					  <a href="<?=base_url()?>artists/details/<?php echo $userdetails['id'] ."/". $userdetails['username'] ?>">
						<div class="artist-img-blog">
						<div class="tumb-img">
						  <img src="<?=base_url()?>uploads/user_profile_pic/<?=$userdetails['profile_pic']?>" alt="<?=$userdetails['profile_pic']?>">
						<div class="overlay"></div>
						</div>
						<p class="colour-black"><?=stripslashes($userdetails['first_name']." ".$userdetails['last_name'])?></p>
					  </div></a>
					</div>
				<?php }  ?>
			</div> 
		</div>
	   </div>
	</div>
	</div>
	</div>
  <?php */ ?>
  
  
   <div class="sliderbot-sect  z-index1">&nbsp;</div>
	<?php if($galleryDetails['representation_desc'] != '' || $galleryDetails['representation_desc'] != NULL) { ?>
   
      <div class="bg-white bottom-shadow" id="res_desc">
    <div class="container" data-aos="fade-up" data-aos-once="true"><br><br>
     <h2 data-aos="fade-up"  data-aos-once="true" data-aos-delay="1000" data-aos-easing="ease" class="section-header text-center color-arange">Representation Program<br>
        </h2>
      <div data-aos="fade-up" data-aos-once="true" style="font-size:20px;"><b></b><?=stripslashes($galleryDetails['representation_desc'])?></b></div><br>
     
      
  <?php if($galleryDetails['representation_image']!=''){ ?>
  <!--Pakeges Info-->
      <div class="build-graph-img text-center">
        <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$galleryDetails['representation_image']?>" alt="<?=$galleryDetails['representation_image']?>"/> </div>
      <br>
      <br>
      <br>
 </div><div></div>
  <?php } ?>
     
      </div>
	  
	<?php } ?> 
	  
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
 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script> 
<script src="js/jquery.mixitup.min.js"></script> 
<script type="text/javascript">
$(function(){
  /*$('#portfolio').mixitup({
    targetSelector: '.item',
    transitionSpeed: 450
  });*/
});
</script> 
 
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
     
</body>
</html>
