<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

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
		$date = new dateTime('now', new DateTimeZone('Asia/Jakarta'));
		$bulan = $date->format('m');
		$tahun = $date->format('Y');
		$getdtcurrentpenilaianpersonal = $this->PenilaianModel->getcurrentpenilaianpersonal($id_user,$bulan,$tahun);
		if($getdtcurrentpenilaianpersonal == 0)
		{
			//insert penilaian personal bulan ini
			$data = array(
				'bulan' => $bulan,
				'tahun' => $tahun,
				'status' => 1,
				'id_user' => $id_user,
				'attitude' => 0,
				'kehadiran' => 0,
				'skill' => 0,
				'hasil' => 0,
				'project_solved' => 0,
				'created_on' => $date->format('Y-m-d H:i:s'),
				'created_by' => $id_user,
				'modified_on' => $date->format('Y-m-d H:i:s'),
				'modified_by' => $id_user
			);
			$this->PenilaianModel->insertpenilaian($data);
		}

		$dtbawahan = $this->LemburModel->get_dt_bawahan($id_jabatan);

		foreach ($dtbawahan as $value) {
			$getdtcurrentpenilaianbawahan = $this->PenilaianModel->getcurrentpenilaianuserbawahan($value["id_user"],$bulan,$tahun);
			if($getdtcurrentpenilaianbawahan == 0)
			{
			//insert penilaian bawahan bulan ini
				$data = array(
					'bulan' => $bulan,
					'tahun' => $tahun,
					'status' => 1,
					'id_user' => $value["id_user"],
					'attitude' => 0,
					'kehadiran' => 0,
					'skill' => 0,
					'hasil' => 0,
					'project_solved' => 0,
					'created_on' => $date->format('Y-m-d H:i:s'),
					'created_by' => $id_user,
					'modified_on' => $date->format('Y-m-d H:i:s'),
					'modified_by' => $id_user
				);

				$this->PenilaianModel->insertpenilaian($data);
			}			
		}

		$data['jumbawahan'] = count($dtbawahan);		

		$this->load->view('header');
		$this->load->view('penilaian',$data);
		$this->load->view('footer');
		
	}
	public function detail($id)
	{
		$id_jabatan = $this->session->userdata('id_jabatan');
		$data['dt'] = $this->PenilaianModel->getpenilaianbyid($id);
		//$id_user = $this->session->userdata('id_user');
		$data['disabled'] = $data['dt']['status'] == 1 && $id_jabatan != 6 ? "" : "disabled";

		// if($data['dt']['status'] == 1)
		// {
		// 	print_r("expression");
		// }
		// else{
		// 	print_r("kontol");
		// }

		// var_dump($data['disabled']);die();

		$this->load->view('header');
		$this->load->view('detailpenilaian',$data);
		$this->load->view('footer');
		
		
	}
	public function getpenilaianpersonal()
	{
		$id_user = $this->session->userdata('id_user');

		$data = $this->PenilaianModel->getpenilaianpersonals($id_user);

		echo json_encode($data);
		
	}
	public function getpenilaianbawahan()
	{
		$id_user = $this->session->userdata('id_user');
		$id_jabatan = $this->session->userdata('id_jabatan');

		$begin = $this->input->post('begin');
		$end = $this->input->post('end');

		$dtbawahan = $this->LemburModel->get_dt_bawahan($id_jabatan);
		$databwhn = "";
		$ia = 0;

		foreach ($dtbawahan as $value) {
			if($ia == 0)
			{
				$databwhn .= "'".$value["id_user"]."'";
				$ia+=1;
			}
			else{
				$databwhn .= ",'".$value["id_user"]."'";
			}
		}

		$data = $this->PenilaianModel->getpenilaianbawahans($databwhn,$begin,$end);

		echo json_encode($data);
		
	}
	public function nilai()
	{
		$id_penilaian = $this->input->post('id_penilaian');
		$attitude = $this->input->post('attitude');
		$kehadiran = $this->input->post('kehadiran');
		$skill = $this->input->post('skill');
		$project_solved = $this->input->post('project_solved');
		$hasil = ($attitude + $kehadiran + $skill + $project_solved) / 4;

		$this->PenilaianModel->updatepenilaian($id_penilaian,$attitude,$kehadiran,$skill,$project_solved,$hasil);

		redirect(base_url('Penilaian/index'));

	}
	public function exporttoexcel()
	{
		$id_user = $this->session->userdata('id_user');
		$id_jabatan = $this->session->userdata('id_jabatan');
		$begin = $this->input->post('begin');
		$end = $this->input->post('end');

		$dtbawahan = $this->LemburModel->get_dt_bawahan($id_jabatan);
		$databwhn = "";
		$ia = 0;

		foreach ($dtbawahan as $value) {
			if($ia == 0)
			{
				$databwhn .= "'".$value["id_user"]."'";		
				$ia+=1;
			}
			else{
				$databwhn .= ",'".$value["id_user"]."'";
			}
		}

		$data['data'] = $this->PenilaianModel->getpenilaianbawahans($databwhn,$begin,$end);
		$data['begin'] = $begin;
 		$data['end'] = $end;

		$this->load->view('reportexcelpenilaian',$data);

	}
}
?>