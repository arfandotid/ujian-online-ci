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

-- Dumping structure for table ci_online_test.matkul
CREATE TABLE IF NOT EXISTS `tipesoal` (
  `id_tipesoal` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipesoal` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipesoal`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=UTF8;

-- Dumping data for table ci_online_test.matkul: ~3 rows (approximately)
/*!40000 ALTER TABLE `matkul` DISABLE KEYS */;
INSERT INTO `tipesoal` (`id_tipesoal`, `nama_tipesoal`) VALUES(1, 'Pilihan Ganda');
INSERT INTO `tipesoal` (`id_tipesoal`, `nama_tipesoal`) VALUES(2, 'Essay');
INSERT INTO `tipesoal` (`id_tipesoal`, `nama_tipesoal`) VALUES(3, 'Papi Costic');
INSERT INTO `tipesoal` (`id_tipesoal`, `nama_tipesoal`) VALUES(4, 'Kraepelin');
/*!40000 ALTER TABLE `tipesoal` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
