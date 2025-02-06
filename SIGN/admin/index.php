<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin') {
    header("Location: ../");
    exit();
}
echo "Selamat datang di Dashboard Admin, " . $_SESSION['nama'];
?>