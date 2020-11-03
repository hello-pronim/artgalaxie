<!DOCTYPE html>
<html>
<head>
<? $this->load->view('webmaster/template/head'); ?>
<link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
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
          <h2>Original Artwork</h2>
          <ol class="breadcrumb">
            <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
            <li><a>Manage Original Artwork</a></li>
            <li class="active"><strong><?=$btnCapt?> Original Artwork</strong></li>
          </ol>
        </div>
        <div class="col-lg-4"><div class="title-action">
            <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/products')?>">Back to the list</a>
          </div>
        </div>
      </div>
	    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
            <div class="ibox-title">
    			<h5><?=$btnCapt?> Original Artwork</h5>
    		 <div class="clearfix">&nbsp;</div>
    		</div>
         <div class="ibox-content">
           <? if($this->session->flashdata('Error')){?>
          <div class="alert alert-danger alert-dismissable" align="center">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <?=$this->session->flashdata('Error')?>
          </div>
          <? } ?>
          <form  enctype="multipart/form-data"  action="<?=site_url('webmaster/products/manage_products/'.$id)?>" method="post"  name="frm" id="frm" class="form-horizontal">
              <?php //echo "<pre>"; print_r($dataDs); echo "</pre>"; ?>
          <input type="hidden" name="product_mode" value="1"> 
          
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Title</label>
             <div class="col-lg-10">
                <input type="text" name="product_title" id="product_title" class="form-control" value="<?php if(@$dataDs['product_title']!=""){ echo $dataDs['product_title'];}else{ echo set_value('product_title');  } ?>"  required/>
                <span class="help-block text-danger">
                  <?php if(form_error('product_title')!=""){  echo  form_error('product_title'); } ?>
                </span>  
              </div>  
          </div>
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Year</label>
             <div class="col-lg-10">
              <input type="text" name="product_year" id="product_year" class="form-control" value="<?php if(@$dataDs['product_year']!=""){ echo $dataDs['product_year'];}else{ echo set_value('product_year');  } ?>"  required/>
                 <span class="help-block text-danger">
                  <?php if(form_error('product_year')!=""){  echo  form_error('product_year'); } ?>
                </span>  
              </div>  
          </div>
          

          <div class="form-group">
             <label class="col-lg-2 control-label">Description</label>
              <div class="col-lg-10">
                <textarea name="product_desc" id="product_desc"  required><?php if(@$dataDs['product_desc']!=""){ echo $dataDs['product_desc'];}else{ echo set_value('product_desc');  } ?></textarea> 
                 <script>
                  CKEDITOR.replace('product_desc', {
                    "filebrowserImageUploadUrl": "<?=site_url('webmaster/blog/ck_imageupload')?>"
                  });
                  </script>
                 <span class="help-block text-danger">
                  <?php if(form_error('product_desc')!=""){  echo  form_error('product_desc'); } ?>
                </span> 
                 
              </div>
          </div>

        <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Artist Name</label>
             <div class="col-lg-10">
              <select name="artist_id" id="artist_id" class="form-control" required>
                <option value="0">Select Artist Name</option>
                <?php  foreach($artistDs as $artistRs){  ?>
                  <option value="<?=$artistRs['id']?>" <?php if($artistRs['id']==@$dataDs['artist_id']){ ?>  selected = "selected" <?php } ?> ><?=stripslashes($artistRs['first_name'].' '.$artistRs['last_name'])?> </option>
                <?php } ?>
              </select>
                
                <span class="help-block text-danger">
                  <?php if(form_error('art_cat')!=""){  echo  form_error('art_cat'); } ?>
                </span>  
              </div>  
          </div>
          

          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Category</label>
             <div class="col-lg-10">
              <select name="art_cat" id="art_cat" class="form-control" required>
                <option value="0">Select Art Category</option>
                <?php  foreach($artCatRs as $artCat){  ?>
                  <option value="<?=$artCat['cat_id']?>" <?php if($artCat['cat_id']==@$dataDs['art_cat']){ ?>  selected = "selected" <?php } ?> ><?=$artCat['cat_name']?> </option>
                <?php } ?>
              </select>
                <span class="help-block text-danger">
                  <?php if(form_error('art_cat')!=""){  echo  form_error('art_cat'); } ?>
                </span>  
              </div>  
          </div>

          
            <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Medium</label>
             <div class="col-lg-10">
              
              <select name="medium" id="medium" class="form-control">
               <option value="0">Select Medium</option>
                <?php  foreach($artCatMedium as $artMed){  ?>
                  <option value="<?=$artMed['id']?>" <?php if($artMed['id']==@$dataDs['medium']){ ?>  selected = "selected" <?php } ?> ><?=$artMed['medium']?></option>
                <?php } ?>
                </select>
                <span class="help-block text-danger">
                  <?php if(form_error('medium')!=""){  echo  form_error('medium'); } ?>
                </span>  
              </div>  
          </div>
          
          
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Style</label>
             <div class="col-lg-10">
              <select name="style" id="style" class="form-control">
                <option value="0">Select Style</option>
                <?php  foreach($artCatStyle as $artstyle){  ?>
                  <option value="<?=$artstyle['cat_id']?>" <?php if($artstyle['cat_id']==@$dataDs['style']){ ?>  selected = "selected" <?php } ?> ><?=$artstyle['cat_name']?> </option>
                <?php } ?>
              </select>
                <span class="help-block text-danger">
                  <?php if(form_error('style')!=""){  echo  form_error('style'); } ?>
                </span>  
              </div>  
          </div>
          
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Subject</label>
             <div class="col-lg-10">
              <select name="subject" id="subject" class="form-control">
                <?php  foreach($artCatSubject as $artsubject){  ?>
                  <option value="<?=$artsubject['id']?>" <?php if($artsubject['id']==@$dataDs['subject']){ ?>  selected = "selected" <?php } ?> ><?=$artsubject['subject_name']?></option>
                <?php } ?>
              </select>
                <span class="help-block text-danger">
                  <?php if(form_error('subject')!=""){  echo  form_error('subject'); } ?>
                </span>  
              </div>  
          </div>
          
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Region</label>
             <div class="col-lg-10">
              <select name="region" id="region" class="form-control">
                <option value="0">Select Region</option>
                <?php  foreach($artCatRegion as $artregion){  ?>
                 <option value="<?=$artregion['id']?>" <?php if($artregion['id']==@$dataDs['region']){ ?>  selected = "selected" <?php } ?> ><?=$artregion['region_name']?></option>
                <?php } ?>
              </select>
                
                <span class="help-block text-danger">
                  <?php if(form_error('region')!=""){  echo  form_error('region'); } ?>
                </span>  
              </div>  
          </div>
          
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Country</label>
             <div class="col-lg-10">
              <select name="country" id="country" class="form-control">
                <option value="0">Select Country</option>
                <?php  foreach($artCatcountry as $countryname){  ?>
                <option value="<?=$countryname['id']?>" <?php if($countryname['id']==@$dataDs['country']){ ?>  selected = "selected" <?php } ?> ><?=$countryname['country_name']?></option>
                <?php } ?>
              </select>
                <span class="help-block text-danger">
                  <?php if(form_error('country')!=""){  echo  form_error('country'); } ?>
                </span>  
              </div>  
          </div>
          
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;City</label>
             <div class="col-lg-10">
              <select name="city" id="city" class="form-control">
                <option value="0">Select City</option>
                <?php  foreach($artCatcity as $cityname){  ?>
                   <option value="<?=$cityname['id']?>" <?php if($cityname['id']==@$dataDs['city']){ ?>  selected = "selected" <?php } ?> ><?=$cityname['city_name']?></option>
                <?php } ?>
              </select>
                
                <span class="help-block text-danger">
                  <?php if(form_error('city')!=""){  echo  form_error('city'); } ?>
                </span>  
              </div>  
          </div>
          
          
            <?php /* ?><div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Orientation</label>
             <div class="col-lg-10">
              <select name="dimetion" id="dimetion" class="form-control">
                <option value="">Select Dimention</option>
                <?php  foreach($dimetion as $dimetionRs){  ?>
                  <option value="<?=$dimetionRs['id']?>" <?php if($dimetionRs['id']==@$dataDs['product_dimention']){ ?>  selected = "selected" <?php } ?> ><?=$dimetionRs['title']?> </option>
                <?php } ?>
              </select>
                
                <span class="help-block text-danger">
                  <?php if(form_error('dimetion')!=""){  echo  form_error('dimetion'); } ?>
                </span>  
              </div>  
          </div>
          <?php */ ?>
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Size Category</label>
             <div class="col-lg-10">
              <select name="size" id="size" class="form-control" >
                <option value="0">Select Size</option>
                <?php  foreach($artCatSize as $size){  ?>
                <option value="<?=$size['id']?>" <?php if($size['id']==@$dataDs['size']){ ?>  selected = "selected" <?php } ?> ><?=$size['size']?></option>
                <?php } ?>
              </select>
                
                <span class="help-block text-danger">
                  <?php if(form_error('size')!=""){  echo  form_error('size'); } ?>
                </span>  
              </div>  
          </div>
          
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Actual Size</label>
             <div class="col-lg-10">
                
                <?php if(@$dataDs['actual_size']){?>
                 <input type="text" name="actual_size" id="actual_size" class="form-control" value="<?php if($dataDs['actual_size']!=""){ echo $dataDs['actual_size'];}else{ echo set_value('actual_size');  } ?>" required />             
                 <?php }else{?>
                 <input type="text" name="actual_size" id="actual_size" class="form-control" value="" required />
                <?php } ?>
                <span class="help-block text-danger">
                  <?php if(form_error('actual_size')!=""){  echo  form_error('actual_size'); } ?>
                </span>  
              </div>  
          </div>
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Price Range</label>
             <div class="col-lg-10">
                 <?php if(@$dataDs['pricecrange']){?>
                    <select name="pricerange" id="pricerange" class="form-control" >
                    <option value="0">Select Price Range</option>
                    <?php  foreach($artCatPriceRange as $pricerange){  ?>
                    <option value="<?=$pricerange['id']?>" <?php if($pricerange['id']==@$dataDs['pricerange']){ ?>  selected = "selected" <?php } ?> ><?=$pricerange['price_range']?></option>
                    <?php } ?>
                    </select>
                 <?php }else{?>
                    <select name="pricerange" id="pricerange" class="form-control" >
                    <option value="0">Select Price Range</option>
                    <?php  foreach($artCatPriceRange as $pricerange){  ?>
                    <option value="<?=$pricerange['id']?>"><?=$pricerange['price_range']?></option>
                    <?php } ?>
                    </select>
                <?php } ?>
                <span class="help-block text-danger">
                  <?php if(form_error('pricerange')!=""){  echo  form_error('pricerange'); } ?>
                </span>  
              </div>  
          </div>
          
          
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Actual Price</label>
             <div class="col-lg-10">
                 
                 <?php if(@$dataDs['product_price']){?>
                 <input type="text" name="product_price" id="product_price" class="form-control" value="<?php if($dataDs['product_price']!=""){ echo $dataDs['product_price'];}else{ echo set_value('product_price');  } ?>" required />
                 <?php }else{?>
                 <input type="text" name="product_price" id="product_price" class="form-control" value="" required />
                <?php } ?>
                
                
                
                <span class="help-block text-danger">
                  <?php if(form_error('product_price')!=""){  echo  form_error('product_price'); } ?>
                </span>  
              </div>  
          </div>
          
          
          <div class="form-group">
            <label class="col-lg-2 control-label">&nbsp;Product Component</label>
            <div class="col-lg-10">
                <?php 
                if(@$dataDs['add_to_cart']!="")
                { 
                ?>
                    <input type="text" name="add_to_cart" id="add_to_cart" class="form-control" value="<?php echo trim($dataDs['add_to_cart']); ?>">
                <?php
                }else{
                    ?>
                    <input type="text" name="add_to_cart" id="add_to_cart" class="form-control" value="">
                    <?php
                }
                ?>
            </div>  
        </div>
        
        <div class="form-group">
            <label class="col-lg-2 control-label">&nbsp;Shopify Code</label>
            <div class="col-lg-10">
				<textarea class="form-control" rows="30" name="add_to_cart2" id="add_to_cart2"><?php if(@$dataDs['add_to_cart2']!=""){ echo $dataDs['add_to_cart2'];}else{ echo set_value('add_to_cart2');  } ?></textarea>
				<span class="help-block text-danger">
                  <?php if(form_error('add_to_cart2')!=""){  echo  form_error('add_to_cart2'); } ?>
         </span>  
            </div>  
        </div>
               
               
               <?php 
                $artist=''; 
                if(@$dataDs['colour_type']!='')
                {
                    $ct = @explode(',',$dataDs['colour_type']); 
                }
                ?>
                <div class="form-group">
                 <label class="col-lg-2 control-label">Select Color</label>
                  <div class="col-lg-10">
                      <?php foreach ($color as $colorRs) { ?>
                         <input type="checkbox" name="colour_type[]" value="<?=$colorRs['id']?>" <?php if(@in_array($colorRs['id'],$ct,true)){ ?>  checked <?php } ?> style="height: 17px; margin: 0px;width: 20px;">
                         <?php if($colorRs['title']=='Dark Blue'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #00008b;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Black'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #000000;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Grey'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #808080;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Coffee'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #6f4e37;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Green'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #008000;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Yellow'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #ffff00;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Orange'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #ffa500;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Orangered'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #ff4500;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Red'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #ff0000;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Purple'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #800080;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Indigo'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #4b0082;"></div>
                            <?php } ?>
                            
                            <?php if($colorRs['title']=='Blue'){ ?>
                            <div id="square" style="width: 30px;height: 30px; background: #0000ff;"></div>
                            <?php } ?>
                         
                      <?php }?>
                  </div>
                </div>
                            
               
          
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Units</label>
             <div class="col-lg-10">
              <select name="units" id="units" class="form-control" >
                <option value="0">Select Units</option>
                <?php  foreach($artCatunits as $artCatu){  ?>
                <option value="<?=$artCatu['id']?>" <?php if($artCatu['id']==@$dataDs['units']){ ?>  selected = "selected" <?php } ?> ><?=$artCatu['units']?></option>
                <?php } ?>
              </select>
                
                <span class="help-block text-danger">
                  <?php if(form_error('pricerange')!=""){  echo  form_error('pricerange'); } ?>
                </span>  
              </div>  
          </div>
          
           <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Orientation</label>
             <div class="col-lg-10">
              <select name="orientation" id="orientation" class="form-control" >
                <option value="0">Select Orientation</option>
                <?php  foreach($artOrientation as $arto){  ?>
                <option value="<?=$arto['id']?>" <?php if($arto['id']==@$dataDs['orientation']){ ?>  selected = "selected" <?php } ?> ><?=$arto['orientation']?></option>
                <?php } ?>
              </select>
                
                <span class="help-block text-danger">
                  <?php if(form_error('orientation')!=""){  echo  form_error('orientation'); } ?>
                </span>  
              </div>  
          </div>
          
          <div class="form-group">
             <label class="col-lg-2 control-label">Picture</label>
              <div class="col-lg-10">
                <input type="file" value="" name="prod_image" class="" id="photo" <? if($id==0){ ?> required <? } ?>>
                 <span class="help-block text-danger">
                  <?php if(form_error('prod_image')!=""){  echo  form_error('prod_image'); } ?>
                </span>  
              </div>
           </div>
 
           <? if(@$dataDs['product_images']!='' && $id>0){ ?>
            <div class="form-group">
             <label class="col-lg-2 control-label">Old Picture</label>
              <div class="col-lg-10">
                 <input type="hidden" name="old_prod_image" id="old_prod_image" value="<?=$dataDs['product_images']?>" required> 
                  <img src="<?=base_url()?>uploads/products/<?=$dataDs['product_images']?>" width="30%" class="image-responsive">
              </div>
           </div>  
           <? } ?>
            
            <div class="form-group"><label class="col-lg-2 control-label">Curators Choice</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                
                <label>
                    <input type="radio" value="1" name="cur_choice" id="cur_choice" 
                    <?php 
                        if(@$dataDs['cur_choice']=='1')
                        { 
                        ?> 
                        checked="checked" 
                        <? 
                        } 
                        if(set_value('cur_choice')=='1')
                        {  
                        ?> 
                        checked="checked" 
                        <? 
                        } 
                        ?>><i></i> 
                    Yes 
                    </label>
                
                <label><input type="radio" value="0" name="cur_choice" id="cur_choice" <? if(@$dataDs['cur_choice']=='0'){  ?> checked="checked" <? } if(set_value('cur_choice')=='0'){  ?> checked="checked" <? } ?>  ><i></i> No </label>
                
                <span class="help-block text-danger">
                  <?php if(form_error('cur_choice')!=""){  echo  form_error('cur_choice'); } ?>
                </span> 
              </div>
            </div>
          </div>
          
          <div class="form-group"><label class="col-lg-2 control-label">Sold</label>
            <div class="col-lg-10">
              <div class="radio i-checks">
                <label><input type="radio" value="1" name="sold" id="sold" 
                  <? if(@$dataDs['sold']=='1'){ ?> checked="checked" <? } if(set_value('sold')=='1'){  ?> checked="checked" <? } ?>><i></i> Yes </label>
                <label><input type="radio" value="0" name="sold" id="sold" <? if(@$dataDs['sold']=='0'){  ?> checked="checked" <? } if(set_value('sold')=='0'){  ?> checked="checked" <? } ?>  ><i></i> No </label>
                <span class="help-block text-danger">
                  <?php if(form_error('sold')!=""){  echo  form_error('sold'); } ?>
                </span> 
              </div>
            </div>
          </div>
          
          <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Sort Order</label>
             <div class="col-lg-10">
              <input type="text" name="sort_order" id="sort_order" class="form-control" value="<?php if(@$dataDs['sort_order']!=""){ echo $dataDs['sort_order'];}else{ echo set_value('sort_order');  } ?>"  required/>
                 <span class="help-block text-danger">
                  <?php if(form_error('sort_order')!=""){  echo  form_error('sort_order'); } ?>
                </span>  
              </div>  
          </div>

           <div class="hr-line-dashed"></div>
           <div class="form-group">
					  <div class="col-sm-4 col-sm-offset-2">
              <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Products" name="btnsave">
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
         <script src="<?=base_url()?>webmaster_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
          <script src="<?=base_url()?>webmaster_assets/js/bootstrap-colorpicker.js"></script>
         <!-- iCheck -->
        <script src="<?=base_url()?>webmaster_assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(document).ready(function () {
          $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
          });
          
          /*$('body').on('click', '.close_field', function (events) {
            events.preventDefault();
            var len = $('.auto-form-group').length;
            $(this).parents('.auto-form-group:eq(0)').remove();
          });*/
            
        });

           $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
            $('#country').change(function () {
                var citydt = ''; var html = '';
                jQuery.ajax({
                    type: "POST",
                    url: "<?=base_url()?>shop/citylist",
                    dataType : 'html',
                    data: {           
                        countryId: $(this).val()
                    },
                    cache: false,
                    success:  function(data)
                    { 
                        var res  = data.split('####');
                        if(res[0]=='Done')
                        {
                            citydt = '<option value="0">Select City</option>';
                            jQuery('select#city').html(citydt);
                            html = $.parseHTML( res[1] );
                            jQuery('select#city').append(html);
                        }else{
                            alert('Something went wrong,Please try again later.!');
                        }
                    }
                });
            });
            
            $('#region').change(function () {
                var cntrydt = ''; var html = '';
                jQuery.ajax({
                    type: "POST",
                    url: "<?=base_url()?>shop/countrylist",
                    dataType : 'html',
                    data: {           
                        regionId: $(this).val()
                    },
                    cache: false,
                    success:  function(data)
                    { 
                        var res  = data.split('####');
                        if(res[0]=='Done')
                        {
                            cntrydt = '<option value="0">Select Country</option>';
                            jQuery('select#country').html(cntrydt);
                            html = $.parseHTML( res[1] );
                            jQuery('select#country').append(html);
                            $('#country').trigger('change');
                        }else{
                            alert('Something went wrong,Please try again later.!');
                        }
                    }
                });
            });
            
        </script>
        
      <!-- Mainly scripts -->
<? $this->load->view('webmaster/template/bot_script'); ?>

			 </body>
     </html>