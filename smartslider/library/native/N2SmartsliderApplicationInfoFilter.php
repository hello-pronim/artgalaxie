<?php

if (!defined('N2SSPRO')) {
    define('N2SSPRO', 1);
}

class N2SmartsliderApplicationInfoFilter {

    /**
     * @param $info N2ApplicationInfo
     */
    public static function filter($info) {
        $info->setUrl("index.php?application=smartslider");
    }
}

function N2RouteSmartSlider() {
    $app = N2Base::getApplication("smartslider");
    $app->getApplicationType('backend')
        ->setCurrent()
        ->render(array(
            "controller" => 'sliders',
            "action"     => 'index'
        ));

    return $app;
}


function N2SmartSlider($id) {
    N2Base::getApplication("smartslider")
          ->getApplicationType('frontend')
          ->render(array(
              "controller" => 'home',
              "action"     => 'native',
              "useRequest" => false
          ), array(
              intval($id),
              ''
          ));
}

N2NativeDispatcher::register('smartslider', 'N2RouteSmartSlider');

function N2RouteSmartSliderLogin() {
    $app = N2Base::getApplication("smartslider");
    $app->getApplicationType('backend')
        ->setCurrent()
        ->render(array(
            "controller" => "login",
            "action"     => "index",
            'useRequest' => false
        ));

    return $app;
}

N2NativeDispatcher::register('smartslider-login', 'N2RouteSmartSliderLogin');