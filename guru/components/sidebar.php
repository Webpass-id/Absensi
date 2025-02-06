<!-- php -->
<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Guru') {
    header("Location: ../");
    exit();
}
?>
<?php


function isActive($route) {
    $currentPage = $_GET['page'] ?? '';
    return ($currentPage === $route) ? 'active' : '';
}

// Pastikan user sudah login
$namaUser = $_SESSION['nama'] ?? 'Guest';
$roleUser = $_SESSION['role'] ?? 'User';
?>
<!-- php end -->

<!-- Sidebar Start -->
<div class="sidebar pe-3 py-3">
    <nav class="navbar bg-white navbar-light">
        <a href="dashboard" class="navbar-brand d-flex">
            <img class="align-items-center ms-4 mb-2" src="./assets/img/logoPKP.png" style="width: 170px; height: 80px"
                alt="" />
        </a>
        <div class="profile d-flex align-items-center ms-3 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="./assets/img/user.png" alt="" style="width: 40px; height: 40px" />
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0 text-dark"><?= htmlspecialchars($namaUser); ?></h6>
                <span><?= htmlspecialchars($roleUser); ?></span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/guru/" class="nav-item nav-link <?= isActive('dashboard') ?>">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="bi bi-person-lines-fill me-2"></i>User
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item <?= isActive('button.html') ?>">
                        Accounts
                    </a>
                    <a href="typography.html" class="dropdown-item <?= isActive('typography.html') ?>">
                        Guru
                    </a>
                    <a href="element.html" class="dropdown-item <?= isActive('element.html') ?>">
                        Murid
                    </a>
                </div>
            </div>
            <a href="/guru/table-10.php" class="nav-item nav-link <?= isActive('kelas-10') ?>">
                <i class="bi bi-person-fill me-2"></i>Kelas 10
            </a>
            <a href="/guru/table-11.php" class="nav-item nav-link <?= isActive('kelas-11') ?>">
                <i class="bi bi-person-fill me-2"></i>Kelas 11
            </a>
            <a href="/guru/table-12.php" class="nav-item nav-link <?= isActive('kelas-12') ?>">
                <i class="bi bi-person-fill me-2"></i>Kelas 12
            </a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->