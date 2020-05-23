<?php
require_once 'autoload.php';
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Intranet Hans Lippershey | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Mis estilos -->
        <link rel="stylesheet" href="<?=base_url?>assets/css/misestilos.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url ?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?= base_url ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url ?>assets/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b>Colegio </b> Hans Lippershey</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Ingresar datos para logearse</p>

                    <form action="<?= base_url ?>administrativo/logear" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="documento" placeholder="Documento">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">

                            <!-- /.col -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                            </div>
                            <div class="col-12" style="padding-top: 3%">
                                <button type="submit" class="btn btn-danger btn-block">Olvide mi contraseña</button>
                            </div>
                            <!-- /.col -->
                        </div>
                        <div class="div_login_error">
                            <?php if(isset($_SESSION['error']['documento_identidad'])): ?>
                            <div class="login_error">
                                <div><?= $_SESSION['error']['documento_identidad'] ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($_SESSION['error']['password'])): ?>
                            <div class="login_error">
                                <div><?= $_SESSION['error']['password'] ?></div>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($_SESSION['error']['incorrectos'])): ?>
                            <div class="login_error">
                                <div><?= $_SESSION['error']['incorrectos'] ?></div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </form>
                    <?= Helpers::borrarErrores(); ?>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="<?= base_url ?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= base_url ?>assets/dist/js/adminlte.min.js"></script>

    </body>
</html>