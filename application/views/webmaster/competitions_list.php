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
          <h2>Art Of Giving List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage View Competitions</a></li>
            <li class="active"><strong>View Competitions</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
          <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_of_giving/manage_view_competitions')?>" >Add new</a>
        </div> </div>
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

          <form name="frmcustlist" method="post" action="<?=site_url("webmaster/art_of_giving/delete_competitions")?>" onSubmit="JavaScript:return confirm_delete()" class="form-horizontal">
            <input type="hidden" value="delete" name="action" />
            <table class="table tblcomp table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="15%" align="left">Banner</th>
                  <th width="15%" align="left">Title</th>
                  <th align="left">Start Date</th> 
                  <th align="left">End Date</th>
                  <th align="left">Winner</th>
                  <th align="left">Status</th>
                  <th width="6%">Edit</th>
                  <th width="6%">Delete</th>
                </tr>
              </thead>
              <tbody>  
                <? if($num_rec>0){
                    $com = new Common();
                  foreach ($list_data as $category) {
                    $user_arr = $com->getUserDetails($category['winner_user_id']);
                    if($user_arr == 0) {
                        $user_name = "";
                    } else {
                        $user_name = $user_arr['first_name']." ".$user_arr['last_name'];
                    }    
                  ?>
                  <tr id="<?=stripslashes($category['comp_status'])?>">
                       <td align="left"><img src="<?=base_url()?>uploads/art_of_giving/<?=stripslashes($category['banner_image'])?>" style="width:100%"></td>
                      
                    <td align="left"><?=stripslashes($category['comp_title'])?></td>
                   <td align="left"><?=stripslashes($category['from_date'])?></td>
                   <td align="left"><?=stripslashes($category['to_date'])?></td>
                     <td align="left"><?=stripslashes($user_name)?></td>
                    <td align="left"><?=stripslashes($category['comp_status'])?></td>
                   <td align="center"><a href="<?=site_url('webmaster/art_of_giving/manage_view_competitions/'.$category['id']);?>"><i class="fa fa-edit"></i></a></a></td>
                    <td align="center"><input type="checkbox" name="cb[]" value="<?=$category['id']?>" ></td>
                  </tr>   
                  <? } 
                }?>
              </tbody>
              <tfoot><tr><td colspan="7"></td>
                <td><button type="submit" class="btn btn-danger">Delete</button></td></tr>
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
