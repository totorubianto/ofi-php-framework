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
        $viewData['status'] = 404;
        $viewData['title'] = "Page Not Found";
        $viewData['msg'] = "Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable";

        $this->loadTemplate('error_404', $viewData);
    }

    public function error500($pesan)
    {   
        $viewData['status'] = 500;
        $viewData['title'] = "Server Error";
        $viewData['msg'] = $pesan;
        $this->loadTemplate('error_404', $viewData);
    }

    public function Views($viewName)
    {   
        require 'vendor/autoload.php';
       
        $whoops = new \Whoops\Run;
        $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
        $whoops->register();

        extract($viewData = []);
        include 'vendor/template.php';
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

