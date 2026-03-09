<?php
    require 'koneksi.php';

    if ($_SERVER['REQUEST_METHOD']=='POST'){

        
        // SESUAIKAN DENGAN NAMA INPUT DI FORM DOSEN: nidn, nama_dosen, alamat, jabatan
        $nidn = $_POST['nidn'];
        $nama = $_POST['nama']; 
        $alamat = $_POST['alamat'];
        $jabatan = $_POST['jabatan'];


        // PASTIKAN NAMA KOLOM DI DATABASE (nidn, nama, alamat, jabatan) SUDAH BENAR
        $input = mysqli_query($koneksi, 
            "INSERT INTO dosen (nidn, nama, alamat, jabatan) VALUES ('$nidn', '$nama', '$alamat', '$jabatan')"
        ) or die(mysqli_error($koneksi));

        if($input) {
            // Jika penyimpanan berhasil
            echo "<script>";
            echo "alert('Data Dosen Berhasil Disimpan');"; // Pesan Dosen
            echo "window.location.href = 'dosen.php';";    // Redirect ke dosen.php
            echo "</script>";
        } else {
            // Jika gagal
            // Tambahkan pesan error database agar lebih informatif
            $error_message = mysqli_error($koneksi);
            echo "<script>";
            echo "alert('Gagal Menyimpan Data Dosen: " . $error_message . "');"; 
            echo "window.location.href = 'dosen.php';";
            echo "</script>";
        }
    }
?>