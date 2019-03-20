<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Detail Data QR Code</h3>

  <form id="form-detail-qrcode" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataQRCode->id_qrcode; ?>">
    
    <table class="table table-striped">

      <tr>
      
        <td>Sertifikat Sumber Benih</td>
        <td>:</td>
        <td> 
          <input type="text" class="form-control" placeholder="Nomor Sertifikat Sumber Benih" name="sert_sumber_benih" aria-describedby="sizing-addon2" value="<?php 
      
          if(isset($modelSertifikat->select_by_id($dataQRCode->sert_sumber_benih)->id_sertifikat))
            echo $modelSertifikat->select_by_id($dataQRCode->sert_sumber_benih)->no_sertifikat;
          else{
            echo '';
          }?>" disabled="disabled"></td>

      </tr>

      <tr>
      
        <td>Nomor Sertifikat</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Nomor Sertifikat" name="no_sertifikat" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->no_sertifikat; ?>" disabled="disabled"> </td>

      </tr>

      <tr>
      
        <td>Nama Pemilik</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Nama Pemilik" name="nama_perusahaan" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->nama_perusahaan; ?>" disabled="disabled"> </td>

      </tr>

      <tr>
      
        <td>Pengawas</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Pengawas" name="pengawas" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->pengawas; ?>" disabled="disabled"> </td>

      </tr>

      <td>Masa Berlaku Sertifikat</td>
        <td>:</td>
        <td> <input type="date" class="form-control" placeholder="Masa Berlaku Sertifikat" name="masa_berlaku" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->masa_berlaku; ?>" disabled="disabled"></td>

      </tr>

      <tr>
        
        <td>Komoditas</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Komoditas" name="komoditi" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->komoditi; ?>" disabled="disabled"></td>


      </tr>

      <tr>  
        
        <td>Varietas/Klon</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Varietas/Klon" name="varietas_klon" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->varietas_klon; ?>" disabled="disabled"></td>

      </tr>

      <tr>

        <td>Bulan Tanam</td>
        <td>:</td>
        <td> 
          <input type="text" class="form-control" placeholder="Bulan Tanam" name="bulan_tanam" aria-describedby="sizing-addon2" value="<?php echo konversiBulan($dataQRCode->bulan_tanam); ?>" disabled="disabled">
        </td>

      </tr>

      <tr>

        <td>Tinggi (dalam cm)</td>
        <td>:</td>
        <td> 
          <input type="number" step="any" class="form-control" placeholder="Tinggi" name="tinggi" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->tinggi; ?>" disabled="disabled">
        </td>

      </tr>

      <tr>

        <td>Jumlah Daun</td>
        <td>:</td>
        <td> <input type="number" class="form-control" placeholder="Jumlah Daun" name="jumlah_daun" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->jumlah_daun; ?>" disabled="disabled"></td>

      </tr>

      <tr>

        <td>Akhir Masa Edar Benih</td>
        <td>:</td>
        <td> <input type="date" class="form-control" placeholder="Akhir Masa Edar" name="akhir_masa_edar" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->akhir_masa_edar; ?>" disabled="disabled"></td>

      </tr>

      <tr>  
        
        <td>Jenis Benih</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Jenis Benih" name="jenis_benih" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->jenis_benih; ?>" disabled="disabled"></td>

      </tr>

      <tr>  
        
        <td>Warna Label</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Warna Label" name="warna" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->warna; ?>" disabled="disabled"></td>

      </tr>

      <tr>  
        
        <td>Volume</td>
        <td>:</td>
        <td> <input type="number" class="form-control" placeholder="Volume" name="volume" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->volume; ?>" disabled="disabled"></td>

      </tr>

      <tr>  
        
        <td>Hsl. Rik. Lap. No.</td>
        <td>:</td>
        <td> <input type="text" class="form-control" placeholder="Hsl Rik. Lap. No." name="hasil_lapang" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->hasil_lapang; ?>" disabled="disabled"></td>

      </tr>

      <tr>  
        
        <td>Tanggal Berakhir Label</td>
        <td>:</td>
        <td> <input type="date" class="form-control" placeholder="Tanggal Berakhir Label" name="tgl" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->tgl; ?>" disabled="disabled"></td>

      </tr>

      <tr>  
        
        <td>QR Code</td>
        <td>:</td>
        <td> <img style="height: 200px" src="<?php echo base_url()."/assets/images/".$dataQRCode->foto_qrcode; ?>"></td>

      </tr>

    </table>
    
    <!-- <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nomor Sertifikat Sumber Benih" name="sert_sumber_benih" aria-describedby="sizing-addon2" value="<?php 
      
      if(isset($modelSertifikat->select_by_id($dataQRCode->sert_sumber_benih)->id_sertifikat))
        echo $modelSertifikat->select_by_id($dataQRCode->sert_sumber_benih)->no_sertifikat;
      else{
        echo '';
      }
      
      ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nomor Sertifikat" name="no_sertifikat" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->no_sertifikat; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-home"></i>
      </span>
      <input type="text" class="form-control" placeholder="Nomor Sertifikat" name="nama_perusahaan" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->nama_perusahaan; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-user"></i>
      </span>
      <input type="text" class="form-control" placeholder="Pengawas" name="pengawas" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->pengawas; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="date" class="form-control" placeholder="Masa Berlaku" name="masa_berlaku" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->masa_berlaku; ?>" disabled="disabled">
    </div>


    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Komoditas" name="komoditi" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->komoditi; ?>" disabled="disabled">
    </div>


    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Varietas/Klon" name="varietas_klon" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->varietas_klon; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="text" class="form-control" placeholder="Bulan Tanam" name="bulan_tanam" aria-describedby="sizing-addon2" value="<?php echo konversiBulan($dataQRCode->bulan_tanam); ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="number" step="any" class="form-control" placeholder="Tinggi" name="tinggi" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->tinggi; ?>" disabled="disabled">
      <span class="input-group-addon" id="sizing-addon2">
        cm
      </span>
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="number" class="form-control" placeholder="Jumlah Daun" name="jumlah_daun" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->jumlah_daun; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="date" class="form-control" placeholder="Akhir Masa Edar" name="akhir_masa_edar" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->akhir_masa_edar; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Jenis Label" name="jenis_benih" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->jenis_benih; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-file"></i>
      </span>
      <input type="text" class="form-control" placeholder="Warna Label" name="warna" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->warna; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-leaf"></i>
      </span>
      <input type="text" class="form-control" placeholder="Volume" name="volume" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->volume; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-list-alt"></i>
      </span>
      <input type="text" class="form-control" placeholder="Hsl Rik. Lap. No." name="hasil_lapang" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->hasil_lapang; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-calendar"></i>
      </span>
      <input type="text" class="form-control" placeholder="Tanggal Label" name="tgl" aria-describedby="sizing-addon2" value="<?php echo $dataQRCode->tgl; ?>" disabled="disabled">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="glyphicon glyphicon-qrcode"></i>
      </span>
      <img style="height: 200px" src="<?php echo base_url()."/assets/images/".$dataQRCode->foto_qrcode; ?>">
    </div> -->
    <div class="form-group">
      <div class="text-right">
        <button class="btn btn-danger" data-dismiss="modal"> Close</button>
      </div>
    </div>
  </form>
</div>