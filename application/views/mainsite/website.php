<?php
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
?>
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
  <meta name="description" content="<?=stripslashes($cmsData['meta_description'])?>">
  <meta name="keywords" content="<?=stripslashes($cmsData['meta_keyword'])?>">
  <meta name="author" content=""> 
  <title><?=SITENAME?> - <?=stripslashes($cmsData['meta_title'])?> </title>

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
<script src='https://www.google.com/recaptcha/api.js'></script>           
</head>

      <body>
        <? $this->load->view('mainsite/common/header');?>
        
          <!--banner-->
          <div class="top-slider image-with-video-slider" data-aos="fade-up">
          <div class="container">
              
                <?php N2SmartSlider(28); ?>
    <?php N2Native::beforeClosingBody(); ?>
    
    
     <?php /* ?>
     
            <div id="myCarousel" class="carousel slide carousel-fade" > <!-- Indicators -->
              
              <ol class="carousel-indicators">
                <?php for($i=0;$i<count($sliderData);$i++){ ?>
                <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
                <?php } ?>
               <!--  <li data-target="#myCarousel" data-slide-to="1"></li> -->
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
            <?php */ ?>
            
          </div>
          </div>
         

        <div class="gallery-page-in "> 
          
          <!--page midd Content-->
          <div class="listartist-section dark-shadwoand-bot-border bg-color-orchid bord-none" >
            <div class="container" data-aos="fade-up" data-aos-once="true">
              <div class="vedio-page-disc">
                <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
                <div class="text text-center color-fff video-txt" data-aos="fade-up" data-aos-once="true" >
                  <p><?=nl2br(stripslashes($cmsData['page_desc']))?></p></div>
                </div>
              </div>
            </div>
            <div class="orchid-box-btn  z-index1">
              <div data-aos-once="true" data-aos="fade-up" class="text-center"><a class="dark-gray-btn enquire_now2" href="#"  data-toggle="modal" data-target="#myModalwebsite"><span class="lt"></span><span class="large-btn">Let's Start</span><span class="rt"></span></a></div>
            </div>
            <!--page midd Content End--> 
            
            <!--Exibition Pakages-->
            <div class="exibition-packages mapsection didyou-sect">
              <div class="container" data-aos="fade-up" data-aos-once="true">
			  <img src="<?=base_url()?>uploads/website/<?=$section1[0]['desc_image']?>" alt="<?=$section1[0]['desc_image']?>"/> 
                <div class="website-left-txt">
                <h3 class="colorpurple"><?=stripslashes($section1[0]['title'])?></h3>
                  <div data-aos="fade-up" data-aos-once="true"><p><?=nl2br(stripslashes($section1[0]['description']))?></p>
                  </div></div>
                  </div>
                </div>
                <!-- <div class="sliderbot-sect bg-purple z-index1">&nbsp;</div> -->
                
                <!--what we can offer-->
                <div class="exibition-packages mapsection what_we_can_offer">
					<div class="container" data-aos="fade-up" data-aos-once="true">
					<img src="<?=base_url()?>uploads/website/<?=$section1[1]['desc_image']?>" alt="<?=$section1[1]['desc_image']?>"/> 
					<div class="website-left-txt">
					<h3 class="colorpurple"><?=stripslashes($section1[1]['title'])?></h3>
					<div data-aos="fade-up" data-aos-once="true"><p><?=nl2br(stripslashes($section1[1]['description']))?></p>
					</div></div>
					</div>
                </div>
               <!-- <div class="sliderbot-sect bg-purple z-index1">&nbsp;</div> -->
                
                <!--Our Price -->                  
                  <div class="middle-tab-section-bg dark-gray-bg shadow-none">
                    <div data-aos-once="true" data-aos="fade-up" class="container aos-init aos-animate">
                      <h3 class="color-fff"><?=stripslashes($section1[3]['title'])?></h3>
                    </div>
                  </div>
                  <div class=" bg-white otherimp-fact"><br>
                    <br>
                    <br>
                    <div class="container">  
                      <div>
                        <div class="row">
                          <div class="col-sm-4">
                            <div class="mrt-content-box mrt-box1" data-aos="fade-up" data-aos-once="true">
                              <div class="mrt-box-img">
                                <img src="<?=base_url()?>uploads/website/<?=$section1[4]['desc_image']?>" alt="<?=$section1[4]['desc_image']?>"/> </div>
                              <div class="mrt-box-txt">
                                <h4><?=stripslashes($section1[4]['title'])?></h4>
                                <p><?=nl2br(stripslashes($section1[4]['description']))?></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mrt-content-box mrt-box2" data-aos="fade-up" data-aos-once="true">
                              <div class="mrt-box-img">
                                <img src="<?=base_url()?>uploads/website/<?=$section1[5]['desc_image']?>" alt="<?=$section1[5]['desc_image']?>"/> </div>
                              <div class="mrt-box-txt">
                                <h4><?=stripslashes($section1[5]['title'])?></h4>
                                <p><?=nl2br(stripslashes($section1[5]['description']))?></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-4">
                            <div class="mrt-content-box mrt-box3" data-aos="fade-up" data-aos-once="true">
                              <div class="mrt-box-img">
                                <img src="<?=base_url()?>uploads/website/<?=$section1[6]['desc_image']?>" alt="<?=$section1[6]['desc_image']?>"/> </div>
                              <div class="mrt-box-txt">
                                <h4><?=stripslashes($section1[6]['title'])?></h4>
                                <p><?=nl2br(stripslashes($section1[6]['description']))?></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>

                    </div>
                    <div class="bg-white">
                     <div class="container"> 
                      <div class="marketstrategy-content app-section" style="display:none;">
                        <div class="row imgandtxt">
                          <div class="col-sm-6">
                            <div class="marketst-txt" data-aos="fade-up" data-aos-once="true">
                              <h2><?=stripslashes($section1[7]['title'])?></h2>
                              <h4><?=stripslashes($section1[7]['sub_title'])?></h4>
                              <div class="mrkt-txt">
                                <p><?=nl2br(stripslashes($section1[7]['description']))?></p>
                                  </div>
                                </div>
                              </div>

                              <div class="col-sm-6 ">
                                <img src="<?=base_url()?>uploads/website/<?=$section1[7]['desc_image']?>" alt="<?=$section1[7]['desc_image']?>" class="mar-top-40"  /> </div>
                              </div>
                              
                              <div class="mrt-content-boxes">
                                <div class="row">
                                  <div class="col-sm-4">
                                    <div class="mrt-content-box mrt-box1" data-aos="fade-up" data-aos-once="true">
                                     
                                      <div class="mrt-box-txt pad-top0">
                                        <h4><?=stripslashes($section1[8]['title'])?></h4>
                                        <p><?=nl2br(stripslashes($section1[8]['description']))?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="mrt-content-box mrt-box2" data-aos="fade-up" data-aos-once="true">
                                        
                                        <div class="mrt-box-txt pad-top0">
                                          <h4><?=stripslashes($section1[9]['title'])?></h4>
                                          <p><?=nl2br(stripslashes($section1[9]['description']))?></p>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-4">
                                      <div class="mrt-content-box mrt-box3" data-aos="fade-up" data-aos-once="true">
                                       
                                        <div class="mrt-box-txt pad-top0">
                                          <h4><?=stripslashes($section1[10]['title'])?></h4>
                                          <p><?=nl2br(stripslashes($section1[10]['description']))?></p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div><br>
                              <br>
                              <br>
                              <br>
                            </div>
                          </div>
						<div class="section content-gray-bg bottom-shadow our-price-tbl text-center 11">
                  <div class="container" data-aos="fade-up" data-aos-once="true">
                    <h3><?=stripslashes($section1[2]['title'])?></h3>
                    <div data-aos="fade-up" data-aos-once="true"><?=stripslashes($section1[2]['description'])?></div>
                      <div class="img-box" data-aos="fade-up" data-aos-once="true">
                        <img src="<?=base_url()?>uploads/website/<?=$section1[2]['desc_image']?>" alt="<?=$section1[2]['desc_image']?>"/></div>
                    </div>
                  </div>
				  <div class="orchid-box-btn  z-index1" style="box-shadow: inset 0 0 20px #000;">
              <div data-aos-once="true" data-aos="fade-up" class="text-center"><a class="dark-gray-btn enquire_now2" href="#"  data-toggle="modal" data-target="#myModalwebsite"><span class="lt"></span><span class="large-btn">Let's Start</span><span class="rt"></span></a></div>
            </div>
		</div>

<!-- /.container --> 


<!-- Modal -->
<div class="modal fade cnt-form" id="myModalwebsite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main form-color2">
          <button type="button" class="close" style="background:#62486f;" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUs">Website Enquiry</h2>
            </div>
            <div id="contactUsFormId">
            <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="website_contact_name" id="website_contact_name"  >
            <input type="text" class="form-control" placeholder="Email" name="website_contact_email" id="website_contact_email" >
            <select class="form-control" name="package_id" id="package_id">
              <option value="">Select Package</option>
              <option value="Package 1">Package 1</option> 
              <option value="Package 2">Package 2</option> 
               <option value="Package 3">Package 3</option> 
              <option value="Package 4">Package 4</option> 
              <option value="Package 5">Package 5</option> 
              <option value="Other">Other</option> 
            </select>
            <textarea class="form-control" placeholder="Please feel free to tell us more of what you envision for your website" name="website_contact_message" id="website_contact_message"></textarea>
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" id="g-recaptcha-response"></div>
            </div>
            <div class="clearfix"></div><br>
            <div class="text-right">
              <a class="dark-gray-btn" href="javascript:void(0)"  onclick="javascript:website_contact_us();"><span class="lt"></span>
                <span class="large-btn">Send</span><span class="rt"></span></a></div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  Thanks Contact us -->
<div class="modal fade cnt-form" id="thankswebsite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" style="background:#62486f;" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Thank you for contacting us</h2>
              <div class="text-center">Your message has been successfully submitted.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<? $this->load->view('mainsite/common/footer');?>

<script type="text/javascript">
function website_contact_us() {
  var website_contact_name = $('#website_contact_name').val();
  var website_contact_email = $('#website_contact_email').val();
  var package_id = $('#package_id').val();
  var website_contact_message = $('#website_contact_message').val();



  if(website_contact_name=='')
  {
     $('#msg').html('<span class="text-default">Please enter name.</span>');
     $('#website_contact_name').focus();
   return false
  }
   if(website_contact_email=='')
  {
     $('#msg').html('<span class="text-default">Please enter email address.</span>');
     $('#website_contact_email').focus();
   return false
  }
   if(package_id=='')
  {
     $('#msg').html('<span class="text-default">Please select package.</span>');
     $('#package_id').focus();
    return false
  }
  if(website_contact_message=='')
  {
     $('#msg').html('<span class="text-default">Please enter message.</span>');
     $('#website_contact_message').focus();
    return false
  }

/*  if ($("#g-recaptcha-response").val()) {

    xyz = $("#g-recaptcha-response").val();*/
    jQuery.ajax({
              type: "POST",
              url: "<?=site_url('home/website_contact_us')?>",
              data: {           
                    website_contact_name: website_contact_name,
                    website_contact_email: website_contact_email,
                    package_id: package_id,
                    website_contact_message: website_contact_message,
              /*      captcha: xyz *///THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
                  },
              cache: false,
              success:  function(data)
            { 
             if(data=='done')
              {
                $('#website_contact_name').val('');
                $('#website_contact_email').val('');
                $('#package_id').val('');
                $('#website_contact_message').val('');
                $('#msg').html('<span class="text-default">Mail sent successfully!!</span>');
                $('#myModalwebsite').modal('hide')
                $('#thankswebsite').modal('toggle');
              }
              
              if(data=='NameBlank'){
               $('#msg').html('<span class="text-default">Name can not be blank!!</span>');
                $('#NameBlank').focus()
               }
              if(data=='Emailblank'){
               $('#msg').html('<span class="text-default">Email address can not be blank!!</span>');
               $('#website_contact_email').focus();
               }
              if(data=='InvalidEmail'){
                  $('#msg').html('<span class="text-default">Please enter valid e-mail address!!</span>');
                  $('#website_contact_email').focus();
                }
             
                }
            });
            
    /*}else{
        $('#msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
    }*/
}
</script>
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
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
</body>
</html>
