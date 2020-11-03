<? $act_id='CMS';?>
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
          <h2>Gallery Benefits</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Gallery Benefits</a></li>
            <li class="active"><strong>Gallery Benefits</strong></li>
          </ol>
        </div>
    <div class="col-lg-4"><div class="title-action">
      <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/gallery_benefits')?>">Back to the list</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
    <div class="ibox-title">
      <h5><?=$btnCapt?> Categories</h5>
      <div class="clearfix">&nbsp;</div>
    </div>
    <div class="ibox-content">
     <? if($this->session->flashdata('Error')){ ?>
     <div class="alert alert-danger alert-dismissable" align="center">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?=$this->session->flashdata('Error')?>
    </div>
    <? } ?>
    <form action="<?=site_url('webmaster/gallery_benefits/manage_gallery_benefits/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
      
      <?php //echo "<pre>"; print_r($form_data); ?>
        <div class="form-group">
        <label class="col-lg-2 control-label">&nbsp;Benefits Icon</label>
        <div class="col-lg-10" style="display: inline-flex;">
             <img src="<?=base_url()?>uploads/shop/books/<?=$form_data['benefits_icon']?>" style="width: 3.5%; height: 3%;">
             <input type="file" class="form-control" id="benefits_icon" name="benefits_icon" value="<?=$form_data['benefits_icon']?>">
        </div>  
        </div>
        <div class="form-group">
        <label class="col-lg-2 control-label">&nbsp;Benefits Title</label>
            <div class="col-lg-10">
                <input type="text" name="benefits_title" class="form-control" value="<?=$form_data['benefits_title']?>"/>
                <span class="help-block text-danger">
                      <?php if(form_error('benefits_title')!=""){  echo  form_error('benefits_title'); } ?>
                </span>  
            </div>  
        </div>
        <div class="form-group">
        <label class="col-lg-2 control-label">&nbsp;Benefits Text</label>
            <div class="col-lg-10">
                <textarea name="benefits_text" id="benefits_text"   rows="7"><?=@$form_data['benefits_text']?></textarea>
                <script>
                CKEDITOR.replace('benefits_text', {
                  "filebrowserImageUploadUrl": "<?=site_url('webmaster/manage_gallery_benefits/ck_imageupload')?>"
                });
                </script>
                <span class="help-block text-danger">
                    <?php if(form_error('benefits_text')!=""){  echo  form_error('benefits_text'); } ?>
                </span>
            </div>  
        </div>
        
        <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Benefits2 Icon</label>
             <div class="col-lg-10" style="display: inline-flex;">
             <img src="<?=base_url()?>uploads/shop/books/<?=$form_data['benefits2_icon']?>" style="width: 3.5%; height: 3%;">
                 <input type="file" class="form-control" id="benefits2_icon" name="benefits2_icon">
            </div>  
        </div>
        <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Benefits2 Title</label>
             <div class="col-lg-10">
               <input type="text" name="benefits2_title" class="form-control" value="<?=@$form_data['benefits2_title']?>" />
              <span class="help-block text-danger">
                      <?php if(form_error('benefits2_title')!=""){  echo  form_error('benefits2_title'); } ?>
             </span>  
             </div>  
        </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Benefits2 Text</label>
         <div class="col-lg-10">
             <textarea name="benefits2_text" id="benefits2_text"  rows="7"><?=@$form_data['benefits2_text']?></textarea>
             <script>
            CKEDITOR.replace('benefits2_text', {
              "filebrowserImageUploadUrl": "<?=site_url('webmaster/blog/ck_imageupload')?>"
            });
        </script>
          <span class="help-block text-danger">
                  <?php if(form_error('benefits2_text')!=""){  echo  form_error('benefits2_text'); } ?>
         </span>  
         </div>  
       </div>
       
       <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Benefits3 Icon</label>
           <div class="col-lg-10" style="display: inline-flex;">
             <img src="<?=base_url()?>uploads/shop/books/<?=$form_data['benefits3_icon']?>" style="width: 3.5%; height: 3%;">
                 <input type="file" class="form-control" id="benefits3_icon" name="benefits3_icon">
                 
            </div>  
        </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Benefits3 Title</label>
         <div class="col-lg-10">
           <input type="text" name="benefits3_title" class="form-control" value="<?=@$form_data['benefits3_title']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('benefits3_title')!=""){  echo  form_error('benefits3_title'); } ?>
         </span>  
         </div>  
       </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Benefits3 Text</label>
         <div class="col-lg-10">
          <textarea name="benefits3_text" id="benefits3_text" class="form-control"  rows="7"><?=@$form_data['benefits3_text']?></textarea>
          <script>
            CKEDITOR.replace('benefits3_text', {
              "filebrowserImageUploadUrl": "<?=site_url('webmaster/blog/ck_imageupload')?>"
            });
        </script>
          <span class="help-block text-danger">
                  <?php if(form_error('benefits3_text')!=""){  echo  form_error('benefits3_text'); } ?>
         </span>  
         </div>  
       </div>
       
       <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Benefits4 Icon</label>
           <div class="col-lg-10" style="display: inline-flex;">
             <img src="<?=base_url()?>uploads/shop/books/<?=$form_data['benefits4_icon']?>" style="width: 3.5%; height: 3%;">
                 <input type="file" class="form-control" id="benefits4_icon" name="benefits4_icon">
            </div>  
        </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Benefits4 Title </label>
         <div class="col-lg-10">
          <input type="text" name="benefits4_title" class="form-control" value="<?=@$form_data['benefits4_title']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('benefits4_title')!=""){  echo  form_error('benefits4_title'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Benefits4 Text</label>
         <div class="col-lg-10">
          <textarea name="benefits4_text" id="benefits4_text" class="form-control"  rows="7"><?=@$form_data['benefits4_text']?></textarea>
          <script>
            CKEDITOR.replace('benefits4_text', {
              "filebrowserImageUploadUrl": "<?=site_url('webmaster/blog/ck_imageupload')?>"
            });
        </script>
          <span class="help-block text-danger">
                  <?php if(form_error('benefits4_text')!=""){  echo  form_error('benefits4_text'); } ?>
         </span>  
         </div>  
       </div>
       
       <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Benefits5 Icon</label>
            <div class="col-lg-10" style="display: inline-flex;">
             <img src="<?=base_url()?>uploads/shop/books/<?=$form_data['benefits5_icon']?>" style="width: 3.5%; height: 3%;">
                 <input type="file" class="form-control" id="benefits5_icon" name="benefits5_icon">
            </div>  
        </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Benefits5 Title </label>
         <div class="col-lg-10">
          <input type="text" name="benefits5_title" class="form-control" value="<?=@$form_data['benefits5_title']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('benefits5_title')!=""){  echo  form_error('benefits5_title'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Benefits5 Text</label>
         <div class="col-lg-10">
          <textarea name="benefits5_text" id="benefits5_text" class="form-control"  rows="7"><?=@$form_data['benefits5_text']?></textarea>
          <script>
            CKEDITOR.replace('benefits5_text', {
              "filebrowserImageUploadUrl": "<?=site_url('webmaster/blog/ck_imageupload')?>"
            });
        </script>
          <span class="help-block text-danger">
                  <?php if(form_error('benefits5_text')!=""){  echo  form_error('benefits5_text'); } ?>
         </span>  
         </div>  
       </div>
       
       
       <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Benefits6 Icon</label>
           <div class="col-lg-10" style="display: inline-flex;">
             <img src="<?=base_url()?>uploads/shop/books/<?=$form_data['benefits6_icon']?>" style="width: 3.5%; height: 3%;">
                 <input type="file"  class="form-control" id="benefits6_icon" name="benefits6_icon">
            </div>  
        </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Benefits6 Title </label>
         <div class="col-lg-10">
          <input type="text" name="benefits6_title" class="form-control" value="<?=@$form_data['benefits6_title']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('benefits6_title')!=""){  echo  form_error('benefits6_title'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Benefits6 Text</label>
         <div class="col-lg-10">
          <textarea name="benefits6_text" id="benefits6_text" class="form-control"  rows="7"><?=@$form_data['benefits6_text']?></textarea>
          <script>
            CKEDITOR.replace('benefits6_text', {
              "filebrowserImageUploadUrl": "<?=site_url('webmaster/blog/ck_imageupload')?>"
            });
        </script>
          <span class="help-block text-danger">
                  <?php if(form_error('benefits6_text')!=""){  echo  form_error('benefits6_text'); } ?>
         </span>  
         </div>  
       </div>
     <div class="hr-line-dashed"></div>
     <div class="form-group">
      <div class="col-sm-4 col-sm-offset-2">
       <a href="<?=site_url('webmaster/regionwise_gallery');?>" class="btn btn-white">Cancel</a>
       <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?>" name="btnsave">
     </div>
   </div>
 </form>
</div>
</div>
</div></div></div>
<? $this->load->view("webmaster/template/footer")?>
</div>
</div>
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
