<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header("Location: /");
    exit();
}
echo $_SESSION['nama'];
?>
<?php 
ob_start();  // Mulai menangkap output
?>

<div class="container-fluid position-relative d-flex flex-column min-vh-100 p-0">
    <!-- Content Start -->
    <div class="content flex-grow-1">
        <?php include 'components/nav.php'; ?>
        <!-- Sale & Revenue Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-users fa-3x text-white"></i>
                        <div class="ms-3">
                            <p class="mb-2 text-white">Total Siswa</p>
                            <h6 class="mb-0 text-center">99</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-primary rounded d-flex align-items-center justify-content-between py-4 px-5">
                        <i class="fa fa-user fa-3x text-white"></i>
                        <div class="ms-3">
                            <p class="mb-2 text-white">Kelas 10</p>
                            <h6 class="mb-0 text-center">99</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4 px-5">
                        <i class="fa fa-user fa-3x text-white"></i>
                        <div class="ms-3">
                            <p class="mb-2 text-white">Kelas 11</p>
                            <h6 class="mb-0 text-center">99</h6>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="bg-primary rounded d-flex align-items-center justify-content-between p-4 px-5">
                        <i class="fa fa-user fa-3x text-white"></i>
                        <div class="ms-3">
                            <p class="mb-2 text-white">Kelas 12</p>
                            <h6 class="mb-0 text-center">99</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sale & Revenue End -->

        <!-- Sales Chart Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="title-chart m-auto bg-secondary d-flex align-items-center p-3 mb-2 rounded">
                        <h6 class="text-dark m-auto">Rata-Rata Umur Siswa</h6>
                    </div>
                    <div class="bg-white text-center rounded p-4">
                        <canvas id="bar-chart"></canvas>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="title-chart  m-auto bg-secondary d-flex align-items-center p-3 mb-2 rounded">
                        <h6 class="text-dark m-auto">Absen Harian</h6>
                    </div>
                    <div class="bg-white text-center rounded p-4">
                        <canvas id="line-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sales Chart End -->
    </div>
    <!-- Content End -->
</div>
<?php
$content = ob_get_clean(); // Ambil output yang tertangkap
include 'components/layout.php' ?>