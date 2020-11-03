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
          <h2>More Featured Artists List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>More Featured Artists</strong></li>
          </ol>
        </div>
       
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

         
            
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="20%">Image</th>
                  <th width="70%">Name</th>
                  <th width="10%">Edit</th>
                </tr>
              </thead>
              <tbody>
                   <?php $i=0; foreach ($remainingFeature as $dataRs){ $i++; 
                    //echo "<pre>";
                   // print_r($dataRs);
                    
                   ?>
                  <tr>
                    <td align="left">
                        <?php 
                        if($dataRs['image_name']!=''){ ?>
                        <img src="<?=base_url()?>uploads/artist-gallery/original/thumb/<?=$dataRs['image_name']?>" alt="" class="img-responsive">
                        <?php }else{ ?>
                         <img src="<?=base_url()?>front_assets/images/artist-page-img.jpg" alt="" class="img-responsive" />
                         <?php } ?>
                    </td>
                    <td align="left">
                        <?php echo $dataRs['first_name']." ".$dataRs['last_name']; ?>
                    </td>
                    <td align="center">
                        <a href="<?=site_url('webmaster/user/morefeaturedgallery/'.$dataRs['uid'].'/'.$dataRs['id'])?>" title="Edit" ><i class="fa fa-edit"></i></a>
                    </td>
                  </tr>
               <?php if($i>9){ $i=0; } } ?>
              </tbody>
                       
            </table>
         
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
