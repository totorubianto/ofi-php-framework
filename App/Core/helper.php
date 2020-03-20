<?php 

namespace App\Core;

class helper 
{
    public static function request($val_request)
    {   
        // Request cuma bisa di pake pada method POST
        // method GET nggak bisa
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            return $_REQUEST[$val_request];
        } 
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

}