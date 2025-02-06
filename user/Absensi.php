<?php
session_start();
include '../database/koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$nama = $_SESSION['nama'];

// Pastikan folder 'uploads' ada
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nisn = $_POST['NISN'];  // Mengambil nilai NISN
    $tanggal = $_POST['Tanggal'];
    $jamMasuk = $_POST['JamMasuk'];
    $status = $_POST['Status'];
    $lokasi = $_POST['Lokasi'];
    $keterangan = $_POST['Keterangan'];
    $foto = $_FILES['Foto']['name'];

    $cekAbsen = $conn->prepare("SELECT * FROM absen WHERE Username = ? AND Tanggal = ?");
    $cekAbsen->bind_param("ss", $username, $tanggal);
    $cekAbsen->execute();
    $result = $cekAbsen->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Anda sudah melakukan absen hari ini!');</script>";
    } else {
        $targetFile = !empty($foto) ? "uploads/" . basename($foto) : NULL;
        if (!empty($foto) && move_uploaded_file($_FILES["Foto"]["tmp_name"], $targetFile)) {
            echo "<script>console.log('Foto berhasil diupload: $targetFile');</script>";
        }

        $stmt = $conn->prepare("INSERT INTO absen (NISN, Nama, Tanggal, JamMasuk, Foto, Status, Lokasi, Keterangan, Username) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $nisn, $nama, $tanggal, $jamMasuk, $targetFile, $status, $lokasi, $keterangan, $username);

        if ($stmt->execute()) {
            echo "<script>alert('Absen berhasil!'); window.location.href='Absensi.php';</script>";
        } else {
            echo "<script>alert('Gagal melakukan absen. Coba lagi!');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absen Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">Absen Siswa</h1>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">NISN</label>
                <input type="text" name="NISN" required class="form-control" maxlength="20">
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Kehadiran</label>
                <input type="date" name="Tanggal" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Jam Masuk</label>
                <input type="time" name="JamMasuk" required class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Status Kehadiran</label>
                <select name="Status" required class="form-select">
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alpa">Alpa</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Lokasi</label>
                <input type="text" name="Lokasi" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="Keterangan" class="form-control" rows="3"></textarea>
            </div>
            <div class="mt-3 text-center">
                <label for="cameraInput" class="btn btn-primary"><i class="bi bi-camera"></i> Upload Foto</label>
                <input type="file" id="cameraInput" name="Foto" accept="image/*" capture="environment"
                    style="display: none;">
            </div>
            <div class="mt-4 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>