<?php 

global $config;

// Database connection configuration
$config['host']='localhost';
$config['dbname']='lks';
$config['user']='root';
$config['password']='';

// Define project name and environment settings
define('PROJECTNAME', 'OFI Framework');
define('ENVIRONMENT', 'development');

// Dont change this line
define('BASE', (
    isset($_SERVER['HTTPS']) && 
    $_SERVER['HTTPS'] === 'on' ? "https" : "http") . 
    "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

define('BASEURL', __DIR__ . '/');
define('PROJECTPATH', __DIR__);
header('Access-Control-Allow-Origin: *');

