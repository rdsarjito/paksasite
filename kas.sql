-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 05:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kas`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulan_pembayaran`
--

CREATE TABLE `bulan_pembayaran` (
  `id_bulan_pembayaran` int(11) NOT NULL,
  `nama_bulan` enum('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember') NOT NULL,
  `tahun` int(4) NOT NULL,
  `pembayaran_perminggu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bulan_pembayaran`
--

INSERT INTO `bulan_pembayaran` (`id_bulan_pembayaran`, `nama_bulan`, `tahun`, `pembayaran_perminggu`) VALUES
(1, 'Juni', 2022, 20000),
(2, 'Juli', 2022, 20000),
(3, 'Agustus', 2022, 20000),
(4, 'September', 2022, 20000),
(5, 'November', 2022, 20000),
(7, 'Desember', 2022, 10000),
(12, 'Januari', 2023, 20000),
(15, 'Oktober', 2022, 5000),
(17, 'April', 2024, 5000),
(18, 'Maret', 2024, 5000),
(19, 'Februari', 2024, 5000),
(20, 'Januari', 2024, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Administrator'),
(2, 'Ketua Kelas'),
(3, 'Bendahara'),
(4, 'Sekretaris');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `jumlah_pengeluaran` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_pengeluaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_bulan_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `jumlah_pengeluaran`, `keterangan`, `tanggal_pengeluaran`, `id_user`, `id_bulan_pembayaran`) VALUES
(22, 50000, 'Beli alat tulis', 1713797447, 1, 2),
(23, 20000, 'Beli sapu 5pcs', 1713797455, 1, 3),
(29, 500000, 'Donasi bencana cianjur', 1670325201, 1, 12),
(30, 20000, 'beli alat tulis', 1670325219, 1, 1),
(31, 30000, 'beli 3 sapu lantai', 1713797475, 1, 12),
(32, 30000, 'Beli sapu lantai', 1713797630, 1, 20),
(33, 10000, 'Beli spidol', 1713797756, 1, 18),
(34, 20000, 'Beli alat tulis', 1713797707, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id_riwayat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_uang_kas` int(11) NOT NULL,
  `aksi` text NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id_riwayat`, `id_user`, `id_uang_kas`, `aksi`, `tanggal`) VALUES
(1, 1, 1, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 20,000', 20220603),
(2, 1, 2, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 20,000', 20220603),
(3, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 20,000', 20220603),
(4, 1, 4, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 20,000', 20220603),
(5, 1, 5, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 20,000', 20220603),
(6, 1, 1, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 20,000', 20220610),
(7, 1, 2, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 20,000', 20220610),
(8, 1, 3, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 20,000', 0),
(9, 1, 4, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 20,000', 0),
(10, 1, 5, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 10,000', 0),
(11, 1, 1, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 10,000', 0),
(12, 1, 2, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 10,000', 0),
(13, 1, 3, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 20,000', 0),
(14, 1, 4, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 10,000', 0),
(15, 1, 5, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 10,000', 0),
(17, 1, 13, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 3,000', 0),
(18, 1, 13, 'telah mengubah pembayaran minggu ke-2 dari Rp. 3,000 menjadi Rp. 0', 0),
(19, 1, 13, 'telah mengubah pembayaran minggu ke-1 dari Rp. 5,000 menjadi Rp. 4,000', 0),
(20, 1, 9, 'telah mengubah pembayaran minggu ke-1 dari Rp. 3,000 menjadi Rp. 5,000', 0),
(21, 1, 9, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 5,000', 0),
(22, 2, 9, 'telah mengubah pembayaran minggu ke-2 dari Rp. 5,000 menjadi Rp. 0', 0),
(23, 1, 14, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 0),
(24, 1, 16, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 15,000', 0),
(25, 1, 9, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 2,000', 0),
(26, 1, 9, 'telah mengubah pembayaran minggu ke-2 dari Rp. 2,000 menjadi Rp. 5,000', 0),
(27, 1, 9, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 5,000', 0),
(28, 1, 31, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 10,000', 1668843932),
(29, 1, 36, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1668844015),
(30, 1, 36, 'telah mengubah pembayaran minggu ke-1 dari Rp. 5,000 menjadi Rp. 10,000', 1668844023),
(31, 1, 33, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 10,000', 1668671503),
(32, 1, 31, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 5,000', 1668844357),
(33, 1, 31, 'telah mengubah pembayaran minggu ke-2 dari Rp. 5,000 menjadi Rp. 10,000', 1668844506),
(34, 1, 31, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 10,000', 1668844512),
(35, 1, 31, 'telah mengubah pembayaran minggu ke-4 dari Rp. 0 menjadi Rp. 10,000', 1668844518),
(36, 1, 0, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668911137),
(37, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668911321),
(38, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668911352),
(39, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668911627),
(40, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668911779),
(41, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668911833),
(42, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668911936),
(43, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668911964),
(44, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668912328),
(45, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668912356),
(46, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668912609),
(47, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668912670),
(48, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668913047),
(49, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668913248),
(50, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668913363),
(51, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668913455),
(52, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668913480),
(53, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668913492),
(54, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 8,000', 1668913529),
(55, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 8,000', 1668913798),
(56, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 20,000', 1668914180),
(57, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 1,000', 1668914307),
(58, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 1,000', 1668914336),
(59, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 200', 1668914349),
(60, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1668914707),
(61, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 1,500', 1668919583),
(62, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 200', 1668920051),
(63, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 800', 1668920182),
(64, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668920364),
(65, 1, 1, 'telah mengubah pembayaran minggu ke-1 dari Rp. 2,000 menjadi Rp. 20,000', 1668920407),
(66, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 3,000', 1668920550),
(67, 1, 3, 'telah mengubah pembayaran minggu ke-1 dari Rp. 3,000 menjadi Rp. 20,000', 1668920989),
(68, 1, 5, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 20,000', 1668921021),
(69, 1, 8, 'telah mengubah pembayaran minggu ke-1 dari Rp. 20,000 menjadi Rp. 2,000', 1668921450),
(70, 1, 8, 'telah mengubah pembayaran minggu ke-1 dari Rp. 2,000 menjadi Rp. 20,000', 1668921457),
(71, 1, 10, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 20,000', 1668921982),
(72, 1, 4, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 200', 1668922253),
(73, 1, 4, 'telah mengubah pembayaran minggu ke-3 dari Rp. 200 menjadi Rp. 2,000', 1668922485),
(74, 1, 4, 'telah mengubah pembayaran minggu ke-3 dari Rp. 2,000 menjadi Rp. 2,008', 1668922513),
(75, 1, 4, 'telah mengubah pembayaran minggu ke-3 dari Rp. 2,008 menjadi Rp. 2,000', 1668922615),
(76, 1, 4, 'telah mengubah pembayaran minggu ke-3 dari Rp. 2,000 menjadi Rp. 2,009', 1668922676),
(77, 1, 4, 'telah mengubah pembayaran minggu ke-3 dari Rp. 2,009 menjadi Rp. 2,000', 1668924213),
(78, 1, 16, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 20,000', 1668924791),
(79, 1, 5, 'telah mengubah pembayaran minggu ke-4 dari Rp. 0 menjadi Rp. 3', 1668925132),
(80, 1, 5, 'telah mengubah pembayaran minggu ke-4 dari Rp. 3 menjadi Rp. 3,000', 1668925502),
(81, 1, 37, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 2,000', 1668947155),
(82, 1, 4, 'telah mengubah pembayaran minggu ke-3 dari Rp. 2,000 menjadi Rp. 1,000', 1668954782),
(83, 1, 23, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 20,000', 1668955614),
(84, 1, 37, 'telah mengubah pembayaran minggu ke-1 dari Rp. 2,000 menjadi Rp. 20,000', 1668956628),
(85, 1, 36, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 2,000', 1669004740),
(86, 1, 36, 'telah mengubah pembayaran minggu ke-2 dari Rp. 2,000 menjadi Rp. 10,000', 1669004755),
(87, 1, 49, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 0', 1713797146),
(88, 1, 49, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797159),
(89, 1, 70, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797198),
(90, 1, 70, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 5,000', 1713797204),
(91, 1, 70, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 5,000', 1713797209),
(92, 1, 74, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797215),
(93, 1, 72, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797222),
(94, 1, 73, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797227),
(95, 1, 71, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797233),
(96, 1, 73, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 5,000', 1713797238),
(97, 1, 73, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 5,000', 1713797243),
(98, 1, 72, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 5,000', 1713797247),
(99, 1, 72, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 5,000', 1713797254),
(100, 1, 72, 'telah mengubah pembayaran minggu ke-4 dari Rp. 0 menjadi Rp. 5,000', 1713797260),
(101, 1, 73, 'telah mengubah pembayaran minggu ke-4 dari Rp. 0 menjadi Rp. 5,000', 1713797266),
(102, 1, 71, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 5,000', 1713797272),
(103, 1, 65, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797297),
(104, 1, 69, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797302),
(105, 1, 66, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797307),
(106, 1, 66, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 5,000', 1713797312),
(107, 1, 68, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797317),
(108, 1, 60, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797334),
(109, 1, 61, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797339),
(110, 1, 61, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 5,000', 1713797343),
(111, 1, 62, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797349),
(112, 1, 55, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797363),
(113, 1, 57, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797368),
(114, 1, 57, 'telah mengubah pembayaran minggu ke-2 dari Rp. 0 menjadi Rp. 5,000', 1713797372),
(115, 1, 59, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797377),
(116, 1, 58, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797383),
(117, 1, 56, 'telah mengubah pembayaran minggu ke-1 dari Rp. 0 menjadi Rp. 5,000', 1713797390),
(118, 1, 57, 'telah mengubah pembayaran minggu ke-3 dari Rp. 0 menjadi Rp. 5,000', 1713797430);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pengeluaran`
--

CREATE TABLE `riwayat_pengeluaran` (
  `id_riwayat_pengeluaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `aksi` text NOT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat_pengeluaran`
--

INSERT INTO `riwayat_pengeluaran` (`id_riwayat_pengeluaran`, `id_user`, `aksi`, `tanggal`) VALUES
(1, 1, 'telah menambahkan pengeluaran Sapu 2 buah dengan biaya Rp. 30,000', 1593626363),
(2, 1, 'telah menambahkan pengeluaran Alat pel lantai 1buah dengan biaya Rp. 20,000', 1593626393),
(3, 1, 'telah menambahkan pengeluaran Dekorasi 17 Agustus dengan biaya Rp. 100,000', 1607139619),
(4, 1, 'telah menambahkan pengeluaran Spidol dan Penghapus papan tulis dengan biaya Rp. 25,000', 1607139619),
(5, 1, 'telah menambahkan pengeluaran Dekorasi hari batik nasional dengan biaya Rp. 50,000', 1607139619),
(7, 1, 'telah menambahkan pengeluaran Dikorupsi dengan biaya Rp. 50,000', 1668783692),
(8, 1, 'telah menambahkan pengeluaran n dengan biaya Rp. 10,000', 1668844821),
(9, 1, 'telah menambahkan pengeluaran hhh dengan biaya Rp. 15,000', 1668845761),
(10, 1, 'telah menambahkan pengeluaran bb dengan biaya Rp. 10,000', 1668848410),
(11, 1, 'telah menambahkan pengeluaran c dengan biaya Rp. 50,000', 1668848580),
(12, 1, 'telah menambahkan pengeluaran n dengan biaya Rp. 20,000', 1668848596),
(13, 1, 'telah menambahkan pengeluaran hh dengan biaya Rp. 10,000', 1668849159),
(14, 1, 'telah menambahkan pengeluaran jk dengan biaya Rp. 100,000', 1668849171),
(15, 1, 'telah menambahkan pengeluaran kkk dengan biaya Rp. 50,000', 1668850301),
(16, 1, 'telah menambahkan pengeluaran bako dengan biaya Rp. 20,000', 1668949932),
(17, 1, 'telah menambahkan pengeluaran hjj dengan biaya Rp. 20,000', 1668956644),
(18, 1, 'telah menambahkan pengeluaran hdhf dengan biaya Rp. 20,000', 1669002364),
(19, 1, 'telah menambahkan pengeluaran ds dengan biaya Rp. 2,000', 1669003839),
(20, 1, 'telah menambahkan pengeluaran beli 3 sapu lantai dengan biaya Rp. 30,000', 1713797475),
(21, 1, 'telah menambahkan pengeluaran Beli sapu lantai dengan biaya Rp. 30,000', 1713797630),
(22, 1, 'telah menambahkan pengeluaran Donasi bencana gempa dengan biaya Rp. 300,000', 1713797666),
(23, 1, 'telah menambahkan pengeluaran Beli alat tulis dengan biaya Rp. 20,000', 1713797707);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` enum('pria','wanita') NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `jenis_kelamin`, `no_telepon`, `email`) VALUES
(1, 'Azzan Dwi Riski', 'pria', '0812', 'Azzan@gmail.com'),
(3, 'Ramadhani nur sarjito', 'pria', '0812', 'ramadhani@gmail.com'),
(4, 'Rahardian', 'pria', '0812', 'Rahardian@gmail.com'),
(5, 'Rienaldy', 'pria', '0812435', 'Rienaldy@gmail.com'),
(7, 'Muhamad Randy Destawijaya', 'pria', '081', 'Randy@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `uang_kas`
--

CREATE TABLE `uang_kas` (
  `id_uang_kas` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_bulan_pembayaran` int(11) NOT NULL,
  `minggu_ke_1` int(11) DEFAULT NULL,
  `minggu_ke_2` int(11) DEFAULT NULL,
  `minggu_ke_3` int(11) DEFAULT NULL,
  `minggu_ke_4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uang_kas`
--

INSERT INTO `uang_kas` (`id_uang_kas`, `id_siswa`, `id_bulan_pembayaran`, `minggu_ke_1`, `minggu_ke_2`, `minggu_ke_3`, `minggu_ke_4`) VALUES
(1, 1, 1, 20000, 20000, 20000, 20000),
(2, 2, 1, 20000, 0, 0, 20000),
(3, 3, 1, 20000, 20000, 20000, 20000),
(4, 4, 1, 20000, 20000, 1000, 20000),
(5, 5, 1, 20000, 20000, 20000, 3000),
(6, 1, 2, 20000, 20000, 20000, 20000),
(7, 2, 2, 0, 20000, 0, 0),
(8, 3, 2, 20000, 20000, 0, 20000),
(9, 4, 2, 20000, 20000, 20000, 20000),
(10, 5, 2, 20000, 20000, 0, 20000),
(11, 1, 3, 20000, 20000, 20000, 20000),
(12, 2, 3, 20000, 20000, 20000, 20000),
(13, 3, 3, 20000, 20000, 20000, 20000),
(14, 4, 3, 20000, 20000, 20000, 20000),
(15, 5, 3, 20000, 20000, 20000, 20000),
(16, 1, 4, 20000, 0, 0, 20000),
(17, 2, 4, 0, 0, 0, 20000),
(18, 3, 4, 20000, 0, 0, 20000),
(19, 4, 4, 20000, 20000, 20000, 20000),
(20, 5, 4, 20000, 0, 0, 20000),
(21, 1, 5, 0, 0, 20000, 20000),
(22, 2, 5, 20000, 20000, 0, 0),
(23, 3, 5, 20000, 20000, 0, 20000),
(24, 4, 5, 0, 0, 20000, 20000),
(25, 5, 5, 20000, 20000, 20000, 20000),
(26, 1, 6, 0, 0, 0, 0),
(27, 3, 6, 0, 0, 0, 0),
(28, 4, 6, 0, 0, 0, 0),
(29, 5, 6, 0, 0, 0, 0),
(30, 6, 6, 0, 0, 0, 0),
(31, 1, 7, 10000, 10000, 10000, 10000),
(32, 3, 7, 0, 0, 0, 0),
(33, 4, 7, 10000, 0, 0, 0),
(34, 5, 7, 0, 0, 0, 0),
(35, 6, 7, 0, 0, 0, 0),
(36, 7, 7, 10000, 10000, 0, 0),
(37, 1, 12, 20000, 0, 0, 0),
(38, 3, 12, 0, 0, 0, 0),
(39, 4, 12, 0, 0, 0, 0),
(40, 5, 12, 0, 0, 0, 0),
(41, 7, 12, 0, 0, 0, 0),
(42, 8, 12, 0, 0, 0, 0),
(43, 1, 15, 0, 0, 0, 0),
(44, 3, 15, 0, 0, 0, 0),
(45, 4, 15, 0, 0, 0, 0),
(46, 5, 15, 0, 0, 0, 0),
(47, 7, 15, 0, 0, 0, 0),
(48, 8, 15, 0, 0, 0, 0),
(49, 1, 16, 5000, 0, 0, 0),
(50, 3, 16, 0, 0, 0, 0),
(51, 4, 16, 0, 0, 0, 0),
(52, 5, 16, 0, 0, 0, 0),
(53, 7, 16, 0, 0, 0, 0),
(54, 8, 16, 0, 0, 0, 0),
(55, 1, 17, 5000, 0, 0, 0),
(56, 3, 17, 5000, 0, 0, 0),
(57, 4, 17, 5000, 5000, 5000, 0),
(58, 5, 17, 5000, 0, 0, 0),
(59, 7, 17, 5000, 0, 0, 0),
(60, 1, 18, 5000, 0, 0, 0),
(61, 3, 18, 5000, 5000, 0, 0),
(62, 4, 18, 5000, 0, 0, 0),
(63, 5, 18, 0, 0, 0, 0),
(64, 7, 18, 0, 0, 0, 0),
(65, 1, 19, 5000, 0, 0, 0),
(66, 3, 19, 5000, 5000, 0, 0),
(67, 4, 19, 0, 0, 0, 0),
(68, 5, 19, 5000, 0, 0, 0),
(69, 7, 19, 5000, 0, 0, 0),
(70, 1, 20, 5000, 5000, 5000, 0),
(71, 3, 20, 5000, 5000, 0, 0),
(72, 4, 20, 5000, 5000, 5000, 5000),
(73, 5, 20, 5000, 5000, 5000, 5000),
(74, 7, 20, 5000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(32) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `last_login` timestamp NULL DEFAULT NULL,
  `password_updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `email`, `username`, `password`, `avatar`, `created_at`, `last_login`, `password_updated_at`, `id_jabatan`) VALUES
(1, 'udin', 'admin@gmail.com', 'udin', '$2y$10$HcAUUyF8dgv.SJwvlobqN.jWx1539PkfU0E1jWTurfUpSCBIKD0bi', '1.png', '2022-10-02 13:55:16', '2024-04-22 09:22:02', '2024-04-22 15:40:49', 1),
(7, 'Azzan Dwi Riski', 'azzan@gmail.com', 'azzandr', '$2y$10$dgaYE5xKHZoDYW3zifznZuhkdolOgK5.T3kwP2J5HqLt5K5JcZMHK', NULL, '2022-11-21 05:21:20', '2024-04-14 20:54:05', '2022-11-21 06:21:20', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulan_pembayaran`
--
ALTER TABLE `bulan_pembayaran`
  ADD PRIMARY KEY (`id_bulan_pembayaran`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_user` (`id_user`) USING BTREE,
  ADD KEY `pengeluaran_ibfk_1` (`id_bulan_pembayaran`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id_riwayat`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_uang_kas` (`id_uang_kas`);

--
-- Indexes for table `riwayat_pengeluaran`
--
ALTER TABLE `riwayat_pengeluaran`
  ADD PRIMARY KEY (`id_riwayat_pengeluaran`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `uang_kas`
--
ALTER TABLE `uang_kas`
  ADD PRIMARY KEY (`id_uang_kas`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_bulan_pembayaran` (`id_bulan_pembayaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulan_pembayaran`
--
ALTER TABLE `bulan_pembayaran`
  MODIFY `id_bulan_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id_riwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `riwayat_pengeluaran`
--
ALTER TABLE `riwayat_pengeluaran`
  MODIFY `id_riwayat_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `uang_kas`
--
ALTER TABLE `uang_kas`
  MODIFY `id_uang_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_bulan_pembayaran`) REFERENCES `bulan_pembayaran` (`id_bulan_pembayaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
