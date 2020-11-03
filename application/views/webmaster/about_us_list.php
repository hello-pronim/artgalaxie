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
        <h2>About Us List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage About Us</a></li>
            <li class="active"><strong>About Us</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><!-- <div class="title-action">
          <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/categories/manage_region_galleries')?>" >Add new</a>
        </div> --> </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? }?>

          <form name="frmcustlist" method="post" action="#"  class="form-horizontal">
          
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="15%" align="left">Title</th> 
                  <th width="6%">Edit</th> 
                </tr>
              </thead>
              <tbody>  
                <?php
                  foreach ($dataDs as $dataRs) {?>
                  <tr>
                    <td align="left"><?=$this->common->cut(stripslashes($dataRs['desc1']),100)?></td>
                    <td align="center"><a href="<?=site_url('webmaster/about_us/manage/'.$dataRs['id']);?>"><i class="fa fa-edit"></i></a></a></td>
                    
                  </tr>   
                  <?php } 
                ?>
              </tbody>
              <tfoot><tr><td colspan="2"></td></tr>
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
    "aaSorting": [2,'desc']
  });
});
</script>

</body>
</html>
