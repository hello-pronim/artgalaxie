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
          <h2>Photo Gallery </h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Photo Gallery </a></li>
            <li class="active"><strong>Photo Gallery of <?=stripslashes($galleryDetails['cat_name'])?></strong></li>
          </ol>
        </div>
        </div>
         <div class="wrapper wrapper-content animated fadeInRight">
        
           <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5><?=$btnCapt?> Design</h5>
              <div class="clearfix">&nbsp;</div>
            </div>
            <div class="ibox-content">
             <? if($this->session->flashdata('Error')){?>
             <div class="alert alert-danger alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Error')?>
            </div>
            <? } ?>
            <form action="<?=site_url('webmaster/regionwise_gallery/manage_photo_gallery/'.$cat_id.'/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
              <input type="hidden" name="mode" value="1">
             <div class="form-group">
             <label class="col-lg-2 control-label">Image</label>
             <div class="col-lg-10">
              <input type="file" value="" name="image_name" class="" id="photo" <? if($id==0){ ?> required <? } ?>>
            </div>
             </div>
            <? if(@$boxData['image_name']!='' && $id>0){ ?>
            <div class="form-group">
             <label class="col-lg-2 control-label">Old Image</label>
             <div class="col-lg-10">
               <input type="hidden" name="old_image_name" id="old_image_name" value="<?=$boxData['image_name']?>"> 
               <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$boxData['image_name']?>" width="30%" class="image-responsive">
             </div>
           </div>  
           <? } ?>
          
           <div class="hr-line-dashed"></div>
           <div class="form-group">
            <div class="col-sm-4">
             <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Photo Gallery" name="btnsave">
           </div>
         </div>
       </form>
 </div>
</div>
</div></div> 


<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
 <!--  <div class="ibox-title"></div> -->
 <div class="ibox-title ">
  <h5 class="pull-left">Photo Gallery Listing </h5>
  <div class="clearfix"> </div>
</div>
<div class="ibox-content">
  <? if($this->session->flashdata('Success')){ ?>
  <div class="alert alert-success alert-dismissable" align="center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?=$this->session->flashdata('Success')?>
  </div>
  <? } ?>


  <form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url("webmaster/regionwise_gallery/delete_photogallery")?>" onSubmit="JavaScript:return confirm_delete()"> 
      <input type="hidden" value="delete" name="action" />
    <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th >Image</th>
          <th width="15%">Edit</th>
          <th width="15%">Delete</th>
        </tr>
      </thead>
      <tbody>  
        <?php if(!empty($dataDs)>0){?>
        <?php foreach($dataDs as $dataRs){ ?>
        <tr>
        <td><?php if($dataRs['image_name']!=''){ ?>
          <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$dataRs['image_name']?>" alt="<?=$dataRs['image_name']?>" width="100px" class="img-responsive">  
          <? }else{ echo "-"; } ?>
        </td>
        <td align="center">
            <a href="<?=site_url('webmaster/regionwise_gallery/manage_photo_gallery/'.$dataRs['cat_id'].'/'.$dataRs['id'])?>"  title="Edit" >
              <i class="fa fa-edit"></i></a> 
              </td>
            <td align="center">
              <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" >
             </td>
            </tr>   
            <?php } ?>
              <tfoot>
                  <tr>
                  <td colspan="1"></td>
                  <td align="right">
                    <input type="hidden" name="cat_id" value="<?php echo $dataRs['cat_id'];?>"><button type="submit" class="btn btn-danger" >Delete</button>
                  </td>
                  </tr>
              </tfoot>    
            <?php  }?>
          </tbody>
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
