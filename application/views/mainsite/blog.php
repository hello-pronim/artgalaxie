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
<style>

    input::placeholder {
  color: white;
}
</style>
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

<!-- jQuery --> 
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
<?php $this->load->view('mainsite/common/header');?>
<!-- Page Content -->
<div class="gallery-page-in ">
  <div class="section bg-white z-index2 posit-relative" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div >
        <h2 class="section-header color-000 text-center section-header-large" style="color: #17818d!important;"><?=stripslashes($cmsData['page_title'])?></h2>
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
                       <?php $this->load->view('mainsite/blog_fileter_navigation'); ?>
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
        <h2 class="section-header color-b77f1d">Featured Articles</h2>
      </div>
    </div>
    <div class="sliderbot-sect bg-b77f1d-hex">&nbsp;</div>
    <div class=" section bg-whiteimportant">
      <div class="blog-boxes">
        <div class="container">
          <div class="row">
            <?php $com = new common();
            foreach ($featuredBlog as $featuredBlogRs) { 
                  $com = new common();
                    
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
				<div class="blog-box-title">
				    <?=$com->cut(stripslashes($featuredBlogRs['blog_title']),40)?><br>
					<a href="<?=site_url('blog/filter/'.$auId.'/'.$com->create_slug($featuredBlogRs['added_by']))?>"><span>by <?=$com->cut(stripslashes($featuredBlogRs['added_by']),20)?></span></a>
				</div>
				<a href="<?=site_url('blog/detail/'.$featuredBlogRs['id'].'/'.$com->create_slug($featuredBlogRs['blog_title']))?>">
				<div class="blog-shot-disc"><?=stripslashes($featuredBlogRs['short_description'])?>
				</div>
				<div class="blog-box-foot"><span class="pull-left"><?=date('F d,Y',strtotime($featuredBlogRs['added_date']))?></span>
					<span class="pull-right">Continue Reading</span>
				</div>
			 </a>
                <div class="blog-share dropup" style="height:34px;">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default" aria-label="Justify" id="like-count-<?=$featuredBlogRs['id']?>"><span><?=stripslashes($totalCount)?></span></button>
                    <?php //if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align"  <?php if($isILiked==0){ ?> onclick="javascript : likeBlog(<?=$featuredBlogRs['id']?>,<?=$mem_id?>)" <?php } ?> id="liked-<?=$featuredBlogRs['id']?>" ><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <span><?php if($isILiked==0){ echo "Like"; }else{ echo "Liked"; } ?> </span></button>
                     <?php //}else{ ?>
                     <!--<a  class="btn btn-default" aria-label="Left Align" href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span>Like</a>
                     --><?php //} ?>
                  </div>
                  <div class="btn-group">
                   <?php if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align" <?php if($isSaved==0){ ?> onclick="javascript : savedAsDraft(<?=$featuredBlogRs['id']?>,<?=$mem_id?>)" <?php } ?> id="saved-<?=$featuredBlogRs['id']?>"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span><span><?php if($isSaved==0){ echo "Save for later"; }else{ echo "Saved"; } ?> </span></button>
                    <?php }else{ ?>
                    <a  class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> <span>Save for later</span></a>
                    <?php } ?>
                  </div>
                  
                   <div class="btn-group share-social-link">
                    <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> <span>Share</span> </button>
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
            
            
            </div>
          <div class="see-all-blog" data-aos="fade-up" data-aos-once="true"><a href="<?=site_url('blog/filter/0/featureBlog')?>"  style="color: #b77f1d;">See all featured</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="blog-sect">
    <div class="blog-banner" data-aos="fade-up" data-aos-once="true">
      <img src="<?=base_url()?>uploads/blog/<?=$blogImages['image2']?>" alt="<?=$blogImages['image2']?>" /> </div>
    <div class="middle-tab-section-bg blog-sect-heding dark-shadwoand-bot-border">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <h2 class="section-header color-4a99b1">Latest Articles</h2>
      </div>
    </div>
    <div class="sliderbot-sect bg-4a99b1-hex">&nbsp;</div>
    <div class=" section bg-whiteimportant">
      <div class="blog-boxes">
        <div class="container">
          <div class="row">
            <?php $com = new common();
            foreach ($latestBlog as $featuredBlogRs2) { 
               $totalCount2 =  $com->getTotalLikeForBlog($featuredBlogRs2['id']);
               $isILiked2 =  $com->isLikedBlog($mem_id,$featuredBlogRs2['id']);
               $isSaved2 =  $com->isSavedBlog($mem_id,$featuredBlogRs2['id']);
            ?>
            <div class="col-sm-4 blog-bock" data-aos="fade-up" data-aos-once="true">
              <div class="blog-in">
             <a href="<?=site_url('blog/detail/'.$featuredBlogRs2['id'].'/'.$com->create_slug($featuredBlogRs2['blog_title']))?>">
			<div class="blog-img"> 
			<?php if($featuredBlogRs2['blog_image']!=''){ ?>
			<img src="<?=base_url()?>uploads/blog/<?=stripslashes($featuredBlogRs2['blog_image'])?>" alt="<?=stripslashes($featuredBlogRs2['blog_image'])?>"/>
			<?php }else{ ?>
			<img src="<?=base_url()?>front_assets/images/no-blog-image.jpg" alt="blog-box-img.png"/>
			<?php } ?>
			</div>
			<?php $newstring2 = substr($featuredBlogRs2['cat_id'], -3); $auId2 = str_replace(",","",$newstring2); ?>
			<div class="blog-box-title"><?=$com->cut(stripslashes($featuredBlogRs2['blog_title']),40)?><br>
			<a href="<?=site_url('blog/filter/'.$auId2.'/'.$com->create_slug($featuredBlogRs2['added_by']))?>">
			<span>by <?=$com->cut(stripslashes($featuredBlogRs2['added_by']),20)?></span></a></div>
			<a href="<?=site_url('blog/detail/'.$featuredBlogRs2['id'].'/'.$com->create_slug($featuredBlogRs2['blog_title']))?>">
			<div class="blog-shot-disc"><?=stripslashes($featuredBlogRs2['short_description'])?></div>
			<div class="blog-box-foot"><span class="pull-left"><?=date('F d,Y',strtotime($featuredBlogRs2['added_date']))?></span><span class="pull-right">
			Continue Reading</span></div>
			</a>
                <div class="blog-share dropup" style="height: 34px;">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default" aria-label="Justify" id="like-count-<?=$featuredBlogRs2['id']?>"><span><?=stripslashes($totalCount2)?></span></button>
                    <?php //if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align"  <?php if($isILiked2==0){ ?> onclick="javascript : likeBlog(<?=$featuredBlogRs2['id']?>,<?=$mem_id?>)" <?php } ?> id="liked-<?=$featuredBlogRs2['id']?>" ><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <span><?php if($isILiked2==0){ echo "Like"; }else{ echo "Liked"; } ?> </span></button>
                     <?php //}else{ ?>
                     <!--<a  class="btn btn-default" aria-label="Left Align" href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span>Like</a>
                     --><?php //} ?>
                  </div>
                  <div class="btn-group">
                   <?php if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align" <?php if($isSaved2==0){ ?> onclick="javascript : savedAsDraft(<?=$featuredBlogRs2['id']?>,<?=$mem_id?>)" <?php } ?> id="saved-<?=$featuredBlogRs2['id']?>"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span><span><?php if($isSaved2==0){ echo "Save for later"; }else{ echo "Saved"; } ?></span></button>
                    <?php }else{ ?>
                    <a  class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> <span>Save for later</span></a>
                    <?php } ?>
                  </div>
                  <div class="btn-group share-social-link">
                    <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> <span>Share</span> </button>
                    <ul class="dropdown-menu">
                      <li><a class="facebook-profile" href="#" id="fb-share-<?=$featuredBlogRs2['id']?>"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li>
                      <li><a class="pinterest-profile" href="#"  id="pinterest-share-<?=$featuredBlogRs2['id']?>"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a></li>
                      <li><a class="twitter-profile" href="#" id="tweeter-share-<?=$featuredBlogRs2['id']?>"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a></li>
                      <li><a class="google-plus-profile" href="#" id="gplus-share-<?=$featuredBlogRs2['id']?>"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a></li>
                  </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="see-all-blog" data-aos="fade-up" data-aos-once="true"><a href="<?=site_url('blog/filter/0/latestBlog')?>" style="color: #4a99b1;">See all Latest</a></div>
        </div>
      </div>
    </div>
  </div>
  <div class="blog-sect">
    <div class="blog-banner" data-aos="fade-up" data-aos-once="true">
      <img src="<?=base_url()?>uploads/blog/<?=$blogImages['image3']?>" alt="<?=$blogImages['image3']?>"/> </div>
    <div class="middle-tab-section-bg blog-sect-heding dark-shadwoand-bot-border">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <h2 class="section-header color-78963e">Our Artists</h2>
      </div>
    </div>
    <div class="sliderbot-sect bg-78963e-hex">&nbsp;</div>
    <div class=" section bg-whiteimportant">
      <div class="blog-boxes">
        <div class="container">
          <div class="row">
            <?php $com = new common();
            foreach ($featuredBlog2 as $featuredBlogRs2) { 
               $totalCount2 =  $com->getTotalLikeForBlog($featuredBlogRs2['id']);
               $isILiked2 =  $com->isLikedBlog($mem_id,$featuredBlogRs2['id']);
               $isSaved2 =  $com->isSavedBlog($mem_id,$featuredBlogRs2['id']);
            ?>
            <div class="col-sm-4 blog-bock" data-aos="fade-up" data-aos-once="true">
              <div class="blog-in">
              <a href="<?=site_url('blog/detail/'.$featuredBlogRs2['id'].'/'.$com->create_slug($featuredBlogRs2['blog_title']))?>">
				<div class="blog-img">
				<?php if($featuredBlogRs2['blog_image']!=''){ ?>
				<img src="<?=base_url()?>uploads/blog/<?=stripslashes($featuredBlogRs2['blog_image'])?>" alt="<?=stripslashes($featuredBlogRs['blog_image'])?>"/>
				<?php }else{ ?>
				<img src="<?=base_url()?>front_assets/images/no-blog-image.jpg" alt="blog-box-img.png"/>
				<?php } ?></div>
				<?php $newstring3 = substr($featuredBlogRs2['cat_id'], -3); $auId3 = str_replace(",","",$newstring3); ?>
				<div class="blog-box-title"><?=$com->cut(stripslashes($featuredBlogRs2['blog_title']),40)?><br>
				<a href="<?=site_url('blog/filter/'.$auId3.'/'.$com->create_slug($featuredBlogRs2['added_by']))?>">
				<span>by <?=$com->cut(stripslashes($featuredBlogRs2['added_by']),20)?></span></a></div>
				<a href="<?=site_url('blog/detail/'.$featuredBlogRs2['id'].'/'.$com->create_slug($featuredBlogRs2['blog_title']))?>">
				<div class="blog-shot-disc"><?=stripslashes($featuredBlogRs2['short_description'])?> </div>
				<div class="blog-box-foot"><span class="pull-left"><?=date('F d,Y',strtotime($featuredBlogRs2['added_date']))?></span><span class="pull-right">
				Continue Reading</span></div>
				</a>
                <div class="blog-share dropup" style="height: 34px;">
                   <div class="btn-group">
                    <button type="button" class="btn btn-default" aria-label="Justify" id="like-count-<?=$featuredBlogRs2['id']?>"><span><?=stripslashes($totalCount2)?></span></button>
                    <?php //if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align"  <?php if($isILiked2==0){ ?> onclick="javascript : likeBlog(<?=$featuredBlogRs2['id']?>,<?=$mem_id?>)" <?php } ?> id="liked-<?=$featuredBlogRs2['id']?>" ><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> <span><?php if($isILiked2==0){ echo "Like"; }else{ echo "Liked"; } ?> </span></button>
                     <?php //}else{ ?>
                     <!--<a  class="btn btn-default" aria-label="Left Align" href="#" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span>Like</a>
                     --><?php //} ?>
                  </div>
                  <div class="btn-group">
                   <?php if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align" <?php if($isSaved2==0){ ?> onclick="javascript : savedAsDraft(<?=$featuredBlogRs2['id']?>,<?=$mem_id?>)" <?php } ?> id="saved-<?=$featuredBlogRs2['id']?>"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span><span><?php if($isSaved2==0){ echo "Save for later"; }else{ echo "Saved"; } ?> </span></button>
                    <?php }else{ ?>
                    <a  class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span> <span>Save for later</span></a>
                    <?php } ?>
                  </div>
                  
                  <div class="btn-group share-social-link">
                    <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> <span>Share</span> </button>
                    <?php
                    $title  =   urlencode($featuredBlogRs2['blog_title']);
                    $url    =   urlencode(site_url('blog/detail/'.$featuredBlogRs2['id'].'/'.$com->create_slug($featuredBlogRs['blog_title'])));
                    $summary=   urlencode($featuredBlogRs2['short_description']);
                    $image  =   urlencode(base_url().'uploads/blog/'.stripslashes($featuredBlogRs2['blog_image']));
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
            <?php } ?>
          </div>
          <div class="see-all-blog"><a href="<?=site_url('blog/filter/0/featureArtistArticle')?>" style="color: #78963e;">See all articles</a></div>
        </div>
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
<?php foreach($featuredBlog as $featuredBlogRs)
{ 
?>
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
<?php } ?>
</script>
</body>
</html>