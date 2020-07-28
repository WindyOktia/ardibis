-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jul 2020 pada 21.05
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
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nidn` text NOT NULL,
  `nama_dosen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nip`, `nidn`, `nama_dosen`) VALUES
(2, '1997', '9001', 'dosen 1'),
(3, '21212', '4444', 'dosen 2');

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
(24, 'Instansi', ''),
(27, 'test', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id_matakuliah` int(11) NOT NULL,
  `kode_matakuliah` text NOT NULL,
  `semester` int(11) NOT NULL,
  `nama_matakuliah` text NOT NULL,
  `sks` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id_matakuliah`, `kode_matakuliah`, `semester`, `nama_matakuliah`, `sks`, `harga`, `keterangan`) VALUES
(5, 'MH 1013', 1, 'Pendidikan Agama Kristen', 3, 3, ''),
(6, 'MH 1033', 1, 'Bahasa Indonesia', 3, 3, ''),
(7, 'MH 1063', 2, 'Pendidikan Kewarganegaraan', 3, 3, ''),
(8, 'MH 1043', 4, 'Ilmu Kealaman Dasar', 3, 3, ''),
(9, 'MU 1043', 1, 'Matematika Ekonomi', 3, 3, ''),
(10, 'MU 1235', 1, 'Manajemen', 5, 6, ''),
(11, 'MU 1266', 1, 'Teori Ekonomi', 6, 6, ''),
(12, 'MU 1226', 2, 'Akuntansi', 6, 6, ''),
(13, 'MU 1245', 2, 'Statistik', 5, 7, ''),
(14, 'MU 1306', 2, 'Manajemen Sumber Daya Manusia', 6, 6, ''),
(15, 'MU 1276', 3, 'Manajemen Keuangan', 6, 6, ''),
(16, 'MU 1286', 3, 'Manajemen Pemasaran', 6, 6, ''),
(17, 'MU 1296', 3, 'Manajemen Operasional', 6, 6, ''),
(18, 'MU 1203', 4, 'Sistem Informasi Manajemen', 3, 5, ''),
(19, 'MU 1253', 4, 'Bahasa Inggris', 3, 3, ''),
(20, 'MU 1313', 4, 'Ekonomi Manajerial', 3, 3, ''),
(21, 'MU 1113', 5, 'Perekonomian Indonesia', 3, 3, ''),
(22, 'MP 1063', 4, 'Perilaku Konsumen', 3, 3, ''),
(23, 'MK 1033', 4, 'Manajemen Lembaga Keuangan', 3, 3, ''),
(24, 'MK 1193', 4, 'Anggaran', 3, 3, ''),
(25, 'MK 1072', 5, 'Enterprise Risk Management', 2, 2, ''),
(26, 'MK 1176', 5, 'Investasi', 6, 7, ''),
(27, 'MP 1243', 5, 'Bisnis Internasional', 3, 3, ''),
(28, 'MP 1253', 6, 'Metodologi Penelitian', 3, 3, ''),
(29, 'MP 1103', 6, 'E-Commerce', 3, 5, ''),
(30, 'MP 1033', 6, 'Komunikasi Pemasaran', 3, 3, ''),
(31, 'MP 1113', 6, 'Manajemen Ritel', 3, 3, ''),
(32, 'MP 1212', 6, 'Kapita Selekta Pemasaran', 2, 2, ''),
(33, 'MP 1263', 6, 'Pemasaran Internasional', 3, 3, ''),
(34, 'MP 1223', 7, 'Manajemen Logistik', 3, 3, ''),
(35, 'MP 1233', 7, 'Advertising and Media Relation', 3, 3, ''),
(36, 'MK 1013', 6, 'Analisis Laporan Keuangan', 3, 3, ''),
(37, 'MK 1163', 6, 'Fund Raising', 3, 3, ''),
(38, 'MK 1093', 6, 'Financial Risk Management', 3, 3, ''),
(39, 'MK 1172', 6, 'Kapita Selekta Keuangan', 2, 2, ''),
(40, 'MK 1186', 7, 'Strategic Financial', 6, 6, ''),
(41, 'MS 1012', 6, 'Kapita Selekta MSDM', 2, 2, ''),
(42, 'MS 1023', 6, 'Perencanaan dan Pengembangan  SDM', 3, 3, ''),
(43, 'MS 1033', 6, 'Manajemen Perubahan', 3, 3, ''),
(44, 'MS 1043', 6, 'Hubungan Industrial', 3, 3, ''),
(45, 'MS 1053', 7, 'Manajemen Kinerja', 3, 3, ''),
(46, 'MS 1063', 7, 'MSDM Internasional', 3, 3, ''),
(47, 'PB 1032', 4, 'Kewirausahaan', 2, 3, ''),
(48, 'PB 1092', 5, 'Komunikasi Bisnis', 2, 2, ''),
(49, 'PB 1073', 6, 'Hukum dan Bisnis', 3, 3, ''),
(50, 'PB 1063', 7, 'Studi Kelayakan Bisnis', 3, 3, ''),
(51, 'PB 1083', 7, 'Etika Bisnis', 3, 3, ''),
(52, 'PB 1053', 8, 'Manajemen Strategik', 3, 3, ''),
(53, 'BB 1013', 7, 'Kuliah Kerja Nyata', 3, 5, ''),
(54, 'BB 1023', 7, 'Kerja Praktek', 3, 5, ''),
(55, 'BB 1046', 8, 'Skripsi', 6, 10, '');

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
(3, 2, 97),
(4, 1, 97),
(5, 3, 3),
(6, 4, 1),
(7, 4, 2);

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
(24, 1, 19, 'informa', '2020-07-19', 'asa', 'asasa', 'asaas', '<p>ass</p>\r\n', '1', '2020-07-19 00:40:48'),
(25, 2, 18, 'test keluar', '2020-07-19', 'test keluar', 'test keluar', 'test keluar', '<p>test keluar</p>\r\n', '2', '2020-07-19 01:07:33'),
(26, 1, 17, 'wr 1', '2020-07-19', '01', 'pengumuman', 'dekan, ', '<p>pengumuman tentang pendidikam</p>\r\n', '2', '2020-07-19 16:19:57'),
(27, 1, 18, 'test serialize', '2020-07-21', 'test serialize', 'test serialize', 'a:3:{i:0;s:1:\"1\";i:1;s:1:\"3\";i:2;s:1:\"4\";}', '', '1', '2020-07-21 01:03:49');

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
(22, 24, 'png', 'f84ece3b800b0ce6816202ff0fc5d5b1.png', '.png'),
(23, 24, 'jpg', '383332a818e70206ddaaf1aca5bf22a1.jpg', '.jpg'),
(24, 24, 'doc', '51ee2adfc3e0e96c9fd9c866fe76e590.docx', '.docx'),
(25, 24, 'pdf', 'c157b9983ad08989e5fc932682fafeb4.pdf', '.pdf'),
(26, 24, 'ppt', 'd2fe819d0af0ae2d34f8be25cdfe3c88.pptx', '.pptx'),
(27, 25, '1', '1b4751f1a6e7ff66c847c737fc270ad5.txt', '.txt'),
(28, 26, 'pengumman', 'e1f97881ee239aff55def674691347cd.htaccess', '.htaccess'),
(29, 26, 'aku', 'a6dc4008f9e3bc29dfbe3cfed03e32a1.gitignore', '.gitignore'),
(30, 27, 'test serialize', '3673cd57e0910f9cb63b63a04fb9d2d7.sql', '.sql'),
(31, 27, 'test serialize 2', 'd5577d7e402b3247e93040d888cac6ee.png', '.png');

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
(2, 'Windy Puji Oktiagraha', 'windyoktia07', '58e55049cf01be8ad6111369d82d1ade', 1),
(3, 'publikasi', 'publik', '0fa68ee5f86c0c345aa1b4aec7a26f39', 1),
(4, 'dual', 'dual', '58ea30808cddb9aabed5fa82e95aac8b', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id_matakuliah`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id_matakuliah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `trans_surat`
--
ALTER TABLE `trans_surat`
  MODIFY `id_trans_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
