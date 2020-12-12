-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2020 at 04:37 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(512) NOT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-29 15:21:41', '2020-11-29 15:25:26', 1),
(2, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-30 22:02:24', NULL, 1),
(3, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-01 15:06:36', NULL, 1),
(4, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-01 15:10:52', '2020-12-01 16:15:08', 1),
(5, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-01 16:22:10', NULL, 1),
(6, 2, 'ian@gmail.com', 0x3a3a3100000000000000000000000000, '2020-12-12 16:23:37', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` int(1) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `nik`, `alamat`, `kecamatan`, `kabupaten`, `kodePos`, `image`, `regDate`, `updationDate`, `status`) VALUES
(2, 'Ian Felix Jonathan Simanjutak', 'ian@gmail.com', '202cb962ac59075b964b07152d234b70', 1234123412341234, 'SMA UNGGUL YASOP Laguboti', 'Laguboti', 'Tobasa', 60111, '97ad8b6d0c08886a42fb10e6d4b95d64.jpg', '2020-11-25 12:45:48', '2020-11-25 12:45:48', 1),
(3, 'coba2', 'kkk@gmail.com', '202cb962ac59075b964b07152d234b70', 1231231231231231, NULL, NULL, 'Tobasa', NULL, NULL, '2020-11-25 15:26:36', '2020-11-25 15:26:36', 1),
(4, 'Ian Felix S', 'percobaan.tkk@gmail.com', '202cb962ac59075b964b07152d234b70', 1212312312312312, NULL, NULL, 'Tobasa', NULL, NULL, '2020-11-30 21:55:34', '2020-11-30 21:55:34', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
