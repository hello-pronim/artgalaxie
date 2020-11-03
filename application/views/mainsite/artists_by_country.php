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
<title>Art Galaxie – Artists by Country</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
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

<script src="https://www.amcharts.com/lib/3/ammap.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldHigh.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/themes/dark.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyA8Wn0s2nK_tUMZvcEY3OTLrlfVRUG_e7s&libraries=places&region=uk&language=en&sensor=true"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
<style type="text/css">
.colour-black{
  color: #000;
}
</style>
</head>

<body >
<? $this->load->view('mainsite/common/header');?>

<div class="top-slider image-with-video-slider" data-aos="fade-up">
<div class="container">
    
      <?php N2SmartSlider(25); ?>
    <?php N2Native::beforeClosingBody(); ?>
    
    
     <?php /* ?>
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
        <iframe height="100%" width="100%" frameborder="0" src="<?=$sliderDataRs['str_name']?>?autoplay=0&rel=0"></iframe>
        <?php } ?>

        </div>
      </div>
      <?php $p++; } ?>
      <div class="item">
        <div class="fill"><img src="<?=base_url()?>front_assets/images/gallery-page-banner.jpg" alt=""/></div>
      </div>
    </div>
  </div>
  <?php */ ?>
  
</div>
</div>


<div class="gallery-page-in ">
  <div class=" middle-tab-section">
    <div class="middle-tab-section-bg artist-information-menu box-shadow-block">
      <div class="container"  data-aos="fade-down">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="middle-menu">
            <ul class="nav nav-tabs">
              <li><a href="<?=site_url('artists')?>" class="midd-menu11" style="width: 60px;">All</a></li>
              <li><a href="<?=site_url('mostly-viewed')?>" class="midd-menu13">Most Viewed</a></li>
              <li><a href="<?=site_url('recently-added')?>" class="midd-menu14">Recently Added</a></li>
              <li class="active"><a href="<?=site_url('artists-by-country')?>" class="midd-menu15">Artist by Country</a></li>
              <li><a href="<?=site_url('feature_artists')?>" class="midd-menu16">Featured Artist</a></li>
              <li><a class="midd-menu12" href="<?=site_url('artists-video/0')?>">Artist Videos</a></li>
            </ul>
          </div>
        </div>
    </div>
      </div>
    </div>
  </div>
 
  <div class="section listartist-section mar-top-bot-20 mar-bot-0 pad-bot-0" id="listartist">
  <div class="container">
    <div class="col-lg-12">
     <h2 class="section-header text-center color-fff" style="padding:0 0 60px;">Artists by Country</h2>
    </div>
  </div>
    <?php 
    if(!empty($getCountry))
    { 
    ?>
        <div class="container listartist-tab-inner-bg pad-50-15-100">
            <div class="row">
                
                    <div class="col-lg-3 col-md-3 col-sm-3" data-aos="fade-up" >
                        <div class="artists-list-box artists-list-box-blue">
                        <ul>
                        <?php
						$trowOne=count($getCountryColOne);
						if($trowOne<18){$narOne=(18-$trowOne);
						$nclmOne = array();
						foreach(range(1, $narOne) as $iOne) {
						array_push($getCountryColOne, $narOne);
						}}
						foreach ($getCountryColOne as $countryRsColOne) 
                        { 
                        ?>
                            <li>
                                <a  href="#countryResult" style="padding: 0px 0px;line-height: 28px;">
                                <button id="Country_<?=$countryRsColOne['id']?>" style="width: 100%; background: none;border: none;" value="<?=stripslashes($countryRsColOne['country_name'])?>"onclick="fetchCountry(<?=$countryRsColOne['id']?>)"><?=stripslashes($countryRsColOne['country_name'])?></button>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        </ul>
                    </div>
                    </div>
                
                    <div class="col-lg-3 col-md-3 col-sm-3" data-aos="fade-up" >
                        <div class="artists-list-box artists-list-box-green">
                        <ul>
                    <?php
					$trowTwo=count($getCountryColTwo);
					if($trowTwo<18){$narTwo=(18-$trowTwo);
					$nclmTwo = array();
					foreach(range(1, $narTwo) as $iTwo) {
					array_push($getCountryColTwo, $narTwo);
					}}
                    foreach ($getCountryColTwo as $countryRsColTwo) 
                    { 
                    ?>
                        <li>
                        <a  href="#countryResult" style="padding: 0px 0px;line-height: 28px;">
                            <button id="Country_<?=$countryRsColTwo['id']?>" style="width: 100%; background: none;border: none;" value="<?=stripslashes($countryRsColTwo['country_name'])?>"onclick="fetchCountry(<?=$countryRsColTwo['id']?>)"><?=stripslashes($countryRsColTwo['country_name'])?></button>
                        </a>
                        </li>
                    <?php
                    }
                    ?>
                    </ul>
                        </div>
                         </div>
                  
                    <div class="col-lg-3 col-md-3 col-sm-3 " data-aos="fade-up" >
                        <div class="artists-list-box artists-list-box-orange">
                        <ul>
                    <?php
					$trowThree=count($getCountryColThree);
					if($trowThree<18){$narThree=(18-$trowThree);
					$nclmThree = array();
					foreach(range(1, $narThree) as $iThree) {
					array_push($getCountryColThree, $narThree);
					}}
                    foreach ($getCountryColThree as $countryRsColThree) 
                    { 
                    ?>
                        
                            <li>
                            <a  href="#countryResult" style="padding: 0px 0px;line-height: 28px;">
                                <button id="Country_<?=$countryRsColThree['id']?>" style="width: 100%; background: none;border: none;" value="<?=stripslashes($countryRsColThree['country_name'])?>"onclick="fetchCountry(<?=$countryRsColThree['id']?>)"><?=stripslashes($countryRsColThree['country_name'])?></button>
                            </a>
                            </li>
                        
                    <?php
                    }
                    ?>
                    </ul>
                        </div>
                         </div>
                  <div class="col-lg-3 col-md-3 col-sm-3" data-aos="fade-up" >
                        <div class="artists-list-box artists-list-box-red">
                        <ul>
                 
                    <?php
					$trowFour=count($getCountryColFour);
					if($trowFour<18){$narFour=(18-$trowFour);
					$nclmFour = array();
					foreach(range(1, $narFour) as $iFour) {
					array_push($getCountryColFour, $narFour);
					}}
					foreach ($getCountryColFour as $countryRsColFour) 
                    { 
                    ?>
                       
                             <li>
                            <a  href="#countryResult" style="padding: 0px 0px;line-height: 28px;">
                                <button id="Country_<?=$countryRsColFour['id']?>" style="width: 100%; background: none;border: none;" value="<?=stripslashes($countryRsColFour['country_name'])?>"onclick="fetchCountry(<?=$countryRsColFour['id']?>)"><?=stripslashes($countryRsColFour['country_name'])?></button>
                            </a>
                            </li>
                        
                    <?php
                    }
                    ?>
                    </ul>
                        </div>
                         </div>
            </div>
        </div>
    
    <?php 
    } 
    ?>
    
    </div>
<div class='clearfix'>&nbsp;</div>
  <div class="section bg-white pad-50-0-90" >
  
  
  <div data-aos-duration="2500" data-aos="fade-up" class="container">
    <div class="col-lg-12">
      <h2 class="section-header text-center" id="singleCountryName"><?=stripslashes($getCountryName[0]['country'])?></h2>
    </div>
  </div>
    <div class="container" data-aos="fade-up">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div id="portfolio">
             <div class="row" id="countryResult">
               <?php foreach($artistByCountry as $artistByCountryRs){ ?>
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12"  data-aos="fade-up" >
                  <a href="<?=site_url('artists/details/'.$artistByCountryRs['id'].'/'.$this->common->create_slug(stripslashes($artistByCountryRs['first_name'].' '.$artistByCountryRs['last_name'])))?>">
                      <div class="artist-img-blog" >
                        <div class="tumb-img">
                              <?php
                              if($artistByCountryRs['profile_pic'])
                              { ?>
                              <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artistByCountryRs['profile_pic']?>" alt="">
                              <?php }else{?>
                              <img src="<?=base_url()?>uploads/user_profile_pic/profilepicnot.jpeg" alt="">
                              <?php } ?>
                          <div class="overlay"></div>
                        </div>
                        <p><?=stripslashes($artistByCountryRs['first_name'].' '.$artistByCountryRs['last_name'])?></p>
                      </div>
                   </a>
                </div>
                <?php } ?>
              </div>
             </div>
          </div>
        </div>
      </div>
      
      
     <div style="background:  #e8e8e8;padding:  10px;text-align:  center;margin-top:  46px;box-shadow: 5px 5px 30px #000;">
      <h2 style="margin-bottom: 40px;margin-top: 30px;">Art Galaxie artists around the world</h2>
     </div>
      <!--<div id="map" style="height: 700px;width: 1250px;margin-left:100px;"><p ></p></div>-->
        <div id="mapdiv" style="width: 100%; height: 600px;margin-top: -3px;"></div>

        <script type="text/javascript">
        var map = AmCharts.makeChart("mapdiv",{
        type: "map",
        theme: "dark",
        projection: "mercator",
        panEventsEnabled : true,
        backgroundColor : "#e8e8e8",
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
     <div style="background:  #e8e8e8;/* padding:  10px; *//* text-align:  center; */margin-top: -3px;height: 111px;">  </div>
     
</div>
<? $this->load->view('mainsite/common/footer');?>
<!-- /.container --> 
 <!--<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA225CY-g8fmy4shsV3Y6s21JtWT4Cag&amp;libraries=geometry&amp;libraries=places" type="text/javascript"></script>
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
</script>-->
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
        
<script src="<?=base_url()?>front_assets/js/jquery.mixitup.min.js"></script> 
<script type="text/javascript">
$(function(){
  $('#portfolio').mixitup({
    targetSelector: '.item',
    transitionSpeed: 450
  });
  $('#Country_2').trigger('click');
  
    $('html, body').stop().animate({
        //scrollTop: $('#listartist').offset().top
        scrollTop: 0
    }, 1000);
  
});
</script>
<script>
    $('.carousel').carousel({
        interval: false //changes the speed
    });


    </script>
 <script>
 $('a[href^="#"]').on('click', function(event) {

    var target = $(this.getAttribute('href'));

    if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top
        }, 1000);
    }

});
 </script>

 <!--Custom Script -->
 <script type="text/javascript">
   function fetchCountry(str){
    $('#countryResult').html('');
    var countryName = $("#Country_"+str).text();
    $('#singleCountryName').text(countryName);
    $.ajax({
      type:"post",
      url:"<?=site_url('artists/getArtistsByCountry')?>",
      data:"countryName="+countryName,
      success:function(data){
        $('#countryResult').html(data);
      }
    });
  }
 </script>
 
  <script>
var map;
var bounds = new google.maps.LatLngBounds();
function myMap() {
  var mapCanvas = document.getElementById("map");
  var mapOptions = {  
    center: new google.maps.LatLng(40.685646, -76.195499), 
    //zoom:5  
  };
  map = new google.maps.Map(mapCanvas, mapOptions);
}

myMap();

var coords = {
  'Albania':'41.1533,20.1683',
  'Argelia':'28.0339,1.6596',
  'Argentina':'38.4161,63.6167',
  'Armenia':'40.0691,45.0382',  
  'Australia':'25.2744,133.7751',
  'Austria':'47.5162,14.5501',
  'Belarus':'53.7098,27.9534',
  'Belgium':'50.5039,4.4699',
  'Brazil':'14.2350,51.9253',  
  'Bulgaria':'42.7339,25.4858',
  'Canada':'56.1304,106.3468',
  'Chile':'35.6751,71.5430',
  'China':'22.210928,113.552971',
  'Colombia':'4.5709,74.2973',
  'Croatia':'45.1000,15.2000',
  'Cuba':'21.5218,77.7812',
  'Cyprus':'35.1264,33.4299',
  'Czech Republic':'49.8175,15.4730',
  'D. R. Congo':'4.0383,21.7587',
  'Denmark':'56.2639,9.5018',
  'Ethiopia':'9.1450,40.4897',
  'Finland':'61.9241,25.7482',
  'France':'46.2276,2.2137',
  'Georgia':'32.1656,82.9001',
  'Germany':'51.1657,10.4515',
  'Ghana':'7.9465,1.0232',
  'Greece':'39.0742,21.8243',
  'India':'20.5937,78.9629',
  'Indonesia':'0.7893,113.9213',
  'Iran':'32.4279,53.6880',
  'Ireland':'53.4129,8.2439',
  'Israel':'31.0461,34.8516',
  'Italy':'41.8719,12.5674',
  'Japan':'36.2048,138.2529',
  'Kenya':'0.0236,37.9062',
  'Kuwait':'29.3117,47.4818',
  'Lithuania':'55.1694,23.8813',
  'Luxembourg':'49.8153,6.1296',
  'Macedonia':'41.6086,21.7453',
  'Mexico':'23.6345,102.5528',
  'Moldova':'47.4116,28.3699',
  'Netherlands':'52.1326,5.2913',
  'New Zealand':'40.9006,174.8860',
  'Nigeria':'9.0820,8.6753',
  'Norway':'60.4720,8.4689',
  'Pakistan':'30.3753,69.3451',
  'Palestine':'31.9522,35.2332',
  'Peru':'9.1900,75.0152',
  'Philippines':'12.8797,121.7740',
  'Poland':'51.9194,19.1451',
  'Portugal':'39.3999,8.2245',
  'Qatar':'25.3548,51.1839',
  'Romania':'45.9432,24.9668',
  'Russia':'61.5240,105.3188',
  'Saudi Arabia':'23.8859,45.0792',
  'Serbia':'44.0165,21.0059',
  'Singapore':'1.3521,103.8198',
  'South Africa':'30.5595,22.9375',
  'South Korea':'35.9078,127.7669',
  'Spain':'40.4637,3.7492',
  'Sudan':'12.8628,30.2176',
  'Sweden':'60.1282,18.6435',
  'Switzerland':'46.8182,8.2275',
  'Syria':'34.8021,38.9968',
  'Taiwan':'23.6978,120.9605',
  'Thailand':'15.8700,100.9925',
  'Turkey':'38.9637,35.2433',
  'U.S.A.':'37.0902,95.7129',
  'Ukraine':'48.3794,31.1656',
  'United Kingdom':'55.3781,3.4360',
  'Uruguay':'32.5228,55.7658',
  'Vietnam':'14.0583,108.2772',
  'Zambia':'13.1339,27.8493',

};
//now fit the map to the newly inclusive bounds
map.fitBounds(bounds);


//(optional) restore the zoom level after the map is done scaling
var listener = google.maps.event.addListener(map, "idle", function () {
    map.setZoom(5);
    google.maps.event.removeListener(listener);
});

function changeMap(city) {
  var c = coords[city].split(',');
 // alert(c);
  map.setCenter(new google.maps.LatLng(c[0], c[1]));
}
</script>
<!--<script src="http://static.jsbin.com/js/render/edit.js?4.0.4"></script>
<script>jsbinShowEdit && jsbinShowEdit({"static":"http://static.jsbin.com","root":"http://jsbin.com"});</script>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-1656750-34', 'auto');
ga('require', 'linkid', 'linkid.js');
ga('require', 'displayfeatures');
ga('send', 'pageview');

</script>-->
 <? $this->load->view('mainsite/common/login-registration-common-js');?>
</body>
</html>