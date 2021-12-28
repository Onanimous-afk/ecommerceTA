<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderAdmin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('id_user') && $this->session->userdata('is_admin') == 0) {

			redirect(base_url('Account/Login'));
		}

	}
	public function index()
	{
		$this->load->view('headerAdmin');
		$this->load->view('order/orderadmin');
		$this->load->view('footerAdmin');
	}
	public function searchdataorder()
	{
		$order_no = $this->input->post('order_no');
		$status = $this->input->post('status');

		$data = $this->OrderModel->getListorder($order_no,$status);

		echo json_encode($data);
		
	}
	public function detail($id)
	{
		$orderdetail = $this->OrderModel->getdetailorder($id);
		$data['orderdetail'] = $orderdetail;
		$action = "#";
		if($orderdetail[0]['status'] == 1)
		{
			$action = base_url()."OrderAdmin/Confirm";
		}else if($orderdetail[0]['status'] == 2){
			$action = base_url()."OrderAdmin/UpdateResi";
		}
		$status = 'Selesai';
		if($orderdetail[0]['status'] == 0)
		{
			$status = 'Belum Upload bukti pembayaran';
		}else if($orderdetail[0]['status'] == 1)
		{
			$status = 'Membutuhkan konfirmasi';
		}else if($orderdetail[0]['status'] == 2)
		{
			$status = 'Input Nomor Resi';
		}else if($orderdetail[0]['status'] == 3)
		{
			$status = 'Dikirim';
		}
		$data['action'] = $action;
		$data['status'] = $status;
		$this->load->view('headerAdmin');
		$this->load->view('order/detailorderadmin',$data);
		$this->load->view('footerAdmin');
	}
	public function Confirm()
	{
		$id_order=$this->input->post('id_order');	
		$datenowinsert = date('Y-m-d H:i:s');
		$data = array(
			"status"=>2,
			"confirm_payment_date"=>$datenowinsert
		);
		$this->FPModel->updateorder($data,$id_order);
		$this->session->set_flashdata('alert', 'Berhasil Mengkonfirmasi Order');
		redirect('OrderAdmin');
	}
	public function UpdateResi()
	{
		$id_order=$this->input->post('id_order');
		$resi=$this->input->post('resi');
		$delivery_date=$this->input->post('delivery_date');
		// $datenowinsert = date('Y-m-d H:i:s');
		$data = array(
			"status"=>3,
			"resi_number"=>$resi,
			"delivery_date"=>$delivery_date
		);
		$this->FPModel->updateorder($data,$id_order);
		$this->session->set_flashdata('alert', 'Berhasil Menambahkan Resi Pengiriman');
		redirect('OrderAdmin');
	}
	public function Tambahorder()
	{
		$this->load->view('headerAdmin');
		$this->load->view('order/addorder');
		$this->load->view('footerAdmin');
	}
	public function editorder()
	{
		$id_order = $this->input->post('id_order');
		$order_name = $this->input->post('order_name');
		$this->OrderModel->updateorder($id_order,$order_name);
		
		
		$this->session->set_flashdata('alert', 'Berhasil Merubah order');
		redirect(base_url('orderAdmin/index'));
	}
	public function addorder()
	{
		// $id_kategori = $this->input->post('id_kategori');
		$order_name = $this->input->post('order_name');
		$this->OrderModel->insertorder($order_name);
		
		
		$this->session->set_flashdata('alert', 'Berhasil Menambahkan order');
		redirect(base_url('orderAdmin/index'));
	}
	public function addattachment($param)
  	{
  		$split = explode("~", $param);
  		$idsrt = $split[1];
  		if($split[0] == 0 && $idsrt == 0)
  		{
			$data = array('product_name' => "dummyProduct");
  			$queryinsertsrt = $this->OrderModel->insertproduk($data);
			$idsrt = $queryinsertsrt;
  		}

		 //print_r($idsrt);die();

		//$num_file = count($_FILES['DOC']['name']);
		//  $image = $_FILES['InputFileDOC'];
		// print_r($image);die();
  		if (isset($_FILES['file']) && !empty($_FILES['file'])) {		 	

  			//$num_file = count($_FILES['file']['name']);
  			$filenamepertama = $_FILES['file']['name'];
		 	//print_r($filenamepertama);die(); 
		 	//print_r($_FILES['files']['name'][0]);die();
		 	if($filenamepertama != '' && $filenamepertama != NULL)//> 1)dirubah
		 	{
		 	//print_r($filenamepertama);die(); 
			//$max_allowed_file_size = 15360; // size in KB 
		 		$message = '';
			// for($f = 0; $f < $num_file; $f++){
				$randomnumber = random_int(100000, 999999);
		 		$new_file_name = $idsrt."_".$randomnumber;

		 		$_FILES['file']['name'] = $_FILES['file']['name'];
		 		$_FILES['file']['type'] = $_FILES['file']['type'];
		 		$_FILES['file']['tmp_name'] = $_FILES['file']['tmp_name'];
		 		$_FILES['file']['error'] = $_FILES['file']['error'];
		 		$_FILES['file']['size'] = $_FILES['file']['size'];

		 		$config['upload_path']          = FCPATH.'gambar_produk/';
		 		$config['file_name']			= $new_file_name;
		 		$config['allowed_types']        = 'jpg|png|PNG|JPG|JPEG|jpeg';
		 		$config['max_size']             = 15360;

				//print_r($_FILES['files']['name'][$f]);die();

		 		$this->upload->initialize($config);
		 		if ($this->upload->do_upload('file')){
		 			$process = $this->upload->data("file_name");
		 			$nmfile = $process;
					$dataimage = array(
						"id_product" => $idsrt,
						"pictures" => $nmfile
					);
		 			$queryinsertfile = $this->OrderModel->insertfileattachment($dataimage);

		 		}else{
		 			$error = $this->upload->display_errors();
					//$this->session->set_flashdata('errorUpload', $error);
		 			print_r($error);die();
					//redirect(base_url('outbox/Newmail'));
		 		}

			// }
		 	}
		}
		echo $idsrt;

	}
	public function getprodukattachment()
	{
		$id_produk = $this->input->post('id');
		$target_dir = FCPATH."gambar_produk/";		

		$file_list = array();
		$dir = $target_dir;
		if (is_dir($dir)){
			$dh = opendir($dir);
			if($dh)
			{
				while (($file = readdir($dh)) !== false){

					if($file != '' && $file != '.' && $file != '..'){
			
					  // File path
					  $file_path = $target_dir.$file;
			
					  // Check its not folder
					  if(!is_dir($file_path)){
			
						 $size = filesize($file_path);
						 $file_path = base_url()."gambar_produk/".$file;
						 $data = $this->OrderModel->getListattachmentProduk($id_produk,$file);
						 if($data != null)
						 {
							$file_list[] = array('name'=>$file,'size'=>$size,'path'=>$file_path);
						 }
					  }
					}
			
				  }
				  closedir($dh);
			}
		}

		echo json_encode($file_list);
		exit;
		
	}
	public function hapusdetailproduk()
	{
		$iddetail = $this->input->post('id');
		$listorder = $this->OrderModel->getOrderdetailbyiddetailproduk($iddetail);
		if(count($listorder) > 0)
		{
			echo "Fail";
		}else{
			$this->OrderModel->delete_detail_produk($iddetail);

			echo "Success";
		}
	}
	public function deleteprodukattachment(){
		$name = $this->input->post('name');
		$this->OrderModel->delete_image_produk($name);		
		$filename = FCPATH."gambar_produk/".$name;
		// $filename = $target_dir.$_POST['name'];  
		unlink($filename); 
		exit;
	}
}
?>