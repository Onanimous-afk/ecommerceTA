<?php
class OrderModel extends CI_Model
{
	
	public function get_dt_lembur_personal($id_user)
	{
		$sql = "SELECT * from tth_lembur where id_pengaju_lembur = ".$id_user." ORDER BY status";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function hitungorderhariini($date)
	{
		$sql = "SELECT * FROM tr_order where order_date = ".$date."";
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