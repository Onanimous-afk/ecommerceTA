<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembur extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$id_jabatan = $this->session->userdata('id_jabatan');
		$id_user = $this->session->userdata('id_user');
		$dtbawahan = $this->LemburModel->get_dt_bawahan($id_jabatan);
		$data['jumbawahan'] = count($dtbawahan);
		$this->load->view('header');
		$this->load->view('lembur',$data);
		$this->load->view('footer');
		
	}
	public function report()
	{
		$id_jabatan = $this->session->userdata('id_jabatan');
		$id_user = $this->session->userdata('id_user');
		$dtbawahan = $this->LemburModel->get_dt_bawahan($id_jabatan);
		$data['jumbawahan'] = count($dtbawahan);
		$this->load->view('header');
		$this->load->view('reportlembur',$data);
		$this->load->view('footer');
		
	}
	public function ajukan()
	{
		$this->load->view('header');
		$this->load->view('ajukanlembur');
		$this->load->view('footer');
		
	}
	public function ajukanpost()
	{
		$id_user = $this->session->userdata('id_user');
		$id_jabatan = $this->session->userdata('id_jabatan');
		$notes = $this->input->post('notes');
		$tanggal_lembur = $this->input->post('tanggal_lembur');
		$jam_mulai_lembur = $this->input->post('jam_mulai_lembur');
		$jam_selesai_lembur = $this->input->post('jam_selesai_lembur');
		$kegiatan = $this->input->post('kegiatan');
		$date = new dateTime('now', new DateTimeZone('Asia/Jakarta'));


		//insert header lembur
		$nomorpengajuan = "#". random_string('alnum', 6);

		$data = array(
			'id_pengaju_lembur' => $id_user,
			'nomor_pengajuan' => $nomorpengajuan,
			'status' => 2,
			'notes' => $notes,
			'created_on' => $date->format('Y-m-d H:i:s'),
			'created_by' => $id_user,
			'modified_on' => $date->format('Y-m-d H:i:s'),
			'modified_by' => $id_user
		);

		//insert data tth lembur dan get lastid 

		$lastid = $this->LemburModel->inserttthlembur($data);

		//insert data pemeriksa
		$atasan1 = $this->LemburModel->selectatasan($id_jabatan);

		$atasan2 = $this->LemburModel->selectatasan($atasan1['id_jabatan']);;

		$dataatasan1 = array(
			'id_user' => $atasan1['id_user'],
			'id_tth_pengajuan' => $lastid,
			'status' => 'Y',
			'no_urut' => 1
		);
		$this->LemburModel->insertpemeriksa($dataatasan1);
		if($atasan2 != null)
		{
			$dataatasan2 = array(
				'id_user' => $atasan2['id_user'],
				'id_tth_pengajuan' => $lastid,
				'status' => 'X',
				'no_urut' => 2
			);
			$this->LemburModel->insertpemeriksa($dataatasan2);
		}
		//insert data ttd_lembur

		for($i = 0;$i < count($tanggal_lembur);$i++)
		{
			$mulailembur = $tanggal_lembur[$i].' '. $jam_mulai_lembur[$i];
			$selesailembur = $tanggal_lembur[$i].' '. $jam_selesai_lembur[$i];

			$datas = array(
				'id_pengajuan_lembur' => $lastid,
				'tgl_lembur' => $tanggal_lembur[$i],
				'jam_mulai_aktual' => $mulailembur,
				'jam_selesai_aktual' => $selesailembur,
				'kegiatan' => $kegiatan[$i],
				'created_on' => $date->format('Y-m-d H:i:s'),
				'created_by' => $id_user,
				'modified_on' => $date->format('Y-m-d H:i:s'),
				'modified_by' => $id_user
			);

			$this->LemburModel->insertttdlembur($datas);
		}

		redirect(base_url('Lembur/index'));
	}
	public function ajukanulangpost()
	{
		$id_pengajuan_lembur = $this->input->post('id_pengajuan_lembur');
		$id_user = $this->session->userdata('id_user');
		$id_jabatan = $this->session->userdata('id_jabatan');
		$notes = $this->input->post('notes');
		$tanggal_lembur = $this->input->post('tanggal_lembur');
		$jam_mulai_lembur = $this->input->post('jam_mulai_lembur');
		$jam_selesai_lembur = $this->input->post('jam_selesai_lembur');
		$kegiatan = $this->input->post('kegiatan');
		$date = new dateTime('now', new DateTimeZone('Asia/Jakarta'));


		//update status tth_lembur jadi periksa
		$this->LemburModel->updatetthlembur($id_pengajuan_lembur,$notes);

		//delete pemeriksa
		$this->LemburModel->delete_pemeriksa($id_pengajuan_lembur);

		//insert data pemeriksa
		$atasan1 = $this->LemburModel->selectatasan($id_jabatan);

		$atasan2 = $this->LemburModel->selectatasan($atasan1['id_jabatan']);;

		$dataatasan1 = array(
			'id_user' => $atasan1['id_user'],
			'id_tth_pengajuan' => $id_pengajuan_lembur,
			'status' => 'Y',
			'no_urut' => 1
		);
		$this->LemburModel->insertpemeriksa($dataatasan1);
		if($atasan2 != null)
		{
			$dataatasan2 = array(
				'id_user' => $atasan2['id_user'],
				'id_tth_pengajuan' => $id_pengajuan_lembur,
				'status' => 'X',
				'no_urut' => 2
			);
			$this->LemburModel->insertpemeriksa($dataatasan2);
		}

		//delete data ttd_lembur
		$this->LemburModel->delete_ttd_lembur($id_pengajuan_lembur);

		//insert data ttd_lembur

		for($i = 0;$i < count($tanggal_lembur);$i++)
		{
			$mulailembur = $tanggal_lembur[$i].' '. $jam_mulai_lembur[$i];
			$selesailembur = $tanggal_lembur[$i].' '. $jam_selesai_lembur[$i];

			$datas = array(
				'id_pengajuan_lembur' => $id_pengajuan_lembur,
				'tgl_lembur' => $tanggal_lembur[$i],
				'jam_mulai_aktual' => $mulailembur,
				'jam_selesai_aktual' => $selesailembur,
				'kegiatan' => $kegiatan[$i],
				'created_on' => $date->format('Y-m-d H:i:s'),
				'created_by' => $id_user,
				'modified_on' => $date->format('Y-m-d H:i:s'),
				'modified_by' => $id_user
			);

			$this->LemburModel->insertttdlembur($datas);
		}

		redirect(base_url('Lembur/index'));
	}
	public function detail($id)
	{
		$dt = $this->LemburModel->gettthlemburbyid($id);
		$id_user = $this->session->userdata('id_user');
		$data["header"] = $dt;
		$data["idpengajuan"] = $id;
		if($id_user != $dt['id_pengaju_lembur'])
		{
			$this->load->view('header');
			$this->load->view('detaillemburbawahan',$data);
			$this->load->view('footer');
		}
		else
		{
			$this->load->view('header');
			$this->load->view('detaillemburpersonal',$data);
			$this->load->view('footer');
		}
		
		
	}
	public function getdetaillembur($id)
	{
		//print_r($id);die();
		$id_user = $this->session->userdata('id_user');

		$data = $this->LemburModel->getttdlemburbyid($id);

		echo json_encode($data);
		
	}

	public function getpengajuanpersonal()
	{		
		$id_user = $this->session->userdata('id_user');
		$data = $this->LemburModel->get_dt_lembur_personal($id_user);
		echo json_encode($data);
	}
	public function reject()
	{
		$id = $this->input->post('id');
		$notes = $this->input->post('notes');

		$this->LemburModel->rejectlembur($id,$notes);

		echo "success";
	}
	public function approvelembur()
	{
		$id = $this->input->post('id_pengajuan_lembur');
		$id_user = $this->session->userdata('id_user');
		$notes = $this->input->post('notes');
		//UPDATE current pemeriksa
		$this->LemburModel->updatepemeriksa($id,$id_user);

		$dtpemeriksa = $this->LemburModel->getpemeriksax($id);

		if($dtpemeriksa != null)
		{
			$this->LemburModel->updatepemeriksaY($dtpemeriksa['id_pemeriksa']);
		}else
		{
			$this->LemburModel->approvelembur($id,$notes,3);	
		}		

		redirect(base_url('Lembur/index'));
	}
	public function getpengajuanbawahan()
	{		
		$id_jabatan = $this->session->userdata('id_jabatan');
		$id_user = $this->session->userdata('id_user');
		// $dtbawahan = $this->LemburModel->get_dt_bawahan($id_jabatan);
		// $databwhn = "";
		// $ia = 0;

		// foreach ($dtbawahan as $value) {
		// 	if($ia == 0)
		// 	{
		// 		$databwhn .= "'".$value["id_user"]."'";		
		// 	}
		// 	else{
		// 		$databwhn .= ",'".$value["id_user"]."'";
		// 	}
		// }
		$data = $this->LemburModel->get_dt_lembur_bawahan($id_user);
		echo json_encode($data);
	}
	public function getpengajuanpersonalreport()
	{
		$begin = $this->input->post('begin');
		$end = $this->input->post('end');
		$date = new dateTime('now', new DateTimeZone('Asia/Jakarta'));
		$date_format = $date->format('Y-m-d H:i:s');
		if($begin == null || $end == null)
		{
			$begin = date('Y-m-d H:i:s', strtotime($date_format . ' -7 day'));
			$end = $date_format;
		}

		$id_user = $this->session->userdata('id_user');
		$data = $this->LemburModel->get_dt_lembur_personal_report($id_user,$begin,$end);
		echo json_encode($data);
	}
	public function exporttoexcelpersonal()
	{
		$id_user = $this->session->userdata('id_user');
		$id_jabatan = $this->session->userdata('id_jabatan');

		$begin = $this->input->post('begin');
		$end = $this->input->post('end');

		$data['data'] = $this->LemburModel->get_dt_lembur_personal_report($id_user,$begin,$end);
		$data['begin'] = $begin;
 		$data['end'] = $end;

		$this->load->view('reportexcellembur',$data);

	}
	public function getpengajuanbawahanreport()
	{
		$begin = $this->input->post('begin');
		$end = $this->input->post('end');
		$date = new dateTime('now', new DateTimeZone('Asia/Jakarta'));
		$date_format = $date->format('Y-m-d H:i:s');
		if($begin == null || $end == null)
		{
			$begin = date('Y-m-d H:i:s', strtotime($date_format . ' -7 day'));
			$end = $date_format;
		}

		$id_jabatan = $this->session->userdata('id_jabatan');
		$id_user = $this->session->userdata('id_user');
		$dtbawahan = $this->LemburModel->get_dt_bawahan($id_jabatan);
		$databwhn = "";
		$ia = 0;

		foreach ($dtbawahan as $value) {
			if($ia == 0)
			{
				$databwhn .= "'".$value["id_user"]."'";		
				$ia = 1;
			}
			else{
				$databwhn .= ",'".$value["id_user"]."'";
			}
		}
		$data = $this->LemburModel->get_dt_lembur_bawahan_report2($databwhn,$begin,$end);
		echo json_encode($data);
	}
	public function exporttoexcelbawahan()
	{
		$id_user = $this->session->userdata('id_user');
		$id_jabatan = $this->session->userdata('id_jabatan');

		$begin = $this->input->post('begins');
		$end = $this->input->post('ends');

		$dtbawahan = $this->LemburModel->get_dt_bawahan($id_jabatan);
		$databwhn = "";
		$ia = 0;

		foreach ($dtbawahan as $value) {
			if($ia == 0)
			{
				$databwhn .= "'".$value["id_user"]."'";		
				$ia = 1;
			}
			else{
				$databwhn .= ",'".$value["id_user"]."'";
			}
		}
		$data['data'] = $this->LemburModel->get_dt_lembur_bawahan_report($databwhn,$begin,$end);
		$data['begin'] = $begin;
 		$data['end'] = $end;

		//$data['data'] = $this->LemburModel->get_dt_lembur_personal_report($id_user,$begin,$end);

		$this->load->view('reportexcellemburbawahan',$data);

	}
}
?>