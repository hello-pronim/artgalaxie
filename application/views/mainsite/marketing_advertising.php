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
<link href="<?=base_url()?>front_assets/custom.css" rel="stylesheet"> <!-- CSS from psd  31012017-->
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
<!-- Page Content -->

<div class="gallery-page-in ">
<? $this->load->view('mainsite/marketing-comnmon-cms-section');?>
  <div class="marketing-section">
    <div class="container">
      <div class="market-icon-boxes" data-aos="fade-up" data-aos-once="true">
         <? $this->load->view('mainsite/marketing-common-navigarion-section');?>
      </div>
      <div class="load-section"></div>
      <div class="marketingsection">
      <div class="marketstrategy-content markt-box-bg1">
        <div class="market-strategy-img" data-aos="fade-up" data-aos-once="true">
        <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_advertising['banner_image']?>" alt="<?=$marketing_advertising['banner_image']?>"/></div>
        <div class="marketst-txt" data-aos="fade-up" data-aos-once="true">
          <h2><?=stripslashes($marketing_advertising['sub_title'])?></h2>
          <h4><?=stripslashes($marketing_advertising['sub_sub_titile'])?></h4>
          <div class="mrkt-txt">
            <p><?=nl2br(stripslashes($marketing_advertising['description']))?></p>
          </div>
        </div>
        <div class="mrt-content-boxes">
          <div class="row">
            <?php $m=0; foreach($marketing_boxes as $marketing_boxesRs){ $m++; ?>
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box<?=$m?>" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                 <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxesRs['box_image']?>" alt="<?=$marketing_boxesRs['box_image']?>"/> </div>
                <div class="mrt-box-txt">
                  <h4><?=stripslashes($marketing_boxesRs['title'])?></h4>
                  <p><?=nl2br(stripslashes($marketing_boxesRs['description']))?></p>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <!-- Section 2 -->
      <div class="marketstrategy-content marketstrategy-content2">
        <div class="market-strategy-img" data-aos="fade-up" data-aos-once="true">
        <img  src="<?=base_url()?>uploads/art_marketing/<?=$section2['banner_image']?>" alt="<?=$section2['banner_image']?>"/></div>
        <div class="marketst-txt" data-aos="fade-up" data-aos-once="true">
         <h2><?=stripslashes($section2['sub_title'])?></h2>
         <h4><?=stripslashes($section2['sub_sub_titile'])?></h4>
          <div class="mrkt-txt">
            <p><?=nl2br(stripslashes($section2['description']))?></p>
          </div>
        </div>
        <div class="mrt-content-boxes">
          <div class="row">
            <?php $m2=0; foreach($marketing_boxes2 as $marketing_boxes2Rs){ $m2++; ?>
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box<?=$m2?>" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes2Rs['box_image']?>" alt="<?=$marketing_boxes2Rs['box_image']?>"/> </div>
                <div class="mrt-box-txt">
                 <h4><?=stripslashes($marketing_boxes2Rs['title'])?></h4>
                  <p><?=nl2br(stripslashes($marketing_boxes2Rs['description']))?></p>
                </div>
              </div>
            </div>
            <?php } ?>
         </div>
        </div>
      </div>
      <!-- Section 3 -->
      <div class="marketstrategy-content marketstrategy-content3">
        <div class="market-strategy-img" data-aos="fade-up" data-aos-once="true">
          <img src="<?=base_url()?>uploads/art_marketing/<?=$section3['banner_image']?>" alt="<?=$section3['banner_image']?>"/>
        </div>
        <div class="marketst-txt" data-aos="fade-up" data-aos-once="true">
         <h2><?=stripslashes($section3['sub_title'])?></h2>
         <h4><?=stripslashes($section3['sub_sub_titile'])?></h4>
         <div class="mrkt-txt">
            <p><?=nl2br(stripslashes($section3['description']))?></p>
          </div>
        </div>
        <div class="mrt-content-boxes">
          <div class="row">
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box1" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img"> 
                  <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes3[0]['box_image']?>" alt="<?=$marketing_boxes3[0]['box_image']?>"/> </div>
                <div class="mrt-box-txt">
                  <h4><?=stripslashes($marketing_boxes3[0]['title'])?></h4>
                  <p><?=nl2br(stripslashes($marketing_boxes3[0]['description']))?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
               <div class="mrt-content-box mrt-box1" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img"> 
                  <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes3[1]['box_image']?>" alt="<?=$marketing_boxes3[0]['box_image']?>"/> </div>
                <div class="mrt-box-txt"  style="height: 346px;">
                  <h4><?=stripslashes($marketing_boxes3[1]['title'])?></h4>
                  <p><?=nl2br(stripslashes($marketing_boxes3[1]['description']))?></p>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="mrt-content-box mrt-box3" data-aos="fade-up" data-aos-once="true">
                <div class="mrt-box-img">
                <img src="<?=base_url()?>uploads/art_marketing/<?=$marketing_boxes3[2]['box_image']?>" alt="<?=$marketing_boxes3[2]['box_image']?>"/> </div>
                <div class="mrt-box-txt"  style="height: 346px;">
                   <h4><b><?=stripslashes($marketing_boxes3[2]['title'])?></b></h4>
                   <p><?=nl2br(stripslashes($marketing_boxes3[2]['description']))?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="red-box-btn  z-index1" style="background: #615092;box-shadow: inset 0 8px 10px rgba(0,0,0,0.5);">
	 <div data-aos-once="true" data-aos="fade-up" class="text-center">
	  <a class="dark-gray-btn artmar-cont" href="<?=base_url()?>smartslider/sliders/120/index.html" target="_blank" style="margin-right: 20px;"><span class="link-mid large-btn contact_us">More info</span></a>
	  <a class="dark-gray-btn artmar-cont" href="#" data-toggle="modal" data-target="#myModalma"><span class="link-mid large-btn contact_us">Let's Start</span></a></div></div>
</div>
<? $this->load->view('mainsite/common/footer');?>
<!-- /.container --> 

<!-- Modal -->
<div class="modal fade cnt-form" id="myModalma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="art_marketing_contact_us">
        <div class="form-main form-color1">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUs">Art Marketing Enquiry</h2>
            </div>
            <div id="contactUsFormId">
            <div id="am_msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="am_contact_name" id="am_contact_name"  >
            <input type="text" class="form-control" placeholder="Email" name="am_contact_email" id="am_contact_email" >
            <select class="form-control" name="am_profile" id="am_profile">
              <option value="">Profile</option>
              <option value="Artist">Artist</option> 
              <option value="Gallery">Gallery</option> 
            </select>
            <input type="text" class="form-control" placeholder="Website (Optional)" name="am_website" id="am_website" >
             <select class="form-control" name="am_enquiry_type" id="am_enquiry_type">
              <option value="">Select the type of Art Marketing you require</option>
              <option value="Marketing and Advertising">Marketing and Advertising</option> 
              <option value="Digital Markeing">Digital Markeing</option> 
              <option value="Content Marketing">Content Marketing</option> 
              <option value="Content Marketing">All</option> 
            </select>
            <textarea class="form-control" placeholder="Kindly add any additional information." name="am_contact_message" id="am_contact_message"></textarea>
            <div class="pull-right" style="display: -webkit-box;">
                 <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" ></div>
            </div>
            <div class="clearfix"></div><br>
            
             <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="am_sub">Send</button>
             </div>
             
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  Thanks Carrer -->
<div class="modal fade cnt-form car-form" id="thanksmodalma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
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


<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<script src="<?=base_url()?>front_assets/js/art_marketing.js"></script> 

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

<script>
$('#art_marketing_contact_us').submit(function(e)
{
     e.preventDefault(); 
    var contact_name    = $('#am_contact_name').val();
    var contact_email   = $('#am_contact_email').val();
    var profile         = $('#am_profile').val();
    var website         = $('#am_website').val();
    var enquiry_type    = $('#am_enquiry_type').val();
    var contact_message = $('#am_contact_message').val();


    if(contact_name=='')
    {
        $('#am_msg').html('<span class="text-default">Please enter name.</span>');
        $('#am_contact_name').focus();
        return false
    }
    if(contact_email=='')
    {
        $('#am_msg').html('<span class="text-default">Please enter email address.</span>');
        $('#am_contact_email').focus();
        return false
    }
    if(profile=='')
    {
        $('#am_msg').html('<span class="text-default">Please select profile.</span>');
        $('#am_profile').focus();
        return false
    }
    if(enquiry_type=='')
    {
        $('#am_msg').html('<span class="text-default">Please select enquiry type.</span>');
        $('#am_enquiry_type').focus();
        return false
    }
    if(contact_message=='')
    {
        $('#am_msg').html('<span class="text-danger">Please enter message.</span>');
        $('#am_contact_message').focus();
        return false
    }
 
        jQuery.ajax({
            type: "POST",
            url: "<?=site_url('home/art_marketing_contact_us')?>",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success: function(data)
            {
                //alert(data);
                if(data=='done')
                {
                    $('#am_msg').html('<span class="text-success">Mail sent successfully!!</span>');
                    $('#myModalma').modal('hide');
                    $('#thanksmodalma').modal('toggle');
                }
                else
                {
                    $('#am_msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
                }
            }
        });
});
</script>
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
      AOS.init({
  disable: function() {
    // This weird line should return true for safari <= 5 and false for anything else
    // Based on http://browserhacks.com/
    return /a/.__proto__ == '//';
  }
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
<?php $this->load->view('mainsite/common/login-registration-common-js'); ?>
<script src="<?=base_url()?>front_assets/js/contact-us.js"></script> 
</body>
</html>