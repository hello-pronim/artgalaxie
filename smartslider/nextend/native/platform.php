<?php

class N2Platform {

    public static $isAdmin = false;

    public static $hasPosts = false, $isJoomla = false, $isWordpress = false, $isMagento = false, $isNative = false;

    public static $name;

    public static function init() {
        self::$isNative = true;
        if (defined('N2ADMIN')) {
            self::$isAdmin = true;
        }
    }

    public static function getPlatform() {
        return 'native';
    }

    public static function getPlatformName() {
        return 'HTML App';
    }

    public static function getDate() {
        return date('Y-m-d H:i:s');
    }

    public static function getTime() {
        return time();
    }

    public static function getPublicDir() {
        return ROOT_PATH . '/uploads';
    }

    public static function getUserEmail() {
        return '';
    }

    public static function adminHideCSS() {
        echo '
        body.n2-platform-native {
            padding: 0;
        }
        ';
    }

    public static function updateFromZip($fileRaw, $updateInfo) {
        N2Loader::import('libraries.zip.reader');

        $tmpHandle = tmpfile();
        fwrite($tmpHandle, $fileRaw);
        $metaData    = stream_get_meta_data($tmpHandle);
        $tmpFilename = $metaData['uri'];
        $files       = N2ZipReader::read($tmpFilename);
        fclose($tmpHandle);

        if (empty($files)) {
            return false;
        }

        $root = N2Filesystem::getBasePath();

        if (N2Filesystem::existsFolder($root . '/library')) N2Filesystem::deleteFolder($root . '/library');
        if (N2Filesystem::existsFolder($root . '/nextend')) N2Filesystem::deleteFolder($root . '/nextend');
        if (N2Filesystem::existsFolder($root . '/session')) N2Filesystem::deleteFolder($root . '/session');
        if (N2Filesystem::existsFile($root . '/config.php.conf')) N2Filesystem::deleteFolder($root . '/config.php.conf');
        if (N2Filesystem::existsFile($root . '/index.php')) N2Filesystem::deleteFolder($root . '/index.php');
        if (N2Filesystem::existsFile($root . '/start.php')) N2Filesystem::deleteFolder($root . '/start.php');
        if (N2Filesystem::existsFile($root . '/install.php')) N2Filesystem::deleteFolder($root . '/install.php');

        self::recursive_extract($files, $root . '/');

        return true;
    }

    private static function recursive_extract($files, $targetFolder) {
        foreach ($files AS $fileName => $file) {
            if (empty($fileName) || $fileName == '.' || $fileName == '..') continue;
            if (is_array($file)) {
                if (N2Filesystem::existsFolder($targetFolder . $fileName . '/') || N2Filesystem::createFolder($targetFolder . $fileName . '/')) {
                    self::recursive_extract($file, $targetFolder . $fileName . '/');
                } else {
                    return false;
                }
            } else {
                if (N2Filesystem::createFile($targetFolder . $fileName, $file) === false) {
                    return false;
                }
            }
        }

        return true;
    }

    public static function needStrongerCSS() {

        return false;
    }
}

N2Platform::init();
