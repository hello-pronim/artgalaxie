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
          <h2>Guestbook  </h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Guestbook</a></li>
            <li class="active"><strong>Guestbook</strong></li>
          </ol>
        </div>
        </div>
         <div class="wrapper wrapper-content animated fadeInRight">
        <?php if(isset($id) && $id>0){ ?>
           <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5><?=$btnCapt?> Guestbook</h5>
              <div class="clearfix">&nbsp;</div>
            </div>
            <div class="ibox-content">
             <? if($this->session->flashdata('Error')){?>
             <div class="alert alert-danger alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Error')?>
            </div>
            <? } ?>
            <form action="<?=site_url('webmaster/guestbook/index/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">

             <div class="form-group">
              <label class="col-lg-2 control-label">&nbsp;Message</label>
              <div class="col-lg-10">
                <textarea class="form-control"  name="short_description" id="short_description" rows="10"><?=$boxData["short_description"];?></textarea>
                 <span class="help-block text-danger">
                <?php if(form_error('short_description')!=""){  echo  form_error('short_description'); } ?>
              </span> 
              </div>  
            </div>
           <div class="form-group"><label class="col-lg-2 control-label">Is Approved?</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                <label><input type="radio" value="1" name="is_approved" id="is_approved1" 
                  <? if(@$boxData['is_approved']=='1'){ ?> checked="checked" <? }  ?>><i></i> Yes </label>
                <label><input type="radio" value="0" name="is_approved" id="is_approved0" <? if(@$boxData['is_approved']=='0'){  ?> checked="checked" <? }  ?>  ><i></i> No </label>
                <span class="help-block text-danger">
                  <?php if(form_error('is_approved')!=""){  echo  form_error('is_approved'); } ?>
                </span> 
              </div>
            </div>
          </div>
          
       <div class="hr-line-dashed"></div>
       <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
         <a href="<?=site_url('webmaster/guestbook');?>" class="btn btn-white">Cancel</a>
         <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Guestbook" name="btnsave">
       </div>
     </div>
   </form>
 </div>
</div>
</div></div> <?php } ?>


<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
 <!--  <div class="ibox-title"></div> -->
 <div class="ibox-title ">
  <h5 class="pull-left">Guestbook Listing </h5>
  <div class="clearfix"> </div>
</div>
<div class="ibox-content">
  <? if($this->session->flashdata('Success')){ ?>
  <div class="alert alert-success alert-dismissable" align="center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?=$this->session->flashdata('Success')?>
  </div>
  <? } ?>


  <form name="frmcustlist" method="post" class="form-horizontal" action="<?=site_url("webmaster/guestbook/delete_guestbook")?>" onSubmit="JavaScript:return confirm_delete()"> 
            <input type="hidden" value="delete" name="action" /> 
    <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th align="left" > Message </th>      
          <th align="left" > Added By </th>  
           <th align="left">Approved ?</th>       
          <th width="15%">Action</th>
        </tr>
      </thead>
      <tbody>  
        <?php if(!empty($dataDs)){?>
        <?php foreach($dataDs as $dataRs){ ?>
        <tr>
          
           <td><?php  echo stripslashes($dataRs['short_description']); ?></td>
           <td><?php  echo stripslashes($dataRs['first_name'].' '.$dataRs['last_name']); ?></td>
           <td><?php if($dataRs['is_approved']==1){ echo "Yes"; }else{ echo "No"; } ?></td>
           <td align="center">
             <a href="<?=site_url('webmaster/guestbook/index/'.$dataRs['id'])?>"  title="Edit" >
              <i class="fa fa-edit"></i></a>&nbsp;
              <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" >
             </td>
            </tr>   
            <?php } ?>
            <?php  }?>
          </tbody>
          <tfoot>
              <tr><td  colspan="3"></td><td align="right"><button type="submit" class="btn btn-danger" >Delete</button></td></tr>
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
