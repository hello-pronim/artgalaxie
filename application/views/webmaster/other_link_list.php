<!DOCTYPE html>
<html>
<head>
 <?php $this->load->view('webmaster/template/head'); ?>

 <!-- Data Tables -->
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

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
          <h2>Other Links List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Other Links</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
          <a class="btn btn-add pull-right" href="<?=site_url('webmaster/other_links/manage_other_link')?>" >Add new</a>
        </div> </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-content">
          <?php if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <?php }?>

          <form name="frmcustlist" method="post" action="<?=site_url("webmaster/other_links/delete_other_links")?>" onSubmit="JavaScript:return confirm_delete()" class="form-horizontal">
            <input type="hidden" value="delete" name="action" />
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th width="15%"align="center">Other Link Icons</th>
                  <th width="75%" align="left">Title</th>
                  <!--<th align="left">Sort No</th>   -->
                  <th width="10%">Edit</th>
                  <th width="10%">Delete</th>
                </tr>
              </thead>
              <tbody>  
                <?php if($num_rec>0){
                  foreach ($list_data as $other) {?>
                  <tr>
                    
                    <td align="left">
                      <?php if(@$other['image_name']!=''){ ?>
                    <img src="<?=base_url()?>uploads/other_links/<?=$other['image_name']?>" class="image-responsive">
                    <?php }else{ ?>
                    <img src="<?=base_url()?>webmaster_assets/img/noImage.jpg"  class="image-responsive1">
                    <?php } ?></td>
<td align="left"><?=stripslashes($other['title'])?></td>
                    <!-- <td align="left"><?//=stripslashes($other['sort_no'])?></td> -->
                    <td align="center"><a href="<?=site_url('webmaster/other_links/manage_other_link/'.$other['id']);?>"><i class="fa fa-edit"></i></a></a></td>
                    <td align="center"><input type="checkbox" name="cb[]" value="<?=$other['id']?>" ></td>
                  </tr>   
                  <?php } 
                }?>
              </tbody>
              <tfoot><tr><td colspan="3"></td>
                <td><button type="submit" class="btn btn-delete">Delete</button></td></tr>
              </tfoot>           
            </table>
          </form> 
        </div>
      </div>
    </div></div></div>
    <?php $this->load->view("webmaster/template/footer")?>
  </div>
</div>
<!-- Mainly scripts -->
<?php $this->load->view('webmaster/template/bot_script'); ?>
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
