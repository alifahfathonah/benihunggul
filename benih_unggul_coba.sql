-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2019 at 02:04 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `benih_unggul_coba`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `foto`) VALUES
(1, 'auwfar', 'f0a047143d1da15b630c73f0256d5db0', 'Achmad Chadil Auwfar', 'Koala.jpg'),
(2, 'ozil', 'f4e404c7f815fc68e7ce8e3c2e61e347', 'Mesut ', 'profil2.jpg'),
(3, 'okta', '202cb962ac59075b964b07152d234b70', 'Oktaviansyah', 'profil1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `benih`
--

CREATE TABLE `benih` (
  `id_benih` int(11) NOT NULL,
  `komoditi` varchar(30) NOT NULL,
  `varietas_klon` varchar(30) NOT NULL,
  `kelas_benih` varchar(20) NOT NULL,
  `bulan_tanam` varchar(5) NOT NULL,
  `tinggi` float NOT NULL,
  `jumlah_daun` int(11) NOT NULL,
  `akhir_masa_edar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benih`
--

INSERT INTO `benih` (`id_benih`, `komoditi`, `varietas_klon`, `kelas_benih`, `bulan_tanam`, `tinggi`, `jumlah_daun`, `akhir_masa_edar`) VALUES
(2, 'Teh', 'Komasti 860', 'Unggul', '09', 11.4, 3, '2019-12-11'),
(3, 'Tebu', 'Komasti 232', 'Unggul', '05', 9.5, 6, '2019-08-21'),
(5, 'Kopi', 'Komasti 820', 'Super', '03', 17.5, 4, '2019-03-12'),
(8, 'Cengkeh', 'Komasti 590', 'Unggul', '06', 4.5, 1, '2019-03-01'),
(9, 'Palawija', 'Komasti 220', 'Unggul', '09', 34, 123, '2019-03-15'),
(11, 'SADASDASDASDA', 'ASDASDASD', 'SADASDASDASDSAD', '02', 23, 2, '2019-03-12'),
(12, 'EFDRHTJYFMHG', 'SCGN', 'SFDC MN', '03', 234, 435, '2019-03-05'),
(13, 'ewfdv', 'edwsfcv ', 'ewfdvb g', '10', 34, 24, '2019-03-05'),
(14, 'ewfdv', 'edwsfcv ', 'ewfdvb g', '10', 34, 24, '2019-03-05'),
(15, 'TES', 'TES', 'TES', '02', 23, 123, '2019-03-06'),
(16, 'TES', 'TES', 'TES', '02', 23, 123, '2019-03-06'),
(17, 'rebref b', 'fdeb rfde', 'fdbr cgrdef b', '11', 34, 234, '2019-03-29'),
(18, 'rereryrey', 'VARIETAS', 'KELAS', '01', 23, 123, '2019-03-06'),
(19, 'hsajkfh', 'VARIETAS', 'RUOISJAFSA', '10', 23, 123, '2019-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE `label` (
  `id_label` int(11) NOT NULL,
  `jenis_benih` varchar(20) NOT NULL,
  `warna` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`id_label`, `jenis_benih`, `warna`) VALUES
(5, 'Benih Sebar (BR)', 'Hijau'),
(6, 'Benih Pokok (BP)', 'Kuning');

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id_pimpinan` int(11) NOT NULL,
  `nama_pimpinan` varchar(40) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id_pimpinan`, `nama_pimpinan`, `status`) VALUES
(1, 'Marcus Fernaldi Gideon', 1),
(2, 'Kevin Sanjaya Sukamuljo', 1),
(3, 'Mohammad Ahsan', 1),
(4, 'Taufik Hidayat', 0),
(5, 'Markis Kido', 0),
(6, 'Hendra Setiawan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE `produsen` (
  `id_produsen` int(11) NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `nama_perusahaan` varchar(40) NOT NULL,
  `id_pimpinan` int(11) NOT NULL,
  `alamat_perusahaan` varchar(60) NOT NULL,
  `jenis_usaha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`id_produsen`, `npwp`, `nama_perusahaan`, `id_pimpinan`, `alamat_perusahaan`, `jenis_usaha`) VALUES
(3, '9412943021', 'PT Agro Bersama', 3, 'Jl. Petani Bersama', 'Hortikultur'),
(4, '9342343321', 'PT Nusa Kambangan', 1, 'Jl. Nusantara', 'Kopi'),
(5, '9332134521', 'PT Kita Bahagia', 2, 'Jl. Bahagia Bersama', 'Tebu'),
(6, 'u2yri236r8', 'PT BBB', 2, 'jfwjkfgk', 'kjdwgfj'),
(7, '3ERTUIOU', 'SDCVXBNM', 2, 'DFSF', 'SDFSDF'),
(9, 'qwertghyjk,jghfdewqe', 'wqertghyjkhytfreswq', 3, 'qwerthyjggre', 'wertyhjukre'),
(10, 'TES', 'TES', 2, 'TES', 'TES'),
(11, 'rew35', 'RDHdrh', 6, 'dzrhzdrhzd', 'Tebu');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `id_qrcode` int(11) NOT NULL,
  `foto_qrcode` varchar(45) NOT NULL,
  `id_sertifikat` int(11) NOT NULL,
  `id_label` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `sert_sumber_benih` int(11) DEFAULT NULL,
  `no_sertifikat` varchar(35) NOT NULL,
  `id_produsen` int(11) NOT NULL,
  `id_benih` int(11) NOT NULL,
  `pengawas` varchar(30) NOT NULL,
  `masa_berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `sert_sumber_benih`, `no_sertifikat`, `id_produsen`, `id_benih`, `pengawas`, `masa_berlaku`) VALUES
(21, NULL, 'TES SERTIFIKAT', 5, 8, 'Prof. Dr. Patrick', '2019-03-04'),
(22, 21, 'TES SERTIFIKAT 2', 4, 3, 'Prof. Dr. Patrick', '2019-03-15'),
(23, 22, 'TES SERTIFIKAT 3', 4, 5, 'PENGAWAS', '2019-03-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benih`
--
ALTER TABLE `benih`
  ADD PRIMARY KEY (`id_benih`);

--
-- Indexes for table `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`id_label`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`id_produsen`),
  ADD KEY `id_pimpinan` (`id_pimpinan`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`id_qrcode`),
  ADD KEY `id_label` (`id_label`),
  ADD KEY `id_sertifikat` (`id_sertifikat`);

--
-- Indexes for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `id_produsen` (`id_produsen`),
  ADD KEY `id_benih` (`id_benih`),
  ADD KEY `sert_sumber_benih` (`sert_sumber_benih`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `benih`
--
ALTER TABLE `benih`
  MODIFY `id_benih` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `label`
--
ALTER TABLE `label`
  MODIFY `id_label` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id_pimpinan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produsen`
--
ALTER TABLE `produsen`
  MODIFY `id_produsen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `id_qrcode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produsen`
--
ALTER TABLE `produsen`
  ADD CONSTRAINT `produsen_ibfk_1` FOREIGN KEY (`id_pimpinan`) REFERENCES `pimpinan` (`id_pimpinan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD CONSTRAINT `qrcode_ibfk_2` FOREIGN KEY (`id_label`) REFERENCES `label` (`id_label`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `qrcode_ibfk_3` FOREIGN KEY (`id_sertifikat`) REFERENCES `sertifikat` (`id_sertifikat`);

--
-- Constraints for table `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `sertifikat_ibfk_1` FOREIGN KEY (`id_produsen`) REFERENCES `produsen` (`id_produsen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sertifikat_ibfk_2` FOREIGN KEY (`id_benih`) REFERENCES `benih` (`id_benih`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sertifikat_ibfk_3` FOREIGN KEY (`sert_sumber_benih`) REFERENCES `sertifikat` (`id_sertifikat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
