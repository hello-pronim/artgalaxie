<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Art Galaxie-  Categories</title>
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
<? $this->load->view('mainsite/common/header');?>
<!-- Page Content -->

<div class="section bg-white gallery-section">

  <div data-aos-once="true" data-aos="fade-up" class="aos-init aos-animate">
      <h2 data-aos-once="true" data-aos="fade-up" class="section-header text-center">Artistic Categories<br>
       
      </h2>
    </div>
  
    
  <div class="container" data-aos="zoom-in" data-aos-duration="3000">
    <div class="row two-by-two-gallery">
        <?php  
        if(!empty($gallery_cat))
        {   
            $i = 0; 
            $duration = 4000; 
            $count  = 0;
            foreach ($gallery_cat as $gallery_catRs) 
            {   
              $count++;  
              $i++;  
              $colour = $this->common->chooseColourClass($gallery_catRs['colour_type']);   
            ?>
                <div class="col-xs-6 col-xxs-12">
                  <a href="<?=site_url('categories_details')?>?id=<?php echo $gallery_catRs['cat_id'];?>">
                    <div class="artist-block <?php echo $colour; ?>" data-aos="zoom-in" data-aos-once="true" data-aos-duration="<?=$duration?>">
                        <div class="artist-img">
                            <span><img src="<?=base_url()?>uploads/galleries/<?=$gallery_catRs['image_name']?>" alt=""/></span>
                            <div class="overlay"></div>
                        </div>
                        <div class="artist-name"><?=ucfirst(stripslashes($gallery_catRs['cat_name']))?><br>
                        </div>
                    </div>
                  </a> 
                </div>
                <?php if( $count%2 == 0)
                {
                  $duration = $duration+$duration;
                }
                if($i>=9)
                {  
                    $i =0;
                }
            }   
        }  
        ?>
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

<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 

<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script>
<? $this->load->view('mainsite/common/login-registration-common-js');?>
</body>
</html>
