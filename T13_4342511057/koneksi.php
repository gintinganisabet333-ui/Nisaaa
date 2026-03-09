<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "akademic"; // Nama Database 

// koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Gagal koneksi ke database: " . mysqli_connect_error());
}

?>