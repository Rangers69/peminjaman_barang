-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2025 at 04:24 PM
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
-- Database: `sistem_peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL,
  `id_userpinjam` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status` int NOT NULL,
  `gambar_pengambilan` text COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gambar_pengembalian` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_userpinjam`, `email`, `tanggal_pinjam`, `tanggal_kembali`, `status`, `gambar_pengambilan`, `deskripsi`, `gambar_pengembalian`) VALUES
(14, 36, 'alippp12345@gmail.com', '2025-09-09', '2025-09-10', 0, 'ec6075f4b3b077952d1329c0c758ac2c.png', '', NULL),
(18, 36, 'alippp12345@gmail.com', '2025-09-09', '2025-09-10', 0, '07482d26b5b57921dbc680dda7c61704.png', '', NULL),
(42, 36, 'alippp12345@gmail.com', '2025-10-16', '2025-10-17', 0, 'e12dfdefa2480ced9538965f3807a459.png', 'motor', NULL),
(43, 36, 'alippp12345@gmail.com', '2025-10-17', '2025-10-18', 0, 'd33d5489dfe04450be01c83834bc977f.png', 'kmja', NULL),
(44, 38, 'ping111@gmail.com', '2025-10-17', '2025-10-18', 1, '766ea613def16b4765901df413c046fc.png', 'motor', NULL),
(45, 36, 'alippp12345@gmail.com', '2025-10-18', '2025-10-19', 0, '910ecd7fe039d39a66f959259f828d60.png', 'palu', NULL),
(46, 36, 'alippp12345@gmail.com', '2025-10-22', '2025-10-28', 0, '6ff50d3658e7b20e7c802c27048b37bf.png', 'mobil', NULL),
(47, 36, 'alippp12345@gmail.com', '2025-10-27', '2025-10-28', 0, 'fe4b0db36348bc09fccc24654c4b5af7.png', 'motor', NULL),
(48, 36, 'alippp12345@gmail.com', '2025-10-29', '2025-10-25', 1, 'af7991952a2c536bd0df98089cc61419.png', 'speker', NULL),
(49, 36, 'alippp12345@gmail.com', '2025-10-29', '2025-10-25', 1, '8baa7a6d11ab8192b0efc6a203bb1618.png', 'speker', NULL),
(50, 36, 'alippp12345@gmail.com', '2025-10-30', '2025-10-31', 1, '', 'kartu', NULL),
(51, 36, 'alippp12345@gmail.com', '2025-10-22', '2025-10-23', 0, 'b6cc05b69401ea780cd07698bd107929.png', 'hp', NULL),
(52, 36, 'alippp12345@gmail.com', '2025-10-24', '2025-10-25', 1, '0c260c3e22889dbe2005e0cbb222caaa.png', 'spt', NULL),
(53, 36, 'alippp12345@gmail.com', '2025-11-11', '2025-11-13', 1, 'ebc2671ae349bd6b5f10134eadb069ed.png', 'peci', NULL),
(54, 36, 'alippp12345@gmail.com', '2025-11-12', '2025-11-14', 1, 'f662ffce9d63c16df613a770e3863aeb.png', 'baju', NULL),
(55, 36, 'alippp12345@gmail.com', '2025-11-11', '2025-11-14', 1, 'ecb70eac86ad6729ebfaa516701ff038.png', 'bola', NULL),
(56, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 0, '0dad993058462bcffcfc726c2778d721.png', 'ajaia', NULL),
(57, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '6a4b435c15892f35b89c569b80c715ab.png', 'ajaia', NULL),
(58, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '8d3619fad46ea692e6ea1a1402d4e440.png', 'ajaia', NULL),
(59, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '6f9b1044effb3b6ff89aca0b4a08911f.png', 'ajaia', NULL),
(60, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, 'b2957eb8b2327d4cb8675bd878af804d.png', 'ajaia', NULL),
(61, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '6cf8f9fb19440354a78d4b9d6cefa269.png', 'ajaia', NULL),
(62, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '955c40223fa77a3252083e441f024b38.png', 'ajaia', NULL),
(63, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, 'f0e69b34b9359e9a6af92aa5c5bb77e0.png', 'ajaia', NULL),
(64, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, 'cd58f87e66a619f65665829597b59e5d.png', 'ajaia', NULL),
(65, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, 'f7d44483e3bd727a93b2c2f997e4356f.png', 'ajaia', NULL),
(66, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, 'd9901ab228f75d5d9c22324202f230fd.png', 'ajaia', NULL),
(67, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '3a6372ecc9b6534addbbf4f2dfbc5b4a.png', 'ajaia', NULL),
(68, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '6d18d4bc765b8da8ebbb23ee5f47eef9.png', 'ajaia', NULL),
(69, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '54177d9421a69bec48ff2f0fd7a72651.png', 'ajaia', NULL),
(70, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '2a637c5751ff6d61104527235596eea2.png', 'ajaia', NULL),
(71, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, 'c24ba1650275e5a6e0765ba38ed0d517.png', 'ajaia', NULL),
(72, 36, 'alippp12345@gmail.com', '2025-11-21', '2025-11-23', 1, '875d79cd8336c8a048b4288a98f44fe3.png', 'ajaia', NULL),
(73, 36, 'alippp12345@gmail.com', '2025-11-22', '2025-11-23', 1, 'c763c88daf0c344f76a45f4b65564aa7.png', 'njkadoie', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_tamu`
--

CREATE TABLE `peminjaman_tamu` (
  `id_peminjaman_tamu` int NOT NULL,
  `userpeminjaman_tamu` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `deskripsi` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('1','2','3') COLLATE utf8mb4_general_ci DEFAULT '1',
  `gambar_pengambilan` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gambar_pengembalian` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman_tamu`
--

INSERT INTO `peminjaman_tamu` (`id_peminjaman_tamu`, `userpeminjaman_tamu`, `email`, `tanggal_pinjam`, `tanggal_kembali`, `deskripsi`, `status`, `gambar_pengambilan`, `gambar_pengembalian`, `created_at`) VALUES
(3, 'alip', 'ahmadajib0902@gmail.com', '2025-12-16', '2025-12-18', 'minjem hpe', '1', 'Screenshot_2025-08-26_1630279.png', NULL, '2025-12-14 16:14:29'),
(4, 'Fajri Al', 'mf1345710@gmail.com', '2025-12-17', '2025-12-18', 'minjem remot tv', '1', 'Screenshot_2025-08-26_16302710.png', NULL, '2025-12-14 16:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `role`, `no_telp`, `alamat`) VALUES
(36, 'alip', 'alippp12345@gmail.com', '$2y$10$94l6MQNTSgY8wmGXEG9cseZ8QhRNPzVMvHL4NkiXfIB5jTiue8Sqi', 'admin', '085882589953', 'jalan n'),
(37, 'fajri', 'mf1345710@gmail.com', '$2y$10$5HaaiMYKX9bUS6rg/V4RsOUqjG1iNcOJ8LtGqlA9WINZIo3M3SO0.', 'customer', '', ''),
(38, 'Fajri Al', 'ping111@gmail.com', '$2y$10$ju6qQYsBw3YSnUdTjMQjq.l/FBTjMfvG2gYUzBN/btrWjX3dVoRTy', 'customer', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `peminjaman_tamu`
--
ALTER TABLE `peminjaman_tamu`
  ADD PRIMARY KEY (`id_peminjaman_tamu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `peminjaman_tamu`
--
ALTER TABLE `peminjaman_tamu`
  MODIFY `id_peminjaman_tamu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
