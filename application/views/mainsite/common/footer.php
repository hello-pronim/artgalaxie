<?php 
    $com_key = new  common(); 
    $gckey = $com_key->get_google_captcha_key();
?>
<!-- Modal -->
<div class="modal fade cnt-form" id="myModalNewsletter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Subscribe to our Newsletter</h2>
              <div class="text-center">Subscribe to our newsletter and receive updates about our artists, galleries, events, special offers & more. </div>
            </div>
            <div id="msg-newsletter" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="contact_name_news" id="contact_name_news"  >
            <input type="text" class="form-control" placeholder="Email" name="contact_email_news" id="contact_email_news" >
           <!--  <div class="g-recaptcha pull-right"   id="g-recaptcha-response-new"></div> -->
            <div class="clearfix"></div><br>
            <div class="text-right">
              <a class="dark-gray-btn" href="javascript:void(0)"  onclick="javascript:subscribe_newsletter();"><span class="lt">
              </span>
                <span class="large-btn">Sign Up</span><span class="rt"></span></a></div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal  Thanks Newsletter -->
<div class="modal fade cnt-form" id="thanksnewslettermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Thank you</h2>
              <div class="text-center">You have successively subscribed to our newsletter.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal Carrer -->
<div class="modal fade cnt-form car-form" id="myModalCareer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form enctype="multipart/form-data" id="submit" class="car-form">
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Come work with us</h2>
              <div class="text-center">Art Galaxie is frequently on the look out for new freelancers or people to work full time. We give preference to people who are creative, energetic and with an artistic background.</div>
            </div>
            <div id="career_msg" class="text-center"></div>
            <input type="text" class="form-control car-form" placeholder="First Name" name="career_first_name" id="career_first_name">
            <input type="text" class="form-control car-form" placeholder="Last Name" name="career_last_name" id="career_last_name">
            <input type="text" class="form-control" placeholder="Email" name="career_email" id="career_email" >
            <select class="form-control" name="career_department" id="career_department">
              <option value="">Choose the department you would like to for</option>
              <option value="Web designer / Programmer">Web designer / Programmer</option> 
              <option value="Marketing">Marketing</option>
              <option value="Sales">Sales</option>
              <option value="Design">Design</option>
              <option value="Video">Video</option>
              <option value="Art Consulting">Art Consulting</option>
              <option value="Curator">Curator</option>
              <option value="Career Coach">Career Coach</option>
              <option value="Art Critic">Art Critic</option>
              <option value="Editing">Editing</option>
              <option value="Artist">Artist</option>
              <option value="Copywriter">Copywriter</option>
              <option value="Other">Other</option>
            </select>
            <input type="text" class="form-control" placeholder="Website link (optional)" name="career_website_link" id="career_website_link">
            <textarea class="form-control" placeholder="Leave your message here." name="career_message" id="career_message" style="height:170px"></textarea>
            </br>
            <lable>Upload your CV</lable>
            <input type="file" id="career_file" name="career_file">
            </br>
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>"></div>
            </div>
           <div class="clearfix"></div><br>
            <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="car_sub">Apply</button>
             </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal  Thanks Carrer -->
<div class="modal fade cnt-form car-form" id="thanksmodalcareer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Thank you</h2>
              <div class="text-center">Thank you for your intrest in Art Galaxie. We will keep your CV in file, Should a position open up, we will contact you at the earliest.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal Contact Us -->
<div class="modal fade cnt-form" id="myModalContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="contactform">
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Contact us</h2>
              <div class="text-center">If you have a question or just want to say hi, feel free to contact us using the form below, or alternatively you can use general@artgalaxie.com </div>
            </div>
            <div id="contact_msg" class="text-center"></div>
            <input type="text" class="form-control" placeholder="Name" name="contact_name" id="contact_name"  >
            <input type="text" class="form-control" placeholder="Email" name="contact_email" id="contact_email" >
            <select class="form-control" name="department" id="department">
              <option value="">Select Department</option>
              <option value="Art Services">Art Services</option> 
              <option value="Art Marketing">Art Marketing</option>
              <option value="Design">Design</option>
              <option value="Publications">Publications</option>
              <option value="Website Services">Website Services</option>
              <option value="Video Services">Video Services</option>
              <option value="Exhibitions">Exhibitions</option>
              <option value="Printing Services">Printing Services</option>
              <option value="Other">Other</option>
            </select>
            <input type="text" class="form-control" placeholder="Subject" name="contact_subject" id="contact_subject">
            <textarea class="form-control" placeholder="Type your message here." name="contact_message1" id="contact_message1"></textarea>
         <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>"></div>
            </div>
           <div class="clearfix"></div><br>
           
           <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="sub">Send</button>
             </div>
             
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal  Thanks Contact us -->
<div class="modal fade cnt-form" id="thanksmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Thank you for contacting us</h2>
              <div class="text-center">Your message has been successfully submitted.<br/> Our team will get back to you at the earliest possible.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- jQuery --> 

<?php 
//common code
    $com = new  common();
    $fb = $com->getSocialLinks(1);
    $twitter = $com->getSocialLinks(2);
    $pintrest = $com->getSocialLinks(3);
    $gp = $com->getSocialLinks(4);
    $insta = $com->getSocialLinks(5);
    $linkedIn = $com->getSocialLinks(6);
    $tumblr = $com->getSocialLinks(7);
    $vimeo = $com->getSocialLinks(8);
    $youtube = $com->getSocialLinks(9);
    $flickr = $com->getSocialLinks(10);
    $StumbleUpon = $com->getSocialLinks(11);
    $Rss = $com->getSocialLinks(12);
    $reddit = $com->getSocialLinks(13);
    //common code end
    /* Manage Visitors count*/
    $this->frontend->ip_vistor();
    /* Manage Visitors count*/
	
    $forNewsletter = new common(); 
    $newsletter = $forNewsletter->getNewsletterLink();
?>
<footer>
  <div class="xxsection footer-section ">
    <div class="container" data-aos="fade-up" data-aos-delay="1500" data-aos-once="true" data-aos-duration="2000">
      <div class="social-links text-center">
        <ul class="list-inline">
          <li><a href="<?=stripslashes($fb)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/f-icon.jpg" alt=""/> </a> </li>
          <li><a  href="<?=stripslashes($gp)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/g-icon.jpg" alt=""/></a></li>
          <li><a  href="<?=stripslashes($twitter)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/t-icon.jpg" alt=""/></a></li>
          <li><a  href="<?=stripslashes($pintrest)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/p-icon.jpg" alt=""/></a></li>
          <li><a  href="<?=stripslashes($insta)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/ins-icon.jpg" alt=""/></a></li>
          <li><a  href="<?=stripslashes($linkedIn)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/in-icon.jpg" alt=""/></a></li>
          <li><a  href="<?=stripslashes($flickr)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/flickr-icon.png" alt=""/></a></li>
          <li><a  href="<?=stripslashes($youtube)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/y-icon.jpg" alt=""/></a></li>
          <li><a  href="<?=stripslashes($vimeo)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/v-icon.jpg" alt=""/></a></li>
          <li><a  href="<?=stripslashes($StumbleUpon)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/stumble-icon.png" alt=""/></a></li>
          <li><a  href="<?=stripslashes($tumblr)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/tumblr-icon.png" alt=""/></a></li>
          <li><a  href="<?=stripslashes($reddit)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/reddit.png" alt=""/></a></li>
          <li><a  href="<?=stripslashes($Rss)?>" target="_blank"> <img src="<?=base_url()?>front_assets/images/rss-icon.jpg" alt=""/></a></li>
          <li><a  href=""  data-toggle="modal" data-target="#myModalContact"><img src="<?=base_url()?>front_assets/images/con-icon.jpg" alt=""/></a></li>
        </ul>
      </div>
      <div class="navbar-inverse footer-links">
      <div class="row">
      <div class="col-sm-10 col-sm-offset-1">
        <div class="row">
          <div class="col-sm-3">
            <ul>
              <li><a href="<?=site_url('galleries')?>">Galleries</a> </li>
              <li><a href="<?=site_url('publications')?>">Publications</a> </li>
              <li><a href="<?=site_url('home/video/0')?>">Video Portfolio</a> </li>
              <li><a href="<?=site_url('home/art_of_giving')?>">Art of Giving</a> </li>
               <!--<li><a href="<?=base_url()?>jam/login/signup" target="_blank">Affiliate Program</a> </li>-->
               <li><a href="<?=site_url('home/refersion')?>" target="_blank">Affiliate Program</a> </li>
               <li><a href="<?=site_url('testimonials')?>">Testimonials</a> </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <ul>
              <li><a href="<?=site_url('artists')?>">Artist</a> </li>
              <li><a href="<?=site_url('artists-by-country')?>">Artist by Country</a> </li>
              <li><a href="<?=site_url('feature_artists')?>">Featured Artists</a> </li>
              <li><a href="<?=site_url('artists-video/0')?>">Artist Videos</a> </li>
              <li><a href="<?=site_url('categories')?>">Categories</a> </li>
              <li><a href="<?=site_url('styles')?>">Art Styles</a> </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <ul>
             <li><a href="<?=site_url('art-services')?>">Art Services</a> </li>
              <li><a href="<?=site_url('website')?>">Websites</a> </li>
             <li><a href="<?=site_url('marketing-and-advertising')?>">Art Marketing</a> </li>
              <li><a href="<?=site_url('design-services')?>">Design</a> </li>
              <li><a href="<?=site_url('printing')?>">Print & Publishing</a> </li>
              <li><a href="<?=site_url('video-production')?>">Video Production</a> </li>
            </ul>
          </div>
          <div class="col-sm-3">
            <ul>
              <li><a href="#myModalCareer" data-toggle="modal">Careers</a> </li>
              <li><a href="#myModalContact" data-toggle="modal">Contact Us</a> </li>
              <li><a href="<?=site_url('terms-and-conditions')?>">Terms & Conditions</a> </li>
              <li><a href="<?=site_url('privacy-policy')?>">Privacy Policy</a> </li>
              <li><a href="<?=site_url('guestbook')?>">Guestbook</a> </li>
              <li><a href="<?=stripslashes($newsletter);?>" target="_blank">Newsletter</a> </li>
            </ul>
          </div>
        </div>
        </div>
        </div>
      </div>
      <div class="design-by">
      <h4><a href="<?=site_url('website')?>" style="color: #3ab5ea">Web Design by Art Galaxie</a></h4>
      © <?=date('Y')?> Art Galaxie All rights reserved
      </div>
    </div>
  </div>
</footer>

<!-- LiveChat -->
<script type="text/javascript">function add_chatinline(){var hccid=30671919;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
add_chatinline(); </script>


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
                $('#contact_msg').html('<span class="text-success">Mail sent successfully!!</span>');
                $('#myModalContact').modal('hide');
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
  
<!-- Career Popup -->
<script type="text/javascript">
$('#submit').submit(function(e)
{
    e.preventDefault(); 
    
    var first_name      = $('#career_first_name').val();
    var last_name       = $('#career_last_name').val();
    var career_email    = $('#career_email').val();
    var website_link    = $('#career_website_link').val();
    var career_message  = $('#career_message').val();
    var department      = $('#career_department').val();
    var career_file     = $('#career_file').val();
    
    if(first_name=='')
    {
         $('#career_msg').html('<span class="text-danger">Please enter first name.</span>');
         $('#career_first_name').focus();
         return false
    }
    if(last_name=='')
    {
         $('#career_msg').html('<span class="text-danger">Please enter last name.</span>');
         $('#career_last_name').focus();
         return false
    }
    if(career_email=='')
    {
         $('#career_msg').html('<span class="text-danger">Please enter email address.</span>');
         $('#career_email').focus();
         return false
    }
    if(department=='')
    {
         $('#career_msg').html('<span class="text-danger">Please select department.</span>');
         $('#career_department').focus();
         return false
    }
    
    if(career_message=='')
    {
         $('#career_msg').html('<span class="text-danger">Please enter message.</span>');
         $('#career_message').focus();
         return false
    }
    
     $.ajax({
          type: "POST",
          url: "<?=site_url('home/career_email')?>",
          data: new FormData(this),
          processData: false,
          contentType: false,
          success: function(data){
            if(data=='done')
            {
               $('#career_first_name').val('');
               $('#career_last_name').val('');
               $('#career_email').val('');
               $('#career_message').val('');
               $('#career_department').val('');
               $('#career_msg').html('<span class="text-success">Mail sent successfully!!</span>');
               $('#myModalCareer').modal('hide');
               $('#thanksmodalcareer').modal('toggle');
            }
            else
            {
                $('#career_msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
            }
       }
     });
});
</script>
