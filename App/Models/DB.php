<?php

namespace App\Models;

use vendor\Model;

class DB extends Model
{
    private $selectables = array();
    private $table;
    private $whereAnd = [];
    private $whereOr = [];
    private $whereAndValue = [];
    private $whereOrValue = [];
    private $limit;

    /**
     * Notice
     * -> where('id', 2)
     * 1. id is key and store in $whereAnd or $whereOr array
     * 2. 2 is value store in $whereAndValue or $whereOrValue array
     */

    public function select() {
        $this->selectables = func_get_args();
        return $this;
    }

    public function from($table) {
        $this->table = $table;
        return $this;
    }

    public function where($key, $value) {
        // Push data ketika method ini dipanggil
        array_push($this->whereAnd, $key);
        array_push($this->whereAndValue, $value);
        return $this;
    }

    public function whereOr($key, $value) {
        // Push data ketika method ini dipanggil
        array_push($this->whereOr, $key);
        array_push($this->whereOrValue, $value);
        return $this;
    }

    public function limit($limit) {
        $this->limit = $limit;
        return $this;
    }

    public function get() {

        $query[] = "SELECT";
        // if the selectables array is empty, select all
        if (empty($this->selectables)) {
            $query[] = "*";  
        }
        // else select according to selectables
        else {
            $query[] = join(', ', $this->selectables);
        }

        $query[] = "FROM";
        $query[] = "`" . $this->table . "`";
        
        /**
         * Jika query where and tidak kosong
         */

        if (!empty($this->whereAnd)) {
            $query[] = " WHERE ";

            for ($i=0; $i < count($this->whereAnd) ; $i++) { 
                $sql .= $this->whereAnd[$i] . " = '" . $this->whereAndValue[$i] . "'" . " AND ";
            }

            $sql_explode = explode(' ', $sql);
                array_pop($sql_explode);
                array_pop($sql_explode);

            $query[] = join(' ', $query) . implode(' ', $sql_explode);
        }

        /**
         * Jika query where or tidak kosong
         */
        
        if (!empty($this->whereOr)) {
            $query[] = " WHERE ";

            for ($i=0; $i < count($this->whereOr) ; $i++) { 
                $sql .= $this->whereOr[$i] . " = '" . $this->whereOrValue[$i] . "'" . " OR ";
            }

            $sql_explode = explode(' ', $sql);
                array_pop($sql_explode);
                array_pop($sql_explode);

            $query[] = join(' ', $query) . implode(' ', $sql_explode);
        }

        
        /**
         * Jika query limit or tidak kosong
         */

        if (!empty($this->limit)) {
            $query[] = "LIMIT";
            $query[] = "'" . $this->limit . "'";
        }

        for ($i=0; $i < 5 ; $i++) { 
            array_shift($query);
        }

        return $this->connect(join(' ', $query));
    }

    /**
     * Untuk mendapatkan jumlah data berdasarkan query
     */

    public function total() {

        $query[] = "SELECT";
        // if the selectables array is empty, select all
        if (empty($this->selectables)) {
            $query[] = "*";  
        }
        // else select according to selectables
        else {
            $query[] = join(', ', $this->selectables);
        }

        $query[] = "FROM";
        $query[] = "`" . $this->table . "`";
        
        /**
         * Jika query where and tidak kosong
         */

        if (!empty($this->whereAnd)) {
            $query[] = " WHERE ";

            for ($i=0; $i < count($this->whereAnd) ; $i++) { 
                $sql .= $this->whereAnd[$i] . " = '" . $this->whereAndValue[$i] . "'" . " AND ";
            }

            $sql_explode = explode(' ', $sql);
                array_pop($sql_explode);
                array_pop($sql_explode);

            $query[] = join(' ', $query) . implode(' ', $sql_explode);
        }

        /**
         * Jika query where or tidak kosong
         */
        
        if (!empty($this->whereOr)) {
            $query[] = " WHERE ";

            for ($i=0; $i < count($this->whereOr) ; $i++) { 
                $sql .= $this->whereOr[$i] . " = '" . $this->whereOrValue[$i] . "'" . " OR ";
            }

            $sql_explode = explode(' ', $sql);
                array_pop($sql_explode);
                array_pop($sql_explode);

            $query[] = join(' ', $query) . implode(' ', $sql_explode);
        }

        
        /**
         * Jika query limit or tidak kosong
         */

        if (!empty($this->limit)) {
            $query[] = "LIMIT";
            $query[] = "'" . $this->limit . "'";
        }

        for ($i=0; $i < 5 ; $i++) { 
            array_shift($query);
        }

        return count($this->connect(join(' ', $query)));
    }

    /**
     * Untuk mendapatkan hasil data hanya satu saja
     * beda jika dengan get yang mendapatkan semuanya
     */

    public function first() {

        $query[] = "SELECT";
        // if the selectables array is empty, select all
        if (empty($this->selectables)) {
            $query[] = "*";  
        }
        // else select according to selectables
        else {
            $query[] = join(', ', $this->selectables);
        }

        $query[] = "FROM";
        $query[] = "`" . $this->table . "`";
        
        /**
         * Jika query where and tidak kosong
         */

        if (!empty($this->whereAnd)) {
            $query[] = " WHERE ";

            for ($i=0; $i < count($this->whereAnd) ; $i++) { 
                $sql .= $this->whereAnd[$i] . " = '" . $this->whereAndValue[$i] . "'" . " AND ";
            }

            $sql_explode = explode(' ', $sql);
                array_pop($sql_explode);
                array_pop($sql_explode);

            $query[] = join(' ', $query) . implode(' ', $sql_explode);
        }

        /**
         * Jika query where or tidak kosong
         */
        
        if (!empty($this->whereOr)) {
            $query[] = " WHERE ";

            for ($i=0; $i < count($this->whereOr) ; $i++) { 
                $sql .= $this->whereOr[$i] . " = '" . $this->whereOrValue[$i] . "'" . " OR ";
            }

            $sql_explode = explode(' ', $sql);
                array_pop($sql_explode);
                array_pop($sql_explode);

            $query[] = join(' ', $query) . implode(' ', $sql_explode);
        }

        
        /**
         * Jika query limit tidak kosong
         */

        if (!empty($this->limit)) {
            $query[] = "LIMIT";
            $query[] = "'" . $this->limit . "'";
        }

        for ($i=0; $i < 5 ; $i++) { 
            array_shift($query);
        }

        $hasil = $this->connect(join(' ', $query));

        return $hasil[0] ;
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
