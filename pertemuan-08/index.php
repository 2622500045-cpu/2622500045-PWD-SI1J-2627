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
 * ==================================================================================
 */

// 1. DATA IDENTITAS MAHASISWA (Silakan sesuaikan data Anda di sini)
$nimMahasiswa   = "2411500001";
$namaMahasiswa  = "Rian Pratama";
$kelasMahasiswa = "SI1J";

// 2. NAVIGASI HALAMAN (Default: beranda)
$page = isset($_GET['page']) ? $_GET['page'] : 'beranda';

// 3. PROSES FORM PENDAFTARAN (PHP POST HANDLING)
$isSubmitted = false;
$formData = [];
if ($_SERVER["REQUEST_METHOD"] === "POST" && $page === 'pendaftaran') {
    $nama     = htmlspecialchars($_POST['nama_lengkap'] ?? '');
    $nim      = htmlspecialchars($_POST['nim_peserta'] ?? '');
    $email    = htmlspecialchars($_POST['email'] ?? '');
    $telepon  = htmlspecialchars($_POST['telepon'] ?? '');
    $jk       = htmlspecialchars($_POST['jenis_kelamin'] ?? 'Laki-laki');
    $minat    = htmlspecialchars($_POST['peminatan'] ?? '');
    $alasan   = htmlspecialchars($_POST['alasan'] ?? '');
    
    if (!empty($nama) && !empty($email)) {
        $isSubmitted = true;
        $formData = [
            "Nama Lengkap"  => $nama,
            "NIM Peserta"   => $nim ?: "-",
            "Alamat Email"  => $email,
            "No. WhatsApp"  => $telepon,
            "Jenis Kelamin" => $jk,
            "Minat Program" => $minat,
            "Alasan/Pesan"  => $alasan ?: "-",
            "Waktu Daftar"  => date("d-m-Y H:i:s") . " WIB"
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog Pribadi <?php echo $namaMahasiswa; ?> &bull; UTS Pemrograman Web Dasar</title>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg-body: #f8fafc;
      --card-bg: #ffffff;
      --card-border: #e2e8f0;
      --primary: #4f46e5;
      --primary-light: #eef2ff;
      --secondary: #06b6d4;
      --text-main: #0f172a;
      --text-muted: #64748b;
      --radius: 14px;
      --shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.05);
    }
    body.dark-theme {
      --bg-body: #0b0f19;
      --card-bg: #111827;
      --card-border: #374151;
      --primary: #6366f1;
      --primary-light: rgba(99, 102, 241, 0.15);
      --text-main: #f8fafc;
      --text-muted: #94a3b8;
    }
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Plus Jakarta Sans', sans-serif; }
    body { background: var(--bg-body); color: var(--text-main); min-height: 100vh; padding: 14px; transition: 0.3s; }
    .page-container { max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; gap: 16px; }

    /* 1. HEADER SESUAI SOAL NO 2 */
    .site-header {
      background: var(--card-bg); border: 1px solid var(--card-border); border-radius: var(--radius);
      padding: 16px 24px; display: flex; justify-content: space-between; align-items: center; box-shadow: var(--shadow);
    }
    .header-brand { display: flex; align-items: center; gap: 12px; }
    .brand-logo {
      width: 42px; height: 42px; border-radius: 10px; background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.2rem;
    }
    .brand-title { font-size: 1.3rem; font-weight: 800; color: var(--primary); }
    .header-actions { display: flex; align-items: center; gap: 12px; }
    .live-clock {
      font-family: 'JetBrains Mono', monospace; font-size: 0.85rem; font-weight: 700;
      background: var(--primary-light); color: var(--primary); padding: 6px 12px; border-radius: 20px;
    }
    .btn-theme {
      background: var(--card-bg); border: 1px solid var(--card-border); padding: 6px 12px; border-radius: 8px;
      cursor: pointer; color: var(--text-main); font-weight: 600; font-size: 0.85rem;
    }

    /* 2. MIDDLE (NAVIGASI KIRI + KONTEN KANAN) */
    .main-wrapper { display: grid; grid-template-columns: 240px 1fr; gap: 16px; min-height: 520px; }
    
    /* NAVIGASI (TAG LIST SESUAI SOAL NO 3) */
    .site-navigation {
      background: var(--card-bg); border: 1px solid var(--card-border); border-radius: var(--radius);
      padding: 20px 14px; box-shadow: var(--shadow); height: fit-content;
    }
    .nav-title { font-size: 0.75rem; text-transform: uppercase; color: var(--text-muted); font-weight: 700; margin-bottom: 12px; padding-left: 8px; }
    .nav-menu-list { list-style: none; display: flex; flex-direction: column; gap: 6px; }
    .nav-link {
      display: flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 10px;
      text-decoration: none; color: var(--text-muted); font-weight: 600; font-size: 0.92rem; transition: 0.2s;
    }
    .nav-link:hover { background: var(--primary-light); color: var(--primary); }
    .nav-menu-item.active .nav-link { background: var(--primary); color: #fff; }

    /* KONTEN KANAN */
    .site-content {
      background: var(--card-bg); border: 1px solid var(--card-border); border-radius: var(--radius);
      padding: 28px; box-shadow: var(--shadow);
    }

    /* 3. FOOTER SESUAI SOAL NO 4 */
    .site-footer {
      background: #0f172a; color: #fff; border-radius: var(--radius); padding: 18px; text-align: center;
    }
    .footer-main-text { font-size: 0.95rem; font-weight: 700; margin-bottom: 4px; }
    .footer-sub { font-size: 0.8rem; color: #94a3b8; }

    /* ELEMEN KONTEN UMUM */
    .hero-box {
      background: linear-gradient(135deg, #312e81, #4f46e5); color: #fff; padding: 24px; border-radius: 12px; margin-bottom: 24px;
    }
    .grid-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 16px; margin: 18px 0; }
    .card { background: var(--card-bg); border: 1px solid var(--card-border); border-radius: 12px; padding: 18px; }
    table { width: 100%; border-collapse: collapse; margin-top: 12px; font-size: 0.9rem; }
    th, td { padding: 10px 14px; border-bottom: 1px solid var(--card-border); text-align: left; }
    th { background: var(--primary-light); color: var(--primary); }
    
    /* FORM */
    .form-group { margin-bottom: 14px; display: flex; flex-direction: column; gap: 6px; }
    .form-group input, .form-group select, .form-group textarea {
      padding: 10px 14px; border: 1.5px solid var(--card-border); border-radius: 8px; font-family: inherit; background: var(--card-bg); color: var(--text-main);
    }
    .btn { padding: 10px 20px; border-radius: 8px; border: none; font-weight: 700; cursor: pointer; }
    .btn-primary { background: var(--primary); color: #fff; }
    .profile-flex { display: flex; gap: 24px; align-items: flex-start; flex-wrap: wrap; }
    .profile-avatar { width: 140px; height: 140px; border-radius: 50%; background: linear-gradient(135deg, #6366f1, #06b6d4); display: flex; align-items: center; justify-content: center; font-size: 3.5rem; color: #fff; }

    @media (max-width: 800px) {
      .main-wrapper { grid-template-columns: 1fr; }
    }
  </style>
</head>
<body>

<div class="page-container">
  
  <!-- ==================== HEADER (SOAL NO 2) ==================== -->
  <header class="site-header">
    <div class="header-brand">
      <div class="brand-logo">DS</div>
      <div>
        <h1 class="brand-title">DevSpace Blog</h1>
        <small style="color: var(--text-muted);">ISB Atma Luhur &bull; <?php echo $kelasMahasiswa; ?></small>
      </div>
    </div>
    <div class="header-actions">
      <div class="live-clock" id="liveClock"><?php echo date('H:i:s'); ?> WIB</div>
      <button class="btn-theme" onclick="toggleTheme()">🌙 Mode</button>
    </div>
  </header>

  <!-- ==================== MIDDLE (NAVIGASI & KONTEN) ==================== -->
  <div class="main-wrapper">
    
    <!-- NAVIGASI MENGGUNAKAN TAG LIST (SOAL NO 3) -->
    <aside class="site-navigation">
      <div class="nav-title">Menu Utama</div>
      <ul class="nav-menu-list">
        <li class="nav-menu-item <?php echo ($page === 'beranda') ? 'active' : ''; ?>">
          <a href="index.php?page=beranda" class="nav-link"><span>🏠</span> Beranda</a>
        </li>
        <li class="nav-menu-item <?php echo ($page === 'profile') ? 'active' : ''; ?>">
          <a href="index.php?page=profile" class="nav-link"><span>👤</span> Profile</a>
        </li>
        <li class="nav-menu-item <?php echo ($page === 'pendaftaran') ? 'active' : ''; ?>">
          <a href="index.php?page=pendaftaran" class="nav-link"><span>📝</span> Pendaftaran</a>
        </li>
        <li class="nav-menu-item <?php echo ($page === 'galeri') ? 'active' : ''; ?>">
          <a href="index.php?page=galeri" class="nav-link"><span>✨</span> Galeri & Hobi</a>
        </li>
      </ul>
    </aside>

    <!-- KONTEN HALAMAN -->
    <main class="site-content">
      
      <!-- HALAMAN 1: BERANDA -->
      <?php if ($page === 'beranda'): ?>
        <div class="hero-box">
          <span style="background: rgba(255,255,255,0.2); padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 700;">Selamat Datang</span>
          <h2 style="margin: 8px 0;">Eksplorasi Hobi & Dunia Pemrograman Web</h2>
          <p style="opacity: 0.9; font-size: 0.92rem;">Dokumentasi kegiatan akademik, pengembangan sistem informasi, serta rutinitas hobi mahasiswa ISB Atma Luhur.</p>
        </div>

        <h3 style="margin-bottom: 8px;">✨ Kegiatan & Hobi Unggulan</h3>
        <div class="grid-cards">
          <div class="card">
            <div style="font-size: 2rem; margin-bottom: 6px;">💻</div>
            <h4>Web Development</h4>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px;">Mengeksplorasi pembuatan website dengan HTML, CSS, JavaScript, dan PHP.</p>
          </div>
          <div class="card">
            <div style="font-size: 2rem; margin-bottom: 6px;">📸</div>
            <h4>Fotografi & Desain</h4>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px;">Hunting foto lanskap di Bangka Belitung dan membuat desain visual antarmuka.</p>
          </div>
          <div class="card">
            <div style="font-size: 2rem; margin-bottom: 6px;">📚</div>
            <h4>Membaca Artikel Tech</h4>
            <p style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px;">Memperdalam pemahaman seputar basis data, rekayasa perangkat lunak, dan AI.</p>
          </div>
        </div>

        <h3 style="margin-top: 24px; margin-bottom: 8px;">📅 Tabel Jadwal Rutin Kegiatan</h3>
        <table>
          <thead>
            <tr><th>No</th><th>Hari</th><th>Alokasi Waktu</th><th>Kegiatan</th><th>Lokasi</th></tr>
          </thead>
          <tbody>
            <tr><td>1</td><td><strong>Senin & Rabu</strong></td><td>19.00 - 21.00 WIB</td><td>Ngoding & Praktik PHP Dasar</td><td>Home Studio</td></tr>
            <tr><td>2</td><td><strong>Selasa & Kamis</strong></td><td>16.00 - 17.30 WIB</td><td>Riset Desain UI & Membaca Buku</td><td>Perpustakaan</td></tr>
            <tr><td>3</td><td><strong>Sabtu</strong></td><td>08.00 - 11.00 WIB</td><td>Hunting Foto & Olahraga Pagi</td><td>Outdoor</td></tr>
          </tbody>
        </table>

      <!-- HALAMAN 2: PROFILE -->
      <?php elseif ($page === 'profile'): ?>
        <h2 style="margin-bottom: 18px; color: var(--primary);">👤 Profil & Biodata Mahasiswa</h2>
        <div class="profile-flex">
          <div style="text-align: center;">
            <div class="profile-avatar">👨‍💻</div>
            <h3 style="margin-top: 10px;"><?php echo $namaMahasiswa; ?></h3>
            <span style="font-family: 'JetBrains Mono', monospace; font-size: 0.85rem; color: var(--primary); font-weight: 700;"><?php echo $nimMahasiswa; ?></span>
          </div>

          <div style="flex: 1; min-width: 280px;">
            <table>
              <tr><td style="width: 35%; font-weight: 700; color: var(--text-muted);">Nama Lengkap</td><td>: <?php echo $namaMahasiswa; ?></td></tr>
              <tr><td style="font-weight: 700; color: var(--text-muted);">NIM</td><td>: <?php echo $nimMahasiswa; ?></td></tr>
              <tr><td style="font-weight: 700; color: var(--text-muted);">Program Studi</td><td>: S1 - Sistem Informasi</td></tr>
              <tr><td style="font-weight: 700; color: var(--text-muted);">Perguruan Tinggi</td><td>: Institut Sains dan Bisnis (ISB) Atma Luhur</td></tr>
              <tr><td style="font-weight: 700; color: var(--text-muted);">Kelompok / Kelas</td><td>: <?php echo $kelasMahasiswa; ?></td></tr>
              <tr><td style="font-weight: 700; color: var(--text-muted);">Dosen Pengampu</td><td>: Elly Yanuarti, M.Kom</td></tr>
              <tr><td style="font-weight: 700; color: var(--text-muted);">Tempat, Tgl Lahir</td><td>: Pangkalpinang, 14 Mei 2005</td></tr>
              <tr><td style="font-weight: 700; color: var(--text-muted);">Agama / JK</td><td>: Islam / Laki-laki</td></tr>
            </table>
          </div>
        </div>

      <!-- HALAMAN 3: PENDAFTARAN -->
      <?php elseif ($page === 'pendaftaran'): ?>
        <h2 style="margin-bottom: 8px; color: var(--primary);">📝 Form Pendaftaran Komunitas Blog</h2>
        <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 20px;">Lengkapi formulir di bawah ini untuk bergabung dalam kelompok diskusi pemrograman web dasar.</p>

        <?php if ($isSubmitted): ?>
          <div style="background: rgba(16, 185, 129, 0.15); border: 1.5px solid #10b981; padding: 18px; border-radius: 10px; margin-bottom: 20px;">
            <h4 style="color: #065f46; margin-bottom: 8px;">🎉 Pendaftaran Berhasil Diproses oleh PHP!</h4>
            <table>
              <?php foreach ($formData as $k => $v): ?>
                <tr><td style="width: 30%; font-weight: 700;"><?php echo $k; ?></td><td>: <?php echo $v; ?></td></tr>
              <?php endforeach; ?>
            </table>
            <div style="margin-top: 14px;"><a href="index.php?page=pendaftaran" class="btn btn-primary" style="text-decoration: none; display: inline-block;">Isi Form Lagi</a></div>
          </div>
        <?php else: ?>
          <form action="index.php?page=pendaftaran" method="POST" onsubmit="return confirm('Apakah Anda yakin data yang diisi sudah benar?')">
            <div class="form-group">
              <label>Nama Lengkap *</label>
              <input type="text" name="nama_lengkap" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="form-group">
              <label>NIM / Nomor Identitas</label>
              <input type="text" name="nim_peserta" placeholder="Contoh: 2411500001">
            </div>
            <div class="form-group">
              <label>Alamat Email *</label>
              <input type="email" name="email" placeholder="nama@email.com" required>
            </div>
            <div class="form-group">
              <label>Nomor WhatsApp *</label>
              <input type="tel" name="telepon" placeholder="08123456789" required>
            </div>
            <div class="form-group">
              <label>Minat Program *</label>
              <select name="peminatan" required>
                <option value="Web Development (HTML, CSS, PHP)">Web Development (HTML, CSS, PHP)</option>
                <option value="Desain Antarmuka & UI/UX">Desain Antarmuka & UI/UX</option>
                <option value="Fotografi & Konten Kreatif">Fotografi & Konten Kreatif</option>
              </select>
            </div>
            <div class="form-group">
              <label>Alasan / Harapan Bergabung</label>
              <textarea name="alasan" rows="3" placeholder="Tuliskan motivasi singkat..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">🚀 Kirim Pendaftaran</button>
          </form>
        <?php endif; ?>

      <!-- HALAMAN 4: GALERI (MENU TAMBAHAN) -->
      <?php elseif ($page === 'galeri'): ?>
        <h2 style="margin-bottom: 8px; color: var(--primary);">✨ Galeri & Dokumentasi Aktivitas</h2>
        <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 20px;">Dokumentasi hobi dan proyek kreatif mahasiswa.</p>
        <div class="grid-cards">
          <div class="card" style="text-align: center;">
            <div style="font-size: 3rem; margin-bottom: 10px;">💻</div>
            <h4>Coding PHP & HTML</h4>
            <p style="font-size: 0.85rem; color: var(--text-muted);">Eksplorasi script backend dan antarmuka web.</p>
          </div>
          <div class="card" style="text-align: center;">
            <div style="font-size: 3rem; margin-bottom: 10px;">🌅</div>
            <h4>Jembatan Emas Bangka</h4>
            <p style="font-size: 0.85rem; color: var(--text-muted);">Hunting fotografi lanskap golden hour.</p>
          </div>
          <div class="card" style="text-align: center;">
            <div style="font-size: 3rem; margin-bottom: 10px;">🏆</div>
            <h4>Komunitas Mahasiswa SI</h4>
            <p style="font-size: 0.85rem; color: var(--text-muted);">Diskusi kelompok dan kerja sama proyek kampus.</p>
          </div>
        </div>
      <?php endif; ?>

    </main>
  </div>

  <!-- ==================== FOOTER (SOAL NO 4 FORMAT WAJIB) ==================== -->
  <footer class="site-footer">
    <!-- FORMAT PERSIS SESUAI KETENTUAN SOAL NOMOR 4 -->
    <div class="footer-main-text">
      &copy;<?php echo $nimMahasiswa; ?>_<?php echo $namaMahasiswa; ?>_<?php echo $kelasMahasiswa; ?>_ UTS Pemrograman Web Dasar.
    </div>
    <div class="footer-sub">
      Institut Sains dan Bisnis (ISB) Atma Luhur &bull; Fakultas Teknologi Informasi
    </div>
  </footer>

</div>

<!-- JAVASCRIPT: Jam Realtime & Ganti Tema -->
<script>
  function updateClock() {
    const now = new Date();
    const h = String(now.getHours()).padStart(2, '0');
    const m = String(now.getMinutes()).padStart(2, '0');
    const s = String(now.getSeconds()).padStart(2, '0');
    document.getElementById('liveClock').textContent = `${h}:${m}:${s} WIB`;
  }
  setInterval(updateClock, 1000);

  function toggleTheme() {
    document.body.classList.toggle('dark-theme');
  }
</script>
</body>
</html>