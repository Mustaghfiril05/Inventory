<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model
{

	public function getDataUser()
	{

		$query = " SELECT inventory_user.*, inventory_rule.rule
				   FROM inventory_user JOIN inventory_rule
				   ON inventory_user.id_rule = inventory_rule.id_rule ";

		return $this->db->query($query)->result_array();
	}
	
}