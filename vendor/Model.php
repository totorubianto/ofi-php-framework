<?php

namespace vendor;

use mysqli;

class Model
{
    public $db;

    public function __construct()
    {
        global $config;
        $this->db = new mysqli($config['host'], $config['user'], $config['password'], $config['dbname']);
    }

    public function connect($sql)
    {
        global $config;
        $koneksi = new mysqli($config['host'], $config['user'], $config['password'], $config['dbname']);
        $hasil = $koneksi->query($sql);

        return $hasil->fetch_all(MYSQLI_ASSOC);
    }

    public static function count($sql)
    {
        return mysqli_num_rows($sql);
    }

    public function fetch($sql)
    {
        return mysqli_fetch_assoc($sql);
    }
}
