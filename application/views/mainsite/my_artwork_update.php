<!-- Update Artwork -->
 <div class="modal fade contact-madal updateart-madal" id="myModalUpdateartwork" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Update Artwork</h3>
        </div>
        
        <form name="Formupdateimg" class="Formuploadimg" id="Formupdateimg" onsubmit="javascript:return false" action="#" >
        <div class="modal-body">
          <div class="row">
            <div id="div_error" style="display:none;" class="text-danger text-center"> </div>
            <div id="RegDivFrm"  style="display:none;" class="text-success text-center"> </div>
            
            <div id="reg-col-1">
              <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="modal-field">
                 <label class="field-title" for="first_name">Title</label>
                 <input type="text" class="form-control" id="image_title" value="<?=$artistDetails['image_title']?>" name="image_title" placeholder="Artwork Title" required>
                </div>
              </div>
             
              <div class="col-lg-12 col-md-12 col-sm-12" >
                <div class="modal-field">
                 <label class="field-title" for="first_name">Upload Images </label>
                 <input type="file" name="image_name" id="image_name" class="form-control" placeholder="Upload Artwork Image" required>
                 <input type="hidden" name="old_image_name" id="old_image_name" value="<?=$artistDetails['image_name']?>" style="width:165px;margin-top:  15px;border: 1px solid;" />
                <img src="<?=base_url()?>uploads/artist-gallery/original/thumb/<?=$artistDetails['image_name']?>" class="img-responsive" style="width:165px;margin-top:  15px;border: 1px solid;">
      
                </div>
              </div>
                 
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="modal-field">
                      <label class="field-title" for="state">Is Featured ?</label>
                      <br/>
                      <label><input type="radio" value="1" name="is_feature" id="is_feature1" <? if(@$artistDetails['is_feature']==1){?>checked="checked"<?}?>> Yes </label>       
                        <label><input type="radio" value="0" name="is_feature" id="is_feature2" <? if(@$artistDetails['is_feature'] == 0){?>checked="checked"<? }?>> No</label>
                    </div>
                </div>
                
                </div>
               </div>
            </div>
            <div class="modal-footer text-center" >
          <button type="button" class="btn btn-success" id="artworksubmitbtn" onClick="JavaScript: return checkUploadartwork()">Update</button> 
            
        </div>
        </form>
      </div>
      
    </div>
</div>