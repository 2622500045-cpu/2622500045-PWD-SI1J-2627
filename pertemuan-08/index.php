<?php
/**
 * ==================================================================================
 * UJIAN TENGAH SEMESTER (UTS) - PEMROGRAMAN WEB DASAR
 * INSTITUT SAINS DAN BISNIS (ISB) ATMA LUHUR
 * TAHUN AKADEMIK 2026/2027 SEMESTER GASAL
 * ----------------------------------------------------------------------------------
 * Dosen Pengampu : Elly Yanuarti, M.Kom
 * Jurusan        : S1 - Sistem Informasi
 * Kelompok       : SI1J
 * Format Penamaan: NIM_NAMA_SI1A / SI1J
 * ==================================================================================
 */
// --- 1. DATA IDENTITAS MAHASISWA (SILAKAN SESUAIKAN DENGAN IDENTITAS ANDA) ---
$nimMahasiswa   = "2411500001";          // Ganti dengan NIM Anda
$namaMahasiswa  = "Rian Pratama";         // Ganti dengan Nama Lengkap Anda
$kelasMahasiswa = "SI1J";                 // Kelas / Kelompok
// --- 2. SISTEM ROUTING DINAMIS PHP (MODULAR VIEW) ---
$allowedPages = [
  'beranda'     => 'pages/beranda.php',
  'profile'     => 'pages/profile.php',
  'pendaftaran' => 'pages/pendaftaran.php',
  'galeri'      => 'pages/galeri.php'
];

// Ambil parameter halaman dari URL (?page=...), default ke 'beranda'
$currentPage = isset($_GET['page']) && array_key_exists($_GET['page'], $allowedPages)
  ? $_GET['page']
  : 'beranda';
$pageTitle = ucfirst($currentPage);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?> &bull; DevSpace - Blog Pribadi <?php echo $namaMahasiswa; ?></title>
  
  <!-- Favicon Logo -->
  <link rel="icon" type="image/svg+xml" href="assets/images/logo.svg">
  
  <!-- CSS Stylesheet Utama (Modern Glassmorphism & Responsive Design) -->
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <!-- PAGE CONTAINER: LAYOUT STRUKTUR UTAMA SESUAI GAMBAR SOAL UTS -->
  <div class="page-container">

      <!-- ==========================================
         BAGIAN 1: HEADER (ATAS PENUH)
         Memenuhi Soal No. 1 & 2
         ========================================== -->
    <?php include 'includes/header.php'; ?>
    <!-- ==========================================
         BAGIAN 2: BAGIAN TENGAH (NAVIGASI & KONTEN)
         Layout Grid 2 Kolom: Kiri (Navigasi), Kanan (Konten)
         Memenuhi Soal No. 1 & 3
         ========================================== -->
    <div class="main-wrapper">
      
      <!-- NAVIGASI SIDEBAR (KIRI) -->
      <?php include 'includes/nav.php'; ?>
      <!-- KONTEN UTAMA (KANAN) -->
      <main class="site-content" id="mainContent">
        <?php 
          // Memuat konten sesuai menu yang diklik
          include $allowedPages[$currentPage]; 
        ?>
      </main>
    </div>

    <!-- ==========================================
         BAGIAN 3: FOOTER (BAWAH PENUH)
         Memenuhi Soal No. 1 & 4 (Format Wajib)
         ========================================== -->
    <?php include 'includes/footer.php'; ?>
  </div>
  <!-- JAVASCRIPT UTAMA (Realtime Clock, Theme Switcher, Form Validation, Filter) -->
  <script src="assets/js/script.js"></script>
</body>
</html>