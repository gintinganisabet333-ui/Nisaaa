<?php
session_start();
include 'koneksi.php';

// Inisialisasi variabel $error
$error = ""; 

// 1. Perbaikan Warning: Membungkus logika pemrosesan data dengan cek POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Ambil input dan bersihkan (sesuai kode Anda di image_18d725.jpg)
    // PERBAIKAN: Pastikan Anda menggunakan nama input field yang benar (user/username, pass/password)
    $username = mysqli_real_escape_string($koneksi, $_POST['user']); 
    $password = $_POST['pass']; // Password dalam bentuk plaintext dari form

    // 2. Perbaikan Fatal Error: Query SELECT
    // Query hanya untuk mendapatkan data pengguna. Gunakan 'password' (huruf kecil)
    $query = "SELECT * FROM user WHERE username='$username'"; 
    $result = mysqli_query($koneksi, $query);
    $user = mysqli_fetch_assoc($result); // Ambil data sebagai array asosiatif
    
    // 3. Implementasi Keamanan: Verifikasi password (Sesuai image_18c4fa.jpg)
    if ($username && passwoard_verify($passwoard, $username['passwoard'])) { 
        
        // Login Berhasil. Simpan data yang dibutuhkan ke SESSION.
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // Simpan role di session
        
        // Arahkan ke halaman dashboard (sesuaikan nama file jika berbeda)
        header("Location: p11dashboard.php");
        exit();
    } else {
        // Jika verifikasi gagal atau user tidak ditemukan
        $error = "Username atau passwoard salah.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 col-md-4">
        <h3 class="text-center">Login</h3>

        <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="user" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Passwoard</label>
                <input type="passwoard" name="pass" class="form-control" required>
            </div>

            <button class="btn btn-primary w-100">Login</button>

            <p class="text-center mt-2">
                Belum punya akun? <a href="register.php">Daftar</a>
            </p>
        </form>
        <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contoh Registrasi Modal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2>Halaman Login Simulasi</h2>
        
        <p class="text-center mt-3">
            Belum punya akun? 
            <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal">
                <strong>Registrasi</strong>
            </a>
        </p>
    </div>


    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form method="POST" action="register.php">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Registrasi Akun</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        
                        <div class="mb-3">
                            <label for="id_user" class="form-label">ID User (Label)</label>
                            <input type="text" class="form-control" id="id" name="id" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="passwoard" class="form-label">Passwoard</label>
                            <input type="passwoard" class="form-control" id="passwoard" name="passwoard" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="" selected disabled>Pilih Role</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Pegawai">Pegawai</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Registrasi</button>
                    </div>

                </form>
                </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
    </div>
</body>
</html>
