<?php   if(!empty($filterDs)){  ?>
<label class="col-lg-2 control-label">&nbsp; <?=$str?> Filter</label>
             <div class="col-lg-10">
                <select  <?php if($str=='Sub'){ ?> name="sub_cat_id" id="sub_cat_id" <?php }else { ?> name="sub_sub_cat_id" id="sub_sub_cat_id"  <?php } ?> class="form-control"   <?php if($str=='Sub'){ ?>  onChange="javascript: getSubSubCat(this.value);" <?php } ?>>
                  <option value="">Select <?=$str?> Filter</option>
                  <?php foreach ($filterDs as $filterRs) { ?>
                      <option value="<?=stripslashes($filterRs['id'])?>"   ><?=stripslashes($filterRs['cat_name'])?></option>
                  <?php }?>
                </select>
                <span class="help-block text-danger">
                  <?php if(form_error('cat_id')!=""){  echo  form_error('cat_id'); } ?>
                </span>  
</div>
<?php }else{ ?>  <input type="hidden" name="<?php if($str=='Sub'){ ?> sub_cat_id <?php }else{?> sub_sub_cat_id <?php } ?>" value="0"> <?   } ?>