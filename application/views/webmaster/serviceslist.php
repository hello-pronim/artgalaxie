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
          <h2>Services List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Services List</strong></li>
          </ol>
        </div>
        <div class="col-lg-4">&nbsp;</div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-title ">
          <h5 class="pull-left">Services Listing </h5>
           <div class="clearfix"> </div>
          </div>
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? } ?>
          <form name="frmcustlist" method="post"  class="form-horizontal" > 
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="10%" align="left">Image</th>
                  <th width="20%" align="left">Name</th>
                  <th width="60%" align="left">Short Description</th>
                  <th width="10%">Action</th>
                </tr>
              </thead>
              <tbody>  
                <?if($num_rec){?>
                <?php foreach($dataDs as $dataRs){ ?>
                <tr>
                     <td align="left">
                      <? if($dataRs['services_images']!=''){ ?>
                    <img src="<?=base_url()?>uploads/services/<?=$dataRs['services_images']?>" width="10%" class="image-responsive">
                    <? }else{ ?>
                    <img src="<?=base_url()?>webmaster_assets/img/noImage.jpg" width="10%" class="image-responsive">
                    <? } ?></td>
                  <td align="left"><?=stripslashes($dataRs['title'])?></td>
                  <td align="left"><?=stripslashes($dataRs['short_description'])?></td>
                 
                  <td align="center">
                    <a href="<?=site_url('webmaster/services/manage_services/'.$dataRs['id'])?>" title="Edit" >
                    <i class="fa fa-edit"></i></a>&nbsp;</td>
                </tr>   
              <? } ?>
              <? }?></tbody>
              <tfoot><tr><td  colspan="4"></td></tr>
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
