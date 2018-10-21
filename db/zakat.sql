-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 07:09 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(6) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
('AML01', 'Putri Ayu', 'putriayu', 'd8d974f8fe85df21b034c572f58893649769ce88', 'adminartikel'),
('AML02', 'Noval Habibi', 'noval', '1a8a4954fa5c1739999148a062e106135bc3c37c', 'adminartikel');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` varchar(6) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `isi_artikel` text NOT NULL,
  `gambar` text NOT NULL,
  `nama_mustahiq` varchar(40) NOT NULL,
  `nama_admin` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul_artikel`, `isi_artikel`, `gambar`, `nama_mustahiq`, `nama_admin`) VALUES
('AR002', 'Keutamaan Zakat', '<p>trfyguhjko;</p>', 'img/artikel/Acier abstrack with corel + photoshop (14).jpg', 'Mustahiq', 'Putri Ayu'),
('AR003', 'Keutamaan Zakat 4', '<p>tcftvguhjmkl Noval</p>', '../img/artikel/Acier abstrack with corel + photoshop (24).jpg', 'Mustahiq', 'Putri Ayu');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(11) NOT NULL,
  `banner` text NOT NULL,
  `link` text NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `banner`, `link`, `keterangan`) VALUES
(3, 'img/banner/Acier abstrack with corel + photoshop (10).jpg', 'http://yrtdfd', 'Saya Udah '),
(4, 'img/banner/Acier abstrack with corel + photoshop (19).jpg', 'http://sagvbsdbsd', 'Saya Udah ');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_artikel`
--

CREATE TABLE `komentar_artikel` (
  `id_komentar` varchar(6) NOT NULL,
  `id_artikel` varchar(6) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mustahiq`
--

CREATE TABLE `mustahiq` (
  `id_mustahiq` varchar(8) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `nama_yayasan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_zakat` int(8) NOT NULL,
  `tgl_penyaluran` date NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mustahiq`
--

INSERT INTO `mustahiq` (`id_mustahiq`, `nama_penerima`, `nama_yayasan`, `alamat`, `jumlah_zakat`, `tgl_penyaluran`, `nama_admin`) VALUES
('MUS0001', 'Mustahiq 1', 'Yayasan Mustahiq 1', 'Alamat Mustahiq 1', 2000000, '2018-07-13', 'putriayu');

-- --------------------------------------------------------

--
-- Table structure for table `muzakki`
--

CREATE TABLE `muzakki` (
  `id_muzakki` varchar(6) NOT NULL,
  `foto_profil` varchar(30) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `muzakki`
--

INSERT INTO `muzakki` (`id_muzakki`, `foto_profil`, `nama_muzakki`, `email`, `password`, `alamat`, `no_telp`, `tgl_daftar`) VALUES
('MZ002', '0', 'Adinda', 'adinda@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '2018-07-13'),
('MZ003', '.jpg', 'Ahmad Noval', 'ahmad@gmail.com', '356a192b7913b04c54574d18c28d46e6395428ab', 'RRRRRRRRRRRRRR', '12345', '0000-00-00'),
('MZ004', 'img/foto_profil/tiara.png', 'Noval Habibi', 'noval7sihabibi@gmail.com', '1a8a4954fa5c1739999148a062e106135bc3c37c', 'Rangkasbitung', '085771966503', '2018-07-13'),
('MZ005', '', 'Muzakki', 'muzaki@m.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'jalan Muzaki', '23456', '2018-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_muzakki` varchar(6) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `balasan` text NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_muzakki`, `nama_muzakki`, `pesan`, `balasan`, `status`) VALUES
(12, 'MZ004', 'Noval Habibi', 'bbbbb', 'aaaaaa', 1),
(13, 'MZ004', 'Noval Habibi', 'dssss', 'iya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(15) NOT NULL,
  `id_muzakki` varchar(6) NOT NULL,
  `nama_muzakki` varchar(50) NOT NULL,
  `no_transaksi` varchar(14) NOT NULL,
  `jenis_zakat` varchar(30) NOT NULL,
  `bukti_transfer` text NOT NULL,
  `jumlah_bayar` int(8) NOT NULL,
  `nama_bank` varchar(10) NOT NULL,
  `atas_nama` varchar(50) NOT NULL,
  `rekening_bank_tujuan` varchar(10) NOT NULL,
  `jumlah_bayar_konfirmasi` int(8) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_muzakki`, `nama_muzakki`, `no_transaksi`, `jenis_zakat`, `bukti_transfer`, `jumlah_bayar`, `nama_bank`, `atas_nama`, `rekening_bank_tujuan`, `jumlah_bayar_konfirmasi`, `tgl_bayar`, `keterangan`, `status`) VALUES
('MZ003180700001', 'MZ003', 'Ahmad Noval', '1807131012421', 'Zakat Pertanian', '', 30000000, '', '', '', 0, '0000-00-00', '', 0),
('MZ003180700002', 'MZ003', 'Ahmad Noval', '1807131014491', 'Zakat Ternak', '', 40000000, '', '', '', 0, '0000-00-00', '', 0),
('MZ004180700001', 'MZ004', 'Noval Habibi', '1807131038011', 'Zakat Pertanian', 'img/bukti_transfer/IMG-20180703-WA0017.jpg', 30000000, 'bri', 'Habibi', 'mandiri', 30000000, '2018-07-13', 'Saya Udah Bayar', 2),
('MZ004180700002', 'MZ004', 'Noval Habibi', '1807131051581', 'Zakat Emas Perak', '', 5000000, '', '', '', 0, '0000-00-00', '', 0),
('MZ004180700003', 'MZ004', 'Noval Habibi', '1807131052101', 'Zakat Ternak', '', 400000000, '', '', '', 0, '0000-00-00', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `komentar_artikel`
--
ALTER TABLE `komentar_artikel`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- Indexes for table `mustahiq`
--
ALTER TABLE `mustahiq`
  ADD PRIMARY KEY (`id_mustahiq`);

--
-- Indexes for table `muzakki`
--
ALTER TABLE `muzakki`
  ADD PRIMARY KEY (`id_muzakki`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
