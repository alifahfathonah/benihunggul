<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sertifikat_User extends AUTH_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_sertifikat');
		$this->load->model('M_produsen');
		$this->load->model('M_benih');
		$this->load->library('template_user');
	}

	public function index()
	{
		$data['userdata'] = $this->userdata;
		$data['dataSertifikat'] = $this->M_sertifikat->select_by_user();
		$data['dataSemuaSertifikat'] = $this->M_sertifikat->select_all();

		$data['page'] = "sertifikat";
		$data['judul'] = "Data Sertifikat";
		$data['deskripsi'] = "Manage Data Sertifikat";

		$data['dataBenih'] = $this->M_benih->select_all();
		$data['dataProdusen'] = $this->M_produsen->select_all_produsen();
		$data['dataProdusenUser'] = $this->M_produsen->select_by_user();

		$data['modal_tambah_sertifikat_user'] = show_my_modal('modals/modal_tambah_sertifikat_user', 'tambah-sertifikat-user', $data);

		$this->template_user->views('sertifikat_user/home', $data);
		// $this->load->view('templates_admin/header', $data);
		// $this->load->view('templates_admin/sidebar', $data);
		// $this->load->view('templates_admin/topbar', $data);
		// $this->load->view('sertifikat/home', $data);
		// $this->load->view('templates_admin/footer', $data);
	}

	public function tampil()
	{
		$data['dataSertifikat'] = $this->M_sertifikat->select_by_user();
		$data['dataSemuaSertifikat'] = $this->M_sertifikat->select_all();
		$data['modelSertif'] = $this->M_sertifikat;
		$this->load->view('sertifikat_user/list_data', $data);
	}

	public function prosesTambah()
	{
		$this->form_validation->set_rules('no_sertifikat', 'No Sertifikat', 'trim|required');
		$this->form_validation->set_rules('id_produsen', 'Nama Pemilik', 'trim|required');
		$this->form_validation->set_rules('id_benih', 'Benih', 'trim|required');
		$this->form_validation->set_rules('pengawas', 'Pengawas', 'trim|required');
		$this->form_validation->set_rules('masa_berlaku', 'Masa Berlaku', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == true) {
			$result = $this->M_sertifikat->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Sertifikat Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Sertifikat Gagal ditambahkan', '20px');
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

		$data['dataSertifikat'] = $this->M_sertifikat->select_by_id($id);
		$data['dataSemuaSertifikat'] = $this->M_sertifikat->select_all();
		$data['dataBenih'] = $this->M_benih->select_all();
		$data['dataProdusen'] = $this->M_produsen->select_all_produsen();
		$data['dataProdusenUser'] = $this->M_produsen->select_by_user();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_sertifikat_user', 'update-sertifikat-user', $data);
	}

	public function prosesUpdate()
	{
		$this->form_validation->set_rules('no_sertifikat', 'No Sertifikat', 'trim|required');
		$this->form_validation->set_rules('id_produsen', 'Nama Pemilik', 'trim|required');
		$this->form_validation->set_rules('komoditi', 'Komoditas', 'trim|required');
		$this->form_validation->set_rules('varietas_klon', 'Varietas/Klon', 'trim|required');
		$this->form_validation->set_rules('bulan_tanam', 'Bulan Tanam', 'trim|required');
		$this->form_validation->set_rules('tinggi', 'Tinggi', 'trim|required');
		$this->form_validation->set_rules('jumlah_daun', 'Jumlah Daun', 'trim|required');
		$this->form_validation->set_rules('akhir_masa_edar', 'Akhir Masa Edar', 'trim|required');
		$this->form_validation->set_rules('pengawas', 'Pengawas', 'trim|required');
		$this->form_validation->set_rules('masa_berlaku', 'Masa Berlaku', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == true) {
			$result = $this->M_sertifikat->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Sertifikat Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Sertifikat Gagal diupdate', '20px');
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
		$result = $this->M_sertifikat->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Sertifikat Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Sertifikat Gagal dihapus', '20px');
		}
	}

	public function detail()
	{
		$data['userdata'] 	= $this->userdata;

		$id 								= trim($_POST['id']);
		$data['dataSertifikat'] 	= $this->M_sertifikat->select_by_id($id);
		$data['modelSertifikat'] = $this->M_sertifikat;

		echo show_my_modal('modals/modal_detail_sertifikat', 'detail-sertifikat', $data);
	}
}

/* End of file Sertifikat.php */
