<?php
if (function_exists('password_verify')) {
    echo "Fungsi password_verify tersedia.";
} else {
    echo "Fungsi password_verify TIDAK tersedia. Cek versi PHP Anda.";
}
?>