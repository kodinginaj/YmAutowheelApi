-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2020 pada 13.33
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ymautowheel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ban`
--

CREATE TABLE `ban` (
  `id` int(11) NOT NULL,
  `merek_ban_id` int(11) NOT NULL,
  `tipe_ban_id` int(11) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `kadaluarsa` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_suspensi`
--

CREATE TABLE `kategori_suspensi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_suspensi`
--

INSERT INTO `kategori_suspensi` (`id`, `nama`, `created_at`) VALUES
(1, 'Airsus', '2020-06-15 06:36:14'),
(3, 'Coillover', '2020-06-15 07:04:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek_ban`
--

CREATE TABLE `merek_ban` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merek_ban`
--

INSERT INTO `merek_ban` (`id`, `nama`, `created_at`) VALUES
(1, 'Toyo Tires', '2020-06-13 09:23:44'),
(2, 'Achilles', '2020-06-13 02:17:45'),
(3, 'Zeetex', '2020-06-13 02:41:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek_suspensi`
--

CREATE TABLE `merek_suspensi` (
  `id` int(11) NOT NULL,
  `kategori_suspensi_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merek_suspensi`
--

INSERT INTO `merek_suspensi` (`id`, `kategori_suspensi_id`, `nama`, `created_at`) VALUES
(2, 1, 'AIRGEN', '2020-06-15 07:02:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merek_velg`
--

CREATE TABLE `merek_velg` (
  `id` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merek_velg`
--

INSERT INTO `merek_velg` (`id`, `kategori`, `nama`, `created_at`) VALUES
(2, '0', 'BBS', '2020-06-16 05:25:03'),
(3, '1', 'Volk Racing', '2020-06-16 10:48:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `merek` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `stock` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suspensi`
--

CREATE TABLE `suspensi` (
  `id` int(11) NOT NULL,
  `kategori_suspensi_id` int(11) NOT NULL,
  `merek_suspensi_id` int(11) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_ban`
--

CREATE TABLE `tipe_ban` (
  `id` int(11) NOT NULL,
  `merek_ban_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tipe_ban`
--

INSERT INTO `tipe_ban` (`id`, `merek_ban_id`, `nama`, `created_at`) VALUES
(1, 1, 'Semi Slick', '2020-06-15 03:59:12'),
(2, 1, 'Radial', '2020-06-13 02:19:14'),
(3, 2, 'Semi Slick', '2020-06-13 02:19:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Goldy', 'goldy@gmail.com', '$2y$10$E83oms/LlX0c4LT8LRLSRu/B6MypSDWgMYIhslbNMtIobu3Bh5cgW', '1', '2020-06-12 10:44:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `velg`
--

CREATE TABLE `velg` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `merek_velg_id` int(11) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `velg`
--

INSERT INTO `velg` (`id`, `kategori_id`, `merek_velg_id`, `spesifikasi`, `jumlah`, `harga`, `created_at`) VALUES
(2, 0, 2, 'Velg B', 12, '1500000', '2020-06-16 10:40:35'),
(3, 1, 3, 'Velg C', 10, '2000000', '2020-06-16 11:13:54'),
(4, 1, 3, 'Velg D', 12, '2500000', '2020-06-16 11:15:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merek_ban_id` (`merek_ban_id`,`tipe_ban_id`),
  ADD KEY `tipe_ban_id` (`tipe_ban_id`);

--
-- Indeks untuk tabel `kategori_suspensi`
--
ALTER TABLE `kategori_suspensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merek_ban`
--
ALTER TABLE `merek_ban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `merek_suspensi`
--
ALTER TABLE `merek_suspensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_suspensi_id` (`kategori_suspensi_id`);

--
-- Indeks untuk tabel `merek_velg`
--
ALTER TABLE `merek_velg`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `suspensi`
--
ALTER TABLE `suspensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_suspensi_id` (`kategori_suspensi_id`,`merek_suspensi_id`),
  ADD KEY `merek_suspensi_id` (`merek_suspensi_id`);

--
-- Indeks untuk tabel `tipe_ban`
--
ALTER TABLE `tipe_ban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merek_ban_id` (`merek_ban_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `velg`
--
ALTER TABLE `velg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merek_velg_id` (`merek_velg_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ban`
--
ALTER TABLE `ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_suspensi`
--
ALTER TABLE `kategori_suspensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `merek_ban`
--
ALTER TABLE `merek_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `merek_suspensi`
--
ALTER TABLE `merek_suspensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `merek_velg`
--
ALTER TABLE `merek_velg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `suspensi`
--
ALTER TABLE `suspensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tipe_ban`
--
ALTER TABLE `tipe_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `velg`
--
ALTER TABLE `velg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ban`
--
ALTER TABLE `ban`
  ADD CONSTRAINT `ban_ibfk_1` FOREIGN KEY (`tipe_ban_id`) REFERENCES `tipe_ban` (`id`),
  ADD CONSTRAINT `ban_ibfk_2` FOREIGN KEY (`merek_ban_id`) REFERENCES `merek_ban` (`id`);

--
-- Ketidakleluasaan untuk tabel `merek_suspensi`
--
ALTER TABLE `merek_suspensi`
  ADD CONSTRAINT `merek_suspensi_ibfk_1` FOREIGN KEY (`kategori_suspensi_id`) REFERENCES `kategori_suspensi` (`id`);

--
-- Ketidakleluasaan untuk tabel `suspensi`
--
ALTER TABLE `suspensi`
  ADD CONSTRAINT `suspensi_ibfk_1` FOREIGN KEY (`merek_suspensi_id`) REFERENCES `merek_suspensi` (`id`),
  ADD CONSTRAINT `suspensi_ibfk_2` FOREIGN KEY (`kategori_suspensi_id`) REFERENCES `kategori_suspensi` (`id`);

--
-- Ketidakleluasaan untuk tabel `tipe_ban`
--
ALTER TABLE `tipe_ban`
  ADD CONSTRAINT `tipe_ban_ibfk_1` FOREIGN KEY (`merek_ban_id`) REFERENCES `merek_ban` (`id`);

--
-- Ketidakleluasaan untuk tabel `velg`
--
ALTER TABLE `velg`
  ADD CONSTRAINT `velg_ibfk_1` FOREIGN KEY (`merek_velg_id`) REFERENCES `merek_velg` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
