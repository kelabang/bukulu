-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2019 at 04:46 AM
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
  `Kategori` varchar(20) DEFAULT NULL,
  `Pengarang` varchar(50) NOT NULL,
  `ISBN` varchar(15) NOT NULL,
  `Jumlah_Halaman` int(4) NOT NULL,
  `Tanggal_Terbit` date NOT NULL,
  `Harga` int(7) NOT NULL,
  `Edisi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`ID`, `Judul_Buku`, `Kategori`, `Pengarang`, `ISBN`, `Jumlah_Halaman`, `Tanggal_Terbit`, `Harga`, `Edisi`) VALUES
(1, 'Tentang Kamu', 'Novel, Fiction', 'Tere Liye', '139786020822341', 524, '2016-10-27', 25000, 1),
(9, 'coba satu', NULL, 'Tere liye', '123123123132', 123, '2019-02-02', 25000, 1),
(10, 'coba satu', NULL, 'Tere liye', '123123123132', 123, '2019-02-02', 25000, 1),
(11, 'coba satu', NULL, 'Tere liye', '123123123132', 123, '2019-02-02', 25000, 1),
(12, 'coba satu', NULL, 'Tere liye', '123123123132', 123, '2019-02-02', 25000, 1),
(13, 'coba satu', NULL, 'Tere liye', '123123123132', 123, '2019-02-02', 25000, 1),
(14, 'coba satu', NULL, 'Tere liye', '123123123132', 123, '2019-02-02', 25000, 1),
(15, 'coba satu', NULL, 'Tere liye', '123123123132', 123, '2019-02-02', 25000, 1);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
