<?php
class OrderModel extends CI_Model
{
	public function getordertoday(){
		$sql = "SELECT * from tr_order where DATE(order_date) = '2021-12-29'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getorderneedconfirm(){
		$sql = "SELECT * from tr_order where status = 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getListorder($order_no,$status){
		$sql = "SELECT * from tr_order where order_no like '%".$order_no."%' and status like '%".$status."%' order by status asc";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function getdetailorder($id_order){
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
				where o.id_order = '".$id_order."'";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function updateorder($data,$id_order){
		$this->db->set($data);
		$this->db->where('id_order', $id_order);
		$this->db->update('tr_order');
		return true;
	}
}
?>