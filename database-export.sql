-- Database: explorando_argentina
-- ============================================

-- ============================================
-- Table: migrations
-- ============================================
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('0001_01_01_000000_create_users_table', 1),
('0001_01_01_000001_create_cache_table', 1),
('0001_01_01_000002_create_jobs_table', 1),
('2025_06_06_135900_create_categories_table', 1),
('2025_06_08_114224_create_posts_table', 1),
('2026_01_14_020329_update_posts_table_for_image_storage', 1);

-- ============================================
-- Table: users
-- ============================================
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: password_reset_tokens
-- ============================================
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: sessions
-- ============================================
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NULL DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: cache
-- ============================================
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: cache_locks
-- ============================================
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: jobs
-- ============================================
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned NULL DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: job_batches
-- ============================================
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci NULL,
  `cancelled_at` int NULL DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: failed_jobs
-- ============================================
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Table: categories
-- ============================================
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`name`, `description`, `created_at`, `updated_at`) VALUES
('Patagonia', 'Región del sur argentino con montañas, lagos y glaciares.', NOW(), NOW()),
('Cuyo', 'Tierra del vino y la cordillera en el oeste argentino.', NOW(), NOW()),
('Litoral', 'Ríos, selvas y cataratas en el noreste del país.', NOW(), NOW()),
('Pampeana', 'Llanuras fértiles, estancias y tradición gaucha.', NOW(), NOW()),
('Noroeste', 'Paisajes áridos, salares, quebradas y cultura andina.', NOW(), NOW()),
('Noreste', 'Clima cálido, ríos y gran diversidad natural.', NOW(), NOW());

-- ============================================
-- Table: posts
-- ============================================
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NULL,
  `image_main` varchar(255) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `category_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_category_id_foreign` (`category_id`),
  CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- Sample Posts Data
-- ============================================

INSERT INTO `posts` (`title`, `excerpt`, `content`, `image_main`, `image_2`, `image_3`, `slug`, `published`, `category_id`, `created_at`, `updated_at`) VALUES

-- Patagonia
('Glaciar Perito Moreno', 'Un impresionante glaciar ubicado en el Parque Nacional Los Glaciares.', 'Este coloso de hielo en movimiento es uno de los más accesibles del mundo. Sus desprendimientos son un espectáculo natural único en el corazón de la Patagonia.', 'images/patagonia11.jpg', 'images/patagonia12.jpg', 'images/patagonia13.jpg', 'glaciar-perito-moreno', 1, 1, NOW(), NOW()),
('Parque Nacional Torres del Paine', 'Parque natural en Chile famoso por sus montañas y lagos.', 'Torres del Paine sorprende con imponentes macizos, lagos turquesa y senderos entre glaciares. Es un paraíso para amantes del trekking y la fotografía, ubicado en plena estepa patagónica.', 'images/patagonia21.jpg', 'images/patagonia22.jpg', 'images/patagonia23.jpg', 'torres-del-paine', 1, 1, NOW(), NOW()),
('Ushuaia - Fin del Mundo', 'La ciudad más austral del mundo, puerta de entrada a la Antártida.', 'Rodeada por montañas y el Canal Beagle, Ushuaia combina naturaleza, historia y aventura. Desde navegar entre pingüinos hasta llegar en tren al "Fin del Mundo", es un destino inolvidable.', 'images/patagonia31.jpg', 'images/patagonia32.jpg', 'images/patagonia33.jpg', 'ushuaia-fin-del-mundo', 1, 1, NOW(), NOW()),

-- Litoral
('Cataratas del Iguazú', 'Una de las maravillas naturales más impresionantes del mundo.', 'Con más de 250 saltos de agua, las Cataratas del Iguazú son un espectáculo natural rodeado de selva subtropical. El paseo Garganta del Diablo ofrece vistas imponentes e inolvidables.', 'images/litoral11.jpg', 'images/litoral12.jpg', 'images/litoral13.jpg', 'cataratas-del-iguazu', 1, 3, NOW(), NOW()),
('Parque Nacional El Palmar', 'Parque conocido por sus palmeras yatay y fauna diversa.', 'Este parque resguarda extensos palmares yatay, fauna autóctona y senderos ideales para caminatas. Un rincón único del litoral entrerriano con valor ecológico y paisajístico.', 'images/litoral21.jpg', 'images/litoral22.jpg', 'images/litoral23.jpg', 'parque-nacional-el-palmar', 1, 3, NOW(), NOW()),

-- Cuyo
('Parque Provincial Aconcagua', 'Hogar del cerro más alto de América: el Aconcagua.', 'Con sus 6.962 metros, el Aconcagua domina la cordillera y atrae a montañistas de todo el mundo. El parque ofrece senderos de altura y paisajes imponentes de la precordillera mendocina.', 'images/cuyo11.jpg', 'images/cuyo12.jpg', 'images/cuyo13.jpg', 'aconcagua', 1, 2, NOW(), NOW());

-- ============================================
-- FIN DEL SCRIPT
-- ============================================
