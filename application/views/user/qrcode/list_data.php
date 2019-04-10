<?php
  foreach ($dataQRCode as $qrcode) {
    ?>
    <tr>
      <!-- INI HARUSNYA SERTIFIKAT SUMBER BENIH 
      
      <td style="min-width:230px;">
        if(isset($modelSertif->select_by_id($qrcode->sert_sumber_benih)->id_sertifikat))
        echo $modelSertif->select_by_id($qrcode->sert_sumber_benih)->no_sertifikat;
        else{
          echo '';
        }
      </td>
      
      -->
      <td><?php echo $qrcode->no_sertifikat; ?></td>
      <td style="min-width:150px;"><?php echo $qrcode->jenis_benih; ?></td>
      <td><?php echo $qrcode->volume; ?></td>
      <td><?php echo $qrcode->hasil_lapang; ?></td>
      <td><?php echo $qrcode->tgl; ?></td>
      <td>
      <img style="height: 200px" src="<?php echo base_url()."/assets/images/".$qrcode->foto_qrcode; ?>">
      </td>
      <td class="text-center" style="min-width:150px;">
        <button class="btn btn-danger konfirmasiHapus-qrcode" data-id="<?php echo $qrcode->id_qrcode; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button>
        <button class="btn btn-info detail-dataqrcode" data-id="<?php echo $qrcode->id_qrcode; ?>"><i class="glyphicon glyphicon-info-sign"></i></button>
        <a href="<?php echo base_url('LaporanPDF/index/').$qrcode->id_qrcode; ?>" target="_blank"><button class="btn btn-success" ><i class="glyphicon glyphicon-print"></i></button></a>
      </td>
    </tr>
    <?php
  }
?>