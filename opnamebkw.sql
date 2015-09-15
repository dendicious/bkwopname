-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2015 at 06:41 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `opnamebkw`
--

-- --------------------------------------------------------

--
-- Table structure for table `datajabatan`
--

CREATE TABLE IF NOT EXISTS `datajabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `datajabatan`
--

INSERT INTO `datajabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Quality Assurance '),
(2, 'Office Engineering'),
(3, 'Site Enginering'),
(4, 'Pelaksana'),
(5, 'Site Manager');

-- --------------------------------------------------------

--
-- Table structure for table `dataoe_material`
--

CREATE TABLE IF NOT EXISTS `dataoe_material` (
  `no_rec` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(15) NOT NULL,
  `id_project` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `volume` int(10) NOT NULL,
  `harga_satuan` double(15,0) NOT NULL,
  `total_harga` double(15,0) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_rec`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `dataoe_material`
--

INSERT INTO `dataoe_material` (`no_rec`, `id_user`, `id_project`, `id_produk`, `volume`, `harga_satuan`, `total_harga`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 'U003', 'PRJK-002452', 'X2-Y2/01/AB', 4, 300000, 1200000, '2015-09-06 17:00:00', '2015-09-14 04:03:08'),
(2, 'U003', 'PRJK-002452', 'X6-Y5/02/CK', 6, 700000, 4200000, '2015-09-06 17:00:00', '0000-00-00 00:00:00'),
(3, 'U003', 'PRJK-002453', 'X2-Y2/01/AB', 3, 950000, 2750000, '2015-09-06 17:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `datape_material`
--

CREATE TABLE IF NOT EXISTS `datape_material` (
  `no_rec` int(10) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_project` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `volume` int(10) NOT NULL,
  `harga_satuan` double(15,0) NOT NULL,
  `total_harga` double(15,0) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_rec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datape_material`
--

INSERT INTO `datape_material` (`no_rec`, `id_user`, `id_project`, `id_produk`, `volume`, `harga_satuan`, `total_harga`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 'U004', 'PRJK-002452', 'X2-Y2/01/AB', 4, 300000, 1200000, '2015-09-15 04:22:13', '0000-00-00 00:00:00'),
(3, 'U004', 'PRJK-002453', 'X2-Y2/01/AB', 3, 950000, 2750000, '2015-09-15 04:25:57', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dataproyek`
--

CREATE TABLE IF NOT EXISTS `dataproyek` (
  `id_proyek` varchar(30) NOT NULL DEFAULT '',
  `nama_proyek` varchar(50) DEFAULT NULL,
  `pic` varchar(15) DEFAULT NULL,
  `tanggal_dibuat` timestamp NULL DEFAULT NULL,
  `tanggal_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_proyek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataproyek`
--

INSERT INTO `dataproyek` (`id_proyek`, `nama_proyek`, `pic`, `tanggal_dibuat`, `tanggal_update`) VALUES
('PRJK-002452', 'Menara Saidah', 'TEG', '2015-09-06 17:00:00', NULL),
('PRJK-002453', 'Tugu Monas', 'TEG', '2015-09-06 17:00:00', NULL),
('PRJK-002454', 'RSUD Kota Bogor', 'TEG', '2015-09-06 17:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `datase_headinvoice`
--

CREATE TABLE IF NOT EXISTS `datase_headinvoice` (
  `id_rec` int(11) NOT NULL,
  `id_proyek` varchar(30) NOT NULL,
  `total` double(15,0) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanggal_diubah` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_rec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datase_invoice`
--

CREATE TABLE IF NOT EXISTS `datase_invoice` (
  `no_rec` int(10) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_project` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `volume` int(10) NOT NULL,
  `harga_satuan` double(15,0) NOT NULL,
  `total_harga` double(15,0) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_rec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datase_material`
--

CREATE TABLE IF NOT EXISTS `datase_material` (
  `no_rec` int(10) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_project` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `volume` int(10) NOT NULL,
  `harga_satuan` double(15,0) NOT NULL,
  `total_harga` double(15,0) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_rec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datase_material`
--

INSERT INTO `datase_material` (`no_rec`, `id_user`, `id_project`, `id_produk`, `volume`, `harga_satuan`, `total_harga`, `tanggal_dibuat`, `tanggal_update`) VALUES
(1, 'U003', 'PRJK-002452', 'X2-Y2/01/AB', 4, 300000, 1200000, '2015-09-14 04:17:18', '0000-00-00 00:00:00'),
(2, 'U003', 'PRJK-002452', 'X6-Y5/02/CK', 6, 700000, 4200000, '2015-09-15 04:22:47', '0000-00-00 00:00:00'),
(3, 'U003', 'PRJK-002453', 'X2-Y2/01/AB', 3, 950000, 2750000, '2015-09-15 04:23:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `datasm_headpo`
--

CREATE TABLE IF NOT EXISTS `datasm_headpo` (
  `no_rec` int(10) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(15) NOT NULL,
  `id_project` varchar(30) NOT NULL,
  `retensi` double(1,1) NOT NULL,
  `kebersihan` double(1,1) NOT NULL,
  `repair` double(1,1) NOT NULL,
  `pph` double(1,1) NOT NULL,
  `total_harga` double(15,0) NOT NULL,
  `total_potongan` double(15,0) NOT NULL,
  `total_bersih` double(15,0) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_rec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `datasm_material`
--

CREATE TABLE IF NOT EXISTS `datasm_material` (
  `no_rec` int(10) NOT NULL,
  `id_user` varchar(15) NOT NULL,
  `id_project` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `volume` int(10) NOT NULL,
  `harga_satuan` double(15,0) NOT NULL,
  `total_harga` double(15,0) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`no_rec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datauser`
--

CREATE TABLE IF NOT EXISTS `datauser` (
  `id_user` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tanggal_dibuat` timestamp NULL DEFAULT NULL,
  `tanggal_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datauser`
--

INSERT INTO `datauser` (`id_user`, `username`, `password`, `nama`, `id_jabatan`, `tanggal_dibuat`, `tanggal_update`) VALUES
('U001', 'fernalia', 'fc3cee5d6a37bd5732a96e6f87ffaf2d', 'Fernalia', 1, '2015-09-05 05:20:53', '2015-09-05 05:20:53'),
('U002', 'ferdiana', '827ccb0eea8a706c4c34a16891f84e7b', 'Ferdiana', 2, '2015-09-05 05:35:22', '2015-09-05 06:20:37'),
('U003', 'fauziyyah', '827ccb0eea8a706c4c34a16891f84e7b', 'Fauziyyah', 3, '2015-09-06 15:04:06', '2015-09-07 13:30:43'),
('U004', 'frisca', '827ccb0eea8a706c4c34a16891f84e7b', 'Frisca', 4, '2015-09-15 02:41:22', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
