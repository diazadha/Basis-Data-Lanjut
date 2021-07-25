-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2020 at 05:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubesbdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintoko`
--

CREATE TABLE `admintoko` (
  `id_admin` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(128) NOT NULL,
  `id_role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` varchar(30) NOT NULL,
  `alamat_admin` varchar(256) NOT NULL,
  `kodepos` int(10) NOT NULL,
  `kota_admin` varchar(256) NOT NULL,
  `kontak_admin` varchar(13) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admintoko`
--

INSERT INTO `admintoko` (`id_admin`, `name`, `email`, `image`, `password`, `id_role`, `is_active`, `date_created`, `alamat_admin`, `kodepos`, `kota_admin`, `kontak_admin`, `id_toko`) VALUES
(1, 'Indo', 'dani.book@yahoo.com', 'default.jpg', '$2y$10$bms4Otkvh78K1a7SVgdjHO/AekCQ9DUVGEnN1xahPoOWbG8fTNUAC', 2, 1, '1585452346', '', 0, '', '', 2),
(2, 'Diaz', 'diazadha@gmail.com', 'default.jpg', '$2y$10$LgANhJGG2QHr3GymoB0jg.hLFtTakTtTgfmYYeouKde297KA8Ol7C', 2, 1, '1585848706', '', 0, '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `armada`
--

CREATE TABLE `armada` (
  `id` int(11) NOT NULL,
  `layanan` varchar(10) NOT NULL,
  `harga_layanan` int(128) NOT NULL,
  `nama_armada` varchar(255) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `armada`
--

INSERT INTO `armada` (`id`, `layanan`, `harga_layanan`, `nama_armada`, `id_toko`) VALUES
(8, 'Express', 10000, 'JNE', 2),
(9, 'Regular', 5000, 'TIKI', 2),
(10, 'Express', 15000, 'Si Cepat', 3);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga_barang` int(128) NOT NULL,
  `stok_barang` int(30) NOT NULL,
  `foto_barang` text NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `diskon` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `stok_barang`, `foto_barang`, `deskripsi_barang`, `keterangan`, `diskon`, `id_kategori`, `id_toko`) VALUES
(27, 'Fanta', 10000, 10, 'Fanta3.jpg', '', 'Enakkk', 15, 1, 2),
(28, 'Aqua 600 ml', 8000, 20, 'Aqua1.jpg', '', 'Segarr', 0, 1, 3),
(29, 'Chitato Sapi Panggang', 17000, 15, 'Chitato1.jpg', '<p>Mantapp</p>\r\n', 'Nagih Broo!!', 0, 2, 3),
(30, 'Pocari Sweat 2L', 8000, 10, 'Pocari1.gif', '<p>Mantap !!!</p>\r\n', 'Sueger', 0, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `discountcodes`
--

CREATE TABLE `discountcodes` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `code` varchar(30) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `discount` int(11) NOT NULL,
  `percent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `id` int(11) NOT NULL,
  `id_barang` int(120) NOT NULL,
  `min_qty` int(11) NOT NULL,
  `potongan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(128) NOT NULL,
  `hp_pemesan` varchar(13) NOT NULL,
  `kota_pemesan` varchar(128) NOT NULL,
  `kodepos` varchar(8) NOT NULL,
  `alamat` text NOT NULL,
  `order_date` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL,
  `id_toko` int(11) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `nama_pemesan`, `hp_pemesan`, `kota_pemesan`, `kodepos`, `alamat`, `order_date`, `batas_bayar`, `id_toko`, `email`) VALUES
(1, 'Diaz', '081380463199', 'Jakarta', '14514', 'Jalan Manggis 2 ', '2020-04-03 17:21:12', '2020-04-04 17:21:12', 2, 'diaz.adha@gmail.com'),
(13, 'Diaz', '081380463199', 'Depok', '16514', ' JL.Banda', '2020-04-04 01:54:27', '2020-04-05 01:54:27', 3, 'diaz.adha@gmail.com'),
(14, 'Ahmad', '081380463199', 'Banjarmasin', '12450', ' Jalan Kemanggisan', '2020-04-04 16:03:10', '2020-04-05 16:03:10', 3, 'ahmad@gmail.com'),
(15, 'Makmudin', '081380463199', 'Indramayu', '14321', 'Jalanin aja ', '2020-04-04 18:54:19', '2020-04-05 18:54:19', 3, 'id.makmudin@gmail.com'),
(16, 'Syifa', '081380463199', 'Bekasi', '14513', 'Jalan Menuju Hatimu ', '2020-04-04 19:12:00', '2020-04-05 19:12:00', 2, 'syifadin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `isi_keranjang`
--

CREATE TABLE `isi_keranjang` (
  `id_isi_keranjang` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(30) NOT NULL,
  `harga_barang` int(30) NOT NULL,
  `total_harga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Minuman'),
(2, 'Makanan'),
(8, 'cobas');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(30) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `id_invoice`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `pilihan`) VALUES
(6, 1, 27, 'Fanta', 1, 10000, ''),
(7, 13, 28, 'Aqua 600 ml', 10, 8000, ''),
(8, 14, 29, 'Chitato Sapi Panggang', 10, 17000, ''),
(9, 15, 30, 'Pocari Sweat 2L', 10, 8000, ''),
(10, 16, 27, 'Fanta', 5, 10000, ''),
(11, 16, 28, 'Aqua 600 ml', 5, 8000, '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `metode_bayar` varchar(255) NOT NULL,
  `mitra_bayar` varchar(255) NOT NULL,
  `rekening` varchar(30) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_invoice`, `metode_bayar`, `mitra_bayar`, `rekening`, `id_toko`) VALUES
(8, 0, 'Transfer', 'BCA', '2147483647', 2),
(12, 0, 'Transfer', 'BRI', '3425162738', 3),
(13, 0, 'Transfer', 'BRI', '3546372848', 3),
(14, 0, 'Transfer', 'Mandiri', '2536473829', 3),
(15, 0, 'Transfer', 'DKI', '4536274536', 3),
(16, 0, 'Transfer', 'BNI', '3546273846', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kode_pos` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock_barang`
--

CREATE TABLE `stock_barang` (
  `id` int(30) NOT NULL,
  `id_barang` int(120) NOT NULL,
  `qty` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` text NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `alamat_tujuan` varchar(128) NOT NULL,
  `harga_tarif` int(128) NOT NULL,
  `id_armada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(128) NOT NULL,
  `alamat_toko` varchar(128) NOT NULL,
  `kodepos_toko` int(30) NOT NULL,
  `foto_toko` text NOT NULL,
  `kota_toko` varchar(128) NOT NULL,
  `kontak_toko` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `nama_toko`, `alamat_toko`, `kodepos_toko`, `foto_toko`, `kota_toko`, `kontak_toko`) VALUES
(2, 'Family Mart', 'Jl. Sisingamangaraja, Kebayoran Baru', 12110, 'store.jpg', 'Jakarta Selatan', '089672231770'),
(3, 'Carrefour', 'JL. Lebak Bulus Raya', 14513, 'carrefour.jpg', 'Jakarta', '021653421');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(256) NOT NULL,
  `id_role` int(10) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` varchar(30) NOT NULL DEFAULT current_timestamp(),
  `alamat_user` varchar(256) NOT NULL,
  `kodepos` int(10) NOT NULL,
  `kota_user` varchar(256) NOT NULL,
  `kontak_user` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `id_role`, `is_active`, `date_created`, `alamat_user`, `kodepos`, `kota_user`, `kontak_user`) VALUES
(1, 'Makmudin', 'id.makmudin@gmail.com', 'default.jpg', '$2y$10$qW3vhlDMYHHH6eYq4ppXNe4bvjxBIcLfdEo/9qVh4/EOo/iLeArMK', 2, 1, '1579999999', '', 0, '', ''),
(2, 'Diaz', 'diaz.adha@if.uai.ac.id', 'default.jpg', '$2y$10$Bc9nogEHI8fr7P7n0vaY9eedjdmbdHU7lK7P7IOyJGtFPbtaWcfJq', 1, 1, '1584386234', '', 0, '', ''),
(5, 'Admin Toko', 'makmudin.uai@gmail.com', 'default.jpg', '$2y$10$P5UHnRliOOO6mPpNRiW0V.Ji3b0s8A745ti/WunpJbFj74mBalchG', 2, 1, '1584690975', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id_access_menu`, `id_role`, `id_menu`) VALUES
(1, 1, 1),
(3, 2, 2),
(4, 1, 3),
(7, 1, 5),
(8, 1, 16),
(9, 1, 17),
(10, 1, 19),
(12, 2, 26),
(14, 2, 21),
(15, 2, 4),
(16, 2, 22),
(17, 2, 23),
(18, 2, 24),
(19, 2, 32),
(20, 2, 25);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Manage Store'),
(22, 'Manage Payment'),
(23, 'Manage Courier'),
(24, 'Admin Store'),
(25, 'Manage Transaction');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator Market Toko'),
(2, 'Admin Toko');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_sub_menu`, `id_menu`, `title`, `url`, `icon`, `is_active`) VALUES
(8, 1, 'Dashboard', 'dashboard_marketplace/index', 'fas fa-fw fa-tachometer-alt', 1),
(9, 2, 'My Profile', 'profil_toko/index', 'fas fa-fw fa-user', 1),
(10, 2, 'Edit Profile', 'profile/edit', 'fas fa-fw fa-user-edit', 1),
(11, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(12, 3, 'Sub Menu Management', 'menu/submenu', 'far fa-fw fa-folder-open', 1),
(19, 4, 'Data Barang', 'toko/databarang', 'fas fa-fw fa-list', 1),
(20, 14, 'TOKO IF Cinere', 'toko/cabang', 'fas fa-fw fa-store', 1),
(23, 18, 'Data Barang', 'toko/databarang', 'fas fa-fw fa-store', 1),
(24, 16, 'asdvan', 'databarang', 'fas fa-fw fa-store', 1),
(25, 19, 'List Store', 'store', 'fas fa-fw fa-list', 1),
(26, 4, 'Kategori Barang', 'toko/kategoribarang', 'fas fa-fw fa-list', 1),
(27, 21, 'My Store', 'toko/store', 'fas fa-fw fa-store', 1),
(28, 22, 'Payment Method', 'toko/payment', 'fas fa-fw fa-money-bill-wave', 1),
(29, 23, 'Courier', 'toko/kurir', 'fas fa-fw fa-truck', 1),
(30, 24, 'Dashboard', 'dashboard_toko', ' fas fa-fw fa-tachometer-alt ', 1),
(31, 4, 'Diskon Barang', 'toko/diskonbarang', 'far fa-fw fa-tags', 1),
(32, 4, 'Stock In Product', 'stock/in/', 'fas fa-fw fa-inventory', 1),
(33, 25, 'Data Pesanan', 'toko/invoice', 'fas fa-luggage-cart', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintoko`
--
ALTER TABLE `admintoko`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_role` (`id_role`,`id_toko`);

--
-- Indexes for table `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `discountcodes`
--
ALTER TABLE `discountcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isi_keranjang`
--
ALTER TABLE `isi_keranjang`
  ADD PRIMARY KEY (`id_isi_keranjang`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_invoice_2` (`id_invoice`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`),
  ADD KEY `id_armada` (`id_armada`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintoko`
--
ALTER TABLE `admintoko`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `armada`
--
ALTER TABLE `armada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `discountcodes`
--
ALTER TABLE `discountcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `isi_keranjang`
--
ALTER TABLE `isi_keranjang`
  MODIFY `id_isi_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
