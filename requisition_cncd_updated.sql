-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2022 at 01:34 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `requisition_cncd`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'information technology', '2022-03-26 05:36:07', '2022-03-26 05:36:07'),
(4, 'finance', '2022-03-26 05:36:14', '2022-03-26 05:36:14'),
(5, 'HR', '2022-04-01 01:57:11', '2022-04-01 01:57:11'),
(6, 'data science', '2022-04-01 01:57:20', '2022-04-01 01:57:20'),
(7, 'call back', '2022-04-01 01:57:30', '2022-04-01 01:57:30'),
(8, 'department of hematology', '2022-04-01 01:59:45', '2022-04-01 01:59:45'),
(9, 'department of molecular', '2022-04-01 02:00:14', '2022-04-01 02:00:14'),
(10, 'department of biochemistry', '2022-04-01 02:00:47', '2022-04-01 02:00:47'),
(11, 'administration', '2022-04-01 02:05:23', '2022-04-01 02:05:23'),
(12, 'QC', '2022-04-01 02:05:39', '2022-04-01 02:05:39'),
(13, 'inventory', '2022-04-25 04:03:56', '2022-04-25 04:03:56');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_000000_create_users_table', 2),
(6, '2022_03_25_060931_create_departments_table', 2),
(11, '2022_03_25_061652_create_roles_table', 2),
(14, '2022_03_26_060652_create_statuses_table', 3),
(15, '2022_03_30_105043_add_dept_id_to_users_table', 4),
(17, '2022_03_25_061630_create_phases_table', 6),
(18, '2022_03_25_064222_create_user_menus_table', 7),
(19, '2022_04_01_063906_create_purchase_requests_table', 7),
(20, '2022_03_25_061431_create_request_logs_table', 8);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phases`
--

CREATE TABLE `phases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dept_id` int(11) NOT NULL,
  `req_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_requests`
--

CREATE TABLE `purchase_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `status_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_requests`
--

INSERT INTO `purchase_requests` (`id`, `user_id`, `status_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 4, '13', 'i have need a mouse', '2022-05-14 04:23:08', '2022-05-14 05:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `forword_to_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `forword_from_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_logs`
--

INSERT INTO `request_logs` (`id`, `request_id`, `status`, `note`, `forword_to_id`, `forword_from_id`, `created_at`, `updated_at`) VALUES
(1, 1, '3', 'Generate Request', '5', '4', '2022-05-14 04:23:08', '2022-05-14 04:23:08'),
(2, 1, '5', 'yes we need it', '7', '5', '2022-05-14 04:23:36', '2022-05-14 04:23:36'),
(3, 1, '4', 'yes we need to buy it we have not in our inventory', '9', '7', '2022-05-14 04:26:02', '2022-05-14 04:26:02'),
(5, 1, '9', 'i will issue amount for this item', '8', '9', '2022-05-14 04:39:48', '2022-05-14 04:39:48'),
(6, 1, '12', 'we find this item from 2 vendor first one quote me 300rs and second one quote me 400rs which one do you prefer.', '9', '8', '2022-05-14 04:56:38', '2022-05-14 04:56:38'),
(7, 1, '13', 'i will issue budget for this item 300rs please buy it from market', '8', '9', '2022-05-14 05:16:42', '2022-05-14 05:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', '2022-04-01 01:27:45', '2022-04-01 01:27:45'),
(2, 'admin', '2022-03-26 05:18:08', '2022-03-26 05:20:40'),
(3, 'user', '2022-04-01 01:26:57', '2022-04-01 01:26:57'),
(4, 'inventory', '2022-04-01 01:26:57', '2022-04-01 01:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'open', '2022-04-01 01:49:23', '2022-04-01 01:49:23'),
(4, 'viewed', '2022-04-01 01:49:38', '2022-04-01 01:49:38'),
(5, 'approved by HOD', '2022-04-01 01:51:08', '2022-04-01 01:51:08'),
(6, 'issued', '2022-04-01 01:51:20', '2022-04-01 01:51:20'),
(7, 'received', '2022-04-01 01:51:31', '2022-04-01 01:52:17'),
(8, 'rejected', '2022-04-01 01:52:31', '2022-04-01 01:52:31'),
(9, 'approved by Finance', '2022-04-01 01:53:19', '2022-04-01 01:53:19'),
(10, 'not available', '2022-04-01 01:56:21', '2022-04-01 01:56:21'),
(11, 'available', '2022-04-01 01:56:21', '2022-04-01 01:56:21'),
(12, 'quatation send', '2022-04-01 01:56:21', '2022-04-01 01:56:21'),
(13, 'quatation approved', '2022-04-01 01:56:21', '2022-04-01 01:56:21');

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
  `role_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`, `dept_id`) VALUES
(1, 'superadmin', 'admin@cncd.com', '2022-03-25 07:40:50', '$2y$10$t3PoYAYc6DBF4si4sbCWYuRlDX2cahS6Fz8nwQyOHq8pBD1mGgRwi', 1, '1', NULL, '2022-03-25 07:40:50', '2022-03-25 07:40:50', 0),
(4, 'UserArslan', 'arslan@cncd.com', NULL, '$2y$10$sFovaiG4Nfy42HZPMr70.OtL0k5GwucryZhPVEAy/1kwIDFZBgcJC', 3, '1', NULL, '2022-04-01 01:30:49', '2022-04-01 01:30:49', 3),
(5, 'IT-admin-Fawad', 'fawad@cncd.com', NULL, '$2y$10$dZYfq5T/9YtPlRAiRYbk3.R0X0lriAQtYGSAOWSSiqCx/dGsfPL3i', 2, '1', NULL, '2022-04-02 02:09:40', '2022-04-02 02:09:40', 3),
(7, 'inventory-admin-Hussain', 'hussain@cncd.com', NULL, '$2y$10$sFovaiG4Nfy42HZPMr70.OtL0k5GwucryZhPVEAy/1kwIDFZBgcJC', 2, '1', NULL, '2022-04-01 01:30:49', '2022-04-01 01:30:49', 13),
(8, 'administration-admin-abid', 'abid@cncd.com', NULL, '$2y$10$sFovaiG4Nfy42HZPMr70.OtL0k5GwucryZhPVEAy/1kwIDFZBgcJC', 2, '1', NULL, '2022-04-01 01:30:49', '2022-04-01 01:30:49', 11),
(9, 'finance-admin-raza', 'raza@cncd.com', NULL, '$2y$10$sFovaiG4Nfy42HZPMr70.OtL0k5GwucryZhPVEAy/1kwIDFZBgcJC', 2, '1', NULL, '2022-04-01 01:30:49', '2022-04-01 01:30:49', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_logs`
--
ALTER TABLE `request_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phases`
--
ALTER TABLE `phases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_requests`
--
ALTER TABLE `purchase_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_logs`
--
ALTER TABLE `request_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
