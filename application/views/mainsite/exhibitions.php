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
  <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>  
  
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
<script src='https://www.google.com/recaptcha/api.js'></script>    

<script type="text/javascript">
  $(function(){
      $('.load').on('click', function (){
          // Assign the value of the data attribute
        var tmp = this.id;
        //alert(tmp);

         $.ajax({
          type:"post",
          url:"<?=site_url('home/exhibitions')?>",
          data:"countryName="+tmp,
          success:function(data){
            $('#new').html($(data).find('#new').html());
          }
        });


  });
       });
</script> 
              
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


        <? $this->load->view('mainsite/common/header');?>
      
        <div class="top-slider image-with-video-slider" data-aos="fade-up">
          <div class="container">
              
              <?php N2SmartSlider(31); ?>
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
            <div class="section listartist-section dark-shadwoand-bot-border bg-color-ocar bord-none z-index2" style="background: #76540e;box-shadow: none;">
              <div class="container" data-aos="fade-up" data-aos-once="true">
                <div class="vedio-page-disc" style="padding:0;">
                  <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
                  <div class="text text-center color-fff video-txt" data-aos="fade-up" data-aos-once="true" ><?=stripslashes($cmsData['page_desc'])?></div>
                </div>
              </div>
            </div>

            <div class="ocar-box-btn  z-index1" style="background: #a47d13;box-shadow: inset 0 8px 10px rgba(0,0,0,0.5);">
              <div data-aos-once="true" data-aos="fade-up" class="text-center"><a class="dark-gray-btn find_btn" href="#"  data-toggle="modal" data-target="#myModalex"><span class="large-btn">Find out more</span></a></div>
            </div>
            <!--page midd Content End-->
            <?php if(!empty($slider1)){ ?>
            <!--Slider top-->
            <div class=" section slider1-section new-slider dark-shadwoand-slider z-index2" >
              <div data-aos="fade-up"  data-aos-once="true">
                <div id="myCarousel1" class="carousel slide carousel-fade lg-arrow" > <!-- Indicators --> 
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner">
                    <?php $i=0; foreach($slider1 as $slider1Rs){  $i++;?>
                    <div class="item <?php if($i==1){ ?> active <?php } ?>">
                      <div class="fill"><img src="<?=base_url()?>uploads/exhibitions/<?=$slider1Rs['box_image']?>" alt="<?=$slider1Rs['box_image']?>"/></div>
                    </div>
                    <?php } ?>
                  </div>
                  <!-- Controls --> 
                  <?php if($i>1){ ?>
                  <a class="left carousel-control" id="find_more" href="#myCarousel1" data-slide="prev"> <span class="v-align"> <span><img src="<?=base_url()?>front_assets/images/slider-left-arow.png" alt=""/></span></span> </a> <a class="right carousel-control" id="find_more" href="#myCarousel1" data-slide="next"> <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-right-arow.png" alt=""/></span></span> </a> </div>
                  <?php } else { } ?>
                </div>
              </div>
              <div class="sliderbot-sect  z-index1">&nbsp;</div>
              <!--Slider top End--> 
              <?php } ?>


              <!--Exibition Pakages-->
              <div class="exibition-packages">
                <div class="container" data-aos="fade-up" data-aos-once="true">
                  <h3><?=stripslashes($section1[0]['title'])?></h3>
                  <span id="list"></span>
                  <div data-aos="fade-up" data-aos-once="true"><?=nl2br(stripslashes($section1[0]['description']))?></div>
                  <br><br>
                 
                  <div data-aos="fade-up" data-aos-once="true">
                    <div class="row full-btn">
                      <div class="col-sm-4">
                        <a class="dark-yellow-btn" href="#countryResult"><span class="lt"></span><span id='6' class="mid load">Collective Exhibitions</span><span class="rt"></span></a>
                      </div>
                      <div class="col-sm-4">
                        <a href="#countryResult" class="dark-brown-btn"><span class="lt"></span><span id='7' class="mid load">Solo Exhibitions</span><span  class="rt"></span></a>
                      </div>
                      <div class="col-sm-4">
                        <a href="#countryResult" class="dark-red-btn"><span class="lt"></span><span id='8' class="mid load">International Art Fairs</span><span  class="rt"></span></a>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
              <!--Exibition Pakages End-->
             
              
                  <div id="new">
              <?php if(!empty($slider2)){ ?>
              <div class="pakegaes-heading-sect">
                <div class="carousel slide" id="myCarousel9" data-interval="false">
                  <!-- Carousel items -->
                  <div class="carousel-inner ">
                    <?php $i2=0; foreach ($slider2 as $slider2Rs){ $i2++; ?>
                    <div class="<?php if($i2==1){ ?> active <?php } ?> item" >
                    <!--Pakeges Heading-->
                      <div class="container" data-aos="fade-up" data-aos-once="true">
                        <h3><?=stripslashes($slider2Rs['title']);?></h3>
                        <div data-aos="fade-up" data-aos-once="true"><?=stripslashes($slider2Rs['description'])?></div>
                       </div>
                      <!--Pakeges Heading end-->
                    </div>
                    <?php } ?>
                  </div>                
                </div>
</div>
              
              <!--Pakeges Info--> 
              <div class="bg-white bottom-shadow z-index2">

                <div class="container" data-aos="fade-up" data-aos-once="true">


                  <div class="static-arow text-center" data-aos-once="true" data-aos="fade-up">
                    <!-- Carousel nav -->
                   <!-- <a id="prev-btn" class="dark-gray-btn lrg-slide-btn"><span class="lt"></span><span>Prev. Package</span><span class="rt"></span></a>
                   <a id="next-btn" class="dark-gray-btn lrg-slide-btn"><span class="lt"></span><span>Next Package</span><span class="rt"></span></a>-->
                   <?php if($i2>1){ ?>
                    <a id="prev-btn" class="package-btn">Prev. Package</a>
                    <a id="next-btn" class="package-btn">Next Package</a>
                    <?php } else{ } ?>
                    <!-- Carousel nav -->
                  </div>

                  <br><br>

                  <div class="carousel slide" id="myCarousel5" data-interval="false">
                    <!-- Carousel items -->
                    <div class="carousel-inner ">
                      <?php $i21=0; foreach ($slider21 as $slider21Rs){ $i21++; ?>
                      <div class="<?php if($i21==1){ ?> active <?php } ?> item" >
                       <div class="text-center">
                          <img  src="<?=base_url()?>uploads/exhibitions/<?=stripslashes($slider21Rs['box_image'])?>" alt=""/></div>
                        <br><br>
                        
                        <?php if($slider21Rs['package_title']){?>
                        <div class="row">
                          <div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
                            <div class="pakegaes-info ">
                              <h4><?=stripslashes($slider21Rs['package_title'])?></h4>  
                              <div class="pakegaes-info-content <? if($i21>3){ ?>  bg-lightpurple <?php }?>">
                                <?=stripslashes($slider21Rs['package_description'])?>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <?php }?>
                          
                          
                        </div>
                          <? } ?>
                         </div>                
                        </div>
                        
                        
                       </div>
                    </div>
                   
                    <!--Pakeges Info End--> 
                    <div class="sliderbot-sect  z-index1">&nbsp;</div>
                    <?php } ?>
                    <!--Partners Galleries-->
                    <div class="partner-galleries">
                      <div class="container" data-aos="fade-up" data-aos-once="true">
                        <h3><?=stripslashes($section1[1]['title'])?></h3>
                        <div data-aos="fade-up" data-aos-once="true"><?=nl2br(stripslashes($section1[1]['description']))?></div>
                        <br><br>
                        <div class="row">
                           <?php if(!empty($gallery)){ 
                              foreach ($gallery as $galleryRs) { 
                              $colour = $this->common->chooseColourClass($galleryRs['colour_type']); 

                            ?>
                          <div class="col-sm-6 col-xs-6 col-xxs-12">
                            <a href="<?=site_url('gallery_details/'.$galleryRs['cat_id'].'/'.$this->common->create_slug($galleryRs["cat_name"]))?>">
                            <div class="artist-block <?php echo $colour; ?>" data-aos="fade-up" data-aos-once="true">
                              <div class="artist-img partner-img"><span>
                                <img style="height: 387px;
    width: 500px;" src="<?=base_url()?>uploads/regionwise_galleries/<?=$galleryRs['image_name']?>" alt="<?=$galleryRs['image_name']?>"/></span> <div class="overlay"></div></div>
                              <div class="artist-name partnername"><?=stripslashes($galleryRs['cat_name'])?><br>
                                <span><?=stripslashes($galleryRs['sub_name'])?></span> </div>

                              </div>
                            </a>
                          </div>
                          <?php } ?>
                          
                          <?php } ?>
                        </div>
                       </div>
                    </div>
                    </div>
                    <div class="sliderbot-sect  z-index1">&nbsp;</div>
                    <!--Partners Galleries End-->


                    <!--Representation Program-->
                    <div class="representation-pro-sect">
                      <div class="container" data-aos="fade-up" data-aos-once="true">
                        <h3><?=stripslashes($section1[2]['title'])?></h3>
                        <div data-aos="fade-up" data-aos-once="true" ><?=nl2br(stripslashes($section1[2]['description']))?></div>
                      </div>
                    </div>
                    <!--Representation Program End-->
                    <?php if(!empty($slider3)){ ?>
                    <!--Slider bot-->
                    <div class=" section slider1-section new-slider dark-shadwoand-slider z-index2" >
                      <div data-aos="fade-up"  data-aos-once="true">
                        <div id="myCarousel3" class="carousel slide carousel-fade lg-arrow" > <!-- Indicators --> 


                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                            <?php  $i3=0; foreach ($slider3 as $slider3Rs){ $i3++; ?>
                            <div class="item <?php if($i3==1){ ?> active <?php } ?>">
                              <div class="fill"><img src="<?=base_url()?>uploads/exhibitions/<?=$slider3Rs['box_image']?>" alt="<?=$slider3Rs['box_image']?>"/></div>
                            </div>
                            <?php } ?>
                          </div>
                          <!-- Controls --> 
						  <?php if($i>1){ ?>
                          <a class="left carousel-control" href="#myCarousel3" data-slide="prev"><span class="v-align"> <span><img src="<?=base_url()?>front_assets/images/slider-left-arow.png" alt=""/></span></span> </a>
						  <a class="right carousel-control" href="#myCarousel3" data-slide="next"> <span class="v-align"><span><img src="<?=base_url()?>front_assets/images/slider-right-arow.png" alt=""/></span></span> </a> 
						  <?php } ?>
						  </div>
                        </div>
                      </div>
                      
                      <div class="sliderbot-sect  z-index1">&nbsp;</div>
                      <!--Slider bot End-->   
                      <?php } ?>



                    </div>

<!-- Modal -->
<div class="modal fade cnt-form" id="myModalex" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="exhibitioncontactus">
        <div class="form-main form-color4">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUs">Exhibition Enquiry Form</h2>
            </div>
            <div id="contactUsFormId">
            <div id="exh_msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="exh_contact_name" id="exh_contact_name"  >
            <input type="text" class="form-control" placeholder="Email" name="exh_contact_email" id="exh_contact_email" >
            <select class="form-control" name="exh_profile" id="exh_profile">
              <option value="">Profile</option>
              <option value="Artist">Artist</option> 
              <option value="Gallery">Gallery</option> 
            </select>
            <input type="text" class="form-control" placeholder="Website (Optional)" name="exh_website" id="exh_website" >
             <select class="form-control" name="exh_enquiry_type" id="exh_enquiry_type">
              <option value="">Select enquiry type</option>
              <option value="Solo Exhibitions">Solo Exhibitions</option> 
              <option value="Collective Exhibitions">Collective Exhibitions</option> 
              <option value="Representation Program">Representation Program</option> 
              <option value="Other">Other</option> 
            </select>
            <textarea class="form-control" placeholder="Kindly type your message here." name="exh_contact_message" id="exh_contact_message"></textarea>
            <div class="pull-right" style="display: -webkit-box;">
                 <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" ></div>
            </div>
            <div class="clearfix"></div><br>
            <div id="loading"></div>
            <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="sub">Send</button>
             </div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  Thanks Carrer -->
<div class="modal fade cnt-form car-form" id="thanksmodalexh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main form-color4">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body form-color4">
            <div class="cnt-frm-txt">
              <h2>Thank you</h2>
              <div class="text-center">Your message has been successfully submitted.<br/> Our team will get back to you at the earliest possible.</div>
            </div>
          </div>
        </div>
      </form>
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

<script type="text/javascript">
$('#exhibitioncontactus').submit(function(e)
{
    e.preventDefault(); 
    var contact_name    = $('#exh_contact_name').val();
    var contact_email   = $('#exh_contact_email').val();
    var profile         = $('#exh_profile').val();
    var website         = $('#exh_website').val();
    var enquiry_type    = $('#exh_enquiry_type').val();
    var contact_message = $('#exh_contact_message').val();
   
    if(contact_name=='')
    {
        $('#exh_msg').html('<span class="text-default">Please enter name.</span>');
        $('#exh_contact_name').focus();
        return false
    }
    if(contact_email=='')
    {
        $('#exh_msg').html('<span class="text-default">Please enter email address.</span>');
        $('#exh_contact_email').focus();
        return false
    }
    if(profile=='')
    {
        $('#exh_msg').html('<span class="text-default">Please select profile.</span>');
        $('#exh_profile').focus();
        return false
    }
    if(enquiry_type=='')
    {
        $('#exh_msg').html('<span class="text-default">Please select enquiry type.</span>');
        $('#exh_enquiry_type').focus();
        return false
    }
    if(contact_message=='')
    {
        $('#exh_msg').html('<span class="text-default">Please enter message.</span>');
        $('#exh_contact_message').focus();
        return false
    }
    
    
    jQuery.ajax({
          type: "POST",
          url: "<?=site_url('home/exhibition_email')?>",
          data: new FormData(this),
          processData: false,
          contentType: false,
          cache: false,
          success:  function(data)
          {
            if(data=='done')
            {
                $('#exh_msg').html('<span class="text-success">Mail sent successfully!!</span>');
                $('#myModalex').modal('hide');
                $('#thanksmodalexh').modal('toggle');
            }
            else
            {
                $('#exh_msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
            }
           
        }
        });
});
</script>

   
<script src="<?=base_url()?>front_assets/js/jquery.mixitup.min.js"></script> 

<script type="text/javascript">
$(function(){
  $('#portfolio').mixitup({
    targetSelector: '.item',
    transitionSpeed: 450
  });
});
</script>

<script>

$("body").on( "click",'#prev-btn', function( event ) {
  $("#myCarousel5").carousel("prev");
  $("#myCarousel9").carousel("prev");
});


$("body").on( "click",'#next-btn', function( event ) {
  $("#myCarousel5").carousel("next");
  $("#myCarousel9").carousel("next");
}); 


$("body").on( "click",'#find_more', function( event ) {
  $("#myCarousel1").carousel("next");
  //$("#myCarousel9").carousel("next");
}); 

$("body").on( "click",'#find_more', function( event ) {
  $("#myCarousel1").carousel("prev");
  //$("#myCarousel9").carousel("next");
});

</script>
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
</body>
</html>
