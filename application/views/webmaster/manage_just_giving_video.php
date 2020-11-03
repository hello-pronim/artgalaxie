<? $act_id='CMS';?>
<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
  <link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
  <script src="<?=base_url()?>webmaster_assets/ckeditor/ckeditor.js"></script>
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
          <h2>Art Of Giving</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Art Of Giving</a></li>
            <li class="active"><strong>Art Of Giving</strong></li>
          </ol>
        </div>
    <div class="col-lg-4"><div class="title-action">
      <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_of_giving/just_giving_video')?>">Back to the list</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
    <div class="ibox-title">
      <h5><?=$btnCapt?> Categories</h5>
      <div class="clearfix">&nbsp;</div>
    </div>
    <div class="ibox-content">
     <? if($this->session->flashdata('Error')){ ?>
     <div class="alert alert-danger alert-dismissable" align="center">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <?=$this->session->flashdata('Error')?>
    </div>
    <? } ?>
    <form action="<?=site_url('webmaster/art_of_giving/manage_just_giving_video/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Video Text</label>
         <div class="col-lg-10">
          <textarea name="giving_video_text" id="giving_video_text" class="form-control"  rows="7"><?=@$form_data['giving_video_text']?></textarea>
          <script>
            CKEDITOR.replace('giving_video_text', {
              "filebrowserImageUploadUrl": "<?=site_url('webmaster/manage_just_giving_video/ck_imageupload')?>"
            });
        </script>
          <span class="help-block text-danger">
                  <?php if(form_error('giving_video_text')!=""){  echo  form_error('giving_video_text'); } ?>
         </span>  
         </div>  
       </div>
             <?php $artist=''; 
          if(@$form_data['artist_id']!=''){
            $artist = @explode(',',$form_data['artist_id']); 
          }?>
          <div class="form-group">
             <label class="col-lg-2 control-label">Artist </label>
              <div class="col-lg-10">
                <select name="user_artist[]" id="user_artist" class="form-control"  multiple <?php if($id==0){ ?> required <?php } ?>>
                  <option value=""> Select artists</option>
                  <?php foreach ($user_artist as $user_artistRs) { ?>
                     <option value="<?=stripslashes($user_artistRs['id'])?>" <?php if(@in_array($user_artistRs['id'],$artist,true)){ ?>  selected="selected" <?php } ?>>
                      <?=stripslashes($user_artistRs['first_name']." ".$user_artistRs['last_name'])?>
                    </option>
                  <?php }?>
                </select>
               <span class="help-block text-danger">
                  <?php if(form_error('user_artist')!=""){  echo  form_error('user_artist'); } ?>
                </span> 
              </div>
           </div>
            
            
            <!--<div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;What You want to upload</label>
             <div class="col-lg-10">
                 <div class="radio">          
                <label><input type="radio" value="video" name="type" id="type0"  onclick="javascript:whatType(this.value);" ><i></i> Video</label>
                <label><input type="radio" value="url" name="type" id="type3" onclick="javascript:whatType(this.value);" ><i></i> Video URL</label>
              </div>
              </div>  
          </div>-->

        
        <div class="form-group">
             <label class="col-lg-2 control-label"  id="type_label">Video URL</label>
             <div class="col-lg-10">
                   <input type="text" name="str_name" id="str_name" style="width:800px" value="<?=@$form_data['str_name']?>" />
              </div>  
          </div>
    
          <!--<div class="form-group" id="upload_div" style='display:none;'>
             <label class="col-lg-2 control-label"  id="type_label">&nbsp;</label>
             <div class="col-lg-10" id="upload-option">
                   <input type="file" name="str_name" id="str_name" />
                   <input type="hidden" name="str_name" id="str_name"  value="<?=@$form_data['str_name']?>"> 
              </div>  
          </div>-->

    
     <div class="form-group">
      <div class="col-sm-4 col-sm-offset-2">
       <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?>" name="btnsave">
     </div>
   </div>
 </form>
</div>
</div>
</div></div></div>
<? $this->load->view("webmaster/template/footer")?>
</div>
</div>
<? $this->load->view('webmaster/template/bot_script'); ?>
   <!-- iCheck -->
        <script src="<?=base_url()?>webmaster_assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(document).ready(function () {
          $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
          });
        });
       </script>
       <script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/jquery.dataTables.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.responsive.js"></script>
<script src="<?=base_url()?>webmaster_assets/js/plugins/dataTables/dataTables.tableTools.min.js"></script>
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
