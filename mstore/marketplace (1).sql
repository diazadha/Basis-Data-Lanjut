-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Apr 2020 pada 13.12
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admintoko`
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
-- Dumping data untuk tabel `admintoko`
--

INSERT INTO `admintoko` (`id_admin`, `name`, `email`, `image`, `password`, `id_role`, `is_active`, `date_created`, `alamat_admin`, `kodepos`, `kota_admin`, `kontak_admin`, `id_toko`) VALUES
(1, 'Indo', 'dani.book@yahoo.com', 'default.jpg', '$2y$10$bms4Otkvh78K1a7SVgdjHO/AekCQ9DUVGEnN1xahPoOWbG8fTNUAC', 2, 1, '1585452346', '', 0, '', '', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `armada`
--

CREATE TABLE `armada` (
  `id` int(11) NOT NULL,
  `layanan` varchar(10) NOT NULL,
  `harga_layanan` int(128) NOT NULL,
  `nama_armada` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `armada`
--

INSERT INTO `armada` (`id`, `layanan`, `harga_layanan`, `nama_armada`) VALUES
(1, 'jn', 12312, 'asdasdf'),
(2, 'jntw', 12312, 'asdasdf'),
(3, 'jntw', 12312, 'asdasdf'),
(4, 'jntwasdfa', 12312124, 'asdasdfad'),
(5, 'jntwasdfa', 12312124, 'asdasdfad'),
(6, 'jntwasdfa', 12312124, 'asdasdfad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
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
  `id_toko` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `stok_barang`, `foto_barang`, `deskripsi_barang`, `keterangan`, `diskon`, `id_toko`, `id_kategori`) VALUES
(1, 'Jaket Bomber', 5, 50, 'barang.jpg', '<p>Material Scoot Waterproof / Anti Air Bahan dalam Dakron tebal Terdapat 1 kantong di bagian dalam dan 2 kantong</p>\r\n\r\n<p>di bagian luar Jahitan Rapih dan kuat</p>\r\n\r\n<p><strong>Warna:</strong></p>\r\n\r\n<ol>\r\n	<li>Hitam,</li>\r\n	<li>Navy,</li>\r\n	<li>Marun,&amp;</li>\r\n</ol>\r\n\r\n<p><strong>Warna:</strong></p>\r\n\r\n<ol>\r\n	<li>Hitam,</li>\r\n	<li>Navy,</li>\r\n	<li>Marun,&amp;</li>\r\n	<li>\r\n	<p><strong>Warna:</strong></p>\r\n	</li>\r\n	<li>Hitam,</li>\r\n	<li>Navy,</li>\r\n	<li>Marun,&amp;</li>\r\n</ol>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Warna:</strong></p>\r\n\r\n<ol>\r\n	<li>Hitam,</li>\r\n	<li>Navy,</li>\r\n	<li>Marun,&amp;</li>\r\n</ol>\r\n', 'Ini adalah keterangan singkat Ini adalah keterangan singkat Ini adalah keterangan singkat ', 0, 1, 1),
(7, 'Coba', 12, 23, 'download_(1)2.jpg', '<p>asdfa</p>\r\n', 'sdfasdf', 3, 1, 1),
(9, 'Jaket Bomber Polos Pria m', 678888, 12, 'download_(1)3.jpg', '<p>asdcad</p>\r\n', ' mnmn', 3, 1, 1),
(10, 'Coba 12314', 2323436, 78, 'hp.jpg', '<p>adsgasd</p>\r\n', 'adf', 12, 1, 1),
(16, 'Jaket Bomber Polos Pria ', 76576, 23, 'hp1.jpg', '<p>dvsdva</p>\r\n', 'dsdca', 3, 1, 0),
(17, 'asadfa', 76576, 78, 'download_(1)6.jpg', '<p>sadfasd</p>\r\n', 'adfad', 12, 1, 0),
(18, 'Coba 12314', 76576, 12, 'beras8.JPG', '<p>asdcasdcasdcasdc</p>\r\n', 'asdca', 12, 1, 0),
(19, 'qq', 100000, 123, 'download6.jpg', '<p>qsas</p>\r\n', 'qw', 20, 1, 8),
(21, 'Coba', 678888, 78, 'download_(1)7.jpg', '<p>asfasdva</p>\r\n', 'asdakjsdn', 12, 1, 0),
(22, 'Jaket Bomber Polos ', 678888, 3, '3.jpg', '<p>zxcvzxcv</p>\r\n', 'zxvcz', 3, 1, 0),
(23, 'Jaket fe ', 76576, 78, '2.png', '<p>vasdvasd</p>\r\n', 'asdca', 23, 2, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `discountcodes`
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
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id` int(11) NOT NULL,
  `id_barang` int(120) NOT NULL,
  `min_qty` int(11) NOT NULL,
  `potongan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `nama_pemesan` varchar(128) NOT NULL,
  `hp_pemesan` varchar(13) NOT NULL,
  `kota_pemesan` varchar(128) NOT NULL,
  `kodepos` varchar(8) NOT NULL,
  `alamat` text NOT NULL,
  `order_date` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `invoice`
--

INSERT INTO `invoice` (`id`, `nama_pemesan`, `hp_pemesan`, `kota_pemesan`, `kodepos`, `alamat`, `order_date`, `batas_bayar`) VALUES
(3, 'makmudin', '089672231770', 'Jakarta Selatan', '12110', 'Jl. Sisingamangaraja, Kebayoran Baru', '2020-04-01 19:58:23', '2019-12-01 19:58:23'),
(4, 'makmudin', '089672231770', 'Jakarta Selatan', '12110', 'Jl. Sisingamangaraja, Kebayoran Baru', '2020-04-01 20:11:48', '2019-12-01 20:11:48'),
(5, 'makmudin', '089672231770', 'Jakarta Selatan', '12110', 'Jl. Sisingamangaraja, Kebayoran Baru', '2020-04-01 20:12:03', '2019-12-01 20:12:03'),
(6, 'makmudin', '089672231770', 'Jakarta Selatan', '12110', 'Jl. Sisingamangaraja, Kebayoran Baru', '2020-04-01 20:17:38', '2019-12-01 20:17:38'),
(7, 'makmudin', '089672231770', 'Jakarta Selatan', '12110', 'Jl. Sisingamangaraja, Kebayoran Baru', '2020-04-01 20:18:37', '2019-12-01 20:18:37'),
(8, 'makmudin', '089672231770', 'Jakarta Selatan', '12110', 'Jl. Sisingamangaraja, Kebayoran Baru', '2020-04-01 20:20:19', '2019-12-01 20:20:19'),
(9, 'makmudin', '089672231770', 'Jakarta Selatan', '12110', 'Jl. Sisingamangaraja, Kebayoran Baru', '2020-04-01 20:20:28', '2019-12-01 20:20:28'),
(10, 'makmudin', '089672231770', 'Jakarta Selatan', '12110', 'Jl. Sisingamangaraja, Kebayoran Baru', '2020-04-01 20:27:09', '2020-04-02 20:27:09'),
(11, 'makmudin coba', '089672231770', 'Jakarta Selatan', '12110', 'Jl. Sisingamangaraja, Kebayoran Baru', '2020-04-01 21:03:34', '2020-04-02 21:03:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_keranjang`
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
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Fashion Pria'),
(2, 'Fashion Wanita'),
(8, 'cobas'),
(9, 'Dapur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
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
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_invoice`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 6, 10, 'Coba 12314', 1, 2323436, ''),
(2, 11, 1, 'Jaket Bomber', 1, 4500, ''),
(3, 11, 7, 'Coba', 1, 12, ''),
(4, 11, 9, 'Jaket Bomber Polos Pria m', 1, 678888, ''),
(5, 11, 10, 'Coba 12314', 1, 2323436, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `metode_bayar` varchar(255) NOT NULL,
  `mitra_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_invoice`, `metode_bayar`, `mitra_bayar`) VALUES
(8, 0, 'Transfer', 'bcacc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembeli`
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
-- Struktur dari tabel `stock_barang`
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
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `alamat_tujuan` varchar(128) NOT NULL,
  `harga_tarif` int(128) NOT NULL,
  `id_armada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
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
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id`, `nama_toko`, `alamat_toko`, `kodepos_toko`, `foto_toko`, `kota_toko`, `kontak_toko`) VALUES
(1, 'MSTORE CINERE', 'Jl. Cinere Raya', 16513, 'toko.jpg', 'Depok', '089672231770'),
(2, 'Indo Store', 'Jl. Sisingamangaraja, Kebayoran Baru', 12110, 'store.jpg', 'Jakarta Selatan', '089672231770');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `image`, `password`, `id_role`, `is_active`, `date_created`, `alamat_user`, `kodepos`, `kota_user`, `kontak_user`) VALUES
(1, 'Makmudin', 'id.makmudin@gmail.com', 'default.jpg', '$2y$10$qW3vhlDMYHHH6eYq4ppXNe4bvjxBIcLfdEo/9qVh4/EOo/iLeArMK', 2, 1, '1579999999', '', 0, '', ''),
(2, 'Diaz', 'diaz.adha@if.uai.ac.id', 'default.jpg', '$2y$10$Bc9nogEHI8fr7P7n0vaY9eedjdmbdHU7lK7P7IOyJGtFPbtaWcfJq', 1, 1, '1584386234', '', 0, '', ''),
(5, 'Admin Toko', 'makmudin.uai@gmail.com', 'default.jpg', '$2y$10$P5UHnRliOOO6mPpNRiW0V.Ji3b0s8A745ti/WunpJbFj74mBalchG', 2, 1, '1584690975', '', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id_access_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_access_menu`
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
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_menu`
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
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator Market Toko'),
(2, 'Admin Toko');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
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
-- Indeks untuk tabel `admintoko`
--
ALTER TABLE `admintoko`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_role` (`id_role`,`id_toko`);

--
-- Indeks untuk tabel `armada`
--
ALTER TABLE `armada`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `discountcodes`
--
ALTER TABLE `discountcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `isi_keranjang`
--
ALTER TABLE `isi_keranjang`
  ADD PRIMARY KEY (`id_isi_keranjang`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_invoice_2` (`id_invoice`);

--
-- Indeks untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`),
  ADD KEY `id_armada` (`id_armada`);

--
-- Indeks untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id_access_menu`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admintoko`
--
ALTER TABLE `admintoko`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `armada`
--
ALTER TABLE `armada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `discountcodes`
--
ALTER TABLE `discountcodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `isi_keranjang`
--
ALTER TABLE `isi_keranjang`
  MODIFY `id_isi_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stock_barang`
--
ALTER TABLE `stock_barang`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id_access_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `isi_keranjang`
--
ALTER TABLE `isi_keranjang`
  ADD CONSTRAINT `isi_keranjang_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `isi_keranjang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stock_barang`
--
ALTER TABLE `stock_barang`
  ADD CONSTRAINT `stock_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD CONSTRAINT `tarif_ibfk_1` FOREIGN KEY (`id_armada`) REFERENCES `armada` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
