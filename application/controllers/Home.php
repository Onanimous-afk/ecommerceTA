 <?php
 class Home extends CI_Controller
 {
 	public function __construct() {
 		parent::__construct();
 		// if (!$this->session->userdata('id_user')) {

 		// 	redirect(base_url('Login'));
 		// }

 	}
 	public function index()
 	{
		$userid = $this->session->userdata('id_user');
		$twentyproduct = $this->FPModel->gettwentyproduct();
		$dataeight1 = array();
		$dataeight2 = array();
		$count = 1;
		foreach($twentyproduct as $item)
		{
			if($dataeight1 != null)
			{				
				$myFlag = $item['id_product'];
				$target = array_filter($dataeight1, function($elem) use($myFlag){
						return $elem['id_product'] === $myFlag;
					});
				$target2 = array_filter($dataeight2, function($elem) use($myFlag){
					return $elem['id_product'] === $myFlag;
				});

				// print_r($target);
				$twenty = array();
				if($target == null && $count <=4)
				{
					// print_r($key);die();
					// print_r($key);die();
					$twenty = array(
						'id_product'=>$item['id_product'],
						'product_name'=>$item['product_name'],
						'price'=>$item['price'],
						'pictures'=>$item['pictures']
					);
					
					array_push($dataeight1,$twenty);
					$count++;
					// var_dump($dataeight1);die();
				}
				else if($target2 == null && $target == null && $count <=8){
					$twenty = array(
						'id_product'=>$item['id_product'],
						'product_name'=>$item['product_name'],
						'price'=>$item['price'],
						'pictures'=>$item['pictures']
					);
					
					array_push($dataeight2,$twenty);
					$count++;
					// var_dump($dataeight1);die();
				}
			}else{
				$twenty = array(
					'id_product'=>$item['id_product'],
					'product_name'=>$item['product_name'],
					'price'=>$item['price'],
					'pictures'=>$item['pictures']
				);
				
				array_push($dataeight1,$twenty);
				$count++;
			}
			
		}
		// var_dump($dataeight2);die();
		//get best seller jangan lupa
		
		// if($userid == "")
		// {
		// 	$datacart = 0;
		// }else{
		// 	$datacart = $this->FPModel->getcartbyuserid($userid);
		// }
		$datacart = $this->FPModel->getcartbyuserid($userid);
		$data['cartnotif'] = count($datacart);
		$data['cart'] = $datacart;
		$data['dataeight1'] = $dataeight1;
		$data['dataeight2'] = $dataeight2;
 		$this->load->view('header',$data);
 		$this->load->view('fp/home',$data);
 		$this->load->view('footer');
 	}
	public function detail_product($id)
	{
		$userid = $this->session->userdata('id_user');
		$data['detail'] = $this->FPModel->getproductbyId($id);
		$data['detailproductjson'] = json_encode($this->FPModel->getdetailproductbyId($id));
		// $data['detailproduct'] = $this->FPModel->getdetailproductbyId($id);
		$data['images'] = $this->FPModel->getproductimagesbyId($id);
		//get best seller jangan lupa
		$datacart = $this->FPModel->getcartbyuserid($userid);
		$data['cartnotif'] = count($datacart);
		$data['cart'] = $datacart;
		$this->load->view('header',$data);
 		$this->load->view('fp/detail_product',$data);
 		$this->load->view('footer');
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
