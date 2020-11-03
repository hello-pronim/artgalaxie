<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('mainsite/common/top-artist-profile');?>
<body >
  <? $this->load->view('mainsite/common/header');?>
  <div class="gallery-page-in about myartwork">
<div class="top-shadow">
    <div class="listartist-section dark-shadwoand-bot-border bord-none top-title">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-once="true">
        <div class="vedio-page-disc top-dis">
          <h2 class="section-header text-center color-fff section-header-large">Reset Password</h2>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="slider4-section" >
    <div class="container">
      <div class="row">        
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div data-aos-once="true" data-aos="fade-up" class="aos-init aos-animate">
   <div class="create-account-form-bg" data-aos-once="true" data-aos="fade-up">
   <h2 class="create-account-form-heding text-center">Forgot Password</h2>
   <div class="create-account-form box-blue">
   <form  role="form" action="<?=site_url('home/forgot_password')?>" name="login" method="post">
   <div class="row">
    <?php if(isset($msg) && $msg!=''){?><div align="center" style="color:#FF0000"><?php echo $msg;?></div><?php }?>
    <input type="hidden" name="mode" value="forgotpass">
   <div class="col-lg-12 col-md-12 col-sm-12">
   <div class="form-group">
    <label for="firstname">Email Id</label>
   
    <input type="email" class="form-control" name="email" placeholder="Enter your email address" id="Femail" required autofocus maxlength="30">
   </div>
   </div>
 
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
    <button type="submit" class="btn btn-primary create-account-submit-btn">Submit</button>
    </div>
   </div>
   
   </form>
   </div>
     </div>
   </div>
   </div>
      </div>
    </div>
  </div>

  <? $this->load->view('mainsite/common/footer');?>
  <!-- /.container --> 
  <!-- jQuery --> 
  <? //$this->load->view('mainsite/common/footer_script_artist_profile'); ?>
  <script src="<?=base_url()?>front_assets/js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 

<!-- Script to Activate the Carousel --> 

<!-- FlexSlider --> 

<!-- <script src="<?=base_url()?>front_assets/js/froogaloop.js"></script> -->
  <script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script>
    <script src="<?=base_url()?>front_assets/js/aos.js"></script> 
  
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script>
 
<?php $this->load->view('mainsite/common/login-registration-common-js'); ?>
 <script type="text/javascript">
  $("#Femail").focus()
</script>
  </body>
</html>