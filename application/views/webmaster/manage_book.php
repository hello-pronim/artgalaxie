<!DOCTYPE html>
<html>
<head>
    <? $this->load->view('webmaster/template/head'); ?>
    <link href="<?=base_url()?>webmaster_assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
    <link href="<?=base_url()?>webmaster_assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <script src="<?=base_url()?>webmaster_assets/ckeditor/ckeditor.js"></script>
</head>
<body >
    <div id="wrapper">
        <!--- Nav start -->
        <?php $this->load->view('webmaster/template/left_nav'); ?>
        <!--- Nav end -->
        <div id="page-wrapper" class="gray-bg dashbard-1">
        <?php $this->load->view('webmaster/template/top'); ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2>Books</h2>
                <ol class="breadcrumb">
                    <li><a href="<?=site_url('dashboard')?>">Dashboard</a></li>
                    <li><a>Shop</a></li>
                    <li class="active"><strong><?=$btnCapt?> Books</strong></li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/shop')?>">Back to the list</a>
                </div>
            </div>
        </div>
	    <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
    			            <h5><?=$btnCapt?> Books</h5>
    		                <div class="clearfix">&nbsp;</div>
    		            </div>
                        <div class="ibox-content">
                            <?php if($this->session->flashdata('Error')){ ?>
                            <div class="alert alert-danger alert-dismissable" align="center">
                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                <?=$this->session->flashdata('Error')?>
                            </div>
                            <?php } ?>
                        <form  enctype="multipart/form-data" action="<?=site_url('webmaster/shop/manage_book/'.$id)?>" method="post" name="frm" id="frm" class="form-horizontal">
                            <input type="hidden" name="book_mode" value="1"> 
          
                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;Title</label>
                                <div class="col-lg-10">
                                    <input type="text" name="book_title" id="book_title" class="form-control" value="<?php if(@$dataDs['book_title']!=""){ echo $dataDs['book_title']; }else{ echo set_value('book_title'); } ?>" required/>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('book_title')!=""){ echo form_error('book_title'); } ?>
                                    </span>  
                                </div>  
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;Take a look inside</label>
                                <div class="col-lg-10">
                                    <input type="text" name="look_inside" id="look_inside" class="form-control" value="<?php if(@$dataDs['take_a_look_inside']!=""){ echo $dataDs['take_a_look_inside']; }else{ echo set_value('look_inside'); } ?>"/>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('look_inside')!=""){ echo form_error('look_inside'); } ?>
                                    </span>  
                                </div>  
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Description</label>
                                <div class="col-lg-10">
                                    <textarea name="book_desc" id="book_desc" required><?php if(@$dataDs['book_desc']!=""){ echo $dataDs['book_desc']; }else{ echo set_value('book_desc'); } ?></textarea> 
                                    <script>
                                        CKEDITOR.replace('book_desc', {
                                        "filebrowserImageUploadUrl": "<?=site_url('webmaster/blog/ck_imageupload')?>"
                                        });
                                    </script>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('book_desc')!=""){ echo form_error('book_desc'); } ?>
                                    </span> 
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;Number Of Pages</label>
                                <div class="col-lg-10">
                                    <input type="text" name="number_of_pages" id="number_of_pages" class="form-control" value="<?php if(@$dataDs['number_of_pages']!=""){ echo $dataDs['number_of_pages']; }else{ echo set_value('number_of_pages'); } ?>" required/>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('number_of_pages')!=""){ echo form_error('number_of_pages'); } ?>
                                    </span>  
                                </div>  
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;Hardcover</label>
                                <div class="col-lg-10">
                                    <input type="text" name="hardcover" id="hardcover" class="form-control" value="<?php if(@$dataDs['hardcover']!=""){ echo $dataDs['hardcover']; }else{ echo set_value('hardcover'); } ?>"/>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('hardcover')!=""){ echo form_error('hardcover'); } ?>
                                    </span>  
                                </div>  
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;Softcover</label>
                                <div class="col-lg-10">
                                    <input type="text" name="softcover" id="softcover" class="form-control" value="<?php if(@$dataDs['softcover']!=""){ echo $dataDs['softcover']; }else{ echo set_value('softcover'); } ?>"/>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('softcover')!=""){ echo form_error('softcover'); } ?>
                                    </span>  
                                </div>  
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;eBook</label>
                                <div class="col-lg-10">
                                    <input type="text" name="ebook" id="ebook" class="form-control" value="<?php if(@$dataDs['ebook']!=""){ echo $dataDs['ebook']; }else{ echo set_value('ebook'); } ?>"/>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('ebook')!=""){ echo form_error('ebook'); } ?>
                                    </span>  
                                </div>  
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;ISBN</label>
                                <div class="col-lg-10">
                                    <input type="text" name="isbn" id="isbn" class="form-control" value="<?php if(@$dataDs['isbn']!=""){ echo $dataDs['isbn']; }else{ echo set_value('isbn'); } ?>" required/>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('isbn')!=""){ echo form_error('isbn'); } ?>
                                    </span>  
                                </div>  
                            </div>
                            
                            <div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;Price</label>
                                <div class="col-lg-10">
                                    <input type="text" name="book_price" id="book_price" class="form-control" value="<?php if(@$dataDs['book_price']!=""){ echo $dataDs['book_price'];}else{ echo set_value('book_price'); } ?>" required />
                                    <span class="help-block text-danger">
                                        <?php if(form_error('book_price')!=""){ echo form_error('book_price'); } ?>
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
                            <!--<div class="form-group">
                                <label class="col-lg-2 control-label">&nbsp;Add to Cart2</label>
                                <div class="col-lg-10">
                                    <textarea style="border-color:black;border-width:5px;" name="add_to_cart2" id="add_to_cart2" rows="30" class="form-control">
                                    <?php 
                                    if(@$dataDs['add_to_cart2']!="")
                                    { 
                                        echo $dataDs['add_to_cart2'];
                                        
                                    }
                                    else
                                    { 
                                        echo set_value('add_to_cart2'); 
                                    } 
                                    ?>
                                    </textarea>
                                    <span class="help-block text-danger">
                                        <?php /*if(form_error('add_to_cart')!=""){ echo form_error('add_to_cart'); }*/ ?>
                                    </span>
                                    <span>Note: Don't include Javascript tag</span>
                                </div>  
                            </div>
                            -->
                            <div class="hr-line-dashed"></div>
                            
                            <?php
                                $filterArray =  array();
                                $filterArray = @explode(',',@$dataDs['book_type']);?>
            
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Menu Filter</label>
                                <div class="col-lg-10">
                                    <select name="book_type[]" id="book_type" class="form-control" multiple="multiple">
                                        <?php foreach ($filter as $filterRs) { ?>
                                        <option value="<?=$filterRs['id']?>" <?php if( @in_array($filterRs['id'],$filterArray,true)){ ?> selected="selected" <?php } ?>><?=stripslashes($filterRs['book_filter_name'])?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('book_type')!=""){ echo  form_error('book_type'); } ?>
                                    </span>
                                </div>  
                            </div>
 
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Book Picture</label>
                                <div class="col-lg-10">
                                    <input type="file" value="" name="book_image" class="" id="photo" <? if($id==0){ ?> required <? } ?>>
                                    <span class="help-block text-danger">
                                        <?php if(form_error('book_image')!=""){ echo  form_error('book_image'); } ?>
                                    </span>  
                                </div>
                            </div>
                            
                            <?php if(@$dataDs['book_images']!='' && $id>0){ ?>
                            <div class="form-group">
                                <label class="col-lg-2 control-label">Old Profile Pic</label>
                                <div class="col-lg-10">
                                    <input type="hidden" name="old_book_image" id="old_book_image" value="<?=$dataDs['book_images']?>" required> 
                                    <img src="<?=base_url()?>uploads/shop/books/<?=$dataDs['book_images']?>" width="30%" class="image-responsive">
                                </div>
                            </div>  
                            <?php } ?>
                            
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
					        <div class="col-sm-2">
                                <a href="<?=site_url('webmaster/shop');?>" class="btn btn-white">Cancel</a>
						    </div>
						    <div class="col-sm-2">
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
         <script src="<?=base_url()?>webmaster_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
         <!-- iCheck -->
        <script src="<?=base_url()?>webmaster_assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
        $(document).ready(function () {
          $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
          });
        });

           $('#data_1 .input-group.date').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });
        </script>
	</body>
</html>