-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 02:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_showbiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `agensi`
--

CREATE TABLE `agensi` (
  `id_agensi` int(11) NOT NULL,
  `nama_agensi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agensi`
--

INSERT INTO `agensi` (`id_agensi`, `nama_agensi`) VALUES
(1, 'SM Entertaiment'),
(2, 'JYP Entertaiment'),
(3, 'Wasserman'),
(5, 'YG Entertaiment');

-- --------------------------------------------------------

--
-- Table structure for table `artis`
--

CREATE TABLE `artis` (
  `id_artis` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status_karir` varchar(255) NOT NULL,
  `tahun_debut` int(11) NOT NULL,
  `id_profesi` int(11) NOT NULL,
  `id_agensi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `artis`
--

INSERT INTO `artis` (`id_artis`, `image`, `nama`, `status_karir`, `tahun_debut`, `id_profesi`, `id_agensi`) VALUES
(1, 'EdSheeran.jpg', 'Ed Sheeran', 'Aktif', 2005, 1, 3),
(2, 'SuperJunior.png', 'Super Junior', 'Aktif', 2005, 2, 1),
(3, 'profil-kang-ho-dong.jpg', 'Kang Ho Dong', 'Hiatus', 1993, 3, 1),
(5, 'download.jpg', 'Coldplay', 'Aktif', 1998, 5, 3),
(6, 'images.jpg', 'Baek A Yeon', 'Aktif', 2012, 1, 2),
(10, 'Got7.jpeg', 'Got 7', 'Tidak Aktif', 2015, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `profesi`
--

CREATE TABLE `profesi` (
  `id_profesi` int(11) NOT NULL,
  `nama_profesi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profesi`
--

INSERT INTO `profesi` (`id_profesi`, `nama_profesi`) VALUES
(1, 'Penyanyi Solo'),
(2, 'Boyband'),
(3, 'Komedian'),
(4, 'Aktor'),
(5, 'Band');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agensi`
--
ALTER TABLE `agensi`
  ADD PRIMARY KEY (`id_agensi`);

--
-- Indexes for table `artis`
--
ALTER TABLE `artis`
  ADD PRIMARY KEY (`id_artis`),
  ADD KEY `id_profesi` (`id_profesi`),
  ADD KEY `id_agensi` (`id_agensi`);

--
-- Indexes for table `profesi`
--
ALTER TABLE `profesi`
  ADD PRIMARY KEY (`id_profesi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agensi`
--
ALTER TABLE `agensi`
  MODIFY `id_agensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `artis`
--
ALTER TABLE `artis`
  MODIFY `id_artis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profesi`
--
ALTER TABLE `profesi`
  MODIFY `id_profesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artis`
--
ALTER TABLE `artis`
  ADD CONSTRAINT `artis_ibfk_1` FOREIGN KEY (`id_profesi`) REFERENCES `profesi` (`id_profesi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artis_ibfk_2` FOREIGN KEY (`id_agensi`) REFERENCES `agensi` (`id_agensi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
