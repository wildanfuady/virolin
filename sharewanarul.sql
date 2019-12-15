-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 05:48 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sharewanarul`
--

-- --------------------------------------------------------

--
-- Table structure for table `autoresponders`
--

CREATE TABLE `autoresponders` (
  `auto_id` bigint(20) UNSIGNED NOT NULL,
  `auto_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `auto_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `autoresponders`
--

INSERT INTO `autoresponders` (`auto_id`, `auto_title`, `auto_status`, `auto_content`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Untuk Dapat Ebook 1', 'Active', '<h5>Hello,</h5>\r\n                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nostrum atque ex fugit a saepe laudantium cum qui dolor laboriosam. Optio a id possimus. Voluptatibus vitae commodi neque temporibus hic?</p>\r\n                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro nostrum atque ex fugit a saepe laudantium cum qui dolor laboriosam. Optio a id possimus. Voluptatibus vitae commodi neque temporibus hic?</p>', 2, '2019-12-13 03:12:15', '2019-12-13 03:12:15');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_nasabah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `bank_code`, `bank_nasabah`, `bank_status`, `bank_number`, `bank_image`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '014', 'Wildan Fuady', 'Valid', '089545334', 'banks/bca.png', '2019-12-13 02:30:51', '2019-12-13 02:30:51'),
(2, 'BNI', '009', 'Wildan Fuady', 'Valid', '0353884883', 'banks/bni.png', '2019-12-13 02:30:52', '2019-12-13 02:30:52'),
(3, 'BRI', '012', 'Wildan Fuady', 'Valid', '908765434343', 'banks/bri.png', '2019-12-13 02:30:52', '2019-12-13 02:30:52'),
(4, 'Mandiri', '008', 'Wildan Fuady', 'Valid', '543434343', 'mandiri.png', '2019-12-13 02:30:52', '2019-12-13 02:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `form_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_hp` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_address` enum('Ya','Tidak') COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`form_id`, `form_title`, `form_hp`, `form_address`, `form_status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Form 1', 'Tidak', 'Tidak', 'Active', 2, '2019-12-13 03:12:05', '2019-12-13 03:12:05');

-- --------------------------------------------------------

--
-- Table structure for table `landingpages`
--

CREATE TABLE `landingpages` (
  `lp_id` bigint(20) UNSIGNED NOT NULL,
  `lp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lp_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lp_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `list_sub_id` bigint(20) NOT NULL,
  `form_id` bigint(20) NOT NULL,
  `autoresponder_id` bigint(20) NOT NULL,
  `lp_header_layout` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lp_header_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lp_header_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_all` enum('Publish','Draf') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landingpages`
--

INSERT INTO `landingpages` (`lp_id`, `lp_name`, `lp_slug`, `lp_status`, `user_id`, `list_sub_id`, `form_id`, `autoresponder_id`, `lp_header_layout`, `lp_header_title`, `lp_header_content`, `status_all`, `created_at`, `updated_at`) VALUES
(1, 'Bonus E-book Akhir tahun', 'bonus-ebook-akhir-tahun', 'Active', 2, 1, 1, 1, '1', 'Mantap Blah', '<p>cakep</p>', 'Draf', '2019-12-13 03:12:35', '2019-12-13 03:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `list_subscribers`
--

CREATE TABLE `list_subscribers` (
  `list_sub_id` bigint(20) UNSIGNED NOT NULL,
  `list_sub_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `list_sub_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list_subscribers`
--

INSERT INTO `list_subscribers` (`list_sub_id`, `list_sub_name`, `user_id`, `list_sub_status`, `created_at`, `updated_at`) VALUES
(1, 'Tipe 3', 2, 'Active', '2019-12-13 02:36:02', '2019-12-13 02:36:02'),
(2, 'Tipe 4', 2, 'Active', '2019-12-13 04:01:14', '2019-12-13 04:01:14');

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
(3, '2019_08_06_062217_create_uploads_table', 1),
(4, '2019_08_21_042547_create_provinces_table', 1),
(5, '2019_08_21_043140_create_cities_table', 1),
(6, '2019_09_01_205139_create_order_table', 1),
(7, '2019_09_04_220058_create_products_table', 1),
(8, '2019_09_04_220457_create_banks_table', 1),
(9, '2019_09_10_164834_create_subscribers_table', 1),
(10, '2019_09_11_100719_create_promo_table', 1),
(11, '2019_09_21_022425_create_landingpages_table', 1),
(12, '2019_10_29_171531_create_list_subscribers_table', 1),
(13, '2019_10_29_194120_create_autoresponders_table', 1),
(14, '2019_10_29_202709_create_forms_table', 1),
(15, '2019_12_08_104250_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 22),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `order_date`, `order_end`, `order_status`, `order_payment`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-12-14 03:36:20', '2019-12-16 03:36:20', 'Pending', '3', 25, '2019-12-14 03:36:20', '2019-12-14 03:36:20'),
(2, 4, '2019-12-14 03:42:22', '2019-12-16 03:42:22', 'Pending', '1', 26, '2019-12-14 03:42:22', '2019-12-14 03:42:22'),
(3, 3, '2019-12-14 03:43:23', '2019-12-16 03:43:23', 'Pending', '3', 27, '2019-12-14 03:43:23', '2019-12-14 03:43:23'),
(4, 4, '2019-12-14 04:16:18', '2019-12-16 04:16:18', 'Pending', '4', 28, '2019-12-14 04:16:18', '2019-12-14 04:16:18');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2019-12-13 02:30:52', '2019-12-13 02:30:52'),
(2, 'role-create', 'web', '2019-12-13 02:30:52', '2019-12-13 02:30:52'),
(3, 'role-edit', 'web', '2019-12-13 02:30:52', '2019-12-13 02:30:52'),
(4, 'role-delete', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(5, 'users-list', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(6, 'users-create', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(7, 'users-edit', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(8, 'users-delete', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(9, 'banks-list', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(10, 'banks-create', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(11, 'banks-edit', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(12, 'banks-delete', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(13, 'orders-list', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(14, 'orders-create', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(15, 'orders-edit', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(16, 'orders-delete', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(17, 'promos-list', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(18, 'promos-create', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(19, 'promos-edit', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(20, 'promos-delete', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(21, 'payments-list', 'web', '2019-12-13 02:30:53', '2019-12-13 02:30:53'),
(22, 'payments-create', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(23, 'payments-edit', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(24, 'payments-delete', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(25, 'statistics-list', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(26, 'statistics-create', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(27, 'statistics-edit', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(28, 'statistics-delete', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(29, 'reports-list', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(30, 'reports-create', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(31, 'reports-edit', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(32, 'reports-delete', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(33, 'settings-list', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(34, 'settings-create', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(35, 'settings-edit', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(36, 'settings-delete', 'web', '2019-12-13 02:30:54', '2019-12-13 02:30:54'),
(37, 'products-list', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(38, 'products-create', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(39, 'products-edit', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(40, 'products-delete', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(41, 'grafik-pengunjung', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(42, 'grafik-penjualan', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(43, 'grafik-promo', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(44, 'grafik-user', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(45, 'form-list', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(46, 'form-create', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(47, 'form-edit', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(48, 'form-delete', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(49, 'landingpage-list', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(50, 'landingpage-create', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(51, 'landingpage-edit', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(52, 'landingpage-delete', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(53, 'autoresponder-list', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(54, 'autoresponder-create', 'web', '2019-12-13 02:30:55', '2019-12-13 02:30:55'),
(55, 'autoresponder-edit', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(56, 'autoresponder-delete', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(57, 'list-subscriber-list', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(58, 'list-subscriber-create', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(59, 'list-subscriber-edit', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(60, 'list-subscriber-delete', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(61, 'mysubscriber-list', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(62, 'mysubscriber-create', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(63, 'mysubscriber-edit', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(64, 'mysubscriber-delete', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(65, 'report-user', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(66, 'setting-user', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56'),
(67, 'order-user', 'web', '2019-12-13 02:30:56', '2019-12-13 02:30:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_max_db` int(11) NOT NULL,
  `product_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_desc`, `product_max_db`, `product_status`, `product_price`, `created_at`, `updated_at`) VALUES
(1, 'Trial', 'Lorem ipsum', 1000, 'Valid', 0, '2019-12-13 02:30:52', '2019-12-13 02:30:52'),
(2, 'Pro 1', 'Lorem ipsum', 3000, 'Valid', 100000, '2019-12-13 02:30:52', '2019-12-13 02:30:52'),
(3, 'Pro 2', 'Lorem ipsum', 5000, 'Valid', 150000, '2019-12-13 02:30:52', '2019-12-13 02:30:52'),
(4, 'Pro 3', 'Lorem ipsum', 10000, 'Valid', 250000, '2019-12-13 02:30:52', '2019-12-13 02:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promo_id` bigint(20) UNSIGNED NOT NULL,
  `promo_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `promo_start` date NOT NULL,
  `promo_end` date NOT NULL,
  `promo_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2019-12-13 02:31:39', '2019-12-13 02:31:39'),
(2, 'User', 'web', '2019-12-13 02:33:19', '2019-12-13 02:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 1),
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
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscriber_name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_nohp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_verifikasi` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscriber_status` enum('valid','invalid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `lp_id` int(11) NOT NULL,
  `list_sub_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `subscriber_name`, `subscriber_email`, `subscriber_nohp`, `subscriber_alamat`, `subscriber_verifikasi`, `subscriber_status`, `user_id`, `lp_id`, `list_sub_id`, `created_at`, `updated_at`) VALUES
(1, 'Una Bruen', 'wthompson@gmail.com', '(671) 975-6727', '196 Skylar Meadows Suite 457\nIbrahimborough, HI 21731', 'Beverly Kutch', 'valid', 2, 1, 1, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(2, 'Dr. Leonardo Mraz DVM', 'pparisian@rowe.com', '+1.338.733.4993', '44862 Pansy Creek Suite 376\nChancehaven, AR 81925-7531', 'Griffin Crooks', 'valid', 2, 1, 1, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(3, 'Jessika Thompson', 'lexus.collins@hotmail.com', '1-973-667-2716 x48066', '67150 Jerrold Dam Suite 488\nSedrickland, GA 39165', 'Miss Audie Jacobson II', 'valid', 14, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(4, 'Dewayne Lowe', 'jasmin.bartell@hotmail.com', '(751) 201-4509', '6631 Spinka Fords Apt. 386\nSouth Malcolm, OK 40777', 'Demetris Brekke', 'valid', 18, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(5, 'Velda Jacobs', 'lgutkowski@feeney.org', '918-966-5170 x46383', '689 Macy Drives Apt. 197\nWernerville, KY 92730-4928', 'Dr. Chanelle Bosco Jr.', 'valid', 15, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(6, 'Adan Dickens DDS', 'sim73@hotmail.com', '635-372-9008 x31006', '4796 Littel Cove Apt. 474\nJoneston, SC 94118-1558', 'Noah Wilderman', 'valid', 19, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(7, 'Walker Bayer', 'antonio.waters@windler.com', '+1 (567) 647-3888', '5058 Brooke Isle Suite 574\nJohnsport, AZ 66949', 'Delbert Kulas', 'valid', 4, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(8, 'Brennon O\'Connell Sr.', 'zena95@bergnaum.com', '287-799-1677 x3173', '798 Boehm Skyway\nManteshire, KY 13325-0922', 'Susanna Ferry', 'valid', 16, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(9, 'Dr. Clifford Cronin IV', 'vupton@hotmail.com', '1-304-470-7467 x218', '4670 Margaretta Roads Apt. 996\nLake Aidaborough, LA 15890', 'Kieran Hand', 'valid', 7, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(10, 'Miss Brenna Cruickshank', 'schmeler.breanne@yahoo.com', '912-450-4642', '96908 Emmalee Flat\nPort Haydenburgh, SC 60430', 'Jamie Ruecker', 'valid', 2, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(11, 'Ms. Hortense D\'Amore MD', 'paucek.shakira@zboncak.info', '+1.823.247.6421', '45278 Cole Shores\nHardyhaven, WY 18899', 'Susanna Bradtke', 'valid', 11, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(12, 'Clement Lindgren', 'susie47@hettinger.info', '+1 (430) 946-8031', '62965 Rebeca Drive\nNorth Alannamouth, KS 32864-5490', 'Jamir Baumbach', 'valid', 12, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(13, 'Jennie Hammes', 'ana.legros@hotmail.com', '578.726.6511 x936', '943 Greenfelder Walk\nJarrellside, DC 68962-8077', 'Miss Amara Weimann', 'valid', 14, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(14, 'Vivienne Green', 'dhettinger@gmail.com', '1-947-631-3246 x6805', '75976 Weissnat Run Apt. 637\nPort Laurineborough, ME 16842', 'Harvey Bashirian', 'valid', 21, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(15, 'Joel Ondricka PhD', 'zemlak.harmony@cassin.com', '1-987-843-6376 x6375', '765 Ashleigh Stream Suite 864\nSouth Karolannburgh, ND 58856', 'Erling Mann', 'valid', 12, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(16, 'Evans Bednar', 'yfeest@hotmail.com', '615.237.4641 x346', '961 Deontae Ferry Apt. 716\nSouth Amalia, NM 50346', 'Prof. Rupert McGlynn II', 'valid', 9, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(17, 'Dr. Alessandra Prohaska', 'nakia.brakus@yahoo.com', '+1-351-490-6872', '5960 Emerald Drives\nLake Flossiechester, AZ 70536', 'Mr. Charley Cremin', 'valid', 14, 1, 0, '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(18, 'Dorian Hahn', 'christelle07@okeefe.org', '(840) 526-1734 x5114', '6472 Bradtke Crescent\nNew Davionstad, UT 07056-9870', 'Yadira Jacobs III', 'valid', 18, 1, 0, '2019-12-13 02:30:59', '2019-12-13 02:30:59'),
(19, 'Marilie Grant Jr.', 'lehner.khalil@rippin.com', '(682) 474-3450', '7182 Rippin Views Suite 943\nVonRuedenhaven, IL 74549-2319', 'Jermey Waters', 'valid', 17, 1, 0, '2019-12-13 02:30:59', '2019-12-13 02:30:59'),
(20, 'Renee Sipes', 'lesch.reinhold@koch.com', '+1.870.738.3163', '89066 Daniel Branch\nEast Heathfort, SC 69096-4422', 'Ms. Winona Boehm DDS', 'valid', 11, 1, 0, '2019-12-13 02:30:59', '2019-12-13 02:30:59'),
(21, 'Wildan Fuady', 'wildanfuady@gmail.com', '087722686655', 'Pabuaran', '1', 'valid', 2, 1, 1, '2019-12-13 03:59:54', '2019-12-13 03:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `indikator_id` int(11) NOT NULL,
  `dokumen_internal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dokumen_eksternal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `masa_aktif` date NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `product_id`, `status`, `level`, `masa_aktif`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2019-12-13 02:30:51', '', 'Valid', 'admin', '0000-00-00', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'n282iopKRo', '2019-12-13 02:30:51', '2019-12-13 02:30:51'),
(2, 'Quinton Blanda', 'enola55@example.com', '2019-12-13 02:30:57', '2', 'Valid', 'user', '2019-12-18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6HmQg5GnxB3maT3jVRIyncLGAKJ8Q2puYihTHU34XU8InT2ypZgaLkfgUhVa', '2019-12-13 02:30:57', '2019-12-13 02:34:32'),
(3, 'Halle Lebsack', 'donnie21@example.org', '2019-12-13 02:30:57', '2', 'valid', 'user', '2019-12-16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ysWnJZ9fmx', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(4, 'Neoma Swaniawski', 'hkuvalis@example.net', '2019-12-13 02:30:57', '2', 'valid', 'user', '2019-12-19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3wQKT1xESJ', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(5, 'Mrs. Raegan Goodwin', 'rogahn.violet@example.net', '2019-12-13 02:30:57', '2', 'valid', 'user', '2019-12-14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5QqGtQUK6J', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(6, 'Carlotta Crooks', 'jakubowski.cielo@example.com', '2019-12-13 02:30:57', '3', 'valid', 'user', '2019-12-20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'weiusBiF2i', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(7, 'Madisyn Leuschke', 'zachary62@example.com', '2019-12-13 02:30:57', '3', 'valid', 'user', '2019-12-23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'chCkk2WUnO', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(8, 'Lisette Dare', 'klindgren@example.com', '2019-12-13 02:30:57', '4', 'valid', 'user', '2019-12-19', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wRBaFYgJC4', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(9, 'Adriana Walsh', 'bwilderman@example.com', '2019-12-13 02:30:57', '2', 'valid', 'user', '2019-12-21', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'njtavMA6Fm', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(10, 'Miss Maria Connelly V', 'quinten.witting@example.net', '2019-12-13 02:30:57', '2', 'valid', 'user', '2019-12-30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AH2YIdHGsS', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(11, 'Celine Ernser', 'kharvey@example.net', '2019-12-13 02:30:57', '1', 'valid', 'user', '2019-12-15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oD7nRGyVvV', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(12, 'Lewis Bailey', 'kiera.hayes@example.net', '2019-12-13 02:30:57', '2', 'valid', 'user', '2019-12-15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '87nmEgx0fJ', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(13, 'Vicky Jacobs', 'romaguera.aurore@example.org', '2019-12-13 02:30:57', '4', 'valid', 'user', '2019-12-28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'i2avuGkQjV', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(14, 'Hilario Beer', 'robel.alta@example.com', '2019-12-13 02:30:57', '2', 'valid', 'user', '2019-12-16', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'stjhRlrBJw', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(15, 'Mr. Sherwood Osinski', 'prosacco.bradley@example.net', '2019-12-13 02:30:57', '1', 'valid', 'user', '2019-12-18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '46ODv9SByB', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(16, 'Faye Fritsch', 'talon50@example.net', '2019-12-13 02:30:57', '4', 'valid', 'user', '2019-12-30', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FIRR9TH0Dc', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(17, 'Dr. Annabel Daniel MD', 'hklein@example.net', '2019-12-13 02:30:57', '1', 'valid', 'user', '2019-12-17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VZcMF2xHEJ', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(18, 'Ova Pollich', 'gregoria04@example.net', '2019-12-13 02:30:57', '3', 'valid', 'user', '2019-12-24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uh2ieulZpF', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(19, 'Newell Brekke', 'pablo90@example.org', '2019-12-13 02:30:57', '3', 'valid', 'user', '2020-01-01', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'f5tVsVB28N', '2019-12-13 02:30:57', '2019-12-13 02:30:57'),
(20, 'Dr. Lula Gutkowski IV', 'monahan.marion@example.net', '2019-12-13 02:30:57', '4', 'valid', 'user', '2019-12-26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'RDujbSPn9m', '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(21, 'Kelsi O\'Keefe', 'santino.jacobi@example.com', '2019-12-13 02:30:57', '3', 'valid', 'user', '2019-12-22', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VCeB1QSyeO', '2019-12-13 02:30:58', '2019-12-13 02:30:58'),
(28, 'Medika Muzha', 'medikamuzha@admin.com', NULL, '4', '', 'admin', '0000-00-00', '$2y$10$QDvhCuZS67myMzmK6/z0w.M1UxjqHB.VTvD/O4faqtrhzcC0aG/f6', NULL, '2019-12-14 04:16:18', '2019-12-14 04:16:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autoresponders`
--
ALTER TABLE `autoresponders`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `landingpages`
--
ALTER TABLE `landingpages`
  ADD PRIMARY KEY (`lp_id`);

--
-- Indexes for table `list_subscribers`
--
ALTER TABLE `list_subscribers`
  ADD PRIMARY KEY (`list_sub_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autoresponders`
--
ALTER TABLE `autoresponders`
  MODIFY `auto_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landingpages`
--
ALTER TABLE `landingpages`
  MODIFY `lp_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `list_subscribers`
--
ALTER TABLE `list_subscribers`
  MODIFY `list_sub_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `promo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
