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
        'type' => 'link', // btn or collapse
        'value' => "Toggle Collapse"
    ]);

    // You can put this script where do you want
    $design->collapse([
        'name' => "Collapseku", // must same
        'type' => 'collapse',
        'value' => "My first collapse with php function"
    ]);

    // Default all required input
    $design->form('post', [
        'url' => '#', // Up to you Where you want to post data
        'submit' => 'Simpan', // value of submit button
        'input' => [ // contains ofi php framework input script
            [
                'name' => 'Email',
                'type' => 'email', // null, text, password, email and etc
                'required' => 'no', // optional, you can remove this line
            ],

            [
                'name' => 'Jenis Kelamin', // jenis kelamin (gender)
                'input' => 'select',
                'required' => 'yes',
                'option' => [ // option can be use in select input only
                    [
                        'value' => 'l', // value of option tag
                        'text' => "laki laki" // text in option tag
                    ],
                    [
                        'value' => 'p',
                        'text' => "Perempuan",
                    ]
                ]
            ],

            [
                'name' => 'alamat',
                'input' => 'textarea', // input, textarea, select
                'required' => 'no', // yes or no
            ]
        ],
    ]);
    
?>