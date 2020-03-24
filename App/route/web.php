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
    ['url' => "login",'type' => 'controller','to' => 'authController@login',],
    ['url' => "register",'type' => 'controller','to' => 'authController@register',],
    ['url' => "register-save", 'method' => 'POST', 'type' => 'controller','to' => 'authController@register_save',],
    ['url' => "login-detect", 'method' => 'POST', 'type' => 'controller','to' => 'authController@login_detect',],

	[
        'url' => "z",
        'type' => 'url',
        'method' => 'get', // GET AND POST only
        'to' => 'www.google.com'
    ],
    [
        'url' => "print",
        'type' => 'print',
        //'method' => "post", // if you need, you can remove this line
        'to' => 'Testing Only'
    ],
    [
        'url' => "fb",
        'type' => '', // URL Type not declared,
                      // this is will showing 500 error message
        'to' => 'www.facebook.com'
    ],
    [
        'url' => "", // Home (main index.php file)
        'type' => 'view',
        'to' => 'index'
    ],

    [
        'url' => "test-controller-pass-hash",
        'type' => 'controller',
        'to' => 'indexController@password_hash'
    ],
    [
        'url' => "json-sample",
        'type' => 'json',
        'from' => 'https://jsonplaceholder.typicode.com/todos/1',
    ],
    
];
