<?php 
    $design->header(array(
        'title' => true,
        'theme' => 'dark', // white or dark
        'float' => 'left',
        'menu' => [
            [
                'name' => "Menu 1",
                'url' => "/z"
            ],

            [
                'name' => "Login",
                'url' => "/login"
            ],

            [
                'name' => "Register",
                'url' => '/register'
            ]
        ],        
    ));
?>