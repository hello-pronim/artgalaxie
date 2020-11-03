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
          <h2>User List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('webmaster/dashboard')?>">Dashboard</a></li>
            <li><a>Manage User's Video </a></li>
            <li class="active"><strong>Video </strong></li>
          </ol>
        </div>
        <div class="col-lg-4">&nbsp;</div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
         <? $this->load->view('webmaster/common_feature_artist_head');?>
         <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
          <h5>Manage Videos </h5>
         <div class="clearfix">&nbsp;</div>
        </div>
         <div class="ibox-content">
           <? if($this->session->flashdata('Error')){?>
          <div class="alert alert-danger alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Error')?>
          </div>
          <? } ?>
          <? if($this->session->flashdata('Success')){?>
          <div class="alert alert-success alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Success')?>
          </div>
          <? } ?>
          <form action="<?=site_url('webmaster/user/feature_videos/'.$userId)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
          <input type="hidden" name="mode" value="1"> 
           <div class="form-group">
             <label class="col-lg-2 control-label"  >&nbsp;What You want to upload</label>
             <div class="col-lg-10">
                 <div class="radio">                
                <label><input type="radio" value="video" name="type" id="type0" <? if(@$artist_data['type']=="video"){  ?> checked="checked" <? }  ?>   onclick="javascript:whatType(this.value);" ><i></i> Video</label>
                <label><input type="radio" value="url" name="type" id="type3" <? if(@$artist_data['type']=="url"){  ?> checked="checked" <? }  ?>   onclick="javascript:whatType(this.value);" ><i></i> Video URL</label>
              </div>
              </div>  
          </div>

          

          <?php $id=0; if($id==0){ ?>
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





          <!-- <? $id='0'; if($id==0){ ?>
            <div class="form-group" id="upload_div" style='display:none;'>
             <label class="col-lg-2 control-label"  id="type_label">&nbsp;</label>
             <div class="col-lg-10" id="upload-option">
                   <input type="file" name="feature_video" id="feature_video" <?php if($id==0){ ?> required  <?php } ?>/>
              </div>  
          </div>
          <?php }else{ ?>

          <div class="form-group" id="upload_div"  >
             <label class="col-lg-2 control-label"  id="type_label">Upload <?php if($artist_data['type']=='image'){ echo "Images"; }else if($artist_data['type']=='video'){ echo "Video"; }else{ echo "Video URL"; } ?></label>
             <div class="col-lg-10" >
              <?php if($artist_data['type']!='url'){?>
                   <input type="file" name="feature_video" id="feature_video" <?php if($id==0){ ?> required  <?php } ?>/>
              <?php }else{ ?>
                   <input type="text" class="form-control" name="feature_video" id="feature_video"  value="<?=$artist_data['feature_video']?>" />
              <?php } ?>
              </div>  
          </div>

          <?php } ?>


          <!-- <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Video</label>
             <div class="col-lg-10">
               <input type="file" name="feature_video" id="feature_video" > 
               <span class="help-block text-danger">
                  <?php if(form_error('feature_video')!=""){  echo  form_error('feature_video'); } ?>
                </span>  
              </div>  
          </div>
          
            <?php if($artist_data['feature_video']!=''){ ?>
          <div class="form-group">
             <label class="col-lg-2 control-label">Old Video </label>
              <div class="col-lg-10">
                  <div align="center"  >
                  <video  >
                    <source  src="<?=base_url()?>uploads/artist_video/<?=$artist_data['feature_video']?>" type="video/mp4">
                  </video>
                </div>  
               <input type="hidden" name="old_feature_video" id="old_feature_video" value="<?=$artist_data['feature_video']?>"> 
               
              </div>
           </div>
           <?php } ?>-->


            <?php    if(@$artist_data['feature_video']!=''){ ?>
           <div class="form-group">           
             <div class="col-lg-10">
              <input type="hidden" name="old_feature_video" id="old_feature_video" value="<?=$artist_data['feature_video']?>" />              
              <?php if($artist_data['type']=='video'){ ?>
              <div align="center"  >
                 <video controls autoplay>
                    <source src="<?=base_url()?>uploads/artist_video/<?=$artist_data['feature_video']?>" type="video/mp4">
                  </video>
                </div>  
              <?php }else if($artist_data['type']=='url'){  ?>
              <div align="center"  >
                  <iframe height="100%" width="100%" frameborder="0" src="<?=$artist_data['feature_video']?>?autoplay=0"></iframe>
                </div>  

             <?  } ?>
             </div>  
          </div>
          <?php }  ?>
           <div class="hr-line-dashed"></div>
           <div class="form-group">
           <div class="col-sm-4 col-sm-offset-2">
           <a href="<?=site_url('webmaster/user/othersections/'.$userId);?>" class="btn btn-white">Cancel</a>
            <input type="submit" class="btn btn-primary" id="btnsave" value="Update Video" name="btnsave">
           </div>
            </div>
          </form>
        </div>
      </div>
    </div></div>
    </div>
    <? $this->load->view("webmaster/template/footer")?>
  </div>
</div>
<!-- Mainly scripts -->
<? $this->load->view('webmaster/template/bot_script'); ?>
<script type="text/javascript">
  function whatType(str){    
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
