-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2026 at 07:16 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_zoo_pbo_trpl_afanganteng`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_pengunjung` varchar(100) NOT NULL,
  `tanggal_kunjungan` date NOT NULL,
  `hari_kunjungan` enum('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu') NOT NULL,
  `harga_dasar` int NOT NULL,
  `jenis_tiket` enum('Reguler','Terusan','Safari') NOT NULL,
  `status_member` tinyint(1) DEFAULT NULL,
  `paket_wahana` varchar(100) DEFAULT NULL,
  `asal_negara` varchar(50) DEFAULT NULL,
  `nomor_paspor` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_pengunjung`, `tanggal_kunjungan`, `hari_kunjungan`, `harga_dasar`, `jenis_tiket`, `status_member`, `paket_wahana`, `asal_negara`, `nomor_paspor`) VALUES
(1, 'Afan Ganteng', '2026-07-01', 'Rabu', 50000, 'Reguler', 1, NULL, NULL, NULL),
(2, 'Budi Sudarsono', '2026-07-01', 'Rabu', 50000, 'Reguler', 0, NULL, NULL, NULL),
(3, 'Citra Lestari', '2026-07-02', 'Kamis', 50000, 'Reguler', 1, NULL, NULL, NULL),
(4, 'Dedi Cahyadi', '2026-07-03', 'Jumat', 50000, 'Reguler', 0, NULL, NULL, NULL),
(5, 'Eka Putri', '2026-07-04', 'Sabtu', 65000, 'Reguler', 1, NULL, NULL, NULL),
(6, 'Fajar Utama', '2026-07-04', 'Sabtu', 65000, 'Reguler', 0, NULL, NULL, NULL),
(7, 'Gita Gutawa', '2026-07-05', 'Minggu', 65000, 'Reguler', 1, NULL, NULL, NULL),
(8, 'Hendra Wijaya', '2026-07-01', 'Rabu', 100000, 'Terusan', NULL, 'Waterpark + BirdShow', NULL, NULL),
(9, 'Indah Permata', '2026-07-01', 'Rabu', 100000, 'Terusan', NULL, 'Waterpark + ReptileZone', NULL, NULL),
(10, 'Joko Widodo', '2026-07-02', 'Kamis', 100000, 'Terusan', NULL, 'BirdShow + FeedingTime', NULL, NULL),
(11, 'Kurnia Sandi', '2026-07-03', 'Jumat', 100000, 'Terusan', NULL, 'Waterpark Premium', NULL, NULL),
(12, 'Larasati', '2026-07-04', 'Sabtu', 120000, 'Terusan', NULL, 'All Wahana Pass', NULL, NULL),
(13, 'Maman Abdurrahman', '2026-07-04', 'Sabtu', 120000, 'Terusan', NULL, 'Waterpark + BirdShow', NULL, NULL),
(14, 'Nadia Vega', '2026-07-05', 'Minggu', 120000, 'Terusan', NULL, 'All Wahana Pass', NULL, NULL),
(15, 'John Doe', '2026-07-01', 'Rabu', 150000, 'Safari', NULL, NULL, 'Amerika Serikat', 'US1234567'),
(16, 'Michael Smith', '2026-07-01', 'Rabu', 150000, 'Safari', NULL, NULL, 'Inggris', 'UK9876543'),
(17, 'Kim Ji-Won', '2026-07-02', 'Kamis', 150000, 'Safari', NULL, NULL, 'Korea Selatan', 'KR5554432'),
(18, 'Yuki Kato', '2026-07-03', 'Jumat', 150000, 'Safari', NULL, NULL, 'Jepang', 'JP8881122'),
(19, 'Ahmed Abdullah', '2026-07-04', 'Sabtu', 180000, 'Safari', NULL, NULL, 'Arab Saudi', 'SA7776655'),
(20, 'Chen Wei', '2026-07-04', 'Sabtu', 180000, 'Safari', NULL, NULL, 'Tiongkok', 'CN4443322'),
(21, 'Hans Müller', '2026-07-05', 'Minggu', 180000, 'Safari', NULL, NULL, 'Jerman', 'DE1112233'),
(22, 'Afan Ganteng', '2026-07-01', 'Rabu', 50000, 'Reguler', 1, NULL, NULL, NULL),
(23, 'Budi Sudarsono', '2026-07-01', 'Rabu', 50000, 'Reguler', 0, NULL, NULL, NULL),
(24, 'Citra Lestari', '2026-07-02', 'Kamis', 50000, 'Reguler', 1, NULL, NULL, NULL),
(25, 'Dedi Cahyadi', '2026-07-03', 'Jumat', 50000, 'Reguler', 0, NULL, NULL, NULL),
(26, 'Eka Putri', '2026-07-04', 'Sabtu', 65000, 'Reguler', 1, NULL, NULL, NULL),
(27, 'Fajar Utama', '2026-07-04', 'Sabtu', 65000, 'Reguler', 0, NULL, NULL, NULL),
(28, 'Gita Gutawa', '2026-07-05', 'Minggu', 65000, 'Reguler', 1, NULL, NULL, NULL),
(29, 'Hendra Wijaya', '2026-07-01', 'Rabu', 100000, 'Terusan', NULL, 'Waterpark + BirdShow', NULL, NULL),
(30, 'Indah Permata', '2026-07-01', 'Rabu', 100000, 'Terusan', NULL, 'Waterpark + ReptileZone', NULL, NULL),
(31, 'Joko Widodo', '2026-07-02', 'Kamis', 100000, 'Terusan', NULL, 'BirdShow + FeedingTime', NULL, NULL),
(32, 'Kurnia Sandi', '2026-07-03', 'Jumat', 100000, 'Terusan', NULL, 'Waterpark Premium', NULL, NULL),
(33, 'Larasati', '2026-07-04', 'Sabtu', 120000, 'Terusan', NULL, 'All Wahana Pass', NULL, NULL),
(34, 'Maman Abdurrahman', '2026-07-04', 'Sabtu', 120000, 'Terusan', NULL, 'Waterpark + BirdShow', NULL, NULL),
(35, 'Nadia Vega', '2026-07-05', 'Minggu', 120000, 'Terusan', NULL, 'All Wahana Pass', NULL, NULL),
(36, 'John Doe', '2026-07-01', 'Rabu', 150000, 'Safari', NULL, NULL, 'Amerika Serikat', 'US1234567'),
(37, 'Michael Smith', '2026-07-01', 'Rabu', 150000, 'Safari', NULL, NULL, 'Inggris', 'UK9876543'),
(38, 'Kim Ji-Won', '2026-07-02', 'Kamis', 150000, 'Safari', NULL, NULL, 'Korea Selatan', 'KR5554432'),
(39, 'Yuki Kato', '2026-07-03', 'Jumat', 150000, 'Safari', NULL, NULL, 'Jepang', 'JP8881122'),
(40, 'Ahmed Abdullah', '2026-07-04', 'Sabtu', 180000, 'Safari', NULL, NULL, 'Arab Saudi', 'SA7776655'),
(41, 'Chen Wei', '2026-07-04', 'Sabtu', 180000, 'Safari', NULL, NULL, 'Tiongkok', 'CN4443322'),
(42, 'Hans Müller', '2026-07-05', 'Minggu', 180000, 'Safari', NULL, NULL, 'Jerman', 'DE1112233');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
