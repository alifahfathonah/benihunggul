<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produsen extends AUTH_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_produsen');
	}

	public function index()
	{
		$data['userdata'] = $this->userdata;
		$data['dataProdusen'] = $this->M_produsen->select_all_produsen();

		$data['page'] = "produsen";
		$data['judul'] = "Data Produsen";
		$data['deskripsi'] = "Manage Data Produsen";

		$data['modal_tambah_produsen'] = show_my_modal('modals/modal_tambah_produsen', 'tambah-produsen', $data);

		$this->template->views('produsen/home', $data);
		// $this->load->view('templates_admin/header', $data);
		// $this->load->view('templates_admin/sidebar', $data);
		// $this->load->view('templates_admin/topbar', $data);
		// $this->load->view('produsen/home', $data);
		// $this->load->view('templates_admin/footer', $data);
	}

	public function tampil()
	{
		$data['dataProdusen'] = $this->M_produsen->select_all_produsen();
		$this->load->view('produsen/list_data', $data);
	}

	

	public function prosesTambah()
	{
		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required');
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('pimpinan', 'Nama Pimpinan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == true) {
			$result = $this->M_produsen->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Produsen Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Produsen Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update()
	{
		$id = trim($_POST['id']);

		$data['dataProdusen'] = $this->M_produsen->select_by_id($id);

		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_produsen', 'update-produsen', $data);
	}

	public function prosesUpdate()
	{
		$this->form_validation->set_rules('npwp', 'NPWP', 'trim|required');
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('pimpinan', 'Nama Pimpinan', 'trim|required');
		$this->form_validation->set_rules('alamat_perusahaan', 'Alamat Perusahaan', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == true) {
			$result = $this->M_produsen->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Produsen Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Produsen Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete()
	{
		$id = $_POST['id'];
		$result = $this->M_produsen->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Produsen Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Produsen Gagal dihapus', '20px');
		}
	}
}

/* End of file Produsen.php */
