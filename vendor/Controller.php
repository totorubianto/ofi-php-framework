<?php

namespace vendor;

use App\Designs\design;
use App\Models\DB;
use App\provider\event;

class Controller extends event
{
    protected $data = [];
    private $response;

    public function __construct()
    {
        $this->flash = new \Plasticbrain\FlashMessages\FlashMessages();
        $this->response = null;
    }

    public function response()
    {
        return $this;
    }

    public function print_r($params)
    {
        echo "<pre>";
            print_r($params);
        echo "<pre>";
    }

    public function var_dump($params)
    {
        echo "<pre>";
            var_dump($params);
            die();
        echo "<pre>";
    }

    // Response print to json

    public function json($data, $code)
    {
        // Set content type menjadi application/json
        header('Content-Type: application/json');
        http_response_code($code);
        echo json_encode($data);
    }

    /**
     * Method redirect
     * To give a new response redirect to a url.
     */

    public function redirect($url)
    {
        if(strpos($url, 'http') !== false || strpos($url, 'https') !== false) {
            return header('Location: '.$url);
        } else {
            return header('Location: '. PROJECTURL . '/' . $url);
        }        
    }

    public function error404()
    {
        $this->whenError();
        $viewData['status'] = 404;
        $viewData['title'] = 'Not Found';
        $viewData['msg'] = 'Sorry but the page you are looking for does not exist, have been removed.';

        extract($viewData);
        include 'vendor/error_404.php';
    }

    public function error500($pesan)
    {
        $this->whenError();
        $viewData['status'] = 500;
        $viewData['title'] = 'Server Error';
        $viewData['msg'] = $pesan;

        extract($viewData);
        include 'vendor/error_404.php';
    }

    public function loadView($viewName, $viewData = [])
    {
        $this->loadTemplate($viewName, $viewData);
    }

    public function loadTemplate($viewName, $viewData = [])
    {
        extract($viewData);
        include 'vendor/template.php';
    }

    public function loadViewInTemplate($viewName, $viewData)
    {
        $flash = new \Plasticbrain\FlashMessages\FlashMessages();
        $helper = new \App\Core\helper();
        extract($viewData);
        include 'App/Views/'.$viewName.'.ofi.php';
    }
}
