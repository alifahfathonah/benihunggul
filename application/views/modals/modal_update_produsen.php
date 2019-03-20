<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Produsen</h3>
  <form method="POST" id="form-update-produsen">
    <input type="hidden" name="id_produsen" value="<?php echo $dataProdusen->id_produsen; ?>">
    
    <table class="table table-striped"> 

      <tr>
        
        <td>NPWP</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="NPWP" name="npwp" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->npwp; ?>"></td>


      </tr>

      <tr>  
        
        <td>Nama Perusahaan</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama_perusahaan" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->nama_perusahaan; ?>"></td>

      </tr>

      <tr>  
        
        <td>Nama Pimpinan</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Nama Pimpinan Perusahaan" name="pimpinan" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->pimpinan; ?>"></td>

      </tr>

      <tr>  
        
        <td>Alamat Perusahaan</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Alamat Perusahaan" name="alamat_perusahaan" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->alamat_perusahaan; ?>"></td>

      </tr>

      <tr>  
        
        <td>Jenis Usaha</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Jenis Usaha" name="jenis_usaha" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->jenis_usaha; ?>"></td>

      </tr>

    </table> 
    
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
      </div>
    </div>
    <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-credit-card"></i>
      </span>
      <input type="text" class="form-control" placeholder="NPWP" name="npwp" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->npwp; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-home"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Produsen" name="nama_perusahaan" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->nama_perusahaan; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-home"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Pimpinan" name="pimpinan" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->pimpinan; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-globe"></i>
      </span>
      <input type="text" class="form-control" placeholder="Alamat Perusahaan" name="alamat_perusahaan" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->alamat_perusahaan; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-briefcase"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jenis Usaha" name="jenis_usaha" aria-describedby="sizing-addon2" value="<?php echo $dataProdusen->jenis_usaha; ?>">
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