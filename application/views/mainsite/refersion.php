 <?php
  //require_once(dirname(__FILE__) . "/../../../../smartslider/start.php");
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Refersion">
<meta name="keywords" content="Refersion">
<meta name="author" content=""> 
<title><?=SITENAME?> - Refersion </title>
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

<div style="background: #eeeeee;height: 30px;">
&nbsp;
</div>
<!--<div class="refmenu faqpage">
    <div class="container">
        <ul>
            <li><a href="<?=site_url('home/faqs')?>">Frequently Asked Questions</a></li>
            <li><a href="<?=site_url('home/refersion')?>">Sign Up</a></li>
        </ul>
    </div>
</div>
-->


<div class="container-fluid iframe-bg">
	<div class="col-xs-12 col-lg-12">
		<!--<iframe src="https://artgalaxie.refersion.com/affiliate/registration" frameborder="0" height="1000" width="100%"></iframe>-->
	
		<div class="soon" style="text-align: center;margin: 5%;">
    		<h3 style="color: #00A295;font-weight: 700;">Thank you for your interest in our Affiliate Program.</h3>
            <p>It will be available to you soon, together with the launch of our Art Stores.</p>
            </br>
            <p>If you want us to drop you a line when it is up and running, just click on the button below.</p>
            
           <div class="soon_button">
                <a class="soon_url" href="https://confirmsubscription.com/h/j/03AD429994F45ACA" target="_blank">Yes, let me know</a>
            </div>
        </div>


	</div>
</div>
<?php $this->load->view('mainsite/common/footer');?>    

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
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script> 
<script>
    if (screen.width > 768) {
 $('head').append('<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />');
}
</script>
<?php $this->load->view('mainsite/common/login-registration-common-js');?>
<style>
    .iframe-bg {background:#eeeeee;}
</style>
</body>
</html>
