<?php 

$route = [
	[
        'url' => "z",
        'type' => 'url',
        'to' => 'www.google.com'
    ],
    
    [
        'url' => "fb",
        'type' => '',
        'to' => 'www.facebook.com'
    ],
    [
        'url' => "", // Home
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
