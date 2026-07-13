-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2026 at 04:45 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_risma`
--

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan_lapangan`
--

CREATE TABLE `penyewaan_lapangan` (
  `id_sewa` int NOT NULL,
  `nama_penyewa` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tanggal_sewa` date NOT NULL,
  `jenis_lapangan` enum('Futsal','Badminton','Basket') NOT NULL,
  `durasi_jam` int DEFAULT NULL,
  `jumlah_tim` int DEFAULT NULL,
  `jumlah_court` int DEFAULT NULL,
  `kategori_turnamen` varchar(50) DEFAULT NULL,
  `jumlah_pemain` int DEFAULT NULL,
  `penggunaan_lampu` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penyewaan_lapangan`
--

INSERT INTO `penyewaan_lapangan` (`id_sewa`, `nama_penyewa`, `no_hp`, `tanggal_sewa`, `jenis_lapangan`, `durasi_jam`, `jumlah_tim`, `jumlah_court`, `kategori_turnamen`, `jumlah_pemain`, `penggunaan_lampu`) VALUES
(1, 'Futsal 1', '0811', '2026-07-01', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(2, 'Futsal 2', '0811', '2026-07-02', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(3, 'Futsal 3', '0811', '2026-07-03', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(4, 'Futsal 4', '0811', '2026-07-04', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(5, 'Futsal 5', '0811', '2026-07-05', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(6, 'Futsal 6', '0811', '2026-07-06', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(7, 'Futsal 7', '0811', '2026-07-07', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(8, 'Futsal 8', '0811', '2026-07-08', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(9, 'Futsal 9', '0811', '2026-07-09', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(10, 'Futsal 10', '0811', '2026-07-10', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(11, 'Futsal 11', '0811', '2026-07-11', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(12, 'Futsal 12', '0811', '2026-07-12', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(13, 'Futsal 13', '0811', '2026-07-13', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(14, 'Futsal 14', '0811', '2026-07-14', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(15, 'Futsal 15', '0811', '2026-07-15', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(16, 'Futsal 16', '0811', '2026-07-16', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(17, 'Futsal 17', '0811', '2026-07-17', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(18, 'Futsal 18', '0811', '2026-07-18', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(19, 'Futsal 19', '0811', '2026-07-19', 'Futsal', 2, 2, NULL, NULL, NULL, NULL),
(20, 'Futsal 20', '0811', '2026-07-20', 'Futsal', 1, 2, NULL, NULL, NULL, NULL),
(21, 'Badminton 1', '0822', '2026-07-01', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(22, 'Badminton 2', '0822', '2026-07-02', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(23, 'Badminton 3', '0822', '2026-07-03', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(24, 'Badminton 4', '0822', '2026-07-04', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(25, 'Badminton 5', '0822', '2026-07-05', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(26, 'Badminton 6', '0822', '2026-07-06', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(27, 'Badminton 7', '0822', '2026-07-07', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(28, 'Badminton 8', '0822', '2026-07-08', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(29, 'Badminton 9', '0822', '2026-07-09', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(30, 'Badminton 10', '0822', '2026-07-10', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(31, 'Badminton 11', '0822', '2026-07-11', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(32, 'Badminton 12', '0822', '2026-07-12', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(33, 'Badminton 13', '0822', '2026-07-13', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(34, 'Badminton 14', '0822', '2026-07-14', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(35, 'Badminton 15', '0822', '2026-07-15', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(36, 'Badminton 16', '0822', '2026-07-16', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(37, 'Badminton 17', '0822', '2026-07-17', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(38, 'Badminton 18', '0822', '2026-07-18', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(39, 'Badminton 19', '0822', '2026-07-19', 'Badminton', 2, NULL, 1, 'Umum', NULL, NULL),
(40, 'Badminton 20', '0822', '2026-07-20', 'Badminton', 1, NULL, 2, 'Turnamen', NULL, NULL),
(41, 'Basket 1', '0833', '2026-07-01', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(42, 'Basket 2', '0833', '2026-07-02', 'Basket', 1, NULL, NULL, NULL, 10, 0),
(43, 'Basket 3', '0833', '2026-07-03', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(44, 'Basket 4', '0833', '2026-07-04', 'Basket', 1, NULL, NULL, NULL, 10, 0),
(45, 'Basket 5', '0833', '2026-07-05', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(46, 'Basket 6', '0833', '2026-07-06', 'Basket', 1, NULL, NULL, NULL, 10, 0),
(47, 'Basket 7', '0833', '2026-07-07', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(48, 'Basket 8', '0833', '2026-07-08', 'Basket', 1, NULL, NULL, NULL, 10, 0),
(49, 'Basket 9', '0833', '2026-07-09', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(50, 'Basket 10', '0833', '2026-07-10', 'Basket', 1, NULL, NULL, NULL, 10, 0),
(51, 'Basket 11', '0833', '2026-07-11', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(52, 'Basket 12', '0833', '2026-07-12', 'Basket', 1, NULL, NULL, NULL, 10, 0),
(53, 'Basket 13', '0833', '2026-07-13', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(54, 'Basket 14', '0833', '2026-07-14', 'Basket', 1, NULL, NULL, NULL, 10, 0),
(55, 'Basket 15', '0833', '2026-07-15', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(56, 'Basket 16', '0833', '2026-07-16', 'Basket', 1, NULL, NULL, NULL, 10, 0),
(57, 'Basket 17', '0833', '2026-07-17', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(58, 'Basket 18', '0833', '2026-07-18', 'Basket', 1, NULL, NULL, NULL, 10, 0),
(59, 'Basket 19', '0833', '2026-07-19', 'Basket', 2, NULL, NULL, NULL, 10, 1),
(60, 'Basket 20', '0833', '2026-07-20', 'Basket', 1, NULL, NULL, NULL, 10, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penyewaan_lapangan`
--
ALTER TABLE `penyewaan_lapangan`
  ADD PRIMARY KEY (`id_sewa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penyewaan_lapangan`
--
ALTER TABLE `penyewaan_lapangan`
  MODIFY `id_sewa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
