<?php

namespace App\Controllers\Auth;

use App\Core\Controller;
use App\Core\helper;
use App\Middleware\auth\auth;

class homeController extends Controller{

    public function __construct()
    {
        auth::check();
    }

    public function home()
    {
        $this->Views('home', null);
    }
}