<?php 

namespace App\Core;
use App\Core\Controller;
use App\Models\DB;

class helper 
{
    public static function request($val_request)
    {   
            // memberi fasilitas bisa mengambil 
            // inputan yang namanya ada spasinya
            $hapus_spasi = str_replace(' ', '', $val_request);
            $jadi_kecil = strtolower($hapus_spasi);
            return $_REQUEST[$jadi_kecil];
    }   

    public static function hash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function slug($string)
    {
        return strtolower(str_replace(' ', '-', $string));
    }

    public function redirect($url)
    {
        return header("Location: " . $url);
    }

    public static function json_beautify($json_url)
    {
        // Library untuk mendapatkan data API dan mempercantiknya
        // cuma metode get yang diizinkan

        // persiapkan curl
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, $json_url);

        // return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // tutup curl 
        curl_close($ch);      

        // menampilkan hasil curl
        header('Content-Type: application/json');
        echo $output;

    }

    public static function blockIp()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        // search IP in blockIp.php
        include 'App\Middleware\blockIp.php';

        $z= array_search($ip, $block);

        if(in_array($ip, $block)) {
            header('HTTP/1.1 503 Service Temporarily Unavailable');
            header('Status: 503 Service Temporarily Unavailable');
            header($_SERVER["SERVER_PROTOCOL"]." 503 Service Temporarily Unavailable", true, 503);
            exit();
          }
          
    }

    public static function toJson($data)
    {
        header('Content-Type: application/json');
        return json_encode($data);
    }

    public static function auth($datas)
    {
        if(!$_SESSION['login_user']) {
            $results = null;
        } else {
            $val['id'] = $_SESSION['id_user']; 
            $database_engine = new DB();
            $hasil = $database_engine->get_user_login($val);
            $results = $hasil[$datas];
        }

        return $results;
    }

}