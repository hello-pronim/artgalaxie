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

<script src="https://www.amcharts.com/lib/3/ammap.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldHigh.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/themes/dark.js" type="text/javascript"></script>


<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom-31012017.css" rel="stylesheet"> <!-- CSS from psd  31012017-->
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
<style>
img.ben_icon {
max-width: 120%;
}
.titlefont0{
font-size: 25px;
color:#edb928;
}

.titlefont{
font-size: 25px;
color:#7b933a;
}

.titlefont5{
font-size: 25px;
color:#5ecef1;
}

.titlefont2{
font-size: 25px;
color: #30c3c0;
}

.titlefont3{
font-size: 25px;
color: #68569f;
}
.mycss1{
padding:60px;
background-color:#E8E8E8;
}



@media all screen and (-webkit-min-device-pixel-ratio: 3),
only screen and (min-resolution: 3dppx), /* Default way */
only screen and (min-resolution: 350dpi) /* dppx fallback */ {

.titlefont0{
padding-left: 0px;
font-size: 25px;

}

.titlefont{
padding-left: 0px;
font-size: 25px;



}

.titlefont5{
padding-left: 0px;
font-size: 25px;

}

.titlefont2{
padding-left: 0px;
font-size: 25px;


}

.titlefont3{
padding-left: 0px;
font-size: 25px;

}



.mycss1 {
padding: 30px;
}
}


@media only screen and (min-device-width:768px) and (max-device-width:1024px)

{

.titlefont0{
padding-left: 0px;
font-size: 25px;

}

.titlefont{
padding-left: 0px;
font-size: 25px;


}

.titlefont5{
padding-left: 0px;
font-size: 25px;

}

.titlefont2{
padding-left: 0px;
font-size: 25px;


}

.titlefont3{
padding-left: 0px;
font-size: 25px;

}


.mycss1 {
padding: 30px;
}

.col-md-5{

padding-right: 50px;                                             }
}

@media only screen and (min-device-width: 320px) and (max-device-width: 480px) {

.titlefont0{
padding-left: 0px;
font-size: 25px;

}

.titlefont{
padding-left: 0px;
font-size: 25px;


}

.titlefont5{
padding-left: 0px;
font-size: 25px;

}

.titlefont2{
padding-left: 0px;
font-size: 25px;


}

.titlefont3{
padding-left: 0px;
font-size: 25px;

}

.mycss1 {
padding: 30px;
}
.bg-white1 {
padding: 20px;
}

</style>
</head>

<body >
<?php $this->load->view('mainsite/common/header');?>
<?php  if(!empty($sliderData)){  ?>
<!--banner-->
<div class="top-slider image-with-video-slider" data-aos="fade-up">
  <div class="container">
    <div id="myCarousel" class="carousel slide carousel-fade" > <!-- Indicators -->

      <ol class="carousel-indicators">
      <?php for($i=0;$i<count($sliderData);$i++){ ?>
      <li data-target="#myCarousel" data-slide-to="<?=$i?>" <?php if($i==0){ ?> class="active" <?php } ?>></li>
      <?php } ?>
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
        <iframe height="100%" width="100%" frameborder="0" src="<?=$sliderDataRs['str_name']?>?rel=0&autoplay=1"></iframe>
        <?php } ?>

        </div>
      </div>
        <?php $p++; } ?>
       </div>
    </div>
  </div>
</div>
<!-- Page Content -->
<?php }  ?>

<div class="gallery-page-in ">
  <div class="section listartist-section dark-shadwoand-bot-border z-index2" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc">
        <h2 class="section-header text-center color-fff"><?=stripslashes($cmsData['page_title'])?></h2>
       <!-- <div class="blue-text"><?=stripslashes($cmsData['subtitle'])?></div>
        <div class="text text-center color-fff video-txt text-center font-18 line-height-30" data-aos="fade-up" data-aos-once="true" ><p><?=stripslashes($cmsData['page_desc'])?></p>
        </div>-->

    <div class="bttn-box">
       <center><a href="#" data-toggle="modal" data-target="#myModalBenefits">Apply Now</a></center>
    </div>
      </div>
    </div>
  </div>

  <div class="mycss11" >
  <div class="section bg-white1" >

      <div class="mycss1" >
  <?php  if(!empty($gallerybenefits)){
  foreach($gallerybenefits as $gallerybenefitsDs) { ?>
  <div class="service-section service-section5">
    <div class="service-box-bg service-box-bg6a" style="background: white;" >
      <div class="container" data-aos="fade-up" data-aos-once="true" style="width: 88%;">
        <div class="row">
            <div class="col-md-1" style="text-align:center;">
                <?php 
                    if($gallerybenefitsDs['benefits_icon'] !="")
                    {
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/<?=$gallerybenefitsDs['benefits_icon']?>">
                    <?php 
                    }
                    else
                    { 
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/noicon.jpg">
                    <?php 
                    } 
                    ?>
            </div>
            <div class="col-md-4">
                <div class="titlefont0"><?=stripslashes($gallerybenefitsDs['benefits_title'])?></div>
            </div>
            <div class="col-md-6">
                <?=stripslashes($gallerybenefitsDs['benefits_text'])?>
            </div>
        </div>
        
      </div>
      
    </div>
  </div><br><br><br>
  <div class="service-section service-section6">
    <div class="service-box-bg service-box-bg6a" style="background: white;">
      <div class="container" data-aos="fade-up" data-aos-once="true" style="width: 88%;">
        <div class="row">
            <div class="col-md-1" style="text-align:center;">
                <?php 
                    if($gallerybenefitsDs['benefits2_icon'] !="")
                    {
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/<?=$gallerybenefitsDs['benefits2_icon']?>">
                    <?php 
                    }
                    else
                    { 
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/noicon.jpg">
                    <?php 
                    } 
                    ?>
            </div>
            <div class="col-md-4">
                <div class="titlefont"><?=stripslashes($gallerybenefitsDs['benefits2_title'])?></div>
            </div>
            <div class="col-md-6">
                <?=stripslashes($gallerybenefitsDs['benefits2_text'])?>
            </div>
        </div>
        </div>
      </div>
    </div><br><br><br>

  <div class="service-section service-section4 service-section4new">
    <div class="service-box-bg service-box-bg4a" style="background: white;">
      <div class="container" data-aos="fade-up" data-aos-once="true" style="width: 88%;">
        <div class="row">
            <div class="col-md-1" style="text-align:center;">
                <?php 
                    if($gallerybenefitsDs['benefits3_icon'] !="")
                    {
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/<?=$gallerybenefitsDs['benefits3_icon']?>">
                    <?php 
                    }
                    else
                    { 
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/noicon.jpg">
                    <?php 
                    } 
                    ?>
            </div>
            <div class="col-md-4">
                <div class="titlefont2"><?=stripslashes($gallerybenefitsDs['benefits3_title'])?></div>
            </div>
            <div class="col-md-6">
                <?=stripslashes($gallerybenefitsDs['benefits3_text'])?>
            </div>
        </div>
          </div>
        </div>
      </div><br><br><br>

   <div class="service-section">
    <div class="service-box-bg service-box-bg6a" style="background: white;">
      <div class="container" data-aos="fade-up" data-aos-once="true" style="width: 88%;">
        <div class="row">
            <div class="col-md-1" style="text-align:center;">
                <?php 
                    if($gallerybenefitsDs['benefits4_icon'] !="")
                    {
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/<?=$gallerybenefitsDs['benefits4_icon']?>">
                    <?php 
                    }
                    else
                    { 
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/noicon.jpg">
                    <?php 
                    } 
                    ?>
            </div>
            <div class="col-md-4">
                <div class="titlefont5"><?=stripslashes($gallerybenefitsDs['benefits4_title'])?></div>
            </div>
            <div class="col-md-6">
                <?=stripslashes($gallerybenefitsDs['benefits4_text'])?>
            </div>
        </div>
        </div>
      </div>
    </div><br><br><br>
  <div class="service-section service-section3">
    <div class="service-box-bg service-box-bg3" style="background: white;">
      <div class="container" data-aos="fade-up" data-aos-once="true" style="width: 88%;">
        <div class="row">
            <div class="col-md-1" style="text-align:center;">
                <?php 
                    if($gallerybenefitsDs['benefits5_icon'] !="")
                    {
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/<?=$gallerybenefitsDs['benefits5_icon']?>">
                    <?php 
                    }
                    else
                    { 
                    ?>
                        <img class="ben_icon" src="<?=base_url()?>uploads/shop/books/noicon.jpg">
                    <?php 
                    } 
                    ?>
            </div>
            <div class="col-md-4">
                <div class="titlefont3"><?=stripslashes($gallerybenefitsDs['benefits5_title'])?></div>
            </div>
            <div class="col-md-6">
                <?=stripslashes($gallerybenefitsDs['benefits5_text'])?>
            </div>
        </div>
        </div>
        </br>
         <?php //print_r($getCountryMapCode); ?>
        <div id="mapdiv" style="width: 100%; height: 600px;margin-top:50px;"></div>

        <script type="text/javascript">
        var map = AmCharts.makeChart("mapdiv",{
        type: "map",
        theme: "dark",
        projection: "mercator",
        panEventsEnabled : true,
        backgroundColor : "#ffffff",
        backgroundAlpha : 1,
        zoomControl: {
        zoomControlEnabled : true
        },
        dataProvider : {
        map : "worldHigh",
        getAreasFromMap : true,
        areas :
        [
            <?php foreach($getCountryMapCode as $countryMap) {  ?>	
        	{
        		"id": "<?php echo $countryMap['country_code']; ?>",
        		"showAsSelected": true
        	},
        	<?php } ?>
        	
        ]
        },
        areasSettings : {
        autoZoom : true,
        color : "#B4B4B7",
        colorSolid : "#84ADE9",
        selectedColor : "#68569f",
        outlineColor : "#666666",
        rollOverColor : "#9EC2F7",
        rollOverOutlineColor : "#000000"
        }
        });
        </script>
      </div>
    </div><br><br><br>
  <div class="service-section service-section2">
    <div class="service-box-bg service-box-bg2" style="background: white;">
      <div class="container" data-aos="fade-up" data-aos-once="true" style="width: 88%;">
        <div class="row">
            <div class="col-md-1" style="text-align:center;">
                <?php 
                    if($gallerybenefitsDs['benefits6_icon'] !="")
                    {
                    ?>
                        <img src="<?=base_url()?>uploads/shop/books/<?=$gallerybenefitsDs['benefits6_icon']?>">
                    <?php 
                    }
                    else
                    { 
                    ?>
                        <img src="<?=base_url()?>uploads/shop/books/noicon.jpg">
                    <?php 
                    } 
                    ?>
            </div>
            <div class="col-md-4">
                <div class="titlefont3"><?=stripslashes($gallerybenefitsDs['benefits6_title'])?></div>
            </div>
            <div class="col-md-6">
                <?=stripslashes($gallerybenefitsDs['benefits6_text'])?>
            </div>
        </div>
      </div>
    </div>

  </div>

<?php } } ?>
</div>
</div></div>

<div class="modal fade cnt-form" id="myModalBenefits" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="contactusbenefits">
        <div class="form-main green-form-bg" style="background: #9A5A4B;">
          <button type="button" class="close" style="background: #9A5A4B;" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2 id="header-title-contactUsBenefits" style="color: #d4cd98;">Apply To Partner With Us</h2>
              <div class="text-center" id="header-subTitle-contactUsBenefits"></div>
            </div>
            <div id="contactUsFormIdBenefits">
            <div id="msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="contact_name_benefits" id="contact_name_benefits"  >
            <input type="text" class="form-control" placeholder="Title At Gallery" name="title" id="title" >

            <input type="text" class="form-control" placeholder="Gallery Name" name="gallery_name" id="gallery_name" maxlength="10">
            <input type="text" class="form-control" placeholder="Email" name="email" id="email" >
            <input type="text" class="form-control" placeholder="Gallery Website" name="gallery_website" id="gallery_website">
            <textarea class="form-control" placeholder="Type your message here..." name="contact_message_benefits" id="contact_message_benefits"></textarea>
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>"></div>
            </div>
            <div class="clearfix"></div><br>
             <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="sub">Send<span class="ajax-loader"></span></button>
             </div>
              </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal  Thanks Contact us -->
<div class="modal fade cnt-form" id="thanksmodalbenefits" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Thank you for contacting us</h2>
              <div class="text-center">Your message has been successfully submitted.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</div>


 <div class="section listartist-section dark-shadwoand-bot-border z-index2" >
    <div class="container" data-aos="fade-up" data-aos-once="true">
      <div class="vedio-page-disc">
        <h2 class="section-header text-center color-fff">Feel free to drop us a line should you have any queries.</h2>
     

    <div class="bttn-box">
       <center><a href="#" data-toggle="modal" data-target="#myModalContact">Contact us</a></center>
    </div>
      </div>
    </div>
  </div>
  
  <div class="green-box-btn  z-index1">
    <div data-aos-once="true" data-aos="fade-up" class="text-center aos-init aos-animate">
        <a class="dark-gray-btn personal_art_book_enquiry return-to-galleries-link" href="/galleries.html">
            <span class="return-to-galleries">Return to Galleries</span>
        </a></div>
  </div>
<?php $this->load->view('mainsite/common/footer');?>
 <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA225CY-g8fmy4shsV3Y6s21JtWT4Cag&amp;libraries=geometry&amp;libraries=places" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyA8Wn0s2nK_tUMZvcEY3OTLrlfVRUG_e7s&libraries=places&region=uk&language=en&sensor=true"></script>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
     <script>
    $(function () {
        var lat = 36.2123527,
            lng =-104.7462348,
            latlng = new google.maps.LatLng(lat, lng),
            image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
        //zoomControl: true,
        //zoomControlOptions: google.maps.ZoomControlStyle.LARGE,
        var mapOptions = {
                center: new google.maps.LatLng(lat, lng),
                zoom: 5,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                panControl: true,
                panControlOptions: {
                    position: google.maps.ControlPosition.TOP_RIGHT
                },
                zoomControl: true,
                zoomControlOptions: {
                    style: google.maps.ZoomControlStyle.LARGE,
                    position: google.maps.ControlPosition.TOP_left
                }
            },
            map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),
            marker = new google.maps.Marker({
                position: latlng,
                map: map,
                icon: image
            });
        var input = document.getElementById('searchTextField');

        var autocomplete = new google.maps.places.Autocomplete(input, {
            types: ["geocode"]
        });
        autocomplete.bindTo('bounds', map);
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(autocomplete, 'place_changed', function (event) {
            infowindow.close();
            var place = autocomplete.getPlace();
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }
            moveMarker(place.name, place.geometry.location);
            $('#MapLat').val(place.geometry.location.lat());
            $('#MapLon').val(place.geometry.location.lng());
        });
        google.maps.event.addListener(map, 'click', function (event) {
            $('.MapLat').val(event.latLng.lat());
            $('.MapLon').val(event.latLng.lng());
            infowindow.close();
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                "latLng":event.latLng
            }, function (results, status) {
                console.log(results, status);
                if (status == google.maps.GeocoderStatus.OK) {
                    console.log(results);
                    var lat = results[0].geometry.location.lat(),
                        lng = results[0].geometry.location.lng(),
                        placeName = results[0].address_components[0].long_name,
                        latlng = new google.maps.LatLng(lat, lng);
                    moveMarker(placeName, latlng);
                    $("#searchTextField").val(results[0].formatted_address);
                }
            });
        });

        function moveMarker(placeName, latlng) {
            marker.setIcon(image);
            marker.setPosition(latlng);
            infowindow.setContent(placeName);
            //infowindow.open(map, marker);
        }
    });
</script>
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


<!-- Contact us Popup -->

<script type="text/javascript">
$('#contactform').submit(function(e)
{
    e.preventDefault(); 
    var contact_name        = $('#contact_name').val();
    var contact_email       = $('#contact_email').val();
    var contact_subject     = $('#contact_subject').val();
    var contact_message1    = $('#contact_message1').val();
    var department          = $('#department').val();
    
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
          success:  function(data)
          {
            if(data=='done')
            {
                $('#contact_name').val('')
                $('#contact_email').val('')
                $('#contact_message1').val('')
                $('#contact_subject').val('')
                $('#department').val('')
                $('#contact_msg').html('<span class="text-success">Mail sent successfully!!</span>')
                $('#myModalContact').modal('hide')
                $('#thanksmodal').modal('toggle');
            }
            else
            {
                $('#contact_msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
            }
           
        }
        });
});
</script>




<script type="text/javascript">
$('#contactusbenefits').submit(function(e)
{
   
    var contact_name_benefits = $('#contact_name_benefits').val();
    var title = $('#title').val();
    var gallery_name = $('#gallery_name').val();
    var email = $('#email').val();
    var gallery_website = $('#gallery_website').val();
    var contact_message_benefits = $('#contact_message_benefits').val();

    if(contact_name_benefits=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Name.</span>');
        $('#contact_name_benefits').focus();
        return false
    }
    if(title=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Title.</span>');
        $('#title').focus();
        return false
    }
    if(gallery_name=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Gallery Name.</span>');
        $('#gallery_name').focus();
        return false
    }
    if(email=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Email.</span>');
        $('#email').focus();
        return false
    }
    if(gallery_website=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Gallery Website.</span>');
        $('#gallery_website').focus();
        return false
    }
    
    if(contact_message_benefits=='')
    {
        $('#msg').html('<span class="text-default">Please Enter Message.</span>');
        $('#contact_message_benefits').focus();
        return false
    }

    jQuery.ajax({
        type: "POST",
        url: "<?=site_url('home/benefit_apply_email')?>",
        data: new FormData(this),
        processData: false,
        contentType: false,
        cache: false,
        success:  function(data)
        {
            if(data=='done')
            {
                $('#contact_name_benefits').val('')
                $('#title').val('')
                $('#gallery_name').val('')
                $('#email').val('')
                $('#gallery_website').val('')
                $('#contact_message_benefits').val('')
                $('#msg').html('<span class="text-success">Mail sent successfully!!</span>')
                $('#myModalBenefits').modal('hide')
                $('#thanksmodalbenefits').modal('toggle');
            }
            else
            {
                $('#msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
            }
        }
    });
});
</script>


<?php $this->load->view('mainsite/common/login-registration-common-js'); ?>
</body>
</html>
