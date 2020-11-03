<div role="tabpanel" class="tab-pane <?php if($tabID==6){ ?> active <?php } ?>" id="tab6" >
    <div class="row">
        <div class="artist-information-section information-section-heding">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-justify">
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
                <div class="upload-video-form red-box">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="rightbar">
                                <?php 
                                if($artistData>0)
                                {
                                   $userId = $this->session->userdata('CUST_ID');
                                ?>  
                                <div class="ibox-content">
                                    <form name="frmcustlist" method="post" class="form-horizontal" action="<?=site_url('profile/my_videos_delete/'.$userId)?>" onSubmit="JavaScript:return confirm_delete()"> 
                                        <input type="hidden" value="delete" name="action" />
                                        <div class="row vidgallery">
                                            <?php 
                                            foreach($artistData as $dataRs)
                                            {
                                            ?>
                                            <div class="col-lg-4 col-md-4 col-xs-4" style="margin-bottom: 30px;">
                                                <div class="vid-container">
                                                    <?php
                                                    $url = $dataRs['videos_link'];
                                                    $curl = preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                                    if($curl == '0')
                                                    {
                                                    ?>
                                                        <iframe id="ytplayer" type="text/html" width="100%" height="200px" src="<?=$dataRs['videos_link']?>>" frameborder="0"></iframe>
                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                                                        $id = $matches[1];
                                                        $width = '100%';
                                                        $height = '200px';
                                                        ?>
                                                        <iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
                                                        src="https://www.youtube.com/embed/<?php echo $id ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                                                        frameborder="0" allowfullscreen></iframe>
                                                    <?php
                                                    }
                                                    ?>
                                                    <input type="checkbox" name="cb[]" class="img-checkbox " id="squaredFour" value="<?=$dataRs['id']?>" >
                                                    <span class="check_mark"></span><label for="squaredFour"></label>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="col-lg-4 col-sm-4">
                                            <a href="#" data-toggle="modal" data-target="#myModalUploadartvideo">
                                                    <div class="vid upvideo">&nbsp;</div>
                                                </a>
                                            </div>
                                            
                                        </div>
                                        <button type="submit" class="btn btn-del"  style="width:100%;margin-left: 25px;margin-top: 70px;">Delete Artwork</button>
                                    </form>
                                </div>
                            <?php 
                            }else{ 
                            ?>
                             <div class="ibox-content">
                                    <form name="frmcustlist" method="post" class="form-horizontal" action="<?=site_url('profile/my_videos_delete/'.$userId)?>" onSubmit="JavaScript:return confirm_delete()"> 
                                        <input type="hidden" value="delete" name="action" />
                                        <div class="row vidgallery">
                                            <div class="col-lg-4 col-md-4 col-xs-4" style="margin-bottom: 30px;">
                                                
                                                <a href="#" data-toggle="modal" data-target="#myModalUploadartvideo">
                                                    <div class="vid upvideo">&nbsp;</div>
                                                </a>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            <?php } ?>
                            </div>
                        </div> 
                    </div>
                </div>
             </div>
        </div>
    </div>
</div>






