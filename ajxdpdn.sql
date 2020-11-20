-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2020 at 09:49 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajxdpdn`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'Bangladesh', NULL, NULL),
(2, 'Pakistan', NULL, NULL),
(3, 'Australia', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cricketer`
--

CREATE TABLE `cricketer` (
  `cricketer_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `cricketer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cricketer_role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cricketer`
--

INSERT INTO `cricketer` (`cricketer_id`, `country_id`, `cricketer_name`, `cricketer_role`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mashrafe Mortaza', 'All-rounder', NULL, NULL),
(2, 1, 'Tamim Iqbal', 'Batsman', NULL, NULL),
(3, 2, 'Babar Azam', 'Batsman', NULL, NULL),
(4, 2, 'Shahid Afridi', 'All-rounder', NULL, NULL),
(5, 3, 'Glenn Maxwell', 'All-rounder', NULL, NULL),
(6, 3, 'Steve Smith', 'Batsman', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cricketer_detail`
--

CREATE TABLE `cricketer_detail` (
  `cricketer_detail_id` bigint(20) UNSIGNED NOT NULL,
  `cricketer_id` bigint(20) UNSIGNED NOT NULL,
  `odi_run` int(11) NOT NULL,
  `test_run` int(11) NOT NULL,
  `t20_run` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cricketer_detail`
--

INSERT INTO `cricketer_detail` (`cricketer_detail_id`, `cricketer_id`, `odi_run`, `test_run`, `t20_run`, `created_at`, `updated_at`) VALUES
(1, 1, 2000, 1500, 1200, NULL, NULL),
(2, 2, 7000, 5000, 2000, NULL, NULL),
(3, 3, 5000, 4000, 2000, NULL, NULL),
(4, 4, 8000, 5000, 2000, NULL, NULL),
(5, 5, 4000, 3000, 2000, NULL, NULL),
(6, 6, 5000, 9000, 2000, NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_07_091651_create_cnt_table', 1),
(4, '2020_11_07_091726_create_ctr_table', 1),
(5, '2020_11_07_092112_create_ctr_dtl_table', 1);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `cricketer`
--
ALTER TABLE `cricketer`
  ADD PRIMARY KEY (`cricketer_id`),
  ADD KEY `cricketer_country_id_foreign` (`country_id`);

--
-- Indexes for table `cricketer_detail`
--
ALTER TABLE `cricketer_detail`
  ADD PRIMARY KEY (`cricketer_detail_id`),
  ADD KEY `cricketer_detail_cricketer_id_foreign` (`cricketer_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cricketer`
--
ALTER TABLE `cricketer`
  MODIFY `cricketer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cricketer_detail`
--
ALTER TABLE `cricketer_detail`
  MODIFY `cricketer_detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cricketer`
--
ALTER TABLE `cricketer`
  ADD CONSTRAINT `cricketer_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE CASCADE;

--
-- Constraints for table `cricketer_detail`
--
ALTER TABLE `cricketer_detail`
  ADD CONSTRAINT `cricketer_detail_cricketer_id_foreign` FOREIGN KEY (`cricketer_id`) REFERENCES `cricketer` (`cricketer_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
