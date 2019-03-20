<?php
	// MSG
	function show_msg($content='', $type='success', $icon='fa-info-circle', $size='14px') {
		if ($content != '') {
			return  '<p class="box-msg">
				      <div class="info-box alert-' .$type .'">
					      <div class="info-box-icon">
					      	<i class="fa ' .$icon .'"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_succ_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-success">
					      <div class="info-box-icon">
					      	<i class="fa fa-check-circle"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	function show_err_msg($content='', $size='14px') {
		if ($content != '') {
			return   '<p class="box-msg">
				      <div class="info-box alert-error">
					      <div class="info-box-icon">
					      	<i class="fa fa-warning"></i>
					      </div>
					      <div class="info-box-content" style="font-size:' .$size .'">
				        	' .$content
				      	.'</div>
					  </div>
				    </p>';
		}
	}

	// MODAL
	function show_my_modal($content='', $id='', $data='', $size='md') {
		$_ci = &get_instance();

		if ($content != '') {
			$view_content = $_ci->load->view($content, $data, TRUE);

			return '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-' .$size .'" role="document">
					    <div class="modal-content">
					        ' .$view_content .'
					    </div>
					  </div>
					</div>';
		}
	}

	function show_my_confirm($id='', $class='', $title='Konfirmasi', $yes = 'Ya', $no = 'Tidak') {
		$_ci = &get_instance();

		if ($id != '') {
			echo   '<div class="modal fade" id="' .$id .'" role="dialog">
					  <div class="modal-dialog modal-md" role="document">
					    <div class="modal-content">
					        <div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
						      <h3 style="display:block; text-align:center;">' .$title .'</h3>
						      
						      <div class="col-md-6">
						        <button class="form-control btn btn-primary ' .$class .'"> <i class="glyphicon glyphicon-ok-sign"></i> ' .$yes .'</button>
						      </div>
						      <div class="col-md-6">
						        <button class="form-control btn btn-danger" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> ' .$no .'</button>
						      </div>
						    </div>
					    </div>
					  </div>
					</div>';
		}
	}

	function konversiTanggal($tanggal, $jenis_tanggal = 'semua'){
		$tahun = substr($tanggal, 0, 4);

		if($jenis_tanggal == 'tahun')
			return $tahun;

		$bulan = substr($tanggal, 5, 2);

		if($jenis_tanggal == 'nilai-bulan')
			return $bulan;

		switch($bulan){
			case '01': $bulan = 'Januari'; break;
			case '02': $bulan = 'Februari'; break;
			case '03': $bulan = 'Maret'; break;
			case '04': $bulan = 'April'; break;
			case '05': $bulan = 'Mei'; break;
			case '06': $bulan = 'Juni'; break;
			case '07': $bulan = 'Juli'; break;
			case '08': $bulan = 'Agustus'; break;
			case '09': $bulan = 'September'; break;
			case '10': $bulan = 'Oktober'; break;
			case '11': $bulan = 'November'; break;
			case '12': $bulan = 'Desember'; break;
		}

		if($jenis_tanggal == 'bulan');
			return $bulan;

		$tanggalhari = str($tanggal, -2);

		if($jenis_tanggal === 'tanggal')
			return $tanggalhari;

		if($jenis_tanggal === 'semua')
			return $tahun.' '.$bulan.' '.$tanggalhari;
	}

	function konversiBulan($no_bulan){
		switch($no_bulan){
			case '01': $bulan = 'Januari'; break;
			case '02': $bulan = 'Februari'; break;
			case '03': $bulan = 'Maret'; break;
			case '04': $bulan = 'April'; break;
			case '05': $bulan = 'Mei'; break;
			case '06': $bulan = 'Juni'; break;
			case '07': $bulan = 'Juli'; break;
			case '08': $bulan = 'Agustus'; break;
			case '09': $bulan = 'September'; break;
			case '10': $bulan = 'Oktober'; break;
			case '11': $bulan = 'November'; break;
			case '12': $bulan = 'Desember'; break;
		}

		return $bulan;
	}

	function combo_box_bulan_tanam($bulan_tanam = NULL){
		$bulan2 = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];

		if($bulan_tanam == NULL)
			$jikakosong = 'selected';
		else
			$jikakosong = '';

		echo "<select class='form-control' name='bulan_tanam'>";
		echo "<option disabled ".$jikakosong.">Pilih Bulan Tanam</option>";
		foreach($bulan2 as $no => $bulan){
			if($bulan_tanam == $no)
				$jikasama = 'selected';
			else
				$jikasama = '';

			echo "<option value='".$no."' ".$jikasama.">".$bulan."</option>";
		}
		echo "</select>";
	}

	function combo_box_data($data, $value, $text, $selected = NULL){
		echo "<select class='form-control' name='".$value."'>";
		foreach($data as $datum){
			if($selected == $datum->$value)
				$terpilih = 'selected';
			else
				$terpilih = '';

			echo "<option value='".$datum->$value."' ".$terpilih.">".$datum->$text."</option>";
		}
		echo "</select>";
	}

	function combo_box_data_sertifikat($data, $value, $text, $selected = NULL){
		if($selected == NULL)
			$jikakosong = 'selected';
		else
			$jikakosong = '';
		
		echo "<select class='form-control' name='".$value."'>";
		echo "<option disabled ".$jikakosong.">Pilih Sertifikat</option>";
		foreach($data as $datum){
			if($selected == $datum->$value)
				$terpilih = 'selected';
			else
				$terpilih = '';

			echo "<option value='".$datum->$value."' ".$terpilih.">".$datum->$text."</option>";
		}
		echo "</select>";
	}

	function combo_box_data_label($data, $value, $text, $selected = NULL){
		if($selected == NULL)
			$jikakosong = 'selected';
		else
			$jikakosong = '';
		
		echo "<select class='form-control' name='".$value."'>";
		echo "<option disabled ".$jikakosong.">Pilih Label</option>";
		foreach($data as $datum){
			if($selected == $datum->$value)
				$terpilih = 'selected';
			else
				$terpilih = '';

			echo "<option value='".$datum->$value."' ".$terpilih.">".$datum->$text."</option>";
		}
		echo "</select>";
	}

	function combo_box_data_produsen($data, $value, $text, $selected = NULL){
		if($selected == NULL)
			$jikakosong = 'selected';
		else
			$jikakosong = '';
		
		echo "<select class='form-control' name='".$value."'>";
		echo "<option disabled ".$jikakosong.">Pilih Produsen</option>";
		foreach($data as $datum){
			if($selected == $datum->$value)
				$terpilih = 'selected';
			else
				$terpilih = '';

			echo "<option value='".$datum->$value."' ".$terpilih.">".$datum->$text."</option>";
		}
		echo "</select>";
	}

	function combo_box_data_benih($data, $value, $text, $selected = NULL){
		if($selected == NULL)
			$jikakosong = 'selected';
		else
			$jikakosong = '';
		
		echo "<select class='form-control' name='".$value."'>";
		echo "<option disabled ".$jikakosong.">Pilih Benih</option>";
		foreach($data as $datum){
			if($selected == $datum->$value)
				$terpilih = 'selected';
			else
				$terpilih = '';

			echo "<option value='".$datum->$value."' ".$terpilih.">".$datum->$text."</option>";
		}
		echo "</select>";
	}
	
	function combo_box_data_w_name($data, $value, $name, $text, $selected = NULL){
		if($selected == NULL)
			$jikakosong = 'selected';
		else
			$jikakosong = '';
		
			echo "<select class='form-control' name='".$name."'>";
			echo "<option disabled ".$jikakosong.">Pilih Sertifikat Sumber Benih</option>";
		foreach($data as $datum){
			if($selected == $datum->$value)
				$terpilih = 'selected';
			else
				$terpilih = '';

			echo "<option value='".$datum->$value."' ".$terpilih.">".$datum->$text."</option>";
		}
		echo "</select>";
	}

	function combo_box_data_sertif($data, $value, $text, $selected = NULL){
		echo "<select class='form-control' name='".$value."'>";
		foreach($data as $datum){
			if($selected == $datum->$value)
				$selected = 'selected';
			else
				$selected = '';

			echo "<option value='".$datum->$value."' ".$selected.">".$datum->$text."</option>";
		}
		echo "</select>";
	}
?>