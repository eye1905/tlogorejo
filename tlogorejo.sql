-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 11, 2018 at 12:37 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tlogorejo`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(10) NOT NULL,
  `nama_kabupaten` varchar(10) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `log_time` text NOT NULL,
  `id_provinsi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `propinsi`
--

CREATE TABLE `propinsi` (
  `id_provinsi` int(10) NOT NULL,
  `nama_provinsi` text NOT NULL,
  `status` enum('0','1') NOT NULL,
  `log_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propinsi`
--

INSERT INTO `propinsi` (`id_provinsi`, `nama_provinsi`, `status`, `log_time`) VALUES
(1, 'Kalimantan Selatan', '1', ''),
(2, 'Jawa Tengah', '1', ''),
(3, 'Jawa Barat', '1', ''),
(4, 'Jakarta Selatan', '1', '2018-03-10 09:07:03pm'),
(5, 'Nusa Tenggara Timur', '1', '2018-03-10 09:56:27pm'),
(6, 'D.I. Yogyakarta', '1', '2018-03-10 09:09:27pm'),
(7, 'Nusa Tenggara Barat', '1', '2018-03-10 09:55:39pm'),
(8, 'Kalimantan Timur', '1', '2018-03-10 10:30:07pm'),
(9, 'Bali', '1', '2018-03-11 09:37:27am'),
(10, 'Banten', '1', '2018-03-11 11:06:16am'),
(11, 'Jawa Timur', '1', '2018-03-11 11:06:51am'),
(12, 'Papua Barat', '1', '2018-03-11 11:29:14am'),
(13, 'Sulawesi Utara', '1', '2018-03-11 11:30:26am');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `propinsi`
--
ALTER TABLE `propinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `propinsi`
--
ALTER TABLE `propinsi`
  MODIFY `id_provinsi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
