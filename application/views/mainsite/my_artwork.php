<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('mainsite/common/top-artist-profile');?>
<body>
<?php $this->load->view('mainsite/common/header'); ?>
<div class="gallery-page-in about myartwork">
<div class="top-shadow">
    <div class="listartist-section dark-shadwoand-bot-border bord-none top-title">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-once="true">
        <div class="vedio-page-disc top-dis">
          <h2 class="section-header text-center color-fff section-header-large">My Artwork</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<?php if($this->session->userdata('CUSTOMER_TYPE')=='artist' && $this->session->userdata('CUSTOMER_TYPE') != '' ) { ?>
<div class="slider4-section" >
    <div class="container">
        <div class="row">        
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="leftbar">
                            <?php foreach($uploadStandards as $uploadStandard) { ?>
                            <h2><?=$uploadStandard['title']?>:</h2>
                            <?=$uploadStandard['description']?>
                            <?php } ?>
                        </div>
                    </div>
                    
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div class="rightbar">
                        <?php 
                        if($artistNumRow>0)
                        {
                           $userId = $this->session->userdata('CUST_ID');
                            ?>  
                            <div class="ibox-content">
                                <?php 
                                if($this->session->flashdata('Success'))
                                {
                                ?>
                                    <div class="alert alert-success alert-dismissable" align="center">
                                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                    <?=$this->session->flashdata('Success')?>
                                    </div>
                                <?php 
                                } 
                                ?>
                            
                                <form name="frmcustlist" method="post" class="form-horizontal" action="<?=site_url('user/delete_gallery/'.$userId)?>" onSubmit="JavaScript:return confirm_delete()"> 
                                <input type="hidden" value="delete" name="action" />
                                    <div class="row imggallery">
                                        <?php
                                        foreach($artistData as $dataRs)
                                        {
                                        ?>
                                        <div class="col-lg-3 col-md-4 col-xs-6">
                                            <div class="img-container">
                                                <img src="<?=base_url()?>uploads/artist-gallery/original/<?=$dataRs['image_name']?>" class="img-responsive" alt="<?=$dataRs['image_title']?>" style="width: 183px;">
                                                <input type="checkbox" name="cb[]" class="img-checkbox " id="squaredFour" value="<?=$dataRs['id']?>" >
                                                <span class="check_mark"></span><label for="squaredFour"></label>
                                                <span class="imghiddendata" id="imghiddendata_<?=$dataRs['id']?>">
                                                    <span class="artimagename"><?=$dataRs['image_name']?></span>
                                                    <span class="arttitlename"><?=$dataRs['image_title']?></span>
                                                </span>
                                                
                                                <span class="edit_artwork">
                                                    <a data-id="<?=$dataRs['id']?>" data-toggle="modal" id="driver" class="open-AddBookDialog" data-target="#myModalUpdateartwork" alt="Update" style="color:#fff" >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <button type="submit" class="btn btn-del"  style="width:100%;">Delete Artwork</button>
                                </form>
                            </div>
                            <div class="uploadadd">
                                 <a href="#" data-toggle="modal" data-target="#myModalUploadartwork" alt="Upload"><div class="uploadadd uploadartwork">&nbsp;</div></a>
                            </div>
                        <?php 
                        }
                        else
                        {
                        ?>
                            <a href="#" data-toggle="modal" data-target="#myModalUploadartwork" alt="Upload"><div class="uploadadd uploadartwork">&nbsp;</div></a>
                        <?php
                        }
                        ?>
                        </div>
                                
                    </div>
            </div>
        </div>
    </div>
</div>



<!-- Upload Artwork -->
 <div class="modal fade register-madal uploadart-madal" id="myModalUploadartwork" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Upload Artwork</h3>
        </div>
        <?php $userId = $this->session->userdata('CUST_ID'); ?>
        <form action="<?=site_url('user/save_gallery/'.$userId)?>" method="post" enctype="multipart/form-data" name="Formuploadimg" class="Formuploadimg" id="Formuploadimg">
        <div class="modal-body">
          <div class="row">
            <div id="div_error" style="display:none;" class="text-danger text-center"> </div>
            <div id="RegDivFrm"  style="display:none;" class="text-success text-center"> </div>
            
            <div id="reg-col-1">
                      <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;">
                        <div class="modal-field">
                         <label class="field-title" for="first_name"></label>
                         <input type="text" class="form-control" id="image_title"  name="image_title" placeholder="Artwork Title" required>
                        </div>
                      </div>
                     <br>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="modal-field">
                         <label class="field-title" for="first_name">Upload Images </label>
                         <input type="file" name="image_name" id="fileUpload" class="form-control" placeholder="Upload Artwork Image" required>
                        </div>
                      </div>
                </div>
               </div>
            </div>
            <div class="modal-footer text-center" >
          <button type="submit" class="btn" id="upload">Save</button> 
        </div>
        </form>
      </div>
    </div>
</div>



<!-- Update Artwork -->
<div class="modal fade register-madal uploadart-madal" id="myModalUpdateartwork" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Update Artwork</h3>
        </div>
        
        <div class="modal-body" style="display:none;">
        <?php 
           echo $gid = "<input id='bookId'>"; echo $galid = 0;
        ?>
        </div>
        
        <form action="<?=site_url('user/update_gallery/'.$dataRs['user_id'].'/'.$galid)?>" method="post" enctype="multipart/form-data" name="Formuploadimgs" class="Formuploadimg" id="Formuploadimgs">
        <div class="modal-body" id="editforming">
          <div class="row">
            <div id="div_error" style="display:none;" class="text-danger text-center"> </div>
            <div id="RegDivFrm"  style="display:none;" class="text-success text-center"> </div>
                <div id="reg-col-1">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="modal-field">
                            <label class="field-title" for="first_name">Title</label>
                            <input type="text" class="form-control" id="image_title" name="image_title" placeholder="Artwork Title" required>
                        </div>
                    </div>
                
                    <div class="col-lg-12 col-md-12 col-sm-12" >
                        <div class="modal-field">
                            <label class="field-title" for="first_name">Upload Images </label>
                            <input type="file" name="image_name" id="fileUploadupdate" class="form-control" placeholder="Upload Artwork Image">
                            <input type="hidden" name="old_image_name" id="old_image_name" value="" style="width:165px;margin-top:  15px;border: 1px solid;" />
                            <img id="myoldimg" src="<?=base_url()?>uploads/artist-gallery/original/thumb/" class="img-responsive" style="width:165px;margin-top:  15px;border: 1px solid;">
                        </div>
                    </div>
                </div>
                
                
               </div>
            </div>
            <div class="modal-footer text-center" >
          <button type="submit" class="btn btn-success" id="uploadupdate">Update</button> 
            
        </div>
        </form>
        
       
      </div>
      
    </div>
</div>


<?php
} else {
?>    
    <div class="norecord">
        You are not able access this page, only Artist can access art work...
    </div>
<?php
}
?>


<?php $this->load->view('mainsite/common/footer'); ?>
<?php $this->load->view('mainsite/common/footer_script');?>

<style>
.imghiddendata { display:none; }
</style>
<script>

$(document).on("click", ".open-AddBookDialog", function () {
    var myBookId = $(this).attr('data-id');
    $(".modal-body #bookId").val(myBookId);
    var faction = $('#editforming').parents('form:eq(0)').attr('action');
    var formaction = faction.split('.html');
    var last = formaction[0].substring(formaction[0].lastIndexOf("/") + 1, formaction[0].length);
    var rest = formaction[0].substring(0, formaction[0].lastIndexOf("/") + 1);
    $('#editforming').parents('form:eq(0)').attr('action', rest + myBookId + '.html');
    var artimagename = $('#imghiddendata_'+myBookId).find('.artimagename:eq(0)').html();
    var arttitlename = $('#imghiddendata_'+myBookId).find('.arttitlename:eq(0)').html();
    $('#editforming').find("input[name='old_image_name']").val(artimagename); 
    $('#editforming').find("input[name='image_title']").val(arttitlename); 
    var myoldImgpath = $('#myoldimg').attr('src');
    var myoldimg = myoldImgpath.split('/thumb/');
    $('#myoldimg').attr('src',myoldimg[0]+ '/thumb/' +artimagename);
});

</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#upload").bind("click", function () {
            if (typeof ($("#fileUpload")[0].files) != "undefined") {
                var size = parseFloat($("#fileUpload")[0].files[0].size / 1024).toFixed(2);
                if(size!=undefined && size>=350)
                {
                    alert("File cannot be larger than 350kb.");
                    return false;
               }
               else
               {
                    return true;
               }
                
            } 
            else {
                alert("This browser does not support HTML5.");
            }
        });
    });
</script>

<script type="text/javascript">
    $(function () {
        $("#uploadupdate").bind("click", function () {
           
            if (typeof ($("#fileUploadupdate")[0].files) != "undefined") {
                var size = parseFloat($("#fileUploadupdate")[0].files[0].size / 1024).toFixed(2);
                if(size!=undefined && size>=350)
                {
                    alert("File cannot be larger than 350kb.");
                    return false;
               }
               else
               {
                    return true;
               }
                
            } 
            else {
                alert("This browser does not support HTML5.");
            }
        });
    });
</script>



  </body>
</html>