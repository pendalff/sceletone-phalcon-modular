<?php
/**
 * Bootstrap file define some need constants and set inital settings
 *
 * @author    Fukalov Sem <yapendalff@gmail.com>
 */

/**
 * Show all errors
 */
error_reporting(E_ALL);

/**
 * Set the default time zone.
 * @see  http://php.net/timezones
 */
date_default_timezone_set('Europe/Moscow');

/**
 * Set the default locale.
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'ru_RU.utf-8');

/**
 * shotcut for DIRECTORY_SEPARATOR
 */
define('DS', DIRECTORY_SEPARATOR);

/**
 * Current environment, here setted from .htaccess  as 'SetEnv APPLICATION_ENV "(test|dev|prod)"'
 */
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'prod'));

/**
 * Base path
 */
define('BASE_PATH', __DIR__ . DS . '..' );

/**
 * Application path
 */
define('APPLICATION_PATH',  __DIR__ );

/**
 * Web path
 */
define('PUBLIC_PATH', __DIR__ . DS . '..' . DS . 'www');

/**
 * Include Composer autoloader
 */
if( is_file(BASE_PATH. DS . 'vendor'. DS .'autoload.php') ) {
  require_once(BASE_PATH. DS . 'vendor'. DS .'autoload.php');
}

/**
 * Include global functions
 */
if( is_file(APPLICATION_PATH. DS . 'helpers'. DS .'global.php') ) {
  require_once(APPLICATION_PATH. DS . 'helpers'. DS .'global.php');
}