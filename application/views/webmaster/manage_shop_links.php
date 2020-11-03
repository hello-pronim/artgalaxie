<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('webmaster/template/head'); ?>
    <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
</head>
<body >
    <div id="wrapper">
    <!--- Nav start -->
    <?php $this->load->view('webmaster/template/left_nav'); ?>
    <!--- Nav end -->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <?php $this->load->view('webmaster/template/top'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>Shop Links List</h2>
                <ol class="breadcrumb">
                    <li><a href="<?=site_url('dashboard')?>">Settings</a></li>
                    <li><a>Manage Shop Links</a></li>
                    <li class="active"><strong><?=$btnCapt?> Shop Link</strong></li>
                </ol>
            </div>
            <div class="col-lg-4"><div class="title-action">
                <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/shop_links')?>">Back to the list</a>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5><?=$btnCapt?> Shop Link</h5>
                <div class="clearfix">&nbsp;</div>
            </div>
        <div class="ibox-content">
            <form action="<?=site_url('webmaster/shop_links/manage/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
                <input type="hidden" name="mode" value="<?=$btnCapt?>" />
                <div class="form-group">
                    <label class="col-lg-2 control-label">&nbsp;Link of </label>
                    <div class="col-lg-10">
                        <input type="text" name="link_for" id="link_for" class="form-control" value="<?php if(@$dataDs['link_for']!=""){ echo $dataDs['link_for'];} ?>" required/>
                        <span class="help-block text-danger">
                        <?php if(form_error('link_for')!=""){ echo form_error('link_for'); } ?>
                        </span>
                    </div>  
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Link</label>
                    <div class="col-lg-10">
                        <input type="text" name="link" class="form-control" id="link" value="<?php if(@$dataDs['link']!=""){ echo $dataDs['link'];}?>" required/>                  
                        <span class="help-block text-danger">
                        <?php if(form_error('link')!=""){ echo form_error('link'); } ?>
                        </span>   
                    </div>
                </div>

                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <a href="<?=site_url('webmaster/shop_links');?>" class="btn btn-white">Cancel</a>
                        <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?>" name="btnsave">
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div></div></div>
    <?php $this->load->view("webmaster/template/footer")?>
    </div>
    </div>
        <?php $this->load->view('webmaster/template/bot_script'); ?>
    </body>
</html>