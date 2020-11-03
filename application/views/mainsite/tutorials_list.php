<!DOCTYPE html>
<html lang="en">
<head>
<?php  $this->load->view('mainsite/common/meta-files'); ?>
<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
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
</head>
<body >
<? $this->load->view('mainsite/common/header');?>

<!--banner-->
<!--<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container"> &nbsp; </div>
</div>-->
<!-- Page Content -->

<div class="gallery-page-in "> 
  
  <!--page midd Content-->
  <div class="section xxlistartist-section dark-shadwoand-bot-border middle-tab-section-bg bord-none z-index7" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="xxvedio-page-disc">
        <h2 class="section-header text-center color-fff guestbook-header">Art Tutorials<?php if(isset($title)){ echo  ": ".@ucfirst($title); }  ?>
         </h2>
      </div>
    </div>
  </div>
  <!--<div class="art-coaching-bot-border light-shadwoand">&nbsp;</div>-->
  <div class="box-color-nine  gestbook-leave-btn bot-shadow z-index2">
    <div data-aos-once="true" data-aos="fade-up" class="text-center">
      <?php if($act_id=='tutorialss_filter'){ ?>
      <a class="dark-gray-btn" href="<?=site_url('tutorials_list')?>"><span class="lt"></span><span class="large-btn">Back to Main Page</span>
      <span class="rt"></span></a>
      <?php }else{ ?> 
       <a class="dark-gray-btn" href="<?=site_url('tutorials')?>"><span class="lt"></span><span class="large-btn">Back to Main Page</span>
      <span class="rt"></span></a>
     <?php  } ?>
    </div>
  </div>
  <!--page midd Content End--> 
  
  <!--Exibition Pakages-->
  <div class="exibition-packages xxguestbook-bg bg-gray">
    <div class="container">
    <div class="row">
    <div class="col-sm-8 col-sm-offset-2">
    <div class="bg-white light-shadwoand tutorials-search-filters">
    <form name="from_tutorial" id="from_tutorial" action="<?=site_url('tutorials/filters')?>" method="post">
    <div class="row">
    <div class="col-sm-4 tutoriial-filter-col">
    <input type="hidden" name="category_id" id="category_id" value="<?=@$cat?>">
    <select class="form-control tutorials-filters-input" name="category" id="category" onchange="javascript:setCategory(this.value)">
    <option value="">Select Category</option>
    <?php foreach($buttonsDs as $buttonsRs){ ?>
    <option value="<?=stripslashes($buttonsRs['cat_id'])?>" <?php if($buttonsRs['cat_id']==@$cat){ ?> selected="selected" <?php } ?>>
      <?=ucfirst(stripslashes($buttonsRs['cat_name']))?></option>
    <?php } ?>
    </select>
    </div>
       <div class="col-sm-4 tutoriial-filter-col">
        <input type="hidden" name="price_range" id="price_range" value="<?=@$price?>" >
        <select class="form-control tutorials-filters-input"  onchange="javascript:setPriceRange(this.value)">
          <option value=""> Price Range</option>
          <option value="0####10" <?php if(@$price=="0####10"){ ?> selected="selected" <?php } ?>>up to $10</option>
          <option value="10####30" <?php if(@$price=="10####30"){ ?> selected="selected" <?php } ?>>$10 to $30</option>
          <option value="30####50" <?php if(@$price=="30####50"){ ?> selected="selected" <?php } ?>>$30 to $50</option>
          <option value="50####75" <?php if(@$price=="50####75"){ ?> selected="selected" <?php } ?>>$50 to $75</option>
          <option value="75####100" <?php if(@$price=="75####100"){ ?> selected="selected" <?php } ?>>$75 to $100</option>
          <option value="100####0" <?php if(@$price=="100####0"){ ?> selected="selected" <?php } ?>>Over $100</option>
        </select>
      </div>
      <div class="col-sm-4 tutoriial-filter-col">
         <input type="hidden" name="minutes" id="minutes" value="<?=@$min?>" >
          <select class="form-control tutorials-filters-input" onchange="javascript:setMiniutes(this.value)">
          <option value=""> Select Duration</option>
          <option value="10####minutes" <?php if(@$min=="10####minutes"){ ?> selected="selected" <?php } ?>>Upto 10 min</option>
          <option value="20####minutes" <?php if(@$min=="20####minutes"){ ?> selected="selected" <?php } ?>>Between 10 to 20 min</option>
          <option value="30####minutes" <?php if(@$min=="30####minutes"){ ?> selected="selected" <?php } ?>>Between 20 to 30 min</option>
          <option value="45####minutes" <?php if(@$min=="45####minutes"){ ?> selected="selected" <?php } ?>>Between 30 to 45 min</option>
          <option value="1####hour" <?php if(@$min=="1####hour"){ ?> selected="selected" <?php } ?>>Between 45 min to 1 hr</option>
          <option value="1####more" <?php if(@$min=="1####more"){ ?> selected="selected" <?php } ?>>More than 1 hour</option>
          </select>
      </div>
    </div>
    </form>
    </div>
    </div>
    </div>
    
    
    <div class="row">
    <?php 
    if(!empty($tutoDs)){
      $i=0;
    foreach($tutoDs as $tutoRs){ ?>
    <div class="col-md-4 col-sm-4 text-center"> 
    <a href="<?=site_url('tutorials/details/'.$tutoRs['id'].'/'.$this->common->create_slug($tutoRs['title']))?>">  
    <div class="tutorials-list-blog">
    <?php if($tutoRs['tut_image']){ ?>

    <div class="tutorials-list-img-blog">
    <img src="<?=base_url()?>uploads/tutorials/<?=$tutoRs['tut_image']?>" class="img-responsive light-shadwoand tutorials-list-img" alt="<?=$tutoRs['tut_image']?>">
    </div>
    <?php }else { ?>
    <img src="<?=base_url()?>front_assets/images/tutorials-list-img.jpg" class="img-responsive light-shadwoand tutorials-list-img" alt="tutorials-list-img.jpg">
    <?php } ?>
    <div class="light-shadwoand bg-white tutorials-blog-text">
    <h5><?=stripslashes($tutoRs['title'])?></h5>
    <span><?=CURRENCY?> <?=stripslashes($tutoRs['price'])?></span>
    </div>
    </div>
    </a>
    </div> 
    
    <?php } }else{ ?>
    <div class="col-md-12 col-sm-12 text-center"> 
    <div class="tutorials-list-blog">
    <div class="light-shadwoand bg-white tutorials-blog-text">
    <h5>No record found.</h5>
    </div>
    </div>
    </div> 

    <?php } ?>
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
<script src="js/jquery.mixitup.min.js"></script> 
<script type="text/javascript">
$(function(){
  $('#portfolio').mixitup({
    targetSelector: '.item',
    transitionSpeed: 450
  });
});
</script> 
<script src="<?=base_url()?>front_assets/js/config.js"></script> 
<script type="text/javascript">
function setCategory(str){
 // alert('--'+str);
  $('#category_id').val(str);
  submitValues();
}

function setPriceRange(str){
 // alert('--'+str);
  $('#price_range').val(str);
  submitValues();
}

function setMiniutes(str){
 // alert('--'+str);
  $('#minutes').val(str);
  submitValues();
}

function submitValues(){
  var cat =   $('#category_id').val();
  var price_range =   $('#price_range').val();
  var min =   $('#minutes').val(); 
  var para = cat+"/"+price_range+"/"+min;
  //alert('para'+para);
//  window.location.href= site_url+"cms/filter_tutorials/"+para;
document.from_tutorial.submit();
}

</script>
</body>
</html>
