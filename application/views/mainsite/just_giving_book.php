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
<script src='https://www.google.com/recaptcha/api.js'></script>    
</head>

<body>
<? $this->load->view('mainsite/common/header');?>


<!--banner-->
<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container">
  
  </div>
</div>
<!-- Page Content -->


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


</div>
<div class="" data-aos="fade-up" data-aos-once="true">
<div class="service-section service-section2" style="background-color: white;"> 
    <?php  if(!empty($bookDs))
    {
        foreach($bookDs as $book) 
        { 
            $this->db->select("*");
            $this->db->from('tbl_publication');
            $this->db->where('tbl_publication.id',$book['publication_id']);
            $query = $this->db->get();
            $Pdata= $query->result_array();
        ?>
            <div class="service-box-bg service-box-bg2">
            <div class="container" data-aos="fade-up" data-aos-once="true">
            <h2 class="video-header" style="color:black;border-bottom: solid 2px #00599B;" ><p><?php echo $Pdata[0]['title']; ?></p></h2>
            <center>
            <img src="<?=base_url()?>uploads/art_of_giving/<?=stripslashes($book['banner_image'])?>" alt="<?=stripslashes($book['banner_image'])?>"/><br>
            </center>
            <div class="service-txt"><p><?=stripslashes($book['giving_book_text'])?></p></div>
            <div>
                <a href="<?=base_url('publication_details/'.$Pdata[0]['id'].'/'.$this->common->create_slug($Pdata[0]['title']))?>.html" class="package-btn">
                <center>View Book</center></a>&emsp;
            </div>
            </div>
        </div>
    </div>
    <?php 
    } 
    } 
?>
 </div>
     <!-- <div class="container" data-aos="fade-up" data-aos-once="true">
          <div class="service-section service-section2" style="background-color: white;">
              
    <div class="service-box-bg service-box-bg2">
      <div class="container" data-aos="fade-up" data-aos-once="true">
          <center>
          <img src="<?=base_url()?>uploads/art_of_giving/<?=stripslashes($book['banner2'])?>" alt="<?=stripslashes($book['banner2'])?>"/><br>
          </center>
   <center><div class="service-txt"><p><?=stripslashes($book['giving_book_text2'])?></p></div></center>
           
            
      </div>
    </div>
   
  </div>
      </div>-->

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
    <? $this->load->view('mainsite/common/footer_script');?>
<script type="text/javascript">
 <?php foreach($publicationDs as $publicationRs2){ ?>

$("#tweeter-share-<?=$publicationRs2['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
 $("#fb-share-<?=$publicationRs2['id']?>").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+encodeURIComponent(n)+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
  $("#gplus-share-<?=$publicationRs2['id']?>").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
  $("#pinterest-share-<?=$publicationRs2['id']?>").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});
<?php } ?>
</script>
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
  var contact_name = $('#contact_name').val();
  var contact_email = $('#contact_email').val();
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
     $('#contact_name').focus();
   return false
  }
   if(contact_email=='')
  {
     $('#msg').html('<span class="text-default">Please enter email address.</span>');
     $('#contact_email').focus();
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
 
  if ($("#g-recaptcha-response").val()) {

    xyz = $("#g-recaptcha-response").val();
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
                    captcha: xyz
                  },
              cache: false,
              success:  function(data)
            { 
             if(data=='done')
              {

                $('#header-title-contactUs').text('Thank you');
                $('#header-subTitle-contactUs').html('<br/><div class="popup-lg-text">Your request has been submitted.</div>Our Design and Printing specialists with look into the details<br/>you have submitted and will get back to you at the earliest.');
                 $('#contactUsFormId').hide();
                
                
                $('#contact_name').val('');
                $('#contact_email').val('');
                $('#trim_size').val('');
                $('#binding_type').val('');
                $('#page_count').val('');
                $('#quality').val('');
                $('#shipping_option').val('');
                $('#ship_to_province').val('');
                $('#ship_to_postal_code').val('');
                $('#contact_message').val('');
                $('#msg').html('<span class="text-success">Mail sent successfully!!</span>');
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
            
    }else{
        $('#msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
    }

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
