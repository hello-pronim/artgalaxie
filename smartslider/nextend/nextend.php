<?php

defined('N2GSAP') || define('N2GSAP', 1);
if (!defined("N2_PLATFORM_LIBRARY")) define('N2_PLATFORM_LIBRARY', dirname(__FILE__) . '/native');

class N2NativeDispatcher {

    private static $routes = array();

    public static function register($name, $callback) {
        self::$routes[$name] = $callback;
    }

    /**
     * @param $name
     *
     * @return N2Application
     */
    public static function dispatch($name) {
        if ((!empty(N2NativeConfig::$USER_NAME) || !empty(N2NativeConfig::$USER_PASSWORD)) && !N2User::isLoggedIn()) {
            $name = 'smartslider-login';
        }

        return call_user_func(self::$routes[$name]);
    }
}


require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'native' . DIRECTORY_SEPARATOR . 'init.php');
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'library.php');

N2Pluggable::addAction('nextendBaseReady', 'n2_normalize_css');
function n2_normalize_css() {
    N2AssetsManager::getInstance();
    N2CSS::addFile(N2LIBRARYASSETS . '/normalize.min.css', 'normalize');

}

N2Loader::import('libraries.user.user', 'platform');