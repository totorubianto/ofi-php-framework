<?php 

namespace App\Models;
use App\Core\Model;
use mysqli;
class DB extends Model {

    public $status;

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
        $sql = "INSERT INTO $table ($value) VALUES ($konten)";       
        $result = $this->db->query($sql);

        if($result) {
            $status = 'berhasil';
        } else {
            $status = 'gagal';
        }

        return $status;

    }

    // Untuk menampilkan semua data by array
    public static function all()
    {
        # code...
    }

    // menampilkan data berdasarkan id by array
    public static function where($data)
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

        if(Model::count($cek_akun) > 0) {
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

?>