 <?php
 class HomeAdmin extends CI_Controller
 {
 	public function __construct() {
 		parent::__construct();
 		if (!$this->session->userdata('id_user') && $this->session->userdata('is_admin') == 0) {

 			redirect(base_url('Account/Login'));
 		}

 	}
 	public function index()
 	{
 		// $id_jabatan = $this->session->userdata('id_jabatan');
		// $id_user = $this->session->userdata('id_user');
		// $dtbawahan = $this->LemburModel->get_dt_bawahan($id_jabatan);
		// $datapersonal = $this->LemburModel->get_dt_lembur_personal_periksa($id_user);
		// $datapersonalapprv = $this->LemburModel->get_dt_lembur_personal_aprove($id_user);
		// $data['jumbawahan'] = count($dtbawahan);
		// $data['jumlemburperiksa'] = count($datapersonal);
		// $data['jumlemburapprove'] = count($datapersonalapprv);
		// if(count($dtbawahan) > 0)
		// {
		// 	$datalmbrbwhn = $this->LemburModel->get_dt_lembur_bawahan($id_user);
		// 	$data['jumlemburbawahanperiksa'] = count($datalmbrbwhn);
		// }

		$date = new dateTime('now', new DateTimeZone('Asia/Jakarta'));
		$date_format = $date->format('Y-m-d');
		// $data['orderhariini'] = $this->OrderModel->hitungorderhariini($date_format);
		// $lastDateOfMonth = date("Y-m-t", strtotime($date_format));
		// $bulan = $date->format('m');
		// $tahun = $date->format('Y');

		// $data['jumuserlemburall']= $this->LemburModel->getjumuserlembur($date_format,$lastDateOfMonth);
		$ordermasuktoday = $this->OrderModel->getordertoday();
		$orderneedconfirm = $this->OrderModel->getorderneedconfirm();

		$data['jumordermasuktoday'] = count($ordermasuktoday);
		$data['jumorderneedconfirm'] = count($orderneedconfirm);

 		$this->load->view('headerAdmin');
 		$this->load->view('mainAdmin',$data);
 		$this->load->view('footerAdmin');
 	}
 	public function slipgaji()
 	{
 		$this->load->view('header');
 		$this->load->view('slipgaji');
 		$this->load->view('footer');
 	}
 	public function downloadslipgaji()
 	{
 		$tgl = $this->input->post('tgl');
 		$explode = explode('-', $tgl);
 		$bulan = $explode[1];
 		$tahun = $explode[0];
 		$namabulan = '';
 		switch($bulan) {
 			case "01" : $namabulan = "Jan"; break;
 			case "02" : $namabulan = "Feb"; break;
 			case "03" : $namabulan = "Mar"; break;
 			case "04" : $namabulan = "Apr"; break;
 			case "05" : $namabulan = "Mei"; break;
 			case "06" : $namabulan = "Jun"; break;
 			case "07" : $namabulan = "Jul"; break;
 			case "08" : $namabulan = "Agu"; break;
 			case "09" : $namabulan = "Sep"; break;
 			case "10" : $namabulan = "Okt"; break;
 			case "11" : $namabulan = "Nov"; break;
 			case "12" : $namabulan = "Des"; break;
 		}
 		$tgl = $tgl.'-01';
 		$lastDateOfMonth = date("Y-m-t", strtotime($tgl));
 		$id_user = $this->session->userdata('id_user');
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
 }
 ?>
