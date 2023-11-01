<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');

	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect('user');
		}

		$this->form_validation->set_rules('username','Username', 'trim|required');
		$this->form_validation->set_rules('password','Password', 'trim|required');

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Inventory Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->login();

		}
	}

	private function login()
	{
		$username = $this->input->post('username');
		// $badge = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('inventory_user',['username' => $username])->row_array();
		
		//jika usernya ada
		if($user){
			//jika usernya aktif
			if($user['aktif'] == 1) {
				//cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'username' => $user['username'],
						'id_rule' => $user['id_rule'],
						'id_user' => $user['id_user'],
						'email' => $user['email'],
					];
					$this->session->set_userdata($data);
					if($user['id_rule'] == 2 ){
						redirect('admin');
					} else {
						redirect('admin');

				}
				}else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong Password!</div>');
					redirect('auth');
					}
				}else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">This username has not been activated!</div>');
					redirect('auth');
					} 
		 }else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Username is not registered!</div>');
			redirect('auth');
		}
	
}

	public function register()
	{
		if ($this->session->userdata('username')) {
			redirect('user');
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[inventory_user.username]',[
			'is_unique' => 'This Nickname has already registered!',
		]);
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('telpon', 'Telpon', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[inventory_user.email]',[
			'is_unique' => 'This Email has already registered!',
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',[
			'matches' => 'password dont match!',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
		
		

		if( $this->form_validation->run() == false) {
			$data['title'] = 'Resgitrasi E-Onamba';
			$this->load->view('templates/regis_header', $data);
			$this->load->view('auth/register');
			$this->load->view('templates/auth_footer');
		} else {
			$email = $this->input->post('email', true);
			$data = [
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'email' => htmlspecialchars($email),
				'nama' => htmlspecialchars($this->input->post('nama', true)),	
				'telpon' => htmlspecialchars($this->input->post('telpon', true)),	
				'gambar' => 'default.jpg',
				'id_rule' => 2,
				'aktif' => 0,
				'tanggal_pembuatan' => time()
			];

			$username = $this->db->get_where('inventory_user', ['email' => $email])->row()->username;
			//token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' => $email,
				'token' => $token,
				'tanggal_pembuatan' => time()
			];
			

			$this->db->insert('inventory_user', $data);
			$this->db->insert('inventory_token', $user_token);
			$this->sent_mail($username, $token, 'verify');
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congratulation! <br> your account has been created. Please activated your email :)</div>');
			redirect('auth');
		}
	}

	public function verify()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('inventory_user', ['email' => $email])->row_array();

		if($user) { 
			$user_token = $this->db->get_where('inventory_token', ['token' => $token])->row_array();
				if($user_token) {
					if(time() - $user_token['tanggal_pembuatan'] < (60*60*24)){
						$this->db->set('aktif', 1);
						$this->db->where('email', $email);
						$this->db->update('inventory_user');
						$this->db->delete('inventory_token', ['email' => $email]);

						$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$email.' has been activated! please login.</div>');
						redirect('auth');
					} else {
						$this->db->delete('inventory_user', ['email' => $email]);
						$this->db->delete('inventory_token', ['email' => $email]);
						$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Token invalid.</div>');
					redirect('auth');
				}
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_rule');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth');

	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}

	public function sent_mail($username, $token, $type)
	{
		$this->load->library('phpmailer_library');
		$mail = $this->phpmailer_library->load();
		$mail->isSMTP();                                      
		$mail->Host = 'smtp.gmail.com';  
		$mail->SMTPAuth = true;                              
		$mail->Username = 'automail690@gmail.com';                 
		$mail->Password = 'wukh zmzt tzfr nadx';                           
		$mail->SMTPSecure = 'ssl';                            
		$mail->Port = 465;                                    
		$mail->isHTML(true); 	
	
	
		$mail->SMTPOptions = array(
				'ssl' => array(
				'verify_peer' => false,
				'verify_peer_name' => false,
				'allow_self_signed' => true
				)
				);
	//end custom code

		$mail->setFrom('teamesystem@gmail.com','Inventory');
		$mail->addAddress($this->input->post('email')); 
		$mail->addReplyTo($this->input->post('email'),'Inventory');
		
		if ($type == 'verify'){
		$mail->Subject = ('Account Verification | Inventory');
		$mail->Body    = ('Click this link to verify your account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activated</a>');
		} else if ($type == 'forgot') {
		$mail->Subject = ('Reset Password | Inventory');
		$mail->Body    = ('Click this link to Reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a></br>
		Username untuk anda login : <b>' . $username . '</b>');
		}

		if(!$mail->Send()) {
		//echo "Mailer Error: " . $mail->ErrorInfo;
		//echo $debug;
			 } else {
		//echo "Message has been sent";
		//echo $debug;
		}
	 
	}

	public function forgotPassword()
	{
	  $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

	  if($this->form_validation->run() == false){
		$data['title'] = 'Forgot Password';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/forgot-password');
		$this->load->view('templates/auth_footer');
	  } else {
		  $email = $this->input->post('email');
		  $user = $this->db->get_where('inventory_user', ['email' => $email, 'aktif' => 1])->row_array();
		  $username = $this->db->get_where('inventory_user', ['email' => $email])->row()->username;

		  if($user){ 
			  $token = base64_encode(random_bytes(32));
			  $user_token = [
				  'email' => $email,
				  'token' => $token,
				  'tanggal_pembuatan' => time()
			  ];

			  $this->db->insert('inventory_token', $user_token);
			  $this->sent_mail($username, $token, 'forgot');

			  $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Please check your email to reset password!</div>');
			  redirect('auth/forgotpassword');

		  } else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email is not registered or activated your account!</div>');
			redirect('auth/forgotpassword');
		  }
	  }
	}

	public function resetPassword()
	{
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$user = $this->db->get_where('inventory_user', ['email' => $email])->row_array();


		if($user) {
			$user_token = $this->db->get_where('inventory_token', ['token' => $token])->row_array();
			if($user_token){
				$this->session->set_userdata('reset_email', $email);
				$this->changepassword();
			} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
			redirect('auth');
		}
	}


	public function changePassword()
	{
		if(!$this->session->userdata('reset_email') ){
			redirect ('auth');
		}
		$this->load->helper('security');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]',[
			'matches' => 'password dont match!',
			'min_length' => 'password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
		if($this->form_validation->run() == false){
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change-password');
			$this->load->view('templates/auth_footer');
		} else {
			 $password = password_hash($this->input->post('password1'),
			 PASSWORD_DEFAULT);
			 $email = $this->session->userdata('reset_email');

			 $this->db->set('password', $password);
			 $this->db->where('email', $email);
			 $this->db->update('inventory_user');

			 $this->session->unset_userdata('reset_email');

			 $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Password has been changed! Please Login.</div>');
			 redirect('auth');
		}
	}
}
