-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2022 at 12:10 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bts`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

DROP TABLE IF EXISTS `activations`;
CREATE TABLE IF NOT EXISTS `activations` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `activations_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_activations`
--

DROP TABLE IF EXISTS `admin_activations`;
CREATE TABLE IF NOT EXISTS `admin_activations` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_activations_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
CREATE TABLE IF NOT EXISTS `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `admin_password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `forbidden` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_users_email_deleted_at_unique` (`email`,`deleted_at`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `first_name`, `last_name`, `email`, `password`, `remember_token`, `activated`, `forbidden`, `language`, `deleted_at`, `created_at`, `updated_at`, `last_login_at`) VALUES
(1, 'Administrator', 'Administrator', 'admin@admin.com', '$2y$10$XxfIsPgsz7tGqUrjrQDFGOMuuIaKhh0vnE6H5BFgH.juUgAidjMVG', 'SU0qJ9lXzIOWvE5Ta4lSAwMjJd1IuKSlzwBH4BwqGntGKNbWo6Nus8NodjEy', 1, 0, 'en', NULL, '2022-05-05 02:45:52', '2022-09-08 20:56:01', '2022-09-08 20:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `slug`, `description`, `enabled`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Bettani', 'ahmad-bettani', '<p>Testing Ahmad Series</p>', 1, NULL, '2022-05-08 00:50:10', '2022-05-08 05:13:20'),
(14, 'test', 'test', '<p>test<br></p>', 0, '2022-05-20 20:56:04', '2022-05-16 04:11:07', '2022-05-16 04:11:07'),
(15, 'test', 'test-2', '<p>test<br></p>', 0, '2022-05-20 20:56:04', '2022-05-16 04:11:12', '2022-05-16 04:11:12'),
(16, 'test', 'test-3', '<p>test<br></p>', 0, '2022-05-20 20:56:04', '2022-05-16 04:12:53', '2022-05-16 04:12:53'),
(17, 'test', NULL, '<p>test<br></p>', 0, '2022-05-20 20:56:04', '2022-05-16 04:14:22', '2022-05-16 04:14:22'),
(18, 'test', 'test-4', '<p>test<br></p>', 0, '2022-05-20 20:56:04', '2022-05-16 04:25:12', '2022-05-16 04:25:12'),
(19, 'test', 'test-5', '<p>test<br></p>', 0, '2022-05-20 20:56:04', '2022-05-16 04:25:26', '2022-05-16 04:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `publisher` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'English',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `price` double NOT NULL DEFAULT '0',
  `online_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `ship_amount` double(10,2) NOT NULL DEFAULT '0.00',
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `is_hard` tinyint(1) NOT NULL DEFAULT '1',
  `orderNo` int(11) NOT NULL DEFAULT '99999',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_author_id_foreign` (`author_id`),
  KEY `books_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `status`, `slug`, `description`, `publisher`, `language`, `enabled`, `price`, `online_amount`, `ship_amount`, `author_id`, `category_id`, `is_hard`, `orderNo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, 'test', '<p class=\"mb-0\" style=\"color: rgb(22, 22, 25); font-family: inter, &quot;cerebri sans&quot;, Helvetica, Arial, sans-serif;\">We aim to show you accurate product information. Manufacturers, suppliers and others provide what you see here, and we have not verified it. See our disclaimer</p><p class=\"mb-0\" style=\"color: rgb(22, 22, 25); font-family: inter, &quot;cerebri sans&quot;, Helvetica, Arial, sans-serif;\">#1 New York Times Bestseller</p><p class=\"mb-0\" style=\"color: rgb(22, 22, 25); font-family: inter, &quot;cerebri sans&quot;, Helvetica, Arial, sans-serif;\">A Reese Witherspoon x Hello Sunshine Book Club Pick</p><p class=\"mb-4\" style=\"color: rgb(22, 22, 25); font-family: inter, &quot;cerebri sans&quot;, Helvetica, Arial, sans-serif;\">\"I can\'t even express how much I love this book! I didn\'t want this story to end!\"--Reese Witherspoon</p><p class=\"mb-4\" style=\"color: rgb(22, 22, 25); font-family: inter, &quot;cerebri sans&quot;, Helvetica, Arial, sans-serif;\">\"Painfully beautiful.\"--The New York Times Book Review</p><p style=\"color: rgb(22, 22, 25); font-family: inter, &quot;cerebri sans&quot;, Helvetica, Arial, sans-serif;\">\"Perfect for fans of Barbara Kingsolver.\"--Bustle</p><p class=\"mb-4\" style=\"color: rgb(22, 22, 25); font-family: inter, &quot;cerebri sans&quot;, Helvetica, Arial, sans-serif;\">For years, rumors of the \"Marsh Girl\" have haunted Barkley Cove, a quiet town on the North Carolina coast. So in late 1969, when handsome Chase Andrews is found dead, the locals immediately suspect Kya Clark, the so-called Marsh Girl. But Kya is not what they say. Sensitive and intelligent, she has survived for years alone in the marsh that she calls home, finding friends in the gulls and lessons in the sand. Then the time comes when she yearns to be touched and loved. When two young men from town become intrigued by her wild beauty, Kya opens herself to a new life--until the unthinkable happens.</p><p class=\"mb-4\" style=\"color: rgb(22, 22, 25); font-family: inter, &quot;cerebri sans&quot;, Helvetica, Arial, sans-serif;\">Perfect for fans of Barbara Kingsolver and Karen Russell, Where the Crawdads Sing is at once an exquisite ode to the natural world, a heartbreaking coming-of-age story, and a surprising tale of possible murder. Owens reminds us that we are forever shaped by the children we once were, and that we are all subject to the beautiful and violent secrets that nature keeps</p><p style=\"color: rgb(22, 22, 25); font-family: inter, &quot;cerebri sans&quot;, Helvetica, Arial, sans-serif;\">WHERE THE CRAWDADS LP</p>', 'Bettani Series Group', 'English', 1, 0, 0.00, 0.00, 1, 4, 1, 99999, '2022-05-28 02:54:15', '2022-05-08 01:04:57', '2022-05-28 02:54:15'),
(2, 'Bettani Series', 1, 'bettani-series', '<p>Bettani Series<br></p>', 'Bettani Series', 'English', 1, 0, 0.00, 0.00, 1, 4, 1, 99999, '2022-05-28 02:54:12', '2022-05-10 11:20:07', '2022-05-28 02:54:12'),
(3, 'media test', 1, 'media-test', '<p>media test</p>', 'neyy', 'English', 1, 0, 0.00, 0.00, 1, 4, 1, 99999, '2022-05-28 02:54:10', '2022-05-15 20:46:10', '2022-05-28 02:54:10'),
(4, 'Treasure of Knowledge', 1, 'treasure-of-knowledge', '<p>Treasure of Knowledge&nbsp; ....<br></p>', 'Bettani Series', 'English', 1, 5000, 0.00, 0.00, 1, 3, 1, 99999, '2022-05-28 02:54:07', '2022-05-16 00:19:20', '2022-05-28 02:54:07'),
(5, 'dfsaad', 1, 'dfsaad', '<p>adsfds</p>', 'asdfsd', 'English', 1, 0, 0.00, 0.00, 1, 6, 1, 99999, '2022-05-28 02:54:04', '2022-05-16 02:59:14', '2022-05-28 02:54:04'),
(6, 'test', 1, 'test-2', '<p><span style=\"background-color: rgb(237, 243, 254);\">test</span><br></p>', 'neyy', 'English', 1, 0, 0.00, 0.00, 1, 5, 1, 99999, '2022-05-28 02:54:01', '2022-05-16 04:27:22', '2022-05-28 02:54:01'),
(7, 'Bettani Series 1', 4, 'bettani-series-1', '<p>Bettani Series 1<br></p>', 'Bettani Series', 'English', 1, 500, 10.00, 100.00, 1, 5, 1, 99999, NULL, '2022-05-28 02:55:03', '2022-07-29 23:05:15'),
(8, 'Book 2', 2, 'book-2', NULL, 'Bettani Series', 'English', 1, 10, 0.00, 0.00, 1, 5, 0, 1, NULL, '2022-05-29 10:58:02', '2022-07-14 10:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `enabled`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', '<p>fdsafadfs</p>', 0, '2022-05-30 00:59:27', '2022-05-05 02:59:48', '2022-05-08 05:13:24'),
(2, 'gfgfgf', 'fggfsgf', '<p>fsgfs</p>', 0, '2022-05-30 00:59:27', '2022-05-05 05:04:25', '2022-05-05 06:01:43'),
(3, 'dafads', 'dafads', '<p>adsfas</p>', 1, '2022-05-30 00:59:27', '2022-05-05 06:01:19', '2022-05-06 01:28:22'),
(4, 'test slug working or notfadsadsfadadsfdfs', 'test-slug-working-or-notfadsadsfadadsfdfs', '<p>test slug working or not<br></p>', 1, '2022-05-30 00:59:27', '2022-05-05 09:25:53', '2022-05-05 09:29:59'),
(5, 'book', 'book', '<p>book<br></p>', 1, NULL, '2022-05-16 02:47:00', '2022-05-16 02:47:00'),
(6, 'book', 'book-2', '<p>book<br></p>', 1, NULL, '2022-05-16 02:51:04', '2022-05-16 02:51:04'),
(7, 'book', 'book-3', '<p>book<br></p>', 1, '2022-05-16 02:59:21', '2022-05-16 02:57:57', '2022-05-16 02:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `question_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_question_id_foreign` (`question_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `user_id`, `status`, `question_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(51, 'IMRAN', 'test', NULL, '0', 18, NULL, '2022-07-29 23:15:06', '2022-07-29 23:15:06'),
(52, 'IMRAN', NULL, NULL, '0', 19, NULL, '2022-07-29 23:28:01', '2022-07-29 23:28:01'),
(53, 'IMRAN', 'gdsdfgdf', NULL, '0', 19, NULL, '2022-07-29 23:29:04', '2022-07-29 23:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `media_uuid_unique` (`uuid`),
  KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  KEY `media_order_column_index` (`order_column`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(3, 'Brackets\\AdminAuth\\Models\\AdminUser', 1, 'afbf5cdf-36c2-4424-9aa8-e8b4b06e800d', 'avatar', 'e8f8H3RFxPdltQ1zUqdwtkjYR1lqA3iG55YatWou', 'e8f8H3RFxPdltQ1zUqdwtkjYR1lqA3iG55YatWou.png', 'image/png', 'media', 'media', 18453, '[]', '{\"name\": \"6a78913c131cfcd539813bd4b7c42459.png\", \"width\": 783, \"height\": 359, \"file_name\": \"6a78913c131cfcd539813bd4b7c42459.png\"}', '{\"thumb_75\": true, \"thumb_150\": true, \"thumb_200\": true}', '[]', 3, '2022-05-05 05:45:38', '2022-05-05 05:45:39'),
(2, 'App\\Models\\Category', 2, 'b42d8849-69f2-4980-ba4b-03b431179d9e', 'gallery', 'vsUCNk5KvmZyjVPtlLz7Wt9ms1bLVedjRMaM1x9J', 'vsUCNk5KvmZyjVPtlLz7Wt9ms1bLVedjRMaM1x9J.png', 'image/png', 'media', 'media', 18453, '[]', '{\"name\": \"6a78913c131cfcd539813bd4b7c42459.png\", \"width\": 783, \"height\": 359, \"file_name\": \"6a78913c131cfcd539813bd4b7c42459.png\"}', '[]', '[]', 2, '2022-05-05 05:04:25', '2022-05-05 05:04:25'),
(4, 'App\\Models\\Category', 3, '8b0ea7b2-00d6-4602-90b6-a3b22cd84138', 'category', 'KhLkvQzXGVc8KQySRNauf14xgNnFMdycOvDA57Bv', 'KhLkvQzXGVc8KQySRNauf14xgNnFMdycOvDA57Bv.png', 'image/png', 'media', 'media', 18453, '[]', '{\"name\": \"6a78913c131cfcd539813bd4b7c42459.png\", \"width\": 783, \"height\": 359, \"file_name\": \"6a78913c131cfcd539813bd4b7c42459.png\"}', '[]', '[]', 4, '2022-05-05 06:01:19', '2022-05-05 06:01:19'),
(5, 'App\\Models\\Category', 1, '328c1349-dbb2-4747-af60-6d97990b5bfc', 'category', '1y0U6VMOQyFAuVjGtKRNKYASGm2A9v65L0Ud2Adp', '1y0U6VMOQyFAuVjGtKRNKYASGm2A9v65L0Ud2Adp.png', 'image/png', 'media', 'media', 18453, '[]', '{\"name\": \"6a78913c131cfcd539813bd4b7c42459.png\", \"width\": 783, \"height\": 359, \"file_name\": \"6a78913c131cfcd539813bd4b7c42459.png\"}', '[]', '[]', 5, '2022-05-05 09:34:07', '2022-05-05 09:34:07'),
(23, 'App\\Models\\Setting', 1, '751f66bc-d477-424d-9657-680f56fd1e10', 'settings', 'ABCcdQG5zEblZHsSDuFGDrsy6JfiWFab5nvwsjbw', 'ABCcdQG5zEblZHsSDuFGDrsy6JfiWFab5nvwsjbw.png', 'image/png', 'media', 'media', 509864, '[]', '{\"name\": \"bts.png\", \"width\": 1280, \"height\": 512, \"file_name\": \"bts.png\"}', '{\"footer\": true, \"header\": true, \"thumb_200\": true}', '[]', 16, '2022-05-25 22:54:24', '2022-05-25 22:54:25'),
(7, 'App\\Models\\Section', 2, '8df413a3-f28e-4daf-958b-2f5f8b7d5515', 'sections', '85Q6UB1TUi31uPymlQKO9jiq50xAEZ5lPtXqchYI', '85Q6UB1TUi31uPymlQKO9jiq50xAEZ5lPtXqchYI.png', 'image/png', 'media', 'media', 18453, '[]', '{\"name\": \"6a78913c131cfcd539813bd4b7c42459.png\", \"width\": 783, \"height\": 359, \"file_name\": \"6a78913c131cfcd539813bd4b7c42459.png\"}', '[]', '[]', 7, '2022-05-08 04:59:45', '2022-05-08 04:59:45'),
(8, 'App\\Models\\Book', 3, '3494b93a-2b82-43b3-b420-bd008ddd5118', 'books', 'aDz5cpx3VmgQNCnDXCKXqADoXjgnExUzRNKNWTPU', 'aDz5cpx3VmgQNCnDXCKXqADoXjgnExUzRNKNWTPU.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"thumb_200\": true}', '[]', 8, '2022-05-15 20:46:11', '2022-05-15 20:46:13'),
(10, 'App\\Models\\Category', 4, '02d8ac71-23b2-4c6e-9cc7-508169303788', 'category', '1ZjeqrlGFesyPafxUvRKOiWp3nCoApgZFT3q2ecn', '1ZjeqrlGFesyPafxUvRKOiWp3nCoApgZFT3q2ecn.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"thumb_200\": true}', '[]', 9, '2022-05-15 21:45:35', '2022-05-15 21:45:36'),
(12, 'App\\Models\\Section', 8, '6efdd3d7-f8dd-45a5-9cb0-a6931a9c0564', 'sections', 'un8iEkqqEmIniMtG7Rh4vZzNHBLp5C0CJIhPsjwD', 'un8iEkqqEmIniMtG7Rh4vZzNHBLp5C0CJIhPsjwD.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"thumb_200\": true}', '[]', 10, '2022-05-15 21:51:17', '2022-05-15 21:51:17'),
(13, 'App\\Models\\Book', 4, '56535686-8eb3-42da-bc0a-37d7ab9a62a7', 'books', 'KiLENDaC9RzYs95qJB8BFKx0FS0QHeyNBHm1IeXD', 'KiLENDaC9RzYs95qJB8BFKx0FS0QHeyNBHm1IeXD.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"thumb_200\": true}', '[]', 11, '2022-05-16 00:19:20', '2022-05-16 00:19:22'),
(14, 'App\\Models\\Question', 3, '9f7d3d4d-134c-4035-aa84-da6e402cd667', 'question', 'aBkyWsiZ5gSafUmonWzL84X2o0hP0JWWLOFQZc92', 'aBkyWsiZ5gSafUmonWzL84X2o0hP0JWWLOFQZc92.jpg', 'image/jpeg', 'media', 'media', 358946, '[]', '{\"name\": \"281099102_5077616082317193_6602845933633843724_n.jpg\", \"width\": 2048, \"height\": 2032, \"file_name\": \"281099102_5077616082317193_6602845933633843724_n.jpg\"}', '{\"thumb_200\": true}', '[]', 12, '2022-05-19 11:20:54', '2022-05-19 11:20:56'),
(15, 'App\\Models\\Question', 3, '52798efc-f993-49d6-ad61-65a60b33c054', 'answer_attachment', 'V7n51gQ4mH68HMCXJ50WtIGSDuujkmGCdSaNwdL0', 'V7n51gQ4mH68HMCXJ50WtIGSDuujkmGCdSaNwdL0.jpg', 'image/jpeg', 'media', 'media', 357285, '[]', '{\"name\": \"281118877_5077615928983875_3453297545709699121_n.jpg\", \"width\": 2048, \"height\": 1953, \"file_name\": \"281118877_5077615928983875_3453297545709699121_n.jpg\"}', '{\"thumb_200\": true}', '[]', 13, '2022-05-19 11:20:56', '2022-05-19 11:20:57'),
(17, 'App\\Models\\Author', 1, '7bd228ff-47aa-462c-be25-d043ea996b4f', 'authors', '7JVKBNtswbrBH2YWIyWLhawfdRcZ9jnQ4Ph0ymVn', '7JVKBNtswbrBH2YWIyWLhawfdRcZ9jnQ4Ph0ymVn.jpg', 'image/jpeg', 'media', 'media', 469605, '[]', '{\"name\": \"147525033_5367906726560406_1519664107173435721_n.jpg\", \"width\": 1667, \"height\": 1250, \"file_name\": \"147525033_5367906726560406_1519664107173435721_n.jpg\"}', '{\"thumb_200\": true, \"thumbnail\": true}', '[]', 14, '2022-05-23 21:43:57', '2022-05-23 21:43:58'),
(24, 'App\\Models\\Book', 2, '1d3b5d78-f6f5-419f-8bda-35af521a9e39', 'books', 'UpVCs60TifU2jDAVigem3DSH9C34vOLgx3qseGz4', 'UpVCs60TifU2jDAVigem3DSH9C34vOLgx3qseGz4.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"150x226\": true, \"300x452\": true, \"thumb_200\": true}', '[]', 17, '2022-05-25 23:37:28', '2022-05-25 23:37:30'),
(20, 'App\\Models\\Book', 1, '1d29bfc1-72ee-4419-b057-4a310ad2dbbe', 'books', 'RKhJ6ePr1Squf9CQo2LZgBthcwCTBROecGLW8EGc', 'RKhJ6ePr1Squf9CQo2LZgBthcwCTBROecGLW8EGc.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"150x226\": true, \"300x452\": true, \"thumb_200\": true}', '[]', 15, '2022-05-25 21:53:18', '2022-05-25 21:53:20'),
(26, 'App\\Models\\Book', 6, 'e4990180-632a-459f-bb06-0a8501fd0b6c', 'books', '6hwKGaxIBt9nqwnzaCEujEgEes4enY37I9M3rzrd', '6hwKGaxIBt9nqwnzaCEujEgEes4enY37I9M3rzrd.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"150x226\": true, \"300x452\": true, \"thumb_200\": true}', '[]', 18, '2022-05-26 22:16:30', '2022-05-26 22:16:32'),
(27, 'App\\Models\\Section', 1, 'a00cf220-27a0-40ab-8537-7192958b1b5d', 'sections', 'IlfSOpcIaVm5ZMifwhhWnqqbFLoGDPTPzobEb1fi', 'IlfSOpcIaVm5ZMifwhhWnqqbFLoGDPTPzobEb1fi.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"120x180\": true, \"thumb_200\": true}', '[]', 19, '2022-05-26 23:09:40', '2022-05-26 23:09:41'),
(28, 'App\\Models\\Book', 7, '58689501-8468-4fa4-bcac-a529061035da', 'books', 'hWFLcBKbUDOtUyGCOsyD12BBbp6y1yJ0GO6a1xCG', 'hWFLcBKbUDOtUyGCOsyD12BBbp6y1yJ0GO6a1xCG.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"150x226\": true, \"300x452\": true, \"thumb_200\": true}', '[]', 20, '2022-05-28 02:55:04', '2022-05-28 02:55:07'),
(29, 'App\\Models\\Section', 4, '4581eed2-7c42-41a6-b1b9-eff2f09e91cb', 'sections', 'myLTGvmsD2dgcjJOL41yZYmRWYE6EMAEv2q4CUB7', 'myLTGvmsD2dgcjJOL41yZYmRWYE6EMAEv2q4CUB7.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"120x180\": true, \"thumb_200\": true}', '[]', 21, '2022-05-28 03:00:36', '2022-05-28 03:00:38'),
(30, 'App\\Models\\Question', 5, '6a960c29-1382-4bd5-a5e0-92e92650c31f', 'question', 'GDYfCIfxarbQlREgb42ZiubeM1arjlLkJvL6ZcWd', 'GDYfCIfxarbQlREgb42ZiubeM1arjlLkJvL6ZcWd.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"thumb_200\": true}', '[]', 22, '2022-05-28 07:56:47', '2022-05-28 07:56:47'),
(31, 'App\\Models\\Question', 5, '504598e2-a616-4e38-b4d7-ec0e3d6fbd4d', 'answer_attachment', 'Sr1GaMXkpBBTp19GNH2dqUQ3IAj4UUfg0VOsYjig', 'Sr1GaMXkpBBTp19GNH2dqUQ3IAj4UUfg0VOsYjig.png', 'image/png', 'media', 'media', 509864, '[]', '{\"name\": \"bts.png\", \"width\": 1280, \"height\": 512, \"file_name\": \"bts.png\"}', '{\"thumb_200\": true}', '[]', 23, '2022-05-28 07:56:47', '2022-05-28 07:56:48'),
(32, 'App\\Models\\Book', 8, 'ed1d5258-8d5e-4946-87b3-16cace0b4c94', 'books', 'OtV3QeFFqfvnp8zLyIunITaE4mCHxZSoK4xXf7CQ', 'OtV3QeFFqfvnp8zLyIunITaE4mCHxZSoK4xXf7CQ.png', 'image/png', 'media', 'media', 524111, '[]', '{\"name\": \"screencapture-127-0-0-1-8000-section-details-biology-2022-05-28-18_30_44.png\", \"width\": 1920, \"height\": 2216, \"file_name\": \"screencapture-127-0-0-1-8000-section-details-biology-2022-05-28-18_30_44.png\"}', '{\"150x226\": true, \"300x452\": true, \"thumb_200\": true}', '[]', 24, '2022-05-29 10:58:03', '2022-05-29 10:58:06'),
(33, 'App\\Models\\Section', 5, '1827a2c4-3699-4159-8939-f791fb378acd', 'sections', 'jw8OhesW5OSEFmt4sSLJve1cd4GM0HfNKPk84iNi', 'jw8OhesW5OSEFmt4sSLJve1cd4GM0HfNKPk84iNi.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"120x180\": true, \"thumb_200\": true}', '[]', 25, '2022-05-30 01:22:05', '2022-05-30 01:22:08'),
(34, 'App\\Models\\Section', 6, '33414135-e9c3-4390-a468-e689c3cc0658', 'sections', 'VtmOWt4UT433DMIipUubX2Is3scCjkgoRBFQN2Hg', 'VtmOWt4UT433DMIipUubX2Is3scCjkgoRBFQN2Hg.jpg', 'image/jpeg', 'media', 'media', 1815047, '[]', '{\"name\": \"qca poster.jpg\", \"width\": 2000, \"height\": 2000, \"file_name\": \"qca poster.jpg\"}', '{\"120x180\": true, \"thumb_200\": true}', '[]', 26, '2022-05-30 09:30:13', '2022-05-30 09:30:16'),
(35, 'App\\Models\\Section', 8, 'c548e3d6-588d-4a34-a026-f3310327f8bb', 'sections', 'SdH5EeTkkAJXUblStUDL2leraqVGANhiRsaggc7s', 'SdH5EeTkkAJXUblStUDL2leraqVGANhiRsaggc7s.png', 'image/png', 'media', 'media', 158228, '[]', '{\"name\": \"screencapture-builder-zety-resume-final-resume-2022-05-24-14_44_40.png\", \"width\": 759, \"height\": 1685, \"file_name\": \"screencapture-builder-zety-resume-final-resume-2022-05-24-14_44_40.png\"}', '{\"120x180\": true, \"thumb_200\": true}', '[]', 27, '2022-06-02 11:59:50', '2022-06-02 11:59:52'),
(36, 'App\\Models\\Slide', 2, '779e16c0-7e01-46ea-8a6d-3a75617163b0', 'slide', 'Cyis82uBXVC3J84EzsZhp9sIAklP9XBwwTjkKjBO', 'Cyis82uBXVC3J84EzsZhp9sIAklP9XBwwTjkKjBO.png', 'image/png', 'media', 'media', 25920, '[]', '{\"name\": \"kpitb-logo_0.png\", \"width\": 428, \"height\": 102, \"file_name\": \"kpitb-logo_0.png\"}', '{\"685x360\": true, \"thumb_200\": true}', '[]', 28, '2022-06-30 11:28:46', '2022-06-30 11:28:48'),
(37, 'App\\Models\\Slide', 4, 'b04a6698-cf1a-4aae-94f6-cb535d54e4a2', 'slide', 'hG6kA6YyQYfAufiNG2oJXJujPbwRKaaqqUj1Im6K', 'hG6kA6YyQYfAufiNG2oJXJujPbwRKaaqqUj1Im6K.png', 'image/png', 'media', 'media', 110460, '[]', '{\"name\": \"img1.png\", \"width\": 800, \"height\": 420, \"file_name\": \"img1.png\"}', '{\"800x420\": true, \"thumb_200\": true}', '[]', 29, '2022-06-30 11:42:43', '2022-06-30 11:42:44'),
(39, 'App\\Models\\Book', 8, '82148881-fcb5-4662-98ef-c716c88dfb21', 'pdf', 'Ir1pE3ZnAoduPxSSA7A1nbtzrBxkRzqzfCazSFq6', 'Ir1pE3ZnAoduPxSSA7A1nbtzrBxkRzqzfCazSFq6.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'media', 'media', 13951, '[]', '{\"name\": \"cover letters.docx\", \"file_name\": \"cover letters.docx\"}', '[]', '[]', 31, '2022-06-30 22:09:31', '2022-06-30 22:09:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2014_10_12_000000_create_users_table', 23),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_24_000000_create_activations_table', 1),
(4, '2017_08_24_000000_create_admin_activations_table', 1),
(5, '2017_08_24_000000_create_admin_password_resets_table', 1),
(6, '2017_08_24_000000_create_admin_users_table', 1),
(7, '2018_07_18_000000_create_wysiwyg_media_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2020_10_21_000000_add_last_login_at_timestamp_to_admin_users_table', 1),
(11, '2022_05_05_073903_create_media_table', 1),
(12, '2022_05_05_073903_create_permission_tables', 1),
(13, '2022_05_05_073908_fill_default_admin_user_and_permissions', 1),
(14, '2022_05_05_074550_create_translations_table', 2),
(15, '2022_05_05_075203_create_categories_table', 3),
(16, '2022_05_05_075814_fill_permissions_for_category', 4),
(44, '2022_06_01_161042_fill_permissions_for_user', 24),
(18, '2022_05_05_141331_fill_permissions_for_post', 6),
(26, '2022_05_07_052328_fill_permissions_for_book', 11),
(25, '2022_05_06_061504_create_books_table', 11),
(24, '2022_05_07_112657_fill_permissions_for_setting', 10),
(23, '2022_05_07_104030_create_settings_table', 9),
(27, '2022_05_08_051309_create_authors_table', 11),
(28, '2022_05_08_052009_fill_permissions_for_author', 12),
(39, '2022_05_08_081712_create_sections_table', 21),
(30, '2022_05_08_082557_fill_permissions_for_section', 14),
(31, '2022_05_08_082605_fill_permissions_for_role', 15),
(32, '2022_05_09_152528_create_units_table', 16),
(33, '2022_05_09_153318_fill_permissions_for_unit', 17),
(41, '2022_05_11_163214_create_questions_table', 22),
(40, '2022_05_12_074257_fill_permissions_for_question', 21),
(45, '2022_06_11_060115_create_order_hds_table', 25),
(49, '2022_06_12_032501_create_orderItems_table', 26),
(50, '2022_06_22_142204_create_comments_table', 27),
(51, '2022_06_22_143001_fill_permissions_for_comment', 28),
(52, '2022_06_22_143726_fill_permissions_for_orderhd', 29),
(53, '2022_06_22_143752_fill_permissions_for_order-hd', 30),
(54, '2022_06_28_031705_create_slides_table', 31),
(55, '2022_06_28_032105_fill_permissions_for_slide', 32),
(56, '2022_05_06_061504_create_tests_table', 33),
(57, '2022_08_02_025905_create_quizzes_table', 33),
(58, '2022_08_02_030751_create_quiz_questions_table', 33),
(59, '2022_08_21_135045_fill_permissions_for_test', 33),
(61, '2022_09_03_034536_add_user_id_to_quiz_questions', 34),
(62, '2022_09_04_062117_add_test_id_to_questions', 35),
(63, '2022_09_06_092126_create_test_applies_table', 36);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'Brackets\\AdminAuth\\Models\\AdminUser', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_hds`
--

DROP TABLE IF EXISTS `order_hds`;
CREATE TABLE IF NOT EXISTS `order_hds` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `session_id` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '''1 for new \\r\\n2 awating response\\r\\n3 confirm order \\r\\n4 in production\\r\\n5 ready to ship \\r\\n6 delivered '';',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneno` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orderNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `ship_amount` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_hds`
--

INSERT INTO `order_hds` (`id`, `session_id`, `status`, `user_id`, `name`, `email`, `phoneno`, `address`, `company`, `amount`, `deleted_at`, `created_at`, `updated_at`, `orderNo`, `expired_at`, `city`, `state`, `zip`, `note`, `paid`, `payment_method`, `transaction_no`, `transaction_attachment`, `type`, `model_id`, `ship_amount`, `quantity`) VALUES
(11, 'zvUisjx45TkYCuJZ4vT2i5muUBTVZOiqWm4LMKyP', 2, 1, 'IMRAN ALI', 'admin@admin.com', 'admin@admin.com', NULL, NULL, 10, NULL, '2022-07-04 12:37:54', '2022-07-04 12:41:33', '82659', NULL, NULL, NULL, NULL, NULL, 1, 'bacs', '23433434', 'cufNq1656956274.png', 'read', NULL, NULL, 1),
(10, '5FDy0EJTXZf6omCLMOYAlJ40Mpw4MUoAOHm7sQ9J', 2, 7, 'Imran ali', 'khanwali@gmail.com', '03133434572', 'add', NULL, 10, NULL, '2022-07-04 10:12:31', '2022-07-04 10:13:54', '27879', NULL, NULL, NULL, NULL, 'asfdadfsadf', 1, 'bacs', '343', 'QHBIp1656947551.png', 'read', NULL, NULL, 1),
(12, 'BVPXFFmM1ckPUWcehz6Pzgcbgd11Bv3PYRDoqLs5', 1, 1, 'IMRAN ALI', 'admin@admin.com', 'admin@admin.com', 'Haymarket', NULL, 600, NULL, '2022-07-14 10:00:28', '2022-07-14 10:00:28', '99065', NULL, '', '', NULL, NULL, 0, 'bacs', 'adsfds', NULL, 'order', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderhd_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` bigint(20) UNSIGNED DEFAULT NULL,
  `collection_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `shipment` double(10,2) NOT NULL DEFAULT '0.00',
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `total` double NOT NULL DEFAULT '0',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `session_id`, `orderhd_id`, `user_id`, `model_type`, `model_id`, `collection_name`, `amount`, `shipment`, `quantity`, `total`, `status`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(67, 'zvUisjx45TkYCuJZ4vT2i5muUBTVZOiqWm4LMKyP', NULL, 1, 'App\\Models\\Book', 7, 'books', 10, 0.00, '1', 500, '0', 'read', '2022-07-04 12:35:52', '2022-07-04 12:37:01', '2022-07-04 12:37:01'),
(68, 'zvUisjx45TkYCuJZ4vT2i5muUBTVZOiqWm4LMKyP', 11, 1, 'App\\Models\\Book', 7, 'books', 10, 0.00, '1', 10, '1', 'read', '2022-07-04 12:37:39', '2022-07-14 09:59:16', '2022-07-14 09:59:16'),
(69, 'sO1yBuIDBPrro7ELAgEc8VuKkXPsUWMNvCC3W5lA', 12, 1, 'App\\Models\\Book', 7, 'books', 500, 100.00, '1', 500, '1', 'order', '2022-07-14 09:59:09', '2022-08-26 09:06:49', '2022-08-26 09:06:49'),
(70, 'DLsoP11xsYtzBewf4xSmhYNHqtYJDoT1LDYUgmX2', NULL, 1, 'App\\Models\\Book', 8, 'books', 0, 0.00, '1', 0, '0', 'read', '2022-08-26 09:07:05', '2022-08-26 09:07:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(2, 'admin.translation.index', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(3, 'admin.translation.edit', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(4, 'admin.translation.rescan', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(5, 'admin.admin-user.index', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(6, 'admin.admin-user.create', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(7, 'admin.admin-user.edit', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(8, 'admin.admin-user.delete', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(9, 'admin.upload', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(10, 'admin.admin-user.impersonal-login', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52'),
(11, 'admin.category', 'admin', '2022-05-05 02:58:16', '2022-05-05 02:58:16'),
(12, 'admin.category.index', 'admin', '2022-05-05 02:58:16', '2022-05-05 02:58:16'),
(13, 'admin.category.create', 'admin', '2022-05-05 02:58:16', '2022-05-05 02:58:16'),
(14, 'admin.category.show', 'admin', '2022-05-05 02:58:16', '2022-05-05 02:58:16'),
(15, 'admin.category.edit', 'admin', '2022-05-05 02:58:16', '2022-05-05 02:58:16'),
(16, 'admin.category.delete', 'admin', '2022-05-05 02:58:16', '2022-05-05 02:58:16'),
(17, 'admin.category.bulk-delete', 'admin', '2022-05-05 02:58:16', '2022-05-05 02:58:16'),
(54, 'admin.author.index', 'admin', '2022-05-08 00:20:18', '2022-05-08 00:20:18'),
(53, 'admin.author', 'admin', '2022-05-08 00:20:18', '2022-05-08 00:20:18'),
(52, 'admin.book.bulk-delete', 'admin', '2022-05-08 00:19:20', '2022-05-08 00:19:20'),
(51, 'admin.book.delete', 'admin', '2022-05-08 00:19:20', '2022-05-08 00:19:20'),
(50, 'admin.book.edit', 'admin', '2022-05-08 00:19:20', '2022-05-08 00:19:20'),
(49, 'admin.book.show', 'admin', '2022-05-08 00:19:20', '2022-05-08 00:19:20'),
(48, 'admin.book.create', 'admin', '2022-05-08 00:19:20', '2022-05-08 00:19:20'),
(47, 'admin.book.index', 'admin', '2022-05-08 00:19:20', '2022-05-08 00:19:20'),
(46, 'admin.book', 'admin', '2022-05-08 00:19:20', '2022-05-08 00:19:20'),
(45, 'admin.setting.bulk-delete', 'admin', '2022-05-07 06:27:03', '2022-05-07 06:27:03'),
(44, 'admin.setting.delete', 'admin', '2022-05-07 06:27:03', '2022-05-07 06:27:03'),
(43, 'admin.setting.edit', 'admin', '2022-05-07 06:27:03', '2022-05-07 06:27:03'),
(42, 'admin.setting.show', 'admin', '2022-05-07 06:27:03', '2022-05-07 06:27:03'),
(41, 'admin.setting.create', 'admin', '2022-05-07 06:27:03', '2022-05-07 06:27:03'),
(40, 'admin.setting.index', 'admin', '2022-05-07 06:27:03', '2022-05-07 06:27:03'),
(39, 'admin.setting', 'admin', '2022-05-07 06:27:03', '2022-05-07 06:27:03'),
(55, 'admin.author.create', 'admin', '2022-05-08 00:20:18', '2022-05-08 00:20:18'),
(56, 'admin.author.show', 'admin', '2022-05-08 00:20:18', '2022-05-08 00:20:18'),
(57, 'admin.author.edit', 'admin', '2022-05-08 00:20:18', '2022-05-08 00:20:18'),
(58, 'admin.author.delete', 'admin', '2022-05-08 00:20:18', '2022-05-08 00:20:18'),
(59, 'admin.author.bulk-delete', 'admin', '2022-05-08 00:20:18', '2022-05-08 00:20:18'),
(60, 'admin.section', 'admin', '2022-05-08 03:25:59', '2022-05-08 03:25:59'),
(61, 'admin.section.index', 'admin', '2022-05-08 03:25:59', '2022-05-08 03:25:59'),
(62, 'admin.section.create', 'admin', '2022-05-08 03:25:59', '2022-05-08 03:25:59'),
(63, 'admin.section.show', 'admin', '2022-05-08 03:25:59', '2022-05-08 03:25:59'),
(64, 'admin.section.edit', 'admin', '2022-05-08 03:25:59', '2022-05-08 03:25:59'),
(65, 'admin.section.delete', 'admin', '2022-05-08 03:25:59', '2022-05-08 03:25:59'),
(66, 'admin.section.bulk-delete', 'admin', '2022-05-08 03:25:59', '2022-05-08 03:25:59'),
(67, 'admin.role', 'admin', '2022-05-08 03:26:09', '2022-05-08 03:26:09'),
(68, 'admin.role.index', 'admin', '2022-05-08 03:26:09', '2022-05-08 03:26:09'),
(69, 'admin.role.create', 'admin', '2022-05-08 03:26:09', '2022-05-08 03:26:09'),
(70, 'admin.role.show', 'admin', '2022-05-08 03:26:09', '2022-05-08 03:26:09'),
(71, 'admin.role.edit', 'admin', '2022-05-08 03:26:09', '2022-05-08 03:26:09'),
(72, 'admin.role.delete', 'admin', '2022-05-08 03:26:09', '2022-05-08 03:26:09'),
(73, 'admin.role.bulk-delete', 'admin', '2022-05-08 03:26:09', '2022-05-08 03:26:09'),
(74, 'admin.unit', 'admin', '2022-05-09 10:33:20', '2022-05-09 10:33:20'),
(75, 'admin.unit.index', 'admin', '2022-05-09 10:33:20', '2022-05-09 10:33:20'),
(76, 'admin.unit.create', 'admin', '2022-05-09 10:33:20', '2022-05-09 10:33:20'),
(77, 'admin.unit.show', 'admin', '2022-05-09 10:33:20', '2022-05-09 10:33:20'),
(78, 'admin.unit.edit', 'admin', '2022-05-09 10:33:20', '2022-05-09 10:33:20'),
(79, 'admin.unit.delete', 'admin', '2022-05-09 10:33:20', '2022-05-09 10:33:20'),
(80, 'admin.unit.bulk-delete', 'admin', '2022-05-09 10:33:20', '2022-05-09 10:33:20'),
(81, 'admin.question', 'admin', '2022-05-12 02:43:00', '2022-05-12 02:43:00'),
(82, 'admin.question.index', 'admin', '2022-05-12 02:43:00', '2022-05-12 02:43:00'),
(83, 'admin.question.create', 'admin', '2022-05-12 02:43:00', '2022-05-12 02:43:00'),
(84, 'admin.question.show', 'admin', '2022-05-12 02:43:00', '2022-05-12 02:43:00'),
(85, 'admin.question.edit', 'admin', '2022-05-12 02:43:00', '2022-05-12 02:43:00'),
(86, 'admin.question.delete', 'admin', '2022-05-12 02:43:00', '2022-05-12 02:43:00'),
(87, 'admin.question.bulk-delete', 'admin', '2022-05-12 02:43:00', '2022-05-12 02:43:00'),
(88, 'admin.user', 'admin', '2022-06-01 11:10:45', '2022-06-01 11:10:45'),
(89, 'admin.user.index', 'admin', '2022-06-01 11:10:45', '2022-06-01 11:10:45'),
(90, 'admin.user.create', 'admin', '2022-06-01 11:10:45', '2022-06-01 11:10:45'),
(91, 'admin.user.show', 'admin', '2022-06-01 11:10:45', '2022-06-01 11:10:45'),
(92, 'admin.user.edit', 'admin', '2022-06-01 11:10:45', '2022-06-01 11:10:45'),
(93, 'admin.user.delete', 'admin', '2022-06-01 11:10:45', '2022-06-01 11:10:45'),
(94, 'admin.user.bulk-delete', 'admin', '2022-06-01 11:10:45', '2022-06-01 11:10:45'),
(95, 'admin.comment', 'admin', '2022-06-22 09:31:14', '2022-06-22 09:31:14'),
(96, 'admin.comment.index', 'admin', '2022-06-22 09:31:14', '2022-06-22 09:31:14'),
(97, 'admin.comment.create', 'admin', '2022-06-22 09:31:14', '2022-06-22 09:31:14'),
(98, 'admin.comment.show', 'admin', '2022-06-22 09:31:14', '2022-06-22 09:31:14'),
(99, 'admin.comment.edit', 'admin', '2022-06-22 09:31:14', '2022-06-22 09:31:14'),
(100, 'admin.comment.delete', 'admin', '2022-06-22 09:31:14', '2022-06-22 09:31:14'),
(101, 'admin.comment.bulk-delete', 'admin', '2022-06-22 09:31:14', '2022-06-22 09:31:14'),
(102, 'admin.orderhd', 'admin', '2022-06-22 09:37:38', '2022-06-22 09:37:38'),
(103, 'admin.orderhd.index', 'admin', '2022-06-22 09:37:38', '2022-06-22 09:37:38'),
(104, 'admin.orderhd.create', 'admin', '2022-06-22 09:37:38', '2022-06-22 09:37:38'),
(105, 'admin.orderhd.show', 'admin', '2022-06-22 09:37:38', '2022-06-22 09:37:38'),
(106, 'admin.orderhd.edit', 'admin', '2022-06-22 09:37:38', '2022-06-22 09:37:38'),
(107, 'admin.orderhd.delete', 'admin', '2022-06-22 09:37:38', '2022-06-22 09:37:38'),
(108, 'admin.orderhd.bulk-delete', 'admin', '2022-06-22 09:37:38', '2022-06-22 09:37:38'),
(109, 'admin.order-hd', 'admin', '2022-06-22 09:37:58', '2022-06-22 09:37:58'),
(110, 'admin.order-hd.index', 'admin', '2022-06-22 09:37:58', '2022-06-22 09:37:58'),
(111, 'admin.order-hd.create', 'admin', '2022-06-22 09:37:58', '2022-06-22 09:37:58'),
(112, 'admin.order-hd.show', 'admin', '2022-06-22 09:37:58', '2022-06-22 09:37:58'),
(113, 'admin.order-hd.edit', 'admin', '2022-06-22 09:37:58', '2022-06-22 09:37:58'),
(114, 'admin.order-hd.delete', 'admin', '2022-06-22 09:37:58', '2022-06-22 09:37:58'),
(115, 'admin.order-hd.bulk-delete', 'admin', '2022-06-22 09:37:58', '2022-06-22 09:37:58'),
(116, 'admin.slide', 'admin', '2022-06-28 10:21:20', '2022-06-28 10:21:20'),
(117, 'admin.slide.index', 'admin', '2022-06-28 10:21:20', '2022-06-28 10:21:20'),
(118, 'admin.slide.create', 'admin', '2022-06-28 10:21:20', '2022-06-28 10:21:20'),
(119, 'admin.slide.show', 'admin', '2022-06-28 10:21:20', '2022-06-28 10:21:20'),
(120, 'admin.slide.edit', 'admin', '2022-06-28 10:21:20', '2022-06-28 10:21:20'),
(121, 'admin.slide.delete', 'admin', '2022-06-28 10:21:20', '2022-06-28 10:21:20'),
(122, 'admin.slide.bulk-delete', 'admin', '2022-06-28 10:21:20', '2022-06-28 10:21:20'),
(123, 'admin.test', 'admin', '2022-08-24 09:38:17', '2022-08-24 09:38:17'),
(124, 'admin.test.index', 'admin', '2022-08-24 09:38:17', '2022-08-24 09:38:17'),
(125, 'admin.test.create', 'admin', '2022-08-24 09:38:17', '2022-08-24 09:38:17'),
(126, 'admin.test.show', 'admin', '2022-08-24 09:38:17', '2022-08-24 09:38:17'),
(127, 'admin.test.edit', 'admin', '2022-08-24 09:38:17', '2022-08-24 09:38:17'),
(128, 'admin.test.delete', 'admin', '2022-08-24 09:38:17', '2022-08-24 09:38:17'),
(129, 'admin.test.bulk-delete', 'admin', '2022-08-24 09:38:17', '2022-08-24 09:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marks` int(191) DEFAULT '1',
  `order` int(11) DEFAULT '9999',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'm',
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '1',
  `explanation` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `belong_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'book',
  `test_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_unit_id_foreign` (`unit_id`),
  KEY `questions_test_id_foreign` (`test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `description`, `answer`, `marks`, `order`, `type`, `link`, `unit_id`, `paid`, `explanation`, `deleted_at`, `created_at`, `updated_at`, `belong_to`, `test_id`) VALUES
(1, NULL, NULL, 1, 9999, '1', NULL, 1, 1, NULL, '2022-05-31 11:14:50', '2022-05-19 04:02:06', '2022-05-31 11:14:50', 'book', NULL),
(2, '<p>test</p>', 'a', 1, 9999, 'mcqs', NULL, 1, 1, NULL, NULL, '2022-05-19 04:18:32', '2022-05-19 04:18:32', 'book', NULL),
(3, '<p>dassd</p>', 'a', 1, 9999, 'MCQS', NULL, 3, 1, NULL, NULL, '2022-05-19 11:20:54', '2022-05-19 11:20:54', 'book', NULL),
(4, NULL, NULL, 1, 9999, 'MCQS', NULL, 4, 1, NULL, '2022-05-31 11:12:43', '2022-05-24 23:02:29', '2022-05-31 11:12:43', 'book', NULL),
(5, '<p>What is biology&nbsp;</p><p>1. Life</p><p>2. Science</p><p>3. Plant</p><p>4.Example</p>', '1', 1, 9999, 'MCQS', NULL, 5, 1, '<p>afdadsaddsaasdfdsd</p>', NULL, '2022-05-28 07:56:47', '2022-05-30 01:03:38', 'book', NULL),
(6, '<p>what is life</p>', 'a', 1, 9999, 'MCQS', NULL, 5, 1, NULL, '2022-05-31 11:14:56', '2022-05-28 08:07:52', '2022-05-31 11:14:56', 'book', NULL),
(7, '<p>dafs</p>', '3', 1, 9999, 'MCQS', NULL, 7, 1, '<p>afdds</p>', '2022-05-31 11:14:54', '2022-05-30 23:15:54', '2022-05-31 11:14:54', 'book', NULL),
(8, '<p class=\"MsoListParagraph\" style=\"margin-top:0cm;margin-right:-7.2pt;margin-bottom:\n0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-36.0pt;mso-list:l0 level1 lfo1;\ntab-stops:72.0pt 108.0pt 144.0pt 180.0pt 216.0pt\"><!--[if !supportLists]--><strong><span lang=\"EN-US\">1)<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span></strong><!--[endif]--><span lang=\"EN-US\">The first fundamental right of every human is….<br>\na) Equality &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b) <strong><u>Freedom</u></strong><br>\nc) Life&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d)\nEducation<o:p></o:p></span></p>', 'b', 1, 9999, 'MCQS', NULL, 5, 1, NULL, '2022-05-31 11:12:35', '2022-05-31 10:59:21', '2022-05-31 11:12:35', 'book', NULL),
(9, '<p class=\"MsoListParagraph\" style=\"margin-top:0cm;margin-right:-7.2pt;margin-bottom:\n0cm;margin-left:36.0pt;margin-bottom:.0001pt;text-indent:-36.0pt;mso-list:l0 level1 lfo1;\ntab-stops:72.0pt 108.0pt 144.0pt 180.0pt 216.0pt\"><!--[if !supportLists]--><strong><span lang=\"EN-US\">1)<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-weight: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n</span></span></strong><!--[endif]--><span lang=\"EN-US\">The first fundamental right of every human is….<br>\na) Equality &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b) <strong>Freedom</strong><br>\nc) Life&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; d)\nEducation<o:p></o:p></span></p>', NULL, 1, 9999, 'MCQS', NULL, 5, 1, NULL, '2022-05-31 11:12:39', '2022-05-31 11:12:29', '2022-05-31 11:12:39', 'book', NULL),
(10, '<p>adfsfads</p>', 'a', 1, 9999, 'MCQS', NULL, 7, 1, '<p>adsads</p>', NULL, '2022-06-06 21:38:51', '2022-06-06 21:38:51', 'book', NULL),
(11, '<p>dasfadfdsadfsa</p>', '33', 1, 9999, 'MCQS', NULL, 7, 1, NULL, NULL, '2022-06-06 21:38:59', '2022-06-06 21:38:59', 'book', NULL),
(12, '<p>adfsds</p>', 'd', 1, 9999, 'MCQS', NULL, 7, 1, NULL, NULL, '2022-06-06 22:38:51', '2022-06-06 22:38:51', 'book', NULL),
(13, '<p>dfsaasddsa</p>', 'd', 1, 9999, 'MCQS', NULL, 7, 1, '<p>dfaadf</p>', NULL, '2022-06-06 22:39:17', '2022-06-06 22:39:17', 'book', NULL),
(14, '<p>dsafads</p>', 'ddd', 1, 9999, 'MCQS', NULL, 7, 1, '<p>adsf</p>', NULL, '2022-06-06 22:39:35', '2022-06-06 22:39:35', 'book', NULL),
(15, '<p>sdaDSSA</p>', 'SD', 1, 9999, 'MCQS', NULL, 7, 1, NULL, NULL, '2022-06-06 22:45:42', '2022-06-06 22:45:42', 'book', NULL),
(16, '<p>DFADS</p>', '2', 1, 9999, 'MCQS', NULL, 7, 1, '<p>DAFAFDS</p>', NULL, '2022-06-06 22:45:54', '2022-06-06 22:45:54', 'book', NULL),
(17, NULL, NULL, 1, 9999, 'MCQS', NULL, 1, 1, NULL, '2022-06-07 23:46:02', '2022-06-07 23:45:59', '2022-06-07 23:46:02', 'book', NULL),
(18, '<p>What is your name&nbsp;</p><p>1. Test</p><p>2. B</p>', 'a', 1, 9999, 'MCQS', NULL, 8, 0, NULL, NULL, '2022-06-14 01:41:56', '2022-06-25 22:42:43', 'book', NULL),
(19, '<p>What is your name</p>', 'a', 1, 9999, 'MCQS', NULL, 8, 1, NULL, NULL, '2022-06-25 22:30:40', '2022-06-25 22:30:40', 'book', NULL),
(20, '<p>tadadfs</p>', 'c', 1, 9999, 'MCQS', NULL, 7, 1, NULL, NULL, '2022-09-04 01:50:31', '2022-09-04 01:50:31', 'book', NULL),
(21, NULL, NULL, 1, 9999, 'MCQS', NULL, 0, 1, NULL, NULL, '2022-09-04 08:12:27', '2022-09-04 08:12:27', 'book', NULL),
(22, '<p>test</p>', 'a', 1, 9999, 'MCQS', NULL, 0, 1, NULL, NULL, '2022-09-04 08:12:40', '2022-09-04 08:12:40', 'book', NULL),
(23, '<p>fadsdfad</p>', NULL, 1, 9999, 'MCQS', NULL, 0, 1, NULL, NULL, '2022-09-04 08:16:01', '2022-09-04 08:16:01', 'book', NULL),
(24, '<p>zcvxzxcz</p>', 'cx', 1, 9999, 'MCQS', NULL, 0, 1, NULL, NULL, '2022-09-04 08:18:13', '2022-09-04 08:18:13', 'book', NULL),
(25, '<p><span style=\"font-family: &quot;Arial Black&quot;, Gadget, sans-serif;\">chane</span></p>', 'as', 1, 9999, 'MCQS', NULL, 0, 1, NULL, NULL, '2022-09-04 08:20:12', '2022-09-04 08:30:54', 'book', 1),
(26, '<p>what</p>', NULL, 1, 9999, 'MCQS', NULL, 7, 1, NULL, NULL, '2022-09-04 08:29:05', '2022-09-04 08:30:39', 'book', 0),
(27, '<p>dsfasdfsd</p>', NULL, 1, 9999, 'MCQS', NULL, 0, 1, NULL, NULL, '2022-09-04 08:31:02', '2022-09-04 08:31:09', 'book', 1),
(28, '<p>Some question</p>', 'b', 1, 9999, 'MCQS', NULL, 0, 1, '<p>Some</p>', NULL, '2022-09-05 05:20:22', '2022-09-05 05:20:22', 'book', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quizes`
--

DROP TABLE IF EXISTS `quizes`;
CREATE TABLE IF NOT EXISTS `quizes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `marks` int(11) NOT NULL DEFAULT '0',
  `startingtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `endingtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL DEFAULT '1',
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quizes`
--

INSERT INTO `quizes` (`id`, `title`, `user_id`, `marks`, `startingtime`, `endingtime`, `type`, `district`, `result`, `created_at`, `updated_at`) VALUES
(1, 'test', 1, 0, '2022-08-26 14:10:10', '2022-08-26 14:20:10', 2, 'Peshawar', 0, '2022-08-26 14:10:10', '2022-08-26 14:10:10'),
(2, 'test', 1, 0, '2022-08-26 14:10:36', '2022-08-26 14:20:36', 2, 'Peshawar', 0, '2022-08-26 14:10:36', '2022-08-26 14:10:36'),
(3, 'test', 1, 0, '2022-08-26 14:11:04', '2022-08-26 14:21:04', 2, 'Peshawar', 0, '2022-08-26 14:11:04', '2022-08-26 14:11:04'),
(4, 'test', 1, 0, '2022-08-26 14:11:17', '2022-08-26 14:21:17', 2, 'Peshawar', 0, '2022-08-26 14:11:17', '2022-08-26 14:11:17'),
(5, 'test', 1, 0, '2022-08-26 14:11:23', '2022-08-26 14:21:23', 2, 'Peshawar', 0, '2022-08-26 14:11:23', '2022-08-26 14:11:23'),
(6, 'test', 1, 0, '2022-08-26 14:13:51', '2022-08-26 14:23:51', 2, 'Peshawar', 0, '2022-08-26 14:13:51', '2022-08-26 14:13:51'),
(7, 'test', 1, 0, '2022-08-26 14:14:25', '2022-08-26 14:24:25', 2, 'Peshawar', 0, '2022-08-26 14:14:25', '2022-08-26 14:14:25'),
(8, 'test', 1, 0, '2022-08-26 14:15:11', '2022-08-26 14:25:11', 2, 'Peshawar', 0, '2022-08-26 14:15:11', '2022-08-26 14:15:11'),
(9, 'test', 1, 0, '2022-08-26 14:16:23', '2022-08-26 14:26:23', 2, 'Peshawar', 0, '2022-08-26 14:16:23', '2022-08-26 14:16:23'),
(10, 'test', 1, 0, '2022-08-26 14:16:55', '2022-08-26 14:26:55', 2, 'Peshawar', 0, '2022-08-26 14:16:55', '2022-08-26 14:16:55'),
(11, 'test', 1, 0, '2022-08-26 14:21:29', '2022-08-26 14:31:29', 2, 'Peshawar', 0, '2022-08-26 14:21:29', '2022-08-26 14:21:29'),
(12, 'test', 1, 0, '2022-08-26 14:22:45', '2022-08-26 14:32:45', 2, 'Peshawar', 0, '2022-08-26 14:22:45', '2022-08-26 14:22:45'),
(13, 'test', 1, 0, '2022-08-26 14:23:15', '2022-08-26 14:33:15', 2, 'Peshawar', 0, '2022-08-26 14:23:15', '2022-08-26 14:23:15'),
(14, 'Class 9th', 2, 0, '2022-08-27 04:09:18', '2022-08-27 04:19:18', 2, 'Peshawar', 0, '2022-08-27 04:09:18', '2022-08-27 04:09:18'),
(15, 'Class 9th', 2, 0, '2022-08-27 04:09:50', '2022-08-27 04:19:50', 2, 'Peshawar', 0, '2022-08-27 04:09:50', '2022-08-27 04:09:50'),
(16, 'Class 9th', 2, 6, '2022-08-29 02:52:05', '2022-08-29 03:02:05', 2, 'Peshawar', 0, '2022-08-29 02:52:05', '2022-08-28 21:52:18');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

DROP TABLE IF EXISTS `quiz_questions`;
CREATE TABLE IF NOT EXISTS `quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `result` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=161 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`id`, `quiz_id`, `question_id`, `result`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, 10, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(2, 1, 13, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(3, 1, 10, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(4, 1, 10, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(5, 1, 12, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(6, 1, 12, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(7, 1, 14, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(8, 1, 10, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(9, 1, 10, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(10, 1, 12, NULL, '2022-08-26 14:10:10', '2022-08-26 14:10:10', NULL),
(11, 2, 11, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(12, 2, 10, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(13, 2, 14, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(14, 2, 16, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(15, 2, 14, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(16, 2, 14, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(17, 2, 15, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(18, 2, 11, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(19, 2, 14, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(20, 2, 12, NULL, '2022-08-26 14:10:36', '2022-08-26 14:10:36', NULL),
(21, 3, 16, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(22, 3, 13, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(23, 3, 10, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(24, 3, 11, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(25, 3, 12, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(26, 3, 10, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(27, 3, 11, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(28, 3, 11, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(29, 3, 16, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(30, 3, 12, NULL, '2022-08-26 14:11:04', '2022-08-26 14:11:04', NULL),
(31, 4, 11, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(32, 4, 14, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(33, 4, 10, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(34, 4, 15, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(35, 4, 12, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(36, 4, 14, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(37, 4, 15, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(38, 4, 16, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(39, 4, 11, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(40, 4, 14, NULL, '2022-08-26 14:11:17', '2022-08-26 14:11:17', NULL),
(41, 5, 13, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(42, 5, 12, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(43, 5, 11, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(44, 5, 14, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(45, 5, 13, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(46, 5, 15, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(47, 5, 10, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(48, 5, 16, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(49, 5, 12, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(50, 5, 16, NULL, '2022-08-26 14:11:23', '2022-08-26 14:11:23', NULL),
(51, 6, 16, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(52, 6, 15, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(53, 6, 13, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(54, 6, 11, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(55, 6, 12, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(56, 6, 10, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(57, 6, 12, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(58, 6, 14, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(59, 6, 13, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(60, 6, 15, NULL, '2022-08-26 14:13:51', '2022-08-26 14:13:51', NULL),
(61, 7, 11, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(62, 7, 12, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(63, 7, 15, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(64, 7, 15, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(65, 7, 15, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(66, 7, 15, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(67, 7, 12, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(68, 7, 16, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(69, 7, 16, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(70, 7, 10, NULL, '2022-08-26 14:14:25', '2022-08-26 14:14:25', NULL),
(71, 8, 16, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(72, 8, 16, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(73, 8, 11, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(74, 8, 12, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(75, 8, 10, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(76, 8, 12, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(77, 8, 16, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(78, 8, 12, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(79, 8, 13, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(80, 8, 16, NULL, '2022-08-26 14:15:11', '2022-08-26 14:15:11', NULL),
(81, 9, 10, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(82, 9, 12, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(83, 9, 11, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(84, 9, 10, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(85, 9, 13, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(86, 9, 13, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(87, 9, 13, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(88, 9, 12, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(89, 9, 16, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(90, 9, 10, NULL, '2022-08-26 14:16:23', '2022-08-26 14:16:23', NULL),
(91, 10, 15, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(92, 10, 16, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(93, 10, 11, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(94, 10, 16, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(95, 10, 16, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(96, 10, 12, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(97, 10, 16, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(98, 10, 12, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(99, 10, 12, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(100, 10, 12, NULL, '2022-08-26 14:16:55', '2022-08-26 14:16:55', NULL),
(101, 11, 14, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(102, 11, 15, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(103, 11, 12, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(104, 11, 16, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(105, 11, 14, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(106, 11, 14, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(107, 11, 16, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(108, 11, 12, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(109, 11, 16, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(110, 11, 13, NULL, '2022-08-26 14:21:29', '2022-08-26 14:21:29', NULL),
(111, 12, 13, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(112, 12, 10, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(113, 12, 12, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(114, 12, 11, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(115, 12, 16, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(116, 12, 13, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(117, 12, 15, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(118, 12, 13, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(119, 12, 15, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(120, 12, 15, NULL, '2022-08-26 14:22:45', '2022-08-26 14:22:45', NULL),
(121, 13, 15, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(122, 13, 13, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(123, 13, 13, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(124, 13, 10, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(125, 13, 16, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(126, 13, 11, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(127, 13, 10, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(128, 13, 10, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(129, 13, 14, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(130, 13, 13, NULL, '2022-08-26 14:23:15', '2022-08-26 14:23:15', NULL),
(131, 14, 18, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(132, 14, 19, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(133, 14, 19, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(134, 14, 19, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(135, 14, 19, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(136, 14, 18, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(137, 14, 19, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(138, 14, 19, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(139, 14, 19, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(140, 14, 18, NULL, '2022-08-27 04:09:18', '2022-08-27 04:09:18', NULL),
(141, 15, 19, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(142, 15, 19, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(143, 15, 18, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(144, 15, 18, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(145, 15, 19, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(146, 15, 19, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(147, 15, 19, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(148, 15, 18, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(149, 15, 18, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(150, 15, 19, NULL, '2022-08-27 04:09:50', '2022-08-27 04:09:50', NULL),
(151, 16, 18, 'a', '2022-08-29 02:52:05', '2022-08-28 21:52:17', NULL),
(152, 16, 18, 'a', '2022-08-29 02:52:05', '2022-08-28 21:52:17', NULL),
(153, 16, 19, NULL, '2022-08-29 02:52:05', '2022-08-29 02:52:05', NULL),
(154, 16, 19, NULL, '2022-08-29 02:52:05', '2022-08-29 02:52:05', NULL),
(155, 16, 18, 'a', '2022-08-29 02:52:05', '2022-08-28 21:52:17', NULL),
(156, 16, 18, 'a', '2022-08-29 02:52:05', '2022-08-28 21:52:17', NULL),
(157, 16, 19, NULL, '2022-08-29 02:52:05', '2022-08-29 02:52:05', NULL),
(158, 16, 18, 'a', '2022-08-29 02:52:05', '2022-08-28 21:52:17', NULL),
(159, 16, 19, NULL, '2022-08-29 02:52:05', '2022-08-29 02:52:05', NULL),
(160, 16, 18, 'a', '2022-08-29 02:52:05', '2022-08-28 21:52:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2022-05-05 02:45:52', '2022-05-05 02:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'English',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `hassection` tinyint(1) NOT NULL DEFAULT '0',
  `mcqs` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `book_id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sections_slug_unique` (`slug`),
  KEY `sections_author_id_foreign` (`author_id`),
  KEY `sections_category_id_foreign` (`category_id`),
  KEY `sections_book_id_foreign` (`book_id`),
  KEY `sections_section_id_foreign` (`section_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `slug`, `description`, `language`, `enabled`, `hassection`, `mcqs`, `author_id`, `category_id`, `book_id`, `section_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Biology', 'sadfdas', '<p>dfafs</p>', 'Hindi', 1, 0, 23, NULL, NULL, 6, NULL, NULL, '2022-05-19 04:57:30', '2022-05-26 23:10:21'),
(2, 'afddf', 'afddf', '<p>afda</p>', 'Hindi', 1, 1, 22, NULL, NULL, 6, NULL, NULL, '2022-05-20 21:19:04', '2022-05-20 21:41:44'),
(3, 'assadf', 'assadf', '<p>afdsdsa</p>', 'Hindi', 1, 1, 23, NULL, NULL, 6, 1, '2022-05-28 02:53:56', '2022-05-22 10:33:11', '2022-05-28 02:53:56'),
(4, 'Biology', 'biology', '<p>Biology<br></p>', 'English', 1, 1, NULL, NULL, NULL, 7, NULL, NULL, '2022-05-28 02:55:49', '2022-06-02 11:57:27'),
(5, 'Chemistry', 'chemistry', NULL, 'English', 1, 0, 100, NULL, NULL, 7, NULL, NULL, '2022-05-30 01:19:58', '2022-05-30 01:19:58'),
(6, 'Class 9th', 'class-9th', '<p>Class 9th<br></p>', 'English', 1, 0, 210, NULL, NULL, 7, 5, NULL, '2022-05-30 01:20:27', '2022-06-02 11:57:39'),
(7, 'test', 'test', '<p>test</p>', 'Hindi', 1, 0, 222, NULL, NULL, 8, NULL, NULL, '2022-05-30 23:15:22', '2022-05-30 23:15:22'),
(8, 'test', 'test-2', '<p>test</p>', 'test', 1, 0, 334, NULL, NULL, 7, NULL, NULL, '2022-06-02 11:59:49', '2022-06-02 11:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footerlogo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer` text COLLATE utf8mb4_unicode_ci,
  `copyright` text COLLATE utf8mb4_unicode_ci,
  `map` text COLLATE utf8mb4_unicode_ci,
  `currency_symbol` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Rs',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `logo`, `footerlogo`, `address`, `email`, `phone`, `facebook`, `youtube`, `instagram`, `twitter`, `pinterest`, `footer`, `copyright`, `map`, `currency_symbol`, `created_at`, `updated_at`) VALUES
(1, 'Bettani Series', NULL, NULL, '<p>Deans Trade Center FF 500&nbsp;</p><p>Peshawar Saddar Kpk Pakistan</p>', NULL, '+923133434571', NULL, NULL, NULL, NULL, NULL, NULL, '<p>©2022 Tech Track. All rights reserved</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.6686229646084!2d71.5432891151442!3d34.00104448061985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38d917d50dd9f7db%3A0x7f2fd5be87357cbf!2sDeans%20Trade%20Center%20(Saddar%20Shopping%20Mall)!5e0!3m2!1sen!2s!4v1653836179836!5m2!1sen!2s\"  height=\"500\" style=\"border:0; width:100%;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'Rs', '2022-05-07 06:31:39', '2022-05-29 10:29:37');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `description`, `created_at`, `updated_at`) VALUES
(4, '<p class=\"media-body mr-wd-4 align-self-center mb-4 mb-md-0\">\n                                </p><p class=\"hero__pretitle text-uppercase font-weight-bold text-gray-400 mb-2\" data-scs-animation-in=\"fadeInUp\" data-scs-animation-delay=\"200\">The Bettani Series\'</p>\n                                <h2 class=\"hero__title font-size-14 mb-4\" data-scs-animation-in=\"fadeInUp\" data-scs-animation-delay=\"300\">\n                                    <span class=\"hero__title-line-1 font-weight-regular d-block\">Featured Books of the</span>\n                                    <span class=\"hero__title-line-2 font-weight-bold d-block\">February</span>\n                                </h2>\n                                <p><a href=\"#\" class=\"btn btn-dark btn-wide rounded-0 hero__btn\" data-scs-animation-in=\"fadeInLeft\" data-scs-animation-delay=\"400\">See More</a></p>', '2022-06-30 11:42:43', '2022-06-30 11:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'English',
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `price` double NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `announce_date` date DEFAULT NULL,
  `last_date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tests_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `title`, `slug`, `description`, `language`, `enabled`, `price`, `date`, `announce_date`, `last_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'dfasd', 'dfasd', '<p>dasafsd</p>', 'English', 0, 10, '2022-09-05', '2022-09-27', '2022-09-20', NULL, '2022-09-04 01:14:38', '2022-09-04 01:14:38'),
(2, 'Bioloty Test', 'bioloty-test', '<p>some</p>', 'English', 1, 100, '2022-09-06', '2022-09-06', '2022-09-21', NULL, '2022-09-06 04:11:53', '2022-09-06 04:11:53'),
(3, 'Test 3', 'test-3', '<p>Some&nbsp;</p>', 'English', 1, 500, '2022-09-15', '2022-09-09', '2022-09-14', NULL, '2022-09-08 20:56:56', '2022-09-08 20:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `test_applies`
--

DROP TABLE IF EXISTS `test_applies`;
CREATE TABLE IF NOT EXISTS `test_applies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `test_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `namespace` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '*',
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` json NOT NULL,
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `translations_namespace_index` (`namespace`),
  KEY `translations_group_index` (`group`)
) ENGINE=MyISAM AUTO_INCREMENT=219 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `namespace`, `group`, `key`, `text`, `metadata`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'brackets/admin-ui', 'admin', 'operation.succeeded', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(2, 'brackets/admin-ui', 'admin', 'operation.failed', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(3, 'brackets/admin-ui', 'admin', 'operation.not_allowed', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(4, '*', 'admin', 'admin-user.columns.first_name', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(5, '*', 'admin', 'admin-user.columns.last_name', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(6, '*', 'admin', 'admin-user.columns.email', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(7, '*', 'admin', 'admin-user.columns.password', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(8, '*', 'admin', 'admin-user.columns.password_repeat', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(9, '*', 'admin', 'admin-user.columns.activated', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(10, '*', 'admin', 'admin-user.columns.forbidden', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(11, '*', 'admin', 'admin-user.columns.language', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(12, 'brackets/admin-ui', 'admin', 'forms.select_an_option', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(13, '*', 'admin', 'admin-user.columns.roles', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(14, 'brackets/admin-ui', 'admin', 'forms.select_options', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(15, '*', 'admin', 'admin-user.actions.create', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(16, 'brackets/admin-ui', 'admin', 'btn.save', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(17, '*', 'admin', 'admin-user.actions.edit', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(18, '*', 'admin', 'admin-user.actions.index', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(19, 'brackets/admin-ui', 'admin', 'placeholder.search', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(20, 'brackets/admin-ui', 'admin', 'btn.search', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(21, '*', 'admin', 'admin-user.columns.id', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(22, '*', 'admin', 'admin-user.columns.last_login_at', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(23, 'brackets/admin-ui', 'admin', 'btn.edit', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(24, 'brackets/admin-ui', 'admin', 'btn.delete', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(25, 'brackets/admin-ui', 'admin', 'pagination.overview', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(26, 'brackets/admin-ui', 'admin', 'index.no_items', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(27, 'brackets/admin-ui', 'admin', 'index.try_changing_items', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(28, 'brackets/admin-ui', 'admin', 'btn.new', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(29, 'brackets/admin-ui', 'admin', 'profile_dropdown.account', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(30, 'brackets/admin-auth', 'admin', 'profile_dropdown.profile', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(31, 'brackets/admin-auth', 'admin', 'profile_dropdown.password', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(32, 'brackets/admin-auth', 'admin', 'profile_dropdown.logout', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(33, 'brackets/admin-ui', 'admin', 'sidebar.content', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(34, 'brackets/admin-ui', 'admin', 'sidebar.settings', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(35, '*', 'admin', 'admin-user.actions.edit_password', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(36, '*', 'admin', 'admin-user.actions.edit_profile', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(37, 'brackets/admin-auth', 'admin', 'activation_form.title', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(38, 'brackets/admin-auth', 'admin', 'activation_form.note', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(39, 'brackets/admin-auth', 'admin', 'auth_global.email', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(40, 'brackets/admin-auth', 'admin', 'activation_form.button', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(41, 'brackets/admin-auth', 'admin', 'login.title', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(42, 'brackets/admin-auth', 'admin', 'login.sign_in_text', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(43, 'brackets/admin-auth', 'admin', 'auth_global.password', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(44, 'brackets/admin-auth', 'admin', 'login.button', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(45, 'brackets/admin-auth', 'admin', 'login.forgot_password', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(46, 'brackets/admin-auth', 'admin', 'forgot_password.title', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(47, 'brackets/admin-auth', 'admin', 'forgot_password.note', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(48, 'brackets/admin-auth', 'admin', 'forgot_password.button', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(49, 'brackets/admin-auth', 'admin', 'password_reset.title', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(50, 'brackets/admin-auth', 'admin', 'password_reset.note', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(51, 'brackets/admin-auth', 'admin', 'auth_global.password_confirm', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(52, 'brackets/admin-auth', 'admin', 'password_reset.button', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(53, 'brackets/admin-auth', 'activations', 'email.line', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(54, 'brackets/admin-auth', 'activations', 'email.action', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(55, 'brackets/admin-auth', 'activations', 'email.notRequested', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(56, 'brackets/admin-auth', 'admin', 'activations.activated', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(57, 'brackets/admin-auth', 'admin', 'activations.invalid_request', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(58, 'brackets/admin-auth', 'admin', 'activations.disabled', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(59, 'brackets/admin-auth', 'admin', 'activations.sent', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(60, 'brackets/admin-auth', 'admin', 'passwords.sent', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(61, 'brackets/admin-auth', 'admin', 'passwords.reset', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(62, 'brackets/admin-auth', 'admin', 'passwords.invalid_token', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(63, 'brackets/admin-auth', 'admin', 'passwords.invalid_user', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(64, 'brackets/admin-auth', 'admin', 'passwords.invalid_password', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(65, 'brackets/admin-auth', 'resets', 'email.line', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(66, 'brackets/admin-auth', 'resets', 'email.action', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(67, 'brackets/admin-auth', 'resets', 'email.notRequested', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(68, '*', 'auth', 'failed', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:07', NULL),
(69, '*', 'auth', 'throttle', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:08', NULL),
(70, '*', '*', 'Manage access', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:08', NULL),
(71, '*', '*', 'Translations', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:08', NULL),
(72, '*', '*', 'Configuration', '[]', NULL, '2022-05-05 02:46:03', '2022-05-19 12:07:08', NULL),
(73, '*', 'admin', 'author.columns.name', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(74, '*', 'admin', 'author.columns.description', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(75, '*', 'admin', 'author.columns.enabled', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(76, '*', 'admin', 'author.actions.create', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(77, '*', 'admin', 'author.actions.edit', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(78, '*', 'admin', 'author.actions.index', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(79, '*', 'admin', 'author.columns.id', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(80, 'brackets/admin-ui', 'admin', 'listing.selected_items', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(81, 'brackets/admin-ui', 'admin', 'listing.check_all_items', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(82, 'brackets/admin-ui', 'admin', 'listing.uncheck_all_items', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(83, '*', 'admin', 'book.columns.title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(84, '*', 'admin', 'book.columns.description', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(85, '*', 'admin', 'book.columns.publisher', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(86, '*', 'admin', 'book.columns.language', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(87, '*', 'admin', 'book.columns.enabled', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(88, '*', 'admin', 'book.columns.price', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(89, '*', 'admin', 'book.columns.category_id', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(90, '*', 'admin', 'book.actions.create', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(91, '*', 'admin', 'book.actions.edit', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(92, '*', 'admin', 'book.actions.index', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(93, '*', 'admin', 'book.columns.id', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(94, '*', 'admin', 'book.columns.author', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(95, '*', 'admin', 'category.columns.title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(96, '*', 'admin', 'category.columns.description', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(97, '*', 'admin', 'category.columns.enabled', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(98, '*', 'admin', 'category.actions.create', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(99, '*', 'admin', 'category.actions.edit', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(100, '*', 'admin', 'category.actions.index', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(101, '*', 'admin', 'category.columns.id', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(102, '*', 'admin', 'category.title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(103, '*', 'admin', 'book.title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(104, '*', 'admin', 'author.title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(105, '*', 'admin', 'setting.title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(106, '*', 'admin', 'setting.columns.name', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(107, '*', 'admin', 'setting.columns.logo', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(108, '*', 'admin', 'setting.columns.footerlogo', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(109, '*', 'admin', 'setting.columns.address', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(110, '*', 'admin', 'setting.columns.email', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(111, '*', 'admin', 'setting.columns.phone', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(112, '*', 'admin', 'setting.columns.facebook', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(113, '*', 'admin', 'setting.columns.youtube', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(114, '*', 'admin', 'setting.columns.instagram', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(115, '*', 'admin', 'setting.columns.twitter', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(116, '*', 'admin', 'setting.columns.pinterest', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(117, '*', 'admin', 'setting.columns.footer', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(118, '*', 'admin', 'setting.columns.copyright', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(119, '*', 'admin', 'setting.columns.map', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(120, '*', 'admin', 'setting.actions.create', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(121, '*', 'admin', 'setting.actions.edit', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(122, '*', 'admin', 'setting.actions.index', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(123, '*', 'admin', 'setting.columns.id', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', NULL),
(124, 'brackets/admin-translations', 'admin', 'title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(125, 'brackets/admin-translations', 'admin', 'index.all_groups', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(126, 'brackets/admin-translations', 'admin', 'index.edit', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(127, 'brackets/admin-translations', 'admin', 'index.default_text', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(128, 'brackets/admin-translations', 'admin', 'index.translation', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(129, 'brackets/admin-translations', 'admin', 'index.translation_for_language', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(130, 'brackets/admin-translations', 'admin', 'import.title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(131, 'brackets/admin-translations', 'admin', 'import.notice', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(132, 'brackets/admin-translations', 'admin', 'import.upload_file', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(133, 'brackets/admin-translations', 'admin', 'import.choose_file', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(134, 'brackets/admin-translations', 'admin', 'import.language_to_import', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(135, 'brackets/admin-translations', 'admin', 'fields.select_language', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(136, 'brackets/admin-translations', 'admin', 'import.do_not_override', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(137, 'brackets/admin-translations', 'admin', 'import.conflict_notice_we_have_found', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(138, 'brackets/admin-translations', 'admin', 'import.conflict_notice_translations_to_be_imported', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(139, 'brackets/admin-translations', 'admin', 'import.conflict_notice_differ', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(140, 'brackets/admin-translations', 'admin', 'fields.group', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(141, 'brackets/admin-translations', 'admin', 'fields.default', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(142, 'brackets/admin-translations', 'admin', 'fields.current_value', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(143, 'brackets/admin-translations', 'admin', 'fields.imported_value', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(144, 'brackets/admin-translations', 'admin', 'import.sucesfully_notice', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(145, 'brackets/admin-translations', 'admin', 'import.sucesfully_notice_update', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(146, 'brackets/admin-translations', 'admin', 'index.export', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(147, 'brackets/admin-translations', 'admin', 'export.notice', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(148, 'brackets/admin-translations', 'admin', 'export.language_to_export', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(149, 'brackets/admin-translations', 'admin', 'btn.export', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(150, 'brackets/admin-translations', 'admin', 'index.title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(151, 'brackets/admin-translations', 'admin', 'btn.import', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(152, 'brackets/admin-translations', 'admin', 'btn.re_scan', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(153, 'brackets/admin-translations', 'admin', 'fields.created_at', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(154, 'brackets/admin-translations', 'admin', 'index.no_items', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(155, 'brackets/admin-translations', 'admin', 'index.try_changing_items', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(156, 'brackets/admin-ui', 'admin', 'media_uploader.max_number_of_files', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(157, 'brackets/admin-ui', 'admin', 'media_uploader.max_size_pre_file', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(158, 'brackets/admin-ui', 'admin', 'media_uploader.private_title', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(159, 'brackets/admin-ui', 'admin', 'page_title_suffix', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:07', '2022-05-19 12:07:07'),
(160, 'brackets/admin-ui', 'admin', 'footer.powered_by', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(161, '*', '*', 'Select Category', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(162, '*', '*', 'Category', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(163, '*', '*', 'Select Author', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(164, '*', '*', 'Author', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(165, '*', '*', 'Select author/s', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(166, '*', '*', 'Type to search By Category/s', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(167, '*', '*', 'Close', '[]', NULL, '2022-05-08 01:16:44', '2022-05-19 12:07:08', NULL),
(168, '*', 'admin', 'section.title', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(169, '*', 'admin', 'unit.title', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(170, '*', 'admin', 'question.title', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(171, '*', 'admin', 'role.title', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(172, '*', 'admin', 'question.columns.description', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(173, '*', 'admin', 'question.columns.answer', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(174, '*', 'admin', 'question.columns.marks', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(175, '*', 'admin', 'question.columns.unit_id', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(176, '*', 'admin', 'question.columns.type', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(177, '*', 'admin', 'question.actions.create', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(178, '*', 'admin', 'question.actions.edit', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(179, '*', 'admin', 'question.actions.index', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(180, '*', 'admin', 'question.columns.id', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(181, '*', 'admin', 'question.columns.order', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(182, '*', 'admin', 'question.columns.link', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(183, '*', 'admin', 'role.columns.name', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(184, '*', 'admin', 'role.columns.guard_name', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(185, '*', 'admin', 'role.actions.create', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(186, '*', 'admin', 'role.actions.edit', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(187, '*', 'admin', 'role.actions.index', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(188, '*', 'admin', 'role.columns.id', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(189, '*', 'admin', 'section.columns.title', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(190, '*', 'admin', 'section.columns.description', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(191, '*', 'admin', 'section.columns.language', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(192, '*', 'admin', 'section.columns.enabled', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(193, '*', 'admin', 'section.columns.mcqs', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(194, '*', 'admin', 'section.columns.author_id', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(195, '*', 'admin', 'section.columns.category_id', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(196, '*', 'admin', 'section.actions.create', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(197, '*', 'admin', 'section.actions.edit', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(198, '*', 'admin', 'section.actions.index', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(199, '*', 'admin', 'section.columns.id', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(200, '*', 'admin', 'section.columns.book_id', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(201, '*', 'admin', 'unit.columns.title', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(202, '*', 'admin', 'unit.columns.slug', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(203, '*', 'admin', 'unit.columns.description', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(204, '*', 'admin', 'unit.columns.enabled', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(205, '*', 'admin', 'unit.columns.mcqs', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(206, '*', 'admin', 'unit.columns.order', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(207, '*', 'admin', 'unit.columns.section_id', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(208, '*', 'admin', 'unit.actions.create', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(209, '*', 'admin', 'unit.actions.edit', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(210, '*', 'admin', 'unit.actions.index', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(211, '*', 'admin', 'unit.columns.id', '[]', NULL, '2022-05-19 12:07:07', '2022-05-19 12:07:07', NULL),
(212, '*', '*', 'Select Unit', '[]', NULL, '2022-05-19 12:07:08', '2022-05-19 12:07:08', NULL),
(213, '*', '*', 'unit', '[]', NULL, '2022-05-19 12:07:08', '2022-05-19 12:07:08', NULL),
(214, '*', '*', 'Select book', '[]', NULL, '2022-05-19 12:07:08', '2022-05-19 12:07:08', NULL),
(215, '*', '*', 'book', '[]', NULL, '2022-05-19 12:07:08', '2022-05-19 12:07:08', NULL),
(216, '*', '*', 'Select Book/s', '[]', NULL, '2022-05-19 12:07:08', '2022-05-19 12:07:08', NULL),
(217, '*', '*', 'Select Section', '[]', NULL, '2022-05-19 12:07:08', '2022-05-19 12:07:08', NULL),
(218, '*', '*', 'section', '[]', NULL, '2022-05-19 12:07:08', '2022-05-19 12:07:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

DROP TABLE IF EXISTS `units`;
CREATE TABLE IF NOT EXISTS `units` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  `mcqs` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  `section_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `units_section_id_foreign` (`section_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `title`, `slug`, `description`, `enabled`, `mcqs`, `order`, `section_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'sdfaf', 'sdfaf', '<p>adfsasd</p>', 1, 3, 0, 8, NULL, '2022-05-11 11:20:01', '2022-05-11 11:20:01'),
(2, 'Introduction To Biology', 'introduction-to-biology', '<p>Introduction To Biology<br></p><p><img src=\"http://127.0.0.1:8000/uploads/1652678695qca poster.jpg\"><br></p>', 1, 236, 0, 9, NULL, '2022-05-16 00:25:09', '2022-05-16 00:25:09'),
(3, 'fads', 'fads', '<p>adfdas</p>', 1, 23, 0, 1, NULL, '2022-05-19 04:59:46', '2022-05-19 04:59:46'),
(4, 'Unit 1', 'unit-1', '<p>Unit 1&nbsp;<br></p>', 1, 1000, 0, 3, NULL, '2022-05-22 21:13:44', '2022-05-22 21:13:44'),
(5, 'Introduction To Biology', 'introduction-to-biology-2', '<p>Introduction To Biology<br></p>', 1, 20, 0, 4, NULL, '2022-05-28 03:06:08', '2022-05-28 03:06:08'),
(6, 'Animals Life', 'animals-life', '<p>Animals Life<br></p>', 1, 20, 0, 4, NULL, '2022-05-28 03:07:53', '2022-05-28 03:07:53'),
(7, 'asfsda', 'asfsda', '<p>adsfasd</p>', 1, 3, 0, 7, NULL, '2022-05-30 23:15:35', '2022-05-30 23:15:35'),
(8, 'Introduction', 'introduction', '<p>Introduction<br></p>', 1, NULL, 0, 6, NULL, '2022-06-14 01:40:42', '2022-06-14 01:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'male',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `professional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `cnic`, `gender`, `country`, `province`, `district`, `professional`, `address`, `active`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'IMRAN ALI', 'admin@admin.com', 'admin@admin.com', NULL, 'male', NULL, NULL, NULL, NULL, 'Haymarket', 1, NULL, '$2y$10$g42oWqGK4waP6VXfLtNd/O9QbMaXGhHuZ8hwr8cVy3XzPNYtc9I6u', NULL, NULL, '2022-06-02 23:52:05', '2022-07-08 20:46:40'),
(2, 'test', 'test@gmail.com', 'test', NULL, 'male', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$u4UtI6d/m3orjgjsIbM80e4csmBAkCug6m1hXkerjm6HoL5.DlR1C', NULL, NULL, '2022-06-12 10:27:20', '2022-07-08 20:54:48'),
(5, 'IMRAN', 'imranemi143@gmail.com', 'Ali', NULL, 'male', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$StHVdVjwsm6T./OnpEaTp.rhjSwgdgoQ2PfgneWi.RK.rc4fdXPUe', NULL, NULL, '2022-07-04 09:47:31', '2022-07-04 09:47:31'),
(6, 'imran ai', 'tst@gmail.com', '03133434571', NULL, 'male', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$5rpEUItIlDHF0FGA1Mj9eeZ3FcERVnE6RdkrsA5kBKMjkv2bOuqQu', NULL, NULL, '2022-07-04 09:48:18', '2022-07-04 09:48:18'),
(4, 'khan', 'Khan@gmail.com', '43322333', NULL, 'male', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$ZXc/EkLbS7dJ8/89ineo3uoFHYVtLIVTBsgPW3PO7z4KRiems11Se', NULL, NULL, '2022-06-28 11:26:19', '2022-06-28 11:26:19'),
(7, 'Imran ali', 'khanwali@gmail.com', '03133434572', NULL, 'male', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$GkrOQe3Dw6ig1C2A81q2Te3JGOe1IL.qCznWX11.XKUcx6C0lJRyK', NULL, NULL, '2022-07-04 09:56:37', '2022-07-04 09:56:37'),
(8, 'Sulaiman Barki', 'sulaimanbarki@gmail.com', '923129686152', NULL, 'male', NULL, NULL, NULL, NULL, NULL, 1, NULL, '$2y$10$HNeqBt8BH7tOxn8d35/jbeCcX3.rfy.//1JgqTsiaXG47p18.zYey', NULL, NULL, '2022-09-08 20:54:19', '2022-09-08 20:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `wysiwyg_media`
--

DROP TABLE IF EXISTS `wysiwyg_media`;
CREATE TABLE IF NOT EXISTS `wysiwyg_media` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wysiwygable_id` int(10) UNSIGNED DEFAULT NULL,
  `wysiwygable_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wysiwyg_media_wysiwygable_id_index` (`wysiwygable_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wysiwyg_media`
--

INSERT INTO `wysiwyg_media` (`id`, `file_path`, `wysiwygable_id`, `wysiwygable_type`, `created_at`, `updated_at`) VALUES
(1, 'uploads/1652410467youtube-logo-icon-transparent---32.png', NULL, NULL, '2022-05-12 21:54:29', '2022-05-12 21:54:29'),
(2, 'uploads/1652678695qca poster.jpg', NULL, NULL, '2022-05-16 00:24:55', '2022-05-16 00:24:55'),
(3, 'uploads/1652678806qca poster.jpg', NULL, NULL, '2022-05-16 00:26:47', '2022-05-16 00:26:47'),
(4, 'uploads/1652679451qca poster.jpg', NULL, NULL, '2022-05-16 00:37:32', '2022-05-16 00:37:32'),
(5, 'uploads/1653273011147525033_5367906726560406_1519664107173435721_n.jpg', NULL, NULL, '2022-05-22 21:30:12', '2022-05-22 21:30:12'),
(6, 'uploads/1653451343screencapture-builder-zety-resume-final-resume-2022-05-24-14_44_40.png', NULL, NULL, '2022-05-24 23:02:25', '2022-05-24 23:02:25'),
(7, 'uploads/1653451345screencapture-builder-zety-resume-final-resume-2022-05-24-14_44_40.png', NULL, NULL, '2022-05-24 23:02:26', '2022-05-24 23:02:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
