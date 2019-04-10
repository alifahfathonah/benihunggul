<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registrasi Produsen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('vendor/adminlte/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('vendor/adminlte/') ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('vendor/adminlte/') ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('vendor/adminlte/') ?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('vendor/adminlte/') ?>plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo">
            <a href="<?= base_url('vendor/adminlte/') ?>index2.html"><b>Registrasi</b> Produsen</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">Registrasi Produsen</p>

            <form action="<?= base_url('Auth/regis_produsen') ?>" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="NPWP" id="npwp" name="npwp" value="<?= set_value('npwp'); ?>">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <?= form_error('npwp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nama Perusahaan" id="nama_perusahaan" name="nama_perusahaan" value="<?= set_value('nama_perusahaan'); ?>">
                    <span class="glyphicon glyphicon-modal-window form-control-feedback"></span>
                    <?= form_error('nama_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Pimpinan" id="pimpinan" name="pimpinan">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <?= form_error('pimpinan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Alamat Perusahaan" id="alamat_perusahaan" name="alamat_perusahaan">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                    <?= form_error('alamat_perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Jenis Usaha" id="jenis_usaha" name="jenis_usaha">
                    <span class="glyphicon glyphicon-leaf form-control-feedback"></span>
                    <?= form_error('jenis_usaha', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>



                <div class="row">
                    <div class="col-xs-8">
                        <a href="<?= base_url('Auth'); ?>">Saya sudah punya Akun</a><br>
                        <a href="<?= base_url('Auth/registration'); ?>">Perusahaan saya sudah terdaftar</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Lanjut</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                    Google+</a>
            </div> -->
        </div>
        <!-- /.form-box -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery 3 -->
    <script src="<?= base_url('vendor/adminlte/') ?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('vendor/adminlte/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('vendor/adminlte/') ?>plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>

</html>