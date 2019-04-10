<?php
  foreach ($dataSertifikat as $sertifikat) {
    ?>
    <tr>
      <td style="min-width:230px;"><?php 
        if(isset($modelSertif->select_by_id($sertifikat->sert_sumber_benih)->id_sertifikat))
          echo $modelSertif->select_by_id($sertifikat->sert_sumber_benih)->no_sertifikat;
        else{
          echo '';
        }
       ?></td>
      <td><?php echo $sertifikat->no_sertifikat; ?></td>
      <td><?php echo $sertifikat->nama_perusahaan; ?></td>
      <td><?php echo $sertifikat->komoditi; ?></td>
      <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataSertifikat" data-id="<?php echo $sertifikat->id_sertifikat; ?>"><i class="glyphicon glyphicon-edit"></i></button>
        <button class="btn btn-danger konfirmasiHapus-sertifikat" data-id="<?php echo $sertifikat->id_sertifikat; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button>
        <button class="btn btn-info detail-dataSertifikat" data-id="<?php echo $sertifikat->id_sertifikat; ?>"><i class="glyphicon glyphicon-info-sign"></i></button>
      </td>
    </tr>
    <?php
  }
?>