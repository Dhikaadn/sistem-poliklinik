<?php 
session_start(); 
include_once("../../config/conn.php");

if (isset($_SESSION['login'])) {
  echo "<meta http-equiv='refresh' content='0; url=../..'>";
  die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Poliklinik | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<style>
  .login-user-text{
    color: black;
  }

  .button-home{
    display: flex;
    justify-content: space;
  }
</style>
<body class="hold-transition login-page bg-info">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline">
    <div class="card-header text-center">
      <h3 class="login-user-text"><b>Login User</b></h3>
    </div>
    <div class="card-body">
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="nama">
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="alamat">
        </div>
        <?php if (isset($_SESSION['error'])) : ?>
              <p style="color: red; font-style: italic; margin-bottom: 1rem;"><?php echo $_SESSION['error'];
                                                                              unset($_SESSION['error']); ?></p>
        <?php endif ?>
        <div class="row justify-content-around mb-3">
          <a href="../../index.php"><i class='fas fa-home mt-1' style='font-size:24px;color:black'></i></a>

          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-success btn-block" name="submit">Sign In</button>
          </div>
          <!-- /.col -->
          <div class="col-1"></div>

        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $username = stripslashes($_POST['nama']);
  $password = $_POST['alamat'];
  $cek_useradmin = $pdo->prepare("SELECT * FROM admin WHERE username = '$username'; ");
    try{
      $cek_useradmin->execute();
      if($cek_useradmin->rowCount()==1){
          $baris = $cek_useradmin->fetchAll(PDO::FETCH_ASSOC);
          if($password == $baris[0]['password']){
            $_SESSION['login'] = true;
            $_SESSION['id'] = $baris[0]['id'];
            $_SESSION['username'] = $baris[0]['username'];
            $_SESSION['akses'] = 'admin';
            echo "<meta http-equiv='refresh' content='0; url=../admin'>";
            die();
          }
      }
  } catch(PDOException $e){
    $_SESSION['error'] = $e->getMessage();
    echo "<meta http-equiv='refresh' content='0;'>";
    die();
  }
  if ($username == "") {
    // if ($password == 'admin') {
    //   $_SESSION['login'] = true;
    //   $_SESSION['id'] = null;
    //   $_SESSION['username'] = 'admin';
    //   $_SESSION['akses'] = 'admin';
    //   echo "<meta http-equiv='refresh' content='0; url=../admin'>";
    //   die();
    // }
  } else {
    $cek_username = $pdo->prepare("SELECT * FROM dokter WHERE nama = '$username'; ");
    try{
        $cek_username->execute();
        if($cek_username->rowCount()==1){
            $baris = $cek_username->fetchAll(PDO::FETCH_ASSOC);
            if($password == $baris[0]['alamat']){
              $_SESSION['login'] = true;
              $_SESSION['id'] = $baris[0]['id'];
              $_SESSION['username'] = $baris[0]['nama'];
              $_SESSION['akses'] = 'dokter';
              echo "<meta http-equiv='refresh' content='0; url=../dokter'>";
              die();
            }
        }
    } catch(PDOException $e){
      $_SESSION['error'] = $e->getMessage();
      echo "<meta http-equiv='refresh' content='0;'>";
      die();
    }
  }
  $_SESSION['error'] = 'Username dan Password Tidak Cocok';
  echo "<meta http-equiv='refresh' content='0;'>";
  die();
}
?>
