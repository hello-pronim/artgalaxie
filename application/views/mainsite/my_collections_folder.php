<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('mainsite/common/top-artist-profile');?>
<body>
<?php $this->load->view('mainsite/common/header'); ?>
<?php $com = new common(); ?>
<div class="gallery-page-in about myartwork">
<div class="top-shadow">
    <div class="listartist-section dark-shadwoand-bot-border bord-none top-title">
      <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-once="true">
        <div class="vedio-page-disc top-dis">
          <h2 class="section-header text-center color-fff section-header-large">My Collections - <?php echo $artistCollectionFolderName[0]['collection_folder_name']; ?></h2>
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
                if($artistCollectionList=='' or empty($artistCollectionList) )
                {
                ?>
                    <div class="norecord nofav">
                        No Collection Added...
                    </div>
                    <a href="/my_collections.html" class="retbtn"><div>Return to Collections</div></a>
                <?php
                }
                else
                {
                ?>
                    <div class="collction-viewport artcolview">
                        <ul class="artcollction">
                        <?php 
                         $com = new common();
                         
                        foreach($artistCollectionList as $dataRs)
                        {
                            
                            //echo "<pre>";  print_r($dataRs); echo "</pre>";
                            if($dataRs['shop_id'])
                            {
                        ?>
                            <li>
                                <div class="blog-box">
                                    <div class="blog-img">
                                        <img src="<?=base_url()?>uploads/shop/books/<?php echo $dataRs['book_images'] ?>" alt="blog_58cecff9e8a68.jpg" draggable="false">
                                    </div>
                                    <div class="blog-title"><?php echo $dataRs['book_title'] ?></span></div>
                                    <?php if($dataRs['hardcover']==""){ ?>
                                        <div class="blog-hardcover" style="margin-bottom:20px;">&nbsp;</span></div>
                                    <?php }else{ ?>
                                        <div class="blog-hardcover" style="margin-bottom:20px;"><?php echo $dataRs['hardcover'] ?></span></div>
                                    <?php } ?>
                                   <!-- <div class="blog-artsitname"><span> <?php echo $dataRs['first_name']." ".$dataRs['last_name'] ?>, </span><?php echo $dataRs['country'] ?></div>-->
                                    <div class="view-artist">
                                        <a href="<?=site_url('')?><?=$dataRs['take_a_look_inside']?>" style="width:192px">
                                            Look inside
                                        </a>
                                    </div>
                                    <div class="blog-foot"> 
                                        <span class="book-remove">
                                            <button type="button" class="btn btn-default" aria-label="Left Align" onclick="javascript : removedCollshop(<?=$dataRs['shop_id']?>,<?=$dataRs['member_id']?>)" id="collshop-<?=$dataRs['shop_id']?>">
                                                Remove
                                            </button>
                    
                                        </span>
                                        <div class="blog-right">
                                            <span class="book-price"><?php echo "&euro; ".$dataRs['book_price'] ?></span>
                                            <span class="book-cart">
                                                
                                            <?php if($dataRs['add_to_cart']!='')
                                            { 
                                            ?>
                                                <div id='product-component-<?=stripslashes($dataRs['add_to_cart'])?>'></div>
                                                
                                                <!--<script>
                                                    <?php //$pdata = $com->shopify_product_data($dataRs['add_to_cart2'],$dataRs['add_to_cart']);
                                                        //echo $pdata;
                                                  ?>
                                                </script>-->
                                            <?php 
                                            } 
                                            ?>
                                               </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php
                            }
                        }
                        ?>
                        
                        <?php 
                         $com = new common();
                        foreach($artistCollectionProdList as $dataRs)
                        {
                            //echo "<pre>";
                            //print_r($dataRs);
                            if($dataRs['product_id'])
                            {
                            
                        ?>
                            <li>
                                <div class="blog-box">
                                    <div class="blog-img">
                                        <img src="<?=base_url()?>uploads/products/<?php echo $dataRs['product_images'] ?>" alt="<?php echo $dataRs['product_title'] ?>" draggable="false">
                                    </div>
                                    <div class="blog-title"><?php echo $dataRs['product_title'] ?></span></div>
                                    <?php 
                                        $art_cat = $com->getOneRow( "*", "tbl_galleries", array('cat_id'=>$dataRs['art_cat']) );
                                        $unitsDt = $com->getOneRow( "*", "tbl_units", array('id'=>$dataRs['units']) );
                                    ?>
                                    <div class="blog-hardcover" style="margin-bottom:-12px"><?=$art_cat->cat_name ?>, <?php echo $dataRs['product_year'] ?></span>, <?php echo $dataRs['actual_size'] ?> <?=$unitsDt->ualias ?></div>
                                    
                                    <?php 
                                        $mainArtist = $com->getUserDetails($dataRs['artist_id']);
                                    ?>
                                    
                                    <div class="blog-artsitname"><span> <?=$mainArtist['first_name'] ?> <?=$mainArtist['last_name'] ?>, </span><?php echo $mainArtist['country'] ?></div>
                                    
                                    <div class="view-artist"><a href="<?=site_url('')?>artists/details/<?=$mainArtist['id']?>/<?=strtolower($mainArtist['first_name'].'-'.$mainArtist['last_name']) ?>">View more by artist</a></div>
                                    <div class="blog-foot"> 
                                        <span class="book-remove">
                                            <button type="button" class="btn btn-default" aria-label="Left Align" onclick="javascript : removedCollproduct(<?=$dataRs['product_id']?>,<?=$dataRs['member_id']?>)" id="collproduct-<?=$dataRs['product_id']?>">
                                                Remove
                                            </button>
                    
                                        </span>
                                        <div class="blog-right">
                                            <span class="book-price"><?php echo "&euro; ".$dataRs['product_price'] ?></span>
                                            <span class="book-cart">
                                                
                                            <?php if($dataRs['add_to_cart']!='')
                                            { 
                                            ?>
                                                <div id='product-component-<?=stripslashes($dataRs['add_to_cart'])?>'></div>
                                                
                                                <!--<script>
                                                    <?php //$pdata = $com->shopify_product_data($dataRs['add_to_cart2'],$dataRs['add_to_cart']);
                                                    //echo $pdata;
                                                  ?>
                                                </script>-->
                                            <?php 
                                            } 
                                            ?>
                                               </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php
                            }
                        }
                        ?>
                        
                        
                        </ul>
                        
                        <a href="/my_collections.html" class="retbtn"><div>Return to Collections</div></a>
                    </div>
                <?php
                }    
                ?>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('mainsite/common/footer'); ?>
<?php 
    $sdata = '';
    foreach ($artistCollectionProdList as $shopDataRs) { 
        $sdata .= $com->shopify_product_datas($shopDataRs['add_to_cart2'],$shopDataRs['add_to_cart']);
    }  
    foreach ($artistCollectionList as $bookShopDataRs) { 
        $sdata .= $com->shopify_product_datas($bookShopDataRs['add_to_cart2'],$bookShopDataRs['add_to_cart']);
    }
?>
<script type="text/javascript">
    <?php 
       echo $com->shopify_product_wrapper($sdata);
    ?>
</script>
<!-- Modal Please Login -->
<?php $this->load->view('mainsite/blog_common_model');?>
 <!-- Modal Please Login -->

<!-- /.container --> 

<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 

<!-- Script to Activate the Carousel --> 

<!-- FlexSlider --> 

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

<!-- <script src="http://localhost:3002/dist/aos.js"></script> --> 
<script>
      AOS.init({
        easing: 'ease-out-back',
        duration: 1500
      });
    </script> 
<script>
  
/* Thanks to CSS Tricks for pointing out this bit of jQuery
http://css-tricks.com/equal-height-blocks-in-rows/
It's been modified into a function called at page load and then each time the page is resized. One large modification was to remove the set height before each new calculation. */

equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

$(window).load(function() {
  equalheight('.mrt-content-box .mrt-box-txt');
});


$(window).resize(function(){
  equalheight('.mrt-content-box .mrt-box-txt');
});
  
  </script>
    
    
    <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
   // $(this).next('ul').toggle();
	$parent_box = $(this).closest('.dropdown-submenu');
	$parent_box.siblings().find('.dropdown-menu').hide();
	$parent_box.find('.dropdown-menu').slideToggle(1000, 'swing');
  
    e.stopPropagation();
    e.preventDefault();
  });
  
   $('.dropdown-toggle').on("click", function(e){
     $('.dropdown-submenu a.test').next('ul').hide();
  
  });
  
});

</script>
<?php $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script>
  </body>
</html>