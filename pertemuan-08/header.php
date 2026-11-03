<?php
/**
 * HEADER COMPONENT
 * Memenuhi Soal No. 2: Terdapat logo dan tulisan dengan nama website masing-masing (10 Point)
 */
?>
<header class="site-header">
  <div class="header-left">
    <!-- Logo Website (SVG Vector Modern) -->
    <a href="index.php?page=beranda" title="Kembali ke Beranda">
      <img src="assets/images/logo.svg" alt="Logo DevSpace Blog" class="header-logo">
    </a>
    
    <!-- Nama & Tagline Website -->
    <div class="header-brand">
      <h1 class="brand-title">DevSpace<span style="font-weight: 300; font-size: 0.9em;">.id</span></h1>
      <span class="brand-tagline">Personal Tech & Creative Space &bull; ISB Atma Luhur</span>
    </div>
  </div>
  <div class="header-right">
    <!-- Live Clock Badge via JS & PHP initial load -->
    <div class="live-clock-badge" title="Waktu Nyata Indonesia">
      <span class="live-indicator"></span>
      <span id="liveClock"><?php echo date('H:i:s'); ?> WIB</span>
    </div>
    <!-- Theme Toggle Switcher -->
    <button type="button" class="theme-toggle-btn" id="themeToggleBtn" title="Ganti Tema Tampilan">
      <span>🌙</span> Mode Gelap
    </button>
  </div>
</header>
