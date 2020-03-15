<?php 
    // Create header section
    $design->header(array(
        'title' => true,
        'theme' => 'dark', // white or dark
        'float' => 'left',
        'menu' => [
            [
                'name' => "Menu 1",
                'url' => "http://google.com"
            ],

            [
                'name' => "Menu 2",
                'url' => "http://google.com"
            ],
        ],        
    ));
?>