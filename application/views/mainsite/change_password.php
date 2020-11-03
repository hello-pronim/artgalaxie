<div class="col-lg-12 col-md-12 col-sm-12 text-center changepasssection">
    <h4>Change Password</h4>
</div>
<form action="<?=site_url("profile/changepassword");?>" name="frm_pass" method="post" enctype="multipart/form-data"  onsubmit="return validateFrm()"  >
   <input type="hidden" name="mode" value="change"/>
   <div class="row">
   <div class="col-lg-12 col-md-12 col-sm-12">
   <div class="form-group">
    <label for="curr_pass">Current Password</label>
    <input type="password" class="form-control" id="curr_pass"  name="curr_pass" placeholder="Current Password"  required>
     <span class="help-block text-danger">
                  <?php if(form_error('curr_pass')!=""){  echo  form_error('curr_pass'); } ?>
      </span>  
   </div>
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12">
   <div class="form-group">
    <label for="pass">New Password</label>
    <input type="password" class="form-control" name="password" id="pass" placeholder="New Password"   required>
     <span class="help-block text-danger">
                  <?php if(form_error('last_name')!=""){  echo  form_error('last_name'); } ?>
      </span>  
   </div>
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12">
   <div class="form-group">
    <label for="cpass">Confirm Password</label>
    <input type="password" class="form-control"  name="cpass" id="cpass" placeholder="Confirm Password"    >
     <span class="help-block text-danger">
                  <?php if(form_error('email_address')!=""){  echo  form_error('email_address'); } ?>
      </span>  
   </div>
   </div>
 
    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
    <button type="submit" class="btn btn-primary create-account-submit-btn">Change Password</button>
    </div>
   </div>   </form>

 