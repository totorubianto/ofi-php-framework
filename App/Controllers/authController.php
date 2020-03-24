<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Core\helper;
use App\Models\DB;

class authController extends Controller {

    // Redirect to login page
    public function login()
    {
        $this->loadTemplate('Auth\login', null);
    }

    // Redirect to register page
    public function register()
    {
        $this->loadTemplate('Auth\register', null);
    }

    public function register_save()
    {
        $Auth['fullname'] = helper::request('Full name');
        $Auth['username'] = helper::request('username');
        $Auth['email'] = helper::request('email');
        $Auth['password'] = helper::hash(helper::request('password'));

        $this->DB->insert($Auth, 'users');
        
        if(!$status) {
            $this->flash->error('Gagal mendaftar silahkan coba lagi', '/register');  
        }else {
            $this->flash->success('Berhasil mendaftar, silahkan login', '/register');  
        }
    }
}

?>