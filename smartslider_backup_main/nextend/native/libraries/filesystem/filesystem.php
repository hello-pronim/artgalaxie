<?php

/**
 * Class N2Filesystem
 */
class N2Filesystem extends N2FilesystemAbstract
{

    public function __construct() {
        $this->_basepath    = ROOT_PATH;
        $this->_librarypath = str_replace($this->_basepath, '', N2LIBRARY);
        
        self::measurePermission(N2Platform::getPublicDir());
    }

    public static function getImagesFolder() {
        return N2Platform::getPublicDir();
    }
}