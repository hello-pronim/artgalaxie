<!DOCTYPE html>
<html>
<head>
<? $this->load->view('webmaster/template/head'); ?>

<!-- Data Tables -->
<link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
<link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
<link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
<script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
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
  <h2>User List</h2>
  <ol class="breadcrumb">
    <li><a href="<?=site_url('webmaster/dashboard')?>">Dashboard</a></li>
    <li><a>Manage User's Gallery </a></li>
    <li class="active"><strong>Gallery</strong></li>
  </ol>
</div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
<? $this->load->view('webmaster/common_feature_artist_head');?>
<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
  <div class="ibox-title">
    <h5><?=$btnCapt?> Gallery Image</h5>
    <div class="clearfix">&nbsp;</div>
  </div>
  <div class="ibox-content">
   <? if($this->session->flashdata('Error')){?>
   <div class="alert alert-danger alert-dismissable" align="center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?=$this->session->flashdata('Error')?>
  </div>
  <? } ?>

                
                
  <form action="<?=site_url('webmaster/user/gallery/'.$userId.'/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
    <input type="hidden" name="mode" value="1" id="mode">
         <?php   if(@$artistDetails['image_name']==''){ ?>
         
                
    
                <div class="form-group">
                     <label class="col-lg-2 control-label">&nbsp;Images Title</label>
                     <div class="col-lg-10">
                      <input type="text" name="image_title" id="image_title" value="" size="60"/>
                     </div>  
                </div>
                
                
        
        <?php
         } 
        ?>
        <?php   if(@$artistDetails['image_name']!=''){ ?>
       
       
                <?php 
                $uri = $_SERVER['REQUEST_URI'];
                if (strpos($uri,'morefeaturedgallery') == false) 
                {
                 ?>
                    <div class="form-group">
                         <label class="col-lg-2 control-label">&nbsp;Images Title</label>
                         <div class="col-lg-10">
                          <input type="text" name="image_title" id="image_title" value=" <?=$artistDetails['image_title']?>" size="60"/>
                         </div>  
                    </div>
                <?php
                }
                ?>
        
        <?php
         } 
        ?>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Upload Images</label>
         <div class="col-lg-10">
          <input type="file" name="image_name" id="image_name" <?php if($id==0){ ?> required  <?php } ?>/>
         </div>  
      </div>
  <?php   if(@$artistDetails['image_name']!=''){ ?>
   <div class="form-group">
     <label class="col-lg-2 control-label">&nbsp;Images</label>
     <div class="col-lg-10">
      <input type="hidden" name="old_image_name" id="old_image_name" value="<?=$artistDetails['image_name']?>" />
      <img src="<?=base_url()?>uploads/artist-gallery/original/thumb/<?=$artistDetails['image_name']?>" class="img-responsive" style="width:165px;">
     </div>  
  </div>
  <?php } ?>
    
    
    <?php 
        $uri = $_SERVER['REQUEST_URI'];
        if (strpos($uri,'morefeaturedgallery') !== false) 
        {
    ?>
            
            
            <div class="form-group">
         <label class="col-lg-2 control-label">Colour</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
               
                <label><input type="radio" value="1" name="colour_type" id="colour_type1" <?php if($artistDetails['image_color']==1){ ?> checked="checked"  <?php } ?>><i></i> <span style="color:#8f191b!important;font-weight:bold;">Red</span> </label><br>
                <label><input type="radio" value="2" name="colour_type" id="colour_type2" <?php if($artistDetails['image_color']==2){ ?> checked="checked"  <?php } ?> ><i></i> <span style="color:#b76328!important;font-weight:bold;">Orange</span> </label><br>
                <label><input type="radio" value="3" name="colour_type" id="colour_type3" <?php if($artistDetails['image_color']==3){ ?> checked="checked"  <?php } ?> ><i></i> <span style="color:#af892e!important;font-weight:bold;">Ocer</span> </label><br>
                <label><input type="radio" value="4" name="colour_type" id="colour_type4" <?php if($artistDetails['image_color']==4){ ?> checked="checked"  <?php } ?> ><i></i> <span style="color:#718c3a!important;font-weight:bold;">Light Green</span> </label><br>
                <label><input type="radio" value="5" name="colour_type" id="colour_type5" <?php if($artistDetails['image_color']==5){ ?> checked="checked"  <?php } ?> ><i></i> <span style="color:#4c9eb6!important;font-weight:bold;">Light Blue</span> </label> <!-- box-color-five --><br>
                <label><input type="radio" value="6" name="colour_type" id="colour_type6" <?php if($artistDetails['image_color']==6){ ?> checked="checked"  <?php } ?>><i></i> <span style="color:#7a2525 !important;font-weight:bold;">Brown</span> </label> <!-- box-color-six --><br>
                <label><input type="radio" value="7" name="colour_type" id="colour_type7" <?php if($artistDetails['image_color']==7){ ?> checked="checked"  <?php } ?>><i></i> <span style="color:#6958a6 !important;font-weight:bold;">Light Purple</span> </label> <!-- box-color-seven --> <br>
                <label><input type="radio" value="8" name="colour_type" id="colour_type8" <?php if($artistDetails['image_color']==8){ ?> checked="checked"  <?php } ?>><i></i> <span style="color:#773d97 !important;font-weight:bold;">Dark Purple</span> </label> <!-- box-color-eight --> <br>
                <label><input type="radio" value="9" name="colour_type" id="colour_type9" <?php if($artistDetails['image_color']==9){ ?> checked="checked"  <?php } ?>><i></i> <span style="color:#089f8e !important;font-weight:bold;">Green</span></label> <!-- box-color-three -->
               
              </div>
          </div>
       </div>
            
            
    <?php
        }
    ?>
   
  
     <div class="form-group">
    <label class="col-lg-2 control-label">Is Featured ?</label>
    <div class="col-lg-10">
      <div class="radio i-checks">
          <label><input type="radio" value="1" name="is_feature" id="is_feature1" <? if(@$artistDetails['is_feature']==1){?>checked="checked"<?}?>> Yes </label>       
           <label><input type="radio" value="0" name="is_feature" id="is_feature2" <? if(@$artistDetails['is_feature'] == 0){?>checked="checked"<? }?>> No</label>
    </div>
  </div>
  <br>
  <br>
    <br>

  <!-- <div class="form-group">
     <label class="col-lg-2 control-label">&nbsp;Water Mark Image</label>
     <div class="col-lg-10">
      <input type="file" name="image_water" id="image_water" <?php if($id==0){ ?>// required  <?php } ?>/>
     </div>  
  </div>-->

 <?php   if(@$artistDetails['water_mark_image']!=''){ ?>
   <div class="form-group">
     <label class="col-lg-2 control-label">&nbsp;Water Mark Image</label>
     <div class="col-lg-10">
      <input type="hidden" name="old_image_water" id="old_image_water" value="<?=$artistDetails['water_mark_image']?>" />
      <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$artistDetails['water_mark_image']?>" class="img-responsive">
     </div>  
  </div>
<?php } ?>
 
  <div class="form-group">
    <label class="col-lg-2 control-label"></label>
    <div class="col-lg-10">
     <input type="submit" class="btn btn-primary" id="btnsave" value="Save" name="btnsave">
   </div>
 </div>
</form>
</div>
</div>
</div></div>


<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
<!--  <div class="ibox-title"></div> -->
<div class="ibox-title ">
<h5 class="pull-left">Gallery Listing </h5>
<div class="clearfix"> </div>
</div>
<div class="ibox-content">
<? if($this->session->flashdata('Success')){?>
<div class="alert alert-success alert-dismissable" align="center">
<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
<?=$this->session->flashdata('Success')?>
</div>
<? } ?>


<form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url("webmaster/user/delete_gallery/".$userId)?>" onSubmit="JavaScript:return confirm_delete()"> 
<input type="hidden" value="delete" name="action" />
<table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
<thead>
<tr>
  <th align="left">Image</th>
  <th align="left">Image Title</th>      
  <th align="left">Is Feature </th>                   
  <th width="15%">Action</th>
</tr>
</thead>
<tbody>  
<?php if($artistNumRow>0){?>
<?php foreach($artistData as $dataRs){ ?>
<tr>
    
  <td align="center">
    <?php  if($dataRs['image_name']!=''){ ?>
    <img src="<?=base_url()?>uploads/artist-gallery/original/thumb/<?=$dataRs['image_name']?>" class="img-responsive" style="width:50px;">
   <?php } ?>
  </td>
  <td align="left">
    <?php  if($dataRs['image_title']!=''){ 
    echo $dataRs['image_title'];
    } ?>
  </td>
  <td><?php if($dataRs['is_feature']==1){ echo "Fetaured"; }else{ echo "Not Featured"; }  ?>
  </td>
  <td align="left">
    <a href="<?=site_url('webmaster/user/gallery/'.$dataRs['user_id'].'/'.$dataRs['id'])?>" title="Edit" >
      <i class="fa fa-edit"></i></a>&nbsp;
      <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" ></td>
    </tr>   
    <?php } ?>
    <?php  }?></tbody>
    <tfoot><tr><td  colspan="3"></td>
     <td align="right"><button type="submit" class="btn btn-danger"  style="width:100%;">Delete</button></td></tr>
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
"aaSorting": []
});
});
</script>

<script src="<?=base_url()?>webmaster_assets/js/plugins/iCheck/icheck.min.js"></script>
<script>
$(document).ready(function () {
  $('.i-checks').iCheck({
    checkboxClass: 'icheckbox_square-green',
    radioClass: 'iradio_square-green',
  });
});
</script>

</body>
</html>
