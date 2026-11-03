<?php
/**
 * NAVIGATION COMPONENT
 * Memenuhi Soal No. 3: Menu navigasi yang menggunakan tag list (10 Point)
 * Terdiri dari:
 * - Beranda (25 Point)
 * - Profile (20 Point)
 * - Pendaftaran (20 Point)
 * - Galeri Aktivitas (Menu Tambahan Kreatif)
 */
?>
<aside class="site-navigation">
  <div class="nav-title">Menu Utama</div>
  
  <!-- TAG LIST SESUAI SYARAT SOAL (ul, li, a) -->
  <ul class="nav-menu-list">
    <!-- 1. Menu Beranda -->
    <li class="nav-menu-item <?php echo ($currentPage === 'beranda') ? 'active' : ''; ?>">
      <a href="index.php?page=beranda" class="nav-link">
        <span class="nav-icon">🏠</span>
        <span>Beranda</span>
        <span class="nav-badge">Home</span>
      </a>
    </li>
    <!-- 2. Menu Profile -->
    <li class="nav-menu-item <?php echo ($currentPage === 'profile') ? 'active' : ''; ?>">
      <a href="index.php?page=profile" class="nav-link">
        <span class="nav-icon">👤</span>
        <span>Profile</span>
        <span class="nav-badge">Bio</span>
      </a>
    </li>

    <!-- 3. Menu Pendaftaran -->
    <li class="nav-menu-item <?php echo ($currentPage === 'pendaftaran') ? 'active' : ''; ?>">
      <a href="index.php?page=pendaftaran" class="nav-link">
        <span class="nav-icon">📝</span>
        <span>Pendaftaran</span>
        <span class="nav-badge">Form</span>
      </a>
    </li>
    <!-- 4. Menu Tambahan: Galeri & Portofolio Kreatif -->
    <li class="nav-menu-item <?php echo ($currentPage === 'galeri') ? 'active' : ''; ?>">
      <a href="index.php?page=galeri" class="nav-link">
        <span class="nav-icon">✨</span>
        <span>Galeri & Hobi</span>
        <span class="nav-badge">Explore</span>
      </a>
    </li>
  </ul>
  <!-- Sidebar Widget Informasi Cepat -->
  <div class="nav-sidebar-card">
    <h4>💡 UTS Web Dasar</h4>
    <p>ISB Atma Luhur<br>Semester Gasal 2026/2027</p>
    <div style="margin-top: 8px; font-size: 0.72rem; color: var(--primary); font-weight: 700;">
      Kelas: SI1J
    </div>
  </div>
</aside>
