<?php 

namespace App\Models;

use App\Core\Model;

class Admin extends Model{
	public function gets(){
		$sql="SELECT * FROM destinasi";
		$result=$this->db->query($sql);
		return $result;
	}
	public function delete($sd,$id){
		$sql="DELETE FROM destinasi WHERE id=$id";
		$result=$this->db->query($sql);
		var_dump($id);
		header('location:'. BASE . '/admin/index');
	}
	public function getgaleri(){
		$sql="SELECT * FROM galeri";
		$result=$this->db->query($sql);
		return $result;
	}
	public function getberita(){
		$sql="SELECT * FROM berita";
		$result=$this->db->query($sql);
		return $result;
	}
	public function tambahindex($destinasi,$deskripsi,$gambar){
		$sql="INSERT INTO destinasi (judul,deskripsi,img) VALUES('$destinasi','$deskripsi','$gambar')";
		$result=$this->db->query($sql);
		header('location:'. BASE . '/admin/index');
	}
	public function tambahgaleri($judul,$gambar){
		$sql="INSERT INTO galeri (judul,gambar) VALUES('$judul','$gambar')";
		$result=$this->db->query($sql);

		header('location:'. BASE . '/admin/galeri');
	}
	public function deletegaler($sd,$id){
	$sql="DELETE FROM galeri WHERE id=$id";
		$result=$this->db->query($sql);
		var_dump($id);
		header('location:'. BASE . '/admin/galeri');
	}
}
