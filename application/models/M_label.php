<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_label extends CI_Model {
	public function select_all() {
		$data = $this->db->get('label');

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM label WHERE id_label = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_benih($id) {
		$sql = " SELECT komoditi, varietas_klon FROM benih WHERE id_label={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_qrcode($id) {
		$sql = "SELECT 
							qrcode.id_qrcode, 
							sertifikat.sert_sumber_benih,
							sertifikat.no_sertifikat,
							produsen.nama_perusahaan,
							produsen.alamat_perusahaan,
							sertifikat.pengawas,
							sertifikat.masa_berlaku,
							benih.komoditi,
							benih.varietas_klon,
							benih.bulan_tanam,
							benih.tinggi,
							benih.jumlah_daun,
							benih.akhir_masa_edar,
							label.jenis_benih,
							label.warna,
							qrcode.volume,
							qrcode.hasil_lapang,
							qrcode.tgl,
							qrcode.foto_qrcode
								FROM qrcode 
						INNER JOIN sertifikat ON qrcode.id_sertifikat = sertifikat.id_sertifikat
						INNER JOIN label ON qrcode.id_label = label.id_label 
						INNER JOIN produsen ON sertifikat.id_produsen = produsen.id_produsen 
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih  WHERE label.id_label = '{$id}'";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		$sql = "INSERT INTO label VALUES('','" .$data['jenis_benih'] ."', '" .$data['warna'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('label', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE label 
						SET jenis_benih='" .$data['jenis_benih'] ."', 
							warna='" .$data['warna'] ."' 
						WHERE id_label='" .$data['id_label'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM label WHERE id_label='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('label');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('label');

		return $data->num_rows();
	}
}

/* End of file M_label.php */
/* Location: ./application/models/M_label.php */