<?php
// Pengaturan bawaan Laragon: user root tanpa password.
$host = "localhost";
$user = "root";
$pass = "";
$db   = "NAMA_DATABASE_KAMU"; // <-- ganti dengan nama database di phpMyAdmin/HeidiSQL

mysqli_report(MYSQLI_REPORT_OFF);
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");