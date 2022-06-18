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

-- Dumping data for table ci_online_test.tipesoal_slug: ~0 rows (approximately)
DELETE FROM `tipesoal_slug`;
/*!40000 ALTER TABLE `tipesoal_slug` DISABLE KEYS */;
INSERT INTO `tipesoal_slug` (`id`, `tipesoal_id`, `slug`) VALUES
	(1, 1, 'soal/addpilihanganda'),
	(2, 18, 'soal/addkraepelin'),
	(3, 2, 'soal/addessay'),
	(4, 3, 'soal/addpapicostic');
/*!40000 ALTER TABLE `tipesoal_slug` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
