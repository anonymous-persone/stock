--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
	('138c34331980476b888b329a94a61fb53f08e2848e9be16b619a5bbf75b152479be909512c576dcf', 1, 1, 'authToken', '[]', 0, '2020-08-10 07:33:29', '2020-08-10 07:33:29', '2021-08-10 09:33:29'),
	('1f39b48ab53b31bebeb68649e16b20ecf06a95dd850c31dbcaabf122058101e8204e4ece40149df1', 1, 1, 'authToken', '[]', 0, '2020-07-23 12:23:42', '2020-07-23 12:23:42', '2021-07-23 14:23:42'),
	('520e49bb485872addc06187256fed146044a67372a90e4ad945e98c47fa76b4e8b072d4fbaad00ca', 1, 1, 'authToken', '[]', 0, '2020-07-22 16:21:11', '2020-07-22 16:21:11', '2021-07-22 18:21:11'),
	('a2a5ddf3c9ce5f02fa40c12aa500409d9437e9e9b8d5ae9d4babf9baddde4c7a92f82cce40209d46', 1, 1, 'authToken', '[]', 0, '2020-07-22 16:21:28', '2020-07-22 16:21:28', '2021-07-22 18:21:28'),
	('ff98c2fc0c7055a36c1561bce5fee2375a0baa5ac47ef1ab55bf47573d12ca34c1542c8769f6146f', 1, 1, 'authToken', '[]', 0, '2020-07-22 16:13:02', '2020-07-22 16:13:02', '2021-07-22 18:13:02');

-- --------------------------------------------------------

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Laravel Personal Access Client', 'uSJNeZgpQxC1Pgh0HNtgmmXYWP1HgAcPt64vhgAe', NULL, 'http://localhost', 1, 0, 0, '2020-07-22 16:12:48', '2020-07-22 16:12:48'),
	(2, NULL, 'Laravel Password Grant Client', 'YbPrtWaEAONuDg6wx6hN2bzfWTkachx16Gos0HgL', 'users', 'http://localhost', 0, 1, 0, '2020-07-22 16:12:48', '2020-07-22 16:12:48');

-- --------------------------------------------------------

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-07-22 16:12:48', '2020-07-22 16:12:48');

-- --------------------------------------------------------

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'username', 'a@b.c', NULL, '$2y$10$PbdBVmCYCUuS01IAu4UHpe3a0gQHSKjtcPHnWs7b7d/nqPYC6c5qW', NULL, '2020-07-22 16:13:01', '2020-07-22 16:13:01');

-- --------------------------------------------------------

--
-- Dumping data for table `containers`
--

INSERT INTO `containers` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'bxes', 'عدايات', '2020-07-23 12:26:33', '2020-07-23 12:26:33'),
(2, 'praniq', 'برانيق', '2020-07-23 12:36:07', '2020-07-23 12:36:07');

-- --------------------------------------------------------

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'apple', 'تفاح', '2020-07-23 12:26:33', '2020-07-23 12:26:33'),
(2, 'orange', 'برتقال', '2020-07-23 12:36:07', '2020-07-23 12:36:07');

-- --------------------------------------------------------

--
-- Dumping data for table `purchasing_deals`
--

INSERT INTO `purchasing_deals` (`id`, `seller_name`, `container_id`, `content_id`, `total_containers`, `remaining_containers`, `created_at`, `updated_at`) VALUES
(1, 'ahmed', 1, 1, 30, 30, '2020-07-23 13:38:52', '2020-07-23 13:38:52'),
(2, 'eslam', 2, 2, 40, 40, '2020-07-23 13:40:14', '2020-07-23 13:40:19');

-- --------------------------------------------------------

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'akalem', 'أقاليم', '2020-07-23 12:26:33', '2020-07-23 12:26:33'),
(2, 'bander', 'البندر', '2020-07-23 12:36:07', '2020-07-23 12:36:07');

-- --------------------------------------------------------
--
-- Dumping data for table `regions`
--

INSERT INTO `subregions` (`id`, `region_id`, `title_en`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 1, 'sub1', 'أقاليم', '2020-07-23 12:26:33', '2020-07-23 12:26:33'),
(2, 2, 'sub2', 'امريكاaaa', '2020-07-23 12:27:42', '2020-07-23 12:37:52'),
(3, 2, 'sub3', 'أقاليم', '2020-07-23 12:36:07', '2020-07-23 12:36:07');

-- --------------------------------------------------------

--
-- Dumping data for table `traders`
--

INSERT INTO `traders` (`id`, `subregion_id`, `name`, `phone`, `money_indebtedness`, `created_at`, `updated_at`) VALUES
(1, 2, 'eslam', '01234567890', 1000.56, '2020-07-23 13:00:32', '2020-07-23 13:00:32'),
(2, 2, 'manso', '01234567893', 1000.46, '2020-07-23 13:01:41', '2020-07-23 13:04:08');

-- --------------------------------------------------------

--
-- Dumping data for table `container_traders`
--

INSERT INTO `container_traders` (`id`, `trader_id`, `container_id`, `container_indebtedness`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 56, '2020-07-23 13:00:32', '2020-07-23 13:00:32'),
(2, 2, 2, 46, '2020-07-23 13:01:41', '2020-07-23 13:04:08');

-- --------------------------------------------------------

--
-- Dumping data for table `selling_deals`
--

INSERT INTO `selling_deals` (`id`, `trader_id`, `container_id`, `content_id`, `container_count`, `container_price`, `container_kilos`, `kilo_price`, `total_containers_price`, `total_paid`, `total_unpaid`, `bets`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 30, 300.00, 300, 200.00, 300.00, 200.00, 200.00, 515.00, '2020-07-23 13:12:10', '2020-07-23 13:12:10'),
(2, 2, 2, 2, 40, 400.50, 300, 200.00, 400.50, 300.50, 300.50, 50.50, '2020-07-23 13:13:54', '2020-07-23 13:14:26');