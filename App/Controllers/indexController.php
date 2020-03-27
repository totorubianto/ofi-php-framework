<?php 

namespace App\Controllers;
use App\Core\Controller;
use App\Models\DB;
use App\Core\helper;

class indexController extends Controller
{
	public function json()
	{
		$data['name'] = "OFI PHP Framework";
		$data['slogan'] = "A PHP framework that prioritizes making web design layouts with PHP code";
		$data['type'] = 'project';
		$data['license'] = 'MIT';
		$data['description'] = [
				"A PHP framework that prioritizes making web design layouts with PHP code",
				"A PHP framework that takes the concept of the famous laravel and codeigniter framework"
		];

		$data['author'] = [
			[
				'name' => "Fabriyan Fandi Dwi Imaniawan",
				'email' => "imaniawanid@gmail.com",
				'as' => 'mentor'
			],
			[
				'name' => "Teguh Rijanandi",
				'email' => "teguhrijanandi02@gmail.com",
				'as' => 'Programmer'
			],
			[
				'name' => "Nur Khofifah",
				'email' => "nurkhofifah2699@gmail.com",
				'as' => 'Documentation Designer'
			],
		];

		echo helper::toJson($data);
	}	
}