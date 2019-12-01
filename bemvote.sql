-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 14, 2018 at 05:25 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bemvote`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` tinyint(2) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username_admin` varchar(100) NOT NULL,
  `password_admin` varchar(100) NOT NULL,
  `hak_akses` enum('admin','operator-teknik','operator-fekon','operator-fok','operator-mipa','operator-fis','operator-fip','operator-hukum','operator-pertanian','operator-fsb','operator-fik','dekan','rektor') NOT NULL,
  `login_terakhir` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username_admin`, `password_admin`, `hak_akses`, `login_terakhir`) VALUES
(1, 'Adnan Kasim', 'adnankasim', '21', 'admin', '2018-04-13 17:55:46'),
(2, 'Ferdiansyah Usman', 'ferus123', 'ferus', 'operator-teknik', '2018-04-13 14:48:04'),
(4, 'Moh. Hidayat Koniyo', 'hikon5', 'hikon5', 'dekan', '2018-04-13 14:46:36'),
(5, 'Samsu Qamar Ba\'du', 'samqad7', 'samqad', 'rektor', '2018-04-13 14:41:48'),
(7, 'nanko', 'nanko1', 'nan', 'operator-fekon', '2018-04-02 07:56:19'),
(8, 'Hasan', 'hasan', 'hasan123', 'operator-fok', '2018-03-30 15:03:08'),
(9, 'Husen', 'husen', 'husen123', 'operator-mipa', '2018-03-31 09:30:52'),
(10, 'Andra', 'andra', 'andra321', 'operator-fis', '2018-03-31 10:24:20'),
(12, 'Saddam', 'Saddam', 'saddam12', 'operator-fip', '0000-00-00 00:00:00'),
(13, 'Yorke', 'yorke', 'yorke098', 'operator-hukum', '0000-00-00 00:00:00'),
(14, 'Yoris', 'yoris', 'yoris123', 'operator-pertanian', '0000-00-00 00:00:00'),
(15, 'Dayat', 'dayat', 'dayat456', 'operator-fsb', '2018-03-31 10:23:33'),
(16, 'Ardy', 'ardy', 'ardy021', 'operator-fik', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `detail_capres`
--

CREATE TABLE `detail_capres` (
  `id_detail_capres` tinyint(4) NOT NULL,
  `nama_capres` varchar(100) NOT NULL,
  `fakultas_capres` varchar(100) NOT NULL,
  `jurusan_capres` varchar(100) NOT NULL,
  `prodi_capres` varchar(100) NOT NULL,
  `angkatan_capres` char(4) NOT NULL,
  `gambar_capres` varchar(255) DEFAULT NULL,
  `id_paslon` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_capres`
--

INSERT INTO `detail_capres` (`id_detail_capres`, `nama_capres`, `fakultas_capres`, `jurusan_capres`, `prodi_capres`, `angkatan_capres`, `gambar_capres`, `id_paslon`) VALUES
(1, 'Rian Sulistio', 'Teknik', 'Teknik Informatika', 'Perawat', '2016', 'Logo__Kampus1.png', 3),
(2, 'Krisdewanto', 'Hukum', 'Ilmu Hukum', 'Pendidikan Hukum', '2015', 'bemvotelogo.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_cawapres`
--

CREATE TABLE `detail_cawapres` (
  `id_detail_cawapres` tinyint(4) NOT NULL,
  `nama_cawapres` varchar(100) NOT NULL,
  `fakultas_cawapres` varchar(100) NOT NULL,
  `jurusan_cawapres` varchar(100) NOT NULL,
  `prodi_cawapres` varchar(100) NOT NULL,
  `angkatan_cawapres` char(4) NOT NULL,
  `gambar_cawapres` varchar(255) DEFAULT NULL,
  `id_paslon` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_cawapres`
--

INSERT INTO `detail_cawapres` (`id_detail_cawapres`, `nama_cawapres`, `fakultas_cawapres`, `jurusan_cawapres`, `prodi_cawapres`, `angkatan_cawapres`, `gambar_cawapres`, `id_paslon`) VALUES
(1, 'Fahri Akuba', 'Olahraga & Kesehatan', 'Farmasi', 'Perawat', '2016', 'logo.png', 3),
(2, 'Julisa Amny Tapola', 'Ekonomi', 'Manajemen', 'Manajemen', '2015', 'Logo__Kampus.png', 4);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` tinyint(2) NOT NULL,
  `nama_fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Ilmu Pendidikan'),
(2, 'MIPA'),
(3, 'Ekonomi'),
(4, 'Olahraga & Kesehatan'),
(5, 'Teknik'),
(6, 'Ilmu Sosial'),
(7, 'Ilmu Kelautan'),
(8, 'Pertanian'),
(9, 'Hukum'),
(10, 'Sastra & Budaya');

-- --------------------------------------------------------

--
-- Table structure for table `paslon`
--

CREATE TABLE `paslon` (
  `id_paslon` tinyint(2) NOT NULL,
  `nama_koalisi` varchar(100) NOT NULL,
  `nama_paslon` varchar(100) NOT NULL,
  `fakultas_koalisi` varchar(255) NOT NULL,
  `nomor_urut` char(2) NOT NULL,
  `visimisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paslon`
--

INSERT INTO `paslon` (`id_paslon`, `nama_koalisi`, `nama_paslon`, `fakultas_koalisi`, `nomor_urut`, `visimisi`) VALUES
(3, 'UNG Bersatu', 'Rian & Fahri', 'Teknik, Ilmu Sosial, Ilmu Pendidikan, Ilmu Kelautan, Hukum', '1', '<p>Visi <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br>Misi</p>\r\n<ol>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</li>\r\n</ol>'),
(4, 'Menuju PERUBAHAN!', 'Kris & Lisa', 'Pertanian, Olahraga & Kesehatan, Ilmu Sastra & Budaya, Ekonomi, MIPA', '2', 'Visi <br>\r\n              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n              <br>\r\n              Misi <br>\r\n              <ol>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris </li>\r\n              </ol>');

-- --------------------------------------------------------

--
-- Table structure for table `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` int(11) NOT NULL,
  `nim_pemilih` char(10) NOT NULL,
  `nama_pemilih` varchar(100) NOT NULL,
  `token_pemilih` varchar(10) NOT NULL,
  `status_pemilih` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `telah_memilih` enum('ya','tidak') NOT NULL DEFAULT 'tidak',
  `terakhir_login` datetime NOT NULL,
  `id_fakultas` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `nim_pemilih`, `nama_pemilih`, `token_pemilih`, `status_pemilih`, `telah_memilih`, `terakhir_login`, `id_fakultas`) VALUES
(1512, '531416001', 'Foo', 'qwerty', 'ya', 'ya', '2018-03-30 13:16:12', 1),
(1513, '531416002', 'Fii', 'qwerty', 'ya', 'ya', '2018-03-14 10:17:35', 2),
(1514, '531416003', 'Faa', 'qwerty', 'ya', 'ya', '2018-03-14 10:17:56', 3),
(1515, '531416004', 'Fee', 'qwerty', 'ya', 'ya', '2018-03-14 10:18:35', 4),
(1516, '531416005', 'Fuu', 'qwerty', 'ya', 'ya', '2018-03-14 10:18:48', 5),
(1517, '531416006', 'Bar', 'qwerty', 'ya', 'tidak', '2018-03-30 10:30:00', 6),
(1518, '531416007', 'Ber', 'qwerty', 'ya', 'tidak', '2018-04-09 13:09:54', 7),
(1519, '531416008', 'Bur', 'qwerty', 'ya', 'tidak', '2018-03-14 10:19:37', 8),
(1520, '531416009', 'Bir', 'qwerty', 'ya', 'tidak', '2018-03-14 10:19:54', 9),
(1522, '531416011', 'Baz', 'qwerty', 'ya', 'tidak', '2018-03-14 11:26:15', 1),
(1523, '531416012', 'Bez', 'qwerty', 'ya', 'ya', '2018-04-13 14:49:46', 2),
(1524, '531416013', 'Buz', 'qwerty', 'ya', 'ya', '2018-03-30 16:56:21', 3),
(1525, '531416014', 'Boz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 4),
(1526, '531416015', 'Biz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 5),
(1527, '531416016', 'Bax', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 6),
(1528, '531416017', 'Bex', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 7),
(1529, '531416018', 'Bux', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 8),
(1530, '531416019', 'Box', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 9),
(1531, '531416020', 'Bix', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 10),
(1532, '531416021', 'Tux', 'qwerty', 'tidak', 'tidak', '2018-03-11 10:44:28', 1),
(1533, '531416022', 'Tax', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 2),
(1534, '531416023', 'Tex', 'qwerty', 'ya', 'tidak', '2018-03-30 10:24:36', 3),
(1535, '531416024', 'Tix', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 4),
(1536, '531416025', 'Tox', 'qwerty', 'tidak', 'tidak', '2018-03-12 14:31:34', 5),
(1537, '531416026', 'Muz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 6),
(1538, '531416027', 'Maz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 7),
(1539, '531416028', 'Mez', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 8),
(1540, '531416029', 'Miz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 9),
(1541, '531416030', 'Moz', 'qwerty', 'tidak', 'tidak', '0000-00-00 00:00:00', 10),
(1544, '531416010', 'Bor', 'qwerty', 'ya', 'ya', '2018-03-14 14:30:37', 5);

-- --------------------------------------------------------

--
-- Table structure for table `pemilihan`
--

CREATE TABLE `pemilihan` (
  `id_pemilihan` int(11) NOT NULL,
  `waktu_memilih` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pemilih` int(11) NOT NULL,
  `id_paslon` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemilihan`
--

INSERT INTO `pemilihan` (`id_pemilihan`, `waktu_memilih`, `id_pemilih`, `id_paslon`) VALUES
(61, '2018-03-14 10:17:15', 1512, 3),
(62, '2018-03-14 10:17:38', 1513, 4),
(63, '2018-03-14 10:17:58', 1514, 4),
(64, '2018-03-14 10:18:15', 1515, 3),
(65, '2018-03-14 10:18:51', 1516, 3),
(66, '2018-03-14 14:30:12', 1544, 4),
(67, '2018-03-30 16:53:10', 1524, 3),
(68, '2018-04-13 14:50:13', 1523, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_capres`
--
ALTER TABLE `detail_capres`
  ADD PRIMARY KEY (`id_detail_capres`),
  ADD KEY `id_paslon` (`id_paslon`);

--
-- Indexes for table `detail_cawapres`
--
ALTER TABLE `detail_cawapres`
  ADD PRIMARY KEY (`id_detail_cawapres`),
  ADD KEY `id_paslon` (`id_paslon`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `paslon`
--
ALTER TABLE `paslon`
  ADD PRIMARY KEY (`id_paslon`);

--
-- Indexes for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`),
  ADD UNIQUE KEY `nim_pemilih` (`nim_pemilih`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `nim_pemilih_2` (`nim_pemilih`);

--
-- Indexes for table `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD PRIMARY KEY (`id_pemilihan`),
  ADD KEY `id_pemilih` (`id_pemilih`),
  ADD KEY `id_paslon` (`id_paslon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `detail_capres`
--
ALTER TABLE `detail_capres`
  MODIFY `id_detail_capres` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `detail_cawapres`
--
ALTER TABLE `detail_cawapres`
  MODIFY `id_detail_cawapres` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paslon`
--
ALTER TABLE `paslon`
  MODIFY `id_paslon` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemilih`
--
ALTER TABLE `pemilih`
  MODIFY `id_pemilih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1545;

--
-- AUTO_INCREMENT for table `pemilihan`
--
ALTER TABLE `pemilihan`
  MODIFY `id_pemilihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_capres`
--
ALTER TABLE `detail_capres`
  ADD CONSTRAINT `detail_capres_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_cawapres`
--
ALTER TABLE `detail_cawapres`
  ADD CONSTRAINT `detail_cawapres_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemilih`
--
ALTER TABLE `pemilih`
  ADD CONSTRAINT `pemilih_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemilihan`
--
ALTER TABLE `pemilihan`
  ADD CONSTRAINT `pemilihan_ibfk_1` FOREIGN KEY (`id_paslon`) REFERENCES `paslon` (`id_paslon`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemilihan_ibfk_2` FOREIGN KEY (`id_pemilih`) REFERENCES `pemilih` (`id_pemilih`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
