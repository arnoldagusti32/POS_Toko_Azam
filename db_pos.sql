-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 07:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_barcode` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `profit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_barcode`, `nama_barang`, `satuan`, `stok`, `harga_beli`, `harga_jual`, `profit`) VALUES
('45454545', 'Masker Kuping', 'LUSIN', 53, 27000, 30000, 3000),
('711844130037', 'Payung 16 Jari', 'PCS', 20, 25000, 35000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kode_pelanggan` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kode_pelanggan`, `nama`, `alamat`, `telepon`, `email`) VALUES
(4, 'arnold', 'canada', '08965412354', 'arnoldagusti8@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `id` int(11) NOT NULL,
  `kode_pembelian` varchar(20) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `kode_supplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`id`, `kode_pembelian`, `kode_barcode`, `jumlah`, `total`, `tgl_pembelian`, `kode_supplier`) VALUES
(1, '', '45454545', 1, 27000, '2021-03-19', 0),
(2, '', '45454545', 1, 27000, '2021-03-19', 0),
(3, 'BL-0173508749', '45454545', 1, 27000, '2021-03-19', 0),
(4, 'BL-0173508749', '45454545', 1, 27000, '2021-03-19', 0),
(5, 'BL-9117762615', '711844130037', 2, 50000, '2021-03-19', 0),
(6, 'BL-4294745795', '711844130037', 2, 50000, '2021-03-19', 0),
(8, 'BL-2422557464', '711844130037', 2, 50000, '2021-03-19', 1),
(9, 'BL-2422557464', '45454545', 2, 54000, '2021-03-19', 1),
(11, 'BL-5939449696', '45454545', 1, 27000, '2021-03-19', 1),
(12, 'BL-5939449696', '711844130037', 10, 250000, '2021-03-19', 1),
(13, 'BL-2117934332', '45454545', 1, 27000, '2021-03-19', 1),
(14, 'BL-2117934332', '711844130037', 1, 25000, '2021-03-19', 0),
(15, 'BL-9971313304', '45454545', 1, 27000, '2021-03-20', 1),
(16, 'BL-5062211148', '711844130037', 1, 25000, '2021-03-20', 1),
(17, 'BL-9416180703', '45454545', 1, 27000, '2021-03-20', 1),
(18, 'BL-4921278579', '711844130037', 5, 125000, '2021-03-20', 1),
(19, 'BL-4921278579', '45454545', 3, 81000, '2021-03-20', 0),
(20, 'BL-6056831580', '45454545', 3, 81000, '2021-03-20', 1),
(21, 'BL-6056831580', '711844130037', 7, 175000, '2021-03-20', 1),
(22, 'BL-7321430046', '45454545', 2, 54000, '2021-03-20', 1),
(23, 'BL-7321430046', '711844130037', 6, 150000, '2021-03-20', 1),
(24, 'BL-4826592207', '45454545', 6, 162000, '2021-03-20', 1),
(25, 'BL-8384281252', '45454545', 10, 270000, '2021-03-20', 1);

--
-- Triggers `tb_pembelian`
--
DELIMITER $$
CREATE TRIGGER `beli` AFTER INSERT ON `tb_pembelian` FOR EACH ROW BEGIN
UPDATE tb_barang
SET stok=stok+ NEW.jumlah
WHERE
kode_barcode = NEW.kode_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian_detail`
--

CREATE TABLE `tb_pembelian_detail` (
  `kode_pembelian` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pembelian_detail`
--

INSERT INTO `tb_pembelian_detail` (`kode_pembelian`, `bayar`, `kembali`, `diskon`, `potongan`, `total_b`) VALUES
('BL-4826592207', 400000, 254200, 10, 16200, 145800),
('BL-7321430046', 200000, 16400, 10, 20400, 183600),
('BL-8384281252', 300000, 35400, 2, 5400, 264600);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(25) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `password`, `nama`, `level`, `photo`) VALUES
(1, 'admin', 'admin', 'Arnold Agusti Pratama', 'admin', 'user.png'),
(3, 'kasir', 'kasir', 'kasir', 'kasir', 'undraw_profile.svg'),
(4, '181011402236', '40223', 'Aenun Nisa', 'admin', 'undraw_profile_1.svg'),
(5, '181011400220', '400220', 'Dandi Ramdani', 'admin', 'undraw_profile_2.svg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id` int(11) NOT NULL,
  `kode_penjualan` varchar(20) NOT NULL,
  `kode_barcode` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_penjualan` date NOT NULL,
  `kode_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id`, `kode_penjualan`, `kode_barcode`, `jumlah`, `total`, `tgl_penjualan`, `kode_pelanggan`) VALUES
(1, 'PJ-2550596751', '45454545', 7, 210000, '2021-03-19', 0),
(2, 'PJ-9504546115', '45454545', 5, 150000, '2021-03-19', 0),
(3, 'PJ-5396868787', '45454545', 9, 270000, '2021-03-19', 0),
(7, 'PJ-8686142223', '45454545', 1, 30000, '2021-03-19', 4),
(8, 'PJ-0012455801', '711844130037', 10, 350000, '2021-03-20', 4),
(9, 'PJ-0012455801', '711844130037', 7, 245000, '2021-03-20', 4),
(10, 'PJ-6643590490', '711844130037', 3, 105000, '2021-03-20', 4),
(11, 'PJ-6643590490', '711844130037', 6, 210000, '2021-03-20', 4),
(12, 'PJ-5724102646', '45454545', 9, 270000, '2021-03-20', 4),
(13, 'PJ-9795251417', '45454545', 5, 150000, '2021-03-20', 4),
(14, 'PJ-9795251417', '711844130037', 2, 70000, '2021-03-20', 4),
(15, 'PJ-2491124776', '45454545', 10, 300000, '2021-03-20', 0),
(16, 'PJ-8149316823', '45454545', 8, 240000, '2021-03-20', 4),
(17, 'PJ-8149316823', '45454545', 7, 210000, '2021-03-20', 4),
(18, 'PJ-8149316823', '45454545', 2, 60000, '2021-03-20', 0),
(19, 'PJ-4595118318', '711844130037', 10, 350000, '2021-03-20', 4);

--
-- Triggers `tb_penjualan`
--
DELIMITER $$
CREATE TRIGGER `jual` AFTER INSERT ON `tb_penjualan` FOR EACH ROW BEGIN 
UPDATE tb_barang 
SET stok = stok-NEW.jumlah
WHERE kode_barcode = NEW.kode_barcode;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan_detail`
--

CREATE TABLE `tb_penjualan_detail` (
  `kode_penjualan` varchar(50) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `potongan` int(11) NOT NULL,
  `total_b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penjualan_detail`
--

INSERT INTO `tb_penjualan_detail` (`kode_penjualan`, `bayar`, `kembali`, `diskon`, `potongan`, `total_b`) VALUES
('PJ-4595118318', 500000, 153500, 1, 3500, 346500),
('PJ-5724102646', 300000, 0, 0, 0, 300000),
('PJ-8149316823', 0, 0, 0, 0, 0),
('PJ-9795251417', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kode_supplier` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`kode_supplier`, `nama`, `alamat`, `telepon`, `email`) VALUES
(1, 'PT. Wahid', 'Jln. sawangan', '08965412354', 'aqilallzero@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_barcode`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kode_pelanggan`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembelian_detail`
--
ALTER TABLE `tb_pembelian_detail`
  ADD PRIMARY KEY (`kode_pembelian`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_penjualan_detail`
--
ALTER TABLE `tb_penjualan_detail`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `kode_pelanggan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  MODIFY `kode_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
