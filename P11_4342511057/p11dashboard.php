<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h1>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <a href="logout.php" class="btn btn-danger mt-3">Logout</a>
</div>
<div class="col-md-2 bg-info mt-2 pt-4">
    <ul class="nav flex-column ms-3 mb-5">
        
        <li class="nav-item">
            <a class="nav-link active text-white" href="dashboard.php">
                <i class="fas fa-tachometer-alt me-2"></i>Dashboard
            </a>
        </li>
        <hr class="bg-secondary">
        
        <?php if ($role === 'mahasiswa' || $role === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="mahasiswa.php">
                    <i class="fas fa-user-graduate me-2"></i>Daftar Mahasiswa
                </a>
            </li>
            <hr class="bg-secondary">
        <?php endif; ?>

        <?php if ($role === 'dosen' || $role === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="dosen.php">
                    <i class="fas fa-chalkboard-teacher me-2"></i>Daftar Dosen
                </a>
            </li>
            <hr class="bg-secondary">
        <?php endif; ?>

        <?php if ($role === 'pegawai' || $role === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="pegawai.php">
                    <i class="fas fa-users me-2"></i>Daftar Pegawai
                </a>
            </li>
            <hr class="bg-secondary">
        <?php endif; ?>

        </ul>
</div>
</body>
</html>