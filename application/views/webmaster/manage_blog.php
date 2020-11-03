<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
  <link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
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
          <h2>Blog List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Blog</a></li>
            <li class="active"><strong><?=$btnCapt?> Blog</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/blog')?>">Back to the list</a>
          </div>
        </div>
      </div>
	    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
    			<h5><?=$btnCapt?> Blog</h5>
    		 <div class="clearfix">&nbsp;</div>
    		</div>
         <div class="ibox-content">
           <? if($this->session->flashdata('Error')){?>
          <div class="alert alert-danger alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Error')?>
          </div>
          <? } ?>
          <form action="<?=site_url('webmaster/blog/manage_blog/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Title</label>
             <div class="col-lg-10">
                <input type="text" name="blog_title" id="blog_title" class="form-control" value="<?php if(@$dataDs['blog_title']!=""){ echo $dataDs['blog_title'];}else{ echo set_value('blog_title');  } ?>" />
                <span class="help-block text-danger">
                  <?php if(form_error('blog_title')!=""){  echo  form_error('blog_title'); } ?>
                </span>  
              </div>  
          </div>

           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Filter</label>
             <div class="col-lg-10">
                 <select name="cat_id[]" id="cat_id" class="form-control"  multiple="multiple" required>
                  <option value="">Select Filters</option>
                  <?=$catFilter?>
                </select>
                   <span class="help-block text-danger">
                  <?php if(form_error('cat_id')!=""){  echo  form_error('cat_id'); } ?>
                </span>  
              </div>  
          </div>
         
         <div class="form-group">
             <label class="col-lg-2 control-label">Short description </label>
              <div class="col-lg-10">
				        <textarea name="short_description" id="short_description"  class="form-control"><?php if(@$dataDs['short_description']!=""){ echo $dataDs['short_description'];}else{ echo set_value('short_description');  } ?></textarea> 
                 <span class="help-block text-danger">
                  <?php if(form_error('short_description')!=""){  echo  form_error('short_description'); } ?>
                </span> 
              </div>
           </div>

         

            <div class="form-group">
             <label class="col-lg-2 control-label">Long Description</label>
              <div class="col-lg-10">
                <textarea name="long_description" id="long_description"  ><?php if(@$dataDs['long_description']!=""){ echo $dataDs['long_description'];}else{ echo set_value('long_description');  } ?></textarea> 
                 <script>
                  CKEDITOR.replace('long_description', {
                    "filebrowserImageUploadUrl": "<?=site_url('webmaster/blog/ck_imageupload')?>"
                  });
                  </script>
                 <span class="help-block text-danger">
                  <?php if(form_error('long_description')!=""){  echo  form_error('long_description'); } ?>
                </span> 
                 
              </div>
           </div>
           
            <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Author</label>
             <div class="col-lg-10">
                <input type="text" name="added_by" id="added_by" class="form-control" value="<?php if(@$dataDs['added_by']!=""){ echo $dataDs['added_by'];}else{ echo set_value('added_by');  } ?>" />
                <span class="help-block text-danger">
                  <?php if(form_error('added_by')!=""){  echo  form_error('added_by'); } ?>
                </span>  
              </div>  
          </div>
         
           <div class="form-group" id="data_1">
             <label class="col-lg-2 control-label">Date </label>
              <div class="col-lg-10">
                   <div class="input-group date">
                     <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                     <input type="text" name="added_date" id="added_date" class="form-control" value="<?php if(@$dataDs['added_date']!=""){ echo $dataDs['added_date'];}else{ echo set_value('added_date');  } ?>" />
                  </div>
                 <span class="help-block text-danger">
                  <?php if(form_error('added_date')!=""){  echo  form_error('added_date'); } ?>
                </span> 
              </div>
           </div>
          
           <div class="form-group">
             <label class="col-lg-2 control-label">Image</label>
              <div class="col-lg-10">
                 <input type="file" name="blog_image" id="blog_image" > 
                  <span class="help-block text-danger">
                  <?php if(form_error('blog_image')!=""){  echo  form_error('blog_image'); } ?>
                </span> 
              </div>
           </div>
           <? if(@$dataDs['blog_image']!='' && $id>0){ ?>
            <div class="form-group">
             <label class="col-lg-2 control-label">Already Added Image</label>
              <div class="col-lg-10">
                 <input type="hidden" name="old_blog_image" id="old_blog_image" value="<?=$dataDs['blog_image']?>"> 
                  <img src="<?=base_url()?>uploads/blog/<?=$dataDs['blog_image']?>" width="30%" class="image-responsive">
              </div>
           </div>  
           <? } ?>


            <div class="form-group">
             <label class="col-lg-2 control-label">Detail Page Image</label>
              <div class="col-lg-10">
                 <input type="file" name="blog_detail_image" id="blog_detail_image" <?php if($id==0){ ?> required <?php } ?> > 
                  <span class="help-block text-danger">
                  <?php if(form_error('blog_detail_image')!=""){  echo  form_error('blog_detail_image'); } ?>
                </span> 
                <span style="font-size:10px;color:gray;">Image Size (1189 X 448)</span>
              
              </div>
           </div>
           <? if(@$dataDs['blog_detail_image']!='' && $id>0){ ?>
            <div class="form-group">
             <label class="col-lg-2 control-label">Already Added Image</label>
              <div class="col-lg-10">
                 <input type="hidden" name="old_blog_detail_image" id="old_blog_detail_image" value="<?=$dataDs['blog_detail_image']?>"> 
                  <img src="<?=base_url()?>uploads/blog/<?=$dataDs['blog_detail_image']?>" width="30%" class="image-responsive">
              </div>
           </div>  
           <? } ?>


          <div class="form-group"><label class="col-lg-2 control-label">IS featured ?</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                <label><input type="radio" value="1" name="is_feature" id="is_feature1" 
                  <? if(@$dataDs['is_feature']=='1'){ ?> checked="checked" <? } if(set_value('is_feature')=='1'){  ?> checked="checked" <? } ?>><i></i> Yes </label>
                <label><input type="radio" value="0" name="is_feature" id="is_feature0" <? if(@$dataDs['is_feature']=='0'){  ?> checked="checked" <? } if(set_value('is_feature')=='0'){  ?> checked="checked" <? } ?>  ><i></i> No </label>
                <span class="help-block text-danger">
                  <?php if(form_error('is_feature')!=""){  echo  form_error('is_feature'); } ?>
                </span> 
              </div>
            </div>
          </div>

          <div class="form-group"><label class="col-lg-2 control-label">Want to display this on Home Page?</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                <label><input type="radio" value="1" name="show_home_page" id="show_home_page1" 
                  <? if(@$dataDs['show_home_page']=='1'){ ?> checked="checked" <? } if(set_value('show_home_page')=='1'){  ?> checked="checked" <? } ?>><i></i> Yes </label>
                <label><input type="radio" value="0" name="show_home_page" id="show_home_page0" <? if(@$dataDs['show_home_page']=='0'){  ?> checked="checked" <? } if(set_value('show_home_page')=='0'){  ?> checked="checked" <? } ?>  ><i></i> No </label>
                <span class="help-block text-danger">
                  <?php if(form_error('show_home_page')!=""){  echo  form_error('show_home_page'); } ?>
                </span> 
              </div>
            </div>
          </div>


          <div class="form-group"><label class="col-lg-2 control-label">Featured Artist Article?</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                <label><input type="radio" value="1" name="is_featured_artist_artical" id="is_featured_artist_artical" 
                  <? if(@$dataDs['is_featured_artist_artical']=='1'){ ?> checked="checked" <? } if(set_value('is_featured_artist_artical')=='1'){  ?> checked="checked" <? } ?>><i></i> Yes </label>
                <label><input type="radio" value="0" name="is_featured_artist_artical" id="is_featured_artist_artical0" <? if(@$dataDs['is_featured_artist_artical']=='0'){  ?> checked="checked" <? } if(set_value('is_featured_artist_artical')=='0'){  ?> checked="checked" <? } ?>  ><i></i> No </label>
                <span class="help-block text-danger">
                  <?php if(form_error('is_featured_artist_artical')!=""){  echo  form_error('is_featured_artist_artical'); } ?>
                </span> 
              </div>
            </div>
          </div>

           <div class="hr-line-dashed"></div>
                      <div class="form-group">
					  <div class="col-sm-4 col-sm-offset-2">
                         <a href="<?=site_url('webmaster/blog');?>" class="btn btn-white">Cancel</a>
                              <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> blog" name="btnsave">
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
         <script src="<?=base_url()?>webmaster_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
         <!-- iCheck -->
        <script src="<?=base_url()?>webmaster_assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(document).ready(function () {
          $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
          });
        });

        $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
        });
        </script>
      </body>
</html>