<?php

class N2User
{

    private static $loggedIn = false;

    public static function init() {
        if (isset($_SESSION['n2user']) && isset($_SESSION['n2user']['user_name']) && isset($_SESSION['n2user']['password'])) {
            if ($_SESSION['n2user']['user_name'] === N2NativeConfig::$USER_NAME && $_SESSION['n2user']['password'] === N2NativeConfig::$USER_PASSWORD) {
                self::$loggedIn = true;
            }
        }
    }

    public static function isLoggedIn() {
        return self::$loggedIn;
    }

    public static function doLogIn($user_name, $password) {
        if ($user_name !== N2NativeConfig::$USER_NAME) {
            return false;
        }

        switch (N2NativeConfig::$PASSWORD_ENCRYPTION) {
            case 'md5':
                $_password = md5(N2NativeConfig::$MD5_SALT . $password);
                if ($_password !== N2NativeConfig::$USER_PASSWORD) {
                    return false;
                }
                break;
            default:
                $_password = $password;
                if ($_password !== N2NativeConfig::$USER_PASSWORD) {
                    return false;
                }
                break;
        }

        $_SESSION['n2user'] = array(
            'user_name' => $user_name,
            'password'  => $_password
        );
        return true;
    }

    public static function logOut() {
        unset($_SESSION['n2user']);
        if (isset($_SESSION['n2nonce'])) {
            unset($_SESSION['n2nonce']);
        }
    }
}

N2User::init();