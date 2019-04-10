<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
    <div class="form-msg"></div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 style="display:block; text-align:center;">Tambah Data Benih</h3>

    <form id="form-tambah-benih-user" method="POST">

        <table class="table table-striped">

            <tr>

                <td>Komoditas</td>
                <td>:</td>
                <td> <input type="text" class="form-control" placeholder="Komoditas" name="komoditi" aria-describedby="sizing-addon2"></td>


            </tr>

            <tr>

                <td>Varietas/Klon</td>
                <td>:</td>
                <td> <input type="text" class="form-control" placeholder="Varietas/Klon" name="varietas_klon" aria-describedby="sizing-addon2"></td>

            </tr>

            <tr>

                <td>Bulan Tanam</td>
                <td>:</td>
                <td>
                    <?php echo combo_box_bulan_tanam(); ?>
                </td>

            </tr>

            <tr>

                <td>Tinggi</td>
                <td>:</td>
                <td>
                    <input type="number" step="any" class="form-control" placeholder="(satuan cm)" name="tinggi" aria-describedby="sizing-addon2">
                </td>

            </tr>

            <tr>

                <td>Jumlah Daun</td>
                <td>:</td>
                <td> <input type="number" class="form-control" placeholder="Jumlah Daun" name="jumlah_daun" aria-describedby="sizing-addon2"></td>

            </tr>

            <tr>

                <td>Akhir Masa Edar</td>
                <td>:</td>
                <td> <input type="date" class="form-control" placeholder="Akhir Masa Edar" name="akhir_masa_edar" aria-describedby="sizing-addon2"></td>

            </tr>

        </table>

        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Tambah Data</button>
            </div>
        </div>

        <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Komoditas" name="komoditi" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Varietas/Klon" name="varietas_klon" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <?php combo_box_bulan_tanam(); ?>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="number" step="any" class="form-control" placeholder="Tinggi" name="tinggi" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah Daun" name="jumlah_daun" aria-describedby="sizing-addon2">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="date" class="form-control" placeholder="Akhir Masa Edar Benih" name="akhir_masa_edar" aria-describedby="sizing-addon2">
    </div> -->
    </form>
</div> 