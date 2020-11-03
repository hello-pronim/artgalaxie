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
<? $this->load->view('mainsite/common/header');?>
<!-- Page Content -->
<div class="gallery-page-in ">
  <div class="section bg-white z-index2 posit-relative" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div >
        <h2 class="section-header color-000 text-center section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
        <div class="text text-center color-000 video-txt" data-aos="fade-up" data-aos-once="true" >
          <p><?=nl2br(stripslashes($cmsData['page_desc']))?></p>
        </div>
        <div class="blog-page-menus">
          <div class="menus">
           <div class="bs-example">
           <nav id="myNavbar" class="navbar navbar-default blog-nav" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <? $this->load->view('mainsite/blog_fileter_navigation'); ?>
        </div>
    </nav>
</div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="blog-sect">
    <div class="blog-banner" data-aos="fade-up" data-aos-once="true">
      <img src="<?=base_url()?>uploads/blog/<?=$blogImages['image1']?>" alt="<?=$blogImages['image1']?>"/> </div>
    <div class="middle-tab-section-bg blog-sect-heding dark-shadwoand-bot-border">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        11<h2 class="section-header color-b77f1d"><?=ucfirst(@$blog_title)?></h2>
      </div>
    </div>
    <div class="sliderbot-sect bg-b77f1d-hex">&nbsp;</div>
    <div class=" section bg-whiteimportant">
      <div class="blog-boxes">
        <div class="container">
          <div class="row">
            <?php 
            if(!empty($featuredBlog)){
            $com = new common();
            foreach ($featuredBlog as $featuredBlogRs) { 
                  $totalCount =  $com->getTotalLikeForBlog($featuredBlogRs['id']);
                  $isILiked =  $com->isLikedBlog($mem_id,$featuredBlogRs['id']);
                  $isSaved =  $com->isSavedBlog($mem_id,$featuredBlogRs['id']);
            ?>
            <div class="col-sm-4 blog-bock" data-aos="fade-up" data-aos-once="true">
              <div class="blog-in">
                  <a href="<?=site_url('blog/detail/'.$featuredBlogRs['id'].'/'.$com->create_slug($featuredBlogRs['blog_title']))?>">
                <div class="blog-img">
                  <?php if($featuredBlogRs['blog_image']!=''){ ?>
                  <img src="<?=base_url()?>uploads/blog/<?=stripslashes($featuredBlogRs['blog_image'])?>" alt="<?=stripslashes($featuredBlogRs['blog_image'])?>"/>
                  <?php }else{ ?>
                  <img src="<?=base_url()?>front_assets/images/no-blog-image.jpg" alt="blog-box-img.png"/>
                    <?php } ?>
                </div>
				<?php $newstring = substr($featuredBlogRs['cat_id'], -3); $auId = str_replace(",","",$newstring); ?>
                <div class="blog-box-title"><?=$com->cut(stripslashes($featuredBlogRs['blog_title']),40)?></a><br>
                    <a href="<?=site_url('blog/filter/'.$auId.'/'.$com->create_slug($featuredBlogRs['added_by']))?>">
					<span>by <?=$com->cut(stripslashes($featuredBlogRs['added_by']),20)?></span></a></div>
                <a href="<?=site_url('blog/detail/'.$featuredBlogRs['id'].'/'.$com->create_slug($featuredBlogRs['blog_title']))?>">
				<div class="blog-shot-disc"><?=stripslashes($featuredBlogRs['short_description'])?></div>
                <div class="blog-box-foot"><span class="pull-left"><?=date('F d,Y',strtotime($featuredBlogRs['added_date']))?></span><span class="pull-right">Continue Reading</span></div></a>
                <div class="blog-share dropup">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default" aria-label="Justify" id="like-count-<?=$featuredBlogRs['id']?>"><?=stripslashes($totalCount)?></button>
                    <?php if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align"  <?php if($isILiked==0){ ?> onclick="javascript : likeBlog(<?=$featuredBlogRs['id']?>,<?=$mem_id?>)" <?php } ?> id="liked-<?=$featuredBlogRs['id']?>" ><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <?php if($isILiked==0){ echo "Like"; }else{ echo "Liked"; } ?> </button>
                     <?php }else{ ?>
                     <a  class="btn btn-default" aria-label="Left Align" href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span>Like</a>
                     <?php } ?>
                  </div>
                  <div class="btn-group">
                   <?php if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align" <?php if($isSaved==0){ ?> onclick="javascript : savedAsDraft(<?=$featuredBlogRs['id']?>,<?=$mem_id?>)" <?php } ?> id="saved-<?=$featuredBlogRs['id']?>"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span><?php if($isSaved==0){ echo "Save for later"; }else{ echo "Saved"; } ?> </button>
                    <?php }else{ ?>
                    <a  class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> Save for later</a>
                    <?php } ?>
                  </div>
                  <div class="btn-group share-social-link">
                    <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Share </button>
                    <ul class="dropdown-menu">
                      <li><a class="facebook-profile" href="#" id="fb-share-<?=$featuredBlogRs['id']?>"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li>
                      <li><a class="pinterest-profile" href="#"  id="pinterest-share-<?=$featuredBlogRs['id']?>"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a></li>
                      <li><a class="twitter-profile" href="#" id="tweeter-share-<?=$featuredBlogRs['id']?>"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a></li>
                      <li><a class="google-plus-profile" href="#" id="gplus-share-<?=$featuredBlogRs['id']?>"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a></li>
                  </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php  } }else{?>

            <div class="col-sm-12 blog-bock" data-aos="fade-up" data-aos-once="true">
              <div class="blog-in">
                <div class="blog-box-title">No Record Found.</div>
              </div>
            </div>

            <?php } ?>
            </div>
          
        </div>
      </div>
    </div>
  </div>

</div>
<? $this->load->view('mainsite/common/footer');?>

<!-- Modal Please Login -->
<? $this->load->view('mainsite/blog_common_model');?>
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
    //$(this).next('ul').toggle();
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
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script>
<!-- Share on socila media -->
<script type="text/javascript">
<?php foreach($featuredBlog as $featuredBlogRs){ ?>

$("#tweeter-share-<?=$featuredBlogRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
 $("#fb-share-<?=$featuredBlogRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+encodeURIComponent(n)+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
  $("#gplus-share-<?=$featuredBlogRs['id']?>").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
  $("#pinterest-share-<?=$featuredBlogRs['id']?>").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});
<?php } ?>
 
</script>    

</body>
</html>