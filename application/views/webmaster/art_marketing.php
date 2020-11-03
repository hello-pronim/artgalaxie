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
          <h2>Art Marketing List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Art Marketing List</strong></li>
          </ol>
        </div>
        <? if(isset($parentDs)){  ?>
          <div class="col-lg-4"><div class="title-action">
             <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_marketing')?>">Back to the list</a>
            </div>
           </div>
           <?php } ?>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-title ">
          <h5 class="pull-left">Art Marketing Listing </h5>
           <div class="clearfix"> </div>
          </div>
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? } ?>
          <form name="frmcustlist" method="post"  class="form-horizontal" > 
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  
                  <? if(!isset($parentDs)){ ?>
                  <th align="left">Pages</th>
                  <? }else{ ?>
                  <th>Sections</th>
                  <?php } ?>
                  
                  <? if(!isset($parentDs)){ ?>
                  <th align="left"> Image</th>
                  <th align="left">Other section </th>
                  <? }  ?>
                  <? if(isset($parentDs)){ ?>
                  <th width="15%">Box content </th>
                  <? } ?>
                 
                   <? if(!isset($parentDs)){ ?>
                  <th width="15%">Action</th>
                  <? }else{ ?>
                  <th width="15%">Banners</th>
                  <?php } ?>
                  
                  
                </tr>
              </thead>
              <tbody>  
                <?if($num_rec){?>
                <?php //echo "<pre>"; print_r($dataDs); echo "</pre>"; 
                $ci=1;
                foreach($dataDs as $dataRs){ ?>
                <tr>
                  <td align="left"><? if(isset($parentDs)){ echo stripslashes($dataRs['sub_title']);  }else{ echo stripslashes($dataRs['page_title']); } ?></td>
                  <? if(!isset($parentDs)){ ?>
                  <td align="left">
                      <? if($dataRs['icone_image']!=''){ ?>
                    <img src="<?=base_url()?>uploads/art_marketing/<?=$dataRs['icone_image']?>" width="10%" class="image-responsive">
                    <? }else{ ?>
                    <img src="<?=base_url()?>webmaster_assets/img/noImage.jpg" width="10%" class="image-responsive">
                    <? } ?></td>
                    
                    
                    <td align="center"><?php if($dataRs['id']>0){  ?>
                      <a href="<?=site_url('webmaster/art_marketing/marketing_othersections/'.$dataRs['id'])?>" title="Edit" >Sections </a>  <?php }else{ echo "-";  } ?></td>
                    <? } ?>
                    
                    <? if(isset($parentDs)){ ?>
                    <td align="center">
                      <a href="<?=site_url('webmaster/Art_marketing/box_content/'.$dataRs['id'].'/0')?>" title="Box Content" >
                      Boxes </a>
                    </td>
                    <? } ?>
                  
                  <td align="center">
                      <a href="<?=site_url('webmaster/art_marketing/manage_art_marketing/'.$dataRs['id'].'/'.$dataRs['parent_id'])?>" title="Edit" >
                        <? if(!isset($parentDs)){ ?>
                  Title and Icon
                  <? }  ?>
                  <? if(isset($parentDs)){ ?>
                   Banner <?php echo $ci; ?>
                  <? } ?>  
                     </a>&nbsp;</td>
                </tr>   
              <? 
              $ci++;
              } ?>
              <? }?></tbody>
               
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
    "aaSorting": []
  });
});
</script>

</body>
</html>
