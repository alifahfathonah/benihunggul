<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Label extends AUTH_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_label');
	}

	public function index()
	{
		$data['userdata'] 	= $this->userdata;
		$data['dataLabel'] = $this->M_label->select_all();

		$data['page'] 		= "label";
		$data['judul'] 		= "Data Label";
		$data['deskripsi'] 	= "Manage Data Label";

		$data['modal_tambah_label'] = show_my_modal('modals/modal_tambah_label', 'tambah-label', $data);

		$this->template->views('label/home', $data);
		// $this->load->view('templates_admin/header', $data);
		// $this->load->view('templates_admin/sidebar', $data);
		// $this->load->view('templates_admin/topbar', $data);
		// $this->load->view('label/home', $data);
		// $this->load->view('templates_admin/footer', $data);
	}

	public function tampil()
	{
		$data['dataLabel'] = $this->M_label->select_all();
		$this->load->view('label/list_data', $data);
	}

	public function prosesTambah()
	{
		$this->form_validation->set_rules('jenis_benih', 'jenis benih', 'trim|required');
		$this->form_validation->set_rules('warna', 'warna', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == true) {
			$result = $this->M_label->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Label Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Label Gagal ditambahkan', '20px');
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
		$data['dataLabel'] 	= $this->M_label->select_by_id($id);

		echo show_my_modal('modals/modal_update_label', 'update-label', $data);
	}

	public function prosesUpdate()
	{
		$this->form_validation->set_rules('id_label', 'id label', 'trim|required');

		/* echo json_encode($this->input->post());
		exit(); */

		$data 	= $this->input->post();
		if ($this->form_validation->run() == true) {
			$result = $this->M_label->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data Label Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data Label Gagal diupdate', '20px');
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
		$result = $this->M_label->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data Label Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data Label Gagal dihapus', '20px');
		}
	}

	public function detail()
	{
		$data['userdata'] 	= $this->userdata;

		$id 								= trim($_POST['id']);
		$data['label'] 			= $this->M_label->select_by_id($id);
		//$data['dataLabel'] 	= $this->M_label->select_by_benih($id);

		$data['dataLabelLengkap'] = $this->M_label->select_by_qrcode($id);

		echo show_my_modal('modals/modal_detail_label', 'detail-label', $data, 'lg');
	}
}

/* End of file Label.php */
