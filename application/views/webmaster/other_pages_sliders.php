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
        <div class="col-lg-8">
       <h2> Slider Content List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('webmaster/dashboard')?>">Dashboard</a></li>
            <li><a>Manage User's  Slider Content </a></li>
            <li class="active"><strong> Slider Content</strong></li>
          </ol>
        </div>
        <div class="col-lg-4">&nbsp;</div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        
         <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
          <h5><?=$btnCapt?> Videos</h5>
         <div class="clearfix">&nbsp;</div>
        </div>
         <div class="ibox-content">
           <? if($this->session->flashdata('Error')){?>
          <div class="alert alert-danger alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Error')?>
          </div>
          <? } ?>
          <form action="<?=site_url('webmaster/manage_slider/other_pages_sliders/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
          <input type="hidden" name="mode" value="1" id="mode">

            <div class="form-group">
             <label class="col-lg-2 control-label"  >&nbsp;What You want to upload</label>
             <div class="col-lg-10">
                 <div class="radio">
                <label><input type="radio" value="image" name="type" id="type1" 
                  <? if(@$sliderData['type']=='image'){ ?> checked="checked" <? } ?> onclick="javascript:whatType(this.value);" ><i></i> Image </label>
                <label><input type="radio" value="video" name="type" id="type0" <? if(@$sliderData['type']=="video"){  ?> checked="checked" <? }  ?>   onclick="javascript:whatType(this.value);" ><i></i> Video</label>
                <label><input type="radio" value="url" name="type" id="type3" <? if(@$sliderData['type']=="url"){  ?> checked="checked" <? }  ?>   onclick="javascript:whatType(this.value);" ><i></i> Video URL</label>
              </div>
              </div>  
          </div>
          <? if($id==0){ ?>
            <div class="form-group" id="upload_div" style='display:none;'>
             <label class="col-lg-2 control-label"  id="type_label">&nbsp;</label>
             <div class="col-lg-10" id="upload-option">
                   <input type="file" name="str_name" id="str_name" <?php if($id==0){ ?> required  <?php } ?>/>
              </div>  
          </div>
          <?php }else{ ?>
          <div class="form-group" id="upload_div"  >
             <label class="col-lg-2 control-label"  id="type_label">Upload <?php if($sliderData['type']=='image'){ echo "Images"; }else if($sliderData['type']=='video'){ echo "Video"; }else{ echo "Video URL"; } ?></label>
             <div class="col-lg-10" >
              <?php if($sliderData['type']!='url'){?>
                   <input type="file" name="str_name" id="str_name" <?php if($id==0){ ?> required  <?php } ?>/>
              <?php }else{ ?>
                   <input type="text" class="form-control" name="str_name" id="str_name"  value="<?=$sliderData['str_name']?>" />
              <?php } ?>
              </div>  
          </div>

          <?php } ?>

           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;For Page</label>
             <div class="col-lg-10">
                  <label><input type="radio" value="artist" name="page_name" id="page_name1" 
                  <? if(@$sliderData['page_name']=='artist'){ ?> checked="checked" <? } ?> ><i></i> Artist </label><br/>
                  <label><input type="radio" value="video" name="page_name" id="page_name2" <? if(@$sliderData['page_name']=="video"){  ?> checked="checked" <? }  ?>   ><i></i> Video</label><br/>
                  <label><input type="radio" value="publication" name="page_name" id="page_name2" <? if(@$sliderData['page_name']=="publication"){  ?> checked="checked" <? }  ?>   ><i></i> Publication</label><br/>
                  <label><input type="radio" value="gallery" name="page_name" id="page_name3" <? if(@$sliderData['page_name']=="gallery"){  ?> checked="checked" <? }  ?>   ><i></i> Gallery</label><br/>
                  <label><input type="radio" value="aboutus" name="page_name" id="page_name4" <? if(@$sliderData['page_name']=="aboutus"){  ?> checked="checked" <? }  ?>   ><i></i> About Us</label><br/>
                  <label><input type="radio" value="services" name="page_name" id="page_name5" <? if(@$sliderData['page_name']=="services"){  ?> checked="checked" <? }  ?>><i></i> Services</label><br/>
                  <label><input type="radio" value="website" name="page_name" id="page_name6" <? if(@$sliderData['page_name']=="website"){  ?> checked="checked" <? }  ?>><i></i> Website</label><br/>
                  <label><input type="radio" value="video-production" name="page_name" id="page_name7" <? if(@$sliderData['page_name']=="video-production"){  ?> checked="checked" <? }  ?>><i></i> Video Production</label><br/>
                  <label><input type="radio" value="exhibitions" name="page_name" id="page_name7" <? if(@$sliderData['page_name']=="exhibitions"){  ?> checked="checked" <? }  ?>><i></i> Exhibitions</label><br/>
                  <label><input type="radio" value="design" name="page_name" id="page_name8" <? if(@$sliderData['page_name']=="design"){  ?> checked="checked" <? }  ?>><i></i> Design Services</label><br/>
                  <label><input type="radio" value="artservices" name="page_name" id="page_name9" <? if(@$sliderData['page_name']=="artservices"){  ?> checked="checked" <? }  ?>><i></i> Art Services</label><br/>
                   <label><input type="radio" value="artistByCountry" name="page_name" id="page_name10" <? if(@$sliderData['page_name']=="artistByCountry"){  ?> checked="checked" <? }  ?>><i></i> Artist By Country </label>
              </div>  
          </div>

         <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Order No</label>
             <div class="col-lg-10">
              <input type="text"   name="sort_no" id="sort_no"    value="<?=@$sliderData["sort_no"]?>" required  >
              </div>  
          </div>

           <?php    if(@$sliderData['str_name']!=''){ ?>
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp; Old <?php if($sliderData['type']=='image'){ echo "Images"; }else{ echo "Video"; } ?></label>
             <div class="col-lg-10">
              <input type="hidden" name="old_str_name" id="old_str_name" value="<?=$sliderData['str_name']?>" />
              <?php if($sliderData['type']=='image'){ ?>
              <img src="<?=base_url()?>uploads/page_slider_content/<?=$sliderData['str_name']?>" class="img-responsive">
              <?php }else if($sliderData['type']=='video'){ ?>
              <div align="center"  >
                  <video>
                    <source  src="<?=base_url()?>uploads/page_slider_content/<?=$sliderData['str_name']?>" type="video/mp4">
                  </video>
                </div>  
              <?php }else if($sliderData['type']=='url'){  ?>
              <div align="center"  >
                  <iframe height="100%" width="100%" frameborder="0" src="<?=$sliderData['str_name']?>?autoplay=0"></iframe>
                </div>  

             <?  } ?>
             </div>  
          </div>
          <?php }  ?>

         <div class="hr-line-dashed"></div>
            <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
               <a href="<?=site_url('webmaster/manage_slider/other_pages_sliders');?>" class="btn btn-white">Cancel</a>
             <input type="submit" class="btn btn-primary" name="submit" id="btnsave" value="<?=$btnCapt?> Slider Content" name="btnsave">
            </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div></div>


        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
         <!--  <div class="ibox-title"></div> -->
         <div class="ibox-title ">
          <h5 class="pull-left">Videos Listing </h5>
           <div class="clearfix"> </div>
          </div>
         <div class="ibox-content">
          <? if($this->session->flashdata('Success')){ ?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? } ?>
            

    <form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url("webmaster/manage_slider/deleteother_slider/")?>" onSubmit="JavaScript:return confirm_delete()"> 
     <input type="hidden" value="delete" name="action" />
     <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="15%" align="left" > Content </th>      
          <th width="15%" align="left" > Page Name </th>       
          <th width="15%" align="left" > Order No </th>                   
          <th width="15%" align="left" > Edit </th> 
          <th width="15%" align="left" > Delete </th> 
        </tr>
      </thead>
      <tbody>  
        <?php if($bannerNumRow>0){?>
        <?php foreach($bannerData as $dataRs){ ?>
        <tr>
          <td align="left">
            <?php  if($dataRs['type']=='image'){ ?>
            <img src="<?=base_url()?>uploads/page_slider_content/<?=$dataRs['str_name']?>" class="img-responsive">
           <?php }else if($dataRs['type']=='video'){ ?>
           <video controls autoplay>
           <!--<source src="<?=base_url()?>uploads/page_slider_content/<?=$dataRs['str_name']?>" type="video/mp4">-->
             <source  src="<?=base_url()?>uploads/page_slider_content/<?=$dataRs['str_name']?>" type="video/mp4">
           </video>           
         <? }else if($dataRs['type']=='url'){ ?>
          <iframe height="100%" width="100%" frameborder="0" src="<?=$dataRs['str_name']?>?autoplay=0"></iframe>
         <?php } ?>
          </td>
          <td align="center"><?php  echo $dataRs['page_name']; ?></td>
           <td align="center"><?php  echo $dataRs['sort_no']; ?></td>
          <td align="center">
            <a href="<?=site_url('webmaster/manage_slider/other_pages_sliders/'.$dataRs['id'])?>" title="Edit" >
              <i class="fa fa-edit"></i></a>
              </td>
              
              <td align="center">
              <input type="checkbox" name="cb[]" value="<?=$dataRs['id']?>" >
              </td>
              
            </tr>   
            <?php } ?>
            <?php  }?></tbody>
            <tfoot><tr><td  colspan="4"></td>
             <td align="right"><button type="submit" class="btn btn-delete" >Delete</button></td> </tr>
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
    "aaSorting": []
  });
});
</script>
<script type="text/javascript">
  function whatType(str){
    if(str=='image'){
      $('#type_label').text('Upload Image');
      $('#str_name').hide();
      $('#upload-option').html('<input type="file" name="str_name"  id="str_name" required />');

    }
    if(str=='video'){
      $('#type_label').text('Upload Video');
       $('#str_name').hide();
      $('#upload-option').html('<input type="file" name="str_name"  id="str_name" required />');
    }
    if(str=='url'){
      $('#type_label').text('Video URL');
      $('#str_name').hide();
      $('#upload-option').html('<input type="text" name="str_name"  id="str_name" required />');
    }
    $('#upload_type').val(str);
    $('#upload_div').show();

  }

</script>

</body>
</html>
