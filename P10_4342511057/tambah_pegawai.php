<?php
    // Memastikan koneksi database tersedia
    require 'koneksi.php';

    if ($_SERVER['REQUEST_METHOD']=='POST'){

        // 1. Ambil data dari formulir menggunakan metode POST
        // * HARUS MENGGUNAKAN HURUF KECIL 'nik' SESUAI ATRIBUT name="" DI FORM *
        $nik = $_POST['nik'];         
        $nama = $_POST['nama'];       
        $bagian = $_POST['bagian'];   

        // 2. Query untuk menyisipkan data ke tabel PEGAWAI
        // PASTIKAN NAMA KOLOM DI DATABASE (nik, nama, bagian) sudah benar
        $input = mysqli_query($koneksi, 
            "INSERT INTO pegawai (nik, nama, bagian) VALUES ('$nik', '$nama', '$bagian')"
        ) or die(mysqli_error($koneksi)); 

        if($input) {
            // Jika penyimpanan berhasil
            echo "<script>";
            echo "alert('Data Pegawai Berhasil Disimpan');"; 
            echo "window.location.href = 'pegawai.php';";    
            echo "</script>";
        } else {
            // Jika gagal
            $error_message = mysqli_error($koneksi);
            echo "<script>";
            echo "alert('Gagal Menyimpan Data Pegawai: " . $error_message . "');"; 
            echo "window.location.href = 'pegawai.php';";
            echo "</script>";
        }
    }
?>