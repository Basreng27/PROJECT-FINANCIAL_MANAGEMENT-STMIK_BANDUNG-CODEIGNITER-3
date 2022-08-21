-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Jul 2022 pada 04.19
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `password`, `level`) VALUES
('1218016', '8d02e667e3399441465037b4cd31e056', 2),
('1218022', '93020d27f13c2166f28b0ab98c1f37bf', 2),
('2', 'c81e728d9d4c2f636f067f89cc14862c', 2),
('admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('bau', '5debc828f54260d0243115148649ca80', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `approve_pembayaran`
--

CREATE TABLE `approve_pembayaran` (
  `id_approve` int(11) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `bukti_pembayaran_pembangunan` varchar(255) NOT NULL,
  `beasiswa_mahasiswa` float NOT NULL,
  `sisa_pembayaran` float NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `semester` varchar(1) NOT NULL,
  `ta` varchar(25) NOT NULL,
  `tak` varchar(25) NOT NULL,
  `angkatan` varchar(4) NOT NULL,
  `nim` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
--

CREATE TABLE `beasiswa` (
  `id_beasiswa` varchar(10) NOT NULL,
  `nama_beasiswa` varchar(255) NOT NULL,
  `nominal_beasiswa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`id_beasiswa`, `nama_beasiswa`, `nominal_beasiswa`) VALUES
('BWK', 'Bawaku', 4800000),
('KIP', 'Kartu Indonesia Pintar', 3500000),
('NON', 'Non Beasiswa', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(7) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `semester` int(11) NOT NULL,
  `ta` varchar(20) NOT NULL,
  `tak` varchar(25) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_termin` varchar(10) NOT NULL,
  `id_beasiswa` varchar(20) NOT NULL,
  `id_pembangunan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `jurusan`, `kelas`, `semester`, `ta`, `tak`, `angkatan`, `email`, `id_termin`, `id_beasiswa`, `id_pembangunan`) VALUES
(2, 'b', 'Teknik Informatika', 'Eksekutif', 5, 'Genap', '2019/2020', 2018, 'wandirayandra@gmail.com', 'E1', 'BWK', 'PBE2018'),
(1218016, 'Adrian Nugraha', 'Teknik Informatika', 'Reguler Malam', 1, '', '', 2018, '', 'RM1', 'KIP', 'PBM2018'),
(1218022, 'Rayandra Wandi Marselana', 'Teknik Informatika', 'Reguler Pagi', 1, '', '', 2018, 'wandirayandra@gmail.com', 'RP1', 'NON', 'PBE2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembangunan`
--

CREATE TABLE `pembangunan` (
  `id_pembangunan` varchar(25) NOT NULL,
  `kelas` varchar(25) NOT NULL,
  `tahun` int(4) NOT NULL,
  `pembangunan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembangunan`
--

INSERT INTO `pembangunan` (`id_pembangunan`, `kelas`, `tahun`, `pembangunan`) VALUES
('PBE2018', 'Eksekutif', 2018, 10000000),
('PBM2018', 'Reguler Malam', 2018, 7000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pembayaran`
--

CREATE TABLE `riwayat_pembayaran` (
  `id_riwayat_pembayaran` int(11) NOT NULL,
  `nim` int(7) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `bukti_pembayaran_pembangunan` varchar(255) NOT NULL,
  `bukti_pembayaran_beasiswa` float NOT NULL,
  `bukti_pembayaran_sisa` float NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `tanggal_approve` date NOT NULL,
  `semester` int(1) NOT NULL,
  `ta` varchar(25) NOT NULL,
  `tak` varchar(25) NOT NULL,
  `angkatan` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sisa`
--

CREATE TABLE `sisa` (
  `id_sisa` int(11) NOT NULL,
  `sisa_beasiswa` float NOT NULL,
  `sisa_pembayaran` float NOT NULL,
  `nim` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sisa`
--

INSERT INTO `sisa` (`id_sisa`, `sisa_beasiswa`, `sisa_pembayaran`, `nim`) VALUES
(4, 3500000, 0, 1218016),
(13, 0, 500000, 1218022),
(19, 4300000, 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `termin`
--

CREATE TABLE `termin` (
  `id_termin` varchar(20) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `tahun` int(4) NOT NULL,
  `termin` float NOT NULL,
  `termin_ke` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `termin`
--

INSERT INTO `termin` (`id_termin`, `kelas`, `tahun`, `termin`, `termin_ke`) VALUES
('E1', 'Eksekutif', 2018, 2000000, 1),
('E2', 'Eksekutif', 2018, 2000000, 2),
('E3', 'Eksekutif', 2018, 1000000, 3),
('RM1', 'Reguler Malam', 2018, 1500000, 1),
('RM2', 'Reguler Malam', 2018, 1500000, 2),
('RM3', 'Reguler Malam', 2018, 700000, 3),
('RP1', 'Reguler Pagi', 2018, 1200000, 1),
('RP2', 'Reguler Pagi', 2018, 1200000, 2),
('RP3', 'Reguler Pagi', 2018, 500000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tunggakan`
--

CREATE TABLE `tunggakan` (
  `id_tunggakan` int(11) NOT NULL,
  `jumlah_tunggakan` float NOT NULL,
  `tunggakan_pembangunan` int(11) NOT NULL,
  `id_termin` varchar(11) NOT NULL,
  `nim` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tunggakan`
--

INSERT INTO `tunggakan` (`id_tunggakan`, `jumlah_tunggakan`, `tunggakan_pembangunan`, `id_termin`, `nim`) VALUES
(7, 3700000, 0, 'E1', 1218016),
(16, 1600000, 4000000, 'RP1', 1218022),
(22, 2000000, 7000000, 'E2', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `approve_pembayaran`
--
ALTER TABLE `approve_pembayaran`
  ADD PRIMARY KEY (`id_approve`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_tagihan` (`id_termin`),
  ADD KEY `id_tagihan_2` (`id_termin`),
  ADD KEY `id_tagihan_3` (`id_termin`),
  ADD KEY `id_tagihan_4` (`id_termin`),
  ADD KEY `id_beasiswa` (`id_beasiswa`),
  ADD KEY `id_pembangunan` (`id_pembangunan`);

--
-- Indeks untuk tabel `pembangunan`
--
ALTER TABLE `pembangunan`
  ADD PRIMARY KEY (`id_pembangunan`);

--
-- Indeks untuk tabel `riwayat_pembayaran`
--
ALTER TABLE `riwayat_pembayaran`
  ADD PRIMARY KEY (`id_riwayat_pembayaran`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `sisa`
--
ALTER TABLE `sisa`
  ADD PRIMARY KEY (`id_sisa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `termin`
--
ALTER TABLE `termin`
  ADD PRIMARY KEY (`id_termin`);

--
-- Indeks untuk tabel `tunggakan`
--
ALTER TABLE `tunggakan`
  ADD PRIMARY KEY (`id_tunggakan`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `id_termin` (`id_termin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `approve_pembayaran`
--
ALTER TABLE `approve_pembayaran`
  MODIFY `id_approve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `riwayat_pembayaran`
--
ALTER TABLE `riwayat_pembayaran`
  MODIFY `id_riwayat_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `sisa`
--
ALTER TABLE `sisa`
  MODIFY `id_sisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tunggakan`
--
ALTER TABLE `tunggakan`
  MODIFY `id_tunggakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `approve_pembayaran`
--
ALTER TABLE `approve_pembayaran`
  ADD CONSTRAINT `approve_pembayaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`id_termin`) REFERENCES `termin` (`id_termin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_4` FOREIGN KEY (`id_beasiswa`) REFERENCES `beasiswa` (`id_beasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_5` FOREIGN KEY (`id_pembangunan`) REFERENCES `pembangunan` (`id_pembangunan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_pembayaran`
--
ALTER TABLE `riwayat_pembayaran`
  ADD CONSTRAINT `riwayat_pembayaran_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `sisa`
--
ALTER TABLE `sisa`
  ADD CONSTRAINT `sisa_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tunggakan`
--
ALTER TABLE `tunggakan`
  ADD CONSTRAINT `tunggakan_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tunggakan_ibfk_2` FOREIGN KEY (`id_termin`) REFERENCES `termin` (`id_termin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
