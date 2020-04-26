<?php

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\helper;
use App\Middleware\auth\auth;
use App\Models\DB;
use App\provider\event;

class authController extends Controller
{
    public function __construct()
    {
        auth::check();
    }

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
        $this->whenRegistration();
        $Auth['fullname'] = helper::request('Full name');
        $Auth['username'] = helper::request('username');
        $Auth['email'] = helper::request('email');
        $Auth['password'] = helper::hash(helper::request('password'));

        $database_engine = new DB();
        $status = $database_engine->insert($Auth, 'users');
        $flash = new \Plasticbrain\FlashMessages\FlashMessages();
        if ($status == 'gagal') {
            $flash->error('Failed to registration, try again', '/register');
        } else {
            $flash->success('Registration success, please login now', '/register');
        }
    }

    public function login_detect()
    {
        $this->whenLogin();
        $Auth['usernameoremail'] = helper::request('usernameoremail');
        $Auth['password'] = helper::request('password');

        $Databse_engine = new DB();
        $cek = $Databse_engine->deteksi_login($Auth);

        if ($cek['status'] == 'yes') {
            $_SESSION['login_user'] = 'sukses';
            $_SESSION['id_user'] = $cek['id'];
            helper::redirect('/home');
        } else {
            $flash = new \Plasticbrain\FlashMessages\FlashMessages();
            $flash->error('Failed to login, try again', '/login');
        }
    }

    public function logout()
    {
        $this->whenLogout();
        $_SESSION['login_user'] = null;
        $_SESSION['id_user'] = null;
        helper::redirect('/login');
    }
}
