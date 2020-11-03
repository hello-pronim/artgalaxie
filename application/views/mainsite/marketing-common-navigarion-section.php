        <div class="row">
          <?php foreach($navigationDs as $navigationRs){ ?>
          <div class="col-sm-4 servicecls">
          <!--<a <?php if($navigationRs['id']==1){ ?> href="<?=site_url('marketing-and-advertising')?>" <?php }else if($navigationRs['id']==2){ ?> href="<?=site_url('digital-marketing')?>" <?php }else if($navigationRs['id']==3){ ?> href="<?=site_url('content-marketing')?>" <?php } ?>     <?php if($sub_act_id==$navigationRs['id']){ ?> class="active" <?php } ?>>-->
          <a <?php if($navigationRs['id']==1){ ?> id="marketing-and-advertising" <?php }else if($navigationRs['id']==2){ ?> id="digital-marketing" <?php }else if($navigationRs['id']==3){ ?> id="content-marketing" <?php } ?>     <?php if($sub_act_id==$navigationRs['id']){ ?> class="active" <?php } ?>>
            <div  class="market-tab <?php if($navigationRs['id']==1){ ?> marketing-and-advertising-tab <?php }else if($navigationRs['id']==2){ ?> digital-marketing-tab <?php }else if($navigationRs['id']==3){ ?> content-marketing-tab <?php } ?>">
                <?=$this->common->Cut(stripslashes($navigationRs['page_title']),25)?>
            </div>
            <div class="market-icon-box">
              <div class="market-icon-box-in">
                <div class="market-icon-img"><span>
                  <img src="<?=base_url()?>uploads/art_marketing/<?=$navigationRs['icone_image']?>" alt=""/></span></div>
                <div class="market-box-txt"><?=$this->common->Cut(stripslashes($navigationRs['page_title']),25)?></div>
              </div>
            </div>
            </a>
          </div>
          <?php } ?>
        </div>
        <script type="text/javascript">
         /*jQuery(document).ready(function() {
            jQuery(".servicecls a").click(function(event){
                alert('hi');
                var ind = jQuery(".servicecls a").index(jQuery(this));
                jQuery(".servicecls a").removeClass('active');
                jQuery(".servicecls a").eq(ind).addClass('active');
                jQuery('.marketingsection').hide();
                if(jQuery(this).attr('id') == 'marketing-and-advertising') {
                    jQuery('.load-section').load('<?=site_url('marketing-and-advertising')?> .marketingsection');
                } else if(jQuery(this).attr('id') == 'digital-marketing') {
                    jQuery('.load-section').load('<?=site_url('digital-marketing')?> .marketstrategy-content');
                    alert('hello');
                } else {
                    jQuery('.load-section').load('<?=site_url('content-marketing')?> .marketstrategy-content');
                }
            });
         });*/
      </script>