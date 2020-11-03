<?php
defined( '_JEXEC' ) or die( 'Restricted index access' );
include ("convert_rgb.php");

$document->addStyleSheet('templates/'.$this->template.'/css/bootstrap.css');
$document->addStyleSheet('templates/'.$this->template.'/css/typo.css');
$document->addStyleSheet('templates/'.$this->template.'/css/jstuff.css');
$document->addStyleSheet('templates/'.$this->template.'/css/animate.css');
$document->addStyleSheet('templates/'.$this->template.'/css/vegas.css');
if ($hovercss_sw) {
    $document->addStyleSheet('templates/'.$this->template.'/css/hover.css');
}
if ($fontawesome_sw) {
    $document->addStyleSheet('templates/'.$this->template.'/css/font-awesome.css');
}
$document->addStyleSheet('templates/'.$this->template.'/css/nexus.css');

?>   

<?php if($responsive_sw == "1") : ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/css/responsive.css" type="text/css" />

<style type="text/css">
@media only screen and (max-width: <?php echo ($wrapper_width + 120); ?>px) {
.wrapper960 {
	width:100% !important;
}
#bgvid { display: none; }
.wrapper960, .content_background, #header {margin: 0 auto;}

/* Hide default hornav menu */
.hornav, #socialmedia {display:none !important;}
/* Show mobile hornav menu */
.slicknav_menu {display:block;}

.logo a {
    left: 35px !important;
}
}

</style>

<?php endif; 

$googlefonts = array($body_fontstyle, $h1head_fontstyle, $logo_fontstyle, $articlehead_fontstyle, $modulehead_fontstyle, $hornav_fontstyle);
$websafefonts = array("Arial, sans-serif", "Arial, Helvetica, sans-serif", "Courier, monospace", "Garamond, serif", "Georgia, serif", "Impact, Charcoal, sans-serif", "Lucida Console, Monaco, monospace", "MS Sans Serif, Geneva, sans-serif", "MS Serif, New York, sans-serif", "Palatino Linotype, Book Antiqua, Palatino, serif", "Tahoma, Geneva, sans-serif", "Times New Roman, Times, serif", "Trebuchet MS, Helvetica, sans-serif", "Verdana, Geneva, sans-serif", "Arial");
// remove websafe
$googlefonts = array_diff($googlefonts, $websafefonts);
// remove duplicates
$googlefonts = array_keys(array_flip($googlefonts));
// loop
foreach ($googlefonts as $v) {
    echo '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.$v.':100,300,400" /> ';
}
?>

<style type="text/css">
body, input, button, select, textarea {font-family:<?php echo str_replace("+"," ",$body_fontstyle); ?> }
h1{font-family:<?php echo str_replace("+"," ",$h1head_fontstyle); ?> }
h2{font-family:<?php echo str_replace("+"," ",$articlehead_fontstyle); ?> }
.module h3, .module_menu h3{font-family:<?php echo str_replace("+"," ",$modulehead_fontstyle); ?>; }
.hornav{font-family:<?php echo str_replace("+"," ",$hornav_fontstyle); ?> }
h1.logo-text a{font-family:<?php echo str_replace("+"," ",$logo_fontstyle); ?> }

/*--Set Logo Image position and locate logo image file--*/ 
.logo a {left:<?php echo ($logo_x); ?>px}
.logo a {top:<?php echo ($logo_y); ?>px}

/*--Body font size--*/
body {font-size: <?php echo ($body_fontsize); ?>}

/*--Text Colors for Module Heads and Article titles--*/ 
body {color:<?php echo ($body_font_color); ?>;}
h2, h2 a:link, h2 a:visited {color: <?php echo ($articletitle_font_color); ?> ; }
.module h3, .module_menu h3, h3 {color: <?php echo ($modulehead_font_color); ?> }
a {color: <?php echo ($content_link_color); ?> }
hr:before {color: <?php echo ($content_link_color); ?> !important;}

/*--Text Colors for Logo and Slogan--*/ 
h1.logo-text a {
	color: <?php echo ($logo_font_color) ?>;
}
p.site-slogan {color: <?php echo ($slogan_font_color); ?> }

<?php if($this->params->get('logoImage') == '0') : ?>
#logo {padding: 35px 0;}
<?php endif; ?>

/*--Hornav Ul text color and dropdown background color--*/
.hornav ul li a  {color: <?php echo ($hornav_font_color); ?> }
.hornavmenu-top .hornav > ul > li > a {color: <?php echo ($hornav_font_color_compact); ?> }
.hornav ul ul {background-color: <?php echo ($hornav_ddbackground_color); ?> }

/*--Start Style Side Column and Content Layout Divs--*/
/*--Get Side Column widths from Parameters--*/
.sidecol_a {width: <?php echo ($sidecola_width); ?>% }
.sidecol_b {width: <?php echo ($sidecolb_width); ?>% }

.maincontent {padding: 50px 35px;}

/*--Check and see what modules are toggled on/off then take away columns width, margin and border values from overall width*/
<?php if($this->countModules( 'sidecol-a') >= 1 && $this->countModules('sidecol-b') >= 1) : ?>
#content_remainder {width:<?php echo 100 - ($sidecola_width + $sidecolb_width) ?>% }

<?php elseif($this->countModules('sidecol-a') >= 1 && $this->countModules('sidecol-b') == 0) : ?>
#content_remainder {width:<?php echo 100 - ($sidecola_width) ?>% }

<?php elseif($this->countModules('sidecol-a') == 0 && $this->countModules('sidecol-b') >= 1) : ?>
#content_remainder {width:<?php echo 100 - ($sidecolb_width) ?>% }
<?php endif; ?>

/*Style SSC layout*/
<?php if($this->params->get('column_layout') == 'SCOLA-SCOLB-COM') : ?>
	.sidecol_a {float:left;}
	.sidecol_b {float:left;}
	#content_remainder {float:right;}
    .maincontent {padding-left: 35px;}

/*Style CSS layout*/	
<?php elseif($this->params->get('column_layout') == 'COM-SCOLA-SCOLB') : ?>
	#content_remainder {float:left;}
	.sidecol_a {float:right;}
	.sidecol_b {float:right;}
	.sidecol_a {float:right;}
	.maincontent {padding-left: 35px;}

/*Style SCS layout*/
<?php elseif($this->params->get('column_layout') == 'SCOLA-COM-SCOLB') : ?>  
	.sidecol_a {float:left; }
	.sidecol_b {float:right; }
	#content_remainder {float:left;}
<?php endif; ?>

/* Sidecolumn background color */
.backgrounds .sidecol_a , .backgrounds .sidecol_b, .sidecol_a, .sidecol_b {
	background-color: <?php echo $elementcolor7; ?>;
}

/*--End Style Side Column and Content Layout Divs--*/

/* Social Icons */
<?php 
$i = 0;
foreach($json['social_custom_icon'] as $key=>$value)  {
?>
.social-<?php echo str_replace(' ', '', ($json['social_custom_name'][$i])); ?>:hover {
	background-color: <?php echo $json['social_custom_hover'][$i]; ?>;
}
<?php $i++; } ?>

#socialmedia ul li a [class^="fa-"]::before, #socialmedia ul li a [class*=" fa-"]::before {color: <?php echo $social_style; ?>}

/* Wrapper Width */
.wrapper960, .backgrounds .content_background {width: <?php echo ($wrapper_width); ?>px ;}

/* Background Color */
<?php if($this->params->get('bgimagefile') != '') : ?>
#header_bg {
	background: url(<?php echo $this->baseurl ?>/<?php echo $bgimagefile; ?>) 50% 0% no-repeat fixed;
}
<?php endif; ?>
body, #header_bg  {
	background-color: <?php echo $bgcolor;?>;
}

/* Button Colour */
.btn, .btn-group.open .btn.dropdown-toggle, .pager.pagenav a, .btn-primary:active, 
.btn-primary.active, .btn-primary.disabled, .btn-primary[disabled], .btn:hover {
	border: 2px solid <?php echo $button_color ?>;
}
.input-append .add-on, .input-prepend .add-on, .label-info[href], .badge-info[href] {background-color: <?php echo $button_color ?>;}
.readmore .btn:hover, .dropdown-toggle:hover {background-color: <?php echo $button_hover_color ?>; color: #ffffff;}
.dropdown-toggle {
	background-color: <?php echo $button_color ?>;
} 

<?php if($hovercss_sw == "1") : ?>
/* Hover.css */
[class^="hvr-"], .hvr-shutter-in-vertical:before, .hvr-shutter-in-horizontal:before, .hvr-radial-in:before, .hvr-rectangle-in:before {
	background-color: <?php echo $button_color ?>;
	border: none;
}
.btn[class^="hvr-"] {
	border: none
}
.hornav [class^="hvr-"], #footermenu [class^="hvr-"], .slicknav_nav a {background: none;}
.slicknav_nav a:before {display:none;}
.hvr-border-fade:hover, .hvr-border-fade:focus, .hvr-border-fade:active {
  	box-shadow: inset 0 0 0 4px <?php echo $button_hover_color ?>, 0 0 1px rgba(0, 0, 0, 0);
}
.hvr-border-fade {
	box-shadow: inset 0 0 0 4px #<?php echo $button_color ?>, 0 0 1px rgba(0, 0, 0, 0);
}
.hvr-fade:hover, .hvr-fade:hover, .hvr-fade:focus, .hvr-fade:active, .hvr-sweep-to-right:before, .hvr-sweep-to-left:before, .hvr-sweep-to-bottom:before,
.hvr-sweep-to-top:before, .hvr-bounce-to-right:before, .hvr-bounce-to-left:before, .hvr-bounce-to-bottom:before, .hvr-bounce-to-top:before,
.hvr-radial-out:before, .hvr-radial-in, .hvr-rectangle-in, .hvr-rectangle-out:before, .hvr-shutter-in-horizontal, .hvr-shutter-out-horizontal:before,
.hvr-shutter-in-vertical, .hvr-shutter-out-vertical:before, .hvr-underline-from-left:before, .hvr-underline-from-center:before, 
.hvr-underline-from-right:before, .hvr-overline-from-left:before, .hvr-overline-from-center:before, .hvr-overline-from-right:before, 
.hvr-underline-reveal:before, .hvr-overline-reveal:before {
 	background: <?php echo $button_hover_color ?>;
}
.hvr-hollow:before, .hvr-ripple-in:before, .hvr-ripple-out:before, .hvr-outline-out:before, .hvr-outline-in:before {
	border-color: <?php echo $button_color ?>;
}
.hvr-reveal:before {border-color: <?php echo $button_hover_color ?>;}
.hvr-shutter-in-vertical, .hvr-shutter-in-horizontal, .hvr-radial-in, .hvr-rectangle-in {background: <?php echo $button_hover_color ?> !important;}
<?php endif; ?>

/* Top Menu */
<?php 
$bgcolorRGB             = hex2RGB($elementcolor2);
$HRed                   = $bgcolorRGB['red'];
$HGreen                 = $bgcolorRGB['green'];
$HBlue                  = $bgcolorRGB['blue'];
 ?>
.slicknav_menu {background:<?php echo $header_color ?>}
.slicknav_btn {background:rgba(0,0,0,0.35)}
<?php if($elementcolor20 == "0") : ?>
#container_hornav .hornav > ul {
    background-color: rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1 );
}
<?php endif; ?>

/* Header */
#container_header {
	background: url(<?php echo $this->baseurl ?>/<?php echo $body_bg; ?>) no-repeat fixed;
}
<?php 
$bgcolorRGB             = hex2RGB($header_color);
$HRed                   = $bgcolorRGB['red'];
$HGreen                 = $bgcolorRGB['green'];
$HBlue                  = $bgcolorRGB['blue'];
 ?>
#container_hornav, .header-bottom-bar {
	background-color: rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1 );
}
#header_bg, .vegas-slide {
    border-left: 60px solid rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1 );
    border-right: 60px solid rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1 );
}

/* Full Page Header */
<?php if($header_full == '1') : ?>
#container_header {
    height: 100%;
}
#header_bg {
	height: 100%;
}
#container_spacer1 {
    bottom: 60px;
}
<?php else : ?>
#header {height: 190px;}
#container_header {height:auto;}
#header_bg {
	background-attachment: scroll;
}
#logo {
	padding-bottom: 15px;
}
<?php endif; ?>

/* Showcase */
<?php 
$bgcolorRGB             = hex2RGB($showcase_color);
$HRed                   = $bgcolorRGB['red'];
$HGreen                 = $bgcolorRGB['green'];
$HBlue                  = $bgcolorRGB['blue'];
 ?>
#container_slideshow { 
	background-color: rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1 );
}
/* Top-1# Module Background */
#container_top1_modules {
	background: url(<?php echo $this->baseurl ?>/<?php echo $top1_bg; ?>) no-repeat fixed;
}
<?php 
$bgcolorRGB             = hex2RGB($top1_color);
$HRed                   = $bgcolorRGB['red'];
$HGreen                 = $bgcolorRGB['green'];
$HBlue                  = $bgcolorRGB['blue'];
 ?>
#container_top1_modules {
	background-color: rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1 );
}

/* Top-2# Module Background */
#container_top2_modules {
	background: url(<?php echo $this->baseurl ?>/<?php echo $top2_bg; ?>) no-repeat fixed;
}
<?php 
$bgcolorRGB             = hex2RGB($top2_color);
$HRed                   = $bgcolorRGB['red'];
$HGreen                 = $bgcolorRGB['green'];
$HBlue                  = $bgcolorRGB['blue'];
 ?>
#container_top2_modules {
	background-color: rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1);
}

/* Top-3# Module Background */
#container_top3_modules {
	background: url(<?php echo $this->baseurl ?>/<?php echo $top3_bg; ?>) no-repeat fixed;
}
<?php 
$bgcolorRGB             = hex2RGB($top3_color);
$HRed                   = $bgcolorRGB['red'];
$HGreen                 = $bgcolorRGB['green'];
$HBlue                  = $bgcolorRGB['blue'];
 ?>
#container_top3_modules {
	background-color: rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1);
}

/* Article Background Color */
<?php 
$bgcolorRGB             = hex2RGB($elementcolor3);
$HRed                   = $bgcolorRGB['red'];
$HGreen                 = $bgcolorRGB['green'];
$HBlue                  = $bgcolorRGB['blue'];
 ?>
#container_main {
	background-color: rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1 );
}

/* Bottom-1 Modules */
#container_bottom1_modules {
	background: url(<?php echo $this->baseurl ?>/<?php echo $bottom1_bg; ?>) no-repeat fixed;
}
<?php 
$bgcolorRGB             = hex2RGB($elementcolor16);
$HRed                   = $bgcolorRGB['red'];
$HGreen                 = $bgcolorRGB['green'];
$HBlue                  = $bgcolorRGB['blue'];
 ?>
#container_bottom1_modules {
	background-color: rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1 );
}

/* Bottom-2 Modules */
#container_bottom2_modules {
	background-image: url(<?php echo $this->baseurl ?>/<?php echo $bottom2_bg; ?>);
}
<?php 
$bgcolorRGB             = hex2RGB($elementcolor18);
$HRed                   = $bgcolorRGB['red'];
$HGreen                 = $bgcolorRGB['green'];
$HBlue                  = $bgcolorRGB['blue'];
 ?>
#container_bottom2_modules {
	background-color: rgba(<?php echo $HRed;?>,<?php echo $HGreen;?>,<?php echo $HBlue;?>, 1 );
}

/* Base Modules */
#container_base, #container_copyright, #container_footermenu {background-color: <?php echo $elementcolor9;?>;}

/* Responsive Options */
<?php if($responsive_sw == "1") : ?>

	<?php if($res_top1_sw != "1") : ?>
	@media only screen and ( max-width: 767px ) {
	#container_top1_modules {display:none;}
	}
	<?php endif; ?>
	<?php if($res_top2_sw != "1") : ?>
	@media only screen and ( max-width: 767px ) {
	#container_top2_modules {display:none;}
	}
	<?php endif; ?>
	<?php if($res_top3_sw != "1") : ?>
	@media only screen and ( max-width: 767px ) {
	#container_top3_modules {display:none;}
	}
	<?php endif; ?>
	<?php if($res_sidecola_sw != "1") : ?>
	@media only screen and ( max-width: 767px ) {
	.sidecol_a {display:none;}
	}
	<?php endif; ?>
	<?php if($res_sidecolb_sw != "1") : ?>
	@media only screen and ( max-width: 767px ) {
	.sidecol_b {display:none;}
	}
	<?php endif; ?>
	<?php if($res_bottom_sw != "1") : ?>
	@media only screen and ( max-width: 767px ) {
	#container_bottom_modules {display:none;}
	}
	<?php endif; ?>
	<?php if($res_base_sw != "1") : ?>
	@media only screen and ( max-width: 767px ) {
	#container_base #base.block_holder {display:none;}
	}
	<?php endif; ?>
	<?php if($header_sw != "1") : ?>
	@media only screen and ( max-width: 767px ) {
	.header-1, .header-2 {display:none;}
	}
	<?php endif; ?>

	<?php if($mobile_showcase_sw == '1') : ?>
	@media only screen and ( max-width: 767px ) {
	.showcase {display:none;}
	.mobile_showcase {display:inline;}
	}
	<?php else : ?>
	@media only screen and ( max-width: 767px ) {
	.showcase {display:inline;}
	.mobile_showcase {display:none;}
	}
	<?php endif; ?>
<?php endif; ?>
/* Custom Reponsive CSS */
<?php if($tabport_css != "") : ?>
@media only screen and (min-width: 768px) and (max-width: 959px) {
<?php echo ($tabport_css); ?>
}
<?php endif; ?>   
<?php if($mobland_css != "") : ?>
@media only screen and ( max-width: 767px ) {
<?php echo ($mobland_css); ?>
}
<?php endif; ?>   
<?php if($mobport_css != "") : ?>
@media only screen and (max-width: 440px) {
<?php echo ($mobport_css); ?>
}
<?php endif; ?>

 /* Module Container Padding */
<?php if($top1_padding != "0") : ?>
#top1_modules.block_holder {padding: 0;}
#top1_modules .module_surround, #top1_modules .module_content {padding: 0;}
<?php endif; ?>

<?php if($top2_padding != "0") : ?>
#top2_modules.block_holder {padding: 0;}
#top2_modules .module_surround, #top2_modules .module_content {padding: 0;}
<?php endif; ?>

<?php if($top3_padding != "0") : ?>
#top3_modules.block_holder {padding: 0;}
#top3_modules .module_surround, #top3_modules .module_content {padding: 0;}
<?php endif; ?>

<?php if($bottom_padding != "0") : ?>
#bottom_modules.block_holder {padding: 0;}
#bottom_modules .module_surround, #bottom_modules .module_content {padding: 0;}
<?php endif; ?>

<?php if($bottom2_padding != "0") : ?>
#bottom2_modules.block_holder {padding: 0;}
#bottom2_modules .module_surround, #bottom2_modules .module_content  {padding: 0;}
<?php endif; ?>

<?php if($base1_padding != "0") : ?>
#base1_modules.block_holder {padding: 0;}
#base1_modules .module_surround, #base1_modules .module_content  {padding: 0;}
<?php endif; ?>

<?php if($base2_padding != "0") : ?>
#base2_modules.block_holder {padding: 0;}
#base2_modules .module_surround, #base2_modules .module_content  {padding: 0;}
<?php endif; ?>

/* Header-# Adjustment */
<?php if ($this->countModules('header-1') || $this->countModules('header-2')) { ?>

<?php }?>

/*--Load Custom Css Styling--*/
<?php echo ($custom_css); ?>

</style>

<?php if($customcss_sw == "1") : ?>
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template?>/css/custom.css" type="text/css" />
<?php endif; ?>
