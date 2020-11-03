<!DOCTYPE html>
<html>
<head>
<? $this->load->view('webmaster/template/head'); ?>
</head>
<body class="top-navigation">
<div id="wrapper">
<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom white-bg">
    <? $this->load->view('webmaster/template/navbar'); ?>
</div>
<div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                     <div class="ibox-content">
                      <div class="text-center m-t-lg">              
                        <div class="row">
                          <div class="col-lg-12">
                            <div align="center">
                            <p> <strong><a href="<?=site_url("webmaster/Databasebackup/start_backup");?>">Click Here To take database backup <?=$act_id?><?=$sub_act_id?></a></strong></p>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            </div>
             </div>
            </div>
            </div>
            <? $this->load->view('webmaster/template/footer'); ?>
            </div>
            </div>
<? $this->load->view('webmaster/template/bot_script'); ?>
</body>
</html>
