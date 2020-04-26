<?php

/**
 * OFI PHP Framework
 * Define project name and environment settings.
 */

 // Your Project Name
define('PROJECTNAME', 'OFI Framework');

 // Your Project Environment production or development
define('ENVIRONMENT', 'development');

// Your Project URL
define('PROJECTURL', 'http://localhost:9000/');

// Upload file function limiter 
// default 1044070 = 1 mb
define('MAXUPLOAD', 1044070);


// Database MYSQLI connection configuration
$config['host'] = 'localhost';
$config['dbname'] = 'lks';
$config['user'] = 'root';
$config['password'] = '';

/**
 * Define SEO tag for your website
 * please change according to your needs.
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

/**
 * Define your sites mailer
 * This is default config for gmail
 * Default Mailer is use SMTP.
 *
 * Tips!
 * First you must turn on Access for less secure apps in
 * https://myaccount.google.com/lesssecureapps
 *
 * And then you can change this gmail username and password
 * with your's gmail account
 *
 * Enable SMTP debugging
 * 0 = off (for production use)
 * 1 = client messages
 * 2 = client and server messages
 */
define('SMTPSecure', 'tls');
define('Host', 'smtp.gmail.com');
define('Port', 587);
define('GmailUsername', 'youremail@gmail.com');
define('GmailPassword', 'yourpass');
define('SMTPDebug', 0);
define('senderEmail', 'system@ofiFramework.com');
define('senderName', 'OFI Framework Mailing System');
