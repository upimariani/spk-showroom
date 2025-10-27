-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2025 at 03:54 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-showroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_smart`
--

CREATE TABLE `hasil_smart` (
  `id_hasil_smart` int(11) NOT NULL,
  `id_penilaian` int(11) NOT NULL,
  `b_kondisi` int(11) NOT NULL,
  `b_kapasitas` int(11) NOT NULL,
  `b_tahun` int(11) NOT NULL,
  `b_harga` int(11) NOT NULL,
  `hasil` float NOT NULL,
  `acc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_smart`
--

INSERT INTO `hasil_smart` (`id_hasil_smart`, `id_penilaian`, `b_kondisi`, `b_kapasitas`, `b_tahun`, `b_harga`, `hasil`, `acc`) VALUES
(1, 1, 4, 4, 4, 5, 1.6, 1),
(2, 2, 4, 3, 4, 5, 1.5, 1),
(3, 3, 4, 4, 4, 5, 1.6, 1),
(4, 4, 4, 4, 4, 5, 1.6, 1),
(5, 5, 4, 4, 4, 5, 1.6, 1),
(6, 6, 5, 5, 4, 4, 2.2625, 1),
(7, 7, 4, 4, 4, 5, 1.6, 1),
(8, 8, 5, 5, 4, 5, 2.45, 1),
(9, 9, 5, 4, 4, 5, 2.35, 1),
(10, 10, 4, 4, 4, 5, 1.6, 1),
(11, 11, 5, 4, 4, 2, 1.7875, 1),
(12, 12, 5, 4, 4, 2, 1.7875, 1),
(13, 13, 4, 3, 4, 5, 1.5, 1),
(14, 14, 4, 4, 4, 1, 0.85, 1),
(15, 15, 4, 3, 4, 5, 1.5, 1),
(16, 16, 4, 3, 4, 5, 1.5, 1),
(17, 17, 4, 3, 4, 5, 1.5, 1),
(18, 18, 4, 3, 1, 5, 0.75, 1),
(19, 19, 4, 3, 2, 5, 1, 1),
(20, 20, 4, 4, 1, 5, 0.85, 1),
(21, 21, 4, 4, 2, 5, 1.1, 1),
(22, 22, 4, 4, 1, 5, 0.85, 1),
(23, 23, 4, 4, 1, 5, 0.85, 1),
(24, 24, 4, 4, 3, 5, 1.35, 1),
(25, 25, 4, 4, 1, 5, 0.85, 1),
(26, 26, 4, 4, 1, 5, 0.85, 1),
(27, 27, 4, 4, 3, 3, 0.975, 1),
(28, 28, 4, 4, 4, 5, 1.6, 1),
(29, 29, 4, 4, 4, 5, 1.6, 1),
(30, 30, 4, 3, 1, 5, 0.75, 1),
(31, 31, 4, 3, 1, 5, 0.75, 1),
(32, 32, 4, 4, 2, 5, 1.1, 1),
(33, 33, 4, 5, 1, 5, 0.95, 1),
(34, 34, 4, 4, 1, 5, 0.85, 1),
(35, 35, 4, 4, 4, 4, 1.4125, 1),
(36, 36, 4, 4, 1, 5, 0.85, 1),
(37, 37, 4, 4, 1, 5, 0.85, 1),
(38, 38, 4, 4, 4, 5, 1.6, 1),
(39, 39, 4, 4, 3, 5, 1.35, 1),
(40, 40, 4, 4, 2, 5, 1.1, 1),
(41, 41, 4, 4, 2, 5, 1.1, 1),
(42, 42, 4, 4, 3, 5, 1.35, 1),
(43, 43, 4, 3, 1, 5, 0.75, 1),
(44, 44, 4, 4, 3, 5, 1.35, 1),
(45, 45, 4, 3, 3, 5, 1.25, 1),
(46, 46, 4, 4, 1, 5, 0.85, 1),
(47, 47, 4, 4, 1, 5, 0.85, 1),
(48, 48, 4, 4, 2, 5, 1.1, 1),
(49, 49, 4, 4, 2, 4, 0.9125, 1),
(50, 50, 4, 4, 2, 5, 1.1, 1),
(51, 51, 4, 4, 4, 5, 1.6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_vikor`
--

CREATE TABLE `hasil_vikor` (
  `id_hasil_vikor` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spk_admin`
--

CREATE TABLE `spk_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_admin`
--

INSERT INTO `spk_admin` (`id_admin`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', '1'),
(2, 'pemilik', 'pemilik', '2');

-- --------------------------------------------------------

--
-- Table structure for table `spk_smart_kriteria`
--

CREATE TABLE `spk_smart_kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `type` enum('benefit','cost') NOT NULL,
  `bobot` float NOT NULL,
  `ada_pilihan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_smart_kriteria`
--

INSERT INTO `spk_smart_kriteria` (`id`, `nama`, `type`, `bobot`, `ada_pilihan`) VALUES
(1, 'Kondisi Interior', 'benefit', 40, 0),
(2, 'Kapasitas Penumpang', 'benefit', 20, 0),
(3, 'Tahun', 'benefit', 40, 0),
(4, 'Harga', 'benefit', 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `spk_smart_penilaian`
--

CREATE TABLE `spk_smart_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `nama_jenis` varchar(125) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `kapasitas` varchar(15) NOT NULL,
  `tahun` varchar(15) NOT NULL,
  `harga` varchar(15) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk_smart_penilaian`
--

INSERT INTO `spk_smart_penilaian` (`id_penilaian`, `id_alternatif`, `id_kriteria`, `jenis`, `nama_jenis`, `kondisi`, `kapasitas`, `tahun`, `harga`, `gambar`) VALUES
(1, 1, 1, 'MVP', 'Toyota Avanza', 'Baik', '6', '2023', '215000000', 'unnamed.png'),
(2, 1, 1, 'MVP', 'Daihatsu Xenia', 'Baik', '5', '2023', '220000000', 'unnamed.png'),
(3, 1, 1, 'MVP', 'Mitsubishi Xpander', 'Baik', '6', '2023', '240000000', 'unnamed.png'),
(4, 1, 1, 'MVP', 'Toyota Veloz', 'Baik', '6', '2023', '255000000', 'unnamed.png'),
(5, 1, 1, 'MVP', 'Suzuki Ertiga', 'Baik', '6', '2023', '215000000', 'unnamed.png'),
(6, 1, 1, 'MVP', 'Toyota Kijang Innova Zenix', 'Sangat Baik', '8', '2023', '375000000', 'unnamed.png'),
(7, 1, 1, 'MVP', 'Toyota Calya', 'Baik', '6', '2023', '165000000', 'unnamed.png'),
(8, 1, 1, 'MVP', 'Honda BR-V', 'Sangat Baik', '8', '2023', '265000000', 'unnamed.png'),
(9, 1, 1, 'SUV', 'Toyota Rush', 'Sangat Baik', '6', '2023', '270000000', 'unnamed.png'),
(10, 1, 1, 'SUV', 'Daihatsu Terios', 'Baik', '6', '2023', '235000000', 'unnamed.png'),
(11, 1, 1, 'SUV', 'Toyota Fortuner', 'Sangat Baik', '7', '2023', '565000000', 'unnamed.png'),
(12, 1, 1, 'SUV', 'Mitsubishi Pajero Sport', 'Sangat Baik', '7', '2023', '540000000', 'unnamed.png'),
(13, 1, 1, 'SUV', 'Suzuki XL7', 'Baik', '5', '2023', '250000000', 'unnamed.png'),
(14, 1, 1, 'SUV', 'Honda CR-V (All New)', 'Baik', '6', '2023', '625000000', 'unnamed.png'),
(15, 1, 1, 'City Car', 'Honda Brio Satya/RS', 'Baik', '5', '2023', '160000000', 'unnamed.png'),
(16, 1, 1, 'City Car', 'Toyota Agya', 'Baik', '4', '2023', '170000000', 'unnamed.png'),
(17, 1, 1, 'City Car', 'Daihatsu Ayla (All New', 'Baik', '4', '2023', '135000000', 'unnamed.png'),
(18, 1, 1, 'SUV', 'toyota Rush G M/T', 'Baik', '5', '2011', '110000000', 'unnamed.png'),
(19, 1, 1, 'SUV', 'toyota Rush TRD Sportivo A/T', 'Baik', '5', '2016', '150000000', 'unnamed.png'),
(20, 1, 1, 'SUV', 'daihatsu Terios TX A/T', 'Baik', '6', '2010', '120000000', 'unnamed.png'),
(21, 1, 1, 'SUV', 'daihatsu Terios R M/T Adventure', 'Baik', '6', '2016', '145000000', 'unnamed.png'),
(22, 1, 1, 'SUV', 'toyota Fortuner 2.7 G', 'Baik', '6', '2005', '135000000', 'unnamed.png'),
(23, 1, 1, 'SUV', 'toyota Fortuner 2.5 G VNT ', 'Baik', '6', '2012', '200000000', 'unnamed.png'),
(24, 1, 1, 'SUV', 'toyota Fortuner 2.4 VRZ TRD Sportivo', 'Baik', '6', '2018', '225000000', 'unnamed.png'),
(25, 1, 1, 'SUV', 'mitsubishi Pajero Sport Exceed 4x2 A/T', 'Baik', '6', '2009', '170000000', 'unnamed.png'),
(26, 1, 1, 'SUV', 'mitsubishi Pajero Sport V6', 'Baik', '6', '2014', '235000000', 'unnamed.png'),
(27, 1, 1, 'SUV', 'mitsubishi Pajero Sport Dakar Ultimate 4x2', 'Baik', '6', '2018', '420000000', 'unnamed.png'),
(28, 1, 1, 'SUV', 'suzuki XL7 Zeta M/T', 'Baik', '6', '2020', '255000000', 'unnamed.png'),
(29, 1, 1, 'SUV', 'suzuki XL7 Hybrid Beta M/T', 'Baik', '6', '2023', '285000000', 'unnamed.png'),
(30, 1, 1, 'SUV', 'honda CR-V (Gen 3 - RE)', 'Baik', '5', '2007', '135000000', 'unnamed.png'),
(31, 1, 1, 'SUV', 'honda CR-V (Gen 4 - RM)', 'Baik', '5', '2012', '160000000', 'unnamed.png'),
(32, 1, 1, 'SUV', 'honda CR-V Turbo 1.5L (Prestige)', 'Baik', '7', '2017', '275000000', 'unnamed.png'),
(33, 1, 1, 'MVP', 'toyota Avanza tipe 1.3 E / 1.3 G', 'Baik', '8', '2004', '80000000', 'unnamed.png'),
(34, 1, 1, 'MVP', 'Toyota avanza tipe 1,5 veloz', 'Baik', '7', '2011', '150000000', 'unnamed.png'),
(35, 1, 1, 'MVP', 'toyota avanza “All New”', 'Baik', '6', '2021', '319000000', 'unnamed.png'),
(36, 1, 1, 'MVP', 'Daihatsu Xenia Mi 1.0L', 'Baik', '7', '2004', '90000000', 'unnamed.png'),
(37, 1, 1, 'MVP', 'daihatsu Xenia D 1.0L', 'Baik', '6', '2011', '70000000', 'unnamed.png'),
(38, 1, 1, 'MVP', 'daihatsu xenia X 1.3L', 'Baik', '6', '2021', '200000000', 'unnamed.png'),
(39, 1, 1, 'MVP', 'daihatsu xenia R / 1.5 R', 'Baik', '6', '2019', '245000000', 'unnamed.png'),
(40, 1, 1, 'MVP', 'mitsubishi Xpander GLX (MT)', 'Baik', '6', '2017', '150000000', 'unnamed.png'),
(41, 1, 1, 'MVP', 'mitsubishi Xpander Ultimate (AT)', 'Baik', '6', '2017', '185000000', 'unnamed.png'),
(42, 1, 1, 'MVP', 'mitsubishi Xpander Cross Premium', 'Baik', '6', '2019', '210000000', 'unnamed.png'),
(43, 1, 1, 'MVP', 'suzuki Ertiga GX', 'Baik', '5', '2012', '120000000', 'unnamed.png'),
(44, 1, 1, 'MVP', 'suzuki All New Ertiga GX', 'Baik', '6', '2018', '150000000', 'unnamed.png'),
(45, 1, 1, 'MVP', 'suzuki Ertiga Suzuki Sport', 'Baik', '5', '2019', '175000000', 'unnamed.png'),
(46, 1, 1, 'MVP', 'toyota kijang Innova E / G / V', 'Baik', '6', '2004', '95000000', 'unnamed.png'),
(47, 1, 1, 'MVP', 'toyota kijang Facelift (Grand New Innova)', 'Baik', '6', '2008', '110000000', 'unnamed.png'),
(48, 1, 1, 'MVP', 'toyota kijang Innova Reborn G / V', 'Baik', '6', '2015', '235000000', 'unnamed.png'),
(49, 1, 1, 'MVP', 'toyota kijang Innova Venturer', 'Baik', '6', '2017', '310000000', 'unnamed.png'),
(50, 1, 1, 'MVP', 'honda BR-V 1.5 S M/T', 'Baik', '6', '2016', '136000000', 'unnamed.png'),
(51, 1, 1, 'MVP', 'All New BR-V 1.5 S M/T', 'Baik', '6', '2021', '295000000', 'unnamed.png');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nama_sub` varchar(50) NOT NULL,
  `bobot_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `nama_sub`, `bobot_sub`) VALUES
(2, 1, 'Sangat Baik', 5),
(3, 1, 'Baik', 4),
(4, 1, 'Cukup', 3),
(5, 1, 'Kurang', 2),
(6, 1, 'Buruk', 1),
(8, 2, '6 orang - 7 orang', 4),
(9, 2, '2 orang - 5 orang', 3),
(12, 2, 'Lebih dari 8 orang', 5),
(13, 3, 'Lebih dari 2021', 4),
(14, 3, '2017 sampai 2021', 3),
(15, 3, '2014 sampai 2017', 2),
(16, 3, 'Kurang dari 2014', 1),
(17, 4, 'Kurang dari 300 juta', 5),
(18, 4, '300 juta - 400 juta', 4),
(19, 4, '400 juta - 500 juta', 3),
(20, 4, '500 juta - 600 juta', 2),
(21, 4, 'Lebih dari 600 juta', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_smart`
--
ALTER TABLE `hasil_smart`
  ADD PRIMARY KEY (`id_hasil_smart`);

--
-- Indexes for table `hasil_vikor`
--
ALTER TABLE `hasil_vikor`
  ADD PRIMARY KEY (`id_hasil_vikor`);

--
-- Indexes for table `spk_admin`
--
ALTER TABLE `spk_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `spk_smart_kriteria`
--
ALTER TABLE `spk_smart_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spk_smart_penilaian`
--
ALTER TABLE `spk_smart_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_smart`
--
ALTER TABLE `hasil_smart`
  MODIFY `id_hasil_smart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `hasil_vikor`
--
ALTER TABLE `hasil_vikor`
  MODIFY `id_hasil_vikor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spk_admin`
--
ALTER TABLE `spk_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `spk_smart_kriteria`
--
ALTER TABLE `spk_smart_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `spk_smart_penilaian`
--
ALTER TABLE `spk_smart_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
