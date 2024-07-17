-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Volcando estructura para tabla imprime_mas.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla imprime_mas.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla imprime_mas.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla imprime_mas.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- Volcando estructura para tabla imprime_mas.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla imprime_mas.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla imprime_mas.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla imprime_mas.personal_access_tokens: ~2 rows (aproximadamente)
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(1, 'App\\Models\\User', 1, 'API TOKEN', '8489d044f2d016bac84bfb12e7367ee6beaf8c927fcce19a1270f94f3733eeb4', '["*"]', '2024-07-09 11:39:11', NULL, '2024-07-09 11:25:43', '2024-07-09 11:39:11'),
	(2, 'App\\Models\\User', 1, 'API TOKEN', '53c7f8da6705e92466702bb6b3492e3f85114c9689df176aab686cc2fb666d79', '["*"]', NULL, NULL, '2024-07-09 11:34:05', '2024-07-09 11:34:05'),
	(3, 'App\\Models\\User', 2, 'API TOKEN', '3b700b16a0ea3c662782e940db811d8677420c7aaf44664fc0ad041edc4b6335', '["*"]', NULL, NULL, '2024-07-17 08:43:34', '2024-07-17 08:43:34'),
	(4, 'App\\Models\\User', 2, 'API TOKEN', '6ae3bafa27174d0f448c7baee321f8c76f96fae63a56ae48e287795d200522e9', '["*"]', NULL, NULL, '2024-07-17 08:43:34', '2024-07-17 08:43:34'),
	(5, 'App\\Models\\User', 3, 'API TOKEN', '3d9db3883011b0d39630a3e1e213d202a6a443ba89b5fa6dc6328c632e1fcd39', '["*"]', NULL, NULL, '2024-07-17 08:46:06', '2024-07-17 08:46:06');

-- Volcando estructura para tabla imprime_mas.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla imprime_mas.roles: ~0 rows (aproximadamente)
INSERT INTO `roles` (`id`, `nombre_rol`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', '2024-07-17 02:22:58', '2024-07-17 02:23:00'),
	(2, 'Empleado', '2024-07-17 02:23:12', '2024-07-17 02:23:14');

-- Volcando estructura para tabla imprime_mas.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono_emergencia` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rol` bigint DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `FK_users_roles` (`id_rol`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla imprime_mas.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `nombre`, `nick_name`, `email`, `email_verified_at`, `password`, `telefono`, `telefono_emergencia`, `id_rol`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Pablo Diaz', '', 'pablodiaz@gmail.com', NULL, '$2y$10$ynvxRszgH05nGOlFZoI18OIVQXZzzPU8BWm7Hu5CVMHUf0O.b7k8a', '', '', NULL, NULL, NULL, '2024-07-09 11:25:43', '2024-07-09 11:25:43'),
	(3, 'MATILDE 2', 'APODO 2', 'matildediaz@gmail.com', NULL, '$2y$10$U3cPerYVwuT1VRWyFxuqPO.IhRwKQs6GU4QgcAcbLDrWS3Pcl5gmu', '7561065312', '7561277913', 1, '5|KuKvCnjmAdGDwmMKiqAkIH3Lli4cIJkCA20dkbMe7d7d5dcb', NULL, '2024-07-17 08:46:06', '2024-07-17 09:02:49');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
