<?php 
    $com_key = new  common(); 
    $gckey = $com_key->get_google_captcha_key();
?>
<!DOCTYPE html>
<html lang="en">
    <style>
    tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
<?php $this->load->view('mainsite/common/top-artist-profile');?>
<body>
<?php $this->load->view('mainsite/common/header');?>
<div class="slider4-section top-shadow">
    <div class="middle-menu-section-bg no-pad" data-aos="fade-up" data-aos-once="true">
      <div class="middle-menu-section artist-information-menu " >
        <div class="container">
          <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
              <div class="middle-menu">
                <ul class="nav nav-tabs">
                  <li <?php if($tabID==0){ ?> class="active" <?php } ?>><a href="#tab0" class="midd-menu1" data-toggle="tab" aria-expanded="false">My Profile</a></li>
                  
                  <?php 
                  //print_r($this->session->userdata('CUSTOMER_TYPE'));
                  if($this->session->userdata('CUSTOMER_TYPE')=='artist') 
                  { 
                  ?>
                      <li <?php if($tabID==1){ ?> class="active" <?php } ?>><a href="#tab1" class="midd-menu6" data-toggle="tab" aria-expanded="false">Biography</a></li>
                      <li <?php if($tabID==2){ ?> class="active" <?php } ?>><a href="#tab2" class="midd-menu2" data-toggle="tab" aria-expanded="false">Statement</a></li>
                      <li <?php if($tabID==3){ ?> class="active" <?php } ?>><a href="#tab3" class="midd-menu3" data-toggle="tab" aria-expanded="false">Exhibitions</a></li>
                      <li <?php if($tabID==4){ ?> class="active" <?php } ?>><a href="#tab4" class="midd-menu4" data-toggle="tab" aria-expanded="false">Awards</a></li>
                      <li <?php if($tabID==5){ ?> class="active" <?php } ?>><a href="#tab5" class="midd-menu5" data-toggle="tab" aria-expanded="false">Publications</a></li>
                      <li <?php if($tabID==6){ ?> class="active" <?php } ?>><a href="#tab6" class="midd-menu7" data-toggle="tab" aria-expanded="false">Video</a></li>
                  <?php 
                  } 
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section  slider4-section"  data-aos="fade-up" data-aos-once="true">
      <div class="container ">
        <div class="tab-content  profile-tab-content">
            <div role="tabpanel" class="tab-pane <?php if($tabID==0){ ?> active <?php } ?>" id="tab0">
            <div class="row">
                <? if($this->session->flashdata('Success')){?>
                <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="alert alert-success alert-dismissable" align="center">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?=$this->session->flashdata('Success')?>
                </div>
                </div>
                <? } ?>
              <div class="artist-information-section information-section-heding">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
                  <div class="create-account-form">
                   <form name="frm" id="frmr" action="<?=site_url('profile/update_profile')?>" method="post" enctype="multipart/form-data"  >
                <div class="row">  
                
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
    
    <?php include 'change_password.php';?>
                  </div>
                 
                </div>
                
              </div>
            </div>
            
          </div>
          
          <div role="tabpanel" class="tab-pane <?php if($tabID==1){ ?> active <?php } ?>" id="tab1">
            <div class="row">
                <? if($this->session->flashdata('Success_biography')){?>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="alert alert-success alert-dismissable" align="center">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?=$this->session->flashdata('Success_biography')?>
                          </div>
                        </div>
                        <? }  ?>  
              <div class="artist-information-section">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
                  <div class="create-account-form box-blue">
                      <div class="row">
                        <form action="<?=site_url("biography")?>" name="frm_pass" method="post" enctype="multipart/form-data"  >
                         
                       <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <label for="biography">Biography</label>
                            <textarea class="form-control" rows="15"  id="biography" name="biography" placeholder="Biography Description" ><?=@$artist_data['biography']?></textarea>
                            <span class="help-block text-danger">
                            <?php if(form_error('biography')!=""){  echo  form_error('biography'); } ?>
                            </span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                          <button type="submit" class="btn btn-primary create-account-submit-btn box-blue-submit-btn">Submit</button>
                        </div>
                         </form>
                      </div>
                   </div>
                </div>
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane <?php if($tabID==2){ ?> active <?php } ?>" id="tab2">
            <div class="row">
                 <? if($this->session->flashdata('Success_statement')){?>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="alert alert-success alert-dismissable" align="center">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?=$this->session->flashdata('Success_statement')?>
                          </div>
                        </div>
                        <? }  ?> 
              <div class="artist-information-section information-section-heding">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
                  <div class="create-account-form red-box">
                   <div class="row">
                        <form action="<?=site_url("statement")?>" name="frm_pass" method="post" enctype="multipart/form-data"  >
                          
                       <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <label for="statement">Statement</label>
                            <textarea class="form-control" rows="15"  id="statement" name="statement" placeholder="Statement Description" ><?=@$artist_data['statement']?></textarea>
                            <span class="help-block text-danger">
                            <?php if(form_error('statement')!=""){  echo  form_error('statement'); } ?>
                            </span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                          <button type="submit" class="btn btn-primary create-account-submit-btn">Submit</button>
                        </div>
                         </form>
                      </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane <?php if($tabID==3){ ?> active <?php } ?>" id="tab3">
            <div class="row">
                 <? if($this->session->flashdata('Success_exibition')){?>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="alert alert-success alert-dismissable" align="center">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?=$this->session->flashdata('Success_exibition')?>
                          </div>
                        </div>
                        <? }  ?>
              <div class="artist-information-section information-section-heding">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
                  <div class="create-account-form box-orange">
                   <div class="row">
                        <form action="<?=site_url("exhibition")?>" name="frm_pass" method="post" enctype="multipart/form-data"  >
                           
                       <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <label for="exibition">Exhibition</label>
                            <textarea class="form-control" rows="15"  id="exibition" name="exibition" placeholder="Exhibition Description" ><?=@$artist_data['exibition']?></textarea>
                            <span class="help-block text-danger">
                            <?php if(form_error('exibition')!=""){  echo  form_error('exibition'); } ?>
                            </span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                          <button type="submit" class="btn btn-primary create-account-submit-btn box-orange-submit-btn">Submit</button>
                        </div>
                         </form>
                      </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane <?php if($tabID==4){ ?> active <?php } ?>" id="tab4">
           <div class="row">
                <? if($this->session->flashdata('Success_awards')){?>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="alert alert-success alert-dismissable" align="center">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?=$this->session->flashdata('Success_awards')?>
                          </div>
                        </div>
                        <? }  ?> 
              <div class="artist-information-section information-section-heding">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
                  <div class="create-account-form box-green">
                   <div class="row">
                        <form action="<?=site_url("awards")?>" name="frm_pass" method="post" enctype="multipart/form-data"  >
                          
                       <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <label for="awards">Awards</label>
                            <textarea class="form-control" rows="15"  id="awards" name="awards" placeholder="Awards Description" ><?=@$artist_data['awards']?></textarea>
                            <span class="help-block text-danger">
                            <?php if(form_error('awards')!=""){  echo  form_error('awards'); } ?>
                            </span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                          <button type="submit" class="btn btn-primary create-account-submit-btn box-green-submit-btn">Submit</button>
                        </div>
                         </form>
                      </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane <?php if($tabID==5){ ?> active <?php } ?>" id="tab5">
            <div class="row">
                 <? if($this->session->flashdata('Success_publication')){?>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="alert alert-success alert-dismissable" align="center">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <?=$this->session->flashdata('Success_publication')?>
                          </div>
                        </div>
                        <? }  ?> 
              <div class="artist-information-section information-section-heding">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
                  <div class="create-account-form box-yellow">
                   <div class="row">
                        <form action="<?=site_url("publication")?>" name="frm_pass" method="post" enctype="multipart/form-data"  >
                          
                       <div class="col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <label for="publication">Publication</label>
                            <textarea class="form-control" rows="15"  id="publication" name="publication" placeholder="Publication Description" ><?=@$artist_data['publication']?></textarea>
                            <span class="help-block text-danger">
                            <?php if(form_error('publication')!=""){  echo  form_error('publication'); } ?>
                            </span>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                          <button type="submit" class="btn btn-primary create-account-submit-btn box-yellow-submit-btn">Submit</button>
                        </div>
                         </form>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <?php include('my_video.php');?>
          
        </div>
      </div>
    </div>
</div>

<div class="modal fade register-madal uploadart-madal" id="myModalUploadartvideo" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Add Video</h3>
        </div>
        <form action="<?=site_url('profile/my_videos_add/'.@$artist_data['user_id'])?>" method="post" enctype="multipart/form-data" name="Formuploadimg" class="Formuploadimg" id="Formuploadimg">
        <div class="modal-body">
          <div class="row">
            <div id="div_error" style="display:none;" class="text-danger text-center"> </div>
            <div id="RegDivFrm"  style="display:none;" class="text-success text-center"> </div>
            <div id="reg-col-1">
              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;">
                <div class="modal-field">
                 <label class="field-title" for="first_name"></label>
                  <input type="text" class="form-control" id="videos_link"  name="videos_link" value="" placeholder="Youtube Link">
                </div>
              </div>
                </div>
               </div>
            </div>
            <div class="modal-footer text-center" >
          <button type="submit" class="btn " id="regsubmitbtn">Save</button> 
        </div>
        </form>
      </div>
    </div>
</div>


<?php $this->load->view('mainsite/common/footer');?>

<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script> 
<script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script> 
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<script type="text/JavaScript">
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script> 
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/JavaScript">
function validateFrm()
{
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("cpass").value;
    if (password != confirmPassword) {
        alert("New Password and Confirm Password do not match.");
        return false;
    }
    return true;
}
</script>

<script>
function confirm_delete()
{
	var checked=false;
	var records;
	elements=document.getElementsByName("cb[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked){
			checked = true;
		}
	}
	if (!checked) {
		alert('Please select at least 1 record to delete');
	}
	else{
		checked= confirm("Are you sure to delete?")
	}
	return checked;
}

</script>

<script src="<?=base_url()?>front_assets/js/aos.js"></script>
<script type="text/javascript">
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
</script>


</body>
</html>