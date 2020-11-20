-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2020 at 06:52 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock`
--

-- --------------------------------------------------------

--
-- Table structure for table `collecting_deals`
--

CREATE TABLE `collecting_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trader_id` bigint(20) UNSIGNED NOT NULL,
  `boxes_indebtedness_before` int(10) UNSIGNED NOT NULL,
  `boxes_count` int(10) UNSIGNED NOT NULL,
  `boxes_indebtedness_after` int(10) UNSIGNED NOT NULL,
  `money_indebtedness_before` double(8,2) UNSIGNED NOT NULL,
  `paid` double(8,2) UNSIGNED NOT NULL,
  `money_indebtedness_after` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collecting_deals`
--

INSERT INTO `collecting_deals` (`id`, `trader_id`, `boxes_indebtedness_before`, `boxes_count`, `boxes_indebtedness_after`, `money_indebtedness_before`, `paid`, `money_indebtedness_after`, `created_at`, `updated_at`) VALUES
(1, 1, 515, 15, 500, 1000.56, 500.00, 500.56, '2020-08-08 13:50:16', '2020-08-23 15:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(32, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(33, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(34, '2016_06_01_000004_create_oauth_clients_table', 1),
(35, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(36, '2019_08_19_000000_create_failed_jobs_table', 1),
(37, '2020_07_22_154030_create_regions_table', 1),
(38, '2020_07_22_154046_create_subregions_table', 1),
(39, '2020_07_22_154103_create_traders_table', 1),
(40, '2020_07_22_154121_create_selling_deals_table', 1),
(41, '2020_07_22_154134_create_purchasing_deals_table', 1),
(42, '2020_08_23_104106_create_collecting_deals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('138c34331980476b888b329a94a61fb53f08e2848e9be16b619a5bbf75b152479be909512c576dcf', 1, 1, 'authToken', '[]', 0, '2020-08-10 05:33:29', '2020-08-10 05:33:29', '2021-08-10 09:33:29'),
('1f39b48ab53b31bebeb68649e16b20ecf06a95dd850c31dbcaabf122058101e8204e4ece40149df1', 1, 1, 'authToken', '[]', 0, '2020-07-23 10:23:42', '2020-07-23 10:23:42', '2021-07-23 14:23:42'),
('520e49bb485872addc06187256fed146044a67372a90e4ad945e98c47fa76b4e8b072d4fbaad00ca', 1, 1, 'authToken', '[]', 0, '2020-07-22 14:21:11', '2020-07-22 14:21:11', '2021-07-22 18:21:11'),
('6671a186e7cf261dad29ca2d7eaabcc75e30568fe868e8a1e6790677aee8fedbf39169a5e2be87c5', 1, 3, 'authToken', '[]', 0, '2020-08-23 14:49:49', '2020-08-23 14:49:49', '2021-08-23 16:49:49'),
('a2a5ddf3c9ce5f02fa40c12aa500409d9437e9e9b8d5ae9d4babf9baddde4c7a92f82cce40209d46', 1, 1, 'authToken', '[]', 0, '2020-07-22 14:21:28', '2020-07-22 14:21:28', '2021-07-22 18:21:28'),
('ff98c2fc0c7055a36c1561bce5fee2375a0baa5ac47ef1ab55bf47573d12ca34c1542c8769f6146f', 1, 1, 'authToken', '[]', 0, '2020-07-22 14:13:02', '2020-07-22 14:13:02', '2021-07-22 18:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'uSJNeZgpQxC1Pgh0HNtgmmXYWP1HgAcPt64vhgAe', NULL, 'http://localhost', 1, 0, 0, '2020-07-22 14:12:48', '2020-07-22 14:12:48'),
(2, NULL, 'Laravel Password Grant Client', 'YbPrtWaEAONuDg6wx6hN2bzfWTkachx16Gos0HgL', 'users', 'http://localhost', 0, 1, 0, '2020-07-22 14:12:48', '2020-07-22 14:12:48'),
(3, NULL, 'Laravel Personal Access Client', 'UFJfxnXTaIGxjM5r0EAHvH2R3OsaEhgzn3KMvxQ7', NULL, 'http://localhost', 1, 0, 0, '2020-08-23 13:49:37', '2020-08-23 13:49:37'),
(4, NULL, 'Laravel Password Grant Client', 'Pb4Fzd34LCdHlVOk3x49fHlSBcZw7p5vFclkGB91', 'users', 'http://localhost', 0, 1, 0, '2020-08-23 13:49:37', '2020-08-23 13:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-22 14:12:48', '2020-07-22 14:12:48'),
(2, 3, '2020-08-23 13:49:37', '2020-08-23 13:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_deals`
--

CREATE TABLE `purchasing_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_boxes` int(10) UNSIGNED NOT NULL,
  `remaining_boxes` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchasing_deals`
--

INSERT INTO `purchasing_deals` (`id`, `seller_name`, `total_boxes`, `remaining_boxes`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 30, 30, '2020-07-23 11:38:52', '2020-07-23 11:38:52'),
(2, 'eslam', 40, 40, '2020-07-23 11:40:14', '2020-07-23 11:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'akalem', 'أقاليم', '2020-07-23 10:26:33', '2020-07-23 10:26:33'),
(2, 'bander', 'البندر', '2020-07-23 10:36:07', '2020-07-23 10:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `selling_deals`
--

CREATE TABLE `selling_deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trader_id` bigint(20) UNSIGNED NOT NULL,
  `boxes_count` int(10) UNSIGNED NOT NULL,
  `boxe_price` double(8,2) UNSIGNED NOT NULL,
  `total_boxes_price` double(8,2) UNSIGNED NOT NULL,
  `total_paid` double(8,2) UNSIGNED NOT NULL,
  `total_unpaid` double(8,2) UNSIGNED NOT NULL,
  `bets` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `selling_deals`
--

INSERT INTO `selling_deals` (`id`, `trader_id`, `boxes_count`, `boxe_price`, `total_boxes_price`, `total_paid`, `total_unpaid`, `bets`, `created_at`, `updated_at`) VALUES
(1, 1, 30, 300.00, 300.00, 200.00, 200.00, 515.00, '2020-07-23 11:12:10', '2020-07-23 11:12:10'),
(2, 1, 40, 400.50, 400.50, 300.50, 300.50, 50.50, '2020-08-01 13:50:16', '2020-07-23 11:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `subregions`
--

CREATE TABLE `subregions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subregions`
--

INSERT INTO `subregions` (`id`, `region_id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 1, 'sub1', 'أقاليم', '2020-07-23 10:26:33', '2020-07-23 10:26:33'),
(2, 2, 'sub2', 'امريكاaaa', '2020-07-23 10:27:42', '2020-07-23 10:37:52'),
(3, 2, 'sub3', 'أقاليم', '2020-07-23 10:36:07', '2020-07-23 10:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `traders`
--

CREATE TABLE `traders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subregion_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money_indebtedness` double(8,2) UNSIGNED NOT NULL,
  `boxes_indebtedness` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `traders`
--

INSERT INTO `traders` (`id`, `subregion_id`, `name`, `phone`, `money_indebtedness`, `boxes_indebtedness`, `created_at`, `updated_at`) VALUES
(1, 2, 'eslam', '01234567890', 500.56, 500, '2020-07-23 11:00:32', '2020-08-23 15:17:52'),
(2, 2, 'manso', '01234567893', 1000.46, 515, '2020-07-23 11:01:41', '2020-08-23 15:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'username', 'a@b.c', NULL, '$2y$10$PbdBVmCYCUuS01IAu4UHpe3a0gQHSKjtcPHnWs7b7d/nqPYC6c5qW', NULL, '2020-07-22 14:13:01', '2020-07-22 14:13:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collecting_deals`
--
ALTER TABLE `collecting_deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collecting_deals_trader_id_foreign` (`trader_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `purchasing_deals`
--
ALTER TABLE `purchasing_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selling_deals`
--
ALTER TABLE `selling_deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selling_deals_trader_id_foreign` (`trader_id`);

--
-- Indexes for table `subregions`
--
ALTER TABLE `subregions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subregions_region_id_foreign` (`region_id`);

--
-- Indexes for table `traders`
--
ALTER TABLE `traders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `traders_subregion_id_foreign` (`subregion_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collecting_deals`
--
ALTER TABLE `collecting_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchasing_deals`
--
ALTER TABLE `purchasing_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `selling_deals`
--
ALTER TABLE `selling_deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subregions`
--
ALTER TABLE `subregions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `traders`
--
ALTER TABLE `traders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collecting_deals`
--
ALTER TABLE `collecting_deals`
  ADD CONSTRAINT `collecting_deals_trader_id_foreign` FOREIGN KEY (`trader_id`) REFERENCES `traders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `selling_deals`
--
ALTER TABLE `selling_deals`
  ADD CONSTRAINT `selling_deals_trader_id_foreign` FOREIGN KEY (`trader_id`) REFERENCES `traders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subregions`
--
ALTER TABLE `subregions`
  ADD CONSTRAINT `subregions_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `traders`
--
ALTER TABLE `traders`
  ADD CONSTRAINT `traders_subregion_id_foreign` FOREIGN KEY (`subregion_id`) REFERENCES `subregions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
