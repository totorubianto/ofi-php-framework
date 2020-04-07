<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\helper;

class indexController extends Controller
{
    /**
     * Example controller to load file view
     * from views folder
     */

    public function index()
    {
        $this->loadTemplate('index', []);
    }
}
