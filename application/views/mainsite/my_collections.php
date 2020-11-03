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
          <h2 class="section-header text-center color-fff section-header-large">My Collections</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="slider4-section" >
    <div class="container">
        <div class="row"> 

            <div class="col-lg-12 col-md-12 col-sm-12">
                
                <?php
                if($artistCollectionFolderList=='' or empty($artistCollectionFolderList) )
                {
                ?>
                    <div class="norecord nocol">No Collections Added
                    <div class="blog-box" style="width:200px;margin:0 auto;height:auto;text-align:;padding:0px;">
                                <a href="#" data-toggle="modal" data-target="#myModalUploadartwork">
                                <div class="blog-box-inner upcollection">
                                </div>
                                </a>
                            </div>
                    </div>
                    
                <?php
                }
                else
                {
                ?>
                    <div class="collction-viewport artcolview">
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
                        <ul class="artcollctionfolder ">
                        <?php 
                        foreach($artistCollectionFolderList as $dataRs)
                        {
                        ?>
                            <li>
                                <div class="blog-box">
                                    <a href="<?=site_url('profile/my_collections_folder/'.$dataRs['id'])?>">
                                    <div class="blog-box-inner" style="background: <?php echo $dataRs['collection_folder_color'] ?>;">
                                        <div class="blog-title">
                                            <?php echo $dataRs['collection_folder_name'] ?>
                                        </div>
                                    </div>
                                    </a>
                                    
                                    <div class="view-artist"></div>
                                    <div class="blog-foot"> 
                                        <span class="book-remove">
                                            <button type="button" class="btn btn-default" aria-label="Left Align" onclick="javascript : removedSavedFolder(<?php echo $dataRs['id'] ?>)" id="folder-<?php echo $dataRs['id'] ?>">
                                                Remove
                                            </button>
                    
                                        </span>
                                        
                                    </div>
                                </div>
                            </li>
                        <?php
                        }
                        ?>
                        <li>
                            <div class="blog-box">
                                    <a href="#" data-toggle="modal" data-target="#myModalUploadartwork"><div class="blog-box-inner upcollection"></div></a>
                            </div>
                            </li>
                        </ul>
                    </div>
                <?php
                }    
                ?>
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
          <h3 class="modal-title text-center">Add Collection</h3>
        </div>
        <form action="<?=site_url('user/save_collection_folder/'.$user_id)?>" method="post" enctype="multipart/form-data" name="Formuploadimg" class="Formuploadimg" id="Formuploadimg">
        <div class="modal-body">
          <div class="row">
            <div id="div_error" style="display:none;" class="text-danger text-center"> </div>
            <div id="RegDivFrm"  style="display:none;" class="text-success text-center"> </div>
            
            <div id="reg-col-1">
              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;">
                <div class="modal-field">
                 <label class="field-title" for="collection_name"></label>
                 <input type="text" class="form-control" id="collection_name"  name="collection_name" placeholder="Collection Title" required>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;" >
                <div class="modal-field">
                 <label class="field-title" for="collection_color"></label>
                 <input type="text" class="form-control jscolor {hash:true}" id="collection_color" value="#FFC249" name="collection_color" placeholder="Collection Background Color" required>
                </div>
              </div>
                </div>
               </div>
            </div>
            <div class="modal-footer text-center" >
          <button type="submit" class="btn " id="regsubmitbtn">Save</button> 
        </div>
        </form>
      </div>
    </div>
</div>



<script src="<?=base_url()?>front_assets/js/jscolor.js"></script>
<?php $this->load->view('mainsite/common/login-registration-common-js');?>

<?php $this->load->view('mainsite/common/footer'); ?>

<!-- Modal Please Login -->
<?php $this->load->view('mainsite/blog_common_model');?>
 <!-- Modal Please Login -->

<!-- /.container --> 

<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script> 
<script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script> 
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script> 

<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script>
  </body>
</html>