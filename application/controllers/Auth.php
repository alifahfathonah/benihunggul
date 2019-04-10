<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->model('M_produsen');
		$this->load->library('form_validation');
		$this->load->library('form_validation', 'phppass/passwordhash');
	}

	public function index()
	{
		$data['dataProdusen'] = $this->M_produsen->select_all_produsen();
		// Cara Pak Dika ASLI!

		// $this->form_validation->set_rules('username', 'Username', 'trim|required');
		// $this->form_validation->set_rules('password', 'Password', 'trim|required');

		// if ($this->form_validation->run() == false) {
		// 	$this->load->view('login');
		// } else {
		// 	$this->_login();
		// }

		// Selesai Cara Pak Dika

		// CARA PAK DIKA MODIF

		// if ($this->form_validation->run() == false) {
		// 	$this->load->view('login');
		// } else {
		// 	$this->_login();
		// }
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('login');
		} else {
			// $this->loginkedua();
			$this->login();
			// redirect('Home');
		}

		// Aslinya!!
		// $session = $this->session->userdata('status');

		// if ($session == '') {
		// 	$this->load->view('login');
		// } else {
		// 	redirect('Home');
		// }
	}

	public function registration()
	{
		$data['dataProdusen'] = $this->M_produsen->select_all_produsen();

		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('nama', 'Nama Perusahaan', 'required|trim');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
			'matches' => 'Password tidak sama!',
			'min_length' => 'Password terlalu pendek!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
			'matches' => 'Password tidak sama!'
		]);

		if ($this->form_validation->run() == false) {
			$this->load->view('registration', $data);
		} else {
			$data = [
				'username'				=> htmlspecialchars($this->input->post('username', true)),
				'password'				=> md5($this->input->post('password1')),
				'nama'						=> htmlspecialchars($this->input->post('nama', true)),
				'foto'						=> 'default.jpg',
				'role_id' 				=> 2,
				'id_produsen'			=> $this->input->post('id_produsen')
			];

			$this->db->insert('admin', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Selamat! Anda berhasil membuat akun. Silahkan login!</div>');
			redirect('Auth');
		}
	}

	public function regis_produsen()
	{

		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required');
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('pimpinan', 'Nama Pimpinan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'trim|required');

		if ($this->form_validation->run() == false) {
			$this->load->view('regis_produsen');
		} else {
			$data = [
				'npwp'							=> $this->input->post('npwp', true),
				'nama_perusahaan'		=> $this->input->post('nama_perusahaan', true),
				'pimpinan'					=> $this->input->post('pimpinan', true),
				'alamat_perusahaan'	=> $this->input->post('alamat_perusahaan', true),
				'jenis_usaha' 			=> $this->input->post('jenis_usaha', true)
			];

			$this->db->insert('produsen', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Selamat! Data Perusahaan Anda telah terdaftar. Silahkan membuat akun!</div>');
			redirect('Auth/registration');
		}
	}

	public function tambah_produsen()
	{
		if (isset($_POST['submit'])) {
			$this->M_auth->tambah_produsen();
			redirect('Auth/login');
		} else {
			redirect('Auth/regis_produsen');
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true) {
			$username = trim($_POST['username']);
			$password = trim($_POST['password']);

			$data = $this->M_auth->login($username, $password);

			// Bacanya SELECT * FROM admin WHERE
			$role = $this->db->get_where('admin', ['username' => $username])->row_array();

			if ($data == false) {
				// $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				// 	Password salah!</div>');
				$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
				redirect('Auth');
			} else {
				$session = [
					'userdata' => $data,
					'status' => "Loged in",
					'id_produsen' =>$data->id_produsen
				];
				$this->session->set_userdata($session);
				if ($role['role_id'] == 1) {
					redirect('Home');
				} else {
					redirect('User');
				}
			}
		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
			redirect('Auth');
		}
	}

	//_LOGIN PAK DIKA ASLI

	// private function _login()
	// {
	// 	$username = $this->input->post('username');
	// 	$password = $this->input->post('password');

	// 	// Bacanya SELECT * FROM user WHERE
	// 	$user = $this->db->get_where('user', ['username' => $username])->row_array();

	// 	if ($user) {
	// 		// Usernya ada
	// 		if ($user['is_active'] == 1) {
	// 			if (password_verify($password, $user['password'])) {
	// 				$data = [
	// 					'username' => $user['username'],
	// 					'id_role' => $user['id_role']
	// 				];
	// 				$this->session->set_userdata($data);
	// 				redirect('home');
	// 				//redirect('user');
	// 			} else {
	// 				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	// 				Password salah!</div>');
	// 				redirect('auth');
	// 			}
	// 		} else {
	// 			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	// 		Email belum diaktivasi!</div>');
	// 			redirect('auth');
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	// 		Email belum pernah terdaftar!</div>');
	// 		redirect('auth');
	// 	}
	// }

	public function logout()
	{
		// $this->session->unset_userdata('username');
		// $this->session->unset_userdata('password');
		// $this->session->unset_userdata('status');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Kamu baru saja logout!</div>');
		$this->session->sess_destroy();
		redirect('Auth');
	}
}
