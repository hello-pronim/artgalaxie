 <?php
  //require_once(dirname(__FILE__) . "/../../../../smartslider/start.php");
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
  ?>
<!DOCTYPE html>
<html lang="en">
<?php 
    $this->load->view('mainsite/common/top');
    //echo "input is ".$this->input->get('id');
    $id = '1';
    $myinput = $this->input->get('id');
    if($myinput) { $id = $myinput; }
    //if(isset($_GET['id'])) { $id = $_GET['id']; }
?>
<style type="text/css">
.colour-black{
  color: #000;
}
.nav-tabs.artistsect-tabs li:first-child.active > a {
	background:linear-gradient(rgb(169, 29, 38) 0%, rgb(90, 16, 20) 100%);
}
.nav-tabs.artistsect-tabs li:nth-child(2).active > a {
	background	:linear-gradient(rgb(205, 114, 41) 0%, rgb(109, 61, 22) 100%);
}
.nav-tabs.artistsect-tabs li:nth-child(3).ac	tive > a {
	background	:linear-gradient(rgb(120, 165, 64) 0%, rgb(64, 88, 34) 100%);
}
.nav-tabs.artistsect-tabs li:last-child.active > a {
	background	:linear-gradient(rgb(9, 180, 162) 0%, rgb(5, 96, 86) 100%);
}
<style> .item{ opacity: 0; } </style>
</style>
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/bounceanimate2.css">
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
<!--banner-->
<?php /* ?>
<div class="top-slider image-with-video-slider" data-aos="fade-up" style="padding:0">
<div class="container">
  <div id="myCarousel" class="carousel slide carousel-fade" > <!-- Indicators -->
    
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php if($id=='1') { ?>
        <div class="item active">
        <div class="containerss3" data-target="#myCarousel" data-slide-to="1">
        <?php
        N2SmartSlider(14);
        ?>
         </div>
        </div>
        <?php }elseif($id=='2') { ?>
    <div class="item active">
    <div class="containerss3" data-target="#myCarousel" data-slide-to="2">
    <?php
    N2SmartSlider(15);
    ?>
    </div>
    </div>
    <?php } elseif($id=='3') { ?>
    <div class="item active">
    <div class="containerss3" data-target="#myCarousel" data-slide-to="3">
    <?php
    N2SmartSlider(16);
    ?>
    </div>
    </div>
    <?php } elseif($id=='4') { ?>
    <div class="item active" >
    <div class="containerss3" data-target="#myCarousel" data-slide-to="4">
    <?php
    N2SmartSlider(17);
    ?>
    </div>
    </div>
    <?php } ?>
    </div>
    </div>
  </div>
</div>

<?php */ ?>

</div>
<!-- Page Content -->

<div class="gallery-page-in">
  <div class="bg-white middle-tab-section">
    <div class="middle-tab-section-bg">
      <div class="container"  data-aos="fade-up" data-aos-once="true">
       
            <?php /* ?>
            <div class="style-page-in">
              <ul id="filter-list" class="nav nav-tabs artistsect-tabs text-center">
                <?php 
                foreach ($gallery_cat as $gallery_catRs)
				{
				    if($gallery_catRs['cat_id']==$id || $gallery_catRs['cat_id']==$id || $gallery_catRs['cat_id']==$id || 	$gallery_catRs['cat_id']==$id )
					{
				?>
                    <li class="tab<?=$gallery_catRs['colour_type']?>">
                        <!-- <a class="filter1 active"  data-filter="<?=$gallery_catRs['cat_id']?>"><?=ucfirst(stripslashes($gallery_catRs['cat_name']))?></a> -->
                        <a href="categories_details.html?id=<?=$gallery_catRs['cat_id']?>" class="active"><?=ucfirst(stripslashes($gallery_catRs['cat_name']))?></a>
                    </li>
                    <?php 
                    }else{ 
                    ?>
				    <li class="tab<?=$gallery_catRs['colour_type']?>">
				        <!--<a class="filter" data-filter="<?=$gallery_catRs['cat_id']?>"><?=ucfirst(stripslashes($gallery_catRs['cat_name']))?></a>-->
				        <a href="categories_details.html?id=<?=$gallery_catRs['cat_id']?>" ><?=ucfirst(stripslashes($gallery_catRs['cat_name']))?></a>
				    </li>
				<?php
                    } 
				}
				?>
             </ul>
            </div>
            <?php */ ?>
           
            
            
            <?php  ?>
             <div class="style-page-in">
              <ul id="filter-list" class="nav nav-tabs artistsect-tabs text-center">
                <?php foreach ($gallery_cat as $gallery_catRs)
					{
					if(
						$gallery_catRs['cat_id']==$id || 
						$gallery_catRs['cat_id']==$id ||
						$gallery_catRs['cat_id']==$id || 
						$gallery_catRs['cat_id']==$id
					  )
					{
					?>
				
                <li  class="tab<?=$gallery_catRs['colour_type']?>">
                  <a class="filter active"  data-filter="<?=$gallery_catRs['cat_id']?>">
                    <?=ucfirst(stripslashes($gallery_catRs['cat_name']))?></a></li>
					
                <?php }else{ ?>
				<li  class="tab<?=$gallery_catRs['colour_type']?>">
                  <a class="filter"  data-filter="<?=$gallery_catRs['cat_id']?>">
                    <?=ucfirst(stripslashes($gallery_catRs['cat_name']))?></a></li>
				<?php } }?>
             </ul>
            </div>
            <?php  ?>
            
       
      </div>
    </div>
  </div>
</div>
<div class="section bg-white">
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div id="portfolio">
              <div class="row">
                  <?php $speedani=1; ?>
              <?php foreach ($artist_gallery as $artist_galleryRs) { /* ?>
              <a href="<?=base_url('artists/details/'.$artist_galleryRs['id'].'/'.$this->common->create_slug(stripslashes($artist_galleryRs['first_name'].' '.$artist_galleryRs['last_name'])))?>" >
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12 item <?=$artist_galleryRs['galleries_id']?>" data-aos="fade-up" data-aos-once="true"   >
                   <? if($speedani>7){$speedani=1;}?>
                  <div class="artist-img-blog block animate" data-animate="bounceIn" data-duration="1.0s" data-delay="0.<? echo $speedani;?>s" style="visibility:hidden">
                    <div class="tumb-img"><img src="<?=base_url()?>uploads/user_profile_pic/<?=$artist_galleryRs['profile_pic']?>" alt="">
                      <div class="overlay"></div>
                    </div>
                    <p class="colour-black"><?=stripslashes($artist_galleryRs['first_name']." ".$artist_galleryRs['last_name'])?></p>
                  </div>
                </div>
              </a><?php $speedani+=2; */ ?>
              <a href="<?=base_url('artists/details/'.$artist_galleryRs['id'].'/'.$this->common->create_slug(stripslashes($artist_galleryRs['first_name'].' '.$artist_galleryRs['last_name'])))?>" >
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12 item <?=$artist_galleryRs['galleries_id']?>" 
                    id="artistId_<?=$artist_galleryRs["id"]?>" style="<? if($artist_galleryRs['galleries_id']==$id){ echo "display: inline-block; opacity: 1";   }else{  echo "opacity: 0"; } ?> ">
                  <div class="artist-img-blog">
                    <div class="tumb-img">
                      <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artist_galleryRs['profile_pic']?>" alt="<?=$artist_galleryRs['profile_pic']?>">
                      <div class="overlay"></div>
                    </div>
                    <p class="colour-black"><?=stripslashes($artist_galleryRs['first_name']." ".$artist_galleryRs['last_name'])?></p>
                  </div>
                </div>
              </a>
            <?php } ?>
         </div>
         </div>
        </div>
      </div>
    </div>
  </div>
<?php N2Native::beforeClosingBody(); ?>
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
<script src="<?=base_url()?>front_assets/js/jquery.mixitup.min.js"></script> 
<script type="text/javascript">
$(function(){
  
});
$('.carousel').carousel({
    interval: false //changes the speed
});
</script>

<script>
    
    
    
    $(document).ready(function() {
        $('#portfolio').find('a').hide();
        $('#portfolio').mixitup({
            targetSelector: '.item',
            transitionSpeed: 450
        });
        
      
        
    
		$("#filter-list li a").click(function(){ 
			if($(this).parent().hasClass("active")){
				$(this).removeClass("active");
			}
			else {	
				$(this).addClass("active");
			}
		});
		setTimeout(function(){ $($('.artistsect-tabs').find('a[data-filter="<?=$id?>"]')).trigger('click'); }, 1000);
		setTimeout(function(){ $('#portfolio').find('a').show();  var div = $('.tumb-img');
        var width = div.width();
    
        div.css('height', width);  }, 2000);
	});


</script>

<?php $this->load->view('mainsite/common/login-registration-common-js');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="<?=base_url()?>front_assets/js/bounceanimation3.js"></script>
	<script>
		var jq = $.noConflict();
	jq('.animate').scrolla({
		mobile: false,
		once: false
	});

</script>
</body>
</html>