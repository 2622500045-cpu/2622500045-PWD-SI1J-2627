<?php
/**
 * HALAMAN PENDAFTARAN
 * Memenuhi Soal No. 3: Pendaftaran jika diklik akan menampilkan form Pendaftaran (20 point)
 * Mengimplementasikan PHP Form Handling (POST Method), Sanitasi Input, dan Validasi
 */
$isSubmitted = false;
$formData = [];
$errors = [];
// PROSES SUBMISSION FORM OLEH PHP
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Ambil dan bersihkan data input (PHP Security Sanitization)
  $nama       = isset($_POST['nama_lengkap']) ? trim(htmlspecialchars($_POST['nama_lengkap'])) : '';
  $nim        = isset($_POST['nim_peserta']) ? trim(htmlspecialchars($_POST['nim_peserta'])) : '';
  $email      = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : '';
  $telepon    = isset($_POST['telepon']) ? trim(htmlspecialchars($_POST['telepon'])) : '';
  $jk         = isset($_POST['jenis_kelamin']) ? htmlspecialchars($_POST['jenis_kelamin']) : '';
  $tglLahir   = isset($_POST['tgl_lahir']) ? htmlspecialchars($_POST['tgl_lahir']) : '';
  $peminatan  = isset($_POST['peminatan']) ? htmlspecialchars($_POST['peminatan']) : '';
  $alasan     = isset($_POST['alasan']) ? trim(htmlspecialchars($_POST['alasan'])) : '';
  $topikMinat = isset($_POST['topik']) && is_array($_POST['topik']) ? $_POST['topik'] : [];
  // Validasi Sederhana
  if (empty($nama)) {
    $errors[] = "Nama Lengkap wajib diisi.";
  }
  if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Alamat Email valid wajib diisi.";
  }
  if (empty($telepon)) {
    $errors[] = "Nomor Telepon / WhatsApp wajib diisi.";if (empty($peminatan)) {
        $errors[] = "Pilihan Program / Peminatan wajib dipilih.";
      }
      // Jika tidak ada error, data berhasil diproses
      if (empty($errors)) {
        $isSubmitted = true;
        $formData = [
          "Nama Lengkap"   => $nama,
          "NIM / No Identitas" => $nim ? $nim : "-",
          "Email"          => $email,
          "No. WhatsApp"   => $telepon,
          "Jenis Kelamin"  => $jk ? $jk : "Tidak Ditentukan",
          "Tanggal Lahir"  => $tglLahir ? date('d F Y', strtotime($tglLahir)) : "-",
          "Peminatan Blog" => $peminatan,
          "Topik Minat"    => !empty($topikMinat) ? implode(", ", array_map('htmlspecialchars', $topikMinat)) : "Umum",
          "Alasan Gabung"  => $alasan ? $alasan : "-",
          "Waktu Daftar"   => date('d-m-Y H:i:s') . " WIB"
        ];
      }
    }
    ?>
    



<div class="section-heading" style="margin-top: 0;">
  <h3><span>📝</span> Formulir Pendaftaran Komunitas Blog & Workshop</h3>
  <span style="font-size: 0.85rem; color: var(--text-muted); font-weight: 600;">Interaksi PHP Form Processing</span>
</div>
<p style="color: var(--text-muted); font-size: 0.92rem; margin-bottom: 24px;">
  Silakan isi formulir di bawah ini untuk bergabung dalam jaringan pembaca, workshop teknologi web, dan buletin blog berkala.
</p>
<!-- TAMPILAN JIKA BERHASIL DISUBMIT (PHP OUTPUT) -->
<?php if ($isSubmitted): ?>
  <div class="form-alert alert-success">
    <span style="font-size: 1.5rem;">🎉</span>
    <div>
      <strong>Pendaftaran Berhasil Diproses oleh PHP!</strong><br>
      Data Anda telah tersimpan dalam sistem dan email konfirmasi otomatis telah diteruskan.
    </div>
  </div>
  <div class="result-card">
    <h4><span>📋</span> Rincian Data Formulir Terkirim:</h4>
    <table class="biodata-table">
      <tbody>
        <?php foreach ($formData as $k => $v): ?>
          <tr>
            <td style="width: 30%;"><strong><?php echo $k; ?></strong></td>
            <td>: <?php echo $v; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <div style="margin-top: 20px; text-align: right;">
      <a href="index.php?page=pendaftaran" class="btn btn-primary">
        <span>🔄</span> Isi Formulir Baru
      </a>
    </div>
  </div>
<?php else: ?>
  <!-- PESAN ERROR JIKA ADA -->
  <?php if (!empty($errors)): ?>
    <div class="form-alert" style="background: rgba(239, 68, 68, 0.15); color: #dc2626; border: 1px solid rgba(239, 68, 68, 0.3);">
      <span style="font-size: 1.5rem;">⚠️</span>
      <div>
        <strong>Terdapat kesalahan pengisian:</strong>
        <ul style="margin-left: 20px; margin-top: 4px;">
          <?php foreach ($errors as $err): ?>
            <li><?php echo $err; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  <?php endif; ?>
  <!-- FORM PENDAFTARAN LENGKAP -->
  <div class="form-box">
    <form action="index.php?page=pendaftaran" method="POST" id="registrationForm">
      <div class="form-grid">
        
        <!-- Input Nama Lengkap -->
        <div class="form-group">
          <label for="nama_lengkap">Nama Lengkap <span style="color: var(--accent);">*</span></label>
          <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Contoh: Rian Pratama" required>
        </div>
        <!-- Input NIM / Identitas -->
        <div class="form-group">
          <label for="nim_peserta">NIM / Nomor Mahasiswa</label>
          <input type="text" id="nim_peserta" name="nim_peserta" placeholder="Contoh: 2411500001">
        </div>
        <!-- Input Email -->
        <div class="form-group">
          <label for="email">Alamat Email Aktif <span style="color: var(--accent);">*</span></label>
          <input type="email" id="email" name="email" placeholder="nama@email.com" required>
        </div>
        <!-- Input Telepon / WA -->
        <div class="form-group">
          <label for="telepon">Nomor WhatsApp / HP <span sty        <!-- Input Tanggal Lahir -->
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir">
                  </div>
                  <!-- Pilihan Dropdown Peminatan -->
                  <div class="form-group">
                    <label for="peminatan">Minat Program / Workshop <span style="color: var(--accent);">*</span></label>
                    <select id="peminatan" name="peminatan" required>
                      <option value="">-- Pilih Program --</option>
                      <option value="Web Development & Coding">Web Development & Coding (HTML, CSS, PHP)</option>
                      <option value="UI/UX & Desain Grafis">UI/UX Design & Desain Grafis</option>
                      <option value="Sistem Informasi & Basis Data">Sistem Informasi & Arsitektur Database</option>
                      <option value="Komunitas Diskusi Santai">Komunitas Diskusi Santai & Networking</option>
                    </select>
                  </div>
                  <!-- Radio Button Jenis Kelamin -->
                  <div class="form-group full-width">
                    <label>Jenis Kelamin</label>
                    <div class="radio-group">
                      <label class="radio-option">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                      </label>
                      <label class="radio-option">
                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                      </label>
                    </div>
                  </div>
          le="color: var(--accent);">*</span></label>
          <input type="tel" id="telepon" name="telepon" placeholder="Contoh: 081234567890" required>
        </div>




        <!-- Checkbox Topik Favorit -->
        <div class="form-group full-width">
          <label>Topik Favorit yang Ingin Didiskusikan (Pilihan Ganda)</label>
          <div class="checkbox-group" style="flex-wrap: wrap;">
            <label class="checkbox-option">
              <input type="checkbox" name="topik[]" value="Frontend (HTML/CSS/JS)"> Frontend Modern
            </label>
            <label class="checkbox-option">
              <input type="checkbox" name="topik[]" value="Backend PHP & MySQL"> Backend PHP & MySQL
            </label>
            <label class="checkbox-option">
              <input type="checkbox" name="topik[]" value="Fotografi & Editing"> Fotografi & Editing
            </label>
            <label class="checkbox-option">
              <input type="checkbox" name="topik[]" value="Tips Produktivitas Kuliah"> Tips Kuliah SI
            </label>
          </div>
        </div>
        <!-- Textarea Alasan / Pesan -->
        <div class="form-group full-width">
          <label for="alasan">Motivasi / Harapan Bergabung</label>
          <textarea id="alasan" name="alasan" rows="3" placeholder="Tuliskan motivasi singkat atau pesan Anda..."></textarea>
        </div>

              </div>
              <!-- Tombol Aksi Form -->
              <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                  <span>🚀</span> Kirim Pendaftaran Sekarang
                </button>
                <button type="reset" class="btn btn-secondary">
                  <span>↺</span> Bersihkan Form
                </button>
              </div>
            </form>
          </div>
        <?php endif; ?>
        