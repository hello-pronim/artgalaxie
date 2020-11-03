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
            <li><a>Manage User's Videos </a></li>
            <li class="active"><strong>Videos</strong></li>
          </ol>
        </div>
        <div class="col-lg-4">&nbsp;</div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <? $this->load->view('webmaster/common_feature_artist_head');?>
         <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
          <h5><?=$btnCapt?> Videos</h5>
         <div class="clearfix">&nbsp;</div>
        </div>
         <div class="ibox-content">
           <? if($this->session->flashdata('Error')){?>
          <div class="alert alert-danger alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Error')?>
          </div>
          <? } ?>
          <form action="<?=site_url('webmaster/user/videos/'.$userId.'/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Link</label>
             <div class="col-lg-10">
                <input type="text" name="videos_link" id="videos_link" class="form-control" value="<?php if(@$dataDs['videos_link']!=""){ echo $dataDs['videos_link'];}else{ echo set_value('videos_link');  } ?>" placeholder="Youtube Link" />
                <span class="help-block text-danger">
                  <?php if(form_error('videos_link')!=""){  echo  form_error('videos_link'); } ?>
                </span>  
              </div>  
          </div>
         <div class="hr-line-dashed"></div>
            <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
             <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Videos" name="btnsave">
            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div></div>


        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-title ">
          <h5 class="pull-left">Videos Listing </h5>
           <div class="clearfix"> </div>
          </div>
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? } ?>
            

          <form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url("webmaster/user/deleteVideos/".$userId)?>" onSubmit="JavaScript:return confirm_delete()"> 
           <input type="hidden" value="delete" name="action" />
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th align="left" > Video </th> 
                  <th>Added By</th>
                  <th width="15%">Action</th>
                </tr>
              </thead>
              <tbody>  
                <?if($artistNumRow>0){?>
                <?php foreach($artistData as $dataRs){ ?>
                <tr>
                  <td align="left"><?=stripslashes($dataRs['videos_link'])?></td> 
                  <td align="left"><?php if($dataRs['added_by']==0){ echo "Admin"; }else{ echo "Artist"; }?></td>
                  <td align="center">
                    <a href="<?=site_url('webmaster/user/videos/'.$dataRs['user_id'].'/'.$dataRs['id'])?>" title="Edit" >
                    <i class="fa fa-edit"></i></a>&nbsp;
                    <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" ></td>
                </tr>   
              <? } ?>
              <? }?></tbody>
               <tfoot><tr><td  colspan="2"></td>
               <td align="right"><button type="submit" class="btn btn-danger" >Delete</button></td></tr>
              </tfoot>           
            </table>
          </form> 
        </div>
      </div>

    </div></div></div>
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
