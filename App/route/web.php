<?php 

/**
 * URL Declaration in array
 * HTTP Method Support GET and POST only, this optional value you can write or not. 
 * The default HTTP Method is GET, if you not write HTTP Method  (See the sample)
 * 
 *  Kinds of Type :
 *    1. controller  is redirect to a controller (use @ for select a method)
 *    2. url         is redirect to a URL. For example you can write like this www.google.com
 *    3. print       is print a message
 *    4. view        is redirect to a view
 *    5. json        is to fetch a API URL and print to JSON format (Only support GET Method API)
 *                   For example you can use this API URL for testing 
 *                   https://jsonplaceholder.typicode.com/todos/1
 */

$route = [
    // Auth Route Declaration
    // you can remove comment tag to turn on this route

    // ['url' => "login",'type' => 'controller','to' => 'Auth\authController@login',],
    // ['url' => "register",'type' => 'controller','to' => 'Auth\authController@register',],
    // ['url' => "register-save", 'method' => 'POST', 'type' => 'controller','to' => 'Auth\authController@register_save',],
    // ['url' => "login-detect", 'method' => 'POST', 'type' => 'controller','to' => 'Auth\authController@login_detect',],
    // ['url' => "logout", 'method' => 'POST', 'type' => 'controller','to' => 'Auth\authController@logout',],
    // ['url' => "home",'type' => 'controller','to' => 'Auth\homeController@home',],

    [
        'url' => "fb",
        'type' => '', // URL Type not declared,
                      // this is will showing 500 error message
        'to' => 'www.facebook.com'
    ],
    [
        'url' => "", // Home (main index.php file)
        'type' => 'controller',
        'to' => 'indexController@index'
    ],
];
