<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_sertifikat extends CI_Model
{
	public function select_all()
	{

		$sql = "SELECT 
							sertifikat.id_sertifikat, 
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
							benih.akhir_masa_edar
								FROM sertifikat 
						INNER JOIN produsen ON sertifikat.id_produsen = produsen.id_produsen 
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id)
	{
		$sql = "SELECT
							sertifikat.id_sertifikat, 
							sertifikat.sert_sumber_benih,
							sertifikat.no_sertifikat, 
							sertifikat.id_benih, 
							produsen.nama_perusahaan, 
							sertifikat.pengawas,
							sertifikat.masa_berlaku, 
							benih.komoditi,
							benih.varietas_klon,
							benih.bulan_tanam,
							benih.tinggi,
							benih.jumlah_daun,
							benih.akhir_masa_edar,
							sertifikat.id_produsen
								FROM sertifikat
						INNER JOIN produsen ON sertifikat.id_produsen = produsen.id_produsen 
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih WHERE id_sertifikat = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_user()
	{
		$id = $this->session->userdata('id_produsen');
		$sql = "SELECT sertifikat.id_sertifikat, 
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
									benih.akhir_masa_edar 
						FROM sertifikat
						INNER JOIN produsen ON sertifikat.id_produsen = produsen.id_produsen
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih
						WHERE produsen.id_produsen =  $id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_profile()
	{
		$id = $this->session->userdata('id_produsen');
		$sql = "SELECT produsen.id_produsen,
							produsen.npwp,
							produsen.nama_perusahaan,
							produsen.pimpinan,
							produsen.alamat_perusahaan,
							produsen.jenis_usaha
						FROM sertifikat
						INNER JOIN admin ON sertifikat.id_produsen = admin.id_produsen
						INNER JOIN produsen ON sertifikat.id_produsen = produsen.id_produsen
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih
						WHERE produsen.id_produsen =  $id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function update_profil()
	{
		$id = $this->session->userdata('id_produsen');
		$data = [
			"npwp" => $this->input->post('npwp', true),
			"nama_perusahaan" => $this->input->post('nama_perusahaan', true),
			"pimpinan" => $this->input->post('pimpinan', true),
			"alamat_perusahaan" => $this->input->post('alamat_perusahaan', true),
			"jenis_usaha" => $this->input->post('jenis_usaha', true),
		];

		// $this->db->where('id_produsen', $this->input->post('id_produsen'));
		$this->db->where('id_produsen', $id);
		$this->db->update('produsen', $data);
	}

	public function select_benih()
	{
		$id = $this->session->userdata('id_produsen');
		$sql = "SELECT benih.id_benih,
									benih.komoditi,
									benih.varietas_klon,
									benih.bulan_tanam,
									benih.tinggi,
									benih.jumlah_daun,
									benih.akhir_masa_edar 
						FROM sertifikat
						INNER JOIN produsen ON sertifikat.id_produsen = produsen.id_produsen
						INNER JOIN benih ON sertifikat.id_benih = benih.id_benih
						WHERE produsen.id_produsen =  $id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data)
	{
		// $sql =  "INSERT INTO benih 
		// 						VALUES
		// 							('',
		// 								'" .$data['komoditi'] ."', 
		// 								'" .$data['varietas_klon'] ."', 
		// 								'" .$data['kelas_benih'] ."', 
		// 								'" .$data['bulan_tanam'] ."', 
		// 								'" .$data['tinggi'] ."', 
		// 								'" .$data['jumlah_daun'] ."', 
		// 								'" .$data['akhir_masa_edar'] ."');";

		// if($data['id_sertifikat'] == ''){
		// 	$data['id_sertifikat'] = 'NULL';
		// }
		// else{
		// 	$data['id_sertifikat'] = "'".$data['id_sertifikat']."'";
		// }


		if (isset($data['sert_sumber_benih'])) {
			$data['sert_sumber_benih'] = "'" . $data['sert_sumber_benih'] . "'";
		} else {
			$data['sert_sumber_benih'] = 'NULL';
		}

		$sql = "INSERT INTO sertifikat 
							VALUES
								('',
									" . $data['sert_sumber_benih'] . ",
									'" . $data['no_sertifikat'] . "',
									'" . $data['id_produsen'] . "',
									'" . $data['id_benih'] . "',
									'" . $data['pengawas'] . "',
									'" . $data['masa_berlaku'] . "');";

		$this->db->query($sql);
		//$this->db->query($sql2);

		return $this->db->affected_rows();
	}

	public function insert_batch($data)
	{
		$this->db->insert_batch('sertifikat', $data);

		return $this->db->affected_rows();
	}

	public function update($data)
	{

		// $sql = "UPDATE benih 
		// 					SET 
		// 						komoditi='" .$data['komoditi'] ."', 
		// 						varietas_klon='" .$data['varietas_klon'] ."', 
		// 						kelas_benih='" .$data['kelas_benih'] ."', 
		// 						bulan_tanam='" .$data['bulan_tanam'] ."', 
		// 						tinggi='" .$data['tinggi'] ."', 
		// 						jumlah_daun='" .$data['jumlah_daun'] ."', 
		// 						akhir_masa_edar='" .$data['akhir_masa_edar'] ."' 
		// 					WHERE id_benih='" .$data['id_benih'] ."'";

		// $sql2 = "UPDATE sertifikat 
		// 					SET 
		// 						sert_sumber_benih = ".$data['sert_sumber_benih'].",
		// 						no_sertifikat='" .$data['no_sertifikat'] ."', 
		// 						id_produsen = ".$data['id_produsen'].", 
		// 						pengawas = '" .$data['pengawas'] ."', 
		// 						masa_berlaku = '" .$data['masa_berlaku']." 
		// 					WHERE id_sertifikat='" .$data['id_sertifikat'] ."'";

		// UPDATE admin, admin_info SET admin.email='email', admin_info.alamat='alamat'
		// WHERE admin.id=admin_info.id AND admin_info.id = 7;

		if (isset($data['sert_sumber_benih'])) {
			$data['sert_sumber_benih'] = "'" . $data['sert_sumber_benih'] . "'";
		} else {
			$data['sert_sumber_benih'] = 'NULL';
		}

		$sql = "UPDATE sertifikat, benih, produsen 
						SET sertifikat.sert_sumber_benih = " . $data['sert_sumber_benih'] . ",
								sertifikat.no_sertifikat = '" . $data['no_sertifikat'] . "',
								sertifikat.id_produsen = " . $data['id_produsen'] . ",
								sertifikat.pengawas = '" . $data['pengawas'] . "',
								sertifikat.masa_berlaku = '" . $data['masa_berlaku'] . "',
								benih.komoditi = '" . $data['komoditi'] . "', 
								benih.varietas_klon = '" . $data['varietas_klon'] . "', 
								benih.bulan_tanam = '" . $data['bulan_tanam'] . "', 
								benih.tinggi = '" . $data['tinggi'] . "', 
								benih.jumlah_daun = '" . $data['jumlah_daun'] . "', 
								benih.akhir_masa_edar = '" . $data['akhir_masa_edar'] . "'
						WHERE sertifikat.id_benih = benih.id_benih
						AND sertifikat.id_produsen = produsen.id_produsen
						AND sertifikat.id_sertifikat = '" . $data['id_sertifikat'] . "'";

		// $sql = "UPDATE sertifikat 
		// 				SET sert_sumber_benih = ".$data['sert_sumber_benih'].",
		// 						no_sertifikat = '" .$data['no_sertifikat']."',
		// 						id_produsen = '" .$data['id_produsen'] ."',
		// 						id_benih = '" .$data['id_benih'] ."',
		// 						pengawas = '" .$data['pengawas'] ."',
		// 						masa_berlaku = '" .$data['masa_berlaku'] ."'
		// 				WHERE id_sertifikat = '" .$data['id_sertifikat']. "'";

		$this->db->query($sql);
		// $this->db->query($sql2);

		return $this->db->affected_rows();
	}

	public function delete($id)
	{
		$sql = "DELETE FROM sertifikat WHERE id_sertifikat='" . $id . "'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama)
	{
		$this->db->where('nama', $nama);
		$data = $this->db->get('sertifikat');

		return $data->num_rows();
	}

	public function total_rows()
	{
		$data = $this->db->get('sertifikat');

		return $data->num_rows();
	}

	public function total_rows_user()
	{
		$id = $this->session->userdata('id_produsen');
		$this->db->where('id_produsen', $id);
		$data = $this->db->get('sertifikat');

		return $data->num_rows();
	}
}

/* End of file M_sertifikat.php */
