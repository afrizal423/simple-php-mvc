-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 19, 2020 at 09:07 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantin`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `kode_pesanan` varchar(5) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_warung` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `id_warung`, `nama_menu`, `harga`) VALUES
(1, 1, 'Nasi goreng', 12000),
(2, 2, 'Soto Ayam original', 10000),
(3, 3, 'Nasi Goreng', 12000),
(4, 3, 'Mie Goreng', 12000),
(5, 2, 'Soto ayam Kulit', 12000),
(6, 2, 'Soto ayam Jeroan', 12000),
(7, 2, 'Soto ayam Spesial', 12000),
(8, 4, 'Nasi kuning', 10000),
(9, 4, 'Nasi Ayam Krispy', 12000),
(10, 4, 'Nasi ayam Katsu', 10000),
(11, 5, 'Kacang coklat pisang', 10000),
(12, 5, 'Kacang pisang nanas', 10000),
(13, 5, 'Coklat pisang bluebarry', 10000),
(14, 5, 'Kacang Strawberry keju', 10000),
(15, 5, 'Coklat keju oreo', 10000),
(16, 6, 'Geprek lvl cabe 0-10 ', 10000),
(17, 6, 'Geprek lvl cabe 10-20 ', 13000),
(18, 6, 'Geprek lvl cabe >20 ', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `kode_pesanan` varchar(5) NOT NULL,
  `nama_pembeli` varchar(100) DEFAULT NULL,
  `tempat_duduk` varchar(50) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `status` enum('lunas','hutang') NOT NULL,
  `waktu` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `warung`
--

CREATE TABLE `warung` (
  `id_warung` int(11) NOT NULL,
  `nama_warung` varchar(100) NOT NULL,
  `nama_pemilik` varchar(100) DEFAULT NULL,
  `no_kantin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warung`
--

INSERT INTO `warung` (`id_warung`, `nama_warung`, `nama_pemilik`, `no_kantin`) VALUES
(1, 'Mama', 'mama', 1),
(2, 'Cak so', 'Cak so', 2),
(3, 'Warung pojok', NULL, 3),
(4, 'Warung Bu Par', 'Bu Par', 12),
(5, 'Crepes', 'gatau', 11),
(6, 'Geprek bu Choy', 'bu Choy', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`kode_pesanan`);

--
-- Indexes for table `warung`
--
ALTER TABLE `warung`
  ADD PRIMARY KEY (`id_warung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `warung`
--
ALTER TABLE `warung`
  MODIFY `id_warung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
