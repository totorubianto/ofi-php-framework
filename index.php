<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

function autoload($class_name)
{
    $filename = PROJECTPATH . '/' . str_replace('\\', '/', $class_name) . '.php';
    if (is_file($filename))
    {
        include_once $filename;
    }
}

spl_autoload_register('autoload');

require 'config.php';


use App\Core\Core;

$core = new App\Core\Core();
$core->run();

