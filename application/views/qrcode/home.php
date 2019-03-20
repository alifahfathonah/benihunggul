<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
        <button class="form-control btn btn-success" data-toggle="modal" data-target="#tambah-qrcode"><i class="glyphicon glyphicon-plus-sign"></i> Generate QR Code</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <!-- <th>Sertifikat Sumber Benih</th> -->
          <th>Nomor Sertifikat</th>
          <th>Label</th>
          <th>Volume</th>
          <th>Hsl. Rik. Lap. No.</th>
          <th>Tanggal</th>
          <th>QR Code</th>
          <th style="text-align: center; min-width: 150px;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-qrcode">
        
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_qrcode; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataQRCode', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'QR CODE';
  $data['url'] = 'QRCode/import';
  echo show_my_modal('modals/modal_import', 'import-qrcode', $data);
?>