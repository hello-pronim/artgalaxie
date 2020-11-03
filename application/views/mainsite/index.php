<?php
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
  ?>
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('mainsite/common/top');?>

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
<style>
.blog-box .blog-title span { color:#21c2d5; }
</style>

<?php if($numBanner>0){ ?>
<!--banner-->
<div class="top-slider" data-aos="fade-up">
<div id="myCarousel" class="carousel slide carousel-fade" >   <!-- Indicators -->
      <ol class="carousel-indicators">
      <?php   for($i=0;$i<$numBanner;$i++){   ?>
         <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
            <!-- <li data-target="#myCarousel" data-slide-to="1"></li> -->
      <?php } ?>
      </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <?php $count=0; foreach($getBanner as $getBannerRs){  ?>
            <div class="item <?php if($count==0){ ?> active <?php } ?>">
                <div class="fill"><img src="<?=base_url()?>uploads/banner/<?=$getBannerRs['banner_image']?>" alt="<?=$getBannerRs['banner_image']?>"/></div>
            </div>
          <?php  $count++;  } ?>
         </div>
   </div>
</div>

<?php } ?>

<!--<div class="top-slider" data-aos="fade-up">-->
<?php //N2SmartSlider(22); ?>
<!--</div>-->


<?php if($num_galleries>0){ ?>
<!-- Page Content -->
<div class="section cat-section" >
  <div class="container" >
    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="700">
      <h2 class="section-header text-center color-fff section-header-large">Categories</h2>
    </div>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 ">
        <div class="row">
        <?php  $delay = 1;
          foreach ($getgalleries as $getgalleriesRs) {  ?>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
            <a href="<?=site_url('categories_details')?>?id=<?php echo $delay;?>" > 
            <div class="cat-box" data-aos="fade-up" data-aos-delay="<?php if($delay==1){ echo "800";}else if($delay==2){  echo "1100";}else if($delay==3){ echo "1500"; }else if($delay=4){ echo "1800"; } ?>">
              <div class="cat-box-in<?=$getgalleriesRs['colour_type']?>" >  
                <div class="cat-img" style="background:rgba(0, 0, 0, 0) url('<?=base_url()?>uploads/galleries/<?=$getgalleriesRs['cat_images']?>') no-repeat scroll center top;"></div>
                <div class="cat-title"><?=ucfirst(stripslashes($getgalleriesRs['cat_name']))?></div>
              </div>
            </div> </a>
          </div>
          <?php $delay++; } ?>
         </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class=" section slider1-section new-slider" >
<div data-aos="fade-up"  data-aos-once="true">
<?php
    N2SmartSlider(11);
?>
</div>
</div>

<div class="section who-we-are-section">
  <div class="container" >
    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="0">
      <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($section1['page_title'])?></h2>
    </div>
    <div class="text text-center" data-aos="fade-up"  data-aos-delay="600"><?=stripslashes($section1['page_desc'])?></div>
    <div class="mid-tag-line text-center" data-aos="fade-up" data-aos-delay="700"><?=stripslashes($section1['meta_title'])?></div>
  </div>
</div>
<?php if($numServices>0){ ?>
<div class="section services-section " >
  <div class="container" >
    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="800">
      <h2 class="section-header text-center color-fff section-header-large">Our Services</h2>
    </div>
    <div class="row text-center">
      <?php $i = 1; 
       foreach($getServices as $getServicesRs){  ?>
      <div class="col-md-5ths " data-aos="fade-up" data-aos-delay="<?php if($i==1){ echo "700";}else if($i==2){  echo "1100";}else if($i==3){ echo "1500"; }else if($i==4){ echo "1800"; }else{ echo "2100"; } ?>">
        <div class="sevice-box sevice-box<?=$i?>" >
          <a href="<?=stripslashes($getServicesRs['service_url']);?>">
          <div class="icon-box" style="background: rgba(0, 0, 0, 0) url('<?=base_url()?>uploads/services/<?=$getServicesRs['services_images']?>') no-repeat scroll center top;"></div>
          <div class="serv-title"><?=stripslashes($getServicesRs['title'])?></div>
          <div class="serv-text"><?=stripslashes($getServicesRs['short_description'])?></div>
          </a>
        </div>
      </div>
      <?php $i++; } ?>
    </div>
  </div>
</div>
<?php } ?>
<div class=" section slider1-section new-slider" >
<div data-aos="fade-up"  data-aos-once="true">
<?php
 N2SmartSlider(12);
?>
</div>
</div>


<div class="section our-mission-section" >
  <div class="container" >
    <div data-aos="fade-up" data-aos-delay="0">
      <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($section2['page_title'])?></h2>
    </div>
    <div class="text text-center" >
      <p data-aos="fade-up" data-aos-delay="600"><?=nl2br(stripslashes($section2['page_desc']))?></p>
      <p data-aos="fade-up" data-aos-delay="900"><?=nl2br(stripslashes($section2['meta_title']))?></p>
    </div>
  </div>
</div>
<?php if($isExists>0){ ?>
<div class="section featured-section">
  <div class="container" >
    <div data-aos="fade-up">
      <h2 class="section-header text-center section-header-large" data-aos="fade-up" >Featured Artist<br>
        <div class="artist-name" data-aos="fade-up" data-aos-delay="1000" >
            <a href="<?=site_url('feature_artists/details/'.$featureArtist['id'].'/'.$this->common->create_slug($featureArtist['first_name'].' '.$featureArtist['last_name']))?>"><font  color="#587a21"><?=stripslashes($featureArtist['first_name'].' '.$featureArtist['last_name'])?></font></a></div>
      </h2>
    </div>
    <div class="row">
      <div class="col-sm-4 col-sm-push-4" data-aos="fade-up" data-aos-delay="1200" data-aos-easing="ease">
        <div class="artist-pic"><a href="<?=site_url('feature_artists/details/'.$featureArtist['id'].'/'.$this->common->create_slug($featureArtist['first_name'].' '.$featureArtist['last_name']))?>">
          <?php if($featureArtist['profile_pic']!=''){ ?>
          <img src="<?=base_url()?>uploads/user_profile_pic/<?=$featureArtist['profile_pic']?>" alt="<?=$featureArtist['profile_pic']?>"/>
          <?php }else{ ?>
          <img src="<?=base_url()?>front_assets/images/sliderimage.png" alt=""/>
          <?php } ?>
           </a>
           <a class="feature-artists-btn" href="<?=site_url('feature_artists/details/'.$featureArtist['id'].'/'.$this->common->create_slug($featureArtist['first_name'].' '.$featureArtist['last_name']))?>">
            <span class="large-btn">View Featured</span>
            </a>
           </div>
      </div>
      <div class="col-sm-4 col-sm-pull-4" >
        <div class="atist-txt atist-txt-mr-bottom" data-aos="fade-right" data-aos-delay="1500" data-aos-easing="ease">
          <h4>Interview</h4>
          <?=nl2br($featureArtist['interview_desc'])?></div>
        <div class="atist-txt" data-aos="fade-right" data-aos-delay="1800" data-aos-easing="ease">
          <h4>Artwork Gallery</h4>
          <?=nl2br($featureArtist['feature_artwork_gallery_desc'])?></div>
      </div>
      <div class="col-sm-4" >
        <div class="atist-txt atist-txt-mr-bottom" data-aos="fade-left" data-aos-delay="1500" data-aos-easing="ease">
          <h4>Inside the Studio</h4>
         <?=nl2br($featureArtist['feature_short_inside_the_studio_desc'])?></div>
        <div class="atist-txt" data-aos="fade-left" data-aos-delay="1800" data-aos-easing="ease">
          <h4>Video </h4>
          <?=nl2br($featureArtist['feature_video_desc'])?></div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php if($numTesto>0){ ?>
<div class="section slider4-section">
  <div class="container">
    <div >
      <h2 class="section-header text-center color-fff section-header-large">Testimonials</h2>
    </div>
    <div class="flexslider2 carousel">
      <ul class="slides">
        <?php //echo "<pre>"; print_r($getBlog); echo "<pre>";  ?>
        <?php foreach ($getTesto as $testoRs) {  ?>
        <li >
            <div class="blog-box" >
            <a href="<?=site_url('testimonials')?>">
                <div class="blog-img">
                <?php if($testoRs['testo_image']!=''){ ?>
                    <img src="<?=base_url()?>uploads/testimonials/<?=$testoRs['testo_image']?>" alt="<?=$testoRs['testo_image']?>"/>
                <?php }else{ ?>
                    <img src="<?=base_url()?>front_assets/images/no-image.jpg" alt="no-image.jpg"/>
                <?php } ?>
                </div>
                <div class="detail" style="height: 80px;margin-top:15px">
                    <div class="testo-title" style="font-size: 20px; line-height: normal; font-weight: bold;"><?=$this->common->cut(stripslashes($testoRs['testo_title']),40)?></a><br></div>
                    <?php 
                        $com = new common();
                        $resUser = $com->getUserDetailsForTestimonials($testoRs['testo_added_by']);
                    ?>
                    <div class="mem-detail" style="margin-top:5px;">
                        <span style="color: #26778f; font-size: 19px;"><? echo  stripslashes($resUser->first_name).' '.stripslashes($resUser->last_name);   ?></span>
                    </div>
                </div>
                <br>
                <a href="<?=site_url('testimonials')?>">
                    <div class="blog-disc" style="height: 180px; font-size:16px"><?=stripslashes($testoRs['testo_description'])?></div>
                    <div class="blog-foot"><span class="pull-right">See more</span></div>
                </a>
            </div>
        </li>
        <?php } ?>
       </ul>
    </div>
  </div>
</div>
<?php } ?>
<div class="section art-section">
  <div class="container"  >
    <div data-aos="fade-up" data-aos-delay="500" >
      <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($section3['page_title'])?></h2>
    </div>
    <div class="text text-center">
      <p data-aos="fade-up"  data-aos-delay="1000"><?=nl2br(stripslashes($section3['page_desc']))?></p>
    <p data-aos="fade-up"  data-aos-delay="1000"><?=nl2br(stripslashes($section3['meta_title']))?></p>
    </div><br>
    <div class="text-center" data-aos="fade-up"  data-aos-delay="1000">
      <div class="two-icons"><a href="<?=site_url('home/refersion')?>" class="icon1" style='background: rgba(0, 0, 0, 0) url("<?=base_url()?>uploads/page_image/<?=$section3['meta_description']?>") no-repeat scroll center top;'> </a><span><?=stripslashes($section3['meta_keyword'])?></span></div>
      <div class="two-icons"><a href="<?=site_url('home/art_of_giving')?>" class="icon2" style='background: rgba(0, 0, 0, 0) url("<?=base_url()?>uploads/page_image/<?=$section3['page_image']?>") no-repeat scroll center top;'> </a><span><?=stripslashes($section3['page_url'])?></span></div>
    </div>
  </div>
</div>
<?php if($numBlog>0){ ?>
<div class="section slider4-section">
  <div class="container">
    <div >
      <h2 class="section-header text-center color-fff section-header-large">Creative Blog</h2>
    </div>
    <div class="flexslider2 carousel">
      <ul class="slides">
        <?php //echo "<pre>"; print_r($getBlog); echo "<pre>";  ?>
        <?php foreach ($getBlog as $blogRs) {  
          $com = new common();
        ?>
        <li >
            <div class="blog-box" >
            <a href="<?=site_url('blog/detail/'.$blogRs['id'].'/'.$com->create_slug($blogRs['blog_title']))?>">
                <div class="blog-img">
                <?php if($blogRs['blog_image']!=''){ ?>
                    <img src="<?=base_url()?>uploads/blog/<?=$blogRs['blog_image']?>" alt="<?=$blogRs['blog_image']?>"/>
                <?php }else{ ?>
                    <img src="<?=base_url()?>front_assets/images/no-blog-image.jpg" alt="no-blog-image.jpg"/>
                <?php } ?>
                </div>
                <?php $newstring = substr($blogRs['cat_id'], -3); $auId = str_replace(",","",$newstring); ?>
                <div class="blog-title"><a href="<?=site_url('blog/detail/'.$blogRs['id'].'/'.$com->create_slug($blogRs['blog_title']))?>" style="color: #733f92" ><?=$this->common->cut(stripslashes($blogRs['blog_title']),40)?></a><br><a href="<?=site_url('blog/filter/'.$auId.'/'.$com->create_slug($blogRs['added_by']))?>"><span>by <?=$com->cut(stripslashes($blogRs['added_by']),20)?></span></a></div>
                <a href="<?=site_url('blog/detail/'.$blogRs['id'].'/'.$com->create_slug($blogRs['blog_title']))?>">
                <div class="blog-disc"><?=stripslashes($blogRs['short_description'])?></div>
                <div class="blog-foot"> <span class="pull-left"><?=date('F d,Y',strtotime($blogRs['added_date']));?></span><span class="pull-right" style="color: #b56330">Continue Reading</span> </div>
            </a>
            </div>
        </li>
        <?php } ?>
       </ul>
    </div>
  </div>
</div>
<?php } ?>
<?php if($isOthersLinks>0){ ?>
<div class="section gray-section" >
  <div class="container" xdata-aos="fade-up" xdata-aos-duration="2000">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1" xdata-aos="zoom-in"  >
        <div class="four-box text-center">
          <div class="row">
          <?php  $delay = 1;
          foreach ($otherLinkList as $otherLink) {  ?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" data-aos="fade-up" data-aos-delay="<?php if($delay==1){ echo "700";}else if($delay==2){  echo "1000";}else if($delay==3){ echo "1300"; }else if($delay=4){ echo "1500"; } ?>" >
              <div class="box-in bot-box1"> 
              <?php if($otherLink['link']== "testimonials" || $otherLink['link']== "guestbook" ) { ?>
              <a href="<?=site_url(). $otherLink['link'];?>"><font color="<?=$otherLink['color'];?>">
                <?php }else if ($otherLink['link']== "https://confirmsubscription.com/h/j/7EC6779A3185B91D ") { ?>
              <a href="<?= $otherLink['link'];?>" target="_blank"><font color="<?=$otherLink['color'];?>">
              <?php }else { ?>
              <a data-toggle="modal" data-target="#<?= $otherLink['link'];?>"><font color="<?=$otherLink['color'];?>">
              <?php } ?>
                <div class="box-icon"> <span style= "background:rgba(0, 0, 0, 0) url('<?=base_url()?>uploads/other_links/<?=$otherLink['image_name']?>') no-repeat scroll center top"></span> </div>
                <div class="box-link"><?=$otherLink['title'];?> </div>
                </font></a></div>
            </div>
          <?php $delay++; } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php N2Native::beforeClosingBody(); ?>
<?php $this->load->view('mainsite/common/footer');?>
<?php $this->load->view('mainsite/common/footer_script');?>
<script src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
</body>
</html>