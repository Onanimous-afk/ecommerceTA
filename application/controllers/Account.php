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
		$userid = $this->session->userdata('id_user');
		$datacartreal = array();
		$datacart = $this->FPModel->getcartbyuserid($userid);
		foreach($datacart as $item)
		{
			$datapic = $this->FPModel->getsingleproductimagesbyId($item['id_detail_produk']);
			$totalprice = "Rp " . number_format($item['total_price'],2,',','.');
			$arr = array(
				"id_product" => $datapic['id_product'],
				"pictures" => $datapic['pictures'],
				"product_name"=>$datapic['product_name'],
				"total_price"=>$totalprice,
				"qty"=>$item['qtycart']
			);
			array_push($datacartreal,$arr);
		}
		$data['cartnotif'] = count($datacart);
		$data['cart'] = $datacartreal;
		$this->load->view('header',$data);
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
	public function profile()
	{		 
		$userid = $this->session->userdata('id_user');
		$datacartreal = array();
		$datacart = $this->FPModel->getcartbyuserid($userid);
		foreach($datacart as $item)
		{
			$datapic = $this->FPModel->getsingleproductimagesbyId($item['id_detail_produk']);
			$totalprice = "Rp " . number_format($item['total_price'],2,',','.');
			$price = "Rp " . number_format($item['price'],2,',','.');
			$arr = array(
				"id_cart" => $item['id_cart'],
				"id_product" => $datapic['id_product'],
				"id_produk_detail" => $datapic['id_produk_detail'],
				"pictures" => $datapic['pictures'],
				"product_name"=>$datapic['product_name'],
				"total_price"=>$totalprice,
				"total"=>$price,
				"total_price_real"=>$item['total_price'],
				"price_real"=>$item['price'],
				"qty"=>$item['qtycart'],
				"qty_real"=>$item['qty'],
				"color"=>$item['color_name'],
				"size"=>$item['size_name']
			);
			array_push($datacartreal,$arr);
		}
		$dataalamat = $this->FPModel->getaddressbyuserId($userid);
		$data['cartnotif'] = count($datacart);
		$data['cart'] = $datacartreal;
		$data['alamat'] = $dataalamat;

		$this->load->view('header',$data);
		$this->load->view('fp/profile',$data);
		$this->load->view('footer');
	}
	public function addaddress(){
		$userid = $this->session->userdata('id_user');
		$tag_address = $this->input->post('tag_address');
		$fullname = $this->input->post('fullname');
		$phone = $this->input->post('phone');
		$province = $this->input->post('province');
		$city = $this->input->post('city');
		$zipcode = $this->input->post('zipcode');
		$address = $this->input->post('address');
		$is_default = $this->input->post('default_checkbox');
		// print_r($is_default);die();
		if($is_default == 'on')
		{
			$is_default = 1;
		}
		else{
			$is_default = 0;
		}
		$data = array(
			"id_user"=> $userid,
			"tag_address"=> $tag_address,
			"fullname"=> $fullname,
			"phone"=> $phone,
			"id_province"=> $province,
			"id_city"=> $city,
			"address"=> $address,
			"zipcode"=> $zipcode,
			"is_default"=> $is_default
		);
		$this->FPModel->insertaddress($data);

		redirect('Account/Profile');

	}
	public function updateaddress()
	{
		$userid = $this->session->userdata('id_user');
		$id_address = $this->input->post('id_address');
		$tag_address = $this->input->post('tag_address_edit');
		$fullname = $this->input->post('fullname_edit');
		$phone = $this->input->post('phone_edit');
		$province = $this->input->post('province_edit');
		$city = $this->input->post('city_edit');
		$zipcode = $this->input->post('zipcode_edit');
		$address = $this->input->post('address_edit');
		$is_default = $this->input->post('default_checkbox_edit');
		// print_r($is_default);die();
		if($is_default == 'on')
		{
			$is_default = 1;
		}
		else{
			$is_default = 0;
		}
		$this->FPModel->updateaddress($id_address,$tag_address,$fullname,$phone,$province,$city,$zipcode,$address,$is_default);

	redirect('Account/Profile');
	}
	public function updateisdefaultaddress(){

		$userid = $this->session->userdata('id_user');
		$id = $this->input->post('id_address');
		$this->FPModel->updateisdefaultaddress($id,$userid);

		echo "success";
	}
	public function getdetailaddress()
	{
		$id = $this->input->post('id_address');
		$data = $this->FPModel->getaddressbyId($id);
		echo json_encode($data);
	}
	public function history_order()
	{
		$userid = $this->session->userdata('id_user');
		$datacartreal = array();
		$datacart = $this->FPModel->getcartbyuserid($userid);
		foreach($datacart as $item)
		{
			$datapic = $this->FPModel->getsingleproductimagesbyId($item['id_detail_produk']);
			$totalprice = "Rp " . number_format($item['total_price'],2,',','.');
			$price = "Rp " . number_format($item['price'],2,',','.');
			$arr = array(
				"id_cart" => $item['id_cart'],
				"id_product" => $datapic['id_product'],
				"id_produk_detail" => $datapic['id_produk_detail'],
				"pictures" => $datapic['pictures'],
				"product_name"=>$datapic['product_name'],
				"total_price"=>$totalprice,
				"total"=>$price,
				"total_price_real"=>$item['total_price'],
				"price_real"=>$item['price'],
				"qty"=>$item['qtycart'],
				"qty_real"=>$item['qty'],
				"color"=>$item['color_name'],
				"size"=>$item['size_name']
			);
			array_push($datacartreal,$arr);
		}
		$data['cartnotif'] = count($datacart);
		$data['cart'] = $datacartreal;
		$dataorder = $this->FPModel->getListorder($userid);
		$data['order'] = $dataorder;

		$this->load->view('header',$data);
		$this->load->view('fp/history',$data);
		$this->load->view('footer');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Account/Login');
	}
}
?>