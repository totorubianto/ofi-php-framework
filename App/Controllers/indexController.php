<?php

namespace App\Controllers;

use vendor\Controller;
use App\Core\helper;
use App\Models\DB;

class indexController extends Controller
{
    /**
     * Contoh kode
     * 
     * Untuk mengembalikan nilai menjadi json
     *  return $this->response() -> json($res, 200);
     * 
     * Untuk mengembalikan menjadi error 404 atau error 500
     *  return $this->response() -> error404();
     *  return $this->response() -> error500($yourMessageHere);
     * 
     * Untuk memberikan response pengalihan halaman, ke halaman lainnya
     *  $this->response() -> redirect('http://google.com');
     *  $this->response() -> redirect('/login');
     * 
     * Untuk mencetak data menjadi data array dan otomatis dipercantik
     *  $this->response() -> print_r($res);
     *  $this->response() -> var_dump($res);
     */

    public function getAll()
    {
        $q = new DB(); 
        $res =  $q -> select() -> from('blog') 
                -> where('kategori', 'artikel') 
                -> where('id_user', 1) 
                -> get();

                // -> get(); untuk mendapatkan semua data
                // -> first(); untuk mendapatkan data pertama saja
                // -> total(); untuk mendapatkan jumlah semua data       

       return $this->response()  -> json($res, 200);
    }

    public function getOr()
    {
        $q = new DB(); 
        $res =  $q -> select() -> from('blog') 
                -> whereOr('kategori', 'artikel') 
                -> whereOr('kategori', 'berita') 
                -> get();

                // -> get(); untuk mendapatkan semua data
                // -> first(); untuk mendapatkan data pertama saja
                // -> total(); untuk mendapatkan jumlah semua data       

       return $this->response()  -> json($res, 200);
    }

    public function index()
    {
        echo 'it works';
    }
}
