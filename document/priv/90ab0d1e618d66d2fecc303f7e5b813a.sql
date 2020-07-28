-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2020 pada 20.33
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ardig_fb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(16, 'Yayasan', ''),
(17, 'Rektorat', ''),
(18, 'SK Rektorat', ''),
(19, 'Unit', ''),
(20, 'Fakultas', ''),
(21, 'Studi Lanjut', ''),
(22, 'Laporan Studi', ''),
(23, 'Pribadi', ''),
(24, 'Instansi', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `id_user`, `role`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 97);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id_surat` int(11) NOT NULL,
  `golongan_surat` int(11) NOT NULL COMMENT '1=surat masuk, 2=surat keluar',
  `id_kategori` int(11) NOT NULL,
  `target` text NOT NULL COMMENT 'pengirim/penerima',
  `tgl_diterima` date NOT NULL,
  `no_surat` text NOT NULL,
  `perihal` text NOT NULL,
  `tujuan` text NOT NULL,
  `keterangan` text NOT NULL,
  `status` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `golongan_surat`, `id_kategori`, `target`, `tgl_diterima`, `no_surat`, `perihal`, `tujuan`, `keterangan`, `status`, `created_at`) VALUES
(23, 1, 17, 'test', '2020-07-19', 'test', 'test', 'test', '<p>test</p>\r\n', '', '2020-07-19 00:08:36'),
(24, 1, 19, 'informa', '2020-07-19', 'asa', 'asasa', 'asaas', '<p>ass</p>\r\n', '1', '2020-07-19 00:40:48'),
(25, 2, 18, 'test keluar', '2020-07-19', 'test keluar', 'test keluar', 'test keluar', '<p>test keluar</p>\r\n', '2', '2020-07-19 01:07:33'),
(26, 1, 17, 'wr 1', '2020-07-19', '01', 'pengumuman', 'dekan, ', '<p>pengumuman tentang pendidikam</p>\r\n', '2', '2020-07-19 16:19:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_surat`
--

CREATE TABLE `trans_surat` (
  `id_trans_surat` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `nama_surat` text NOT NULL,
  `link_file` text NOT NULL,
  `tipe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans_surat`
--

INSERT INTO `trans_surat` (`id_trans_surat`, `id_surat`, `nama_surat`, `link_file`, `tipe`) VALUES
(19, 23, 'test 1', 'b2005185d2c451b359a709ec208e2917.png', '.png'),
(20, 23, 'test 2', '23da9036e973c08dc6abb130ad5f9b0d.png', '.png'),
(21, 23, 'test 3', '9bd9dd8bc9cb0d674fbed5346b6a5afc.jpg', '.jpg'),
(22, 24, 'png', 'f84ece3b800b0ce6816202ff0fc5d5b1.png', '.png'),
(23, 24, 'jpg', '383332a818e70206ddaaf1aca5bf22a1.jpg', '.jpg'),
(24, 24, 'doc', '51ee2adfc3e0e96c9fd9c866fe76e590.docx', '.docx'),
(25, 24, 'pdf', 'c157b9983ad08989e5fc932682fafeb4.pdf', '.pdf'),
(26, 24, 'ppt', 'd2fe819d0af0ae2d34f8be25cdfe3c88.pptx', '.pptx'),
(27, 25, '1', '1b4751f1a6e7ff66c847c737fc270ad5.txt', '.txt'),
(28, 26, 'pengumman', 'e1f97881ee239aff55def674691347cd.htaccess', '.htaccess'),
(29, 26, 'aku', 'a6dc4008f9e3bc29dfbe3cfed03e32a1.gitignore', '.gitignore');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=aktif;0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `status`) VALUES
(1, 'superadmin', 'superadmin', '17c4520f6cfd1ab53d8745e84681eb49', 1),
(2, 'Windy Puji Oktiagraha', 'windyoktia07', '58e55049cf01be8ad6111369d82d1ade', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `delete` (`id_user`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indeks untuk tabel `trans_surat`
--
ALTER TABLE `trans_surat`
  ADD PRIMARY KEY (`id_trans_surat`),
  ADD KEY `delsurat` (`id_surat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `trans_surat`
--
ALTER TABLE `trans_surat`
  MODIFY `id_trans_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `delete` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trans_surat`
--
ALTER TABLE `trans_surat`
  ADD CONSTRAINT `delsurat` FOREIGN KEY (`id_surat`) REFERENCES `surat` (`id_surat`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
