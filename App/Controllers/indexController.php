<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\helper;
use App\Models\DB;

class indexController extends Controller
{
    public function index()
    {
        $this->loadTemplate('index', []);
    }
}
