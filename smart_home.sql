-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2024 pada 14.05
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_home`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_sensor`
--

CREATE TABLE `lokasi_sensor` (
  `id` varchar(256) NOT NULL,
  `id_user` varchar(256) NOT NULL,
  `token` varchar(64) NOT NULL,
  `nama_ruangan` varchar(256) NOT NULL,
  `lampu` int(1) NOT NULL,
  `kipas` int(1) NOT NULL,
  `jemuran` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi_sensor`
--

INSERT INTO `lokasi_sensor` (`id`, `id_user`, `token`, `nama_ruangan`, `lampu`, `kipas`, `jemuran`) VALUES
('IAuKi2jxi0', '66eb98e73c628', 'Wl8YuBkKbT', 'Halaman Belakang', 0, 2, 1),
('op89yt763g', '55re47gtuif', '0iu9yftdg', 'Teras', 1, 2, 2),
('uGFH5nUJRz', '66eb98e73c628', 'yc4gMjlwv5', 'Kamar', 1, 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `nama_user` varchar(256) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `token` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `nama_user`, `password`, `token`) VALUES
('66eb98e73c628', 'prabu', 'Prabu', '7a48869bf9dc85e0bd61d3b938e8abb9', '66eb98e73c630'),
('66f549e7ab4fa', 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '66f549e7abc62');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lokasi_sensor`
--
ALTER TABLE `lokasi_sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
