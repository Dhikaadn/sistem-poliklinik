<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Poliklinik UDINUS</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="./dist/css/welcome_styles.css" rel="stylesheet" />
</head>
<style>

    .box-luar{
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
        margin-left: 40px;
        margin-right: 40px;
    }
</style>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #8A2BE2;">
        <div class="container px-5">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <?php if ($muncul) : ?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="http://<?= $_SERVER['HTTP_HOST'] ?>/sistem-poliklinik/pages/<?= $arah ?>">Dashboard</a></li>
                    </ul>
                </div>
            <?php endif ?>
        </div>
    </nav>
    <!-- Header-->
    <header class="py-5" style="background-color: #8A2BE2;">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-6">
                    <div class="text-center my-5">
                        <h1 class="display-5 fw-bolder text-white mb-2">Poliklinik UDINUS</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Features section-->
    <?php if (!$muncul) : ?>
        <section class="py-5 border-bottom" id="features">
            <!-- <div class="container px-5 my-5">
                <div class="column gx-5">
                    <div class="col-lg mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person"></i></div>
                        <h2 class="h4 fw-bolder">Pasien</h2>
                        <a class="text-decoration-none" href="http://<?= $_SERVER['HTTP_HOST'] ?>/sistem-poliklinik/pages/auth/login-pasien.php">
                            Klik Link Berikut untuk login sebagai pasien
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-lg mb-5 mb-lg-0">
                        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-person"></i></div>
                        <h2 class="h4 fw-bolder">Dokter</h2>
                        <a class="text-decoration-none" href="http://<?= $_SERVER['HTTP_HOST'] ?>/sistem-poliklinik/pages/auth/login.php">
                            Klik Link Berikut untuk login sebagai dokter
                            <i class="bi bi-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div> -->
            
            <div class="box-luar">
            <a class="text-decoration-none" href="http://<?= $_SERVER['HTTP_HOST'] ?>/sistem-poliklinik/pages/auth/login-pasien.php">
                <div class="card text-bg-warning mb-5" style="max-width: 40rem;">
                    <div class="card-header">Pasien</div>
                        <div class="card-body">
                            <h5 class="card-title">Login Pasien</h5>
                            <p class="card-text">Ini adalah menu untuk login pasien. Jika anda belum pernah login, silakan registrasi terlebih dahulu.</p>
                        </div>
                </div>
            </a>
            <a class="text-decoration-none" href="http://<?= $_SERVER['HTTP_HOST'] ?>/sistem-poliklinik/pages/auth/login.php">
                <div class="card text-bg-info mb-5" style="max-width: 40rem;">
                    <div class="card-header">Dokter</div>
                        <div class="card-body">
                            <h5 class="card-title">Login Dokter</h5>
                            <p class="card-text">Ini adalah menu untuk login dokter. Hubungi admin jika anda belum punya akun atau ada kendala terkait akun dokter.</p>
                        </div>
                </div>
            </a>
            </div>
            
           
        </section>
    <?php endif ?>
    <!-- Pricing section-->
    <!-- Contact section-->
    <!-- Footer-->
    <footer class="main-footer px-4 py-2">
        <strong>Copyright ©
            <script>
                document.write(new Date().getFullYear())
            </script>
            <a>Andhika Dian Pratama</a>.
        </strong>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>