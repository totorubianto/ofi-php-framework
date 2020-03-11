<?php

namespace App\Core;

use mysqli;
class Model
{
    public $db;
    function __construct()
    {
        global $config;
        $this->db = new mysqli($config['host'], $config['user'], $config['password'], $config['dbname']);
    }
}

