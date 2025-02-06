<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Guru') {
    header("Location: ../");
    exit();
}
echo "Selamat datang di Dashboard Guru, " . $_SESSION['nama'];
?>