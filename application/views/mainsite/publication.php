 <?php
  //require_once(dirname(__FILE__) . "/../../../../smartslider/start.php");
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
    
    <script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
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

<?php $com = new common();
$sdata = '';
?>


<div class="containerss3">
<?php

 N2SmartSlider(6);
 ?>
 </div>
<!--
<?php  if(!empty($sliderData)){  ?>

<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container">
    <div id="myCarousel" class="carousel slide carousel-fade" > 
      
      <ol class="carousel-indicators">
      <?php for($i=0;$i<count($sliderData);$i++){ ?>
      <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
      <?php } ?>
      </ol>
      
      
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
        <iframe height="100%" width="100%" frameborder="0" src="<?=$sliderDataRs['str_name']?>?rel=0&autoplay=1"></iframe>
        <?php } ?>

        </div>
      </div>
        <?php $p++; } ?>
       </div>
    </div>
  </div>
</div>

<?php }  ?>
 -->
<div class="gallery-page-in ">
  <div class="section listartist-section dark-shadwoand-bot-border bg-color-blue bord-none z-index2" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc">
        <h2 class="section-header text-center color-fff section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
        <div class="text text-center color-fff video-txt" data-aos="fade-up" data-aos-once="true" >
          <?=stripslashes($cmsData['page_desc'])?></div>
      </div>
    </div>
  </div>
  <div class="blue-box-btn  z-index1">
    <div data-aos-once="true" data-aos="fade-up" class="text-center"><a class="dark-gray-btn personal_art_book_enquiry" href="#"  data-toggle="modal" data-target="#myModal"><span class="lt"></span><span>Personal Art Book enquiry</span><span class="rt"></span></a></div>
  </div>
  <?php
 //echo "<pre>";
// print_r($publicationDs);
 $com = new Common();
  foreach($publicationDs as $publicationRs){ ?>
  <div class="book-section">
    <div class="book-img">
      <img src="<?=base_url()?>uploads/publication_book_image/<?=$publicationRs['large_image']?>" class="img-responsive" alt="<?=$publicationRs['large_image']?>" data-aos="fade-up" data-aos-once="true" /> </div>
    <div class="section bg-white book-content">
      <div class="container" data-aos="fade-up" data-aos-once="true">
        <div class="row">
          <div class="col-lg-3 col-md-4  col-sm-5">
            <div class="col-sm-11 no-pad">
              <div class="cover-page"> 
              <a href="<?=site_url('publication_details/'.$publicationRs['id'].'/'.$this->common->create_slug($publicationRs['title']))?>">
                <img src="<?=base_url()?>uploads/publication_book_image/<?=$publicationRs['book_image']?>" alt=""/></a> </div>
              <div class="pric-and-detail-link text-center"> 
                        
                <!-- <div class="detail-link"><a href="publications-single.html">View book & details</a></div>
                    <div class="price">$ 55,00</div>-->
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="book-text">
              <h2 class="book-title"><?=stripslashes($publicationRs['title'])?></h2>
              <div class="book-disc"><?=stripslashes($publicationRs['description'])?>              
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-4  col-sm-5">
            <div class="detail-btn2 viewbook_details">
                <a class="view-store-btn" style="margin-top:10px;" href="<?=site_url('publication_details/'.$publicationRs['id'].'/'.$this->common->create_slug($publicationRs['title']))?>">View book & details</a>
            </div>
          </div>
          <div class="col-lg-9 col-md-8 col-sm-7">
            <div class="row">
              <div class="col-lg-6 col-md-4 ">
                <div class="book-pages"  style="margin-top:6px;"><?php if($publicationRs['hardcover']!=''){ ?> Hardcover, <?=stripslashes($publicationRs['hardcover'])?><? }  
                if($publicationRs['softcover']!=''){ ?> Softcover, <?=stripslashes($publicationRs['softcover'])?><? } ?>, <?=stripslashes($publicationRs['number_of_pages'])?> pages<br>
                  ISBN  <?=stripslashes($publicationRs['isbn'])?> </div>
              </div>
              <div class="col-lg-6 col-md-8 publications-social">
                <div class="social-box" style="margin-top:15px;">
                    <?php
                    $title  =   urlencode($publicationRs['title']);
                    $url    =   urlencode(site_url('publication_details/'.$publicationRs['id'].'/'.$com->create_slug($publicationRs['title'])));
                    $summary=   urlencode($publicationRs['description']);
                    $image  =   urlencode(base_url().'uploads/publication_book_image/'.stripslashes($publicationRs['book_image']));
                    ?>
                  <div class="profile-social-link text-right">
                    <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
                    <a onClick="window.open('http://twitter.com/share?text=<?php echo $summary;?>&url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>
                    <a onClick="window.open('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $image;?>&url=<?php echo $url;?>&is_video=false&description=<?php echo $summary;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a>
                    <a onClick="window.open('https://plus.google.com/share?url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a>
                    
                   <div class="book-cart pcart" style=" float: right; margin-left: 7px;">
                    <div id='product-component-<?=stripslashes($publicationRs['add_to_cart2'])?>'></div>
                    <?php //$sdata .= $com->shopify_product_datas($publicationRs['add_to_cart'],$publicationRs['add_to_cart2']); 
                    $sdata .= $com->shopify_inner_data($publicationRs['add_to_cart'],"1");
                    ?>
                    </div>
                    
                  </div>
                </div>
              </div>

                        
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>



<!-- Modal -->
<div class="modal fade cnt-form" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main green-form-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUs">Personal Art Book</h2>
              <div class="text-center" id="header-subTitle-contactUs">Having your personal Art book published is a huge promotion tool adding value to you and your artwork.<br>Tell us what you envision so we can get back to you with details to make your goal a reality.</div>
            </div>
            <div id="contactUsFormId">
            <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="contact_name" id="pub_contact_name">
            <input type="text" class="form-control" placeholder="Email" name="contact_email" id="pub_contact_email">
            <select class="form-control" name="trim_size" id="trim_size">
              <option value="">Trim Size</option>
              <option value="4.000” x 6.000” (152mm x 102mm)">4.000” x 6.000” (152mm x 102mm)</option> 
              <option value="4.000” x 7.000” (178mm x 102mm)">4.000” x 7.000” (178mm x 102mm)</option> 
              <option value="4.250” x 7.000” (178mm x 108mm)">4.250” x 7.000” (178mm x 108mm)</option> 
              <option value="4.370” x 7.000” (178mm x 111mm)">4.370” x 7.000” (178mm x 111mm)</option> 
              <option value="4.720” x 7.480” (190mm x 120mm)">4.720” x 7.480” (190mm x 120mm)</option> 
              <option value="5.000” x 7.000” (178mm x 127mm)">5.000” x 7.000” (178mm x 127mm)</option> 
              <option value="5.000” x 8.000” (203mm x 127mm)">5.000” x 8.000” (203mm x 127mm)</option> 
              <option value="5.060” x 7.810” (198mm x 129mm)">5.060” x 7.810” (198mm x 129mm)</option> 
              <option value="5.250” x 8.000” (203mm x 133mm)">5.250” x 8.000” (203mm x 133mm)</option> 
              <option value="5.500” x 8.250” (210mm x 140mm)">5.500” x 8.250” (210mm x 140mm)</option> 
              <option value="5.500” x 8.500” (216mm x 140mm)">5.500” x 8.500” (216mm x 140mm)</option> 
              <option value="5.830” x 8.270” (210mm x 148mm) A5">5.830” x 8.270” (210mm x 148mm) A5</option> 
              <option value="6.000” x 9.000” (229mm x 152mm)">6.000” x 9.000” (229mm x 152mm)</option> 
              <option value="6.140” x 9.210” (234mm x 156mm)">6.140” x 9.210” (234mm x 156mm)</option> 
              <option value="6.500” x 6.500” (165mm x 165mm)">6.500” x 6.500” (165mm x 165mm)</option> 
              <option value="6.625” x 10.250” (260mm x 168mm)">6.625” x 10.250” (260mm x 168mm)</option> 
              <option value="6.690” x 9.610” (244mm x 170mm)">6.690” x 9.610” (244mm x 170mm)</option> 
              <option value="7.000” x 10.000” (254mm x 178mm)">7.000” x 10.000” (254mm x 178mm)</option> 
              <option value="7.440” x 9.690” (246mm x 189mm)">7.440” x 9.690” (246mm x 189mm)</option> 
              <option value="7.500” x 9.250” (235mm x 191mm)">7.500” x 9.250” (235mm x 191mm)</option> 
              <option value="8.000” x 10.880” (276mm x 203mm)">8.000” x 10.880” (276mm x 203mm)</option> 
              <option value="8.000” x 8.000” (203mm x 203mm)">8.000” x 8.000” (203mm x 203mm)</option> 
              <option value="8.250” x 10.750” (273mm x 210mm)">8.250” x 10.750” (273mm x 210mm)</option> 
              <option value="8.250” x 11.000” (280mm x 210mm)">8.250” x 11.000” (280mm x 210mm)</option> 
              <option value="8.268” x 11.693” (297mm x 210mm) A4">8.268” x 11.693” (297mm x 210mm) A4</option> 
              <option value="8.500” x 11.000” (280mm x 216mm)">8.500” x 11.000” (280mm x 216mm)</option> 
              <option value="8.500” x 8.500” (216mm x 216mm)">8.500” x 8.500” (216mm x 216mm)</option> 
              <option value="8.500” x 9.000” (229mm x 216mm)">8.500” x 9.000” (229mm x 216mm)</option> 
             </select>
            <select class="form-control" name="binding_type" id="binding_type">
              <option value="">Binding Type</option>
              <option value="Hardcover">Hardcover</option> 
              <option value="Softcover">Softcover</option>
            </select>
            <input type="text" class="form-control numberonly" placeholder="Page Count" name="page_count" id="page_count" maxlength="10">
            <input type="text" class="form-control" placeholder="Quantity" name="quantity" id="quantity" >
             <select class="form-control" name="shipping_option" id="shipping_option" onchange="javascript: is_shipping(this.value)">
              <option value="">Select Shipping Option</option>
              <option value="Shipping is required">Shipping is required</option> 
              <option value="No shipping required">No shipping required</option> 
            </select>
            <input type="text" class="form-control" placeholder="Ship to Province" name="ship_to_province" id="ship_to_province" style="display:none;">
            <input type="text" class="form-control numberonly" placeholder="Ship to Postal Code" name="ship_to_postal_code" id="ship_to_postal_code" style="display:none;"  maxlength="10" >
            <textarea class="form-control" placeholder="Kindly specify any other details." name="contact_message" id="contact_message"></textarea>
           <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>" id="g-recaptcha-response"></div>
            </div>
            <div class="clearfix"></div><br>
            <div class="text-right">
              <a class="dark-gray-btn" href="javascript:void(0)"  onclick="javascript:contact_us();"><span class="lt"></span>
                <span class="large-btn">Send</span><span class="rt"></span></a></div>
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
<? $this->load->view('mainsite/common/footer');?>
<!-- /.container --> 
<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<script>
  AOS.init({
    easing: 'ease-out-back',
    duration: 1500
  });
</script>
<? $this->load->view('mainsite/common/footer_script');?>

<script type="text/javascript">
  function is_shipping(str){
    if(str=='Shipping is required'){
      $('#ship_to_province').toggle();
      $('#ship_to_postal_code').toggle();
    }else{
      $('#ship_to_province').hide();
      $('#ship_to_postal_code').hide();
     }
  }

  function contact_us(){
  var contact_name = $('#pub_contact_name').val();
  var contact_email = $('#pub_contact_email').val();
  var trim_size = $('#trim_size').val();
  var binding_type = $('#binding_type').val();
  var page_count = $('#page_count').val();
  var quantity = $('#quantity').val();
  var shipping_option = $('#shipping_option').val();
  var ship_to_province = $('#ship_to_province').val();
  var ship_to_postal_code = $('#ship_to_postal_code').val();
  var contact_message = $('#contact_message').val();



  if(contact_name=='')
  {
     $('#msg').html('<span class="text-default">Please enter name.</span>');
     $('#pub_contact_name').focus();
   return false
  }
   if(contact_email=='')
  {
     $('#msg').html('<span class="text-default">Please enter email address.</span>');
     $('#pub_contact_email').focus();
   return false
  }
   if(trim_size=='')
  {
     $('#msg').html('<span class="text-default">Please select Trim Size.</span>');
     $('#trim_size').focus();
    return false
  }
  if(binding_type=='')
  {
     $('#msg').html('<span class="text-default">Please select binding type.</span>');
     $('#binding_type').focus();
    return false
  }
  if(page_count=='')
  {
     $('#msg').html('<span class="text-default">Please enter  page count.</span>');
     $('#page_count').focus();
    return false
  }
  if(quantity=='')
  {
     $('#msg').html('<span class="text-default">Please enter quantity.</span>');
     $('#quantity').focus();
    return false
  }
 
  if(shipping_option=='')
  {
     $('#msg').html('<span class="text-default">Please select shipping option.</span>');
     $('#shipping_option').focus();
    return false
  }
  
  if(contact_message=='')
  {
     $('#msg').html('<span class="text-default">Please enter message.</span>');
     $('#contact_message').focus();
    return false
  }
/* 
  if ($("#g-recaptcha-response").val()) {

    xyz = $("#g-recaptcha-response").val();*/
    jQuery.ajax({
              type: "POST",
              url: "<?=site_url('home/publication_email')?>",
              data: {           
                    contact_name: contact_name,
                    contact_email: contact_email,
                    trim_size: trim_size,
                    binding_type: binding_type,
                    page_count: page_count,
                    quantity: quantity,
                    shipping_option: shipping_option,
                    ship_to_province: ship_to_province,
                    ship_to_postal_code: ship_to_postal_code,
                    contact_message: contact_message,
                    //THIS WILL TELL THE FORM IF THE USER IS CAPTCHA VERIFIED.
                    //captcha: xyz
                  },
              cache: false,
              success:  function(data)
            { 
             if(data=='done')
              {
				
                $('#header-title-contactUs').text('Thank you');
                $('#header-subTitle-contactUs').html('<br/><div class="popup-lg-text">Your request has been submitted.</div>Our Design and Printing specialists with look into the details<br/>you have submitted and will get back to you at the earliest.<style>.cnt-form .form-main h2{margin-bottom: 0px;}.cnt-form .cnt-frm-txt {margin: 0px 0 20px;}</style>');
                 $('#contactUsFormId').hide();
                
                
                $('#pub_contact_name').val('');
                $('#pub_contact_email').val('');
                $('#trim_size').val('');
                $('#binding_type').val('');
                $('#page_count').val('');
                $('#quality').val('');
                $('#shipping_option').val('');
                $('#ship_to_province').val('');
                $('#ship_to_postal_code').val('');
                $('#contact_message').val('');
                $('#msg').html('<span class="text-success">Mail sent successfully!!</span><style>.modal.in .modal-dialog{transform: translate(0px,50%);}.cnt-form .modal-dialog {	width: auto;margin: 0% 25%;	}</style>');
              }
              
              if(data=='NameBlank'){
               $('#msg').html('<span class="text-danger">Name can not be blank!!</span>');
                $('#NameBlank').focus()
               }
              if(data=='Emailblank'){
               $('#msg').html('<span class="text-danger">Email address can not be blank!!</span>');
               $('#contact_email').focus();
               }
             if(data=='InvalidEmail'){
                $('#msg').html('<span class="text-danger">Please enter valid e-mail address!!</span>');
                $('#contact_email').focus();
              }
                }
            });
            
  /*  }else{
        $('#msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
    }
*/
  }
 $(document).ready(function(){ 
  $('.numberonly').keydown(function(e){
    var key = e.charCode || e.keyCode || 0;
    // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
    // home, end, period, and numpad decimal
    return (
      key == 8 || 
      key == 9 ||
      key == 13 ||
      key == 46 ||
      key == 110 ||
      key == 190 ||
      (key >= 35 && key <= 40) ||
      (key >= 48 && key <= 57) ||
      (key >= 96 && key <= 105));
  });
});
</script>

</body>
</html>
