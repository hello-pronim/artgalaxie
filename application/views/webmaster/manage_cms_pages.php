<!DOCTYPE html>
<html>
<head>
 <? $this->load->view('webmaster/template/head'); ?>
  <link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
  <script src="<?=base_url()?>webmaster_assets/ckeditor/ckeditor.js"></script>

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
          <h2><?=ucfirst($btnCapt)?> CMS Page</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong><?=ucfirst($btnCapt)?> CMS Page</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><!-- <div class="title-action">
          <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/manage_cms/page_list')?>" >Back to the list</a>
        </div></div> -->
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){?>
            <div class="alert alert-success alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Success')?>
            </div>
            <? }?>
          <form action="<?=site_url('webmaster/manage_cms/manage_page/'.$pageid)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
              <input type="hidden" name="mode" value="<?=$btnCapt?>" />
               <?php /*  ?>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label class="control-label"> Parent Page </label>
                  </div>
                  <div class="col-sm-9">
                   <select name="parent_page_id" id="parent_page_id" class="form-control" >
                    <option value="">-- Select Parent Page --</option>
                    <? foreach($parentData as $parentRs){?>
                    <option value="<?=$parentRs['pageid']?>" <? if($cmsData['parent_page_id']==$parentRs['pageid']){?> selected="selected" <? }?>><?=$parentRs['page_title']?></option>
                    <? }?>
                  </select>
                </div>
              </div>
            </div>
            <?php  */ ?>
            
             <?php 
            if($pageid!=23 ){ ?>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label class="control-label">Page Title</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="page_title" class="form-control" value="<?=$cmsData['page_title']?>" required/>                     
                </div>
              </div>
            </div>
            <?php } ?>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label class="control-label">Material Page Title</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="material_title" class="form-control" value="<?=$cmsData['material_title']?>" />                     
                </div>
              </div>
            </div>
            <?php if( $pageid==2 || $pageid==9){ ?>
            <!--<div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label class="control-label">Sub Title</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="subtitle"  id="subtitle" class="form-control" value="<?=$cmsData['subtitle']?>" required/>                     
                </div>
              </div>
            </div>-->
            <?php } ?>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label class="control-label">Meta Title </label>
                </div>
                <div class="col-sm-9">                     
                  <input type="text" name="meta_title" required class="form-control" value="<?=$cmsData['meta_title']?>" />
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label class="control-label">Meta Description </label>
                </div>
                <div class="col-sm-9">
                  <textarea name="meta_description" required class="form-control"><?=$cmsData['meta_description']?></textarea> 
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3"><label class="control-label">Meta Keyword</label></div>
                <div class="col-sm-9">
                  <textarea name="meta_keyword" required class="form-control"><?=$cmsData['meta_keyword']?></textarea> 
                </div>
              </div>
            </div>
            
            <?php 
            if($pageid!=8 and $pageid!=23 and $pageid!=28 ){ ?>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12"><label class="control-label">Description</label></div>
                <div class="col-sm-12">
                  <textarea cols="60" rows="8"  id="page_desc" name="page_desc" ><?=$cmsData['page_desc'] ?></textarea>
                  <script>
                  CKEDITOR.replace('page_desc', {
                    "filebrowserImageUploadUrl": "<?=site_url('webmaster/manage_cms/ck_imageupload')?>"
                  });
                  </script>
                </div>
              </div>
            </div>
            <?php } ?>
            
            <?php if($pageid==7 || $pageid==2 || $pageid==8 || $pageid==9 || $pageid==10 || $pageid==11 || $pageid==12 || $pageid==13|| $pageid==14 || $pageid==15 || $pageid==16 || $pageid==17 || $pageid==18 || $pageid==19 || $pageid==20 || $pageid==21 || $pageid==23 || $pageid==25 || $pageid==26 || $pageid==27){ ?>
            <input type="hidden" name="page_image"   name="page_image"  value="">
           <input type="hidden" name="old_image"   name="old_image"  value="">
          <?php }else{ ?>
          <div class="form-group">
              <div class="row">
                <div class="col-sm-3"><label class="control-label">Banner Image</label></div>
                <div class="col-sm-9">
                  <input type="file" name="page_image" id="page_image" />
                  <input type="hidden" name="old_image" value="<?=$cmsData['page_image']?>" /> 
                </div>
              </div>
            </div>
            <? if(isset($cmsData['page_image']) && $cmsData['page_image']!=''){?>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3"><label class="control-label">Existing Image</label></div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                  <img src="<?=base_url()?>uploads/page_image/<?=$cmsData['page_image']?>" class="img-responsive" /><br>
                  <a href="<?=site_url('webmaster/manage_cms/remove_image/'.$pageid)?>">Remove Image</a>
                </div><div class="col-sm-6 col-md-6 col-lg-6"></div>
              </div>
            </div>
            <? }?>
           

          
          <?php } ?>
          <div class="hr-line-dashed"></div>
          <div class="form-group"><div class="col-sm-4 col-sm-offset-3">
            <div class="col-sm-10">
              <input type="submit" class="btn btn-primary" id="btnsave" value="<?=ucfirst($btnCapt)?> Page" name="btnsave">
            </div>
          </form>
        </div>
      </div>
    </div></div></div>
    <? $this->load->view("webmaster/template/footer")?>
  </div>
</div>
<!-- Mainly scripts -->
<? $this->load->view('webmaster/template/bot_script'); ?>
<!-- iCheck -->
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