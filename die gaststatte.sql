-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 05:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `die gaststatte`
--
CREATE DATABASE IF NOT EXISTS `die gaststatte` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `die gaststatte`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` bigint(20) NOT NULL,
  `nominal_uang` bigint(20) DEFAULT NULL,
  `total_bayar` bigint(20) DEFAULT NULL,
  `waktu_bayar` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `nominal_uang`, `total_bayar`, `waktu_bayar`) VALUES
(2408022120553, 10000000, 8708000, '2024-08-02 18:37:48'),
(2408022125234, 1200000, 171000, '2024-08-02 18:58:10'),
(2408030041279, 720000, 718900, '2024-08-03 20:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_menu`
--

CREATE TABLE `tb_daftar_menu` (
  `id` int(11) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `deskripsi` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_daftar_menu`
--

INSERT INTO `tb_daftar_menu` (`id`, `foto`, `nama_menu`, `harga`, `deskripsi`) VALUES
(45, 'B1021.jpg', 'Hot Chocolate', 23900, 'A heated drink consisting of shaved or melted chocolate or cocoa powder, heated milk or water, and usually a sweetener.'),
(46, 'B1022.jpg', 'Ocean Breeze', 33000, 'Cocktail is a refreshing and tropical drink that gained popularity in the 1980s. It is believed to have originated in the Caribbean, where the vibrant blue color of the drink resembles the crystal-clear waters of the ocean.'),
(47, 'B1023.jpg', 'Dragon Fruit & Banana Smoothie', 26700, 'Refreshing blend that combines the tropical flavors of dragon fruit and the natural sweetness of ripe bananas. '),
(48, 'B1024.jpg', 'Infused Water', 18000, 'Is created by steeping various fruits, herbs, or vegetables in water, resulting in a beverage with a subtle, natural flavor. It is a refreshing and healthy alternative to sugary or artificially flavored drinks.'),
(49, 'B1025.jpg', 'Matcha Milkshake', 27500, 'Made with matcha green tea powder, ice cream, and milk.'),
(50, 'B1026.jpg', 'Cappuccino', 21000, 'A hot coffee drink that is made of equal proportions of espresso, steamed milk, and milk foam.'),
(51, 'B1027.jpg', 'Lychee Tea', 19900, 'A black tea blended with real lychee fruit'),
(52, 'F1011.jpg', 'Chicken Rice Sauce', 45800, 'Rich, sticky, gingery and tastes so good with a bowl of rice. Ultimate Chinese comfort food - homemade soy sauce chicken.'),
(53, 'F1012.jpg', 'Blueberry Cheesecake', 37900, 'To say this Blueberry Cheesecake is bursting with blueberries is an understatement! Baked to achieve.'),
(54, 'F1013.jpg', 'Salmon Sushi', 56700, 'Japanese dish of prepared vinegared rice, usually with some sugar and salt, plus a variety of ingredients, such as vegetables, and any meat, but most commonly seafood.'),
(55, 'F1014.jpg', 'Chicken Alfredo Pasta', 54300, 'Delightful dish that combines tender chicken with a rich, creamy Alfredo sauce and fettuccine noodles.'),
(56, 'F1015.jpg', 'Chicken Ramen', 35400, 'Japanese noodle soup that combines tender chicken, flavorful broth, and chewy noodles.'),
(57, 'F1016.jpg', 'Chili Oil Wontons', 32500, 'Tender meat in slippery wrappers seasoned with a chili oil-based sauce, Sichuan spicy wonton combines great flavor and texture.'),
(58, 'F1017.jpg', 'Korean Cream Cheese Garlic Bread', 25600, 'A popular Korean street food that takes regular garlic bread to a new level. The cream cheese filling is slightly sweet, tangy, and savory. It balances out the rich, buttery garlic flavor.');

-- --------------------------------------------------------

--
-- Table structure for table `tb_list_order`
--

CREATE TABLE `tb_list_order` (
  `id_list_order` int(11) NOT NULL,
  `menu` int(11) DEFAULT NULL,
  `kode_order` bigint(20) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `catatan` varchar(300) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_list_order`
--

INSERT INTO `tb_list_order` (`id_list_order`, `menu`, `kode_order`, `jumlah`, `catatan`, `status`) VALUES
(1, 48, 2408022125234, 3, 'pedas', '2'),
(2, 48, 2408022120553, 4, '-', '2'),
(4, 49, 2408022125234, 10, '-', '2'),
(5, 50, 2408022125234, 2, '-', '2'),
(6, 47, 2408022120553, 12, '-', '2'),
(7, 47, 2408022143139, 2, '-', '2'),
(8, 50, 2408030041279, 23, '-', '2'),
(9, 48, 2408030041279, 12, '1', '2'),
(10, 51, 2408030041279, 1, '12', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_meja`
--

CREATE TABLE `tb_meja` (
  `NO.MEJA` int(11) NOT NULL,
  `STATUS` varchar(10) DEFAULT NULL,
  `JUMLAH_ORANG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_meja`
--

INSERT INTO `tb_meja` (`NO.MEJA`, `STATUS`, `JUMLAH_ORANG`) VALUES
(1, 'Tersedia', 2),
(2, 'Terisi', 2),
(3, 'Tersedia', 4),
(4, 'Terisi', 4),
(5, 'Tersedia', 6),
(6, 'Terisi', 6),
(7, 'Tersedia', 8),
(8, 'Terisi', 8),
(9, 'Tersedia', 10),
(10, 'Terisi', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` bigint(20) NOT NULL DEFAULT 0,
  `pelanggan` varchar(50) DEFAULT NULL,
  `meja` int(11) DEFAULT NULL,
  `pelayan` int(11) DEFAULT NULL,
  `waktu_order` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `pelanggan`, `meja`, `pelayan`, `waktu_order`) VALUES
(2408022120553, 'abel cans', 11, 3, '2024-08-02 15:18:20'),
(2408022125234, 'adel', 55, 3, '2024-08-03 19:33:48'),
(2408022143139, 'QWE', 99, 3, '2024-08-02 14:44:00'),
(2408030041279, 'asw3', 66, 3, '2024-08-03 20:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT '',
  `alamat` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`, `alamat`) VALUES
(3, 'admin', 'admin@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '120000', 'Bandung barat 2'),
(32, 'kasir', 'kasir@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '0818794583', 'Bandung'),
(33, 'pelayan', 'pelayan@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '0822756932', 'Bandung'),
(34, 'koki', 'koki@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '0812739408', 'Bandung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tb_list_order`
--
ALTER TABLE `tb_list_order`
  ADD PRIMARY KEY (`id_list_order`),
  ADD KEY `menu` (`menu`),
  ADD KEY `order` (`kode_order`) USING BTREE;

--
-- Indexes for table `tb_meja`
--
ALTER TABLE `tb_meja`
  ADD UNIQUE KEY `NO.MEJA` (`NO.MEJA`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`) USING BTREE,
  ADD KEY `pelayan` (`pelayan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar_menu`
--
ALTER TABLE `tb_daftar_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_list_order`
--
ALTER TABLE `tb_list_order`
  MODIFY `id_list_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_list_order`
--
ALTER TABLE `tb_list_order`
  ADD CONSTRAINT `FK_tb_list_order_tb_daftar_menu` FOREIGN KEY (`menu`) REFERENCES `tb_daftar_menu` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_list_order_tb_order` FOREIGN KEY (`kode_order`) REFERENCES `tb_order` (`id_order`) ON UPDATE CASCADE;

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `FK_tb_order_tb_user` FOREIGN KEY (`pelayan`) REFERENCES `tb_user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
