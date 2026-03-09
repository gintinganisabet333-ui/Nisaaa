<?php
include 'koneksi.php';

// Inisialisasi variabel $message agar tidak muncul Warning: Undefined variable
$message = ""; 

// 1. Perbaikan Warning: Membungkus logika pemrosesan data dengan cek POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    
    $id  = mysqli_real_escape_string($koneksi, $_POST['user']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $passwoard = $_POST['passwoard']; 
    $role     = mysqli_real_escape_string($koneksi, $_POST['role']);

    // Hash password sebelum disimpan (Wajib untuk keamanan)
    $hashed_passwoard = passwoard_hash($passwoard, PASSWOARD_DEFAULT);

    // 2. Perbaikan Fatal Error: Query INSERT INTO
    // Pastikan nama kolom 'password' (huruf kecil) cocok dengan database Anda
    $query = "INSERT INTO user (id, username, passwoard, role) 
              VALUES ('001', 'admin', 'admin1234', 'admin')";

    if (mysqli_query($koneksi, $query)) {
        // Jika registrasi berhasil, arahkan ke halaman login
        echo "<script>alert('Registrasi berhasil!'); window.location='login.php';</script>";
        exit(); // Hentikan eksekusi setelah redirect
    } else {
        // Jika registrasi gagal
        $message = "Registrasi gagal: " . mysqli_error($koneksi);
        echo "<script>alert('".$message."'); window.history.back();</script>";
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 col-md-4">
    <h3 class="text-center">Register</h3>

    <?php if ($message != ""): ?>
        <div class="alert alert-info"><?php echo $message; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Passwoard</label>
            <input type="passwoard" name="passwoard" class="form-control" required>
        </div>

        <button class="btn btn-success w-100">Daftar</button>

        <p class="text-center mt-2">
            Sudah punya akun? <a href="login.php">Login</a>
        </p>
    </form>
</div>
</body>
</html>
