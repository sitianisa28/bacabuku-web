-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 09:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id_akses` varchar(4) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id_akses`, `keterangan`) VALUES
('1', 'admin'),
('2', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_buku`
--

CREATE TABLE `daftar_buku` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_file` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1:IPA, 2:IPS, 3:BAHASA, 4:BUKU UJIAN, 5:LAINNYA',
  `pengarang_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penerbit_buku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_halaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftar_buku`
--

INSERT INTO `daftar_buku` (`id`, `nama_file`, `dokumen`, `judul_buku`, `level`, `pengarang_buku`, `penerbit_buku`, `jumlah_halaman`) VALUES
(1, 'file_1591449933.png', 'file_1591449933.png', 'tereliye', 'IPA', 'tereliye', 'bintang masa', 130),
(6, 'CRUD.png', '', 'Ayo', 'IPS', 'SI', 'SI', 1),
(7, 'file_1591288705.png', '', 'j', 'j', 'j', 'j', 7),
(8, 'file_1591288782.png', '', 'j', 'j', 'j', 'j', 7),
(9, 'file_1591289035.png', '', 'j', 'j', 'j', 'j', 1),
(10, 'file_1591289185.png', '', 'h', 'h', 'h', 'h', 2),
(11, 'file_1591289375.png', '', 'j', 'j', 'k', 'jj', 2),
(12, 'file_1591289644.png', '', 'h', 'h', 'h', 'h', 3),
(13, 'file_1591290105.png', '', '78', 'iPA', 'IY', 'Y', 3),
(14, 'file_1591449794.png', '', 'h', 'j', 'h', 'h', 1),
(15, 'file_1591450350.png', '', 'AKu', 'AKu', 'AKu', 'AKu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_user`
--

CREATE TABLE `daftar_user` (
  `user_id` int(10) NOT NULL,
  `id_akses` varchar(10) NOT NULL COMMENT '1:admin, 2:siswa',
  `Nama_lengkap` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_user`
--

INSERT INTO `daftar_user` (`user_id`, `id_akses`, `Nama_lengkap`, `Username`, `Password`) VALUES
(1, '1', 'nizelia', 'seliak', '123'),
(6, '1', 'nizelia', 'seliakuloo', '12345'),
(8, '2', 'viqih zamzami', 'ih', '123');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `level` varchar(10) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `level`, `kategori`) VALUES
(1, '1', 'IPA'),
(2, '2', 'IPS'),
(3, '3', 'BAHASA INDONESIA'),
(4, '4', 'LAINNYA'),
(5, '5', 'Romance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `daftar_buku`
--
ALTER TABLE `daftar_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_user`
--
ALTER TABLE `daftar_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_buku`
--
ALTER TABLE `daftar_buku`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `daftar_user`
--
ALTER TABLE `daftar_user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
