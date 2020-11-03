<?php $act_id='dashboard';?>
<!DOCTYPE html>
<html>
<head>
<?php $this->load->view('webmaster/template/head'); ?>
</head>
<body>
<div class="loader"></div>
<div id="wrapper">
<?php $this->load->view('webmaster/template/left_nav'); ?>
  <div id="page-wrapper" class="gray-bg dashbard-1">
    <?php $this->load->view('webmaster/template/top'); ?>
    <div class="row border-bottom">
       <div class="row">
        <div class="col-lg-12">
          <div class="text-center m-t-lg">
            <h1> Welcome to <?=SITEADMINNAME?> dashboard </h1>
            <div class="clearfix">&nbsp;</div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("webmaster/template/footer")?>
  </div>
</div>
<?php $this->load->view('webmaster/template/bot_script'); ?>
</body>
</html>