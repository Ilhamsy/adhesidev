-- phpMyAdmin SQL Dump
-- version 5.2.2-dev+20240523.ca2d519f07
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 05:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adhesidev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`, `log`) VALUES
(6, 'admin', 'admin', 'Adhesidev Academy', 'admin', '2024-06-27 15:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_tent` int(11) NOT NULL,
  `id_sis` int(11) NOT NULL,
  `id_kur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_tent`, `id_sis`, `id_kur`) VALUES
(95, 55, 47, 2),
(96, 55, 48, 2);

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(11) NOT NULL,
  `nama_kursus` varchar(255) NOT NULL,
  `kapasitas` int(11) NOT NULL DEFAULT 0,
  `waktu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `nama_kursus`, `kapasitas`, `waktu`) VALUES
(2, 'TOEFL', 15, '2024-07-02 09:00:00'),
(3, 'Cloud Computing', 12, '2024-07-12 10:00:00'),
(4, 'Data Science', 14, '2024-07-11 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `last_education` varchar(100) NOT NULL,
  `next_education` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `nilai` text NOT NULL,
  `toefl` text NOT NULL,
  `telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `last_education`, `next_education`, `university`, `nilai`, `toefl`, `telepon`) VALUES
(46, 'Achmad Ilham Syahputra', 'L', 'Jl. Imogiri Tim. 10, Ponggok I, Trimulyo, Kec. Jetis, Kabupaten Bantul, Daerah Istimewa Yogyakarta 5', '2007-11-05', 'SMA', 'S1', 'Universitas Brawijaya', '33.75', '0', '085724926833'),
(47, 'Rachma Roshida Rosanti', 'P', 'Karangsemut RT 004, Trimulyo, Jetis, Bantul', '2006-06-13', 'SMA', 'S1', 'Universitas Gajah Mada', '35', '0', '08576653820'),
(48, 'Muh Syahrul W J', 'L', 'depok', '2007-12-11', 'SMA', 'S1', 'Universitas Brawijaya', '34', '450', '087568881722');

-- --------------------------------------------------------

--
-- Table structure for table `tentor`
--

CREATE TABLE `tentor` (
  `id_tentor` int(11) NOT NULL,
  `nama_tentor` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jml_siswa` int(2) NOT NULL DEFAULT 0,
  `telepon` varchar(100) NOT NULL,
  `bidang` text NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentor`
--

INSERT INTO `tentor` (`id_tentor`, `nama_tentor`, `email`, `alamat`, `jml_siswa`, `telepon`, `bidang`, `status`) VALUES
(55, 'Abu Ramal Yusuf S', 'aburamal@gmail.com', 'Jl. MT. Haryono No.11, Suryodiningratan, Kec. Mantrijeron, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55141', 2, '0987678675', 'TOEFL', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_jab` (`id_tent`),
  ADD KEY `id_peg` (`id_sis`),
  ADD KEY `FK_kursus` (`id_kur`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tentor`
--
ALTER TABLE `tentor`
  ADD PRIMARY KEY (`id_tentor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tentor`
--
ALTER TABLE `tentor`
  MODIFY `id_tentor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_kursus` FOREIGN KEY (`id_kur`) REFERENCES `kursus` (`id_kursus`),
  ADD CONSTRAINT `id_jab` FOREIGN KEY (`id_tent`) REFERENCES `tentor` (`id_tentor`),
  ADD CONSTRAINT `id_peg` FOREIGN KEY (`id_sis`) REFERENCES `siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
