<?php 
    $design->header(array(
        'title' => true,
        'theme' => 'white', // white or dark
        'float' => 'right',
        'menu' => [
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

<div class="container-fluid text-center d-flex justify-content-center align-items-center" style="height: 90vh;">
    <div class="container">
        <h1>Hello World!</h1>
        <h3>Welcome in OFI PHP Framework, I Hope You Can Enjoy This Project</h3>

        <br>

        <a href="https://github.com/teguh02/ofi-php-framework">Open Github</a>
    </div>
</div>