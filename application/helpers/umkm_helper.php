<?php

function cek_login()
{
	$ci = get_instance(); 
	if(!$ci->session->userdata('username')) {
		redirect('auth');
	} else {
		$id_rule = $ci->session->userdata('id_rule');
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
		$menu_id = $queryMenu['id'];

		$userAccess = $ci->db->get_where('user_akses_menu', ['id_rule' => $id_rule, 'menu_id' => $menu_id]);

		if($userAccess->num_rows() < 1) {
			redirect('auth/blocked');
		}
	}
}

function cek_akses($id_rule, $menu_id)
{
	$ci = get_instance();

	$ci->db->where('id_rule', $id_rule);
	$ci->db->where('menu_id', $menu_id);
	$result = $ci->db->get('user_akses_menu');

	if($result->num_rows() > 0) {
		return "checked='checked'";
	}
}