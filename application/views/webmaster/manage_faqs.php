<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
  <!--<link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script> -->
  <link href="<?=base_url()?>webmaster_assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
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
          <h2>FAQs List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage FAQs</a></li>
            <li class="active"><strong><?=$btnCapt?> FAQ</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/faqs')?>">Back to the list</a>
          </div>
        </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
          <h5><?=$btnCapt?> FAQ</h5>
         <div class="clearfix">&nbsp;</div>
        </div>
         <div class="ibox-content">
          <form action="<?=site_url('webmaster/faqs/manage/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
              <input type="hidden" name="mode" value="<?=$btnCapt?>" />
          <div class="form-group">
             <label class="col-lg-2 control-label"> Question </label>
             <div class="col-lg-10">                     
               <textarea name="content_title" id="content_title" class="form-control" ><?php if(@$dataDs['content_title']!=""){ echo $dataDs['content_title'];}else{ echo set_value('content_title');  } ?></textarea>
                <span class="help-block text-danger">
                  <?php if(form_error('content_title')!=""){  echo  form_error('content_title'); } ?>
                </span>  
              </div>
          </div>
          <div class="form-group">
             <label class="col-lg-2 control-label"> Answer</label>
             <div class="col-lg-10">                     
               <textarea name="content_body" id="content_body" class="form-control" ><?php if(@$dataDs['content_body']!=""){ echo $dataDs['content_body'];}else{ echo set_value('content_body');  } ?></textarea>
                <span class="help-block text-danger">
                  <?php if(form_error('content_body')!=""){  echo  form_error('content_body'); } ?>
                </span>  
              </div>
          </div>
          
          <div class="hr-line-dashed"></div>
          <div class="form-group">
          <div class="col-sm-4 col-sm-offset-2">
          <a href="<?=site_url('webmaster/user');?>" class="btn btn-white">Cancel</a>
          <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> FAQ" name="btnsave">
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
        <!-- <script src="<?=base_url()?>webmaster_assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(document).ready(function () {
          $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
          });
        });
       </script>-->

   <!-- Data picker -->
       <script src="<?=base_url()?>webmaster_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
       <script type="text/javascript">
      $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
       </script>
       <script type="text/javascript">
        function isFeature(str){
          if(str=='1'){
               $("#data_1").show();
          }else if(str=='0'){
               $("#data_1").hide();
          }else{
               $("#data_1").hide();
          }
       }
       </script>
      </body>
     </html>