<?php
  $no = 1;
  foreach ($dataLabel as $label) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $label->jenis_benih; ?></td>
      <td><?php echo $label->warna; ?></td>
      <td class="text-center" style="min-width:150px;">
        <button class="btn btn-warning update-dataLabel" data-id="<?php echo $label->id_label; ?>"><i class="glyphicon glyphicon-edit"></i></button>
        <button class="btn btn-danger konfirmasiHapus-label" data-id="<?php echo $label->id_label; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button>
        <button class="btn btn-info detail-dataLabel" data-id="<?php echo $label->id_label; ?>"><i class="glyphicon glyphicon-info-sign"></i></button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>