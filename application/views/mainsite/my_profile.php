<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('mainsite/common/top-artist-profile');?>
<body>
    <?php $this->load->view('mainsite/common/header'); ?>
    <div class="slider4-section" >
    <div class="container">
    <div class="row">        
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div data-aos-once="true" data-aos="fade-up" class="aos-init aos-animate">
    <div class="create-account-form-bg" data-aos-once="true" data-aos="fade-up">
    <h2 class="create-account-form-heding text-center">My Profile</h2>
    <div class="create-account-form">
    <form name="frm" id="frm" action="<?=site_url('profile/index')?>" method="post" enctype="multipart/form-data"  >
    <div class="row">  
    <? if($this->session->flashdata('Success')){?>
    <div class="col-lg-12 col-md-12 col-sm-12">
    <div class="alert alert-success alert-dismissable" align="center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?=$this->session->flashdata('Success')?>
    </div>
    </div>
    <? } ?>
    <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
    <label for="firstname">First Name</label>
    <input type="text" class="form-control" id="first_name"  name="first_name" placeholder="First Name" value="<?=@stripslashes($userdata['first_name'])?>" required>
    <span class="help-block text-danger">
    <?php if(form_error('first_name')!=""){  echo  form_error('first_name'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
    <label for="lastname">Last Name</label>
    <input type="text" class="form-control" id="last_name"  name="last_name" placeholder="Last Name"  value="<?=@stripslashes($userdata['last_name'])?>" required>
    <span class="help-block text-danger">
    <?php if(form_error('last_name')!=""){  echo  form_error('last_name'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
    <label for="emailaddress">Email Address</label>
    <input type="text" class="form-control"  id="email_address" name="email_address" placeholder="Email address"  value="<?=@stripslashes($userdata['email_address'])?>" readonly="readonly">
    <span class="help-block text-danger">
    <?php if(form_error('email_address')!=""){  echo  form_error('email_address'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
    <label for="country">Country </label>
    <select name="country" id="country" class="form-control" >
    <option value="">Select Country</option>
    <?php $lib = new common(); 
    $countryDs = $lib->get_country(); 
    foreach ($countryDs as $countryRs) { ?>
    <option value="<?=stripslashes($countryRs['country_name'])?>" <?php if($userdata['country']==$countryRs['country_name']){ ?>  selected="selected" <?php } ?>>
    <?=stripslashes($countryRs['country_name'])?></option>
    <?php  }  ?>
    </select>
    <span class="help-block text-danger">
    <?php if(form_error('country')!=""){  echo  form_error('country'); } ?>
    </span>  
    </div>
    </div>
    <?php if($this->session->userdata('CUSTOMER_TYPE')=='artist'){ ?>
    <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
    <label for="category">Category </label>
    <select class="form-control" id="galleries_id" name="galleries_id">
    <option>select Category</option>
    <?php     foreach ($galleries as $galleriesRs) { ?>
    <option value="<?=stripslashes($galleriesRs['cat_id'])?>" <?php if($userdata['galleries_id']==$galleriesRs['cat_id']){ ?>  selected="selected" <?php } ?>><?=ucfirst(stripslashes($galleriesRs['cat_name']))?></option>
    <?php  }  ?>
    </select>
    <span class="help-block text-danger">
    <?php if(form_error('galleries_id')!=""){  echo  form_error('galleries_id'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
    <div class="form-group">
    <label for="style">Style  </label>
    <select class="form-control"   id="style_id" name="style_id" >
    <option>select Style</option>
    <?php     foreach ($style as $styleRs) { ?>
    <option value="<?=stripslashes($styleRs['cat_id'])?>" <?php if($userdata['style_id']==$styleRs['cat_id']){ ?>  selected="selected" <?php } ?>><?=ucfirst(stripslashes($styleRs['cat_name']))?></option>
    <?php  }  ?>
    </select>
    <span class="help-block text-danger">
    <?php if(form_error('style_id')!=""){  echo  form_error('style_id'); } ?>
    </span>  
    </div>
    </div>
    <?php }else{ ?>
    <input type="hidden"   id="style_id" name="style_id"  value="0"> 
    <input type="hidden" id="galleries_id" name="galleries_id"  value="0"> 
    <?php } ?>
    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
    <label for="address">Address</label>
    <!--  <textarea class="form-control" rows="3"  id="address" name="address" placeholder="Address" required>
    <?=$userdata['address']?></textarea> -->
    <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?=@stripslashes($userdata['address'])?>" required>
    <span class="help-block text-danger">
    <?php if(form_error('address')!=""){  echo  form_error('address'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
    <label for="address2">Address2</label>
    <input type="text" class="form-control" id="address2" name="address2" placeholder="Address 2" value="<?=@stripslashes($userdata['address2'])?>" required>
    <span class="help-block text-danger">
    <?php if(form_error('address2')!=""){  echo  form_error('address2'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
    <label for="address2">Phone</label>
    <input type="text" class="form-control numberonly" id="phone" name="phone" placeholder="Phone" value="<?=@stripslashes($userdata['phone'])?>" required>
    <span class="help-block text-danger">
    <?php if(form_error('phone')!=""){  echo  form_error('phone'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group" >
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?=@stripslashes($userdata['city'])?>" required>
    <span class="help-block text-danger">
    <?php if(form_error('city')!=""){  echo  form_error('city'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?=@stripslashes($userdata['state'])?>" required>
    <span class="help-block text-danger">
    <?php if(form_error('state')!=""){  echo  form_error('state'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4">
    <div class="form-group">
    <label for="zip">Zip</label>
    <input type="text" class="form-control numberonly" id="zip" name="zip" placeholder="Zip" required maxlength="4"  value="<?=@stripslashes($userdata['zip'])?>" >
    <span class="help-block text-danger">
    <?php if(form_error('zip')!=""){  echo  form_error('zip'); } ?>
    </span>  
    </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
    <button type="submit" class="btn btn-primary create-account-submit-btn">Update</button>
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
    <?php include 'change_password.php';?>
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
    <? $this->load->view('mainsite/common/login-registration-common-js');?>
    </body>
    </html>