-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 04:35 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `stoktemp`
--

CREATE TABLE `stoktemp` (
  `id` int(10) NOT NULL,
  `idmenu` int(10) NOT NULL,
  `stok` int(100) NOT NULL,
  `sisa` int(100) NOT NULL,
  `tambah` int(10) NOT NULL,
  `kurang` int(10) NOT NULL,
  `stokbaru` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stoktemp`
--

INSERT INTO `stoktemp` (`id`, `idmenu`, `stok`, `sisa`, `tambah`, `kurang`, `stokbaru`) VALUES
(1275, 16, 2, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblkategori`
--

CREATE TABLE `tblkategori` (
  `idkategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblkategori`
--

INSERT INTO `tblkategori` (`idkategori`, `kategori`) VALUES
(38, 'Minuman'),
(39, 'Makanan'),
(40, 'Sop Buah'),
(41, 'Jus Buah'),
(42, 'Es Nutrisari'),
(43, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE `tblmenu` (
  `idmenu` int(11) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `harga` float NOT NULL,
  `stok` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmenu`
--

INSERT INTO `tblmenu` (`idmenu`, `idkategori`, `menu`, `gambar`, `harga`, `stok`) VALUES
(15, 38, 'Cappucinno Cincau', 'Menu_makanan_es-kopi-cappucino_1552202327.jpg', 5000, 29),
(16, 41, 'Jus Alpukat', 'Menu_makanan_jus-alpukat_1552201145.jpg', 10000, 2),
(17, 38, 'Es Susu Cokelat', 'Menu_makanan_es-susu-cokelat_1552202151.jpg', 4000, 9),
(21, 38, 'Lemon Tea', 'Menu_makanan_es-teh-lemon_1552202101.jpg', 5000, 1),
(24, 39, 'Takoyaki', 'takoyaki-800x800.jpg', 10000, 92),
(25, 39, 'Telur Mini', 'martabak-telur-mini-mix-sayuran-foto-resep-utama.jpg', 5000, 97),
(26, 40, 'Sop Buah', 'mwfv9mrsrz61o0luj1rh.jpg', 10000, 100),
(27, 41, 'Jus Mangga', 'jus mangga.jpg', 8000, 15),
(28, 38, 'Pop ice Coklat', 'pop ice coklat.jpg', 4000, 20),
(29, 38, 'Pop ice Stroberi', 'pop ice stroberi.jpg', 4000, 20),
(30, 38, 'Pop ice Blueberry', 'pop ice blue berry.jpg', 4000, 15),
(31, 38, 'Pop ice Anggur', 'pop ice anggur.jpg', 4000, 18),
(32, 41, 'Jus Jambu', 'jus jambu.jpg', 7000, 8),
(33, 41, 'Jus Buah Naga', 'jus naga.jpg', 9000, 10),
(34, 41, 'Jus Tomat', 'jus tomat.jpg', 7000, 5),
(35, 41, 'Jus Wortel', 'jus wortel.jpg', 7000, 5),
(36, 41, 'Jus Jeruk', 'jus jeruk.jpg', 7000, 30),
(37, 38, 'Es Milo', 'es milo.jpg', 5000, 22),
(38, 38, 'Es Nutrisari Jeruk Peras', 'es nutrisari jeruk peras.jpg', 3000, 15),
(39, 42, 'Nutrisari Anggur', 'nutrisari anggur.jpg', 3000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `idorder` int(11) NOT NULL,
  `idpelanggan` int(11) NOT NULL,
  `tglorder` date NOT NULL,
  `total` float NOT NULL DEFAULT 0,
  `bayar` float NOT NULL DEFAULT 0,
  `kembali` float NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`idorder`, `idpelanggan`, `tglorder`, `total`, `bayar`, `kembali`, `status`) VALUES
(1, 1, '2022-07-22', 91000, 98000, 7000, 1),
(2, 1, '2022-07-22', 105000, 110000, 5000, 1),
(5, 4, '2022-07-22', 279000, 280000, 1000, 1),
(6, 5, '2022-07-22', 125000, 125000, 0, 1),
(7, 6, '2022-07-22', 29000, 30000, 1000, 1),
(8, 7, '2022-07-22', 50000, 50000, 0, 1),
(10, 9, '2022-07-23', 60000, 80000, 20000, 1),
(11, 10, '2022-07-23', 202000, 600000, 398000, 1),
(12, 11, '2022-07-26', 10000, 100000, 90000, 1),
(13, 12, '2022-07-26', 5000, 10000, 5000, 1),
(14, 13, '2022-07-26', 5000, 10000, 5000, 1),
(15, 14, '2022-07-26', 5000, 15000, 10000, 1),
(16, 15, '2022-07-26', 4000, 5000, 1000, 1),
(17, 16, '2022-07-26', 20000, 20000, 0, 1),
(18, 17, '2022-08-08', 34000, 0, 0, 0),
(19, 18, '2022-08-08', 52000, 60000, 8000, 1),
(20, 19, '2022-08-08', 10000, 0, 0, 0),
(21, 20, '2022-08-08', 48000, 50000, 2000, 1),
(22, 21, '2022-08-08', 10000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblorderdetail`
--

CREATE TABLE `tblorderdetail` (
  `idorderdetail` int(11) NOT NULL,
  `idorder` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargajual` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblorderdetail`
--

INSERT INTO `tblorderdetail` (`idorderdetail`, `idorder`, `idmenu`, `jumlah`, `hargajual`) VALUES
(1, 1, 22, 2, 15000),
(2, 1, 15, 3, 7000),
(3, 1, 20, 4, 10000),
(4, 2, 22, 3, 15000),
(5, 2, 19, 3, 10000),
(6, 2, 18, 2, 15000),
(7, 3, 22, 1, 15000),
(8, 4, 20, 5, 10000),
(9, 4, 18, 4, 15000),
(10, 5, 23, 11, 20000),
(11, 5, 17, 2, 4000),
(12, 5, 18, 2, 15000),
(13, 5, 15, 3, 7000),
(14, 6, 22, 3, 15000),
(15, 6, 23, 3, 20000),
(16, 6, 17, 5, 4000),
(17, 7, 15, 3, 7000),
(18, 7, 17, 2, 4000),
(19, 8, 16, 2, 10000),
(20, 8, 20, 3, 10000),
(21, 9, 18, 4, 15000),
(22, 9, 17, 3, 4000),
(23, 9, 16, 1, 10000),
(24, 9, 19, 1, 10000),
(25, 10, 22, 2, 15000),
(26, 10, 16, 3, 10000),
(27, 11, 17, 3, 4000),
(28, 11, 18, 8, 15000),
(29, 11, 15, 10, 7000),
(30, 12, 15, 4, 7000),
(31, 12, 18, 3, 15000),
(32, 12, 19, 1, 10000),
(33, 13, 22, 2, 15000),
(34, 12, 24, 1, 10000),
(35, 13, 15, 1, 5000),
(36, 14, 25, 1, 5000),
(37, 15, 15, 1, 5000),
(38, 16, 17, 1, 4000),
(39, 17, 15, 2, 5000),
(40, 17, 25, 2, 5000),
(41, 18, 16, 1, 10000),
(42, 18, 17, 1, 4000),
(43, 18, 24, 2, 10000),
(44, 19, 39, 4, 3000),
(45, 19, 24, 4, 10000),
(46, 20, 16, 1, 10000),
(47, 21, 39, 16, 3000),
(48, 22, 16, 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `iduser` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`iduser`, `user`, `email`, `password`, `level`, `aktif`) VALUES
(9, 'owner', 'owner@gmail.com', '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'owner', 1),
(10, 'koki', 'koki@gmail.com', '707c403908e826807640df1bea0ad7674d40b25de50c190bd8aeb5ef00d08055', 'koki', 1),
(11, 'kasir', 'kasir@gmail.com', '2c7ee7ade401a7cef9ef4dad9978998cf42ed805243d6c91f89408c6097aa571', 'kasir', 1),
(12, 'admin', 'admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin', 1),
(13, 'chaliya', 'chaliya@gmail.com', '18a1f84cac4367e99eb69f2f2ae0a4f10612765ce71428d6813d53c71b0705eb', 'owner', 1),
(15, 'Siti', 'Siti@gmail.com', 'a7ad5342de24cf9ad849a41b9a265274ebc803807f9ff6734bd7e9c031e7b042', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stoktemp`
--
ALTER TABLE `stoktemp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idmenu` (`idmenu`);

--
-- Indexes for table `tblkategori`
--
ALTER TABLE `tblkategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`idorder`);

--
-- Indexes for table `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  ADD PRIMARY KEY (`idorderdetail`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stoktemp`
--
ALTER TABLE `stoktemp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1276;

--
-- AUTO_INCREMENT for table `tblkategori`
--
ALTER TABLE `tblkategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblorderdetail`
--
ALTER TABLE `tblorderdetail`
  MODIFY `idorderdetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
