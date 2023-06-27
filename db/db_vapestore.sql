-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 10:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_vapestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `nama`) VALUES
(1, 'BashBoost'),
(3, 'Lost Vape'),
(4, 'Vapcell'),
(5, 'GeekVape'),
(6, 'Jual Vape'),
(7, 'Dovvo'),
(8, 'Foom'),
(9, 'kaze'),
(10, 'OXVA');

-- --------------------------------------------------------

--
-- Table structure for table `categori`
--

CREATE TABLE `categori` (
  `c_id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categori`
--

INSERT INTO `categori` (`c_id`, `nama`, `ket`) VALUES
(1, 'MOD', 'warna'),
(2, 'POD/AIO', 'warna'),
(3, 'LIQUID', 'nikotin'),
(4, 'ACCESSORIS', 'Ohm'),
(6, 'COIL/CATRIDGE', 'Ohm'),
(8, 'RDA', 'Warna');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `nomor_telp` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`nama`, `alamat`, `logo`, `nomor_telp`, `img`, `email`) VALUES
('vapetime', 'Jln. Doctor Mansyur', 'vapetime.png', '081273151439', 'asli.jpeg', 'vapetime@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `d_id` varchar(50) NOT NULL,
  `nama_diskon` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id_invoice` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `id_pemesan` varchar(50) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `alamat_penerima` varchar(50) NOT NULL,
  `barang_pesanan` varchar(255) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `acc` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id_invoice`, `id`, `id_pemesan`, `nama_penerima`, `alamat_penerima`, `barang_pesanan`, `total_harga`, `acc`) VALUES
('ORD100011', 36, 'papakuu', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Revangga - medan  - 3, Centaurus M200 - Pink Edition - 2, Iced Cappucino - 3% mg - 2', 1051310, 'Ditolak'),
('ORD100012', 37, 'papakuu', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Centaurus M200 - Pink Edition - 2', 1150, 'Dikonfirmasi'),
('ORD100013', 38, 'papakuu', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Iced Cappucino - 3% mg - 2, Centaurus M200 - Pink Edition - 2', 1310, 'Dikonfirmasi'),
('ORD100014', 39, 'papakuu', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Catridge Ursa - 0.6 Ohm - 2, Iced Cappucino - 3% mg - 3', 80240, 'Ditolak'),
('ORD100015', 40, 'papakuu', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Iced Cappucino - 3% mg - 3, Dovvo Panda Vee 2 - Black - 3, Catridge Ursa - 0.6 Ohm - 1', 41680, 'DiBatalkan'),
('ORD100016', 41, 'papakuu', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Centaurus M200 - Pink Edition - 2, Iced Cappucino - 3% mg - 3, Revangga - medan  - 2', 701390, 'DiBatalkan'),
('ORD100017', 42, 'papakuu', 'akbar,081273151439', 'Jalan Kermat no 7,Medan', 'Centaurus M200 - Pink Edition - 3, COIL BashBoost - 0.18 Ohm - 3, Catridge Ursa - 0.6 Ohm - 1', 221725, 'DiBatalkan'),
('ORD700001', 43, 'usupp', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Catridge Ursa - 0.6 Ohm - 3, Centaurus M200 - Pink Edition - 3', 121725, 'Menunggu'),
('ORD700002', 44, 'usupp', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Catridge Ursa - 0.6 Ohm - 3, Centaurus M200 - Pink Edition - 3', 121725, 'Menunggu'),
('ORD700003', 45, 'usupp', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Catridge Ursa - 0.6 Ohm - 11, Iced Cappucino - 3% mg - 9, Revangga - medan  - 30, Dovvo Panda Vee 2 - Black - 7', 10944080, 'DiBatalkan'),
('ORD700004', 46, 'usupp', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Catridge Ursa - 0.6 Ohm - 11, Iced Cappucino - 3% mg - 9, Revangga - medan  - 30, Dovvo Panda Vee 2 - Black - 7', 10944080, 'Menunggu'),
('ORD700005', 47, 'usupp', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Catridge Ursa - 0.6 Ohm - 11, Iced Cappucino - 3% mg - 9, Revangga - medan  - 30, Dovvo Panda Vee 2 - Black - 7', 10944080, 'Menunggu'),
('ORD700006', 48, 'usupp', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Catridge Ursa - 0.6 Ohm - 11, Iced Cappucino - 3% mg - 9, Revangga - medan  - 30, Dovvo Panda Vee 2 - Black - 7', 10944080, 'DiBatalkan'),
('ORD700007', 49, 'usupp', 'kaze,081273151439', 'medan,Medan', 'Catridge Ursa - 0.6 Ohm - 5', 200000, 'Menunggu'),
('ORD700008', 50, 'usupp', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Centaurus M200 - Pink Edition - 2, Revangga - medan  - 4', 1401150, 'Menunggu'),
('ORD700009', 51, 'usupp', 'Muhamaad Kasep,081273151439', 'Jalan Kermat no 7,Medan', 'Centaurus M200 - Pink Edition - 2, Revangga - medan  - 4', 1401150, 'DiBatalkan');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `p_id` varchar(50) NOT NULL,
  `p_gambar` varchar(50) NOT NULL,
  `p_nama` varchar(50) NOT NULL,
  `p_pilihan` varchar(100) NOT NULL,
  `p_quantity` varchar(100) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `pemesan`, `p_id`, `p_gambar`, `p_nama`, `p_pilihan`, `p_quantity`, `harga_satuan`, `harga_total`) VALUES
(35, 'admin', 'P00011', 'COiL.png', 'COIL BashBoost', '', '1', 60000, 60000),
(39, 'papaku', 'P00012', 'Dovvopanda.png', 'Dovvo Panda Vee 2', '', '1', 480000, 480000),
(40, 'papaku', 'P00011', 'COiL.png', 'COIL BashBoost', '', '1', 60000, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `p_id` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `harga` int(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `deskripsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`p_id`, `nama`, `brand`, `kategori`, `ket`, `gambar`, `harga`, `stok`, `deskripsi`) VALUES
('8', 'Centaurus M200', 'Lost Vape', 'MOD', 'Pink Edition', 'thelemaquest.PNG', 575, 13, 'Limited Edition'),
('P00011', 'COIL BashBoost', 'BashBoost', 'COIL/CATRIDGE', '0.18 Ohm,0.11 Ohm', 'COiL.png', 60, 92, '0.18 Ohm Untuk Mechanikal dan 0.11 Ohm Untuk Dual coil Electical'),
('P00012', 'Dovvo Panda Vee 2', 'Dovvo', 'MOD', 'Black', 'Dovvopanda.png', 480, 93, 'Electrical Mod'),
('P00013', 'Iced Cappucino', 'Foom', 'LIQUID', '3% mg', 'Foom.png', 80, 82, '30 ml'),
('P00015', 'EMKAY', 'kaze', 'LIQUID', '30ml', 'Emkay.png', 75, 15, '6 mg'),
('P00016', 'catrigde XLIM', 'OXVA', 'COIL/CATRIDGE', '0.9 ohm', 'Catridge Xlim.png', 35000, 18, 'origin');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `gambar`) VALUES
(7, '5.png'),
(8, '4.png'),
(10, '6.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `akses` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `email`, `password`, `nama`, `nohp`, `alamat`, `akses`) VALUES
(1, 'papa@slot.com', '202cb962ac59075b964b07152d234b70', 'papakuu', '058794564548', 'Jalan Kermat no 7', 2),
(7, 'usup@slot.com', '202cb962ac59075b964b07152d234b70', 'usupp', '08583791664', 'medan', 2),
(8, 'admin@gmail.com', 'dc855efb0dc7476760afaa1b281665f1', 'admin', '00', 'medan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categori`
--
ALTER TABLE `categori`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
