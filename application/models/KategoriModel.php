<?php
class KategoriModel extends CI_Model
{
	
	function getListProduk()
	{
		$sql = "SELECT * from tm_product";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function getdetailProduk($id)
	{
		$sql = "SELECT * from tm_product WHERE id_product = '".$id."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function getdetailKategori($id)
	{
		$sql = "SELECT * from tm_category WHERE id_category = '".$id."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function getListDetailProduct($id)
	{
		$sql = "SELECT * from tm_produk_detail WHERE id_product = '".$id."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function getOrderdetailbyiddetailproduk($id)
	{
		$sql = "SELECT * from tr_order_detail WHERE id_product = '".$id."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function getListattachmentProduk($id_produk,$file){
		$sql = "SELECT * from tm_pictures WHERE id_product = '".$id_produk."' AND pictures = '".$file."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function delete_detail_produk($id)
	{
		$this->db->where('id_produk_detail', $id);
		$this->db->delete('tm_produk_detail'); 
		return true;
	}
	function delete_image_produk($name)
	{
		$this->db->where('pictures', $name);
		$this->db->delete('tm_pictures'); 
		return true;
	}
	function getListKategori()
	{
		$sql = "SELECT * from tm_category";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function getListSize()
	{
		$sql = "SELECT * from tm_size";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function getListColor()
	{
		$sql = "SELECT * from tm_color ORDER BY color_name";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function insertproduk($data)
	{
		$this->db->insert('tm_product', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
	public function insertprodukdetail($data)
	{
		$this->db->insert('tm_produk_detail', $data);
	}
	public function updateprodukdetail($id_detail_produk,$id_produk,$ukuran,$warna,$kategori,$qty,$harga)
	{
		$this->db->set('id_size', $ukuran);
		$this->db->set('id_color', $warna);
		$this->db->set('id_category', $kategori);
		$this->db->set('qty', $qty);
		$this->db->set('price', $harga);
		$this->db->set('id_product', $id_produk);
		$this->db->where('id_produk_detail', $id_detail_produk);
		$this->db->update('tm_produk_detail');
	}
	public function insertfileattachment($dataimage)
	{
		return $this->db->insert('tm_pictures', $dataimage);
		// $insert_id = $this->db->insert_id();

		// return  $insert_id;
	}
	public function updateproduk($id_produk,$produk_name,$deskripsi_lengkap,$deskripsi_singkat)
	{
		$this->db->set('product_name', $produk_name);
		$this->db->set('description', $deskripsi_lengkap);
		$this->db->set('short_description', $deskripsi_singkat);
		$this->db->where('id_product', $id_produk);
		$this->db->update('tm_product');

		return true;
	}
}
?>