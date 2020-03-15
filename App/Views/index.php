<?php 
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

    $design->collapse(
        $type = 'btn', // btn or collapse
        $name = 'collapseku',
        $value = "My First Collapse"
    );

    // You can put this script where do you want
    $design->collapse(
        $type = 'collapse',
        $name = 'collapseku',
        $value = "Test collapse pertamaku menggunakan function PHP",
    )
?>