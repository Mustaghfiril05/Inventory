<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu_model extends CI_Model
{

	public function getSubMenu()
	{

		$query = " SELECT * FROM view_inventory_sub_menu ";

		return $this->db->query($query)->result_array();
	}
	
}