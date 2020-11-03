<!DOCTYPE html>
<html>
<head>
 <? $this->load->view('webmaster/template/head'); ?>
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
          <h2>Update Sections</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('webmaster/dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Update Content</strong></li>
          </ol>
        </div>
        <div class="col-lg-4">&nbsp;</div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <? $this->load->view('webmaster/common_feature_artist_head');?>
        <div class="row ">
          <div class="col-lg-12"><div class="ibox float-e-margins">
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){?>
            <div class="alert alert-success alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Success')?>
            </div>
            <? }?>
                <form action="<?=site_url('webmaster/user/manage_desc/'.$userId.'/'.$field)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
            <div class="form-group ">
              <div class="row">
                <div class="col-sm-12">
                   <h3 class="text-align:center;">&nbsp;Update Content for <?=ucfirst($field)?></h3>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12 "><label class="control-label">Description</label></div>
              </div>
            </div>
           <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <textarea   id="description"     rows="20" name="description" ><?=@$artist_data[$fieldName]?></textarea>
                   <script>
                    CKEDITOR.replace('description', {
                      "filebrowserImageUploadUrl": "<?=site_url('webmaster/user/ck_imageupload')?>"
                    });
                  </script>
                   <span class="help-block text-danger">
                  <?php if(form_error('description')!=""){  echo  form_error('description'); } ?>
                  </span> 
                 </div>
              </div>
            </div>
           <div class="hr-line-dashed"></div>
           <div class="form-group"><div class="col-sm-4 col-sm-offset-2">
            <div class="col-sm-9">
              <a href="<?=site_url('webmaster/user/othersections/'.$userId);?>" class="btn btn-white">Cancel</a>
              <input type="submit" class="btn btn-primary" id="btnsave" value="Update" name="btnsave">
            </div></div></div>
          </form>
        </div>
      </div>
    </div></div></div>
    <? $this->load->view("webmaster/template/footer")?>
  </div>
</div>
<!-- Mainly scripts -->
<? $this->load->view('webmaster/template/bot_script'); ?>
<!-- iCheck -->
</body>
</html>