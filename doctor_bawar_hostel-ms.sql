-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2025 at 12:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_bawar_hostel-ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','superadmin') NOT NULL DEFAULT 'admin',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr Bawar', 'admin', 'admin@hostel.com', '$2y$12$IHgMH7bw1PXD5Em8.laDOOQaegC7yXSxWpGkRzHuSeFvzZAYKkq4i', 'superadmin', NULL, '2025-12-17 07:12:25', '2025-12-17 07:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `title`, `amount`, `date`, `description`, `created_at`, `updated_at`) VALUES
(3, 'doodai and ghwakha', 2000.00, '2025-12-18', NULL, '2025-12-17 10:10:21', '2025-12-17 10:10:21'),
(4, 'meat and rice', 1000.00, '2025-12-18', 'from bawar', '2025-12-17 10:10:50', '2025-12-17 10:10:50'),
(5, 'وریژی او غوړی', 3000.00, '2025-12-16', 'پیسی باور ورکړی', '2025-12-17 10:12:41', '2025-12-17 10:12:41'),
(6, 'ډووډی او الوګان', 3000.00, '2025-12-18', NULL, '2025-12-17 10:13:57', '2025-12-17 10:13:57'),
(7, 'hhh', 5000.00, '2025-12-07', NULL, '2025-12-22 05:38:22', '2025-12-22 05:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'First Floor', '2025-12-17 07:12:25', '2025-12-17 07:12:25'),
(2, 'Second Floor', '2025-12-17 07:12:25', '2025-12-17 07:12:25'),
(3, 'Third Floor', '2025-12-17 07:12:25', '2025-12-17 07:12:25'),
(4, 'Basement', '2025-12-17 07:12:25', '2025-12-17 07:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_09_154903_create_floors_table', 1),
(5, '2025_12_09_155027_create_rooms_table', 1),
(6, '2025_12_09_155122_create_students_table', 1),
(7, '2025_12_09_155232_create_student_payments_table', 1),
(8, '2025_12_09_155308_create_admins_table', 1),
(9, '2025_12_10_172641_create_expenses_table', 1),
(10, '2025_12_12_173817_create_students_stays_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `room_number` varchar(255) NOT NULL,
  `capacity` int(10) UNSIGNED NOT NULL,
  `current_students` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `floor_id`, `room_number`, `capacity`, `current_students`, `created_at`, `updated_at`) VALUES
(1, 1, 'R1', 4, 1, '2025-12-17 07:12:25', '2025-12-17 07:37:10'),
(2, 1, 'R2', 4, 1, '2025-12-17 07:12:25', '2025-12-17 09:43:41'),
(3, 1, 'R3', 3, 0, '2025-12-17 07:12:25', '2025-12-17 07:12:25'),
(4, 1, 'R4', 3, 0, '2025-12-17 07:12:25', '2025-12-17 07:12:25'),
(5, 2, 'R1', 4, 0, '2025-12-17 07:12:25', '2025-12-17 07:12:25'),
(6, 2, 'R2', 4, 1, '2025-12-17 07:12:25', '2025-12-17 07:39:13'),
(7, 2, 'R3', 5, 0, '2025-12-17 07:12:25', '2025-12-17 07:12:25'),
(8, 2, 'R4', 6, 1, '2025-12-17 07:12:25', '2025-12-20 00:19:39'),
(9, 3, 'R1', 4, 0, '2025-12-17 07:12:25', '2025-12-17 09:50:11'),
(10, 3, 'R2', 6, 1, '2025-12-17 07:12:25', '2025-12-17 09:47:55'),
(11, 4, 'R1', 5, 2, '2025-12-17 07:12:25', '2025-12-17 09:53:00'),
(12, 4, 'R2', 5, 1, '2025-12-17 07:12:25', '2025-12-17 09:50:08'),
(13, 4, 'R3', 6, 3, '2025-12-17 07:12:25', '2025-12-17 11:21:55'),
(14, 4, 'R4', 4, 3, '2025-12-17 07:12:25', '2025-12-17 11:32:25'),
(15, 4, 'R5', 4, 3, '2025-12-17 07:12:25', '2025-12-22 05:35:09'),
(16, 4, 'R6', 6, 0, '2025-12-17 07:12:25', '2025-12-17 07:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('CsC23PxKjdksR8iIK2v9vpBopsislOMURAKB9azW', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicEp6aEM1RW5RT1MxZ0tnNmZlTkx5SWxobm9mblNJQWttZ2JzSDNzWSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1766399962),
('kbuFUSUGIoQhHcMhNigOcO9Ld4LiLnBdxexmwF23', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQUdkVGN5MXhYWVVEdVVhSXBodWttYkNLenVPck1nTnlsdldGQ2d6ayI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1766328338);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `taskira` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `floor_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `monthly_fee` int(10) UNSIGNED NOT NULL,
  `paid_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `due_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `admission_date` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `father_name`, `address`, `contact`, `taskira`, `university`, `floor_id`, `room_id`, `monthly_fee`, `paid_amount`, `due_amount`, `admission_date`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'adil jan', 'khan', 'nanagarhar', '0793520267', '999-663-666', 'BCS', 1, 1, 3500, 0, 0, '2025-06-25 16:37:00', 1, '2025-12-17 07:37:10', '2025-12-17 07:37:10'),
(2, 'asad', 'jan', 'nanagarhar', '0793520267', '999-663-699', 'BCS', 1, 2, 3500, 0, 0, '2025-10-15 16:37:00', 1, '2025-12-17 07:38:02', '2025-12-17 07:38:02'),
(4, 'lala', 'jan', 'nanagarhar', '0793520267', '999-660-99', 'BCS', 2, 6, 3500, 0, 0, '2025-12-03 16:39:00', 1, '2025-12-17 07:39:12', '2025-12-17 07:39:12'),
(5, 'abdull', 'jan', 'nanagarhar', '0793520267', '99-660-99', 'BCS', 4, 11, 3500, 0, 0, '2025-12-17 16:40:00', 1, '2025-12-17 07:40:32', '2025-12-17 07:40:32'),
(6, 'jan', 'kamal', 'nanagarhar', '0793520267', '99-660-9990', 'BCS', 4, 13, 3500, 0, 0, '2025-12-18 16:41:00', 1, '2025-12-17 07:41:18', '2025-12-17 07:41:18'),
(7, 'mama', 'kamal', 'nanagarhar', '0793520267', '99-660-910-333', 'BCS', 4, 12, 3500, 0, 0, '2025-06-24 16:44:00', 1, '2025-12-17 07:44:47', '2025-12-17 07:44:47'),
(10, 'Dr.masi', 'kamal', 'nanagarhar', '0793520267', '99-660-910-2211', 'BCS', 4, 14, 3500, 0, 0, '2025-09-18 17:24:00', 1, '2025-12-17 08:24:45', '2025-12-17 08:24:45'),
(11, 'dadullah', 'kamal', 'nanagarhar', '0793520267', '99-660-91022-22', 'BCS', 4, 13, 3500, 0, 0, '2025-11-18 17:33:00', 1, '2025-12-17 08:33:46', '2025-12-17 08:33:46'),
(12, 'janooo', 'kamal', 'nanagarhar', '0793520267', '000-888-4923', 'BCS', 4, 15, 3500, 0, 0, '2025-10-10 18:45:00', 1, '2025-12-17 09:46:10', '2025-12-17 09:46:10'),
(13, 'sada', 'kamal', 'nanagarhar', '0793520267', '000-800-4923', 'BCS', 3, 10, 3500, 0, 0, '2025-10-10 18:47:00', 1, '2025-12-17 09:47:55', '2025-12-17 09:47:55'),
(14, 'sabitullah', 'kamal', 'nanagarhar', '0793520267', '000-800-4922', 'BCS', 4, 11, 3500, 0, 0, '2025-10-16 18:52:00', 1, '2025-12-17 09:53:00', '2025-12-17 09:53:00'),
(15, 'zubair', 'kamal', 'nanagarhar', '0793520267', '000-800-4977', 'BCS', 4, 15, 3500, 0, 0, '2025-12-16 20:17:00', 1, '2025-12-17 11:17:04', '2025-12-17 11:17:04'),
(16, 'khanjan', 'kamal', 'nanagarhar', '0793520267', '000-800-49722', 'BCS', 4, 13, 3500, 0, 0, '2025-12-24 20:21:00', 1, '2025-12-17 11:21:55', '2025-12-17 11:21:55'),
(17, 'hiwad', 'kamal', 'nanagarhar', '0793520267', '83748384738', 'BCS', 4, 14, 3500, 0, 0, '2025-12-03 20:22:00', 1, '2025-12-17 11:22:24', '2025-12-17 11:22:24'),
(18, 'wawa', 'kamal', 'nanagarhar', '0793520267', '2323-2-323', 'BCS', 4, 14, 3500, 0, 0, '2025-12-18 20:32:00', 1, '2025-12-17 11:32:25', '2025-12-17 11:32:25'),
(19, 'rat khan', 'kamal', 'nanagarhar', '0793520267', '3948-4854-34', 'BCS', 2, 8, 3500, 0, 0, '2025-10-13 09:19:00', 1, '2025-12-20 00:19:39', '2025-12-20 00:19:39'),
(20, 'vvvvv', 'kamal', 'nanagarhar', '0793520267', '56767-7878', 'BCS', 4, 15, 3500, 0, 0, '2025-12-11 14:35:00', 1, '2025-12-22 05:35:09', '2025-12-22 05:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `student_payments`
--

CREATE TABLE `student_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `month` tinyint(3) UNSIGNED NOT NULL,
  `year` smallint(5) UNSIGNED NOT NULL,
  `monthly_fee` int(10) UNSIGNED NOT NULL,
  `paid_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `due_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('Paid','Partial','Unpaid') NOT NULL DEFAULT 'Unpaid',
  `paid_at` timestamp NULL DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_payments`
--

INSERT INTO `student_payments` (`id`, `student_id`, `month`, `year`, `monthly_fee`, `paid_amount`, `due_amount`, `status`, `paid_at`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 2025, 3500, 2000, 1500, 'Partial', '2025-12-20 00:17:31', 'Initial payment on admission', '2025-12-17 07:37:10', '2025-12-20 00:17:31'),
(2, 2, 10, 2025, 3500, 2500, 1000, 'Partial', '2025-10-15 12:07:00', 'Initial payment on admission', '2025-12-17 07:38:02', '2025-12-17 07:38:02'),
(4, 6, 12, 2025, 3500, 500, 3000, 'Partial', '2025-12-18 12:11:00', 'Initial payment on admission', '2025-12-17 07:41:18', '2025-12-17 07:41:18'),
(5, 5, 10, 2025, 3500, 0, 3500, 'Unpaid', '2025-12-17 07:42:17', NULL, '2025-12-17 07:42:17', '2025-12-17 07:42:17'),
(6, 5, 8, 2025, 3500, 0, 3500, 'Unpaid', '2025-12-17 07:42:56', NULL, '2025-12-17 07:42:56', '2025-12-17 07:42:56'),
(8, 10, 9, 2025, 3500, 1, 3499, 'Partial', '2025-09-18 12:54:00', 'Initial payment on admission', '2025-12-17 08:24:45', '2025-12-17 08:24:45'),
(9, 11, 11, 2025, 3500, 0, 3500, 'Partial', '2025-11-18 13:03:00', 'Initial payment on admission', '2025-12-17 08:33:46', '2025-12-17 08:33:46'),
(10, 4, 11, 2025, 3500, 2000, 1500, 'Partial', '2025-12-17 09:42:14', NULL, '2025-12-17 09:42:14', '2025-12-17 09:42:14'),
(11, 4, 8, 2025, 3500, 3000, 500, 'Partial', '2025-12-17 09:43:14', NULL, '2025-12-17 09:43:14', '2025-12-17 09:43:14'),
(12, 7, 8, 2025, 3500, 2000, 1500, 'Partial', '2025-12-17 09:44:50', NULL, '2025-12-17 09:44:50', '2025-12-17 09:44:50'),
(13, 12, 10, 2025, 3500, 1000, 2500, 'Partial', '2025-10-10 14:15:00', 'Initial payment on admission', '2025-12-17 09:46:10', '2025-12-17 09:46:10'),
(14, 12, 12, 2025, 3500, 3000, 500, 'Partial', '2025-12-17 09:46:45', NULL, '2025-12-17 09:46:45', '2025-12-17 09:46:45'),
(15, 13, 10, 2025, 3500, 0, 3500, 'Partial', '2025-10-10 14:17:00', 'Initial payment on admission', '2025-12-17 09:47:55', '2025-12-17 09:47:55'),
(16, 13, 11, 2025, 3500, 2500, 1000, 'Partial', '2025-12-17 09:48:40', NULL, '2025-12-17 09:48:40', '2025-12-17 09:48:40'),
(17, 14, 10, 2025, 3500, 2000, 1500, 'Partial', '2025-10-16 14:22:00', 'Initial payment on admission', '2025-12-17 09:53:00', '2025-12-17 09:53:00'),
(18, 14, 12, 2025, 3500, 1500, 2000, 'Partial', '2025-12-17 10:01:37', NULL, '2025-12-17 10:01:37', '2025-12-17 10:01:37'),
(19, 15, 12, 2025, 3500, 3500, 0, 'Paid', '2025-12-16 15:47:00', 'Initial payment on admission', '2025-12-17 11:17:04', '2025-12-17 11:17:04'),
(20, 16, 12, 2025, 3500, 3000, 500, 'Partial', '2025-12-24 15:51:00', 'Initial payment on admission', '2025-12-17 11:21:55', '2025-12-17 11:21:55'),
(21, 17, 12, 2025, 3500, 0, 3500, 'Partial', '2025-12-03 15:52:00', 'Initial payment on admission', '2025-12-17 11:22:24', '2025-12-17 11:22:24'),
(22, 18, 12, 2025, 3500, 0, 3500, 'Partial', '2025-12-18 16:02:00', 'Initial payment on admission', '2025-12-17 11:32:25', '2025-12-17 11:32:25'),
(23, 1, 10, 2025, 3500, 3500, 0, 'Paid', '2025-12-20 00:17:43', NULL, '2025-12-20 00:17:00', '2025-12-20 00:17:43'),
(24, 1, 8, 2025, 3500, 3500, 0, 'Paid', '2025-12-20 00:17:22', NULL, '2025-12-20 00:17:22', '2025-12-20 00:17:22'),
(25, 1, 5, 2025, 3500, 3500, 0, 'Paid', '2025-12-20 00:17:56', NULL, '2025-12-20 00:17:56', '2025-12-20 00:17:56'),
(26, 1, 11, 2025, 3500, 0, 3500, 'Unpaid', '2025-12-20 00:18:15', NULL, '2025-12-20 00:18:15', '2025-12-20 00:18:15'),
(27, 19, 10, 2025, 3500, 3000, 500, 'Partial', '2025-10-13 04:49:00', 'Initial payment on admission', '2025-12-20 00:19:39', '2025-12-20 00:19:39'),
(28, 20, 12, 2025, 3500, 3000, 500, 'Partial', '2025-12-11 10:05:00', 'Initial payment on admission', '2025-12-22 05:35:09', '2025-12-22 05:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `student_stays`
--

CREATE TABLE `student_stays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `month` tinyint(3) UNSIGNED NOT NULL,
  `year` smallint(5) UNSIGNED NOT NULL,
  `paid_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `due_amount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `is_present` tinyint(1) NOT NULL DEFAULT 1,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_stays`
--

INSERT INTO `student_stays` (`id`, `student_id`, `month`, `year`, `paid_amount`, `due_amount`, `is_present`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 2025, 2000, 0, 1, 'admission', '2025-12-17 07:37:10', '2025-12-20 00:17:31'),
(2, 2, 10, 2025, 2500, 0, 1, 'admission', '2025-12-17 07:38:02', '2025-12-17 07:38:02'),
(4, 4, 12, 2025, 0, 0, 1, 'admission', '2025-12-17 07:39:13', '2025-12-17 07:39:13'),
(5, 5, 12, 2025, 0, 0, 1, 'admission', '2025-12-17 07:40:32', '2025-12-17 07:40:32'),
(6, 6, 12, 2025, 500, 0, 1, 'admission', '2025-12-17 07:41:18', '2025-12-17 07:41:18'),
(7, 5, 10, 2025, 0, 0, 1, NULL, '2025-12-17 07:42:17', '2025-12-17 07:42:17'),
(8, 5, 8, 2025, 0, 0, 1, NULL, '2025-12-17 07:42:56', '2025-12-17 07:42:56'),
(9, 7, 6, 2025, 0, 0, 1, 'admission', '2025-12-17 07:44:47', '2025-12-17 07:44:47'),
(12, 10, 9, 2025, 1, 0, 1, 'admission', '2025-12-17 08:24:45', '2025-12-17 08:24:45'),
(13, 11, 11, 2025, 0, 0, 1, 'admission', '2025-12-17 08:33:46', '2025-12-17 08:33:46'),
(14, 4, 11, 2025, 2000, 0, 1, NULL, '2025-12-17 09:42:14', '2025-12-17 09:42:14'),
(15, 4, 8, 2025, 3000, 0, 1, NULL, '2025-12-17 09:43:14', '2025-12-17 09:43:14'),
(16, 7, 8, 2025, 2000, 0, 1, NULL, '2025-12-17 09:44:50', '2025-12-17 09:44:50'),
(17, 12, 10, 2025, 1000, 0, 1, 'admission', '2025-12-17 09:46:10', '2025-12-17 09:46:10'),
(18, 12, 12, 2025, 3000, 0, 1, NULL, '2025-12-17 09:46:45', '2025-12-17 09:46:45'),
(19, 13, 10, 2025, 0, 0, 1, 'admission', '2025-12-17 09:47:55', '2025-12-17 09:47:55'),
(20, 13, 11, 2025, 2500, 0, 1, NULL, '2025-12-17 09:48:40', '2025-12-17 09:48:40'),
(21, 14, 10, 2025, 2000, 0, 1, 'admission', '2025-12-17 09:53:00', '2025-12-17 09:53:00'),
(22, 14, 12, 2025, 1500, 0, 1, NULL, '2025-12-17 10:01:37', '2025-12-17 10:01:37'),
(23, 15, 12, 2025, 3500, 0, 1, 'admission', '2025-12-17 11:17:04', '2025-12-17 11:17:04'),
(24, 16, 12, 2025, 3000, 0, 1, 'admission', '2025-12-17 11:21:55', '2025-12-17 11:21:55'),
(25, 17, 12, 2025, 0, 0, 1, 'admission', '2025-12-17 11:22:24', '2025-12-17 11:22:24'),
(26, 18, 12, 2025, 0, 0, 1, 'admission', '2025-12-17 11:32:25', '2025-12-17 11:32:25'),
(27, 1, 10, 2025, 3500, 0, 1, NULL, '2025-12-20 00:17:00', '2025-12-20 00:17:43'),
(28, 1, 8, 2025, 3500, 0, 1, NULL, '2025-12-20 00:17:22', '2025-12-20 00:17:22'),
(29, 1, 5, 2025, 3500, 0, 1, NULL, '2025-12-20 00:17:56', '2025-12-20 00:17:56'),
(30, 1, 11, 2025, 0, 0, 1, NULL, '2025-12-20 00:18:15', '2025-12-20 00:18:15'),
(31, 19, 10, 2025, 3000, 0, 1, 'admission', '2025-12-20 00:19:39', '2025-12-20 00:19:39'),
(32, 20, 12, 2025, 3000, 0, 1, 'admission', '2025-12-22 05:35:09', '2025-12-22 05:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-12-17 07:12:24', '$2y$12$H09FxrzKG3xzyQtYH6oMuuBf1RkQ7GpUuOnWgJJtjm4s6EklSMCbC', '5aKR2INbvI', '2025-12-17 07:12:25', '2025-12-17 07:12:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_floor_id_foreign` (`floor_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_floor_id_foreign` (`floor_id`),
  ADD KEY `students_room_id_foreign` (`room_id`);

--
-- Indexes for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_payments_student_id_month_year_unique` (`student_id`,`month`,`year`);

--
-- Indexes for table `student_stays`
--
ALTER TABLE `student_stays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_stays_student_id_month_year_unique` (`student_id`,`month`,`year`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_payments`
--
ALTER TABLE `student_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student_stays`
--
ALTER TABLE `student_stays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_floor_id_foreign` FOREIGN KEY (`floor_id`) REFERENCES `floors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_payments`
--
ALTER TABLE `student_payments`
  ADD CONSTRAINT `student_payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_stays`
--
ALTER TABLE `student_stays`
  ADD CONSTRAINT `student_stays_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
