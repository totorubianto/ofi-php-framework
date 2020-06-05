<?php

namespace vendor;

use App\Middleware\cors;
use App\provider\event;
use vendor\Controller;
use App\Core\helper;

class Core extends event
{
    private $Url = null;
    private $Controller = '';
    private $Action = '';
    private $Params = [];

    public function __construct()
    {
        $this->middleware();
        $this->project_index_path = $_SERVER['REQUEST_URI'];
    }

    /**
     * Method Middleware
     * for register your middleware in
     * OFI PHP Framewrok system.
     */
    public function middleware()
    {
        helper::blockIp();
        cors::allow();
    }

    /**
     * Method Run
     * This method will be run for the
     * first time while the program is running.
     */
    public function run()
    {
        $this->whenRun();
        $this->route();
    }

    /**
     * Method searchByValue
     * For search route in array data.
     */
    public function searchByValue($id, $array)
    {
        foreach ($array as $key => $val) {
            // Jika Request URI sama dengan /
            // dan url kosong ditemukan maka akan dialihkan ke index
            if ($this->project_index_path == '/' && $val['url'] == '') {
                $resultSet = $val;

                return $resultSet;
            } else {
                if (strpos($id, $val['url']) !== false) {
                    $resultSet = $val;

                    return $resultSet;
                }
            }
        }

        return null;
    }

    public function route()
    {
        include 'App/route/web.php';

        $get_url = $this->project_index_path;

        // Konvert string ke array
        $url_array = str_split($get_url);

        // Proses menghilangkan data array index 0
        // dan data array index 0 adalah tanda /

        array_shift($url_array);

        // Hasil URL setelah melalui proses
        // hapus tanda / di awal URL

        $url = implode('', $url_array);

        $searchValue = $this->searchByValue($url, $route);
        $controller = new Controller();
        $helper = new helper();

        // Jika URL Tersedia

        if ($searchValue) {

            if ($searchValue['type'] == 'view') {

                // Checking HTTP Method
                if (!$searchValue['method'] || $_SERVER['REQUEST_METHOD'] === strtoupper($searchValue['method'])) {
                    $controller->loadView($searchValue['to'], $paramData);
                } else {
                    $controller->error500('Error '.$searchValue['url'].' url is '.strtoupper($searchValue['method']).' HTTP Method');
                }

                // Jika typenya belum terdeklarasi
            } elseif (!$searchValue['type'] || $searchValue['type'] == '') {
                $controller->error500("Route type can't Be null, please declare the url type on your route files");
            } elseif ($searchValue['type'] == 'controller') {

                // Jika type controller maka memanggil controller
                // @ untuk memanggil methodnya

                $request_controller = explode('@', $searchValue['to']);

                $get_only_Controller_Name = $request_controller[0];
                $get_only_Method_Name = $request_controller[1];

                // Checking HTTP Method
                if (!$searchValue['method'] || $_SERVER['REQUEST_METHOD'] === strtoupper($searchValue['method'])) {
                    $className = '\\App\\Controllers\\'.$get_only_Controller_Name;
                    $classNameController = new $className();
                    $classNameController->$get_only_Method_Name();
                } else {
                    $controller->error500('Error '.$searchValue['url'].' url is '.strtoupper($searchValue['method']).' HTTP Method');
                }
            } 
        } else {
            // Jika URL tidak tersedia maka cek pada folder controller

            $url_explode = explode('/', $url);
            $total_url_explode = count($url_explode);

            $files = 'App/Controllers';
            $class_name = '\\App\\Controllers';

            for ($i=0; $i < $total_url_explode - 1 ; $i++) { 
                $files .= '/' . $url_explode[$i];
            }

            for ($i=0; $i < $total_url_explode - 1 ; $i++) { 
                $class_name .= "\\" . $url_explode[$i];
            }

            $files .= 'Controller.php';
            $class_name .= 'Controller';

            if(file_exists($files)) {
                $method_name = $url_explode[$total_url_explode - 1];
                $className = $class_name;
                $classNameController = new $className();
                $classNameController -> $method_name();
            } else {
                $controller->error404();
            }
        }
    }
}
