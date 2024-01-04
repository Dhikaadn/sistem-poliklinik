<?php
session_start();
include_once("../../config/conn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Mendapatkan nilai dari form -- atribut name di input
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no_ktp = $_POST['no_ktp'];
  $no_hp = $_POST['no_hp'];
  // $password = $_POST['password'];

  // Generate no_rm in the format (tahun)(bulan)-(nomorurutanid)
  
  $tahun_bulan = "20" . date("ym");
  $no_rm_query = $pdo->prepare("SELECT MAX(RIGHT(no_rm, 3)) as max_id FROM pasien WHERE SUBSTRING(no_rm, 1, 4) = :tahun_bulan");
  $no_rm_query->bindParam(':tahun_bulan', $tahun_bulan, PDO::PARAM_STR);


  // Ambil ID terakhir yang ditambahkan
  $query_last_id = "SELECT MAX(id) as max_id FROM pasien";
  $result_last_id = mysqli_query($conn, $query_last_id);
  $row_last_id = mysqli_fetch_assoc($result_last_id);
  $last_inserted_id = $row_last_id['max_id'] ? $row_last_id['max_id'] : 0;

  $no_rm = $tahun_bulan . "-" . $last_inserted_id+1;

  // Hash password sebelum menyimpan ke database (gunakan metode keamanan yang lebih baik di produksi)
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Query untuk menambahkan data ke tabel pasien
  // $query = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm, password) VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp', '$no_rm', '$hashed_password')";

  $query = "INSERT INTO pasien (nama, alamat, no_ktp, no_hp, no_rm) VALUES ('$nama', '$alamat', '$no_ktp', '$no_hp', '$no_rm')";


  // Eksekusi query
  if (mysqli_query($conn, $query)) {
    // Display alert with the generated no_rm
    echo "<script>alert('Data berhasil ditambahkan. No RM: $no_rm');</script>";
    // Redirect ke halaman lain
    header("Location: login-pasien.php");
    exit();
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }

  // Tutup koneksi database
  mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Poliklinik | Registration Page (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page bg-warning">
<div class="register-box">
  <div class="card card-outline">
    <div class="card-header text-center">
      <h3 class="login-pasien-text"><b>Register Pasien</b></h3>
    </div>
    <div class="card-body">
      <!-- nama -->
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" required placeholder="Nama lengkap" name="nama" >
        </div>
        <!-- alamat -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" required placeholder="alamat" name="alamat" >
        </div>
        <!-- no ktp -->
        <div class="input-group mb-3">
          <input type="number" class="form-control" required placeholder="No KTP" name="no_ktp" >
        </div>
        <!-- no hp -->
        <div class="input-group mb-3">
          <input type="number" class="form-control" required placeholder="NO HP" name="no_hp" >
        </div>


        <!-- pass -->
        <!-- <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div> -->
        
        <div class="row justify-content-around mb-3">
          <a href="../../index.php"><i class='fas fa-home mt-1' style='font-size:24px;color:black'></i></a>

          <!-- /.col -->
          <div class="col-5">
            <button type="submit" class="btn btn-success btn-block" name="submit">Register</button>
          </div>
          <!-- /.col -->
          <div class="col-1"></div>

        </div>
      </form>
      Sudah punya akun?
      <a href="login-pasien.php" class="text-center">Login</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
