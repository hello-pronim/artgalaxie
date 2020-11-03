  <?php 
  if(!empty($artistByCountry)){ 
   foreach($artistByCountry as $artistByCountryRs){ ?>
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12"  data-aos="fade-up" >
                  <a href="<?=base_url('artists/details/'.$artistByCountryRs['id'].'/'.$this->common->create_slug(stripslashes($artistByCountryRs['first_name'].' '.$artistByCountryRs['last_name'])))?>">
                      <div class="artist-img-blog" >
                        <div class="tumb-img">
                           <img src="<?=base_url()?>uploads/user_profile_pic/<?=$artistByCountryRs['profile_pic']?>" alt="">
                          <div class="overlay"></div>
                        </div>
                        <p><?=stripslashes($artistByCountryRs['first_name'].' '.$artistByCountryRs['last_name'])?></p>
                      </div>
                   </a>
                </div>
<?php } }else{ ?>
<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-xss-12"  data-aos="fade-up" >No Record Found.</div>
<?php } ?>