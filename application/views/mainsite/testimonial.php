<?php 
    $com_key = new  common(); 
    $gckey = $com_key->get_google_captcha_key();
?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>Art Galaxie – Testimonials</title>
<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom-17022017.css" rel="stylesheet"><!-- CSS from psd  31012017-->
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
 <link rel="stylesheet" href="<?=base_url()?>front_assets/css/ajax-image-upload.css" type="text/css" media="screen" /> 
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
<? $this->load->view('mainsite/common/header');?>
<!-- Page Content -->

<div class="about">
<div class="bot-shadow">
    <div class="listartist-section dark-shadwoand-bot-border bord-none">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="vedio-page-disc">
          <h2 class="section-header text-center color-fff section-header-large">What they’re saying about us</h2>
        </div>
      </div>
    </div>
  </div>
  
  <div class="light-blue-bg">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
      <?php if($this->session->userdata('CUST_ID')!=""){ ?>
      <a class="dark-gray-btn" href="#" data-toggle="modal" data-target="#myModalTestimonial" ><span class="lt"></span><span class="large-btn">Tell us your story</span><span class="rt"></span></a>
      <?php }else{ ?>
       <a class="dark-gray-btn" href="#" data-toggle="modal" data-target="#myModalLogin"><span class="lt"></span><span class="large-btn">Tell us your story</span><span class="rt"></span></a>
      <?php } ?>
   </div>
  </div>
  
  
  <div class="blog-sect">
    <div class=" section bg-gray">
      <div class="blog-boxes testimonial-boxes">
        <div class="container">
          <div class="row">
            <?php $box_Side=0;
            if(!empty($testimonials)){ 
                foreach($testimonials as $testimonialsRs){ 
                  if($box_Side>=3){
                    $box_Side = 1;
                  }else {
                    $box_Side++;  
                  }
                
                  $com = new common();
                  $resUser = $com->getUserDetailsForTestimonials($testimonialsRs['testo_added_by']);
                  $totalCount =  $com->getTotalLikeForTesto($testimonialsRs['id']);
                  $isILiked =  $com->isILIked($this->session->userdata('CUST_ID'),$testimonialsRs['id']);
                 
              ?>

            <div class="col-md-4 col-sm-6 blog-bock" data-aos="fade-up" data-aos-once="true">
              <div class="blog-in">
                <div class="blog-img">
                  <?php if($testimonialsRs['testo_image']!=''){ ?>
                  <img src="<?=base_url()?>uploads/testimonials/<?=$testimonialsRs['testo_image']?>" alt="<?=$testimonialsRs['testo_image']?>"/>
                  <?php }else{ 
                      $strImage = '';
                      if($box_Side==1){
                          $strImage = 'Testimonial-img4.jpg'; //;left
                      }else if($box_Side==2){
                           $strImage = 'Testimonial-img5.jpg'; //;center
                      }else if($box_Side==3){
                           $strImage = 'Testimonial-img6.jpg'; //;right
                      }
                    ?>  
                  <img src="<?=base_url()?>front_assets/images/<?=$strImage?>" alt="Testimonial-img6.jpg"/>
                  <?php } ?>
                </div>
                <div class="blog-box-title"><?=stripcslashes($testimonialsRs['testo_title'])?></div>
                <div class="blog-shot-disc"><?=stripcslashes($testimonialsRs['testo_description'])?></div>
                <div class="test-detail">
                <div class="member-detail">
                <span class="mem-name"><? echo  stripslashes($resUser->first_name).' '.stripslashes($resUser->last_name);   ?></span>
                  <span class="mem-roll"><?php if($resUser->user_type=='artist'){  echo "Artist";   }else{ echo "Art Lover"; } ?></span>
                  <span class="mem-abt">About: <?=stripcslashes($testimonialsRs['testo_about'])?></span>
                </div>
                <?php if($resUser->user_type=='artist'){ ?>
                <div class="view-artist-btn">
                <a href="<?=site_url('artists/details/'.$resUser->id.'/'.$this->common->create_slug(stripslashes($resUser->first_name.' '.$resUser->last_name)))?>">View artists profile</a>
                </div>
                <?php } else { ?>
                <div class="view-artist-btn" style="visibility: hidden;">
                <a href="">View artists profile</a>
                </div>
                <?php } ?>
                </div>
                <div class="blog-share dropup">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default" aria-label="Justify" id="like-count-<?=$testimonialsRs['id']?>"><?=stripslashes($totalCount)?></button>
                    <?php if($this->session->userdata('CUST_ID')!=""){ ?>
                    <button type="button" class="btn btn-default" aria-label="Left Align" <?php if($isILiked==0){ ?> onclick="javascript : likeTestimonial(<?=$testimonialsRs['id']?>,<?=$this->session->userdata('CUST_ID')?>)" <?php } ?> id="liked-<?=$testimonialsRs['id']?>"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span>
                    <?php if($isILiked==0){ echo "Like"; }else{ echo "Liked"; } ?></button>
                    <?php }else{ ?>
                     <a  class="btn btn-default" aria-label="Left Align" href="#" data-toggle="modal" data-target="#myModalLogin"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span>Like</a>
                   <?php } ?>
                  </div>
                  <div class="btn-group share-social-link">
                    <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Share </button>
                    <ul class="dropdown-menu">
                      <li><a class="facebook-profile" href="#" id="fb-share-<?=$testimonialsRs['id']?>"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li>
                      <li><a class="pinterest-profile" href="#"  id="pinterest-share-<?=$testimonialsRs['id']?>"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a></li>
                      <li><a class="twitter-profile" href="#" id="tweeter-share-<?=$testimonialsRs['id']?>"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a></li>
                      <li><a class="google-plus-profile" href="#" id="gplus-share-<?=$testimonialsRs['id']?>"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a></li>
                  </ul>
                  </div>
                  
                </div>
              </div>
            </div>
            <?php } }else{ ?>
            <div class="col-md-4 col-sm-6 blog-bock" data-aos="fade-up" data-aos-once="true">
              <div class="blog-in">
                <div class="blog-box-title">No Record Found.</div>
              </div>
            </div>
             <?php  } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
   <div class="light-blue-bg">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
      <?php if($this->session->userdata('CUST_ID')!=""){ ?>
      <a class="dark-gray-btn" href="#" data-toggle="modal" data-target="#myModalTestimonial"><span class="lt"></span><span class="large-btn">Write your testimonial here</span><span class="rt"></span></a>
      <?php }else{ ?>
      <a class="dark-gray-btn" href="#" data-toggle="modal" data-target="#myModalLogin"><span class="lt"></span><span class="large-btn">Write your testimonial here</span><span class="rt"></span></a>
      <?php } ?>
    </div>
  </div>
</div>
<? $this->load->view('mainsite/common/footer');?>



<!-- Modal Please Login -->
<div class="modal fade cnt-form" id="myModalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main green-form-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
            <div class="text-center" ><div class="popup-lg-text">You need to Login/Register to add your testimonials.</div></div>
            </div>
           </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Please Login -->

<!-- Modal User-->
<div class="modal fade cnt-form" id="myModalTestimonial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data" id="testo_form" />
        <div class="form-main green-form-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUs">Your Testimonial</h2>
              <div class="text-center" id="header-subTitle-contactUs" style='display:none;'></div>
            </div>
            <div id="contactUsFormId">
            <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Title" name="testo_title" id="testo_title"  >
            <input type="hidden" class="form-control" name="testo_id" value="<?php echo $this->session->userdata('CUST_ID'); ?>"  >
            
            <select class="form-control" name="testo_about" id="testo_about">
              <option value="">Which service would you like to comment on</option>
              <option value="Art Galaxie" >Art Galaxie</option>
              <option value="Publications" >Publications</option>
              <option value="Other" >Other</option>
             </select>
             <textarea class="form-control" placeholder="Type your message here" name="testo_description" id="testo_description"></textarea>
             <?php if($this->session->userdata('CUSTOMER_TYPE')=='artist'){ ?>
              <div   id="progress_bar_id" name="progress_bar_id" style="display:none;" > </div>
             <input  type="file"  id="my-file-selector" name="my-file-selector" >
             <!--<div id="result" style="display:none;"></div>-->
             <?php } ?>
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" id="g-recaptcha-response"></div>
            </div>
             <div class="clearfix"></div><br>
              <div class="text-right">
                <a class="dark-gray-btn"   href="javascript:void(0)"  onclick="javascript: sent_testimonial();">
                  <span class="lt"></span>
                <span class="large-btn">Send</span><span class="rt"></span></a></div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal User-->

<!-- Modal  Thanks Testimonial -->
<div class="modal fade cnt-form" id="thankstestimonialmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Thank you</h2>
              <div class="text-center">Your testimonial has been sent successfully.<br/><br /> We will reqire to check it for spam before publishing it online.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

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
<script type="text/javascript" src="<?=base_url()?>image-drag-drop/js/tuto-dd-upload-image.js"></script>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script>
<script type="text/javascript">
//testimonial 
 function sent_testimonial(){
  var uploadedImage = '';
  var testo_title = $('#testo_title').val();
  var testo_about = $('#testo_about').val();
  var testo_description = $('#testo_description').val();
 
  if(testo_title=='')
  {
     $('#msg').html('<span class="text-danger">Please enter title.</span>');
     $('#testo_title').focus();
   return false
  }
   if(testo_about=='')
  {
     $('#msg').html('<span class="text-danger">Please select services.</span>');
    $('#testo_about').focus();
   return false
  }
  if(testo_description=='')
  {
    $('#msg').html('<span class="text-danger">Please enter message.</span>');
    $('#testo_description').focus();
    return false
  } 
  <?php if($this->session->userdata('CUSTOMER_TYPE')=='artist')
  { 
      ?>
  if($('#my-file-selector').val() == '')
  {
    $('#msg').html('<span class="text-danger">Please select image.</span>');
    $('#testo_description').focus();
    return false
  }
  else
  {
     var uploadedImage = $('#my-file-selector').val();
  }
  <?php } ?>
  if (testo_title!='' &&  testo_description!=''){

     xyz = $("#g-recaptcha-response").val();
    $.ajax({
              type: "POST",
              url: "<?=site_url('home/sent_testimonial')?>",
              //data: { testo_title: testo_title, testo_about: testo_about,testo_description: testo_description,uploadedImage : uploadedImage,captcha: xyz }, //
              //data: $('#testo_form').serialize(), //
              data: new FormData($('#testo_form')[0]), //
			  processData: false,
			  contentType: false,
              cache: false,
              success:  function(data)
              { 
            
             if(data.trim()=='done')
              {
                //$('#header-subTitle-contactUs').show();
                //$('#header-title-contactUs').text('Thank you');
                //$('#header-subTitle-contactUs').html('<br/><div class="popup-lg-text">Your testimonial has been sent successfully.</div><br/><br/>We will require to check it for spam before publishing it online.');
                // $('#contactUsFormId').hide();
                
                $('#testo_title').val('');
                $('#testo_about').val('');
                $('#testo_description').val('');
                $('#myModalTestimonial').modal('hide')
                $('#thankstestimonialmodal').modal('toggle');
              }
              
              if(data=='titleBlank'){
                $('#msg').html('<span class="text-danger">Title Cannot be blank!!</span>');
                $('#testo_title').focus()
               }
               if(data=='descriptionBlank'){
                $('#msg').html('<span class="text-danger">Message Cannot be blank!!</span>');
                $('#testo_description').focus()
               }
              }
            });
            
     }

  }
</script>
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
 
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/javascript">
<?php foreach($testimonials as $testimonialsRs){ ?>
$("#tweeter-share-<?=$testimonialsRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
 $("#fb-share-<?=$testimonialsRs['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+encodeURIComponent(n)+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
  $("#gplus-share-<?=$testimonialsRs['id']?>").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
  $("#pinterest-share-<?=$testimonialsRs['id']?>").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});
<?php } ?>
 
</script>  
</body>
</html>
