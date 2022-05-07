-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2022 at 12:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(5, 'Sony', 'images/brand/1724126806211152.png', '2022-02-07 11:37:33', NULL),
(6, 'Rado', 'images/brand/1724126821229255.png', '2022-02-07 11:37:47', NULL),
(7, 'Lenovo', 'images/brand/1724126839996497.png', '2022-02-07 11:38:05', NULL),
(8, 'Assus', 'images/brand/1724128919937380.png', '2022-02-07 12:11:09', NULL),
(9, 'Cannon', 'images/brand/1724128935139454.png', '2022-02-07 12:11:23', NULL),
(10, 'Dell', 'images/brand/1724128948896934.png', '2022-02-07 12:11:36', NULL),
(11, 'Gucci', 'images/brand/1724128966227887.png', '2022-02-07 12:11:53', NULL),
(12, 'Levis', 'images/brand/1724128980912349.png', '2022-02-07 12:12:07', NULL),
(13, 'Nike', 'images/brand/1724128997151335.png', '2022-02-07 12:12:22', NULL),
(14, 'Adidas', 'images/brand/1724129032529336.png', '2022-02-07 12:12:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(17, 'Mens Fashion', '2022-02-07 11:31:18', NULL),
(18, 'Womens Fashion', '2022-02-07 11:31:40', NULL),
(19, 'Childs', '2022-02-07 11:31:49', NULL),
(20, 'Watch', '2022-02-07 11:31:55', NULL),
(21, 'Furniture', '2022-02-07 11:32:03', NULL),
(22, 'Electronics', '2022-02-07 11:32:10', NULL),
(23, 'Health', '2022-02-07 11:32:17', NULL),
(24, 'Beauty', '2022-02-07 11:32:23', NULL),
(25, 'Sports & Outdoor', '2022-02-07 11:32:35', NULL),
(28, 'Home & Living', '2022-02-19 05:11:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `customers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'customer1', 'customer1@gmail.com', '2022-04-03 08:09:12', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WiBqGHjk78', NULL, NULL, '2022-04-03 08:09:12', '2022-04-03 08:09:12');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2022_01_15_093659_create_sessions_table', 1),
(10, '2022_01_17_171028_create_categories_table', 2),
(11, '2022_01_17_171609_create_sub_categories_table', 2),
(12, '2022_01_17_171751_create_brands_table', 2),
(13, '2022_02_03_123414_create_coupons_table', 3),
(26, '2022_02_03_171141_create_subscribers_table', 4),
(27, '2022_02_04_160841_create_products_table', 4),
(28, '2022_04_03_134707_create_customers_table', 5),
(29, '2022_04_27_161302_create_wishlists_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_slider` int(11) DEFAULT NULL,
  `hot_deal` int(11) DEFAULT NULL,
  `best_rated` int(11) DEFAULT NULL,
  `mid_slider` int(11) DEFAULT NULL,
  `hot_new` int(11) DEFAULT NULL,
  `trend` int(11) DEFAULT NULL,
  `image_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_three` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `brand_id`, `product_name`, `product_code`, `product_quantity`, `product_details`, `product_color`, `product_size`, `selling_price`, `discount_price`, `video_link`, `main_slider`, `hot_deal`, `best_rated`, `mid_slider`, `hot_new`, `trend`, `image_one`, `image_two`, `image_three`, `status`, `created_at`, `updated_at`) VALUES
(1, 18, 12, 12, 'Abcd', '123', '35', 'abcdefghijklmnopqrstuvwxyz', 'black', 'XL', '399', '100', 'http://localhost/phpmyadmin/index.php?route=/sql&server=1&db=e_commerce&table=sub_categories&pos=0', 1, 1, 1, 1, 1, 1, 'images/product/1726027392677066.png', 'images/product/1726027392684446.jpeg', 'images/product/1726027392689718.jpeg', 1, NULL, '2022-04-28 15:00:34'),
(2, 18, 11, 11, 'ABCD2', '12345', '15', '<div style=\"color: #f6f6f4;background-color: #282a36;font-family: \'Fira Code\', \'Droid Sans Mono\', \'monospace\', monospace;font-weight: normal;font-size: 14px;line-height: 19px;white-space: pre;\"><div><span style=\"color: #f6f6f4;\">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae reiciendis autem neque nesciunt incidunt, suscipit, quisquam ullam quos obcaecati, tempore accusantium eaque molestiae. Nemo laboriosam harum, accusamus assumenda, asperiores aliquid consectetur necessitatibus, quidem maxime cumque odio. Ratione earum officia voluptates quod nisi reprehenderit soluta repellat suscipit ex quo accusantium pariatur, esse assumenda sequi? Optio saepe officia, repudiandae placeat deserunt quisquam ratione autem? Quam veniam nostrum, explicabo quae illum corporis blanditiis quaerat inventore repudiandae odio maxime? Quas dolore sit excepturi laudantium asperiores! Nesciunt id dolorum alias ipsam totam beatae illum, esse omnis animi sapiente aspernatur nostrum rem est consectetur corrupti repudiandae.</span></div></div>', 'Yellow', 'XL,L,M,S', '399', '299', 'http://localhost/phpmyadmin/index.php?route=/sql&db=e_commerce&table=users&pos=0', 1, 1, 1, 1, 1, 1, 'images/product/1730278770379436.jpeg', 'images/product/1730278770379667.jpeg', 'images/product/1730278770379734.jpeg', 1, '2022-04-16 09:20:23', '2022-04-16 09:29:44');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4Zb0hkOgCzznB8OlGReJu1SunKemuIBzJIfjM3QX', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:99.0) Gecko/20100101 Firefox/99.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTUhmaElEU1hWTEtxWW9na0VidXo1bkhRdTI4dUVJc3BLQkgyRlBnZSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXIvd2lzaGxpc3QiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3VzZXIvd2lzaGxpc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1651176176),
('e2BdmBFgh5VPXUA73MjmzgTWl6OqJ692yah4atWR', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:99.0) Gecko/20100101 Firefox/99.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibjB2RG1sMFBnbXRadDN4MnlIZmxpbFBPaFVNa3BPTFJyeXdlN1VKbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1651175889),
('EQScGgxNVlWOYf6nztyKlpuHP5OBqEkT9ufd9l5e', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:99.0) Gecko/20100101 Firefox/99.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiUUFpdXJxQjcxaGxrUnFnd2F0alQ1WWdkMUlrVDRRZVJ2eXRXdmtxdiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM0OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcHJvZHVjdHMvYWxsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFR5a2RWL09OVXRBczZLaFpSMVFPZy5SenFHeWhCRFBPOTFJMDdzMzZQL2lsU3R1UjZIdXdtIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRUeWtkVi9PTlV0QXM2S2haUjFRT2cuUnpxR3loQkRQTzkxSTA3czM2UC9pbFN0dVI2SHV3bSI7fQ==', 1651179634),
('OJ6S0wVefnlewXy8zQfZzVXifRuHRgoCzqO7v5Yy', NULL, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:99.0) Gecko/20100101 Firefox/99.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieWtuYzdIcTIzUlBuY1RVZzNad1p4WUJYQWdYQmJwMnN2U2gyczRiWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1651176176),
('WMXggPeciTf5Osy1Lc4VTMpfSIv9J8pcz4FJQe1H', 5, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:99.0) Gecko/20100101 Firefox/99.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTFNjRXdKT3hXM0JTNWVhTERadmlNWU1lbk5jMlJpSWtGSFYwNVdWViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkcUFTaTF3dHZuYTVTT0VWd3ZlWEw4ZUlrU2I2VEhZWXJ5T2luYlRKS0o2QzBuSHBhWTFxUXkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHFBU2kxd3R2bmE1U09FVnd2ZVhMOGVJa1NiNlRIWVlyeU9pbmJUSktKNkMwbkhwYVkxcVF5Ijt9', 1651180165),
('xSIvn6ABOtVKc5Eo4SCHnMyfvRPs0Z4lv3kc7p5C', 5, '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:99.0) Gecko/20100101 Firefox/99.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoibFJVMk9DaFg0aXZ3cDBjRERXRzdYUkcwYzgxQ2N0eEJuelhMYnlxcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkcUFTaTF3dHZuYTVTT0VWd3ZlWEw4ZUlrU2I2VEhZWXJ5T2luYlRKS0o2QzBuSHBhWTFxUXkiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJHFBU2kxd3R2bmE1U09FVnd2ZVhMOGVJa1NiNlRIWVlyeU9pbmJUSktKNkMwbkhwYVkxcVF5Ijt9', 1651262367);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(11, 18, 'Womens Tshirt', '2022-02-07 11:33:44', NULL),
(12, 18, 'Womens Shirt', '2022-02-07 11:33:59', NULL),
(13, 18, 'Womens Pant', '2022-02-07 11:34:09', NULL),
(14, 19, 'Child Dress & Footware', '2022-02-07 11:34:23', NULL),
(15, 19, 'Child Body Care', '2022-02-07 11:34:32', NULL),
(16, 19, 'Child Diaper', '2022-02-07 11:34:43', NULL),
(17, 20, 'Gents Watch', '2022-02-07 11:34:56', NULL),
(18, 20, 'Womans Watch', '2022-02-07 11:35:04', NULL),
(19, 20, 'Kids Watch', '2022-02-07 11:35:15', NULL),
(20, 24, 'Body Spray', '2022-02-07 11:35:42', NULL),
(21, 24, 'Finger Ring', '2022-02-07 11:35:53', NULL),
(22, 24, 'Jewelry', '2022-02-07 11:36:04', NULL),
(23, 26, 'Appliances', '2022-02-07 11:36:20', NULL),
(24, 26, 'Room Decoration', '2022-02-07 11:36:32', NULL),
(25, 26, 'Light and Lamp', '2022-02-07 11:36:43', NULL),
(26, 26, 'Security', '2022-02-07 11:36:53', NULL),
(28, 17, 'Gents Tshirt', '2022-02-07 13:44:25', NULL),
(29, 17, 'Gents Shirt', '2022-02-07 13:44:46', NULL),
(30, 17, 'Gents Pant', '2022-02-07 13:44:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin\'s Team', 1, '2022-01-15 03:57:01', '2022-01-15 03:57:01'),
(2, 2, 'admin1\'s Team', 1, '2022-01-15 11:42:16', '2022-01-15 11:42:16'),
(3, 3, 'emon\'s Team', 1, '2022-02-26 11:08:07', '2022-02-26 11:08:07'),
(4, 4, 'admin1\'s Team', 1, '2022-02-28 11:20:45', '2022-02-28 11:20:45'),
(5, 5, 'Customer\'s Team', 1, '2022-02-28 11:26:04', '2022-02-28 11:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE IF NOT EXISTS `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE IF NOT EXISTS `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_role`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Md khairul Islam Emon', 'admin@gmail.com', NULL, '$2y$10$TykdV/ONUtAs6KhZR1QOg.RzqGyhBDPO91I07s36P/ilStuR6Huwm', 1, NULL, NULL, NULL, 1, 'profile-photos/c2wOMg6fUl5ymOAjz15ABvUUckwZPIglslkmtzbK.jpg', '2022-01-15 03:57:01', '2022-04-16 09:02:34'),
(5, 'Customer', 'customer@gmail.com', NULL, '$2y$10$qASi1wtvna5SOEVwveXL8eIkSb6THYYryOinbTJKJ6C0nHpaY1qQy', 0, NULL, NULL, NULL, 5, NULL, '2022-02-28 11:26:04', '2022-04-16 10:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(30, 5, 2, '2022-04-29 13:57:08', '2022-04-29 13:57:08');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
