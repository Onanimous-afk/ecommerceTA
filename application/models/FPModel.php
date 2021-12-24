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
		$sql = "select * from tr_order as o
				inner join tr_order_detail as od
					on o.id_order = od.id_order
				where o.id_user = '".$id."' and o.status = 0"; 
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
}
?>