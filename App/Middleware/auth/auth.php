<?php 

namespace App\Middleware\auth;
use App\Models\DB;
use App\Core\Model;
use App\Core\helper;
use App\Core\Controller;

class auth {

    public static function check()
    {
       if($_SESSION['login_user'] != 'sukses') {
            $kontroller  = new Controller();
            $kontroller->loadTemplate('Auth\login', null);
       } else {
            self::cek_valuenya();
       }
    }

    public static function cek_valuenya()
    {
        if($_SESSION['login_user'] == 'sukses') {
            $data['id'] = $_SESSION['id_user']; 

            $database_engine = new DB();
            $dapatkan_detail_user = $database_engine->get_user_login($data);

                foreach ($dapatkan_detail_user as $key => $value) {
                    $_SESSION[$key] =  $value;
                }

        } else {
            $flash = new \Plasticbrain\FlashMessages\FlashMessages();
            $flash->error('Failed to login, try again', '/login'); 
        }
    }

}