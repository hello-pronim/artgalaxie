<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('mainsite/common/top-artist-profile');?>
<body >
  <? $this->load->view('mainsite/common/header');?>
  <div class="slider4-section" >
    <div class="container">
      <div class="row">        
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div data-aos-once="true" data-aos="fade-up" class="aos-init aos-animate">
   <div class="create-account-form-bg" data-aos-once="true" data-aos="fade-up">
   <h2 class="create-account-form-heding text-center">Reset Password</h2>
   <div class="create-account-form">
   <form  role="form" action="<?=site_url('home/reset/'.$act_str)?>" name="login" method="post" onSubmit="javascript: return validate_registration();">
   <div class="row">
    <? if($msg!=''){?><div class="alert alert-success text-center"><?=$msg?></div><? }?>
    <? if($wronglink!=''){?><div class="alert alert-danger text-center"><?=$wronglink?></div><? }?>
    <? if($errmsg!=''){?><div class="alert alert-danger text-center"><?=$errmsg?></div><? }?>
     <div id="error_msg" style="display:none;" class="alert alert-danger text-center"></div>
   <input type="hidden" name="mode" value="changepw">
   <div class="col-lg-12 col-md-12 col-sm-12">
   <div class="form-group">
    <label for="firstname">Password</label>
    <input type="password" class="form-control" name="pass"  placeholder="Enter New Password" id="pass" required maxlength="30" autofocus> 
    </div>

    <div class="form-group">
    <label for="firstname">Password</label>
    <input type="password" class="form-control" name="cpass" id="cpass" placeholder="Repeat New Password" required maxlength="30">   
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
 function  validate_registration(){

                var pwd = $('#pass').val();
                var cpwd = $('#cpass').val();
                //var regulerExpression = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
               
                if(pwd!=cpwd){
                  $('#error_msg').show()
                  $('#div_error').hide()
                  $('#error_msg').html('')
                  $('#error_msg').html('<span class="text-danger">Password And Confirm Password Does Not Matched</span>')
                  $('#cpass').focus();
                  $('#cpass').val('');
                  return false;
                } 
              }
</script>
  </body>
</html>