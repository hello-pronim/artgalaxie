<!DOCTYPE html>
<html>
<head>
 <? $this->load->view('webmaster/template/head'); ?>
 <!-- Data Tables -->
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
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
            <li><a href="<?=site_url('webmaster/dashboard')?>">Dashboard</a></li>
            <li><a>Manage User's Sociallinks </a></li>
            <li class="active"><strong>Social Links</strong></li>
          </ol>
        </div>
        <div class="col-lg-4">&nbsp;</div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <? $this->load->view('webmaster/common_feature_artist_head');?>
         <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
          <h5><?=$btnCapt?> Social Links</h5>
         <div class="clearfix">&nbsp;</div>
        </div>
         <div class="ibox-content">
           <? if($this->session->flashdata('Error')){?>
          <div class="alert alert-danger alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Error')?>
          </div>
          <? }   ?>
           <? if($this->session->flashdata('Success')){ ?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? } ?>
          <form action="<?=site_url('webmaster/user/socialLinks/'.$userId)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
           <input type="hidden" name="mode" value="1" >
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Facebook</label>
             <div class="col-lg-10">
                <input type="text" name="fb" id="fb" class="form-control" value="<?php if(@$artistData['fb']!=""){ echo @$artistData['fb'];} ?>" />
             </div>  
          </div>
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Pintrest</label>
             <div class="col-lg-10">
                <input type="text" name="pintrest" id="pintrest" class="form-control" value="<?php if(@$artistData['pintrest']!=""){ echo @$artistData['pintrest'];} ?>" />
              </div>  
          </div>
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Twitter</label>
             <div class="col-lg-10">
                <input type="text" name="twitter" id="twitter" class="form-control" value="<?php if(@$artistData['twitter']!=""){ echo @$artistData['twitter'];} ?>" />
             </div>  
          </div>
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Google Plus</label>
             <div class="col-lg-10">
                <input type="text" name="gplus" id="gplus" class="form-control" value="<?php if(@$artistData['gplus']!=""){ echo @$artistData['gplus'];} ?>" />
              </div>  
          </div>
          
         <div class="hr-line-dashed"></div>
            <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
             <a href="<?=site_url('webmaster/user/othersections/'.$userId);?>" class="btn btn-white">Cancel</a>
             <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Social Links" name="btnsave">
            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div></div>
            </div>
    <? $this->load->view("webmaster/template/footer")?>
  </div>
</div>
<!-- Mainly scripts -->
<? $this->load->view('webmaster/template/bot_script'); ?>
<!-- Data Tables -->
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
<!-- Page-Level Scripts -->
<script>
$(document).ready(function() {
  $('.dataTables-example').dataTable({
    responsive: true,
    "aaSorting": []
  });
});
</script>
</body>
</html>
