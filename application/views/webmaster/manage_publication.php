<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
  <!--<link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script> -->
  <link href="<?=base_url()?>webmaster_assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
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
            <li class="active"><strong><?=$btnCapt?> Publication</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/publication')?>">Back to the list</a>
          </div>
        </div>
      </div>
      <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
          <h5><?=$btnCapt?> Publication</h5>
         <div class="clearfix">&nbsp;</div>
        </div>
         <div class="ibox-content">
          <form action="<?=site_url('webmaster/publication/manage/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
              <input type="hidden" name="mode" value="<?=$btnCapt?>" />
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Title</label>
             <div class="col-lg-10">
                <input type="text" name="title" id="title" class="form-control" value="<?php if(@$userdata['title']!=""){ echo $userdata['title'];}else{ echo set_value('title');  } ?>" />
                <span class="help-block text-danger">
                  <?php if(form_error('title')!=""){  echo  form_error('title'); } ?>
                </span>  
              </div>  
          </div>
          <div class="form-group">
             <label class="col-lg-2 control-label"> Description main page </label>
             <div class="col-lg-10">                     
               <textarea name="description" id="description" class="form-control" ><?php if(@$userdata['description']!=""){ echo $userdata['description'];}else{ echo set_value('description');  } ?></textarea>
                <span class="help-block text-danger">
                  <?php if(form_error('description')!=""){  echo  form_error('description'); } ?>
                </span>  
              </div>
          </div>
          <div class="form-group">
             <label class="col-lg-2 control-label"> Detail page description</label>
             <div class="col-lg-10">                     
               <textarea name="description2" id="description2" class="form-control" ><?php if(@$userdata['description2']!=""){ echo $userdata['description2'];}else{ echo set_value('description2');  } ?></textarea>
                <span class="help-block text-danger">
                  <?php if(form_error('description2')!=""){  echo  form_error('description2'); } ?>
                </span>  
              </div>
          </div>
          <div class="form-group">
             <label class="col-lg-2 control-label">Number Of Pages </label>
              <div class="col-lg-10">
               <input type="text" class="form-control"  name="number_of_pages" id="number_of_pages"    value="<?php if(@$userdata['number_of_pages']!=""){ echo $userdata['number_of_pages'];}else{ echo set_value('number_of_pages');  } ?>" maxlength="12"> 
                 <span class="help-block text-danger">
                  <?php if(form_error('number_of_pages')!=""){  echo  form_error('number_of_pages'); } ?>
                </span> 
              </div>
           </div> 
 

            <div class="form-group">
             <label class="col-lg-2 control-label">Hardcover </label>
              <div class="col-lg-10">
                <input type="text" class="form-control" name="hardcover" id="hardcover" value="<?php if(@$userdata['hardcover']!=""){ echo $userdata['hardcover'];}else{ echo set_value('hardcover');  } ?>"> 
                 <span class="help-block text-danger">
                  <?php if(form_error('hardcover')!=""){  echo  form_error('hardcover'); } ?>
                </span> 
              </div>
           </div>

            <div class="form-group">
             <label class="col-lg-2 control-label">Softcover </label>
              <div class="col-lg-10">
                <input type="text" class="form-control" name="softcover" id="softcover" value="<?php if(@$userdata['softcover']!=""){ echo $userdata['softcover'];}else{ echo set_value('softcover');  } ?>"> 
                 <span class="help-block text-danger">
                  <?php if(form_error('softcover')!=""){  echo  form_error('softcover'); } ?>
                </span> 
              </div>
           </div>


            <div class="form-group">
             <label class="col-lg-2 control-label">ISBN </label>
              <div class="col-lg-10">
                 <input type="text" class="form-control"  name="isbn" id="isbn"   value="<?php if(@$userdata['isbn']!=""){ echo $userdata['isbn'];}else{ echo set_value('isbn');  } ?>"> 
                <span class="help-block text-danger">
                  <?php if(form_error('isbn')!=""){  echo  form_error('isbn'); } ?>
                </span> 
              </div>
           </div>

          <div class="form-group">
             <label class="col-lg-2 control-label">Price </label>
              <div class="col-lg-10">
                 <input type="text" class="form-control"  name="price" id="price"   value="<?php if(@$userdata['price']!=""){ echo $userdata['price'];}else{ echo set_value('price');  } ?>" maxlength="8"> 
                <span class="help-block text-danger">
                  <?php if(form_error('price')!=""){  echo  form_error('price'); } ?>
                </span> 
              </div>
           </div>
          <?php $artist=''; 
          if(@$userdata['artist_name']!=''){
            $artist = @explode(',',$userdata['artist_name']);
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
      
           <div class="form-group"><label class="col-lg-2 control-label">Product Component</label><div class="col-lg-10">
                 <input type="text" class="form-control"  name="add_to_cart2" id="add_to_cart2"   value="<?php if(@$userdata['add_to_cart2']!=""){ echo $userdata['add_to_cart2'];}else{ echo set_value('add_to_cart2');  } ?>"> 
                 <!--<textarea style="border-color:black;border-width:5px;" name="add_to_cart2" id="add_to_cart2" rows="30" class="form-control">
                     <?php if(@$userdata['add_to_cart2']!=""){echo trim($userdata['add_to_cart2']);}else{echo set_value('add_to_cart2');}?></textarea><span class="help-block text-danger">
                      <?php //if(form_error('add_to_cart')!=""){ echo form_error('add_to_cart'); } ?></span>
                    <span>Note: Don't include Javascript tag</span>-->
                </div>  
            </div>
            
            <div class="form-group">
                <label class="col-lg-2 control-label">Shopify Code</label>
                <div class="col-lg-10">
                    <textarea style="border-color:black;border-width:2px;" rows="30" name="add_to_cart" id="add_to_cart"  class="form-control"><?php if(@$userdata['add_to_cart']!=""){ echo trim($userdata['add_to_cart']);}else{$addcart= "<div id='product-component-944d070932e' style='margin-top: -56px !important;'></div>";echo trim($addcart);}?></textarea>
                    <span class="help-block text-danger"><?php //if(form_error('add_to_cart')!=""){ echo form_error('add_to_cart'); } ?></span>
                </div>  
            </div>


          <div class="form-group"><label class="col-lg-2 control-label">Book Picture </label>
            <div class="col-lg-10">
              <div class="radio i-checks">
               <input type="file" name="book_image" id="book_image"  <?php if($id==0){ ?> required <?php } ?>> 
               <input type="hidden" name="old_book_image" id="old_book_image"  value="<?=@$userdata['book_image']?>"> 
               <span style="font-size:10px;color:gray;">Image Size (236 X 307)<span>
              </div>
            </div>
          </div>

          <?php if(@$userdata['book_image']!=''){ ?>
            <div class="form-group"><label class="col-lg-2 control-label">Old Profile Pic</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
              <input type="hidden" name="old_book_image" id="old_book_image"  value="<?=@$userdata['book_image']?>"> 
              <img src="<?=base_url()?>uploads/publication_book_image/<?=$userdata['book_image']?>" class="img-responsive">
              </div>
            </div>
          </div>
          <?php } ?>


          <div class="form-group"><label class="col-lg-2 control-label">Large Horizontal Image</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
               <input type="file" name="large_image" id="large_image" <?php if($id==0){ ?> required <?php } ?> > 
               <input type="hidden" name="old_large_image" id="old_large_image"  value="<?=@$userdata['large_image']?>"> 
               <span style="font-size:10px;color:gray;">Image Size (1190 X 505)<span>
              </div>
            </div>
          </div>

          <?php if(@$userdata['large_image']!=''){ ?>
            <div class="form-group"><label class="col-lg-2 control-label">Old Large Pic</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
              <input type="hidden" name="old_large_image" id="old_large_image"  value="<?=@$userdata['large_image']?>"> 
              <img src="<?=base_url()?>uploads/publication_book_image/<?=$userdata['large_image']?>" class="img-responsive">
              </div>
            </div>
          </div>
          <?php } ?>



          <div class="form-group"><label class="col-lg-2 control-label">Detail Page Banner Image</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
               <input type="file" name="banner_image" id="banner_image" <?php if($id==0){ ?> required <?php } ?>> 
               <input type="hidden" name="old_banner_image" id="old_banner_image"  value="<?=@$userdata['banner_image']?>"> 
               <span style="font-size:10px;color:gray;">Image Size (1920 X 747)<span>
              </div>
            </div>
          </div>

          <?php if(@$userdata['banner_image']!=''){ ?>
            <div class="form-group"><label class="col-lg-2 control-label">Old Detailpage Banner Image</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
              <input type="hidden" name="old_banner_image" id="old_banner_image"  value="<?=@$userdata['banner_image']?>"> 
              <img src="<?=base_url()?>uploads/publication_book_image/<?=$userdata['banner_image']?>" class="img-responsive">
              </div>
            </div>
          </div>
          <?php } ?>



          <div class="form-group"><label class="col-lg-2 control-label">Detail Page Book Image</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
               <input type="file" name="book_image2" id="book_image2" <?php if($id==0){ ?> required <?php } ?>> 
               <input type="hidden" name="old_book_image2" id="old_book_image2"  value="<?=@$userdata['book_image2']?>"> 
               <span style="font-size:10px;color:gray;">Image Size (305 X 268)<span>
              </div>
            </div>
          </div>

          <?php if(@$userdata['book_image2']!=''){ ?>
            <div class="form-group"><label class="col-lg-2 control-label">Old Detail Page Book Image</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
              <input type="hidden" name="old_book_image2" id="old_book_image2"  value="<?=@$userdata['book_image2']?>"> 
              <img src="<?=base_url()?>uploads/publication_book_image/<?=$userdata['book_image2']?>" class="img-responsive">
              </div>
            </div>
          </div>
          <?php } ?>
        
          <div class="hr-line-dashed"></div>
          <div class="form-group">
          <div class="col-sm-4 col-sm-offset-2">
          <a href="<?=site_url('webmaster/user');?>" class="btn btn-white">Cancel</a>
          <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Publication" name="btnsave">
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
        <!-- <script src="<?=base_url()?>webmaster_assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(document).ready(function () {
          $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
          });
        });
       </script>-->

   <!-- Data picker -->
       <script src="<?=base_url()?>webmaster_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
       <script type="text/javascript">
      $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
       </script>
       <script type="text/javascript">
        function isFeature(str){
          if(str=='1'){
               $("#data_1").show();
          }else if(str=='0'){
               $("#data_1").hide();
          }else{
               $("#data_1").hide();
          }
       }
       </script>
      </body>
     </html>