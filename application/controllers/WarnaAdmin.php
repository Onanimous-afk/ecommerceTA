<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WarnaAdmin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('id_user') && $this->session->userdata('is_admin') == 0) {

			redirect(base_url('Account/Login'));
		}

	}
	public function index()
	{
		$this->load->view('headerAdmin');
		$this->load->view('warna/warnaadmin');
		$this->load->view('footerAdmin');
	}
	public function searchdatawarna()
	{
		$begin = $this->input->post('begin');

		$data = $this->ProdukModel->getListWarna($begin);

		echo json_encode($data);
		
	}
	public function detail($id)
	{
		$data['data'] = $this->ProdukModel->getdetailWarna($id);
		$this->load->view('headerAdmin');
		$this->load->view('warna/detailwarnaadmin',$data);
		$this->load->view('footerAdmin');
	}
	public function TambahWarna()
	{
		$this->load->view('headerAdmin');
		$this->load->view('warna/addwarna');
		$this->load->view('footerAdmin');
	}
	public function editwarna()
	{
		$id_warna = $this->input->post('id_warna');
		$warna_name = $this->input->post('warna_name');
		$this->ProdukModel->updateWarna($id_warna,$warna_name);
		
		
		$this->session->set_flashdata('alert', 'Berhasil Merubah Warna');
		redirect(base_url('WarnaAdmin/index'));
	}
	public function addwarna()
	{
		// $id_kategori = $this->input->post('id_kategori');
		$warna_name = $this->input->post('warna_name');
		$this->ProdukModel->insertwarna($warna_name);
		
		
		$this->session->set_flashdata('alert', 'Berhasil Menambahkan Warna');
		redirect(base_url('WarnaAdmin/index'));
	}
	public function addattachment($param)
  	{
  		$split = explode("~", $param);
  		$idsrt = $split[1];
  		if($split[0] == 0 && $idsrt == 0)
  		{
			$data = array('product_name' => "dummyProduct");
  			$queryinsertsrt = $this->ProdukModel->insertproduk($data);
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
		 			$queryinsertfile = $this->ProdukModel->insertfileattachment($dataimage);

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
						 $data = $this->ProdukModel->getListattachmentProduk($id_produk,$file);
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
		$listorder = $this->ProdukModel->getOrderdetailbyiddetailproduk($iddetail);
		if(count($listorder) > 0)
		{
			echo "Fail";
		}else{
			$this->ProdukModel->delete_detail_produk($iddetail);

			echo "Success";
		}
	}
	public function deleteprodukattachment(){
		$name = $this->input->post('name');
		$this->ProdukModel->delete_image_produk($name);		
		$filename = FCPATH."gambar_produk/".$name;
		// $filename = $target_dir.$_POST['name'];  
		unlink($filename); 
		exit;
	}
}
?>