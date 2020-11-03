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
        <h2>Art Marketing List</h2>
        <ol class="breadcrumb">
          <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
          <li><a>Manage Content</a></li>
          <li class="active"><strong><?=$btnCapt?> Art Marketing</strong></li>
        </ol>
      </div>
      <div class="col-lg-4"><div class="title-action">
        <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_marketing')?>">Back to the list</a>
      </div>
    </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
      <div class="ibox-title">
       <h5><?=$btnCapt?> Art Marketing</h5>
       <div class="clearfix">&nbsp;</div>
     </div>
     <div class="ibox-content">
       <form action="<?=site_url('webmaster/art_marketing/manage_art_marketing/'.$id.'/'.$parent_id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
       
      <? $value = ""; if(@$dataDs['page_title']!=""){  $value = "Upload"; ?>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Marketing Title</label>
         <div class="col-lg-10">
          <input type="text" name="page_title" id="page_title" class="form-control" value="<?php if(@$dataDs['page_title']!=""){ echo $dataDs['page_title'];}else{ echo set_value('page_title');  } ?>" />
          <span class="help-block text-danger">
            <?php if(form_error('page_title')!=""){  echo  form_error('page_title'); } ?>
          </span>  
        </div>  
      </div>
      <?php } if(@$dataDs['icone_image']!=""){  ?>
      <div class="form-group">
         <label class="col-lg-2 control-label">Icone Image</label>
         <div class="col-lg-10">
          <input type="file" value="" name="icone_image" class="" id="photo" <? if($id==0){ ?> required <? } ?>>
        </div>
       </div>
      <? if(@$dataDs['icone_image']!='' && $id>0){ ?>
      <div class="form-group">
       <label class="col-lg-2 control-label">Already Added Image</label>
       <div class="col-lg-10">
         <input type="hidden" name="old_icone_image" id="old_icone_image" value="<?=$dataDs['icone_image']?>"> 
         <img src="<?=base_url()?>uploads/art_marketing/<?=$dataDs['icone_image']?>" width="30%" class="image-responsive">
       </div>
     </div>  
     <div class="hr-line-dashed"></div>
     <? } } ?>
      
     <? if(@$dataDs['page_title']=="" && $id>0){ $value = "Upload";  ?>
     
      <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Header</label>
         <div class="col-lg-10">
          <input type="text" name="sub_title" id="sub_title" class="form-control" value="<?php if(@$dataDs['sub_title']!=""){ echo $dataDs['sub_title'];}else{ echo set_value('sub_title');  } ?>" />
          <span class="help-block text-danger">
            <?php if(form_error('sub_title')!=""){  echo  form_error('sub_title'); } ?>
          </span>  
        </div>  
      </div>
      <? if(@$dataDs['sub_sub_titile']!=""){  ?>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Sub header</label>
         <div class="col-lg-10">
         <textarea name="sub_sub_titile" id="sub_sub_titile"  class="form-control" rows="12"><?php if(@$dataDs['sub_sub_titile']!=""){ echo $dataDs['sub_sub_titile'];}else{ echo set_value('sub_sub_titile');  } ?></textarea> 
        <span class="help-block text-danger">
          <?php if(form_error('sub_sub_titile')!=""){  echo  form_error('sub_sub_titile'); } ?>
        </span> 
        </div>   
      </div>
      <?php } ?>
      <div class="form-group">
       <label class="col-lg-2 control-label">Description </label>
       <div class="col-lg-10">
        <textarea name="description" id="description"  class="form-control" rows="12"><?php if(@$dataDs['description']!=""){ echo $dataDs['description']; }else{ echo set_value('description');  } ?></textarea> 
        <span class="help-block text-danger">
          <?php if(form_error('description')!=""){  echo  form_error('description'); } ?>
        </span> 
      </div>
    </div>
   <div class="form-group">
     <label class="col-lg-2 control-label">Banner Image</label>
     <div class="col-lg-10">
      <input type="file" value="" name="banner_image" class="" id="photo" <? if($id==0){ ?> required <? } ?>>
    </div>
   </div>
<?php }  ?>


  <? if(@$dataDs['banner_image']!='' && $id>0){ ?>
  <div class="form-group">
   <label class="col-lg-2 control-label">Already Added Image</label>
   <div class="col-lg-10">
     <input type="hidden" name="old_banner_image" id="old_banner_image" value="<?=$dataDs['banner_image']?>"> 
     <img src="<?=base_url()?>uploads/art_marketing/<?=$dataDs['banner_image']?>" width="30%" class="image-responsive">
   </div>
 </div>  
 <? } ?>

 <div class="form-group">
   <div class="col-sm-4 col-sm-offset-2">
     <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$value?>" name="btnsave">
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
</body>
</html>