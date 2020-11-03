<? $act_id='CMS';?>
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
          <h2>User List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage User</a></li>
            <li class="active"><strong>User Details</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/user/index')?>">Back to the list</a>
          </div>
        </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
          <h5>User Details : <?=$userdata['first_name']." ".$userdata['last_name']?></h5>
          <div class="clearfix">&nbsp;</div>
        </div>
         <div class="ibox-content">
         <form action="<?=site_url('webmaster/user/manage_user/'.$userId)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
           <div class="form-group">
             <label class="col-lg-2 control-label">First Name</label>
             <div class="col-lg-10">
                <?php if($userdata['first_name']!=""){ echo $userdata['first_name'];}else{ echo "-";  } ?>
              </div>  
          </div>
          <div class="hr-line-dashed"></div>
          <div class="form-group">
             <label class="col-lg-2 control-label">Last Name </label>
             <div class="col-lg-10">                     
               <?php if($userdata['last_name']!=""){ echo $userdata['last_name'];}else{ echo "-";  } ?>
                
              </div>
          </div>
        <div class="hr-line-dashed"></div>
         <div class="form-group">
             <label class="col-lg-2 control-label">Username </label>
             <div class="col-lg-10">                     
                <?php if(@$userdata['username']!=""){ echo $userdata['username'];}else{ echo "-";  } ?>
               
              </div>
          </div>
          <div class="hr-line-dashed"></div>
          <div class="form-group">
             <label class="col-lg-2 control-label">Email Address </label>
             <div class="col-lg-10">                     
                <?php if(@$userdata['email_address']!=""){ echo $userdata['email_address'];}else{ echo "-";  } ?>
              </div>
          </div>
          <div class="hr-line-dashed"></div>
          <div class="form-group">
             <label class="col-lg-2 control-label">Address </label>
              <div class="col-lg-10">
                <?php if(@$userdata['address']!=""){ echo $userdata['address'];}else{ echo "-";  } ?>
              </div>
           </div>
          <div class="hr-line-dashed"></div>
            <div class="form-group">
             <label class="col-lg-2 control-label">Address  2</label>
              <div class="col-lg-10">
                <?php if(@$userdata['address2']!=""){ echo $userdata['last_name'];}else{ echo "-";  } ?>
              </div>
           </div>
           <div class="hr-line-dashed"></div>
            <div class="form-group">
             <label class="col-lg-2 control-label">City </label>
              <div class="col-lg-10">
              <?php if(@$userdata['city']!=""){ echo $userdata['city'];}else{ echo "-";  } ?>
              </div>
           </div>
           <div class="hr-line-dashed"></div>
            <div class="form-group">
             <label class="col-lg-2 control-label">State </label>
              <div class="col-lg-10">
                 <?php if(@$userdata['state']!=""){ echo $userdata['state'];}else{ echo "-";  } ?> 
              </div>
           </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
             <label class="col-lg-2 control-label">Zip Code </label>
              <div class="col-lg-10">
                 <?php if(@$userdata['zip']!=""){ echo $userdata['zip'];}else{ echo "-";  } ?>
              </div>
           </div>
          <div class="hr-line-dashed"></div>
            <div class="form-group">
             <label class="col-lg-2 control-label">Phone Number </label>
              <div class="col-lg-10">
              <?php if(@$userdata['phone']!=""){ echo $userdata['phone'];}else{ echo "-";  } ?>
              </div>
           </div> 
           <div class="hr-line-dashed"></div>
           <div class="form-group"><label class="col-lg-2 control-label">User Type</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                 <?php if(@$userdata['user_type']!=""){ echo ucwords($userdata['user_type']);}else{ echo "-";  } ?>
              </div>
            </div>
          </div>
          <div class="hr-line-dashed"></div>
           <div class="form-group"><label class="col-lg-2 control-label">Galleries</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                 <?php if(@$userdata['galleries_id']!=""){ echo ucwords($userdata['galName']);}else{ echo "-";  } ?>
              </div>
            </div>
          </div>
          <div class="hr-line-dashed"></div>
           <div class="form-group"><label class="col-lg-2 control-label">Style</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                 <?php if(@$userdata['style_id']!=""){ echo ucwords($userdata['styleName']);}else{ echo "-";  } ?>
              </div>
            </div>
          </div>

                      <div class="hr-line-dashed"></div>
                      <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                                     <a href="<?=site_url('webmaster/user');?>" class="btn btn-white">Back</a>
                                          
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