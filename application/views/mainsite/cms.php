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
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head><body >
<? $this->load->view('mainsite/common/header');?>
  
<!--<div class="section artists-section" >
  <div class="container" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true">
    <div class="col-lg-12">
      <h2 class="section-header text-center color-fff">asdasd asdasd sadsa asd asd</h2>
    </div>
  </div>
</div>-->
<div class="middle-tab-section">
  <div class="middle-tab-section-bg shadow-none">
    <div class="container" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="">
          <h2 class="color-fff mar-top-bot-20 pad-top-bot-25 text-center aos-init aos-animate">
          <?=stripslashes($cmsData['page_title'])?>
          </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section bg-white">
  <div class="container" data-aos="fade-up" data-aos-duration="2500" data-aos-once="true">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="content-size20">
       <?=stripslashes($cmsData['page_desc'])?>
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
<? $this->load->view('mainsite/common/login-registration-common-js');?>
</body>
</html>
