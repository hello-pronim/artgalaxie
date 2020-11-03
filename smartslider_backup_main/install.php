<?php
define('N2ADMIN', true);
require_once(dirname(__FILE__) . '/start.php');

N2Base::getApplication("system")
      ->getApplicationType('backend')
      ->render(array(
          "controller" => "install",
          "action"     => "index",
          "useRequest" => false
      ), array(true));

N2Base::getApplication("smartslider")
      ->getApplicationType('backend')
      ->render(array(
          "controller" => "install",
          "action"     => "index",
          "useRequest" => false
      ), array(true));

if(file_put_contents(dirname(__FILE__) . '/installed', N2SS3::$version) !== false){
    header('Location: ' . rtrim(N2NativeConfig::$url, '/') . '/index.php');
}
echo 'Unable to create file: '.dirname(__FILE__) . '/installed';
exit;