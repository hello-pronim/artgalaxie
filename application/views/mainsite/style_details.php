<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('mainsite/common/top');?>
<style type="text/css">
.colour-black{
  color: #000;
}
</style>
<body >
<?php $this->load->view('mainsite/common/header');?>
<!-- Page Content -->
<div class="gallery-page-in">
  <div class="bg-white middle-tab-section">
    <div class="middle-tab-section-bg">
      <div class="container" data-aos="fade-up">
        
            <div class="style-page-in">
              <ul id="filter-list" class="nav nav-tabs artistsect-tabs text-center">  
              <?php 
              $i=0; 
              $brk=0; 
              foreach ($style_cat as $style_catRs)
              { 
              $brk++; 
              $i++;
              ?>         
                <li class=" tab<?=$i?>" >
                  <a class="filter <?php if($style_catRs['cat_id']==$styleId){ ?> active <?php } ?>" data-filter="<?=$style_catRs['cat_id']?>">
                    <?=ucfirst(stripslashes($style_catRs['cat_name']))?>
                  </a>
                   <?php /*
					$catnameslug = strtolower(str_replace(' ', '-', $style_catRs['cat_name']));
				  ?>
                  <a class="filter <?php if($style_catRs['cat_id']==$styleId){ ?> active <?php } ?>" href="<?=base_url?>style_details/<?=$style_catRs['cat_id']?>/<?=$catnameslug?>.html"><?=ucfirst(stripslashes($style_catRs['cat_name']))?></a> <?php */ ?>
                  </li>
              <?php 
              if($brk==4)
              { 
                  echo "<br>";
              }
                  
               }  ?>
              </ul>
            </div>
         
      </div>
    </div>
  </div>
 <div class="section bg-white" >
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div id="portfolio">
          <div class="row">
              
             
             <?php 
             foreach ($artist_style as $artist_styleRs) 
             { 
                if($artist_styleRs['style_id']!='')
                {
                  $strStyle1 = explode(',',$artist_styleRs['style_id']);
                  $strStyle = implode(' ', $strStyle1);
                }else{
                  $strStyle = '';
                }
                
                
             ?>
              <a href="<?=base_url('artists/details/'.$artist_styleRs['id'].'/'.$this->common->create_slug(stripslashes($artist_styleRs['first_name'].' '.$artist_styleRs['last_name'])))?>" >
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12 item <?=$strStyle?>" 
                    id="artistId_<?=$artist_styleRs["id"]?>" style="<? if($artist_styleRs['style_id']==$styleId){ echo "display: inline-block; opacity: 1";   }else{  echo "opacity: 0"; } ?> ">
                  <div class="artist-img-blog">
                    <div class="tumb-img">
                      <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artist_styleRs['profile_pic']?>" alt="<?=$artist_styleRs['profile_pic']?>">
                      <div class="overlay"></div>
                    </div>
                    <p class="colour-black"><?=stripslashes($artist_styleRs['first_name']." ".$artist_styleRs['last_name'])?></p>
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
<script>
    $('.carousel').carousel({
        interval: false //changes the speed
    })
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#portfolio').find('a').hide();
    $('#portfolio').mixitup({
        targetSelector: '.item',
        transitionSpeed: 450
    });
    
    <?php /*foreach ($artist_style as $artist_styleRs) {
      if($artist_styleRs['style_id']==$styleId){  ?>
      //$('#artistId_<?=$artist_styleRs["id"]?>').attr('style', 'display: inline-block; opacity: 1');
      $('#artistId_<?=$artist_styleRs["id"]?>').parents('a:eq(0)').show();
     <?php }else{ ?>
          //$('#artistId_<?=$artist_styleRs["id"]?>').attr('style', 'display: none;');      
     <? } }  */ ?>
    setTimeout(function(){ $($('.artistsect-tabs').find('a[data-filter="<?=$styleId?>"]')).trigger('click');  }, 1000);
    setTimeout(function(){ $('#portfolio').find('a').show();  }, 2000);
}); 

</script>
<? $this->load->view('mainsite/common/login-registration-common-js');?>
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