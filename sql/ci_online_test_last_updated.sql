-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ci_online_test
DROP DATABASE IF EXISTS `ci_online_test`;
CREATE DATABASE IF NOT EXISTS `ci_online_test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ci_online_test`;

-- Dumping structure for table ci_online_test.dosen
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nip` char(12) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nip` (`nip`),
  KEY `matkul_id` (`matkul_id`),
  CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ci_online_test.dosen: ~0 rows (approximately)
DELETE FROM `dosen`;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.groups
DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.groups: ~3 rows (approximately)
DELETE FROM `groups`;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'petugas', 'Pembuat Soal dan ujian'),
	(3, 'peserta', 'Peserta Ujian');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.h_ujian
DROP TABLE IF EXISTS `h_ujian`;
CREATE TABLE IF NOT EXISTS `h_ujian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ujian_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `list_soal` longtext NOT NULL,
  `list_jawaban` longtext NOT NULL,
  `jml_benar` int(11) NOT NULL,
  `nilai` decimal(10,2) NOT NULL,
  `nilai_bobot` decimal(10,2) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` enum('Y','N') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ujian_id` (`ujian_id`),
  KEY `mahasiswa_id` (`mahasiswa_id`),
  CONSTRAINT `h_ujian_ibfk_1` FOREIGN KEY (`ujian_id`) REFERENCES `m_ujian` (`id_ujian`),
  CONSTRAINT `h_ujian_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id_mahasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.h_ujian: ~0 rows (approximately)
DELETE FROM `h_ujian`;
/*!40000 ALTER TABLE `h_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `h_ujian` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.jurusan
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jurusan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.jurusan: ~0 rows (approximately)
DELETE FROM `jurusan`;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.jurusan_matkul
DROP TABLE IF EXISTS `jurusan_matkul`;
CREATE TABLE IF NOT EXISTS `jurusan_matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matkul_id` int(11) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jurusan_id` (`jurusan_id`),
  KEY `matkul_id` (`matkul_id`),
  CONSTRAINT `jurusan_matkul_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id_jurusan`),
  CONSTRAINT `jurusan_matkul_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.jurusan_matkul: ~0 rows (approximately)
DELETE FROM `jurusan_matkul`;
/*!40000 ALTER TABLE `jurusan_matkul` DISABLE KEYS */;
/*!40000 ALTER TABLE `jurusan_matkul` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.kelas
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(30) NOT NULL,
  `jurusan_id` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `jurusan_id` (`jurusan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.kelas: ~0 rows (approximately)
DELETE FROM `kelas`;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.kelas_dosen
DROP TABLE IF EXISTS `kelas_dosen`;
CREATE TABLE IF NOT EXISTS `kelas_dosen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kelas_id` (`kelas_id`),
  KEY `dosen_id` (`dosen_id`),
  CONSTRAINT `kelas_dosen_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `kelas_dosen_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.kelas_dosen: ~0 rows (approximately)
DELETE FROM `kelas_dosen`;
/*!40000 ALTER TABLE `kelas_dosen` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelas_dosen` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.login_attempts
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.login_attempts: ~0 rows (approximately)
DELETE FROM `login_attempts`;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.mahasiswa
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nim` char(20) NOT NULL,
  `email` varchar(254) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `kelas_id` int(11) NOT NULL COMMENT 'kelas&jurusan',
  PRIMARY KEY (`id_mahasiswa`),
  UNIQUE KEY `nim` (`nim`),
  UNIQUE KEY `email` (`email`),
  KEY `kelas_id` (`kelas_id`),
  CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ci_online_test.mahasiswa: ~0 rows (approximately)
DELETE FROM `mahasiswa`;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.matkul
DROP TABLE IF EXISTS `matkul`;
CREATE TABLE IF NOT EXISTS `matkul` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `nama_matkul` varchar(50) NOT NULL,
  `tipesoal_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_matkul`),
  KEY `tipesoal_id` (`tipesoal_id`),
  CONSTRAINT `fk_matkul_tipesoal` FOREIGN KEY (`tipesoal_id`) REFERENCES `tipesoal` (`id_tipesoal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.matkul: ~1 rows (approximately)
DELETE FROM `matkul`;
/*!40000 ALTER TABLE `matkul` DISABLE KEYS */;
INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `tipesoal_id`) VALUES
	(2, 'masuk', 2);
/*!40000 ALTER TABLE `matkul` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.m_ujian
DROP TABLE IF EXISTS `m_ujian`;
CREATE TABLE IF NOT EXISTS `m_ujian` (
  `id_ujian` int(11) NOT NULL AUTO_INCREMENT,
  `dosen_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `nama_ujian` varchar(200) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `jenis` enum('acak','urut') NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `terlambat` datetime NOT NULL,
  `token` varchar(5) NOT NULL,
  PRIMARY KEY (`id_ujian`),
  KEY `matkul_id` (`matkul_id`),
  KEY `dosen_id` (`dosen_id`),
  CONSTRAINT `m_ujian_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id_dosen`),
  CONSTRAINT `m_ujian_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.m_ujian: ~0 rows (approximately)
DELETE FROM `m_ujian`;
/*!40000 ALTER TABLE `m_ujian` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_ujian` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.tb_soal
DROP TABLE IF EXISTS `tb_soal`;
CREATE TABLE IF NOT EXISTS `tb_soal` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `dosen_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `tipe_file` varchar(50) NOT NULL,
  `soal` longtext NOT NULL,
  `opsi_a` longtext NOT NULL,
  `opsi_b` longtext NOT NULL,
  `opsi_c` longtext NOT NULL,
  `opsi_d` longtext NOT NULL,
  `opsi_e` longtext NOT NULL,
  `file_a` varchar(255) NOT NULL,
  `file_b` varchar(255) NOT NULL,
  `file_c` varchar(255) NOT NULL,
  `file_d` varchar(255) NOT NULL,
  `file_e` varchar(255) NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `created_on` int(11) NOT NULL,
  `updated_on` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `matkul_id` (`matkul_id`),
  KEY `dosen_id` (`dosen_id`),
  CONSTRAINT `tb_soal_ibfk_1` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`),
  CONSTRAINT `tb_soal_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.tb_soal: ~0 rows (approximately)
DELETE FROM `tb_soal`;
/*!40000 ALTER TABLE `tb_soal` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_soal` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.tb_soal_kraepelin
DROP TABLE IF EXISTS `tb_soal_kraepelin`;
CREATE TABLE IF NOT EXISTS `tb_soal_kraepelin` (
  `id_soal` int(11) NOT NULL AUTO_INCREMENT,
  `dosen_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `soal` longtext NOT NULL,
  `jawaban` longtext NOT NULL,
  `created_on` int(11) NOT NULL,
  `updated_on` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_soal`),
  KEY `matkul_id` (`matkul_id`),
  KEY `dosen_id` (`dosen_id`),
  CONSTRAINT `tb_soal_kraepelin_ibfk_1` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`),
  CONSTRAINT `tb_soal_kraepelin_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id_dosen`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.tb_soal_kraepelin: ~0 rows (approximately)
DELETE FROM `tb_soal_kraepelin`;
/*!40000 ALTER TABLE `tb_soal_kraepelin` DISABLE KEYS */;
INSERT INTO `tb_soal_kraepelin` (`id_soal`, `dosen_id`, `matkul_id`, `soal`, `jawaban`, `created_on`, `updated_on`) VALUES
	(1, 1, 2, '1', '1', 1655384401, 1655384412);
/*!40000 ALTER TABLE `tb_soal_kraepelin` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.tipesoal
DROP TABLE IF EXISTS `tipesoal`;
CREATE TABLE IF NOT EXISTS `tipesoal` (
  `id_tipesoal` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipesoal` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipesoal`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.tipesoal: ~4 rows (approximately)
DELETE FROM `tipesoal`;
/*!40000 ALTER TABLE `tipesoal` DISABLE KEYS */;
INSERT INTO `tipesoal` (`id_tipesoal`, `nama_tipesoal`) VALUES
	(1, 'Pilihan Ganda'),
	(2, 'Essay'),
	(3, 'Papi Costic'),
	(4, 'Kraepelin');
/*!40000 ALTER TABLE `tipesoal` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.tipesoal_matkul
DROP TABLE IF EXISTS `tipesoal_matkul`;
CREATE TABLE IF NOT EXISTS `tipesoal_matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matkul_id` int(11) NOT NULL,
  `tipesoal_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `tipesoal_id` (`tipesoal_id`) USING BTREE,
  KEY `matkul_id` (`matkul_id`) USING BTREE,
  CONSTRAINT `tipesoal_matkul_ibfk_1` FOREIGN KEY (`tipesoal_id`) REFERENCES `tipesoal` (`id_tipesoal`),
  CONSTRAINT `tipesoal_matkul_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.tipesoal_matkul: ~0 rows (approximately)
DELETE FROM `tipesoal_matkul`;
/*!40000 ALTER TABLE `tipesoal_matkul` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipesoal_matkul` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.tipesoal_slug
DROP TABLE IF EXISTS `tipesoal_slug`;
CREATE TABLE IF NOT EXISTS `tipesoal_slug` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipesoal_id` int(11) NOT NULL,
  `slug` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipesoal_id` (`tipesoal_id`),
  CONSTRAINT `fk_tipesoal_slug` FOREIGN KEY (`tipesoal_id`) REFERENCES `tipesoal` (`id_tipesoal`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table ci_online_test.tipesoal_slug: ~4 rows (approximately)
DELETE FROM `tipesoal_slug`;
/*!40000 ALTER TABLE `tipesoal_slug` DISABLE KEYS */;
INSERT INTO `tipesoal_slug` (`id`, `tipesoal_id`, `slug`) VALUES
	(1, 1, 'soal/addpilihanganda'),
	(2, 18, 'soal/addkraepelin'),
	(3, 2, 'soal/addessay'),
	(4, 3, 'soal/addpapicostic');
/*!40000 ALTER TABLE `tipesoal_slug` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`),
  UNIQUE KEY `uc_email` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
	(1, '127.0.0.1', 'Administrator', '$2y$12$tGY.AtcyXrh7WmccdbT1rOuKEcTsKH6sIUmDr0ore1yN4LnKTTtuu', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1655385287, 1, 'Admin', 'Istrator', 'ADMIN', '0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table ci_online_test.users_groups
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table ci_online_test.users_groups: ~0 rows (approximately)
DELETE FROM `users_groups`;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(3, 1, 1);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;

-- Dumping structure for view ci_online_test.view_dosen_kelas_jurusan_matkul
DROP VIEW IF EXISTS `view_dosen_kelas_jurusan_matkul`;
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_dosen_kelas_jurusan_matkul` (
	`id_dosen` INT(11) NOT NULL,
	`nip` CHAR(12) NOT NULL COLLATE 'latin1_swedish_ci',
	`nama_dosen` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`email` VARCHAR(254) NOT NULL COLLATE 'latin1_swedish_ci',
	`matkul_id` INT(11) NOT NULL,
	`id` INT(11) NOT NULL,
	`kelas_id` INT(11) NOT NULL,
	`dosen_id` INT(11) NOT NULL,
	`id_kelas` INT(11) NOT NULL,
	`nama_kelas` VARCHAR(30) NOT NULL COLLATE 'utf8_general_ci',
	`jurusan_id` INT(11) NOT NULL,
	`id_matkul` INT(11) NOT NULL,
	`nama_matkul` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`tipesoal_id` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for trigger ci_online_test.edit_user_dosen
DROP TRIGGER IF EXISTS `edit_user_dosen`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `edit_user_dosen` BEFORE UPDATE ON `dosen` FOR EACH ROW UPDATE `users` SET `email` = NEW.email, `username` = NEW.nip WHERE `users`.`username` = OLD.nip//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger ci_online_test.hapus_user_dosen
DROP TRIGGER IF EXISTS `hapus_user_dosen`;
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `hapus_user_dosen` BEFORE DELETE ON `dosen` FOR EACH ROW DELETE FROM `users` WHERE `users`.`username` = OLD.nip//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view ci_online_test.view_dosen_kelas_jurusan_matkul
DROP VIEW IF EXISTS `view_dosen_kelas_jurusan_matkul`;
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_dosen_kelas_jurusan_matkul`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_dosen_kelas_jurusan_matkul` AS SELECT * FROM dosen d
JOIN kelas_dosen kd ON kd.dosen_id = d.id_dosen
JOIN kelas k ON k.id_kelas = kd.kelas_id
JOIN matkul m ON m.id_matkul = d.matkul_id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
