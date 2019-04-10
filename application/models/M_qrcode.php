<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_qrcode extends CI_Model
{
	public function select_all()
	{

		$sql = "SELECT 
							qrcode.id_qrcode, 
							sertifikat.sert_sumber_benih,
							sertifikat.no_sertifikat, 
							label.jenis_benih,
							qrcode.volume,
							qrcode.hasil_lapang,
							qrcode.tgl,
							qrcode.foto_qrcode
								FROM qrcode 
						INNER JOIN sertifikat ON qrcode.id_sertifikat = sertifikat.id_sertifikat
						INNER JOIN label ON qrcode.id_label = label.id_label";

		$data = $this->db->query($sql);

		return $data->result();
	}

	//Tes Perubahan

	public function select_by_id($id)
	{
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
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih  WHERE id_qrcode = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_user()
	{
		$id = $this->session->userdata('id_produsen');
		$sql = "SELECT *
						FROM qrcode
						INNER JOIN sertifikat ON qrcode.id_sertifikat = sertifikat.id_sertifikat
						INNER JOIN label ON qrcode.id_label = label.id_label 
						INNER JOIN produsen ON sertifikat.id_produsen = produsen.id_produsen 
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih
						WHERE produsen.id_produsen =  $id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id_sertifikat($id)
	{
		$sql = "SELECT 
							qrcode.id_qrcode, 
							sertifikat.id_sertifikat,
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
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih  WHERE qrcode.id_sertifikat = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_field($field, $id)
	{
		$sql = "SELECT 
							qrcode.id_qrcode, 
							sertifikat.sert_sumber_benih,
							sertifikat.no_sertifikat,
							produsen.nama_perusahaan,
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
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih  WHERE {$field} = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data)
	{

		if (isset($data['id_sertifikat']));

		$sql =  "INSERT INTO qrcode 
								VALUES
									('',
										'" . $data['id_sertifikat'] . "', 
										'" . $data['id_label'] . "',
										'" . $data['volume'] . "',
										'" . $data['hasil_lapang'] . "',
										'" . $data['tgl'] . "',
										'" . $data['foto_qrcode'] . "')";

		if ($data['id_sertifikat'] == '') {
			$data['id_sertifikat'] = 'NULL';
		} else {
			$data['id_sertifikat'] = "'" . $data['id_sertifikat'] . "'";
		}

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data)
	{
		$this->db->insert_batch('qrcode', $data);

		return $this->db->affected_rows();
	}

	public function update($data)
	{

		$sql = "UPDATE qrcode 
							SET 
								id_sertifikat='" . $data['id_sertifikat'] . "', 
								id_label='" . $data['id_label'] . "',  
								foto_qrcode='" . $data['foto_qrcode'] . "'
							WHERE id_qrcode='" . $data['id_qrcode'] . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM qrcode WHERE id_qrcode='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama)
	{
		$this->db->where('nama', $nama);
		$data = $this->db->get('qrcode');

		return $data->num_rows();
	}

	public function total_rows()
	{
		$data = $this->db->get('qrcode');

		return $data->num_rows();
	}
}

/* End of file M_qrcode.php */
