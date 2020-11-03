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
          <h2>Category List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Category</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
          <a class="btn btn-add btn-primary pull-right" href="<?=site_url('webmaster/categories/manage_category')?>" >Add new</a>
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

          <form name="frmcustlist" method="post" action="<?=site_url("webmaster/categories/delete_category")?>" onSubmit="JavaScript:return confirm_delete()" class="form-horizontal">
            <input type="hidden" value="delete" name="action" />
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                   
                  <th width="10%" align="left">Home Images</th>
                  <th width="10%" align="left">Block Image</th> 
                  <th width="60%" align="left">Title</th>
                  <th width="10%" align="left">Sort No</th> 
                  <th width="5%">Edit</th>
                  <th width="5%">Delete</th>
                </tr>
              </thead>
              <tbody>  
                <?php if($num_rec>0){
                  foreach ($list_data as $category) {?>
                  <tr>
                    <td align="center">
                      <?php if(@$category['cat_images']!=''){ ?>
                    <img src="<?=base_url()?>uploads/galleries/<?=$category['cat_images']?>" width="50px" class="image-responsive1">
                    <?php }else{ ?>
                    <img src="<?=base_url()?>webmaster_assets/img/noImage.jpg" width="50px" class="image-responsive">
                    <?php } ?>
                    </td>
                    <td align="left">
                      <?php if(@$category['image_name']!=''){ ?>
                    <img src="<?=base_url()?>uploads/galleries/<?=$category['image_name']?>"  class="image-responsive">
                    <?php }else{ ?>
                    <img src="<?=base_url()?>webmaster_assets/img/noImage.jpg"  class="image-responsive">
                    <?php } ?></td>
                    <td align="left"><?=stripslashes($category['cat_name'])?></td>
                    <td align="center"><?=stripslashes($category['sort_no'])?></td>
                    <td align="center"><a href="<?=site_url('webmaster/categories/manage_category/'.$category['cat_id']);?>"><i class="fa fa-edit"></i></a></a></td>
                    <td align="center"><input type="checkbox" name="cb[]" value="<?=$category['cat_id']?>" ></td>
                  </tr>   
                  <?php } 
                }?>
              </tbody>
              <tfoot><tr><td colspan="5"></td>
                <td><button type="submit" class="btn btn-danger btn-delete">Delete</button></td></tr>
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
