<?php

namespace App\Core;
use App\Designs\design;

class Controller
{
    protected $data = [];

    public function __call($name, $argumnets)
    {
        $this->loadTemplate('error_404', $this->data);
    }

    public function error404()
    {
        $this->loadTemplate('error_404');
    }

    public function loadView($viewName, $viewData = array())
    {   
        extract($viewData); 
        include 'App/Views/' . $viewName . '.php';
    }
    public function loadTemplate($viewName, $viewData = array())
    {
        require 'vendor/autoload.php';
       
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

        extract($viewData);
        include 'vendor/template.php';
    }
    public function loadViewInTemplate($viewName, $viewData)
    {   
        $design = new design();
        extract($viewData);
        include 'App/Views/' . $viewName . '.php';
    }

}

