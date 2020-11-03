<? $act_id='CMS';?>
<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
  <link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
  <script src="<?=base_url()?>webmaster_assets/ckeditor/ckeditor.js"></script>
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
      <h2>Category List</h2>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
        <li><a>Manage Categories</a></li>
        <li class="active"><strong><?=$btnCapt?> Category</strong></li>
      </ol>
    </div>
    <div class="col-lg-4"><div class="title-action">
      <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/categories/category_list')?>">Back to the list</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
    <div class="ibox-title">
      <h5><?=$btnCapt?> Categories</h5>
      <div class="clearfix">&nbsp;</div>
    </div>
    <div class="ibox-content">
     <? if($this->session->flashdata('Error')){ ?>
     <div class="alert alert-danger alert-dismissable" align="center">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?=$this->session->flashdata('Error')?>
    </div>
    <? } ?>
    <form action="<?=site_url('webmaster/categories/manage_category/'.$cat_id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
      <input type="hidden" name="mode" value="<?=$btnCapt?>" />
      <div class="form-group">
       <label class="col-lg-2 control-label">&nbsp;Title</label>
       <div class="col-lg-10">
         <input type="text" name="cat_name" class="form-control" value="<?=$form_data['cat_name']?>" required/>
       </div>  
     </div>
      <div class="form-group">
         <label class="col-lg-2 control-label">Home Page Image</label>
          <div class="col-lg-10">
            <input type="file" value="" name="cat_images" class="" id="photo" <? if($cat_id==0){ ?> required <? } ?>>
          </div>
       </div>

       <? if(@$form_data['cat_images']!='' && $cat_id>0){ ?>
        <div class="form-group">
         <label class="col-lg-2 control-label">Already Added Home Page Image</label>
          <div class="col-lg-10">
             <input type="hidden" name="old_cat_images" id="old_cat_images" value="<?=$form_data['cat_images']?>"> 
              <img src="<?=base_url()?>uploads/galleries/<?=$form_data['cat_images']?>" width="30%" class="image-responsive">
          </div>
       </div>  
       <? } ?>
<!--       <div class="form-group">
         <label class="col-lg-2 control-label">Colour</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
                <label><input type="radio" value="1" name="colour_type" id="colour_type1" 
                  <? if(@$form_data['colour_type']==1){ ?> checked="checked" <? }else if($cat_id==0){ ?> checked="checked" <? } ?>><i></i> <span style='color:red!important;font-weight:bold;'>Red</span> </label>
                <label><input type="radio" value="2" name="colour_type" id="colour_type2" <? if(@$form_data['colour_type']==2){  ?> checked="checked" <? }  ?>><i></i> <span style='color:#cb7129!important;font-weight:bold;'>Orange</span> </label>
                <label><input type="radio" value="3" name="colour_type" id="colour_type3" <? if(@$form_data['colour_type']==3){  ?> checked="checked" <? }  ?>><i></i> <span style='color:#79a204!important;font-weight:bold;'> Green </span> </label>
                <label><input type="radio" value="4" name="colour_type" id="colour_type4" <? if(@$form_data['colour_type']==4){  ?> checked="checked" <? }  ?>><i></i><span style='color:#0ab2a0!important;font-weight:bold;'>  Blue</span> </label>
                
              </div>
          </div>
       </div> -->

          <div class="form-group">
         <label class="col-lg-2 control-label">Colour</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
                <label><input type="radio" value="1" name="colour_type" id="colour_type1" 
                  <? if(@$form_data['colour_type']==1){ ?> checked="checked" <? }else if($cat_id==0){ ?> checked="checked" <? } ?>><i></i> <span style='color:red!important;font-weight:bold;'>Red</span> </label><br>
                <label><input type="radio" value="2" name="colour_type" id="colour_type2" <? if(@$form_data['colour_type']==2){  ?> checked="checked" <? }  ?>><i></i> <span style='color:#cb7129!important;font-weight:bold;'>Ocer</span> </label><br>
                <label><input type="radio" value="3" name="colour_type" id="colour_type3" <? if(@$form_data['colour_type']==3){  ?> checked="checked" <? }  ?>><i></i> <span style='color:#79a204!important;font-weight:bold;'> Green </span> </label><br>
                <label><input type="radio" value="4" name="colour_type" id="colour_type4" <? if(@$form_data['colour_type']==4){  ?> checked="checked" <? }  ?>><i></i><span style='color:#0ab2a0!important;font-weight:bold;'>  Blue</span> </label><br>
                <label><input type="radio" value="5" name="colour_type" id="colour_type5" <? if(@$form_data['colour_type']==5){  ?> checked="checked" <? }  ?>><i></i><span style='color:#4c9eb6!important;font-weight:bold;'>  Light Blue 
                 </span> </label> <!-- box-color-five --><br>
                <label><input type="radio" value="6" name="colour_type" id="colour_type6" <? if(@$form_data['colour_type']==6){  ?> checked="checked" <? }  ?>><i></i><span style='color:#7a2525 !important;font-weight:bold;'>  Brown 
                </span> </label> <!-- box-color-six --><br>
                <label><input type="radio" value="7" name="colour_type" id="colour_type7" <? if(@$form_data['colour_type']==7){  ?> checked="checked" <? }  ?>><i></i><span style='color:#6958a6 !important;font-weight:bold;'>  Light Purple
                </span> </label> <!-- box-color-seven --> <br>
                <label><input type="radio" value="8" name="colour_type" id="colour_type8" <? if(@$form_data['colour_type']==8){  ?> checked="checked" <? }  ?>><i></i><span style='color:#773d97 !important;font-weight:bold;'>  Dark Purple 
                </span> </label> <!-- box-color-eight --> <br>
                <label><input type="radio" value="9" name="colour_type" id="colour_type9" <? if(@$form_data['colour_type']==9){  ?> checked="checked" <? }  ?>><i></i><span style='color:#af892e !important;font-weight:bold;'>  Yellow
                </span> </label> <!-- box-color-three -->
               
              </div>
          </div>
       </div>


        <div class="form-group"><label class="col-lg-2 control-label">Block Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="image_name" id="image_name" > 
             <input type="hidden" name="old_image_name" id="old_image_name"  value="<?=@$form_data['image_name']?>"> 
             <span style="font-size:10px;color:gray;">Image Size (469 X 354)<span>
            </div>
          </div>
        </div>

        <?php if(@$form_data['image_name']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Old Block Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_image_name" id="old_image_name"  value="<?=@$form_data['image_name']?>"> 
            <img src="<?=base_url()?>uploads/galleries/<?=$form_data['image_name']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } ?>


        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Sort No</label>
         <div class="col-lg-10">
           <input type="text" name="sort_no" class="form-control" value="<?=@$form_data['sort_no']?>" required/>
         </div>  
       </div>

     <div class="hr-line-dashed"></div>
     <div class="form-group">
      <div class="col-sm-4 col-sm-offset-2">
       <a href="<?=site_url('webmaster/categories/category_list');?>" class="btn btn-white">Cancel</a>
       <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?>" name="btnsave">
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
        <script src="<?=base_url()?>webmaster_assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(document).ready(function () {
          $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
          });
        });
       </script>
</body>
</html>
