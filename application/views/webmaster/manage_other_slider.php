<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
   <link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
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
          <h2>Slider List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Slider</a></li>
            <li class="active"><strong><?=$btnCapt?> Slider</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/home_content/sliders')?>">Back to the list</a>
          </div>
        </div>
      </div>
	    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
    			<h5><?=$btnCapt?> Slider</h5>
    		 <div class="clearfix">&nbsp;</div>
    		</div>
         <div class="ibox-content">
         <form action="<?=site_url('webmaster/home_content/manage/'.$banner_id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
          <input type="hidden" name="slider_mode" value="1" >
           <div class="form-group">
             <label class="col-lg-2 control-label">Image</label>
              <div class="col-lg-10">
                 <input type="file" name="banner_image" id="banner_image" <? if($banner_id==0){ ?> required  <? } ?> > 
                  <span class="help-block text-danger">
                  <?php if(form_error('banner_image')!=""){  echo  form_error('banner_image'); } ?>
                </span> 
              </div>
           </div>
           <div class="form-group">
             <label class="col-lg-2 control-label">Link</label>
              <div class="col-lg-10">
                 <input type="text" name="banner_text" id="banner_text" value="<?=@$dataDs['banner_text']?>" class="form-control"> 
                  <span class="help-block text-danger">
                  <?php if(form_error('banner_text')!=""){  echo  form_error('banner_text'); } ?>
                </span> 
                 
            
              </div>
           </div>
           <? if(@$dataDs['banner_image']!='' && $banner_id>0){ ?>
            <div class="form-group">
             <label class="col-lg-2 control-label">Already Added Image</label>
              <div class="col-lg-10">
                 <input type="hidden" name="old_banner_image" id="old_banner_image" value="<?=$dataDs['banner_image']?>"> 
                  <img src="<?=base_url()?>uploads/banner/<?=$dataDs['banner_image']?>" width="30%" class="image-responsive">
              </div>
           </div>  
           <? }   ?>
          <div class="form-group"><label class="col-lg-2 control-label">Status</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                <label><input type="radio" value="1" name="banner_status" id="banner_status1" 
                  <? if(@$dataDs['banner_status']==1){ ?> checked="checked" <? } ?> ><i></i> Show </label>
                <label><input type="radio" value="0" name="banner_status" id="banner_status0" <? if(@$dataDs['banner_status']==0){  ?> checked="checked" <? } ?>  ><i></i> Hide </label>
                <span class="help-block text-danger">
                  <?php if(form_error('banner_status')!=""){  echo  form_error('banner_status'); } ?>
                </span> 
              </div>
            </div>
          </div>
          <div class="form-group"><label class="col-lg-2 control-label">Location</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                <label><input type="radio" value="1" name="type" id="type1" 
                  <? if(@$dataDs['type']==1){ ?> checked="checked" <? } if(set_value('type')==1){  ?> checked="checked" <? } ?> ><i></i> Slider Two </label>
                <label><input type="radio" value="2" name="type" id="type2" <? if(@$dataDs['type']==2){  ?> checked="checked" <? }  ?>  ><i></i> Slider Three </label>
                <span class="help-block text-danger">
                  <?php if(form_error('type')!=""){  echo  form_error('type'); } ?>
                </span> 
              </div>
            </div>
          </div>
          <div class="form-group">
             <label class="col-lg-2 control-label">Order No</label>
              <div class="col-lg-10">
                 <input type="text" name="order_no" id="order_no" value="<?=@$dataDs['order_no']?>" > 
                  <span class="help-block text-danger">
                  <?php if(form_error('order_no')!=""){  echo  form_error('order_no'); } ?>
                </span> 
              </div>
           </div>
           <div class="hr-line-dashed"></div>
            <div class="form-group">
					  <div class="col-sm-4 col-sm-offset-2">
              <a href="<?=site_url('webmaster/home_content/sliders');?>" class="btn btn-white">Cancel</a>
              <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Slider" name="btnsave">
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