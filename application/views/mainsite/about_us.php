 <?php
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
  ?>
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
<link href="<?=base_url()?>front_assets/custom.css" rel="stylesheet"><!--PSD CSS from 31st jan 2017 -->
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<?php $this->load->view('mainsite/common/header');?>
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
<div class="containerss3">
    <?php N2SmartSlider(8); ?>
    <?php N2Native::beforeClosingBody(); ?>
</div>
<div class="gallery-page-in about">
  <!--page midd Content-->
  <div class="bot-shadow">
    <div class="listartist-section dark-shadwoand-bot-border bord-none" >
      <div class="container" data-aos="fade-up" data-aos-once="true" >
        <div class="vedio-page-disc">
          <h2 class="section-header text-center color-fff section-header-large" style="color: #8e42c0;"><?=stripslashes($cmsData['page_title'])?></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="sliderbot-sect bg-purple-hex z-index1">&nbsp;</div>
  <!--page midd Content End--> 
  <!--Exibition Pakages-->
  <div class=" section bg-white bottom-shadow about-cnt-sect">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[0]['image1']?>" alt="<?=$aboutUs[0]['image1']?>"/></div>
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up" data-aos-delay="400" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[0]['image2']?>" alt="<?=$aboutUs[0]['image2']?>"/></div>
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up"  data-aos-delay="700" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[0]['image3']?>" alt="<?=$aboutUs[0]['image3']?>"/></div>
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up" data-aos-delay="1000" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[0]['image4']?>" alt="<?=$aboutUs[0]['image4']?>"/></div>
      </div>
      <div class="text" data-aos="fade-up" data-aos-once="true" >
        <h3 class="color027fb0"><?=stripslashes($aboutUs[0]['desc1'])?></h3>
        <p><?=stripslashes($aboutUs[0]['desc2'])?></p>
      </div>
    </div>
  </div>
  <div class=" section bg-4a97ae bottom-shadow about-cnt-sect z-index2">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[1]['image1']?>" alt="<?=$aboutUs[1]['image1']?>"/></div>
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up" data-aos-delay="400" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[1]['image2']?>" alt="<?=$aboutUs[1]['image2']?>"/></div>
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up"  data-aos-delay="700" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[1]['image3']?>" alt="<?=$aboutUs[1]['image3']?>"/></div>
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up" data-aos-delay="1000" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[1]['image4']?>" alt="<?=$aboutUs[1]['image4']?>"/></div>
      </div>
      <br>
      <br>
      <div class="text" data-aos="fade-up" data-aos-once="true">
        <h3 class="color-fff mar-bot-0"><?=stripslashes($aboutUs[1]['desc1'])?></h3>
      </div>
    </div>
  </div>
  <div class=" section bg-white bottom-shadow about-cnt-sect z-index1">
    <div class="container" data-aos="fade-up" data-aos-once="true" >
      <div class="text" >
        <p class="color027fb0"><?=stripslashes($aboutUs[2]['desc1'])?></p>
        <br>
        <p><?=stripslashes($aboutUs[2]['desc2'])?></p>
      </div>
    </div>
  </div>
  <div class=" section bg-90a835 bottom-shadow about-cnt-sect">
    <div class="container" >
      <div class="row">
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up" data-aos-delay="100" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[3]['image1']?>" alt="<?=$aboutUs[3]['image1']?>"/></div>
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up" data-aos-delay="400" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[3]['image2']?>" alt="<?=$aboutUs[3]['image2']?>"/></div>
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up"  data-aos-delay="700" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[3]['image3']?>" alt="<?=$aboutUs[3]['image3']?>"/></div>
        <div class="col-sm-3 col-xs-6 col-xxs-12" data-aos="fade-up" data-aos-delay="1000" data-aos-once="true">
          <img src="<?=base_url()?>uploads/about_us/<?=$aboutUs[3]['image4']?>" alt="<?=$aboutUs[3]['image4']?>"/></div>
      </div>
      <br>
      <br>
      <div class="text" data-aos="fade-up" data-aos-once="true">
        <h3 class="color-fff mar-bot-0"><?=stripslashes($aboutUs[3]['desc1'])?></h3>
      </div>
    </div>
  </div>
  <div class="bot-shadow">
    <div class="listartist-section dark-shadwoand-bot-border bord-none shadow-none" >
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="vedio-page-disc">
          <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($aboutUs[4]['desc1'])?></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="section bg-white bottom-shadow about-cnt-sect z-index1">
    <div class="container text-center" >
      <div class="text" data-aos="fade-up"  data-aos-once="true" >
        <p><?=stripslashes($aboutUs[4]['desc2'])?></p>
      </div>
      <br>
      <br>
      <div class="green-btn " data-aos="fade-up" data-aos-once="true">
        <div class="btn-box"><a href="#" data-toggle="modal" data-target="#myModalContact">Drop us a line</a></div>
      </div>
    </div>
  </div>
  <?php  ?>
  <div class="bot-shadow visitors-conter-sect" style="display:none;">
    <h2 class="section-header text-center color-fff section-header-large" data-aos="fade-up"  data-aos-once="true" >Visitors Count</h2>
    <br>
    <div class="listartist-section dark-shadwoand-bot-border bord-none shadow-none" >
      <div class="container" >
        <div class="vedio-page-disc">
          <div class="visitors-conter" data-aos="fade-up" data-aos-once="true">
            <div class="all-conut text-center">
                <?php 
                for($i=0;$i<count($AllCountInSplit);$i++){ ?>
                  <span><?=$AllCountInSplit[$i]?></span>
               <?php } ?>
            </div>
            <div class="conter-list">
              <ul> 
                <?php if($todayCount>0){ ?>
                <li class="today-count"><span></span>Today<span class="amount-figer"><?=stripslashes($todayCount)?></span></li>
                <?php } if($yesterdaysCount>0){ ?>
                <li class="yest-count"><span></span>Yesterday<span class="amount-figer"><?=stripslashes($yesterdaysCount)?></span></li>
                <?php }  if($weekCount>0){ ?> 
                <li class="week-count"><span></span>This Week<span class="amount-figer"><?=stripslashes($weekCount)?></span></li>
                 <?php }if(@$monthCount>0){ ?>
                <li class="month-count"><span></span>This Month<span class="amount-figer"><?=stripslashes($monthCount)?></span></li>
                <?php }if(@$lastMonthCount>0){ ?> 
                <li class="last-month-count"><span></span>Last Month<span class="amount-figer"><?=stripslashes($lastMonthCount)?></span></li>
                <?php } ?>
                <li class="all-count"><span></span>All days<span class="amount-figer"><?=stripslashes($allCount); ?></span></li>
              </ul>
              <div class="conter-footer text-center"> Your Ip: <?=$myIp?><br>
                <?=date('Y-m-d')?> &nbsp;<label id="timeSpan"></label><br>
                <?php /* ?><div style="display:none;">
                    <?php
                        $ip     = $_SERVER['REMOTE_ADDR']; // means we got user's IP address 
                        $json   = file_get_contents( 'http://ip-api.com/json/' . $ip); // this one service we gonna use to obtain timezone by IP
                        // maybe it's good to add some checks (if/else you've got an answer and if json could be decoded, etc.)
                        $ipData = json_decode( $json, true);
                        
                        if ($ipData['timezone']) {
                            $tz = new DateTimeZone( $ipData['timezone']);
                            $now = new DateTime( 'now', $tz); // DateTime object corellated to user's timezone
                            print_r($tz);
                            print_r($now);
                            echo $now->date;
                        } else {
                           // we can't determine a timezone - do something else...
                        }
                        
                    ?>    
                </div><?php */ ?>
                
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sliderbot-sect bg-4a97ae z-index1">&nbsp;</div>
</div>
<?php  ?>
<!-- Modal -->
<?php /* ?>
<div class="modal fade cnt-form" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="contactusabout">
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Contact us</h2>
              <div class="text-center">If you have a question or just want to say hi, feel free to contact us using the form below, or alternatively you can use general@artgalaxie.com </div>
            </div>
            <div id="contact_about_msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="contact_about_name" id="contact_about_name"  >
            <input type="text" class="form-control" placeholder="Email" name="contact_about_email" id="contact_about_email" >
            <select class="form-control" name="contact_about_department" id="contact_about_department">
              <option value="">Select Department</option>
              <option value="Art Services">Art Services</option> 
              <option value="Art Marketing">Art Marketing</option>
              <option value="Design">Design</option>
              <option value="Publications">Publications</option>
              <option value="Website Services">Website Services</option>
              <option value="Video Services">Video Services</option>
              <option value="Exhibitions">Exhibitions</option>
              <option value="Printing Services">Printing Services</option>
              <option value="Other">Other</option>
            </select>
            <input type="text" class="form-control" placeholder="Subject" name="contact_about_subject" id="contact_about_subject">
            <textarea class="form-control" placeholder="Type your message here." name="contact_about_message" id="contact_about_message"></textarea>
             <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="6Lc_sF8UAAAAAOjiIOOa2VPjpPkLQfczovXn_9uR"></div>
            </div>
           <div class="clearfix"></div><br>
            <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="contact_about_sub">Send</button>
             </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php */ ?>


<?php $this->load->view('mainsite/common/footer');?>
<!-- /.container --> 

<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
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
    <script>
    if (screen.width > 768) {
 $('head').append('<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />');
}
</script>

<?php /* ?>
<script type="text/javascript">
$('#contactusabout').submit(function(e)
{
    var contact_name      = $('#contact_about_name').val();
    var contact_email     = $('#contact_about_email').val();
    var contact_subject   = $('#contact_about_subject').val();
    var contact_message1  = $('#contact_about_message').val();
    var department        = $('#contact_about_department').val();
    
    if(contact_name=='')
    {
     $('#contact_msg').html('<span class="text-danger">Please enter name.</span>');
     $('#contact_name').focus();
     return false
    }
    if(contact_email=='')
    {
     $('#contact_msg').html('<span class="text-danger">Please enter email address.</span>');
     $('#contact_email').focus();
    return false
    }
    if(department=='')
    {
     $('#contact_msg').html('<span class="text-danger">Please select department.</span>');
     $('#department').focus();
        return false
    }
    if(contact_subject=='')
    {
     $('#contact_msg').html('<span class="text-danger">Please enter subject.</span>');
     $('#contact_subject').focus();
    return false
    }
    if(contact_message1=='')
    {
     $('#contact_msg').html('<span class="text-danger">Please enter message.</span>');
     $('#contact_message1').focus();
    return false
    }
  
    jQuery.ajax({
        type: "POST",
        url: "<?=site_url('home/about_us_email')?>",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        success:function(data)
        { 
            alert(data);
            
            if(data=='done')
            {
                $('#contact_about_msg').html('<span class="text-success">Mail sent successfully!!</span>');
            }
            else
            {
                $('#contact_about_msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
            }
        }
        
    });
});
</script>
<?php */ ?>

<script>
$(document).ready( function() {
var currentdate = new Date(); 
var datetime =  currentdate.getHours() + ":"  
+ currentdate.getMinutes() + ":" 
+ currentdate.getSeconds();
$('#timeSpan').text(datetime);
} );
</script>

<?php $this->load->view('mainsite/common/login-registration-common-js');?>

</body>
</html>
