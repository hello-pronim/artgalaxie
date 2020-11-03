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