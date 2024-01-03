
<style>
    aside{
        background-color: #8A2BE2;
    }
</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
            <a href="http://<?= $_SERVER['HTTP_HOST']?>/sistem-poliklinik/pages/auth/destroy.php" class="nav-link">Logout</a>
        </li>
</ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4">
<!-- Brand Logo -->
<a href="http://<?= $_SERVER['HTTP_HOST']?>/sistem-poliklinik/" class="brand-link pl-5">
    <span class="brand-text font-weight-light text-white"><strong>Poliklinik UDINUS</strong></span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        <img src="http://<?= $_SERVER['HTTP_HOST']?>/sistem-poliklinik/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
       <a href="#" class="d-block text-white"><strong><?= ucwords($_SESSION['username'])?></strong></a>
    </div>
    </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->
                <?php if ($_SESSION['akses'] == 'admin') : ?>
                    <li class="nav-item">
                        <a href="<?= $base_admin ?>" class="nav-link">
                            <i class="nav-icon fas fa-th text-white"></i>
                            <p class="text-white">
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base_admin.'/dokter' ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-md text-white"></i>
                            <p class="text-white">Dokter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base_admin.'/pasien' ?>" class="nav-link">
                            <i class="nav-icon fas fa-user-injured text-white"></i>
                            <p class="text-white">
                                Pasien
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base_admin.'/poli' ?>" class="nav-link">
                            <i class="nav-icon fas fa-hospital text-white"></i>
                            <p class="text-white">
                                Poli
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base_admin.'/obat' ?>" class="nav-link">
                            <i class="nav-icon fas fa-pills text-white"></i>
                            <p class="text-white">
                                Obat
                            </p>
                        </a>
                    </li>
                <?php elseif ($_SESSION['akses'] == 'dokter') : ?>
                    <li class="nav-item">
                        <a href="<?= $base_dokter ?>" class="nav-link">
                            <i class="nav-icon fas fa-th text-white"></i>
                            <p class="text-white">
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base_dokter . '/jadwal_periksa' ?>" class="nav-link">
                            <i class="nav-icon fas fa-clipboard-list text-white"></i>
                            <p class="text-white">
                                Jadwal Periksa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base_dokter . '/memeriksa_pasien' ?>" class="nav-link">
                            <i class="nav-icon fas fa-stethoscope text-white"></i>
                            <p class="text-white">
                                Memeriksa Pasien
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base_dokter . '/riwayat_pasien' ?>" class="nav-link">
                            <i class="nav-icon fas fa-notes-medical text-white"></i>
                            <p class="text-white">
                                Riwayat Pasien
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base_dokter . '/profil' ?>" class="nav-link">
                            <i class="nav-icon fas fa-user text-white"></i>
                            <p class="text-white">
                                Profil
                            </p>
                        </a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a href="<?= $base_pasien ?>" class="nav-link">
                            <i class="nav-icon fas fa-th text-white"></i>
                            <p class="text-white">
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= $base_pasien . '/poli' ?>" class="nav-link">
                            <i class="nav-icon fas fa-hospital text-white"></i>
                            <p class="text-white">
                                Poli
                            </p>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>