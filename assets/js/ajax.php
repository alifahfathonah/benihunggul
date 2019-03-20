<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		  "paging": true,
		  "lengthChange": true,
		  "searching": true,
		  "ordering": true,
		  "info": true,
		  "autoWidth": false
		});

	window.onload = function() {
		tampilLabel();
		tampilProdusen();
		tampilBenih();
		tampilSertifikat();
		tampilQRCode();
		<?php
			if ($this->session->flashdata('msg') != '') {
				echo "effect_msg();";
			}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	//Label
	function tampilLabel() {
		$.get('<?php echo base_url('Label/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-label').html(data);
			refresh();
		});
	}

	var id_label;
	$(document).on("click", ".konfirmasiHapus-label", function() {
		id_label = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataLabel", function() {
		var id = id_label;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Label/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilLabel();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataLabel", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Label/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-label').modal('show');
		})
	})

	$(document).on("click", ".detail-dataLabel", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Label/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-label').modal('show');
		})
	})

	$('#form-tambah-label').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Label/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilLabel();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-label").reset();
				$('#tambah-label').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-label', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Label/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilLabel();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-label").reset();
				$('#update-label').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-label').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-label').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$(document).on("click", ".detail-dataLabel", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Label/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				  "paging": true,
				  "lengthChange": false,
				  "searching": true,
				  "ordering": true,
				  "info": true,
				  "autoWidth": false
				});
			$('#detail-label').modal('show');
		})
	})

	//Produsen
	function tampilProdusen() {
		$.get('<?php echo base_url('Produsen/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-produsen').html(data);
			refresh();
		});
	}

	var id_produsen;
	$(document).on("click", ".konfirmasiHapus-produsen", function() {
		id_produsen = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataProdusen", function() {
		var id = id_produsen;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Produsen/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilProdusen();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataProdusen", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Produsen/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-produsen').modal('show');
		})
	})

	$('#form-tambah-produsen').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Produsen/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProdusen();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-produsen").reset();
				$('#tambah-produsen').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-produsen', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Produsen/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilProdusen();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-produsen").reset();
				$('#update-produsen').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-produsen').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-produsen').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Benih
	function tampilBenih() {
		$.get('<?php echo base_url('Benih/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-benih').html(data);
			refresh();
		});
	}

	var id_benih;
	$(document).on("click", ".konfirmasiHapus-benih", function() {
		id_benih = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBenih", function() {
		var id = id_benih;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Benih/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilBenih();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataBenih", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Benih/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-benih').modal('show');
		})
	})

	$(document).on("click", ".detail-dataBenih", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Benih/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#detail-benih').modal('show');
		})
	})

	$('#form-tambah-benih').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Benih/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBenih();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-benih").reset();
				$('#tambah-benih').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-benih', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Benih/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBenih();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-benih").reset();
				$('#update-benih').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-benih').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-benih').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Sertifikat
	function tampilSertifikat() {
		$.get('<?php echo base_url('Sertifikat/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-sertifikat').html(data);
			refresh();
		});
	}

	var id_sertifikat;
	$(document).on("click", ".konfirmasiHapus-sertifikat", function() {
		id_sertifikat = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataSertifikat", function() {
		var id = id_sertifikat;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sertifikat/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilSertifikat();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataSertifikat", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sertifikat/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-sertifikat').modal('show');
		})
	})

	$('#form-tambah-sertifikat').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sertifikat/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSertifikat();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-sertifikat").reset();
				$('#tambah-sertifikat').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-sertifikat', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Sertifikat/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilSertifikat();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-sertifikat").reset();
				$('#update-sertifikat').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on("click", ".detail-dataSertifikat", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Sertifikat/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#detail-sertifikat').modal('show');
		})
	})

	$('#tambah-sertifikat').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-sertifikat').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//QR Code
	function tampilQRCode() {
		$.get('<?php echo base_url('QRCodeController/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-qrcode').html(data);
			refresh();
		});
	}

	var id_qrcode;
	$(document).on("click", ".konfirmasiHapus-qrcode", function() {
		id_qrcode = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataQRCode", function() {
		var id = id_qrcode;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('QRCodeController/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilQRCode();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataQRCode", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('QRCodeController/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-qrcode').modal('show');
		})
	})

	$(document).on("click", ".detail-dataqrcode", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('QRCodeController/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#detail-qrcode').modal('show');
		})
	})

	// $(document).on("click", ".detail-dataQRCode", function() {
	// 	var id = $(this).attr("data-id");
		
	// 	$.ajax({
	// 		method: "POST",
	// 		url: "<?php echo base_url('QRCodeController/detail'); ?>",
	// 		data: "id=" +id
	// 	})
	// 	.done(function(data) {
	// 		$('#tempat-modal').html(data);
	// 		$('#tabel-detail').dataTable({
	// 			  "paging": true,
	// 			  "lengthChange": false,
	// 			  "searching": true,
	// 			  "ordering": true,
	// 			  "info": true,
	// 			  "autoWidth": false
	// 			});
	// 		$('#detail-qrcode').modal('show');
	// 	})
	// })

	$('#form-tambah-qrcode').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('QRCodeController/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilQRCode();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-qrcode").reset();
				$('#tambah-qrcode').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-qrcode', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('QRCodeController/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilQRCode();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-qrcode").reset();
				$('#update-qrcode').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-qrcode').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-qrcode').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
</script>