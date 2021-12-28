<?php
class FPModel extends CI_Model
{
	public function gettwentyproduct(){
		$sql = "select * from tm_product as p
		inner join tm_pictures as pc
		on pc.id_product = p.id_product
		inner join tm_produk_detail pd
		on pd.id_product = p.id_product
		order by pd.price"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getproductbyId($id){
		$sql = "select * from tm_product where id_product = '".$id."'"; 
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function getdetailproductbyId($id){
		$sql = "select * from tm_produk_detail as pd
		inner join tm_size as s
			on pd.id_size = s.id_size
		inner join tm_color as c
			on pd.id_color = c.id_color
		inner join tm_category as cy
			on pd.id_category = cy.id_category
		where pd.id_product = '".$id."'"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getproductimagesbyId($id){
		$sql = "select * from tm_pictures where id_product = '".$id."'"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getcartbyuserid($id){
		$sql = "select *,c.qty as qtycart from tr_cart as c
				inner join tm_produk_detail as pd
					on c.id_detail_produk = pd.id_produk_detail
				inner join tm_product p
					on pd.id_product = p.id_product
				inner join tm_size as s
					on pd.id_size= s.id_size
				inner join tm_color as cl
					on pd.id_color = cl.id_color
				where c.id_user = '".$id."' and c.status = 0"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getsameproductincart($id,$iduser){
		$sql = "select * from tr_cart where id_detail_produk = '".$id."' AND id_user = '".$iduser."' and status = 0"; 
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function insertcart($data)
	{
		return $this->db->insert('tr_cart', $data);
	}
	public function updatecart($id_cart,$qty,$total){
		$this->db->set('qty', $qty);
		// $this->db->set('price', $price);
		$this->db->set('total_price', $total);
		$this->db->where('id_cart', $id_cart);
		$this->db->update('tr_cart');

		return true;
	}
	public function deletecart($id_cart){
		$this->db->set('status', 2);
		$this->db->where('id_cart', $id_cart);
		$this->db->update('tr_cart');

		return true;
	}
	public function getsingleproductimagesbyId($id){
		$sql = "select * from tm_produk_detail as pd 
				inner join tm_product as p
					on pd.id_product = p.id_product
				inner join tm_pictures as pc
					on p.id_product = pc.id_product
				where pd.id_produk_detail = '".$id."'"; 
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	
	public function getaddressbyuserId($id){
		$sql = "select * from tm_address where id_user = '".$id."' order by is_default desc"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getdefaultaddressbyuserId($id){
		$sql = "select * from tm_address where id_user = '".$id."' and is_default = 1"; 
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function getaddressbyId($id){
		$sql = "select * from tm_address where id_address = '".$id."'"; 
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	public function insertaddress($data)
	{
		return $this->db->insert('tm_address', $data);
	}
	public function updateisdefaultaddress($id_address,$userid){
		$this->db->set('is_default', 0);
		$this->db->where('id_user', $userid);
		$this->db->update('tm_address');

		$this->db->set('is_default', 1);
		$this->db->where('id_address', $id_address);
		$this->db->update('tm_address');

		return true;
	}
	public function updateaddress($id_address,$tag_address,$fullname,$phone,$province,$city,$zipcode,$address,$is_default)
	{
		$this->db->set('tag_address', $tag_address);
		$this->db->set('fullname', $fullname);
		$this->db->set('phone', $phone);
		$this->db->set('id_province', $province);
		$this->db->set('id_city', $city);
		$this->db->set('zipcode', $zipcode);
		$this->db->set('address', $address);
		$this->db->set('is_default', $is_default);
		$this->db->where('id_address', $id_address);
		$this->db->update('tm_address');
	}
	public function insertheaderorder($data)
	{
		$this->db->insert('tr_order', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
	public function insertdetailorder($userid,$order_id){
		$sql = "INSERT INTO tr_order_detail(id_order,id_product,qty,product_price,total)
				SELECT $order_id,id_detail_produk,qty,price,total_price
				from tr_cart where id_user = '$userid' and status = 0";
		$query = $this->db->query($sql);
		return $query;
	}
	public function updatestatuscart($userid){
		$this->db->set('status', 1);
		$this->db->where('id_user', $userid);
		$this->db->update('tr_cart');
		return true;
	}
	public function updateqtyproduk($userid)
	{
		$sql = "select * from tr_cart where id_user = '".$userid."' and status = 0"; 
		$query = $this->db->query($sql)->result_array();
		foreach($query as $item)
		{
			$sql = "select * from tm_produk_detail where id_produk_detail = '".$item['id_detail_produk']."'"; 
			$hasil = $this->db->query($sql)->row_array();
			$qty = (int)$hasil['qty'] - (int)$item['qty'];
			
			$this->db->set('qty', $qty);
			$this->db->where('id_produk_detail', $hasil['id_produk_detail']);
			$res = $this->db->update('tm_produk_detail');
			// print_r($res);die();
		}
		return true;
	}
	public function getorderneedconfirmByuserid($userid)
	{
		$sql = "select * from tr_order where id_user = '".$id."' and status = 0 order by order_date asc"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getorderdetail($id_order,$userid)
	{
		$sql = "select *,od.qty as qtyorder from tr_order as o 
				inner join tr_order_detail as od
					on o.id_order = od.id_order
				inner join tm_address as ad
					on o.id_address = ad.id_address
				inner join tm_province as p
					on ad.id_province = p.province_id
				inner join tm_cities as c
					on ad.id_city = c.city_id
				inner join tm_produk_detail as pd
					on od.id_product = pd.id_produk_detail
				inner join tm_product as pr
					on pd.id_product = pr.id_product
				inner join tm_size as s
					on pd.id_size = s.id_size
				inner join tm_color as cl
					on pd.id_color = cl.id_color
				inner join tm_category as cy
					on pd.id_category = cy.id_category
				where o.id_order = '".$id_order."' AND o.id_user = '".$userid."'"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function updateorder($data,$id_order){
		$this->db->set($data);
		$this->db->where('id_order', $id_order);
		$this->db->update('tr_order');
		return true;
	}
	public function getListorder($id_user){
		$sql = "SELECT * from tr_order where id_user = '".$id_user."' order by status asc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
}
?>