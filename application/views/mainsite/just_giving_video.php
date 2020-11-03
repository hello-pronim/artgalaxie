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
<link href="<?=base_url()?>front_assets/custom.css" rel="stylesheet"><!-- CSS from psd  31012017-->
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
<?php $this->load->view('mainsite/common/header');?>
<!-- Page Content -->
<div class="gallery-page-in ">
  <div class="section bg-white z-index2 posit-relative" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div >
        <h2 class="section-header color-000 text-center section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
        <div class="text text-center color-000 video-txt" data-aos="fade-up" data-aos-once="true" >
          <p><?=nl2br(stripslashes($cmsData['page_desc']))?></p>
        </div>

</div>
</div>
</div>
 <div class="section all-video-box" data-aos="fade-up" data-aos-once="true">
 
 <div class="item video-sort">
  <div class="container">
     <?php 
     if(!empty($videoDs))
     {
        foreach($videoDs as $video)
        {   
        ?>
        <h2 class="video-header" style="border-bottom: solid 2px #00599B;padding:0px 0;"><p> <?=stripslashes($video['first_name']." ".$video['last_name'])?></p></h2>
        <div class="slider artist-profile-slider artist-profile-video-slider">
            <ul class="slides">
                  <li> 
                  <?php
                    $url = $video['str_name'];
                    $curl = preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                    if($curl == '0')
                    {
                    ?>
                        <iframe id="ytplayer" type="text/html" width="100%" height="550px" src="<?=$video['str_name']?>>" frameborder="0"></iframe>
                    <?php
                    }
                    else
                    {
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                        $id = $matches[1];
                        $width = '100%';
                        $height = '550px';
                        ?>
                        <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
                        src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                        frameborder="0" allowfullscreen></iframe>
                    <?php
                    }
                    ?>
                  </li>
                   <div class="service-txt" style="color:white;"><p><?=stripslashes($video['giving_video_text'])?></p></div>
                 <div>
                <a href="<?=base_url('artists/details/'.$video['id'].'/'.$this->common->create_slug(stripslashes($video['first_name'].' '.$video['last_name'])))?>" class="package-red-btn"><center>View artist profile page</center></a>&emsp;
                </div>
            </ul> 
          <br>
        
        </div>
      <?php   
      }  
      } 
      ?>
    </div>
    </div>
   </div>
</div>
<?php $this->load->view('mainsite/common/footer');?>

<!-- Modal Please Login -->
<?php $this->load->view('mainsite/blog_common_model');?>
 <!-- Modal Please Login -->

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
    
    
    <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
   // $(this).next('ul').toggle();
	$parent_box = $(this).closest('.dropdown-submenu');
	$parent_box.siblings().find('.dropdown-menu').hide();
	$parent_box.find('.dropdown-menu').slideToggle(1000, 'swing');
  
    e.stopPropagation();
    e.preventDefault();
  });
  
   $('.dropdown-toggle').on("click", function(e){
     $('.dropdown-submenu a.test').next('ul').hide();
  
  });
  
});

</script>
<?php $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script>
<!-- Share on socila media -->
<script type="text/javascript">
<?php /*foreach($featuredBlog as $featuredBlogRs){ ?>

$("#tweeter-share-<?=$featuredBlogRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
 $("#fb-share-<?=$featuredBlogRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+encodeURIComponent(n)+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
  $("#gplus-share-<?=$featuredBlogRs['id']?>").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
  $("#pinterest-share-<?=$featuredBlogRs['id']?>").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});
<?php } ?>

<?php foreach($latestBlog as $latestBlogRs){ ?>
$("#tweeter-share-<?=$latestBlogRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
 $("#fb-share-<?=$latestBlogRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+encodeURIComponent(n)+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
  $("#gplus-share-<?=$latestBlogRs['id']?>").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
  $("#pinterest-share-<?=$latestBlogRs['id']?>").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});
<?php } ?>

<?php foreach($featuredBlog2 as $latestBlogRs){ ?>
$("#tweeter-share-<?=$latestBlogRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
 $("#fb-share-<?=$latestBlogRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+encodeURIComponent(n)+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
  $("#gplus-share-<?=$latestBlogRs['id']?>").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
  $("#pinterest-share-<?=$latestBlogRs['id']?>").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});
<?php }*/ ?>
</script>    

</body>
</html>