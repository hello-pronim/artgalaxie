 <?php
  require_once(dirname(__FILE__) . "/../../../smartslider/start.php");
  N2Native::beforeOutputStart();
  ?>
  <?php 
    $com_key = new  common(); 
    $gckey = $com_key->get_google_captcha_key();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Art Galaxie – Art Shop</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<!-- Bootstrap Core CSS -->
<link href="<?=base_url()?>front_assets/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?=base_url()?>front_assets/css/modern-business.css" rel="stylesheet">
<link href="<?=base_url()?>front_assets/css/custom.css" rel="stylesheet">
<!-- Custom Fonts -->
<link href="<?=base_url()?>front_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/js/flexslider2.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=base_url()?>front_assets/css/aos.css" type="text/css" media="screen" />

<script src="https://www.amcharts.com/lib/3/ammap.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/maps/js/worldHigh.js" type="text/javascript"></script>
<script src="https://www.amcharts.com/lib/3/themes/dark.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyA8Wn0s2nK_tUMZvcEY3OTLrlfVRUG_e7s&libraries=places&region=uk&language=en&sensor=true"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 
    <script type="text/javascript">
$(document).ready(function(){
// this part disables the right click
$('img').on('contextmenu', function(e) {
return false;
});
//this part disables dragging of image
$('img').on('dragstart', function(e) {
return false;
});
});
</script>
<style type="text/css">
.colour-black{
  color: #000;
}
</style>
<style> 
#panel {
    display: none;
}
#panelnew {
    display: none;
}
</style>

<link rel="stylesheet" href="<?=base_url()?>/front_assets/js/bounceanimate2.css">
</head>
<body>
<? $this->load->view('mainsite/common/header'); ?>
<?php $com = new common();
$sdata = '';
?>

<div class="gallery-page-in ">
  <div class="book-section">
    <div class="book-img" style="border-bottom:0px;">
        <?php
        N2SmartSlider(20);
    ?>
    </div>
<!--    <div class="section bg-white book-content">
      <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="vedio-page-disc">
          <h2 class="section-header color-000 text-center section-header-large"><?=stripslashes($cmsData['page_title'])?></h2>
          <div class="text text-center color-000 video-txt aos-init aos-animate" data-aos="fade-up" data-aos-once="true"><?=stripslashes($cmsData['page_desc'])?></div>
        </div>
        <div data-aos-once="true" data-aos="fade-up" class="text-center aos-init aos-animate"><a class="shop-faq-btn" href="#">FAQ's</a></div>
      </div>
      <div class="space30"></div>
    </div>-->
  </div>
  <!--<div class="black-bg text-center"> </div>-->
</div>
<div class="gallery-page-in">
  <div class="bg-white xxmiddle-tab-section">
    <div class="middle-tab-section-bg">
      <div class="container" >
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h2 class="color-fff text-center mar-top-bot-20">Search by</h2>
            <div class="style-page-in mar-bot-15" style="margin-bottom: 20px;">
                
              <ul class="nav nav-tabs xxartistsect-tabs shop-sect-tab text-center">
                <li><a class="art-reproduction-btn" data-toggle="tab1" href="<?php echo $bookShopLink[0]['link']; ?>" target="_blank">Art Reproduction</a></li>
                <li class="active"><a class="original-artworks-btn" data-toggle="tab" href="#original-artworks" aria-expanded="true">Original Artworks</a></li>
                <li><a class="giclee-prints-btn" data-toggle="tab1" href="<?php echo $bookShopLink[1]['link']; ?>" target="_blank">Giclee Prints</a></li>
                <li><a class="books-btn" data-toggle="tab" href="#books">Books</a></li>
                <li><a class="gifts-btn" data-toggle="tab1" href="<?php echo $bookShopLink[2]['link']; ?>" target="_blank">Gifts</a></li>
                <li><a class="mat-btn" data-toggle="tab1" href="<?php echo $bookShopLink[3]['link']; ?>" target="_blank">Art Supplies</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="xxsection shop-tab-section bg-gray">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="tab-content">
            <div id="original-artworks" class="tab-pane fade in active">
            <div class="artwork-filters">
            <ul class="nav nav-tabs xxartistsect-tabs shop-sect-tab text-center">
                <li class="active"><a class="custom-search-btn originalartworkfilter" data-toggle="tab" id="11" href="#custom-search" aria-expanded="true">Custom Search</a></li>
                <li><a class="curators-choice-btn originalartworkfilter" data-toggle="tab" id="22" href="#curators-choice">Curators Choice</a></li>
                <li><a class="new-artworks-btn originalartworkfilter" data-toggle="tab" id="33" href="#new-artworks">New Artworks</a></li>
                <li><a class="most-popular-btn originalartworkfilter" data-toggle="tab" id="44" href="#most-popular">Most Popular</a></li>
                 <li><a class="recently-sold-btn originalartworkfilter" data-toggle="tab" id="55" href="#recently-sold">Recently Sold</a></li>
              </ul>
           
              </div>
              <div class=" bg-white box-shadow-block text-center shop-filter">
               <div class="container">
                     <div class="row">
                      <div class="col-lg-8 four-filter">
                        <div class="row">
                            <div class="col-lg-4">
                                <select name="artist_id" id="artist_id" class="form-control">
                                    <option value="0">Artist</option>
                                    <?php  foreach($artistDs as $artistRs){  ?>
                                    <option value="<?=$artistRs['id']?>"><?=stripslashes($artistRs['first_name'].' '.$artistRs['last_name'])?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select name="art_cat" id="art_cat" class="form-control">
                                    <option value="0">Category</option>
                                    <?php  foreach($artCatRs as $artCat){  ?>
                                      <option value="<?=$artCat['cat_id']?>"><?=$artCat['cat_name']?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <select name="orientation" id="orientation" class="form-control">
                                <option value="0">Orientation</option>
                                <?php  foreach($artOrientation as $arto){  ?>
                                <option value="<?=$arto['id']?>" <?php if($arto['id']==@$dataDs['orientation']){ ?>  selected = "selected" <?php } ?> ><?=$arto['orientation']?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>  
                       <div class="row">
                        <div class="col-lg-4">
                             <select name="region" id="region" class="form-control">
                                <option value="0">Region</option>
                                <?php  foreach($artCatRegion as $artregion){  ?>
                                 <option value="<?=$artregion['id']?>" <?php if($artregion['id']==@$dataDs['region']){ ?>  selected = "selected" <?php } ?> ><?=$artregion['region_name']?></option>
                                <?php } ?>
                              </select>
                        </div>
                        <div class="col-lg-4">
                            <select name="medium" id="medium" class="form-control">
                               <option value="0">Medium</option>
                                <?php  foreach($artCatMedium as $artMed){  ?>
                                  <option value="<?=$artMed['id']?>"><?=$artMed['medium']?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <select name="units" id="units" class="form-control" >
                                <option value="0">Units</option>
                                <?php  foreach($artCatunits as $artCatu){  ?>
                                <option value="<?=$artCatu['id']?>" <?php if($artCatu['id']==@$dataDs['units']){ ?>  selected = "selected" <?php } ?> ><?=$artCatu['units']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <select name="country" id="country" class="form-control">
                                <option value="0">Country</option>
                                <?php foreach($artCatcountry as $countryname){  ?>
                                <option value="<?=$countryname['id']?>" <?php if($countryname['id']==@$dataDs['country']){ ?>  selected = "selected" <?php } ?> ><?=$countryname['country_name']?></option>
                                <?php } ?>
                             </select>
                        </div>
                        <div class="col-lg-4">
                             <select name="style" id="style" class="form-control">
                                <option value="0">Style</option>
                                <?php  foreach($artCatStyle as $artstyle){  ?>
                                  <option value="<?=$artstyle['cat_id']?>"><?=$artstyle['cat_name']?> </option>
                                <?php } ?>
                              </select>
                        </div>
                        <div class="col-lg-4">
                             <select name="size" id="size" class="form-control" >
                                <option value="0">Size</option>
                                <?php  foreach($artCatSize as $size){  ?>
                                <option value="<?=$size['id']?>" <?php if($size['id']==@$dataDs['size']){ ?>  selected = "selected" <?php } ?> ><?=$size['size']?></option>
                                <?php } ?>
                              </select>
                        </div>
                      </div>
                       <div class="row">
                           <div class="col-lg-4">
                             <select name="city" id="city" class="form-control">
                                <option value="0">City</option>
                                <?php foreach($artCatcity as $cityname){  ?>
                                   <option value="<?=$cityname['id']?>" <?php if($cityname['id']==@$dataDs['city']){ ?>  selected = "selected" <?php } ?> ><?=$cityname['city_name']?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-lg-4">
                              <select name="subject" id="subject" class="form-control">
                                  <option value="0">Subject</option>
                                <?php  foreach($artCatSubject as $artsubject){  ?>
                                  <option value="<?=$artsubject['id']?>" <?php if($artsubject['id']==@$dataDs['subject']){ ?>  selected = "selected" <?php } ?> ><?=$artsubject['subject_name']?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="col-lg-4">
                             <select name="pricerange" id="pricerange" class="form-control" >
                                <option value="0">Price Range</option>
                                <?php  foreach($artCatPriceRange as $pricerange){  ?>
                                    <option value="<?=$pricerange['id']?>" <?php if($pricerange['id']==@$dataDs['pricerange']){ ?>  selected = "selected" <?php } ?> ><?=$pricerange['price_range']?></option>
                                <?php } ?>
                              </select>
                            </div>
                       </div>
                       
                      </div>
                      <div class="col-lg-4 color-filter">
                          <p class="color-title">Colour:</p>
                        <div class="color">
                            <span class="selarea">
                                <span class="colorcode" id="colorcode"></span>
                                <a href="">CLEAR</a>
                            </span>
                            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                              <defs>
                                <path id="piePiece" d="M 42.2,78.9 46.1,64.4 Q 50,65 53.88,64.48 L 57.7,78.9 Q 50,80 42.2,78.9Z" />
                              </defs>
                              <use xlink:href="#piePiece" fill="#2D8633"/>
                              <?php $cwheel = 30;
                              foreach($color as $colorRs){  ?>
                                    <use xlink:href="#piePiece" transform="rotate(<?=$cwheel?>,50,50)" stroke-width="0.5" fill="<?=$colorRs['color_code']?>" data-id="<?=$colorRs['id']?>" />
                              <?php $cwheel += 30; } ?>
                              <!--<use xlink:href="#piePiece" transform="rotate(30,50,50)" fill="#00008B"/>
                                  <use xlink:href="#piePiece" transform="rotate(60,50,50)" fill="#000000"/>
                                  <use xlink:href="#piePiece" transform="rotate(90,50,50)" fill="#808080"/>
                                  <use xlink:href="#piePiece" transform="rotate(120,50,50)" fill="#6F4E37"/>
                                  <use xlink:href="#piePiece" transform="rotate(150,50,50)" fill="#008000"/>
                                  <use xlink:href="#piePiece" transform="rotate(180,50,50)" fill="#FFFF00"/>
                                  <use xlink:href="#piePiece" transform="rotate(210,50,50)" fill="#FFA500"/>
                                  <use xlink:href="#piePiece" transform="rotate(240,50,50)" fill="#FF4500"/>
                                  <use xlink:href="#piePiece" transform="rotate(270,50,50)" fill="#FF0000"/>
                                  <use xlink:href="#piePiece" transform="rotate(300,50,50)" fill="#800080"/>
                                  <use xlink:href="#piePiece" transform="rotate(330,50,50)" fill="#4B0082"/>
                                  <use xlink:href="#piePiece" transform="rotate(360,50,50)" fill="#0000FF"/>-->
                            </svg>
                            <?php $incr = 1; ?>
                        <?php /* ?>    
                         <input type="text" class="form-control jscolor {hash:true}" id="colour_type" value="" name="colour_type">
                         
                         <?php /*?>
                         
                         <select name="colour_type" id="colour_type" class="form-control" >
                <option value="0">Color</option>
                <?php $incr = 1;
                foreach($color as $colorRs){  ?>
                  <option value="<?=$colorRs['id']?>" <?php if($colorRs['id']=@$dataDs['colour_type']){ ?>  selected = "selected" <?php } ?> >
                    <?=$colorRs['title']?> </option>
                <?php } ?>
              </select> 
              
              <?php */ ?>
            
                        </div>
                       </div>
                     </div>
                    </div>
                </div>
              
              
              <div class="artworks-section">
	<div class="view-option"> 
      View options: <a id="grid" class="gridlink" href="#" ><img src="<?=base_url()?>front_assets/images/view-option2.png"></a>&nbsp;<a class="listlink" id="list" href="#"><img src="<?=base_url()?>front_assets/images/view-option.png"></a> 
	</div>
   <div id="products">
      <div class="row">
			<?php 
			if(is_array($shopData)) {
            $newarray=array(); $populararray=array(); $mainarray=array();   
            //echo "<pre>"; print_r($shopData); echo "</pre>";
            foreach ($shopData as $shopDataRs) 
            { 
				$fartist="";$fcategory="";$fmedium="";$fstyle="";$fsubject="";$fregion="";$fcountry="";$fcity="";$fcolor="";$forientation="";$fsize="";$funits="";$fpricerange="";$fsold="";$fcur_choice="";
            
				if($shopDataRs['country_id']!=0)
				{
					$country = $com->get_OneCountry($shopDataRs['country_id']);
				}
				else
				{
					$country = '';
				} 
             
				//check if its added in collection and its like ?
				$isCollected = $com->isProductAddedInCollection($shopDataRs['pid'],$mem_id);
				$isLIked = $com->isProductLiked(0,$shopDataRs['pid'],$mem_id);
				$totalLike = $com->getTotalLikeForProduct(0,$shopDataRs['pid']);

				if($shopDataRs['artist_id']!=0){ $fartist="artist_".$shopDataRs['artist_id'];}
				if($shopDataRs['art_cat']!=0){ $fcategory="category_".$shopDataRs['art_cat'];}
				if($shopDataRs['medium']!=0){ $fmedium="medium_".$shopDataRs['medium'];}
				if($shopDataRs['style']!=0){ $fstyle="style_".$shopDataRs['style'];}
				if($shopDataRs['subject']!=0){ $fsubject="subject_".$shopDataRs['subject'];}
				if($shopDataRs['region']!=0){ $fregion="region_".$shopDataRs['region'];}
				if($shopDataRs['country_id']!=0){$fcountry="country_".$shopDataRs['country_id'];}
				if($shopDataRs['ctid']!=0){ $fcity="city_".$shopDataRs['ctid'];}
				//if($shopDataRs['colour_type']!=0){ }
				if($shopDataRs['pcolour_type']!=0){ 
				    //$fcolor="color_".$shopDataRs['colour_type'];
				    //$fcolor="color_".$shopDataRs['color_code'];
				    $fcolor = '';
				    $cts = @explode(',',$shopDataRs['pcolour_type']); 
				    $ctnt = 0;
				    for($ctnt=0;$ctnt<(count($cts)-1);$ctnt++) {
				        /*$select = '*'; $tbl = 'tbl_product_color'; $where = array('id' => $cts[$ctnt]);
				        $getcolorcode = $com->getOneRowArray( $select, $tbl, $where );
				        $fcolor .= " color_".$getcolorcode['color_code'];*/
				        $fcolor .= " color_".$cts[$ctnt];
				    }
				}
				if($shopDataRs['orientation']!=0){ $forientation="orientation_".$shopDataRs['orientation'];}
				if($shopDataRs['size']!=0){ $fsize="size_".$shopDataRs['size'];}
				if($shopDataRs['units']!=0){ $funits="units_".$shopDataRs['units'];}
				if($shopDataRs['pricerange']!=0){ $fpricerange="pricerange_".$shopDataRs['pricerange'];}
				$fcur_choice = "cur_choice_".$shopDataRs['cur_choice'];
				$fsold = "sold_".$shopDataRs['sold'];

				$newarray[]=$shopDataRs['pid'];
				$populararray[]=$totalLike;
				$mainarray[]=$shopDataRs['sort_order'];
            ?>
			
         <div class="item col-xs-6 col-sm-6 col-md-6 col-lg-6 list-group-item" data-popular="<?=$totalLike;?>" data-main="<?=$shopDataRs['sort_order']?>" data-new="<?=$shopDataRs['pid'];?>">
            <div class="artworks-inline thumbnail <?=$fcur_choice?> <?=$fsold?> <?=$fartist?> <?=$fcategory?> <?=$fmedium?> <?=$fstyle?> <?=$fsubject?> <?=$fregion?> <?=$fcountry?> <?=$fcity?> <?=$fcolor?> <?=$forientation?> <?=$fsize?> <?=$funits?> <?=$fpricerange?>">
               <div class="">
                  <div class="imglist-left">
                     <img class="img-responsive" src="<?=base_url()?>uploads/products/<?=stripslashes($shopDataRs['product_images'])?>" alt="<?=stripslashes($shopDataRs['product_images'])?>">
                  </div>
                  <div class="artworks-list-blog">
                     <div class="artworks-list-inner-box">
                        <div class="artworks-title">
                           <h4><?=stripslashes($shopDataRs['product_title'])?></h4>
                        </div>
                        <?php 
                           if($shopDataRs['sold']==1)
                           {
                           ?>
                        <a class="sold-btn">Sold</a>
                        <?php 
                           } 
                           if($shopDataRs['sold']==0)
                           { 
                           ?>
                        <a class="original-btn">Original</a>
                        <?php 
                           } 
                           ?>
                        <div class="art-painting-size-prize">
                           <span><?=ucfirst(stripslashes($shopDataRs['cat_name']))?>,</span>
                           <span><?=stripslashes($shopDataRs['product_year'])?>,</span>
                           <!--<span><?=stripslashes($shopDataRs['length']." X ".$shopDataRs['width']." X ".$shopDataRs['height'])?>&nbsp;<?=$unitsDt->ualias?></span>-->
                           <span><?=stripslashes($shopDataRs['actual_size'])?>&nbsp;<?=$shopDataRs['ualias']?></span>
                           <h5><?=CURRENCY?><?=stripslashes($shopDataRs['product_price'])?></h5>
                        </div>
                        <div class="artworks-discription"><?=stripslashes($shopDataRs['product_desc'])?></div>					<div class="shop-artist-price">
                        <div class="artwork-artist-name">
                           <a href="<?=site_url('')?>"><?=stripslashes($shopDataRs['first_name']." ".$shopDataRs['last_name'])?>,</a><span><?=" ".$shopDataRs['country_name']?></span><br>
                           <a class="view-more-artist-btn" href="<?=site_url('')?>artists/details/<?php echo $shopDataRs['artist_id']?>/<?php echo strtolower($shopDataRs['first_name'])."-".strtolower($shopDataRs['last_name']) ?>">View more by artist</a>
                           <a class="see-details-artist-btn" href="<?=site_url('')?>publication_details/<?php echo $shopDataRs['pid']?>/<?php echo preg_replace('/\s+/', '-', strtolower($shopDataRs['product_title'])).".html" ?>">See Details</a>
                           <div class="clearfix"></div>
                        </div>
                        <div class="artist-product-price"><?=CURRENCY?><?=stripslashes($shopDataRs['product_price'])?></div></div>
                        <div class="art-work-other-btn art-work-other-btn-full-view">
                           <ul>
                              <li><a href="#" id="totalLiked_<?=$shopDataRs['pid']?>"><?=$totalLike?></a> 
                                 <?php if($this->session->userdata('CUST_ID')!=""){ ?>
                                 <a class="art-favourite <?php if($isLIked!=0){ ?> active  <?php } ?>"  id="artWorkHorizonatalLike_<?=$shopDataRs['pid']?>"  <?php if($isLIked==0){ ?>    onClick="javascript : shopLike(0,<?=$shopDataRs['pid']?>,<?=$mem_id?>)" <?php } ?> >&nbsp;</a>
                                 <?php }else{ ?>
                                 <a class="art-favourite" href="javascript:void(0)"  data-toggle="modal" data-target="#myModal">&nbsp;</a>
                                 <?php } ?>
                              </li>
                              <?php 
                                 if($this->session->userdata('CUST_ID')!="")
                                 
                                 { 
                                 	if($isCollected==0)
                                 	{ 
                                 	?>
                              <li>
                                 <a class="art-collection <?php if($isCollected!=0){ ?> active  <?php } ?>" data-prodid="<?=$shopDataRs['pid']?>" data-toggle="modal" data-target="#myModalUploadartwork" >&nbsp;</a>
                              </li>
                              <?php
                                 }
                                 if($isCollected!=0)
                                 { 
                                 ?>
                              <li>
                                 <a class="art-collection deactive">&nbsp;</a>
                              </li>
                              <?php
                                 }
                                 } 
                                 else
                                 {
                                 ?>
                              <li><a class="art-collection" data-toggle="modal" data-target="#myModal" >&nbsp;</a></li>
                              <?php
                                 }
                                 ?>
                              <li>
                                    <span class="order-popup">
                                        <a href="#myModalOrder" data-toggle="modal">ORDER</a>
                                    </span>
                                    
                                     <!--<span class="book-cart">-->
                                    <!--<div id='product-component-<?=stripslashes($shopDataRs['add_to_cart'])?>'></div>-->
                                    <?php 
                                        //$sdata .= $com->shopify_product_datas($shopDataRs['add_to_cart2'],$shopDataRs['add_to_cart'],"1"); 
                                        //openthis $sdata .= $com->shopify_inner_data($shopDataRs['add_to_cart2']);
                                    ?>
                                    <!--</span>-->
                                 
                              </li>
                              <div class="clearfix"></div>
                           </ul>
                        </div>
                        <div class="btn-group share-social-link pull-right">
                           <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>&nbsp; &nbsp;Share </button>
                           
                           <?php
                            $title  =   urlencode($shopDataRs['product_title']);
                            $url    =   site_url('publication_details/'.$shopDataRs['pid'].'/'.$com->create_slug($shopDataRs['product_title']));
                            $summary=   urlencode($shopDataRs['product_desc']);
                            $image  =   urlencode(base_url().'uploads/products/'.stripslashes($shopDataRs['product_images']));
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
            </div>
            <!-- Shop page -->                 
            <div class="modal fade register-madal uploadart-madal" id="myModalUploadartwork" role="dialog">
               <div class="modal-dialog">
                  <!-- Modal content-->
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title text-center">Add Collection</h3>
                     </div>
                     <form action="<?=site_url('shop/collectArtWorkAdd')?>" method="post"  name="Formuploadimg" class="Formuploadimg" id="Formuploadimg">
                        <div class="modal-body">
                           <div class="row">
                              <div id="div_error" style="display:none;" class="text-danger text-center"> </div>
                              <div id="RegDivFrm"  style="display:none;" class="text-success text-center"> </div>
                              <div id="reg-col-1">
                                 <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;">
                                    <div class="modal-field">
                                       <input type="hidden" name="shopid" value="0">
                                       <input type="hidden" name="productid" value="<?php echo $shopDataRs['pid']; ?>">
                                       <input type="hidden" name="userid" value="<?php echo $mem_id; ?>">
                                       <label class="field-title" for="collection_name">Select Collection Folder:</label>
                                       <select name="collectionfolderid" class="form-control" required>
                                          <?php
                                             foreach($CollectionFolderName as $colname)
                                             {
                                             ?>
                                          <option value="<?php echo $colname['id'] ?>"><?php echo $colname['collection_folder_name'] ?></option>
                                          <?php
                                             }
                                             ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="modal-footer">
                           <div id="flip"><i class="fa fa-plus-circle"></i>&nbsp;Create Collection</div>
                           <button type="submit" class="btn " id="regsubmitbtn">Save</button> 
                        </div>
                     </form>
                     <div id="panel">
                        <form action="<?=site_url('user/save_new_collection_folder/'.$mem_id)?>" method="post" enctype="multipart/form-data" name="Formuploadimg" class="Formuploadimg" id="formcreatecoll">
                           <div id="reg-col-1">
                              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;">
                                 <div class="modal-field">
                                    <input type="hidden" name="shopid" value="0">
                                    <input type="hidden" name="productid" value="<?php echo $shopDataRs['pid']; ?>">
                                    <input type="hidden" name="userid" value="<?php echo $mem_id; ?>">
                                    <label class="field-title" for="collection_name"></label>
                                    <input type="text" class="form-control" id="collection_name"  name="collection_name" placeholder="Collection Title" required>
                                 </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;" >
                                 <div class="modal-field">
                                    <label class="field-title" for="collection_color"></label>
                                    <input type="text" class="form-control jscolor {hash:true}" id="collection_color" value="#FFC249"  name="collection_color" placeholder="Collection Background Color" required>
                                 </div>
                              </div>
                           </div>
                           <div class="modal-footer text-center" >
                              <div id="flipclose">Cancel</div>
                              <button type="submit" class="btn " id="regsubmitbtn">Save New Collection</button> 
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>            
         </div>
         
		 <?php  
		 $incr++;  
		 } }
		 ?>
         <div class="clearfix"></div>
      </div>
   </div>
</div>
              
            </div>
            <div id="giclee-prints" class="tab-pane fade"> 
                <div class=" bg-white box-shadow-block text-center"> 
                <img src="<?=base_url()?>front_assets/images/color-picker.jpg" class="img-center " alt=""> 
            </div>
            <br> 
            </div>
            <div id="books" class="tab-pane fade"> 
            <div class="artwork-filters">
            <ul class="nav nav-tabs xxartistsect-tabs shop-sect-tab text-center">
                <li class="active"><a class="custom-search-btn bookfilter" data-toggle="tab" id="1" aria-expanded="true" href="#master-collection">Masters Collection</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li><a class="curators-choice-btn bookfilter" data-toggle="tab" id="2" href="#books-by-medium">Books by Medium</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li><a class="artist-books-btn bookfilter" data-toggle="tab" id="3" href="#artist-books">Artist books</a></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             </ul>
             </div>
            <div id="" class="books-tab-section">
                  <div class="row">
                <?php 
                    //echo "<pre>";print_r($bookShopData); echo "</pre>";
                    foreach ($bookShopData as $bookShopDataRs) { 
                      $isCollectedBook  = $com->isShopAddedInCollection($bookShopDataRs['id'],$mem_id);
                      $isLIkedBook      = $com->isProductLiked($bookShopDataRs['id'],0,$mem_id);
                      $totalLikeBook    = $com->getTotalLikeForProduct($bookShopDataRs['id'],0);
                      $book_types = explode(',',$bookShopDataRs['book_type']);
                      $book_type = '';
                      foreach($book_types as $b_type) {
                          $book_type .= " book_type_". $b_type;
                      }
                      ?>
                    <div class="">
                      <div class="artworks-inline thumbnail<?=$book_type?>" id="filterBook">
                        <div class="">
                          <div class="imglist-left">
                            <img src="<?=base_url()?>uploads/shop/books/<?=stripslashes($bookShopDataRs['book_images'])?>" alt="<?=stripslashes($bookShopDataRs['book_images'])?>"> </div>
                          <div class="artworks-list-blog">
                            <div class="artworks-list-inner-box">
                              <div class="artworks-title">
                                <h2 style="margin-top: -14px"><?=stripslashes($bookShopDataRs['book_title'])?></h2>
                              </div>
                              <!--<a class="original-btn" href="#">Original</a>--><!--<br>-->
                              <?php if($bookShopDataRs['take_a_look_inside']!='')
                              { 
                              ?>
                              <div class="artwork-artist-name"><!-- Artist Name,<span>Romania</span>--><!--<br>-->
                                <a class="view-more-artist-btn" href="<?=stripslashes($bookShopDataRs['take_a_look_inside']);?>">Look inside</a>
                              </div>
                              <?php 
                              } 
                              ?>
                              
                              <div class="artworks-discription"><?=stripslashes($bookShopDataRs['book_desc'])?></div>
                              <h4>Specifications:</h4>
                              <div class="art-painting-size-prize"> 
                                <?php if($bookShopDataRs['hardcover']!=''){ ?>
                                    <span>Hardcover, <?=stripslashes($bookShopDataRs['hardcover']);?></span>
                                <?php } else if($bookShopDataRs['softcover']!=''){ ?>
                                    <span>Softcover, <?=stripslashes($bookShopDataRs['softcover']);?></span>
                                <?php } else if ($bookShopDataRs['ebook']!=''){ ?>
                                    <span>eBook, <?=stripslashes($bookShopDataRs['ebook']);?></span>
                                <?php } ?>
                                    <span>Number of pages: <?=stripslashes($bookShopDataRs['number_of_pages']);?></span><span>ISBN  <?=stripslashes($bookShopDataRs['isbn']);?></span>
                                <h5><?=CURRENCY?><?=' ';?><?=stripslashes($bookShopDataRs['book_price'])?></h5>
                              </div>
                              
                                <?php 
                                if($bookShopDataRs['add_to_cart']!='')
                                { 
                                ?>
                                    <div id='product-component-<?=stripslashes($bookShopDataRs['add_to_cart'])?>'></div>
                                <?php 
                                    //$sdata .= $com->shopify_product_datas($bookShopDataRs['add_to_cart2'],$bookShopDataRs['add_to_cart'],"1"); 
                                    $sdata .= $com->shopify_inner_data($bookShopDataRs['add_to_cart2']);
                                } 
                                ?>
                                
                              <div class="art-work-other-btn art-work-other-btn-full-view">
                                <ul>
                                  <li> <a href="#" id="totalLikedBook_<?=$bookShopDataRs['id']?>"><?=$totalLikeBook?></a>
                                     <?php if($this->session->userdata('CUST_ID')!=""){ ?>
                                    <a class="art-favourite <?php if($isLIkedBook!=0){ ?> active  <?php } ?>"  id="artWorkHorizonatalLikeBook_<?=$bookShopDataRs['id']?>"  <?php if($isLIkedBook==0){ ?>    onClick="javascript : shopLikeBook(<?=$bookShopDataRs['id']?>,0,<?=$mem_id?>)" <?php } ?> >&nbsp;</a>
                                    <?php }else{ ?>
                                    <a class="art-favourite" href="javascript:void(0)"  data-toggle="modal" data-target="#myModal">&nbsp;</a>
                                    <?php } ?></li>
                                    
                                    <?php 
                                    if($this->session->userdata('CUST_ID')!="")
                                    { 
                                        if($isCollectedBook =='0')
                                        { 
                                        ?>
                                            <li>
                                                <a class="art-collection <?php if($isCollectedBook!=0){ ?> active  <?php } ?>" data-shopid="<?=$bookShopDataRs['id']?>" data-toggle="modal" data-target="#myModalUploadbookartwork" >&nbsp;</a>
                                            </li>
                                        <?php
                                        }
                                        if($isCollectedBook!=0)
                                        { 
                                        ?>
                                            <li>
                                                <a class="art-collection deactive">&nbsp;</a>
                                            </li>
                                        <?php
                                        }
                                    }
                                    else
                                    {
                                    ?>
                                        <li><a class="art-collection" data-toggle="modal" data-target="#myModal" >&nbsp;</a></li>
                                        
                                    <?php
                                    }
                                    ?>
                                  <!--<li><a class="art-adto-cart" href="#">&nbsp;</a></li>-->
                                  
                                  <div class="btn-group share-social-link pull-right">
                                   <button type="button" class="btn btn-default dropdown-toggle"  data-toggle="dropdown" aria-label="Left Align"><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>&nbsp; &nbsp;Share </button>
                                   
                                   <?php
                                    $booktitle  =   urlencode($bookShopDataRs['book_title']);
                                    //$bookurl    =   site_url(stripslashes($bookShopDataRs['take_a_look_inside']));
                                    $bookurl    =   base_url().stripslashes($bookShopDataRs['take_a_look_inside']);
                                    $booksummary=   urlencode($bookShopDataRs['book_desc']);
                                    $bookimage  =   urlencode(base_url().'uploads/shop/books/'.stripslashes($bookShopDataRs['book_images']));
                                    ?>
                                   <ul class="dropdown-menu">
                                      <li>
                                         <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $booktitle;?>&amp;p[summary]=<?php echo $booksummary;?>&amp;p[url]=<?php echo $bookurl; ?>&amp;&p[images][0]=<?php echo $bookimage;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a>
                                      </li>
                                      <li>
                                         <a onClick="window.open('http://twitter.com/share?text=<?php echo $booksummary;?>&url=<?php echo $bookurl;?> title=<?php echo $booktitle;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a>
                                      </li>
                                      <li>
                                         <a onClick="window.open('http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $bookimage;?>&url=<?php echo $url;?>&is_video=false&description=<?php echo $booksummary;?>', 'sharer', 'toolbar=0,status=0,width=548,height=250');" target="_parent" href="javascript: void(0)"><i class="fa fa-pinterest fa-lg" aria-hidden="true"></i></a>
                                      </li>
                                      <li>
                                         <a onClick="window.open('https://plus.google.com/share?url=<?php echo $bookurl;?> title=<?php echo $booktitle;?>', 'sharer', 'toolbar=0,status=0,width=548,height=325');" target="_parent" href="javascript: void(0)"><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a>
                                      </li>
                                   </ul>
                                </div>
                        
                                  
                                  <div class="clearfix"></div>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                    <div class="clearfix"></div>
                  </div>
                </div>
             </div>
          
          
            <div id="gifts" class="tab-pane fade"> <div class=" bg-white box-shadow-block text-center">
              <img src="<?=base_url()?>front_assets/images/color-picker.jpg" class="img-center " alt=""> </div><br> </div>
          </div>
        </div>
      </div>
    </div>
    
    
        
     <!-- Book page -->                 
 <div class="modal fade register-madal uploadbook-madal" id="myModalUploadbookartwork" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title text-center">Add Collection</h3>
        </div>
        <form action="<?=site_url('shop/collectArtWorkAdd')?>" method="post"  name="Formuploadimg" class="Formuploadimg" id="Formuploadimgnew">
        <div class="modal-body">
          <div class="row">
            <div id="div_error" style="display:none;" class="text-danger text-center"> </div>
            <div id="RegDivFrm"  style="display:none;" class="text-success text-center"> </div>
            
            <div id="reg-col-1">
              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;">
                <div class="modal-field">
                   
                    <input type="hidden" name="productid" value="0">
                    <input type="hidden" name="shopid" value="<?php echo $bookShopDataRs['id']; ?>">
                    <input type="hidden" name="userid" value="<?php echo $mem_id; ?>">
            
                 <label class="field-title" for="collection_name">Select Collection Folder:</label>
                <select name="collectionfolderid" class="form-control">
                    <?php 
                  
                    foreach($CollectionFolderName as $colname)
                    {
                    ?>
                        <option value="<?php echo $colname['id'] ?>"><?php echo $colname['collection_folder_name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                </div>
              </div>
                </div>
               </div>
            </div>
            <div class="modal-footer text-center">
                <div id="flipnew"><i class="fa fa-plus-circle"></i>&nbsp;Create Collection</div>
          <button type="submit" class="btn " id="regsubmitbtn">Save</button> 
        </div>
        </form>
        
        <div id="panelnew">
             <form action="<?=site_url('user/save_new_collection_folder/'.$mem_id)?>" method="post" enctype="multipart/form-data" name="Formuploadimg" class="Formuploadimg" id="Formuploadimgnew">
            <div id="reg-col-1">
              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;">
                <div class="modal-field">
                    <input type="hidden" name="productid" value="0">
                    <input type="hidden" name="shopid" value="<?php echo $bookShopDataRs['id']; ?>">
                    <input type="hidden" name="userid" value="<?php echo $mem_id; ?>">
                    
                 <label class="field-title" for="collection_name"></label>
                 <input type="text" class="form-control" id="collection_name"  name="collection_name" placeholder="Collection Title" required>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 21px;" >
                <div class="modal-field">
                 <label class="field-title" for="collection_color"></label>
                 <input type="text" class="form-control jscolor {hash:true}" id="collection_color" value="#FFC249"  name="collection_color" placeholder="Collection Background Color" required>
                </div>
              </div>
                </div>
            <div class="modal-footer text-center" >
                <div id="flipclosenew">Cancel</div>
          <button type="submit" class="btn " id="regsubmitbtn">Save New Collection</button> 
        </div>
        </form>
         </div>
         
         
      </div>
    </div>
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




<!-- Modal Order -->
<div class="modal fade cnt-form car-form" id="myModalOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form  id="orderform" class="ord-form">
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
             <!-- <h2>Order</h2>-->
              <div class="text-center"><p>Thank you for your interest in this artwork.</p>
                <p>Please note prices do not include shipping. Kindly fill out your shipping details below so we can provide you with the best quote.</p>
                <p>Our team of curators will get back to you at the earliest possible.</p></div>
            </div>
            <div id="order_msg" class="text-center"></div>
            <input type="text" class="form-control ord-form" placeholder="First Name" name="order_first_name" id="order_first_name">
            <input type="text" class="form-control ord-form" placeholder="Last Name" name="order_last_name" id="order_last_name">
            <input type="text" class="form-control" placeholder="Email" name="order_email" id="order_email" >
            <input type="text" class="form-control" placeholder="Address" name="order_address1" id="order_address1">
            <input type="text" class="form-control" placeholder="Address" name="order_address2" id="order_address2">
            <input type="text" class="form-control ord-form" placeholder="City" name="order_city" id="order_city">
            <input type="text" class="form-control ord-form" placeholder="State" name="order_state" id="order_state">
            <input type="text" class="form-control ord-form" placeholder="Postal Code" name="order_postalcode" id="order_postalcode">
            <input type="text" class="form-control ord-form" placeholder="Country" name="order_country" id="order_country">
            <textarea class="form-control" placeholder="Leave your message here." name="order_message" id="order_message" style="height:170px"></textarea>
            </br>
            <div class="pull-right" style="display: -webkit-box;">
                <img src="<?=base_url()?>front_assets/images/iu.png" style="width: 77px;">
                <div class="g-recaptcha" data-sitekey="<?=$gckey?>"></div>
            </div>
           <div class="clearfix"></div><br>
            <div class="text-right">
              <button type="submit" class="car-apply btn btn-primary" id="sub">Submit</button>
             </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal  Thanks Order -->
<div class="modal fade cnt-form car-form" id="thanksmodalorder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form>
        <div class="form-main">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
          <div class="modal-body">
            <div class="cnt-frm-txt">
              <h2>Thank you</h2>
              <div class="text-center">We have received your information. We will contact you at the earliest with all details concerning your order.</div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Contact us Popup -->

<script type="text/javascript">
$('#orderform').submit(function(e)
{
    e.preventDefault(); 
    var order_first_name    = $('#order_first_name').val();
    var order_last_name     = $('#order_last_name').val();
    var order_email         = $('#order_email').val();
    var order_address1      = $('#order_address1').val();
    var order_address2      = $('#order_address2').val();
    var order_city          = $('#order_city').val();
    var order_state         = $('#order_state').val();
    var order_postalcode    = $('#order_postalcode').val();
    var order_country       = $('#order_country').val();
    var order_message       = $('#order_message').val();
   
    if(order_first_name=='')
    {
        $('#order_msg').html('<span class="text-danger">Please enter name.</span>');
        $('#order_first_name').focus();
        return false
    }
    if(order_email=='')
    {
        $('#order_msg').html('<span class="text-danger">Please enter email address.</span>');
        $('#order_email').focus();
        return false
    }
    if(order_message=='')
    {
        $('#order_msg').html('<span class="text-danger">Please enter message.</span>');
        $('#order_message').focus();
        return false
    }

    jQuery.ajax({
          type: "POST",
          url: "<?=site_url('home/order_email')?>",
          data: new FormData(this),
          processData: false,
          contentType: false,
          cache: false,
          success:  function(data)
          {
            if(data=='done')
            {
                $('#order_msg').html('<span class="text-success">Mail sent successfully!!</span>')
                $('#myModalOrder').modal('hide')
                $('#thanksmodalorder').modal('toggle');
            }
            else
            {
                $('#order_msg').html('<span class="text-danger">Please Fill Captcha!!</span>');
            }
           
        }
        });
});
</script>


<script>
jQuery(document).ready(function(){
   jQuery('a.art-collection').click(function(){
        if($(this).attr('data-target')=="#myModalUploadartwork") { 
            jQuery('input[name="productid"]').attr('value',$(this).attr('data-prodid'));
        } else if($(this).attr('data-target')=="#myModalUploadbookartwork"){
            jQuery('input[name="shopid"]').attr('value',$(this).attr('data-shopid'));
        }
    }); 
    
});
</script>
<script type="text/javascript">
    /*$(function(){
            $('.bookfilter').on('click', function (){
            // Assign the value of the data attribute
            var tmp = this.id;
            //alert(tmp);
    //exit();        
            $.ajax({
                type:"post",
                url:"<?=site_url('shop/index')?>",
                data:"bookfilterName="+tmp,
                success:function(data){
                    $('#filterBook').html($(data).find('#filterBook').html());
                }
            });

        });
    });*/
</script> 

<script type="text/javascript">
   /* $(function(){
            $('.originalartworkfilter').on('click', function (){
            // Assign the value of the data attribute
            var tmp = this.id;
            //alert(tmp);
    //exit();        
            $.ajax({
                type:"post",
                url:"<?=site_url('shop/index')?>",
                data:"bookfilterName="+tmp,
                success:function(data){
                    $('#filterBook').html($(data).find('#filterBook').html());
                }
            });

        });
        
    });*/
</script> 


<?php N2Native::beforeClosingBody(); ?>
<?php //$this->load->view('mainsite/artist_common_section');?>

<?php 
    /*$sdata = '';
    foreach ($shopData as $shopDataRs) { 
        $all_shopify_shop[$shopDataRs['add_to_cart']]=$shopDataRs['add_to_cart2'];
    }  
    foreach ($bookShopData as $bookShopDataRs) { 
        $all_shopify_book[$bookShopDataRs['add_to_cart']]=$bookShopDataRs['add_to_cart2'];
    }
    $all_shopify_script = array_unique( array_merge($all_shopify_shop, $all_shopify_book) );
    //echo "<pre>"; print_r($all_shopify_script); echo "</pre>";
        foreach($all_shopify_script as $key => $value) {
        $sdata .= $com->shopify_product_datas($value,$key);
    }*/
    /*foreach ($shopData as $shopDataRs) { 
        $sdata .= $com->shopify_product_datas($shopDataRs['add_to_cart2'],$shopDataRs['add_to_cart']);
    }  
    foreach ($bookShopData as $bookShopDataRs) { 
        $sdata .= $com->shopify_product_datas($bookShopDataRs['add_to_cart2'],$bookShopDataRs['add_to_cart'],"1");
    }*/
    //$newarray=array(); $populararray=array(); $mainarray=array();
?>
<style>
.color-filter svg {
  stroke: white;
  stroke-width: 0.1;
}
.color-filter svg use:hover {
  stroke: #21c2d5;
  stroke-width: 0.5;
}
.selarea {
  left: 44%;
  position: absolute;
  top: 51%;
}
.colorcode { display:none; }
.selarea a {
    display:none;
}
#products .row.listv { 
  display: flex; 
  flex-direction: column;
}
#products .row.gridv { 
  display: flex; 
}
.sold-btn, .original-btn {
    cursor:none;
    color:#fff;
}
.sold-btn:hover, .original-btn:hover {
    color:#fff;
}
<?php
    rsort($newarray);
    rsort($populararray);
    sort($mainarray);
    for($in=0;$in<count($newarray);$in++) {
    ?>
        #products .row div.item.newdiv[data-new="<?=$newarray[$in]?>"]{ order: <?=($in+1)?>; webkit-order: <?=($in+1)?>; }
        #products .row div.item.populardiv[data-popular="<?=$populararray[$in]?>"]{ order: <?=($in+1)?>; webkit-order: <?=($in+1)?>; }
        #products .row div.item.maindiv[data-main="<?=$mainarray[$in]?>"]{ order: <?=($in+1)?>; webkit-order: <?=($in+1)?>; }
    <?php
    }
?>

</style>
<script type="text/javascript">
    <?php 
       echo $com->shopify_product_wrapper(stripslashes($sdata));
    ?>
</script>


<script src="<?=base_url()?>front_assets/js/jscolor.js"></script>


<? $this->load->view('mainsite/common/footer'); ?>

<!-- /.container --> 

<!-- jQuery --> 
<script src="<?=base_url()?>front_assets/js/jquery.js"></script> 

<!-- Bootstrap Core JavaScript --> 
<script src="<?=base_url()?>front_assets/js/bootstrap.min.js"></script> 
<script src="<?=base_url()?>webmaster_assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<!-- Script to Activate the Carousel --> 

<!-- FlexSlider --> 

<script defer src="<?=base_url()?>front_assets/js/jquery.flexslider.js"></script> 
<script src="<?=base_url()?>front_assets/js/froogaloop.js"></script> 
<script src="<?=base_url()?>front_assets/js/jquery.fitvid.js"></script> 
<script src="<?=base_url()?>front_assets/js/aos.js"></script> 
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
$(document).ready(function() 
{
  $('#list').click(function(event)
  {
        event.preventDefault();$('#products .item').addClass('list-group-item'); 
        $('#viewClicked').val('list'); 
        
        var c = document.getElementById("list");
        c.className = " active";
        
         var d = document.getElementById("grid");
         d.className = "deactive";
        $('#products').find('.row:eq(0)').removeClass('gridv'); 
        $('#products').find('.row:eq(0)').addClass('listv');
        
        //$( ".listv .art-work-other-btn" ).insertAfter( ".listv .artist-product-price" );
      
  });
  $("#list").trigger('click');
  $('#grid').click(function(event)
  {
      event.preventDefault();
      $('#products .item').removeClass('list-group-item');
      $('#products .item').addClass('grid-group-item');  
      $('#viewClicked').val('grid');
      
      var c = document.getElementById("list");
        c.className = "deactive";
        
      var d = document.getElementById("grid");
      d.className = "active";
      $('#products').find('.row:eq(0)').removeClass('listv'); 
      $('#products').find('.row:eq(0)').addClass('gridv');
      
     // $( ".gridv .art-work-other-btn" ).insertAfter( ".gridv .artworks-inline" );
      

  });
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
        
        jQuery('a[href="#master-collection"]').click(function(){
            jQuery('#books').find('.artworks-inline.thumbnail').hide();
            jQuery('#books').find('.artworks-inline.thumbnail.book_type_1').fadeIn();
        });
        
        jQuery('a[href="#books-by-medium"]').click(function(){
            jQuery('#books').find('.artworks-inline.thumbnail').hide();
            jQuery('#books').find('.artworks-inline.thumbnail.book_type_2').fadeIn();
        });
        
        jQuery('a[href="#artist-books"]').click(function(){
            jQuery('#books').find('.artworks-inline.thumbnail').hide();
            jQuery('#books').find('.artworks-inline.thumbnail.book_type_3').fadeIn();
        });
        
        jQuery('a[href="#books"]').click(function(){
            jQuery('a[href="#master-collection"]').trigger('click');
        });
        
        jQuery('a[href="#custom-search"]').click(function(){
            var celment = getprodvarvalues();
            var clselment = celment.split(',');
            for(var incrt=0;incrt<=(clselment.length-1);incrt++){
                showtabsdetails(clselment[incrt],1,"data-main");
            }
        });
        
        jQuery('a[href="#curators-choice"]').click(function(){
            showtabsdetails('.cur_choice_1',0,"data-main");
        });
        
        jQuery('a[href="#new-artworks"]').click(function(){
            showtabsdetails('',0,"data-new");
        });
        
        jQuery('a[href="#most-popular"]').click(function(){
            showtabsdetails('',0,"data-popular");
        });
        
        jQuery('a[href="#recently-sold"]').click(function(){
            showtabsdetails('.sold_1',0,"data-main");
        });
        
        /*jQuery(jQuery('.shop-filter').find("input[type='checkbox']")).click(function(){
            var clselment = getprodvarvalues();
            jQuery(clselment).parents('.item:eq(0)').fadeIn();
        });*/
        
        jQuery(jQuery('.shop-filter').find('select')).change(function(){
            var celment = getprodvarvalues();
            var clselment = celment.split(',');
            for(var incrt=0;incrt<=(clselment.length-1);incrt++){
                showtabsdetails(clselment[incrt],1,"data-main");
            }
        });
        
        jQuery(jQuery('.color-filter svg').find('use')).click(function(){
            jQuery('#colorcode').html(jQuery(this).attr('data-id'));
            jQuery('.color-filter svg').find('use').removeAttr('stroke');
            jQuery(this).attr('stroke','#21c2d5');
            jQuery('.selarea').find('a').show();
            var clselment = getprodvarvalues();
            showtabsdetails(clselment,1,"data-main");
		});
		
		jQuery(jQuery('.selarea').find('a')).click(function(event){
		    event.preventDefault();
		    jQuery('#colorcode').html('');
            jQuery('.color-filter svg').find('use').removeAttr('stroke');
            jQuery(this).hide();
            var clselment = getprodvarvalues();
            showtabsdetails(clselment,1,"data-main");
		});    
        
        function getprodvarvalues(){
            var htmls = ""; var html = ""; var labels = ""; var label = "";
            jQuery('#products').find('.item').hide();
            jQuery(jQuery('.shop-filter').find("select option:selected")).each(function(){
              if(jQuery(this).attr('value') != 0 && jQuery(this).parents('select:eq(0)').attr('multiple') != 'multiple') { 
                  label = jQuery(this).parents('select:eq(0)').find('option:eq(0)').text().toLowerCase();
                  htmls += "." + label.replace(/\s/g, '') + "_" + jQuery(this).attr('value');
                  //htmls += jQuery(this).parents('select:eq(0)').find('option:eq(0)').text().toLowerCase() + "=" + jQuery(this).attr('value') + "&";
              }
            });
            
            /*jQuery(jQuery('.shop-filter').find("input[type='checkbox']:checked")).each(function(){
            //jQuery(jQuery('.shop-filter').find("select").not("[name='orientation']").find("option:selected")).each(function(){ 
                alert('hi');
                labels = jQuery(this).parents('.checkbox-filter:eq(0)').find('div:eq(0)').text().toLowerCase();
                label = labels.replace(/\s/g, '');
                htmls += "." + label.replace(":", '') + "_" + jQuery(this).attr('value');
    			//htmls += jQuery(this).parents('.checkbox-filter:eq(0)').find('div:eq(0)').text().toLowerCase() + "=" + jQuery(this).attr('value') + "&";
    		});*/
            //htmls += "operation=filter&";
            
            jQuery(jQuery('.shop-filter').find("select option:selected")).each(function(){
              if(jQuery(this).attr('value') != 0 && jQuery(this).parents('select:eq(0)').attr('multiple') == 'multiple') { 
                  label = jQuery(this).parents('select:eq(0)').find('option:eq(0)').text().toLowerCase();
                  htmls += "." + label.replace(/\s/g, '') + "_" + jQuery(this).attr('value') + ",";
                  //htmls += jQuery(this).parents('select:eq(0)').find('option:eq(0)').text().toLowerCase() + "=" + jQuery(this).attr('value') + "&";
              }
            });
            
            if(jQuery('#colorcode').html() != "") {
                htmls += '.color_' + jQuery('#colorcode').html();
            }
            //htmls = htmls.substring(0,htmls.length - 1);
            if(htmls==""){html=""; jQuery('#products').find('.item').fadeIn();}
            else{html=htmls;}
            return html;
        }
      
        function showtabsdetails(ele,display,sortname="") {
            if(display == 0) { jQuery('.shop-filter').hide(); 
            } else { jQuery('.shop-filter').fadeIn(); }
            jQuery('#products').find('.item').hide();
            //var mysort = getSorted(jQuery('#products').find('.item'),sortname);
            //jQuery(jQuery('#products').html(jQuery(mysort)));
            if(sortname == "data-main"){
                jQuery('#products').find('.item').addClass('maindiv');
                jQuery('#products').find('.item').removeClass('newdiv');
                jQuery('#products').find('.item').removeClass('populardiv');
            } else if(sortname == "data-new"){
                jQuery('#products').find('.item').removeClass('maindiv');
                jQuery('#products').find('.item').addClass('newdiv');
                jQuery('#products').find('.item').removeClass('populardiv');
            } else if(sortname == "data-popular"){
                jQuery('#products').find('.item').removeClass('maindiv');
                jQuery('#products').find('.item').removeClass('newdiv');
                jQuery('#products').find('.item').addClass('populardiv');
            }
            if(ele=="") {
                jQuery('#products').find('.item').fadeIn();
            } else {
                //jQuery(ele).parents('.item').eq(0).fadeIn();
                for(var j=0; j<jQuery(ele).length;j++) {
                    jQuery(ele).eq(j).parents('.item').eq(0).fadeIn();
                }
            }
            jQuery('#products').find('.item').css('opacity','1');
        }
        var hash = location.hash;
        if(hash=="#books") {
            jQuery('.nav.nav-tabs.xxartistsect-tabs.shop-sect-tab.text-center').find('li').removeClass('active');
            jQuery('.nav.nav-tabs.xxartistsect-tabs.shop-sect-tab.text-center').find('li > a').removeAttr('aria-expanded');
            jQuery('.books-btn').attr('aria-expanded','true');
            jQuery('.books-btn').parents('li:eq(0)').addClass('active');
            
            jQuery('.xxsection.shop-tab-section.bg-gray').find('.tab-pane.fade').removeClass('active');
            jQuery('.xxsection.shop-tab-section.bg-gray').find('.tab-pane.fade').removeClass('in');
            jQuery('.xxsection.shop-tab-section.bg-gray').find('#books').addClass('active');
            jQuery('.xxsection.shop-tab-section.bg-gray').find('#books').addClass('in');
            jQuery('a[href="#books"]').trigger('click');
        }
        
        /*function getSorted(selector, attrName) {
            return $($(selector).toArray().sort(function(a, b){
                var aVal = parseInt(a.getAttribute(attrName)),
                    bVal = parseInt(b.getAttribute(attrName));
                return bVal - aVal;
            }));
        }
        
        function myfilter(str){
          $.ajax({
                type:"post",
                url:"<?=site_url('shop/index')?>",
                data:str,
                success:function(data){
                    var prod = $(data).filter('#products').html();
                    //alert(prod);
                    //$('#filterBook').html($(data).find('#filterBook').html());
                }
            });
        }*/
      
    });

</script>

<? $this->load->view('mainsite/common/login-registration-common-js');?>
<script type="text/javascript" src="<?=base_url()?>front_assets/js/contact-us.js"></script>

   

<script> 
$(document).ready(function(){
    
    
    $("#flip").click(function()
    {
        $("#panel").slideToggle("slow");
         $("#Formuploadimg").hide();
    });
    $("#flipclose").click(function()
    {
        $("#panel").slideToggle();
         $("#Formuploadimg").show();
    });
    
    $("#flipnew").click(function()
    {
        $("#panelnew").slideToggle("slow");
         $("#Formuploadimgnew").hide();
    });
    $("#flipclosenew").click(function()
    {
        $("#panelnew").slideToggle();
         $("#Formuploadimgnew").show();
    });
    
    
     
    
});
</script> 
    
</body>
</html>