<?php

class N2Uri extends N2UriAbstract
{

    function __construct() {

        $this->_baseuri = rtrim(N2NativeConfig::$url, '/');
        if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off') {
            $this->_baseuri = str_replace('http://', 'https://', $this->_baseuri);
        }
        self::$scheme = parse_url($this->_baseuri, PHP_URL_SCHEME);
    }
}