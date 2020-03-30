<?php
namespace App\Core;

class Core
{
    private $Url = null;
    private $Controller = '';
    private $Action = '';
    private $Params = [];

    public function __construct()
    {
        $this->middleware();
        $this->project_index_path = $_SERVER["REQUEST_URI"];
    }

    public function run()
    {
        $this->route();
        //echo $this->project_index_path;
    }

    function searchByValue($id, $array) {
        foreach ($array as $key => $val) {
            // Jika Request URI sama dengan / 
            // dan url kosong ditemukan maka akan dialihkan ke index
            if($this->project_index_path == '/' && $val['url'] == '') {
                $resultSet = $val;  
                    return $resultSet;
            } else {
                if(strpos($id, $val['url']) !== false) {
                    $resultSet = $val;  
                    return $resultSet;
                }
            }
        }
        return null;
     }

     public function middleware()
     {
        helper::blockIp();
     }

    public function route()
    {
        include 'App\route\web.php';

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

        // // Get param process
        // $url_components = parse_url($get_url); 
        // parse_str($url_components['query'], $params); 
        // $paramData = [];

        // foreach ($params as $key => $value) {
        //     //echo $key . ' => ' . $value . '<br>' ; 
        //     $paramData[$key] = $value;
        // }

        // Jika URL Tersedia 

         if ($searchValue) {

            // Jika type print maka cetak value
            if ($searchValue['type'] == 'print') {
                
                // Checking HTTP Method
                if (!$searchValue['method']) { // Only POST or GET
                    // Only method value not found, so default method is GET
                    echo $searchValue['to'];
                } else {
                    if ($_SERVER['REQUEST_METHOD'] === strtoupper($searchValue['method'])) {
                        // Next Request
                        echo $searchValue['to'];
                    } else {
                        $controller->error500( "Error /" . $searchValue['url'] . " url is " . strtoupper($searchValue['method']) . ' HTTP Method');
                    }
                }   
                
            // Jika type url maka redirect ke url yang dituju
            } elseif($searchValue['type'] == 'url') {

                // Checking HTTP Method
                if (!$searchValue['method']) { 
                    header("Location: http://" . $searchValue['to']);
                } else {
                    if ($_SERVER['REQUEST_METHOD'] === strtoupper($searchValue['method'])) {
                        header("Location: http://" . $searchValue['to']);
                    } else {
                        $controller->error500( "Error " . $searchValue['url'] . " url is " . strtoupper($searchValue['method']) . ' HTTP Method');
                    }
                } 
                
            // Jika type view maka redirect ke view yang ada.
            } elseif($searchValue['type'] == 'view') {

                // Checking HTTP Method
                if (!$searchValue['method']) { 
                    $controller->Views($searchValue['to'], '');
                } else {
                    if ($_SERVER['REQUEST_METHOD'] === strtoupper($searchValue['method'])) {
                        $controller->Views($searchValue['to'], $paramData);
                    } else {
                        $controller->error500( "Error " . $searchValue['url'] . " url is " . strtoupper($searchValue['method']) . ' HTTP Method');
                    }
                } 
            
            // Jika typenya belum terdeklarasi
            } elseif(!$searchValue['type'] || $searchValue['type'] == '') {
                $controller->error500("Route type can't Be null, please declare the url type on your route files");

            } elseif ($searchValue['type'] == 'controller') {

                // Jika type controller maka memanggil controller
                // @ untuk memanggil methodnya
                
                $request_controller = explode('@', $searchValue['to']);

                $get_only_Controller_Name = $request_controller[0];
                $get_only_Method_Name = $request_controller[1];

                // Checking HTTP Method
                if (!$searchValue['method']) { 
                    $className = '\\APP\\Controllers\\' . $get_only_Controller_Name;
                    $classNameController = new $className();
                    $classNameController->$get_only_Method_Name();
                } else {
                    if ($_SERVER['REQUEST_METHOD'] === strtoupper($searchValue['method'])) {
                        $className = '\\APP\\Controllers\\' . $get_only_Controller_Name;
                        $classNameController = new $className();
                        $classNameController->$get_only_Method_Name();
                    } else {
                        $controller->error500( "Error " . $searchValue['url'] . " url is " . strtoupper($searchValue['method']) . ' HTTP Method');
                    }
                }

            } elseif($searchValue['type'] == 'json') {

                // Library untuk mendapatkan data API dan mempercantiknya
                // cuma metode get yang diizinkan

                // Checking HTTP Method
                if (!$searchValue['method']) { 
                    return $helper->json_beautify($searchValue['from']);
                } else {
                    if ($_SERVER['REQUEST_METHOD'] === strtoupper($searchValue['method'])) {
                        return $helper->json_beautify($searchValue['from']);
                    } else {
                        $controller->error500( "Error " . $searchValue['url'] . " url is " . strtoupper($searchValue['method']) . ' HTTP Method');
                    }
                } 
            }
            
          } else {
              // Jika URL tidak tersedia maka 404 Error
                $controller->error404();
          }
    }

}

