<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
	public function login($user, $pass)
	{
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $user);
		$this->db->where('password', md5($pass));

		$data = $this->db->get();

		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}

	public function tambah_produsen()
	{
		$id_produsen				= $this->input->post('id_produsen');
		$npwp								= $this->input->post('npwp');
		$nama_perusahaan 		=	$this->input->post('nama_perusahaan');
		$pimpinan						= $this->input->post('pimpinan');
		$alamat_perusahaan 	=	$this->input->post('alamat_perusahaan');
		$jenis_usaha				= $this->input->post('jenis_usaha');

		$data = array(
			'npwp' => $npwp,
			'nama_perusahaan' => $nama_perusahaan,
			'pimpinan' => $pimpinan,
			'alamat_perusahaan' => $alamat_perusahaan,
			'jenis_usaha' => $jenis_usaha
		);

		$this->db->insert('produsen', $data);
	}
}

/* End of file M_auth.php */
