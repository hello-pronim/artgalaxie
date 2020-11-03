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
          <h2>Slider Content     </h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Slider Content : <?   echo stripslashes($parentDs['title']);   ?></strong></li>
          </ol>
        </div>
        
          <div class="col-lg-4"><div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/exhibitions')?>">Back to the list</a>
           </div>
           </div>
           
         </div>
         <div class="wrapper wrapper-content animated fadeInRight">

          
           <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5><?=$btnCapt?> Slider Content</h5>
              <div class="clearfix">&nbsp;</div>
            </div>
            <div class="ibox-content">
             <? if($this->session->flashdata('Error')){?>
             <div class="alert alert-danger alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Error')?>
            </div>
            <? } ?>
            <form action="<?=site_url('webmaster/exhibitions/manage_sliders/'.$parent_id.'/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
              <input type="hidden" name="mode" id="mode"  value="1">
             <?php if($parent_id==5){ ?>
             <div class="form-group">
              <label class="col-lg-2 control-label">&nbsp;Title</label>
              <div class="col-lg-10">
                <input type="text"  class="form-control"  name="title" id="title"    value="<?=@$boxData["title"]?>"   >
                 <span class="help-block text-danger">
                <?php if(form_error('title')!=""){  echo  form_error('title'); } ?>
              </span> 
              </div>  
            </div>

            <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Description</label>
             <div class="col-lg-10">
               <input type="text"  class="form-control"  name="description" id="description" value='<?=@$boxData["description"]?>'   > 
               <span class="help-block text-danger">
                <?php if(form_error('description')!=""){  echo  form_error('description'); } ?>
              </span> 
            </div>   
          </div>
          <?php } ?>

          <div class="form-group">
           <label class="col-lg-2 control-label">Image</label>
           <div class="col-lg-10">
            <input type="file" value="" name="box_image" class="" id="photo" <? /*if($id==0){ ?> required <? } */ ?>>
          </div>
        </div>

        <? if(@$boxData['box_image']!='' && $id>0){ ?>
        <div class="form-group">
         <label class="col-lg-2 control-label">Already Added Image</label>
         <div class="col-lg-10">
           <input type="hidden" name="old_box_image" id="old_box_image" value="<?=$boxData['box_image']?>"> 
           <img src="<?=base_url()?>uploads/exhibitions/<?=$boxData['box_image']?>" width="30%" class="image-responsive">
         </div>
       </div>  
       <? } ?>

       <?php if($parent_id==5){ ?>
            <div class="form-group">
              <label class="col-lg-2 control-label">&nbsp;Package Title</label>
              <div class="col-lg-10">
                <input type="text"  class="form-control"  name="package_title" id="package_title"    value="<?=@$boxData["package_title"]?>"   >
                 <span class="help-block text-danger">
                <?php if(form_error('package_title')!=""){  echo  form_error('package_title'); } ?>
              </span> 
              </div>  
            </div>
            <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Package Description</label>
             <div class="col-lg-10">
              <textarea name="package_description" id="package_description" class="form-control" rows="10" ><?=@$boxData["package_description"]?></textarea>
               <span class="help-block text-danger">
                <?php if(form_error('package_description')!=""){  echo  form_error('package_description'); } ?>
              </span> 
            </div>   
          </div>
          
          <?php
          if($btnCapt=='Add'){
          ?>
             <div class="form-group">
             <label class="col-lg-2 control-label">Select Option</label>
              <div class="col-lg-10">
                <select name="exe_filter_id" id="exe_filter_id" class="form-control">
                     <option value="6">Collective Exhibitions </option>
                     <option value="7">Solo Exhibitions </option>
                     <option value="8">International Art Fairs</option>
                </select>
               
              </div>
            </div>
          <?php
          }else{
          ?>
          <div class="form-group">
             <label class="col-lg-2 control-label">Select Option</label>
              <div class="col-lg-10">
                <select name="exe_filter_id" id="exe_filter_id" class="form-control">
                     <option value="6" <?php if($boxData['exe_filter_id']=='6'){ ?>  selected="selected" <?php } ?>>Collective Exhibitions </option>
                     <option value="7" <?php if($boxData['exe_filter_id']=='7'){ ?>  selected="selected" <?php } ?>>Solo Exhibitions </option>
                     <option value="8" <?php if($boxData['exe_filter_id']=='8'){ ?>  selected="selected" <?php } ?>>International Art Fairs</option>
                </select>
               
              </div>
            </div>
            
            <?php } ?>
           
                            

       <?php } ?>


       <div class="hr-line-dashed"></div>
       <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
         <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Slider Content" name="btnsave">
       </div>
     </div>
   </form>
 </div>
</div>
</div></div>  


<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
 <!--  <div class="ibox-title"></div> -->
 <div class="ibox-title ">
  <h5 class="pull-left">Slider Listing </h5>
  <div class="clearfix"> </div>
</div>
<div class="ibox-content">
  <? if($this->session->flashdata('Success')){ ?>
  <div class="alert alert-success alert-dismissable" align="center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?=$this->session->flashdata('Success')?>
  </div>
  <? } ?>


  <form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url('webmaster/exhibitions/delete_sliders')?>" onSubmit="JavaScript:return confirm_delete()" > 
   <input type="hidden" value="delete" name="action" />
    <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
      <thead>
        <tr>
          <?php if(@$dataDs[0]['exibition_id']==5){ ?>
           <th align="left">Title</th>      
           <th align="left">Description </th>     
          <?php } ?>
          <th align="left">Image</th>     
          <th width="15%">Action</th>
          <th width="15%">Delete</th>
        </tr>
      </thead>
      <tbody>  
        <?php if($num_rec>0){?>
        <?php foreach($dataDs as $dataRs){ 
        ?>
        <tr>
        <?php if($dataDs[0]['exibition_id']==5){ ?>
          <td><?php  echo stripslashes($dataRs['title']); ?></td>
          <td><?php  echo $this->common->Cut(stripslashes($dataRs['description']),100); ?></td>
          <?php } ?>
          <td align="left"><img src="<?=base_url()?>uploads/exhibitions/<?=$dataRs['box_image']?>" class="img_responsive"  width="50%"></td>
          <td align="center">
            <a href="<?=site_url('webmaster/exhibitions/manage_sliders/'.$parent_id.'/'.$dataRs['id'])?>" title="Edit" >
              <i class="fa fa-edit"></i></a></td>
            <td align="center"><input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" ></td>
            </tr>   
            <?php } ?>
            <?php  }?>
          </tbody>
        <tfoot><tr><td colspan="4"></td>
                <td><button type="submit" class="btn btn-danger">Delete</button></td></tr>
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
