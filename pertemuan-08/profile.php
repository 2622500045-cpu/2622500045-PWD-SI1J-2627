<?php
/**
 * HALAMAN PROFILE / BIODATA
 * Memenuhi Soal No. 3: Profile jika diklik akan menampilkan biodata disertai dengan Foto Anda. (20 point)
 */
// Data Biodata Pribadi Mahasiswa
$biodata = [
  "Nama Lengkap"       => "Rian",
  "NIM"                => "2622500045",
  "Program Studi"      => "S1 - Sistem Informasi",
  "Fakultas"           => "Teknologi Informasi",
  "Perguruan Tinggi"   => "Institut Sains dan Bisnis (ISB) Atma Luhur",
  "Kelas / Kelompok"   => "SI1J",
  "Tempat, Tgl Lahir"  => "toboali 21-06-2005",
  "Jenis Kelamin"      => "Laki-laki",
  "Agama"              => "Islam",
  "Alamat"             => "Jl. Jenderal Sudirman No. 45, Pangkalpinang, Kep. Bangka Belitung",
  "Email Akademik"     => "rian.pratama@mahasiswa.atmaluhur.ac.id",
  "No. Telepon / WA"   => "+62 838-8066-320",
  "Dosen Pengampu"     => "Elly Yanuarti, M.Kom"
];


// Keahlian / Skill bars yang dipelajari di Web Dasar
$skills = [
  ["name" => "HTML5 Semantics", "percent" => "95%"],
  ["name" => "CSS3 Modern & Flexbox/Grid", "percent" => "90%"],
  ["name" => "JavaScript Interactivity & DOM", "percent" => "80%"],
  ["name" => "PHP Backend & Form Handling", "percent" => "85%"],
  ["name" => "UI / UX Design & Responsive Layout", "percent" => "88%"]
];
?>
<div class="section-heading" style="margin-top: 0;">
  <h3><span>👤</span> Profil & Biodata Lengkap</h3>
  <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600;">Data Mahasiswa Aktif</span>
</div>
<div class="profile-grid">
  <!-- KOLOM KIRI: FOTO DAN IDENTITAS UTAMA (SESUAI SOAL WAJIB FOTO) -->
  <div class="profile-card-left">
    <div class="profile-avatar-wrap">
      <!-- Foto Avatar Mahasiswa (SVG / JPG) -->
      <img src="assets/images/profile.svg" alt="Foto Profil Rian Pratama" class="profile-avatar-img">
    </div>

        <h3 class="profile-name"><?php echo $biodata['Nama Lengkap']; ?></h3>
        <span class="profile-nim">NIM: <?php echo $biodata['NIM']; ?></span>
        
        <p class="profile-bio-snippet">
          Mahasiswa S1 Sistem Informasi yang berfokus pada rekayasa antarmuka web, logika pemrograman, dan arsitektur data.
        </p>
        <!-- Social / Contact Icons -->
        <div class="profile-social-links">
          <a href="https://github.com" target="_blank" class="social-btn" title="GitHub Profile">GH</a>
          <a href="https://linkedin.com" target="_blank" class="social-btn" title="LinkedIn Profile">IN</a>
          <a href="mailto:<?php echo $biodata['Email Akademik']; ?>" class="social-btn" title="Kirim Email">✉️</a>
          <a href="https://wa.me/6281234567890" target="_blank" class="social-btn" title="WhatsApp Chat">WA</a>
        </div>
        <hr style="margin: 20px 0; border: 0; border-top: 1px solid var(--card-border);">
        <div style="text-align: left; font-size: 0.82rem; color: var(--text-muted);">
          <p style="margin-bottom: 6px;">🎯 <strong>Motto Hidup:</strong></p>
          <p style="font-style: italic; color: var(--text-main);">
            "Terus belajar hal baru setiap hari, karena ilmu teknologi terus bergerak tanpa jeda."
          </p>
        </div>
      </div>
    
        <!-- KOLOM KANAN: TABEL BIODATA & PROGRESS SKILLS -->
        <div class="biodata-details">
          <!-- Tabel Rincian Biodata -->
          <div style="background: var(--card-bg); border: 1px solid var(--card-border); border-radius: var(--border-radius-md); padding: 20px;">
            <h4 style="font-size: 1.1rem; margin-bottom: 14px; color: var(--primary); display: flex; align-items: center; gap: 8px;">
              <span>📋</span> Informasi Biodata Diri
            </h4>
            <table class="biodata-table">
              <tbody>
                <?php foreach ($biodata as $label => $nilai): ?>
                  <tr>
                    <td><?php echo $label; ?></td>
                    <td>: <?php echo htmlspecialchars($nilai); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- Penguasaan Materi Web Dasar -->
          <div style="background: var(--card-bg); border: 1px solid var(--card-border); border-radius: var(--border-radius-md); padding: 20px;">
            <h4 style="font-size: 1.1rem; margin-bottom: 14px; color: var(--primary); display: flex; align-items: center; gap: 8px;">
              <span>🚀</span> Tingkat Penguasaan Teknologi Web Dasar
            </h4>
            
            <div class="skills-container">
              <?php foreach ($skills as $skill): ?>
                <div class="skill-item">
                  <div class="skill-info">
                    <span><?php echo $skill['name']; ?></span>
                    <span style="color: var(--primary);"><?php echo $skill['percent']; ?></span>
                  </div>
                  <div class="skill-bar-bg">
                    <div class="skill-progress" data-width="<?php echo $skill['percent']; ?>" style="width: <?php echo $skill['percent']; ?>;"></div>
      
                                </div>
                              </div>
                            <?php endforeach; ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    