<!DOCTYPE html>
<html lang="en">
<? $this->load->view('mainsite/common/top');?>
<style type="text/css">
.colour-black{
  color: #000;
}
</style>
<body >
<? $this->load->view('mainsite/common/header');?>
<?php  if(!empty($sliderData)){  ?>
<!--banner-->
<div class="top-slider image-with-video-slider" data-aos="fade-up">
<div class="container">
  <div id="myCarousel" class="carousel slide carousel-fade" > <!-- Indicators -->
    
    <ol class="carousel-indicators">
      <?php for($i=0;$i<count($sliderData);$i++){ ?>
      <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
      <?php } ?>
      </ol>
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <?php $p=0; foreach($sliderData as $sliderDataRs){  ?>
      <div class="item  <?php if($p==0){ ?> active  <?php } ?> ">
        <div class="fill">
        <?php if($sliderDataRs['type']=='video'){ ?>
         <video height="100%" width="100%" controls >
            <source src="<?=base_url()?>uploads/page_slider_content/<?=$sliderDataRs['str_name']?>" type="video/mp4">
        </video>
        <?php }else if($sliderDataRs['type']=='image'){ ?>
        <img src="<?=base_url()?>uploads/page_slider_content/<?=$sliderDataRs["str_name"]?>" alt="<?=$sliderDataRs["str_name"]?>"/>
        <?php }else if($sliderDataRs['type']=='url'){ ?>
        <iframe height="100%" width="100%" frameborder="0" src="<?=$sliderDataRs['str_name']?>?autoplay=0&rel=0"></iframe>
        <?php } ?>

        </div>
      </div>
      <?php $p++; } ?>
      <div class="item">
        <div class="fill"><img src="<?=base_url()?>front_assets/images/gallery-page-banner.jpg" alt=""/></div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Page Content -->
<?php } ?>
<div class="section artists-section" >
  <div class="container" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true">
    <div class="col-lg-12">
      <h2 class="section-header text-center color-fff">Search :  <?=$searchText?></h2>
    </div>
  </div>
</div>
<div class="section bg-white">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="tab-content">
          <div id="sectionAD" class="xtab-pane fade in active">
            <div class="row">
              <?php if(!empty($allArtist)>0){    
                foreach($allArtist as $allArtistRs){ ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12"  data-aos="fade-up" data-aos-once="true" >
                  <a href="<?=base_url('artists/details/'.$allArtistRs['id'].'/'.$this->common->create_slug(stripslashes($allArtistRs['first_name'].' '.$allArtistRs['last_name'])))?>">
                    <div class="artist-img-blog">
                    <div class="tumb-img">
                      <!--<img src="<?=base_url()?>uploads/artist-gallery/original/thumb/<?=$allArtistRs['image_name']?>" alt="">-->
                      <img src="<?=base_url()?>uploads/user_profile_pic/<?=$allArtistRs['profile_pic']?>" alt="">
                    <div class="overlay"></div>
                    </div>
                    <p class="colour-black"><?=stripslashes($allArtistRs['first_name'].' '.$allArtistRs['last_name'])?></p>
                  </div></a>
                </div>
              <?php } }else{ ?> 
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-xss-12"  data-aos="fade-up" data-aos-once="true" >
                  <div class="artist-img-blog">
                     <p class="colour-black">No record found.!</p>
                  </div> 
                </div>

            <?php  }  ?>
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

<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 


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
