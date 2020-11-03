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
    <?php $com = new common(); ?>
 <div id="wrapper">
  <!--- Nav start -->
  <? $this->load->view('webmaster/template/left_nav'); ?>
  <!--- Nav end -->
  <div id="page-wrapper" class="gray-bg dashbard-1">
   <? $this->load->view('webmaster/template/top'); ?>
   <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
      <h2>Region</h2>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
        <li><a>Manage Region</a></li>
        <li class="active"><strong><?=$btnCapt?> Region</strong></li>
      </ol>
    </div>
    <div class="col-lg-4"><div class="title-action">
      <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/categories/region_list')?>">Back to the list</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
    <div class="ibox-title">
      <h5><?=$btnCapt?> Region</h5>
      <div class="clearfix">&nbsp;</div>
    </div>
    <div class="ibox-content">
     <? if($this->session->flashdata('Error')){ ?>
     <div class="alert alert-danger alert-dismissable" align="center">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?=$this->session->flashdata('Error')?>
    </div>
    <? } ?>
    <form action="<?=site_url('webmaster/categories/manage_region/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
      <input type="hidden" name="mode" value="<?=$btnCapt?>" />
      <div class="form-group">
       <label class="col-lg-2 control-label">&nbsp;Title</label>
       <div class="col-lg-10">
        <input type="text" name="region_name" id="region_name" class="form-control" value="<?php if(@$form_data['region_name']!=""){ echo $form_data['region_name'];}else{ echo set_value('region_name');  } ?>" />
                <span class="help-block text-danger">
                  <?php if(form_error('region_name')!=""){  echo  form_error('region_name'); } ?>
        </span> 
       </div>  
     </div>

    
    <?php 
        $countries = $com->get_country();
    ?>
    <div class="form-group">
        <label class="col-lg-2 control-label">&nbsp;Country Name</label>
        <div class="col-lg-10">
            <select name="country_id" id="country_id" class="form-control" required>
                <option value="0">Select Country Name</option>
                <?php  foreach($countries as $countryRs){  ?>
                <option value="<?=$countryRs['id']?>" <?php if($countryRs['id']==@$form_data['country_id']){ ?>  selected = "selected" <?php } ?> ><?=stripslashes($countryRs['country_name'])?> </option>
                <?php } ?>
            </select>
            <span class="help-block text-danger">
              <?php if(form_error('country_id')!=""){  echo  form_error('country_id'); } ?>
            </span>  
        </div>  
    </div>
    
     <div class="hr-line-dashed"></div>
     <div class="form-group">
      <div class="col-sm-4 col-sm-offset-2">
       <a href="<?=site_url('webmaster/categories/region_list');?>" class="btn btn-white">Cancel</a>
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
</body>
</html>
