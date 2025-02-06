<?php
session_start();
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mencari pengguna berdasarkan username
    $sql = "SELECT * FROM user WHERE Username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Periksa apakah username ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifikasi password menggunakan password_verify
        if (password_verify($password, $user['Password'])) {
            // Set sesi pengguna jika password benar
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['username'] = $user['Username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['nama'] = $user['nama'];

            // Tentukan halaman redirect berdasarkan role
            switch ($user['role']) {
                case 'Admin':
                    $redirectPage = '../admin';
                    break;
                case 'Guru':
                    $redirectPage = '../guru';
                    break;
                case 'User':
                    $redirectPage = '../user';
                    break;
                default:
                    $redirectPage = '../';
                    break;
            }

            echo json_encode(['status' => 'success', 'redirect' => $redirectPage]);
            exit();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Password salah!']);
            exit();
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Username tidak ditemukan!']);
        exit();
    }
}
?>