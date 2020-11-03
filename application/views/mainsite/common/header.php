<script src='https://www.google.com/recaptcha/api.js'></script>
<header>
    
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');

 fbq('init', '308713579891186'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=308713579891186&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
  <div class="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-2">
          <div class="logo">
            <?php 
                $forLogo = new common(); 
                $logo = $forLogo->getLogo();
            ?>
            <a href="<?=site_url('home')?>">
            <img src="<?=base_url()?>uploads/sitelogo/<?=$logo?>" alt="<?=SITENAME?>"/> </a> </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-10">
          <div class="pull-right">
              <div class="inline" style="margin-left: 0px">
                <div class="">
                <?php    
                if($this->session->userdata('CUST_ID')=='')
                { 
                ?>
                <div class="log-box inline">
                  <ul class="drop-box">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#myModalRegister"><span><b>Register</b>
                    </span><span class="down-arow"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a></li>
                  </ul>
                </div>
                <div class="log-box inline">
                  <ul class="drop-box">
                    <li class="dropdown"> 
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><b>Log in</b></span> <span class="down-arow"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
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
                 <?php 
                 }
                 else
                 { 
                 ?>
                 <?php //print_r($this->session->userdata('CUST_ID')); exit; ?>
                <div class="log-box logedin inline">
                  <ul class="drop-box">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span><b>Hi, <?php echo $this->common->getUserName($this->session->userdata('CUST_ID')); ?></b>
                    </span><span class="down-arow"><i class="fa fa-angle-down" aria-hidden="true"></i></span></a>
                    <ul class="dropdown-menu my-profile-dropdown-menu">
                          <?php 
                          if($this->session->userdata('CUSTOMER_TYPE')=='artist')
                          { 
                          ?>
                                <li><a href="<?=site_url('profile')?>">My Profile</a></li>
                                <li><a href="<?=site_url('my_artwork')?>">My Artwork</a></li>
                                <li><a href="<?=site_url('my_favourites')?>">My Favourites</a></li>
                                <li><a href="<?=site_url('my_collections')?>">My Collections</a></li>
                                <li><a href="<?=site_url('save_for_later')?>">Saved for Later</a></li>
            				    <li class="dropdown"><a href="<?=site_url('home/logoff')?>">Logout</a></li>
                          <?php 
                          }
                          else
                          {
                          ?>
                              <li><a href="<?=site_url('profile')?>">My Profile</a></li>
                              <li><a href="<?=site_url('my_favourites')?>">My Favourites</a></li>
                              <li><a href="<?=site_url('my_collections')?>">My Collections</a></li>
                              <li><a href="<?=site_url('save_for_later')?>">Saved for Later</a></li>
                              <li><a href="<?=site_url('home/logoff')?>">Logout</a></li>
                          <?php
                          }
                          ?>
                    </ul>
                    </li>
                  </ul>
                </div>
               <?php 
               } 
               ?>
               </div>
               
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-sm-12 pull-right">
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
                  <div class="col-sm-12 pull-right">
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
            <div class="inline" style="margin-top: 27px">
                <div class="btn-groupx lang-bar inline">
                  <div class="top-menus"><a href="<?=site_url('blog')?>" class="color3"> <div><span class="icon-creative-blog"></span></div>Creative Blog</a> <a href="<?=site_url('tutorials')?>" class="color2"> Tutorials </a> <a href="<?=site_url('shop')?>" class="color1"> <div><span class="icon-art-shop"></span></div>Art Shop </a> <a href="<?=site_url('magazine')?>" class="color4"> Magazine </a> </div>
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
          
          <li class="menu-style4 <?php if($act_id=='gallery'){ ?> active <?php } ?>"> <a href="<?=site_url('categories')?>"> <div><span></span></div> Categories </a></li>
          <li class="menu-style5 <?php if($act_id=='style'){ ?> active <?php } ?>"> <a href="<?=site_url('styles')?>"> <div><span></span></div> Styles </a></li> 
          <li class="menu-style6 <?php if($act_id=='publication'){ ?> active <?php } ?>"> <a href="<?=site_url('publications')?>"> <div><span></span></div> Publications</a></li>
          <li class="menu-style7"> <a href="<?=site_url('home/video/0')?>"> <div><span></span></div> Video</a></li>
          <li class="menu-style8"> <a href="<?=site_url('about-us')?>"> <div><span></span></div> About us</a></li>
          <li class="menu-style9"> <a href="<?=site_url('services')?>"> <div><span></span></div> Services</a></li>
          <li class="menu-style3  <?php if($act_id=='regionwiseGallery'){ ?> active <?php } ?>" > <a href="<?=site_url('art-services')?>"><div>
            <span></span></div> Art Services </a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse --> 
    </div>
    <!-- /.container --> 
  </nav>
</header>
<?php    
if($this->session->userdata('CUST_ID')==''){ 
?>
<!-- Registration Model -->
 <div class="modal fade contact-madal register-madal" id="myModalRegister" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 id="RegDivFrmreg"  style="display:block;" class="modal-title text-center">Register</h3>
          <h3 id="RegDivFrmhead" style="display:none;" class="modal-title text-center">Thank you</h3>
        </div>
        <form name="Formreg" id="Formreg" onsubmit="javascript:return false" action="#" >
        <div class="modal-body">
          <div class="row">
            <div id="div_error" style="display:none;" class="text-danger text-center"> </div>
            <div id="RegDivFrm"  style="display:none;" class="text-center"> </div>
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
                  <input type="text" class="form-control" id="last_name"  name="last_name" placeholder="Last Name">
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="modal-field">
                 <label class="field-title" for="first_name">Email Address </label>
                 <input type="email" class="form-control" id="email_address" name="email_address" placeholder="Email address" required>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="modal-field">
                <label class="field-title" for="password">Password</label>
                 <input type="password" class="form-control" id="password"  name="password" placeholder="Password" required>
               </div>  
               </div>
              <div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="modal-field">
                <label class="field-title" for="cpassword">Confirm Password</label>
                 <input type="password" class="form-control" id="cpassword"  name="cpassword" placeholder="Confirm Password" required>
               </div>
             </div>
              <div class="col-lg-12 col-md-12 col-sm-12" >
               <div class="modal-field">
                <label class="field-title" for="address">Addres 1</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Address">
              </div>   
             </div>
              <div class="col-lg-12 col-md-12 col-sm-12" >
              <div class="modal-field">
                <label class="field-title" for="address2">Addres 2</label>
                <input type="text" class="form-control" id="address2" name="address2" placeholder="Address 2">
                </div>
              </div>
             <div class="col-lg-12 col-md-12 col-sm-12" >
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
               <div class="col-lg-12 col-md-12 col-sm-12" >
              <div class="modal-field">
                <label class="field-title" for="state">state</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="State">
              </div> 
              </div>
                <div class="col-lg-12 col-md-12 col-sm-12" >
              <div class="modal-field">
                <label class="field-title" for="state">Phone</label>
                <input type="text" class="numberonly form-control" id="phone" name="phone" placeholder="Phone" maxlength="12">
              </div>    
              </div>   
           
               <div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="modal-field">
                  <label class="field-title" for="country">City</label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="City">
                </div>
                 </div>   
                 <div class="col-lg-12 col-md-12 col-sm-12"  >
                <div class="modal-field">
                  <label class="field-title" for="state">Zip</label>
                  <input type="text" class="form-control numberonly" id="zip" name="zip" placeholder="Zip" maxlength="4"></div>
                   </div>
                 
                 <!--<div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="modal-field">
                      <label class="field-title" for="state">Are You Artist?</label>
                      <br/>
                       <input type="radio" name="user_type" id="user_type1" value="artist">&nbsp;Yes &nbsp;&nbsp;
                       <input type="radio" name="user_type" id="user_type0" value="user" checked>&nbsp;No
                    </div>
                </div>-->
                
                </div>
               </div>
            </div>
        <div class="modal-footer text-center" >
          <button type="button" class="btn btn-success" id="regsubmitbtn" onClick="JavaScript: return checkRegistration()">Register</button> 
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  <script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
  <script type="text/javascript">
  $( document ).ready(function() {
    $('.numberonly').keydown(function(e)
      {  
        var key = e.charCode || e.keyCode || 0;
        //key == 110 || for '.'
        // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
        // home, end, period, and numpad decimal
        return (
          key == 8 || 
          key == 9 ||
          key == 13 ||
          key == 46 ||
          key == 190 ||
          (key >= 35 && key <= 40) ||
          (key >= 48 && key <= 57) ||
          (key >= 96 && key <= 105));
      });
});
</script>
<!-- Registration Model -->
<?php } ?>


