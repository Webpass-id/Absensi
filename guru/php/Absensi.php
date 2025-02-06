<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absensi Siswa</title>
    <link rel="stylesheet" href="../assets/css/Main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="NAVBAR">
        <img src="../assets/img/logoPKP.png" alt="Logo PKP" class="logo-pkp">
        <div class="right-section">
            <span class="HOME">HOME</span>
            <div class="login-bg">
                <img src="../assets/img/user.png" alt="User Icon" class="user">
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h1 class="text-center ABSENSI-SISWA">ABSENSI SISWA</h1>
        <form action="../db/process_form.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleInputName1" class="form-label">Nama</label>
        <input type="text" name="Nama" required class="form-control" id="exampleInputName1" placeholder="Masukkan Nama">
    </div>

    <div class="mb-3">
        <label for="inputNISN" class="form-label">NISN</label>
        <input type="text" name="nisn" required class="form-control" id="inputNISN" placeholder="Masukkan NISN">
    </div>

    <div class="mb-3">
        <label for="inputTanggal" class="form-label">Tanggal Kehadiran</label>
        <input type="date" name="Tanggal" required class="form-control" id="inputTanggal">
    </div>

    <div class="mb-3">
        <label for="inputWaktu" class="form-label">Jam Masuk</label>
        <input type="time" name="JamMasuk" required class="form-control" id="inputWaktu">
    </div>

    <div class="mb-3">
        <label for="dropdownStatus" class="form-label">Status Kehadiran</label>
        <select name="Status" required class="form-select" id="dropdownStatus">
            <option value="Hadir">Hadir</option>
            <option value="Izin">Izin</option>
            <option value="Sakit">Sakit</option>
            <option value="Alpa">Alpa</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="inputLokasi" class="form-label">Lokasi</label>
        <input type="text" name="Lokasi" class="form-control" id="inputLokasi" placeholder="Masukkan Lokasi (Opsional)">
    </div>

    <div class="mb-3">
        <label for="inputKeterangan" class="form-label">Keterangan</label>
        <textarea name="Keterangan" class="form-control" id="inputKeterangan" rows="3" placeholder="Tambahkan keterangan jika diperlukan"></textarea>
    </div>

    <div class="mt-3 text-center">
        <label for="cameraInput" class="btn btn-primary">
            <i class="bi bi-camera"></i> Upload Foto
        </label>
        <input type="file" id="cameraInput" name="Foto" accept="image/*" capture="environment" style="display: none;">
    </div>

    <div class="buttons mt-4 d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </div>
</form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>