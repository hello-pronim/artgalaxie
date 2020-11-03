<!DOCTYPE html>
<html>
<head>
 <? $this->load->view('webmaster/template/head'); ?>
 
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
          <h2>Box Content of : <? echo stripslashes($parentDs['sub_title']); ?> </h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Box Content of : <?  if($parentDs['parent_id']==0){ echo stripslashes($parentDs['page_title']); }else{ echo stripslashes($parentDs['sub_title']); }    ?></strong></li>
          </ol>
        </div>
        <?  if(isset($parentDs)){  ?>
          <div class="col-lg-4"><div class="title-action">
            <?  if($parentDs['parent_id']==0){  ?>
             <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_marketing/')?>">Back to the list</a>
            <?php }else{?>
             <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_marketing/marketing_othersections/'.$parentDs['parent_id'].'/0')?>">Back to the list</a>
            <?php } ?>
            </div>
           </div>
           <?php }  ?>
         </div>
         <div class="wrapper wrapper-content animated fadeInRight">

          <?php if($id>0){ ?>
           <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5><?=$btnCapt?> Box Content</h5>
              <div class="clearfix">&nbsp;</div>
            </div>
            <div class="ibox-content">
             <? if($this->session->flashdata('Error')){?>
             <div class="alert alert-danger alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Error')?>
            </div>
            <? } ?>
            <form action="<?=site_url('webmaster/art_marketing/box_content/'.$parent_id.'/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">

             <div class="form-group">
              <label class="col-lg-2 control-label">&nbsp;Title</label>
              <div class="col-lg-10">
                <input type="text"  class="form-control"  name="title" id="title" value="<?=@$boxData["title"]?>"   >
                 <span class="help-block text-danger">
                <?php if(form_error('title')!=""){  echo  form_error('title'); } ?>
              </span> 
              </div>  
            </div>

            <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Description</label>
             <div class="col-lg-10">
               <textarea name="description" id="description"  class="form-control" rows="8"><?php if(@$boxData['description']!=""){ echo $boxData['description'];}else{ echo set_value('description');  } ?></textarea> 
               <span class="help-block text-danger">
                <?php if(form_error('description')!=""){  echo  form_error('description'); } ?>
              </span> 
            </div>   
          </div>
<? // if(@$boxData['box_image']!='' && $id>0){ ?>
          <div class="form-group">
           <label class="col-lg-2 control-label">Box Image</label>
           <div class="col-lg-10">
            <input type="file" value="" name="box_image" class="" id="photo" <? /*if($id==0){ ?> required <? } */ ?>>
          </div>
        </div>

        
        <div class="form-group">
         <label class="col-lg-2 control-label">Already Added Image</label>
         <div class="col-lg-10">
           <input type="hidden" name="old_box_image" id="old_box_image" value="<?=$boxData['box_image']?>"> 
           <img src="<?=base_url()?>uploads/art_marketing/<?=$boxData['box_image']?>" width="30%" class="image-responsive">
         </div>
       </div>  
       <? // } ?>


       <div class="hr-line-dashed"></div>
       <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
         <!--<a href="<?=site_url('webmaster/art_marketing/box_content/'.$parent_id);?>" class="btn btn-white">Cancel</a>
         <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Box Content" name="btnsave">-->
         <input type="submit" class="btn btn-primary" id="btnsave" value="Upload" name="btnsave">
       </div>
     </div>
   </form>
 </div>
</div>
</div></div> <?php } ?>


<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
 <!--  <div class="ibox-title"></div> -->
 <div class="ibox-title ">
  <h5 class="pull-left">Box Listing </h5>
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
          <th align="left" > Title </th>      
          <th align="left" > Description </th>       
          <th width="15%">Boxes</th>
        </tr>
      </thead>
      <tbody>  
        <?php if($num_rec>0){?>
        <?php 
        $ci=1;
        foreach($dataDs as $dataRs){ ?>
        <tr>
          <td><?php  echo stripslashes($dataRs['title']); ?></td>
          <td><?php  echo $this->common->Cut(stripslashes($dataRs['description']),100); ?></td>
          <td align="center">
            <a href="<?=site_url('webmaster/art_marketing/box_content/'.$parent_id.'/'.$dataRs['id'])?>" title="Edit" >
              <!--<i class="fa fa-edit"></i>-->Box <?php echo $dataRs['numbering']; ?></a></td>
            </tr>   
            <?php 
            $ci++;
            } ?>
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
