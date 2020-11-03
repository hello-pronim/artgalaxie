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
          <h2>Slider Images List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('webmaster/dashboard')?>">Dashboard</a></li>
            <li><a>Manage User's Slider Images</a></li>
            <li class="active"><strong>Sliders for <?=$type?> </strong></li>
          </ol>
        </div>
        <div class="col-lg-4">&nbsp;</div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
         <? $this->load->view('webmaster/common_feature_artist_head');?>
         <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
          <h5><?=$btnCapt?> Sliders for <?=$type?> </h5>
         <div class="clearfix">&nbsp;</div>
        </div>
         <div class="ibox-content">
           <? if($this->session->flashdata('Error')){?>
          <div class="alert alert-danger alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Error')?>
          </div>
          <? } ?>
          <form action="<?=site_url('webmaster/user/sliders/'.$userId.'/'.$type.'/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
          <input type="hidden" name="mode" value="1"> 
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Slider Image</label>
             <div class="col-lg-10">
               <input type="file" name="image_name" id="image_name"   <? if($id==0){ ?> required  <? } ?>> 
               <span class="help-block text-danger">
                  <?php if(form_error('image_name')!=""){  echo  form_error('image_name'); } ?>
                </span>  
              </div>  
          </div>
          <?php if(@$artist_data['image_name']!=''){ ?>
          <div class="form-group">
             <label class="col-lg-2 control-label">Old Image </label>
              <div class="col-lg-10">
               <input type="hidden" name="old_image_name" id="old_image_name" value="<?=$artist_data['image_name']?>"> 
               <img src="<?=base_url()?>uploads/artist_images/<?=$artist_data['image_name']?>" width="30%" class="image-responsive">
              </div>
           </div>
           <?php } ?>

           <div class="hr-line-dashed"></div>
                      <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                         <a href="<?=site_url('webmaster/user/othersections/'.$userId);?>" class="btn btn-white">Cancel</a>
                              <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Slider Image" name="btnsave">
            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div></div>


        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-title ">
          <h5 class="pull-left">Slider  Listing </h5>
           <div class="clearfix"> </div>
          </div>
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? } ?>
            

          <form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url("webmaster/user/delete_slider/".$userId.'/'.$type)?>" onSubmit="JavaScript:return confirm_delete()"> 
           <input type="hidden" value="delete" name="action" />
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th align="left" > Image </th>
                  <th width="15%">Action</th>
                </tr>
              </thead>
              <tbody>  
                <?if($artistData!=''){?>
                <?php foreach($artistData as $dataRs){ ?>
                <tr>
                  <td align="left"><img src="<?=base_url()?>uploads/artist_images/<?=$dataRs['image_name']?>" class="img-responsive"></td>
                  <td align="center">
                    <a href="<?=site_url('webmaster/user/sliders/'.$dataRs['user_id'].'/'.$type.'/'.$dataRs['id'])?>" title="Edit" >
                    <i class="fa fa-edit"></i></a>&nbsp;
                    <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" ></td>
                </tr>   
              <? } ?>
              <? }?></tbody>
               <tfoot><tr><td  colspan="1"></td>
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
