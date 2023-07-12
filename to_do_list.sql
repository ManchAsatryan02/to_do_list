-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 12, 2023 at 12:41 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `to_do_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint UNSIGNED NOT NULL,
  `firs_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firs_name`, `last_name`, `email`, `age`, `image`, `role`, `created_at`, `updated_at`) VALUES
(22, 'wawwqawa', 'Mask', 'maskillon@gmail.com', 52, '5.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_do_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `img`, `to_do_id`, `created_at`, `updated_at`) VALUES
(204, '155_20230711084558_1689065158.jpg', 143, '2023-07-11 05:45:58', '2023-07-11 05:45:58'),
(205, '130_20230711084751_1689065271.png', 144, '2023-07-11 05:47:51', '2023-07-11 05:47:51'),
(206, '985_20230711084953_1689065393.png', 145, '2023-07-11 05:49:53', '2023-07-11 05:49:53'),
(207, '392_20230711085054_1689065454.png', 146, '2023-07-11 05:50:54', '2023-07-11 05:50:54'),
(208, '864_20230711085543_1689065743.png', 147, '2023-07-11 05:55:43', '2023-07-11 05:55:43'),
(209, '180_20230711085650_1689065810.png', 148, '2023-07-11 05:56:50', '2023-07-11 05:56:50'),
(276, '913_20230712092905_1689154145.jpg', 155, '2023-07-12 06:29:05', '2023-07-12 06:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_07_07_124742_create_customers_table', 2),
(7, '2023_07_07_151958_create_to_do_lists_table', 3),
(8, '2023_07_07_162308_create_to_dos_table', 4),
(9, '2023_07_07_165540_add_description_to_to_dos_table', 5),
(10, '2023_07_08_105707_create_tags_table', 6),
(11, '2023_07_08_105903_create_tag_to_dos_table', 7),
(12, '2023_07_08_113253_create_tags_table', 8),
(13, '2023_07_08_115731_create_tags_table', 9),
(14, '2023_07_08_121149_create_do_does_table--', 10),
(15, '2023_07_08_121149_create_do_dos_table--', 11),
(16, '2023_07_08_124221_create_tags_table--', 12),
(17, '2023_07_09_133406_create_images_table', 13),
(18, '2023_07_10_140000_create_roles_table', 14),
(19, '2023_07_10_151259_create_roles_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `role` int NOT NULL,
  `owner_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `list_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `owner_id`, `user_id`, `list_id`, `created_at`, `updated_at`) VALUES
(29, 2, 1, 2, 105, '2023-07-12 06:05:29', '2023-07-12 06:05:29'),
(32, 3, 2, 1, 108, '2023-07-12 06:19:19', '2023-07-12 06:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `to_do_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `user_id`, `to_do_id`, `created_at`, `updated_at`) VALUES
(56, 'Download', 1, 143, '2023-07-11 05:46:09', '2023-07-11 05:46:09'),
(57, 'Install PHP', 1, 143, '2023-07-11 05:46:17', '2023-07-11 05:46:17'),
(58, 'Localhost', 1, 144, '2023-07-11 05:48:12', '2023-07-11 05:48:12'),
(60, 'OsPanel', 1, 144, '2023-07-11 05:48:28', '2023-07-11 05:48:28'),
(61, 'JS', 1, 145, '2023-07-11 05:49:58', '2023-07-11 05:49:58'),
(62, 'Let', 1, 145, '2023-07-11 05:50:07', '2023-07-11 05:50:07'),
(63, 'Var', 1, 145, '2023-07-11 05:50:10', '2023-07-11 05:50:10'),
(66, 'While', 1, 146, '2023-07-11 05:51:17', '2023-07-11 05:51:17'),
(67, 'Do While', 1, 146, '2023-07-11 05:51:24', '2023-07-11 05:51:24'),
(68, 'Install', 1, 147, '2023-07-11 05:55:52', '2023-07-11 05:55:52'),
(69, 'Download', 1, 147, '2023-07-11 05:55:56', '2023-07-11 05:55:56'),
(70, 'Settings', 1, 147, '2023-07-11 05:56:01', '2023-07-11 05:56:01'),
(71, 'Lesson 1', 1, 148, '2023-07-11 05:56:56', '2023-07-11 05:56:56'),
(72, 'Introdution', 1, 148, '2023-07-11 05:57:04', '2023-07-11 05:57:04'),
(73, 'Xamp', 1, 144, '2023-07-11 06:02:38', '2023-07-11 06:02:38'),
(75, 'sasas', 2, 155, '2023-07-11 09:32:36', '2023-07-11 09:32:36'),
(80, '1111', 2, 147, '2023-07-11 11:25:48', '2023-07-11 11:25:48'),
(81, 'asas', 1, 148, '2023-07-11 12:44:54', '2023-07-11 12:44:54'),
(82, 'as', 1, 146, '2023-07-11 12:45:09', '2023-07-11 12:45:09'),
(84, 'New', 1, 144, '2023-07-12 06:06:12', '2023-07-12 06:06:12'),
(87, 'Test tag', 2, 155, '2023-07-12 06:28:54', '2023-07-12 06:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `to_dos`
--

CREATE TABLE `to_dos` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `list_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `to_dos`
--

INSERT INTO `to_dos` (`id`, `name`, `description`, `list_id`, `created_at`, `updated_at`) VALUES
(143, 'Instalation', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 102, '2023-07-11 05:45:58', '2023-07-11 05:45:58'),
(144, 'Make localhost', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 102, '2023-07-11 05:47:51', '2023-07-12 06:06:03'),
(145, 'Variables', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 103, '2023-07-11 05:49:53', '2023-07-11 05:49:53'),
(146, 'Loops', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 103, '2023-07-11 05:50:54', '2023-07-11 05:50:54'),
(147, 'Java package intallation1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 104, '2023-07-11 05:55:42', '2023-07-11 11:25:39'),
(148, 'Lesson 1.1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 105, '2023-07-11 05:56:50', '2023-07-12 04:42:07'),
(155, 'Test', '--------------------------------------', 108, '2023-07-11 09:32:33', '2023-07-12 06:28:47');

-- --------------------------------------------------------

--
-- Table structure for table `to_do_lists`
--

CREATE TABLE `to_do_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `to_do_lists`
--

INSERT INTO `to_do_lists` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(102, 'PHP exersices', 1, '2023-07-11 05:43:07', '2023-07-11 05:43:07'),
(103, 'JS exersices', 1, '2023-07-11 05:43:15', '2023-07-11 05:43:15'),
(104, 'Java exersices', 1, '2023-07-11 05:43:31', '2023-07-11 05:43:31'),
(105, 'Pyton exersices', 1, '2023-07-11 05:43:45', '2023-07-11 05:43:45'),
(108, 'Work 1', 2, '2023-07-11 09:32:02', '2023-07-11 09:32:02'),
(109, 'Work 2', 2, '2023-07-11 09:32:11', '2023-07-11 09:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Manch', 'asatryanmanch.02@gmail.com', NULL, '$2y$10$3LkuspD4zzD40iRkx4CxLOJRmK56gq/lLL3JTI0wF0U1GpGG4naaG', NULL, '2023-07-07 08:49:26', '2023-07-07 08:49:26'),
(2, 'User', 'user@email.com', NULL, '$2y$10$2bkTDVzews7QIgfeZ5bKWOQ3.mcLHKObhbdVTgsteHOI4u347u4S.', NULL, '2023-07-11 09:30:58', '2023-07-11 09:30:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_to_do_id_foreign` (`to_do_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_owner_id_foreign` (`owner_id`),
  ADD KEY `roles_user_id_foreign` (`user_id`),
  ADD KEY `roles_list_id_foreign` (`list_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_user_id_foreign` (`user_id`),
  ADD KEY `tags_to_do_id_foreign` (`to_do_id`);

--
-- Indexes for table `to_dos`
--
ALTER TABLE `to_dos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_dos_list_id_foreign` (`list_id`);

--
-- Indexes for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_do_lists_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `to_dos`
--
ALTER TABLE `to_dos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `images_to_do_id_foreign` FOREIGN KEY (`to_do_id`) REFERENCES `to_dos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_list_id_foreign` FOREIGN KEY (`list_id`) REFERENCES `to_do_lists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_to_do_id_foreign` FOREIGN KEY (`to_do_id`) REFERENCES `to_dos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `to_dos`
--
ALTER TABLE `to_dos`
  ADD CONSTRAINT `to_dos_list_id_foreign` FOREIGN KEY (`list_id`) REFERENCES `to_do_lists` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `to_do_lists`
--
ALTER TABLE `to_do_lists`
  ADD CONSTRAINT `to_do_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
