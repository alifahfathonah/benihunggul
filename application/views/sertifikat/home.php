<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-sertifikat"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Sertifikat</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>Sertifikat Sumber Benih</th>
          <th>Nomor Sertifikat</th>
          <th>Nama Pemilik</th>
          <th>Komoditi</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-sertifikat">
        
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_sertifikat; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataSertifikat', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Sertifikat';
  $data['url'] = 'Sertifikat/import';
  echo show_my_modal('modals/modal_import', 'import-sertifikat', $data);
?>