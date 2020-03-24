<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;
use App\Core\helper;
use App\Models\DB;
use App\Core\Model;

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
        
       if($status == 'gagal') {
            $this->flash->error('Failed to registration, try again', '/register');    
        } else {
            $this->flash->success('Registration success, please login now', '/register');
        }
    }

    public function login_detect()
    {
        $Auth['usernameoremail'] = helper::request('usernameoremail');
        $Auth['password'] = helper::request('password');

        $cek = $this->DB->deteksi_login($Auth);

        if($cek['status'] == 'yes') {
        echo '  <script>
                    localStorage.setItem("id_user", '. $cek["id"] .');
                    localStorage.setItem("login_user", "sukses");
                </script>
            ';
        $_SESSION['login_user'] = "sukses";
        } else {
            $this->flash->error('Failed to login, try again', '/login');   
        }
    }
}

?>