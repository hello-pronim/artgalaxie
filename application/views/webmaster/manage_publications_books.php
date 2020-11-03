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
          <h2>Book Images List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('webmaster/dashboard')?>">Dashboard</a></li>
            <li><a>Manage Book Images </a></li>
            <li class="active"><strong>Book Images</strong></li>
          </ol>
        </div>
        <div class="col-lg-4">&nbsp;</div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
          <div class="ibox-content m-b-sm border-bottom">
            <div class="p-xs">
            <h2> Manage Books Images of <?=stripslashes($publicationData['title'])?>
                <span class="pull-right"><a  href="<?=site_url('webmaster/publication')?>" 
                  class="btn btn-info btn-xs"> << Back</a></span>
              </h2>
              
            </div>
          </div>
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
          <div class="ibox-title">
            <h5><?=$btnCapt?> Book Image</h5>
            <div class="clearfix">&nbsp;</div>
          </div>
          <div class="ibox-content">
           <? if($this->session->flashdata('Error')){?>
           <div class="alert alert-danger alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Error')?>
          </div>
          <? } ?>
          <form action="<?=site_url('webmaster/publication/manage_books/'.$bookId.'/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
            <input type="hidden" name="mode" value="1" id="mode">
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Images</label>
             <div class="col-lg-10">
              <input type="file" name="image_name" id="image_name" <?php if($id==0){ ?> required  <?php } ?>/>
              <span style="font-size:11px;color:gray;">Image Size (1115 X 1443)<span>
             </div>  
          </div>

          <?php  
          
          
         if($publicationDataup){ ?>
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Images</label>
             <div class="col-lg-10">
              <input type="hidden" name="old_image_name" id="old_image_name" value="<?=$publicationDataup['image_name']?>" />
              <img src="<?=base_url()?>page/<?=$publicationDataup['image_name']?>" class="img-responsive" width="100px">
             </div>  
          </div>
          
          <?php } ?>
  
         <div class="hr-line-dashed"></div>
          <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
             <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Book Image" name="btnsave">
           </div>
         </div>
       </form>
     </div>
   </div>
 </div></div>


 <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
   <!--  <div class="ibox-title"></div> -->
   <div class="ibox-title ">
    <h5 class="pull-left">Book Images </h5>
    <div class="clearfix"> </div>
  </div>
  <div class="ibox-content">
    <? if($this->session->flashdata('Success')){?>
    <div class="alert alert-success alert-dismissable" align="center">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?=$this->session->flashdata('Success')?>
    </div>
    <? } ?>


    <form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url("webmaster/publication/delete_publicationbooks/".$bookId)?>" onSubmit="JavaScript:return confirm_delete()"> 
     <input type="hidden" value="delete" name="action" />
     <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th align="left">Image </th>      
          <th width="15%">Action</th>
        </tr>
      </thead>
      <tbody>  
        <?php if($bookNumRow>0){?>
        <?php foreach($bookDs as $dataRs){ 
        //echo "<pre>";
        //print_r($dataRs);
        
        
        ?>
        <tr>
          <td align="left">
            <?php  if($dataRs['image_name']!=''){ ?>
            <img src="<?=base_url()?>page/<?=$dataRs['image_name']?>" class="img-responsive" width="150px">
           <?php } ?>
          </td>
          <td align="center">
            <a href="<?=site_url('webmaster/publication/manage_books/'.$dataRs['publication_id']."/".$dataRs['id'])?>" title="Edit" >
              <i class="fa fa-edit"></i></a>&nbsp;
              <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" ></td>
            </tr>   
            <?php } ?>
            <?php  }?></tbody>
            <tfoot><tr><td  colspan="1"></td>
             <td align="right"><button type="submit" class="btn btn-danger" >Delete</button></td></tr>
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
 

</body>
</html>
