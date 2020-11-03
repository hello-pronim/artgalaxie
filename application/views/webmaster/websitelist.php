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
          <h2>Website  </h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Content</a></li>
            <li class="active"><strong>Website</strong></li>
          </ol>
        </div>
        </div>
         <div class="wrapper wrapper-content animated fadeInRight">
        <?php if(isset($id) && $id>0){ ?>
           <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
              <h5><?=$btnCapt?> Website</h5>
              <div class="clearfix">&nbsp;</div>
            </div>
            <div class="ibox-content">
             <? if($this->session->flashdata('Error')){?>
             <div class="alert alert-danger alert-dismissable" align="center">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?=$this->session->flashdata('Error')?>
            </div>
            <? } ?>
            <form action="<?=site_url('webmaster/website/manage/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">

             <div class="form-group">
              <label class="col-lg-2 control-label">&nbsp;Title</label>
              <div class="col-lg-10">
                <input type="text"  class="form-control"  name="title" id="title"    value="<?=@$boxData["title"]?>"   >
                 <span class="help-block text-danger">
                <?php if(form_error('title')!=""){  echo  form_error('title'); } ?>
              </span> 
              </div>  
            </div>

             <? if(@$boxData['sub_title']!=''){ ?>
             <div class="form-group">
              <label class="col-lg-2 control-label">&nbsp;Title</label>
              <div class="col-lg-10">
                <input type="text"  class="form-control"  name="sub_title" id="sub_title"    value="<?=@$boxData["sub_title"]?>"   >
                 <span class="help-block text-danger">
                <?php if(form_error('sub_title')!=""){  echo  form_error('sub_title'); } ?>
              </span> 
              </div>  
            </div>
            <?php } ?>

            <? if(@$boxData['description']!=''){ ?>
            <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Description</label>
             <div class="col-lg-10">
               <textarea name="description" id="description"  class="form-control" rows="8"><?php if(@$boxData['description']!=""){ echo $boxData['description'];}else{ echo set_value('description');  } ?></textarea> 
               <span class="help-block text-danger">
                <?php if(form_error('description')!=""){  echo  form_error('description'); } ?>
              </span> 
            </div>   
          </div>
          <?php } ?>
         <? // if( @$boxData['desc_image']!='' && $id>0){ //?>
          <div class="form-group">
           <label class="col-lg-2 control-label">Image</label>
           <div class="col-lg-10">
            <input type="file" value="" name="desc_image" class="" id="photo" <? /*if($id==0){ ?> required <? } */ ?>>
          </div>
          </div>
          <div class="form-group">
           <label class="col-lg-2 control-label">Already Added Image</label>
           <div class="col-lg-10">
             <input type="hidden" name="old_desc_image" id="old_desc_image" value="<?=$boxData['desc_image']?>"> 
             <img src="<?=base_url()?>uploads/website/<?=$boxData['desc_image']?>" width="30%" class="image-responsive">
           </div>
         </div>  
         <? // } ?>
       <div class="hr-line-dashed"></div>
       <div class="form-group">
        <div class="col-sm-4 col-sm-offset-2">
         
         <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Website" name="btnsave">
       </div>
     </div>
   </form>
 </div>
</div>
</div></div> <?php } ?>


<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
 <!--  <div class="ibox-title"></div> -->
 <div class="ibox-title ">
  <h5 class="pull-left">Website Listing </h5>
  <div class="clearfix"> </div>
</div>
<div class="ibox-content">
  <? if($this->session->flashdata('Success')){ ?>
  <div class="alert alert-success alert-dismissable" align="center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?=$this->session->flashdata('Success')?>
  </div>
  <? } ?>


  <form name="frmcustlist" method="post"  class="form-horizontal"  action="#" > 
    <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th align="left" > Sections </th>      
          <th align="left" > Description </th>       
          <th width="15%">Banners</th>
        </tr>
      </thead>
      <tbody>  
        <?php if($num_rec>0){?>
        <?php 
        $ic=1;
        foreach($dataDs as $dataRs){ ?>
        <tr>
          <td><?php  echo stripslashes($dataRs['title']); ?></td>
          <td><?php if($dataRs['description']!=''){  echo $this->common->Cut(stripslashes($dataRs['description']),100);}else{ echo "-"; } ?></td>
          <td align="center">
            <a href="<?=site_url('webmaster/website/manage/'.$dataRs['id'])?>" title="Edit" >
              <?php $var = "";
              if($dataRs['linktext']=="") { ?>
                <i class="fa fa-edit"></i>
              <?php } else { ?>
              <?php if($dataRs['numbering']!=0) { $var = $dataRs['numbering']; } echo $dataRs['linktext'] . " " . $var; ?></a></td>
              <?php } ?>
            </tr>   
            <?php 
            $ic++;    
            } 
            ?>
            <?php  }?>
          </tbody>
          
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
