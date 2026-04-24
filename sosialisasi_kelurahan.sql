-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2026 at 08:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosialisasi_kelurahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `sosialisasi`
--

CREATE TABLE `sosialisasi` (
  `id` int(11) NOT NULL,
  `nama_pemohon` varchar(100) DEFAULT NULL,
  `judul_kegiatan` varchar(150) DEFAULT NULL,
  `tema_sosialisasi` varchar(150) DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `jml_peserta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sosialisasi`
--

INSERT INTO `sosialisasi` (`id`, `nama_pemohon`, `judul_kegiatan`, `tema_sosialisasi`, `tgl_pengajuan`, `tgl_pelaksanaan`, `lokasi`, `jml_peserta`) VALUES
(6, 'SANIA PRATIWI KKN', 'Sosialisasi Pencegahan Penyalahgunaan Narkoba', 'Generasi Sehat Tanpa Narkoba', '2026-04-27', '2026-05-01', 'Balai Desa Winorengi', 50),
(7, 'PUTRI ERNAWATI KADER', 'Sosialisasi Digitalisasi Pelayanan Kelurahan', 'Pelayanan Cepat, Mudah, dan Transparan Berbasis Digital', '2026-04-25', '2026-04-30', 'Balai Desa Cepogo', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$bElAlqH11bmhztv2FYopnuIy/w78KXcibhFOTkIF18UZPlWSobowi'),
(2, 'admin', '$2y$10$p8cE01Ub1UiIdSEhiBD8Le1KIlZyFOHg1JoHD9XTeRnvXQEPdE.bq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sosialisasi`
--
ALTER TABLE `sosialisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sosialisasi`
--
ALTER TABLE `sosialisasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
