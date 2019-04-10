<?php
$no = 1;
foreach ($dataBenih as $benih) {
  ?>
<tr>
    <td><?php echo $no; ?></td>
    <td style="min-width:230px;"><?php echo $benih->komoditi; ?></td>
    <td style="min-width:230px;"><?php echo $benih->varietas_klon; ?></td>
    <td style="min-width:230px;"><?php echo $benih->akhir_masa_edar; ?></td>
    <td class="text-center" style="min-width:230px;">
        <button class="btn btn-warning update-dataBenih" data-id="<?php echo $benih->id_benih; ?>"><i class="glyphicon glyphicon-edit"></i></button>
        <button class="btn btn-danger konfirmasiHapus-benih" data-id="<?php echo $benih->id_benih; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button>
        <button class="btn btn-info detail-dataBenih" data-id="<?php echo $benih->id_benih; ?>"><i class="glyphicon glyphicon-info-sign"></i></button>
    </td>
</tr>
<?php
$no++;
}
?> 