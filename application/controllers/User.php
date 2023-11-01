<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller 
{
	//  public function __construct()
	//  {
	//  	parent::__construct();
	//  	is_logged_in();
	//  }
	
	public function index()
	{
		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('inventory_user', ['email' => 
		$this->session->userdata('email')])->row_array();

		$data['userr'] = $this->db->get_where('inventory_user', ['username'])->row_array();
		
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('user/index', $data);
			$this->load->view('templates/dash_footer');
	}

	public function edit()
	{

		$data['title'] = 'Edit Profile';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
			$this->session->userdata('username')])->row_array();

			$this->form_validation->set_rules('email', 'Email');
			$this->form_validation->set_rules('telpon', 'Telpon');
			$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if($this->form_validation->run() == false) {
			$this->load->view('templates/dash_header', $data);
			$this->load->view('templates/dash_sidebar', $data);
			$this->load->view('templates/dash_topbar', $data);
			$this->load->view('user/edit', $data);
			$this->load->view('templates/dash_footer');
		} else {
			$username = $this->input->post('username');
			$email = $this->input->post('email');
			$telpon = $this->input->post('telpon');
			$nama = $this->input->post('nama');
			$upload_image = $_FILES['gambar']['name'];


			if ($upload_image) {
				$config['allowed_types'] = 'gif|jpg|png|pdf|jpeg|docx|doc|ppt|pptx|xls|xlsx|pdf|rar|zip';
				$config['max_size']	= '2048';
				$config['upload_path']	= './assets/img/profile/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar')) {
					$old_image = $data['user']['gambar'];
					if($old_image != 'default.jpg') {
						unlink(FCPATH . 'assets/img/profile/' . $old_image);
					}

					$new_image = $this->upload->data('file_name');
					$this->db->set('gambar', $new_image);
				} else {
					echo $this->upload->display_errors();
				}
			}
			// die($email);
			$this->db->where('username', $username);
			$this->db->set('email', $email);
			$this->db->set('nama', $nama);
			$this->db->set('telpon', $telpon);
			$this->db->update('inventory_user');

			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You Profile Has Been Updated!</div>');
			redirect('user');
		}

	}

	public function changepassword()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('inventory_user', ['username' => 
		$this->session->userdata('username')])->row_array();
		
		$this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
		$this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2', 'New Password', 'required|trim|min_length[8]|matches[new_password1]');

		if($this->form_validation->run() == false) {
		$this->load->view('templates/dash_header', $data);
		$this->load->view('templates/dash_sidebar', $data);
		$this->load->view('templates/dash_topbar', $data);
		$this->load->view('user/changepassword', $data);
		$this->load->view('templates/dash_footer');
		} else {
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password'])) {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Current Password!</div>');
				redirect('user/changepassword');
			} else {
				if($current_password == $new_password) {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">New Password Cannot Be The Same As Current Password!</div>');
					redirect('user/changepassword');
				} else {
					//password sudah ok
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);

					$this->db->set('password', $password_hash);
					$this->db->where('username', $this->session->userdata('username'));
					$this->db->update('inventory_user');

					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password Change!</div>');
				 	redirect('user/changepassword');
				}
			}

		}
	}
}