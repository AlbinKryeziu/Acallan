-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 22, 2021 at 05:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acallan`
--

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `doctor_access` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `doctor_access`, `phone`, `state`, `address`) VALUES
(42, 'Michael ', 'email@company.com', NULL, '$2y$10$Uj8M.GBqKnLvNZ3tmf/O6u8CSEjFe1s0XTyNhWL7VcXpYc8.CBl1m', NULL, NULL, NULL, NULL, NULL, '2021-02-16 21:55:08', '2021-02-26 23:24:10', '[[\"17\"]]', '13222', 'Florida', 'Florida'),
(93, 'liam', 'liam@gmail.com', NULL, '$2y$10$bKwKxNtRlbX0/VW07rKdOeZO0mK3ogexSRj32QDBVNEuBlmOCHgHK', NULL, NULL, NULL, NULL, NULL, '2021-04-22 11:22:07', '2021-04-22 11:22:07', '[[\"17\"]]', '13658985', 'America', 'America'),
(94, 'Dohn', 'dohn@gmail.com', NULL, '$2y$10$jE3Ga6H0CmW8q09LiAXrKOP9gIiJbYwTu/7RKfYcakCfzYueSn.EK', NULL, NULL, NULL, NULL, NULL, '2021-04-22 11:23:14', '2021-04-22 11:23:14', '[[\"17\"]]', NULL, 'America', 'America'),
(95, 'John', 'john@company.com', NULL, '$2y$10$Uj8M.GBqKnLvNZ3tmf/O6u8CSEjFe1s0XTyNhWL7VcXpYc8.CBl1m', NULL, NULL, NULL, NULL, NULL, '2021-04-22 11:29:42', '2021-04-22 11:29:42', '[[\"17\"]]', '12154849', NULL, 'Florida');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
