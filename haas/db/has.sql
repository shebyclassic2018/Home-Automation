-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for has
CREATE DATABASE IF NOT EXISTS `has` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `has`;

-- Dumping structure for table has.address
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `address_user_id_foreign` (`user_id`),
  CONSTRAINT `address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.address: ~0 rows (approximately)
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
REPLACE INTO `address` (`id`, `country`, `region`, `province`, `street`, `user_id`) VALUES
	(1, 'Tanzania', 'Morogro', 'Mvomero', 'Turian', 1);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;

-- Dumping structure for table has.appliance
CREATE TABLE IF NOT EXISTS `appliance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `app_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `switch_no` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `access` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `appliance_user_id_foreign` (`user_id`),
  CONSTRAINT `appliance_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.appliance: ~3 rows (approximately)
/*!40000 ALTER TABLE `appliance` DISABLE KEYS */;
REPLACE INTO `appliance` (`id`, `app_name`, `switch_no`, `pin`, `state`, `access`, `user_id`) VALUES
	(11, 'Sockets', 2, 4, 1, 1, 1),
	(12, 'Switch 1', 7, 15, 1, 1, 1),
	(13, 'Switch 2', 5, 13, 0, 1, 1);
/*!40000 ALTER TABLE `appliance` ENABLE KEYS */;

-- Dumping structure for table has.connection
CREATE TABLE IF NOT EXISTS `connection` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.connection: ~0 rows (approximately)
/*!40000 ALTER TABLE `connection` DISABLE KEYS */;
/*!40000 ALTER TABLE `connection` ENABLE KEYS */;

-- Dumping structure for table has.email
CREATE TABLE IF NOT EXISTS `email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email_address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email_user_id_foreign` (`user_id`),
  CONSTRAINT `email_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.email: ~0 rows (approximately)
/*!40000 ALTER TABLE `email` DISABLE KEYS */;
REPLACE INTO `email` (`id`, `email_address`, `user_id`) VALUES
	(1, 'shrajabu18@mustudent.ac.tz', 1);
/*!40000 ALTER TABLE `email` ENABLE KEYS */;

-- Dumping structure for table has.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.migrations: ~14 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2021_03_14_143814_user', 1),
	(2, '2021_03_14_145123_schedule', 1),
	(3, '2021_03_14_145722_appliance', 1),
	(4, '2021_03_14_145743_phone', 1),
	(5, '2021_03_14_145756_email', 1),
	(6, '2021_03_14_145812_wifi', 1),
	(7, '2021_03_14_145843_time_ellapsed', 1),
	(8, '2021_03_14_145903_temperature', 1),
	(9, '2021_03_14_145926_connection', 1),
	(10, '2021_03_14_145942_plan', 1),
	(11, '2021_03_14_145954_sensor', 1),
	(12, '2021_03_14_150328_address', 1),
	(13, '2021_03_14_150424_plan_connection', 1),
	(14, '2021_03_14_150437_plan_sensor', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table has.phone
CREATE TABLE IF NOT EXISTS `phone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `phone_user_id_foreign` (`user_id`),
  CONSTRAINT `phone_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.phone: ~0 rows (approximately)
/*!40000 ALTER TABLE `phone` DISABLE KEYS */;
REPLACE INTO `phone` (`id`, `phone_number`, `user_id`) VALUES
	(1, '+255745681617', 1);
/*!40000 ALTER TABLE `phone` ENABLE KEYS */;

-- Dumping structure for table has.plan
CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.plan: ~0 rows (approximately)
/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;

-- Dumping structure for table has.plan_connection
CREATE TABLE IF NOT EXISTS `plan_connection` (
  `plan_id` int(10) unsigned NOT NULL,
  `connection_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`plan_id`,`connection_id`),
  KEY `plan_connection_connection_id_foreign` (`connection_id`),
  CONSTRAINT `plan_connection_connection_id_foreign` FOREIGN KEY (`connection_id`) REFERENCES `connection` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `plan_connection_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.plan_connection: ~0 rows (approximately)
/*!40000 ALTER TABLE `plan_connection` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_connection` ENABLE KEYS */;

-- Dumping structure for table has.plan_sensor
CREATE TABLE IF NOT EXISTS `plan_sensor` (
  `plan_id` int(10) unsigned NOT NULL,
  `sensor_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`plan_id`,`sensor_id`),
  KEY `plan_sensor_sensor_id_foreign` (`sensor_id`),
  CONSTRAINT `plan_sensor_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `plan_sensor_sensor_id_foreign` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.plan_sensor: ~0 rows (approximately)
/*!40000 ALTER TABLE `plan_sensor` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_sensor` ENABLE KEYS */;

-- Dumping structure for table has.schedule
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shr` int(11) NOT NULL DEFAULT '0',
  `smin` int(11) NOT NULL DEFAULT '0',
  `ehr` int(11) NOT NULL DEFAULT '0',
  `emin` int(11) NOT NULL DEFAULT '0',
  `period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sync` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `app_id` (`app_id`),
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `appliance` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table has.schedule: ~3 rows (approximately)
/*!40000 ALTER TABLE `schedule` DISABLE KEYS */;
REPLACE INTO `schedule` (`id`, `shr`, `smin`, `ehr`, `emin`, `period`, `sync`, `app_id`) VALUES
	(9, 0, 0, 0, 0, 'All days', '0', 11),
	(10, 0, 0, 0, 0, 'All days', '0', 12),
	(11, 0, 0, 0, 0, 'All days', '0', 13);
/*!40000 ALTER TABLE `schedule` ENABLE KEYS */;

-- Dumping structure for table has.sensor
CREATE TABLE IF NOT EXISTS `sensor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.sensor: ~0 rows (approximately)
/*!40000 ALTER TABLE `sensor` DISABLE KEYS */;
/*!40000 ALTER TABLE `sensor` ENABLE KEYS */;

-- Dumping structure for table has.switches
CREATE TABLE IF NOT EXISTS `switches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sw` int(11) NOT NULL DEFAULT '0',
  `pin` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table has.switches: ~8 rows (approximately)
/*!40000 ALTER TABLE `switches` DISABLE KEYS */;
REPLACE INTO `switches` (`id`, `sw`, `pin`) VALUES
	(1, 1, 2),
	(2, 2, 4),
	(3, 3, 5),
	(4, 4, 12),
	(5, 5, 13),
	(6, 6, 14),
	(7, 7, 15),
	(8, 8, 16);
/*!40000 ALTER TABLE `switches` ENABLE KEYS */;

-- Dumping structure for table has.temperature
CREATE TABLE IF NOT EXISTS `temperature` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `room_temperature` float NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `temperature_user_id_foreign` (`user_id`),
  CONSTRAINT `temperature_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.temperature: ~0 rows (approximately)
/*!40000 ALTER TABLE `temperature` DISABLE KEYS */;
REPLACE INTO `temperature` (`id`, `room_temperature`, `user_id`) VALUES
	(1, 13.82, 1);
/*!40000 ALTER TABLE `temperature` ENABLE KEYS */;

-- Dumping structure for table has.time_ellapsed
CREATE TABLE IF NOT EXISTS `time_ellapsed` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `time_ellapsed_user_id_foreign` (`user_id`),
  CONSTRAINT `time_ellapsed_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.time_ellapsed: ~0 rows (approximately)
/*!40000 ALTER TABLE `time_ellapsed` DISABLE KEYS */;
/*!40000 ALTER TABLE `time_ellapsed` ENABLE KEYS */;

-- Dumping structure for table has.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.user: ~0 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id`, `name`, `password`, `role`) VALUES
	(1, 'SHABANI RAJABU', '12345', 'customer');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table has.wifi
CREATE TABLE IF NOT EXISTS `wifi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ssid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wifi_user_id_foreign` (`user_id`),
  CONSTRAINT `wifi_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table has.wifi: ~0 rows (approximately)
/*!40000 ALTER TABLE `wifi` DISABLE KEYS */;
REPLACE INTO `wifi` (`id`, `ssid`, `password`, `user_id`) VALUES
	(1, 'Classic Media', 'uvos7855', 1);
/*!40000 ALTER TABLE `wifi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
