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
          <h2>Publication List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Publication</a></li>
            <li class="active"><strong>Publication List</strong></li>
          </ol>
        </div>
        <div class="col-lg-4">
          <div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/publication/manage')?>">Add Publication</a>
          </div> <!---->
        </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-title ">
          <h5 class="pull-left">Publication Listing </h5>
           <div class="clearfix"> </div>
          </div>
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? } ?>
            

          <form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url("webmaster/publication/delete_publication")?>" onSubmit="JavaScript:return confirm_delete()"> 
           <input type="hidden" value="delete" name="action" />
            <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th align="left" > Title </th>
                  <th align="left">  Image</th>
                  <th align="left">  Price </th>
              
                   
                  <th width="15%">Take a look inside</th>
                  <th width="15%">Action</th>
                </tr>
              </thead>
              <tbody>  
                <?if($num_rec){?>
                <?php foreach($dataDs as $dataRs){ ?>
                <tr>
                  <td align="left"><?=stripslashes($dataRs['title'])?></td>
                  <td align="left"><img src="<?=base_url()?>uploads/publication_book_image/<?=$dataRs['book_image']?>" class="img_responsive" ></td>
                  <td align="left"><?=stripslashes($dataRs['price'])?></td>
                  <td align="left"><a href="<?=site_url('webmaster/publication/manage_books/'.$dataRs['id'])?>">Take A look inside</a> </td>
                  <td align="center">
                    <a href="<?=site_url('webmaster/publication/manage/'.$dataRs['id'])?>" title="Edit" >
                    <i class="fa fa-edit"></i></a>&nbsp;
                    <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" ></td>
                </tr>   
            
              <? } ?>
              <? }?></tbody>
              <tfoot><tr><td  colspan="4"></td>
                <td align="right"><button type="submit" class="btn btn-danger" >Delete</button></td></tr>
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
    "aaSorting": [0,'asc']
  });
});
</script>

</body>
</html>
