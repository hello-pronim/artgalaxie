<?php 
    $com_key = new  common(); 
    $gckey = $com_key->get_google_captcha_key();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=stripslashes($artistsData['first_name']." ".$artistsData['last_name'])?></title>
<meta property="og:site_name" content="Art Galaxie"/>
<meta property="og:title" content="<?=stripslashes($artistsData['first_name']." ".$artistsData['last_name'])?>"/>
<?php
 $fimg = stripslashes($artistsData['profile_pic']);
?>
<meta property="og:image" content="https://www.artgalaxie.com/uploads/user_profile_pic/<?php echo $fimg; ?>"/>
<?php 
$stat = substr($artistsData['biography'],0,300);
$ds = strip_tags($stat);
?>
<meta property="og:description" content="<?php echo $ds; ?>">
<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />
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
<script src='https://www.google.com/recaptcha/api.js'></script>   
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/jquery.spritezoom.js"></script>
<link type="text/css" rel="stylesheet" media="all" href="<?=base_url()?>front_assets/zoom/jquery.zbox.css" />
<style>
#wrapper { margin:30px auto; width:640px;}
#wrapper img { width:300px; height:200px; margin:10px; float:left;}
h1 { margin:30px auto; text-align:center;}
</style>
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
padding: 0;
}
</style>
<body >
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

<!-- Modal -->
<div class="modal fade cnt-form" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="contactartistform">
        <div class="form-main green-form-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUs">Contact Artist</h2>
           </div>
            <div id="contactUsFormId">
            <div id="contact_msg" class="text-center"></div>  
            <input type="text" class="form-control" placeholder="Name" name="contact_name" id="ca_contact_name"   >
            <input type="email" class="form-control" placeholder="Email" name="contact_email" id="ca_contact_email">
            <input type="text" class="form-control" placeholder="Artist Name" value="<?=stripslashes($artistsData['first_name']." ".$artistsData['last_name'])?>" name="artist_name" id="artist_name" >
            <textarea class="form-control" placeholder="Type your message here" name="contact_message" id="contact_message"></textarea>
           <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>"></div>
            </div>
            <div class="clearfix"></div><br>
            <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="ca_sub">Send</button>
             </div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- -->

<div class="modal fade cnt-form" id="myModalImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">  <div class="modal-dialog" role="document">
    <div class="modal-content">
       
        <div class="form-main xxgreen-form-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body text-center">
           <div class="xxcnt-frm-txt">
          <h2>Abdi TEst Record</h2>
            <div id="artistImage">
              <img src="<?=base_url?>uploads/artist-gallery/original/artist_art_587dbd160bae5.jpg" >
             </div>
               <div class="clearfix"></div>
            <?php 
    //$stringBio = preg_replace("/<span[^>]+\>/i", "",$artistsData['biography']);
    $stringBio = $artistsData['biography'];
    echo nl2br($stringBio); ?>
            
             <div class="text-center">
              <a class="dark-gray-btn blog-details-close-btn" href="javascript:void(0)" data-dismiss="modal" aria-label="Close"><span class="lt"></span>
                <span class="large-btn">Close</span><span class="rt"></span></a></div>
           </div>
          </div>
        </div>
       
    </div>
  </div>
</div>



  <? $this->load->view('mainsite/common/header');?>
  <div class="section listartist-section" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-header text-center" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true"><?=stripslashes($artistsData['first_name']." ".$artistsData['last_name'])?></h2>
        </div>
        
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="slider artist-profile-slider" data-aos="fade-up" data-aos-once="true">
           <div class=" section slider1-section new-slider dark-shadwoand-slider z-index2" >
                      <div data-aos="fade-up"  data-aos-once="true">
                        <div id="myCarousel3" class="carousel slide carousel-fade lg-arrow" > <!-- Indicators --> 

						<?php 
						array_shift($gallery);
						if(!empty($gallery)){ ?>
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                            <?php  $i3=0; foreach ($gallery as $slider3Rs){ $i3++; ?>
                            <div class="item <?php if($i3==1){ ?> active <?php } ?>">
                              <div class="fill"><img style="width:100%;max-height:980px;" src="<?=base_url()?>uploads/artist-gallery/original/<?=$slider3Rs['image_name']?>"></div>
                            </div>
                            <?php } ?>
                          </div>
                          <!-- Controls --> 
						  <?php if($i3>1){ ?>
                          <a class="left carousel-control" href="#myCarousel3" data-slide="prev"><span class="v-align"> <span><img src="<?=base_url()?>front_assets/images/slider-left-arow.png" alt=""/></span></span> </a>
						  <a class="right carousel-control" href="#myCarousel3" data-slide="next"> <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-right-arow.png" alt=""/></span></span> </a> 
						<?php }} ?>
						  </div>
                        </div>
                      </div>
                    
                     <div class="profile-social-link text-center">
                    	<a href="#" class="facebook-profile" target="_blank" id="fb-share"><i aria-hidden="true" class="fa fa-facebook fa-lg"></i></a> 
                    	<a href="#" class="pinterest-profile" id="pinterest-share"><i aria-hidden="true" class="fa fa-pinterest fa-lg"></i></a> 
						<a href="#" class="twitter-profile"  id="tweeter-share"><i aria-hidden="true" class="fa fa-twitter fa-lg"></i></a> 
                    	<a href="#" class="google-plus-profile"  id="gplus-share"><i aria-hidden="true" class="fa fa-google-plus fa-lg"></i></a>
                    	<a href="#" class="shopping-cart-profile"><i aria-hidden="true" class="fa fa-shopping-cart fa-lg"></i></a> 
                    </div>
                    
                <?php 
                if(!empty($nfgallery))
                { 
                ?>                  
                    <?php 
                    if(!empty($gallery) && !empty($nfgallery))
                    { 
                        $nfgallery = array_merge($gallery, $nfgallery); 
                    }
                    ?>
                    <?php 
                    if(empty($gallery) && !empty($nfgallery))
                    { 
                        //$nfgallery = array_merge($gallery, $nfgallery); 
                    }
                    ?>
                    <!--/////////////////////////////-->
                    <?php
                        $input_array = $nfgallery;
                        //echo "<pre>"; print_r($input_array); echo "</pre>";
                        //array_shift($input_array);
                        //echo "<pre>"; print_r($input_array); echo "</pre>";
                        $newgalleris=array_chunk($input_array, 10, true);
                        ?>				
                        <div class="slider artist-profile-slider" data-aos="fade-up" data-aos-once="true">
                        	<div class=" section slider1-section new-slider dark-shadwoand-slider z-index2" >
                        	  <div data-aos="fade-up"  data-aos-once="true">
                        		<div id="myCarousel2" class="carousel slide carousel-fade lg-arrow" > <!-- Indicators --> 
                        	
                        		  <!-- Wrapper for slides -->
                        		  <div class="carousel-inner">
                        			<?php  $ig=0; $igc=count($newgalleris); 
                        			for($iga=0;$iga<$igc;$iga++){ $ig++;  ?>
                        			
                        			<div class="item <?php if($ig==1){ ?> active <?php } ?>">
                        				<ul class="hide-bullets">
                        				<?php $myimg = 0;  $igc1=count($newgalleris[$iga]); 
                        				   foreach($newgalleris[$iga] as $galleryig[$iga]){ 
                        				    if($myimg > -1) {
                        				    ?>
                        				    <li class="col-xxs-2">
                                              <a class="zb" rel="group" href="<?=base_url()?>uploads/artist-gallery/original/<?=$galleryig[$iga]['image_name']?>" title="<?php if($galleryig[$iga]['image_title']==""){ echo "Title Not Define"; }else{ echo $galleryig[$iga]['image_title'];} ?>">
                                            	<img src="<?=base_url()?>uploads/artist-gallery/original/<?=$galleryig[$iga]['image_name']?>"/>
                                            	</a>
                                            </li>
                        				<?php 
                        					  }
                        					  $myimg++;
                        				   }
                        				?>
                        				</ul>
                        			</div>
                        			
                        				<?php } ?>
                        		  </div>
                        		  <!-- Controls --> 
                        		  <?php if($ig>1){ ?>
                        		  <!--<a class="left carousel-control" href="#myCarousel2" data-slide="prev"><span class="v-align"> <span><img src="<?=base_url()?>front_assets/images/slider-left-arow.png" alt=""/></span></span> </a>
                        		  <a class="right carousel-control" href="#myCarousel2" data-slide="next"> <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-right-arow.png" alt=""/></span></span> </a> -->
                        		<?php } ?>
                        		  </div>
                        		</div>
                        	  </div>	
                        </div>
                        <!--/////////////////////////////-->			      
                        
					<?php } ?>
                    <?php if($numGallery>10)
                    { 
                    ?>
                        <div class="static-arow">
                          <!-- Carousel nav -->
                          <a href="#myCarousel2" role="button" data-slide="prev">Prev</a>
                          <a href="#myCarousel2" role="button" data-slide="next">Next</a>
                        </div>
                    <?php 
                    } 
                    ?>
                  </div>
        </div>
        
      </div>
    </div>
  </div>
<!---->
<?php if(!empty($videos)){ ?>
<div class="section bg-white ptn pad-bot-40" data-aos="fade-up" data-aos-once="true">
  <div class="section listartist-section artist-profile-video-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="section-header text-center" data-aos="fade-up" data-aos-once="true"><?=stripslashes($artistsData['first_name']." ".$artistsData['last_name'])?> - Video </h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12" >
          <div class="slider artist-profile-slider artist-profile-video-slider" data-aos="fade-up" data-aos-once="true">
            <div id="slider2" class="flexslider flexslider-larg">
              <ul class="slides">
                <?php 
                    $video=0;     
                    foreach($videos as $videosRs)
                    {  
                    ?>
                        <li>
                            
                              <?php
                                $url = $videosRs['videos_link'];
                                $curl = preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                if($curl == '0')
                                {
                                ?>
                                    <iframe id="player_<?=$video?>" src="<?=$videosRs['videos_link']?>?rel=0" width="1043px" height="600px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                <?php
                                }
                                else
                                {
                                    preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                    $id = $matches[1];
                                    $width = '1043px';
                                    $height = '600px';
                                    ?>
                                    <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
                                    src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                    frameborder="0" allowfullscreen></iframe>
                                <?php
                                }
                                ?>
                                                    
                            
                        </li> 
                    
                    <?php 
                    $video++; 
                    } 
                    ?>
                </ul>
              </div>
              <br>
              <div id="carousel3" class="flexslider flexslider-thumb">
                <ul class="slides">
                   <?php $videoLib = new common();
                         foreach($videos as $videosRs2){
                         $video_arr = $videoLib->parseVideos($videosRs2['videos_link']);      ?>
                  <li><span class="flexslider-thumb-img">
                   <img src="<?=$video_arr[0]['thumbnail'];?>" alt=""></span> </li>
                  <?php  } ?>
                 </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php } ?>                       
<!----> 


<div class="middle-menu-section-bg no-pad" data-aos="fade-up" data-aos-once="true">
  <div class="middle-menu-section middle-menu-section-new artist-information-menu" >
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="middle-menu middle-menu-artists-detail">
            <ul class="nav nav-tabs">
                <?php if(nl2br($artistsData['essay'])!=""):?>
                <li ><a href="#tab6" class="midd-menu16" data-toggle="tab" aria-expanded="false">Essay</a></li>
                <?php endif;?>
                <?php if(nl2br($artistsData['biography'])!=""):?>
                <li ><a href="#tab1" class="midd-menu11" data-toggle="tab" aria-expanded="false">Biography</a></li>
                <?php endif;?>
                <?php if($artistsData['statement']!=''):?>
                <li ><a  href="#tab2" class="midd-menu12" data-toggle="tab" aria-expanded="false">Statement</a></li>
                <?php endif;?>
                <?php if($artistsData['exibition']!=''):?>
                <li ><a href="#tab3" class="midd-menu13" data-toggle="tab" aria-expanded="false">Exhibitions</a></li>
                <?php endif;?>
                <?php if($artistsData['awards']!=''):?>
                <li ><a href="#tab4" class="midd-menu14" data-toggle="tab" aria-expanded="false">Awards</a></li>
                <?php endif;?>
                <?php if($artistsData['publication']!=''): ?>
                <li ><a href="#tab5" class="midd-menu15" data-toggle="tab" aria-expanded="false">Publications</a></li>
                <?php endif;?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                        
<!---->
<div class="section bg-white" data-aos="fade-up" data-aos-once="true">
    <div class="container"> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane" id="tab6">
                <div class="row">
                    <div class="artist-information-section information-section-heding">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 col-xss-12">
                            <div class="artist-information-img">
                            <?php if($artistsData['profile_pic']!=''){ ?>
                                <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artistsData['profile_pic']?>" class="img-responsive" alt="">
                            <?php }else{ ?>
                                <img src="<?=base_url()?>front_assets/images/photo.jpg" class="img-responsive" alt="">
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 text-justify" >
                            <div class="biografhy-text expand artist-profile-details-cls">
                            <?php 
                            //$stringBio = preg_replace("/<span[^>]+\>/i", "",$artistsData['biography']);
                            $stringEssay = $artistsData['essay'];
                            echo nl2br($stringEssay); ?>
                            </div>
                        </div>
                        <div class="contact-artist pull-right">
                            <a href="#" data-toggle="modal" data-target="#myModal"><img src="<?=base_url()?>front_assets/images/artis-msg-imgt.png" alt=""> Contact Artist</a>
                        </div>
                        <!--<div class="clearfix">&nbsp;</div>-->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 col-xss-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 col-xss-12">
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab1">
                <div class="row">
                    <div class="artist-information-section information-section-heding">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 col-xss-12">
                            <div class="artist-information-img">
                            <?php if($artistsData['profile_pic']!=''){ ?>
                                <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artistsData['profile_pic']?>" class="img-responsive" alt="">
                            <?php }else{ ?>
                                <img src="<?=base_url()?>front_assets/images/photo.jpg" class="img-responsive" alt="">
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 text-justify" >
                            <div class="biografhy-text expand artist-profile-details-cls">
                            <?php 
                            //$stringBio = preg_replace("/<span[^>]+\>/i", "",$artistsData['biography']);
                            $stringBio = $artistsData['biography'];
                            echo nl2br($stringBio); ?>
                            </div>
                        </div>
                        <div class="contact-artist pull-right">
                            <a href="#" data-toggle="modal" data-target="#myModal"><img src="<?=base_url()?>front_assets/images/artis-msg-imgt.png" alt=""> Contact Artist</a>
                        </div>
                        <!--<div class="clearfix">&nbsp;</div>-->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 col-xss-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 col-xss-12">
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab2">
                <div class="row">
                    <div class="artist-information-section information-section-heding">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 col-xss-12">
                            <div class="artist-information-img">
                            <?php if($artistsData['profile_pic']!=''){ ?>
                                <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artistsData['profile_pic']?>" class="img-responsive" alt="">
                            <?php }else{ ?>
                                <img src="<?=base_url()?>front_assets/images/photo.jpg" class="img-responsive" alt="">
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 text-justify">
    
                            <div class="biografhy-text-state expand artist-profile-details-cls">
                            <?php 
                            $stringState = $artistsData['statement'];
                            //$stringState = preg_replace("/<span[^>]+\>/i", "",$artistsData['statement']);
                            $stringState = $artistsData['statement'];
                            echo nl2br($stringState); ?>
                            </div>
                        </div>
                        <div class="contact-artist pull-right">
                            <a href="#" data-toggle="modal" data-target="#myModal"><img src="<?=base_url()?>front_assets/images/artis-msg-imgt.png" alt=""> Contact Artist</a>
                        </div>
                        <!--<div class="clearfix">&nbsp;</div> -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 col-xss-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 col-xss-12">
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab3">
                <div class="row">
                    <div class="artist-information-section information-section-heding">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 col-xss-12">
                            <div class="artist-information-img">
                            <?php if($artistsData['profile_pic']!=''){ ?>
                                <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artistsData['profile_pic']?>" class="img-responsive" alt="">
                            <?php }else{ ?>
                                <img src="<?=base_url()?>front_assets/images/photo.jpg" class="img-responsive" alt="">
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 text-justify">
                            <div class="biografhy-text-exhibition expand artist-profile-details-cls"><?php 
                                //$stringExhi = preg_replace("/<span[^>]+\>/i", "",$artistsData['exibition']);
                                $stringExhi = $artistsData['exibition'];
                                echo nl2br($stringExhi); ?>
                            </div>
                        </div>
                        <div class="contact-artist pull-right">
                            <a href="#" data-toggle="modal" data-target="#myModal"><img src="<?=base_url()?>front_assets/images/artis-msg-imgt.png" alt=""> Contact Artist</a>
                        </div>
                        <!--<div class="clearfix">&nbsp;</div>-->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 col-xss-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 col-xss-12">
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab4">
                <div class="row">
                    <div class="artist-information-section information-section-heding">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 col-xss-12">
                            <div class="artist-information-img">
                            <?php if($artistsData['profile_pic']!=''){ ?>
                                <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artistsData['profile_pic']?>" class="img-responsive" alt="">
                            <?php }else{ ?>
                                <img src="<?=base_url()?>front_assets/images/photo.jpg" class="img-responsive" alt="">
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 text-justify">
                            <div class="biografhy-text-award expand artist-profile-details-cls">
                            <?php 
                            //$stringAward = preg_replace("/<span[^>]+\>/i", "",$artistsData['awards']);
                            $stringAward = $artistsData['awards'];
                            echo nl2br($stringAward); ?>
                            </div>
                        </div>
                        <div class="contact-artist pull-right">
                            <a href="#" data-toggle="modal" data-target="#myModal"><img src="<?=base_url()?>front_assets/images/artis-msg-imgt.png" alt=""> Contact Artist</a>
                        </div>
                        <!--<div class="clearfix">&nbsp;</div>-->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 col-xss-12">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 col-xss-12">
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="tab5">
                <div class="row">
                    <div class="artist-information-section information-section-heding">
                        <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3 col-xss-12">
                            <div class="artist-information-img">
                            <?php if($artistsData['profile_pic']!=''){ ?>
                                <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artistsData['profile_pic']?>" class="img-responsive" alt="">
                            <?php }else{ ?>
                                <img src="<?=base_url()?>front_assets/images/photo.jpg" class="img-responsive" alt="">
                            <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12 text-justify">
                            <div class="biografhy-text-publication expand artist-profile-details-cls">
                            <?php 
                            //$stringPubli = preg_replace("/<span[^>]+\>/i", "",$artistsData['publication']);
                            $stringPubli = $artistsData['publication'];
                            echo nl2br($stringPubli); ?>
                            </div>
                        </div>
                    </div>
                    <div class="contact-artist pull-right">
                        <a href="#" data-toggle="modal" data-target="#myModal"><img src="<?=base_url()?>front_assets/images/artis-msg-imgt.png" alt=""> Contact Artist</a>
                    </div>
                    <!--<div class="clearfix">&nbsp;</div>-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-5 col-xss-12">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-7 col-xss-12">
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

<!-- Script to Activate the Carousel --> 

<!-- FlexSlider --> 

<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider.js"></script> 

<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script>
  <script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script>
    <script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<script type="text/javascript">
    
  //function bsCarouselAnimHeight() {
    $('#myCarousel').carousel({
        interval: 5000
    });
//}


  </script> 
  
 
<script type="text/javascript">
    
   $(window).load(function(){
      $('#carousel3').flexslider({
       directionNav: false,  
        itemWidth: 348,
        itemMargin: 0,
        asNavFor: '#slider2'
    
    
      });

      $('#slider2').flexslider({
        animation: "fade",
    directionNav: false,  
        controlNav: false,
        animationLoop: false,
        slideshow: false,
    smoothHeight: false,
        sync: "#carousel3",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script> 
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script>
        <script type="text/javascript">
  
    $(window).load(function(){

      // Vimeo API nonsense
      var player = document.getElementById('player_1');
      $f(player).addEvent('ready', ready);

      function addEvent(element, eventName, callback) {
        (element.addEventListener) ? element.addEventListener(eventName, callback, false) : element.attachEvent(eventName, callback, false);
      }

      function ready(player_id) {
        var froogaloop = $f(player_id);

        froogaloop.addEvent('play', function(data) {
          $('.flexslider').flexslider2("pause");
        });

        froogaloop.addEvent('pause', function(data) {
          $('.flexslider').flexslider2("play");
        });
      }


      // Call fitVid before FlexSlider initializes, so the proper initial height can be retrieved.
      $(".flexslider")
        .fitVids()
        .flexslider2({
          animation: "slide2",
          useCSS: false,
          animationLoop: false,
          smoothHeight: true,
          start: function(slider2){
            $('body').removeClass('loading');
          },
          before: function(slider2){
            $f(player).api('pause');
          }
      });
    });
  </script>
   <script>
     jQuery(document).ready(function($) {
 
        $('#myCarousel').carousel({
                interval: 5000
        });
 
        //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
        var id_selector = $(this).attr("id");
        try {
            var id = /-(\d+)$/.exec(id_selector)[1];
            console.log(id_selector, id);
            jQuery('#myCarousel').carousel(parseInt(id));
        } catch (e) {
            console.log('Regex failed!', e);
        }
    });
        // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
                 var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
        });
});
   </script>
  
        
<script type="text/javascript">
//var jqq = jQuery.noConflict();
$(document).ready(function() {
    $('#myCarousel2').each(function(){
        $(this).carousel({
            pause: true,
            items:10,
            interval: false
        });
    });
});
</script>
<script src="<?=base_url()?>front_assets/js/readmore.js"></script>


<script type="text/javascript">
$('#contactartistform').submit(function(e)
{
    var contact_name    = $('#ca_contact_name').val();
    var contact_email   = $('#ca_contact_email').val();
    var contact_message = $('#contact_message').val();
    var artist_name     = $('#artist_name').val();
    
    if(contact_name=='')
    {
        $('#contact_msg').html('<span class="text-danger">Please enter name.</span>');
        $('#ca_contact_name').focus();
        return false
    }
    if(contact_email=='')
    {
        $('#contact_msg').html('<span class="text-danger">Please enter email address.</span>');
        $('#ca_contact_email').focus();
        return false
    }
    if(contact_message=='')
    {
        $('#contact_msg').html('<span class="text-danger">Please enter message.</span>');
        $('#contact_message').focus();
        return false
    }
    
    jQuery.ajax({
        type: "POST",
        url: "<?=site_url('artists/artist_contact_email')?>",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        success:  function(data)
        { 
            if(data=='done')
            {
                $('#contact_name').val('')
                $('#contact_email').val('')
                $('#contact_message').val('')
                $('#contact_msg').html('<span class="text-success">Mail sent successfully!!</span>');
            }
            else
            {
                $('#contact_msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
            }
        }
    });
});
</script>

<? $this->load->view('mainsite/common/login-registration-common-js');?>
<!-- Share on socila media -->
<script type="text/javascript">
$("#fb-share").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(document.URL) + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
$("#tweeter-share").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/intent/tweet?text=%20Check%20up%20this%20awesome%20content" + encodeURIComponent(document.title) + ':%20 ' + encodeURIComponent(document.URL),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
$("#gplus-share").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url=" + encodeURIComponent(document.URL),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
$("#pinterest-share").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});
//$("#tweeter-share").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
//$("#fb-share").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+encodeURIComponent(n)+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
//$("#gplus-share").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
</script>  

<!--<script>
var after=2000;
var html = $(".biografhy-text").html();
html = html.substring(0, after) + "<span class='read-more-content'>" + html.substring(after)+"</span>";
$(".biografhy-text").html(html);
</script>
<script>
var after=2000;
var html2 = $(".biografhy-text-state").html();
html_state = html2.substring(0, after) + "<span class='read-more-content'>" + html2.substring(after)+"</span>";
$(".biografhy-text-state").html(html_state);
</script>
<script>
var after=2000;
var html3 = $(".biografhy-text-exhibition").html();
html_exhi = html3.substring(0, after) + "<span class='read-more-content'>" + html3.substring(after)+"</span>";
$(".biografhy-text-exhibition").html(html_exhi);
</script>
<script>
var after=2000;
var html4 = $(".biografhy-text-award").html();
html_award = html4.substring(0, after) + "<span class='read-more-content'>" + html4.substring(after)+"</span>";
$(".biografhy-text-award").html(html_award);
</script>
<script>
var after=2000;
var html5 = $(".biografhy-text-publication").html();
html_publication = html5.substring(0, after) + "<span class='read-more-content'>" + html5.substring(after)+"</span>";
$(".biografhy-text-publication").html(html_publication);
</script>



<script>
  // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
$('.read-more-content').addClass('hide')

// Set up a link to expand the hidden content:
.before('<a class="read-more-show read-more-top-space" href="#">Read More</a>')
  
// Set up a link to hide the expanded content.
.append(' <a class="read-more-hide read-more-top-space" href="#">Read Less</a>');

// Set up the toggle effect:
$('.read-more-show').on('click', function(e) {
  $(this).next('.read-more-content').removeClass('hide');
  $(this).addClass('hide');
  e.preventDefault();
});

$('.read-more-hide').on('click', function(e) {
  $(this).parent('.read-more-content').addClass('hide').parent().children('.read-more-show').removeClass('hide');
  e.preventDefault();
});
  </script>-->
  
 <script type="text/javascript">
/*
  jQuery(function(){

    var biografhy = $('.expand');
    
    biografhy.each(function(){    
        var t = $(this).text(); 
        /*var wordsCount = t.split(' ').length;  */
          
/*        if(t.length < 1000) return;
        
        $(this).html(
            t.slice(0,1000)+'<span> </span><a href="#" style="width: 50%;float: left;text-align: left;margin-top:15px;" class="more read-more-hide">Read More</a>'+
            '<span style="display:none;">'+ t.slice(1000,t.length)+' <a href="#" style="width: 50%;float: left;text-align: left;margin-top:15px;" class="less read-more-hide">Read Less</a></span>'
        );
        
    }); 
    
    $('a.more', biografhy).click(function(event){
        event.preventDefault();
        $(this).hide().prev().hide();
        $(this).next().show();        
    });
    
    $('a.less', biografhy).click(function(event){
        event.preventDefault();
        $(this).parent().hide().prev().show().prev().show();    
    });

});*/
  </script>

    <!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
    
    <script type="text/javascript" src="<?=base_url()?>front_assets/zoom/jquery.zbox.js"></script>
    <script type="text/javascript">
      
       jQuery(document).ready(function(){
        jQuery(".zb").zbox( { margin:40 } );
      });
     
    </script>
  
    <script>
        if($(".middle-menu-artists-detail .nav li").length>0)
            $(".middle-menu-artists-detail .nav li:first-child a").trigger('click');
    </script>
</body>
</html>