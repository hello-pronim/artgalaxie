<?php
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
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
<title>Art Galaxie – Art of Giving</title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />
<style type="text/css">
    .market-ic-box-in { no-repeat; background-size:100% 100%; /*padding: 40px;*/}
    </style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
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
<? 
$com = new common();
$sdata = '';
$this->load->view('mainsite/common/header'); ?>
<?php N2SmartSlider(19); ?>
<div class="gallery-page-in ">
      <!--<div class="service-section service-section6">
    <div class="service-box-bg service-box-bg6" style="padding:0px 0;">
      <div class="" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <?php /* if($cmsData['page_image']!=''){ ?>
      <img src="<?=base_url()?>uploads/page_image/<?=$cmsData['page_image']?>" class="img-responsive" alt="<?=$cmsData['page_image']?>" data-aos="fade-up" data-aos-once="true"  style="width:100%;"/> 
      <?php }else{ ?>
      <img src="<?=base_url()?>front_assets/images/shop2-banner.jpg" class="img-responsive" alt="" data-aos="fade-up" data-aos-once="true" />
      <?php } */?></div>
        </div>
      </div>
    </div>-->
      <?php  if(!empty($artgivingDs)){
  foreach($artgivingDs as $artgiving) { ?>
   <div class="service-section service-section6" >
    <div class="service-box-bg service-box-bg6" style="background:white;">
      <div class="container" data-aos="fade-up" data-aos-once="true">
           <center><div class="section-hed" style="font-size:30px;"><p><?=stripslashes($artgiving['art_title'])?></p></div><br> 
            <div class="service-txt" style="margin:0px 0px;"><p><?=stripslashes($artgiving['art_text'])?></p><br><br></div></center>
        </div>

    <div class="container">
      <div class="market-icon-boxes" data-aos="fade-up" data-aos-once="true">
         <div class="row">
             <?php  if(!empty($artgivingcharity)){
  foreach($artgivingcharity as $artgivingch) { ?>
          <div class="col-sm-4">
            <!--<a href="<?=site_url('marketing-and-advertising')?>" target="_blank" class="" >-->
            <a href="<?=$artgivingch['button_url']?>" target="_blank" class="" >
            <div class="market-icon-box" style="background:#7fa03d;">
              <div class="market-ic-box-in">
<span>
                  <img src="<?=base_url()?>uploads/art_of_giving/<?=stripslashes($artgivingch['button_image'])?>" alt="<?=stripslashes($artgivingch['button_image'])?>" style="width:100%;height:auto;"/></span></div>
                
           
            </div><br><center><div class="market-box-txt" style="color:#7b933a;"><?=stripslashes($artgivingch['button_title'])?></div></center>
            </a>
          </div>
       <?php } } ?>
        </div>
        </div><br><br><br><br><br><br>
 
            <center><div class="section-hed" style="font-size:30px;"><p><?=stripslashes($artgiving['donate_title'])?></p></div><br>
          <div class="service-txt" style="margin:0px 0px 50px;"><p><?=stripslashes($artgiving['donate_text'])?></p></div></center>
           <div class="row donate-section">
             <?php  
             if(!empty($justgivingdonate))
             {
                foreach($justgivingdonate as $artgivingdon) 
                { 
                ?>
                
                <div class="col-sm-4 blog-bock aos-init aos-animate" data-aos="fade-up" data-aos-once="true">
                <div class="blog-in">
                    <div class="blog-img">
                        <img src="<?=base_url()?>uploads/art_of_giving/<?=stripslashes($artgivingdon['image'])?>" alt="<?=stripslashes($artgivingdon['image'])?>"/>
                    </div>
					<div class="blog-box-title"><?=stripslashes($artgivingdon['title'])?></div>
				    <div class="blog-shot-disc"><?=$artgivingdon['short_desc']?></div>
				    <div class="blog-footer-section">
				        <span class="price"><?=$artgivingdon['price']?></span>
				        <span class="book-cart cart">
                        <div id='product-component-<?=stripslashes($artgivingdon['add_to_cart'])?>'></div>
                         <?php //$sdata .= $com->shopify_product_datas($artgivingdon['add_to_cart2'],$artgivingdon['add_to_cart'],"1"); 
                         $sdata .= $com->shopify_inner_data($artgivingdon['add_to_cart2']);
                         ?>
                        </span>
                        
				    </div>
              </div>
            </div>
            
                    
       <?php } } ?>
        </div>
          <br><br><br><br><br><br>
          <center><div class="section-hed" style="font-size:30px;"><p><?=stripslashes($artgiving['donate_title2'])?></p></div><br>
          <div class="service-txt" style="margin:0px 0px;"><p><?=stripslashes($artgiving['donate_text2'])?></p></div></center>
          </div>
     </div>
    </div>
    <div class="service-section">
    <div class="service-box-bg" style="padding:0px 0">
      <div class="" data-aos="fade-up" data-aos-once="true">
            <center><div class="">
          <?php if($artgiving['banner2']!=''){ ?>
      <img src="<?=base_url()?>uploads/art_of_giving/<?=$artgiving['banner2']?>" class="img-responsive" alt="<?=$artgiving['banner2']?>" data-aos="fade-up" data-aos-once="true" style="width:100%" /> 
      <?php }else{ ?>
      <img src="<?=base_url()?>front_assets/images/shop2-banner.jpg" class="img-responsive" alt="" data-aos="fade-up" data-aos-once="true" /> 
      <?php } ?></div></center>

      </div>
    </div></div>
    <div class="service-section">
    <div class="service-box-bg" style="background: #ffffff url("../images/service-page-bg6.jpg") no-repeat scroll center top;
    background-color: rgb(238, 238, 238);
    background-image: url("../images/service-page-bg6.jpg");
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-clip: border-box;
    background-origin: padding-box;
    background-position-x: center;
    background-position-y: top;
    background-size: auto auto;
">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
         <!--  <div class="col-md-5"></div> -->
           <center><div class="section-hed" style="font-size:30px;"><p style="color: #4a97ae;"><?=stripslashes($artgiving['artist_title'])?></p></div><br></center>
            <!--  <div class="service-txt"></div> 
                <div class="btn-box">
                    <a href="<?=site_url('publications')?>">Visit our Library</a>&emsp;
                    <a href="<?=site_url('printing')?>">Giclee Printing</a>
                </div> -->
          <center>
          <div class="service-txt" style="margin:0px 0px;"><p><?=stripslashes($artgiving['artist_text'])?></p></div><br><br></center>
          </div>
              <div class="container">
      <div class="market-icon-boxes art-g-block" data-aos="fade-up" data-aos-once="true">
         <div class="row">
              <?php  if(!empty($justgivingartist)){
  foreach($justgivingartist as $givingartist) { ?>
          <div class="col-sm-4">
          <a target="_blank" <?php if($givingartist['id']==1){ ?> href="<?=site_url('home/just_giving_video')?>" <?php }else if($givingartist['id']==2){ ?> href="<?=site_url('home/just_giving_book')?>" <?php }else if($givingartist['id']==3){ ?> href="<?=site_url('home/just_giving_websites')?>" <?php } ?> class="">
            <div class="market-icon-box">
              <div class="market-ic-box-in">
                <div class="market-icon-img"><span>
                  <img src="<?=base_url()?>uploads/art_of_giving/<?=stripslashes($givingartist['button_image'])?>" alt="<?=stripslashes($givingartist['button_image'])?>" style="width:100%;height:auto;background:white;"/></span></div>
                
              </div>
            </div><br><center><div class="market-box-txt" style="color:#212224;"><?=stripslashes($givingartist['button_title'])?></div></center>
            </a>
          </div>
       <?php }} ?>
        </div>
        </div>
        </div>
      </div>
    </div></div>
      <div class="service-section service-section2 purple-border">
    <div class="service-box-bg service-box-bg2" style="padding:0px 0">
      <div class="" data-aos="fade-up" data-aos-once="true">
        <center><div class="">
      <?php if($artgiving['banner3']!=''){ ?>
      <img src="<?=base_url()?>uploads/art_of_giving/<?=$artgiving['banner3']?>" class="img-responsive" alt="<?=$artgiving['banner3']?>" data-aos="fade-up" data-aos-once="true" style="width:100%;"/> 
      <?php }else{ ?>
      <img src="<?=base_url()?>front_assets/images/shop2-banner.jpg" class="img-responsive" alt="" data-aos="fade-up" data-aos-once="true" /> 
      <?php } ?>
        </div></center>
      </div>
    </div>
   
  </div>
    <div class="service-section service-section2">
    <div class="service-box-bg service-box-bg2" style="background:white;">
      <div class="container" data-aos="fade-up" data-aos-once="true">
   <center><div class="section-hed" style="font-size:30px;"><p><?=stripslashes($artgiving['comp_title'])?></p></div></center>
           
            <center>
          <div class="service-txt" style="margin:0px 0px;"><p><?=stripslashes($artgiving['comp_text'])?></p></div><br>
          
                <div>
                    <a href="<?=site_url('home/view_competitions')?>" class="view_our_competitions"><center>View our Competitions</center></a>&emsp;
                </div></center>
      </div>
    </div>
   
  </div>
   <div class="service-section service-section4 service-section4new">
    <div class="service-box-bg service-box-bg4" style="background:white;">
      <div class="container" data-aos="fade-up" data-aos-once="true">
          <!-- <div class="col-md-5"></div> -->
         <center> <div class="section-hed" style="font-size:30px;"><p><?=stripslashes($artgiving['affilate_title'])?></p></div></center>
            <center>
          <div class="service-txt" style="margin:0px 0px;"><p><?=stripslashes($artgiving['affilate_text'])?></p></div><br>
            <div>
                    <a href="<?=site_url('home/refersion')?>" target="_blank" class="package-btn our-affiliate-btn"><center>Find out more</center></a>&emsp;
          </div></center>
        </div>
      </div><?php } } ?>


  </div>
</div>

</div>

</div>
<div class="modal fade cnt-form" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main green-form-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
            <div class="text-center" ><div class="popup-lg-text">You need to Login/Register.</div></div>
            </div>
           </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php N2Native::beforeClosingBody(); ?>

<script type="text/javascript">
    <?php 
       echo $com->shopify_product_wrapper(stripslashes($sdata));
    ?>
</script>

<? $this->load->view('mainsite/common/footer'); ?>

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
<link rel="stylesheet" type="text/css" href="<?=base_url()?>front_assets/booklet/css/bookblock.css" />
<!-- custom demo style -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>front_assets/booklet/css/demo1.css" />
<script src="<?=base_url()?>front_assets/booklet/js/modernizr.custom.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script src="<?=base_url()?>front_assets/booklet/js/jquerypp.custom.js"></script> 
<!--<script src="booklet/js/jquery.bookblock.js"></script>--> 
<script type="text/javascript">
$(document).ready(function() {
  $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item'); 
    $('#viewClicked').val('list'); });
  $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');  $('#viewClicked').val('grid');});
});
</script> 
<script>
       // Page.init();
</script>      
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script>                                                         
</body>
</html>