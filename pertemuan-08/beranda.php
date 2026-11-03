<?php
/**
 * HALAMAN BERANDA
 * Memenuhi Soal No. 3: Beranda jika diklik akan menampilkan gambar dan deskripsi 
 * kegiatan/hobi Anda (boleh tambahkan tabel, video, animasi dll sesuai dengan kreatifitas anda) (25 point)
 */
// Data Hobi & Kegiatan menggunakan Array PHP (Dynamic Rendering)
$hobbies = [
  [
    "icon" => "💻",
    "title" => "Web & Software Development",
    "kategori" => "Teknologi",
    "deskripsi" => "Mengeksplorasi pembuatan website interaktif menggunakan HTML, CSS, JavaScript, dan PHP. Mengembangkan antarmuka modern yang fungsional dan estetis.",
    "frekuensi" => "Setiap Hari (Malam)",
    "status" => "Aktif Ditekuni"
  ],
  [
    "icon" => "📸",
    "title" => "Fotografi & Desain Grafis",
    "kategori" => "Kreatif",
    "deskripsi" => "Menangkap momen visual perkotaan (street photography), mengedit komposisi visual, serta merancang UI/UX wireframe dan vektor SVG.",
    "frekuensi" => "Akhir Pekan",
    "status" => "Hobi Mingguan"
  ],
  [

"icon" => "📚",
    "title" => "Membaca Buku & Artikel Tech",
    "kategori" => "Edukasi",
    "deskripsi" => "Mempelajari perkembangan sistem informasi terkini, kecerdasan buatan, arsitektur basis data, dan literatur pengembangan diri.",
    "frekuensi" => "3x Seminggu",
    "status" => "Rutin"
  ],
  [
    "icon" => "🎮",
    "title" => "Esports & Game Strategi",
    "kategori" => "Hiburan",
    "deskripsi" => "Melatih fokus dan kerja sama tim melalui game kompetitif, catur online, dan puzzle logika yang mengasah daya analisa pemecahan masalah.",
    "frekuensi" => "Waktu Luang",
    "status" => "Rekreasi"
  ]
];
// Data Tabel Jadwal Kegiatan Mingguan (PHP Array)
$jadwalKegiatan = [
  ["hari" => "Senin & Rabu", "waktu" => "19.00 - 21.00 WIB", "kegiatan" => "Coding & Eksplorasi Script PHP/JS", "lokasi" => "Home Studio", "status" => "Prioritas"],
  ["hari" => "Selasa & Kamis", "waktu" => "16.00 - 17.30 WIB", "kegiatan" => "Membaca E-Book & Riset Desain Web", "lokasi" => "Perpustakaan / Cafe", "status" => "Rutin"],
  ["hari" => "Jumat", "waktu" => "20.00 - 22.00 WIB", "kegiatan" => "Gaming & Santai Bersama Komunitas", "lokasi" => "Online Discord", "status" => "Rekreasi"],
  ["hari" => "Sabtu", "waktu" => "08.00 - 12.00 WIB", "kegiatan" => "Hunting Foto & Olahraga Pagi", "lokasi" => "Outdoor", "status" => "Fleksibel"],
  ["hari" => "Minggu", "waktu" => "15.00 - 18.00 WIB", "kegiatan" => "Review Materi Kuliah & Persiapan Tugas", "lokasi" => "Study Room", "status" => "Akademik"]
];
?>

<!-- 1. HERO BANNER MODERN -->
<div class="hero-banner">
  <span class="hero-tag" id="dynamicGreeting">Selamat Datang di DevSpace</span>
  <h2 class="hero-title">Eksplorasi Hobi, Ide & Kreativitas Digital</h2>
  <p class="hero-desc">
    Selamat datang di blog pribadi saya! Di sini saya mendokumentasikan rutinitas, minat mendalam di bidang teknologi sistem informasi, hobi fotografi, serta berbagai kreasi proyek berbasis web.
  </p>
</div>
<!-- 2. DAFTAR KEGIATAN & HOBI (PHP FOREACH RENDERING) -->
<div class="section-heading">
  <h3><span>✨</span> Kegiatan & Hobi Unggulan</h3>
  <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600;">Total: <?php echo count($hobbies); ?> Aktivitas</span>
</div>
<div class="hobbies-grid">
  <?php foreach ($hobbies as $hobi): ?>
    <div class="hobby-card">
      <div class="hobby-card-header">
        <div class="hobby-icon"><?php echo $hobi['icon']; ?></div>
        <span class="hobby-badge"><?php echo $hobi['kategori']; ?></span>
      </div>
      <h4><?php echo $hobi['title']; ?></h4>
      <p><?php echo $hobi['deskripsi']; ?></p>
      <div class="hobby-card-footer">
        <span>⏱️ <?php echo $hobi['frekuensi']; ?></span>
        <span style="margin-left: auto; color: var(--success);">&bull; <?php echo $hobi['status']; ?></span>
      </div>
    </div>
  <?php endforeach; ?>
</div>

<!-- 3. TABEL JADWAL KEGIATAN MINGGUAN (SOAL UTS MENYARANKAN PENAMBAHAN TABEL) -->
<div class="section-heading">
  <h3><span>📅</span> Tabel Jadwal Rutin Kegiatan & Hobi</h3>
</div>
<div class="table-responsive">
  <table class="custom-table">
    <thead>
      <tr>
        <th>No</th>
        <th>Hari Pelaksanaan</th>
        <th>Alokasi Waktu</th>
        <th>Kegiatan / Hobi</th>
        <th>Lokasi</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($jadwalKegiatan as $jadwal): ?>
        <tr>
          <td style="font-weight: 700; color: var(--primary);"><?php echo $no++; ?></td>
          <td><strong><?php echo $jadwal['hari']; ?></strong></td>
          <td><code><?php echo $jadwal['waktu']; ?></code></td>
          <td><?php echo $jadwal['kegiatan']; ?></td>
          <td><?php echo $jadwal['lokasi']; ?></td>
          <td>
            <span class="status-pill status-active">
              <?php echo $jadwal['status']; ?>
            </span>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- 4. SHOWCASE MEDIA INTERAKTIF (VIDEO & ANIMASI SESUAI SOAL NO 3) -->
<div class="section-heading">
  <h3><span>🎬</span> Video & Media Kreativitas</h3>
</div>
<div class="media-container">
  <!-- Video Showcase -->
  <div class="media-box">
    <h4 style="margin-bottom: 10px; font-size: 1rem; color: var(--text-main);">📹 Inspirasi Belajar Coding & Desain</h4>
    <p style="font-size: 0.82rem; color: var(--text-muted); margin-bottom: 12px;">
      Video referensi yang memotivasi proses eksplorasi pemrograman web modern.
    </p>
    <div class="video-wrapper">
      <!-- Responsive Embed Video -->
      <iframe 
        src="https://www.youtube-nocookie.com/embed/bMknfKXIFA8?si=learn-web" 
        title="Web Development Showcase" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
      </iframe>
    </div>
  </div>

    <!-- Showcase Quote & Mini Player/Animation -->
    <div class="media-box" style="display: flex; flex-direction: column; justify-content: center; background: linear-gradient(135deg, rgba(79, 70, 229, 0.05) 0%, rgba(6, 182, 212, 0.08) 100%);">
      <div style="font-size: 2.2rem; margin-bottom: 8px;">💡</div>
      <blockquote style="font-style: italic; color: var(--text-main); font-weight: 600; line-height: 1.5; margin-bottom: 14px;">
        "Kode yang hebat bukan hanya yang berjalan tanpa error, tapi yang mampu menyuguhkan pengalaman menyenangkan bagi penggunanya."
      </blockquote>
      <div style="font-size: 0.82rem; color: var(--primary); font-weight: 700;">
        &mdash; Catatan Hobi & Filosofi Pemrograman
      </div>
      
      <div style="margin-top: 20px; padding: 12px; background: var(--card-bg); border-radius: var(--border-radius-sm); border: 1px solid var(--card-border);">
        <div style="font-size: 0.78rem; font-weight: 700; color: var(--text-muted); text-transform: uppercase;">Aktivitas Saat Ini</div>
        <div style="font-size: 0.9rem; font-weight: 700; color: var(--success); display: flex; align-items: center; gap: 8px; margin-top: 4px;">
          <span class="live-indicator"></span> Mengerjakan UTS Pemrograman Web Dasar
        </div>
      </div>
    </div>
  </div>
  