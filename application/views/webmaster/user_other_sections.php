<!DOCTYPE html>
<html>
<head>
 <? $this->load->view('webmaster/template/head'); ?>

 <!-- Data Tables -->
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">
<style type="text/css">
  .top-border-red{
    border-top: 3px solid #ed5565;
  }
  .top-border-orange{
    border-top: 3px solid orange;
  }
  .top-border-green{
    border-top: 3px solid green;
  }
  .top-border-blue{
    border-top: 3px solid  #1c84c6;
  }
 .top-border-purple{
    border-top: 3px solid  #6f4883;
  }

</style>
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
            <li class="active"><strong>Manage Other Sections of user</strong></li>
          </ol>
        </div>
       </div>
      <div class="wrapper wrapper-content  animated fadeInRight">
        <? $this->load->view('webmaster/common_feature_artist_head');?>
     <?php if($userDetails['is_featured']!='0000-00-00'){ ?>
            <div class="row">
              <div class="col-lg-12">
             <h3>Featured Section</h3>
             </div>
                <div class="col-lg-3 ">
                    <div class="ibox ">
                        <div class="ibox-content top-border-red"  >
                            <h3 style="text-align:center;">
                             Interviews</h3>
                              <p class="small" style="text-align:center;">
                              <a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/interviews')?>">
                              <i class="fa fa fa-check"></i> Description<br/></a>
                               <a href="<?=site_url('webmaster/user/interviews/'.$userDetails['id'])?>">
                                <i class="fa fa fa-check"></i> Manage Interview
                                </a>
                              </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-blue">
                            <h3 style="text-align:center;">Artwork Gallery</h3>
                              <p class="small" style="text-align:center;">
                              <a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/artgallery')?>">
                              <i class="fa fa fa-check"></i> Description</a><br/> 
                              <a href="<?=site_url('webmaster/user/sliders/'.$userDetails['id'].'/artWorkGallery')?>">
                              <i class="fa fa fa-check"></i>Manage Sliders</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-green">
                            <h3 style="text-align:center;">Inside the Studio Short Description</h3>
                            <p class="small" style="text-align:center;">
                              <a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/shortinsidethestudio')?>">
                              <i class="fa fa fa-check"></i> Description</a><br/>
                              <a href="<?=site_url('webmaster/user/sliders/'.$userDetails['id'].'/insideTheStudio')?>">
                              <i class="fa fa fa-check"></i> Manage Sliders</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-green">
                            <h3 style="text-align:center;">Inside the Studio Long Description</h3>
                            <p class="small" style="text-align:center;">
                              <a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/insidethestudio')?>">
                              <i class="fa fa fa-check"></i> Description</a><br/>
                              <a href="<?=site_url('webmaster/user/sliders/'.$userDetails['id'].'/insideTheStudio')?>">
                              <i class="fa fa fa-check"></i> Manage Sliders</a></p>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-orange">
                            <h3 style="text-align:center;">Video</h3>
                             <p class="small" style="text-align:center;">
                              <a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/featurevideo')?>"><i class="fa fa fa-check"></i> Description</a><br/>
                              <a href="<?=site_url('webmaster/user/feature_videos/'.$userDetails['id'])?>">
                              <i class="fa fa fa-check"></i> Manage Video</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 ">
                    <div class="ibox ">
                        <div class="ibox-content top-border-blue"  >
                            <h3 style="text-align:center;">Featured Introduction</h3>
                              <p class="small" style="text-align:center;">
                              <a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/featureIntroduction')?>">
                              <i class="fa fa fa-check"></i>Manage Description<br/></a>
                             </p>
                        </div>
                    </div>
                </div>
          </div>
        <?php } ?>

          <div class="row">
             <div class="col-lg-12">
             <h3>Other Section</h3>
             </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-purple">
                            <h3 style="text-align:center;"><a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/essay')?>">Essay</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-orange">
                            <h3 style="text-align:center;"><a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/biography')?>">Biography</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content  top-border-green">
                            <h3 style="text-align:center;"><a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/statement')?>">Statement</a></h3>
                         </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-blue">
                            <h3 style="text-align:center;"><a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/exibition')?>">Exhibitions</a></h3> </div>
                    </div>
                </div>
                 <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-red">
                            <h3 style="text-align:center;"><a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/awards')?>">Awards</a></h3>
                       </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-green">
                            <h3 style="text-align:center;"><a href="<?=site_url('webmaster/user/manage_desc/'.$userDetails['id'].'/publication')?>">Publications</a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-blue">
                            <h3 style="text-align:center;"><a href="<?=site_url('webmaster/user/gallery/'.$userDetails['id'])?>">Gallery</a></h3>
                        </div>
                    </div>
                </div>
             <!--     <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-orange">
                            <h3 style="text-align:center;"><a href="<?=site_url('webmaster/user/socialLinks/'.$userDetails['id'])?>">Social Links</a></h3>
                        </div>
                    </div>
                </div> -->
               <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content top-border-green">
                            <h3 style="text-align:center;"><a href="<?=site_url('webmaster/user/videos/'.$userDetails['id'])?>">Videos</a></h3>
                        </div>
                    </div>
                </div>
        </div>
       </div>
    <? $this->load->view("webmaster/template/footer")?>
  </div>
</div>
<!-- Mainly scripts -->
<? $this->load->view('webmaster/template/bot_script'); ?>
<!-- Data Tables -->
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
<!-- Page-Level Scripts -->
<script>
$(document).ready(function() {
  $('.dataTables-example').dataTable({
    responsive: true,
    "aaSorting": []
  });
});
</script>

</body>
</html>
