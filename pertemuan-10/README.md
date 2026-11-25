# Laporan Praktikum Pertemuan 10 (P10)
## Analisis Kebutuhan Data dan Dasar MySQL Satu Tabel

- **Mata Kuliah:** Pemrograman Web Dasar (IS205)
- **Program Studi:** Sistem Informasi
- **Fakultas:** Teknologi Informasi
- **Institut:** Institut Sains dan Bisnis Atma Luhur
- **Nama Mahasiswa:** Rian
- **NIM:** 2622500045
- **Tahun Akademik:** Gasal 2026/2027

---

## 1. Analisis Kebutuhan Data Formulir Kontak

Berdasarkan analisis formulir Kontak pada aplikasi hasil Pertemuan 9 (`index.php`), terdapat 8 data yang dikirimkan oleh pengguna melalui form:

| No | Data | Atribut `name` | Jenis Input | Keterangan |
|---|---|---|---|---|
| 1 | Nama lengkap | `nama` | Text | Disimpan sebagai teks |
| 2 | Email | `email` | Email | Disimpan sebagai teks |
| 3 | Semester | `semester` | Number | Bilangan bulat kecil |
| 4 | Tanggal kunjungan | `tanggal` | Date | Format penanggalan `YYYY-MM-DD` |
| 5 | Jenis pesan | `jenis_pesan` | Radio | Pilihan tunggal (`pertanyaan` atau `saran`) |
| 6 | Topik yang diminati | `minat[]` | Checkbox | Pilihan ganda, direpresentasikan dalam satu string dipisah koma |
| 7 | Program studi | `prodi` | Select | Pilihan tunggal kode prodi (`SI` atau `TI`) |
| 8 | Pesan | `pesan` | Textarea | Teks pesan hingga 300 karakter |

> **Catatan Penanganan Field `minat`:**  
> Karena rancangan basis data pada Pertemuan 10 disederhanakan menggunakan satu tabel, pilihan checkbox yang dikirim sebagai larik (array) PHP disatukan menjadi sebuah teks yang dipisahkan dengan tanda koma (misalnya `"HTML, CSS"`).

---

## 2. Perancangan Struktur Tabel MySQL

Sesuai ketentuan penamaan modul P10 berbasis NIM mahasiswa:
- **Nama Basis Data:** `db_pwd_2622500045`
- **Nama Tabel:** `tbl_kontak_2622500045`

Ditambahkan 1 atribut kunci utama (`id`) dengan sifat `AUTO_INCREMENT`, sehingga struktur tabel memiliki **9 kolom**:

| No | Atribut | Tipe Data | Ketentuan | Keterangan |
|---|---|---|---|---|
| 1 | `id` | `INT` | `PRIMARY KEY`, `AUTO_INCREMENT` | Identitas unik setiap baris pesan kontak |
| 2 | `nama` | `VARCHAR(50)` | - | Nama lengkap pengirim (maks 50 karakter) |
| 3 | `email` | `VARCHAR(255)` | - | Alamat email pengirim |
| 4 | `semester` | `TINYINT` | - | Nomor semester (1-14) |
| 5 | `tanggal` | `DATE` | - | Tanggal kunjungan formulir |
| 6 | `jenis_pesan` | `VARCHAR(20)` | - | Jenis pesan (`pertanyaan` / `saran`) |
| 7 | `minat` | `VARCHAR(50)` | - | Topik minat pengguna (`HTML`, `CSS`, atau `HTML, CSS`) |
| 8 | `prodi` | `VARCHAR(2)` | - | Kode program studi (`SI` / `TI`) |
| 9 | `pesan` | `VARCHAR(300)` | - | Isi pesan pengguna (maks 300 karakter) |

---

## 3. Implementasi Perintah SQL (DDL & DML)

### A. Perintah DDL (Data Definition Language)
```sql
CREATE DATABASE IF NOT EXISTS db_pwd_2622500045;
USE db_pwd_2622500045;

CREATE TABLE tbl_kontak_2622500045 (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nama VARCHAR(50),
  email VARCHAR(255),
  semester TINYINT,
  tanggal DATE,
  jenis_pesan VARCHAR(20),
  minat VARCHAR(50),
  prodi VARCHAR(2),
  pesan VARCHAR(300)
);
```

### B. Perintah DML (Data Manipulation Language)
```sql
INSERT INTO tbl_kontak_2622500045 
(nama, email, semester, tanggal, jenis_pesan, minat, prodi, pesan)
VALUES 
('Yohanes Setiawan Japriadi', 'ysetiawan@atmaluhur.ac.id', 2, '2026-11-15', 'saran', 'HTML, CSS', 'TI', 'rajin-rajin lah belajar, jangan sampai menyesal kemudian atau ngeribetin dosen'),
('Andi', 'andi@example.com', 2, '2026-11-15', 'pertanyaan', 'HTML, CSS', 'TI', 'Saya ingin belajar pemrograman web.'),
('Rian', '2622500045@mahasiswa.atmaluhur.ac.id', 4, '2026-11-25', 'pertanyaan', 'HTML, CSS', 'SI', 'Saya ingin memahami rancangan basis data MySQL satu tabel.');
```

---

## 4. Hasil Pengujian dan Ekspor Basis Data

1. **Struktur Tabel:** Telah diperiksa melalui tab *Structure* phpMyAdmin dan query `DESCRIBE tbl_kontak_2622500045;`. Kesembilan atribut telah sesuai dengan tipe data dan atribut `id` telah menjadi `PRIMARY KEY` dengan sifat `AUTO_INCREMENT`.
2. **Pemasukan Data:** Data awal berhasil dimasukkan tanpa adanya error.
3. **Pemeriksaan Data:** Tab *Browse* menampilkan data dengan kolom `id` terisi otomatis berturut-turut (1, 2, 3), dan nilai kolom `minat` tersimpan rapi sebagai teks terpisah koma.
4. **Ekspor SQL:** Basis data telah diekspor menggunakan metode *Quick* dengan format *SQL*, menghasilkan berkas `db_pwd_2622500045.sql` yang kini tersimpan pada direktori `pertemuan-10/`.

---

## 5. Riwayat Commit Git

Commit dilakukan secara bertahap sesuai instruksi modul:
1. `git commit -m "menyalin artefak pertemuan-09 ke pertemuan-10 sebagai baseline"`
2. `git commit -m "menyiapkan direktori dan lingkungan pengembangan pertemuan-10"`
3. `git commit -m "memeriksa kesiapan phpMyAdmin dan repositori pertemuan-10"`
4. `git commit -m "mengidentifikasi kebutuhan data formulir kontak P10"`
5. `git commit -m "menentukan data formulir yang akan disimpan ke basis data"`
6. `git commit -m "menentukan representasi data pilihan minat"`
7. `git commit -m "menentukan nama basis data dan tabel P10"`
8. `git commit -m "merancang atribut dan tipe data tabel kontak"`
9. `git commit -m "menentukan primary key dan auto increment tabel kontak"`
10. `git commit -m "memeriksa rancangan akhir struktur tabel kontak"`
11. `git commit -m "membuat basis data db_pwd_2622500045 dan tabel tbl_kontak_2622500045"`
12. `git commit -m "memasukkan data awal ke tabel kontak"`
13. `git commit -m "memeriksa data awal pada tabel kontak"`
14. `git commit -m "mengekspor basis data ke berkas SQL"`
15. `git commit -m "memeriksa kelengkapan berkas ekspor SQL dan dokumentasi akhir P10"`