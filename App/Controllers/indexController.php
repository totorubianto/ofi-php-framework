<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\helper;

class indexController extends Controller
{
    public function index()
    {
        $this->loadTemplate('index', []);
    }
}
