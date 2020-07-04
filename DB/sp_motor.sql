-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2020 pada 21.36
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp_motor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cf_aturan`
--

CREATE TABLE `cf_aturan` (
  `id` int(11) NOT NULL,
  `id_gejala` int(11) NOT NULL,
  `id_kerusakan` int(11) NOT NULL,
  `md` float NOT NULL,
  `mb` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cf_aturan`
--

INSERT INTO `cf_aturan` (`id`, `id_gejala`, `id_kerusakan`, `md`, `mb`) VALUES
(109, 1, 1, 0.7, 0.2),
(110, 2, 1, 0.6, 0.2),
(111, 3, 1, 0.6, 0.2),
(112, 4, 1, 0.6, 0.2),
(118, 5, 1, 0.6, 0.2),
(119, 5, 2, 0.7, 0.2),
(120, 6, 2, 0.8, 0.3),
(121, 7, 2, 0.9, 0.1),
(122, 8, 3, 0.8, 0.1),
(123, 9, 3, 0.6, 0.2),
(124, 9, 3, 0.8, 0.2),
(125, 10, 3, 0.9, 0.1),
(126, 11, 3, 0.7, 0.3),
(127, 11, 4, 0.6, 0.2),
(128, 12, 4, 0.8, 0.2),
(129, 3, 4, 0.7, 0.3),
(130, 5, 4, 0.7, 0.2),
(131, 13, 4, 0.8, 0.2),
(132, 3, 5, 0.6, 0.2),
(133, 2, 5, 0.7, 0.3),
(134, 4, 5, 0.6, 0.2),
(135, 13, 5, 0.7, 0.2),
(136, 14, 5, 0.9, 0.1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `id` int(11) NOT NULL,
  `kd_gejala` varchar(16) NOT NULL,
  `gejala` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`id`, `kd_gejala`, `gejala`) VALUES
(1, 'G-01', 'Motor kurang responsif'),
(2, 'G-02', 'Motor brebet saat RPM tinggi'),
(3, 'G-03', 'Motor sulit dihidupkan'),
(4, 'G-04', 'Mesin motor mati sesaat'),
(5, 'G-05', 'Suara mesin kasar saat distarter'),
(6, 'G-06', 'Mesin gampang panas'),
(7, 'G-07', 'Indikator oli menyala'),
(8, 'G-08', 'Suara dari CVT box kasar'),
(9, 'G-09', 'Motor terasa bergetar saat dihidupkan'),
(10, 'G-10', 'Terdepat keretakan / serabut pada Van Belt'),
(11, 'G-11', 'Tarikan motir berkurang saat tanjakan'),
(12, 'G-12', 'Boros bahan bakar'),
(13, 'G-13', 'Asap knalpot berwarna Hitam'),
(14, 'G-14', 'Mesin mati dan tidak dapat dinyalakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerusakan`
--

CREATE TABLE `kerusakan` (
  `id` int(11) NOT NULL,
  `kd_kerusakan` varchar(5) NOT NULL,
  `kerusakan` varchar(255) NOT NULL,
  `penanganan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kerusakan`
--

INSERT INTO `kerusakan` (`id`, `kd_kerusakan`, `kerusakan`, `penanganan`) VALUES
(1, 'KR-01', 'Busi kotor', 'Bersihkan busi'),
(2, 'KR-02', 'Telat ganti oli', 'Ganti oli'),
(3, 'KR-03', 'CVT Rusak', 'Ganti CVT'),
(4, 'KR-04', 'Filter udara kotor', 'Bersihkan'),
(5, 'KR-05', 'Injector Rusak', 'Ganti Injector');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gejala_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_diagnosa`
--

CREATE TABLE `riwayat_diagnosa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `kerusakan` varchar(20) NOT NULL,
  `kepercayaan` float NOT NULL,
  `penanganan` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(50) NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(75) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `is_active` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`, `is_active`) VALUES
(1, 'Angga', 'admin', '$2y$10$J1FQu.4GteTpQ4nMjM34zeivhBDmNPjp80iTd4cag.1YFX1vPj5ga', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cf_aturan`
--
ALTER TABLE `cf_aturan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gejala_id` (`id_gejala`),
  ADD KEY `penyakit_id` (`id_kerusakan`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cf_aturan`
--
ALTER TABLE `cf_aturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT untuk tabel `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kerusakan`
--
ALTER TABLE `kerusakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT untuk tabel `riwayat_diagnosa`
--
ALTER TABLE `riwayat_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
