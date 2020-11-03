<!DOCTYPE html>
<html>
<head>
  <? $this->load->view('webmaster/template/head'); ?>
  <script src="<?=base_url()?>webmaster_assets/js/jquery-2.1.1.js"></script>
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
          <li><a>Manage Testimonials</a></li>
          <li class="active"><strong><?=$btnCapt?> Testimonials</strong></li>
        </ol>
      </div>
      <div class="col-lg-4"><div class="title-action">
        <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/testimonials')?>">Back to the list</a>
      </div>
    </div>
  </div>
  <div class="wrapper wrapper-content animated fadeInRight">
    <div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
      <div class="ibox-title">
       <h5><?=$btnCapt?> Testimonials</h5>
       <div class="clearfix">&nbsp;</div>
     </div>
     <div class="ibox-content">
       <form action="<?=site_url('webmaster/testimonials/manage/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Title</label>
         <div class="col-lg-10">
          <input type="text" name="testo_title" id="testo_title" class="form-control" value="<?php if(@$dataDs['testo_title']!=""){ echo $dataDs['testo_title'];}else{ echo set_value('testo_title');  } ?>" />
          <span class="help-block text-danger">
            <?php if(form_error('testo_title')!=""){  echo  form_error('testo_title'); } ?>
          </span>  
        </div>  
      </div>
      <div class="form-group">
       <label class="col-lg-2 control-label">&nbsp;Services </label>
       <div class="col-lg-10">
        <select name="testo_about" id="testo_about" class="form-control">
          <option value="">Which service would you like to comment on</option>
          <option value="Art Galaxie" <?  if(@$dataDs['testo_about']=="Art Galaxie"){ ?> selected="selected" <? }?> >Art Galaxie</option>
          <option value="Publications" <? if(@$dataDs['testo_about']=="Publications"){ ?> selected="selected" <? }?> >Publications</option>
        </select>
        
      <span class="help-block text-danger">
        <?php if(form_error('testo_about')!=""){  echo  form_error('testo_about'); } ?>
      </span> 
      </div>   
    </div>
      
      <div class="form-group">
       <label class="col-lg-2 control-label">Description </label>
       <div class="col-lg-10">
        <textarea name="testo_description" id="testo_description"  class="form-control" rows="12"><?php if(@$dataDs['testo_description']!=""){ echo $dataDs['testo_description']; }else{ echo set_value('testo_description');  } ?></textarea> 
        <span class="help-block text-danger">
          <?php if(form_error('testo_description')!=""){  echo  form_error('testo_description'); } ?>
        </span> 
      </div>
    </div>
    
    <div class="form-group">
             <label class="col-lg-2 control-label">&nbsp;Artist Name</label>
             <div class="col-lg-10">
              <select name="artist_id" id="artist_id" class="form-control" required style="width:200px">
                <?php  foreach($artistDs as $artistRs){  ?>
                  <option value="<?=$artistRs['id']?>" <?php if($artistRs['id']==@$dataDs['testo_added_by']){ ?>  selected = "selected" <?php } ?> ><?=stripslashes($artistRs['first_name'].' '.$artistRs['last_name'])?> </option>
                <?php } ?>
              </select>
                
              </div>  
          </div>
          
          
       <div class="form-group">
         <label class="col-lg-2 control-label">Image</label>
         <div class="col-lg-10">
          <input type="file" value="" name="testo_image" class="" id="photo" <? if($id==0){ ?> required <? } ?>>
        </div>
       </div>
      <?php   if(@$dataDs['testo_image']!=""){  ?>
      <? if(@$dataDs['testo_image']!='' && $id>0){ ?>
      <div class="form-group">
       <label class="col-lg-2 control-label">Already Added Image</label>
       <div class="col-lg-10">
         <input type="hidden" name="old_testo_image" id="old_testo_image" value="<?=$dataDs['testo_image']?>"> 
         <img src="<?=base_url()?>uploads/testimonials/<?=$dataDs['testo_image']?>" width="30%" class="image-responsive">
       </div>
     </div>  
      <? } } ?>

        <div class="form-group"><label class="col-lg-2 control-label">Is Approve?</label>
            <div class="col-lg-10" >
                <?php if(empty($dataDs['is_approve'])){ ?>
                <div>
                    <label><input type="radio" value="1" name="is_approve" id="is_approve1"><i></i> Yes </label>
                    <label><input type="radio" value="0" name="is_approve" id="is_approve"><i></i> No </label>
                </div>
                <?php
                }else{ ?>
                <div>
                    <label><input type="radio" value="1" name="is_approve" id="is_approve1" 
                    <? echo $dataDs['is_approve']; if($dataDs['is_approve']==1){ ?> checked="checked" <? } ?>  ><i></i> Yes </label>
                    <label><input type="radio" value="0"   name="is_approve"  id="is_approve" <? if($dataDs['is_approve']==0){  ?> checked="checked" <? } ?> ><i></i> No </label>
                    <span class="help-block text-danger">
                        <?php if(form_error('is_approve')!=""){  echo  form_error('is_approve'); } ?>
                    </span> 
                </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="form-group"><label class="col-lg-2 control-label">Display?</label>
            <div class="col-lg-10" >
                <?php if(empty($dataDs['display'])){ ?>
                <div>
                    <label><input type="radio" value="1" name="display" id="display1"><i></i> Yes </label>
                    <label><input type="radio" value="0" name="display" id="display"><i></i> No </label>
                </div>
                <?php
                }else{ ?>
                <div>
                    <label><input type="radio" value="1" name="display" id="is_approve1" 
                    <? echo $dataDs['display']; if($dataDs['display']==1){ ?> checked="checked" <? } ?>  ><i></i> Yes </label>
                    <label><input type="radio" value="0"   name="display"  id="display" <? if($dataDs['display']==0){  ?> checked="checked" <? } ?> ><i></i> No </label>
                    <span class="help-block text-danger">
                        <?php if(form_error('display')!=""){  echo  form_error('display'); } ?>
                    </span> 
                </div>
                <?php
                }
                ?>
            </div>
        </div>
 
 <div class="hr-line-dashed"></div>
 <div class="form-group">
   <div class="col-sm-4 col-sm-offset-2">
     <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?> Testimonials" name="btnsave">
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
</body>
</html>