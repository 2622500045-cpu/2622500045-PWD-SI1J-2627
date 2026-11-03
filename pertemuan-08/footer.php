<?php
/**
 * FOOTER COMPONENT
 * Memenuhi Soal No. 4: Bagian Footer berisi tulisan seperti berikut: (5 Point)
 * Format Wajib:
 * ©NIM_Nama Lengkap Anda_SI1J_ UTS Pemrograman Web Dasar.
 */
// Konfigurasi Identitas Mahasiswa (Dapat diubah sesuai data Anda)
$nimMahasiswa  = isset($nimMahasiswa) ? $nimMahasiswa : "2411500001";
$namaMahasiswa = isset($namaMahasiswa) ? $namaMahasiswa : "Rian Pratama";
$kelasMahasiswa = "SI1J";
?>
<footer class="site-footer">
  <!-- Format Wajib Soal No. 4 -->
  <div class="footer-main-text">
    &copy; <?php echo $nimMahasiswa; ?>_<?php echo $namaMahasiswa; ?>_<?php echo $kelasMahasiswa; ?>_ UTS Pemrograman Web Dasar.
  </div>
  <div class="footer-sub-text">
    Fakultas Teknologi Informasi &bull; Program Studi Sistem Informasi &bull; Institut Sains dan Bisnis (ISB) Atma Luhur
  </div>
</footer>