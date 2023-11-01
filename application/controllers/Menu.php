<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$data['title'] = 'Menu Management';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();
		$data['menu'] = $this->db->get('inventory_user_menu')->result_array();

		$this->form_validation->set_rules('menu','Menu','required');
		$this->form_validation->set_rules('alias','Alias','required');
		$this->form_validation->set_rules('icon','Icon','required');

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('menu/index', $data);
			$this->load->view('templates/dash_footer');
		} else {
			$data = [
				'menu' => htmlspecialchars($this->input->post('menu', true)),
				'alias' => htmlspecialchars($this->input->post('alias', true)),
				'icon' => htmlspecialchars($this->input->post('icon', true)),
			];

			$this->db->insert('inventory_user_menu', $data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Menu Added!</div>');
			redirect('menu');
		}
	}

	public function edit_menu($id = null)
	{
		$data['title'] = 'Edit Menu';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['menu'] = $this->db->get_where('inventory_user_menu', ['id' => $id])->row_array();

		$this->form_validation->set_rules('menu', 'Menu', 'required|trim');
		$this->form_validation->set_rules('alias', 'Alias', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('menu/edit_menu', $data);
			$this->load->view('templates/dash_footer');
		} else {
			$id = $this->input->post('id');
			$menu = $this->input->post('menu');
			$alias = $this->input->post('alias');
			$icon = $this->input->post('icon');

			$this->db->set('menu', $menu);
			$this->db->set('alias', $alias);
			$this->db->set('icon', $icon);
			$this->db->where('id', $id);
			$this->db->update('inventory_user_menu');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Edit Menu Success !</div>');
			redirect('Menu');
		}
	}

	public function hapus_menu($id)
	{		
		$data['menu'] = $this->db->get_where('inventory_user_menu', ['id' => $id])->row_array();
	
		$this->db->where('id',$id);
		$this->db->delete('inventory_user_menu');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Remove Menu Success!</div>');
			redirect('menu');


	}

	public function submenu()
	{
		$data['title'] = 'Submenu Management';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();
		$this->load->model('menu_model', 'menu');

		$data['submenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('inventory_user_menu')->result_array();

		$this->form_validation->set_rules('judul','Judul','required');
		$this->form_validation->set_rules('menu_id','Menu','required');
		$this->form_validation->set_rules('url','URL','required');

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('menu/submenu', $data);
			$this->load->view('templates/dash_footer');
		} else {

			$data = [
				'judul' => $this->input->post('judul'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'is_active' => $this->input->post('is_active')
			];
			$this->db->insert('inventory_user_sub_menu', $data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Submenu Added!</div>');
			redirect('menu/submenu');
		}
	}

	public function edit_submenu($id = null)
	{
		$data['title'] = 'Edit SubMenu';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['submenu'] = $this->db->get_where('inventory_user_sub_menu', ['id' => $id])->row_array();
		$data['menu'] = $this->db->get('inventory_user_menu')->result_array();

		$this->form_validation->set_rules('menu_id', 'Menu_id', 'required|trim');
		$this->form_validation->set_rules('judul', 'Judul', 'required|trim');
		$this->form_validation->set_rules('url', 'URL', 'required|trim');

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('menu/edit_submenu', $data);
			$this->load->view('templates/dash_footer');
		} else {
			$id = $this->input->post('id');
			$menu_id = $this->input->post('menu_id');
			$judul = $this->input->post('judul');
			$url = $this->input->post('url');

			$this->db->set('menu_id', $menu_id);
			$this->db->set('judul', $judul);
			$this->db->set('url', $url);
			$this->db->where('id', $id);
			$this->db->update('inventory_user_sub_menu');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Edit SubMenu Success !</div>');
			redirect('menu/submenu/');
		}
	}

	public function hapus_submenu($id)
	{		
		$data['submenu'] = $this->db->get_where('inventory_user_sub_menu', ['id' => $id])->row_array();
	
		$this->db->where('id',$id);
		$this->db->delete('inventory_user_sub_menu');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Remove SubMenu Success!</div>');
			redirect('menu/submenu/');


	}

	
}