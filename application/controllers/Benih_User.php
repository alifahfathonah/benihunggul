<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Benih_User extends AUTH_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_benih');
		$this->load->model('M_sertifikat');
		$this->load->library('template_user');
	}

	public function index()
	{
		$data['userdata'] 	= $this->userdata;
		// $data['dataBenih'] 	= $this->M_benih->select_all();
		$data['dataBenih'] 	= $this->M_sertifikat->select_benih();

		$data['page'] 		= "benih";
		$data['judul'] 		= "Data Benih";
		$data['deskripsi'] 	= "Manage Data Benih";

		$data['modal_tambah_benih_user'] = show_my_modal('modals/modal_tambah_benih_user', 'tambah-benih-user', $data);

		$this->template_user->views('benih_user/home', $data);
		// $this->load->view('templates_admin/header', $data);
		// $this->load->view('templates_admin/sidebar', $data);
		// $this->load->view('templates_admin/topbar', $data);
		// $this->load->view('benih/home', $data);
		// $this->load->view('templates_admin/footer', $data);
	}

	public function tampil()
	{
		$data['userdata'] 	= $this->userdata;

		$id 								= trim($_POST['id']);
		// $data['dataBenih'] 	= $this->M_benih->select_by_id($id);
		// $data['dataBenih'] = $this->M_benih->select_all();
		$data['dataBenih'] = $this->M_sertifikat->select_benih();
		$this->load->view('benih_user/list_data', $data);
	}

	public function prosesTambah()
	{
		$this->form_validation->set_rules('komoditi', 'Komoditas Benih', 'trim|required');
		$this->form_validation->set_rules('varietas_klon', 'Varietas atau Klon', 'trim|required');
		$this->form_validation->set_rules('bulan_tanam', 'Bulan Tanam', 'trim|required');
		$this->form_validation->set_rules('tinggi', 'Tinggi', 'trim|required');
		$this->form_validation->set_rules('jumlah_daun', 'Jumlah Daun', 'trim|required');
		$this->form_validation->set_rules('akhir_masa_edar', 'Akhir Masa Edar', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == true) {
			$result = $this->M_benih->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Benih Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Benih Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update()
	{
		$data['userdata'] 	= $this->userdata;

		$id 								= trim($_POST['id']);
		$data['dataBenih'] 	= $this->M_benih->select_by_id($id);

		echo show_my_modal('modals/modal_update_benih_user', 'update-benih-user', $data);
	}

	public function prosesUpdate()
	{
		$this->form_validation->set_rules('id_benih', 'Benih', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == true) {
			$result = $this->M_benih->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Benih Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Benih Gagal diupdate', '20px');
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
		$result = $this->M_benih->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Benih Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Benih Gagal dihapus', '20px');
		}
	}

	public function detail()
	{
		$data['userdata'] 	= $this->userdata;

		$id 								= trim($_POST['id']);
		$data['dataBenih'] 	= $this->M_benih->select_by_id($id);

		echo show_my_modal('modals/modal_detail_benih', 'detail-benih', $data);
	}
}

/* End of file Benih.php */
