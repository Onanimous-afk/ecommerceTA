<?php
class ProdukModel extends CI_Model
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
	function getdetailWarna($id)
	{
		$sql = "SELECT * from tm_color WHERE id_color = '".$id."'";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function getdetailUkuran($id)
	{
		$sql = "SELECT * from tm_size WHERE id_size = '".$id."'";
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
	function getListKategoris($begin)
	{
		$sql = "SELECT * from tm_category where category_name like '%".$begin."%'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function getListWarna($begin)
	{
		$sql = "SELECT * from tm_color where color_name like '%".$begin."%'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function getListKategori()
	{
		$sql = "SELECT * from tm_category";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function getListUkuran($begin)
	{
		$sql = "SELECT * from tm_size where size_name like '%".$begin."%'";
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
	public function updatekategori($id_kategori,$kategori_name){
		$this->db->set('category_name', $kategori_name);
		$this->db->where('id_category', $id_kategori);
		$this->db->update('tm_category');

		return true;
	}
	public function insertkategori($kategori_name){
		$this->db->set('category_name', $kategori_name);
		$this->db->insert('tm_category');
		return true;
	}
	public function updateukuran($id_size,$size_name){
		$this->db->set('size_name', $size_name);
		$this->db->where('id_size', $id_size);
		$this->db->update('tm_size');

		return true;
	}
	public function insertukuran($size_name){
		$this->db->set('size_name', $size_name);
		$this->db->insert('tm_size');
		return true;
	}
	public function updatewarna($id_warna,$warna_name){
		$this->db->set('color_name', $warna_name);
		$this->db->where('id_color', $id_warna);
		$this->db->update('tm_color');

		return true;
	}
	public function insertwarna($color_name){
		$this->db->set('color_name', $color_name);
		$this->db->insert('tm_color');
		return true;
	}
}
?>