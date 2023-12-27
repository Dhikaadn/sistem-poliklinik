<?php
include_once("../../config/conn.php");
session_start();

if (isset($_SESSION['login'])) {
  $_SESSION['login'] = true;
} else {
  echo "<meta http-equiv='refresh' content='0; url=../auth/login.php'>";
  die();
}

$nama = $_SESSION['username'];
$akses = $_SESSION['akses'];

if ($akses != 'admin') {
  echo "<meta http-equiv='refresh' content='0; url=../..'>";
  die();
}
?>
<?php
$title = 'Poliklinik | Dashboard';
ob_start();

$content = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= getenv('APP_NAME') ?> | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
</head>
<style>
  .content-wrapper{
    background-image: url('../../dist/img/polidinus.jpg');
    /* background-attachment: fixed; */
    background-size: cover;
  }
  .kotak-luar{
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    gap: 15px;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/Logo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->
  <?php include "../../layouts/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="col mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard <?= ucwords($_SESSION['akses']) ?></h1>
          </div><!-- /.col -->
          <div class="kotak-luar mt-3">
            <a href="<?= $base_admin.'/dokter' ?>">
              <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"><strong>Menu Dokter</strong></div>
                <div class="card-body">
                  <p class="card-text">Mengelola data dokter, seperti menambahkan, mengedit, dan menghapus data dokter</p>
                </div>
              </div>
            </a>
            <a href="<?= $base_admin.'/pasien' ?>">
              <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
              <div class="card-header"><strong>Menu Pasien</strong></div>
                <div class="card-body">
                  <p class="card-text">Mengelola data pasien, seperti menambahkan, mengedit, dan menghapus data pasien</p>
                </div>
              </div>
            </a>
            <a href="<?= $base_admin.'/poli' ?>">
              <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
              <div class="card-header"><strong>Menu Poli</strong></div>
                <div class="card-body">
                  <p class="card-text">Mengelola data poli, seperti menambahkan, mengedit, dan menghapus data poli</p>
                </div>
              </div>
            </a>
            <a href="<?= $base_admin.'/obat' ?>">
              <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header"><strong>Menu Obat</strong></div>
                <div class="card-body">
                  <p class="card-text">Mengelola data obat, seperti menambahkan, mengedit, dan menghapus data obat</p>
                </div>
              </div>
            </a>
          </div>
      </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    
</div>
    </div>
    <!-- /.content-header -->
   
  </div>
  <!-- /.content-wrapper -->
  <?php include "../../layouts/footer.php"; ?>
</div>
<!-- ./wrapper -->
<?php include "../../layouts/pluginsexport.php"; ?>
</body>
</html>

