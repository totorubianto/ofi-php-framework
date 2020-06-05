<?php

namespace App\Controllers\Auth;

use vendor\Controller;
use App\Middleware\auth\auth;

class homeController extends Controller
{
    public function __construct()
    {
        //auth::check();
    }

    public function home()
    {
        $this->Views('home', null);
    }

    public function index()
    {
        echo "Hello world";
    }
}
