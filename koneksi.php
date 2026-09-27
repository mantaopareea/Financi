<?php

$koneksi = mysqli_connect("localhost", "root", "password_anda", "keuangan");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>