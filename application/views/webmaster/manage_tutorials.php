<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
  <link href="<?=base_url()?>webmaster_assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
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
        <h2>Tutorials List</h2>
        <ol class="breadcrumb">
          <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
          <li><a>Manage Content</a></li>
          <li class="active"><strong><?=$btnCapt?> Tutorials</strong></li>
        </ol>
      </div>
      <div class="col-lg-4"><div class="title-action">
        <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/tutorials')?>">Back to the list</a>
      </div>
    </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
      <div class="ibox-title">
       <h5><?=$btnCapt?> Tutorials</h5>
       <div class="clearfix">&nbsp;</div>
     </div>
     <div class="ibox-content">
      <form action="<?=site_url('webmaster/tutorials/manage/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Title</label>
         <div class="col-lg-10">
          <input type="text" name="title" id="title" class="form-control" value="<?php if(@$dataDs['title']!=""){ echo $dataDs['title'];}else{ echo set_value('title');  } ?>" />
          <span class="help-block text-danger">
            <?php if(form_error('title')!=""){  echo  form_error('title'); } ?>
          </span>  
        </div>  
      </div>

      <div class="form-group">
       <label class="col-lg-2 control-label">Long Description </label>
       <div class="col-lg-10">
        <textarea name="description" id="description"  class="form-control" rows="10"  ><?php if(@$dataDs['description']!=""){ 
          echo $dataDs['description'];}else{ echo set_value('description');  } ?></textarea> 
         <script>
            CKEDITOR.replace('description', {
              "filebrowserImageUploadUrl": "<?=site_url('webmaster/blog/ck_imageupload')?>"
            });
        </script>
        <span class="help-block text-danger">
          <?php if(form_error('description')!=""){  echo  form_error('description'); } ?>
        </span> 
      </div>
    </div>

    <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Duration Hour</label>
         <div class="col-lg-10">
          <input type="text" name="duration_hour" id="duration_hour" class="form-control" value="<?php if(@$dataDs['duration_hour']!=""){ echo $dataDs['duration_hour'];}else{ echo set_value('duration_hour');  } ?>" />
          <span class="help-block text-danger">
            <?php if(form_error('duration_hour')!=""){  echo  form_error('duration_hour'); } ?>
          </span>  
        </div>  
      </div>

       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Duration Min</label>
         <div class="col-lg-10">
          <input type="text" name="duration_min" id="duration_min" class="form-control" value="<?php if(@$dataDs['duration_min']!=""){ echo $dataDs['duration_min'];}else{ echo set_value('duration_min');  } ?>" />
          <span class="help-block text-danger">
            <?php if(form_error('duration_min')!=""){  echo  form_error('duration_min'); } ?>
          </span>  
        </div>  
      </div>

       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Duration Sec</label>
         <div class="col-lg-10">
          <input type="text" name="duration_sec" id="duration_sec" class="form-control" value="<?php if(@$dataDs['duration_sec']!=""){ echo $dataDs['duration_sec'];}else{ echo set_value('duration_sec');  } ?>" />
          <span class="help-block text-danger">
            <?php if(form_error('duration_sec')!=""){  echo  form_error('duration_sec'); } ?>
          </span>  
        </div>  
      </div>

    <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Price</label>
         <div class="col-lg-10">
          <input type="text" name="price" id="price" class="form-control" value="<?php if(@$dataDs['price']!=""){ echo $dataDs['price'];}else{ echo set_value('price');  } ?>" />
          <span class="help-block text-danger">
            <?php if(form_error('price')!=""){  echo  form_error('price'); } ?>
          </span>  
        </div>  
      </div>

    <div class="form-group">
       <label class="col-lg-2 control-label">Buttons</label>
       <div class="col-lg-10">
        <select name="tut_cat[]" id="tut_cat"  class="form-control" multiple>
          <option value=""> Select Buttons</option>
          <?php
           $ArrayButtons = @explode(',',@$dataDs['tut_cat']);
           foreach ($tutButton as $tutButtonRs) { ?>
            <option value="<?=stripcslashes($tutButtonRs['id'])?>" <?php if(in_array($tutButtonRs['id'],$ArrayButtons,true)){ ?> selected="selected" <?php } ?>><?=stripcslashes($tutButtonRs['cat_name'])?></option>
          <?php } ?>
        </select>
         
      </div>
    </div>

     <div class="form-group">
       <label class="col-lg-2 control-label">Art Categories</label>
       <div class="col-lg-10">
        <select name="art_cat[]" id="art_cat"  class="form-control" multiple>
          <option value=""> Select Buttons</option>
          <?php 
            $arrayCat = @explode(',',@$dataDs['art_cat']);
            foreach ($artCats as $artCatsRs) { ?>
            <option value="<?=stripcslashes($artCatsRs['cat_id'])?>" <?php if(in_array($artCatsRs['cat_id'],$arrayCat,true)){ ?> selected="selected" <?php } ?>><?=stripcslashes($artCatsRs['cat_name'])?></option>
          <?php } ?>
        </select>
         
      </div>
    </div>

    <div class="form-group">
     <label class="col-lg-2 control-label">Image</label>
     <div class="col-lg-10">
      <input type="file"   name="tutorials_images[]" class="" id="tutorials_images" <? if($id==0){ ?> required <? } ?> multiple="multiple">
    </div>
  </div>

  <? if( !empty($tutorialsImagesDs) &&  $id>0){ ?>
  <div class="form-group">
   <label class="col-lg-2 control-label">Already Added Image</label>
   <div class="col-lg-10"> &nbsp;
      
   </div>
 </div>  
  <?php  
  foreach ($tutorialsImagesDs as $tutorialsImagesRs) { ?>
      <div class="form-group" id="img_<?=$tutorialsImagesRs['id']?>">
       <label class="col-lg-2 control-label">&nbsp;</label>
       <div class="col-lg-10">
         <input type="hidden" name="tutorials_images[]" id="tutorials_image" value="<?=$tutorialsImagesRs['id']?>"> 
         <img src="<?=base_url()?>uploads/tutorials/<?=$tutorialsImagesRs['tut_image']?>" width="30%" class="image-responsive"> &nbsp;
         <a onClick="javascript:removeTutoImage(<?=$tutorialsImagesRs['id']?>)">Remove</a>
       </div>
     </div>  
    <?php  } ?> <?php } ?>
        <div class="form-group">
       <label class="col-lg-2 control-label">Buy Button Code </label>
       <div class="col-lg-10" id="">
        <textarea style="border-color:black;border-width:5px;" name="buy_button_code" id="buy_button_code"  class="form-control" rows="10"  ><?php if(@$dataDs['buy_button_code']!=""){ 
          echo $dataDs['buy_button_code'];}else{ echo set_value('buy_button_code');  } ?></textarea> 
        <span class="help-block text-danger">
          <?php if(form_error('buy_button_code')!=""){  echo  form_error('buy_button_code'); } ?>
        </span> 
      </div>
    </div>

 <div class="hr-line-dashed"></div>
 <div class="form-group">
   <div class="col-sm-4 col-sm-offset-2">
     <a href="<?=site_url('webmaster/tutorials');?>" class="btn btn-white">Cancel</a>
     <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Tutorials" name="btnsave">
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
<script type="text/javascript">
function removeTutoImage(str){

   jQuery.ajax({
              type: "POST",
              url:  "<?=base_url('webmaster/tutorials/removeImage')?>",
              data: {  id: str  },
              cache: false,
              success:  function(data)
              { 
                 if(data=='done')
                  {
                    $('#img_'+str).remove();
                  }else{
                    alert('Something went wrong. Please try again later.');
                  }
                  
            
              }
            });

}

</script>
</body>
</html>