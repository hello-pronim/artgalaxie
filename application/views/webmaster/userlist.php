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
          <h2>User List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage User</a></li>
            <li class="active"><strong>User List</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/user/manage_user')?>">Add User</a>
          </div>
        </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-title ">
          <h5 class="pull-left">User Listing </h5>
           <div class="clearfix"> </div>
          </div>
         <div class="ibox-content">
          <?php if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <?php } ?>
            

          <form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url("webmaster/user/delete_user")?>" onSubmit="JavaScript:return confirm_delete()"> 
           <input type="hidden" value="delete" name="action" />
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th align="left"> Name </th>
                  <th align="left"> Username </th>
                  <th align="left"> Email Address </th>
                  <th align="left"> Phone </th>
                  <th align="left"> User Type </th>
                  <th align="left"> Is Featured</th>
                  <th width="15%"> Sections</th>
                  <th width="15%">Edit</th>
                </tr>
              </thead>
              <tbody>  
                <?php if($num_rec){?>
                <?php foreach($dataDs as $dataRs){ ?>
                <tr>
                  <td align="left"><?=stripslashes($dataRs['first_name']." ".$dataRs['last_name'])?></td>
                  <td align="left"><?=stripslashes($dataRs['username'])?></td>
                  <td align="left"><?=stripslashes($dataRs['email_address'])?></td>
                  <td align="left"><?=stripslashes($dataRs['phone'])?></td>
                  <td align="left"><?=stripslashes($dataRs['user_type'])?></td>
                  <td align="left"><?php if($dataRs['is_featured']!='0000-00-00'){ echo "Yes"; }else{ echo "No"; }?></td>
                  <td align="left">
                    <?php if($dataRs['user_type']=='artist'){ ?>
                    <a href="<?=site_url('webmaster/user/othersections/'.$dataRs['id'])?>">Sections</a>
                    <?php }else{ echo "-"; } ?>
                  </td>
                  <td align="center">
                    <a href="<?=site_url('webmaster/user/details/'.$dataRs['id'])?>" title="Detail" >
                    <i class="fa fa-search-plus"></i></a>&nbsp; 
                    <a href="<?=site_url('webmaster/user/manage_user/'.$dataRs['id'])?>" title="Edit" >
                    <i class="fa fa-edit"></i></a>&nbsp;
                    <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" ></td>
                </tr>   
            
              <?php } ?>
              <?php }?></tbody>
              <tfoot><tr><td  colspan="7"></td>
                <td align="right"><button type="submit" class="btn btn-delete" >Delete</button></td></tr>
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
    "aaSorting": [0,'asc']
  });
});
</script>

</body>
</html>
