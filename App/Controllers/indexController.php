<?php 

namespace App\Controllers;
use App\Core\Controller;
use App\Models\DB;
use App\Core\helper;

class indexController extends Controller
{
	public function crud()
	{
		// blog is table name, one of form your All table
		$data = DB::all('blog');
		$this->loadTemplate('blog/crud', ['data' => $data]);
	}
}