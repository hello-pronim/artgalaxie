<?php
define('N2ADMIN', true);
if(!file_exists(dirname(__FILE__) . '/start.php')){
	echo 'There was an error in the code, so please do the <a href="https://smartslider3.helpscoutdocs.com/article/1352-html-app-alternative-update" target="_blank">alternative update</a> instead!';
	exit;
}
require_once(dirname(__FILE__) . '/start.php');

if (!file_exists(dirname(__FILE__) . '/installed')) {
    require_once(dirname(__FILE__) . '/install.php');
} else {
    require_once(dirname(__FILE__) . '/library/smartslider/smartslider3.php');
    $version = file_get_contents(dirname(__FILE__) . '/installed');
    if (empty($version) || version_compare($version, N2SS3::$version, '<')) {
        require_once(dirname(__FILE__) . '/install.php');
    }
}

$application = 'smartslider';

if (isset($_REQUEST['application'])) {
    $application = $_REQUEST['application'];
}

ob_start();
$app = N2NativeDispatcher::dispatch($application);
n2_exit();
$body = ob_get_clean();
?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title><?php echo $app->info->getLabel(); ?></title>
    <?php
    echo N2AssetsManager::getCSS();
    echo N2AssetsManager::getJs();
    ?>
</head>

<body class="n2-platform-native">
<?php echo $body; ?>
</body>
</html>