<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_produsen extends CI_Model
{
	public function select_all_produsen()
	{
		$sql = "SELECT * FROM produsen ";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id)
	{

		$sql = "SELECT * FROM produsen WHERE id_produsen = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_user()
	{
		$id = $this->session->userdata('id_produsen');
		$sql = "SELECT * FROM produsen WHERE id_produsen =  $id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function update($data)
	{
		$sql = "UPDATE produsen 
						SET npwp='" . $data['npwp'] . "', 
							nama_perusahaan='" . $data['nama_perusahaan'] . "', 
							pimpinan = '" . $data['pimpinan'] . "', 
							alamat_perusahaan='" . $data['alamat_perusahaan'] . "', 
							jenis_usaha='" . $data['jenis_usaha'] . "' 
						WHERE id_produsen='" . $data['id_produsen'] . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function update_profil($data, $id)
	{
		$this->db->where("id", $id);
		$this->db->update("produsen", $data);

		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM produsen WHERE id_produsen='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data)
	{
		$sql = "INSERT INTO produsen 
							VALUES('','" . $data['npwp'] . "',
												'" . $data['nama_perusahaan'] . "',
												'" . $data['pimpinan'] . "',
												'" . $data['alamat_perusahaan'] . "',
												'" . $data['jenis_usaha'] . "')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data)
	{
		$this->db->insert_batch('produsen', $data);

		return $this->db->affected_rows();
	}

	public function check_nama($nama)
	{
		$this->db->where('nama_perusahaan', $nama);
		$data = $this->db->get('produsen');

		return $data->num_rows();
	}

	public function total_rows()
	{
		$data = $this->db->get('produsen');

		return $data->num_rows();
	}

	public function total_rows_user()
	{
		$id = $this->session->userdata('id_produsen');
		$this->db->where('id_produsen', $id);
		$data = $this->db->get('produsen');

		return $data->num_rows();
	}
}

/* End of file M_produsen.php */
