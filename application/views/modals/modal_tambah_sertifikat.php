<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data Sertifikat</h3>

  <form id="form-tambah-sertifikat" method="POST">
    <table class="table table-striped"> 

      <tr>
        
        <td>Sertifikat Sumber Benih</td>
        <td>:</td>
        <td> <?php echo combo_box_data_w_name($dataSertifikat, 'id_sertifikat', 'sert_sumber_benih','no_sertifikat');?></td>


      </tr>

      <tr>  
        
        <td>Nomor Sertifikat</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Nomor Sertifikat" name="no_sertifikat" aria-describedby="sizing-addon2"></td>

      </tr>

      <tr>  
        
        <td>Pemilik</td>
        <td>:</td>
        <td>  <?php echo combo_box_data_produsen($dataProdusen, 'id_produsen', 'nama_perusahaan');?></td>

      </tr>

      <tr>  
        
        <td>Benih</td>
        <td>:</td>
        <td>  <?php echo combo_box_data_benih($dataBenih, 'id_benih', 'komoditi');?></td>

      </tr>

      <tr>  
        
        <td>Pengawas</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Pengawas" name="pengawas" aria-describedby="sizing-addon2"></td>

      </tr>

      <tr>  
        
        <td>Masa Berlaku</td>
        <td>:</td>
        <td> <input type="date" class="form-control" placeholder="Masa Berlaku Sertifikat" name="masa_berlaku" aria-describedby="sizing-addon2"></td>

      </tr>

    </table> 
    
    <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <?php 
        echo combo_box_data_w_name($dataSertifikat, 'id_sertifikat', 'sert_sumber_benih','no_sertifikat');
      ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nomor Sertifikat" name="no_sertifikat" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-home"></i>
      </span>
      <?php 
        echo combo_box_data_produsen($dataProdusen, 'id_produsen', 'nama_perusahaan');
      ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-home"></i>
      </span>
      <?php 
        echo combo_box_data_benih($dataBenih, 'id_benih', 'komoditi');
      ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Pengawas" name="pengawas" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="date" class="form-control" placeholder="Masa Berlaku" name="masa_berlaku" aria-describedby="sizing-addon2">
    </div> -->


    <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Komoditas" name="komoditi" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Varietas/Klon" name="varietas_klon" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Kelas Benih" name="kelas_benih" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <?php combo_box_bulan_tanam(); ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="number" step="any" class="form-control" placeholder="Tinggi" name="tinggi" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah Daun" name="jumlah_daun" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="date" class="form-control" placeholder="Akhir Masa Edar Benih" name="akhir_masa_edar" aria-describedby="sizing-addon2">
    </div> -->
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
  </form>
</div>


<script type="text/javascript">
$(function () {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
});
</script>