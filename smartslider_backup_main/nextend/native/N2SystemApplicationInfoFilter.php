<?php

class N2SystemApplicationInfoFilter
{

    /**
     * @param $info N2ApplicationInfo
     */
    public static function filter($info) {
        $info->setUrl("index.php?application=nextend");
    }
}

function N2RouteNextend() {
    $app = N2Base::getApplication("system");
    $app->getApplicationType('backend')->setCurrent()->render(array(
        "controller" => "dashboard",
        "action"     => "index"
    ));
    return $app;
}

N2NativeDispatcher::register('nextend', 'N2RouteNextend');

function N2RouteNextendLogin() {
    $app = N2Base::getApplication("system");
    $app->getApplicationType('backend')->setCurrent()->render(array(
        "controller" => "login",
        "action"     => "index",
        'useRequest' => false
    ));
    return $app;
}

N2NativeDispatcher::register('nextend-login', 'N2RouteNextendLogin');