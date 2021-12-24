-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 09:29 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `tm_address`
--

CREATE TABLE `tm_address` (
  `id_address` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `id_province` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `is_default` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tm_category`
--

CREATE TABLE `tm_category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_category`
--

INSERT INTO `tm_category` (`id_category`, `category_name`) VALUES
(1, 'Segi empat'),
(2, 'Pashmina'),
(3, 'Khimar'),
(4, 'Ciput'),
(5, 'Brenda');

-- --------------------------------------------------------

--
-- Table structure for table `tm_color`
--

CREATE TABLE `tm_color` (
  `id_color` int(11) NOT NULL,
  `color_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_color`
--

INSERT INTO `tm_color` (`id_color`, `color_name`) VALUES
(1, 'Pastel Nude'),
(2, 'Abu-Abu'),
(3, 'Nude'),
(4, 'Mauve'),
(5, 'Dusty Pink'),
(6, 'Hitam'),
(7, 'Cream');

-- --------------------------------------------------------

--
-- Table structure for table `tm_pictures`
--

CREATE TABLE `tm_pictures` (
  `id_pictures` int(11) NOT NULL,
  `pictures` varchar(100) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_pictures`
--

INSERT INTO `tm_pictures` (`id_pictures`, `pictures`, `id_product`) VALUES
(16, '10_364889.png', 10),
(17, '10_311147.png', 10),
(18, '10_691133.png', 10),
(19, '10_605702.png', 10),
(20, '11_711292.png', 11),
(21, '11_178132.png', 11),
(22, '11_300843.png', 11),
(23, '11_919613.png', 11),
(24, '12_674539.png', 12),
(25, '12_654096.png', 12),
(26, '12_443021.png', 12),
(27, '12_131738.png', 12),
(28, '13_765542.png', 13),
(29, '13_731281.png', 13),
(30, '13_630229.png', 13),
(31, '13_768573.png', 13),
(32, '14_114624.png', 14),
(33, '14_663664.png', 14),
(34, '14_952024.png', 14),
(35, '14_255360.png', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tm_product`
--

CREATE TABLE `tm_product` (
  `id_product` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `short_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_product`
--

INSERT INTO `tm_product` (`id_product`, `product_name`, `description`, `short_description`) VALUES
(10, 'Elzatta Scarf', 'KAILA DEALANA\r\n\r\nKERUDUNG BERBENTUK SEGI EMPAT DENGAN MOTIF YANG MENARIK TERSEDIA DALAM UKURAN 115 x 115 DENGAN BAHAN YANG NYAMAN DI DIGUNAKAN UNTUK KEGIATAN SEHARI SEHARI\r\n\r\nFABRIC : POLLYCOTTON\r\n\r\nWARNA : ORANGE, HIJAU, PINK, KHAKI, MOCCA, HITAM, LAVENDER, SALEM, BIRU, LYLAC\r\n\r\nMOTIF : SOLID\r\n\r\nSIZE : 115 x 115', 'KAILA DEALANAKERUDUNG BERBENTUK SEGI EMPAT DENGAN MOTIF YANG MENARIK TERSEDIA DALAM UKURAN 115 x 115 DENGAN BAHAN YANG NYAMAN DI DIGUNAKAN UNTUK KEGIATAN SEHARI SEHARI'),
(11, 'Elzatta Bergo Zaria', 'Bergo hijab panjang dengan material satin premium yang super lembut, ringan mudah mengikuti gerak, adem, nyaman untuk segala aktivitas. Dilengkapi tali bagian samping sehingga tetap stay saat dikenakan. Dapat digunakan sebagai home wear saat berkegiatan di rumah ataupun dipadukan dengan stelan arinda saat berkegiatan di luar rumah.\r\n\r\nSize:\r\nPanjang depan: 40cm\r\nPanjang belakang: 80cm', 'Bergo hijab panjang dengan material satin premium yang super lembut, ringan mudah mengikuti gerak, adem, nyaman untuk segala aktivitas.'),
(12, 'Elzatta Bergo Sabelya', 'MATERIAL : Soft Crepe\r\nBergo casual/daily berbahan Soft Crepe dgn detail tali belakang\r\nPjg.Dpn = 45 Cm\r\nPjg.Blkg = 75 Cm\r\nDetail = Tali belakang', 'MATERIAL : Soft CrepeBergo casual/daily berbahan Soft Crepe dgn detail tali belakangPjg.Dpn = 45 CmPjg.Blkg = 75 CmDetail = Tali belakang '),
(13, 'Elzatta Bergo Sahara', 'elzatta Bergo Zaria Sahara\r\n\r\nIngin tampil bersahaja tanpa ribet? Koleksi Bergo dari Elzatta bisa jadi pilihan kamu, Fams. Koleksi ini sangat cocok untuk kamu yang aktif dan anggun. Bergo ini juga memudahkan kamu untuk melakukan segala aktifitas.\r\n\r\n\r\nBergo atau jilbab instan polos ini memiliki desain minimalis dengan balutan material premium spandex yang nyaman saat digunakan. Bergo ini dilengkapi dengan serut di bagian belakang dan memiliki panjan depan 36 cm. Cocok digunakan untuk sehari-hari.\r\n\r\n\r\nMaterial: Spandex Elzatta', 'elzatta Bergo Zaria Sahara Ingin tampil bersahaja tanpa ribet? Koleksi Bergo dari Elzatta bisa jadi pilihan kamu, Fams.'),
(14, 'Elzatta Bergo Salwa', 'Bergo dengan warna yang power full melengkapi keseharian kamu fams, Nyaman di pakai sehari-hari, untuk aktivasmu yang padat, panjang bergo menutupi hingga perut tidak tembus pandang dan tidak mudah kusut. ', 'Bergo dengan warna yang power full melengkapi keseharian kamu fams, Nyaman di pakai sehari-hari, untuk aktivasmu yang padat, panjang bergo menutupi hingga perut tidak tembus pandang dan tidak mudah ku');

-- --------------------------------------------------------

--
-- Table structure for table `tm_produk_detail`
--

CREATE TABLE `tm_produk_detail` (
  `id_produk_detail` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_produk_detail`
--

INSERT INTO `tm_produk_detail` (`id_produk_detail`, `id_product`, `id_size`, `id_color`, `id_category`, `qty`, `price`, `total_view`) VALUES
(1, 10, 5, 6, 1, 10, 22000, 0),
(7, 10, 2, 5, 2, 20, 30000, 0),
(8, 10, 3, 3, 3, 21, 25000, 0),
(9, 11, 2, 2, 1, 50, 35000, 0),
(10, 11, 4, 1, 2, 23, 45000, 0),
(11, 12, 4, 2, 4, 50, 45999, 0),
(12, 12, 4, 6, 4, 26, 45999, 0),
(13, 12, 4, 5, 4, 5, 45999, 0),
(14, 13, 4, 6, 4, 12, 45787, 0),
(15, 13, 3, 3, 3, 22, 45765, 0),
(16, 13, 5, 1, 2, 21, 43677, 0),
(17, 14, 4, 5, 1, 10, 35999, 0),
(18, 14, 4, 7, 4, 21, 25000, 0),
(19, 14, 5, 3, 3, 12, 45988, 0),
(20, 10, 4, 2, 2, 14, 24000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tm_size`
--

CREATE TABLE `tm_size` (
  `id_size` int(11) NOT NULL,
  `size_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_size`
--

INSERT INTO `tm_size` (`id_size`, `size_name`) VALUES
(1, 'XS'),
(2, 'S'),
(3, 'M'),
(4, 'L'),
(5, 'XL'),
(6, 'XXL2');

-- --------------------------------------------------------

--
-- Table structure for table `tm_user`
--

CREATE TABLE `tm_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_admin` int(11) NOT NULL,
  `is_verif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tm_user`
--

INSERT INTO `tm_user` (`id_user`, `nama`, `email`, `password`, `is_admin`, `is_verif`) VALUES
(1, 'Admin', 'admin@admin.com', '123', 1, 1),
(2, 'User 1', 'user@user.com', '123', 0, 1),
(3, 'User 2', 'user2@user.com', '123', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_order`
--

CREATE TABLE `tr_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `order_no` varchar(300) NOT NULL,
  `order_date` datetime NOT NULL,
  `account_number` int(11) NOT NULL,
  `account_name` varchar(200) NOT NULL,
  `id_address` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment_picture` varchar(200) NOT NULL,
  `payment_date` datetime NOT NULL,
  `confirm_payment_date` datetime NOT NULL,
  `id_user_confirm` int(11) NOT NULL,
  `resi_number` varchar(100) NOT NULL,
  `delivery_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tr_order_detail`
--

CREATE TABLE `tr_order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tm_address`
--
ALTER TABLE `tm_address`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tm_category`
--
ALTER TABLE `tm_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tm_color`
--
ALTER TABLE `tm_color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indexes for table `tm_pictures`
--
ALTER TABLE `tm_pictures`
  ADD PRIMARY KEY (`id_pictures`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `tm_product`
--
ALTER TABLE `tm_product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tm_produk_detail`
--
ALTER TABLE `tm_produk_detail`
  ADD PRIMARY KEY (`id_produk_detail`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_size` (`id_size`);

--
-- Indexes for table `tm_size`
--
ALTER TABLE `tm_size`
  ADD PRIMARY KEY (`id_size`);

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tr_order`
--
ALTER TABLE `tr_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_address` (`id_address`),
  ADD KEY `id_user_confirm` (`id_user_confirm`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tr_order_detail`
--
ALTER TABLE `tr_order_detail`
  ADD PRIMARY KEY (`id_order_detail`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `tr_order_detail_ibfk_2` (`id_product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_address`
--
ALTER TABLE `tm_address`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_category`
--
ALTER TABLE `tm_category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tm_color`
--
ALTER TABLE `tm_color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tm_pictures`
--
ALTER TABLE `tm_pictures`
  MODIFY `id_pictures` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tm_product`
--
ALTER TABLE `tm_product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tm_produk_detail`
--
ALTER TABLE `tm_produk_detail`
  MODIFY `id_produk_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tm_size`
--
ALTER TABLE `tm_size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tm_user`
--
ALTER TABLE `tm_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_order`
--
ALTER TABLE `tr_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_order_detail`
--
ALTER TABLE `tr_order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tm_address`
--
ALTER TABLE `tm_address`
  ADD CONSTRAINT `tm_address_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tm_user` (`id_user`);

--
-- Constraints for table `tm_pictures`
--
ALTER TABLE `tm_pictures`
  ADD CONSTRAINT `tm_pictures_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `tm_product` (`id_product`);

--
-- Constraints for table `tm_produk_detail`
--
ALTER TABLE `tm_produk_detail`
  ADD CONSTRAINT `tm_produk_detail_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `tm_category` (`id_category`),
  ADD CONSTRAINT `tm_produk_detail_ibfk_2` FOREIGN KEY (`id_color`) REFERENCES `tm_color` (`id_color`),
  ADD CONSTRAINT `tm_produk_detail_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `tm_product` (`id_product`),
  ADD CONSTRAINT `tm_produk_detail_ibfk_4` FOREIGN KEY (`id_size`) REFERENCES `tm_size` (`id_size`);

--
-- Constraints for table `tr_order`
--
ALTER TABLE `tr_order`
  ADD CONSTRAINT `tr_order_ibfk_1` FOREIGN KEY (`id_address`) REFERENCES `tm_address` (`id_address`),
  ADD CONSTRAINT `tr_order_ibfk_2` FOREIGN KEY (`id_user_confirm`) REFERENCES `tm_user` (`id_user`),
  ADD CONSTRAINT `tr_order_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tm_user` (`id_user`);

--
-- Constraints for table `tr_order_detail`
--
ALTER TABLE `tr_order_detail`
  ADD CONSTRAINT `tr_order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `tr_order` (`id_order`),
  ADD CONSTRAINT `tr_order_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `tm_produk_detail` (`id_produk_detail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
