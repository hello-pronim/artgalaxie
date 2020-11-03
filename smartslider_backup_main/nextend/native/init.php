<?php
define('N2WORDPRESS', 0);
define('N2JOOMLA', 0);
define('N2MAGENTO', 0);
define('N2NATIVE', 1);

if (!defined('N2PRO')) {
    define('N2PRO', 1);
}

N2Pluggable::addAction('nextendBaseReady', 'n2_normalize_css');
function n2_normalize_css() {
    N2AssetsManager::getInstance();
    N2CSS::addFile(N2LIBRARYASSETS . '/normalize.min.css', 'normalize');

}

class N2Native {

    public static $nextend_head = '';

    public static function beforeOutputStart() {
        ob_start("N2Native::platformRenderEnd");
        ob_start();
    }

    public static function beforeClosingBody() {
        if (defined('N2LIBRARY')) {
            ob_start();
            if (class_exists('N2AssetsManager')) {
                echo N2AssetsManager::getCSS();
                echo N2AssetsManager::getJs();
            }
            self::$nextend_head = ob_get_clean();
        }
        return true;
    }

    public static function platformRenderEnd($buffer) {
        if (self::$nextend_head != '') {
        
            $parts = preg_split('/<\/head>/', $buffer, 2);

            return implode(self::$nextend_head . '</head>', $parts);
        }
        return $buffer;
    }
}