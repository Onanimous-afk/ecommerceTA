<?php
class LemburModel extends CI_Model
{
	
	public function get_dt_lembur_personal($id_user)
	{
		$sql = "SELECT * from tth_lembur where id_pengaju_lembur = ".$id_user." ORDER BY status";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_dt_lembur_personal_periksa($id_user)
	{
		$sql = "SELECT * from tth_lembur where id_pengaju_lembur = ".$id_user." AND status = 2 ORDER BY status";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_dt_lembur_personal_aprove($id_user)
	{
		$sql = "SELECT * from tth_lembur where id_pengaju_lembur = ".$id_user." AND status = 3 ORDER BY status";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_dt_lembur_personal_report($id_user,$begin,$end)
	{
		$sql = "SELECT th.*,td.*,t.*,tj.nm_jabatan from tth_lembur th 
		inner join ttd_lembur td
			on th.id_pengajuan_lembur = td.id_pengajuan_lembur
		inner join tm_user t
			on th.id_pengaju_lembur = t.id_user
		inner join tm_jabatan tj
			on t.id_jabatan = tj.id_jabatan
		where th.id_pengaju_lembur = ".$id_user." AND td.tgl_lembur >= '".$begin."' AND td.tgl_lembur <= '".$end."' ORDER BY status";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_dt_lembur_bawahan($id_user)
	{
		$sql = "SELECT * from tth_lembur t 
		inner join tm_user tm
		on t.id_pengaju_lembur = tm.id_user
		inner join pemeriksa p
    	on t.id_pengajuan_lembur = p.id_tth_pengajuan
    	and p.id_user = ".$id_user." and p.status = 'Y'
		where t.status = 2";// and t.id_pengaju_lembur IN (".$dtbawahan.")";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_dt_lembur_bawahan_report($databwhn,$begin,$end)
	{
		$sql = "SELECT t.*,td.*,tm.fullname,tj.nm_jabatan from tth_lembur t 
		inner join ttd_lembur td
			on t.id_pengajuan_lembur = td.id_pengajuan_lembur
		inner join tm_user tm
			on t.id_pengaju_lembur = tm.id_user
		inner join tm_jabatan tj
			on tm.id_jabatan = tj.id_jabatan
		where t.id_pengaju_lembur IN (".$databwhn.") AND td.tgl_lembur >= '".$begin."' AND td.tgl_lembur <= '".$end."' ORDER BY tm.id_user,td.tgl_lembur";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_dt_lembur_bawahan_report2($databwhn,$begin,$end)
	{
		$sql = "SELECT DISTINCT t.*,tm.fullname from tth_lembur t 
		inner join ttd_lembur td
			on t.id_pengajuan_lembur = td.id_pengajuan_lembur
		inner join tm_user tm
		on t.id_pengaju_lembur = tm.id_user
		where t.id_pengaju_lembur IN (".$databwhn.") AND td.tgl_lembur >= '".$begin."' AND td.tgl_lembur <= '".$end."' ORDER BY tm.id_user,td.tgl_lembur";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function get_dt_bawahan($id_jabatan)
	{
		$sql = "SELECT t.id_user FROM tm_jabatan j INNER JOIN tm_user t ON j.id_jabatan = t.id_jabatan where j.id_jabatan_atasan = ".$id_jabatan."";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function hitungbawahan($id_jabatan)
	{
		$sql = "SELECT * FROM tm_jabatan where id_jabatan_atasan = ".$id_jabatan."";
		$query = $this->db->query($sql);
		$result = $query->num_rows();
		return $result;
	}
	public function gettthlemburbyid($id)
	{
		$sql = "SELECT * from tth_lembur t 		
		where t.id_pengajuan_lembur = ".$id."";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function getttdlemburbyid($id)
	{
		$sql = "SELECT t.*,date_format(t.jam_mulai_aktual, '%H:%i') as jam_mulai,date_format(t.jam_selesai_aktual, '%H:%i') as jam_selesai from ttd_lembur t 		
		where t.id_pengajuan_lembur = ".$id."";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function bagi($id_show)
	{
		$query = $this->db->query('SELECT SUM(rate) AS prices FROM `rate` where idmovie = '.$id_show.'');
		$result = $query->row();
		return $result;
	}
	public function inserttthlembur($data)
	{
		$this->db->insert('tth_lembur', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
	public function gettthlemburbynomor($nomor)
	{
		$query = $this->db->query('SELECT * FROM tth_lembur where nomor_pengajuan = '.$nomor.'');
		$result = $query->row_array();
		return $result;	
	}
	public function getjumuserlembur($begin,$end)
	{
		$query = $this->db->query("SELECT DISTINCT th.id_pengaju_lembur FROM tth_lembur th
		inner join ttd_lembur td on th.id_pengajuan_lembur = td.id_pengajuan_lembur where td.tgl_lembur >= '".$begin."' AND td.tgl_lembur <= '".$end."' ");
		$result = $query->num_rows();
		return $result;	
	}
	public function insertttdlembur($data)
	{
		return $this->db->insert('ttd_lembur', $data);
	}
	public function selectatasan($id_jabatan)
	{
		$sql = "SELECT t.* FROM tm_jabatan j
		INNER JOIN tm_user t
		ON j.id_jabatan_atasan = t.id_jabatan
		where j.id_jabatan = ".$id_jabatan."";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}
	public function insertpemeriksa($data){
		return $this->db->insert('pemeriksa', $data);
	}
	public function rejectlembur($id,$notes)
	{
		$this->db->set('status', 1);
		$this->db->set('notes', $notes);
		$this->db->where('id_pengajuan_lembur', $id);
		$this->db->update('tth_lembur');

		return true;
	}
	public function approvelembur($id,$notes,$status)
	{
		$this->db->set('status', $status);
		$this->db->set('notes', $notes);
		$this->db->where('id_pengajuan_lembur', $id);
		$this->db->update('tth_lembur');

		return true;
	}
	public function updatepemeriksa($id,$id_user)
	{
		$this->db->set('status', 'Z');
		$this->db->where('id_tth_pengajuan', $id);
		$this->db->where('id_user', $id_user);
		$this->db->update('pemeriksa');

		return true;
	}
	public function updatepemeriksaY($id)
	{
		$this->db->set('status', 'Y');
		$this->db->where('id_pemeriksa', $id);
		$this->db->update('pemeriksa');

		return true;
	}
	public function getpemeriksax($id)
	{
		$sql = "SELECT * FROM pemeriksa
		where id_tth_pengajuan = ".$id." AND status = 'X' order by no_urut";
		$query = $this->db->query($sql);
		$result = $query->row_array();
		return $result;
	}

	function delete_pemeriksa($id)
	{
		$this->db->where('id_tth_pengajuan', $id);
		$this->db->delete('pemeriksa'); 
	}
	function delete_ttd_lembur($id)
	{
		$this->db->where('id_pengajuan_lembur', $id);
		$this->db->delete('ttd_lembur'); 
	}
	public function updatetthlembur($id,$notes)
	{
		$this->db->set('status', 2);
		$this->db->set('notes', $notes);
		$this->db->where('id_pengajuan_lembur', $id);
		$this->db->update('tth_lembur');

		return true;
	}
}
?>