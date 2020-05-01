<?php

namespace App\Middleware;

/**
 * CORS adalah singkatan dari Cross-Origin Resource Sharing, 
 * Di mana by default, Javascript tidak diizinkan melakukan HTTP 
 * request ke domain server berbeda. Nah untuk mengatasi ini
 * kita tambahkam middleware cors ini
 */

class cors {
    public static function allow()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials', true);
        header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
    }
}