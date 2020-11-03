<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?=stripslashes($cmsData['meta_description'])?>">
<meta name="keywords" content="<?=stripslashes($cmsData['meta_keyword'])?>">
<meta name="author" content=""> 
<title><?=SITENAME?> - <?=stripslashes($cmsData['meta_title'])?> </title>

<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />
<style type="text/css">
.market-ic-box-in { no-repeat; background-size:100% 100%; /*padding: 40px;*/}
</style>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body >
<? $this->load->view('mainsite/common/header'); ?>
<div class="gallery-page-in ">
    <div class="service-section service-section2">
        <?php 
        if($cmsData['page_image']!='')
        { 
        ?>
            <img src="<?=base_url()?>uploads/page_image/<?=$cmsData['page_image']?>" class="img-responsive" alt="<?=$cmsData['page_image']?>" data-aos="fade-up" data-aos-once="true" width="100%" /> 
        <?php 
        }
        else
        { 
        ?>
            <img src="<?=base_url()?>front_assets/images/shop2-banner.jpg" class="img-responsive" alt="" data-aos="fade-up" data-aos-once="true" width="100%"/> 
        <?php 
        } 
        ?>
    </div>
    <?php
    
    if($compDs=='0')
    {
        //Nothing Message
    }
    else{
        
        foreach($compDs as $compds) 
        {
        ?>
        <div class="service-section service-section6">
            <div class="service-box-bg service-box-bg6">
                <div class="container" data-aos="fade-up" data-aos-once="true">
                    <center><div class="section-hedoff" style="font-size:30px;color:#000000"><p><?=stripslashes($compds['comp_title'])?></p></div> 
                    <div class="comp-txt" style="color:purple;"><p><?=date("d F Y", strtotime(stripslashes($compds['from_date'])))?> - <?=date("d F Y", strtotime(stripslashes($compds['to_date'])))?></p></div>
                    <div class="service-txt" style="margin:0px 0px;"><p><?=stripslashes($compds['comp_intro'])?></p></div></center>
                    <div id="countdown">
                        <div class="labels">
                            <li>Days</li>
                            <li>Hours</li>
                            <li>Mins</li>
                            <li>Secs</li>
                        </div>
                        <div id='tiles'></div>
                    </div>
                    
                    <div class="blog-boxes competition">
                        <div class="container">
                          <div class="row">
                            <?php  
                            foreach($compAr as $comp) 
                            {
                                $com = new common();
                                $user_id = $comp['id'];
                                $comp_id = $compds['id'];
                                
                                $uid = $this->session->userdata('CUST_ID');
                                
                                $totalCount =  $com->getTotalLikeForArtist($comp_id,$user_id,$uid);
                                $isILiked   =  $com->isLikedArtist($comp_id,$user_id,$uid);
                                
                            ?>
                            <div class="col-sm-4 blog-bock" data-aos="fade-up" data-aos-once="true">
                              <div class="blog-in">
                             
                                <div class="blog-img">
                                    <a href="<?=base_url()?>artists/details/<?=$comp['id']?>/<?=$comp['username']?>" alt="<?php echo $comp['first_name']." ".$comp['last_name'] ?>">
                                    <?php if($comp['profile_pic']!=''){ ?>
                                        <img src="<?=base_url()?>uploads/user_profile_pic/<?=stripslashes($comp['profile_pic'])?>" alt="<?=stripslashes($comp['profile_pic'])?>"/>
                                    <?php }else{ ?>
                                        <img src="<?=base_url()?>front_assets/images/no-blog-image.jpg" alt="blog-box-img.png"/>
                                    <?php } ?>
                                    </a>
                                </div>
                                <div class="blog-box-title"><span><a class="comp-artist" href="<?=base_url()?>artists/details/<?=$comp['id']?>/<?=$comp['username']?>" alt="<?php echo $comp['first_name']." ".$comp['last_name'] ?>"><?php echo $comp['first_name']." ".$comp['last_name'] ?><a></span></div>
                               
                                <div class="blog-share dropup">
                                  
                                  <div class="btn-group">
                                    <button type="button" class="btn btn-default" aria-label="Justify" id="like-count-<?=$comp['id']?>"><?=stripslashes($totalCount)?></button>
                                    <?php
                                    if($this->session->userdata('CUST_ID')!="")
                                    {
                                    ?>
                                    <button type="button" class="btn btn-default" aria-label="Left Align" <?php if($isILiked==0){ ?> onclick="javascript : likeArtist(<?=$comp_id ?>,<?=$user_id ?>,<?=$uid ?>)" <?php } ?> id="liked-<?=$comp_id?>" >
                                        <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span> 
                                        <?php if($isILiked==0){ echo " Like"; }else{ echo " Liked"; } ?> </button>
                                     <?php }else{ ?>
                                     <a class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" ></span>Like</a>
                                     <?php } ?>
                                  </div>
                                  
                                  <div class="btn-group share-social-link">
                        <!--<button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Share </button>-->
                        <?php
                                    $title  =   urlencode($comp['first_name']." ".$comp['last_name']);
                                    $url    =   urlencode(site_url('artists/details/'.$comp['id'].'/'.$com->create_slug($comp['username'])));
                                    $summary=   urlencode('dsdsd');
                                    $image  =   urlencode(base_url().'uploads/user_profile_pic/'.stripslashes($comp['profile_pic']));
                        ?>
                        <ul class="dropdown-menu">
                            <li>
                                <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
                            </li>
                            
                            <li>
                                <a onClick="window.open('http://twitter.com/share?text=<?php echo $summary;?>&url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>
                            </li>
                            
                            <li>
                                <a onClick="window.open('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $image;?>&url=<?php echo $url;?>&is_video=false&description=<?php echo $summary;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a>
                            </li>
                            
                            <li>
                                <a onClick="window.open('https://plus.google.com/share?url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a>
                            </li>
                      </ul>
                      </div>
                                   
                      
                      
                                   <div class="btn-group share-social-link" style="float:right">
                                    <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> Share</button>
                                    <?php
                                    $title  =   urlencode($comp['first_name']." ".$comp['last_name']);
                                    $url    =   urlencode(site_url('artists/details/'.$comp['id'].'/'.$com->create_slug($comp['username'])));
                                    $summary=   urlencode('dsdsd');
                                    $image  =   urlencode(base_url().'uploads/user_profile_pic/'.stripslashes($comp['profile_pic']));
                                    ?>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title;?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
                                        </li>
                                        
                                        <li>
                                            <a onClick="window.open('http://twitter.com/share?text=<?php echo $summary;?>&url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>
                                        </li>
                                        
                                        <li>
                                            <a onClick="window.open('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $image;?>&url=<?php echo $url;?>&is_video=false&description=<?php echo $summary;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a>
                                        </li>
                                        
                                        <li>
                                            <a onClick="window.open('https://plus.google.com/share?url=<?php echo $url;?> title=<?php echo $title;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a>
                                        </li>
                                  </ul>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                             <?php 
                                } 
                                ?>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <?php 
        } 
    }
    ?>
    
   <div class="listartist-section dark-shadwoand-bot-border bord-none top-title" style="padding: 45px 0;">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-once="true">
        <div class="vedio-page-disc top-dis">
          <h2 class="text-center color-fff section-header-large">Art Galaxie's Past Competitions</h2>
        </div>
      </div>
    </div>
    
    <div class="service-section pastcomp-section">
        <div class="service-box-bg">
                <?php 
                if(!empty($compDsPast))
                {
                    $i=0;
                    foreach($compDsPast as $compdspast) 
                    {
                    ?>
                    <div class="container" data-aos="fade-up" data-aos-once="true" style="margin-bottom: 50px;">
                    <!--<center><div class="section-hed past-heading"><p><?php echo $compdspast['comp_title'];?></p></div> -->
                    
                    <?php if($i==0){ ?>
                    <div class="service-txt" style="margin:0px 0px;"><p><?php echo $list_intro->introtext;?></p></div></center>
                    <?php } ?>
                    <div class="col-sm-12 blog-bock" data-aos="fade-up" data-aos-once="true">
                        <div class="col-sm-8">
                            <div class="win-img">
                                <?php if($compdspast['banner_image']!=''){ ?>
                                    <img src="<?=base_url()?>uploads/art_of_giving/<?=stripslashes($compdspast['banner_image'])?>" alt="<?=stripslashes($compdspast['banner_image'])?>"/>
                                <?php }else{ ?>
                                    <img src="<?=base_url()?>front_assets/images/no-blog-image.jpg" alt="blog-box-img.png"/>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                             <?php  
                              $com = new common();
                            ?>
                            <div class="section-hed comp-title"><p><?=stripslashes($compdspast['comp_title'])?></p></div> 
                            <div class="comp-datetime">From <?=date("d F Y", strtotime(stripslashes($compdspast['from_date'])))?> - <?=date("d F Y", strtotime(stripslashes($compdspast['to_date'])))?></p></div>
                            <?php
                            foreach($compArPast as $comparpast) 
                            {
                            ?>
                                <div class="win-name"><?=stripslashes($comparpast['first_name'])?> <?=stripslashes($comparpast['last_name'])?></div>
                            <?php 
                            }
                            ?>
                            <div class="win-desc"><?=stripslashes($compdspast['comp_intro'])?></div>
                            <?php
                            foreach($compArPast as $comparpast) 
                            {
                            ?>    
                                <a href="<?=base_url()?>artists/details/<?php echo $comparpast['id'] ?>/<?=stripslashes(strtolower($comparpast['first_name']))?>-<?=stripslashes(strtolower($comparpast['last_name']))?>" class="package-btn"><center>View profile page</center></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    </div>
                    <?php
                    $i++;
                    }
                    ?>
                <?php
                }
                else
                {
                ?>
                    <div class="container" data-aos="fade-up" data-aos-once="true">
                    <center>
                        <div class="row">
                            <h3>Stay tuned to this page for competitions coming soon.</h3>
                        </div>
                    </center>
                    </div>
                <?php
                }
                ?>
                
          </div>
        </div>
    </div>
</div>


<div class="modal fade cnt-form" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main green-form-bg">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
            <div class="text-center" ><div class="popup-lg-text">You need to Login/Register.</div></div>
            </div>
           </div>
        </div>
      </form>
    </div>
  </div>
</div>

<? $this->load->view('mainsite/common/footer'); ?>
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider.js"></script> 
<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script> 
<script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script> 
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
<script type="text/javascript">
  //function bsCarouselAnimHeight() {
    $('#myCarousel').carousel({
        interval: false
    });
//}
</script> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
</script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>front_assets/booklet/css/bookblock.css" />
<!-- custom demo style -->
<link rel="stylesheet" type="text/css" href="<?=base_url()?>front_assets/booklet/css/demo1.css" />
<script src="<?=base_url()?>front_assets/booklet/js/modernizr.custom.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
<script src="<?=base_url()?>front_assets/booklet/js/jquerypp.custom.js"></script> 
<!--<script src="booklet/js/jquery.bookblock.js"></script>--> 
<script type="text/javascript">
$(document).ready(function() {
  $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item'); 
    $('#viewClicked').val('list'); });
  $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');  $('#viewClicked').val('grid');});
});
</script> 
<script>
        Page.init();
</script>      
<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script>   

<?php /* ?>
<script language="JavaScript">
TargetDate = "<?php echo $compds['to_date']; ?>";
BackColor = "palegreen";
ForeColor = "navy";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = "%%D%% Days, %%H%% Hours, %%M%% Minutes, %%S%% Seconds.";
FinishMessage = "It is finally here!";
</script>
<script language="JavaScript" src="https://scripts.hashemian.com/js/countdown.js"></script>
<?php */ ?>



<?php
if($compDs=='0')
{
    //Nothing Message
}
else
{
    $FromDate = $compds['from_date'];
    $StartDate = new DateTime($FromDate);
    
    $ToDate = $compds['to_date'];
    $EndDate = new DateTime($ToDate);
    
    $interval = $EndDate->diff($StartDate, true);
    
    //echo "<pre>";
    //print_r($difference);
    
    //exit;
    //$datetime1 = new DateTime(stripslashes($compds['from_date']));
    $datetime1 = new DateTime();
    $datetime2 = new DateTime(stripslashes($compds['to_date']));
    $today = round(microtime($datetime1->getTimestamp()) * 1000);
    $todate = round(microtime($datetime2->getTimestamp()) * 1000);
    $interval = $datetime1->diff($datetime2);
    //echo $interval;
    $elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
    $secnds = $interval->format('%s');
    $mins = $interval->format('%i');
    $hours= $interval->format('%h');
    $days = $interval->format('%a');
    $months = $interval->format('%m');
    $years = $interval->format('%y');
    //echo $elapsed;
}

?>

<script>
var target_date = new Date().getTime() + (1000*(<?=$secnds;?>+(60*(<?=$mins;?>+(60*(<?=$hours;?> + (<?=$days?>*24))))))); // set the countdown date
var days, hours, minutes, seconds; // variables for time units
var countdown = document.getElementById("tiles"); // get tag element
getCountdown();
setInterval(function () { getCountdown(); }, 1000);

function getCountdown()
{
	// find the amount of "seconds" between now and target
	var current_date = new Date().getTime();
	var seconds_left = (target_date - current_date) / 1000;

	days = pad( parseInt(seconds_left / 86400) );
	seconds_left = seconds_left % 86400;
		 
	hours = pad( parseInt(seconds_left / 3600) );
	seconds_left = seconds_left % 3600;

	minutes = pad( parseInt(seconds_left / 60) );
	seconds = pad( parseInt( seconds_left % 60 ) );

	// format countdown string + set tag value
	countdown.innerHTML = "<span>" + days + "</span><span>" + hours + "</span><span>" + minutes + "</span><span>" + seconds + "</span>"; 
}
function pad(n) {
	return (n < 10 ? '0' : '') + n;
}
</script>
</body>
</html>