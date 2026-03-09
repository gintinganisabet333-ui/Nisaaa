<?php
    require 'koneksi.php';

    if ($_SERVER['REQUEST_METHOD']=='POST'){

    // Ambil data dari formulir menggunakan metode POST
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];

    // Query untuk menyisipkan data ke tabel mahasiswa
    $input = mysqli_query($koneksi, 
        "INSERT INTO mahasiswa (nim, nama, jurusan, angkatan) VALUES ('$nim', '$nama', '$jurusan', '$angkatan')"
    ) or die(mysqli_error($koneksi));

    if($input) {
        // Jika penyimpanan berhasil
        echo "<script>";
        echo "alert('Data Berhasil Disimpan');";
        echo "window.location.href = 'mahasiswa.php';";
        echo "</script>";
    } else {
        // Jika gagal
        echo "<script>";
        echo "alert('Gagal Menyimpan Data');";
        echo "window.location.href = 'mahasiswa.php';";
        echo "</script>";
    }
    }
?>