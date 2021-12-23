<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriAdmin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('id_user') && $this->session->userdata('is_admin') == 0) {

			redirect(base_url('Account/Login'));
		}

	}
	public function index()
	{
		$this->load->view('headerAdmin');
		$this->load->view('kategori/kategoriadmin');
		$this->load->view('footerAdmin');
	}
	public function searchdatakategori()
	{
		$begin = $this->input->post('begin');
		$end = $this->input->post('end');

		$data = $this->ProdukModel->getListKategoris($begin);

		echo json_encode($data);
		
	}
	public function detail($id)
	{
		$data['data'] = $this->ProdukModel->getdetailKategori($id);
		$this->load->view('headerAdmin');
		$this->load->view('kategori/detailkategoriadmin',$data);
		$this->load->view('footerAdmin');
	}
	public function TambahKategori()
	{
		$this->load->view('headerAdmin');
		$this->load->view('kategori/addkategori');
		$this->load->view('footerAdmin');
	}
	public function addproduk()
	{
		$id_produk = $this->input->post('idresponseproduk');
		$produk_name = $this->input->post('produk_name');
		$deskripsi_singkat = $this->input->post('deskripsi_singkat');
		$deskripsi_lengkap = $this->input->post('deskripsi_lengkap');
		$kategori = $this->input->post('kategori');
		$ukuran = $this->input->post('ukuran');
		$warna = $this->input->post('warna');
		$qty = $this->input->post('qty');
		$harga = $this->input->post('harga');
		if($id_produk == 0)
		{
			$data = array(
				'product_name' => $produk_name,
				'description' => $deskripsi_lengkap,
				'short_description' => $deskripsi_singkat,
			);
  			$queryinsertsrt = $this->ProdukModel->insertproduk($data);
			$id_produk = $queryinsertsrt;
		}
		else{
			$data = array(
				'product_name' => $produk_name,
				'description' => $deskripsi_lengkap,
				'short_description' => $deskripsi_singkat,
			);
			$this->ProdukModel->updateproduk($id_produk,$produk_name,$deskripsi_lengkap,$deskripsi_singkat);
		}
		for($i=0;$i<count($kategori);$i++)
		{
			$data = array(
				'id_product' => $id_produk,
				'id_size' => $ukuran[$i],
				'id_color' => $warna[$i],
				'id_category' => $kategori[$i],
				'qty' => $qty[$i],
				'price' => $harga[$i],
			);

			$this->ProdukModel->insertprodukdetail($data);
		}
		$this->session->set_flashdata('alert', 'Berhasil Menambahkan Produk');
		redirect(base_url('ProdukAdmin/index'));
	}
	public function editproduk()
	{
		$id_produk = $this->input->post('idresponseproduk');
		$produk_name = $this->input->post('produk_name');
		$deskripsi_singkat = $this->input->post('deskripsi_singkat');
		$deskripsi_lengkap = $this->input->post('deskripsi_lengkap');
		$kategori = $this->input->post('kategori');
		$ukuran = $this->input->post('ukuran');
		$warna = $this->input->post('warna');
		$qty = $this->input->post('qty');
		$harga = $this->input->post('harga');
		$id_detail_produk = $this->input->post('id_produk_detail');
		// var_dump($id_detail_produk);die();
		if($id_produk == 0)
		{
			$data = array(
				'product_name' => $produk_name,
				'description' => $deskripsi_lengkap,
				'short_description' => $deskripsi_singkat
			);
  			$queryinsertsrt = $this->ProdukModel->insertproduk($data);
			$id_produk = $queryinsertsrt;
		}
		else{
			$data = array(
				'product_name' => $produk_name,
				'description' => $deskripsi_lengkap,
				'short_description' => $deskripsi_singkat
			);
			$this->ProdukModel->updateproduk($id_produk,$produk_name,$deskripsi_lengkap,$deskripsi_singkat);
		}
		for($i=0;$i<count($kategori);$i++)
		{
			if($id_detail_produk[$i] == 0)
			{
				$data = array(
					'id_product' => $id_produk,
					'id_size' => $ukuran[$i],
					'id_color' => $warna[$i],
					'id_category' => $kategori[$i],
					'qty' => $qty[$i],
					'price' => $harga[$i],
				);
	
				$this->ProdukModel->insertprodukdetail($data);
			}else{
				$this->ProdukModel->updateprodukdetail($id_detail_produk[$i],$id_produk,$ukuran[$i],$warna[$i],$kategori[$i],$qty[$i],$harga[$i]);
			}
			
		}
		$this->session->set_flashdata('alert', 'Berhasil Merubah Produk');
		redirect(base_url('ProdukAdmin/index'));
	}
	public function editkategori()
	{
		$id_kategori = $this->input->post('id_kategori');
		$kategori_name = $this->input->post('kategori_name');
		$this->ProdukModel->updatekategori($id_kategori,$kategori_name);
		
		
		$this->session->set_flashdata('alert', 'Berhasil Merubah Kategori');
		redirect(base_url('KategoriAdmin/index'));
	}
	public function addkategori()
	{
		// $id_kategori = $this->input->post('id_kategori');
		$kategori_name = $this->input->post('kategori_name');
		$this->ProdukModel->insertkategori($kategori_name);
		
		
		$this->session->set_flashdata('alert', 'Berhasil Menambahkan Kategori');
		redirect(base_url('KategoriAdmin/index'));
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