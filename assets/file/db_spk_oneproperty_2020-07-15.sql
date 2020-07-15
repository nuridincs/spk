# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_spk_oneproperty
# Generation Time: 2020-07-15 04:39:37 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `role` varchar(20) CHARACTER SET utf8 NOT NULL,
  `foto` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `role`, `foto`)
VALUES
	(1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin','profil1.jpg'),
	(2,'manager','21232f297a57a5a743894a0e4a801fc3','Manager','supervisor','profil2.jpg');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table jabatan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jabatan`;

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `level`)
VALUES
	(1,'kartap',1),
	(2,'kontrak ',2),
	(3,'percobaan',3),
	(4,'magang',4);

/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table karyawan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `karyawan`;

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` char(20) NOT NULL DEFAULT '',
  `nama` varchar(50) DEFAULT NULL,
  `jabatan` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `id_posisi` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  `foto` varchar(255) DEFAULT 'profil1.jpg',
  `doj` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `jabatan` (`jabatan`),
  KEY `level` (`level`),
  CONSTRAINT `jabatan` FOREIGN KEY (`jabatan`) REFERENCES `jabatan` (`id`),
  CONSTRAINT `level` FOREIGN KEY (`level`) REFERENCES `jabatan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `karyawan` WRITE;
/*!40000 ALTER TABLE `karyawan` DISABLE KEYS */;

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `jabatan`, `level`, `id_posisi`, `status`, `foto`, `doj`)
VALUES
	(2,'11000001','Marina',1,1,1,1,'profil1.jpg','0000-00-00 00:00:00'),
	(3,'11000002','Dodi ',2,2,1,1,'profil1.jpg','2020-07-02 00:00:00'),
	(4,'11000003','Tegar',3,3,1,1,'profil1.jpg','2020-07-02 00:00:00'),
	(5,'11000004','Fitria',2,2,1,1,'profil1.jpg','2020-07-02 00:00:00');

/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_absensi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_absensi`;

CREATE TABLE `kriteria_absensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `range` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_absensi` WRITE;
/*!40000 ALTER TABLE `kriteria_absensi` DISABLE KEYS */;

INSERT INTO `kriteria_absensi` (`id`, `pilihan_kriteria`, `range`, `bobot`)
VALUES
	(1,'sangat baik','<5',1),
	(2,'baik','5.1 - 7',0.75),
	(3,'cukup baik','7.1-9',0.5),
	(4,'kurang baik','>10',0.25);

/*!40000 ALTER TABLE `kriteria_absensi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_masa_kerja
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_masa_kerja`;

CREATE TABLE `kriteria_masa_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_masa_kerja` WRITE;
/*!40000 ALTER TABLE `kriteria_masa_kerja` DISABLE KEYS */;

INSERT INTO `kriteria_masa_kerja` (`id`, `pilihan_kriteria`, `bobot`)
VALUES
	(2,'> 4 Tahun',1),
	(3,'< 3 Tahun',0.75),
	(4,'< 2 Tahun',0.5),
	(5,'< 1 Tahun',0.25);

/*!40000 ALTER TABLE `kriteria_masa_kerja` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_pendidikan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_pendidikan`;

CREATE TABLE `kriteria_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `range` int(11) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_pendidikan` WRITE;
/*!40000 ALTER TABLE `kriteria_pendidikan` DISABLE KEYS */;

INSERT INTO `kriteria_pendidikan` (`id`, `pilihan_kriteria`, `range`, `bobot`)
VALUES
	(1,'S2',9,1),
	(2,'S1',8,0.75),
	(3,'D3',7,0.5),
	(4,'SMA/K Sederajat',6,0.25);

/*!40000 ALTER TABLE `kriteria_pendidikan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_status_kepegawaian
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_status_kepegawaian`;

CREATE TABLE `kriteria_status_kepegawaian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_status_kepegawaian` WRITE;
/*!40000 ALTER TABLE `kriteria_status_kepegawaian` DISABLE KEYS */;

INSERT INTO `kriteria_status_kepegawaian` (`id`, `pilihan_kriteria`, `bobot`)
VALUES
	(1,'tetap',1),
	(2,'kontrak',0.75),
	(3,'percobaan',0.5),
	(4,'magang',0.25);

/*!40000 ALTER TABLE `kriteria_status_kepegawaian` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_target_penjualan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_target_penjualan`;

CREATE TABLE `kriteria_target_penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_target_penjualan` WRITE;
/*!40000 ALTER TABLE `kriteria_target_penjualan` DISABLE KEYS */;

INSERT INTO `kriteria_target_penjualan` (`id`, `pilihan_kriteria`, `bobot`)
VALUES
	(1,'>10',1),
	(2,'7.1-9',0.75),
	(3,'5.1-7',0.5),
	(4,'<5',0.25);

/*!40000 ALTER TABLE `kriteria_target_penjualan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nilai
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nilai`;

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) DEFAULT NULL,
  `C1` int(4) DEFAULT NULL,
  `C2` int(4) DEFAULT NULL,
  `C3` int(4) DEFAULT NULL,
  `C4` int(4) DEFAULT NULL,
  `C5` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `masa kerja` (`C1`),
  KEY `disiplin` (`C2`),
  KEY `prestasi kerja` (`C3`),
  KEY `kerja sama` (`C4`),
  KEY `kecakapan` (`C5`),
  KEY `karyawan` (`id_karyawan`),
  CONSTRAINT `c1` FOREIGN KEY (`C1`) REFERENCES `kriteria_masa_kerja` (`id`),
  CONSTRAINT `c2` FOREIGN KEY (`C2`) REFERENCES `kriteria_absensi` (`id`),
  CONSTRAINT `c3` FOREIGN KEY (`C3`) REFERENCES `kriteria_target_penjualan` (`id`),
  CONSTRAINT `c4` FOREIGN KEY (`C4`) REFERENCES `kriteria_status_kepegawaian` (`id`),
  CONSTRAINT `c5` FOREIGN KEY (`C5`) REFERENCES `kriteria_pendidikan` (`id`),
  CONSTRAINT `karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;

INSERT INTO `nilai` (`id`, `id_karyawan`, `C1`, `C2`, `C3`, `C4`, `C5`)
VALUES
	(21,3,3,3,4,2,4),
	(22,4,4,2,2,3,3),
	(23,5,2,2,2,2,2),
	(24,2,3,1,2,1,2);

/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nilai_karyawan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nilai_karyawan`;

CREATE TABLE `nilai_karyawan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_nilai` int(11) DEFAULT NULL,
  `NC1` float DEFAULT NULL,
  `NC2` int(4) DEFAULT NULL,
  `NC3` float DEFAULT NULL,
  `NC4` char(20) DEFAULT NULL,
  `NC5` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nilai` (`id_nilai`),
  CONSTRAINT `nilai` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nilai_karyawan` WRITE;
/*!40000 ALTER TABLE `nilai_karyawan` DISABLE KEYS */;

INSERT INTO `nilai_karyawan` (`id`, `id_nilai`, `NC1`, `NC2`, `NC3`, `NC4`, `NC5`)
VALUES
	(7,21,3,8,4,'kontrak','sma/k'),
	(8,22,2,6,8,'percobaan','D3'),
	(9,23,3.5,6,8,'kontrak','s1'),
	(10,24,3,4,8,'kartap','s1');

/*!40000 ALTER TABLE `nilai_karyawan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posisi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posisi`;

CREATE TABLE `posisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `posisi` WRITE;
/*!40000 ALTER TABLE `posisi` DISABLE KEYS */;

INSERT INTO `posisi` (`id`, `nama`)
VALUES
	(1,' marketing'),
	(2,'manager'),
	(3,'HR');

/*!40000 ALTER TABLE `posisi` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
