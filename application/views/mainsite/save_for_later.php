<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('mainsite/common/top-artist-profile');?>
<body>
<?php $this->load->view('mainsite/common/header'); ?>
<div class="gallery-page-in about myartwork">
<div class="top-shadow">
    <div class="listartist-section dark-shadwoand-bot-border bord-none top-title">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-once="true">
        <div class="vedio-page-disc top-dis">
          <h2 class="section-header text-center color-fff section-header-large">My Saved For Later</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!--<div class="section bg-whiteimportant saveforlater">-->
<div class="bg-whiteimportant saveforlater">
      <div class="blog-boxes">
        <div class="container">
          <div class="row">
                  
                <?php 
               
                if($artistBlogsaveList=='' or empty($artistBlogsaveList))
                {
                ?>
                    <div class="norecord nofav">
                        No Articles Saved
                    </div>
                <?php
                }
                else
                {
                ?>
                    <?php $com = new common();
            foreach ($artistBlogsaveList as $featuredBlogRs) 
            { 
                  $com = new common();
                  $totalCount =  $com->getTotalLikeForBlog($featuredBlogRs['blog_id']);
                  $isILiked =  $com->isLikedBlog($mem_id,$featuredBlogRs['blog_id']);
                  $isSaved =  $com->isSavedBlog($mem_id,$featuredBlogRs['blog_id']);
                  
                  //echo "<pre>";
                  //print_r($featuredBlogRs);
                  
            ?>
            <div class="col-sm-4 blog-bock" data-aos="fade-up" data-aos-once="true">
              <div class="blog-in">
              <a href="<?=site_url('blog/detail/'.$featuredBlogRs['blog_id'].'/'.$com->create_slug($featuredBlogRs['blog_title']))?>">
				<div class="blog-img">
					<?php if($featuredBlogRs['blog_image']!=''){ ?>
					<img src="<?=base_url()?>uploads/blog/<?=stripslashes($featuredBlogRs['blog_image'])?>" alt="<?=stripslashes($featuredBlogRs['blog_image'])?>"/>
					<?php }else{ ?>
					<img src="<?=base_url()?>front_assets/images/no-blog-image.jpg" alt="blog-box-img.png"/>
					<?php } ?>
				</div>
				<?php $newstring = substr($featuredBlogRs['cat_id'], -3); $auId = str_replace(",","",$newstring); ?>
				<div class="blog-box-title"><?=$com->cut(stripslashes($featuredBlogRs['blog_title']),40)?></a><br>
					<a href="<?=site_url('blog/filter/'.$auId.'/'.$com->create_slug($featuredBlogRs['added_by']))?>"><span>by <?=$com->cut(stripslashes($featuredBlogRs['added_by']),20)?></span></a>
				</div>
				
				<div class="blog-shot-disc"><?=stripslashes($featuredBlogRs['short_description'])?>
				</div>
				<div class="blog-box-foot"><span class="pull-left"><?=date('F d,Y',strtotime($featuredBlogRs['added_date']))?></span>
					<span class="pull-right"><a href="<?=site_url('blog/detail/'.$featuredBlogRs['blog_id'].'/'.$com->create_slug($featuredBlogRs['blog_title']))?>">Continue Reading</a></span>
				</div>
			 
                <div class="blog-share dropup">
                  <div class="btn-group">
                    
                    <button type="button" class="btn btn-default" aria-label="Justify" id="like-count-<?=$featuredBlogRs['blog_id']?>"><?=stripslashes($totalCount)?></button>
                    
                    <button type="button" class="btn btn-default" aria-label="Left Align"  <?php if($isILiked==0){ ?> onclick="javascript : likeBlog(<?=$featuredBlogRs['blog_id']?>,<?=$mem_id?>)" <?php } ?> id="liked-<?=$featuredBlogRs['blog_id']?>" ><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <?php if($isILiked==0){ echo "Like"; }else{ echo "Liked"; } ?> </button>
                     
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-default" aria-label="Left Align" onclick="javascript : removedSaved(<?=$featuredBlogRs['blog_id']?>,<?=$mem_id?>)" id="saved-<?=$featuredBlogRs['blog_id']?>">Remove
                    </button>
                  </div>
                  <div class="btn-group share-social-link">
                    <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Share </button>
                    <?php
                    $title  =   urlencode($featuredBlogRs['blog_title']);
                    $url    =   urlencode(site_url('blog/detail/'.$featuredBlogRs['id'].'/'.$com->create_slug($featuredBlogRs['blog_title'])));
                    $summary=   urlencode($featuredBlogRs['short_description']);
                    $image  =   urlencode(base_url().'uploads/blog/'.stripslashes($featuredBlogRs['blog_image']));
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
            <?php  } ?>
                    
                <?php
                }    
                ?>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('mainsite/common/footer'); ?>

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
<?php foreach($artistBlogsaveList as $featuredBlogRs)
{ 
?>

    $("#tweeter-share-<?=$featuredBlogRs['blog_id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
    $("#fb-share-<?=$featuredBlogRs['blog_id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+encodeURIComponent(n)+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
    $("#gplus-share-<?=$featuredBlogRs['blog_id']?>").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
    $("#pinterest-share-<?=$featuredBlogRs['blog_id']?>").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});

<?php
} 
?>

</script>   
  </body>
</html>