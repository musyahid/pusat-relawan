-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2021 pada 00.41
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `relawan_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `hak_akses` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `id_akun`, `hak_akses`) VALUES
(1, 30, 'SUPERADMIN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nomor_handphone` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `nama_lengkap`, `email`, `password`, `nomor_handphone`, `foto`) VALUES
(30, 'SUPERADMIN', 'superadmin@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, 'admin_logo.png'),
(48, 'nurul', 'nurul@gmail.com', '202cb962ac59075b964b07152d234b70', 'sds', NULL),
(51, 'Nurul Fadhilah', 'relawan@gmail.com', '202cb962ac59075b964b07152d234b70', '087738934282', '2bd13e29a6ae217f7bfcdaf8420c921e.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bencana`
--

CREATE TABLE `bencana` (
  `id_bencana` int(11) NOT NULL,
  `id_forum` int(11) DEFAULT NULL,
  `nama_bencana` varchar(255) DEFAULT NULL,
  `id_kategori_bencana` int(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `link_berita` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `warna` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_pengajuan` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bencana`
--

INSERT INTO `bencana` (`id_bencana`, `id_forum`, `nama_bencana`, `id_kategori_bencana`, `kecamatan`, `kabupaten`, `provinsi`, `alamat_lengkap`, `link_berita`, `latitude`, `longitude`, `warna`, `gambar`, `status_pengajuan`) VALUES
(1, 20, 'Gunungf Meletus', 2, 'Wanasaba', 'Padang', 'Padang', 'asasas', 'www.sashas.com', '-2.3723687086440504', '103.00781250000001', 'red', 'd27c7d60138302ef7e94a7942fc84dcd.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(11) NOT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `nama_forum` varchar(255) DEFAULT NULL,
  `tanggal_berdiri` date DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `lokasi` text DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kode_pos` char(5) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `forum`
--

INSERT INTO `forum` (`id_forum`, `id_akun`, `nama_forum`, `tanggal_berdiri`, `logo`, `lokasi`, `provinsi`, `kabupaten`, `kecamatan`, `kode_pos`, `website`, `status_pengajuan`) VALUES
(20, 48, 'Nurul Peduli', '2021-06-02', '0a91ebd05920f67966412fee92faae1d.JPG', 'sdsd            ', 'sds', 'sds', 'sds', 'sds', 'sds', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_relawan`
--

CREATE TABLE `forum_relawan` (
  `id_relawan` int(11) DEFAULT NULL,
  `id_forum` int(11) DEFAULT NULL,
  `alasan_bergabung` text DEFAULT NULL,
  `status_pengajuan_relawan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pelatihan`
--

CREATE TABLE `jenis_pelatihan` (
  `id_jenis_pelatihan` int(11) NOT NULL,
  `nama_jenis_pelatihan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pelatihan`
--

INSERT INTO `jenis_pelatihan` (`id_jenis_pelatihan`, `nama_jenis_pelatihan`) VALUES
(1, 'ONLINE'),
(2, 'OFFLINE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_bencana`
--

CREATE TABLE `kategori_bencana` (
  `id_kategori_bencana` int(11) NOT NULL,
  `nama_kategori_bencana` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_bencana`
--

INSERT INTO `kategori_bencana` (`id_kategori_bencana`, `nama_kategori_bencana`) VALUES
(1, 'GEMPA BUMI'),
(2, 'GUNUNG MELETUS'),
(3, 'TSUNAMI'),
(4, 'BANJIR'),
(5, 'TANAH LONGSOR'),
(6, 'KEBAKARAN HUTAN'),
(7, 'LAINNYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_pelatihan`
--

CREATE TABLE `kategori_pelatihan` (
  `id_kategori_pelatihan` int(11) NOT NULL,
  `nama_kategori_pelatihan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_pelatihan`
--

INSERT INTO `kategori_pelatihan` (`id_kategori_pelatihan`, `nama_kategori_pelatihan`) VALUES
(1, 'LOGISTIK'),
(2, 'PSIKOSOSIAL'),
(3, 'KESEHATAN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(11) NOT NULL,
  `id_forum` int(11) DEFAULT NULL,
  `nama_pelatihan` varchar(255) DEFAULT NULL,
  `id_kategori_pelatihan` int(11) NOT NULL DEFAULT 0,
  `id_jenis_pelatihan` int(11) DEFAULT NULL,
  `tanggal_pelatihan` date DEFAULT NULL,
  `deskripsi_pelatihan` varchar(100) DEFAULT NULL,
  `waktu` varchar(50) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `status_pengajuan_pelatihan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `id_forum`, `nama_pelatihan`, `id_kategori_pelatihan`, `id_jenis_pelatihan`, `tanggal_pelatihan`, `deskripsi_pelatihan`, `waktu`, `kuota`, `status_pengajuan_pelatihan`) VALUES
(4, 20, 'Pelatihan Tanggap Bencana', 1, 1, '2021-07-01', 'asasasas', '12:00 PM', 10, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihan_relawan`
--

CREATE TABLE `pelatihan_relawan` (
  `id_pelatihan` int(11) DEFAULT NULL,
  `id_relawan` int(11) DEFAULT NULL,
  `alasan_bergabung` text DEFAULT NULL,
  `status_pengajuan_pelatihan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelatihan_relawan`
--

INSERT INTO `pelatihan_relawan` (`id_pelatihan`, `id_relawan`, `alasan_bergabung`, `status_pengajuan_pelatihan`) VALUES
(4, 14, 'ingin belajar', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `relawan`
--

CREATE TABLE `relawan` (
  `id_relawan` int(11) NOT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(50) DEFAULT NULL,
  `deskripsi_keahlian` text DEFAULT NULL,
  `surat_keterangan_sehat` varchar(100) DEFAULT NULL,
  `skck` varchar(100) DEFAULT NULL,
  `surat_persetujuan_wali` varchar(100) DEFAULT NULL,
  `foto_ktp` varchar(100) DEFAULT NULL,
  `status_pengajuan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `relawan`
--

INSERT INTO `relawan` (`id_relawan`, `id_akun`, `alamat`, `provinsi`, `kabupaten`, `kecamatan`, `kode_pos`, `deskripsi_keahlian`, `surat_keterangan_sehat`, `skck`, `surat_persetujuan_wali`, `foto_ktp`, `status_pengajuan`) VALUES
(14, 51, 'asaas', 'asasa', 'asaa', 'sasasa', 'asaas', 'asaddfdsdsfd', '9327e7057125232e519a5c601da16a65.pdf', '6c2ee2cc3f17c740387bc803a161abdc.pdf', 'b01c82214eab109ff3d87cada493f4f9.pdf', 'aac36444a5496cc81129f3e0e2dd7f00.pdf', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `FK_admin_akun` (`id_akun`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id_bencana`),
  ADD KEY `FK_bencana_kategori_bencana` (`id_kategori_bencana`),
  ADD KEY `FK_bencana_forum` (`id_forum`);

--
-- Indeks untuk tabel `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`),
  ADD KEY `FK_forum_akun` (`id_akun`);

--
-- Indeks untuk tabel `forum_relawan`
--
ALTER TABLE `forum_relawan`
  ADD KEY `forum_relawan_ibfk_1` (`id_forum`),
  ADD KEY `forum_relawan_ibfk_2` (`id_relawan`);

--
-- Indeks untuk tabel `jenis_pelatihan`
--
ALTER TABLE `jenis_pelatihan`
  ADD PRIMARY KEY (`id_jenis_pelatihan`);

--
-- Indeks untuk tabel `kategori_bencana`
--
ALTER TABLE `kategori_bencana`
  ADD PRIMARY KEY (`id_kategori_bencana`) USING BTREE;

--
-- Indeks untuk tabel `kategori_pelatihan`
--
ALTER TABLE `kategori_pelatihan`
  ADD PRIMARY KEY (`id_kategori_pelatihan`) USING BTREE;

--
-- Indeks untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`) USING BTREE,
  ADD KEY `FK_pelatihan_kategori_pelatihan` (`id_kategori_pelatihan`),
  ADD KEY `FK_pelatihan_jenis_pelatihan` (`id_jenis_pelatihan`),
  ADD KEY `FK_pelatihan_forum` (`id_forum`);

--
-- Indeks untuk tabel `pelatihan_relawan`
--
ALTER TABLE `pelatihan_relawan`
  ADD KEY `FK_pelatihan_relawan_pelatihan` (`id_pelatihan`),
  ADD KEY `FK_pelatihan_relawan_relawan` (`id_relawan`);

--
-- Indeks untuk tabel `relawan`
--
ALTER TABLE `relawan`
  ADD PRIMARY KEY (`id_relawan`),
  ADD KEY `FK_relawan_akun` (`id_akun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id_bencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `forum`
--
ALTER TABLE `forum`
  MODIFY `id_forum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `jenis_pelatihan`
--
ALTER TABLE `jenis_pelatihan`
  MODIFY `id_jenis_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_bencana`
--
ALTER TABLE `kategori_bencana`
  MODIFY `id_kategori_bencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kategori_pelatihan`
--
ALTER TABLE `kategori_pelatihan`
  MODIFY `id_kategori_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `relawan`
--
ALTER TABLE `relawan`
  MODIFY `id_relawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_admin_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bencana`
--
ALTER TABLE `bencana`
  ADD CONSTRAINT `FK_bencana_forum` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`),
  ADD CONSTRAINT `FK_bencana_kategori_bencana` FOREIGN KEY (`id_kategori_bencana`) REFERENCES `kategori_bencana` (`id_kategori_bencana`);

--
-- Ketidakleluasaan untuk tabel `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `FK_forum_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `forum_relawan`
--
ALTER TABLE `forum_relawan`
  ADD CONSTRAINT `forum_relawan_ibfk_1` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`),
  ADD CONSTRAINT `forum_relawan_ibfk_2` FOREIGN KEY (`id_relawan`) REFERENCES `relawan` (`id_relawan`);

--
-- Ketidakleluasaan untuk tabel `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD CONSTRAINT `FK_pelatihan_forum` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`),
  ADD CONSTRAINT `FK_pelatihan_jenis_pelatihan` FOREIGN KEY (`id_jenis_pelatihan`) REFERENCES `jenis_pelatihan` (`id_jenis_pelatihan`),
  ADD CONSTRAINT `FK_pelatihan_kategori_pelatihan` FOREIGN KEY (`id_kategori_pelatihan`) REFERENCES `kategori_pelatihan` (`id_kategori_pelatihan`);

--
-- Ketidakleluasaan untuk tabel `pelatihan_relawan`
--
ALTER TABLE `pelatihan_relawan`
  ADD CONSTRAINT `FK_pelatihan_relawan_pelatihan` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihan` (`id_pelatihan`),
  ADD CONSTRAINT `FK_pelatihan_relawan_relawan` FOREIGN KEY (`id_relawan`) REFERENCES `relawan` (`id_relawan`);

--
-- Ketidakleluasaan untuk tabel `relawan`
--
ALTER TABLE `relawan`
  ADD CONSTRAINT `FK_relawan_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
