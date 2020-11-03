<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
  <!--<link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script> -->
  <link href="<?=base_url()?>webmaster_assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
</head>
<body >
  <div id="wrapper">
    <!--- Nav start -->
    <? $this->load->view('webmaster/template/left_nav'); ?>
    <!--- Nav end -->
    <div id="page-wrapper" class="gray-bg dashbard-1">
       <? $this->load->view('webmaster/template/top'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
          <h2>User List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage User</a></li>
            <li class="active"><strong><?=$btnCapt?> User</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/user')?>">Back to the list</a>
          </div>
        </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
          <h5><?=$btnCapt?> User</h5>
         <div class="clearfix">&nbsp;</div>
        </div>
         <div class="ibox-content">
          <form action="<?=site_url('webmaster/user/manage_user/'.$userId)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;First Name</label>
             <div class="col-lg-10">
                <input type="text" name="first_name" id="first_name" class="form-control" value="<?php if(@$userdata['first_name']!=""){ echo $userdata['first_name'];}else{ echo set_value('first_name');  } ?>" />
                <span class="help-block text-danger">
                  <?php if(form_error('first_name')!=""){  echo  form_error('first_name'); } ?>
                </span>  
              </div>  
          </div>

          <div class="form-group">
             <label class="col-lg-2 control-label">Last Name </label>
             <div class="col-lg-10">                     
                <input type="text" name="last_name"  class="form-control" id="last_name"  value="<?php if(@$userdata['last_name']!=""){ echo $userdata['last_name'];}else{ echo set_value('last_name');  } ?>" />
                <span class="help-block text-danger">
                  <?php if(form_error('last_name')!=""){  echo  form_error('last_name'); } ?>
                </span>  
              </div>
          </div>
          
          <div class="form-group">
             <label class="col-lg-2 control-label">Email Address </label>
             <div class="col-lg-10">                     
                <input type="email" name="email_address"  class="form-control" id="email_address" 
                 value="<?php if(@$userdata['email_address']!=""){ echo $userdata['email_address'];}else{ echo set_value('email_address');  } ?>"  <?php if($userId>0){ ?>  <?php } ?>  />
                <span class="help-block text-danger">
                  <?php if(form_error('email_address')!=""){  echo  form_error('email_address'); } ?>
                </span>  
              </div>
          </div>
          <div class="form-group">
             <label class="col-lg-2 control-label">Phone Number </label>
              <div class="col-lg-10">
               <input type="text" class="form-control"  name="phone" id="phone"    value="<?php if(@$userdata['phone']!=""){ echo $userdata['phone'];}else{ echo set_value('phone');  } ?>" maxlength="12"> 
                 <span class="help-block text-danger">
                  <?php if(form_error('phone')!=""){  echo  form_error('phone'); } ?>
                </span> 
              </div>
           </div> 

          <div class="hr-line-dashed"></div>
          <h3>Categories</h3>
           <div class="form-group">
             <label class="col-lg-2 control-label">Gallery Categories </label>
              <div class="col-lg-10">
                <select name="galleries_id" id="galleries_id" class="form-control">
                  <option value="">Select Gallery</option>
                  <?php foreach ($galleries as $galleriesRs) { ?>
                   <option value="<?=$galleriesRs['cat_id']?>" <? if(@$userdata['galleries_id']==$galleriesRs['cat_id'] ||  set_value('galleries_id')==$galleriesRs['cat_id']){ ?> selected="selected" <? } ?>>
                      <?=stripslashes($galleriesRs['cat_name'])?></option>
                <?  }?>
                </select>
                <span class="help-block text-danger">
                  <?php if(form_error('galleries_id')!=""){  echo  form_error('galleries_id'); } ?>
                </span> 
              </div>
           </div>

           <?php
            $styleArray =  array();
            $styleArray = @explode(',',@$userdata['style_id']);?>

            <div class="form-group">
             <label class="col-lg-2 control-label">Style Categories </label>
              <div class="col-lg-10">
                <select name="style_id[]" id="style_id" class="form-control" multiple="multiple">
                  <option value="">Select Style</option>
                  <?php foreach ($style as $styleRs) { ?>
                   <option value="<?=$styleRs['cat_id']?>" <? if(  @in_array($styleRs['cat_id'],$styleArray,true)){ ?> selected="selected" <? } ?>><?=stripslashes($styleRs['cat_name'])?></option>
                <?  }?>
                </select>
                <span class="help-block text-danger">
                  <?php if(form_error('style_id')!=""){  echo  form_error('style_id'); } ?>
                </span> 
              </div>
           </div>
 

          <div class="hr-line-dashed"></div>
          <h3>Contact Details</h3>
          <div class="form-group">
             <label class="col-lg-2 control-label">Address </label>
              <div class="col-lg-10">
                <textarea name="address" id="address"  class="form-control"><?php if(@$userdata['address']!=""){ echo $userdata['address'];}else{ echo set_value('address');  } ?></textarea> 
                 <span class="help-block text-danger">
                  <?php if(form_error('address')!=""){  echo  form_error('address'); } ?>
                </span> 
              </div>
           </div>

            <div class="form-group">
             <label class="col-lg-2 control-label">Address  2</label>
              <div class="col-lg-10">
                <textarea name="address2" id="address2"  class="form-control"><?php if(@$userdata['address2']!=""){ echo $userdata['last_name'];}else{ echo set_value('address2');  } ?></textarea> 
              </div>
           </div>
            <div class="form-group">
             <label class="col-lg-2 control-label">Country </label>
              <div class="col-lg-10">
                <select name="country" id="country" class="form-control">
                  <option value="">Select Country</option>
                  <?php foreach ($country as $countryRs) { ?>
                   <option value="<?=$countryRs['country_name']?>" <? if(@$userdata['country']==$countryRs['country_name'] ||  set_value('country')==$countryRs['country_name']){ ?> selected="selected" <? } ?>><?=stripslashes($countryRs['country_name'])?></option>
                <?  }?>
                </select>
                <span class="help-block text-danger">
                  <?php if(form_error('country')!=""){  echo  form_error('country'); } ?>
                </span> 
              </div>
           </div>

            <div class="form-group">
             <label class="col-lg-2 control-label">City </label>
              <div class="col-lg-10">
                <input type="text" class="form-control" name="city" id="city" value="<?php if(@$userdata['city']!=""){ echo $userdata['city'];}else{ echo set_value('city');  } ?>"> 
                 <span class="help-block text-danger">
                  <?php if(form_error('city')!=""){  echo  form_error('city'); } ?>
                </span> 
              </div>
           </div>

            <div class="form-group">
             <label class="col-lg-2 control-label">State </label>
              <div class="col-lg-10">
                 <input type="text" class="form-control"   name="state" id="state"  value="<?php if(@$userdata['state']!=""){ echo $userdata['state'];}else{ echo set_value('state');  } ?>"> 
                 <span class="help-block text-danger">
                  <?php if(form_error('state')!=""){  echo  form_error('state'); } ?>
                </span> 
              </div>
           </div>
      
            <div class="form-group">
             <label class="col-lg-2 control-label">Zip Code </label>
              <div class="col-lg-10">
                 <input type="text" class="form-control"  name="zip" id="zip"   value="<?php if(@$userdata['zip']!=""){ echo $userdata['zip'];}else{ echo set_value('zip');  } ?>" maxlength="8"> 
                <span class="help-block text-danger">
                  <?php if(form_error('zip')!=""){  echo  form_error('zip'); } ?>
                </span> 
              </div>
           </div>

           <div class="form-group"><label class="col-lg-2 control-label">User Type</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                <label><input type="radio" value="artist" name="user_type" id="user_type_artist" 
                  <? if(@$userdata['user_type']=='artist'){ ?> checked="checked" <? } if(set_value('user_type')=='artist'){  ?> checked="checked" <? } ?>><i></i> Artist </label>
                <label><input type="radio" value="user" name="user_type" id="user_type_user" <? if(@$userdata['user_type']=='user'){  ?> checked="checked" <? } if(set_value('user_type')=='user'){  ?> checked="checked" <? } ?>  ><i></i> User </label>
                <span class="help-block text-danger">
                  <?php if(form_error('user_type')!=""){  echo  form_error('user_type'); } ?>
                </span> 
              </div>
            </div>
          </div>
 
          <div class="form-group"><label class="col-lg-2 control-label">Is Featured?</label>
            <div class="col-lg-10" >
              <div >
                <label><input type="radio" value="1" name="featureRadio" id="is_featured1" 
                  <? if(@$userdata['is_featured']!='0000-00-00'){ ?> checked="checked" <? } ?> onclick="javascript:isFeature(this.value);"><i></i> Yes </label>
                <label><input type="radio" value="0"   name="featureRadio"  id="is_featured" <? if(@$userdata['is_featured']=='0000-00-00'){  ?> checked="checked" <? }else if(@$userId==0){ ?>  checked="checked" <? } ?> onclick="javascript:isFeature(this.value);"><i></i> No </label>
                <span class="help-block text-danger">
                  <?php if(form_error('is_featured')!=""){  echo  form_error('is_featured'); } ?>
                </span> 
              </div>

              <div  id="data_1"  <? if(@$userdata['is_featured']=='0000-00-00' || @$userId==0){ ?> style="display:none;"
                <?php } ?>>
              <div class="input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                <input class="form-control" value="<? if(@$userdata['is_featured']!='0000-00-00'){ echo@$userdata['is_featured']; }else{ echo '';} ?>" name="is_featured" id="is_featured1"  type="text">
               </div>   
               </div> 
             </div>
             </div>

          <div class="clearfix">&nbsp;</div>


          <div class="form-group"><label class="col-lg-2 control-label">Profile Pic</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
               <input type="file" name="profile_pic" id="profile_pic" > 
               <input type="hidden" name="old_profile_pic" id="old_profile_pic"  value="<?=@$userdata['profile_pic']?>"> 
               <span style="font-size:10px;color:gray;">Image Size (356 X 360)<span>
              </div>
            </div>
          </div>

          <?php if(@$userdata['profile_pic']!=''){ ?>
            <div class="form-group"><label class="col-lg-2 control-label">Old Profile Pic</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
              <input type="hidden" name="old_profile_pic" id="old_profile_pic"  value="<?=@$userdata['profile_pic']?>"> 
              <img src="<?=base_url()?>uploads/user_profile_pic/<?=$userdata['profile_pic']?>" class="img-responsive">
              </div>
            </div>
          </div>
          <?php } ?>
            
            <input type="hidden" name="notification_status" id="notification_status"  value="1">
            <input type="hidden" name="notification_des" id="notification_des"  value="Updated Profile">
            
          <div class="hr-line-dashed"></div>
          <div class="form-group">
          <div class="col-sm-4 col-sm-offset-2">
          <a href="<?=site_url('webmaster/user');?>" class="btn btn-white">Cancel</a>
          <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> User" name="btnsave">
          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div></div></div>
               <? $this->load->view("webmaster/template/footer")?>
              </div>
            </div>
          <? $this->load->view('webmaster/template/bot_script'); ?>
         <!-- iCheck -->
        <!-- <script src="<?=base_url()?>webmaster_assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(document).ready(function () {
          $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
          });
        });
       </script>-->

   <!-- Data picker -->
       <script src="<?=base_url()?>webmaster_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
       <script type="text/javascript">
      $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
       </script>
       <script type="text/javascript">
        function isFeature(str){
          if(str=='1'){
               $("#data_1").show();
          }else if(str=='0'){
               $("#data_1").hide();
          }else{
               $("#data_1").hide();
          }
       }
       </script>
      </body>
     </html>