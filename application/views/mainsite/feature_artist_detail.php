<!DOCTYPE html>
<html lang="en">
<? $this->load->view('mainsite/common/top');?>
<style type="text/css">
.comment {
  
}
a.morelink {
  text-decoration:none;
  outline: none;
}
.morecontent span {
  display: none;

}
.read-more-show, .read-more-hide {
    display: block;
    padding: 0; margin:20px 0px;
}
/* .ques-txt{
 -moz-column-width: 25em;
 -webkit-column-width: 25em;
 -moz-column-gap: 4.5em;
 -webkit-column-gap: 4.5em;
} */
.ques-txt .col-sm-6.inner-text16 {
 display: inline-block;
 width: 100%;
 margin: 0 0 25px 0;
}
.ques-txt .inner-text18{
    padding-bottom:10px;
}
.biografhy-text strong { font-weight:normal; }
.read-moreint{
	cursor: pointer;
    font-weight: bold;
    padding: 0;
    color: #3093b1;
    margin: 0;
    position: relative;
    top: 15px;
    border-radius: 7px;
}
.read-more {
    padding: 10px 0 !important;color:#3093b1 !important;}
</style>
<body >
<? $this->load->view('mainsite/common/header');?>
<!-- Page Content -->

<div class="section featured-section posit-relative light-shadwoand">
  <div class="container" >
    <div data-aos="fade-up"  data-aos-once="true">
      <h2 class="section-header text-center" data-aos="fade-up"  data-aos-once="true">Featured Artist<br>
        <div class="artist-name" data-aos="fade-up" data-aos-delay="1000"  data-aos-once="true"><?=stripslashes($featureArtist['first_name'].' '.$featureArtist['last_name'])?></div>
      </h2>
    </div>
    <div class="row">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 inner-text16" data-aos="fade-up" data-aos-delay="1500"  data-aos-once="true" data-aos-easing="ease">
            <div class="text short biografhy-text">
                <?php echo nl2br($featureArtist['featured_desc']) ?>
            </div>
            <span class="read-more" id="short">Read more</span>
            <span class="read-more" id="full" style="display:none;">Read less</span>
        <!--<div class="biografhy-text">
        <?php //$stringAward = preg_replace("/<span[^>]+\>/i", "",$featureArtist['featured_desc']);
            //$stringAward2 = preg_replace("/<span/i", "<strong",$featureArtist['featured_desc']);
            //$stringAward =  preg_replace("/span/i", "strong",$stringAward2);
            //echo $featureArtist['featured_desc'];
        ?>
        <span class="read-more">readmore</span>
        </div>-->
        
      </div>
     </div>
  </div>
  </div>
</div>
<?php if(!empty($artWorkGallery)){ ?>

<div class="section section-artist-block">
  <div class="container" >
   <h2 data-aos="fade-up"  data-aos-once="true" data-aos-delay="1000" data-aos-easing="ease" class="section-header text-center color-fff">Artwork Gallery<br>  </h2>
     <div class="top-slider" data-aos="fade-up" data-aos-delay="1000" data-aos-easing="ease"  data-aos-once="true">
      <div id="myCarousel1" class="carousel slide carousel-fade lg-arrow" >   <!-- Indicators -->
          <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <?php $i=0; foreach ($artWorkGallery as $artWorkGalleryRs){ $i++; ?>
                <div class="item <? if($i==1){ ?> active <?php } ?>">
                  <div class="fill">
                    <img src="<?=base_url()?>uploads/artist_images/<?=$artWorkGalleryRs['image_name']?>" alt=""/>
                  </div>
                </div>
                <?php } ?>
           </div>
             <?php if(count($artWorkGallery)>1){ ?>
    <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-left-arow.png" alt=""/></span></span>
            </a>
            <a class="right carousel-control" href="#myCarousel1" data-slide="next">
               <span class="v-align"> <span><img src="<?=base_url()?>front_assets/images/slider-right-arow.png" alt=""/></span></span>
            </a>
            <?php } ?>
    </div>
</div>
<div class="text-center mar-top-50" data-aos="fade-up"  data-aos-once="true">
  <a href="<?=site_url('artists/details/'.$userId.'/'.$this->common->create_slug($featureArtist['first_name'].'-'.$featureArtist['last_name']))?>" class="dark-gray-btn"><span class="lt"></span><span>View artist profile page</span><span class="rt"></span></a>
</div>
 </div>
</div>
<?php } ?>
<?php if(!empty($insideTheStudio)){ ?>
<div class="section section-green">
  <div class="container">
   <h2 data-aos="fade-up"  data-aos-once="true" class="section-header text-center color-fff">Inside the Studio<br></h2>
      <div class="inner-text16 color-fff" data-aos="fade-up">
      <?=stripslashes(nl2br($featureArtist['feature_inside_the_studio_desc']))?>
      </div><br>
      <br>
      <div class="top-slider" data-aos="fade-up"  data-aos-once="true">
        <div id="myCarousel3" class="carousel slide carousel-fade lg-arrow" >   <!-- Indicators -->
         <!-- Wrapper for slides -->
        <div class="carousel-inner">
           <?php $j=0; foreach ($insideTheStudio as $insideTheStudioRs){ $j++; ?>
            <div class="item <? if($j==1){ ?> active <?php } ?>">
                <div class="fill">
                  <img src="<?=base_url()?>uploads/artist_images/<?=$insideTheStudioRs['image_name']?>" alt=""/>
                </div>
            </div>
         <?php } ?>    
        </div>
        <!-- Controls -->
        <?php  if(count($insideTheStudio)>1){ ?>
        <a class="left carousel-control" href="#myCarousel3" data-slide="prev">
           <span class="v-align"> <span><img src="<?=base_url()?>front_assets/images/slider-left-arow.png" alt=""/></span></span>
        </a>
        <a class="right carousel-control" href="#myCarousel3" data-slide="next">
            <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-right-arow.png" alt=""/></span></span>
        </a>
        <?php } ?>
 </div>
</div>
 </div>
</div>
<?php } ?>
<?php if(!empty($interview)){ ?>

 <!-- <div class="art-critic-bot-border">&nbsp;</div> -->
<div class="section bg-white">
    <div class="container intervsec"> 
   <h2 data-aos="fade-up"  data-aos-once="true" class="section-header text-center">Featured Artist Interview</h2>
    <div class="text short">
        <div class="ques-txt inner-text16" data-aos="fade-up"  data-aos-once="true">
            <div class="masonry bordered">
                <article>
					<section>
					<h1>
						<?php  
							$question0 = preg_replace("/<span[^>]+\>/i", "",$interview[0]['question']);
							echo ($question0);  
						?>
					</h1>
					<p>	<?php
                        $answer0 = preg_replace("/<span[^>]+\>/i", "",$interview[0]['questions_answer']);
                        echo ($answer0); 
						?>
					</p>	
					</section>
				
                <?php if( !empty($interview2[1]) && $interview2[1]!='')
                { 
					for($j=1; $j<count($interview2); $j++) 
					{ 
					?>
						<section>
							<h1>
								<?php  
									$question2 = preg_replace("/<span[^>]+\>/i", "",$interview2[$j]['question']);
									echo ($question2);  
								?>
								</h1>
							<p>
							<?php
								$answer2 = preg_replace("/<span[^>]+\>/i", "",$interview2[$j]['questions_answer']);
								echo ($answer2); 
							?>
							</p>
						</section>
					<?php 
					}  
				}
				?>
			</article>
            </div>
        </div>
    </div>
        
    <span class="read-moreint" id="shortint">Read more</span>
    <span class="read-moreint" id="fullint" style="display:none;">Read less</span>
        
</div>
    </div>
</div>
<?php 
}   
?>


<?php if($featureArtist['feature_video']!=''){ ?>
<div class="section section-artist-block">
  <div class="container">
   <h2 data-aos="fade-up"  data-aos-once="true" class="section-header text-center color-fff">Video
    </h2>
      <div class="video-box" data-aos="fade-up"  data-aos-once="true">
     <div class="embed-responsive embed-responsive-4by3"> 
        <?php if($featureArtist['type']=='video'){ ?>
         <video height="100%" width="100%" controls >
            <source src="<?=base_url()?>uploads/artist_video/<?=$featureArtist['feature_video']?>" type="video/mp4">
        </video>
                
        <?php }else if($featureArtist['type']=='url'){ ?>
        <iframe height="100%" width="100%" frameborder="0" src="<?=$featureArtist['feature_video']?>"></iframe>
        <?php } ?>
      </div>
</div>
<br>
<br>
</div>
</div>
<?php }?>
<div class="section section-orange">
<div class="container">
<div class="text-center" data-aos="fade-up"  data-aos-once="true"><a href="<?=site_url('feature_artists')?>" class="dark-gray-btn"><span class="lt"></span><span>See more of our Featured Artists</span><span class="rt"></span></a></div>
</div>
</div>

<? $this->load->view('mainsite/common/footer');?>
<!-- /.container --> 
<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
<!-- Script to Activate the Carousel --> 
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script> 


<script type="text/javascript" src="<?=base_url()?>front_assets/js/jquery.waterwheelCarousel.js"></script> 
<script type="text/javascript">
      var jss = jQuery.noConflict();
      jss(document).ready(function () {
        var carousel = jss("#carousel").waterwheelCarousel({
          flankingItems: 3,
          movingToCenter: function ($item) {
            jss('#callback-output').prepend('movingToCenter: ' + $item.attr('id') + '<br/>');
          },
          movedToCenter: function ($item) {
            jss('#callback-output').prepend('movedToCenter: ' + $item.attr('id') + '<br/>');
          },
          movingFromCenter: function ($item) {
            jss('#callback-output').prepend('movingFromCenter: ' + $item.attr('id') + '<br/>');
          },
          movedFromCenter: function ($item) {
            jss('#callback-output').prepend('movedFromCenter: ' + $item.attr('id') + '<br/>');
          },
          clickedCenter: function ($item) {
            jss('#callback-output').prepend('clickedCenter: ' + $item.attr('id') + '<br/>');
          }
        });

        jss('#prev').bind('click', function () {
          carousel.prev();
          return false
        });

        jss('#next').bind('click', function () {
          carousel.next();
          return false;
        });

        jss('#reload').bind('click', function () {
          newOptions = eval("(" + jss('#newoptions').val() + ")");
          carousel.reload(newOptions);
          return false;
        });

      });
    </script> 

<!-- FlexSlider --> 
<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider.js"></script> 
<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider2.js"></script> 
<script type="text/javascript">

    (function() {

      // store the slider in a local variable
      var $window = $(window),
          flexslider;

      // tiny helper function to add breakpoints
      function getGridSize() {
        return (window.innerWidth < 500) ? 1 :
         (window.innerWidth < 600) ? 2 :
               (window.innerWidth < 900) ? 3 : 3;
      }

      $(function() {
        //SyntaxHighlighter.all();
      });

      $window.load(function() {
        $('.flexslider').flexslider({
          animation: "slide",
          animationSpeed: 400,
          animationLoop: false,
          itemWidth: 210,
          itemMargin: 5,
          minItems: getGridSize(), // use function to pull in initial value
          maxItems: getGridSize(), // use function to pull in initial value
          start: function(slider){
            $('body').removeClass('loading');
            flexslider = slider;
          }
        });
      });

      // check grid size on resize event
      $window.resize(function() {
        var gridSize = getGridSize();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
      });
    }());


  </script> 
<script type="text/javascript">

    (function() {

      // store the slider in a local variable
      var $window = $(window),
          flexslider2;

      // tiny helper function to add breakpoints
      function getGridSize() {
        return (window.innerWidth < 550) ? 1 :
         (window.innerWidth < 767) ? 2 :
               (window.innerWidth < 991) ? 3 : 4;
      }

      $(function() {
        //SyntaxHighlighter.all();
      });

      $window.load(function() {
        $('.flexslider2').flexslider({
          animation: "slide",
          animationSpeed: 400,
          animationLoop: false,
          itemWidth: 210,
          itemMargin: 5,
          minItems: getGridSize(), // use function to pull in initial value
          maxItems: getGridSize(), // use function to pull in initial value
          start: function(slider){
            $('body').removeClass('loading');
            flexslider2 = slider;
          }
        });
      });

      // check grid size on resize event
      $window.resize(function() {
        var gridSize = getGridSize();

        flexslider2.vars.minItems = gridSize;
        flexslider2.vars.maxItems = gridSize;
      });
    }());
</script> 
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 

<script>
  AOS.init({
    easing: 'ease-out-back',
    duration: 1500
  });
</script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script>
$(document).ready(function(){    
    $(".read-more").click(function(){        
        var $elem = $(this).parent().find(".text");
        if($elem.hasClass("short"))
        {
            $elem.removeClass("short").addClass("full");
            $('#short').css({'display':'none'});
            $('#full').css({'display':'inline-block'});
        }
        else
        {
            $elem.removeClass("full").addClass("short");
            $('#short').css({'display':'inline-block'});
            $('#full').css({'display':'none'});
        }       
    });
});
</script>
<script>
$(document).ready(function(){    
    $(".read-moreint").click(function(){        
        var $elem = $(this).parent().find(".text");
        if($elem.hasClass("short"))
        {
            $elem.removeClass("short").addClass("full");
            $('#shortint').css({'display':'none'});
            $('#fullint').css({'display':'inline-block'});
        }
        else
        {
            $elem.removeClass("full").addClass("short");
            $('#shortint').css({'display':'inline-block'});
            $('#fullint').css({'display':'none'});
        }       
    });
});
</script>
<style>


.text.short {
    height: 630px;
    overflow: hidden;
}
 .text.full {
    
}
.read-more {
   cursor: pointer;
    display: inline-block;
    font-weight: bold;
    padding: 7px;
    color: #1402fd;
    margin: 2px;
    border-radius: 7px;
}
}
</style>

<? $this->load->view('mainsite/common/login-registration-common-js'); ?>

</body>
</html>
