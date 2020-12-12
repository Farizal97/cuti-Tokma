-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Mei 2020 pada 10.44
-- Versi Server: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_leave`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_adm` int(5) NOT NULL,
  `adm_nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `adm_foto` text COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_adm`, `adm_nama`, `username`, `password`, `adm_foto`) VALUES
(1, 'Admin HRD', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'foto1r.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE IF NOT EXISTS `cuti` (
  `cuti_id` varchar(30) NOT NULL,
  `kry_nip` varchar(20) NOT NULL,
  `cuti_tgl` date NOT NULL,
  `cuti_mulai` date NOT NULL,
  `cuti_akhir` date NOT NULL,
  `cuti_durasi` int(11) NOT NULL,
  `cuti_ket` text NOT NULL,
  `cuti_stt` varchar(50) NOT NULL,
  `cuti_reject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `div_id` int(5) NOT NULL,
  `div_nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`div_id`, `div_nama`) VALUES
(1, 'IT'),
(3, 'HRD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `kry_nip` varchar(20) NOT NULL,
  `kry_nama` varchar(100) NOT NULL,
  `kry_jk` varchar(20) NOT NULL,
  `kry_telp` varchar(20) NOT NULL,
  `div_id` int(5) NOT NULL,
  `kry_jabatan` varchar(50) NOT NULL,
  `kry_alamat` text NOT NULL,
  `kry_cuti` int(11) NOT NULL,
  `kry_pass` text NOT NULL,
  `kry_foto` text NOT NULL,
  `kry_stt` varchar(20) NOT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`kry_nip`, `kry_nama`, `kry_jk`, `kry_telp`, `div_id`, `kry_jabatan`, `kry_alamat`, `kry_cuti`, `kry_pass`, `kry_foto`, `kry_stt`, `id_adm`) VALUES
('767676', 'Karyawan', 'Laki-Laki', '0812918291', 3, 'IT', 'Jakarta', 3, '60c2ce8f2c04510630ddace8530a5c1c', 'foto767676r.jpg', 'Aktif', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `mng_nip` varchar(20) NOT NULL,
  `mng_nama` varchar(100) NOT NULL,
  `mng_jk` varchar(20) NOT NULL,
  `mng_telp` varchar(20) NOT NULL,
  `mng_alamat` text NOT NULL,
  `mng_pass` text NOT NULL,
  `mng_foto` text NOT NULL,
  `id_adm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `manager`
--

INSERT INTO `manager` (`mng_nip`, `mng_nama`, `mng_jk`, `mng_telp`, `mng_alamat`, `mng_pass`, `mng_foto`, `id_adm`) VALUES
('12345', 'Andi Manager', 'Laki-Laki', '081287189898', 'Jakarta', '827ccb0eea8a706c4c34a16891f84e7b', 'foto33333r.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`cuti_id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`div_id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`kry_nip`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mng_nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `div_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
