<? $act_id='setting';?>
<!DOCTYPE html>
<html>
<head>
    <? $this->load->view('webmaster/template/head'); ?>

</head>
<body >
    <div id="wrapper">
        <? $this->load->view('webmaster/template/left_nav'); ?>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <? $this->load->view('webmaster/template/top'); ?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Manage Website Logo</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?=site_url('webmaster/dashboard')?>">Dashboard</a></li>
                        <li><a>Settings</a></li>
                        <li class="active"><strong>Change website logo</strong></li>
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
                <? }?>
                  <form class="form-horizontal" name="form1" method="post" action="<?=site_url("webmaster/manage_logo")?>" enctype="multipart/form-data" >
                    <input type="hidden" name="mode" value="update">
                    <div class="form-group"><label class="col-sm-2 control-label">Upload Logo</label>
                        <div class="col-sm-10">
                          <input type="file" required="" xclass="form-control" id="logo_path" name="logo_path">
                      </div>
                  </div>
                  <? if($dataRs['website_logo']!=""){?>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group"><label class="col-sm-2 control-label">Existing Logo</label>
                    <div class="col-sm-2">
                        <input type="hidden" value="<?=$dataRs['website_logo']?>" name="old_logo">
                        <img src="<?=base_url()?>uploads/sitelogo/<?=$dataRs['website_logo']?>" class="img-responsive">
                    </div>
                </div>
                <? }?>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
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
