<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding:0;">
      <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-label"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Label</button>
    </div>
    <!-- <div class="col-md-4">
      <button class="form-control btn btn-success" data-toggle="modal" data-target="#tambah-qrcode"><i class="glyphicon glyphicon-plus-sign"></i> Cetak QR Code</button>
    </div> -->
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th style="width:50px;">No</th>
          <th>Jenis Benih</th>
          <th>Warna</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-label"> 

      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_label; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataLabel', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Label';
  $data['url'] = 'Label/import';
  echo show_my_modal('modals/modal_import', 'import-label', $data);
?>