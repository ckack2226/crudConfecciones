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


-- Volcando estructura de base de datos para confecciones
CREATE DATABASE IF NOT EXISTS `confecciones` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `confecciones`;

-- Volcando estructura para tabla confecciones.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla confecciones.clientes: ~3 rows (aproximadamente)
INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `telefono`, `direccion`, `created_at`, `updated_at`, `status`) VALUES
	(1, 'juan', 'montes', '3134568971', 'calle 131', '2023-09-12 07:51:29', '2023-09-25 03:11:13', 1),
	(2, 'pepito', 'perez', '3134568971', 'carrera caracas', '2023-09-13 04:45:30', '2023-09-20 18:52:23', 2),
	(3, 'paquito', 'ortega', '5', '5', '2023-09-13 04:49:31', '2023-09-13 04:54:03', 2),
	(4, 'sofia', 'correa', '1', 'calle 1', '2023-09-13 04:51:26', '2023-09-13 04:54:14', 2),
	(5, 'camilo', 'montes', 'hkhl', 'transversal 24 i # 16-71 sur', '2023-09-13 19:23:40', '2023-09-13 19:23:57', 2);

-- Volcando estructura para tabla confecciones.failed_jobs
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

-- Volcando datos para la tabla confecciones.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla confecciones.inventarios
CREATE TABLE IF NOT EXISTS `inventarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre_del_producto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad_en_stock` int NOT NULL,
  `product_image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla confecciones.inventarios: ~0 rows (aproximadamente)
INSERT INTO `inventarios` (`id`, `nombre_del_producto`, `descripcion`, `precio`, `cantidad_en_stock`, `product_image`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'f1', 'f1', 250000.00, 1, 'images/ferrari.jpg', 1, '2023-09-27 16:54:35', '2023-09-27 16:54:35'),
	(2, 'chaqueta', 'akdja', 300000.00, 2, 'images/6.jpg', 1, '2023-09-27 18:58:43', '2023-09-27 18:58:43');

-- Volcando estructura para tabla confecciones.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla confecciones.migrations: ~0 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_09_08_210846_create_clientes_table', 1),
	(6, '2023_09_08_210859_create_inventarios_table', 1),
	(7, '2023_09_08_221828_create_pedidos_table', 1);

-- Volcando estructura para tabla confecciones.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla confecciones.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla confecciones.pedidos
CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cliente_id` bigint unsigned NOT NULL,
  `fecha_del_pedido` datetime NOT NULL,
  `fecha_del_entrega` datetime NOT NULL,
  `descripcion_del_pedido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_del_pedido` int NOT NULL,
  `descripcion_de_abono` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Abonado` decimal(10,2) NOT NULL,
  `total_del_pedido` decimal(10,2) NOT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pedidos_cliente_id_foreign` (`cliente_id`),
  CONSTRAINT `pedidos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla confecciones.pedidos: ~3 rows (aproximadamente)
INSERT INTO `pedidos` (`id`, `cliente_id`, `fecha_del_pedido`, `fecha_del_entrega`, `descripcion_del_pedido`, `cantidad_del_pedido`, `descripcion_de_abono`, `Abonado`, `total_del_pedido`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, '2023-09-20 00:00:00', '2023-09-27 00:00:00', 'chaqueta', 1, 'n.n', 0.00, 150000.00, 1, '2023-09-20 18:20:19', '2023-09-20 18:20:19'),
	(2, 2, '2023-09-27 00:00:00', '2023-10-03 00:00:00', 'prueba de update', 2, 'n.n', 0.00, 70000.00, 1, '2023-09-25 04:36:25', '2023-09-25 04:36:25'),
	(3, 2, '2023-09-27 00:00:00', '2023-10-03 00:00:00', 'prueba de update', 2, 'n.n', 0.00, 70000.00, 1, '2023-09-25 04:36:56', '2023-09-25 04:36:56');

-- Volcando estructura para tabla confecciones.personal_access_tokens
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla confecciones.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla confecciones.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla confecciones.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'camilo', 'yo@gmail.com', NULL, '$2y$10$m9lyFnTRINn.wGbDBo/qjOqspd7ZpYHx9iupchGjMetm4dPqJHcvO', NULL, '2023-09-16 06:55:46', '2023-09-16 06:55:46'),
	(2, 'andres', 'you@gmail.com', NULL, '$2y$10$q.63WGxO2ebXJ7h9ulQ16.wzZhaqnMLF2ayhS4y9ajs2fz4WyZnHq', NULL, '2023-09-16 07:08:24', '2023-09-16 07:08:24'),
	(3, 'andres', 'andres@gmail.com', NULL, '$2y$10$xT46DnzWRPwJmwG3yAGum.28tCN.qypXodkNzUl5EPDyY5vRY827q', NULL, '2023-09-20 05:10:50', '2023-09-20 05:10:50');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
