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
          <h2>Filter  </h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Filter</a></li>
            <li ><strong>Filters</strong></li> 
            <?php if($main_cat!=''){ ?>
             <li class="active"><strong><?=$main_cat?></strong></li>
            <?php if($secount_cat!=''){ ?>
             <li class="active">   <strong><?=$secount_cat?></strong></li>
            <?php } } ?>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
          <?php if($main_cat_parent['pid']!=''){ ?>
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/blog/filter/0/'.@$main_cat_parent['pid'])?>">Back</a>
            <?php }else{ ?>
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/blog/filter/0/0')?>">Back</a>
            <?php }  ?>
           </div>
        </div>
        </div>
         <div class="wrapper wrapper-content animated fadeInRight">
        <?php
         $com = new common();
         $isParent0 = $com->checkIfparent(@$dataDs[0]['id']);
         if($isParent0==0 || isset($id) && $id>0){  ?>
           <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5><?=$btnCapt?> Filter</h5>
              <div class="clearfix">&nbsp;</div>
            </div>
            <div class="ibox-content">
             <? if($this->session->flashdata('Error')){?>
             <div class="alert alert-danger alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Error')?>
            </div>
            <? } ?>
            <form action="<?=site_url('webmaster/blog/filter/'.$id.'/'.$pid)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
            <input type="hidden" name="mode" value="1"  id="mode">
            <div class="form-group">
              <label class="col-lg-2 control-label">&nbsp;Filter Title</label>
              <div class="col-lg-10">
                <input type="text"  class="form-control"  name="cat_name" id="cat_name" value="<?=@$boxData["cat_name"]?>"   >
               </div>  
            </div>
       <div class="hr-line-dashed"></div>
       <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
         <a href="<?=site_url('webmaster/blog/filter');?>" class="btn btn-white">Cancel</a>
         <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Filter" name="btnsave">
       </div>
     </div>
   </form>
 </div>
</div>
</div></div> <?php } ?>


<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
 <!--  <div class="ibox-cat_name"></div> -->
 <div class="ibox-title ">
  <h5 class="pull-left">Filter Listing </h5>
  <div class="clearfix"> </div>
</div>
<div class="ibox-content">
  <? if($this->session->flashdata('Success')){ ?>
  <div class="alert alert-success alert-dismissable" align="center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?=$this->session->flashdata('Success')?>
  </div>
  <? } ?>


  <form name="frmcustlist" method="post"  class="form-horizontal"   action="<?=site_url("webmaster/blog/delete_blog_filter/".$pid)?>" onSubmit="JavaScript:return confirm_delete()"> 
     <input type="hidden" value="delete" name="action" />
    <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th align="left"> Filter Name </th>      
          <th align="left">Sub Categories</th>      
          <th width="15%">Action</th>
        </tr>
      </thead>
      <tbody>  
        <?php if($num_rec>0){?>
        <?php foreach($dataDs as $dataRs){ 
          $isParent = $com->checkIfparent($dataRs['id']);
          ?>
        <tr>
          <td><?php  echo stripslashes($dataRs['cat_name']); ?></td>
          <td><?php if( $isParent>0){ ?>
              <a href="<?=site_url('webmaster/blog/filter/0/'.$dataRs['id'])?>"  cat_name="Parent" >
                Manage Sub Filters 
              </a>
           <? }else{ echo "-"; } ?></td>
            <td align="center">
             <a href="<?=site_url('webmaster/blog/filter/'.$dataRs['id'].'/'.$dataRs['pid'])?>"  cat_name="Edit" >
              <i class="fa fa-edit"></i></a>
              <?php if( $isParent==0){ ?>
               <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" >
              <?php } ?>
             </td>
            </tr>   
            <?php }    if( $isParent0==0){ ?>
             <tfoot><tr><td  colspan="2"></td>
                <td align="right"><button type="submit" class="btn btn-danger" >Delete</button></td></tr>
              </tfoot> 
            <?php } }?>
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
