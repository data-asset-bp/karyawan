-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 06:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stocktaking`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_asset`
--

CREATE TABLE `data_asset` (
  `id_asset` int(5) NOT NULL,
  `no_asset` int(11) NOT NULL,
  `asset_type` varchar(25) NOT NULL,
  `no_serial` varchar(30) NOT NULL,
  `cap_date` date NOT NULL,
  `asset_description` longtext NOT NULL,
  `sts_asset` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_asset`
--

INSERT INTO `data_asset` (`id_asset`, `no_asset`, `asset_type`, `no_serial`, `cap_date`, `asset_description`, `sts_asset`) VALUES
(120, 300500, 'NOTEBOOK', 'Z0Y4', '2022-09-30', 'Macbook Pro 2022', 2),
(119, 3000001, 'NOTEBOOK', 'z0y44m1r4', '2022-09-30', 'Asus Vivo book', 5),
(118, 30003000, 'NOTEBOOK', 'c1nd1', '2022-09-30', 'HP Pavillon 13000', 4);

-- --------------------------------------------------------

--
-- Table structure for table `data_chek_asset`
--

CREATE TABLE `data_chek_asset` (
  `id_chek` int(10) NOT NULL,
  `Nrp` varchar(30) DEFAULT NULL,
  `no_asset` varchar(30) NOT NULL,
  `tgl_chekin` date DEFAULT NULL,
  `tgl_chekout` date DEFAULT NULL,
  `sts_chek` int(3) NOT NULL,
  `note_checkin` varchar(200) DEFAULT NULL,
  `note_checkout` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_chek_asset`
--

INSERT INTO `data_chek_asset` (`id_chek`, `Nrp`, `no_asset`, `tgl_chekin`, `tgl_chekout`, `sts_chek`, `note_checkin`, `note_checkout`) VALUES
(52, '6789', '3000001', '2022-10-01', '2022-09-30', 4, 'sudah dikembalikan', 'oke'),
(53, '54321', '300500', '2022-09-30', '2022-09-30', 4, 'ok', 'test'),
(54, '6789', '30003000', '2022-10-03', '2022-10-01', 4, 'rusak', '123');

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `Nrp` int(15) DEFAULT NULL,
  `Nama_karyawan` varchar(50) DEFAULT NULL,
  `New_Div` varchar(30) DEFAULT NULL,
  `New_BA` varchar(30) DEFAULT NULL,
  `New_PA` varchar(30) DEFAULT NULL,
  `HO` varchar(30) DEFAULT NULL,
  `Position` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id_karyawan`, `Nrp`, `Nama_karyawan`, `New_Div`, `New_BA`, `New_PA`, `HO`, `Position`) VALUES
(226, 1234, 'Cindi Amalia', 'People & Infrastructure', ' HO', 'Head Office', 'HO', 'Internship'),
(227, 54321, 'yusuf', 'People & Infrastructure', ' HO', 'Head Office', 'HO', 'karyawan'),
(228, 6789, 'tegar', 'Marketing & Material Managemen', ' BJM', 'Banjarmasin', 'Cabang', 'karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`) VALUES
(4, 'cindi', 'cindi', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_asset`
--
ALTER TABLE `data_asset`
  ADD PRIMARY KEY (`no_asset`);

--
-- Indexes for table `data_chek_asset`
--
ALTER TABLE `data_chek_asset`
  ADD PRIMARY KEY (`id_chek`),
  ADD UNIQUE KEY `no_asset` (`no_asset`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_chek_asset`
--
ALTER TABLE `data_chek_asset`
  MODIFY `id_chek` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
