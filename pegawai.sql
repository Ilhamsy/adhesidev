-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2023 pada 17.16
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pegawai`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_pegawai` int(100) NOT NULL,
  `hadir` int(100) NOT NULL,
  `izin` int(100) NOT NULL,
  `tidak_hadir` int(100) NOT NULL,
  `bulan` int(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_pegawai`, `hadir`, `izin`, `tidak_hadir`, `bulan`, `tanggal`) VALUES
(13, 10, 20, 0, 0, 1, '2020-05-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`, `level`, `log`) VALUES
(6, 'admin', 'admin', 'Admin Only', 'admin', '2023-01-06 13:15:52'),
(7, 'user', 'user', 'user', 'user', '2023-01-01 16:20:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Domisili` text NOT NULL,
  `No_Tlp` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `Email`, `Domisili`, `No_Tlp`, `Status`) VALUES
(28, 'syahrul', 'msyahrulwajhullah@gmail.com', 'puluhdadi enjoy', '089652969017', 'A'),
(29, 'ilham', 'ahmadilhamsy@gmail.com', 'berkelana', '0898864278891', 'A'),
(30, 'septian', 'septianugasyc@gmail.com', 'puluhdadi', '88765432165', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `last_education` varchar(100) NOT NULL,
  `next_education` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `nilai` text NOT NULL,
  `toefl` text NOT NULL,
  `no_tlp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `jenis_kelamin`, `alamat`, `tgl_lahir`, `last_education`, `next_education`, `university`, `nilai`, `toefl`, `no_tlp`) VALUES
(0, 'Muh Syahrul Wajhullah Jasman', 'L', 'jogja', '1996-12-11', 'SMA', 'S1', 'UPN ', '3.75', 'TOEFL 490, IELTS 550', '089652969017'),
(25, 'Ahmad Ilham Syahputra', 'L', 'bantul', '1998-11-05', 'S1', 'S2', 'UPN ', '3.75', 'TOEFL 475, IELTS 80', '0898666377181'),
(35, 'adhesidev', 'L', 'jogja', '1997-11-11', 'S2', 'S3', 'upnnnnn', '3.75', '124444', '089652969017'),
(36, 'alul', 'L', 'bantul', '2022-11-29', 'SMA', 'S1', 'wwwwww', '3.55', 'TOEFL 475, IELTS 80', '085701703664');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tpp`
--

CREATE TABLE `tpp` (
  `id_tpp` int(11) NOT NULL,
  `id_pegawai` int(100) NOT NULL,
  `jumlah_tpp` varchar(100) NOT NULL,
  `jumlah_potongan` varchar(100) NOT NULL,
  `bulan_t` int(100) NOT NULL,
  `tahun` int(100) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tpp`
--

INSERT INTO `tpp` (`id_tpp`, `id_pegawai`, `jumlah_tpp`, `jumlah_potongan`, `bulan_t`, `tahun`, `tgl`) VALUES
(7, 8, '300000', '0%', 1, 2018, '2018-04-02'),
(9, 9, '12750000', '0%', 5, 2020, '2020-05-01'),
(10, 10, '8749970', '30%', 1, 2020, '2020-05-17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `tpp`
--
ALTER TABLE `tpp`
  ADD PRIMARY KEY (`id_tpp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tpp`
--
ALTER TABLE `tpp`
  MODIFY `id_tpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
