<?php

use PhpOffice\PhpSpreadsheet\Worksheet\Row;

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index($th="")
	{
		 $session = $this->session->get_userdata();
		$id_user = $session['id_user'];

		$data['title'] = 'Dashboard';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();
		$this->load->model('Dashboard_model');
		
		$op = $this->Dashboard_model->GetInventoryRetail($this->session->username)->row();
		$ip= $this->Dashboard_model->GetInventoryIndustry($this->session->username)->row();
		$cl= $this->Dashboard_model->GetInventoryTransport($this->session->username)->row();
		$rj= $this->Dashboard_model->GetInventoryMarine($this->session->username)->row();
		if (isset($op)) { $data['Retail'] = $op->jml; } else { $data['Retail'] = 0;}
		if (isset($ip)) { $data['Industry'] = $ip->jml; } else { $data['Industry'] = 0;}
		if (isset($cl)) { $data['Transport'] = $cl->jml; } else { $data['Transport'] = 0;}
		if (isset($rj)) { $data['Marine'] = $rj->jml; } else { $data['Marine'] = 0;}

		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/dash_footer');
	}


	public function rule()
	{
		$data['title'] = 'Rules';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();
		$data['rule'] = $this->db->get('inventory_rule')->result_array();

		$this->form_validation->set_rules('rule','Rule','required');

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('admin/rule', $data);
			$this->load->view('templates/dash_footer');
		} else {
			$this->db->insert('inventory_rule', ['rule' => $this->input->post('rule')]);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New rule Added!</div>');
			redirect('admin/rule');
		}
	}

	public function edit_rule($id_rule = null)
	{
		$data['title'] = 'Edit Rule';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['rule'] = $this->db->get_where('inventory_rule', ['id_rule' => $id_rule])->row_array();

		$this->form_validation->set_rules('rule', 'Rule', 'required|trim');

		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('admin/edit-rule', $data);
			$this->load->view('templates/dash_footer');
		} else {
			$id_rule = $this->input->post('id_rule');
			$rule = $this->input->post('rule');

			$this->db->set('rule', $rule);
			$this->db->where('id_rule', $id_rule);
			$this->db->update('inventory_rule');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Edit Role Success !</div>');
			redirect('admin/rule');
		}
	}

	public function hapus_rule($id_rule)
	{		
		$data['rule'] = $this->db->get_where('inventory_rule', ['id_rule' => $id_rule])->row_array();
	
		$this->db->where('id_rule',$id_rule);
		$this->db->delete('inventory_rule');

		$this->session->set_flashdata('message','<div class="alert alert-success" rule="alert">Success Remove rule !</div>');
			redirect('admin/rule');
	}

	public function ruleaccess($id_rule)
	{
		$data['title'] = 'Rule Access'; 
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();
		
		$data['rule'] = $this->db->get_where('inventory_rule', ['id_rule' => $id_rule])->row_array();

		// $this->db->where('id !=', 1); 
		$data['menu'] = $this->db->get('inventory_user_menu')->result_array();


		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_topbar', $data);
		$this->load->view('admin/rule-access', $data);
		$this->load->view('templates/dash_footer');
	} 
	
	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$id_rule = $this->input->post('ruleId');

		$data = [
			'id_rule' => $id_rule,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('inventory_user_askes_menu', $data);

		if($result->num_rows() < 1) {
			$this->db->insert('inventory_user_askes_menu', $data);
		} else {
			$this->db->delete('inventory_user_askes_menu', $data);
		} 

		$this->session->set_flashdata('message','<div class="alert alert-success" rule="alert">Access Change!</div>');
	}

	public function data_user()
	{
		$data['title'] = 'Data User';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();
		$this->load->model('user_model', 'rule');
		$this->load->model('user_postgre_model');

		$data['datauser'] = $this->rule->getDataUser();
		$data['datauser2'] = $this->user_postgre_model->userdata();
		$data['userr'] = $this->db->get('view_inventory_user')->result_array();
		$data['rule'] = $this->db->get('inventory_rule')->result_array();

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[inventory_user.username]',[
			'is_unique' => 'This Username has already registered!',]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[inventory_user.email]',[
			'is_unique' => 'This Email has already registered!',]);
		$this->form_validation->set_rules('id_rule', 'id_rule', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('telpon', 'Telpon', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
	
	
		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('admin/data_user', $data);
			$this->load->view('templates/dash_footer');
		} else {
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'telpon' => htmlspecialchars($this->input->post('telpon', true)),
				'gambar' => 'default.jpg',
				'id_rule' => htmlspecialchars($this->input->post('id_rule', true)),
				'aktif' => 1,
				'tanggal_pembuatan' => time()
			];
			// echo $this->db->last_query();die();
			$this->db->insert('inventory_user', $data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">New Data User Added!</div>');
			redirect('admin/data_user');
		}
	}

	public function edit_data_user($id = null)
	{
		$data['title'] = 'Edit Data User';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();

		$data['datauser'] = $this->db->get_where('inventory_user', ['id_user' => $id])->row_array();
		$data['rule'] = $this->db->get('inventory_rule')->result_array();

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('id_rule', 'Rule', 'required|trim');
	
		if($this->form_validation->run() ==false ) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('admin/edit_data_user', $data);
			$this->load->view('templates/dash_footer');
		} else {
			$id = $this->input->post('id_user');
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$nama = $this->input->post('nama');
			$id_rule = $this->input->post('id_rule');

			//cek jika ada gambar yang akan di upload
			$upload_image = $_FILES['nama']['name'];


			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|pdf|jpeg|docx|doc|ppt|pptx|xls|xlsx|pdf|rar|zip';
				$config['max_size']	= '2048';
				$config['upload_path']	= './assets/img/profile/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('nama')) {
					$old_image = $data['datauser']['nama'];
					if($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('nama', $new_image);
				} else {
					echo $this->upload->display_errors();
					die();
				}
			}

			$this->db->set('username', $username);
			$this->db->set('email', $email);
			$this->db->set('nama', $nama);
			$this->db->set('id_rule', $id_rule);
			$this->db->where('id_user', $id);
			$this->db->update('inventory_user');
			//echo $this->db->last_query();die();

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Edit User Success !</div>');
			redirect('admin/data_user');
		}
	}

	public function hapus_data_user($id)
	{		
		$data['datauser'] = $this->db->get_where('inventory_user', ['id_user' => $id])->row_array();
	

		$this->db->where('id_user',$id);
		$this->db->delete('inventory_user');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Success Remove User !</div>');
			redirect('admin/data_user');
	}
}