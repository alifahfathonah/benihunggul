<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_User extends AUTH_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_sertifikat');
		$this->load->library('template_user');
	}

	public function index()
	{
		$data['userdata'] 		= $this->userdata;
		$data['dataUser'] = $this->M_sertifikat->select_by_user();

		$data['page'] 			= "profile";
		$data['judul'] 			= "Profile";
		$data['deskripsi'] 		= "Setting Profile";
		$this->template_user->views('profile_user', $data);
	}

	public function update()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[15]');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$id = $this->userdata->id;
		$data = $this->input->post();
		if ($this->form_validation->run() == true) {
			$config['upload_path'] = './assets/img/';
			$config['allowed_types'] = 'jpg|png';

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data_foto = $this->upload->data();
				$data['foto'] = $data_foto['file_name'];
			}

			$result = $this->M_admin->update($data, $id);
			if ($result > 0) {
				$this->updateProfil();
				$this->session->set_flashdata('msg', show_succ_msg('Data Profile Berhasil diubah'));
				redirect('Profile_User');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
				redirect('Profile_User');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Profile_User');
		}
	}

	public function ubah_password()
	{
		$this->form_validation->set_rules('passLama', 'Password Lama', 'trim|required');
		$this->form_validation->set_rules('passBaru', 'Password Baru', 'trim|required');
		$this->form_validation->set_rules('passKonf', 'Password Konfirmasi', 'trim|required');

		$id = $this->userdata->id;
		if ($this->form_validation->run() == true) {
			if (md5($this->input->post('passLama')) == $this->userdata->password) {
				if ($this->input->post('passBaru') != $this->input->post('passKonf')) {
					$this->session->set_flashdata('msg', show_err_msg('Password Baru dan Konfirmasi Password harus sama'));
					redirect('Profile_User');
				} else {
					$data = [
						'password' => md5($this->input->post('passBaru'))
					];

					$result = $this->M_admin->update($data, $id);
					if ($result > 0) {
						$this->updateProfil();
						$this->session->set_flashdata('msg', show_succ_msg('Password Berhasil diubah'));
						redirect('Profile_User');
					} else {
						$this->session->set_flashdata('msg', show_err_msg('Password Gagal diubah'));
						redirect('Profile_User');
					}
				}
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Password Salah'));
				redirect('Profile_User');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Profile_User');
		}
	}

	public function update_profil()
	{
		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required');
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('pimpinan', 'Nama Pimpinan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'trim|required');

		$data['dataUser'] = $this->M_sertifikat->select_by_user();
		$id = $this->userdata->id;
		//$id_produsen = $this->userdata->id_produsen;
		$data = $this->input->post();
		if ($this->form_validation->run() == true) {

			$result = $this->M_admin->update_user($data, $id);
			if ($result > 0) {
				$this->updateProfilUser();
				$this->session->set_flashdata('msg', show_succ_msg('Data Profile Berhasil diubah'));
				redirect('Profile_User');
			} else {
				$this->session->set_flashdata('msg', show_err_msg('Data Profile Gagal diubah'));
				redirect('Profile_User');
			}
		} else {
			$this->session->set_flashdata('msg', show_err_msg(validation_errors()));
			redirect('Profile_User');
		}
	}

	// public function update_profil()
	// {
	// 	$id_produsen = $this->input->post('id_produsen');
	// 	$npwp = $this->input->post('npwp');
	// 	$nama_perusahaan = $this->input->post('nama_perusahaan');
	// 	$pimpinan = $this->input->post('pimpinan');
	// 	$alamat_perusahaan = $this->input->post('alamat_perusahaan');
	// 	$jenis_usaha = $this->input->post('jenis_usaha');

	// 	$data = array(
	// 		'npwp' => $npwp,
	// 		'nama_perusahaan' => $nama_perusahaan,
	// 		'pimpinan' => $pimpinan,
	// 		'alamat_perusahaan' => $alamat_perusahaan,
	// 		'jenis_usaha' => $jenis_usaha
	// 	);

	// 	$where = array(
	// 		'id_produsen' => $id_produsen
	// 	);

	// 	$this->m_data->update_data($where, $data, 'user');
	// 	redirect('Profile_User');
	// }

	public function update_profil_user($id)
	{
		$data['dataUser'] = $this->M_sertifikat->select_profile();

		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required');
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('pimpinan', 'Nama Pimpinan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'trim|required');

		if ($this->form_validation->run() == false) {
			redirect('Profile_User');
		} else {
			$this->Mahasiswa_model->ubahDataMahasiswa();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('mahasiswa');
		}
	}


	// public function updateProfil()
	// {
	// 	$this->M_admin->update_profil();
	// 	redirect('Profile_User');
	// }

	public function edit()
	{
		$id_produsen = $this->uri->segment(3);
		$data['query'] = $this->M_admin->edit($id_produsen);
		$this->load->view('profile_user', $data);
	}
}

/* End of file Profile.php */
