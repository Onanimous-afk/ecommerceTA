<?php
class UserModel extends CI_Model
{
	
	function get_user($username, $password)
	{
		$sql = "SELECT * from tm_user t
WHERE t.email = '".$username."' and t.password = '".$password."' AND t.is_verif = 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function check_email_user($username)
	{
		$sql = "SELECT * from tm_user t
WHERE t.email = '".$username."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function register_user($data)
	{
		return $this->db->insert('tm_user', $data);
		// $insert_id = $this->db->insert_id();

		// return  $insert_id;
	}
	function hitungbawahan($id_jabatan)
	{
		$sql = "SELECT * FROM tm_jabatan where id_jabatan_atasan = ".$id_jabatan."";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}
	function getdetailuser($id_user)
	{
		$sql = "SELECT t.*,tj.* FROM tm_user t
		INNER JOIN tm_jabatan tj 
			on t.id_jabatan = tj.id_jabatan
		where t.id_user = ".$id_user."";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	function getalluser()
	{
		$sql = "SELECT t.*,tj.* FROM tm_user t
		INNER JOIN tm_jabatan tj 
			on t.id_jabatan = tj.id_jabatan
			where t.id_jabatan != 6";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;	
	}
	function bagi($id_show)
	{
		$query = $this->db->query('SELECT SUM(rate) AS prices FROM `rate` where idmovie = '.$id_show.'');
		$result = $query->row();
		return $result;
	}
		//  function item(){
  //   $query = $this->db->query$query = $this->db->query('SELECT AVG(id_booking) AS salary_average FROM `booking` where id_show ="'.$id_movie.'"');
		// 	return $query->row();
  // }
}
?>