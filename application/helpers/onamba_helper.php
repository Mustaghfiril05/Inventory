<?php

function is_logged_in()
{
	$ci = get_instance(); 
	if(!$ci->session->userdata('username')) {
		redirect('auth');
	} else {
		$id_rule = $ci->session->userdata('id_rule');
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->get_where('inventory_user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		$userAccess = $ci->db->get_where('inventory_user_askes_menu', [
            'id_rule' => $id_rule, 
            'menu_id' => $menu_id]);
		if($userAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}
}

function is_logged_iin()
{
	$ci = get_instance(); 
	if(!$ci->session->userdata('username')) {
		redirect('auth');
	} 
}

function cek_akses($id_rule, $menu_id)
{
	$ci = get_instance();

	$ci->db->where('id_rule', $id_rule);
	$ci->db->where('menu_id', $menu_id);
	$result = $ci->db->get('inventory_user_askes_menu');

	if($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

	function rupiah($angka){
		$hasil ="Rp " . number_format($angka, '2', ',', '.');
		return $hasil;
	}