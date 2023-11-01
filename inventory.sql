-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2023 pada 04.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_barang`
--

CREATE TABLE `inventory_barang` (
  `id_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stock` int(100) NOT NULL,
  `satuan` varchar(100) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `penerima` varchar(255) NOT NULL,
  `tanggal_pengiriman` date NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `dibuat_oleh` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventory_barang`
--

INSERT INTO `inventory_barang` (`id_barang`, `nama_barang`, `stock`, `satuan`, `pengirim`, `penerima`, `tanggal_pengiriman`, `tanggal_penerimaan`, `tanggal_dibuat`, `dibuat_oleh`, `harga`, `kategori`) VALUES
('BRG-10-2023-001', 'Oli C Revisi', 47, 'IBC', 'Budi Sudar', 'Firil', '2023-09-13', '2023-11-01', '2023-10-31 14:16:24', 'admin', 'Rp. 4.500.000', 'Industry'),
('BRG-10-2023-002', 'Oli D', 60, 'Pail', 'Yongki', 'Firil', '2023-10-17', '2023-10-31', '2023-10-31 14:18:55', 'admin', 'Rp. 3.500.000', 'Retail'),
('BRG-10-2023-003', 'Oli Gardan', 59, 'Pcs', 'antik', 'firdaus', '2022-10-13', '2023-10-30', '2023-10-31 15:10:40', 'admin', 'Rp. 382,900', 'Retail'),
('BRG-11-2023-004', 'Oli ABC', 80, 'Pcs', 'hanum', 'wiwik', '2023-10-12', '2023-11-01', '2023-11-01 01:44:30', 'umat', 'Rp. 6.000.000', 'Retail'),
('BRG-11-2023-005', 'oli Kapal A', 30, 'Drum', 'Roki', 'Alun', '2023-10-11', '2023-11-01', '2023-11-01 02:00:39', 'admin', 'Rp. 7.000.000', 'Marine'),
('BRG-11-2023-006', 'oli Z', 30, 'Pcs', 'Roki', 'Alun', '2023-10-11', '2023-11-01', '2023-11-01 02:01:12', 'admin', 'Rp. 500.000', 'Transport');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_rule`
--

CREATE TABLE `inventory_rule` (
  `id_rule` int(11) NOT NULL,
  `rule` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory_rule`
--

INSERT INTO `inventory_rule` (`id_rule`, `rule`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_token`
--

CREATE TABLE `inventory_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `tanggal_pembuatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory_token`
--

INSERT INTO `inventory_token` (`id`, `email`, `token`, `tanggal_pembuatan`) VALUES
(6, 'user@gmail.com', 'YhAdx2x4sMazaoi90ltAJkZPb94nrFr3l/Vvc+TMIao=', 1691891720),
(8, 'firil.alp@alppetro.id', 'uL7NmK0MipDpRrKexv8UYU6G5dxyilWP7iZ0Ly3B950=', 1691923067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_user`
--

CREATE TABLE `inventory_user` (
  `id_user` int(11) NOT NULL,
  `id_rule` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `aktif` int(11) NOT NULL,
  `tanggal_pembuatan` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory_user`
--

INSERT INTO `inventory_user` (`id_user`, `id_rule`, `nama`, `username`, `email`, `password`, `telpon`, `aktif`, `tanggal_pembuatan`, `gambar`, `tanggal_input`) VALUES
(5, 1, 'admin', 'admin', 'firil.alp@alppetro.id', '$2y$10$YHH.MPhvL0jOkU28kJZYaudngjnFuCwNnu.nuBPD8TysBncDlkeQq', '0813-3415-24841', 1, 1693189530, 'aq.jpg', '2023-10-31 12:57:30'),
(8, 2, 'Umat sederhana', 'umat', 'dekfiral@gmail.com', '$2y$10$TAWBnlotTmQ.414KjpATEOKJZ.1tZx/aAyXjFU9N5IaDEFIgkOLtK', '0857487387281', 1, 1698752006, 'default.jpg', '2023-10-31 12:57:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_user_askes_menu`
--

CREATE TABLE `inventory_user_askes_menu` (
  `id` int(11) NOT NULL,
  `id_rule` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory_user_askes_menu`
--

INSERT INTO `inventory_user_askes_menu` (`id`, `id_rule`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(4, 1, 5),
(5, 2, 2),
(12, 1, 2),
(0, 2, 1),
(0, 2, 3),
(0, 2, 5),
(0, 1, 11),
(0, 2, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_user_menu`
--

CREATE TABLE `inventory_user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(255) CHARACTER SET latin1 NOT NULL,
  `alias` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory_user_menu`
--

INSERT INTO `inventory_user_menu` (`id`, `menu`, `alias`, `icon`) VALUES
(1, 'Admin', 'Dashboard', 'fas fa-tachometer-alt'),
(2, 'User', 'Profile', 'fas fa-user'),
(3, 'Backend', 'M.Data Backend', 'fas fa-database'),
(5, 'Menu', 'Menu Management', 'fas fa-folder'),
(11, 'Inventory', 'Inventory', 'fas fa-boxes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventory_user_sub_menu`
--

CREATE TABLE `inventory_user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `judul` varchar(30) CHARACTER SET latin1 NOT NULL,
  `url` varchar(50) CHARACTER SET latin1 NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inventory_user_sub_menu`
--

INSERT INTO `inventory_user_sub_menu` (`id`, `menu_id`, `judul`, `url`, `is_active`) VALUES
(1, 2, 'My Profile', 'user', 1),
(2, 2, 'Edit Profile', 'user/edit', 1),
(3, 5, 'Main Menu', 'menu', 1),
(4, 5, 'Sub Menu', 'menu/submenu', 1),
(5, 1, 'Dashboard', 'admin', 1),
(6, 3, 'Data User', 'admin/data_user', 1),
(7, 3, 'Rule', 'admin/rule', 1),
(10, 2, 'Change Password', 'user/changepassword', 1),
(23, 11, 'inventory', 'inventory', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_inventory_sub_menu`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_inventory_sub_menu` (
`id` int(11)
,`menu_id` int(11)
,`menu` varchar(255)
,`judul` varchar(30)
,`url` varchar(50)
,`is_active` int(1)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_inventory_user`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_inventory_user` (
`id_user` int(11)
,`id_rule` int(11)
,`nama` varchar(255)
,`username` varchar(255)
,`email` varchar(255)
,`password` varchar(255)
,`telpon` varchar(100)
,`aktif` int(11)
,`tanggal_pembuatan` int(11)
,`gambar` varchar(255)
,`rule` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_inventory_sub_menu`
--
DROP TABLE IF EXISTS `view_inventory_sub_menu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_inventory_sub_menu`  AS SELECT `a`.`id` AS `id`, `a`.`menu_id` AS `menu_id`, `b`.`menu` AS `menu`, `a`.`judul` AS `judul`, `a`.`url` AS `url`, `a`.`is_active` AS `is_active` FROM (`inventory_user_sub_menu` `a` join `inventory_user_menu` `b` on(`a`.`menu_id` = `b`.`id`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `view_inventory_user`
--
DROP TABLE IF EXISTS `view_inventory_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_inventory_user`  AS SELECT `a`.`id_user` AS `id_user`, `a`.`id_rule` AS `id_rule`, `a`.`nama` AS `nama`, `a`.`username` AS `username`, `a`.`email` AS `email`, `a`.`password` AS `password`, `a`.`telpon` AS `telpon`, `a`.`aktif` AS `aktif`, `a`.`tanggal_pembuatan` AS `tanggal_pembuatan`, `a`.`gambar` AS `gambar`, `b`.`rule` AS `rule` FROM (`inventory_user` `a` join `inventory_rule` `b` on(`a`.`id_rule` = `b`.`id_rule`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `inventory_barang`
--
ALTER TABLE `inventory_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `inventory_rule`
--
ALTER TABLE `inventory_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indeks untuk tabel `inventory_token`
--
ALTER TABLE `inventory_token`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventory_user`
--
ALTER TABLE `inventory_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `inventory_user_askes_menu`
--
ALTER TABLE `inventory_user_askes_menu`
  ADD KEY `fkmmenu` (`menu_id`),
  ADD KEY `fkmrule` (`id_rule`);

--
-- Indeks untuk tabel `inventory_user_menu`
--
ALTER TABLE `inventory_user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inventory_user_sub_menu`
--
ALTER TABLE `inventory_user_sub_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkmsubmenu` (`menu_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `inventory_rule`
--
ALTER TABLE `inventory_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `inventory_token`
--
ALTER TABLE `inventory_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `inventory_user`
--
ALTER TABLE `inventory_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `inventory_user_menu`
--
ALTER TABLE `inventory_user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `inventory_user_sub_menu`
--
ALTER TABLE `inventory_user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventory_user_askes_menu`
--
ALTER TABLE `inventory_user_askes_menu`
  ADD CONSTRAINT `fkmmenu` FOREIGN KEY (`menu_id`) REFERENCES `inventory_user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmrule` FOREIGN KEY (`id_rule`) REFERENCES `inventory_rule` (`id_rule`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `inventory_user_sub_menu`
--
ALTER TABLE `inventory_user_sub_menu`
  ADD CONSTRAINT `fkmsubmenu` FOREIGN KEY (`menu_id`) REFERENCES `inventory_user_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
