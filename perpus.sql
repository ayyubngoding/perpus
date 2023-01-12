-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 12:46 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `id_anggota` int(11) NOT NULL,
  `npm` varchar(250) NOT NULL,
  `nama_anggota` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `nohp` int(12) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`id_anggota`, `npm`, `nama_anggota`, `alamat`, `nohp`, `keterangan`) VALUES
(16, '7205', 'DAIF', 'BANGKAL', 896783456, NULL),
(17, '7204', 'AJIS ', 'BATANG', 896783456, NULL),
(21, '720520012', 'Ayyu', 'Paberasan', 2147483647, 'meminjam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(255) NOT NULL,
  `nama_buku` varchar(250) NOT NULL,
  `penulis` varchar(250) NOT NULL,
  `penerbit` varchar(250) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `stok` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `kode_buku`, `nama_buku`, `penulis`, `penerbit`, `tahun_terbit`, `stok`) VALUES
(6, 'KD01', 'preman pensiun', 'hudan1', 'Gramedia', '2022-12-01', 8),
(11, 'KD02', 'puisi', 'ajiz', 'umam', '2023-01-04', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kembali`
--

CREATE TABLE `tbl_kembali` (
  `id_kembali` int(11) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `batas_pinjam` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL,
  `id_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
(14, 16, 6, '11-01-23', '17-01-23'),
(15, 17, 6, '11-01-23', '17-01-23'),
(16, 21, 11, '11-01-23', '17-01-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tbl_kembali`
--
ALTER TABLE `tbl_kembali`
  ADD PRIMARY KEY (`id_kembali`),
  ADD UNIQUE KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_buku` (`id_buku`) USING BTREE,
  ADD KEY `id_anggota` (`id_anggota`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_kembali`
--
ALTER TABLE `tbl_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kembali`
--
ALTER TABLE `tbl_kembali`
  ADD CONSTRAINT `tbl_kembali_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tbl_pinjam` (`id_pinjam`);

--
-- Constraints for table `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD CONSTRAINT `tbl_pinjam_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `tbl_anggota` (`id_anggota`),
  ADD CONSTRAINT `tbl_pinjam_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `tbl_buku` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
