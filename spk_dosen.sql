-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 11:19 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dosen`
--

CREATE TABLE `data_dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `lama_mengajar` int(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `program_studi` varchar(255) NOT NULL,
  `asal_kampus` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_dosen`
--

INSERT INTO `data_dosen` (`id`, `nama`, `jabatan`, `lama_mengajar`, `pendidikan`, `program_studi`, `asal_kampus`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Annur Fajri, S.Pd.I, M.Ed, Ph.D ', 'Tenaga Pengajar', 1, 'S3', 'Education', 'International Islamic University Malaysia', NULL, NULL, 'Annur Fajri, S.Pd.I, M.Ed, Ph.D '),
(2, 'Kusuma Hati, M.M, M.Kom', 'Lektor', 4, 'S2', 'Magister Manajemen, Magister Komputer', 'Universitas  Budi Luhur, STMIK Nusa Mandirija', NULL, NULL, 'Kusuma Hati, M.M, M.Kom'),
(3, 'aldo rachman', 'guru besar', 4, 's2 ', 'SI', 'YAI', '2021-06-27 10:58:32', '2021-06-27 10:58:32', 'aldo rachman'),
(4, 'yogi setiawan', 'guru besar + rektor', 29, 's3', 'si', 'yai', '2021-06-27 11:01:29', '2021-06-27 11:01:29', 'yogi-setiawan'),
(5, 'Umar Bakrie', 'guru besar', 4, 's2', 'SI', 'YAI', '2021-06-27 11:04:09', '2021-06-27 11:04:09', 'umar_bakrie'),
(6, 'galih pratama', 'guru besar', 4, 's2 yai', 'so', 'yai', '2021-06-29 09:18:26', '2021-06-29 09:18:26', 'galih-pratama'),
(7, 'aldo', 'guru besar', 4, 's2 yai', 'so', 'YAI', '2021-06-29 09:19:56', '2021-06-29 09:19:56', 'aldo'),
(8, 'ganteng', 'guru besar', 34, 's2 yai', 'SI', 'YAI', '2021-06-29 09:20:54', '2021-06-29 09:20:54', 'ganteng'),
(9, 'aldo', 'guru besar', 4, 'asd', 'SI', 'yai', '2021-06-29 09:21:59', '2021-06-29 09:21:59', 'aldo'),
(10, 'muhammad aja', 'adsasasd', 4, 's2 yai', 'so', 'yai', '2021-06-29 09:23:31', '2021-06-29 09:23:31', 'muhammad-aja'),
(11, 'tes', 're', 29, 's2 yai', 'so', 'yai', '2021-06-29 09:38:32', '2021-06-29 09:38:32', 'tes'),
(12, 'galih pratama', 'adsasasd', 4, 's2 yai', 'SI', 'YAI', '2021-06-29 09:42:14', '2021-06-29 09:42:14', 'galih-pratama'),
(13, 'galih pratama', 'ads', 4, 's2 yai', 'so', 'YAI', '2021-06-29 10:02:12', '2021-06-29 10:02:12', 'galih-pratama'),
(14, 'muhammad aja', 'adsasasd', 34, 's2 yai', 'so', 'YAI', '2021-06-29 10:04:46', '2021-06-29 10:04:46', 'muhammad-aja');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `peringkat` int(255) NOT NULL,
  `bobot` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `kriteria`, `peringkat`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'Penelitian Bermutu', 1, 0.41, NULL, NULL),
(2, 'Abdimas', 2, 0.24, NULL, NULL),
(3, 'Kompetensi', 3, 0.16, NULL, NULL),
(4, 'Pendidikan', 4, 0.1, NULL, NULL),
(5, 'Jabatan', 5, 0.06, NULL, NULL),
(6, 'Lama Mengajar', 6, 0.03, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_dosen`
--
ALTER TABLE `data_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
