<?php 
/**
 * OFI PHP Framework 
 * Define project name and environment settings
 */

 // Your Project Name
define('PROJECTNAME', 'OFI Framework');

// Your Project URL
define('PROJECTURL', 'http://localhost/lks/');

 // Your Project Environment
define('ENVIRONMENT', 'development');


// Database MYSQLI connection configuration
$config['host']         = 'localhost';
$config['dbname']       = 'lks';
$config['user']         = 'root';
$config['password']     = '';

/**
 * Define SEO tag for your website
 * please change according to your needs
 * 
 * What is google-site-verification?
 * For example for the tag :
 * <meta name="google-site-verification" content="ZJTLoB1wuXx1aV_gw0ATcBmS0tk8M3IuUkOMi_Qi6C8" />
 * 
 * You can only take the meta tag content, and then the content is
 *          ZJTLoB1wuXx1aV_gw0ATcBmS0tk8M3IuUkOMi_Qi6C8 
 * please put thats content in define('GoogleSiteVerification', '');
 */

// Description for your website
define('DESCRIPTION', 'OFI PHP Framework');
define('AUTHOR', 'Teguh Rijanandi');

// Separate with comma
define('KEYWORDS', 'Framework, PHP, Backend'); 
define('GoogleSiteVerification', '');


