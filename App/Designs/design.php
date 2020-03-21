<?php

namespace App\Designs;

class design
{
    public static function sidebar()
    {
        include 'App\Designs\template\sidebar.php';
    }

    public static function header($navbar)
    {
        include 'App\Designs\template\header.php';
    }

    public static function blogR($left, $right)
    {
        include 'App\Designs\template\blogR.php';
    }

    public static function collapse($data)
    {
        include 'App\Designs\template\collapse.php';
    }
}

?>