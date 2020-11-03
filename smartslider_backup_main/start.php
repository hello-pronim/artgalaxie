<?php
define('N2PRO', 1);
define('N2SSPRO', 1);

define('WP_CONTENT_DIR', dirname(__FILE__));
define('WP_DEBUG', 1);
define('WP_DEBUG_DISPLAY', 1);

global $wp_version;
$wp_version            = '4.2.0';
$GLOBALS['wp_version'] = $wp_version;
define('ROOT_PATH', dirname(__FILE__));
if (!file_exists(ROOT_PATH . '/config.php')) {
    die("Please rename config.php.conf to config.php and fill the credentials!");
}
require_once(ROOT_PATH . '/config.php');

if(!isset($_SESSION)) { 
	session_start();
}

require_once(ROOT_PATH . '/nextend/nextend.php');


N2Base::registerApplication(dirname(__FILE__) . '/nextend/library/applications/system/N2SystemApplicationInfo.php');
N2Base::getApplication('system')
      ->getApplicationType('backend');

N2Base::registerApplication(dirname(__FILE__) . '/library/smartslider/N2SmartsliderApplicationInfo.php');

function _doing_it_wrong() {
    echo 'Database Error, please verify the database credentials in config.php';
    exit;
}

function wp_die($message) {
    echo $message;
    exit;
}