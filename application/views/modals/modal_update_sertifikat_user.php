<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Sertifikat</h3>
  <form id="form-update-sertifikat-user" method="POST">
    <input type="hidden" name="id_sertifikat" value="<?php echo $dataSertifikat->id_sertifikat; ?>">

    <table class="table table-striped">

      <tr>

        <td>Sertifikat Sumber Benih</td>
        <td>:</td>
        <td> <?php echo combo_box_data_w_name($dataSemuaSertifikat, 'id_sertifikat', 'sert_sumber_benih', 'no_sertifikat', $dataSertifikat->sert_sumber_benih); ?></td>


      </tr>

      <tr>

        <td>Nomor Sertifikat</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Nomor Sertifikat" name="no_sertifikat" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->no_sertifikat; ?>"></td>

      </tr>

      <tr>

        <td>Pemilik</td>
        <td>:</td>
        <td><?php echo combo_box_data_produsen($dataProdusenUser, 'id_produsen', 'nama_perusahaan', $dataSertifikat->id_produsen); ?></td>

      </tr>

      <tr>

        <td>Pengawas</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Pengawas" name="pengawas" aria-describedby="sizing-addon2" value=" <?php echo $dataSertifikat->pengawas; ?>"></td>

      </tr>

      <tr>

        <td>Masa Berlaku Sertifikat</td>
        <td>:</td>
        <td> <input type="date" class="form-control" placeholder="Masa Berlaku Sertifikat" name="masa_berlaku" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->masa_berlaku; ?>"></td>

      </tr>

      <tr>

        <td>Komoditas</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Komoditas" name="komoditi" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->komoditi; ?>"></td>


      </tr>

      <tr>

        <td>Varietas/Klon</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Varietas/Klon" name="varietas_klon" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->varietas_klon; ?>"></td>

      </tr>

      <tr>

        <td>Bulan Tanam</td>
        <td>:</td>
        <td>
          <?php echo combo_box_bulan_tanam($dataSertifikat->bulan_tanam); ?>
        </td>

      </tr>

      <tr>

        <td>Tinggi (dalam cm)</td>
        <td>:</td>
        <td>
          <input type="number" step="any" class="form-control" placeholder="Tinggi" name="tinggi" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->tinggi; ?>">
        </td>

      </tr>

      <tr>

        <td>Jumlah Daun</td>
        <td>:</td>
        <td> <input type="number" class="form-control" placeholder="Jumlah Daun" name="jumlah_daun" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->jumlah_daun; ?>"></td>

      </tr>

      <tr>

        <td>Akhir Masa Edar Benih</td>
        <td>:</td>
        <td> <input type="date" class="form-control" placeholder="Akhir Masa Edar" name="akhir_masa_edar" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->akhir_masa_edar; ?>"></td>

      </tr>

    </table>

    <div class="form-group">
      <div class="col-md-12">
        <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
    <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <?php
      echo combo_box_data_w_name($dataSemuaSertifikat, 'id_sertifikat', 'sert_sumber_benih', 'no_sertifikat', $dataSertifikat->sert_sumber_benih);
      ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nomor Sertifikat" name="no_sertifikat" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->no_sertifikat; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-home"></i>
      </span>
      <?php
      echo combo_box_data_produsen($dataProdusen, 'id_produsen', 'nama_perusahaan', $dataSertifikat->id_produsen);
      ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-home"></i>
      </span>
      <?php
      echo combo_box_data_benih($dataBenih, 'id_benih', 'komoditi', $dataSertifikat->id_benih);
      ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Pengawas" name="pengawas" aria-describedby="sizing-addon2" value=" <?php echo $dataSertifikat->pengawas; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="date" class="form-control" placeholder="Masa Berlaku" name="masa_berlaku" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->masa_berlaku; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Komoditas" name="komoditi" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->komoditi; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Varietas/Klon" name="varietas_klon" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->varietas_klon; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <?php combo_box_bulan_tanam($dataSertifikat->bulan_tanam); ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="number" step="any" class="form-control" placeholder="Tinggi" name="tinggi" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->tinggi; ?>">
      <span class="input-group-addon" id="sizing-addon2">
        cm
      </span>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah Daun" name="jumlah_daun" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->jumlah_daun; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="date" class="form-control" placeholder="Akhir Masa Edar Benih" name="akhir_masa_edar" aria-describedby="sizing-addon2" value="<?php echo $dataSertifikat->akhir_masa_edar; ?>">
    </div> -->
  </form>
</div>

<script type="text/javascript">
  $(function() {
    $(".select2").select2();

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });
  });
</script>