 <?php
 class Report extends CI_Controller
 {
 	public function __construct() {
 		parent::__construct();
 		if (!$this->session->userdata('id_user')) {

 			redirect(base_url('Login'));
 		}

 	}
 	public function index()
 	{
 		$data['datauser'] = $this->ReportModel->getAllUser();

 		$this->load->view('header');
 		$this->load->view('mainreport',$data);
 		$this->load->view('footer');
 	}
 	public function getpengajuanpersonal()
 	{
		//$id_user = $this->input->post('id_user');
 		$begin = $this->input->post('begin');
 		$end = $this->input->post('end');
 		$data = $this->ReportModel->get_dt_lembur_personal($begin,$end);
 		echo json_encode($data);
 	}
 	public function getpenilaianbawahan()
 	{
 		$id_user = $this->session->userdata('id_user');
 		$id_jabatan = $this->session->userdata('id_jabatan');

 		$begin = $this->input->post('begin');
 		$end = $this->input->post('end');


 		$data = $this->ReportModel->getpenilaianbawahans($begin,$end);

 		echo json_encode($data);

 	}
 	public function exporttoexcelpersonal($idpengajuan)
 	{
		// $id_user = $this->session->userdata('id_user');
		// $id_jabatan = $this->session->userdata('id_jabatan');

		// $begin = $this->input->post('begin');
		// $end = $this->input->post('end');

 		$data['data'] = $this->ReportModel->get_dt_lembur_personal_report($idpengajuan);

 		$this->load->view('reportexcellembur',$data);

 	}
 	public function exporttoexcel($id_penilaian)
 	{
 		$id_user = $this->session->userdata('id_user');
 		$id_jabatan = $this->session->userdata('id_jabatan');
 		$begin = $this->input->post('begin');
 		$end = $this->input->post('end');



 		$data['data'] = $this->ReportModel->getpenilaianbawahanss($id_penilaian);
 		$data['begin'] = $begin;
 		$data['end'] = $end;

 		$this->load->view('reportexcelpenilaian',$data);

 	}
 	public function downloadslipgaji()
 	{
 		$tgl = $this->input->post('tgl');
 		$explode = explode('-', $tgl);
 		$bulan = $explode[1];
 		$tahun = $explode[0];
 		$namabulan = '';
 		switch($bulan) {
 			case "01" : $namabulan = "Januari"; break;
 			case "02" : $namabulan = "Februari"; break;
 			case "03" : $namabulan = "Maret"; break;
 			case "04" : $namabulan = "April"; break;
 			case "05" : $namabulan = "Mei"; break;
 			case "06" : $namabulan = "Juni"; break;
 			case "07" : $namabulan = "Juli"; break;
 			case "08" : $namabulan = "Agustus"; break;
 			case "09" : $namabulan = "September"; break;
 			case "10" : $namabulan = "Oktober"; break;
 			case "11" : $namabulan = "November"; break;
 			case "12" : $namabulan = "Desember"; break;
 		}
 		$tgl = $tgl.'-01';
 		$lastDateOfMonth = date("Y-m-t", strtotime($tgl));
 		$id_user = $this->input->post('id_user'); 		
 		$getdetailuser = $this->UserModel->getdetailuser($id_user);
 		$getdtlembur = $this->LemburModel->get_dt_lembur_personal_report($id_user,$tgl,$lastDateOfMonth);
 		$totaljamlembur = 0;
 		$nilailembur = 0;
 		if(count($getdtlembur) > 0)
 		{
 			foreach ($getdtlembur as $value) {
 				$start = new DateTime($value['jam_mulai_aktual']);
 				$end = new DateTime($value['jam_selesai_aktual']);
 				$interval = $start->diff($end);
 				$totaljamlembur += intval($interval->format('%h'));
 				//echo $interval->format('%h hours %i minutes %S seconds'); die();
 			}
 			//print_r($totaljamlembur);die();
 			$nilailembur = $totaljamlembur * 24788;
 		}
 		$getdtpenilaian = $this->PenilaianModel->getdtpenilaianpersonal($id_user,$bulan,$tahun);
 		$nilaitunjangan = 0;
 		if($getdtpenilaian != null){
 			if($getdtpenilaian['hasil'] != 0)
 			{
 				$nilaitunjangan = ($getdetailuser['tunjangan_keahlian'] * $getdtpenilaian['hasil']) / 100;
 			}
 		}
 		if($getdetailuser['id_jabatan_atasan'] == null)
 		{
 			$nilaitunjangan = $getdetailuser['tunjangan_keahlian'];
 		}

 		$bpjskes = ($getdetailuser['salary'] * 1)/100;
 		$jaminanpensi = ($getdetailuser['salary'] * 1)/100;
 		$bpjsket = ($getdetailuser['salary'] * 2)/100;

 		$pph21 = 0;
 		if($getdetailuser['npwp'] != null && $getdetailuser['npwp'] != 0)
 		{
 			$pph21 = ($getdetailuser['salary'] * 12) > 60000000 ? ($getdetailuser['salary'] * 10)/100 : 0;	
 		}

 		$data['nilailembur'] = $nilailembur;
 		$data['nilaitunjangan'] = $nilaitunjangan;
 		$data['bpjskes'] = $bpjskes;
 		$data['jaminanpensi'] = $jaminanpensi;
 		$data['bpjsket'] = $bpjsket;
 		$data['pph21'] = $pph21;
 		$data['gaji'] = $getdetailuser['salary'];
 		$data['totalgaji'] = ($getdetailuser['salary'] + $nilaitunjangan) - ($bpjskes+$jaminanpensi+$bpjsket+$pph21);
 		$data['totalgajigros'] = ($getdetailuser['salary'] + $nilaitunjangan);
 		$data['jumpotongan'] = ($bpjskes+$jaminanpensi+$bpjsket+$pph21);
 		$data['nama'] = $getdetailuser['fullname'];
 		$data['nipp'] = $getdetailuser['nipp'];
 		$data['jabatan'] = $getdetailuser['nm_jabatan'];
 		$data['periode'] = $namabulan.'-'.$tahun;


 		$this->load->view('reportexcelslipgaji',$data);
 	}
 	public function downloadslipgajiAll()
 	{
 		$tgl = $this->input->post('tgl');
 		$explode = explode('-', $tgl);
 		$bulan = $explode[1];
 		$tahun = $explode[0];
 		$namabulan = '';
 		switch($bulan) {
 			case "01" : $namabulan = "Januari"; break;
 			case "02" : $namabulan = "Februari"; break;
 			case "03" : $namabulan = "Maret"; break;
 			case "04" : $namabulan = "April"; break;
 			case "05" : $namabulan = "Mei"; break;
 			case "06" : $namabulan = "Juni"; break;
 			case "07" : $namabulan = "Juli"; break;
 			case "08" : $namabulan = "Agustus"; break;
 			case "09" : $namabulan = "September"; break;
 			case "10" : $namabulan = "Oktober"; break;
 			case "11" : $namabulan = "November"; break;
 			case "12" : $namabulan = "Desember"; break;
 		}
 		$tgl = $tgl.'-01';
 		$lastDateOfMonth = date("Y-m-t", strtotime($tgl));
 		//$id_user = $this->input->post('id_user');
 		$getalluser = $this->UserModel->getalluser();
 		$alldata = [];
 		foreach ($getalluser as $items) {
 			$id_user = $items['id_user'];

 			$getdetailuser = $this->UserModel->getdetailuser($id_user);
 			$getdtlembur = $this->LemburModel->get_dt_lembur_personal_report($id_user,$tgl,$lastDateOfMonth);
 			$totaljamlembur = 0;
 			$nilailembur = 0;
 			if(count($getdtlembur) > 0)
 			{
 				foreach ($getdtlembur as $value) {
 					$start = new DateTime($value['jam_mulai_aktual']);
 					$end = new DateTime($value['jam_selesai_aktual']);
 					$interval = $start->diff($end);
 					$totaljamlembur += intval($interval->format('%h'));
 				//echo $interval->format('%h hours %i minutes %S seconds'); die();
 				}
 			//print_r($totaljamlembur);die();
 				$nilailembur = $totaljamlembur * 24788;
 			}
 			$getdtpenilaian = $this->PenilaianModel->getdtpenilaianpersonal($id_user,$bulan,$tahun);
 			$nilaitunjangan = 0;
 			if($getdtpenilaian != null){
 				if($getdtpenilaian['hasil'] != 0)
 				{
 					$nilaitunjangan = ($getdetailuser['tunjangan_keahlian'] * $getdtpenilaian['hasil']) / 100;
 				}
 			}
 			if($getdetailuser['id_jabatan_atasan'] == null)
 			{
 				$nilaitunjangan = $getdetailuser['tunjangan_keahlian'];
 			}

 			$bpjskes = ($getdetailuser['salary'] * 1)/100;
 			$jaminanpensi = ($getdetailuser['salary'] * 1)/100;
 			$bpjsket = ($getdetailuser['salary'] * 2)/100;

 			$pph21 = 0;
 			if($getdetailuser['npwp'] != null && $getdetailuser['npwp'] != 0)
 			{
 				$pph21 = ($getdetailuser['salary'] * 12) > 60000000 ? ($getdetailuser['salary'] * 10)/100 : 0;	
 			}

 			// $data['nilailembur'] = $nilailembur;
 			// $data['nilaitunjangan'] = $nilaitunjangan;
 			// $data['bpjskes'] = $bpjskes;
 			// $data['jaminanpensi'] = $jaminanpensi;
 			// $data['bpjsket'] = $bpjsket;
 			// $data['pph21'] = $pph21;
 			// $data['gaji'] = $getdetailuser['salary'];
 			// $data['totalgaji'] = ($getdetailuser['salary'] + $nilaitunjangan) - ($bpjskes+$jaminanpensi+$bpjsket+$pph21);
 			// $data['totalgajigros'] = ($getdetailuser['salary'] + $nilaitunjangan);
 			// $data['jumpotongan'] = ($bpjskes+$jaminanpensi+$bpjsket+$pph21);
 			// $data['nama'] = $getdetailuser['fullname'];
 			// $data['nipp'] = $getdetailuser['nipp'];
 			// $data['jabatan'] = $getdetailuser['nm_jabatan'];
 			// $data['periode'] = $namabulan.'-'.$tahun;

 			$media_datas = array(
 				'nilailembur' => $nilailembur,
 				'nilaitunjangan' => $nilaitunjangan,
 				'bpjskes'=> $bpjskes,
 				'jaminanpensi'=> $jaminanpensi,
 				'bpjsket'=> $bpjsket,
 				'pph21'=> $pph21,
 				'gaji' => $getdetailuser['salary'],
 				'totalgaji' => ($getdetailuser['salary'] + $nilaitunjangan) - ($bpjskes+$jaminanpensi+$bpjsket+$pph21),
 				'totalgajigros' => ($getdetailuser['salary'] + $nilaitunjangan),
 				'jumpotongan' => ($bpjskes+$jaminanpensi+$bpjsket+$pph21),
 				'nama' => $getdetailuser['fullname'],
 				'nipp' => $getdetailuser['nipp'],
 				'jabatan' => $getdetailuser['nm_jabatan'],
 				'periode' => $namabulan.' - '.$tahun
 			);
 			array_push($alldata,$media_datas); 

 		}
 		//$data = json_encode($alldata);
 		//var_dump($data);die();
 		$data['data'] = $alldata;

 		//var_dump($data['data']);die();

 		$this->load->view('reportexcelslipgajiall',$data);
 	}
 }
 ?>
