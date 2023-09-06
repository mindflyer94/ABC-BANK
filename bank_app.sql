-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 06, 2023 at 06:53 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_09_05_143816_create_transaction_histories_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `transaction_histories`
--

CREATE TABLE `transaction_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `to_user` bigint(20) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL COMMENT '1-debit 2-credit 3-transfer',
  `amount` decimal(10,2) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_histories`
--

INSERT INTO `transaction_histories` (`id`, `user_id`, `to_user`, `type`, `amount`, `balance`, `date`, `details`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2000.00', '2010.00', '2023-09-06 12:47:27', 'Deposit', 1, 1, '2023-09-06 12:47:27', '2023-09-06 12:47:27'),
(2, 1, 1, 1, '10.00', '2000.00', '2023-09-06 12:47:39', 'Withdraw', 1, 1, '2023-09-06 12:47:39', '2023-09-06 12:47:39'),
(3, 1, 2, 1, '1800.00', '200.00', '2023-09-06 12:49:36', 'transfered to navaneeth', 1, 1, '2023-09-06 12:49:36', '2023-09-06 12:49:36'),
(4, 2, 1, 2, '1800.00', '1800.00', '2023-09-06 12:49:36', 'transfer from amal joseph', 1, 1, '2023-09-06 12:49:36', '2023-09-06 12:49:36'),
(5, 1, 1, 1, '200.00', '0.00', '2023-09-06 12:49:49', 'Withdraw', 1, 1, '2023-09-06 12:49:49', '2023-09-06 12:49:49'),
(6, 1, 1, 2, '1000.00', '1000.00', '2023-09-06 13:00:42', 'Deposit', 1, 1, '2023-09-06 13:00:42', '2023-09-06 13:00:42'),
(7, 1, 2, 1, '1.00', '999.00', '2023-09-06 13:00:48', 'transfered to navaneeth', 1, 1, '2023-09-06 13:00:48', '2023-09-06 13:00:48'),
(8, 2, 1, 2, '1.00', '1.00', '2023-09-06 13:00:48', 'transfer from amal joseph', 1, 1, '2023-09-06 13:00:48', '2023-09-06 13:00:48'),
(9, 1, 2, 1, '1.00', '998.00', '2023-09-06 13:01:49', 'transfered to navaneeth', 1, 1, '2023-09-06 13:01:49', '2023-09-06 13:01:49'),
(10, 2, 1, 2, '1.00', '1.00', '2023-09-06 13:01:49', 'transfer from amal joseph', 1, 1, '2023-09-06 13:01:49', '2023-09-06 13:01:49'),
(11, 1, 2, 1, '1.00', '997.00', '2023-09-06 13:02:03', 'transfered to navaneeth', 1, 1, '2023-09-06 13:02:03', '2023-09-06 13:02:03'),
(12, 2, 1, 2, '1.00', '1.00', '2023-09-06 13:02:03', 'transfer from amal joseph', 1, 1, '2023-09-06 13:02:03', '2023-09-06 13:02:03'),
(13, 1, 2, 1, '1.00', '996.00', '2023-09-06 13:02:19', 'transfered to navaneeth', 1, 1, '2023-09-06 13:02:19', '2023-09-06 13:02:19'),
(14, 2, 1, 2, '1.00', '1.00', '2023-09-06 13:02:19', 'transfer from amal joseph', 1, 1, '2023-09-06 13:02:19', '2023-09-06 13:02:19'),
(15, 1, 1, 1, '1.00', '995.00', '2023-09-06 13:04:45', 'Withdraw', 1, 1, '2023-09-06 13:04:45', '2023-09-06 13:04:45'),
(16, 1, 1, 2, '1.00', '996.00', '2023-09-06 13:04:49', 'Deposit', 1, 1, '2023-09-06 13:04:49', '2023-09-06 13:04:49'),
(17, 1, 1, 2, '100.00', '1096.00', '2023-09-06 13:05:07', 'Deposit', 1, 1, '2023-09-06 13:05:07', '2023-09-06 13:05:07'),
(18, 1, 2, 1, '2.00', '1094.00', '2023-09-06 13:05:24', 'transfered to navaneeth', 1, 1, '2023-09-06 13:05:24', '2023-09-06 13:05:24'),
(19, 2, 1, 2, '2.00', '2.00', '2023-09-06 13:05:24', 'transfer from amal joseph', 1, 1, '2023-09-06 13:05:24', '2023-09-06 13:05:24'),
(20, 3, 3, 2, '8000.00', '8000.00', '2023-09-06 13:12:23', 'Deposit', 3, 3, '2023-09-06 13:12:23', '2023-09-06 13:12:23'),
(21, 3, 3, 1, '300.00', '7700.00', '2023-09-06 13:12:54', 'Withdraw', 3, 3, '2023-09-06 13:12:54', '2023-09-06 13:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double(10,2) DEFAULT NULL,
  `is_policy_accepted` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `balance`, `is_policy_accepted`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'amal joseph', 'amalm44amalm@gmail.com', NULL, '$2y$10$yb9vOu8L6fx24thYFksYfOD07H8C9.6XxRjnKO6zmAzHxG1198FRq', 1094.00, 1, NULL, '2023-09-05 13:25:52', '2023-09-06 13:05:24'),
(2, 'navaneeth', 'nava1@gmail.com', NULL, '$2y$10$aHUWTROtRuwRfLDvUx9IqOLJsyfCqaNOpUg70bEXhyDHVeNVuxx7C', 2.00, 1, NULL, '2023-09-06 09:53:59', '2023-09-06 13:05:24'),
(3, 'manu', 'manud@gmail.com', NULL, '$2y$10$dYycV.PXSbLgmke5JrHDT.LmdzT8yIFaDsomlXR4a57vS5I51FMbW', 7700.00, 1, NULL, '2023-09-06 13:10:57', '2023-09-06 13:12:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_histories_user_id_foreign` (`user_id`),
  ADD KEY `transaction_histories_to_user_foreign` (`to_user`),
  ADD KEY `transaction_histories_created_by_foreign` (`created_by`),
  ADD KEY `transaction_histories_updated_by_foreign` (`updated_by`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_histories`
--
ALTER TABLE `transaction_histories`
  ADD CONSTRAINT `transaction_histories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_histories_to_user_foreign` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_histories_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
