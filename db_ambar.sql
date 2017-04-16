-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2017 at 05:24 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ambar`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_trans` int(10) NOT NULL,
  `id_supplier` int(10) DEFAULT NULL,
  `tanggal_harga` date DEFAULT NULL,
  `harga_volume` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_trans`, `id_supplier`, `tanggal_harga`, `harga_volume`) VALUES
(1, 47, '2017-04-15', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` char(8) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
('1', 'admin'),
('2', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `id_monitor` int(10) NOT NULL,
  `nama_supir` varchar(50) DEFAULT NULL,
  `nopol_armada` char(10) DEFAULT NULL,
  `jenis_bak` char(10) DEFAULT NULL,
  `volume` float DEFAULT NULL,
  `id_supplier` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL,
  `waktu_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`id_monitor`, `nama_supir`, `nopol_armada`, `jenis_bak`, `volume`, `id_supplier`, `id_user`, `waktu_input`) VALUES
(1, 'paijo', 'L 4234 LK', '1', 29, 47, 1, '2017-04-15'),
(3, 'Pai2', 'N 1234 LA', 'B', 90, 47, 2, '2017-04-15'),
(4, 'hilmi', 'N 1234 LA', 'C', 40, 47, 2, '2017-04-15');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama_pemilik` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp_supplier` varchar(50) DEFAULT NULL,
  `tanggal_gabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_pemilik`, `alamat`, `no_telp_supplier`, `tanggal_gabung`) VALUES
(47, 'achmad', 'asdasd', 'asdasd', '2017-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `usr_ambar`
--

CREATE TABLE `usr_ambar` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `tanggal_gabung` date DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `username` char(8) NOT NULL,
  `password` char(8) NOT NULL,
  `id_level` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usr_ambar`
--

INSERT INTO `usr_ambar` (`id_user`, `nama_user`, `tanggal_gabung`, `alamat`, `no_telp`, `username`, `password`, `id_level`) VALUES
(1, 'Achmad Fathulla', '2017-04-02', 'malang', '123', 'pakjarot', '12345678', '1'),
(2, 'ahmad', '2017-04-15', 'malang', '0987123123', 'ahmad', 'ahmad', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga`
--
ALTER TABLE `harga`
  ADD PRIMARY KEY (`id_trans`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id_monitor`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `monitor_ibfk_2` (`id_user`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `usr_ambar`
--
ALTER TABLE `usr_ambar`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga`
--
ALTER TABLE `harga`
  MODIFY `id_trans` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id_monitor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `usr_ambar`
--
ALTER TABLE `usr_ambar`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `harga`
--
ALTER TABLE `harga`
  ADD CONSTRAINT `harga_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `monitor_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usr_ambar` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `monitor_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usr_ambar`
--
ALTER TABLE `usr_ambar`
  ADD CONSTRAINT `usr_ambar_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
