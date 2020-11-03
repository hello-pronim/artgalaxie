<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('mainsite/common/top-artist-profile');?>
<body>
  <? $this->load->view('mainsite/common/header');?>
  
  
  <div class="xxsection xxlsistartist-section xxbg-white xxartist-profile-video-section slider4-section" >
    <div class="container">
      <div class="row">        
   <div class="col-lg-12 col-md-12 col-sm-12">
    <div data-aos-once="true" data-aos="fade-up" class="aos-init aos-animate">
   <div class="create-account-form-bg" data-aos-once="true" data-aos="fade-up">
  
   <h2 class="create-account-form-heding text-center">Create an account</h2>
 
   <div class="create-account-form">
   
   <form>
   <div class="row">
   <div class="col-lg-6 col-md-6 col-sm-6">
   <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" id="firstname" placeholder="">
   </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
   <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" id="lastname" placeholder="">
   </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
   <div class="form-group">
    <label for="emailaddress">Email Address</label>
    <input type="text" class="form-control" id="emailaddress" placeholder="">
   </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
   <div class="form-group">
    <label for="country">Country </label>
    <input type="text" class="form-control" id="country" placeholder="">
   </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
   <div class="form-group">
    <label for="category">Category </label>
    <select class="form-control" id="category">
  <option>select Category</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
   </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
   <div class="form-group">
    <label for="style">Style  </label>
    <select class="form-control" id="style">
  <option>select Style</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
</select>
   </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
   <div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" rows="3"  id="address"></textarea>
   </div>
   </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
   <div class="form-group">
    <label for="address2">Address2</label>
     <textarea class="form-control" rows="3"  id="address2"></textarea>
   </div>
   </div>
   <div class="col-lg-4 col-md-4 col-sm-4">
   <div class="form-group" >
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" placeholder="">
   </div>
   </div>
   <div class="col-lg-4 col-md-4 col-sm-4">
   <div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" placeholder="">
   </div>
   </div>
   <div class="col-lg-4 col-md-4 col-sm-4">
   <div class="form-group">
    <label for="zip">Zip</label>
    <input type="text" class="form-control" id="zip" placeholder="">
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

 

<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script>
  <script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script>
    <script src="<?=base_url()?>front_assets/js/aos.js"></script> 
  
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script>
      <script src="<?=base_url()?>front_assets/readmore.js"></script>
  </body>
</html>