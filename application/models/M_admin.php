<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
	public function update($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("admin", $data);

		return $this->db->affected_rows();
	}

	public function select($id = '')
	{
		if ($id != '') {
			$this->db->where('id', $id);
		}

		$data = $this->db->get('admin');

		return $data->row();
	}

	public function update_user($data, $id)
	{
		$this->db->where("id_produsen", $id);
		$this->db->update("produsen", $data);

		return $this->db->affected_rows();
	}

	public function select_user($id = '')
	{
		if ($id != '') {
			$this->db->where('id_produsen', $id);
		}

		$data = $this->db->get('produsen');

		return $data->row();
	}

	// public function update_profil($data, $id)
	// {
	// 	$this->db->where("id_produsen", $id);
	// 	$this->db->update("produsen", $data);

	// 	return $this->db->affected_rows();
	// }

	public function update_profil()
	{
		$data = [
			"npwp" => $this->input->post('npwp', true),
			"nama_perusahaan" => $this->input->post('nama_perusahaan', true),
			"pimpinan" => $this->input->post('pimpinan', true),
			"alamat_perusahaan" => $this->input->post('alamat_perusahaan', true),
			"jenis_usaha" => $this->input->post('jenis_usaha', true),
		];

		$this->db->where('id_produsen', $this->input->post('id_produsen'));
		$this->db->update('produsen', $data);
	}
}

/* End of file M_admin.php */
