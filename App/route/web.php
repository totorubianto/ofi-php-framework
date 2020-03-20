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
        'url' => "test-controller",
        'type' => 'controller',
        'to' => 'indexController@test'
    ],
    
];
