<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Detail Data Benih</h3>

  <form id="form-detail-benih" method="POST" >
    <input type="hidden" name="id" value="<?php echo $dataBenih->id_benih; ?>">

    <table class="table table-striped"> 
    
    <tr>
      
      <td>Komoditas</td>
      <td>:</td>
      <td> <input type="text" class="form-control" placeholder="Komoditas" name="komoditi" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->komoditi; ?>" disabled="disabled"></td>

    
    </tr>

    <tr>  
       
      <td>Varietas/Klon</td>
      <td>:</td>
      <td> <input type="text" class="form-control" placeholder="Varietas/Klon" name="varietas_klon" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->varietas_klon; ?>" disabled="disabled"></td>

    </tr>

    <tr>

      <td>Bulan Tanam</td>
      <td>:</td>
      <td> <input type="text" class="form-control" placeholder="Bulan Tanam" name="bulan_tanam" aria-describedby="sizing-addon2" value="<?php echo konversiBulan($dataBenih->bulan_tanam); ?>" disabled="disabled"></td>

    </tr>

    <tr>

      <td>Tinggi (dalam cm)</td>
      <td>:</td>
      <td> 
        <input type="number" step="any" class="form-control" placeholder="Tinggi" name="tinggi" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->tinggi; ?>" disabled="disabled">
      </td>

    </tr>

    <tr>

      <td>Jumlah Daun</td>
      <td>:</td>
      <td> <input type="number" class="form-control" placeholder="Jumlah Daun" name="jumlah_daun" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->jumlah_daun; ?>" disabled="disabled"></td>

    </tr>

    <tr>

      <td>Akhir Masa Edar</td>
      <td>:</td>
      <td> <input type="date" class="form-control" placeholder="Akhir Masa Edar" name="akhir_masa_edar" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->akhir_masa_edar; ?>" disabled="disabled"></td>

    </tr>
    
    </table>  

  
    <div class="form-group">
      <div class="text-right">
        <button class="btn btn-danger" data-dismiss="modal"> Close</button>
      </div>
    </div>
  </form>
</div>