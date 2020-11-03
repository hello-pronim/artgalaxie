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
        <div class="row">
          <?php foreach($navigationDs as $navigationRs){ ?>
          <div class="col-sm-4">
          <a <?php if($navigationRs['id']==1){ ?> href="<?=site_url('marketing-and-advertising')?>" <?php }else if($navigationRs['id']==2){ ?> href="<?=site_url('digital-marketing')?>" <?php }else if($navigationRs['id']==3){ ?> href="<?=site_url('content-marketing')?>" <?php } ?>     <?php if($sub_act_id==$navigationRs['id']){ ?> class="active" <?php } ?>>
            <div class="market-icon-box">
              <div class="market-icon-box-in">
                <div class="market-icon-img"><span>
                  <img src="<?=base_url()?>uploads/art_marketing/<?=$navigationRs['icone_image']?>" alt=""/></span></div>
                <div class="market-box-txt"><?=$this->common->Cut(stripslashes($navigationRs['page_title']),25)?></div>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="marketstrategy-content">
        <div class="market-strategy-img" data-aos="fade-up" data-aos-once="true">
          <img  src="<?=base_url()?>uploads/art_marketing/<?=$section1['banner_image']?>" alt="<?=$section1['banner_image']?>"/></div>
        <div class="marketst-txt" data-aos="fade-up" data-aos-once="true">
          <h2 class="color3d1c9c"><?=stripslashes($section1['sub_title'])?></h2>
          <div class="mrkt-txt">
            <p><?=nl2br(stripslashes($section1['description']))?></p>
          </div>
        </div>
        <div class="mrt-content-boxes cnt-mrt-boxes">
          <div class="row">
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box1" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img"> 
                 <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes1[0]['box_image']?>" alt="<?=$marketing_boxes1[0]['box_image']?>"/> </div>
                <div class="mrt-box-txt">
                  <h4><?=stripslashes($marketing_boxes1[0]['title'])?></h4>
                  <p><?=nl2br(stripslashes($marketing_boxes1[0]['description']))?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box2" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                 <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes1[1]['box_image']?>" alt="<?=$marketing_boxes1[1]['box_image']?>"/> </div>
                <div class="mrt-box-txt">
                 <h4><?=stripslashes($marketing_boxes1[1]['title'])?></h4>
                 <p><?=nl2br(stripslashes($marketing_boxes1[1]['description']))?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box3" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                  <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes1[2]['box_image']?>" alt="<?=$marketing_boxes1[2]['box_image']?>"/>  </div>
                <div class="mrt-box-txt">
                <h4><?=stripslashes($marketing_boxes1[2]['title'])?></h4>
                 <p><?=nl2br(stripslashes($marketing_boxes1[2]['description']))?></p>
                </div>
              </div>
            </div>
          </div>
          <div class="space30"></div>
          <div class="row">
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box4" data-aos="fade-up" data-aos-once="true">
			  <div class="mrt-box-img">
                  <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes1[3]['box_image']?>" alt="<?=$marketing_boxes1[2]['box_image']?>"/>  </div>
              <div class="mrt-box-txt">
                 <h4><?=stripslashes($marketing_boxes1[3]['title'])?></h4>
                 <p><?=nl2br(stripslashes($marketing_boxes1[3]['description']))?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box5" data-aos="fade-up" data-aos-once="true">
			  <div class="mrt-box-img">
                  <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes1[4]['box_image']?>" alt="<?=$marketing_boxes1[2]['box_image']?>"/>  </div>
                <div class="mrt-box-txt">
                 <h4><?=stripslashes($marketing_boxes1[4]['title'])?></h4>
                 <p><?=nl2br(stripslashes($marketing_boxes1[4]['description']))?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box6" data-aos="fade-up" data-aos-once="true">
			  <div class="mrt-box-img">
                  <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes1[5]['box_image']?>" alt="<?=$marketing_boxes1[2]['box_image']?>"/>  </div>
                <div class="mrt-box-txt">
                 <h4><?=stripslashes($marketing_boxes1[5]['title'])?></h4>
                 <p><?=nl2br(stripslashes($marketing_boxes1[5]['description']))?></p>
                </div>
              </div>
            </div>
          </div>
           <div class="space30"></div>
           <div class="row">
            <div class="col-sm-12">
              <div class="mrt-content-box mrt-box7" data-aos="fade-up" data-aos-once="true">
               <div class="mrt-box-txt">
                   <h4><?=stripslashes($marketing_boxes1[6]['title'])?></h4>
                   <p><?=nl2br(stripslashes($marketing_boxes1[6]['description']))?></p>
                </div>
              </div>
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
     /* AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });*/
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
  equalheight('.mrt-content-box .mrt-box-txt');
});


$(window).resize(function(){
  equalheight('.mrt-content-box .mrt-box-txt');
});
  
</script>
<?php $this->load->view('mainsite/common/login-registration-common-js'); ?>
</body>
</html>