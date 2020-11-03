<head>
<?php $this->load->view('mainsite/common/meta-files');?>
<base href="https://www.artgalaxie.com/" />
<meta name="robots" content="index, follow" />
<meta name="keywords" content="Artists, Art, Contemporary Art, Painting, Sculpture, Drawing, Digital Art, Fine Arts, Art Portal, Art Book, Art Magazine, Documentary films, Art News" />
<meta name="rights" content="Art Galaxie" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Art Galaxie is an organization that serves to promote and disseminate the artwork of Contemporary Artists. For this purpose, we use the most distinct and complementary platforms: this Art Portal, various publications of Art Books, an Art Magazine and documentary films. Art Galaxie also organizes large international exhibitions (both collective and solo) in various countries within Europe, the Middle East and the United States of America.  " />

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

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-76829237-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-76829237-1');
</script>
</head>