<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
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
          <h2>Prtinting Material  </h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Prtinting Material Content</a></li>
            <li class="active"><strong>Prtinting Material Content List</strong></li>
          </ol>
        </div>
        <div class="col-lg-4">
         <div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/printing')?>">Back to the list</a>
          </div>
        </div>
        </div>
         <div class="wrapper wrapper-content animated fadeInRight">
        <?php if(isset($id) && $id>0){ ?>
           <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5><?=$btnCapt?> Prtinting Material Content</h5>
              <div class="clearfix">&nbsp;</div>
            </div>
            <div class="ibox-content">
             <? if($this->session->flashdata('Error')){?>
             <div class="alert alert-danger alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Error')?>
            </div>
            <? } ?>
            <form action="<?=site_url('webmaster/printing/manage_other_printing/'.$cat_id.'/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">

             <div class="form-group">
              <label class="col-lg-2 control-label">&nbsp;Title</label>
              <div class="col-lg-10">
                <input type="text"  class="form-control"  name="title" id="title" value="<?=@$dataDs["title"]?>"   >
                 <span class="help-block text-danger">
                <?php if(form_error('title')!=""){  echo  form_error('title'); } ?>
              </span> 
              </div>  
            </div>

            <div class="form-group">
            <label class="col-lg-2 control-label">&nbsp;Description</label>
              <div class="col-lg-10">
               <textarea  class="form-control"  name="description" id="description" rows="10"><?=@$dataDs["description"]?></textarea>
               <span class="help-block text-danger">
                <?php if(form_error('description')!=""){  echo  form_error('description'); } ?>
              </span> 
              </div>  
            </div>
              <? if(@$dataDs['image1']!='' && $id>0){ ?>
           <div class="form-group">
             <label class="col-lg-2 control-label">Image 1 </label>
             <div class="col-lg-10">
              <input type="file" value="" name="image1" class="" id="image1" <? if($id==0){ ?> required <? } ?>>
            </div>
          </div>
          <div class="form-group">
           <label class="col-lg-2 control-label">Already Added Image</label>
           <div class="col-lg-10">
             <input type="hidden" name="old_image1" id="old_image1" value="<?=$dataDs['image1']?>"> 
             <img src="<?=base_url()?>uploads/printing/<?=$dataDs['image1']?>" width="30%" class="image-responsive">
           </div>
         </div>  
         <? } ?>
         <? if(@$dataDs['image2']!='' && $id>0){ ?>
          <div class="form-group">
             <label class="col-lg-2 control-label">Image 2 </label>
             <div class="col-lg-10">
              <input type="file" value="" name="image2" class="" id="image2" <? if($id==0){ ?> required <? } ?>>
            </div>
          </div>

          
          <div class="form-group">
           <label class="col-lg-2 control-label">Already Added Image 2</label>
           <div class="col-lg-10">
             <input type="hidden" name="old_image2" id="old_image2" value="<?=$dataDs['image2']?>"> 
             <img src="<?=base_url()?>uploads/printing/<?=$dataDs['image2']?>" width="30%" class="image-responsive">
           </div>
         </div>  
         <? } ?>

        <div class="hr-line-dashed"></div>
       <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
         <a href="<?=site_url('webmaster/printing/index');?>" class="btn btn-white">Cancel</a>
         <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Prtinting Material" name="btnsave">
       </div>
     </div>
   </form>
 </div>
</div>
</div></div> <?php } ?>


<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
 <!--  <div class="ibox-title"></div> -->
 <div class="ibox-title ">
  <h5 class="pull-left">Prtinting Material Listing </h5>
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
          <th width="15%">Action</th>
        </tr>
      </thead>
      <tbody>  
        <?php if($num_rec>0){?>
        <?php foreach($dataDs1 as $dataRs){ ?>
        <tr>
          <td><?php  echo stripslashes($dataRs['title']); ?></td>
          <td align="center">
           <a href="<?=site_url('webmaster/printing/manage_other_printing/'.$dataRs['cat_id'].'/'.$dataRs['id'])?>"  title="Edit" >
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
<? $this->load->view('webmaster/template/bot_script'); ?>
</body>
</html>