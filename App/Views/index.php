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
                'name' => "Menu 2",
                'url' => "/fb"
            ],
        ],        
    ));

    $design->collapse([
        'name' => "Collapseku", // must same
        'type' => 'btn', // btn or collapse
        'value' => "Toggle Collapse"
    ]);

    // You can put this script where do you want
    $design->collapse([
        'name' => "Collapseku", // must same
        'type' => 'collapse',
        'value' => "My first collapse with php function"
    ]);

    //echo $_SERVER["HTTP_HOST"]  $_SERVER["REQUEST_URI"]
    
?>