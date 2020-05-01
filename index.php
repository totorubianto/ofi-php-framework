<?php

/**
 * OFI PHP Framework
 * By Teguh Rijanandi
 * Version 1.0
 * Contact : teguhrijanandi02@gmail.com.
 */
session_start();
global $config;
require 'config.php';
require 'vendor/autoload.php';

use App\Core\Controller;

// Dont change this line
define('BASE', (
    isset($_SERVER['HTTPS']) &&
    $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'
).
    "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
define('BASEURL', __DIR__.'/');
define('PROJECTPATH', __DIR__);

/**
 * OFI PHP Framework
 * Register autoload service.
 */
function autoload($class_name)
{
    $filename = PROJECTPATH.'/'.str_replace('\\', '/', $class_name).'.php';
    if (is_file($filename)) {
        include_once $filename;
    }
}

spl_autoload_register('autoload');

switch (ENVIRONMENT) {
    case 'development':
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);

        $whoops = new \Whoops\Run();
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
        $whoops->register();
        error_reporting(E_ALL);
        error_reporting(E_ALL & E_NOTICE & E_DEPRECATED & E_STRICT & E_USER_NOTICE & E_USER_DEPRECATED);
        break;

    case 'production':
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(0);
        break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', true, 503);
        $controller = new Controller();
        $controller->error500('The application environment is not set correctly, please check in your config file');
        exit(1); // EXIT_ERROR
        break;
}

$core = new App\Core\Core();
$core->run();
