-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 02:04 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertiku`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_tabel`
--

CREATE TABLE `foto_tabel` (
  `FotoID` varchar(50) NOT NULL,
  `TipeID` varchar(50) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_properti`
--

CREATE TABLE `jenis_properti` (
  `TipeID` varchar(50) NOT NULL,
  `PropertiID` varchar(50) NOT NULL,
  `Alamat_properti` varchar(100) NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Harga` double NOT NULL,
  `Luas` double NOT NULL,
  `Jarak` double NOT NULL,
  `Jumlah_cicil` int(11) NOT NULL,
  `Tahun_bangun` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `properti`
--

CREATE TABLE `properti` (
  `PropertiID` varchar(50) NOT NULL,
  `PropertiName` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_tabel`
--
ALTER TABLE `foto_tabel`
  ADD PRIMARY KEY (`FotoID`),
  ADD KEY `fk_foto` (`TipeID`);

--
-- Indexes for table `jenis_properti`
--
ALTER TABLE `jenis_properti`
  ADD PRIMARY KEY (`TipeID`),
  ADD KEY `PropertiID` (`PropertiID`);

--
-- Indexes for table `properti`
--
ALTER TABLE `properti`
  ADD PRIMARY KEY (`PropertiID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_tabel`
--
ALTER TABLE `foto_tabel`
  ADD CONSTRAINT `fk_foto` FOREIGN KEY (`TipeID`) REFERENCES `jenis_properti` (`TipeID`);

--
-- Constraints for table `jenis_properti`
--
ALTER TABLE `jenis_properti`
  ADD CONSTRAINT `fk_properti` FOREIGN KEY (`PropertiID`) REFERENCES `properti` (`PropertiID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
