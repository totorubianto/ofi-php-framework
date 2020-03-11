<?php 

namespace App\Models;

use App\Core\Model;

class User extends Model
{
	public function get4()
	{
		$sql="SELECT * FROM destinasi LIMIT 4	";
		$result=$this->db->query($sql);
		return $result;
	}
}
