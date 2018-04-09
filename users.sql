-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Apr 2018 pada 05.08
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `user_id` varchar(200) NOT NULL,
  `user_nama` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_level` int(11) DEFAULT NULL,
  `user_soft_delete` int(11) DEFAULT NULL,
  `user_log_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `user_nama`, `user_password`, `user_level`, `user_soft_delete`, `user_log_time`) VALUES
('eye', 'Eren Yoga Eriyana', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, '2018-03-30 14:50:57'),
('rozakromadhoni', 'Abdul Rozak Romadhoni', 'e10adc3949ba59abbe56e057f20f883e', 1, 0, '0000-00-00 00:00:00'),
('rudib', 'Rudi Bachtiar', '3b712de48137572f3849aabd5666a4e3', 1, 1, '2018-03-30 16:54:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
