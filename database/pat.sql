-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 03:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pat`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `update-date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id`, `username`, `password`, `update-date`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2020-12-15 04:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `admlog`
--

CREATE TABLE `admlog` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admlog`
--

INSERT INTO `admlog` (`id`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'admin', 0x3a3a3100000000000000000000000000, '2020-12-18 22:17:40', '2020-12-19 05:17:44', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `jenis` varchar(256) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `jenis`, `create_date`) VALUES
(1, 'Pelayanan Publik', '2020-11-22 13:56:47'),
(2, 'Sarana atau Prasarana', '2020-11-22 13:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_komplain`
--

CREATE TABLE `daftar_komplain` (
  `nomor_komplain` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `category` varchar(225) NOT NULL,
  `subCategory` varchar(225) NOT NULL,
  `masalah` varchar(225) NOT NULL,
  `kecamatan` varchar(225) NOT NULL,
  `detail` varchar(2000) NOT NULL,
  `bukti` varchar(512) DEFAULT NULL,
  `status` varchar(256) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateTime` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_komplain`
--

INSERT INTO `daftar_komplain` (`nomor_komplain`, `id_user`, `category`, `subCategory`, `masalah`, `kecamatan`, `detail`, `bukti`, `status`, `createDate`, `updateTime`) VALUES
(1, 2, '1', 'Badan Penanggulangan Bencana Daerah', 'BPBD tidak tanggap', 'Laguboti', 'BPDB tidak tanggap dalam melakukan bantuan saat terjadi nya bencana banjir pada bulan desember', 'week1_Irwan Josafat_soal1.docx', NULL, '2020-12-12 20:52:11', '0000-00-00 00:00:00'),
(2, 2, '1', 'Dinas Kesehatan', 'Covid-19', 'Laguboti', 'Petugas COVID 19 tidak cepat tanggap dalam melakukan karantina ', '13263954_10206510376143880_7764038578110869918_n.jpg', NULL, '2020-12-12 23:26:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(512) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama`, `postingDate`, `UpdateDate`) VALUES
(1, 'Ajibata', '2020-11-14 19:36:00', '2020-11-14 19:36:00'),
(2, 'Bonatua Lunasi', '2020-11-14 19:36:00', '2020-11-14 19:36:00'),
(3, 'Borbor', '2020-11-14 19:36:00', '2020-11-14 19:36:00'),
(4, 'Habinsaran', '2020-11-14 19:36:00', '2020-11-14 19:36:00'),
(5, 'Laguboti', '2020-11-14 19:36:00', '2020-11-14 19:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id_sub` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `jenis` varchar(256) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id_sub`, `id_category`, `jenis`, `create_date`) VALUES
(1, 1, 'Badan Penanggulangan Bencana Daerah', '2020-11-22 14:07:42'),
(2, 1, 'Dinas Komunikasi dan Informatika', '2020-11-22 14:07:42'),
(3, 1, 'Dinas Pendidikan', '2020-11-22 14:07:42'),
(4, 1, 'Dinas Kesehatan', '2020-11-22 14:07:42'),
(5, 1, 'Dinas Pekerjaan Umum dan Penataan Ruang', '2020-11-22 14:07:42'),
(6, 1, 'Dinas Perumahan Rakyat dan Kawasan Permukiman', '2020-11-22 14:07:42'),
(7, 1, 'Dinas Sosial', '2020-11-22 14:07:42'),
(8, 1, 'Dinas Tenaga kerja', '2020-11-22 14:07:42'),
(9, 1, 'Dinas Ketahanan Pangan', '2020-11-22 14:07:42'),
(10, 1, 'Dinas Lingkungan Hidup', '2020-11-22 14:07:42'),
(11, 2, 'Pendidikan', '2020-11-22 14:10:30'),
(12, 2, 'Kesehatan', '2020-11-22 14:10:30'),
(13, 2, 'RSUD Kota Porsea', '2020-11-22 14:10:30'),
(14, 2, 'Pariwisata dan Kebudayaan', '2020-11-22 14:10:30'),
(15, 2, 'Pertanian dan Perikanan', '2020-11-22 14:10:30'),
(16, 2, 'Sosial', '2020-11-22 14:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-29 15:21:41', '2020-11-29 15:25:26', 1),
(2, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-30 22:02:24', NULL, 1),
(3, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-01 15:06:36', NULL, 1),
(4, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-01 15:10:52', '2020-12-01 16:15:08', 1),
(5, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-01 16:22:10', NULL, 1),
(6, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 16:23:37', NULL, 1),
(7, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 16:58:20', NULL, 1),
(8, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 17:30:12', NULL, 1),
(9, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 19:37:57', NULL, 1),
(10, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 20:29:21', '2020-12-12 21:56:58', 1),
(11, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 22:05:15', '2020-12-12 22:05:51', 1),
(12, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 22:05:55', '2020-12-12 22:10:04', 1),
(13, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 22:10:08', '2020-12-12 22:26:41', 1),
(14, 0, '', 0x3a3a3100000000000000000000000000, '2020-12-12 22:26:46', NULL, 0),
(15, 0, '', 0x3a3a3100000000000000000000000000, '2020-12-12 22:26:50', NULL, 0),
(16, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 22:26:53', '2020-12-12 23:38:33', 1),
(17, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-13 10:29:50', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nik` bigint(16) DEFAULT NULL,
  `alamat` tinytext DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT 'Tobasa',
  `kodePos` int(6) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `nik`, `alamat`, `kecamatan`, `kabupaten`, `kodePos`, `image`, `regDate`, `updationDate`, `status`) VALUES
(2, 'Ian Felix Jonathan Simanjutak', 'ian@gmail.com', '202cb962ac59075b964b07152d234b70', 1234123412341234, 'SMA UNGGUL YASOP Laguboti', 'Laguboti', 'Tobasa', 60111, '97ad8b6d0c08886a42fb10e6d4b95d64.jpg', '2020-11-25 12:45:48', '2020-11-25 12:45:48', 1),
(3, 'coba2', 'kkk@gmail.com', '202cb962ac59075b964b07152d234b70', 1231231231231231, NULL, NULL, 'Tobasa', NULL, NULL, '2020-11-25 15:26:36', '2020-11-25 15:26:36', 1),
(4, 'Ian Felix S', 'percobaan.tkk@gmail.com', '202cb962ac59075b964b07152d234b70', 1212312312312312, NULL, NULL, 'Tobasa', NULL, NULL, '2020-11-30 21:55:34', '2020-11-30 21:55:34', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admlog`
--
ALTER TABLE `admlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `daftar_komplain`
--
ALTER TABLE `daftar_komplain`
  ADD PRIMARY KEY (`nomor_komplain`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
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
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admlog`
--
ALTER TABLE `admlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daftar_komplain`
--
ALTER TABLE `daftar_komplain`
  MODIFY `nomor_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
