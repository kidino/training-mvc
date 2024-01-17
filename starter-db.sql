-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table my-project.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table my-project.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
	(1, 'admin', 'aaa', 'admin@test.test', '', '2024-01-16 02:01:46'),
	(2, 'johndoe', 'not set', 'johndoe@my-app.test', '', '2024-01-16 02:02:00'),
	(3, 'siti', '$2y$10$7MaOkEMWWlFKMe462W9yyeppkqeEVo8zi6Mm.A6yFPFc8xWsh6vUW', 'siti@test.test', 'admin', '2024-01-16 04:02:08'),
	(4, 'aliatan', '$2y$10$jcSw/LPyGgqnGQGYUYyGw.wX2KxOJ3sTqW1ZZHJiiKZuO1JAPVuVC', 'aliatan@test.test', NULL, '2024-01-16 06:24:10'),
	(5, 'adana', '$2y$10$SGMudXy4atAHSRpz7uosZuKFSKF5kMx61IRhtlJtyF4SNbPsqGv72', 'adana@test.test', NULL, '2024-01-16 14:22:52'),
	(6, 'dinda', '$2y$10$cZpEXed0yQnqVzjPVkQMDuT2Nd7ooLotL7AI8zx3d4zQxHuUzDHCO', 'dinda@test.test', NULL, '2024-01-16 14:23:45');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
