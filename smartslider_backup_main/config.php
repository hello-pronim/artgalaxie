<?php

class N2NativeConfig
{
    //You can find more detailed instructions here: http://doc.smartslider3.com/article/149-html-app-installation

    //DO NOT LEAVE THESE FIELDS EMPTY, OTHERWISE THE SLIDER WILL NOT WORK CORRECTLY.
    public static $url = '/smartslider/';                        // Site url, example.: http://my-site.com/smartslider3-admin/
    public static $locale = 'en_EN';
    public static $TIMEZONE = 'America/Los_Angeles';

    public static $DB_HOST = 'localhost';           // MySQL host
    public static $DB_USER = 'artgal6_liveartg'; 
    public static $DB_PASSWORD = 'fcharlotte28262'; 
    public static $DB_NAME = 'artgal6_liveartgalaxie';
    //public static $DB_USER = 'yourdemo_smartslider';                    // MySQL user
    //public static $DB_PASSWORD = 'Ss3@123$*';                // MySQL password
    //public static $DB_NAME = 'yourdemo_smartslider';                    // MySQL database name
    public static $TABLE_PREFIX = 'htmlapp_';               // Prefix for tables

    public static $USER_NAME = 'art_galaxie';                  // Login name for Smart Slider 3
    public static $USER_PASSWORD = 'art_galaxie123@';              // Login password for Smart Slider 3

    // You can leave these empty if you don't need them.
    public static $MD5_SALT = '';
    public static $PASSWORD_ENCRYPTION = '';
}

date_default_timezone_set(N2NativeConfig::$TIMEZONE);

/**
 * Security token mismatch error means that your session folder is not writable or non existent. Make sure that your php.ini is correct and check the 'session.save_path' setting. 
 * Also as a quick workaround, you could try to uncomment the following ini_set option, which changes your session.save_path
 */  
//ini_set('session.save_path', WP_CONTENT_DIR.'/session');