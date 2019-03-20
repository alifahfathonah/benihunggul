<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Label</h3>

  <form id="form-update-label" method="POST">
    <input type="hidden" name="id_label" value="<?php echo $dataLabel->id_label; ?>">
    
    <table class="table table-striped">

      <tr>  
        
        <td>Jenis Benih</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Jenis Benih" name="jenis_benih" aria-describedby="sizing-addon2" value="<?php echo $dataLabel->jenis_benih ?>"> </td>

      </tr>

      <tr>  
        
        <td>Warna Label</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Warna Label" name="warna" aria-describedby="sizing-addon2" value="<?php echo $dataLabel->warna ?>"> </td>

      </tr>

    </table>
    
    <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Label" name="jenis_benih" aria-describedby="sizing-addon2" value="<?php echo $dataLabel->jenis_benih; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nama Label" name="warna" aria-describedby="sizing-addon2" value="<?php echo $dataLabel->warna; ?>">
    </div> -->
    <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>