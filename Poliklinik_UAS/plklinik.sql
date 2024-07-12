-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 09:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_periksa`
--

CREATE TABLE `detail_periksa` (
  `id` int(11) NOT NULL,
  `id_periksa` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varbinary(255) NOT NULL,
  `kemasan` varchar(255) NOT NULL,
  `harga` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `kemasan`, `harga`) VALUES
(1, 0x416c6f707572696e6f6c207461626c657420313030206d67, 'ktk 10 x 10 tablet', 16000),
(2, 0x416c6f707572696e6f6c207461626c657420333030206d67, 'ktk 10 x 10 tablet', 33000),
(3, 0x416d696c6f72696461207461626c65742035206d67, 'ktk 10 x 10 tablet', 12000),
(4, 0x416d696e6f66696c696e207461626c657420313530, 'botol 1000 tablet', 57000),
(5, 0x417175612070726f20696e6a656b73692073746572696c2c206265626173207069726f67656e, 'ktk 10 vial @ 20 ml', 73000),
(6, 0x41727468656d6574657220496e6a656b7369203830206d672f6d6c, 'ktk 6 ampul', 175000),
(7, 0x42656e7a6174696e2042656e7a696c2050656e6973696c696e20312c32204a7574612049552f207669616c, 'ktk 10 vial @ 20 ml', 108000),
(8, 0x426574616d657461736f6e206b72696d20302c3120252028736562616761692076616c6572617429, 'ktk 25 tube @ 5 g', 62000),
(9, 0x4269736f70726f6c6f6c207461626c65742035206d67, 'ktk 3 x 10 tablet', 44000),
(10, 0x4365746972697a696e65207461626c6574203130206d67, 'ktk 5 x 10 tablet', 19000),
(11, 0x436973617072696465207461626c65742035206d67, 'ktk 10 x 10 tablet', 103000),
(12, 0x446170736f6e207461626c657420313030206d67, 'btl 1000 tablet', 42000),
(13, 0x44656b73616d657461736f6e207461626c657420302c35206d67, 'ktk 10 x 10 tablet', 29000),
(14, 0x4469617a6570616d20496e6a656b73692035206d672f6d6c, 'ktk 30 amp @ 2 ml', 94000),
(15, 0x4469617a6570616d207461626c65742035206d67, 'btl 250 tablet', 16000),
(16, 0x44696574696c6b617262616d657a696e20736974726174207461626c657420313030206d67, 'ktk 10 x 10 tablet', 13000),
(17, 0x4469676f6b73696e207461626c657420302c3235206d67, 'ktk 10 x 10 tablet', 19000),
(18, 0x44696b6c6f6b736173696c696e206b617073756c20323530206d67, 'ktk 25 x 4 kapsul', 42000),
(19, 0x44696d656e68696472696e6174207461626c6574203530206d67, 'btl 100 tablet', 18000),
(20, 0x4566656472696e207461626c6574203235206d67202848434929, 'botol 250 tablet', 17000),
(21, 0x46616d6f746964696e65207461626574203430206d67, 'ktk 5 x 10 tablet', 12000),
(22, 0x46656e69746f696e204e61747269756d206b617073756c203330206d67, 'btl 250 kapsul', 24000),
(23, 0x4d656e6164696f6e2028566974204b332920696e6a656b7369203130206d672f6d6c, 'ktk 100 ampul @ 1 ml', 190000),
(24, 0x466c756f72696465207461626c657420302c35206d67, 'btl 100 tablet', 5000),
(25, 0x476c696d657072696465207461626c65742031206d67, 'ktk 3 x 10 tablet', 30000),
(26, 0x4b6c696e64616d6973696e206b617073756c20333030206d67, 'ktk 5 x 10 kapsul', 84000),
(27, 0x4d6562656e64617a6f6c207461626c657420353030206d67, 'ktk 10 x 10 tablet', 14000),
(28, 0x4f62617420416e746974756265726b756c6f736973204b617465676f726920616e616b, 'Paket / dos', 49000),
(29, 0x4f73656c74616d69766972203735206d67, 'ktk 10 kapsul', 71000),
(30, 0x52697370657269646f6e207461626c65742031206d67, 'ktk 2 x 10 tablet', 73000),
(31, 0x546574726173696b6c696e206b617073756c20353030206d67, 'ktk 10 x 10 kapsul', 66000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `tgl_periksa` datetime NOT NULL,
  `catatan` text NOT NULL,
  `biaya_periksa` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$4v1E0Eui.uz6Li5dzrKE/uddNfvzNpckt0rB64L2lmbIVEmTwyoKy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_periksa` (`id_periksa`,`id_obat`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_periksa`
--
ALTER TABLE `detail_periksa`
  ADD CONSTRAINT `detail_periksa_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `detail_periksa_ibfk_2` FOREIGN KEY (`id_periksa`) REFERENCES `periksa` (`id`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `periksa_ibfk_3` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
