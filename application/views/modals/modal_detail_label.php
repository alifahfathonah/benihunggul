<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-briefcase"></i> List Label</h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Komoditi</th>
            <th>Varietas/Klon</th>
          </tr>
        </thead>
        <tbody id="data-label">
          <?php
            foreach ($dataLabelLengkap as $label) {
              ?>
              <tr>
                <td style="min-width:230px;"><?php echo $label->komoditi; ?></td>
                <td><?php echo $label->varietas_klon; ?></td>
              </tr>
          <?php
            }
          ?>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Close</button>
  </div>
</div>