<?php
class PenilaianModel extends CI_Model
{
	
	function get_user($username, $password)
	{
		$sql = "SELECT t.id_user,t.fullname,t.nipp,j.id_jabatan,j.nm_jabatan,j.id_jabatan_atasan,d.nm_divisi,d.id_divisi FROM tm_user t
		inner join tm_jabatan j
		on t.id_jabatan = j.id_jabatan
		inner join tm_divisi d
		on j.id_divisi = d.id_divisi
		WHERE t.nipp = ".$username." and t.password = ".$password."";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function hitungbawahan($id_jabatan)
	{
		$sql = "SELECT * FROM tm_jabatan where id_jabatan_atasan = ".$id_jabatan."";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}
	function bagi($id_show)
	{
		$query = $this->db->query('SELECT SUM(rate) AS prices FROM `rate` where idmovie = '.$id_show.'');
		$result = $query->row();
		return $result;
	}
	function getcurrentpenilaianpersonal($id_user,$bulan,$tahun)
	{
		$sql = "SELECT * FROM tt_penilaian where id_user = ".$id_user." AND bulan = ".$bulan." AND tahun = ".$tahun."";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}
	function getdtpenilaianpersonal($id_user,$bulan,$tahun)
	{
		$sql = "SELECT * FROM tt_penilaian where id_user = ".$id_user." AND bulan = ".$bulan." AND tahun = ".$tahun."";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	function getcurrentpenilaianuserbawahan($id_user,$bulan,$tahun)
	{
		$sql = "SELECT * FROM tt_penilaian where id_user = ".$id_user." AND bulan = ".$bulan." AND tahun = ".$tahun."";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}
	function getjumpenilaianuser($bulan,$tahun)
	{
		$sql = "SELECT * FROM tt_penilaian where status = 2 AND bulan = ".$bulan." AND tahun = ".$tahun."";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}

	function insertpenilaian($data)
	{
		return $this->db->insert('tt_penilaian', $data);
	}
	function getpenilaianbyid($id)
	{
		$sql = "SELECT t.*,tm.fullname FROM tt_penilaian t inner join tm_user tm on t.id_user = tm.id_user where id_penilaian = ".$id."";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	function getpenilaianpersonals($id_user)
	{
		$sql = "SELECT * FROM tt_penilaian where id_user = 2 order by status,bulan,tahun asc";
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	function getpenilaianbawahans($databwhn,$begin,$end)
	{	

		$sql = '';
		if($begin != null && $end != null)
		{
			$explodebegin = explode('-', $begin);
			$explodeend = explode('-', $end);
			$begindate = $explodebegin[0];
			$beginyear = $explodebegin[1];
			$enddate = $explodeend[0];
			$endyear = $explodeend[1];

			$sql = "SELECT t.*,tm.fullname FROM tt_penilaian t inner join tm_user tm on t.id_user = tm.id_user where t.id_user IN (".$databwhn.") AND (t.bulan >= $begindate && t.tahun = $beginyear) AND (t.bulan <= $enddate && t.tahun = $endyear) order by t.status,t.bulan,t.tahun asc";
		}
		else
		{
			$sql = "SELECT t.*,tm.fullname FROM tt_penilaian t inner join tm_user tm on t.id_user = tm.id_user where t.id_user IN (".$databwhn.") order by t.status,t.bulan,t.tahun asc";
		}		
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function updatepenilaian($id_penilaian,$attitude,$kehadiran,$skill,$project_solved,$hasil)
	{
		$this->db->set('attitude', $attitude);
		$this->db->set('kehadiran', $kehadiran);
		$this->db->set('skill', $skill);
		$this->db->set('project_solved', $project_solved);
		$this->db->set('hasil', $hasil);
		$this->db->set('status', 2);
		$this->db->where('id_penilaian', $id_penilaian);
		$this->db->update('tt_penilaian');

		return true;
	}
}
?>