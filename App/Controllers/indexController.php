<?php 

namespace App\Controllers;
use App\Core\Controller;
use App\Models\User;
use App\Core\helper;

class indexController extends Controller
{
	public function index(){
		$result=$this->User->get4();
		$this->loadTemplate('index',array('result'=>$result));
	}

	public function test()
	{
		echo "wkwkwk";
	}
}