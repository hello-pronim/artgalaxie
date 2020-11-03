<?php

if (!defined("N2_PLATFORM_LIBRARY")) define('N2_PLATFORM_LIBRARY', dirname(__FILE__) . '/native');

class N2NativeDispatcher
{

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
            $name = 'nextend-login';
        }
        return call_user_func(self::$routes[$name]);
    }
}


require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'library.php');
require_once(N2_PLATFORM_LIBRARY . DIRECTORY_SEPARATOR . 'init.php');

N2Loader::import('libraries.user.user', 'platform');