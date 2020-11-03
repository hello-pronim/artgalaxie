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
        <h2>Blog Page Images List</h2>
        <ol class="breadcrumb">
          <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
          <li><a>Manage Content</a></li>
          <li class="active"><strong><?=$btnCapt?> Blog Page Images</strong></li>
        </ol>
      </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
      <div class="ibox-title">
       <h5><?=$btnCapt?> Blog Page Images</h5>
       <div class="clearfix">&nbsp;</div>
     </div>
     <div class="ibox-content">
      <form action="<?=site_url('webmaster/blog/blog_images/')?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
        <input type="hidden" name="mode" id="mode" value="1" >
     


    <div class="form-group">
     <label class="col-lg-2 control-label">Image 1</label>
     <div class="col-lg-10">
      <input type="file" value="" name="image1" class="" id="photo"  >
    </div>
   </div>
 
    <div class="form-group">
     <label class="col-lg-2 control-label">Already Added Image</label>
     <div class="col-lg-10">
       <input type="hidden" name="old_image1" id="old_image1" value="<?=$dataDs['image1']?>"> 
       <img src="<?=base_url()?>uploads/blog/<?=$dataDs['image1']?>" width="30%" class="image-responsive">
     </div>
   </div>  
   


  <div class="form-group">
     <label class="col-lg-2 control-label">Image 2</label>
     <div class="col-lg-10">
      <input type="file" value="" name="image2" class="" id="photo"  >
    </div>
   </div>

  
  <div class="form-group">
   <label class="col-lg-2 control-label">Already Added Image</label>
   <div class="col-lg-10">
     <input type="hidden" name="old_image2" id="old_image2" value="<?=$dataDs['image2']?>"> 
     <img src="<?=base_url()?>uploads/blog/<?=$dataDs['image2']?>" width="30%" class="image-responsive">
   </div>
 </div>  


 <div class="form-group">
     <label class="col-lg-2 control-label">Image 3</label>
     <div class="col-lg-10">
      <input type="file" value="" name="image3" class="" id="photo"  >
    </div>
   </div>

  
  <div class="form-group">
   <label class="col-lg-2 control-label">Already Added Image </label>
   <div class="col-lg-10">
     <input type="hidden" name="old_image3" id="old_image3" value="<?=$dataDs['image3']?>"> 
     <img src="<?=base_url()?>uploads/blog/<?=$dataDs['image3']?>" width="30%" class="image-responsive">
   </div>
 </div>  
 
 <div class="hr-line-dashed"></div>
 <div class="form-group">
   <div class="col-sm-4 col-sm-offset-2">
     <a href="<?=site_url('webmaster/blog/blog_images');?>" class="btn btn-white">Cancel</a>
     <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Images" name="btnsave">
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