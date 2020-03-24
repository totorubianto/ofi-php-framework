<?php 

namespace App\Models;
use App\Core\Model;
use mysqli;
class DB extends Model {

    // Status ketika proses sql
    public $status = null;

    // Untuk menyimpan data
    public function insert($data, $table)
    {      
        // Menentukan kolom apa saja yang ingin diinputkan 
        foreach($data as $key=>$val)
        {
          $value .= "$key,";
        }

        // Menghapus tanda koma pada posisi paling kanan
        $value = rtrim($value, ',');  

        // Skrip untuk memasukan value pada skrip SQL
        foreach ($data as $key => $val) {
            $konten .= "'$val',";
        }

        // Menghapus tanda koma pada posisi paling kanan
        $konten = rtrim($konten, ",");

        // Skrip SQL untuk insert
        $sql = "INSERT INTO `users` ($value) VALUES ($konten)";       
        $result = $this->db->query($sql);
        
        if(!$result) {
            $status = false;
        } else {
            $status = true;
        }

        return $status;

    }

    // Untuk menampilkan semua data by array
    public static function get()
    {
        # code...
    }

    // menampilkan data berdasarkan id by array
    public static function getById($id)
    {
        # code...
    }

    // Untuk update data berdasarkan id
    public static function update($id, $data)
    {
        # code...
    }

    // Untuk menghapus data berdasarkan id
    public static function delete($id)
    {
        # code...
    }
}

?>