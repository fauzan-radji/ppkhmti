-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2022 at 02:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_industri`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `deskripsi_item` varchar(500) NOT NULL,
  `harga_item` int(50) NOT NULL,
  `foto_item` varchar(100) NOT NULL,
  `item_kategori` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `nama_item`, `deskripsi_item`, `harga_item`, `foto_item`, `item_kategori`) VALUES
(1, 'Ciptadent', 'Pasta Gigi', 25000, '1907834293636ff6c991cb0.png', 3),
(2, 'Beras', 'Beras Enak Bergizi', 300000, '1801306920636ff76bcab7e.png', 2),
(3, 'Helm', 'Helm Full Face', 2000, '953285163636fe5e7a7b82.png', 1),
(4, 'Beras', 'Beras Bansos', 70000, '2071273429636fe5f3ab10b.png', 3),
(5, 'Minyak Goreng', 'Minyak kelapa sawit mahal', 3000000, '892229238636fe5fa5c79a.png', 3),
(6, 'Milku 1 Liter', 'Minuman Susu Botol Badag', 100000, '1038184578636fe60192cc6.png', 3),
(7, 'Helm NHK', 'Helm bagus untuk dicuri', 180000, '1097121485636fe5024cd16.png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Pakaian'),
(2, 'Gadget'),
(3, 'Bahan Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `tim`
--

CREATE TABLE `tim` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `linkedin` varchar(100) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tim`
--

INSERT INTO `tim` (`id`, `nama`, `jabatan`, `twitter`, `facebook`, `instagram`, `linkedin`, `foto`) VALUES
(1, 'Reza Kecap', 'Ketua Tim', '', 'https://facebook.com/rezakecap399', 'https://instagram.com/rezakecap399', '', '1496930672636ffdd2ad101.png'),
(2, 'Farhan Kebab', 'Ketua Bidang Pengembangan Organisasi', '', '', '', '', '360646494637002d4e32fc.png'),
(3, 'Rehan Wangsaff', 'Ketua Bidang Keilmuan', '', '', '', '', '153245270963700c9e5a474.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`) VALUES
(2, 'Dhani Ardiyanto Syahdila', 'dhanisyahdila@gmail.com', '1Sampai9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim`
--
ALTER TABLE `tim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tim`
--
ALTER TABLE `tim`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
