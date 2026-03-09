<?php
include 'koneksi.php';
$nis = $_GET['nis'];

$query = mysqli_query($koneksi, "SELECT * FROM calon_mhs WHERE nis = '$nis'");
$data = mysqli_fetch_assoc($query);

// Hapus file fisik
if (file_exists("uploads/" . $data['foto'])) unlink("uploads/" . $data['foto']);
if (file_exists("uploads/" . $data['file_pendukung'])) unlink("uploads/" . $data['file_pendukung']);

// Hapus data database
mysqli_query($koneksi, "DELETE FROM calon_mhs WHERE nis = '$nis'");
echo "<script>alert('Data berhasil dihapus!'); window.location='index.php';</script>";
?>