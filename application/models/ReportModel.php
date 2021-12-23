<?php
class ReportModel extends CI_Model
{
	
	public function get_dt_lembur_personal($begin,$end)
	{
		$sql = "SELECT * from tth_lembur t 
				Inner join tm_user tu
					on t.id_pengaju_lembur = tu.id_user
				ORDER BY status";
		if($begin != null && $begin != null){
		$sql = "SELECT * from tth_lembur t 
				Inner join tm_user tu
					on t.id_pengaju_lembur = tu.id_user
				where t.created_on >= '".$begin."' AND t.created_on <= '".$end."'
				ORDER BY status";
		}
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
	public function get_dt_lembur_personal_report($id_pengajuan)
	{
		$sql = "SELECT th.*,td.*,t.*,tj.nm_jabatan from tth_lembur th 
		inner join ttd_lembur td
			on th.id_pengajuan_lembur = td.id_pengajuan_lembur
		inner join tm_user t
			on th.id_pengaju_lembur = t.id_user
		inner join tm_jabatan tj
			on t.id_jabatan = tj.id_jabatan
		where th.id_pengajuan_lembur = ".$id_pengajuan." ORDER BY status";
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
	public function getpenilaianbawahans($begin,$end)
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

			$sql = "SELECT t.*,tm.fullname FROM tt_penilaian t inner join tm_user tm on t.id_user = tm.id_user where (t.bulan >= $begindate && t.tahun = $beginyear) AND (t.bulan <= $enddate && t.tahun = $endyear) AND tm.id_jabatan != 2 order by t.status,t.bulan,t.tahun asc";
		}
		else
		{
			$sql = "SELECT t.*,tm.fullname FROM tt_penilaian t inner join tm_user tm on t.id_user = tm.id_user where tm.id_jabatan != 2 order by t.status,t.bulan,t.tahun asc";
		}		
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function getpenilaianbawahanss($id_penilaian)
	{	
		$sql = "SELECT t.*,tm.fullname FROM tt_penilaian t inner join tm_user tm on t.id_user = tm.id_user where t.id_penilaian = $id_penilaian order by t.status,t.bulan,t.tahun asc";
				
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
	public function getAllUser()
	{	
		$sql = "SELECT * FROM tm_user where id_jabatan != 6 order by fullname asc";
				
		$query = $this->db->query($sql);
		$result = $query->result_array();
		return $result;
	}
}
?>