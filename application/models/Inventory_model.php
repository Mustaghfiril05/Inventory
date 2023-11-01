<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model {
	
	public function view_by_date($date){
		$query ="SELECT * FROM inventory_barang WHERE DATE(tanggal_pengiriman) = '$date'"; 
		return $this->db->query($query)->result_array();
	}
    
	public function view_by_month($month, $year){
		$query =" SELECT * FROM inventory_barang WHERE MONTH(tanggal_pengiriman) = '$month' AND YEAR(tanggal_pengiriman) = '$year'";
		return $this->db->query($query)->result_array();
	}
    
	public function view_by_year($year){
		$query =" SELECT * FROM inventory_barang WHERE YEAR(tanggal_pengiriman) = '$year'";
        return $this->db->query($query)->result_array();
	}

	public function view_by_kategori($kategori){
		$query =" SELECT * FROM inventory_barang WHERE kategori = '$kategori'";
        return $this->db->query($query)->result_array();
	}
    
	public function view_all($year){
		$query = " SELECT * FROM inventory_barang WHERE YEAR(tanggal_pengiriman) = '$year' ORDER BY id_barang DESC" ;
		return $this->db->query($query)->result_array(); 
	}
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal_pengiriman) AS tahun');
        $this->db->from('inventory_barang'); 
        $this->db->order_by('YEAR(tanggal_pengiriman)'); 
        $this->db->group_by('YEAR(tanggal_pengiriman)'); 
        return $this->db->get()->result(); 
    }

}