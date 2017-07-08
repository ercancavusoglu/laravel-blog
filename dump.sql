-- --------------------------------------------------------
-- Sunucu:                       127.0.0.1
-- Sunucu sürümü:                10.1.24-MariaDB - mariadb.org binary distribution
-- Sunucu İşletim Sistemi:       Win32
-- HeidiSQL Sürüm:               9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- proje1 için veritabanı yapısı dökülüyor
CREATE DATABASE IF NOT EXISTS `proje1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `proje1`;

-- tablo yapısı dökülüyor proje1.blogs
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`),
  KEY `blogs_category_id_foreign` (`category_id`),
  CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- proje1.blogs: ~1 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT IGNORE INTO `blogs` (`id`, `name`, `slug`, `content`, `category_id`, `created_at`, `updated_at`) VALUES
	(1, 'ESA’s BepiColombo Mercury mission thrives on ambition and co-operations', 'esa-bepicolombo-mercury-mission-ambition-cooperations', 'I raised a sceptical eyebrow when Alvaro Gimenez, ESA director of science, said that BepiColombo mission to Mercury is the most complicated science mission ever performed by the agency.\r\n\r\nWhat could be more difficult than ESA’s Rosetta and Philae mission, I thought, which navigated around a comet and sent a lander to the icy surface. An hour later after listening to the science and especially the engineering talks, I was convinced.\r\n\r\nBepiColombo is a mission of extreme ambition, and huge technological challenges.\r\n\r\n“It’s like operating a spacecraft in a pizza oven,” says Ulrich Reininghaus, ESA Project Manager for the BepiColombo mission.\r\n\r\nThis is because Mercury is the closest planet to the sun. The solar radiation is 10 times as fierce as we experience at Earth and the spacecraft will encounter temperatures of hundreds of degrees. As if that wasn’t enough, the planet’s daytime side gets so hot that it gives off infrared radiation like a hot plate on a kitchen stove.\r\n\r\n\r\nESA unveils third mission to Mercury to investigate water ice and volcanoes\r\n Read more\r\nHow do you begin to design a spacecraft to operate in such an extreme environment? The answer is you co-operate internationally. This was a theme that came up in the presentations. \r\n\r\nMarkus Bauer, the spokesperson for ESA Science said that international co-operation was written into the DNA of ESA. Mathilda Royer of Airbus, who built the spacecraft for ESA, echoed this point and called BepiColombo “a European adventure”.', 1, '2017-07-08 14:21:05', '2017-07-08 14:22:54');
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;

-- tablo yapısı dökülüyor proje1.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- proje1.categories: ~6 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT IGNORE INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Science', 'science', '2017-07-08 12:18:01', '2017-07-08 12:18:01'),
	(2, 'Sports', 'sports', '2017-07-08 12:20:51', '2017-07-08 12:20:51'),
	(3, 'News', 'news', '2017-07-08 12:22:24', '2017-07-08 12:22:24'),
	(4, 'Art', 'art', '2017-07-08 12:26:50', '2017-07-08 12:26:50'),
	(5, 'Map', 'map', '2017-07-08 13:09:23', '2017-07-08 13:09:23'),
	(6, 'Test', 'test', '2017-07-08 13:16:21', '2017-07-08 13:16:21');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- tablo yapısı dökülüyor proje1.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- proje1.migrations: ~5 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_07_08_092714_create_categories_table', 1),
	(4, '2017_07_08_092815_create_blogs_table', 1),
	(5, '2017_07_08_113344_add_index_to_blogs_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- tablo yapısı dökülüyor proje1.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- proje1.password_resets: ~0 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- tablo yapısı dökülüyor proje1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- proje1.users: ~1 rows (yaklaşık) tablosu için veriler indiriliyor
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'ercan', 'ercancavusoglu@yandex.com.tr', '$2y$10$xLRM2YzT6hik7Q6Ms3mJc.cNU0UUR7IHYir63I2TWhwiliBhKe3GO', '7tyFOGQQGcJRkabOcn7PE4PADvZsuQiXjeo9bzxykUD418ZU93PBXDFPKB8B', '2017-07-08 11:52:38', '2017-07-08 11:52:38');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
