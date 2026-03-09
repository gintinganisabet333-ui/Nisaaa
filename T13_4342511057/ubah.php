<?php
include "koneksi.php";

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];

// Cek dan update foto
if ($_FILES['foto']['name'] != "") {
    $foto = $_FILES['foto']['name'];
    $targetFoto = "uploads/" . basename($foto);
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFoto)) {
        $queryFoto = mysqli_query($koneksi, "SELECT foto FROM calon_mhs WHERE nis = '$nis'");
        $oldFoto = mysqli_fetch_assoc($queryFoto)['foto'];
        if (file_exists("uploads/" . $oldFoto)) unlink("uploads/" . $oldFoto);
    }
} else {
    $queryFoto = mysqli_query($koneksi, "SELECT foto FROM calon_mhs WHERE nis = '$nis'");
    $foto = mysqli_fetch_assoc($queryFoto)['foto'];
}

// Cek dan update file pendukung
if ($_FILES['file_pendukung']['name'] != "") {
    $filePendukung = $_FILES['file_pendukung']['name'];
    $targetFile = "uploads/" . basename($filePendukung);
    if (move_uploaded_file($_FILES['file_pendukung']['tmp_name'], $targetFile)) {
        $queryFile = mysqli_query($koneksi, "SELECT file_pendukung FROM calon_mhs WHERE nis = '$nis'");
        $oldFile = mysqli_fetch_assoc($queryFile)['file_pendukung'];
        if (file_exists("uploads/" . $oldFile)) unlink("uploads/" . $oldFile);
    }
} else {
    $queryFile = mysqli_query($koneksi, "SELECT file_pendukung FROM calon_mhs WHERE nis = '$nis'");
    $filePendukung = mysqli_fetch_assoc($queryFile)['file_pendukung'];
}

$queryUpdate = "UPDATE calon_mhs SET nama='$nama', jk='$jk', telepon='$telepon', alamat='$alamat', foto='$foto', file_pendukung='$filePendukung' WHERE nis='$nis'";
if (mysqli_query($koneksi, $queryUpdate)) {
    header("Location: index.php?status=success");
} else {
    echo "Gagal memperbarui data: " . mysqli_error($koneksi);
}
?>