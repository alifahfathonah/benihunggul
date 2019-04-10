<div class="msg" style="display:none;">
    <?php echo @$this->session->flashdata('msg'); ?>
</div>

<div class="box">
    <div class="box-header">
        <div class="col-md-12" style="padding: 0;">
            <button class="form-control btn btn-primary" data-toggle="modal" data-target="#tambah-benih-user"><i class="glyphicon glyphicon-plus-sign"></i> Tambah Data Benih</button>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <table id="list-data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Komoditi</th>
                    <th>Varietas/Klon</th>
                    <th>Akhir Masa Edar</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody id="data-benih-user">

            </tbody>
        </table>
    </div>
</div>

<?php echo $modal_tambah_benih_user; ?>

<div id="tempat-modal"></div>

<?php show_my_confirm('konfirmasiHapus', 'hapus-dataBenih-user', 'Hapus Data Ini?', 'Ya, Hapus Data Ini'); ?>
<?php
$data['judul'] = 'Benih';
$data['url'] = 'Benih/import';
echo show_my_modal('modals/modal_import', 'import-benih', $data);
?> 