# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.27)
# Database: db_lmart
# Generation Time: 2020-01-22 15:35:45 +0000
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
	(2,'adminGM','21232f297a57a5a743894a0e4a801fc3','gm','supervisor','profil2.jpg');

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
	(1,'Staff Kontrak',1),
	(2,'Staff Permanen',2),
	(3,'Senior Staff',3),
	(4,'Section Head',4),
	(5,'Divisi Manager',5),
	(6,'Store GM',6);

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
  `doj` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
	(2,'11000001','SUSI FEBRIASIH',1,4,3,1,'profil1.jpg','2020-01-22 21:26:27'),
	(3,'11000002','AHMAD SUKRON',2,1,1,1,'profil1.jpg','2020-01-22 21:26:27'),
	(4,'11000003','PASKALIS PRIYO U',3,1,1,1,'profil1.jpg','2020-01-22 21:26:27'),
	(5,'11000004','LINAWATI',4,4,6,1,'profil1.jpg','2020-01-22 21:26:27');

/*!40000 ALTER TABLE `karyawan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_disiplin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_disiplin`;

CREATE TABLE `kriteria_disiplin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `range` int(3) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_disiplin` WRITE;
/*!40000 ALTER TABLE `kriteria_disiplin` DISABLE KEYS */;

INSERT INTO `kriteria_disiplin` (`id`, `pilihan_kriteria`, `range`, `bobot`)
VALUES
	(1,'0',100,1),
	(2,'1 - 5',98,0.75),
	(3,'6 - 10',96,0.5),
	(4,'11 - 10',94,0.25);

/*!40000 ALTER TABLE `kriteria_disiplin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_kecakapan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_kecakapan`;

CREATE TABLE `kriteria_kecakapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_kecakapan` WRITE;
/*!40000 ALTER TABLE `kriteria_kecakapan` DISABLE KEYS */;

INSERT INTO `kriteria_kecakapan` (`id`, `pilihan_kriteria`, `bobot`)
VALUES
	(1,'9 - 10',1),
	(2,'7.1 - 8.9',0.75),
	(3,'5.1 - 7',0.5),
	(4,'< 5',0.25);

/*!40000 ALTER TABLE `kriteria_kecakapan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_kepemimpinan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_kepemimpinan`;

CREATE TABLE `kriteria_kepemimpinan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_kepemimpinan` WRITE;
/*!40000 ALTER TABLE `kriteria_kepemimpinan` DISABLE KEYS */;

INSERT INTO `kriteria_kepemimpinan` (`id`, `pilihan_kriteria`, `bobot`)
VALUES
	(1,'9 - 10',1),
	(2,'7.1 - 8.9',0.75),
	(3,'5.1 - 7',0.5),
	(4,'< 5',0.25);

/*!40000 ALTER TABLE `kriteria_kepemimpinan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_kerja_sama
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_kerja_sama`;

CREATE TABLE `kriteria_kerja_sama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `range` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_kerja_sama` WRITE;
/*!40000 ALTER TABLE `kriteria_kerja_sama` DISABLE KEYS */;

INSERT INTO `kriteria_kerja_sama` (`id`, `pilihan_kriteria`, `range`, `bobot`)
VALUES
	(1,'Pasif','9 - 10',1),
	(2,'Biasa','7.1 - 8.9',0.75),
	(3,'Inisiatif','5.1 - 7',0.5),
	(4,'Aktif','< 5',0.25);

/*!40000 ALTER TABLE `kriteria_kerja_sama` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table kriteria_loyalitas
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_loyalitas`;

CREATE TABLE `kriteria_loyalitas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_loyalitas` WRITE;
/*!40000 ALTER TABLE `kriteria_loyalitas` DISABLE KEYS */;

INSERT INTO `kriteria_loyalitas` (`id`, `pilihan_kriteria`, `bobot`)
VALUES
	(1,'9 - 10',1),
	(2,'7.1 - 8.9',0.75),
	(3,'5.1 - 7',0.5),
	(4,'< 5',0.25);

/*!40000 ALTER TABLE `kriteria_loyalitas` ENABLE KEYS */;
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
	(1,'> 3 Tahun',1),
	(2,'< 3 Tahun',0.75),
	(3,'< 2 Tahun',0.5),
	(4,'< 1 Tahun',0.25);

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


# Dump of table kriteria_prestasi_kerja
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kriteria_prestasi_kerja`;

CREATE TABLE `kriteria_prestasi_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilihan_kriteria` varchar(50) DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kriteria_prestasi_kerja` WRITE;
/*!40000 ALTER TABLE `kriteria_prestasi_kerja` DISABLE KEYS */;

INSERT INTO `kriteria_prestasi_kerja` (`id`, `pilihan_kriteria`, `bobot`)
VALUES
	(1,'3,5 - 5',1),
	(2,'3,0 - 3,4',0.75),
	(3,'2,1 - 2,9',0.5),
	(4,'1.0 - 2.0',0.25);

/*!40000 ALTER TABLE `kriteria_prestasi_kerja` ENABLE KEYS */;
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
  `C6` int(4) DEFAULT NULL,
  `C7` int(4) DEFAULT NULL,
  `C8` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `masa kerja` (`C1`),
  KEY `disiplin` (`C2`),
  KEY `prestasi kerja` (`C3`),
  KEY `kerja sama` (`C4`),
  KEY `kecakapan` (`C5`),
  KEY `loyalitas` (`C6`),
  KEY `kepemimpinan` (`C7`),
  KEY `pendidikan` (`C8`),
  KEY `karyawan` (`id_karyawan`),
  CONSTRAINT `disiplin` FOREIGN KEY (`C2`) REFERENCES `kriteria_disiplin` (`id`),
  CONSTRAINT `karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id`),
  CONSTRAINT `kecakapan` FOREIGN KEY (`C5`) REFERENCES `kriteria_kecakapan` (`id`),
  CONSTRAINT `kepemimpinan` FOREIGN KEY (`C7`) REFERENCES `kriteria_kepemimpinan` (`id`),
  CONSTRAINT `kerja sama` FOREIGN KEY (`C4`) REFERENCES `kriteria_kerja_sama` (`id`),
  CONSTRAINT `loyalitas` FOREIGN KEY (`C6`) REFERENCES `kriteria_loyalitas` (`id`),
  CONSTRAINT `masa kerja` FOREIGN KEY (`C1`) REFERENCES `kriteria_masa_kerja` (`id`),
  CONSTRAINT `pendidikan` FOREIGN KEY (`C8`) REFERENCES `kriteria_pendidikan` (`id`),
  CONSTRAINT `prestasi kerja` FOREIGN KEY (`C3`) REFERENCES `kriteria_disiplin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nilai` WRITE;
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;

INSERT INTO `nilai` (`id`, `id_karyawan`, `C1`, `C2`, `C3`, `C4`, `C5`, `C6`, `C7`, `C8`)
VALUES
	(15,2,1,2,2,2,2,3,3,2),
	(16,3,1,2,1,2,2,3,2,4),
	(17,4,1,2,3,3,2,3,4,4),
	(18,5,1,2,3,3,2,3,4,4);

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
  `NC4` int(4) DEFAULT NULL,
  `NC5` int(4) DEFAULT NULL,
  `NC6` int(4) DEFAULT NULL,
  `NC7` int(4) DEFAULT NULL,
  `NC8` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nilai` (`id_nilai`),
  CONSTRAINT `nilai` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nilai_karyawan` WRITE;
/*!40000 ALTER TABLE `nilai_karyawan` DISABLE KEYS */;

INSERT INTO `nilai_karyawan` (`id`, `id_nilai`, `NC1`, `NC2`, `NC3`, `NC4`, `NC5`, `NC6`, `NC7`, `NC8`)
VALUES
	(1,15,3.5,3,3.3,8,8,6,7,'S1'),
	(2,16,3,4,3.5,8,9,7,8,'SMA'),
	(3,17,4,3,2.9,7,8,6,5,'SMA'),
	(4,18,5,2,2.8,6,8,6,5,'SMA');

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
	(1,'Kasir & CIS'),
	(2,'Finance'),
	(3,'Good Receiving'),
	(4,'Food & Non Food'),
	(5,'Facility'),
	(6,'Alc &  Vm'),
	(7,'Quality Control'),
	(8,'HR');

/*!40000 ALTER TABLE `posisi` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
