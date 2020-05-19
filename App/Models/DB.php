<?php

namespace App\Models;

use App\Core\Model;

class DB extends Model
{
    //public $status;

    // Untuk menyimpan data
    public function insert($data, $table)
    {
        // Menentukan kolom apa saja yang ingin diinputkan
        foreach ($data as $key=>$val) {
            $value .= "$key,";
        }

        // Menghapus tanda koma pada posisi paling kanan
        $value = rtrim($value, ',');

        // Skrip untuk memasukan value pada skrip SQL
        foreach ($data as $key => $val) {
            $konten .= "'$val',";
        }

        // Menghapus tanda koma pada posisi paling kanan
        $konten = rtrim($konten, ',');

        // Skrip SQL untuk insert
        $sql = "INSERT INTO $table ($value) VALUES ($konten)";
        $result = $this->db->query($sql);

        if ($result) {
            $status = 'berhasil';
        } else {
            $status = 'gagal';
        }

        return $status;
    }

    // Untuk mengosongkan satu tabel
    // keseluruhan
    public function empty($table) {
        $sql = "DELETE FROM $table";
        return $this->db->query($sql);
    }

    // Untuk menampilkan semua data by array
    // hanya mendukung query order by

    public static function all($table, $query)
    {
        $sql = "SELECT * FROM $table ";

        if ($query) {
            $order_by_key = $query['ORDER BY'][0];
            $order_by_val = $query['ORDER BY'][1];
            $sql .= 'ORDER BY '.$order_by_key.' '.$order_by_val;
        }

        return $connect = parent::connect($sql);
    }

    // menampilkan hanya satu data berdasarkan id by array
    public static function where($table, $data)
    {
        $id = $data[0];
        $id_val = $data[1];

        $sql = "SELECT * FROM $table WHERE $id = '".$id_val."'";
        $results = parent::connect($sql);

        return $results[0];
    }

    // menampilkan semua data berdasarkan id
    public static function whereAll($table, $data)
    {
        $id = $data[0];
        $id_val = $data[1];

        $sql = "SELECT * FROM $table WHERE $id = '".$id_val."'";
        $results = parent::connect($sql);

        return $results;
    }

    // menampilkan data berdasarkan query and (all dan first)
    public static function whereAnd($table, $data, $status)
    {
        // SELECT * FROM `blog` WHERE id_user = 1 AND kategori = 'artikel' AND user = 'teguh'
        $sql = "SELECT * FROM $table WHERE ";
        $jumlah_data_arr = count($data[0]);

        for ($i=0; $i < count($data) ; $i++) { 
            $sql .= $data[$i][0] . ' = ' . "'" . $data[$i][1] . "'" . " AND ";
        }
        
        // Ekstrak query menjadi array per kalimat
        //  dan hapus dua elemen dari belakang
         $sql_array = explode(' ', $sql);
         array_pop($sql_array); 
         array_pop($sql_array);

         $sql_now = implode(' ', $sql_array);

         $results = parent::connect($sql_now);

         if($status) {
            if($status === 'first')
                return $results[0];
             else 
                return $results;
         } else {
             return "Error! Please select one all method or first method in your query";
         }

    }

    // menampilkan data berdasarkan query OR (all dan first)
    public static function whereOr($table, $data, $status)
    {
        // SELECT * FROM `blog` WHERE id_user = 1 AND kategori = 'artikel' AND user = 'teguh'
        $sql = "SELECT * FROM $table WHERE ";
        $jumlah_data_arr = count($data[0]);

        for ($i=0; $i < count($data) ; $i++) { 
            $sql .= $data[$i][0] . ' = ' . "'" . $data[$i][1] . "'" . " OR ";
        }
        
        // Ekstrak query menjadi array per kalimat
        //  dan hapus dua elemen dari belakang
         $sql_array = explode(' ', $sql);
         array_pop($sql_array); 
         array_pop($sql_array);

         $sql_now = implode(' ', $sql_array);
         
         $results = parent::connect($sql_now);

         if($status) {
            if($status === 'first')
                return $results[0];
             else 
                return $results;
         } else {
            return "Error! Please select one all method or first method in your query";
         }

    }

    // Untuk update data berdasarkan id
    public function update($table, $id, $data)
    {
        $id_key = $id['where'];
        $id_val = $id['value'];

        // Menentukan kolom apa saja yang ingin diinputkan
        foreach ($data as $key=>$val) {
            $value .= "$key = '$val',";
        }

        // Menghapus tanda koma pada posisi paling kanan
        $query = rtrim($value, ',');

        $sql = "UPDATE $table SET $query WHERE $id_key = '$id_val'";

        return $result = $this->db->query($sql);
    }

    // Untuk menghapus data berdasarkan id
    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id = $id";

        return $this->db->query($sql);
    }

    public function get_user_login($val)
    {
        $id = $val['id'];
        $sql = "SELECT * FROM users WHERE id = $id";
        $query = $this->db->query($sql);

        return Model::fetch($query);
    }

    public function deteksi_login($data)
    {
        $usernameoremail = $data['usernameoremail'];
        $password = $data['password'];

        $sql = "SELECT * FROM users WHERE username =  '$usernameoremail' OR email = '$usernameoremail'";
        $cek_akun = $this->db->query($sql);

        if (Model::count($cek_akun) > 0) {
            // fetch data berdasarkan query
            $akun = Model::fetch($cek_akun);

            if (password_verify($password, $akun['password'])) {
                $cekss['status'] = 'yes';
                $cekss['id'] = $akun['id'];

                return $cekss;
            } else {
                return 'no';
            }
        } else {
            $this->flash->error('Failed to login, try again', '/login');
        }
    }
}
