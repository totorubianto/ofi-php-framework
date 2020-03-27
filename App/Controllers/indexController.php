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
	
}