-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 03, 2022 lúc 11:24 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `jigear`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalogs`
--

INSERT INTO `catalogs` (`id`, `title`, `description`, `detail`, `published`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Mac', 'Explore iPhone, the world’s most powerful personal device. Check out iPhone 13 Pro, iPhone 13 Pro Max, iPhone 13, iPhone 13 mini, and iPhone SE.', '', 1, NULL, '2022-03-31 12:31:34', '2022-03-31 12:31:34'),
(4, 'MacBook Air', 'MacBook Air is completely transformed by the power of Apple-designed M1 chip. Up to 3.5x faster CPU, 5x faster graphics, and 18 hours of battery life.', '', 1, 2, '2022-04-01 07:21:24', '2022-04-01 07:23:03'),
(5, 'MacBook Pro', 'MacBook Pro. Our most powerful notebooks. Fast M1 processors, incredible graphics, and spectacular Retina displays. Now available in a 14-inch model.', '', 1, 2, '2022-04-01 07:23:23', '2022-04-01 07:23:49'),
(6, 'iMac24', 'The new iMac. 7 vibrant colors. Impossibly thin design. 24-inch 4.5K Retina display. The best camera, mics, and speakers in a Mac. Supercharged by M1', '', 1, 2, '2022-04-01 07:39:05', '2022-04-01 07:41:33'),
(7, 'Mac mini', 'Mac mini has the Apple M1 chip with 8-core CPU, 8-core GPU, Unified Memory, Neural Engine, full stack machine learning, Wi-Fi 6, and more.', '', 1, 2, '2022-04-01 07:43:06', '2022-04-01 07:44:48'),
(8, 'Mac Pro', 'The all-new Mac Pro. Redesigned for extreme performance, expansion, and configurability, it’s a system for pros to push the limits of what is possible.', '', 1, 2, '2022-04-01 07:54:51', '2022-04-01 07:56:20'),
(9, 'iPad', 'Explore the world of iPad. Featuring an all-new iPad and iPad mini, and the powerful iPad Pro and iPad Air.', '', 1, NULL, '2022-04-01 08:43:40', '2022-04-01 08:50:54'),
(10, 'iPad Pro', 'The new iPad Pro has the M1 chip, 12.9-inch Liquid Retina XDR display, 11-inch Liquid Retina display, 5G support, and new camera with Center Stage.', '', 1, 9, '2022-04-01 08:44:20', '2022-04-01 08:45:52'),
(11, 'iPad Air', 'The new iPad Air has an all-screen design, 10.9″ display, M1 chip, Center Stage, works with Apple Pencil and Magic Keyboard, and comes in five colors.', '', 1, 9, '2022-04-01 08:46:40', '2022-04-01 08:48:05'),
(12, 'iPad mini', 'iPad mini has an all-new 8.3-inch Liquid Retina display, the A15 Bionic chip, 5G, USB-C, support for Apple Pencil (2nd gen), and comes in four colors.', '', 1, 9, '2022-04-01 08:52:06', '2022-04-01 08:56:47'),
(13, 'Apple Pencil', 'Apple Pencil is the standard for drawing, note-taking, and marking up documents. Intuitive, precise, and magical.', '', 1, 9, '2022-04-01 09:07:04', '2022-04-01 09:09:50'),
(14, 'Keyboards', 'iPad keyboards provide a great typing experience, full-size keyboard, and durable protection for your iPad.', '', 1, 9, '2022-04-01 09:11:19', '2022-04-01 09:13:01'),
(15, 'iPhone', 'Explore iPhone, the world’s most powerful personal device. Check out iPhone 13 Pro, iPhone 13 Pro Max, iPhone 13, iPhone 13 mini, and iPhone SE.', '', 1, NULL, '2022-04-01 09:13:28', '2022-04-01 09:14:27'),
(16, 'iPhone 13 Pro', 'iPhone 13 Pro and 13 Pro Max. Huge camera upgrades. New OLED display with ProMotion. Fastest smartphone chip ever. Breakthrough battery life.', '', 1, 15, '2022-04-01 09:14:59', '2022-04-01 09:15:58'),
(17, 'iPhone 13', 'iPhone 13 and 13 mini. Our most advanced dual-camera system. A chip that’s faster than the competition. Up to 2.5 hours more battery life', '', 1, 15, '2022-04-01 12:00:01', '2022-04-01 12:17:31'),
(18, 'iPhone 12', 'iPhone 12 and iPhone 12 mini. With A14 Bionic, great battery life, Night mode on every camera, 5G speed, Ceramic Shield, and Super Retina XDR display.', '', 1, 15, '2022-04-01 12:18:08', '2022-04-01 12:19:17'),
(19, 'iPhone 11', 'Get $100 - $650 off a new iPhone 11 when you trade in an iPhone 8 or newer. Personal setup available. Buy now with free delivery.', '', 1, 15, '2022-04-01 12:19:43', '2022-04-01 12:20:44'),
(20, 'iPhone SE', 'A superpowerful chip. A superstar camera. A leap in battery life. A fast 5G connection. A pocket-size 4.7” design. All for $429.', '', 1, 15, '2022-04-01 12:21:20', '2022-04-01 12:21:56'),
(21, 'Watch', 'Apple Watch is the ultimate device for a healthy life. Available in three models: Apple Watch Series 7, Apple Watch SE, and Apple Watch Series 3.', '', 1, NULL, '2022-04-01 12:25:38', '2022-04-01 12:26:35'),
(22, 'Apple Watch Series 7', 'Apple Watch Series 7 features the largest, most advanced display yet, breakthrough health innovations, and is the most durable Apple Watch ever.', '', 1, 21, '2022-04-01 12:28:11', '2022-04-01 12:29:10'),
(23, 'Apple Watch SE', 'Stay connected, active, healthy, and safe. Track your fitness. And go without your phone with available cellular. Apple Watch SE, starting at $279.', '', 1, 21, '2022-04-01 12:29:44', '2022-04-01 12:30:52'),
(24, 'Apple Watch Series 3', 'Apple Watch Series 3 has the core fitness, heart-monitoring, and connectivity features that make Apple Watch the ultimate device for a healthy life.', '', 1, 21, '2022-04-01 12:31:16', '2022-04-01 12:32:43'),
(25, 'Apple Watch Series Nike', 'Apple Watch Nike is available with exclusive bands and watch faces, a new Always-On Retina display, and the Nike Run Club app to take you further.', '', 1, 21, '2022-04-01 12:33:04', '2022-04-01 12:34:05'),
(26, 'Apple Watch Hermes', 'Apple Watch Hermès is the ultimate union of heritage and innovation, combining Apple Watch Series 7 with exclusive watch faces and a range of bands.', '', 1, 21, '2022-04-01 12:34:28', '2022-04-01 12:35:38'),
(27, 'Bands', 'Shop the latest Apple Watch bands and change up your look. Choose from a variety of colors and materials. Buy now with fast, free shipping.', '', 1, 21, '2022-04-01 12:36:09', '2022-04-01 12:37:17'),
(28, 'AirPods', 'AirPods models deliver an unparalleled wireless experience, from magical setup to high-quality sound. Available with free engraving.', '', 1, NULL, '2022-04-01 12:40:34', '2022-04-01 12:41:36'),
(29, 'AirPods 2nd Generation', 'AirPods feature high-quality sound, voice-activated Siri, an available wireless charging case, and free personalized engraving.', '', 1, 28, '2022-04-01 12:42:59', '2022-04-01 12:43:59'),
(30, 'AirPods 3rd Generation', 'AirPods (3rd generation). Spatial audio, Adaptive EQ, longer battery life, and sweat and water resistance — in an all-new design.', '', 1, 28, '2022-04-01 12:54:51', '2022-04-01 12:56:00'),
(31, 'AirPods Pro', 'AirPods Pro deliver Active Noise Cancellation, Transparency mode, and spatial audio — in a customizable fit. Available with free engraving.', '', 1, 28, '2022-04-01 12:56:22', '2022-04-01 12:57:26'),
(32, 'AirPods Max', 'AirPods Max combine high-fidelity audio with industry-leading Active Noise Cancellation, Adaptive EQ,  spatial audio, and free engraving.', '', 1, 28, '2022-04-01 12:58:01', '2022-04-01 12:59:04'),
(33, 'TV & Home', 'Simply connect Apple TV, HomePod mini, and other accessories to experience a smart home that runs flawlessly across your devices.', '', 1, NULL, '2022-04-01 12:59:29', '2022-04-02 20:52:56'),
(34, 'Apple TV 4K', 'Watch Apple TV+, movies, and shows in 4K High Frame Rate HDR. Stream live sports and news. Play Apple Arcade, work out with Apple Fitness+, and more.', '', 1, 33, '2022-04-01 13:02:34', '2022-04-01 13:03:16'),
(35, 'Apple TV HD', 'Apple TV HD brings you popular shows, movies, games, and more. And you can control them all with the Siri Remote. Buy now with fast, free shipping', '', 1, 33, '2022-04-01 13:04:13', '2022-04-01 13:05:11'),
(36, 'Apple TV App', 'Apple TV HD brings you popular shows, movies, games, and more. And you can control them all with the Siri Remote. Buy now with fast, free shipping.', '', 1, 33, '2022-04-01 13:05:44', '2022-04-01 13:06:33'),
(37, 'Apple TV +', 'Apple TV+ features critically acclaimed Apple Original shows and movies. Watch on the Apple TV app across devices.', '', 1, 33, '2022-04-01 13:07:01', '2022-04-01 13:07:58'),
(38, 'Home Pod Min', 'The Home app lets you control your smart accessories from anywhere on any Apple device with a simple touch, by asking Siri, or even automatically', '', 1, 33, '2022-04-01 13:08:21', '2022-04-01 13:09:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivery_addresses`
--

CREATE TABLE `delivery_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `delivery_addresses`
--

INSERT INTO `delivery_addresses` (`id`, `customer_id`, `address`, `phone_number`, `is_default`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 4, 'fwefew 1', '0933160481', 1, '2022-04-03 20:47:10', '2022-04-03 20:53:54', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imaggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imaggable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `path`, `type`, `imaggable_type`, `imaggable_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'thumbnails/BDH36CSotENarjxNvHon3wwyXzADKrR5uqKvw4lE.png', 'thumbnail', 'catalog', 2, '2022-04-01 07:27:33', '2022-04-01 07:27:33', NULL),
(2, 'thumbnails/mrO8O4a5tE9GPlGgmbS2LlhK8QIquOBTKOO9hwBd.svg', 'thumbnail', 'catalog', 4, '2022-04-01 07:30:11', '2022-04-01 07:30:11', NULL),
(3, 'thumbnails/rOojmFkXm3yQUzfMuXYts63kO4YG8cVg7G1uafgu.svg', 'thumbnail', 'catalog', 6, '2022-04-01 07:41:33', '2022-04-01 07:41:33', NULL),
(4, 'thumbnails/jqWdRfb964oqxxXis0tgGuH4nKjbcmjuI5us2vcw.svg', 'thumbnail', 'catalog', 7, '2022-04-01 07:44:48', '2022-04-01 07:44:48', NULL),
(5, 'thumbnails/Ys0ACBEFVshHXIcIsAuDDKxB8lf9Ae5YTJB797Ij.svg', 'thumbnail', 'catalog', 8, '2022-04-01 07:56:20', '2022-04-01 07:56:20', NULL),
(6, 'thumbnails/otxIGGEjUEbuciYUsvGgaPxR4hhlcY47uQeU0NeX.png', 'thumbnail', 'product', 1, '2022-04-01 08:22:45', '2022-04-01 08:22:45', NULL),
(7, 'previews/9q2XyIDHYadgk4oUQ7hErnnLE8AhQ11iVaYo1hBb.jpg', 'preview', 'product', 1, '2022-04-01 08:22:45', '2022-04-01 08:22:45', NULL),
(8, 'previews/cjEbh7qZ5WZr06uFeLz4ZBIZIKJb65EzmI03bfEX.jpg', 'preview', 'product', 1, '2022-04-01 08:22:45', '2022-04-01 08:22:45', NULL),
(11, 'thumbnails/gYJRWxcW0sDMXNFuPDgSB784lHGHeenCPkf562Jo.png', 'thumbnail', 'catalog', 9, '2022-04-01 08:50:21', '2022-04-01 08:50:21', NULL),
(13, 'thumbnails/WrsmcJBTQ9rmLSCfiagUXiRTnFvZtz2xSjVSQDp4.png', 'thumbnail', 'catalog', 12, '2022-04-01 08:59:39', '2022-04-01 08:59:39', NULL),
(14, 'thumbnails/UZdo1y90eCeGIIKUezDNUI7AH6ZtpzTeqDDXvYiM.svg', 'thumbnail', 'catalog', 5, '2022-04-01 09:00:55', '2022-04-01 09:00:55', NULL),
(16, 'thumbnails/Nu8BgI40RAyjlAPbrnJ6uOQr06ASwFinWJlrNWEX.png', 'thumbnail', 'catalog', 10, '2022-04-01 09:03:39', '2022-04-01 09:03:39', NULL),
(17, 'thumbnails/dDH9C0rJI8bIh6eBhUs1aiJVk1ahtFeTGPEMCg1M.png', 'thumbnail', 'catalog', 11, '2022-04-01 09:04:48', '2022-04-01 09:04:48', NULL),
(18, 'thumbnails/o8v1WNNNXqVXTGmvUcLcA0UOMNXhcgNev96toSsw.png', 'thumbnail', 'catalog', 13, '2022-04-01 09:09:50', '2022-04-01 09:09:50', NULL),
(19, 'thumbnails/xmEgF2F1w9gTvCZMm0onzJcx6Qn8KR44wRzx7hBp.png', 'thumbnail', 'catalog', 14, '2022-04-01 09:13:01', '2022-04-01 09:13:01', NULL),
(20, 'thumbnails/TsrkG6NCJ07b4v35IybchxVk0iAWOvn94UVG1y78.png', 'thumbnail', 'catalog', 15, '2022-04-01 09:14:27', '2022-04-01 09:14:27', NULL),
(21, 'thumbnails/D0DV56vYkiJkDyGgruHgSuTgWG9BOJRKwI1knjcq.svg', 'thumbnail', 'catalog', 16, '2022-04-01 09:15:58', '2022-04-01 09:15:58', NULL),
(22, 'thumbnails/a9vTyjgOHGPT5eqTHKBYLEb60SzyMnYnnhr6hgjf.svg', 'thumbnail', 'catalog', 17, '2022-04-01 12:17:31', '2022-04-01 12:17:31', NULL),
(23, 'thumbnails/mPD5fmt6KhW5Cyz8Kh4UMyJZbXhdrTUx5raDF7Cj.svg', 'thumbnail', 'catalog', 18, '2022-04-01 12:19:17', '2022-04-01 12:19:17', NULL),
(24, 'thumbnails/7S00UNaBFs3tyADmtyoJEAZoKPJBcxJ3vqapfBX6.svg', 'thumbnail', 'catalog', 19, '2022-04-01 12:20:44', '2022-04-01 12:20:44', NULL),
(25, 'thumbnails/WbQvUvxXdmiCQkv6qvR4GVnVQTReqKyTSVXEd7fc.svg', 'thumbnail', 'catalog', 20, '2022-04-01 12:21:56', '2022-04-01 12:21:56', NULL),
(26, 'thumbnails/pwFIzPVodf41026SNqTzC5MrWCoV6sU6bj0PtOSW.png', 'thumbnail', 'catalog', 21, '2022-04-01 12:26:36', '2022-04-01 12:26:36', NULL),
(27, 'thumbnails/qDKUE0hZuFsnXUEXyiTNPb6J5z7HS31byfYiyuZq.svg', 'thumbnail', 'catalog', 22, '2022-04-01 12:29:10', '2022-04-01 12:29:10', NULL),
(28, 'thumbnails/H28XTzrnNBZJwmvnoaClkKQAq8yoXFhZ4jT1nMs7.svg', 'thumbnail', 'catalog', 23, '2022-04-01 12:30:52', '2022-04-01 12:30:52', NULL),
(29, 'thumbnails/uY2quzy0zRb287iYzbbJwl3TCnwulxFhdx57xp4F.svg', 'thumbnail', 'catalog', 24, '2022-04-01 12:32:43', '2022-04-01 12:32:43', NULL),
(30, 'thumbnails/nwLfTOl5mJqjNICMTo5Uoz4zyrHv45MIbmxsSGEe.svg', 'thumbnail', 'catalog', 25, '2022-04-01 12:34:05', '2022-04-01 12:34:05', NULL),
(31, 'thumbnails/EK4D2CnT1WfBufznEMmvm8V5wP2mlXCoOEjX1Abt.svg', 'thumbnail', 'catalog', 26, '2022-04-01 12:35:38', '2022-04-01 12:35:38', NULL),
(32, 'thumbnails/dRCYHVXLdcVLW6eeyzMp5ZvcZATdGax6aSgjpCYJ.svg', 'thumbnail', 'catalog', 27, '2022-04-01 12:37:17', '2022-04-01 12:37:17', NULL),
(33, 'thumbnails/aPtv46mrLa3d2wTVV1G6MilEQsniQk1LwynCrGcP.png', 'thumbnail', 'catalog', 28, '2022-04-01 12:41:36', '2022-04-01 12:41:36', NULL),
(34, 'thumbnails/CkdKdNwFMaYu7TodoZcJeAnZsQgvbU0ykTuPdxOb.svg', 'thumbnail', 'catalog', 29, '2022-04-01 12:43:59', '2022-04-01 12:43:59', NULL),
(35, 'thumbnails/57qPfvPfU1wSfMLhhH3DgD1FPUZ56sKe2Z9xVjIj.svg', 'thumbnail', 'catalog', 30, '2022-04-01 12:56:01', '2022-04-01 12:56:01', NULL),
(36, 'thumbnails/9FUZMpmDLjChY0vgw3PYOJojDCrFX7YMOCOC71bz.svg', 'thumbnail', 'catalog', 31, '2022-04-01 12:57:26', '2022-04-01 12:57:26', NULL),
(37, 'thumbnails/s5E6Vhijop7dRfkbVb2xnEwLIKZFAE8HbGOGq4HE.svg', 'thumbnail', 'catalog', 32, '2022-04-01 12:59:04', '2022-04-01 12:59:04', NULL),
(38, 'thumbnails/d3RClcyz2UOGo00q9ThRUwjrIhvIfdQdedXYHulB.png', 'thumbnail', 'catalog', 33, '2022-04-01 13:01:34', '2022-04-01 13:01:34', NULL),
(39, 'thumbnails/1p3dzfLAyPfYyxdfnwi5uNmHItVuSqLRbfPpd7IO.svg', 'thumbnail', 'catalog', 34, '2022-04-01 13:03:16', '2022-04-01 13:03:16', NULL),
(40, 'thumbnails/HUzq7GOAQQcWQ9kAY2uotVDkblA2VrCeRW7zCuV5.svg', 'thumbnail', 'catalog', 35, '2022-04-01 13:05:11', '2022-04-01 13:05:11', NULL),
(41, 'thumbnails/Uy5J0bVvh0EtH9xdtfMqlkpzXyDSgE33ZSOwDVqJ.svg', 'thumbnail', 'catalog', 36, '2022-04-01 13:06:33', '2022-04-01 13:06:33', NULL),
(42, 'thumbnails/Pe5YVqMcecz7FI76jp0nK7aIEn8H277INgXea8gq.svg', 'thumbnail', 'catalog', 37, '2022-04-01 13:07:58', '2022-04-01 13:07:58', NULL),
(43, 'thumbnails/DPKPczLQkAXc9cebSbZJ6hPZES5tPepY2hLzVNrY.svg', 'thumbnail', 'catalog', 38, '2022-04-01 13:09:17', '2022-04-01 13:09:17', NULL),
(44, 'thumbnails/TK13tZIw56Nk7tMv9QpXpDpOMHXrXF5VZy9wQpvw.jpg', 'thumbnail', 'product', 4, '2022-04-01 13:29:05', '2022-04-01 13:29:05', NULL),
(45, 'previews/roB4zZVBUnkb43KDjrlLAa0zRYlATKNEB2sV12bp.jpg', 'preview', 'product', 4, '2022-04-01 13:29:05', '2022-04-01 13:29:05', NULL),
(46, 'previews/c4dETQRMCCzx7F4m1vQzI1bIDLQTzPOswnTRpiJU.jpg', 'preview', 'product', 4, '2022-04-01 13:29:05', '2022-04-01 13:29:05', NULL),
(47, 'previews/b7jOgUgProtCP6WYQ513AJb5dQsGMx5Dr6UvpGtL.jpg', 'preview', 'product', 4, '2022-04-01 13:29:05', '2022-04-01 13:29:05', NULL),
(48, 'thumbnails/f3ZFXIYDeHCuBUDhf9YwQWHx6d0Hei7SXruim3LS.jpg', 'thumbnail', 'product', 5, '2022-04-01 14:05:21', '2022-04-01 14:05:21', NULL),
(49, 'previews/mnCNmOedtjH8EKQHufs0lWVFoC1vorn9nNTT2HG1.jpg', 'preview', 'product', 5, '2022-04-01 14:05:21', '2022-04-01 14:05:21', NULL),
(50, 'previews/bBeGCX0EngKoVTdvbK9wTrHDKNYdvDnGhHxUFTof.jpg', 'preview', 'product', 5, '2022-04-01 14:05:21', '2022-04-01 14:05:21', NULL),
(51, 'previews/0rYl7i8xc1kb9Rw2CsaTfPhpWw1sVJxkPgJY7UU4.jpg', 'preview', 'product', 5, '2022-04-01 14:05:21', '2022-04-01 14:05:21', NULL),
(52, 'previews/HuyAOYzM6E0oANokotVgbbpF48pR6jDciXqgBKy2.jpg', 'preview', 'product', 6, '2022-04-01 14:13:31', '2022-04-01 14:13:31', NULL),
(53, 'previews/xqqR0p1L2EDvj9zn5E1KJEfQHvB3BoRj6po2Dq4r.jpg', 'preview', 'product', 6, '2022-04-01 14:13:31', '2022-04-01 14:13:31', NULL),
(54, 'previews/WjWKRWhzBUsR4xDqBDmfi8o6kP0B2uDKqM2UyLQc.jpg', 'preview', 'product', 6, '2022-04-01 14:13:31', '2022-04-01 14:13:31', NULL),
(55, 'thumbnails/Jom7mdKW9uI2Gjk9VRP5WoAkqlf8n43CkwpIV77k.jpg', 'thumbnail', 'product', 6, '2022-04-01 14:13:48', '2022-04-01 14:13:48', NULL),
(56, 'thumbnails/iByXYG9PzIpdpdqIjUfTqkTTUv2iPVVzT4EGW0U0.jpg', 'thumbnail', 'product', 7, '2022-04-01 14:24:36', '2022-04-01 14:24:36', NULL),
(57, 'previews/EWn4GBKtzkKKiwyx8FbviBrXOQWJ6J75GH15KUAe.jpg', 'preview', 'product', 7, '2022-04-01 14:24:36', '2022-04-01 14:24:36', NULL),
(58, 'previews/BOKPIAW2QbccY0hJGrCnu5FIk4KK8uH41kCrXnSd.jpg', 'preview', 'product', 7, '2022-04-01 14:24:36', '2022-04-01 14:24:36', NULL),
(59, 'thumbnails/HXU9G7fj3xvLaUY2KtSuaOpzELfQzlzsYbW5Imhk.jpg', 'thumbnail', 'product', 8, '2022-04-01 14:32:16', '2022-04-01 14:32:16', NULL),
(60, 'previews/W9hGDqPGog069BtOfgL99EaDFnrfK7uUs3WfmQyD.jpg', 'preview', 'product', 8, '2022-04-01 14:32:16', '2022-04-01 14:32:16', NULL),
(61, 'previews/YeP9u1hBvvGR3Rm6KfEX32JXLwe6ZFDHQGVI6gJu.jpg', 'preview', 'product', 8, '2022-04-01 14:32:16', '2022-04-01 14:32:16', NULL),
(62, 'previews/mjPz5hxM615mGLM9FegVHfs7E9mMNj3XNJf0OTJR.jpg', 'preview', 'product', 8, '2022-04-01 14:32:16', '2022-04-01 14:32:16', NULL),
(63, 'previews/J3NoyElMnAdbVnX9aat8fZ9LYDd2MjQ3ly2oJ7KN.jpg', 'preview', 'product', 8, '2022-04-01 14:32:16', '2022-04-01 14:32:16', NULL),
(64, 'thumbnails/pDtK6sV7XsoD4JuppNH1cEc9TdB6Bz4CcBU42RUY.jpg', 'thumbnail', 'product', 9, '2022-04-01 14:39:13', '2022-04-01 14:39:13', NULL),
(65, 'previews/TWvx81NXE0VA8POnbhTVxjXoSIQua3QIYLfxCkAm.jpg', 'preview', 'product', 9, '2022-04-01 14:39:13', '2022-04-01 14:39:13', NULL),
(66, 'previews/tQGEToUeGZyCWMezbanUO3okYIWGLJ3DOxbsLZ9w.jpg', 'preview', 'product', 9, '2022-04-01 14:39:13', '2022-04-01 14:39:13', NULL),
(67, 'thumbnails/b1liSfyKu1Klp9YqeTOUBGT4j3hh33drfFiT7Kk0.jpg', 'thumbnail', 'product', 12, '2022-04-01 16:20:21', '2022-04-01 16:20:21', NULL),
(68, 'previews/VMYjl0XuGfHqhhbF878PinWfWaB5oVFIoLeLR8vN.jpg', 'preview', 'product', 12, '2022-04-01 16:20:21', '2022-04-01 16:20:21', NULL),
(69, 'previews/xXHElz70851w407fgtInw0NIsy92SurIiGVeWHMm.jpg', 'preview', 'product', 12, '2022-04-01 16:20:21', '2022-04-01 16:20:21', NULL),
(70, 'previews/74I1XxEoRgH0EYeQBwxZpvgf6NpgnSfJY4NdydB9.jpg', 'preview', 'product', 12, '2022-04-01 16:20:21', '2022-04-01 16:20:21', NULL),
(75, 'thumbnails/uIepsk5gCXefpguiOXNT3TLnQyAUTmEhZnBUpMFu.jpg', 'thumbnail', 'product', 13, '2022-04-01 16:31:35', '2022-04-01 16:31:35', NULL),
(76, 'previews/CzD3sgFyjEelgVN9fEvjuwjdZcdfttK2knraFujV.jpg', 'preview', 'product', 13, '2022-04-01 16:31:35', '2022-04-01 16:31:35', NULL),
(77, 'previews/7BP3RHDRhTcCmB8kmWQcCglew0Q2QTIuh9xmjpLI.jpg', 'preview', 'product', 13, '2022-04-01 16:31:35', '2022-04-01 16:31:35', NULL),
(78, 'previews/qYtMrpsbje1cvACthRaaJrD2Md7U4AjAzL1T9bWB.jpg', 'preview', 'product', 13, '2022-04-01 16:31:35', '2022-04-01 16:31:35', NULL),
(79, 'thumbnails/8dMbKmjOZDAHuZH5ZlFbvb7MUF9ryPgMzVGHyOMu.jpg', 'thumbnail', 'product', 14, '2022-04-01 16:39:18', '2022-04-01 16:39:18', NULL),
(80, 'previews/nCn95PEfOmYUxEpeheSWJYYYxfCRnzjsiaS6JCH8.jpg', 'preview', 'product', 14, '2022-04-01 16:39:18', '2022-04-01 16:39:18', NULL),
(81, 'previews/wZVt5pdwI0lUvPbcDZCQ96Mig7WSgZ45xxEoiQ8B.jpg', 'preview', 'product', 14, '2022-04-01 16:39:18', '2022-04-01 16:39:18', NULL),
(82, 'previews/uozVDkz0olwVldjEIouPqq32sWq8i3RfinvcmYsR.jpg', 'preview', 'product', 14, '2022-04-01 16:39:18', '2022-04-01 16:39:18', NULL),
(83, 'thumbnails/uZg8bkBBgATgafGwILxtPQZwucK9Hwa9gkeXIj5C.jpg', 'thumbnail', 'product', 15, '2022-04-01 16:46:57', '2022-04-01 16:46:57', NULL),
(84, 'previews/bGK07yih38Fx53K1Fpj2aIe1PAHc7sBmlqTiwfWh.jpg', 'preview', 'product', 15, '2022-04-01 16:46:57', '2022-04-01 16:46:57', NULL),
(85, 'previews/XQzFVi7L8uODVVUPA1eAWaDow46TLApyLUUgmDiv.jpg', 'preview', 'product', 15, '2022-04-01 16:46:57', '2022-04-01 16:46:57', NULL),
(86, 'thumbnails/ZAkaqhArG4CwRVqze8QMHdkym2q5SPNokCXxRqih.jpg', 'thumbnail', 'product', 16, '2022-04-01 17:12:35', '2022-04-01 17:12:35', NULL),
(87, 'previews/fqSKziyFTBRzgKZtbIsnyUJosVTODURMvbYkYhMQ.jpg', 'preview', 'product', 16, '2022-04-01 17:12:35', '2022-04-01 17:12:35', NULL),
(88, 'previews/5ZFIvWpjn2rSWdrehndEU2WFyInLH4netWIWwM08.jpg', 'preview', 'product', 16, '2022-04-01 17:12:35', '2022-04-01 17:12:35', NULL),
(89, 'previews/I3UgIWOPMJ7MS2poEvpkTrUQt1wwPkgcKIwz6ViT.jpg', 'preview', 'product', 16, '2022-04-01 17:12:35', '2022-04-01 17:12:35', NULL),
(90, 'previews/ooOta3kD42oyuQFNpPMLOwjiCCqgE8taXH0tVNWT.jpg', 'preview', 'product', 16, '2022-04-01 17:12:35', '2022-04-01 17:12:35', NULL),
(91, 'thumbnails/fkYlKnPK8sIXqnVX7X4rLgLXVbzyCNLOKaBANrDT.jpg', 'thumbnail', 'product', 17, '2022-04-01 17:18:19', '2022-04-01 17:18:19', NULL),
(92, 'previews/3Sz0UCsbD730ay9KCTBgAcSkrWk0DCjxAF1YQ8W2.jpg', 'preview', 'product', 17, '2022-04-01 17:18:19', '2022-04-01 17:18:19', NULL),
(93, 'previews/t0UneA3GHjClTUVmsBykWAM0ok6UBd218rcYj1Ua.jpg', 'preview', 'product', 17, '2022-04-01 17:18:19', '2022-04-01 17:18:19', NULL),
(94, 'previews/pbl161xWlIPmOFHo2EUQ2w6ZKjF6kpLGRZAEXaX1.jpg', 'preview', 'product', 17, '2022-04-01 17:18:19', '2022-04-01 17:18:19', NULL),
(95, 'thumbnails/VMJiUOAaxFoNyQogS13fWteVPGjJBKVWXMmZtaep.jpg', 'thumbnail', 'product', 18, '2022-04-01 17:32:52', '2022-04-01 17:32:52', NULL),
(96, 'previews/1Cvk1XkgSHddqb607JJh8WP86VHS3ZGL5pEIYIc5.jpg', 'preview', 'product', 18, '2022-04-01 17:32:52', '2022-04-01 17:32:52', NULL),
(97, 'previews/D1ipcTlhV0yZSRwDvThbiMsMJCJBF2umcrNSo0fj.jpg', 'preview', 'product', 18, '2022-04-01 17:32:52', '2022-04-01 17:32:52', NULL),
(98, 'previews/2MHBzkZlWFrmaGOqNNu5hAdIz7KnNbSZKAC00NrO.jpg', 'preview', 'product', 18, '2022-04-01 17:32:52', '2022-04-01 17:32:52', NULL),
(99, 'thumbnails/RabJClNMKUpVf0glZrRv3yXDjVfktdouxXtcQQ9c.jpg', 'thumbnail', 'product', 19, '2022-04-03 11:29:01', '2022-04-03 11:29:01', NULL),
(100, 'previews/sL23JRNcP0hL8BjLU4I4rzW6dXYHMC5InuQn9Pnz.jpg', 'preview', 'product', 19, '2022-04-03 11:29:01', '2022-04-03 11:29:01', NULL),
(101, 'previews/cAx5fZgD8mTasuYLyuRbwPD0Rljxuvv7opYkkPYP.jpg', 'preview', 'product', 19, '2022-04-03 11:29:01', '2022-04-03 11:29:01', NULL),
(102, 'previews/vbRNU5Iqb9eBw0TVqCGMd3JPxcahruTF3tyJTiHp.jpg', 'preview', 'product', 20, '2022-04-03 11:38:05', '2022-04-03 11:38:05', NULL),
(103, 'previews/EzSHC2ev6b3VKyeHt3Ug5VW7cu5kkUhB7TR7oUfu.jpg', 'preview', 'product', 20, '2022-04-03 11:38:05', '2022-04-03 11:38:05', NULL),
(104, 'thumbnails/ygjXiWPU4meojfB0Lz43SxqZcniytSIgMtzEMvsq.webp', 'thumbnail', 'product', 21, '2022-04-03 11:51:56', '2022-04-03 11:51:56', NULL),
(105, 'previews/5xo7mJ80jNIlcNSnofQ1X6h3q1bWoLadchmzWFcP.jpg', 'preview', 'product', 21, '2022-04-03 11:51:56', '2022-04-03 11:51:56', NULL),
(106, 'previews/M8pTTDfnKKjLF5L8Zx52J0OXnSFXypp5dtNd5Gvl.webp', 'preview', 'product', 21, '2022-04-03 11:51:56', '2022-04-03 11:51:56', NULL),
(107, 'previews/s5ZxKjq0DwpnMUXAsWXV56zcPy8Ese7fiFSIDQEc.webp', 'preview', 'product', 21, '2022-04-03 11:51:56', '2022-04-03 11:51:56', NULL),
(108, 'thumbnails/4PmLdt3KpLnFFDCSeyKgr2CT4lWJ9ZFOc6jOMRcc.webp', 'thumbnail', 'product', 22, '2022-04-03 11:58:11', '2022-04-03 11:58:11', NULL),
(109, 'previews/A0d6WA6ACSQ6zOm1HRv7JZa95n45wglInae0w3G1.webp', 'preview', 'product', 22, '2022-04-03 11:58:11', '2022-04-03 11:58:11', NULL),
(110, 'previews/lpGjcPY7cBTocoK2YELL1rSwqfrRK2mMSQek4mWQ.webp', 'preview', 'product', 22, '2022-04-03 11:58:11', '2022-04-03 11:58:11', NULL),
(111, 'previews/fplQmyw08J4ilMD7zzfY7QDlRySDsQeqdXip7Mli.webp', 'preview', 'product', 22, '2022-04-03 11:58:11', '2022-04-03 11:58:11', NULL),
(112, 'previews/KaY34AyKPdiuw4TtW9bQolc1pVm0qrL4RSMXGr1B.webp', 'preview', 'product', 22, '2022-04-03 11:58:11', '2022-04-03 11:58:11', NULL),
(113, 'thumbnails/JCjsvRKpRiMIvzhDcABmsw8jxtr5VkyvzGKBAm59.jpg', 'thumbnail', 'product', 23, '2022-04-03 12:03:59', '2022-04-03 12:03:59', NULL),
(114, 'previews/vvqK8ypXSIra2jmLZmZoyGAuNT0ZMj80nQdPbg3c.jpg', 'preview', 'product', 23, '2022-04-03 12:03:59', '2022-04-03 12:03:59', NULL),
(115, 'previews/61d47TPhTE7gQs4Gquyrsr6dgO8KHAtKlf1G1kjV.jpg', 'preview', 'product', 23, '2022-04-03 12:03:59', '2022-04-03 12:03:59', NULL),
(116, 'thumbnails/hr9ahYYIvbTX7xvemeIynbqm5c16gKWdPEprUCaW.webp', 'thumbnail', 'product', 24, '2022-04-03 12:08:57', '2022-04-03 12:08:57', NULL),
(117, 'previews/nE9bvSIbW20pzchjFinAWekREZwyuyT42mz6uF4V.webp', 'preview', 'product', 24, '2022-04-03 12:08:57', '2022-04-03 12:08:57', NULL),
(118, 'previews/ssQhcJiPNAaItM9xGKJqgGToe1S61j4BquthVf7e.webp', 'preview', 'product', 24, '2022-04-03 12:08:57', '2022-04-03 12:08:57', NULL),
(119, 'previews/CTjEdqV2PKQY9eV73Jd5ML8jbHCep5i4SFoOpVIR.webp', 'preview', 'product', 24, '2022-04-03 12:08:57', '2022-04-03 12:08:57', NULL),
(120, 'thumbnails/HddUSqrcfwKNfxYa5oiWH2Y9ottuPuE8IxcJsm37.webp', 'thumbnail', 'product', 25, '2022-04-03 12:13:12', '2022-04-03 12:13:12', NULL),
(121, 'previews/oTRLRGn7dh6nJBuAhEccQ3tP4CmE0OQz0H37ttU2.webp', 'preview', 'product', 25, '2022-04-03 12:13:12', '2022-04-03 12:13:12', NULL),
(122, 'previews/F691IQsr2mgaiHG1Z4PvG8gt2gEm1waETc4AhQzc.webp', 'preview', 'product', 25, '2022-04-03 12:13:12', '2022-04-03 12:13:12', NULL),
(123, 'thumbnails/hFcpXaaLy8gOVfvyvs2iQMsXKikMc3SET4ANgq9V.webp', 'thumbnail', 'product', 26, '2022-04-03 12:19:59', '2022-04-03 12:19:59', NULL),
(124, 'previews/CGzcifXJVN9sLz7g8DXpKjyBznADiX6467tROmpd.webp', 'preview', 'product', 26, '2022-04-03 12:19:59', '2022-04-03 12:19:59', NULL),
(125, 'previews/tBy4umHPwrAL2Q2YSRoXU2ZUInXJLDmqZ8pBl6Ff.webp', 'preview', 'product', 26, '2022-04-03 12:19:59', '2022-04-03 12:19:59', NULL),
(126, 'previews/6S3u4SnbC6FXLEHwtHH1h2KEykLkWgL9Jw3dEWXj.jpg', 'preview', 'product', 26, '2022-04-03 12:19:59', '2022-04-03 12:19:59', NULL),
(127, 'thumbnails/LZWXfQl1omWtSFbKI65247IkWjj8vvWyY6iwomLQ.png', 'thumbnail', 'product', 27, '2022-04-03 12:25:59', '2022-04-03 12:25:59', NULL),
(128, 'previews/etW6bjU4mFL7g0VMLMr057JD4ldXGdbNcQOV9ry3.jpg', 'preview', 'product', 27, '2022-04-03 12:25:59', '2022-04-03 12:25:59', NULL),
(129, 'previews/pp1VCx3WKhct3znP8L91MrvhfxjY9jkwRM5bn9Vl.jpg', 'preview', 'product', 27, '2022-04-03 12:25:59', '2022-04-03 12:25:59', NULL),
(130, 'previews/CQhY3ABqWONrXRerm8j4VPZKNlFZU9a0Jl3mzjGq.jpg', 'preview', 'product', 27, '2022-04-03 12:25:59', '2022-04-03 12:25:59', NULL),
(131, 'previews/5KhZ6ys8aCZawp76C2Z6XvmGbIBz4WqzTTwgyl2O.jpg', 'preview', 'product', 27, '2022-04-03 12:25:59', '2022-04-03 12:25:59', NULL),
(132, 'thumbnails/5YISwZQt8XQ3NQzz0VurDxJGW0Szh7p78gfblIrS.webp', 'thumbnail', 'product', 28, '2022-04-03 12:30:30', '2022-04-03 12:30:30', NULL),
(133, 'previews/C0uP9hPQ1wwX6hxOmaFeXzKYgZjgd7tPOUZVr5KV.webp', 'preview', 'product', 28, '2022-04-03 12:30:30', '2022-04-03 12:30:30', NULL),
(134, 'previews/dd7mbG3owQPC0UjNt3AIC6FZGQuDBw5oFPpcz1C7.jpg', 'preview', 'product', 28, '2022-04-03 12:30:30', '2022-04-03 12:30:30', NULL),
(135, 'previews/D1ZstnE2341KYxcM95umEAYEWR3tATHvlfNha3W1.webp', 'preview', 'product', 28, '2022-04-03 12:30:30', '2022-04-03 12:30:30', NULL),
(136, 'thumbnails/xIWGqxOUC8dZBIRdE7kH4qrUfmydkTRSFXmOh9dI.webp', 'thumbnail', 'product', 29, '2022-04-03 12:35:24', '2022-04-03 12:35:24', NULL),
(137, 'previews/w2KLofloQmT9nIVSPsseNet9x7M07zeFMTnS9v4Y.webp', 'preview', 'product', 29, '2022-04-03 12:35:24', '2022-04-03 12:35:24', NULL),
(138, 'previews/yKgouHXGdg3lXXGEZP6egpbWC3FAENMNEUxUvoGO.webp', 'preview', 'product', 29, '2022-04-03 12:35:24', '2022-04-03 12:35:24', NULL),
(139, 'previews/aVbHWSU374OpDHIsTKnt1RxX7tnDO8Mjiy9U9CsA.webp', 'preview', 'product', 29, '2022-04-03 12:35:24', '2022-04-03 12:35:24', NULL),
(140, 'previews/Z7WtGpnDSWZ3WmLeR7cKqhBHNCcKYHKeBwZnx5ed.webp', 'preview', 'product', 29, '2022-04-03 12:35:24', '2022-04-03 12:35:24', NULL),
(141, 'thumbnails/63941oObSzbmwgFcRBlgVHITF2kcuZO6wfwxzo31.png', 'thumbnail', 'product', 20, '2022-04-03 12:37:47', '2022-04-03 12:37:47', NULL),
(142, 'thumbnails/lgDGx5onZaRLVjQIFz6ooB7nztMUTg4P3daIMr0J.webp', 'thumbnail', 'product', 30, '2022-04-03 12:44:48', '2022-04-03 12:44:48', NULL),
(143, 'previews/ALj6JrtZ7jisELY5ONC9MWacsney2lFulTfU3bSK.webp', 'preview', 'product', 30, '2022-04-03 12:44:48', '2022-04-03 12:44:48', NULL),
(144, 'previews/IVB9gJ7KsTlVBzgIxcLdGzxxbBpN6pNZIUD9tEth.webp', 'preview', 'product', 30, '2022-04-03 12:44:48', '2022-04-03 12:44:48', NULL),
(145, 'previews/Wf0jpnCslmBaoyYPHqyKShPLQBCUfxF9YuzBg1Zn.webp', 'preview', 'product', 30, '2022-04-03 12:44:48', '2022-04-03 12:44:48', NULL),
(146, 'thumbnails/pAsnq4ExHMkKA5fd4HEO9gsMhhCLbEeEBqNBkOeT.webp', 'thumbnail', 'product', 31, '2022-04-03 13:07:06', '2022-04-03 13:07:06', NULL),
(147, 'previews/afrN8Id8Fd7XdS5AMe2MTVfJ1QkkRyBWOGqplDeM.webp', 'preview', 'product', 31, '2022-04-03 13:07:06', '2022-04-03 13:07:06', NULL),
(148, 'previews/safEBtdMFKZrwNYtmw3p98ehBec0oFAhmo70PFWE.webp', 'preview', 'product', 31, '2022-04-03 13:07:06', '2022-04-03 13:07:06', NULL),
(149, 'thumbnails/LAGC1DuGkENGK3VDC3ESrU8JrE0cRzfhnWCluAEF.webp', 'thumbnail', 'product', 32, '2022-04-03 13:09:27', '2022-04-03 13:09:27', NULL),
(150, 'previews/4dFUCN6NqHpNTPW7KmA2HnVgfgDuOdffGYVXBZrw.webp', 'preview', 'product', 32, '2022-04-03 13:09:27', '2022-04-03 13:09:27', NULL),
(151, 'previews/HWzNxZlSq66LHjAW399d3tq1UtBdoAfyEn17cvM7.webp', 'preview', 'product', 32, '2022-04-03 13:09:27', '2022-04-03 13:09:27', NULL),
(152, 'thumbnails/4YWa73kfsHMouhbj0VAFcsn57HvBwqWPtmSsOgrX.webp', 'thumbnail', 'product', 33, '2022-04-03 13:11:36', '2022-04-03 13:11:36', NULL),
(153, 'previews/j6mC1vOKqxNVpRdtPFE1iqWvOaGyQmCSZAslnMMt.webp', 'preview', 'product', 33, '2022-04-03 13:11:36', '2022-04-03 13:11:36', NULL),
(154, 'previews/2U9FUw82lX5aj7PN07wbutcZT19niZT3QQDoLMed.webp', 'preview', 'product', 33, '2022-04-03 13:11:36', '2022-04-03 13:11:36', NULL),
(155, 'thumbnails/M2pWPChIyC4UKqhZLcJ71w019P61KbrgRgmphXXI.webp', 'thumbnail', 'product', 34, '2022-04-03 13:28:02', '2022-04-03 13:28:02', NULL),
(156, 'previews/3dHKoneTj80cOGEIztAuVzeuDrxY5RGhhxxi934H.webp', 'preview', 'product', 34, '2022-04-03 13:28:02', '2022-04-03 13:28:02', NULL),
(157, 'previews/bvSEF8LixvRGPP8hiqLMj2raYy3KEuNjb22onndM.webp', 'preview', 'product', 34, '2022-04-03 13:28:02', '2022-04-03 13:28:02', NULL),
(158, 'thumbnails/4KM94pZ1h6KR6LVLggBEBSKukTmHTmxt8OYxAIdx.webp', 'thumbnail', 'product', 35, '2022-04-03 13:30:47', '2022-04-03 13:30:47', NULL),
(159, 'previews/Zd2B15516d7u4TyxjqYfKwFJsrxKl1hqWBLW2JbO.webp', 'preview', 'product', 35, '2022-04-03 13:30:47', '2022-04-03 13:30:47', NULL),
(160, 'previews/OVpQVGkcg8ZbqSkXI8X6M6iYZ9NSYqZ8Rs0CGPBn.webp', 'preview', 'product', 35, '2022-04-03 13:30:47', '2022-04-03 13:30:47', NULL),
(161, 'thumbnails/C40WYzWwR80M5JEIeU6XqV9A8sN1W08r1tDOZ53v.webp', 'thumbnail', 'product', 36, '2022-04-03 13:36:49', '2022-04-03 13:36:49', NULL),
(162, 'previews/Alj83HZTVekSIXquPHUNvUyXLUjhcgOfhGeZVcOj.webp', 'preview', 'product', 36, '2022-04-03 13:36:49', '2022-04-03 13:36:49', NULL),
(163, 'previews/reGLGP6Ohb6jBzclxVnwuGiMr3KJ616d5Mq9eDBf.webp', 'preview', 'product', 36, '2022-04-03 13:36:49', '2022-04-03 13:36:49', NULL),
(164, 'thumbnails/R9ckqOgv3SsT9FNjLUNucywHt3a5Mv3dtjthL1F0.webp', 'thumbnail', 'product', 37, '2022-04-03 13:39:15', '2022-04-03 13:39:15', NULL),
(165, 'previews/dNlK9NicokrK9d36QPoQaKDoFyQuDxFoDYMs1XPC.webp', 'preview', 'product', 37, '2022-04-03 13:39:15', '2022-04-03 13:39:15', NULL),
(166, 'previews/fsG094ofVWyBMDWz9eAdJk4QK823cDqbNrTZCdJl.webp', 'preview', 'product', 37, '2022-04-03 13:39:15', '2022-04-03 13:39:15', NULL),
(167, 'thumbnails/7wEHPHeI1gOQ0ruUzbdEBTs2jAwhSbRcUb0bCJye.webp', 'thumbnail', 'product', 38, '2022-04-03 13:40:57', '2022-04-03 13:40:57', NULL),
(168, 'previews/MltPdfFr2c4QbGMLWTHI14t132mp2t62DDZEhTzX.webp', 'preview', 'product', 38, '2022-04-03 13:40:57', '2022-04-03 13:40:57', NULL),
(169, 'previews/m95m8KC9HB7yzqOuyOwOSJTOIkp5qFKzIrEa52PD.webp', 'preview', 'product', 38, '2022-04-03 13:40:57', '2022-04-03 13:40:57', NULL),
(170, 'thumbnails/Wgg1UnGBl2mV2FRGKVue526DpzKc3GNJiIUwEzZW.webp', 'thumbnail', 'product', 39, '2022-04-03 13:45:13', '2022-04-03 13:45:13', NULL),
(171, 'previews/QEYdxBclMlxJraLtL4vX0f3yFBtgP4atsDCuaD08.webp', 'preview', 'product', 39, '2022-04-03 13:45:13', '2022-04-03 13:45:13', NULL),
(172, 'previews/hAQ3f9tUU5EDtjqy7cQLbNkxS6RrhqApYiLF0QFb.webp', 'preview', 'product', 39, '2022-04-03 13:45:13', '2022-04-03 13:45:13', NULL),
(173, 'thumbnails/d4cvayi3l9TMRpi38g5axtio2iD7aPY4wjyl9pY7.webp', 'thumbnail', 'product', 40, '2022-04-03 13:48:39', '2022-04-03 13:48:39', NULL),
(174, 'previews/5Jvn8KSBlGVIEW1hGvPq220F99QNGcLEF7t5Zerp.webp', 'preview', 'product', 40, '2022-04-03 13:48:39', '2022-04-03 13:48:39', NULL),
(175, 'previews/kxTgDhrgyjFG7Bw4FC9H2buSx74ZEHCWmR1v4sr5.webp', 'preview', 'product', 40, '2022-04-03 13:48:39', '2022-04-03 13:48:39', NULL),
(176, 'thumbnails/ZhbqYLpB4OgnPqH6gjAWxi278Sp2Ju1b4qJVBrpF.webp', 'thumbnail', 'product', 41, '2022-04-03 13:50:20', '2022-04-03 13:50:20', NULL),
(177, 'previews/fvuYUHAeK0tG2PKlJMK0nFA50opTg68U6eU9hANl.webp', 'preview', 'product', 41, '2022-04-03 13:50:20', '2022-04-03 13:50:20', NULL),
(178, 'previews/YNOzEqEkjTXho3tgB0NLzRxe0L1cR9VDL7BwJKbJ.webp', 'preview', 'product', 41, '2022-04-03 13:50:20', '2022-04-03 13:50:20', NULL),
(179, 'previews/wtBy4w1mHXnmTtslCLYpkTa8UGazhOvjQjzNJ0Mr.webp', 'preview', 'product', 42, '2022-04-03 13:52:58', '2022-04-03 13:52:58', NULL),
(180, 'previews/VqIMN12cz7gPGBUDX42L8maC5P3dxEJsEBofZkR4.webp', 'preview', 'product', 42, '2022-04-03 13:52:58', '2022-04-03 13:52:58', NULL),
(181, 'thumbnails/3OnWcOm0FtMAcVe2sFlphDA8uh4XxY1Ko6SeDgtf.webp', 'thumbnail', 'product', 42, '2022-04-03 13:53:37', '2022-04-03 13:53:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2022_01_27_164741_create_orders_table', 1),
(4, '2022_01_28_135806_fk_customer_id_column_to_orders_table', 1),
(5, '2022_01_28_154019_create_delivery_addresses_table', 1),
(6, '2022_01_28_162042_fk_customer_id_column_to_delivery_addresses_table', 1),
(7, '2022_01_28_165726_create_order_items_table', 1),
(9, '2022_01_29_042315_create_product_parameter_sets_table', 1),
(10, '2022_01_29_042910_create_product_parameters_table', 1),
(11, '2022_01_29_043220_fk_product_parameter_set_id_column_to_product_parameters_table', 1),
(12, '2022_01_29_044551_create_products_table', 1),
(13, '2022_01_29_045832_fk_product_id_column_to_order_items_table', 1),
(14, '2022_01_29_050050_create_images_table', 1),
(15, '2022_01_29_051531_create_catalogs_table', 1),
(16, '2022_01_29_060428_fk_parent_id_column_to_catalogs_table', 1),
(17, '2022_02_20_090710_create_slugs_table', 1),
(18, '2022_02_24_101514_fk_catalog_id_column_to_products_table', 1),
(19, '2022_03_30_105139_create_options_table', 1),
(20, '2022_01_28_170127_fk_order_id_column_to_order_items_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `key`, `value`, `config`, `created_at`, `updated_at`) VALUES
(1, 'app_name', 'Jigear', 'app.name', '2022-04-03 18:35:58', '2022-04-03 18:35:58'),
(2, 'shipping_fee', '2', NULL, '2022-04-03 18:35:58', '2022-04-03 18:35:58'),
(3, 'currency', '$', NULL, '2022-04-03 18:35:58', '2022-04-03 18:35:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('pending','delivering','succeed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `total` bigint(20) UNSIGNED NOT NULL,
  `sub_total` bigint(20) UNSIGNED NOT NULL,
  `shipping_fee` bigint(20) UNSIGNED NOT NULL,
  `discount` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `payment_method` enum('cod','banking') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('0','1','2') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `customer_id`, `status`, `total`, `sub_total`, `shipping_fee`, `discount`, `payment_method`, `first_name`, `last_name`, `email`, `gender`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 'JG-KJQLEWVWEP', 4, 'canceled', 1001, 999, 2, 0, '', 'Khách', 'Hàng', 'guest@gmail.com', '0', '', '', '2022-04-02 18:16:56', '2022-04-03 21:16:33'),
(2, 'JG-JPMITFNMUG', NULL, 'succeed', 3497, 3495, 2, 0, '', 'Nguyễn', 'Tấn', 'tan@gmai.com', '0', 'Lại Hùng Cường', '0856988521', '2022-04-03 14:01:00', '2022-04-03 14:03:00'),
(3, 'JG-V41QXKGX1B', NULL, 'succeed', 2600, 2598, 2, 0, '', 'Trần', 'Trân', 'hoang@gmail.com', '0', 'Võ Văn Vân', '0945511356', '2021-04-05 14:03:00', '2022-04-03 14:04:56'),
(4, 'JG-MUUO3RZ9FT', NULL, 'pending', 122, 120, 2, 0, '', 'Hồ', 'Tân', 'nhu@gmail.com', '0', 'Đặng Thùy Trâm', '0812151789', '2022-04-03 14:06:00', '2022-04-03 14:08:13'),
(5, 'JG-JLQNXGUBJK', NULL, 'delivering', 152, 150, 2, 0, '', 'Lê', 'Huy', 'huy@gmail.com', '0', 'Lại Hùng Cường', '0785223389', '2022-04-03 14:10:00', '2022-04-03 14:12:10'),
(7, 'JG-5FDJRZAMAA', NULL, 'pending', 1311, 1309, 2, 0, 'cod', 'Thị Thanh Thảo', 'Nguyễn', 'bnhao10062001@gmail.com', '0', '78/17A đường Hồ Bá Phấn phường Phước Long A quận 9', '0908640030', '2022-04-03 19:32:00', '2022-04-03 19:34:48'),
(8, 'JG-BOHEVONFZF', NULL, 'pending', 2, 0, 2, 0, 'cod', 'Thị Thanh Thảo', 'Nguyễn', 'bnhao10062001@gmail.com', '0', '78/17A đường Hồ Bá Phấn phường Phước Long A quận 9', '0908640030', '2022-04-03 19:35:53', '2022-04-03 19:35:53'),
(9, 'JG-GO8ZE900XH', NULL, 'pending', 2, 0, 2, 0, 'cod', 'Thị Thanh Thảo', 'Nguyễn', 'bnhao10062001@gmail.com', '0', '78/17A đường Hồ Bá Phấn phường Phước Long A quận 9', '0908640030', '2022-04-03 19:38:01', '2022-04-03 19:38:01'),
(10, 'JG-BVHVSWDFDO', NULL, 'pending', 502, 500, 2, 0, 'cod', 'Thị Thanh Thảo', 'Nguyễn', 'bnhao10062001@gmail.com', '1', '78/17A đường Hồ Bá Phấn phường Phước Long A quận 9', '0908640030', '2022-04-03 19:40:41', '2022-04-03 19:40:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `qty` bigint(20) UNSIGNED NOT NULL,
  `unit_price` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `qty`, `unit_price`) VALUES
(1, 8, 1, 1, 999),
(2, 4, 2, 5, 699),
(3, 12, 3, 2, 1299),
(4, 23, 4, 1, 120),
(5, 24, 5, 1, 150),
(8, 42, 7, 1, 980),
(9, 20, 7, 1, 329),
(10, 17, 8, 1, 350),
(11, 8, 9, 1, 999),
(12, 30, 10, 1, 500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_price` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `stock` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `catalog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `parameters` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`parameters`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `sku`, `description`, `detail`, `unit_price`, `stock`, `catalog_id`, `published`, `parameters`, `created_at`, `updated_at`) VALUES
(4, 'iPhone 13 Pro 512GB', 'JG-IP13PR-512', 'Your new superpower.', '<div>With Apple Trade In, you can get credit toward a new iPhone when you trade in an eligible smartphone.6 It’s good for you and the planet.<br>And pay for your new iPhone over 24 months, interest‑free when you choose to check out with Apple Card Monthly Installments.*</div>', 699, 4, 16, 1, '[{\"key\": \"Screen:\", \"value\": \"OLED5.4\\\"Super Retina XDR\"}, {\"key\": \"Operating system:\", \"value\": \"iOS 15\"}, {\"key\": \"Rear camera:\", \"value\": \"2 camera 12 MP\"}, {\"key\": \"Front camera:\", \"value\": \"12 MP\"}, {\"key\": \"Chip:\", \"value\": \"Apple A15 Bionic\"}, {\"key\": \"RAM:\", \"value\": \" 4 GB\"}, {\"key\": \"Bộ nhớ trong:\", \"value\": \"128 GB\"}, {\"key\": \"Internal memory:\", \"value\": \"2438 mAh20 W\"}]', '2022-04-01 13:23:00', '2022-04-03 14:01:40'),
(5, 'iPhone 12 256GB', 'JG-IP12-256', 'Blast past fast.', '', 599, 5, 18, 1, '[{\"key\": \"Screen:\", \"value\": \"OLED6.1\\\"Super Retina XDR\"}, {\"key\": \"Operating system:\", \"value\": \"iOS 15\"}, {\"key\": \"Rear camera:\", \"value\": \"2 camera 12 MP\"}, {\"key\": \"Front camera:\", \"value\": \"12 MP\"}, {\"key\": \"Chip:\", \"value\": \"Apple A14 Bionic\"}, {\"key\": \"RAM:\", \"value\": \"4 GB\"}, {\"key\": \"Internal memory:\", \"value\": \" 256 GB\"}, {\"key\": \"Battery life:\", \"value\": \"2815 mAh20 W\"}]', '2022-04-01 13:58:00', '2022-04-03 11:19:06'),
(6, 'iPhone 11 256GB', 'JG-IP11-256', 'Every iPhone 11 (PRODUCT)RED purchase now contributes directly to the Global Fund to combat COVID‑19.', '<div>As part of our efforts to reach <a href=\"https://www.apple.com/environment\">our environmental goals</a>, iPhone 11 does not include a power adapter or EarPods. Included in the box is a USB‑C to Lightning cable that supports fast charging and is compatible with USB‑C power adapters and computer ports.<br><br>We encourage you to re‑use your current power adapters and headphones that are compatible with this iPhone. But if you need any new Apple power adapters or headphones, they are available for purchase.</div>', 450, 0, 19, 1, '[{\"key\": \"Màn hình:\", \"value\": \"IPS LCD6.1\\\"Liquid Retina\"}, {\"key\": \"Hệ điều hành:\", \"value\": \"iOS 15\"}, {\"key\": \"Camera sau:\", \"value\": \"2 camera 12 MP\"}, {\"key\": \"Camera trước:\", \"value\": \"12 MP\"}, {\"key\": \"Chip:\", \"value\": \"Apple A13 Bionic\"}, {\"key\": \"RAM:\", \"value\": \"4 GB\"}, {\"key\": \"Bộ nhớ trong:\", \"value\": \"256 GB\"}, {\"key\": \"Pin, Sạc:\", \"value\": \"3110 mAh18 W\"}]', '2022-04-01 14:07:00', '2022-04-01 14:15:18'),
(7, 'iPhone SE 256GB (2022)', 'JG-IP-SE22-256', 'Fast runs in the family.', '<div><strong>At the heart of iPhone SE you’ll find<br>the same superpowerful A15 Bionic<br>chip that’s in iPhone 13.<br>A15 Bionic enhances nearly everything you do. Apps load in a flash and feel so fluid.</strong></div>', 329, 6, 20, 1, '[{\"key\": \"Screen:\", \"value\": \"IPS LCD4.7\\\"\"}, {\"key\": \"Operating system:\", \"value\": \"iOS 15\"}, {\"key\": \"Camera sau:\", \"value\": \"12 MP\"}, {\"key\": \"Camera trước:\", \"value\": \" 7 MP\"}, {\"key\": \"Chip:\", \"value\": \"Apple A15 Bionic\"}, {\"key\": \"RAM:\", \"value\": \"3 GB\"}, {\"key\": \"Internal memory:\", \"value\": \"256 GB\"}, {\"key\": \"Battery life:\", \"value\": \" 20 W\"}]', '2022-04-01 14:16:00', '2022-04-03 11:11:14'),
(8, 'MacBook Air M1 2020', 'JG-MBA-M1-2020', 'Small chip. Giant leap.', '', 999, 3, 4, 1, '[{\"key\": \"CPU:\", \"value\": \" Apple M1\"}, {\"key\": \"RAM:\", \"value\": \"8 GB\"}, {\"key\": \"Hard Drive:\", \"value\": \"256 GB SSD\"}, {\"key\": \"Screen:\", \"value\": \"13.3\\\"Retina (2560 x 1600)\"}, {\"key\": \"Graphic card:\", \"value\": \"Card tích hợp7 nhân GPU\"}, {\"key\": \"Connection support:\", \"value\": \"2 x Thunderbolt 3 (USB-C)Jack tai nghe 3.5 mm\"}, {\"key\": \"Operating system:\", \"value\": \"Mac OS\"}, {\"key\": \"Design:\", \"value\": \"Vỏ kim loại nguyên khối\"}, {\"key\": \"Dimensions and weight:\", \"value\": \"Dài 304.1 mm - Rộng 212.4 mm - Dày 4.1 mm đến 16.1 mm - Nặng 1.29 kg\"}]', '2022-04-01 14:27:00', '2022-04-03 19:38:01'),
(9, 'MacBook Pro M1 2020', 'JG-MBP-M1-2020-512', 'Supercharged for pros.', '<div><strong>The most powerful MacBook Pro ever is here. With the blazing-fast M1 Pro or M1 Max chip — the first Apple silicon designed for pros — you get groundbreaking performance and amazing battery life. Add to that a stunning Liquid Retina XDR display, the best camera and audio ever in a Mac notebook, and all the ports you need. The first notebook of its kind, this MacBook Pro is a beast.</strong></div>', 1999, 2, 5, 1, '[{\"key\": \"CPU:\", \"value\": \"Apple M1\"}, {\"key\": \"RAM:\", \"value\": \"16 GB\"}, {\"key\": \"Hard Drive:\", \"value\": \" 512 GB SSD\"}, {\"key\": \"Screen:\", \"value\": \"13.3\\\"Retina (2560 x 1600)\"}, {\"key\": \"Graphic card:\", \"value\": \"Card tích hợp8 nhân GPU\"}, {\"key\": \"Connector:\", \"value\": \"2 x Thunderbolt 3 (USB-C)Jack tai nghe 3.5 mm\"}, {\"key\": \"Seted:\", \"value\": \"Có đèn bàn phím\"}, {\"key\": \"Operating system:\", \"value\": \"Mac OS\"}, {\"key\": \"Design:\", \"value\": \"Vỏ kim loại nguyên khối\"}, {\"key\": \"Dimensions and weight:\", \"value\": \"Dài 304.1 mm - Rộng 212.4 mm - Dày 15.6 mm - Nặng 1.4 kg\"}]', '2022-04-01 14:34:00', '2022-04-03 10:52:07'),
(12, 'MacBook Pro 14 M1 Max 2021', 'JG-MBR-MAX21', 'Say hello to the new iMac.', '<div><strong>Inspired by the best of Apple. Transformed by the M1 chip. Stands out in any space. Fits perfectly into your life.</strong></div>', 1299, 4, 8, 1, '[{\"key\": \"Dimensions and weight:\", \"value\": \"Apple M1 Max400GB/s memory bandwidth\"}, {\"key\": \"RAM:\", \"value\": \"32 GB\"}, {\"key\": \"Hard Drive:\", \"value\": \"512 GB SSD\"}, {\"key\": \"Screen:\", \"value\": \"14.2 inchLiquid Retina XDR display (3024 x 1964)120Hz\"}, {\"key\": \"Connector:\", \"value\": \"3 x Thunderbolt 4 USB-CHDMIJack tai nghe 3.5 mm\"}, {\"key\": \"Operating system:\", \"value\": \"Mac OS\"}, {\"key\": \"Design:\", \"value\": \"Vỏ kim loại nguyên khối\"}, {\"key\": \"Dimensions and weight:\", \"value\": \"Dài 312.6 mm - Rộng 221.2 mm - Dày 15.5 mm - Nặng 1.6 kg\"}]', '2022-04-01 16:11:00', '2022-04-03 14:04:56'),
(13, 'Mac Pro Tower', 'JG-MRT-19', 'Mac Pro Technology', '<div><strong>Function defines form. Every aspect of Mac Pro is designed in pursuit of performance. Built around a stainless steel space frame, an aluminum housing lifts off, allowing 360‑degree access to every component and vast configuration. From there anything is possible.</strong></div>', 6000, 1, 8, 1, '[{\"key\": \"CPU:\", \"value\": \"Intel® Core™ Xeon W-3235 vPro (12-Core, 19.25MB Cache, up to 4.5GHz Max Turbo Frequency)\"}, {\"key\": \"RAM:\", \"value\": \"96GB DDR4 ECC 2933MHz\"}, {\"key\": \"Hard Drive:\", \"value\": \"1TB SSD storage\"}, {\"key\": \"Screen:\", \"value\": \"N/A\"}, {\"key\": \"Connection support:\", \"value\": \"2 x USB 3 ports 12 x Thunderbolt 3 ports 2 x 10Gb Ethernet ports 1 x 3.5 mm headphone jack with headset support 1 x Power Port\"}, {\"key\": \"Operating system:\", \"value\": \"MacOS Monterey\"}, {\"key\": \"Dimensions and weight:\", \"value\": \"Starting: 39.7 pounds (18.0 kg)\"}, {\"key\": \"VGA\", \"value\": \"Dual AMD Radeon™ PRO W5700X w/16GB of GDDR6 memory (32GB)\"}]', '2022-04-01 16:25:00', '2022-04-03 11:05:51'),
(14, 'Apple Watch Series 7 GPS 45mm', 'JG-AWS7-45', 'Any style you want.', '<div><strong>Take an ECG at any time.</strong> <strong>With the ECG app, Apple Watch Series 7 is capable of generating an ECG similar to a single-lead electrocardiogram. It’s a momentous achievement for a wearable device that can provide critical data for doctors and peace of mind for you.</strong><a href=\"https://www.apple.com/apple-watch-series-7/#footnote-5\"><strong>4</strong></a></div>', 170, 3, 22, 1, '[{\"key\": \"Screen:\", \"value\": \"OLED1.77 inch\"}, {\"key\": \"Battery life:\", \"value\": \"Khoảng 1.5 ngày\"}, {\"key\": \"Operating system:\", \"value\": \"iOS bản mới nhất\"}, {\"key\": \"Galsses:\", \"value\": \"Ion-X strengthened glass45 mm\"}, {\"key\": \"Health features:\", \"value\": \"Chế độ luyện tậpTheo dõi giấc ngủTính lượng calories tiêu thụTính quãng đường chạyĐiện tâm đồĐo nhịp timĐo nồng độ oxy (SpO2)Đếm số bước chân\"}, {\"key\": \"The firm: \", \"value\": \"Apple\"}]', '2022-04-01 16:35:00', '2022-04-03 11:04:07'),
(15, 'Apple Watch S3 GPS 42mm', 'JG-AWS-S3', 'Good things come in 3.', '', 199, 0, 24, 1, '[{\"key\": \"Màn hình:\", \"value\": \"OLED1.65 inch\"}, {\"key\": \"Thời lượng pin:\", \"value\": \"Khoảng 1.5 ngày\"}, {\"key\": \"Kết nối với hệ điều hành:\", \"value\": \"iOS bản mới nhất\"}, {\"key\": \"Mặt:\", \"value\": \"Ion-X strengthened glass42 mm\"}, {\"key\": \"Tính năng cho sức khỏe:\", \"value\": \"Chế độ luyện tậpTính lượng calories tiêu thụTính quãng đường chạyĐo nhịp timĐếm số bước chân\"}, {\"key\": \"Hãng\", \"value\": \"Apple\"}]', '2022-04-01 16:43:00', '2022-04-01 16:46:57'),
(16, 'AirPods 3 Apple', 'JG-APS3-A', 'All-new with Spatial Audio', '<div><strong>Bass hits an all-time high.</strong></div><div><strong><br>An Apple-designed dynamic driver, powered by a custom amplifier, renders music in exceptionally detailed sound quality — so you revel in every tone, from deep, rich bass to crisp, clean highs.<br>Mute the breeze.</strong></div><div><strong><br>Covered in a special acoustic mesh, an inset microphone in each earbud minimizes wind noise when you’re on a call — so your voice is always heard loud and clear.</strong></div>', 179, 6, 30, 1, '[{\"key\": \"The battery:\", \"value\": \"Dùng 6 giờ - Sạc 2 giờ\"}, {\"key\": \"Charging port:\", \"value\": \"LightningSạc không dây\"}, {\"key\": \"Audio technology:\", \"value\": \"Adaptive EQCustom high-excursion Apple driverHigh Dynamic RangeSpatial Audio\"}, {\"key\": \"Compatible:\", \"value\": \"AndroidiOS (iPhone)iPadOS (iPad)MacOS (Macbook, iMac)\"}, {\"key\": \"Utilities:\", \"value\": \"Chống nước IPX4Có mic thoạiSạc không dây\"}, {\"key\": \"Connection support:\", \"value\": \"Bluetooth 5.0\"}, {\"key\": \"Control with:\", \"value\": \"Cảm ứng chạm\"}, {\"key\": \"The firm:\", \"value\": \"Apple\"}]', '2022-04-01 17:08:00', '2022-04-03 13:15:04'),
(17, 'AirPods Pro MagSafe Charge Apple', 'JG-APPM-P', 'All-new with Spatial Audio', '<div>Bass hits an all-time high.</div><div><br>An Apple-designed dynamic driver, powered by a custom amplifier, renders music in exceptionally detailed sound quality — so you revel in every tone, from deep, rich bass to crisp, clean highs.<br>You heard it here first. HD voice quality for FaceTime. Connect on FaceTime in crisp, HD quality with a new AAC-ELD speech codec. And with support for spatial audio, Group FaceTime calls sound more true to life than ever.</div>', 350, 1, 31, 1, '[{\"key\": \"The battery:\", \"value\": \"Dùng 5 giờ - Sạc 2 giờ\"}, {\"key\": \"Charging port:\", \"value\": \"LightningSạc không dâySạc MagSafe\"}, {\"key\": \"Audio technology:\", \"value\": \"Active Noise CancellationAdaptive EQCustom high-excursion Apple driverHigh Dynamic RangeSpatial AudioTransparency Mode\"}, {\"key\": \"Compatible:\", \"value\": \"AndroidiOS (iPhone)iPadOS (iPad)MacOS (Macbook, iMac)\"}, {\"key\": \"Utilities:\", \"value\": \"Chống nước IPX4Chống ồnCó mic thoại\"}, {\"key\": \"Connection support:\", \"value\": \"Bluetooth 5.0\"}, {\"key\": \"Control with:\", \"value\": \"Cảm ứng chạm\"}, {\"key\": \"The firm:\", \"value\": \"Apple\"}]', '2022-04-01 17:15:00', '2022-04-03 19:35:53'),
(18, 'Bluetooth AirPods Max Apple', 'JG-APM-A', 'All-new with Spatial Audio', '<div><strong>Always-on “Hey Siri.” Play music, make calls, get directions, or check your schedule simply by using your voice. Just say “Hey Siri” to activate your favorite personal assistant and stay on top of everyday tasks.<br>Announce Notifications. Siri can read your important messages or alerts as they arrive — and you can even reply to messages with just your voice.</strong><a href=\"https://www.apple.com/airpods-3rd-generation/#footnote-10\"><strong>8</strong></a></div>', 550, 5, 32, 1, '[{\"key\": \"\", \"value\": \"\"}, {\"key\": \"The battery:\", \"value\": \"Dùng 20 giờ - Sạc 3 giờ\"}, {\"key\": \"Charging port:\", \"value\": \"Lightning\"}, {\"key\": \"Audio technology:\", \"value\": \"Active Noise CancellationAdaptive EQChip Apple H1Spatial AudioTransparency Mode\"}, {\"key\": \"Compatible:\", \"value\": \"AndroidiOS (iPhone)\"}, {\"key\": \"Utilities:\", \"value\": \"Chống ồnSạc nhanh\"}, {\"key\": \"Connection support:\", \"value\": \"Bluetooth 5.0\"}, {\"key\": \"Control with:\", \"value\": \"Phím nhấn\"}, {\"key\": \"The firm:\", \"value\": \"Apple\"}]', '2022-04-01 17:19:00', '2022-04-03 10:55:35'),
(19, 'iPad Pro M1 11 inch WiFi Cellular', 'JG-IPDM1-WFC', 'Delightfully capable. Surprisingly affordable.', '<h1>With Apple Trade In, just give us your eligible iPad and get credit for a new one. It’s good for you and the planet.</h1>', 799, 3, 10, 1, '[{\"key\": \"CPU:\", \"value\": \"Apple M1 8 core\"}, {\"key\": \"RAM:\", \"value\": \" 16 GB\"}, {\"key\": \"Hard Drive:\", \"value\": \" 1 TB\"}, {\"key\": \"Screen:\", \"value\": \"11\\\"Liquid Retina\"}, {\"key\": \"Connector:\", \"value\": \"5GNghe gọi qua FaceTime\"}, {\"key\": \"Operating system:\", \"value\": \"iPadOS 15\"}]', '2022-04-03 11:22:00', '2022-04-03 13:17:09'),
(20, 'iPad Air 5 M1 Wifi Cellular', 'JG-IDAWC-1', 'Delightfully capable. Surprisingly affordable.', '<div>With Apple Trade In, just give us your eligible iPad and get credit for a new one. It’s good for you and the planet.</div>', 329, 4, 11, 1, '[{\"key\": \"CPU:\", \"value\": \"Apple M1 8 core\"}, {\"key\": \"RAM:\", \"value\": \" 8 GB\"}, {\"key\": \"Hard Drive:\", \"value\": \" 64 GB\"}, {\"key\": \"Screen:\", \"value\": \"10.9\\\"Retina IPS LCD\"}, {\"key\": \"Connector:\", \"value\": \"5GNghe gọi qua FaceTime\"}, {\"key\": \"Operating system:\", \"value\": \" iPadOS 15\"}]', '2022-04-03 11:30:00', '2022-04-03 19:32:44'),
(21, 'iMac 24 2021 M1 7GPU', 'JG-24-M1G', 'Compared to previous versions, the iMac 2021 is designed to be upgraded to bring surprises to Ifan followers.', '<div>The new iMac is just 11.4mm thin, twice as thin as a 12.9-inch iPad Pro. Overall, they look like an enlarged iPad and are accompanied by a kickstand. This new iMac is up to 50% smaller than its predecessor, but offers a wider display due to the maximum fine-tuned bezel. This will be a reasonable choice for those who want to own a neat and minimalist desk.</div>', 266, 0, 6, 1, '[{\"key\": \"CPU:\", \"value\": \"Apple M1 8 core\"}, {\"key\": \"RAM:\", \"value\": \"8GB\"}, {\"key\": \"Hard Drive:\", \"value\": \"256GB SSD\"}, {\"key\": \"Screen:\", \"value\": \"24 inches\"}, {\"key\": \"Connector:\", \"value\": \"2 Thunderbolt / USB 4 . ports 1 headphone jack 3.5mm\"}, {\"key\": \"Operating system:\", \"value\": \"macOS\"}, {\"key\": \"Dimensions and weight:\", \"value\": \"4.46kg\"}]', '2022-04-03 11:41:00', '2022-04-03 11:51:56'),
(22, 'Apple Magic Mouse 2', 'JG-AMG2', 'Apple Magic Mouse 2: Minimalist, seamless, elegant and durable', '<div>Apple Magic Mouse 2 has a metal design with the frame and body of the mouse, giving them a certain luxury and premium. Along with that, the high-quality, durable plastic handle on the top makes it possible for you to have the most compact, flexible and comfortable operations possible. This design of the Magic Mouse 2 helps to synchronize and harmonize when you use it with Apple devices.</div>', 100, 6, 14, 1, '[{\"key\": \"Compatible:\", \"value\": \"MacOS\"}, {\"key\": \"How to connect:\", \"value\": \"Bluetooth\"}, {\"key\": \"Wire length / Connection distance:\", \"value\": \"10m\"}, {\"key\": \"The battery:\", \"value\": \"Li-Po 1986 mAh\"}, {\"key\": \"Bluetooth:\", \"value\": \"3.0 (Khoảng cách kết nối: 10m)\"}, {\"key\": \"Weight:\", \"value\": \"80g\"}, {\"key\": \"Manufacturer:\", \"value\": \"Apple \"}]', '2022-04-03 11:53:00', '2022-04-03 11:58:10'),
(23, 'Bluetooth Apple MLA02', 'JG-BAML2-T', 'Bluetooth Magic Mouse 2 MLA02 with luxurious, high-end Apple-branded design', '<div>Apple Magic Mouse 2 MLA02 Bluetooth Mouse for MacOS (MacBook, iMac) via Bluetooth connection</div>', 120, 4, 14, 1, '[{\"key\": \"Compatible:\", \"value\": \" MacOS (MacBook, iMac)\"}, {\"key\": \"Cách kết nối:\", \"value\": \" Bluetooth\"}, {\"key\": \"Wire length / Connection distance:\", \"value\": \"10 m\"}, {\"key\": \"The battery:\", \"value\": \"Li-ion\"}, {\"key\": \"Manufacturer:\", \"value\": \"Apple\"}]', '2022-04-03 12:00:00', '2022-04-03 14:07:06'),
(24, 'Apple Magic Keyboard + Touch ID', 'JG-AMKT-ID', 'Apple Magic Keyboard Touch ID number pad 2021– Full functions', '<div>The Apple Magic Keyboard Touch ID makes it easier for your Mac to sign in with fingerprint input right on the keyboard. Besides, thanks to the security function of the M1 chip, you can confirm your purchase easily and securely.</div>', 150, 5, 14, 1, '[{\"key\": \"Compatible:\", \"value\": \"MacOS, PadOS\"}, {\"key\": \"How to connect:\", \"value\": \"Bluetooth\"}, {\"key\": \"Keyboard size:\", \"value\": \"Fullsize\"}, {\"key\": \"Other function:\", \"value\": \"Tích hợp phím Touch ID giúp đăng nhập vào máy dễ dàng hơn\"}, {\"key\": \"Hãng sản xuất:\", \"value\": \"Apple\"}]', '2022-04-03 12:04:00', '2022-04-03 14:10:50'),
(25, 'Apple Magic Keyboard + Trackpad', 'JG-AMKTD-2', 'Magic Keyboard + Trackpad iPad Pro 12.9 2021 - Increase work efficiency', '<div>iPad Pro 12.9 2021 brought by Apple not only serves the entertainment needs, but it also has the ability to expand to become a working tool when combined with the Magic Keyboard + Trackpad iPad Pro 12.9 through the port. USB connection.</div>', 300, 5, 14, 1, '[{\"key\": \"Compatible:\", \"value\": \"PadOS\"}, {\"key\": \"How to connect:\", \"value\": \"Cổng USB-C\"}, {\"key\": \"Wire length / Connection distance:\", \"value\": \"10 m\"}, {\"key\": \"Keyboard size:\", \"value\": \"Tenkeyless\"}, {\"key\": \"Led:\", \"value\": \"Yes\"}, {\"key\": \"Manufacturer:\", \"value\": \"Apple\"}]', '2022-04-03 12:09:00', '2022-04-03 12:13:12'),
(26, 'Apple iMac 27 5K 2020', 'JG-Ai27-5K', 'iMac 27-inch 2020 5K (MXWT2) - Outstanding Performance', '<div>The iMac 2020 MXWT2 gives you a high-performance work experience thanks to its 27-inch Retina display for sharp 5K resolution. The large monitor stands upright on a sturdy stand, allowing you to adjust the viewing angle to suit your personal desk.</div>', 550, 2, 6, 1, '[{\"key\": \"CPU:\", \"value\": \"3.1GHz 6-core 10th-generation Intel Core i5 processor Turbo Boost up to 4.5GHz\"}, {\"key\": \"Ram:\", \"value\": \"8GB-2666MHz DDR4\"}, {\"key\": \"Hard Drive:\", \"value\": \"\\t256GB SSD\"}, {\"key\": \"Screen:\", \"value\": \"27 inches\"}, {\"key\": \"Resolution:\", \"value\": \"5120 x 2880 pixels\"}, {\"key\": \"Bluetooth:\", \"value\": \"v5.0\"}]', '2022-04-03 12:15:00', '2022-04-03 13:15:52'),
(27, 'Apple Pro Display XDR Standard Glass', 'JG-APD-SG-20', 'Apple Pro Display XDR Standard Glass (MWPE2SA/A)', '<div>The Pro Display XDR is a Retina 32 display with a resolution of 6016 x 3384, delivering over 20 million pixels for what Apple says is a super-sharp viewing experience. High resolution with 40% more screen resources than Retina 5K Display.</div>', 650, 2, 33, 1, '[{\"key\": \"Product\'s name:\", \"value\": \"Pro Dislay XDR Nano Texture Glass SOA MWPF2SA/A\"}, {\"key\": \"Display size:\", \"value\": \"31,5 inch\"}, {\"key\": \"Screen ratio:\", \"value\": \"16:9\"}, {\"key\": \"Resolution:\", \"value\": \"6016 x  3384 (6K)\"}, {\"key\": \"Background panels:\", \"value\": \"\\tIPS với công nghệ oxide TFT\"}, {\"key\": \"Contrast\\t:\", \"value\": \" 1,000,000:1\"}]', '2022-04-03 12:21:00', '2022-04-03 12:25:59'),
(28, 'Apple Pencil 2 MU8F2', 'JG-AP2M-20', 'Apple Pencil 2 MU8F2', '<div>In terms of design, the Apple Pencil 2 has the same design as a normal pencil. With a length of 6.53 inches (166 mm), a diameter of 0.35 inches (8.9 mm) and a weight of 20.7 grams, the Apple Pencil 2 offers a firm, light, flexible hand when writing. . With the striking white color of the accessory along with the shape of a traditional pencil, elongated and light weight, giving users a comfortable and comfortable grip feeling when using.</div>', 120, 5, 13, 1, '[{\"key\": \"Compatible:\", \"value\": \"iOS, PadOS\"}, {\"key\": \"How to connect:\", \"value\": \"Bluetooth\"}, {\"key\": \"Charging port in:\", \"value\": \"Magnetic\"}, {\"key\": \"Manufacturer:\", \"value\": \"Apple\"}, {\"key\": \"Weight:\", \"value\": \"20.7 grams\"}]', '2022-04-03 12:26:00', '2022-04-03 12:30:29'),
(29, 'Apple Pencil 1', 'JG-APL1', 'Apple Pencil 1', '<div>Apple Pencil 1 is a stylus product used to support Apple\'s iPad 7 8 9 and iPad Air 10.5 product lines. With a luxurious design and modern features, it gives users the feeling of using a real pen. With this apple accessory, the iPad Pro experience will be raised to a whole new level.</div>', 150, 5, 13, 1, '[{\"key\": \"Compatible:\", \"value\": \"iOS, PadOS\"}, {\"key\": \"How to connect:\", \"value\": \"Bluetooth\"}, {\"key\": \"Charging port:\", \"value\": \"\\tLightning\"}, {\"key\": \"Weight:\", \"value\": \"20.7 g (0.73 oz)\"}, {\"key\": \"Manufacturer:\", \"value\": \"Apple\"}]', '2022-04-03 12:31:00', '2022-04-03 12:35:24'),
(30, 'MacBook Pro 13 Touch Bar M1 256GB 2020', 'JG-MBR-13', 'MacBook Pro 13 Touch Bar M1 256GB 2020', '<div>The newly launched MacBook Pro M1 tablet is equipped with an M1 processor due to</div>', 500, 2, 5, 1, '[{\"key\": \"CPU:\", \"value\": \"I7\"}, {\"key\": \"RAM:\", \"value\": \"8GB\"}, {\"key\": \"Hard Drive:\", \"value\": \"512GB\"}, {\"key\": \"Screen:\", \"value\": \"120GHZ\"}]', '2022-04-03 12:43:00', '2022-04-03 19:40:41'),
(31, 'iPhone 13 128GB', 'JG-IP13-G', 'iPhone 13 128GB', '<div>In terms of size, iPhone 13 will have 4 different versions and the size will remain unchanged compared to the current iPhone 12 series. If the iPhone 12 has a change in design from rounded corners (Design maintained from the time of iPhone 6 to iPhone 11 Pro Max) to square design (was present on iPhone 4 to iPhone 5S, SE) .</div>', 300, 2, 17, 1, '[{\"key\": \"Ram:\", \"value\": \"3GB\"}, {\"key\": \"CPU:\", \"value\": \"Apple A15\"}, {\"key\": \"Screen :\", \"value\": \"OLED\"}]', '2022-04-03 13:04:00', '2022-04-03 13:12:52'),
(32, 'iPhone 13 256GB', 'JG-13-256', 'iPhone 13 256GB', '<div>In terms of size, iPhone 13 will have 4 different versions and the size will remain unchanged compared to the current iPhone 12 series. If the iPhone 12 has a change in design from rounded corners (Design maintained from the time of iPhone 6 to iPhone 11 Pro Max) to square design (was present on iPhone 4 to iPhone 5S, SE) .</div>', 250, 6, 17, 1, '[{\"key\": \"CPU : \", \"value\": \"Apple A15\"}, {\"key\": \"RAM : \", \"value\": \"6GB\"}, {\"key\": \"Screen :\", \"value\": \"OLED\"}]', '2022-04-03 13:07:00', '2022-04-03 13:13:18'),
(33, 'iPhone 13 64GB', 'JG-13-64', 'iPhone 13 64GB', '<div>In terms of size, iPhone 13 will have 4 different versions and the size will remain unchanged compared to the current iPhone 12 series. If the iPhone 12 has a change in design from rounded corners (Design maintained from the time of iPhone 6 to iPhone 11 Pro Max) to square design (was present on iPhone 4 to iPhone 5S, SE) .</div>', 135, 3, 17, 1, '[{\"key\": \"CPU:\", \"value\": \"Apple A15\"}, {\"key\": \"RAM:\", \"value\": \"8GB\"}, {\"key\": \"Screen :\", \"value\": \"In terms of size, iPhone 13 will have 4 different versions and the size will remain unchanged compared to the current iPhone 12 series. If the iPhone 12 has a change in design from rounded corners (Design maintained from the time of iPhone 6 to iPhone 11 Pro Max) to square design (was present on iPhone 4 to iPhone 5S, SE) .\"}]', '2022-04-03 13:09:00', '2022-04-03 13:13:05'),
(34, 'Apple iPad mini 6 WiFi 64G', 'JG-API6', 'Apple iPad mini 6 WiFi 64G', '<div>With the success of the iPad mini generations before the iPad mini 6 is a new successor product with many existing features and many notable upgrades for users this year. If you are in need of buying yourself an iPad tablet to serve your needs, the iPad Mini 6 will be the perfect choice for you at this time for the need to use a moderate-sized tablet. .</div>', 300, 0, 12, 1, '[{\"key\": \"CPU:\", \"value\": \"A15 Bionic\"}, {\"key\": \"Ram:\", \"value\": \"6GB\"}]', '2022-04-03 13:19:00', '2022-04-03 13:28:02'),
(35, 'iPad mini 6 WiFi 128GB', 'JG-IP6-128', 'iPad mini 6 WiFi 128GB', '<div>With the success of the iPad mini generations before the iPad mini 6 is a new successor product with many existing features and many notable upgrades for users this year. If you are in need of buying yourself an iPad tablet to serve your needs, the iPad Mini 6 will be the perfect choice for you at this time for the need to use a moderate-sized tablet. .</div>', 365, 9, 12, 1, '[{\"key\": \"CPU:\", \"value\": \"\\tA15 Bionic\"}, {\"key\": \"Ram:\", \"value\": \"3GB\"}]', '2022-04-03 13:29:00', '2022-04-03 13:30:47'),
(36, 'MacBook Pro 16&quot; M1 Max', 'JG-MBR-16M', 'MacBook Pro 16&quot; M1 Max', '<div>One of the most outstanding features of the MacBook Pro 2021 series is the Liquid Retina XDR display with 120Hz ProMotion support. This monitor uses a Mini-LED panel, providing a peak brightness of up to 1,600 nits and a full-frame brightness of 1,000 nits.</div>', 600, 3, 5, 1, '[{\"key\": \"CPU:\", \"value\": \"Apple M1 Max chip\"}, {\"key\": \"Ram:\", \"value\": \"64GB unified memory\"}]', '2022-04-03 13:34:00', '2022-04-03 13:36:49'),
(37, 'MacBook Pro 16\" M1', 'JG-MBPM1', 'MacBook Pro 16\" M1', '<div>One of the most outstanding features of the MacBook Pro 2021 series is the Liquid Retina XDR display with 120Hz ProMotion support. This monitor uses a Mini-LED panel, providing a peak brightness of up to 1,600 nits and a full-frame brightness of 1,000 nits.</div>', 250, 6, 5, 1, '[{\"key\": \"CPU:\", \"value\": \"Apple M1 chip\"}, {\"key\": \"RAM:\", \"value\": \"64GB unified memory\"}]', '2022-04-03 13:37:00', '2022-04-03 13:39:15'),
(38, 'Macbook Pro 14 inch 2021', 'JG-MP14-21', 'Macbook Pro 14 inch 2021', '<div>One of the most outstanding features of the MacBook Pro 2021 series is the Liquid Retina XDR display with 120Hz ProMotion support. This monitor uses a Mini-LED panel, providing a peak brightness of up to 1,600 nits and a full-frame brightness of 1,000 nits.</div>', 900, 9, 5, 1, '[{\"key\": \"CPU:\", \"value\": \"Apple M1 MAX with 10-core CPU, 24-core GPU, 16-core Neural Engine\"}, {\"key\": \"Ram:\", \"value\": \"16GB unified memory\"}]', '2022-04-03 13:39:00', '2022-04-03 13:40:57'),
(39, 'Apple AirPods 2 VN/A', 'JG-AIP-VN-A', 'Apple AirPods 2 VN/A', '<div>Recently, Apple has officially launched the Airpods 2 headset. This 2nd generation is not much different from the first generation in terms of appearance, except for some details about the indicator lights as well as the launch. add wireless charging and normal charging versions (wired charging). In addition, you can refer to Apple Airpods Pro, which is about to be released in the near future.</div>', 200, 5, 29, 1, '[{\"key\": \"Battery life:\", \"value\": \"2000Mah\"}, {\"key\": \"Waterproof:\", \"value\": \"IP68\"}]', '2022-04-03 13:42:00', '2022-04-03 13:45:13'),
(40, 'iPhone 11 64GB', 'JG-11-64', 'iPhone 11 64GB', '<div>The rear camera cluster has been rearranged to resemble the Huawei Mate 20 Pro. The iPhone 11 screen has a wide and long notch like its predecessors and retains the same design as the iPhone XR. Notch integrates Face ID, audio speaker and selfie camera.</div>', 300, 6, 19, 1, '[{\"key\": \"CPU:\", \"value\": \"A13 Bionic\"}, {\"key\": \"Ram:\", \"value\": \"4GB\"}]', '2022-04-03 13:47:00', '2022-04-03 13:48:39'),
(41, 'iPhone 11 512GB', 'JG-IP11-512', 'iPhone 11 512GB', '<div>The rear camera cluster has been rearranged to resemble the Huawei Mate 20 Pro. The iPhone 11 screen has a wide and long notch like its predecessors and retains the same design as the iPhone XR. Notch integrates Face ID, audio speaker and selfie camera.</div>', 900, 9, 19, 1, '[{\"key\": \"CPU:\", \"value\": \"A13 Bionic\"}, {\"key\": \"Ram:\", \"value\": \"4GB\"}]', '2022-04-03 13:49:00', '2022-04-03 13:50:20'),
(42, 'iPhone 13 512GB', 'JG-IP13-512', 'iPhone 13 512GB', '<div>The most advanced dual camera system ever on an iPhone. Fast A15 Bionic chip. Leap in battery life. Durable design. Super fast 5G network. Along with a brighter Super Retina XDR display.</div>', 980, 4, 17, 1, '[{\"key\": \"CPU:\", \"value\": \"Apple Bionic 15\"}, {\"key\": \"Ram:\", \"value\": \"6GB\"}]', '2022-04-03 13:51:00', '2022-04-03 19:32:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_parameters`
--

CREATE TABLE `product_parameters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_parameter_set_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_parameters`
--

INSERT INTO `product_parameters` (`id`, `key`, `product_parameter_set_id`, `created_at`, `updated_at`) VALUES
(18, 'CPU:', 19, '2022-04-01 16:06:18', '2022-04-01 16:06:18'),
(19, 'RAM:', 19, '2022-04-01 16:07:34', '2022-04-01 16:07:34'),
(20, 'Hard Drive:', 19, '2022-04-01 16:07:52', '2022-04-03 10:42:25'),
(21, 'Screen:', 19, '2022-04-01 16:08:15', '2022-04-03 10:41:54'),
(22, 'Connector:', 19, '2022-04-01 16:09:12', '2022-04-03 10:41:30'),
(23, 'Operating system:', 19, '2022-04-01 16:09:25', '2022-04-03 10:39:51'),
(24, 'Design:', 19, '2022-04-01 16:09:35', '2022-04-03 10:37:11'),
(25, 'Dimensions and weight:', 19, '2022-04-01 16:09:49', '2022-04-03 10:36:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_parameter_sets`
--

CREATE TABLE `product_parameter_sets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_parameter_sets`
--

INSERT INTO `product_parameter_sets` (`id`, `key`, `created_at`, `updated_at`) VALUES
(19, 'MacBook', '2022-04-01 16:05:52', '2022-04-03 10:42:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slugs`
--

CREATE TABLE `slugs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sluggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sluggable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slugs`
--

INSERT INTO `slugs` (`id`, `slug`, `sluggable_type`, `sluggable_id`, `created_at`, `updated_at`) VALUES
(2, 'mac', 'catalog', 2, '2022-03-31 12:31:34', '2022-03-31 12:31:34'),
(4, 'macbook-air', 'catalog', 4, '2022-04-01 07:21:24', '2022-04-01 07:21:24'),
(5, 'macbook-pro', 'catalog', 5, '2022-04-01 07:23:23', '2022-04-01 07:23:23'),
(6, 'imac24', 'catalog', 6, '2022-04-01 07:39:05', '2022-04-01 07:39:05'),
(7, 'mac-mini', 'catalog', 7, '2022-04-01 07:43:06', '2022-04-01 07:43:06'),
(8, 'mac-pro', 'catalog', 8, '2022-04-01 07:54:51', '2022-04-01 07:54:51'),
(11, 'ipad', 'catalog', 9, '2022-04-01 08:43:40', '2022-04-01 08:43:40'),
(12, 'ipad-pro', 'catalog', 10, '2022-04-01 08:44:20', '2022-04-01 08:44:20'),
(13, 'ipad-air', 'catalog', 11, '2022-04-01 08:46:40', '2022-04-01 08:46:40'),
(14, 'ipad-mini', 'catalog', 12, '2022-04-01 08:52:06', '2022-04-01 08:52:06'),
(15, 'apple-pencil', 'catalog', 13, '2022-04-01 09:07:04', '2022-04-01 09:07:04'),
(16, 'keyboards', 'catalog', 14, '2022-04-01 09:11:19', '2022-04-01 09:11:19'),
(17, 'iphone', 'catalog', 15, '2022-04-01 09:13:28', '2022-04-01 09:13:28'),
(18, 'iphone-13-pro', 'catalog', 16, '2022-04-01 09:14:59', '2022-04-01 09:14:59'),
(19, 'iphone-13', 'catalog', 17, '2022-04-01 12:00:01', '2022-04-01 12:00:01'),
(20, 'iphone-12', 'catalog', 18, '2022-04-01 12:18:08', '2022-04-01 12:18:08'),
(21, 'iphone-11', 'catalog', 19, '2022-04-01 12:19:43', '2022-04-01 12:19:43'),
(22, 'iphone-se', 'catalog', 20, '2022-04-01 12:21:20', '2022-04-01 12:21:20'),
(23, 'watch', 'catalog', 21, '2022-04-01 12:25:38', '2022-04-01 12:25:38'),
(24, 'apple-watch-series-7', 'catalog', 22, '2022-04-01 12:28:11', '2022-04-01 12:28:11'),
(25, 'apple-watch-se', 'catalog', 23, '2022-04-01 12:29:44', '2022-04-01 12:29:44'),
(26, 'apple-watch-series-3', 'catalog', 24, '2022-04-01 12:31:16', '2022-04-01 12:31:16'),
(27, 'apple-watch-series-nike', 'catalog', 25, '2022-04-01 12:33:04', '2022-04-01 12:33:04'),
(28, 'apple-watch-hermes', 'catalog', 26, '2022-04-01 12:34:28', '2022-04-01 12:34:28'),
(29, 'bands', 'catalog', 27, '2022-04-01 12:36:09', '2022-04-01 12:36:09'),
(30, 'airpods', 'catalog', 28, '2022-04-01 12:40:34', '2022-04-01 12:40:34'),
(31, 'airpods-2nd-generation', 'catalog', 29, '2022-04-01 12:42:59', '2022-04-01 12:42:59'),
(32, 'airpods-3rd-generation', 'catalog', 30, '2022-04-01 12:54:51', '2022-04-01 12:54:51'),
(33, 'airpods-pro', 'catalog', 31, '2022-04-01 12:56:22', '2022-04-01 12:56:22'),
(34, 'airpods-max', 'catalog', 32, '2022-04-01 12:58:01', '2022-04-01 12:58:01'),
(35, 'tv-home', 'catalog', 33, '2022-04-01 12:59:29', '2022-04-02 20:53:09'),
(36, 'apple-tv-4k', 'catalog', 34, '2022-04-01 13:02:34', '2022-04-01 13:02:34'),
(37, 'apple-tv-hd', 'catalog', 35, '2022-04-01 13:04:13', '2022-04-01 13:04:13'),
(38, 'apple-tv-app', 'catalog', 36, '2022-04-01 13:05:44', '2022-04-01 13:05:44'),
(39, 'apple-tv', 'catalog', 37, '2022-04-01 13:07:01', '2022-04-01 13:07:01'),
(40, 'home-pod-min', 'catalog', 38, '2022-04-01 13:08:21', '2022-04-01 13:08:21'),
(42, 'iphone-13-pro-512gb', 'product', 4, '2022-04-01 13:23:51', '2022-04-01 13:23:51'),
(43, 'iphone-12-256gb', 'product', 5, '2022-04-01 13:58:43', '2022-04-01 13:58:43'),
(44, 'iphone-11-256gb', 'product', 6, '2022-04-01 14:07:19', '2022-04-01 14:07:19'),
(45, 'iphone-se-256gb-2022', 'product', 7, '2022-04-01 14:16:55', '2022-04-01 14:16:55'),
(46, 'macbook-air-m1-2020', 'product', 8, '2022-04-01 14:27:33', '2022-04-01 14:27:33'),
(47, 'macbook-pro-m1-2020', 'product', 9, '2022-04-01 14:34:02', '2022-04-01 14:34:02'),
(50, 'macbook-pro-14-m1-max-2021', 'product', 12, '2022-04-01 16:11:11', '2022-04-01 16:11:11'),
(51, 'mac-pro-tower', 'product', 13, '2022-04-01 16:25:45', '2022-04-01 16:25:45'),
(52, 'apple-watch-series-7-gps-45mm', 'product', 14, '2022-04-01 16:35:18', '2022-04-01 16:35:18'),
(53, 'apple-watch-s3-gps-42mm', 'product', 15, '2022-04-01 16:43:36', '2022-04-01 16:43:36'),
(54, 'airpods-3-apple', 'product', 16, '2022-04-01 17:08:04', '2022-04-01 17:08:04'),
(55, 'airpods-pro-magsafe-charge-apple', 'product', 17, '2022-04-01 17:15:00', '2022-04-01 17:15:00'),
(56, 'bluetooth-airpods-max-apple', 'product', 18, '2022-04-01 17:19:31', '2022-04-01 17:19:31'),
(57, 'ipad-pro-m1-11-inch-wifi-cellular', 'product', 19, '2022-04-03 11:22:56', '2022-04-03 11:22:56'),
(58, 'ipad-air-5-m1-wifi-cellular', 'product', 20, '2022-04-03 11:30:09', '2022-04-03 11:30:09'),
(59, 'imac-24-2021-m1-7gpu', 'product', 21, '2022-04-03 11:41:01', '2022-04-03 11:41:01'),
(60, 'apple-magic-mouse-2', 'product', 22, '2022-04-03 11:53:32', '2022-04-03 11:53:32'),
(61, 'bluetooth-apple-mla02', 'product', 23, '2022-04-03 12:00:29', '2022-04-03 12:00:29'),
(62, 'apple-magic-keyboard-touch-id', 'product', 24, '2022-04-03 12:04:44', '2022-04-03 12:04:44'),
(63, 'apple-magic-keyboard-trackpad', 'product', 25, '2022-04-03 12:09:54', '2022-04-03 12:09:54'),
(64, 'apple-imac-27-5k-2020', 'product', 26, '2022-04-03 12:15:32', '2022-04-03 12:15:32'),
(65, 'apple-pro-display-xdr-standard-glass', 'product', 27, '2022-04-03 12:21:47', '2022-04-03 12:21:47'),
(66, 'apple-pencil-2-mu8f2', 'product', 28, '2022-04-03 12:26:55', '2022-04-03 12:26:55'),
(67, 'apple-pencil-1', 'product', 29, '2022-04-03 12:31:58', '2022-04-03 12:31:58'),
(68, 'macbook-pro-13-touch-bar-m1-256gb-2020', 'product', 30, '2022-04-03 12:43:15', '2022-04-03 12:43:15'),
(69, 'iphone-13-128gb', 'product', 31, '2022-04-03 13:04:56', '2022-04-03 13:04:56'),
(70, 'iphone-13-256gb', 'product', 32, '2022-04-03 13:07:48', '2022-04-03 13:07:48'),
(71, 'iphone-13-64gb', 'product', 33, '2022-04-03 13:09:58', '2022-04-03 13:09:58'),
(72, 'apple-ipad-mini-6-wifi-64g', 'product', 34, '2022-04-03 13:19:10', '2022-04-03 13:19:10'),
(73, 'ipad-mini-6-wifi-128gb', 'product', 35, '2022-04-03 13:29:04', '2022-04-03 13:29:04'),
(74, 'macbook-pro-16-m1-max', 'product', 36, '2022-04-03 13:34:19', '2022-04-03 13:34:19'),
(75, 'macbook-pro-16-m1', 'product', 37, '2022-04-03 13:37:47', '2022-04-03 13:37:47'),
(76, 'macbook-pro-14-inch-2021', 'product', 38, '2022-04-03 13:39:59', '2022-04-03 13:39:59'),
(77, 'apple-airpods-2-vna', 'product', 39, '2022-04-03 13:42:50', '2022-04-03 13:42:50'),
(78, 'iphone-11-64gb', 'product', 40, '2022-04-03 13:47:14', '2022-04-03 13:47:14'),
(79, 'iphone-11-512gb', 'product', 41, '2022-04-03 13:49:14', '2022-04-03 13:49:14'),
(80, 'iphone-13-512gb', 'product', 42, '2022-04-03 13:51:13', '2022-04-03 13:51:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('customer','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `gender`, `email_verified_at`, `remember_token`, `first_name`, `last_name`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'huy@jigear.xyz', '$2y$10$AVQgg8pnznl3VsHF1z7kKuio7iEcVY4PIAGzJtGmLR0CzY.Z5k5yS', '0', '2022-04-03 18:35:57', 'WkYcyCsH3mObmJ1XhFJg428iQDjmHmJrqinvr6SJVEsw2EkBn6JtPjuc9lt8', 'Lê', 'Chí Huy', 'admin', '2022-04-03 18:35:57', '2022-04-03 18:35:57', NULL),
(2, 'hao@jigear.xyz', '$2y$10$B.cDLcKgWHpzVJMNB2KQkujQBmsvX/sdK3XLFu49HOhA14UrREb8S', '0', '2022-04-03 18:35:57', NULL, 'Bùi', 'Nhật Hào', 'admin', '2022-04-03 18:35:57', '2022-04-03 18:35:57', NULL),
(3, 'tan@jigear.xyz', '$2y$10$PsPZVLZZCNtAwHEHqdUSbOUbzUaw4UxgOhjyiIxrwJcQ9gYMtzo6e', '0', '2022-04-03 18:35:57', NULL, 'Nguyễn', 'Hoàng Tấn', 'admin', '2022-04-03 18:35:57', '2022-04-03 18:35:57', NULL),
(4, 'guest1@gmail.com', '$2y$10$PkY5iYWNeJZNt6aiF5lFaOhCRWBcTj8aWJDHwG80LqgVpiUAAufpy', '1', '2022-04-03 18:35:57', '9pIYS8Qe3Mn9qnn8Dl33Okrc4SIpqvZkd1NHttZESpcjehJ1EICEs1I9JAZG', 'Khách 1', 'Hàng 1', 'customer', '2022-04-03 18:35:57', '2022-04-03 20:53:54', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `catalogs_title_unique` (`title`),
  ADD KEY `catalogs_published_index` (`published`),
  ADD KEY `catalogs_parent_id_foreign` (`parent_id`);
ALTER TABLE `catalogs` ADD FULLTEXT KEY `catalogs_title_fulltext` (`title`);

--
-- Chỉ mục cho bảng `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_addresses_phone_number_index` (`phone_number`),
  ADD KEY `delivery_addresses_customer_id_foreign` (`customer_id`);
ALTER TABLE `delivery_addresses` ADD FULLTEXT KEY `delivery_addresses_address_fulltext` (`address`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `images_path_unique` (`path`),
  ADD KEY `images_imaggable_type_imaggable_id_index` (`imaggable_type`,`imaggable_id`),
  ADD KEY `images_type_index` (`type`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `options_key_unique` (`key`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_status_index` (`status`),
  ADD KEY `orders_total_index` (`total`),
  ADD KEY `orders_payment_method_index` (`payment_method`),
  ADD KEY `orders_gender_index` (`gender`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);
ALTER TABLE `orders` ADD FULLTEXT KEY `orders_address_fulltext` (`address`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_title_unique` (`title`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_unit_price_index` (`unit_price`),
  ADD KEY `products_stock_index` (`stock`),
  ADD KEY `products_published_index` (`published`),
  ADD KEY `products_catalog_id_foreign` (`catalog_id`);
ALTER TABLE `products` ADD FULLTEXT KEY `products_title_fulltext` (`title`);

--
-- Chỉ mục cho bảng `product_parameters`
--
ALTER TABLE `product_parameters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_parameters_key_index` (`key`),
  ADD KEY `product_parameters_product_parameter_set_id_foreign` (`product_parameter_set_id`);
ALTER TABLE `product_parameters` ADD FULLTEXT KEY `product_parameters_key_fulltext` (`key`);

--
-- Chỉ mục cho bảng `product_parameter_sets`
--
ALTER TABLE `product_parameter_sets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_parameter_sets_key_unique` (`key`);
ALTER TABLE `product_parameter_sets` ADD FULLTEXT KEY `product_parameter_sets_key_fulltext` (`key`);

--
-- Chỉ mục cho bảng `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slugs_slug_unique` (`slug`),
  ADD KEY `slugs_sluggable_type_sluggable_id_index` (`sluggable_type`,`sluggable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_gender_index` (`gender`),
  ADD KEY `users_first_name_index` (`first_name`),
  ADD KEY `users_last_name_index` (`last_name`),
  ADD KEY `users_role_index` (`role`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `product_parameters`
--
ALTER TABLE `product_parameters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product_parameter_sets`
--
ALTER TABLE `product_parameter_sets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `catalogs`
--
ALTER TABLE `catalogs`
  ADD CONSTRAINT `catalogs_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `catalogs` (`id`);

--
-- Các ràng buộc cho bảng `delivery_addresses`
--
ALTER TABLE `delivery_addresses`
  ADD CONSTRAINT `delivery_addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`);

--
-- Các ràng buộc cho bảng `product_parameters`
--
ALTER TABLE `product_parameters`
  ADD CONSTRAINT `product_parameters_product_parameter_set_id_foreign` FOREIGN KEY (`product_parameter_set_id`) REFERENCES `product_parameter_sets` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
