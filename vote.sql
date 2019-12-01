-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 01 Des 2019 pada 14.20
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) UNSIGNED NOT NULL,
  `nama_admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_admin` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_admin` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` enum('admin','panitia-validasi','wakil ketua III','dosen','panitia-pengawas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_terakhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `user_admin`, `password_admin`, `hak_akses`, `login_terakhir`) VALUES
(1, 'Faqih', 'Admin', 'Admin11', 'admin', '2019-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailcapres`
--

CREATE TABLE `detailcapres` (
  `id_detail_capres` int(10) UNSIGNED NOT NULL,
  `nama_capres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_capres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan_capres` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_capres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_paslon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailcawapres`
--

CREATE TABLE `detailcawapres` (
  `id_detail_cawapres` int(10) UNSIGNED NOT NULL,
  `nama_cawapres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_cawapres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan_cawapres` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_cawapres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_paslon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(10) UNSIGNED NOT NULL,
  `nama_jurusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Sistem Informasi'),
(2, 'Sistem Komputer'),
(3, 'Manajemen Informasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paslon`
--

CREATE TABLE `paslon` (
  `id_paslon` int(10) UNSIGNED NOT NULL,
  `nama_koalisi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_paslon` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan_koalisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_urut` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visimisi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(10) UNSIGNED NOT NULL,
  `npm_pemilih` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pemilih` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telah_memilih` enum('ya','tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `terakhir_login` datetime NOT NULL,
  `id_jurusan` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `npm_pemilih`, `nama_pemilih`, `tgl_lahir`, `telah_memilih`, `terakhir_login`, `id_jurusan`) VALUES
(1, '10417001', 'Aan aji', '10-01-1999', 'tidak', '2019-11-30 11:48:13', 1),
(2, '10417002', 'Aulia', '30-10-1999', 'tidak', '2019-11-30 00:00:00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilihan`
--

CREATE TABLE `pemilihan` (
  `id_pemilihan` int(10) UNSIGNED NOT NULL,
  `waktu_memilih` datetime NOT NULL DEFAULT current_timestamp(),
  `id_pemilih` int(10) UNSIGNED NOT NULL,
  `id_paslon` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admin_user_admin_unique` (`user_admin`);

--
-- Indeks untuk tabel `detailcapres`
--
ALTER TABLE `detailcapres`
  ADD PRIMARY KEY (`id_detail_capres`),
  ADD KEY `detailcapres_id_paslon_foreign` (`id_paslon`);

--
-- Indeks untuk tabel `detailcawapres`
--
ALTER TABLE `detailcawapres`
  ADD PRIMARY KEY (`id_detail_cawapres`),
  ADD KEY `detailcawapres_id_paslon_foreign` (`id_paslon`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indeks untuk tabel `paslon`
--
ALTER TABLE `paslon`
  ADD PRIMARY KEY (`id_paslon`);

--
-- Indeks untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`),
  ADD KEY `pemilih_id_jurusan_foreign` (`id_jurusan`);

--
-- Indeks untuk tabel `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD PRIMARY KEY (`id_pemilihan`),
  ADD KEY `pemilihan_id_pemilih_foreign` (`id_pemilih`),
  ADD KEY `pemilihan_id_paslon_foreign` (`id_paslon`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `detailcapres`
--
ALTER TABLE `detailcapres`
  MODIFY `id_detail_capres` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detailcawapres`
--
ALTER TABLE `detailcawapres`
  MODIFY `id_detail_cawapres` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `paslon`
--
ALTER TABLE `paslon`
  MODIFY `id_paslon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pemilihan`
--
ALTER TABLE `pemilihan`
  MODIFY `id_pemilihan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detailcapres`
--
ALTER TABLE `detailcapres`
  ADD CONSTRAINT `detailcapres_id_paslon_foreign` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detailcawapres`
--
ALTER TABLE `detailcawapres`
  ADD CONSTRAINT `detailcawapres_id_paslon_foreign` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD CONSTRAINT `pemilih_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD CONSTRAINT `pemilihan_id_paslon_foreign` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemilihan_id_pemilih_foreign` FOREIGN KEY (`id_pemilih`) REFERENCES `pemilih` (`id_pemilih`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
