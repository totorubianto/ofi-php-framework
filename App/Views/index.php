<?php 
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