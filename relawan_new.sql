-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for relawan_new
CREATE DATABASE IF NOT EXISTS `relawan_new` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `relawan_new`;

-- Dumping structure for table relawan_new.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id_akun` int(11) DEFAULT NULL,
  `hak_akses` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `FK_admin_akun` (`id_akun`),
  CONSTRAINT `FK_admin_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table relawan_new.akun
CREATE TABLE IF NOT EXISTS `akun` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nomor_handphone` varchar(50) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table relawan_new.forum
CREATE TABLE IF NOT EXISTS `forum` (
  `id_forum` int(11) NOT NULL AUTO_INCREMENT,
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
  `status_pengajuan` int(11) DEFAULT 0,
  PRIMARY KEY (`id_forum`),
  KEY `FK_forum_akun` (`id_akun`),
  CONSTRAINT `FK_forum_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table relawan_new.forum_relawan
CREATE TABLE IF NOT EXISTS `forum_relawan` (
  `id_relawan` int(11) DEFAULT NULL,
  `id_forum` int(11) DEFAULT NULL,
  KEY `id_forum` (`id_forum`),
  KEY `id_relawan` (`id_relawan`),
  CONSTRAINT `forum_relawan_ibfk_1` FOREIGN KEY (`id_forum`) REFERENCES `forum` (`id_forum`),
  CONSTRAINT `forum_relawan_ibfk_2` FOREIGN KEY (`id_relawan`) REFERENCES `relawan` (`id_relawan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table relawan_new.relawan
CREATE TABLE IF NOT EXISTS `relawan` (
  `id_relawan` int(11) NOT NULL AUTO_INCREMENT,
  `id_akun` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kabupaten_kota` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `deskripsi_keahlian` text DEFAULT NULL,
  `status_aktif` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_relawan`),
  KEY `FK_relawan_akun` (`id_akun`),
  CONSTRAINT `FK_relawan_akun` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
