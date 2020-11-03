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
          <h2>Intro Text</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Blog</a></li>
            <li class="active"><strong>Intro Text</strong></li>
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
    			<h5>Intro Text</h5>
    		 <div class="clearfix">&nbsp;</div>
    		</div>
         <div class="ibox-content">
           <? if($this->session->flashdata('Error')){?>
          <div class="alert alert-danger alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Error')?>
          </div>
          <? } ?>
          <form action="<?=site_url('webmaster/art_of_giving/manage_introtext/'.$list_intro->id)?>" method="post"  name="frm" id="frm" class="form-horizontal">
          
            
            
                    <div class="form-group">
                     
                      <div class="col-lg-12">
                        <textarea name="long_description" id="long_description"><?php echo $list_intro->introtext; ?></textarea> 
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
                    <div class="col-sm-4 col-sm-offset-0">
                          <input type="submit" class="btn btn-primary" id="btnsave" value="Save" name="btnsave">
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