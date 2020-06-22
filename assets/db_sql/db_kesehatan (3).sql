-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 12:06 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kesehatan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_agama`
--

CREATE TABLE `tb_agama` (
  `id_agama` tinyint(1) NOT NULL,
  `agama` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agama`
--

INSERT INTO `tb_agama` (`id_agama`, `agama`) VALUES
(1, 'Hindu'),
(2, 'Islam'),
(3, 'Budha'),
(4, 'Protestan'),
(5, 'Katolik'),
(6, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `tb_chart`
--

CREATE TABLE `tb_chart` (
  `id_chart` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `berat_badan` int(11) NOT NULL,
  `tensi` int(11) NOT NULL,
  `kadar_gula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_chart`
--

INSERT INTO `tb_chart` (`id_chart`, `bulan`, `tinggi_badan`, `berat_badan`, `tensi`, `kadar_gula`) VALUES
(1, 'Januari', 168, 45, 90, 50),
(2, 'Februari', 167, 50, 70, 45),
(3, 'Maret', 170, 56, 80, 60),
(4, 'April', 168, 70, 80, 60),
(5, 'Mei', 169, 69, 90, 70),
(6, 'Juni', 174, 63, 60, 50),
(7, 'Juli', 178, 50, 90, 65),
(8, 'Agurtus', 177, 69, 100, 70),
(9, 'September', 168, 56, 110, 75),
(10, 'Oktober', 173, 57, 110, 44),
(11, 'November', 176, 67, 130, 78),
(12, 'Desember', 169, 70, 70, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategoriuser`
--

CREATE TABLE `tb_kategoriuser` (
  `id_kategoriuser` int(11) NOT NULL,
  `nama_kategoriuser` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategoriuser`
--

INSERT INTO `tb_kategoriuser` (`id_kategoriuser`, `nama_kategoriuser`) VALUES
(1, 'Admin'),
(2, 'Tim Medis'),
(3, 'Reader');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kesehatan`
--

CREATE TABLE `tb_kesehatan` (
  `id_kesehatan` int(11) NOT NULL,
  `bulan` varchar(40) DEFAULT NULL,
  `tanggal_cek` date DEFAULT NULL,
  `id_kk` int(11) DEFAULT NULL,
  `id_penduduk` int(11) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tinggi_badan` int(11) DEFAULT NULL,
  `berat_badan` int(11) DEFAULT NULL,
  `tensi` int(11) DEFAULT NULL,
  `kadar_gula` int(11) DEFAULT NULL,
  `alergi` text,
  `rabun` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kesehatan`
--

INSERT INTO `tb_kesehatan` (`id_kesehatan`, `bulan`, `tanggal_cek`, `id_kk`, `id_penduduk`, `umur`, `tinggi_badan`, `berat_badan`, `tensi`, `kadar_gula`, `alergi`, `rabun`) VALUES
(1, 'Mei', '2020-05-23', 9, 3, 15, 155, 40, 90, 25, 'tidak ada', 'normal'),
(2, 'Mei', '2020-05-23', 7, 1, 29, 158, 50, 100, 34, 'tidak ada', 'Rabun Deka'),
(3, 'Mei', '2020-05-24', 7, 2, 13, 178, 60, 110, 100, 'Cumi', 'normal'),
(4, 'Juni', '2020-06-25', 7, 2, 13, 178, 65, 100, 90, 'tidak ada', 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `nomor_kk` varchar(50) DEFAULT NULL,
  `nik_kk` varchar(16) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jum_anggota` int(11) NOT NULL,
  `anjing` int(11) NOT NULL,
  `kucing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `nomor_kk`, `nik_kk`, `nama`, `jum_anggota`, `anjing`, `kucing`) VALUES
(7, '543223456765432', '654323456543212', 'Ketut Darta', 4, 1, 1),
(8, '1234567890987654', '1234567876543222', 'Nyoman Kandra', 3, 2, 0),
(9, '1234567890987654', '3456789876543212', 'sasa', 3, 2, 2),
(10, '3285672837436452787', '2367563873284722', 'Kadek Santa', 2, 2, 1),
(11, '672898564738iuyt32', '9173826473652389', 'Gede Wira', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `id_penduduk` int(11) NOT NULL,
  `id_kk` int(11) DEFAULT NULL,
  `status_kk` varchar(50) NOT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama_penduduk` varchar(50) DEFAULT NULL,
  `id_agama` tinyint(1) NOT NULL,
  `jk` set('P','L') NOT NULL,
  `gol_darah` set('A','B','AB','O') NOT NULL,
  `tahun_lahir` year(4) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `alamat` text,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`id_penduduk`, `id_kk`, `status_kk`, `nik`, `nama_penduduk`, `id_agama`, `jk`, `gol_darah`, `tahun_lahir`, `tgl_lahir`, `tempat_lahir`, `alamat`, `pekerjaan`, `no_hp`) VALUES
(1, 7, 'ibu', '123456789987654', 'Luh Suciani', 1, 'P', 'B', 1991, '1991-01-16', 'Tejakula', 'Banjar Tengenan, Desa tejakula', 'Wirasuasta', '067983456879'),
(2, 7, 'Anak', '1234567898765', 'Kadek Sanca', 1, 'L', 'AB', 2007, '2007-03-14', 'Tejakula', 'Desa Tejakula', 'SMP/Sederajat', '0856783219'),
(3, 9, 'Anak', '87654334567890', 'Luh Citra Ningsih', 1, 'P', 'O', 2005, '2005-08-18', 'Tejakula', 'Desa Tejakula', 'SMA/Sederajat', '087654738236');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `jenis_kelamin` set('L','P') NOT NULL,
  `id_kategoriuser` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `foto` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama_user`, `jenis_kelamin`, `id_kategoriuser`, `username`, `password`, `email`, `foto`) VALUES
(1, 'Swastini Putu', 'P', 1, 'swastiniAdmin', '173804c2e2', 'swastini@undiksha.ac.id', 'down.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_agama`
--
ALTER TABLE `tb_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `tb_chart`
--
ALTER TABLE `tb_chart`
  ADD PRIMARY KEY (`id_chart`);

--
-- Indexes for table `tb_kategoriuser`
--
ALTER TABLE `tb_kategoriuser`
  ADD PRIMARY KEY (`id_kategoriuser`);

--
-- Indexes for table `tb_kesehatan`
--
ALTER TABLE `tb_kesehatan`
  ADD PRIMARY KEY (`id_kesehatan`);

--
-- Indexes for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`id_penduduk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_agama`
--
ALTER TABLE `tb_agama`
  MODIFY `id_agama` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_chart`
--
ALTER TABLE `tb_chart`
  MODIFY `id_chart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_kategoriuser`
--
ALTER TABLE `tb_kategoriuser`
  MODIFY `id_kategoriuser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kesehatan`
--
ALTER TABLE `tb_kesehatan`
  MODIFY `id_kesehatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `id_penduduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
