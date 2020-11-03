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
          <h2>Update Sections</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Update Sections</strong></li>
          </ol>
        </div>
        <div class="col-lg-4">&nbsp;</div>
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
          <form action="<?=site_url('webmaster/home_content/content/'.$pageid.'/'.$redirect)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
              <input type="hidden" name="mode" value="Update" />
              
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
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3"><label class="control-label">Description 2</label></div>
                <div class="col-sm-9">
                  <textarea   id="page_desc" required class="form-control"  rows="8" name="page_desc" ><?=$cmsData['page_desc'] ?>
                  </textarea>
                 </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label class="control-label">Descrioption 1 </label>
                </div>
                <div class="col-sm-9">   
                 <textarea name="meta_title" required class="form-control" rows="8"><?=$cmsData['meta_title']?></textarea> 
                </div>
              </div>
            </div>
           <? if($redirect==3){ ?>
           <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label class="control-label">Image 1 Title</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="meta_keyword" class="form-control" value="<?=$cmsData['meta_keyword']?>" required/>                     
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3"><label class="control-label">Image 1</label></div>
                <div class="col-sm-9">
                  <input type="file" name="meta_description" id="meta_description" />
                  <input type="hidden" name="old_image1" value="<?=$cmsData['meta_description']?>" /> 
                </div>
              </div>
            </div>
            <? if(isset($cmsData['meta_description']) && $cmsData['meta_description']!=''){?>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3"><label class="control-label">Existing Image 1</label></div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                  <img src="<?=base_url()?>uploads/page_image/<?=$cmsData['meta_description']?>" class="img-responsive" /><br>
                </div><div class="col-sm-6 col-md-6 col-lg-6"></div>
              </div>
            </div>
            <? } ?>
             <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label class="control-label">Image 2 Title</label>
                </div>
                <div class="col-sm-9">
                  <input type="text" name="page_url" class="form-control" value="<?=$cmsData['page_url']?>" required/>                     
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3"><label class="control-label">Image 2</label></div>
                <div class="col-sm-9">
                  <input type="file" name="page_image" id="page_image" />
                  <input type="hidden" name="old_image2" value="<?=$cmsData['page_image']?>" /> 
                </div>
              </div>
            </div>
            <? if(isset($cmsData['page_image']) && $cmsData['page_image']!=''){?>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3"><label class="control-label">Existing Image 2</label></div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                  <img src="<?=base_url()?>uploads/page_image/<?=$cmsData['page_image']?>" class="img-responsive" /><br>
                </div><div class="col-sm-6 col-md-6 col-lg-6"></div>
              </div>
            </div>

            <? }  }
               else{ ?>
              <input type="hidden" name="old_image2" value="<?=$cmsData['page_image']?>" style="display:none;" /> 
              <input type="hidden" name="old_image1" value="<?=$cmsData['meta_description']?>" style="display:none;" /> 
              <? } ?>
            <div class="hr-line-dashed"></div>
           <div class="form-group"><div class="col-sm-4 col-sm-offset-2">
            <div class="col-sm-9">
              <a href="<?=site_url('webmaster/manage_cms/page_list');?>" class="btn btn-white">Cancel</a>
              <input type="submit" class="btn btn-primary" id="btnsave" value="Update" name="btnsave">
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
</body>
</html>