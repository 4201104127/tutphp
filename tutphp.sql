-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 05, 2019 lúc 02:34 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tutphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `level` tinyint(4) DEFAULT '1',
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `name`, `address`, `email`, `password`, `phone`, `status`, `level`, `avatar`, `created_at`, `updated_at`) VALUES
(2, 'Ry Yamii', 'HCM', 'yamieternal1703199@gmail.com', '202cb962ac59075b964b07152d234b70', '964984150', 1, 2, NULL, NULL, '2019-02-14 21:35:25'),
(3, 'Yami Ni', 'asss', 'ajnasb@yah.com', '202cb962ac59075b964b07152d234b70', '65455', 1, 1, NULL, NULL, NULL),
(4, 'ae', 'HCM', 'yami.eternal@yahoo.com', 'c20ad4d76fe97759aa27a0c99bff6710', '0964984150', 1, 1, NULL, NULL, '2019-02-15 19:16:19'),
(5, 'Yami111', 'HN', 'yamieternal17031997@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '0964984150', 1, 2, NULL, NULL, '2019-02-15 19:19:20'),
(6, 'Dell', 'HCM', 'yami@gmail.com', '202cb962ac59075b964b07152d234b70', '0964984150', 1, 1, NULL, NULL, '2019-03-13 11:44:08'),
(7, 'Yamimmm', 'HCM', 'yami.eternal1@yahoo.com', 'c4ca4238a0b923820dcc509a6f75849b', '09649841500', 1, 1, NULL, NULL, '2019-02-15 20:00:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` int(100) DEFAULT NULL,
  `home` tinyint(4) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `images`, `banner`, `home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Đá quý', 'da-quy', NULL, NULL, 1, 1, '2019-02-12 19:31:47', '2019-03-21 11:27:01'),
(2, 'Trang sức', 'trang-suc', NULL, NULL, 1, 1, '2019-02-12 19:31:56', '2019-03-21 11:27:12'),
(3, 'Vòng tay', 'vong-tay', NULL, NULL, 0, 1, '2019-02-12 19:32:05', '2019-03-21 11:26:51'),
(4, 'Nhẫn', 'nhan', NULL, NULL, 0, 1, '2019-02-12 19:32:12', '2019-03-21 11:26:51'),
(34, 'Dây chuyền', 'day-chuyen', NULL, NULL, 0, 1, '2019-02-14 16:48:35', '2019-03-21 11:26:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `id_user`, `id_product`, `created_at`, `updated_at`) VALUES
(7, NULL, 'get here', 11, 0, '2019-03-18 08:58:50', '2019-03-18 08:58:50'),
(11, 'Ry Mi', 'ok', 11, 24, '2019-03-18 09:17:36', '2019-03-18 09:17:36'),
(13, 'Ry Mi', 'k', 11, 21, '2019-03-18 09:23:57', '2019-03-18 09:23:57'),
(14, 'Ry Mi', 'hell', 11, 23, '2019-03-18 09:44:05', '2019-03-18 09:44:05'),
(18, 'Ry Mi', 'no name\r\n', 11, 24, '2019-03-18 10:55:50', '2019-03-18 10:55:50'),
(19, 'Yami 333', 'kk', 13, 21, '2019-03-18 11:41:42', '2019-03-18 11:41:42'),
(21, 'Yami 333', '', 13, 21, '2019-03-18 13:22:30', '2019-03-18 13:22:30'),
(22, 'Yami 333', '', 13, 21, '2019-03-18 13:44:01', '2019-03-18 13:44:01'),
(23, 'Yami 333', '2`', 13, 21, '2019-03-18 13:44:15', '2019-03-18 13:44:15'),
(24, 'Yami 333', 'hell', 13, 24, '2019-03-22 04:44:00', '2019-03-22 04:44:00'),
(25, 'RyMimm', 'Alo', 11, 23, '2019-04-04 16:48:01', '2019-04-04 16:48:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `product_id` tinyint(4) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(12, 8, 23, 1, 24000, '2019-03-02 16:31:43', '2019-03-02 16:31:43'),
(13, 9, 9, 2, 2940000, '2019-03-02 16:46:13', '2019-03-03 09:28:14'),
(14, 10, 20, 1, 2000000, '2019-03-21 11:30:15', '2019-03-21 11:30:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sale` tinyint(4) DEFAULT '0',
  `thumbn` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `content` text,
  `number` int(11) NOT NULL DEFAULT '0',
  `sold` int(11) DEFAULT '0',
  `head` int(11) DEFAULT '0',
  `view` int(11) DEFAULT '0',
  `hot` tinyint(11) DEFAULT '0',
  `pay` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `slug`, `price`, `sale`, `thumbn`, `category_id`, `content`, `number`, `sold`, `head`, `view`, `hot`, `pay`, `created_at`, `updated_at`) VALUES
(9, 'Nhẫn ', 'nhan', 3000000, 2, 'nhan.jpg', 2, 'Nhan', 4, 0, 0, 0, 0, 0, NULL, '2019-03-03 09:53:35'),
(18, 'Nhẫn kc', 'nhan-kc', 5000000, 0, '68.jpg', 34, 'Wedding party', 3, 0, 0, 0, 0, 0, NULL, '2019-02-14 21:15:43'),
(20, 'Da', 'da', 2000000, 0, '68.jpg', 1, 'Da quu', 1, 0, 0, 0, 0, 1, NULL, '2019-03-21 11:30:42'),
(21, 'Da 2', 'da-2', 200000, 4, '68.jpg', 1, 'da2', 2, 0, 0, 0, 0, 0, NULL, '2019-02-14 21:18:41'),
(22, 'da3', 'da3', 1000000, 5, '68.jpg', 1, 'da', 2, 0, 0, 0, 0, 0, NULL, '2019-02-14 21:18:48'),
(23, 'da4', 'da4', 30000, 20, '68.jpg', 1, '123', -1, 0, 0, 0, 0, 2, NULL, '2019-03-21 11:04:56'),
(25, 'aaa', 'aaa', 2000000, 2, '5Ygdzn.jpg', 4, 'ôk', 2, 0, 0, 0, 0, 0, NULL, NULL),
(26, 'Delljhvh', 'delljhvh', 551511111, 10, 'pt.png', 2, 'content', 2, 0, 0, 0, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reply`
--

CREATE TABLE `reply` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `id_comment` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `reply`
--

INSERT INTO `reply` (`id`, `name`, `comment`, `id_comment`, `id_user`, `id_product`, `created_at`, `updated_at`) VALUES
(6, 'Ry Mi', 'hat bụi nào hóa kiếm thân tôi', 18, 11, 24, '2019-03-19 08:19:29', '2019-03-19 08:19:29'),
(7, 'Yami 333', 'ec', 18, 13, 24, '2019-03-22 04:44:16', '2019-03-22 04:44:16'),
(8, 'Ry Mi', 'okokoo', 18, 11, 24, '2019-03-28 09:05:25', '2019-03-28 09:05:25'),
(9, 'RyMimm', 'Hello', 14, 11, 23, '2019-04-04 16:48:12', '2019-04-04 16:48:12'),
(10, 'RyMimm', 'Hư', 25, 11, 23, '2019-04-04 16:48:23', '2019-04-04 16:48:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `note` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `users_id`, `status`, `note`, `created_at`, `updated_at`) VALUES
(8, 26400, 11, 1, 'ok', '2019-03-02 16:31:43', '2019-03-21 11:04:56'),
(9, 3234000, 13, 1, 'k', '2019-03-02 16:46:13', '2019-03-03 09:53:35'),
(10, 2200000, 13, 1, 'ok', '2019-03-21 11:30:14', '2019-03-21 11:30:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `token` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `updated_at`) VALUES
(11, 'RyMimm', 'yami.eternal@yahoo.com', '096498415', 'HCM', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, '2019-03-31 14:28:16'),
(13, 'Yami 333', 'yami.eternal1@yahoo.com', '09649841500', 'hồ chí minh city', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, NULL, NULL),
(14, 'Dell3', 'yamieternal17031997@gmail.com', '123123', 'HN', 'c81e728d9d4c2f636f067f89cc14862c', NULL, 1, NULL, NULL, NULL),
(15, 'Yami', 'yami.eternal5@yahoo.com', '65455', 'acd', '502e4a16930e414107ee22b6198c578f', NULL, 1, NULL, NULL, NULL),
(16, 'QuyenPhan', 'yami.eternal17@yahoo.com', '0964984150', '91/1 HCM', '202cb962ac59075b964b07152d234b70', NULL, 1, NULL, '2019-03-05 03:07:54', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
