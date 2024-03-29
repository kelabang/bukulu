-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2019 at 09:22 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `ID` int(5) NOT NULL,
  `Judul_Buku` varchar(50) NOT NULL,
  `Pengarang` varchar(50) NOT NULL,
  `ISBN` varchar(15) NOT NULL,
  `Jumlah_Halaman` int(4) NOT NULL,
  `Tanggal_Terbit` date NOT NULL,
  `Harga` int(7) NOT NULL,
  `Edisi` int(2) NOT NULL,
  `image` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`ID`, `Judul_Buku`, `Pengarang`, `ISBN`, `Jumlah_Halaman`, `Tanggal_Terbit`, `Harga`, `Edisi`, `image`) VALUES
(18, 'Lanjut', 'Tere Liye', '123142', 1231, '2019-07-06', 2000000, 1, NULL),
(20, 'hehe hoho', 'hehe1', '3214213', 1234, '2019-07-16', 200000, 2, NULL),
(22, 'Makan', 'Imam', '12313214', 1231, '2019-07-03', 12000, 1, NULL),
(23, '1000 pasukan', 'imam', '12312', 1324, '2019-07-19', 300000, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku_kategori`
--

CREATE TABLE `tb_buku_kategori` (
  `buku_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `ID` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`ID`, `nama`, `parent`) VALUES
(1, 'Agama', NULL),
(2, 'Islam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi`
--

CREATE TABLE `tb_lokasi` (
  `ID` int(3) NOT NULL,
  `Negara` varchar(20) NOT NULL,
  `Provinsi` varchar(20) NOT NULL,
  `Kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `ID` int(3) NOT NULL,
  `Nama_Penerbit` varchar(25) NOT NULL,
  `Lokasi` varchar(50) NOT NULL,
  `Tanggal_Berdiri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengarang`
--

CREATE TABLE `tb_pengarang` (
  `ID` int(3) NOT NULL,
  `Nama` varchar(25) NOT NULL,
  `TTL` date NOT NULL,
  `Judul_Buku` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `tb_buku_kategori`
--
ALTER TABLE `tb_buku_kategori`
  ADD PRIMARY KEY (`buku_id`,`kategori_id`),
  ADD UNIQUE KEY `index_buku_kategori` (`buku_id`,`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
