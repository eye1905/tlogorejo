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
-- Struktur dari tabel `artikel_post`
--

CREATE TABLE `artikel_post` (
  `artikel_id` int(11) NOT NULL,
  `artikel_judul` varchar(200) DEFAULT NULL,
  `artikel_isi` text,
  `artikel_tanggal` varchar(200) DEFAULT NULL,
  `artikel_image` varchar(200) DEFAULT NULL,
  `artikel_author` varchar(200) DEFAULT NULL,
  `artikel_kategori` int(11) DEFAULT NULL,
  `artikel_status` int(11) DEFAULT NULL,
  `artikel_soft_delete` int(11) NOT NULL,
  `artikel_log_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel_post`
--

INSERT INTO `artikel_post` (`artikel_id`, `artikel_judul`, `artikel_isi`, `artikel_tanggal`, `artikel_image`, `artikel_author`, `artikel_kategori`, `artikel_status`, `artikel_soft_delete`, `artikel_log_time`) VALUES
(14, 'Kecelakaan Beruntun di Bojonegoro, Seorang Pemotor Meninggal Dunia di TKP', '<p>Bojonegoro Kota - Kecelakaan beruntun yang mengakibatkan korban jiwa terjadi di Jalan Ahmad Yani turut wilayah Desa Sukorejo Kecamatan Bojonegoro Kota, pada Selasa (13/03/2018) sekira pukul 20.30 WIB tadi malam. Pengendara sepeda motor Yamaha Mio yang hendak menyeberang dengan memotong jalan, disenggol sepeda motor yang tidak diketahui identitasnya, yang berjalan searah di belakangnya sehingga oleng dan selanjsutnya ditabrak oleh sepeda motor Honda Scoopy, yang juga berjalan searah di belakangnya.</p>\r\n\r\n<p>Akibatnya pengendara Yamaha Mio meninggal dunia di lokasi kejadian sedangkan pengendara Honda Scoopy berikut pemboncengnya, mengalami luka-luka dan harus mendapatkan perawatan medis.</p>\r\n\r\n<p>Informasi yang didapat media ini dari  Kanit Laka Lntas Sat lantas Polres Bojonegoro, IPDA Mukari, yang terlibat dalam kecelakaan tersebut sepeda motor Yamaha Mio nomor polisi S 4449 CH, yang dikendarai H  Subkir (70), warga Desa SarirejoRT 005 rw 002, Kecamatan  Balen, dengan sepeda motor Honda Scoopy nomor polisi S 4899 CX, yang dikendarai Misbahul Munir (19), berboncengan dengan Eko Bagus Pambudi (21), keduanya warga Desa Prigi RT 005 RW 001 Kec Kanor Kabupaten Bojonegoro, serta dengan kendaraan sepeda motor yang tidak diketahui identitasnya, karena setelah terjadi senggolan, kendaraan tersebut langsung meninggalkan lokasi kejadian.</p>\r\n\r\n<p>Ipda Mukari menambahkan bahwa berdasarkan hasil olah TKP dan menurut keterangan saksi-saksi, bahwa peristiwa laka lantas tersebut bermula saat sepeda motor Yamaha Mio nomor polisi S 4449 CH, yang dikendari korban, berjalan dari arah timur ke barat dan sesampinya di TKP, berhenti di tepi jalan sebelah kiri atau selatan.</p>\r\n', '14/03/2018', '76d752765e971524f8289e56fb647a91.jpg', 'Admin', 4, 1, 1, '2018-03-26 14:46:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel_post`
--
ALTER TABLE `artikel_post`
  ADD PRIMARY KEY (`artikel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel_post`
--
ALTER TABLE `artikel_post`
  MODIFY `artikel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
