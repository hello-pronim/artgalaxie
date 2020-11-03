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
          <h2>Galleries List</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Regionwise Galleries</a></li>
            <li class="active"><strong>Regionwise Galleries</strong></li>
          </ol>
        </div>
    <div class="col-lg-4"><div class="title-action">
      <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/regionwise_gallery')?>">Back to the list</a>
    </div>
  </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
  <div class="col-lg-12">
  <div class="ibox float-e-margins">
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
    <form action="<?=site_url('webmaster/regionwise_gallery/manage_region_galleries/'.$cat_id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
      <?php //echo "<pre>"; print_r($form_data); echo "</pre>"; ?>
      <div class="form-group">
       <label class="col-lg-2 control-label">&nbsp;Title</label>
       <div class="col-lg-10">
         <input type="text" name="cat_name" class="form-control" value="<?=$form_data['cat_name']?>"/>
        <span class="help-block text-danger">
                  <?php if(form_error('cat_name')!=""){  echo  form_error('cat_name'); } ?>
        </span>  
       </div>  
     </div>
       
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Sub Title </label>
         <div class="col-lg-10">
           <input type="text" name="sub_name" class="form-control" value="<?=@$form_data['sub_name']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('sub_name')!=""){  echo  form_error('sub_name'); } ?>
         </span>  
         </div>  
       </div>

        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Short Description from Detail Page </label>
         <div class="col-lg-10">
          <textarea name="short_description" id="short_description" class="form-control"  rows="7"><?=@$form_data['short_description']?></textarea>
          <span class="help-block text-danger">
                  <?php if(form_error('short_description')!=""){  echo  form_error('short_description'); } ?>
         </span>  
         </div>  
       </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Representation program </label>
         <div class="col-lg-10">
          <textarea name="representation_desc" id="representation_desc" class="form-control"  rows="7"><?=@$form_data['representation_desc']?></textarea>
          <span class="help-block text-danger">
                  <?php //if(form_error('representation_desc')!=""){  echo  form_error('representation_desc'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Location Description from Detail Page </label>
         <div class="col-lg-10">
          <textarea name="location_description" id="location_description" class="form-control"  rows="7"><?=@$form_data['location_description']?></textarea>
          <span class="help-block text-danger">
                  <?php if(form_error('location_description')!=""){  echo  form_error('location_description'); } ?>
         </span>  
         </div>  
       </div>

       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Google Map Script </label>
         <div class="col-lg-10">
          <textarea name="google_map" id="google_map" class="form-control"  rows="7"><?=@$form_data['google_map']?></textarea>
          <span class="help-block text-danger">
                  <?php if(form_error('google_map')!=""){  echo  form_error('google_map'); } ?>
         </span>  
         </div>  
       </div>
 
        <div class="form-group">
           <label class="col-lg-2 control-label">Gallery Categories </label>
            <div class="col-lg-10"> 
              <select name="category_id" id="category_id" class="form-control">
                <option value="">Select Category</option>
                <option value="2"  <? if(@$form_data['category_id']==2){  ?> selected="selected" <? }  ?>>North America</opyion>
                <option value="3" <? if(@$form_data['category_id']==3){  ?> selected="selected" <? }  ?>>South America</opyion>
                <option value="4" <? if(@$form_data['category_id']==4){  ?> selected="selected" <? }  ?>>Europe</opyion>
                <option value="5" <? if(@$form_data['category_id']==5){  ?> selected="selected" <? }  ?>>Rest of the World</opyion>

              </select>
              <span class="help-block text-danger">
                <?php if(form_error('category_id')!=""){  echo  form_error('category_id'); } ?>
              </span> 
            </div>
         </div>

          <div class="form-group">
         <label class="col-lg-2 control-label">Colour</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
                <label><input type="radio" value="1" name="colour_type" id="colour_type1" 
                  <? if(@$form_data['colour_type']==1){ ?> checked="checked" <? }else if($cat_id==0){ ?> checked="checked" <? } ?>><i></i> <span style='color:red!important;font-weight:bold;'>Red</span> </label><br>
                <label><input type="radio" value="2" name="colour_type" id="colour_type2" <? if(@$form_data['colour_type']==2){  ?> checked="checked" <? }  ?>><i></i> <span style='color:#cb7129!important;font-weight:bold;'>Ocer</span> </label><br>
                <label><input type="radio" value="3" name="colour_type" id="colour_type3" <? if(@$form_data['colour_type']==3){  ?> checked="checked" <? }  ?>><i></i> <span style='color:#79a204!important;font-weight:bold;'> Green </span> </label><br>
                <label><input type="radio" value="4" name="colour_type" id="colour_type4" <? if(@$form_data['colour_type']==4){  ?> checked="checked" <? }  ?>><i></i><span style='color:#0ab2a0!important;font-weight:bold;'>  Blue</span> </label><br>
                <label><input type="radio" value="5" name="colour_type" id="colour_type5" <? if(@$form_data['colour_type']==5){  ?> checked="checked" <? }  ?>><i></i><span style='color:#4c9eb6!important;font-weight:bold;'>  Light Blue 
                 </span> </label> <!-- box-color-five --><br>
                <label><input type="radio" value="6" name="colour_type" id="colour_type6" <? if(@$form_data['colour_type']==6){  ?> checked="checked" <? }  ?>><i></i><span style='color:#7a2525 !important;font-weight:bold;'>  Brown 
                </span> </label> <!-- box-color-six --><br>
                <label><input type="radio" value="7" name="colour_type" id="colour_type7" <? if(@$form_data['colour_type']==7){  ?> checked="checked" <? }  ?>><i></i><span style='color:#6958a6 !important;font-weight:bold;'>  Light Purple
                </span> </label> <!-- box-color-seven --> <br>
                <label><input type="radio" value="8" name="colour_type" id="colour_type8" <? if(@$form_data['colour_type']==8){  ?> checked="checked" <? }  ?>><i></i><span style='color:#773d97 !important;font-weight:bold;'>  Dark Purple 
                </span> </label> <!-- box-color-eight --> <br>
                <label><input type="radio" value="9" name="colour_type" id="colour_type9" <? if(@$form_data['colour_type']==9){  ?> checked="checked" <? }  ?>><i></i><span style='color:#af892e !important;font-weight:bold;'>  Yellow
                </span> </label> <!-- box-color-three -->
               
              </div>
               <span class="help-block text-danger">
                  <?php if(form_error('colour_type')!=""){  echo  form_error('colour_type'); } ?>
                </span> 
          </div>
       </div>


        <div class="form-group"><label class="col-lg-2 control-label">Block Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="image_name" id="image_name" > 
             <input type="hidden" name="old_image_name" id="old_image_name"  value="<?=@$form_data['image_name']?>" <? if($cat_id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (461 X 357)<span>
            </div>
          </div>
        </div>

        <?php if(@$form_data['image_name']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Old Block Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_image_name" id="old_image_name"  value="<?=@$form_data['image_name']?>"> 
            <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$form_data['image_name']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } ?>


        <div class="form-group"><label class="col-lg-2 control-label">Floor Plan Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="floor_plan_image" id="floor_plan_image" > 
             <input type="hidden" name="old_floor_plan_image" id="old_floor_plan_image"  value="<?=@$form_data['floor_plan_image']?>" <? if($cat_id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (889 X 656)<span>
            </div>
          </div>
        </div>

        <?php if(@$form_data['floor_plan_image']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Floor Plan Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_floor_plan_image" id="old_floor_plan_image"  value="<?=@$form_data['floor_plan_image']?>"> 
            <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$form_data['floor_plan_image']?>" class="img-responsive">
            </div>
          </div>
        </div><?php } ?>
        <?php 
            $thumbnail_image=''; 
            if(@$form_data['thumbnail_image']!='')
            {
                $thumbnail_image = @explode(',',$form_data['thumbnail_image']); 
            }
            $chk_status=''; 
            if(@$form_data['chk_status']!='')
            {
                $chk_status = @explode(',',$form_data['chk_status']); 
            }
            $thumbnail_link=''; 
            if(@$form_data['thumbnail_link']!='')
            {
                $thumbnail_link = @explode(',',$form_data['thumbnail_link']); 
            }
            $artist=''; 
            if(@$form_data['artist_name']!='')
            {
                $artist = @explode(',',$form_data['artist_name']); 
            }
            $i=0;
        ?>
        <?php 
        if(is_array($artist)) { } else { $artist[0] = ""; }
        if(is_array($thumbnail_image)) { } else { $thumbnail_image[0] = ""; }
        if(is_array($thumbnail_link)) { } else { $thumbnail_link[0] = ""; }
        if(is_array($chk_status)) { } else { $chk_status[0] = "0"; }
        
        foreach($artist as $artistRs) { 
            $checked = "";
        ?>
            <div class="auto-form-group">
                <?php if($i==0) {} else { ?>
                <a href="#" id="close_field<?=$i?>" class="close_field">X</a>
                <?php } ?>
                <div class="form-group"><label class="col-lg-2 control-label">Thumbnail Image<br><br><br>Original Image</label>
                  <div class="col-lg-10">
                    <div class="radio i-checks">
                        <input type="file" name="thumbnail_image[]" id="thumbnail_image" >
                        <span style="font-size:10px;color:gray;">Image Size (889 X 656)<span>
                        <input type="hidden" name="old_thumbnail_image[]" id="old_thumbnail_image"  value="<?=$thumbnail_image[$i]?>" <? if($thumbnail_image[$i]!='') { } else { if($cat_id==0){ ?> required <?php } } ?>> 
                        <?php if($thumbnail_image[$i]!=''){ ?>
                            <br><br><img src="<?=base_url()?>uploads/regionwise_galleries/<?=$thumbnail_image[$i]?>" class="img-responsive">
                        <?php } else { ?>
                            
                        <?php } ?>
                    </div>
                  </div>
                </div>
            
                <div class="form-group">
                    <label class="col-lg-2 control-label">&nbsp;Make Link</label>
                    <div class="col-lg-1">
                        <?php 
                            if($chk_status[$i]=='1'){ 
                                $checked = "checked";
                            } elseif($chk_status[$i]=='0'){
                                $checked = "";
                            }
                        ?>
                        <input type="hidden" name="chk_status[<?=$i?>]" value=0>
                        <input type="checkbox" id="checker" <?=$checked?> class="form-control" name="chk_status[<?=$i?>]" value=1  for="chk_status">
                    </div>
                    <div class="col-lg-9">
                        <input type="text" id="thumbnail_link" name="thumbnail_link[]" class="form-control" value="<?=$thumbnail_link[$i]?>"/>  
                        <span class="help-block text-danger">
                              <?php if(form_error('thumbnail_link')!=""){  echo  form_error('thumbnail_link'); } ?>
                        </span>             
                    </div>  
                </div>
            
               <div class="form-group">
                    <label class="col-lg-2 control-label">&nbsp;Name Of Artist</label>
                    <div class="col-lg-10">
                        <input type="text" name="artist_name[]" class="form-control" value="<?=$artistRs?>" />
                        <span class="help-block text-danger">
                              <?php if(form_error('artist_name')!=""){  echo  form_error('artist_name'); } ?>
                        </span>  
                    </div>  
                </div>
            </div>    
       <?php $i++; } ?>
        <div class="form-group">
            <div class="col-lg-12">
                <a href="" class="add_auto_field btn btn-primary">Add New</a>
            </div>
        </div>
       <?php /*
            $artists=''; 
            if(@$form_data['artist_names']!='')
            {
                $artists = @explode(',',$form_data['artist_names']); 
            }
        ?>
            <div class="form-group">
             <label class="col-lg-2 control-label">Name of Artists</label>
              <div class="col-lg-10">
                <select name="user_artist[]" id="user_artist" class="form-control" multiple <?php if($cat_id==0){ ?> required <?php } ?>> 
                  <?php foreach ($user_artist as $user_artistRs) { ?>
                     <option value="<?=stripslashes($user_artistRs['id'])?>" <?php if(@in_array($user_artistRs['id'],$artists,true)){ ?>  selected="selected" <?php } ?>>
                      <?=stripslashes($user_artistRs['first_name']." ".$user_artistRs['last_name'])?>
                    </option>
                  <?php }?>
                </select>
               <span class="help-block text-danger">
                  <?php if(form_error('user_artist')!=""){  echo  form_error('user_artist'); } ?>
                </span> 
              </div>
            </div>
        <?php */ ?>
        
        <div class="form-group rep_prog"><label class="col-lg-2 control-label">Representation Programme Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="representation_image" id="representation_image" > 
             <input type="hidden" name="old_representation_image" id="old_representation_image"  value="<?=@$form_data['representation_image']?>" <? if($cat_id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (889 x 889)<span>
            </div>
          </div>
        </div>


        
        <?php if(@$form_data['representation_image']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Representation Programme Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_representation_image" id="old_representation_image"  value="<?=@$form_data['representation_image']?>"> 
            <img src="<?=base_url()?>uploads/regionwise_galleries/<?=$form_data['representation_image']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } ?>

        <div class="form-group">
             <label class="col-lg-2 control-label"  >&nbsp;What You want to upload</label>
             <div class="col-lg-10">
                 <div class="radio">          
                <label><input type="radio" value="video" name="type" id="type0"  onclick="javascript:whatType(this.value);" ><i></i> Video</label>
                <label><input type="radio" value="url" name="type" id="type3" onclick="javascript:whatType(this.value);" ><i></i> Video URL</label>
              </div>
              </div>  
          </div>

          <div class="form-group" id="upload_div" style='display:none;'>
             <label class="col-lg-2 control-label"  id="type_label">&nbsp;</label>
             <div class="col-lg-10" id="upload-option">
                   <input type="file" name="str_name" id="str_name" />
                   <input type="hidden" name="str_name" id="str_name"  value="<?=@$form_data['str_name']?>"> 
              </div>  
          </div>

         <!-- <div class="form-group">
       <label class="col-lg-2 control-label">&nbsp;Thumbnail Title</label>
       <div class="col-lg-10">
         <input type="text" name="cat_name" class="form-control" value=""/>
        <span class="help-block text-danger">
                  
        </span>  
       </div>  
     </div>

          <div class="form-group"><label class="col-lg-2 control-label">Upload Thumbnail</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="file" name="thumbnail" id="thumbnail"  value=""> 
            <img src="" class="img-responsive">
            </div>
          </div>
        </div>-->

           
     <div class="hr-line-dashed"></div>
     <div class="form-group">
      <div class="col-sm-4 col-sm-offset-2">
       <a href="<?=site_url('webmaster/regionwise_gallery');?>" class="btn btn-white">Cancel</a>
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
<!-- Page-Level Scripts -->
<script>
$(document).ready(function() {
    $('.dataTables-example').dataTable({
        responsive: true,
        "aaSorting": []
    });
  
    $('.add_auto_field').on("click",function(event){
        event.preventDefault();
        var len = $('.auto-form-group').length;
        var chk_status = 'chk_status[' + len + ']';
        $('.auto-form-group').eq(len-1).clone().insertBefore($('.add_auto_field').parents('.form-group:eq(0)'));
        $('.auto-form-group').eq(len).find('.close_field:eq(0)').attr('id','close_field'+len);
        $('.auto-form-group').eq(len).find('input[type="text"]').val('');
        $('.auto-form-group').eq(len).find('input[type="checkbox"]').attr('value','1');
        $('.auto-form-group').eq(len).find('input[type="checkbox"]').attr('name',chk_status);
        $('.auto-form-group').eq(len).find('input[type="checkbox"]').prop('checked', false);
        $('.auto-form-group').eq(len).find('input[type="hidden"]').attr('value','0');
        $('.auto-form-group').eq(len).find('input[type="hidden"]').attr('name',chk_status);
        $('.auto-form-group').eq(len).find('input[type="file"]').attr('value','');
        //$('.auto-form-group').eq(len).find('input[type="hidden"]').attr('value','0');
        $('.auto-form-group').eq(len).find('img').remove();
    });
    
    //$('.close_field').on('click', function(events) {
    $('body').on('click', '.close_field', function (events) {
        events.preventDefault();
        var len = $('.auto-form-group').length;
        $(this).parents('.auto-form-group:eq(0)').remove();
    });
  
});

</script>
       <!-- Data Tables -->
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
<style>
.auto-form-group { border: 1px solid #ccc; padding: 10px; margin-bottom:10px; position:relative; }
.close_field { font-weight: bold; position: absolute; right: 10px; color:red; font-size:18px; z-index:10; }
</style>
</body>
</html>
