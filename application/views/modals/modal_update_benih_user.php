<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
    <div class="form-msg"></div>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h3 style="display:block; text-align:center;">Update Data Benih</h3>

    <form id="form-update-benih" method="POST">
        <input type="hidden" name="id_benih" value="<?php echo $dataBenih->id_benih; ?>">

        <table class="table table-striped">

            <tr>

                <td>Komoditas</td>
                <td>:</td>
                <td> <input type="text" class="form-control" placeholder="Komoditas" name="komoditi" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->komoditi; ?>"></td>


            </tr>

            <tr>

                <td>Varietas/Klon</td>
                <td>:</td>
                <td> <input type="text" class="form-control" placeholder="Varietas/Klon" name="varietas_klon" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->varietas_klon; ?>"></td>

            </tr>

            <tr>

                <td>Bulan Tanam</td>
                <td>:</td>
                <td>
                    <?php echo combo_box_bulan_tanam($dataBenih->bulan_tanam); ?>
                </td>

            </tr>

            <tr>

                <td>Tinggi (dalam cm)</td>
                <td>:</td>
                <td>
                    <input type="number" step="any" class="form-control" placeholder="Tinggi" name="tinggi" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->tinggi; ?>">
                </td>

            </tr>

            <tr>

                <td>Jumlah Daun</td>
                <td>:</td>
                <td> <input type="number" class="form-control" placeholder="Jumlah Daun" name="jumlah_daun" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->jumlah_daun; ?>"></td>

            </tr>

            <tr>

                <td>Akhir Masa Edar</td>
                <td>:</td>
                <td> <input type="date" class="form-control" placeholder="Akhir Masa Edar" name="akhir_masa_edar" aria-describedby="sizing-addon2" value="<?php echo $dataBenih->akhir_masa_edar; ?>"></td>

            </tr>

        </table>
        <div class="form-group">
            <div class="col-md-12">
                <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
            </div>
        </div>
    </form>
</div> 