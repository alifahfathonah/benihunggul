<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends AUTH_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('M_produsen');
		$this->load->model('M_benih');
		$this->load->model('M_sertifikat');
		$this->load->model('M_label');
		$this->load->library('template');
	}

	public function index()
	{

		$data['jml_produsen'] 			= $this->M_produsen->total_rows();
		$data['jml_benih'] 					= $this->M_benih->total_rows();
		$data['jml_sertifikat'] 		= $this->M_sertifikat->total_rows();

		$data['userdata'] 		= $this->userdata;

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

		$produsen 			= $this->M_produsen->select_all_produsen();
		$index = 0;
		foreach ($produsen as $value) {
			$color = '#' . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)] . $rand[rand(0, 15)];

			$jml_produsen = $this->M_produsen->total_rows();

			$data_produsen[$index]['value'] = $jml_produsen;
			$data_produsen[$index]['color'] = $color;
			$data_produsen[$index]['highlight'] = $color;
			$data_produsen[$index]['label'] = $value->nama_perusahaan;

			$index++;
		}

		$data['data_produsen'] = json_encode($data_produsen);

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Manage Data Benih Unggul";
		// $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		//$data['userdata'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		// $this->load->view('templates_admin/header', $data);
		// $this->load->view('templates_admin/sidebar', $data);
		// $this->load->view('templates_admin/topbar', $data);
		// $this->load->view('home', $data);
		// $this->load->view('templates_admin/footer', $data);
		$this->template->views('home', $data);
	}
}

/* End of file Home.php */
