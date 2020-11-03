<!DOCTYPE html>
<html>
<head>
 <? $this->load->view('webmaster/template/head'); ?>

 <!-- Data Tables -->
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.responsive.css" rel="stylesheet">
 <link href="<?=base_url()?>webmaster_assets/css/plugins/dataTables/dataTables.tableTools.min.css" rel="stylesheet">

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
          <h2>Art Of Giving List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Art Of Giving</a></li>
            <li class="active"><strong>Art Of Giving</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
          <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_of_giving/manage_just_giving_video')?>" >Add new</a>
        </div> </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? }?>

          <form name="frmcustlist" method="post" action="<?=site_url("webmaster/art_of_giving/delete_just_giving_video")?>" onSubmit="JavaScript:return confirm_delete()" class="form-horizontal">
            <input type="hidden" value="delete" name="action" />
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                    <th width="15%"  align="left">Banner Image</th> 
                  <th align="left">Title</th>
                 <!--   <th align="left">Text</th>  -->
                  <th width="6%">Edit</th><th width="6%">Delete</th>
                </tr>
              </thead>
              <tbody>  
                <? if($num_rec>0){
                  foreach ($list_data as $category) {?>
                  <tr>
                   
                   <td align="left">
                      <?php
                    $url = $category['str_name'];
                    $curl = preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                    if($curl == '0')
                    {
                    ?>
                        <iframe id="ytplayer" type="text/html" width="100%" height="100px" src="<?=$category['str_name']?>>" frameborder="0"></iframe>
                    <?php
                    }
                    else
                    {
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                        $id = $matches[1];
                        $width = '100%';
                        $height = '100px';
                        ?>
                        <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
                        src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                        frameborder="0" allowfullscreen></iframe>
                    <?php
                    }
                    ?></td>
                     <td align="left"><?=stripslashes($category['giving_video_text'])?></td>
 <!--                   <td align="center"><a href="<?=site_url('webmaster/regionwise_gallery/manage_photo_gallery/'.$category['cat_id']);?>">Manage Photo Gallery</a></a></td> -->
                   <td align="center"><a href="<?=site_url('webmaster/art_of_giving/manage_just_giving_video/'.$category['id']);?>"><i class="fa fa-edit"></i></a></a></td>
                    <td align="center"><input type="checkbox" name="cb[]" value="<?=$category['id']?>" ></td>
                  </tr>   
                  <? } 
                }?>
              </tbody>
              <tfoot><tr><td colspan="3"></td>
                <td><button type="submit" class="btn btn-danger">Delete</button></td></tr>
              </tfoot>           
            </table>
          </form> 
        </div>
      </div>
    </div></div></div>
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
    "aaSorting": [2,'desc']
  });
});
</script>

</body>
</html>
