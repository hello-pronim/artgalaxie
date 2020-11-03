<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Publication</title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/custom.css" rel="stylesheet"> <!-- CSS from psd  31012017-->
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet"><!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />
<style>
.box {
    display: inline-block;
    background: #c2914c;
}
/* 
  ##Device = Desktops
  ##Screen = 1281px to higher resolution desktops
*/

@media (min-width: 1281px) {
  .fliparea {
      width: 500px;
      margin: 0px;
      padding: 15px;
      background: #ababab;
      color: #000000;
      min-width: 800px;
    }
    .fliparea #photobook{
            height: 622px;
    }
  
}
@media (min-width: 1025px) and (max-width: 1280px) {
  
      .fliparea {
      width: 500px;
      margin: 0px;
      padding: 15px;
      background: #ababab;
      color: #000000;
      min-width: 800px;
    }
    .fliparea #photobook{
            height: 622px;
    }
}
/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {
  
   .fliparea {
      width: 450px;
      margin: 0px;
      padding: 15px;
      background: #ababab;
      color: #000000;
    }
    .fliparea #photobook{
            height: 522px;
    }
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
  
  
   .fliparea {
      width: 350px;
      margin: 0px;
      padding: 15px;
      background: #ababab;
      color: #000000;
    }
    .fliparea #photobook{
            height: 522px;
    }
  
}
/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {
  
 .fliparea {
      width: 300px;
      margin: 0px;
      padding: 15px;
      background: #ababab;
      color: #000000;
    }
    .fliparea #photobook{
            height: 522px;
    }
  
}

.book_btn{
 display:none;   
}
.book_btn .btn_image{
      cursor: default;
}

</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<header>
  <div class="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-3">
          <div class="logo">
            <?php $forLogo = new common(); 
              $logo = $forLogo->getLogo();
            ?>
            <a href="<?=site_url('home')?>">
            <img src="<?=base_url()?>uploads/sitelogo/<?=$logo?>" alt="<?=SITENAME?>"/> </a> </div>
        </div>
        <div class="col-lg-7 col-md-7 col-sm-9 top-right">
          <div class="pull-right">
            <?php    if($this->session->userdata('CUST_ID')==''){ ?>
            <div class="log-box inline">
              <ul class="drop-box">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#myModalRegister"><span><b>Register</b>
                </span><span class="down-arow"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a></li>
              </ul>
            </div>
            <div class="log-box inline">
              <ul class="drop-box">
                <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><b>Log in</b></span> <span class="down-arow"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                  <ul id="login-dp" class="dropdown-menu">
                    <li>
                      <div class="row">
                        <div class="col-md-12">
                          <div id="div_errorL" class="text-danger" style="display:none;"></div>
                          <div id="div_successL" class="text-success" style="display:none;"></div>
                          <form class="form" role="form" method="post"  accept-charset="UTF-8" id="login-nav" name="Formlogin"   onsubmit="javascript:return false" action="#">
                            <div class="form-group">
                              <label class="sr-only" for="Lemail">Email address</label>
                              <input type="email" class="form-control" id="Lemail" placeholder="Email address" 
                              value="<? if(isset($_COOKIE['email'])){ echo $_COOKIE['email']; } ?>" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                              <label class="sr-only" for="Lpassword">Password</label>
                              <input type="password" class="form-control" id="Lpassword" placeholder="Password"  value="<? if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; }  ?>" required>
                              <div class="help-block text-right">
                                <a href="<?=site_url('home/forgot_password')?>">Forget the password ?</a></div>
                            </div>
                            <div class="form-group">
                              <button type="button" class="btn btn-primary btn-block" onClick="JavaScript: return checkLogin()">Sign in</button>
                            </div>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox"  value="1" id="remember" name="remember" <? if(isset($_COOKIE['remember'])){ ?> checked="checked" <? } ?>>
                                Remember Me </label>
                            </div>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
             <?php }else{ ?>
              <div class="log-box inline">
              <ul class="drop-box">
                <li class="dropdown"><a href="<?=site_url('home/logoff')?>" class="dropdown-toggle" ><span><b>Logout</b>
                </span><span class="down-arow"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a></li>
              </ul>
            </div>
            <div class="log-box inline">
              <ul class="drop-box">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><b><!--My --> Profile</b>
                </span><span class="down-arow"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                <ul class="dropdown-menu my-profile-dropdown-menu">
                  <li><a href="<?=site_url('profile')?>">My Profile</a></li>
                  <li><a href="<?=site_url('changepassword')?>">Change password</a></li>
                  <?php if($this->session->userdata('CUSTOMER_TYPE')=='artist'){ ?>
                <li><a href="<?=site_url('biography')?>">Other Sections</a></li>   <!--   -->
                 <!--     <li><a href="#">Gallery</a></li> -->
                  <li><a href="<?=site_url('my_videos/0')?>">Video</a></li>
                  <?php } ?>
                </ul>
                </li>
              </ul>
            </div>
           <?php } ?>
           <div class="btn-groupx lang-bar inline">
              <div class="top-menus"><a href="<?=site_url('shop')?>" class="color1"> Art  Shop </a><a href="<?=site_url('tutorials')?>" class="color2"> Tutorials </a> <a href="<?=site_url('blog')?>" class="color3"> Creative Blog</a><a href="<?=site_url('magazine')?>" class="color4"> Magazine </a> </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-sm-7 pull-right">
                <div class="btn-groupx lang-bar text-right">
               <script type="text/javascript">
                    function googleTranslateElementInit() {
                      new google.translate.TranslateElement({
                        pageLanguage: 'en',
                        autoDisplay: false,
                        multilanguagePage: true,
                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                      }, 'google_translate_element');
                    }
                    </script>
                    <div id="google_translate_element" class="select-language"><!--<span class="aror-btn"><i class="fa fa-angle-up" aria-hidden="true"></i> <i aria-hidden="true" class="fa fa-angle-down"></i></span>--></div>
                    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-7 pull-right">
                <div id="imaginary_container"  class="search-right-top">
                  <div class="input-group stylish-input-group">
                   <form name="main-search-form" id="main-search-form" method="post" action="<?=site_url('search')?>"> 
                    <input type="text" class="form-control"  placeholder="Search"  name="search_text" id="search_text"  autocomplete="off">
                    <span class="input-group-addon">
                    <button type="submit"   > <span class="glyphicon glyphicon-search"></span> </button></span> 
                   </form> 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Navigation -->
  <nav class="navbar navbar-inverse" role="navigation">
    <div class="container"> 
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse main-menu" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="menu-style1 <?php if($act_id=='home'){ ?> active <?php } ?> "> <a href="<?=site_url('home')?>"> <div><span></span></div> Home </a></li>
          <li class="menu-style2 <?php if($act_id=='artist'){ ?> active <?php } ?>"> <a href="<?=site_url('artists')?>"> <div><span></span></div> Artists</a></li>
          <li class="menu-style3  <?php if($act_id=='regionwiseGallery'){ ?> active <?php } ?>" > <a href="<?=site_url('galleries')?>"><div>
            <span></span></div> Galleries </a></li>
          <li class="menu-style4 <?php if($act_id=='gallery'){ ?> active <?php } ?>"> <a href="<?=site_url('categories')?>"> <div><span></span></div> Categories </a></li>
          <li class="menu-style5 <?php if($act_id=='style'){ ?> active <?php } ?>"> <a href="<?=site_url('styles')?>"> <div><span></span></div> Styles </a></li> 
          <li class="menu-style6 <?php if($act_id=='publication'){ ?> active <?php } ?>"> <a href="<?=site_url('publications')?>"> <div><span></span></div> Publications</a></li>
          <li class="menu-style7"> <a href="<?=site_url('home/video/0')?>"> <div><span></span></div> Video</a></li>
          <li class="menu-style8"> <a href="<?=site_url('about-us')?>"> <div><span></span></div> About us</a></li>
          <li class="menu-style9"> <a href="<?=site_url('services')?>"> <div><span></span></div> Services</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container --> 
  </nav>
</header>

<?php $com = new common();
$sdata = '';
?>


<?php    if($this->session->userdata('CUST_ID')==''){ ?>
<!-- Registration Model -->
 <div class="modal fade contact-madal register-madal" id="myModalRegister" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
      
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Register</h3>
        </div>
        <form  name="Formreg" id="Formreg" onsubmit="javascript:return false" action="#" >
        <div class="modal-body">
          <div class="row">
            <div id="div_error" style="display:none;" class="text-danger text-center"> </div>
            <div id="RegDivFrm"  style="display:none;" class="text-success text-center"> </div>
            <div id="reg-col-1">
              <div class="col-lg-6 col-md-6 col-sm-6" id="reg-col-1">
                <div class="modal-field">
                 <label class="field-title" for="first_name">First Name</label>
                 <input type="text" class="form-control" id="first_name"  name="first_name" placeholder="First Name" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6" >
              <div class="modal-field">
                 <label class="field-title" for="last_name">Last Name</label>
                  <input type="text" class="form-control" id="last_name"  name="last_name" placeholder="Last Name" required>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="modal-field">
                 <label class="field-title" for="first_name">Email Address </label>
                 <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email address" required>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6" >
                <div class="modal-field">
                <label class="field-title" for="password">Password</label>
                 <input type="password" class="form-control" id="password"  name="password" placeholder="Password" required>
               </div>  
               </div>
              <div class="col-lg-6 col-md-6 col-sm-6" >
                <div class="modal-field">
                <label class="field-title" for="cpassword">Confirm Password</label>
                 <input type="password" class="form-control" id="cpassword"  name="cpassword" placeholder="Confirm Password" required>
               </div>
             </div>
              <div class="col-lg-6 col-md-6 col-sm-6" >
               <div class="modal-field">
                <label class="field-title" for="address">Addres 1</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
              </div>   
             </div>
              <div class="col-lg-6 col-md-6 col-sm-6" >
              <div class="modal-field">
                <label class="field-title" for="address2">Addres 2</label>
                <input type="text" class="form-control" id="address2" name="address2" placeholder="Address 2" required>
                </div>
              </div>
             <div class="col-lg-6 col-md-6 col-sm-6" >
              <div class="modal-field">
                <label class="field-title" for="country">Country</label>
                <select name="country" id="country" class="form-control" >
                  <option value="">Select Country</option>
                <?php $lib = new common(); 
                  $countryDs = $lib->get_country(); 
                  foreach ($countryDs as $countryRs) { ?>
                    <option value="<?=stripslashes($countryRs['country_name'])?>"><?=stripslashes($countryRs['country_name'])?></option>
                <?php  }  ?>
                </select>
              </div>  
              </div>
               <div class="col-lg-6 col-md-6 col-sm-6" >
              <div class="modal-field">
                <label class="field-title" for="state">state</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
              </div> 
              </div>
                <div class="col-lg-6 col-md-6 col-sm-6" >
              <div class="modal-field">
                <label class="field-title" for="state">Phone</label>
                <input type="text" class="numberonly form-control" id="phone" name="phone" placeholder="Phone" required maxlength="12">
              </div>    
              </div>   
           
               <div class="col-lg-6 col-md-6 col-sm-6" >
                <div class="modal-field">
                  <label class="field-title" for="country">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                </div>
                 </div>   
                 <div class="col-lg-6 col-md-6 col-sm-6"  >
                <div class="modal-field">
                  <label class="field-title" for="state">Zip</label>
                  <input type="text" class="form-control numberonly"    id="zip" name="zip" placeholder="Zip" required maxlength="4"></div>
                   </div>   
                 <div class="col-lg-6 col-md-6 col-sm-6"  >
                <div class="modal-field">
                  <label class="field-title" for="state">Are You Artist?</label>
                  <br/>
                   <input type="radio" name="user_type" id="user_type1" value="artist">&nbsp;Yes &nbsp;&nbsp;
                   <input type="radio" name="user_type" id="user_type0" value="user">&nbsp;No
                </div>
                </div>  
                </div>
               </div>
            </div>
         
        <div class="modal-footer text-center" >
          <button type="button" class="btn btn-success"  id="regsubmitbtn" onClick="JavaScript: return checkRegistration()">Register</button> 
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
 
<?php } ?>


<div class="gallery-page-in ">
    <div class="book-section">
    <div class="book-img">
    <img src="<?=base_url()?>uploads/publication_book_image/<?=$publicationData['banner_image']?>" class="img-responsive" alt="<?=$publicationData['large_image']?>" class="img-responsive" alt="<?=$publicationData['banner_image']?>" data-aos="fade-up" data-aos-once="true" />
    </div>
    <div class="section bg-white book-content">
    <div class="container" data-aos="fade-up" data-aos-once="true">
    <div class="row">
    <div class="col-lg-3 col-md-4  col-sm-5">
    <div class="col-sm-11 no-pad">
    <div class="cover-page">
    <img src="<?=base_url()?>uploads/publication_book_image/<?=$publicationData['book_image']?>" alt=""/> </div>
    <?php //echo "<pre>"; print_r($publicationData); ?>
    <div class="detail-btn2"><a class="view-detail-btn" href="#flip">Take a look inside</a></div>
    <div class="detail-btn2"><a class="view-store-btn" href="/shop.html#books">View in Store</a></div><br><br>
    <div class="cover-page show-none">
      <img src="<?=base_url()?>uploads/publication_book_image/<?=$publicationData['book_image2']?>" alt="<?=$publicationData['book_image2']?>"/> </div>
    </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-7">
    <div class="book-text">
    <h2 class="book-title"><?=stripslashes($publicationData['title'])?></h2>
    <div class="book-disc">
    <p><?=stripslashes($publicationData['description2'])?></p>
    </div>
    <div class="row">
    <div class="col-lg-6 col-md-4 ">
    <div class="book-pages" style="margin-top:12px;">
    <?php if($publicationData['hardcover']!=''){ ?> Hardcover, <?=stripslashes($publicationData['hardcover'])?> <? }  if($publicationData['softcover']!=''){ ?> Softcover, <?=stripslashes($publicationData['softcover'])?> <? } ?><br>
                  Number of pages: <?=stripslashes($publicationData['number_of_pages'])?><br>
                  ISBN  <?=stripslashes($publicationData['isbn'])?>
    </div>
    </div>
    <div class="col-lg-6 col-md-8">
        <div class="social-box" style="margin-top:15px;">
             <?php
            $title  =   urlencode($publicationData['title']);
            $url    =   urlencode(site_url('publication_details/'.$publicationData['id'].'/'.$com->create_slug($publicationData['title'])));
            $summary=   urlencode($publicationData['description']);
            $image  =   urlencode(base_url().'uploads/publication_book_image/'.stripslashes($publicationData['book_image']));
            ?>
            
          <div class="profile-social-link text-right">
             <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
            <a onClick="window.open('http://twitter.com/share?text=<?php echo $summary;?>&url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>
            <a onClick="window.open('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $image;?>&url=<?php echo $url;?>&is_video=false&description=<?php echo $summary;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a>
            <a onClick="window.open('https://plus.google.com/share?url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a>
            
            <div class="book-cart pcart" style=" float: right; margin-left: 7px;">
            <div id='product-component-<?=stripslashes($publicationData['add_to_cart2'])?>'></div>
            <?php //$sdata .= $com->shopify_product_datas($publicationData['add_to_cart'],$publicationData['add_to_cart2']); 
                $sdata .= $com->shopify_inner_data($publicationData['add_to_cart'],"1");
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
    <div class="space30"></div>
    <div class="container" data-aos="fade-up" data-aos-once="true">
    <div class="row">
    <div class="col-lg-3 col-md-4  col-sm-5">
    <div class="space30"></div>
    <div class="col-sm-11 no-pad">
   <!-- <div class="cover-page show-none">
      <img src="<?=base_url()?>uploads/publication_book_image/<?=$publicationData['book_image2']?>" alt="<?=$publicationData['book_image2']?>"/> </div>-->
    </div>
    </div>
    <div class="col-lg-9 col-md-8 col-sm-7 ">
    <div class="bor-top-blue">
   <div class="space30"></div>
    <div class="book-text" style="margin-top:-25px;">
    <div class="book-disc">
    <div class="feature-art-list">
        <div class="row">
          <h2 style="font-size:26px;margin-left:15px;">Artists&nbsp;featured&nbsp;in&nbsp;this&nbsp;edition</h2>
            
               <?php
            
                $li = 0;  $allartistcount = 0; $artistcount = 0; $allArtist=array();
                $colourCount = 1; $t = 0; $allartistcol = 0;	
			
            foreach($getCategories as $getCategoriesRs)
            { 
				$coms = new common();
				$isArtistPresent[$t] =  $coms->getFeatureArtistForPublication($getCategoriesRs['cat_id'],$publicationData['artist_name']);
				if(!empty($isArtistPresent))
                {
					$artistcount = count($isArtistPresent[$t]);
					$allArtist = array_merge($allArtist, $isArtistPresent[$t]);
				}
				$allartistcount = $allartistcount + $artistcount;
				$t++;
			}
			$allartistcol = round($allartistcount/4);
			if(($allartistcol*4) < $allartistcount){
				$allartistcol = $allartistcol + 1;
			}
			?>
			<div class="col-md-3 col-sm-6" style="margin-top:7px;">
            <ul>
			<?php
			foreach ($allArtist as $allArtistRs) 
            {
				if($li!=0 && ($li%$allartistcol)==0)
                { 
                ?>
					<div class="col-md-3 col-sm-6" style="margin-top:7px;">
					<ul>
                <?php 
                }
				?>
				<li><a href="<?=site_url('artists/details/'.$allArtistRs['id'].'/'.$this->common->create_slug(stripslashes($allArtistRs['first_name'].' '.$allArtistRs['last_name'])))?>"><?=stripslashes($allArtistRs['first_name'].' '.$allArtistRs['last_name'])?></a></li>
				<?php
				$li++;
				if(($li%$allartistcol)==0)
                { 
                ?>
					</ul>
					</div>
                <?php 
                }				
			}
			?>
			</ul>
			</div>
			<?php
            /*foreach($getCategories as $getCategoriesRs)
            { 
					$com = new common();
					$isArtistPresent =  $com->getFeatureArtistForPublication($getCategoriesRs['cat_id'],$publicationData['artist_name']);
                //echo "total".count($isArtistPresent);
                if(!empty($isArtistPresent))
                {     
                   
                    if($li==0 || ($li+1%$allartistcol)==0)
                    { 
                    ?>
                        <div class="col-md-3 col-sm-6" style="margin-top:7px;">
                        <ul>
                    <?php 
                    } $li++;  
                    ?>  
             <li style="background:  #dddd; padding: 0px 12px;display:none;">
                    <strong style="margin-top: 0px;margin-bottom: 4px;" class="<? if($colourCount>4){ $colourCount = 1; } if($colourCount==1){  echo "txt-color1"; }else if($colourCount==2){  echo "txt-color2 top-space-li";}else if($colourCount==3){  echo "txt-color3 top-space-li";}else if($colourCount==4){  echo "txt-color4 top-space-li";} $colourCount++;  ?>">
                    <?=ucfirst(stripslashes($getCategoriesRs['cat_name']))?>
                    </strong>
                </li>
                <?   
                foreach ($isArtistPresent as $isArtistPresentRs) 
                {
                ?>
                    <li><a href="<?=site_url('artists/details/'.$isArtistPresentRs['id'].'/'.$this->common->create_slug(stripslashes($isArtistPresentRs['first_name'].' '.$isArtistPresentRs['last_name'])))?>"><?=stripslashes($isArtistPresentRs['first_name'].' '.$isArtistPresentRs['last_name'])?></a></li>
                    <? 
                    $li++; 
                    if(($li==0 || $li%$allartistcol) ==0)
                    { 
                    ?> 
                        </ul>
                        </div>
                        <div class="col-md-3 box col-sm-6" style="margin-top:7px;">
                        <ul>
                            <?php } ?>
                            <?php } } ?>
                            <?   
                            if($li==0 || ($li%$allartistcol) ==0)
                            { 
                            ?> 
                        </ul>
                    </div>
            <?php   
                } 
            }*/  
            ?>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>


  </div>
      <div class="row">
      <div class="col-lg-12 text-center"><a class="view-store-btn" href="<?=site_url('publications')?>"><span class="lt"></span><span>Return to Publications</span><span class="rt"></span></a></div>
    </div>
    </div>
    </div>
    </div>
    
  
<div class="xxblack-bg text-center" id="flip">
<h2 class="color-fff mar-top-bot-20 pad-top-bot-25" data-aos="fade-up" data-aos-once="true" >Take a look inside</h2>
</div> 

<script type="text/javascript">
    <?php 
       echo $com->shopify_product_wrapper(stripslashes($sdata));
    ?>
</script>

<script type="text/javascript" src="<?=base_url()?>front_assets/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/jquery.onebook3d-2.33-full-max.js"></script>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/three.min.js"></script>


<script>
$(function(){
var src5 = [
     <?php foreach($bookImages as $flip){  ?>
	 '<?php echo base_url()."page/".$flip['image_name'] ?>',
	 <?php } ?>
	];		
$('#photobook').onebook(src5,{save:0, skin:['light','dark'], bgDark:'#222222 url(./g06/bg.jpg)', startPage:1, flip:'soft', border:1, cesh:false});

$('.links a:eq(0)').click(function(){
	 $.onebook(src5,{save:0, startPage:1, pageColor:'#888888', skin:'light', cesh:false});
	 return false;
});

$('.links a:eq(1)').click(function(){
	 $.onebook(src5,{save:0, slope:1, bgDark:'#222222 url("./g05/bg2.jpg");background-size:cover;', cesh:false});
	 return false;
});


jQuery("#OneBook3d_stylestage").appendTo(".fliparea");
window.setTimeout(function(){jQuery("#OneBook3d_styleicons_panel").appendTo(".fliparea");//alert(jQuery("#OneBook3d_styleicons_panel").html());
},10000); 
jQuery(window).resize(function(){
    jQuery("#OneBook3d_styleicons_panel").inserAfter("#photobook");
    alert(jQuery("#OneBook3d_styleicons_panel").html());
});

});

</script>
    <div style="background:#ababab;position:relative;">
        <div class="fliparea">
         <div id="photobook" style="height:700px !important;"></div>
        </div>
    </div>
</div>
<? $this->load->view('mainsite/common/footer');?>

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
 
<script type="text/javascript">
$("#tweeter-share-<?=$publicationData['id']?>").on("click",function(){var n="<?=base_url?>publication_details/<?=$publicationData['id']?>/masters-of-contemporary-fine-art-volume-ii.html",t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
$("#fb-share-<?=$publicationData['id']?>").on("click",function(){var n="<?=base_url?>publication_details/<?=$publicationData['id']?>/masters-of-contemporary-fine-art-volume-ii.html",t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+n+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
$("#gplus-share-<?=$publicationData['id']?>").on("click",function(){var n="<?=base_url?>publication_details/<?=$publicationData['id']?>/masters-of-contemporary-fine-art-volume-ii.html";return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
$("#pinterest-share-<?=$publicationData['id']?>").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});
</script>
   
<?php $this->load->view('mainsite/common/login-registration-common-js'); ?>   
<!-- Share on socila media -->
<script type="text/javascript">
$("#tweeter-share").on("click",function(){var n=url,t=document.title;return window.open("https://twitter.com/share?url="+encodeURIComponent(n)+"&hashtags=<?=SITENAME?>&text="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=575,height=450"),!1});
$("#fb-share").on("click",function(){var n=url,t=document.title;return window.open("https://www.facebook.com/sharer.php?u="+encodeURIComponent(n)+"&t="+encodeURIComponent(t),"shareWindow","menubar=0,toolbar=0,status=0,width=626,height=436"),!1});
$("#gplus-share").on("click",function(){var n=url;return window.open("https://plus.google.com/share?url="+encodeURIComponent(n),"shareWindow","menubar=0,toolbar=0,status=0,width=500,height=410"),!1});
$("#pinterest-share").on("click",function(){var n=document.createElement("script");return n.setAttribute("type","text/javascript"),n.setAttribute("charset","utf-8"),n.setAttribute("src","https://assets.pinterest.com/js/pinmarklet.js?r="+Math.random()*999999999),document.body.appendChild(n),!1});
</script>

<script>
(function($){
	function fixButtonHeights() {
		var heights = new Array();
        
		// Loop to get all element heights
		$('.box').each(function() {	
			// Need to let sizes be whatever they want so no overflow on resize
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');

			// Then add size (no units) to array
	 		heights.push($(this).height());
		});

		// Find max height of all elements
		var max = Math.max.apply( Math, heights );

		// Set all heights to max height
		$('.box').each(function() {
			$(this).css('height', max + 'px');
            // Note: IF box-sizing is border-box, would need to manually add border and padding to height (or tallest element will overflow by amount of vertical border + vertical padding)
		});	
	}

	$(window).load(function() {
		// Fix heights on page load
		fixButtonHeights();
		setTimeout(function() {
	        $('#OneBook3d_styleicons_panel').show();
	    }, 10000);
        
		// Fix heights on window resize
		$(window).resize(function() {
			// Needs to be a timeout function so it doesn't fire every ms of resize
			setTimeout(function() {
	      		fixButtonHeights();
	      	}, 120);
		});
	});
})(jQuery);
</script>
</body>
</html>
