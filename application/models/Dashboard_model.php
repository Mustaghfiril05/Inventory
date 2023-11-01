<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

// View status
	function GetInventoryRetail($id_barang) {
		$this->db->select("count(id_barang) as jml");
		$this->db->from('inventory_barang');
		$this->db->where('kategori','Retail');
		return $this->db->get();
	}
	function GetInventoryIndustry($id_barang) {
		$this->db->select("count(id_barang) as jml");
		$this->db->from('inventory_barang');
		$this->db->where('kategori','Industry');
		return $this->db->get();
	}
	function GetInventoryTransport($id_barang) {
		$this->db->select("count(id_barang) as jml");
		$this->db->from('inventory_barang');
		$this->db->where('kategori','Transport');
		return $this->db->get();
	}
	function GetInventoryMarine($id_barang) {
		$this->db->select("count(id_barang) as jml");
		$this->db->from('inventory_barang');
		$this->db->where('kategori','Marine');
		return $this->db->get();
	}
}