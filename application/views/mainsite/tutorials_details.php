<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Welcome</title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
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

<body >
  <? $this->load->view('mainsite/common/header');?>


<!--banner-->
<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container"> &nbsp; </div>
</div> 
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
  <!--<div class="art-coaching-bot-border light-shadwoand">&nbsp;</div>-->
  <div class="box-color-nine gestbook-leave-btn bot-shadow z-index2">
    <div data-aos-once="true" data-aos="fade-up" class="text-center"> <a class="dark-gray-btn" href="<?=site_url('tutorials_list')?>" ><span class="lt"></span><span class="large-btn">Back to Tutorials</span><span class="rt"></span></a></div>
  </div>
  <!--page midd Content End--> 
  
  <!--Exibition Pakages-->
  
  <div class="section xxexibition-packages xxguestbook-bg bg-white">
    <div class="container">
      <div class="row">
        <div class="col-md-7 col-sm-7 text-center">
          <div class="slider tutorial-individual-slider" data-aos="fade-up" data-aos-once="true">
            <div id="slider"> 
              <!-- Top part of the slider -->
              
              <div id="carousel-bounding-box">
                <div class="carousel slide carousel-fade" id="myCarousel"> 
                  <!-- Carousel items -->
                  <div class="carousel-inner ">
                   
                    <?php $i=0; foreach ($tutoImages as $tutoImagesRs){  ?>
                    <div class="<? if($i==0){ ?>active <?php } ?> item" data-slide-number="<?=$i?>"> 
                      <img src="<?=base_url()?>uploads/tutorials/<?=$tutoImagesRs['tut_image']?>"></div>  
                    <?php  $i++; } ?>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="carousel slide individual-slider-thum light-shadwoand" id="myCarousel" data-interval="false"> 
              <!-- Carousel items -->
              <div class="carousel-inner ">
                <div class="active item" >
                  <ul class="hide-bullets indivivdual-hide-bullets">
                  <?php  $j=0;
                   foreach ($tutoImages as $tutoImagesRs2){  ?>
                    <li class="col-xxs-2">
                      <a class="thumbnail" id="carousel-selector-<?=$j?>"> 
                        <img  src="<?=base_url()?>uploads/tutorials/<?=$tutoImagesRs2['tut_image']?>">
                      </a> 
                    </li>
                    <?php $j++; } ?>
                 
                    </ul>
                </div>
               
              </div>
            </div>
         
          </div>
        </div>
        <div class="col-md-5 col-sm-5">
          <div class="market-strategy-img tutorials-individual-blog">
            <h4><?=stripslashes($tutoRs['title'])?></h4>
            <?php if( ($tutoRs['duration_hour']!='' && $tutoRs['duration_hour']!=0) ||  ($tutoRs['duration_min']!='' && $tutoRs['duration_min']!=0)   || ($tutoRs['duration_sec']!='' && $tutoRs['duration_sec']!=0) ){ ?>
            <p><strong>Total Duration:
                  <? if($tutoRs['duration_hour']!='' && $tutoRs['duration_hour']!=0){  echo $tutoRs['duration_hour']." hour  "; } 
                     if($tutoRs['duration_min']!='' && $tutoRs['duration_min']!=0){  echo $tutoRs['duration_min']." min  "; } 
                     if($tutoRs['duration_sec']!='' && $tutoRs['duration_sec']!=0){  echo $tutoRs['duration_sec']." sec  "; } ?></strong></p>
            <?php } ?>
            <span class="individul-price-green"><?=CURRENCY?> <?=stripslashes($tutoRs['price'])?></span><br>
          <a class="tutorial-individual-buy-btn" href="#" data-toggle="modal" data-target="#myModal">Buy</a><br>
            <br>
            <p><?=stripslashes($tutoRs['description'])?></p>
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
        interval: 5000
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
 
<script type="text/javascript">
$(document).ready(function() {
    $('#myCarousel2').each(function(){
        $(this).carousel({
            pause: true,
            interval: false
        });
    });
});​
</script> 
 <script>
     jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
   </script>
 
</body>
</html>
