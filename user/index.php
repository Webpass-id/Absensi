<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'User') {
    header("Location: ../");
    exit();
}

require '../database/koneksi.php'; // Sesuaikan dengan file koneksi database

$nama = 'Ahmad Yusuf'; // Nama yang akan diambil dari database
$query = "SELECT * FROM absen WHERE Nama = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $nama);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Online</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Navigasi -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Katanya ini di buat sama Rafi nanti</span>
        </div>
    </nav>

    <div class="container-custom">
        <div class="mb-4">
            <div class="d-block justify-content-between align-items-center mb-3">
                <h2 class="mb-2">Hi, User!</h2>
                <button class="btn-custom btn border border-dark border-2 fw-bold">
                    Absen dulu yuk!
                </button>
            </div>
        </div>

        <!-- Tabel Absensi -->
        <div class="table-responsive">
            <table class="table table-secondary table-hover text-center align-middle">
                <thead class="table-custom align-middle">
                    <tr>
                        <th>Hari</th>
                        <th>Tanggal</th>
                        <th>Jam Absen</th>
                        <th>Keterangan</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= date('l', strtotime($row['Tanggal'])) ?></td>
                        <td><?= date('d/m/y', strtotime($row['Tanggal'])) ?></td>
                        <td><?= $row['JamMasuk'] ?: '-' ?></td>
                        <td>
                            <span class="status-badge status-<?= strtolower($row['Status']) ?>">
                                <i
                                    class="bi <?= $row['Status'] === 'Hadir' ? 'bi-check-circle-fill' : ($row['Status'] === 'Izin' ? 'bi-exclamation-triangle-fill' : 'bi-x-circle-fill') ?>"></i>
                                <?= $row['Status'] ?>
                            </span>
                        </td>
                        <td><?= $row['Keterangan'] ?: '-' ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Footer -->
    <footer class="fixed-bottom mb-4 text-center text-dark">
        ini juga Rafi yang buat kata apres
    </footer>

    <!-- Script JS -->
    <script src="../js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>