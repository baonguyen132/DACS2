-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 13, 2025 lúc 11:48 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dacs2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `batterys`
--

CREATE TABLE `batterys` (
  `id` int(11) NOT NULL,
  `name_battery` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `shape` varchar(100) NOT NULL,
  `point` double(255,2) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `batterys`
--

INSERT INTO `batterys` (`id`, `name_battery`, `size`, `shape`, `point`, `image`, `created_at`, `updated_at`) VALUES
(32, 'PIN AA', '2x2x4', 'Trụ tròn', 2.00, '1708511122', '2024-02-21 10:25:22', '2024-02-24 08:24:13'),
(34, 'PIN C', '10x2x4', 'Trụ tròn', 3.00, '1708762996', '2024-02-24 08:23:16', '2024-02-24 08:23:59'),
(35, 'PIN AAA', '8x8x9', 'Trụ tròn', 2.00, '1708952280', '2024-02-26 12:58:00', '2024-02-26 12:58:00'),
(37, 'PIN 9V', '4x6x7', 'chữ nhật', 4.00, '1731381551', '2024-11-12 03:19:11', '2024-11-12 03:19:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `idUser` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `content`, `idUser`, `created_at`, `updated_at`) VALUES
(10, '<p>bảo nguy&ecirc;n</p>', 26, '2024-03-05 14:32:42', '2024-03-05 14:32:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `iduser` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `address`, `total`, `token`, `image`, `created_at`, `updated_at`) VALUES
(142, 26, '68 lê đình chinh', 10, 'NULL', 'NULL', '2024-12-22 12:10:21', '2024-12-22 12:13:17'),
(144, 26, '68 lê đình chinh', 8, 'NULL', 'NULL', '2024-12-22 12:17:22', '2024-12-22 12:19:24'),
(147, 26, '68 Lê Đình Chinh, Hoà Quý, Ngũ Hành Sơn, Đà Nẵng', 6, 'NULL', 'NULL', '2024-12-27 00:56:25', '2025-04-22 15:48:50'),
(148, 65, '12/1 phan thành tài', 4, 'NULL', 'NULL', '2025-04-22 15:12:41', '2025-04-22 15:15:37'),
(150, 65, '12/1 phan thành tài', 4, 'NULL', 'NULL', '2025-04-22 15:19:53', '2025-04-22 15:21:39'),
(153, 26, '68 Lê Đình Chinh, Hoà Quý, Ngũ Hành Sơn, Đà Nẵng', 6, 'NULL', 'NULL', '2025-05-07 11:53:51', '2025-05-07 11:58:42'),
(163, 26, '68 Lê Đình Chinh, Hoà Quý, Ngũ Hành Sơn, Đà Nẵng', 8, '17842191926', 'processed_1757687614482', '2025-09-12 14:34:12', '2025-09-12 14:34:12'),
(164, 26, '68 Lê Đình Chinh, Hoà Quý, Ngũ Hành Sơn, Đà Nẵng', 12, '39930425926', 'processed_1757726408900', '2025-09-13 01:20:16', '2025-09-13 01:20:16'),
(165, 26, '68 Lê Đình Chinh, Hoà Quý, Ngũ Hành Sơn, Đà Nẵng', 8, 'NULL', 'NULL', '2025-09-13 05:02:59', '2025-09-13 05:04:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `idcart` int(11) NOT NULL,
  `idbatterys` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `detail`
--

INSERT INTO `detail` (`id`, `idcart`, `idbatterys`, `count`) VALUES
(231, 142, 35, 2),
(232, 142, 32, 3),
(235, 144, 37, 1),
(236, 144, 32, 2),
(241, 147, 32, 2),
(242, 147, 35, 1),
(243, 148, 32, 2),
(245, 150, 32, 2),
(248, 153, 32, 2),
(249, 153, 35, 1),
(262, 163, 32, 4),
(263, 164, 32, 3),
(264, 164, 35, 3),
(265, 165, 32, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_07_072207_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `cccd` varchar(12) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(6) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `pob` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `point` int(11) NOT NULL DEFAULT 0,
  `token` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `status`, `cccd`, `dob`, `gender`, `pob`, `address`, `point`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(26, 'Hồ Bảo Nguyên', 'hbnguyen132@gmail.com', NULL, '$2y$10$93gMtyXbNs2CuEYzbo8xyerlSNNq2jw2EpBl4SiCZEhTVw4edcjvy', 4, '048204007137', '2004-02-13', 'Male', 'Bà Rịa - Vũng Tàu', '68 Lê Đình Chinh, Hoà Quý, Ngũ Hành Sơn, Đà Nẵng', 8, NULL, NULL, '2023-09-27 14:01:33', '2025-09-13 05:04:37'),
(63, 'Hồ Thăng Bản', 'linhchi162@gmail.com', NULL, '$2y$10$Dc8ldOWztbDhyk9ID8QnteSlL78nWyATlRErCSl9Bl/edrM4eEac2', 5, '048066007160', '1966-01-01', 'Male', '', 'Tổ 33, Hòa Quý, Ngũ Hành Sơn, Đà Nẵng', 55, '', NULL, '2024-02-28 04:27:18', '2024-02-28 04:27:18'),
(65, 'Nguyễn Thảo Nguyên', 'thaonguyen.ntn1511@gmail.com', NULL, '$2y$10$qnOchPw5FkXVmo.AjmeOsO2JMHaTzy6RPHnY8N2pq4yny.ZzfO21u', 4, '048307005024', '2007-11-15', 'Female', '', 'Thôn Dương Sơn, Hòa Châu, Hòa Vang, Đà Nẵng', 0, '', NULL, '2024-11-30 15:13:52', '2024-11-30 15:13:52'),
(66, 'Phạm Thị Bảo Ngân', 'baonganpham787@gmail.com', NULL, '$2y$10$cQUQjE0DGb5sRNbFGh7dWeuoblZTkJwiFuCU.L76JVzcfh1VypXr6', 5, '048307001669', '7200-10-03', 'Female', '', 'Thôn Lệ Sơn Nam, Hòa Tiến, Hòa Vang, Đà Nẵng', 8, '', NULL, '2024-12-08 07:07:16', '2024-12-08 07:07:16'),
(69, 'Khánh My', 'khonggiantopos@gmail.com', NULL, '$2y$10$vmW2ZqwhlMquBIYqYmZ4zOjSPHl2.Iux/RoAzZqhvr1eLmeXCKIe.', 0, '098765432112', '2025-09-15', NULL, NULL, NULL, 0, 'wPQb8ORCNRfebYDQmAhxKhrwBKrFU8fzNtK54jl2', NULL, '2025-09-12 13:35:00', '2025-09-12 13:35:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `name_voucher` varchar(20) NOT NULL,
  `code_voucher` varchar(30) NOT NULL,
  `point` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `IDClient` int(11) DEFAULT 0,
  `id_branch_voucher` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher`
--

INSERT INTO `voucher` (`id`, `name_voucher`, `code_voucher`, `point`, `image`, `IDClient`, `id_branch_voucher`, `created_at`, `updated_at`) VALUES
(15, '20k', 'asx-ss-xxx-aaa', 20, '175566134420250820', 26, 11, '2025-08-20 03:42:24', '2025-09-02 15:28:25'),
(16, '50k', 'xas-asa-ssz-ssa', 50, '175682239320250902', 26, 12, '2025-09-02 14:13:13', '2025-09-02 15:30:43'),
(17, '40k', 'ssaa-xx-aa-xx', 40, '175682244420250902', 0, 12, '2025-09-02 14:14:04', '2025-09-02 15:29:22'),
(18, '30k', 'xxaa-xx-aaa', 30, '175682246820250902', 26, 11, '2025-09-02 14:14:28', '2025-09-02 15:26:36'),
(19, '10k', '22-xx-aaa', 20, '175682249520250902', 26, 13, '2025-09-02 14:14:55', '2025-09-13 05:04:37'),
(20, '15k', 'sss-xxx-aaa', 20, '175682250820250902', 0, 13, '2025-09-02 14:15:08', '2025-09-02 15:23:20'),
(21, '50k', 'ssaa-xx-aaa', 50, '175682253920250902', 0, 14, '2025-09-02 14:15:39', '2025-09-02 14:15:39'),
(22, '60k', 'xx-aaa-ss0xx', 60, '175682255620250902', 0, 14, '2025-09-02 14:15:56', '2025-09-02 14:15:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `voucher_branchs`
--

CREATE TABLE `voucher_branchs` (
  `id` int(11) NOT NULL,
  `name_branch_voucher` varchar(100) NOT NULL,
  `logo` varchar(1000) NOT NULL,
  `color` varchar(10) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `voucher_branchs`
--

INSERT INTO `voucher_branchs` (`id`, `name_branch_voucher`, `logo`, `color`, `desc`, `created_at`, `updated_at`) VALUES
(11, 'Tiki', 'https://th.bing.com/th/id/OIP.69OrqFffxv_3ahzcbK4nagHaHa?r=0&o=7rm=3&rs=1&pid=ImgDetMain&o=7&rm=3', '#0891b2', 'Voucher & đổi thưởng tại Tiki', '2024-02-28 09:22:37', '2024-02-28 09:22:37'),
(12, 'Shopee', 'https://deo.shopeemobile.com/shopee/shopee-pcmall-live-sg/assets/ca5d12864c12916c05640b36e47ac5c9.png', '#ee4d2d', 'Ưu đãi & mã giảm giá Shopee', '2025-08-20 02:58:31', '2025-08-20 02:58:44'),
(13, 'Grab', 'https://tse2.mm.bing.net/th/id/OIP.xYXH22j8rj3C9X1rCfbYnQHaE7?r=0&rs=1&pid=ImgDetMain&o=7&rm=3', '#00b14f', 'Mã giảm giá & dịch vụ Grab', '2025-08-20 02:58:57', '2025-08-27 02:58:57'),
(14, 'Lazada', 'https://tse3.mm.bing.net/th/id/OIP._Pl2SNDwbnBAe0SbH4f8JwHaEK?r=0&rs=1&pid=ImgDetMain&o=7&rm=3', '#0066ff', 'Deal & mã giảm giá Lazada', '2025-08-20 03:00:47', '2025-08-20 03:00:57');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `batterys`
--
ALTER TABLE `batterys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_users` (`idUser`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user` (`iduser`);

--
-- Chỉ mục cho bảng `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_cart` (`idcart`),
  ADD KEY `detail_battery` (`idbatterys`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `cccd` (`cccd`);

--
-- Chỉ mục cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voucher-voucher_branchs` (`id_branch_voucher`);

--
-- Chỉ mục cho bảng `voucher_branchs`
--
ALTER TABLE `voucher_branchs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `batterys`
--
ALTER TABLE `batterys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT cho bảng `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `voucher_branchs`
--
ALTER TABLE `voucher_branchs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_users` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_battery` FOREIGN KEY (`idbatterys`) REFERENCES `batterys` (`id`),
  ADD CONSTRAINT `detail_cart` FOREIGN KEY (`idcart`) REFERENCES `cart` (`id`);

--
-- Các ràng buộc cho bảng `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `voucher-voucher_branchs` FOREIGN KEY (`id_branch_voucher`) REFERENCES `voucher_branchs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
