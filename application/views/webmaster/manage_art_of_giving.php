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
          <h2>Art Of Giving</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Art Of Giving</a></li>
            <li class="active"><strong>Art Of Giving</strong></li>
          </ol>
        </div>
    <div class="col-lg-4"><div class="title-action">
      <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_of_giving')?>">Back to the list</a>
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
    <form action="<?=site_url('webmaster/art_of_giving/manage_art_of_giving/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
      
      <div class="form-group">
       <label class="col-lg-2 control-label">&nbsp;Art Title</label>
       <div class="col-lg-10">
         <input type="text" name="art_title" class="form-control" value="<?=$form_data['art_title']?>"/>
        <span class="help-block text-danger">
                  <?php if(form_error('art_title')!=""){  echo  form_error('art_title'); } ?>
        </span>  
       </div>  
     </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Art Text</label>
         <div class="col-lg-10">
          <textarea name="art_text" id="art_text" class="form-control"  rows="7"><?=@$form_data['art_text']?></textarea>
          <span class="help-block text-danger">
                  <?php if(form_error('art_text')!=""){  echo  form_error('art_text'); } ?>
         </span>  
         </div>  
       </div>

 <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Donate Title</label>
         <div class="col-lg-10">
           <input type="text" name="donate_title" class="form-control" value="<?=@$form_data['donate_title']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('donate_title')!=""){  echo  form_error('donate_title'); } ?>
         </span>  
         </div>  
       </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Donate Text</label>
         <div class="col-lg-10">
          <textarea name="donate_text" id="donate_text" class="form-control"  rows="7"><?=@$form_data['donate_text']?></textarea>
          <span class="help-block text-danger">
                  <?php if(form_error('donate_text')!=""){  echo  form_error('donate_text'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Donate Title2</label>
         <div class="col-lg-10">
           <input type="text" name="donate_title2" class="form-control" value="<?=@$form_data['donate_title2']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('donate_title2')!=""){  echo  form_error('donate_title2'); } ?>
         </span>  
         </div>  
       </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Donate Text2</label>
         <div class="col-lg-10">
          <textarea name="donate_text2" id="donate_text2" class="form-control"  rows="7"><?=@$form_data['donate_text2']?></textarea>
          <span class="help-block text-danger">
                  <?php if(form_error('donate_text2')!=""){  echo  form_error('donate_text2'); } ?>
         </span>  
         </div>  
       </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Artist Title </label>
         <div class="col-lg-10">
          <input type="text" name="artist_title" class="form-control" value="<?=@$form_data['artist_title']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('artist_title')!=""){  echo  form_error('artist_title'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Artist Text</label>
         <div class="col-lg-10">
          <textarea name="artist_text" id="artist_text" class="form-control"  rows="7"><?=@$form_data['artist_text']?></textarea>
          <span class="help-block text-danger">
                  <?php if(form_error('artist_text')!=""){  echo  form_error('artist_text'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Comp Title </label>
         <div class="col-lg-10">
          <input type="text" name="comp_title" class="form-control" value="<?=@$form_data['comp_title']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('comp_title')!=""){  echo  form_error('comp_title'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Comp Text</label>
         <div class="col-lg-10">
          <textarea name="comp_text" id="comp_text" class="form-control"  rows="7"><?=@$form_data['comp_text']?></textarea>
          <span class="help-block text-danger">
                  <?php if(form_error('comp_text')!=""){  echo  form_error('comp_text'); } ?>
         </span>  
         </div>  
       </div>
          <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Affilate Programme Title </label>
         <div class="col-lg-10">
          <input type="text" name="affilate_title" class="form-control" value="<?=@$form_data['affilate_title']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('affilate_title')!=""){  echo  form_error('affilate_title'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Affilate Programme Text</label>
         <div class="col-lg-10">
          <textarea name="affilate_text" id="affilate_text" class="form-control"  rows="7"><?=@$form_data['affilate_text']?></textarea>
          <span class="help-block text-danger">
                  <?php if(form_error('affilate_text')!=""){  echo  form_error('affilate_text'); } ?>
         </span>  
         </div>  
       </div>
        <div class="form-group"><label class="col-lg-2 control-label">Banner Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="banner_image" id="banner_image" > 
             <input type="hidden" name="old_banner_image" id="old_banner_image"  value="<?=@$form_data['banner_image']?>" <? if($id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (1920 X 747)<span>
            </div>
          </div>
        </div>
        
<!--
        <?php if(@$form_data['banner_image']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Old Banner Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_banner_image" id="old_banner_image"  value="<?=@$form_data['banner_image']?>"> 
            <img src="<?=base_url()?>uploads/art_of_giving/<?=$form_data['banner_image']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } ?>
-->

        <div class="form-group"><label class="col-lg-2 control-label">Second Banner</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="banner2" id="banner2" > 
             <input type="hidden" name="old_banner2" id="old_banner2"  value="<?=@$form_data['banner2']?>" <? if($id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (1920 X 747)<span>
            </div>
          </div>
        </div>

        <?php if(@$form_data['banner2']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Second Banner Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_banner2" id="old_banner2"  value="<?=@$form_data['banner2']?>"> 
            <img src="<?=base_url()?>uploads/art_of_giving/<?=$form_data['banner2']?>" class="img-responsive">
            </div>
          </div>
        </div><?php } ?>
        <div class="form-group"><label class="col-lg-2 control-label">Banner3 Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="banner3" id="banner3" > 
             <input type="hidden" name="old_banner3" id="old_banner3"  value="<?=@$form_data['banner3']?>" <? if($id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (1920 X 747)<span>
            </div>
          </div>
        </div>
        
        <?php if(@$form_data['banner3']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Banner3  Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_banner3" id="old_banner3"  value="<?=@$form_data['banner3']?>"> 
            <img src="<?=base_url()?>uploads/art_of_giving/<?=$form_data['banner3']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } ?>


        

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
