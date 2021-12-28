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
 		$this->load->view('fp/detail_product',$data);
 		$this->load->view('footer');
	} 	
	 public function addtocart()
	 {		 
		$userid = $this->session->userdata('id_user');
		$id_detail_produk = $this->input->post('id_detail_produk');
		$qty = $this->input->post('qty');
		$price = $this->input->post('price');
		$total = $this->input->post('total');
		
		$data=array(
			"id_detail_produk"=>$id_detail_produk,
			"id_user"=>$userid,
			"qty"=>$qty,
			"price"=>$price,
			"total_price"=>$total
		);
		$cekcart = $this->FPModel->getsameproductincart($id_detail_produk,$userid);
		if($cekcart == null)
		{
			if($this->FPModel->insertcart($data)){
				echo "success";
			}else{
				echo "fail";
			}
		}else{
			$qty += (int)$cekcart['qty'];
			// $price += (int)$cekcart['price'];
			$total += (int)$cekcart['total_price'];
			if($this->FPModel->updatecart($cekcart['id_cart'],$qty,$total)){
				echo "success";
			}else{
				echo "fail";
			}
		}
	 }
	 public function cart()
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
		$data['cartjson'] = json_encode($datacartreal);

		$this->load->view('header',$data);
 		$this->load->view('fp/cart',$data);
 		$this->load->view('footer');
	 }
	 public function updatecart(){
		 $id_cart = $this->input->post('id_cart');
		 $qty = $this->input->post('qty');
		 $total = $this->input->post('total');
		 if($this->FPModel->updatecart($id_cart,$qty,$total)){
			 echo "success";
		 }else{
			 echo "fail";
		 }
	 }
	 public function deletecart(){
		$id_cart = $this->input->post('id_cart');
		if($this->FPModel->deletecart($id_cart)){
			echo "success";
		}else{
			echo "fail";
		}
	}
	public function checkout()
	 {
		if (!$this->session->userdata('id_user')) {
 			redirect(base_url('Account/Login'));
 		}
		$userid = $this->session->userdata('id_user');
		$datacartreal = array();
		$datacart = $this->FPModel->getcartbyuserid($userid);
		$dataaddress = $this->FPModel->getdefaultaddressbyuserId($userid);
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
		$data['address'] = $dataaddress;

		$this->load->view('header',$data);
 		$this->load->view('fp/checkout',$data);
 		$this->load->view('footer');
	 }	 
	 public function getprovince(){
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"key: 8a58e6ef6593bb0092fc4949539f95f5"
		  ),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	 }
	 public function getcity(){
		 $id_province = $this->input->post('id_province');
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_province,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"key: 8a58e6ef6593bb0092fc4949539f95f5"
		  ),
		));
		
		$response = curl_exec($curl);
		$err = curl_error($curl);
		
		curl_close($curl);
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
	 }
	 public function cekongkir(){
		$id_from = 418;
		$id_to = $this->input->post('id_to');
		$courier = $this->input->post('courier');
		$qty = $this->input->post('qty');
		$berat = (int)$qty * 100;
	   $curl = curl_init();

	   curl_setopt_array($curl, array(
		 CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		 CURLOPT_RETURNTRANSFER => true,
		 CURLOPT_ENCODING => "",
		 CURLOPT_MAXREDIRS => 10,
		 CURLOPT_TIMEOUT => 30,
		 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		 CURLOPT_CUSTOMREQUEST => "POST",
		 CURLOPT_POSTFIELDS => "origin=".$id_from."&destination=".$id_to."&weight=".$berat."&courier=".$courier."",
		 CURLOPT_HTTPHEADER => array(
		   "content-type: application/x-www-form-urlencoded",
		   "key: 8a58e6ef6593bb0092fc4949539f95f5"
		 ),
	   ));
	   
	   $response = curl_exec($curl);
	   $err = curl_error($curl);
	   
	   curl_close($curl);
	   
	   if ($err) {
		 echo "cURL Error #:" . $err;
	   } else {
		 echo $response;
	   }
	}
	public function AddOrder(){
		
		$userid = $this->session->userdata('id_user');
		
		// $this->FPModel->updateqtyproduk($userid);
		// die('asd');
		$randomnumber = random_int(100000000, 999999999);
		$datenow = date('Ymd');
		$datenowinsert = date('Y-m-d H:i:s');
		$order_no = "INV/".$datenow."/HJB/".$randomnumber;
		$ongkir_value = $this->input->post('ongkir_value');
		$bank_name = $this->input->post('bank_name');
		$bank_acc_name = $this->input->post('bank_acc_name');
		$bank_acc_number = $this->input->post('bank_acc_number');
		$courier = $this->input->post('courier');
		$id_address = $this->input->post('id_address');
		$total_all = $this->input->post('total_all');
		$service_value = $this->input->post('service_value');
		$data = array(
			"order_no" => $order_no,
			"order_date" => $datenowinsert,
			"account_number" => $bank_acc_number,
			"bank_name" => $bank_name,
			"account_name" => $bank_acc_name,
			"id_address" => $id_address,
			"delivery_courier" => $courier,
			"service_name" => $service_value,
			"ongkir" => $ongkir_value,
			"total_pembayaran" => $total_all,
			"status" => 0,
			"id_user"=>$userid
		);
		$insert = $this->FPModel->insertheaderorder($data);
		$this->FPModel->insertdetailorder($userid,$insert);
		$this->FPModel->updateqtyproduk($userid);
		$this->FPModel->updatestatuscart($userid);

		redirect('Home/confirmation/'.$insert);

	}
	public function confirmation($id_order){
		if (!$this->session->userdata('id_user')) {
			redirect(base_url('Account/Login'));
		}
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
		$data['orderdetail'] = $this->FPModel->getorderdetail($id_order,$userid);
		$data['id_order'] = $id_order;

		$this->load->view('header',$data);
 		$this->load->view('fp/confirmation',$data);
 		$this->load->view('footer');
	}
	public function UploadImageConfirm(){
		$id_order = $this->input->post('id_order');		
		$datenowinsert = date('Y-m-d H:i:s');
		// var_dump($_FILES['userfile']);die();

		if (isset($_FILES['userfile']) && !empty($_FILES['userfile'])) {
			//$num_file = count($_FILES['file']['name']);
			$filenamepertama = $_FILES['userfile']['name'];
		//    print_r($filenamepertama);die(); 
		   //print_r($_FILES['files']['name'][0]);die();
		   if($filenamepertama != '' && $filenamepertama != NULL)//> 1)dirubah
		   {
		   //print_r($filenamepertama);die(); 
		  //$max_allowed_file_size = 15360; // size in KB 
			   $message = '';
		  // for($f = 0; $f < $num_file; $f++){
			  $randomnumber = random_int(100000, 999999);
			   $new_file_name = $id_order."_".$randomnumber;

			   $_FILES['file']['name'] = $_FILES['userfile']['name'];
			   $_FILES['file']['type'] = $_FILES['userfile']['type'];
			   $_FILES['file']['tmp_name'] = $_FILES['userfile']['tmp_name'];
			   $_FILES['file']['error'] = $_FILES['userfile']['error'];
			   $_FILES['file']['size'] = $_FILES['userfile']['size'];

			   $config['upload_path']          = FCPATH.'gambar_confirm/';
			   $config['file_name']			   = $new_file_name;
			   $config['allowed_types']        = 'jpg|png|PNG|JPG|JPEG|jpeg';
			   $config['max_size']             = 15360;

			  //print_r($_FILES['files']['name'][$f]);die();

			   $this->upload->initialize($config);
			   if ($this->upload->do_upload('file')){
				   $process = $this->upload->data("file_name");
				   $nmfile = $process;
				  $dataimage = array(
					  "payment_date" => $datenowinsert,
					  "payment_picture" => $nmfile,
					  "status" => 1
				  );
				   $queryinsertfile = $this->FPModel->updateorder($dataimage,$id_order);

			   }else{
				   $error = $this->upload->display_errors();
				  //$this->session->set_flashdata('errorUpload', $error);
				   print_r($error);die();
				  //redirect(base_url('outbox/Newmail'));
			   }

		  // }
		   }
	  }
	  redirect('Home/Confirmation/'.$id_order);

	}
	public function TerimaPaket()
	{
		$id_order=$this->input->post('id_order');	
		// $datenowinsert = date('Y-m-d H:i:s');
		$data = array(
			"status"=>4
		);
		$this->FPModel->updateorder($data,$id_order);
		// $this->session->set_flashdata('alert', 'Berhasil Mengkonfirmasi Order');
		redirect('Home/confirmation/'.$id_order);
	}
 }
 ?>
