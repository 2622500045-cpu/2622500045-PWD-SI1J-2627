# PROYEK UTS PEMROGRAMAN WEB DASAR
**Institut Sains dan Bisnis (ISB) Atma Luhur**  
**Tahun Akademik 2026/2027 Semester Gasal**
- **Mata Ujian**: Pemrograman Web Dasar
- **Dosen Pengampu**: Elly Yanuarti, M.Kom
- **Jurusan**: S1 - Sistem Informasi
- **Kelompok**: SI1J
- **Format File**: `NIM_NAMA_SI1A.zip` / `NIM_NAMA_SI1J.zip`
---
## 🌟 Fitur "WAH" & Keunggulan Proyek
1. **Desain Modern (Glassmorphism & Clean Dashboard)**:
   - Palet warna profesional (Indigo & Cyan).
   - Efek blur latar belakang (*backdrop-filter: blur*), kartu elevasi bayangan halus, dan tipografi modern (*Plus Jakarta Sans* & *JetBrains Mono*).
2. **Dukungan Dark Mode & Light Mode Otomatis**:
   - Dapat diganti kapan saja dengan satu tombol di header.
   - Pilihan tema tersimpan otomatis di browser menggunakan `localStorage`.
3. **Interaktivitas JavaScript Penuh**:
   - Jam digital *realtime* dengan detik berkedip dan format WIB.
   - Sapaan dinamis berdasarkan jam saat halaman dibuka (*Selamat Pagi / Siang / Sore / Malam*).
   - Validasi formulir interaktif di sisi klien (Client-side validation) dengan dialog konfirmasi sebelum kirim.
   - Filter galeri instan tanpa reload halaman menggunakan manipulasi DOM.
   - Animasi progres keahlian (*skill progress bar*).
4. **Arsitektur PHP Modular & Aman**:
   - Sistem *Routing Modular* satu pintu (`index.php?page=...`).
   - Penanganan formulir backend (`$_POST`) dengan pengamanan sanitasi input `htmlspecialchars()`.
   - Menampilkan hasil rekap pendaftaran secara langsung (*dynamic preview summary*).
   - Looping array dinamis PHP (`foreach`) untuk data hobi, jadwal, dan galeri.
---
## 📋 Pemenuhan Butir Soal UTS
| No | Ketentuan / Soal | Lokasi Kode / File | Keterangan |
|---|---|---|---|
| **1** | Layout: Header (atas), Navigasi (kiri), Konten (kanan), Footer (bawah) | `index.php` & `assets/css/style.css` | Struktur CSS Grid/Flexbox presisi sesuai sketsa soal UTS |
| **2** | Header: Logo dan tulisan nama website | `includes/header.php` | Logo SVG modern beresolusi tinggi + Brand DevSpace Personal Blog |
| **3.1** | Navigasi menggunakan tag list | `includes/nav.php` | Menggunakan tag `<ul>`, `<li>`, dan `<a>` lengkap dengan badge & icon |
| **3.2** | Halaman Beranda (Kegiatan/Hobi, Tabel, Video) | `pages/beranda.php` | Kartu hobi interaktif, tabel jadwal kegiatan, dan embed video |
| **3.3** | Halaman Profile (Biodata + Foto) | `pages/profile.php` | Avatar profil profesional, tabel biodata, dan indikator skill |
| **3.4** | Halaman Pendaftaran (Formulir) | `pages/pendaftaran.php` | Form input teks, tanggal, email, radio button, checkbox, textarea, & PHP handler |
| **3.5** | Menu Tambahan Kreatif | `pages/galeri.php` | Menu "Galeri & Hobi" dengan filter kategori interaktif JavaScript |
| **4** | Footer Wajib: `©NIM_Nama Lengkap Anda_SI1J_ UTS Pemrograman Web Dasar.` | `includes/footer.php` | Format wajib 100% presisi sesuai teks soal |
| **5** | Materi Lengkap (HTML, CSS, JS, PHP) | Seluruh berkas | Terintegrasi utuh dan berjalan lancar |
---