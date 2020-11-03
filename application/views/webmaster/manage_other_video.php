<?php $act_id='CMS';?>
<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('webmaster/template/head'); ?>
  <link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
  <script src="<?=base_url()?>webmaster_assets/ckeditor/ckeditor.js"></script>
</head>
<body >
 <div id="wrapper">
  <!--- Nav start -->
  <?php $this->load->view('webmaster/template/left_nav'); ?>
  <!--- Nav end -->
  <div id="page-wrapper" class="gray-bg dashbard-1">
   <?php $this->load->view('webmaster/template/top'); ?>
   <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
      <h2>Other Video List</h2>
      <ol class="breadcrumb">
        <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
        <li><a>Manage Other Videos</a></li>
        <li class="active"><strong><?=$btnCapt?> Other Video</strong></li>
      </ol>
    </div>
    <div class="col-lg-4"><div class="title-action">
      <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/other_videos/other_video_list')?>">Back to the list</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
    <div class="ibox-title">
      <h5><?=$btnCapt?> Other Video</h5>
      <div class="clearfix">&nbsp;</div>
    </div>
    <div class="ibox-content">
     <?php if($this->session->flashdata('Error')){ ?>
     <div class="alert alert-danger alert-dismissable" align="center">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?=$this->session->flashdata('Error')?>
    </div>
    <?php } ?>
    <form action="<?=site_url('webmaster/other_videos/manage_video_link/'.$oth_id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
      <input type="hidden" name="mode" value="<?=$btnCapt?>" />
      <div class="form-group">
       <label class="col-lg-2 control-label">&nbsp;Video URL</label>
       <div class="col-lg-10">
         <input type="text" name="other_video_url" class="form-control" value="<?=$form_data['other_video_url']?>" required/>
       </div>  
     </div>

     <div class="hr-line-dashed"></div>
     <div class="form-group">
      <div class="col-sm-4 col-sm-offset-0">
       <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?>" name="btnsave">
     </div>
   </div>
 </form>
</div>
</div>
</div></div></div>
<?php $this->load->view("webmaster/template/footer")?>
</div>
</div>
<?php $this->load->view('webmaster/template/bot_script'); ?>
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
