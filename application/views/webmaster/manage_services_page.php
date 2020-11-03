<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
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
        <h2>Services List</h2>
        <ol class="breadcrumb">
          <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
          <li><a>Manage Content</a></li>
          <li class="active"><strong><?=$btnCapt?> Services</strong></li>
        </ol>
      </div>
      <div class="col-lg-4"><div class="title-action">
        <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/services_page')?>">Back to the list</a>
      </div>
    </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
      <div class="ibox-title">
       <h5><?=$btnCapt?> Services</h5>
       <div class="clearfix">&nbsp;</div>
     </div>
     <div class="ibox-content">
      <form action="<?=site_url('webmaster/services_page/manage_services/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Name</label>
         <div class="col-lg-10">
          <input type="text" name="title" id="title" class="form-control" value="<?php if(@$dataDs['title']!=""){ echo $dataDs['title'];}else{ echo set_value('title');  } ?>" />
          <span class="help-block text-danger">
            <?php if(form_error('title')!=""){  echo  form_error('title'); } ?>
          </span>  
        </div>  
      </div>
       


     <div class="form-group">
       <label class="col-lg-2 control-label">Description </label>
       <div class="col-lg-10">
        <textarea name="services_short_description" id="services_short_description"  class="form-control" rows="10" ><?php if(@$dataDs['services_short_description']!=""){ echo $dataDs['services_short_description'];}else{ echo set_value('services_short_description');  } ?></textarea> 
        <span class="help-block text-danger">
          <?php if(form_error('services_short_description')!=""){  echo  form_error('services_short_description'); } ?>
        </span> 
      </div>
    </div>
 

  <div class="form-group">
     <label class="col-lg-2 control-label">Image</label>
     <div class="col-lg-10">
      <input type="file" value="" name="services_page_images" class="" id="photo" <? if($id==0){ ?> required <? } ?>>
    </div>
  </div>

  <? if(@$dataDs['services_page_images']!='' && $id>0){ ?>
  <div class="form-group">
   <label class="col-lg-2 control-label">Old Image</label>
   <div class="col-lg-10">
     <input type="hidden" name="old_services_page_images" id="old_services_page_images" value="<?=$dataDs['services_page_images']?>"> 
     <img src="<?=base_url()?>uploads/services/<?=$dataDs['services_page_images']?>" width="30%" class="image-responsive">
   </div>
 </div>  
 <? } ?>


 <div class="form-group">
     <label class="col-lg-2 control-label">Icone Image</label>
     <div class="col-lg-10">
      <input type="file" value="" name="services_icone_images" class="" id="photo" <? if($id==0){ ?> required <? } ?>>
      <span style="font-size:10px;color:gray;">Image Size (81 X 81)<span>
    </div>
  </div>

  <? if(@$dataDs['services_icone_images']!='' && $id>0){ ?>
  <div class="form-group">
   <label class="col-lg-2 control-label">Old Icone Image</label>
   <div class="col-lg-10">
     <input type="hidden" name="old_services_icone_images" id="services_icone_images" value="<?=$dataDs['services_icone_images']?>"> 
     <img src="<?=base_url()?>uploads/services/<?=$dataDs['services_icone_images']?>" width="30%" class="image-responsive">
   </div>
 </div>  
 <? } ?>
 <div class="hr-line-dashed"></div>
 <div class="form-group">
   <div class="col-sm-4 col-sm-offset-2">
     <a href="<?=site_url('webmaster/services_page');?>" class="btn btn-white">Cancel</a>
     <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Services" name="btnsave">
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