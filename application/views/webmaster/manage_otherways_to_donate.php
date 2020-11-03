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
      <a class="btn btn-primary pull-right" href="<?=site_url('webmaster/art_of_giving')?>">Back to the list</a>
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
    <form action="<?=site_url('webmaster/art_of_giving/manage_otherways_to_donate/'.$id)?>" method="post" enctype="multipart/form-data" name="frm" id="frm" class="form-horizontal">
      
      
            <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp; Title</label>
         <div class="col-lg-10">
           <input type="text" name="title" class="form-control" value="<?=@$form_data['title']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('title')!=""){  echo  form_error('title'); } ?>
         </span>  
         </div>  
       </div>
        <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Short Description</label>
         <div class="col-lg-10">
          <textarea name="short_desc" id="short_desc" class="form-control"  rows="7"><?=@$form_data['short_desc']?></textarea>
          <script>
            CKEDITOR.replace('short_desc', {
              "filebrowserImageUploadUrl": "<?=site_url('webmaster/manage_otherways_to_donate/ck_imageupload')?>"
            });
        </script>
          <span class="help-block text-danger">
                  <?php if(form_error('short_desc')!=""){  echo  form_error('short_desc'); } ?>
         </span>  
         </div>  
       </div>
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Price</label>
         <div class="col-lg-10">
           <input type="text" name="price" class="form-control" value="<?=@$form_data['price']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('price')!=""){  echo  form_error('price'); } ?>
         </span>  
         </div>  
       </div>
       
       <!--<div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Cart</label>
         <div class="col-lg-10">
           <input type="text" name="cart" class="form-control" value="<?=@$form_data['cart']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('cart')!=""){  echo  form_error('cart'); } ?>
         </span>  
         </div>  
       </div>-->
       
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Product Component</label>
         <div class="col-lg-10">
           <input type="text" name="add_to_cart" class="form-control" value="<?=@$form_data['add_to_cart']?>" />
          <span class="help-block text-danger">
                  <?php if(form_error('add_to_cart')!=""){  echo  form_error('add_to_cart'); } ?>
         </span>  
         </div>  
       </div>
       
       <div class="form-group">
         <label class="col-lg-2 control-label">&nbsp;Shopify Code</label>
         <div class="col-lg-10">
            <textarea class="form-control" rows="30" name="add_to_cart2" id="add_to_cart2"><?php if(@$form_data['add_to_cart2']!=""){ echo $form_data['add_to_cart2'];}else{ echo set_value('add_to_cart2');  } ?></textarea> 
            <span class="help-block text-danger">
                <?php if(form_error('add_to_cart2')!=""){  echo  form_error('add_to_cart2'); } ?>
            </span>  
         </div>  
       </div>
       
       
             <div class="form-group"><label class="col-lg-2 control-label"> Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
             <input type="file" name="image" id="image" > 
             <input type="hidden" name="old_image" id="old_image"  value="<?=@$form_data['image']?>" <? if($id==0){ ?> required <?php } ?>> 
             <span style="font-size:10px;color:gray;">Image Size (1920 X 747)<span>
            </div>
          </div>
        </div>

        <?php if(@$form_data['button_image']!=''){ ?>
          <div class="form-group"><label class="col-lg-2 control-label">Old  Image</label>
          <div class="col-lg-10">
            <div class="radio i-checks">
            <input type="hidden" name="old_image" id="old_image"  value="<?=@$form_data['old_image']?>"> 
            <img src="<?=base_url()?>uploads/art_of_giving/<?=$form_data['image']?>" class="img-responsive">
            </div>
          </div>
        </div>
        <?php } ?>
           

        

     <div class="hr-line-dashed"></div>
     <div class="form-group">
      <div class="col-sm-4 col-sm-offset-2">
       
       <input type="submit" class="btn btn-primary" id="btnsave" value="<?=$btnCapt?>" name="btnsave">
     </div>
   </div>
 </form>
</div>
</div>
</div></div></div>
<div class="row "><div class="col-lg-12"><div class="ibox float-e-margins">
 <!--  <div class="ibox-title"></div> -->
 <div class="ibox-title ">
  <h5 class="pull-left">Photo Gallery Listing </h5>
  <div class="clearfix"> </div>
</div>
<div class="ibox-content">
  <? if($this->session->flashdata('Success')){ ?>
  <div class="alert alert-success alert-dismissable" align="center">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <?=$this->session->flashdata('Success')?>
  </div>
  <? } ?>


  <form name="frmcustlist" method="post"  class="form-horizontal"  action="<?=site_url("webmaster/art_of_giving/delete_art_of_giving_donate")?>" onSubmit="JavaScript:return confirm_delete()"> 
      <input type="hidden" value="delete" name="action" />
    <table class="table table-striped table-bordered table-hover dataTables-example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th width="15%" align="left">Title</th> 
                  <th align="left">Short Desc</th>
                  <th align="left">Price</th>
                  <th align="left">Image</th>
                   
                 <!--   <th align="left">Text</th>  -->
                  <th width="6%">Edit</th><th width="6%">Delete</th>
                </tr>
              </thead>
              <tbody>  
                <? if(!empty($list_data)>0){
                  foreach ($list_data as $category) {?>
                  <tr>
                    <td align="left"><?=stripslashes($category['title'])?></td>
                     <td><?=stripslashes($category['short_desc'])?></td>
                     <td align="left"><?=stripslashes($category['price'])?></td>
                   <td align="left">
                      <? if(@$category['image']!=''){ ?>
                    <img src="<?=base_url()?>uploads/art_of_giving/<?=$category['image']?>" width="10%" class="image-responsive">
                    <? }else{ ?>
                    <img src="<?=base_url()?>webmaster_assets/img/noImage.jpg" width="10%" class="image-responsive">
                    <? } ?></td>
 <!--                   <td align="center"><a href="<?=site_url('webmaster/regionwise_gallery/manage_photo_gallery/'.$category['id']);?>">Manage Photo Gallery</a></a></td> -->
                   <td align="center"><a href="<?=site_url('webmaster/art_of_giving/manage_otherways_to_donate/'.$category['id']);?>"><i class="fa fa-edit"></i></a></a></td>
                    <td align="center"><input type="checkbox" name="cb[]" value="<?=$category['id']?>" ></td>
                    
                  </tr>   
                  <? } 
                }?>
              </tbody>
              <tfoot><tr><td colspan="5"></td>
                <td><button type="submit" class="btn btn-danger">Delete</button></td></tr>
              </tfoot>           
            </table>
      </form> 
    </div>
  </div>
</div></div>
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
</body>
</html>
