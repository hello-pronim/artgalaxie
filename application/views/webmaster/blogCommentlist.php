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
          <h2>Blog Comments  </h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Blog Comment</a></li>
            <li ><strong>Blog Comment : <?=$blogTitle['blog_title']?></strong></li> 
             
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
         <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/blog')?>">Back</a>
            
          </div>
        </div>
        </div>
         <div class="wrapper wrapper-content animated fadeInRight">
        <?php if(isset($id) && $id>0){  ?>
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
            <form action="<?=site_url('webmaster/blog/manage_comments/'.$id.'/'.$blogId)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
            <div class="form-group">
              <label class="col-lg-2 control-label">&nbsp;Comment</label>
              <div class="col-lg-10">
                <textarea class="form-control"  name="comment" id="comment" rows="10"><?=$boxData["comment"];?></textarea>
                
                 <span class="help-block text-danger">
                <?php if(form_error('comment')!=""){  echo  form_error('comment'); } ?>
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
         <a href="<?=site_url('webmaster/blog/manage_comments/0/'.$blogId);?>" class="btn btn-white">Cancel</a>
         <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Comment" name="btnsave">
       </div>
     </div>
   </form>
 </div>
</div>
</div></div> <?php } ?>


<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
 <!--  <div class="ibox-comment"></div> -->
 <div class="ibox-title ">
  <h5 class="pull-left">Comment Listing on : <?=$blogTitle['blog_title']?> </h5>
  <div class="clearfix"> </div>
</div>
<div class="ibox-content">
  <? if($this->session->flashdata('Success')){ ?>
  <div class="alert alert-success alert-dismissable" align="center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?=$this->session->flashdata('Success')?>
  </div>
  <? } ?>


  <form name="frmcustlist" method="post"  class="form-horizontal"  action="#" > 
    <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th align="left"> Comment </th>      
          <th align="left">Added by</th>      
          <!-- <th align="left">Added Date</th>   --> 
          <th align="left">Approved ?</th>    
          <th width="15%">Action</th>
        </tr>
      </thead>
      <tbody>  
        <?php if(!empty($dataDs)){?>
        <?php foreach($dataDs as $dataRs){ 
          
          ?>
        <tr>
          <td><?php  echo stripslashes($dataRs['comment']); ?></td>
          <td><?php  echo stripslashes($dataRs['first_name'].' '.$dataRs['last_name']); ?></td>
        <!--   <td><?php  echo date('F d,Y',strtotime($dataRs['added_date'])); ?></td> -->
          <td><?php    if($dataRs['is_approved']==1){ echo "Yes"; }else{ echo "No"; } ?></td>
            <td align="center">
             <a href="<?=site_url('webmaster/blog/manage_comments/'.$dataRs['id'].'/'.$dataRs['blog_id'])?>"  comment="Edit" >
              <i class="fa fa-edit"></i></a>
             </td>
            </tr>   
            <?php } ?>
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
