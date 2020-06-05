

<style>
    .tengah {
        display: flex;
        height: 100vh;
        align-items: center;
        justify-content: center;
    }

    body {background-color: #eeeeee;}
</style>

<div class="container-fluid tengah">
    <div class="container col-md-4">
        <?php
            $flash->display();
        ?>
        <div class="card">
            <div class="card-body">
                <h5 class="mb-3">Login Page</h5>

                <?php
                    $design->form('post', [
                        'url'    => '/deteksi-masuk',
                        'submit' => 'Login',
                        'input'  => [
                            [
                                'name' => 'username or email',
                            ],
                            [
                                'name' => 'password',
                                'type' => 'password',
                            ],
                        ],
                    ]);
                ?>
            </div>
        </div>
    </div>
</div>