<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- MENU SAYA -->
      <li <?php if ($page == 'produsen') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Produsen'); ?>">
          <i class="fa fa-user"></i>
          <span>Data Produsen</span>
        </a>
      </li>

      <li <?php if ($page == 'benih') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Benih'); ?>">
          <i class="fa fa-leaf"></i>
          <span>Data Benih</span>
        </a>
      </li>

      <li <?php if ($page == 'sertifikat') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Sertifikat'); ?>">
          <i class="fa fa-newspaper-o"></i>
          <span>Data Sertifikat</span>
        </a>
      </li>
      
      <li <?php if ($page == 'label') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Label'); ?>">
          <i class="fa fa-file-text"></i>
          <span>Data Label</span>
        </a>
      </li>

      <li <?php if ($page == 'laman-qrcode') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('QRCodeController'); ?>">
          <i class="fa fa-qrcode"></i>
          <span>QR Code</span>
        </a>
      </li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>