<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'User') {
    header("Location: ../");
    exit();
}
echo "Selamat datang di Dashboard User, " . $_SESSION['nama'];
?>