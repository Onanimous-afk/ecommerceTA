<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
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
	public function login()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function check_login()
	{
		$nipp = $this->input->post('email');
		$password = $this->input->post('password');
		$cek = $this->UserModel->get_user($nipp, $password);
		//$num = $this->userModel->get_user($user,$pass);
		if(count($cek) > 0)
		{			
			// foreach($cek as $data){
			// $jumbawahan = $this->UserModel->hitungbawahan($data["id_jabatan"]);
			$sess_data = array(
				'id_user' => $cek["id_user"], 
				'nama' => $cek["nama"], 
				'email' => $cek["email"],
				'is_admin' => $cek["is_admin"]
			);
			$this->session->set_userdata($sess_data);
			if($cek['is_admin'] == 1)
			{
				redirect('HomeAdmin/index');
			}
			else{
				redirect('Home/index');
			}
			
			
		}
		else
		{
			echo "<script type='text/javascript'>
			alert('GAGAL !');</script>";
			redirect('Account/Login');
		}
	}
	public function check_register()
	{
		$nipp = $this->input->post('email');
		$nama = $this->input->post('nama');
		$password = $this->input->post('password');
		$cek = $this->UserModel->check_email_user($nipp);
		//$num = $this->userModel->get_user($user,$pass);
		if(count($cek) > 0)
		{			
			$this->session->set_flashdata('alert', 'Email Sudah ada harap register menggunakan email lain');
			redirect('Account/register');
		}
		else
		{
			$data = array(
				'nama' => $nama,
				'email' => $nipp,
				'password' => $password,
				'is_admin' => 0,
				'is_verif' => 1,
			);
	
			$this->UserModel->register_user($data);

			$this->session->set_flashdata('alert', 'Berhasil registrasi akun');
			redirect('Account/Login');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Account/Login');
	}
}
?>