<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('webmaster/template/head'); ?>
</head>
<body class="gray-bg login_page">

  <div class="middle-box text-center loginscreen animated fadeInDown">
    <div class="login-box">
      <div align="center"><h2 class="logo-name">
        <?php if($site_Logo!=''){?>
        <img class="img-responsive img-center" src="<?=base_url()?>uploads/sitelogo/<?=$site_Logo?>" alt="<?=SITENAME?>">
        <?php }else{?> <?=SITENAME?><?php }?>
      </h2></div>
      <h3>Welcome to <?=SITEADMINNAME?></h3>
      
      <?php if($this->session->flashdata('Error')){?>
      <div class="alert alert-danger alert-dismissable" align="center">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button><?=$this->session->flashdata('Error')?>
      </div>
      <?php }?>
      <form class="m-t" role="form" action="<?=site_url('webmaster/login')?>" name="login" method="post">
        <input type="hidden" name="posted" value="1" />
        <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="Username" required="" value="<?php if($this->input->post('username')) echo $this->input->post('username'); ?>" >
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" required="" >
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
    <?php /*?><a href="#"> <small>Forgot password?</small> </a>
    <p class="text-muted text-center"> <small>Do not have an account?</small> </p>
    <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a><?php */?>
  </form>
  <p class="m-t"> <small><?=SITENAME?> &copy; <?=date('Y')?></small> </p>
</div>
</div>
<?php $this->load->view('webmaster/template/footer'); ?>
</body>
</html>
