<?php

class N2Form extends N2FormAbstract
{

    public static function tokenize() {
        return '<input type="hidden" name="nextend_nonce" value="' . htmlspecialchars(self::getNonce()) . '" />';
    }

    public static function tokenizeUrl() {
        $a                  = array();
        $a['nextend_nonce'] = self::getNonce();
        return $a;
    }

    public static function checkToken() {
        return N2Request::getVar('nextend_nonce') == self::getNonce();
    }

    private static function getNonce() {
        if (!isset($_SESSION['n2nonce'])) {
            $_SESSION['n2nonce'] = md5(hash('sha512', self::makeRandomString()));
        }
        return $_SESSION['n2nonce'];
    }

    private static function makeRandomString($bits = 256) {
        $bytes  = ceil($bits / 8);
        $return = '';
        for ($i = 0; $i < $bytes; $i++) {
            $return .= chr(mt_rand(0, 255));
        }
        return $return;
    }
}
