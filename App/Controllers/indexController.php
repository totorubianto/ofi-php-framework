<?php 

namespace App\Controllers;
use App\Core\Controller;
use App\Models\User;

class indexController extends Controller
{
	public function index(){
		$result=$this->User->get4();
		$this->loadTemplate('index',array('result'=>$result));
	}

	public function test()
	{
		print_r($_POST);
	}
}