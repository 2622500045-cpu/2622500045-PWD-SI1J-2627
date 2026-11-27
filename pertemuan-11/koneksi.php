<?php
// Pengaturan bawaan Laragon: user root tanpa password.
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pertemuan11"; // harus sama dengan nama database di database.sql

mysqli_report(MYSQLI_REPORT_OFF);
$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");