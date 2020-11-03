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
<link href="<?=base_url()?>front_assets/custom.css" rel="stylesheet"> <!-- CSS from psd  31012017-->
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
</head>

<body>
<? $this->load->view('mainsite/common/header');?>
<!-- Page Content -->

<div class="gallery-page-in ">
<? $this->load->view('mainsite/marketing-comnmon-cms-section');?>
  <div class="marketing-section">
    <div class="container">
      <div class="market-icon-boxes" data-aos="fade-up" data-aos-once="true">
         <? $this->load->view('mainsite/marketing-common-navigarion-section');?>
      </div>
      <div class="load-section"></div>
      <div class="marketingsection dig-mrt-boxes">
      <div class="marketstrategy-content markt-box-bg1">
        <div class="market-strategy-img" data-aos="fade-up" data-aos-once="true">
        <img src="<?=base_url()?>uploads/art_marketing/<?=$section1['banner_image']?>" alt="<?=$section1['banner_image']?>"/></div>
        <div class="marketst-txt" data-aos="fade-up" data-aos-once="true">
          <h2><?=stripslashes($section1['sub_title'])?></h2>
          <h4><?=stripslashes($section1['sub_sub_titile'])?></h4>
          <div class="mrkt-txt">
            <p><?=nl2br(stripslashes($section1['description']))?></p>
          </div>
        </div>
        <div class="mrt-content-boxes">
          <div class="row">
            <?php $m=0; foreach($marketing_boxes1 as $marketing_boxesRs){ $m++; ?>				
            <div class="col-sm-4">
              <div class="mrt-content-box box-color<?=$m?>" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                 <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxesRs['box_image']?>" alt="<?=$marketing_boxesRs['box_image']?>"/> </div>
                <div class="mrt-box-txt">
                  <h4><?=stripslashes($marketing_boxesRs['title'])?></h4>
                  <p><?=nl2br(stripslashes($marketing_boxesRs['description']))?></p>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- Section 2 -->
      <div class="marketstrategy-content marketstrategy-content2">
        <div class="market-strategy-img " data-aos="fade-up" data-aos-once="true">
        <img  src="<?=base_url()?>uploads/art_marketing/<?=$section2['banner_image']?>" alt="<?=$section2['banner_image']?>"/></div>
        <div class="marketst-txt" data-aos="fade-up" data-aos-once="true">
         <h2><?=stripslashes($section2['sub_title'])?></h2>
         <h4><?=stripslashes($section2['sub_sub_titile'])?></h4>
          <div class="mrkt-txt">
            <p><?=nl2br(stripslashes($section2['description']))?></p>
          </div>
        </div>
        <div class="mrt-content-boxes">
          <div class="row">
            <?php $m2=0; $m22=3; foreach($marketing_boxes2 as $marketing_boxes2Rs){ $m2++; $m22++; ?>
            <div class="col-sm-4">
              <div class="mrt-content-box box-color<?=$m22?> mrt-box1" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes2Rs['box_image']?>" alt="<?=$marketing_boxes2Rs['box_image']?>"/> </div>
                <div class="mrt-box-txt">
                 <h4><?=stripslashes($marketing_boxes2Rs['title'])?></h4>
                  <p><?=nl2br(stripslashes($marketing_boxes2Rs['description']))?></p>
                </div>
              </div>
            </div>
            <?php } ?>
         </div>
        </div>
      </div>
      <!-- Section 3 -->
      <div class="marketstrategy-content marketstrategy-content3">
        <div class="market-strategy-img" data-aos="fade-up" data-aos-once="true">
          <img src="<?=base_url()?>uploads/art_marketing/<?=$section3['banner_image']?>" alt="<?=$section3['banner_image']?>"/>
        </div>
        <div class="marketst-txt" data-aos="fade-up" data-aos-once="true">
         <h2><?=stripslashes($section3['sub_title'])?></h2>		 <h4><?=stripslashes($section3['sub_sub_titile'])?></h4>
         <div class="mrkt-txt">
            <p><?=nl2br(stripslashes($section3['description']))?></p>
          </div>
        </div>
        <div class="mrt-content-boxes">
          <div class="row">
             <?php $m3=0; $m33=6; foreach($marketing_boxes3 as $marketing_boxes3Rs){ $m3++; $m33++; ?>
            <div class="col-sm-4">
              <div class="mrt-content-box box-color<?=$m33?> mrt-box3" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes3Rs['box_image']?>" alt="<?=$marketing_boxes3Rs['box_image']?>"/> </div>
                <div class="mrt-box-txt">
                 <h4><?=stripslashes($marketing_boxes3Rs['title'])?></h4>
                  <p><?=nl2br(stripslashes($marketing_boxes3Rs['description']))?></p>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<? $this->load->view('mainsite/common/footer');?>


<!-- /.container --> 

<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<script src="<?=base_url()?>front_assets/js/art_marketing.js"></script> 

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
  disable: function() {
    // This weird line should return true for safari <= 5 and false for anything else
    // Based on http://browserhacks.com/
    return /a/.__proto__ == '//';
  }
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
  equalheight('.same-height .mrt-content-box');
});


$(window).resize(function(){
  equalheight('.same-height .mrt-content-box');
});


$(window).load(function() {
  equalheight('.same-height2 .mrt-content-box');
});


$(window).resize(function(){
  equalheight('.same-height2 .mrt-content-box');
});

$(window).load(function() {
  equalheight('.same-height3 .mrt-content-box');
});


$(window).resize(function(){
  equalheight('.same-height3 .mrt-content-box');
});

$(window).load(function() {
  equalheight('.same-height4 .mrt-content-box');
});


$(window).resize(function(){
  equalheight('.same-height4 .mrt-content-box');
});
  
  </script>
  <?php $this->load->view('mainsite/common/login-registration-common-js'); ?>

</body>
</html>
