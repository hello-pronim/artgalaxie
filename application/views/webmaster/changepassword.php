<? $act_id='setting';?>
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
        <div class="col-lg-10">
            <h2>Change Admin Password</h2>
            <ol class="breadcrumb">
                <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
                <li><a>Settings</a></li>
                <li class="active"><strong>Change Admin Password</strong></li>
            </ol>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <div class="row border-bottom">
    <div class="ibox-content">
        <? if($this->session->flashdata('Success')){?>
            <div class="alert alert-success alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Success')?></div>
        <? }
        else if($this->session->flashdata('Error')){?>
            <div class="alert alert-danger alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Error')?></div>
        <? }?>
      
      <form class="form-horizontal" name="form1" method="post" action="<?=site_url("webmaster/changepassword")?>" onSubmit="javascript: return changepass_validate();">
        <input type="hidden" name="mode" value="change">
       <div class="form-group"><label class="col-sm-2 control-label">Username</label>
            <div class="col-sm-10"><input type="text" class="form-control" name="username" value="<?=$this->session->userdata('ADMIN_USER')?>" readonly=""></div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group"><label class="col-sm-2 control-label">Old Password</label>
            <div class="col-sm-10"><input type="password" name="opassword" class="form-control" required></div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group"><label class="col-sm-2 control-label">New Password</label>
            <div class="col-sm-10"><input type="password" name="npassword" class="form-control" required></div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group"><label class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-10"><input type="password" name="cpassword" class="form-control" required></div>
        </div>
        
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button type="reset" class="btn btn-white">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
      </form>
    </div>
    </div>


    <? $this->load->view("webmaster/template/footer")?>
  </div>
</div>
<? $this->load->view('webmaster/template/bot_script'); ?>
</body>
</html>
