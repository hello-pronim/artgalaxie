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
          <h2>Country List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Country</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
          <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/categories/manage_country')?>" >Add new</a>
        </div></div>
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

          <form name="frmcustlist" method="post" action="<?=site_url("webmaster/categories/operation_country")?>" onSubmit="JavaScript:return confirm_delete1()" class="form-horizontal">
            
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th align="left">Title</th>
                  <th align="center" width="14%">Apper in Column no. </th>
                   <th align="center" width="10%">View on Map</th>
                  <th align="center" width="6%">Delete</th>
                </tr>
              </thead>
              <tbody> 
             
                <? if($num_rec>0){
                  foreach ($list_data as $country) {?>
                  <tr>
                    <td align="left"><?=stripslashes($country['country_name'])?></td>
                    <td align="center">
                        <select name="view_on_column[]">
                            <?php
                                for($cnt=1; $cnt<5;$cnt++){
                                    $selected = '';
                                    if($cnt == $country['view_on_column']) {
                                        $selected = "selected";
                                    }
                                    echo '<option value="'.$cnt.'" '.$selected.'>'.$cnt.'</option>';
                                }
                            ?>
                        </select>
                    </td>
                    <td align="center"><input type="checkbox" name="cv[]" value="<?=$country['id']; ?>" <?php if($country['view_on_map']=="1"){ ?> checked <?php }?>></td>
                    <td align="center"><input type="hidden" name="cid[]" value="<?=$country['id']; ?>"> <input type="checkbox" name="cb[]" value="<?=$country['id']?>" ></td>
                  </tr>   
                  <?
                  } 
                }?>
              </tbody>
              <tfoot>
                <tr  align="center"> 
                <td>&nbsp;</td>
                 <td><input type='submit' class="btn btn-danger"  name='update_column' value='Update' ></td>
                <td><input type='submit' class="btn btn-danger"  name='update' value='Update' ></td>
                <td><input type='submit' class="btn btn-danger"  name='delete' value='Delete' ></td>
                </tr>
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
