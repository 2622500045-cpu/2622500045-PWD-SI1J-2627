<?php
// Pengaturan bawaan Laragon: user root tanpa password.
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_pertemuan11";

mysqli_report(MYSQLI_REPORT_OFF);

// 1. Konek ke MySQL tanpa memilih database dulu.
$koneksi = mysqli_connect($host, $user, $pass);
if (!$koneksi) {
    die("Koneksi ke MySQL gagal: " . mysqli_connect_error() . ". Pastikan MySQL di Laragon sudah Start.");
}

// 2. Buat database jika belum ada, lalu pilih.
mysqli_query($koneksi, "CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
if (!mysqli_select_db($koneksi, $db)) {
    die("Database tidak dapat dipilih: " . mysqli_error($koneksi));
}
mysqli_set_charset($koneksi, "utf8mb4");

// 3. Buat tabel jika belum ada.
mysqli_query($koneksi, "CREATE TABLE IF NOT EXISTS tbl_kontak_2622500045 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    semester INT NOT NULL,
    tanggal DATE NOT NULL,
    jenis_pesan VARCHAR(20) NOT NULL,
    minat VARCHAR(100) DEFAULT NULL,
    prodi VARCHAR(5) NOT NULL,
    pesan TEXT NOT NULL
)");