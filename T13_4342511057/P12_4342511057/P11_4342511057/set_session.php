<?php
session_start();

$_SESSION['nama'] = 'admin';
$_SESSION['role'] = 'Administrator';

echo "Session telah dibuat. <a href='get_session.php'>Lihat Session</a>";
?>