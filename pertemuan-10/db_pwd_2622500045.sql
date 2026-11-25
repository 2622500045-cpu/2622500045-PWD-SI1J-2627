-- phpMyAdmin SQL Dump
-- version 5.2.1
-- Host: localhost:3306
-- Generation Time: Nov 25, 2026 at 10:40 AM
-- Server version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Basis Data: `db_pwd_2622500045`
--
CREATE DATABASE IF NOT EXISTS `db_pwd_2622500045` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db_pwd_2622500045`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kontak_2622500045`
--

DROP TABLE IF EXISTS `tbl_kontak_2622500045`;
CREATE TABLE `tbl_kontak_2622500045` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `semester` tinyint NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_pesan` varchar(20) NOT NULL,
  `minat` varchar(50) NOT NULL,
  `prodi` varchar(2) NOT NULL,
  `pesan` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tbl_kontak_2622500045`
--

INSERT INTO `tbl_kontak_2622500045` (`id`, `nama`, `email`, `semester`, `tanggal`, `jenis_pesan`, `minat`, `prodi`, `pesan`) VALUES
(1, 'Yohanes Setiawan Japriadi', 'ysetiawan@atmaluhur.ac.id', 2, '2026-11-15', 'saran', 'HTML, CSS', 'TI', 'rajin-rajin lah belajar, jangan sampai menyesal kemudian atau ngeribetin dosen'),
(2, 'Andi', 'andi@example.com', 2, '2026-11-15', 'pertanyaan', 'HTML, CSS', 'TI', 'Saya ingin belajar pemrograman web.'),
(3, 'Rian', '2622500045@mahasiswa.atmaluhur.ac.id', 4, '2026-11-25', 'pertanyaan', 'HTML, CSS', 'SI', 'Saya ingin memahami rancangan basis data MySQL satu tabel.');

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kontak_2622500045`
--
ALTER TABLE `tbl_kontak_2622500045`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;