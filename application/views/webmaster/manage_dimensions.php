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
          <h2><?=ucfirst($btnCapt)?> Dimensions</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Attributes</a></li>
            <li class="active"><strong>Dimensions</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
          <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/product_attributes/dimensions_list')?>" >Back to the list</a>
        </div></div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <div class="ibox-content">
          <form action="<?=site_url('webmaster/product_attributes/manage_dimensions/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
              <input type="hidden" name="mode" value="<?=$btnCapt?>" />
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label class="control-label">Title</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="title" class="form-control" value="<?=$form_data['title']?>" required/>      
                    <span class="help-block text-danger">
                     <?php if(form_error('title')!=""){  echo  form_error('title'); } ?>
                    </span>                 
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label class="control-label">Height</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="height" class="form-control" value="<?=$form_data['height']?>" required/>      
                    <span class="help-block text-danger">
                     <?php if(form_error('height')!=""){  echo  form_error('height'); } ?>
                    </span> 
                                
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label class="control-label">Width</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="width" class="form-control" value="<?=$form_data['width']?>" required/>    
                    <span class="help-block text-danger">
                     <?php if(form_error('width')!=""){  echo  form_error('width'); } ?>
                    </span>                  
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-3">
                    <label class="control-label">Length</label>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" name="length" class="form-control" value="<?=$form_data['length']?>" required/>     
                    <span class="help-block text-danger">
                     <?php if(form_error('length')!=""){  echo  form_error('length'); } ?>
                    </span>                 
                  </div>
                </div>
              </div>
              <div class="form-group"><div class="col-sm-4 col-sm-offset-2">
                <div class="col-sm-9">
                  <a href="<?=site_url('webmaster/product_attributes/dimensions_list');?>" class="btn btn-white">Cancel</a>
                  <input type="submit" class="btn btn-primary" id="btnsave" value="<?=ucfirst($btnCapt)?>" name="btnsave">
                </div>
              </div>
            </div></form> 
        </div>
      </div>
    </div></div></div>
    <? $this->load->view("webmaster/template/footer")?>
  </div>
</div>
<!-- Mainly scripts -->
<? $this->load->view('webmaster/template/bot_script'); ?>

</body>
</html>