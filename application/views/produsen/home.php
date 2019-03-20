<div class="msg" style="display:none;">
  <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
  <div class="box-header">
    <div class="col-md-12" style="padding: 0;">
        <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-produsen"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Produsen</button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <table id="list-data" class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>NPWP</th>
          <th>Nama Perusahaan</th>
          <th>Nama Pimpinan</th>
          <th>Alamat Produsen</th>
          <th>Jenis Usaha</th>
          <th style="text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody id="data-produsen">
        
      </tbody>
    </table>
  </div>
</div>

<?php echo $modal_tambah_produsen; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataProdusen', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
  $data['judul'] = 'Produsen';
  $data['url'] = 'Produsen/import';
  echo show_my_modal('modals/modal_import', 'import-produsen', $data);
?>