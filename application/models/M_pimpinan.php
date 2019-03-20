<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pimpinan extends CI_Model {
	public function select_all_pimpinan() {
		$sql = "SELECT * FROM pimpinan";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_all() {
		$sql = "SELECT * FROM pimpinan";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
    $sql = "SELECT * FROM pimpinan WHERE id_pimpinan = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
  }
  
  public function select_by_status($status) {
    $sql = "SELECT * FROM pimpinan WHERE status = ".$status;

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function update($data) {
    $sql = "UPDATE pimpinan SET nama_pimpinan = '".$data['nama_pimpinan']."', status = ".$data['status']." WHERE id_pimpinan = ".$data['id_pimpinan'];

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM pimpinan WHERE id_pimpinan='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$sql = "INSERT INTO pimpinan VALUES('','" .$data['nama_pimpinan']."', ".$data['status']." )";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pimpinan', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama_perusahaan', $nama);
		$data = $this->db->get('pimpinan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pimpinan');

		return $data->num_rows();
	}
}

/* End of file M_pimpinan.php */
/* Location: ./application/models/M_pimpinan.php */