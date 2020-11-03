<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?=stripslashes($cmsData['meta_description'])?>">
<meta name="keywords" content="<?=stripslashes($cmsData['meta_keyword'])?>">
<meta name="author" content=""> 
<title><?=SITENAME?> - <?=stripslashes($cmsData['meta_title'])?> - <?=stripslashes($blogDetail['blog_title'])?> </title>
<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/custom24022017.css" rel="stylesheet"><!-- CSS from psd  24022017-->
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

<body>
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
<?php $com = new common(); ?>
<!-- Page Content -->

<div class="blog-single ">
  
  <div class="blog-sect">
    <div class="blog-banner-single" data-aos="fade-up" data-aos-once="true">
      <?php if($blogDetail['blog_detail_image']!='') { ?> 
      <img src="<?=base_url()?>uploads/blog/<?=$blogDetail['blog_detail_image']?>" alt="<?=$blogDetail['blog_detail_image']?>"/> 
      <?php }else{ ?>
      <img src="<?=base_url()?>front_assets/images/blog-page-img.png" alt="blog-page-img.png"/> 
      <?php } ?>
    </div>
    <div class="section bg-white z-index2 posit-relative" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div >
        <h2 class="section-header color-000 text-center section-header-large"><?=stripslashes($blogDetail['blog_title'])?></h2>
        <div class="text color-000 video-txt" data-aos="fade-up" data-aos-once="true" >
          <p><?=stripslashes($blogDetail['long_description'])?></p>
        </div>
        <div class="blog-share dropup text-right">
        <div class="btn-group">
          <button type="button" class="btn btn-default" aria-label="Justify" id="like-count-<?=$id?>"><?=stripslashes($totalCount)?></button>

         <?php if($this->session->userdata('CUST_ID')!=""){ ?>
          <button type="button" class="btn btn-default" aria-label="Left Align"  <?php if($isILiked==0){ ?> onclick="javascript : likeBlog(<?=$id?>,<?=$mem_id?>)" <?php } ?> id="liked-<?=$id?>" ><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <?php if($isILiked==0){ echo "Like"; }else{ echo "Liked"; } ?> </button>
           <?php }else{ ?>
           <a  class="btn btn-default" aria-label="Left Align" href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span>Like</a>
           <?php } ?>
          <div class="btn-group">
                   <?php 
                    $com = new common();
                     $totalCount2 =  $com->getTotalLikeForBlog($blogDetail['id']);
                     $isILiked2 =  $com->isLikedBlog($mem_id,$blogDetail['id']);
                     $isSaved2 =  $com->isSavedBlog($mem_id,$blogDetail['id']);
                   if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align" <?php if($isSaved2==0){ ?> onclick="javascript : savedAsDraft(<?=$blogDetail['id']?>,<?=$mem_id?>)" <?php } ?> id="saved-<?=$blogDetail['id']?>"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span><?php if($isSaved2==0){ echo "Save for later"; }else{ echo "Saved"; } ?> </button>
                    <?php }else{ ?>
                    <a  class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> Save for later</a>
                    <?php } ?>
                  </div>
                  <div class="btn-group share-social-link">
                    
                               <div class="btn-group share-social-link">
                               <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>&nbsp; &nbsp;Share </button>
                                    
                                    <?php
                                    $title  =   urlencode($blogDetail['blog_title']);
                                    $url    =   urlencode(site_url('blog/detail/'.$blogDetail['id'].'/'.$com->create_slug($blogDetail['blog_title'])));
                                    $summary=   urlencode($blogDetail['short_description']);
                                    $image  =   urlencode(base_url().'uploads/blog/'.stripslashes($blogDetail['blog_detail_image']));
                                    ?>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
                                        </li>
                                        
                                        <li>
                                            <a onClick="window.open('http://twitter.com/share?text=<?php echo $summary;?>&url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>
                                        </li>
                                        
                                        <li>
                                            <a onClick="window.open('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $image;?>&url=<?php echo $url;?>&is_video=false&description=<?php echo $summary;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a>
                                        </li>
                                        
                                        <li>
                                            <a onClick="window.open('https://plus.google.com/share?url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a>
                                        </li>
                                  </ul>
                                  </div>
                  </div>
        </div>
        
        </div>
      </div>
    </div>
  </div>
 </div>
 <div class="middle-tab-section-bg blog-sect-heding sigl-blog-btn-block">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="blog-btn-box text-center">
        <?php if(!empty($blogPrevious)){ ?>
        <a class="view-detail-btn" href="<?=site_url('blog/detail/'.$blogPrevious['id'].'/'.$com->create_slug($blogPrevious['blog_title']))?>">Previous</a>
        <?php } ?>
        <a class="view-detail-btn view-detail-btn2" href="<?=site_url('blog')?>">Main Page</a>
        <?php if(!empty($blogNext)){ ?>
        <a class="view-detail-btn" href="<?=site_url('blog/detail/'.$blogNext['id'].'/'.$com->create_slug($blogNext['blog_title']))?>" >Next</a>
        <?php } ?>
        </div>
      </div>
    </div>
      <div class="sliderbot-sect bg-4a99b1-hex">&nbsp;</div>
      <div class="comments-block" >
      <div class="container blog-commnts"  data-aos="fade-up" data-aos-once="true">
        <?php if(!empty($blogComments)){ ?>
        <div class="blog-comt-box">
          <h2>Comments</h2>
          <div class="commnt-list">
           <?php 
            $count = count($blogComments);
            $cnt=0;
            foreach($blogComments as $blogCommentsRs){ $cnt++;  ?>
              <div class="commnt-box <?php if($cnt==$count){ ?> commntlast <?php } ?>">
              <div class="user-pic img-circle-img-circle">
                <?php if($blogCommentsRs['profile_pic']!=''){ ?>
                <img src="<?=base_url()?>uploads/user_profile_pic/<?=$blogCommentsRs['profile_pic']?>" alt="<?=$blogCommentsRs['profile_pic']?>"/>
                <?php }else{ ?>
                 <img src="<?=base_url()?>front_assets/images/no-profile-image-small.jpg" alt="no-profile-image-small.jpg"/>
                <?php } ?>
              </div>
              <div class="comnt-txt">
              <div class="user-name"><?=stripslashes($blogCommentsRs['first_name'].' '.$blogCommentsRs['last_name'])?>  /
               <? $current = strtotime(date("Y-m-d"));
                 $date    = strtotime($blogCommentsRs['added_date']);
                 $datediff = $date - $current;
                 $difference = floor($datediff/(60*60*24));

                 if($difference==0)
                 {
                    echo date('h:i a',$date).' today';
                 }
                 else if($difference > 0)
                 {
                    echo 'tomarrow';
                 } else if($difference < -1)
                 {
                    echo date('d M, y',$date);
                 }else
                 {
                    echo 'Yesterday';
                 } ?>   </div>
              <div class="user-txt"><?=stripslashes($blogCommentsRs['comment'])?></div>
              </div>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>

      <div class="section listartist-section">
       <h2 style="color:#fff"> Leave a comment</h2>
      <form>
      <div id="blog-comment-area">

      <div class="commnt-textaria">
         <div id="msg" class="text-center"></div>
      <textarea placeholder="Write your comment here." name="blog_comments" id="blog_comments"></textarea>
      </div>
      <div class="cmnts-btn text-center">
      <?php if($this->session->userdata('CUST_ID')!=""){ ?>
       <a class="view-detail-btn" href="javascript:void(0)" onClick="javascript: post_comments(<?=$id?>);" >Post Comment</a>
       <?php }else{ ?>
       <a class="view-detail-btn view-detail-btn2" href="#"  data-toggle="modal" data-target="#myModal" >Post Comment</a>
       <?php } ?>
      </div>
      </div>
    </form>
 </div>
</div>
</div>
<div class="sliderbot-sect bg-4a99b1-hex">&nbsp;</div>
</div>


<? $this->load->view('mainsite/common/footer');?>

<!-- /.container --> 
<!-- Modal Please Login -->
<? $this->load->view('mainsite/blog_common_model');?>
 <!-- Modal Please Login -->
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
    $(this).next('ul').toggle();
  
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
</body>
</html>
