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
          <h2>About Us List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage About Us</a></li>
            <li class="active"><strong>About Us</strong></li>
          </ol>
        </div>
    <div class="col-lg-4"><div class="title-action">
      <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/about_us')?>">Back to the list</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
    <div class="ibox-title">
      <h5><?=$btnCapt?> About us</h5>
      <div class="clearfix">&nbsp;</div>
    </div>
    <div class="ibox-content">
     <? if($this->session->flashdata('Error')){ ?>
     <div class="alert alert-danger alert-dismissable" align="center">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?=$this->session->flashdata('Error')?>
    </div>
    <? } ?>
    <form action="<?=site_url('webmaster/about_us/manage/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
      <?php if($userdata['desc1']!=''){ ?> 
      <div class="form-group">
       <label class="col-lg-2 control-label">&nbsp;Description 1</label>
       <div class="col-lg-10">
         <textarea name="desc1" class="form-control" row="18" id="desc1"><?=stripslashes($userdata['desc1'])?></textarea>
         <span class="help-block text-danger">
                  <?php if(form_error('desc1')!=""){  echo  form_error('desc1'); } ?>
         </span>  
       </div>  
     </div>
      <?php }   if($userdata['desc2']!=''){ ?> 
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Description 2 </label>
         <div class="col-lg-10">
         <textarea name="desc2" class="form-control" row="18" id="desc2"><?=stripslashes($userdata['desc2'])?></textarea>
         <span class="help-block text-danger">
                  <?php if(form_error('desc2')!=""){  echo  form_error('desc2'); } ?>
         </span>  
         </div>  
       </div>
      <?php }   if($userdata['image1']!=''){ ?> 
       <div class="form-group"><label class="col-lg-2 control-label">Image 1</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="image1" id="image1" > 
             <input type="hidden" name="old_image1" id="old_image1"  value="<?=@$userdata['image1']?>" <? if($id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (266 X 311)<span>
            </div>
          </div>
        </div>

        <?php if(@$userdata['image1']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Old Image3</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_image1" id="old_image1"  value="<?=@$userdata['image1']?>"> 
            <img src="<?=base_url()?>uploads/about_us/<?=$userdata['image1']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } ?>
        <?php }   if($userdata['image2']!=''){ ?> 
        <div class="form-group"><label class="col-lg-2 control-label">Image 2</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="image2" id="image2" > 
             <input type="hidden" name="old_image2" id="old_image2"  value="<?=@$userdata['image2']?>" <? if($id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (266 X 311)<span>
            </div>
          </div>
        </div>

        <?php if(@$userdata['image2']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Old Image3</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_image2" id="old_image2"  value="<?=@$userdata['image2']?>"> 
            <img src="<?=base_url()?>uploads/about_us/<?=$userdata['image2']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } ?>
        <?php }   if($userdata['image3']!=''){ ?> 
        <div class="form-group"><label class="col-lg-2 control-label">Image 3</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="image3" id="image3" > 
             <input type="hidden" name="old_image3" id="old_image3"  value="<?=@$userdata['image3']?>" <? if($id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (266 X 311)<span>
            </div>
          </div>
        </div>

        <?php if(@$userdata['image3']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Old Image3</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_image3" id="old_image3"  value="<?=@$userdata['image3']?>"> 
            <img src="<?=base_url()?>uploads/about_us/<?=$userdata['image3']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } ?>
      <?php }   if($userdata['image4']!=''){ ?> 
        <div class="form-group"><label class="col-lg-2 control-label">Image 4</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="image4" id="image4" > 
             <input type="hidden" name="old_image4" id="old_image4"  value="<?=@$userdata['image4']?>" <? if($id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (266 X 311)<span>
            </div>
          </div>
        </div>

        <?php if(@$userdata['image4']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Old Image4</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_image4" id="old_image4"  value="<?=@$userdata['image4']?>"> 
            <img src="<?=base_url()?>uploads/about_us/<?=$userdata['image4']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } } ?>


        

     <div class="hr-line-dashed"></div>
     <div class="form-group">
      <div class="col-sm-4 col-sm-offset-2">
       <a href="<?=site_url('webmaster/about_us');?>" class="btn btn-white">Cancel</a>
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
