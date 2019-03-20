<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QRCodeController extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
    $this->load->model('M_sertifikat');
    $this->load->model('M_label');
		$this->load->model('M_qrcode');
		$this->load->model('M_produsen');
		$this->load->model('M_pimpinan');
		$this->load->model('M_benih');
		$this->load->helper('string');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataQRCode'] = $this->M_qrcode->select_all();

		$data['page'] = "laman-qrcode";
		$data['judul'] = "Data QR Code";
		$data['deskripsi'] = "Manage Data QR Code";

		$data['dataSertifikat'] = $this->M_sertifikat->select_all();
		$data['dataLabel'] = $this->M_label->select_all();

		$data['modal_tambah_qrcode'] = show_my_modal('modals/modal_tambah_qrcode', 'tambah-qrcode', $data);

		$this->template->views('qrcode/home', $data);
	}

	public function tampil() {
		$data['dataQRCode'] = $this->M_qrcode->select_all();

		$data['modelSertif'] = $this->M_sertifikat;

		$this->load->view('qrcode/list_data', $data);
	}

	public function prosesTambah() {

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$data = $this->input->post();

		// echo json_encode($data);
		// exit();
		
		$dataSertifikat = $this->M_sertifikat->select_by_id($data['id_sertifikat']);
		$dataQrcode = $this->M_qrcode->select_by_id_sertifikat($data['id_sertifikat']);
		$sertSumberBenih = $this->M_sertifikat->select_by_id($dataSertifikat->id_sertifikat)->no_sertifikat;

		// echo json_encode($dataSertifikat->no_sertifikat);
		// exit();

		$dataBenih = $this->M_benih->select_by_id(
			$dataSertifikat->id_benih
		);
		$dataLabel = $this->M_label->select_by_id(
			$data['id_label']
		);

		$config['cacheable']	= true; //boolean, the default is true
		$config['cachedir']		= './assets/'; //string, the default is application/cache/
		$config['errorlog']		= './assets/'; //string, the default is application/logs/
		$config['imagedir']		= './assets/images/'; //direktori penyimpanan qr code
		$config['quality']		= true; //boolean, the default is true
		$config['size']			= '1024'; //interger, the default is 1024
		$config['black']		= array(224,255,255); // array, default is array(255,255,255)
		$config['white']		= array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$judul= random_string('md5', 16).'.png';

		$image_name=$judul;

		//$image_name=$dataSertifikat->id_sertifikat.'.png'; //buat name dari qr code sesuai dengan id sertifikat
	
		$data['foto_qrcode'] = $image_name;

		$params['data'] = 
			"Sertifikat Sumber Benih : ".$dataSertifikat->sert_sumber_benih."\r\n".
			"Nomor Sertifikat : ".$dataSertifikat->no_sertifikat."\r\n".
			// "Nama Pemilik : ".$this->M_pimpinan->select_by_id(
			// 	$this->M_produsen->select_by_id(
			// 		$dataSertifikat->id_produsen
			// 	)->id_pimpinan
			// )->nama_pimpinan."\r\n".
			"Nama Pemilik : ".$dataSertifikat->nama_perusahaan."\r\n".
			"Komoditas : ".$dataBenih->komoditi."\r\n".
			"Varietas/Klon : ".$dataBenih->varietas_klon."\r\n".
			"Bulan Tanam : ".konversiBulan($dataBenih->bulan_tanam)."\r\n".
			"Tinggi : ".$dataBenih->tinggi."\r\n".
			"Jumlah Daun : ".$dataBenih->jumlah_daun."\r\n".
			"Akhir Masa Edar : ".$dataBenih->akhir_masa_edar."\r\n".
			// "Pengawas : ".$dataSertifikat->pengawas."\r\n".
			"Masa Berlaku : ".$dataSertifikat->masa_berlaku."\r\n".
			"Label : ".$dataLabel->jenis_benih."\r\n".
			// "Warna Label : ".$dataLabel->warna."\r\n".
			"Volume : ".$data['volume']."\r\n".
			"Hsl. Rik. Lap. No. : ".$data['hasil_lapang']."\r\n".
			"Tanggal : ".$data['tgl'];
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

		$this->form_validation->set_rules('id_sertifikat', 'ID Sertifikat', 'trim|required');
    $this->form_validation->set_rules('id_label', 'ID Label', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_qrcode->insert($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('QR Code Berhasil dicetak', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('QR Code Tidak Berhasil dicetak', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$id = trim($_POST['id']);

		$data['dataSertifikat'] = $this->M_sertifikat->select_by_id($id);
		$data['dataKomoditas'] = $this->M_benih->select_all();
		$data['dataProdusen'] = $this->M_produsen->select_all();
		$data['userdata'] = $this->userdata;

		echo show_my_modal('modals/modal_update_sertifikat', 'update-sertifikat', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('no_sertifikat', 'No Sertifikat', 'trim|required');
		$this->form_validation->set_rules('id_produsen', 'Nama Pemilik', 'trim|required');
		$this->form_validation->set_rules('id_benih', 'Nama Benih', 'trim|required');
		$this->form_validation->set_rules('pengawas', 'Pengawas', 'trim|required');
		$this->form_validation->set_rules('masa_berlaku', 'Masa Berlaku', 'trim|required');

		$this->form_validation->set_rules('komoditi', 'Komoditas Benih', 'trim|required');
		$this->form_validation->set_rules('varietas_klon', 'Varietas atau Klon', 'trim|required');
		$this->form_validation->set_rules('kelas_benih', 'Kelas Benih', 'trim|required');
		$this->form_validation->set_rules('bulan_tanam', 'Bulan Tanam', 'trim|required');
		$this->form_validation->set_rules('tinggi', 'Tinggi', 'trim|required');
		$this->form_validation->set_rules('jumlah_daun', 'Jumlah Daun', 'trim|required');
		$this->form_validation->set_rules('akhir_masa_edar', 'Akhir Masa Edar', 'trim|required');
		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
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

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_qrcode->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data QR Code Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data QR Code Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 								= trim($_POST['id']);
		$data['dataQRCode'] 	= $this->M_qrcode->select_by_id($id);
		$data['modelSertifikat'] = $this->M_sertifikat;

		echo show_my_modal('modals/modal_detail_qrcode', 'detail-qrcode', $data);
	}
}