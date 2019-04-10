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
            <li <?php if ($page == 'profile') {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url('Profile_User'); ?>">
                    <i class="fa fa-gear"></i>
                    <span>Pengaturan Akun</span>
                </a>
            </li>

            <li <?php if ($page == 'produsen') {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url('Produsen_User'); ?>">
                    <i class="fa fa-user"></i>
                    <span>Profil</span>
                </a>
            </li>

            <!-- <li <?php if ($page == 'benih') {
                            echo 'class="active"';
                        } ?>>
                <a href="<?php echo base_url('Benih_User'); ?>">
                    <i class="fa fa-leaf"></i>
                    <span>Data Benih</span>
                </a>
            </li> -->

            <li <?php if ($page == 'sertifikat') {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url('Sertifikat_User'); ?>">
                    <i class="fa fa-newspaper-o"></i>
                    <span>Data Sertifikat</span>
                </a>
            </li>

            <li <?php if ($page == 'laman-qrcode') {
                    echo 'class="active"';
                } ?>>
                <a href="<?php echo base_url('QRCode_User'); ?>">
                    <i class="fa fa-qrcode"></i>
                    <span>Data Label</span>
                </a>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>