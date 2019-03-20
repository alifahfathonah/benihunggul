<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Tambah Data QRCode</h3>

  <form id="form-tambah-qrcode" method="POST">
    
    <table class="table table-striped"> 

      <tr>  
        
        <td>Sertifikat</td>
        <td>:</td>
        <td> <?php echo combo_box_data_sertifikat($dataSertifikat, 'id_sertifikat', 'no_sertifikat');?></td>

      </tr>

      <tr>  
        
        <td>Label</td>
        <td>:</td>
        <td> <?php echo combo_box_data_label($dataLabel, 'id_label', 'jenis_benih');?></td>

      </tr>

      <tr>  
        
        <td>Volume</td>
        <td>:</td>
        <td> <input type="number" class="form-control" placeholder="Volume" name="volume" aria-describedby="sizing-addon2"></td>

      </tr>

      <tr>  
        
        <td>Hsl. Rik. Lap. No.</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Hsl. Rik. Lap. No." name="hasil_lapang" aria-describedby="sizing-addon2"></td>

      </tr>

      <tr>  
        
        <td>Tanggal Berakhir Label</td>
        <td>:</td>
        <td> <input type="date" class="form-control" placeholder="Tanggal Berakhir Label" name="tgl" aria-describedby="sizing-addon2"></td>

      </tr>

    </table> 
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>

    <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <?php 
        echo combo_box_data($dataSertifikat, 'id_sertifikat', 'no_sertifikat');
      ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <?php 
        echo combo_box_data($dataLabel, 'id_label', 'jenis_benih');
      ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="number" class="form-control" placeholder="Volume" name="volume" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-list-alt"></i>
      </span>
      <input type="text" class="form-control" placeholder="Hsl. Rik. Lap. No." name="hasil_lapang" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="date" class="form-control" placeholder="Tanggal Label" name="tgl" aria-describedby="sizing-addon2">
    </div> -->
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