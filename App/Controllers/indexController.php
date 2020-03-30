<?php 

namespace App\Controllers;
use App\Core\Controller;
use App\Models\DB;
use App\Core\helper;

class indexController extends Controller
{
	public function fetchAPI($json_url)
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
        return $output;
	}

	public function index()
	{
		$api_indo = json_decode($this->fetchAPI('https://api.kawalcorona.com/indonesia/'), true);
		$api_all = json_decode($this->fetchAPI('https://api.kawalcorona.com/'), true);

		
		$indo['sembuh'] = $api_indo[0]['sembuh'];
		$indo['positif'] = $api_indo[0]['positif'];
		$indo['meninggal'] = $api_indo[0]['meninggal'];

		$this->loadTemplate('index', [
								'indo' => $indo,
								'all' => $api_all
							]);
	}	
}