<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\helper;
// Don't forget import DB class
use App\Models\DB;

class indexController extends Controller
{
    /**
     * Example CRUD controller
     */

    public function index()
    {
        // blog is table name, one of form your All table
		$data = DB::all('blog', [
			'ORDER BY' => ['judul', 'ASC']
		]);

		$this->loadTemplate('blog/crud', ['data' => $data]);
    }

    public function show()
	{
		$id = helper::request('slug');
		$data = DB::where('blog', ['slug', $id]);
		$this->loadTemplate('blog/show', ['d' => $data]);
	}

	public function save()
	{
		$judul = $artikel['judul'] = helper::request('judul');
		$artikel['isi'] = helper::request('isi');
		$artikel['slug'] = helper::slug($judul);

		$this->DB->insert($artikel, 'blog');
		$this->flash->success('Sukses menambah data artikel', '/');	
	}

	public function delete()
	{
		$id = helper::request('id');
		$this->DB->delete('blog', $id);
		$this->flash->success('Sukses menghapus data artikel', '/');
	}

	public function edit()
	{
		$id = helper::request('id');
		$data = DB::where('blog', ['id', $id]);
		$this->loadTemplate('blog/edit', ['b' => $data]);
	}

	public function update()
	{
		$id = helper::request('id');
		$judul = $artikel['judul'] = helper::request('judul');
		$artikel['isi'] = helper::request('isi');
		$artikel['slug'] = helper::slug($judul);

		// blog is name of your table
		$this->DB->update('blog', [
			'where' 	=> 'id', // where id
			'value' => $id // value form id
		], $artikel); // new data from article

		$this->flash->success('Sukses memperbarui data artikel', '/');
	}

	public function whereAndOr()
    {   
        /**
         * You can search all or get the first element of the whole data
         * using DB::whereAnd()  or DB::whereOr()
         * 
         * DB::whereAnd() to create sql AND
         * DB::whereOr() to create sql OR
         */

		 // Where And example

        $data = DB::whereAnd('blog', [ // array inside array data
                ['user', 'teguh'],
                ['kategori', 'artikel'],
            ], 'first' // first to get the first element of the whole data
          //], 'all' // all to get all data 

		); 

		// Where OR example
		
		$datas = DB::whereOr('blog', [ // array inside array data
                ['user', 'teguh'],
                ['kategori', 'artikel'],
            ], 'first' // first to get the first element of the whole data
          //], 'all' // all to get all data 

        ); 

        // Print the result as array data
		print_r($data);
		print_r($datas);
    }
}
