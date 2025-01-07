-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th1 07, 2025 lúc 10:18 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `like8s`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `remember_token`, `state`, `created_at`, `updated_at`, `role`) VALUES
(12, 'cson', '$2y$12$8sGGhhWIKfPoLQIYNeuKnOd.QbGxKu9cK3HUSWvGvBjMH8Ah2fzGK', '5BFDLyB7Aq9AuHzfGckntnrAmNXJfS6U7NYAHGSFCj456PDMJUUQBP0hx2IP', 'active', '2024-12-23 22:32:48', '2025-01-05 04:01:03', 'user'),
(13, 'admin', '$2y$12$voUZpp1lYpk2RUD1h92uKeRWhR5rYZ56BfOCCpTYhf3gOQ2qOjVAO', 'HAno1t2A65BE5B7I3fdmVAC1cS3Rm75gTON1909avoeTP4Rqg10oi9nfRJOH', 'active', '2024-12-23 22:40:17', '2025-01-07 03:15:07', 'admin'),
(14, 'client', '$2y$12$dl0DA44gDHi1iaxHWuNKtuu0ENO0c8AzxBRe9QROS/fBeFV1D3/WC', NULL, 'active', '2025-01-05 04:34:17', '2025-01-05 04:34:17', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','đại lý') COLLATE utf8mb4_unicode_ci NOT NULL,
  `linktelegram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `liketype`
--

CREATE TABLE `liketype` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `liketype`
--

INSERT INTO `liketype` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'like', 'like.svg', NULL, NULL),
(2, 'care', 'care.svg', NULL, NULL),
(3, 'love', 'love.svg', NULL, NULL),
(4, 'haha', 'haha.svg', NULL, NULL),
(5, 'wow', 'wow.svg', NULL, NULL),
(6, 'sad', 'sad.svg', NULL, NULL),
(7, 'angry', 'angry.svg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_12_15_121620_create_account_table', 1),
(2, '2024_12_15_130437_create_userinfo_table', 2),
(3, '2024_12_15_151206_create_platfrom_table', 3),
(4, '2024_12_15_151416_create_liketype_table', 4),
(5, '2024_12_15_152654_create_servicetype_table', 5),
(6, '2024_12_15_152725_create_service_table', 6),
(7, '2024_12_15_155305_create_order_table', 7),
(8, '2024_12_15_160330_create_contact_table', 8),
(9, '2024_12_15_160553_rename_avata_to_avatar_in_userinfo_table', 9),
(10, '2024_12_16_095144_rename_account_id_in_userinfo_table', 10),
(11, '2024_12_20_021145_create_wallet_table', 11),
(12, '2024_12_20_021157_create_wallet_transaction_table', 11),
(16, '2024_12_27_071032_add_object_id_to_orders_table', 12),
(18, '2024_12_30_092500_add_verified_at_and_token_to_userinfo', 13),
(19, '2024_12_31_174620_add_remember_token_to_account_table', 14),
(20, '2025_01_05_020054_add_state_to_platform_table', 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` bigint UNSIGNED NOT NULL,
  `object_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountid` bigint UNSIGNED NOT NULL,
  `serviceid` bigint UNSIGNED NOT NULL,
  `amount` int NOT NULL,
  `money` decimal(15,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `object_id`, `accountid`, `serviceid`, `amount`, `money`, `note`, `state`, `created_at`, `updated_at`) VALUES
(2, 'son.cong.inh', 13, 20, 1, 10000.00, NULL, 1, '2024-12-25 08:39:25', '2024-12-25 08:39:25'),
(9, '1234', 13, 1, 50, 500000.00, '(like, care, love, haha) ', 1, '2024-12-27 11:36:32', '2024-12-27 11:36:32'),
(10, '1234', 13, 10, 50, 500000.00, '', 1, '2024-12-27 11:47:10', '2024-12-27 11:47:10'),
(11, '1234', 13, 1, 50, 500000.00, '(like, care, love, haha, wow, sad, angry) ', 1, '2024-12-27 21:45:34', '2024-12-27 21:45:34'),
(12, '1234', 13, 15, 50, 500000.00, '', 1, '2025-01-01 02:05:17', '2025-01-01 02:05:17'),
(13, '1234', 12, 1, 50, 500000.00, '(like) ', 1, '2025-01-03 22:31:12', '2025-01-03 22:31:12'),
(14, '1234', 12, 1, 50, 500000.00, '(like) ', 1, '2025-01-03 22:31:19', '2025-01-03 22:31:19'),
(15, '1234', 12, 1, 50, 500000.00, '(like) ', 1, '2025-01-03 22:31:34', '2025-01-03 22:31:34'),
(16, '1234', 12, 1, 50, 500000.00, '(like) ', 1, '2025-01-03 22:31:44', '2025-01-03 22:31:44'),
(17, '1234', 12, 1, 50, 500000.00, '(like) ', 1, '2025-01-03 22:31:50', '2025-01-03 22:31:50'),
(18, '1234', 12, 1, 50, 500000.00, '(like) ', 1, '2025-01-03 22:41:54', '2025-01-03 22:41:54'),
(19, '1234', 12, 1, 50, 500000.00, '(like) ', 1, '2025-01-03 22:42:01', '2025-01-03 22:42:01'),
(20, '1234', 12, 3, 50, 500000.00, '(like) ', 1, '2025-01-03 22:42:09', '2025-01-03 22:42:09'),
(21, '1234', 12, 2, 50, 500000.00, '(like) ', 1, '2025-01-03 22:42:17', '2025-01-03 22:42:17'),
(22, '1234', 12, 1, 50, 500000.00, '(like) ', 2, '2025-01-03 22:42:24', '2025-01-03 22:42:24'),
(23, '1234', 12, 1, 50, 500000.00, '(like) ', 3, '2025-01-03 22:42:30', '2025-01-03 22:42:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `platform`
--

CREATE TABLE `platform` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `platform`
--

INSERT INTO `platform` (`id`, `name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 1, NULL, '2025-01-04 22:43:53'),
(2, 'Instagram', 1, NULL, NULL),
(3, 'Tiktok', 1, NULL, '2025-01-04 22:44:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servicetypeid` bigint UNSIGNED NOT NULL,
  `platformid` bigint UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `name`, `servicetypeid`, `platformid`, `price`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Like siêu nhanh', 1, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(2, 'Like nhanh', 1, 1, 10000.00, 1, NULL, '2025-01-05 03:10:10'),
(3, 'Tốc độ thường', 1, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(4, 'Tốc độ chậm', 1, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(5, 'Like siêu nhanh', 5, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(6, 'Like nhanh', 5, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(7, 'Like thường', 5, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(8, 'Tốc độ thường', 6, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(9, 'Tốc độ nhanh', 6, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(10, 'Tốc độ nhanh', 3, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(11, 'Tốc độ thường', 3, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(12, 'Tốc độ chậm', 3, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(13, 'Tốc độ nhanh', 2, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(14, 'Tốc độ thường', 2, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(15, 'Tốc độ nhanh', 4, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(16, 'Tốc độ thường', 4, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(17, 'Tốc độ chậm', 4, 1, 10000.00, 1, NULL, '2025-01-04 22:43:53'),
(18, 'Like chất lượng', 1, 2, 10000.00, 1, NULL, NULL),
(19, 'Like giá rẻ', 1, 2, 10000.00, 1, NULL, NULL),
(20, 'Follow chất lượng', 3, 2, 10000.00, 1, NULL, NULL),
(21, 'Follow giá rẻ', 3, 2, 10000.00, 1, NULL, NULL),
(22, 'Like giá rẻ', 1, 3, 10000.00, 1, NULL, '2025-01-04 22:44:10'),
(23, 'Like nhanh', 1, 3, 10000.00, 1, NULL, '2025-01-04 22:44:10'),
(26, 'Follow chất lượng', 3, 3, 10000.00, 1, NULL, '2025-01-04 22:44:10'),
(27, 'Follow nhanh', 3, 3, 10000.00, 1, NULL, '2025-01-04 22:44:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `servicetype`
--

CREATE TABLE `servicetype` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `servicetype`
--

INSERT INTO `servicetype` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'like', NULL, NULL),
(2, 'share', NULL, NULL),
(3, 'follow', NULL, NULL),
(4, 'join_group', NULL, NULL),
(5, 'like page', NULL, NULL),
(6, 'like comment', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `userinfo`
--

CREATE TABLE `userinfo` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accountid` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `userinfo`
--

INSERT INTO `userinfo` (`id`, `name`, `email`, `avatar`, `phone`, `accountid`, `created_at`, `updated_at`, `verified_at`, `token`) VALUES
(2, 'Sơn', 'sondinhcong11@gmail.com', '1736047167.png', '0332310575', 13, '2024-12-27 20:16:39', '2025-01-07 03:12:09', '2024-12-30 23:03:59', 'P9J4Gx'),
(3, 'Test', NULL, '1736076756.png', '0123456789', 12, NULL, '2025-01-06 22:28:49', NULL, ''),
(4, '', NULL, NULL, '0123456789', 14, '2025-01-05 04:34:17', '2025-01-06 22:29:38', NULL, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallet`
--

CREATE TABLE `wallet` (
  `id` bigint UNSIGNED NOT NULL,
  `accountid` bigint UNSIGNED NOT NULL,
  `balance` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wallet`
--

INSERT INTO `wallet` (`id`, `accountid`, `balance`, `created_at`, `updated_at`) VALUES
(2, 12, 15020000.00, '2024-12-23 22:32:48', '2025-01-06 19:57:06'),
(3, 13, 10000.00, '2024-12-23 22:40:17', '2025-01-01 02:05:17'),
(4, 14, 0.00, '2025-01-05 04:34:17', '2025-01-05 04:34:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallet_transaction`
--

CREATE TABLE `wallet_transaction` (
  `id` bigint UNSIGNED NOT NULL,
  `wallet_id` bigint UNSIGNED NOT NULL,
  `type` enum('deposit','withdraw','payment') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wallet_transaction`
--

INSERT INTO `wallet_transaction` (`id`, `wallet_id`, `type`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'deposit', 10000.00, 'Nạp tiền vào ví', '2024-12-27 10:41:19', '2024-12-27 10:41:19'),
(2, 3, 'deposit', 500000.00, 'Nạp tiền vào ví', '2024-12-27 10:43:26', '2024-12-27 10:43:26'),
(3, 3, 'payment', 500000.00, 'Thanh toán dịch vụ', '2024-12-27 11:35:01', '2024-12-27 11:35:01'),
(7, 3, 'deposit', 500000.00, 'Nạp tiền vào ví', '2024-12-27 11:44:25', '2024-12-27 11:44:25'),
(8, 3, 'payment', 500000.00, 'Thanh toán dịch vụ', '2024-12-27 11:47:10', '2024-12-27 11:47:10'),
(9, 3, 'deposit', 500000.00, 'Nạp tiền vào ví', '2024-12-27 21:43:19', '2024-12-27 21:43:19'),
(10, 3, 'payment', 500000.00, 'Thanh toán dịch vụ', '2024-12-27 21:45:34', '2024-12-27 21:45:34'),
(11, 3, 'deposit', 500000.00, 'Nạp tiền vào ví', '2024-12-27 22:27:02', '2024-12-27 22:27:02'),
(12, 3, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-01 02:05:17', '2025-01-01 02:05:17'),
(13, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:27:19', '2025-01-03 22:27:19'),
(14, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:27:23', '2025-01-03 22:27:23'),
(15, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:27:28', '2025-01-03 22:27:28'),
(16, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:27:31', '2025-01-03 22:27:31'),
(17, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:27:35', '2025-01-03 22:27:35'),
(18, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:27:44', '2025-01-03 22:27:44'),
(19, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:27:49', '2025-01-03 22:27:49'),
(20, 2, 'deposit', 10000.00, 'Nạp tiền vào ví', '2025-01-03 22:27:54', '2025-01-03 22:27:54'),
(21, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:27:59', '2025-01-03 22:27:59'),
(22, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:28:04', '2025-01-03 22:28:04'),
(23, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:28:48', '2025-01-03 22:28:48'),
(24, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-03 22:30:26', '2025-01-03 22:30:26'),
(25, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:31:12', '2025-01-03 22:31:12'),
(26, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:31:19', '2025-01-03 22:31:19'),
(27, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:31:34', '2025-01-03 22:31:34'),
(28, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:31:44', '2025-01-03 22:31:44'),
(29, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:31:50', '2025-01-03 22:31:50'),
(30, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:41:54', '2025-01-03 22:41:54'),
(31, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:42:01', '2025-01-03 22:42:01'),
(32, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:42:09', '2025-01-03 22:42:09'),
(33, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:42:17', '2025-01-03 22:42:17'),
(34, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:42:24', '2025-01-03 22:42:24'),
(35, 2, 'payment', 500000.00, 'Thanh toán dịch vụ', '2025-01-03 22:42:30', '2025-01-03 22:42:30'),
(36, 2, 'deposit', 10000.00, 'Nạp tiền vào ví', '2025-01-06 19:34:17', '2025-01-06 19:34:17'),
(37, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:27', '2025-01-06 19:56:27'),
(38, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:29', '2025-01-06 19:56:29'),
(39, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:31', '2025-01-06 19:56:31'),
(40, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:33', '2025-01-06 19:56:33'),
(41, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:34', '2025-01-06 19:56:34'),
(42, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:35', '2025-01-06 19:56:35'),
(43, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:37', '2025-01-06 19:56:37'),
(44, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:38', '2025-01-06 19:56:38'),
(45, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:39', '2025-01-06 19:56:39'),
(46, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:40', '2025-01-06 19:56:40'),
(47, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:42', '2025-01-06 19:56:42'),
(48, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:43', '2025-01-06 19:56:43'),
(49, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:44', '2025-01-06 19:56:44'),
(50, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:46', '2025-01-06 19:56:46'),
(51, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:47', '2025-01-06 19:56:47'),
(52, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:48', '2025-01-06 19:56:48'),
(53, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:49', '2025-01-06 19:56:49'),
(54, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:51', '2025-01-06 19:56:51'),
(55, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:52', '2025-01-06 19:56:52'),
(56, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:53', '2025-01-06 19:56:53'),
(57, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:54', '2025-01-06 19:56:54'),
(58, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:56', '2025-01-06 19:56:56'),
(59, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:57', '2025-01-06 19:56:57'),
(60, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:58', '2025-01-06 19:56:58'),
(61, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:56:59', '2025-01-06 19:56:59'),
(62, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:57:01', '2025-01-06 19:57:01'),
(63, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:57:02', '2025-01-06 19:57:02'),
(64, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:57:03', '2025-01-06 19:57:03'),
(65, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:57:04', '2025-01-06 19:57:04'),
(66, 2, 'deposit', 500000.00, 'Nạp tiền vào ví', '2025-01-06 19:57:06', '2025-01-06 19:57:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_username_unique` (`username`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `liketype`
--
ALTER TABLE `liketype`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_accountid_foreign` (`accountid`),
  ADD KEY `order_serviceid_foreign` (`serviceid`);

--
-- Chỉ mục cho bảng `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_servicetypeid_foreign` (`servicetypeid`),
  ADD KEY `service_platformid_foreign` (`platformid`);

--
-- Chỉ mục cho bảng `servicetype`
--
ALTER TABLE `servicetype`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userinfo_account_id_foreign` (`accountid`);

--
-- Chỉ mục cho bảng `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_accountid_foreign` (`accountid`);

--
-- Chỉ mục cho bảng `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_transaction_wallet_id_foreign` (`wallet_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `liketype`
--
ALTER TABLE `liketype`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `platform`
--
ALTER TABLE `platform`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `servicetype`
--
ALTER TABLE `servicetype`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_accountid_foreign` FOREIGN KEY (`accountid`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `order_serviceid_foreign` FOREIGN KEY (`serviceid`) REFERENCES `service` (`id`);

--
-- Các ràng buộc cho bảng `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_platformid_foreign` FOREIGN KEY (`platformid`) REFERENCES `platform` (`id`),
  ADD CONSTRAINT `service_servicetypeid_foreign` FOREIGN KEY (`servicetypeid`) REFERENCES `servicetype` (`id`);

--
-- Các ràng buộc cho bảng `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `userinfo_account_id_foreign` FOREIGN KEY (`accountid`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_accountid_foreign` FOREIGN KEY (`accountid`) REFERENCES `account` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  ADD CONSTRAINT `wallet_transaction_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
