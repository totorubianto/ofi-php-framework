<?php

namespace App\Middleware\auth;

use App\Core\Controller;
use App\Models\DB;
use App\Core\helper;

/**
 * Login Middleware
 * you can use this middleware to your controller
 * if you want to prohibit not login user for accessing
 * your controller.
 */
class auth
{
    public static function check()
    {
        if ($_SESSION['login_user'] == 'sukses') {
            self::cek_valuenya();
        } else {
            if(strpos(BASE, 'login') !== false) {} else {helper::redirect('/login');}
        }
    }

    public static function cek_valuenya()
    {
        if ($_SESSION['login_user'] == 'sukses') {
            $data['id'] = $_SESSION['id_user'];

            $database_engine = new DB();
            $dapatkan_detail_user = $database_engine->get_user_login($data);

            foreach ($dapatkan_detail_user as $key => $value) {
                $_SESSION[$key] = $value;
            }
        } else {
            $flash = new \Plasticbrain\FlashMessages\FlashMessages();
            $flash->error('Failed to login, try again', '/login');
        }
    }
}
