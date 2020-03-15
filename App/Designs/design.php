<?php

namespace App\Designs;

class design
{
    public function sidebar()
    {
        include 'App\Designs\template\sidebar.php';
    }

    public function header($navbar)
    {
        include 'App\Designs\template\header.php';
    }

    public function blogR($left, $right)
    {
        include 'App\Designs\template\blogR.php';
    }
}

?>