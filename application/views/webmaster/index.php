<!DOCTYPE html>
<html lang="en">
<? $this->load->view('mainsite/common/top');?>
<body >
<? $this->load->view('mainsite/common/header');?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php if($numBanner>0){ ?>
<!--banner-->
<div class="top-slider" data-aos="fade-up">
<div id="myCarousel" class="carousel slide carousel-fade" >   <!-- Indicators -->
      <ol class="carousel-indicators">
      <?php   for($i=0;$i<$numBanner;$i++){   ?>
         <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <? } ?>></li>
            <!-- <li data-target="#myCarousel" data-slide-to="1"></li> -->
      <?php } ?>
      </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <?php $count=0; foreach($getBanner as $getBannerRs){  ?>
            <div class="item <? if($count==0){ ?> active <?php } ?>">
                <div class="fill"><img src="<?=base_url()?>uploads/banner/<?=$getBannerRs['banner_image']?>" alt=""/></div>
            </div>
          <?php  $count++;  } ?>
         </div>
   </div>
</div>

<?php } ?> 
<?php if($num_galleries>0){ ?>
<!-- Page Content -->
<div class="section cat-section" >
  <div class="container" >
    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="700">
      <h2 class="section-header text-center">Categories</h2>
    </div>
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1 ">
        <div class="row">
        <?php  $delay = 1;
          foreach ($getgalleries as $getgalleriesRs) {  ?>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 text-center">
            <div class="cat-box" data-aos="fade-up" data-aos-delay="<? if($delay==1){ echo "800";}else if($delay==2){  echo "1100";}else if($delay==3){ echo "1500"; }else if($delay=4){ echo "1800"; } ?>">
              <div class="cat-box-in<?=$getgalleriesRs['colour_type']?>" >  
                <div class="cat-img" style="background:rgba(0, 0, 0, 0) url('<?=base_url()?>uploads/galleries/<?=$getgalleriesRs['cat_images']?>') no-repeat scroll center top;"></div>
                <div class="cat-title"><?=ucfirst(stripslashes($getgalleriesRs['cat_name']))?></div>
              </div>
            </div>
          </div>
          <?php $delay++; } ?>
         </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php if($numBanner2>0){ ?>
<div class=" section slider1-section new-slider" >
<div data-aos="fade-up"  data-aos-once="true">
<div id="myCarousel1" class="carousel slide carousel-fade lg-arrow" >   <!-- Indicators -->
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
          <?php $banner1 =0; 
          foreach ($getBanner2 as $getBannerRs2) { $banner1++; ?>
            <div class="item <?php if($banner1==1){ ?> active <?php } ?>">
                <div class="fill"><img src="<?=base_url()?>uploads/banner/<?=$getBannerRs2['banner_image']?>" alt=""/></div>
            </div>
          <?php } ?>
        </div>
<!-- Controls -->
        <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
           <span class="v-align"> <span><img src="<?=base_url()?>front_assets/images/slider-left-arow.png" alt=""/></span></span>
        </a>
        <a class="right carousel-control" href="#myCarousel1" data-slide="next">
            <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-right-arow.png" alt=""/></span></span>
        </a>
      
         </div>
</div>
</div>
<?php } ?>
<div class="section who-we-are-section">
  <div class="container" >
    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="0">
      <h2 class="section-header text-center"><?=stripslashes($section1['page_title'])?></h2>
    </div>
    <div class="text text-center" data-aos="fade-up"  data-aos-delay="600"><?=stripslashes($section1['page_desc'])?></div>
    <div class="mid-tag-line text-center" data-aos="fade-up" data-aos-delay="700"><?=stripslashes($section1['meta_title'])?></div>
  </div>
</div>
<?php if($numServices>0){ ?>
<div class="section services-section " >
  <div class="container" >
    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="800">
      <h2 class="section-header text-center">Our Services</h2>
    </div>
    <div class="row text-center">
      <?php $i = 1; 
       foreach($getServices as $getServicesRs){  ?>
      <div class="col-md-5ths " data-aos="fade-up" data-aos-delay="<? if($i==1){ echo "700";}else if($i==2){  echo "1100";}else if($i==3){ echo "1500"; }else if($i==4){ echo "1800"; }else{ echo "2100"; } ?>">
        <div class="sevice-box sevice-box<?=$i?>" >
          <div class="icon-box" style="background: rgba(0, 0, 0, 0) url('<?=base_url()?>uploads/services/<?=$getServicesRs['services_images']?>') no-repeat scroll center top;"></div>
          <div class="serv-title"><?=stripslashes($getServicesRs['title'])?></div>
          <div class="serv-text"><?=stripslashes($getServicesRs['short_description'])?></div>
        </div>
      </div>
      <?php $i++; } ?>
    </div>
  </div>
</div>
<?php } ?>
<?php if($numBanner3>0){ ?>
<div class=" section slider1-section new-slider" >
<div data-aos="fade-up"  data-aos-once="true">
<div id="myCarousel8" class="carousel slide carousel-fade lg-arrow" >   <!-- Indicators -->
     <!-- Wrapper for slides -->
        <div class="carousel-inner">
              <?php $banner3 =0; 
               foreach ($getBanner3 as $getBannerRs3) { $banner3++; ?>
              <div class="item  <?php if($banner3==1){ ?> active <?php } ?>">
                  <div class="fill"><img src="<?=base_url()?>uploads/banner/<?=$getBannerRs3['banner_image']?>" alt=""/></div>
               </div>
              <?php } ?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel8" data-slide="prev">
            <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-left-arow.png" alt=""/></span></span>
        </a>
        <a class="right carousel-control" href="#myCarousel8" data-slide="next">
            <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-right-arow.png" alt=""/></span></span>
        </a>
      </div>
</div>
</div>
<?php } ?>


<div class="section our-mission-section" >
  <div class="container" >
    <div data-aos="fade-up" data-aos-delay="0">
      <h2 class="section-header text-center"><?=stripslashes($section2['page_title'])?></h2>
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
      <h2 class="section-header text-center" data-aos="fade-up" >Featured Artist<br>
        <div class="artist-name" data-aos="fade-up" data-aos-delay="1000" ><?=stripslashes($featureArtist['first_name'].' '.$featureArtist['last_name'])?></div>
      </h2>
    </div>
    <div class="row">
      <div class="col-sm-4 col-sm-push-4" data-aos="fade-up" data-aos-delay="1200" data-aos-easing="ease">
        <div class="artist-pic"><a href="<?=site_url('feature_artists/details/'.$featureArtist['id'].'/'.$this->common->create_slug($featureArtist['first_name'].' '.$featureArtist['last_name']))?>">
          <?php if($featureArtist['profile_pic']!=''){ ?>
          <img src="<?=base_url()?>uploads/user_profile_pic/<?=$featureArtist['profile_pic']?>" alt=""/>
          <?php }else{ ?>
          <img src="<?=base_url()?>front_assets/images/sliderimage.png" alt=""/>
          <?php } ?>
           </a></div>
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
         <?=nl2br($featureArtist['feature_inside_the_studio_desc'])?></div>
        <div class="atist-txt" data-aos="fade-left" data-aos-delay="1800" data-aos-easing="ease">
          <h4>Video </h4>
          <?=nl2br($featureArtist['feature_video_desc'])?></div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<div class="section art-section">
  <div class="container"  >
    <div data-aos="fade-up"  data-aos-delay="500" >
      <h2 class="section-header text-center"><?=stripslashes($section3['page_title'])?></h2>
    </div>
    <div class="text text-center">
      <p  data-aos="fade-up"  data-aos-delay="1000"><?=nl2br(stripslashes($section3['page_desc']))?></p>
<p  data-aos="fade-up"  data-aos-delay="1000"><?=nl2br(stripslashes($section3['meta_title']))?></p>
    </div><br>

    <div class="text-center" data-aos="fade-up"  data-aos-delay="1000">
      <div class="two-icons"><a href="#" class="icon1" style='background: rgba(0, 0, 0, 0) url("<?=base_url()?>uploads/page_image/<?=$section3['meta_description']?>") no-repeat scroll center top;'> </a><span><?=stripslashes($section3['meta_keyword'])?></span></div>
      <div class="two-icons"><a href="#" class="icon2" style='background: rgba(0, 0, 0, 0) url("<?=base_url()?>uploads/page_image/<?=$section3['page_image']?>") no-repeat scroll center top;'> </a><span><?=stripslashes($section3['page_url'])?></span></div>
    </div>
  </div>
</div>
<?php if($numBlog>0){ ?>
<div class="section slider4-section">
  <div class="container" data-aos="fade-up" data-aos-duration="1500">
    <div >
      <h2 class="section-header text-center">Blog</h2>
    </div>
    <div class="flexslider2 carousel" data-aos="zoom-in" >
      <ul class="slides">
        <?php foreach ($getBlog as $blogRs) {  ?>
        <li >
          <div class="blog-box" >
            <div class="blog-img">
              <?php if($blogRs['blog_image']!=''){ ?>
              <img src="<?=base_url()?>uploads/blog/<?=$blogRs['blog_image']?>" alt=""/>
              <?php }else{ ?>
              <img src="<?=base_url()?>front_assets/images/blog-img.jpg" alt=""/>
              <?php } ?>
            </div>
            <div class="blog-title"><?=stripslashes($blogRs['blog_title'])?></div>
            <div class="blog-disc"><?=stripslashes($blogRs['short_description'])?>...</div>
            <div class="blog-links"> <span><?=date('F d,Y',strtotime($blogRs['added_date']))?></span> <span class="pull-right"><a href="#">Continue Reading</a></span> </div>
          </div>
        </li>
        <?php } ?>
       </ul>
    </div>
  </div>
</div>
<?php } ?>
<div class="section gray-section" >
  <div class="container" xdata-aos="fade-up" xdata-aos-duration="2000">
    <div class="row">
   
    
      <div class="col-lg-10 col-lg-offset-1" xdata-aos="zoom-in"  >
        <div class="four-box text-center">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" data-aos="fade-up" data-aos-delay="700" >
              <div class="box-in bot-box1"> <a href="<?=site_url('guestbook')?>">
                <div class="box-icon"> <span></span> </div>
                <div class="box-link">Guestbook</div>
                </a></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 " data-aos="fade-up" data-aos-delay="1000" >
              <div class="box-in bot-box2"> <a href="<?=site_url('testimonials')?>">
                <div class="box-icon"> <span></span> </div>
                <div class="box-link">Testimonials</div>
                </a></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6" data-aos="fade-up" data-aos-delay="1300">
              <div class="box-in bot-box3"> <a href="#" data-toggle="modal" data-target="#myModalNewsletter">
                <div class="box-icon"> <span></span> </div>
                <div class="box-link">Newsletter</div>
                </a></div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 " data-aos="fade-up" data-aos-delay="1500" >
              <div class="box-in bot-box4"> <a href="#">
                <div class="box-icon"> <span></span> </div>
                <div class="box-link">Contact us</div>
                </a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade cnt-form" id="myModalNewsletter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Subscribe to our Newsletter</h2>
            </div>
            <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="contact_name" id="contact_name"  >
            <input type="text" class="form-control" placeholder="Email" name="contact_email" id="contact_email" >
            <div class="g-recaptcha" data-sitekey="6LfgAQ4UAAAAAHpzLSRjQ77wGdNKs48LxSVMi_3e" id="g-recaptcha-response"></div><br>
            <div class="text-right">
              <a class="dark-gray-btn" href="javascript:void(0)"  onclick="javascript:subscribe_newsletter();"><span class="lt"></span>
                <span class="large-btn">Sign Up</span><span class="rt"></span></a></div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<? $this->load->view('mainsite/common/footer');?>
<!-- /.container --> 
<? $this->load->view('mainsite/common/footer_script');?>
<script src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
</body>
</html>
