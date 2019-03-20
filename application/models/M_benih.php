<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_benih extends CI_Model {
	public function select_all() {
		$sql = "SELECT * FROM benih";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM benih WHERE id_benih = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$sql = "INSERT INTO benih 
						VALUES('','" .$data['komoditi'] ."', 
							'" .$data['varietas_klon'] ."', 
							'" .$data['bulan_tanam'] ."', 
							'" .$data['tinggi'] ."', 
							'" .$data['jumlah_daun'] ."', 
							'" .$data['akhir_masa_edar'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('benih', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE benih 
						SET komoditi='" .$data['komoditi'] ."', 
							varietas_klon='" .$data['varietas_klon'] ."', 
							bulan_tanam='" .$data['bulan_tanam'] ."', 
							tinggi='" .$data['tinggi'] ."', 
							jumlah_daun='" .$data['jumlah_daun'] ."', 
							akhir_masa_edar='" .$data['akhir_masa_edar'] ."' 
						WHERE id_benih='" .$data['id_benih'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM benih WHERE id_benih='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('benih');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('benih');

		return $data->num_rows();
	}
}

/* End of file M_benih.php */
/* Location: ./application/models/M_benih.php */