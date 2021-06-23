-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 01:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denzelstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(300) NOT NULL,
  `harga_barang` varchar(300) NOT NULL,
  `deskripsi` text NOT NULL,
  `categories` varchar(200) NOT NULL,
  `stok_barang` varchar(400) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga_barang`, `deskripsi`, `categories`, `stok_barang`, `gambar`) VALUES
(1, 'Apex Legend', '1000', 'Akun Abal-Abal', 'akungame', '0', 'apex.png'),
(3, 'PUBG', '1000', 'Skin Lengkap Slur', 'itemgame', '2', 'pubg.png'),
(7, 'Skin Senjata', '2000', 'Skin terlangka', 'skingame', '1', ''),
(8, 'Battlepast Premium', '5000', 'Sangat murah dan terjamin', 'battlepast', '2', ''),
(12, 'bloodhound battlepass', '10000', 'murah', 'skingame', '5', 'logo21.png'),
(14, 'octaain battlepass', '100000', 'murah', 'skingame', '1', 'logo11.png'),
(26, 'mirage', '100000', 'murah murahan', 'skin game', '1', 'logo12.png');

-- --------------------------------------------------------

--
-- Table structure for table `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `tgl_pemesanan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendapatan`
--

INSERT INTO `pendapatan` (`id`, `nama`, `alamat`, `no_telp`, `tgl_pemesanan`, `batas_bayar`) VALUES
(8, 'Solia', 'Jakarta', '08126324584', '2021-05-31 00:39:24', '2021-06-01 00:39:24'),
(9, 'Angel', 'Sukabumi', '081235424854', '2021-05-31 01:09:06', '2021-06-01 01:09:06'),
(10, 'Ransei', 'Isekai', '0541211654', '2021-05-31 01:13:21', '2021-06-01 01:13:21'),
(11, 'Ureh', 'Goa', '08125154287', '2021-05-31 01:14:02', '2021-06-01 01:14:02'),
(12, 'Bacot', 'Isekai', '0542174524', '2021-05-31 01:22:05', '2021-06-01 01:22:05'),
(13, 'Kevin Febriansyah', 'asdasda', '123312', '2021-05-31 02:24:28', '2021-06-01 02:24:28'),
(14, 'Kevin Febriansyah', 'asdasd', '123312', '2021-05-31 03:44:23', '2021-06-01 03:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_pendapatan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_pendapatan`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `pilihan`) VALUES
(11, 8, 1, 'Apex Legend', 2, 1000, ''),
(12, 8, 3, 'PUBG', 2, 1000, ''),
(13, 9, 1, 'Apex Legend', 2, 1000, ''),
(14, 9, 3, 'PUBG', 2, 1000, ''),
(15, 10, 3, 'PUBG', 2, 1000, ''),
(16, 11, 1, 'Apex Legend', 1, 1000, ''),
(17, 11, 3, 'PUBG', 1, 1000, ''),
(18, 12, 1, 'Apex Legend', 1, 1000, ''),
(19, 12, 3, 'PUBG', 1, 1000, ''),
(20, 13, 1, 'Apex Legend', 2, 1000, ''),
(21, 13, 3, 'PUBG', 1, 1000, ''),
(22, 14, 3, 'PUBG', 2, 1000, ''),
(23, 14, 1, 'Apex Legend', 1, 1000, ''),
(24, 14, 8, 'Battlepast Premium', 1, 5000, '');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_produk` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
	UPDATE barang SET stok_barang = stok_barang-NEW.jumlah
    WHERE id_barang = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'heru', 'herrr14', '123', 2),
(3, 'admin', 'admin', '123', 1),
(5, 'heru', 'heru14', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
