-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 26 Mar 2018 pada 10.29
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `artikel_kategori`
--

CREATE TABLE `artikel_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(200) DEFAULT NULL,
  `kategori_status` varchar(200) DEFAULT NULL,
  `kategori_log_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel_kategori`
--

INSERT INTO `artikel_kategori` (`kategori_id`, `kategori_nama`, `kategori_status`, `kategori_log_time`) VALUES
(1, 'Ekonomi & Sosial Budaya', '1', NULL),
(2, 'Olahraga', '1', NULL),
(3, 'Pemerintahan', '1', NULL),
(4, 'Pendidikan', '1', NULL),
(5, 'Gaya Hidup', '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel_kategori`
--
ALTER TABLE `artikel_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel_kategori`
--
ALTER TABLE `artikel_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
