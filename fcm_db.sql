-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2018 lúc 06:47 AM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fcm_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fcm_info`
--

CREATE TABLE `fcm_info` (
  `id` int(255) NOT NULL,
  `token` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `nameuser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenAndroid` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `tokenIOS` varchar(10000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fcm_info`
--

INSERT INTO `fcm_info` (`id`, `token`, `nameuser`, `tokenAndroid`, `tokenIOS`) VALUES
(1, 'fdbpiPNZt3Q:APA91bGxOctloV7bWTbdTSIc8G2v4779L6qNJBEznON5HA5TnXmgc-2Puqk5gkDTk7V1BryX85UMPrfFxcizx-Uz64yJ_uLfXWgZ6ppHXZiKHg5kSBpBRRk3c4yqywVwvxyi5HhyKqVUlXaNh0Luoiuk6ucPpCIx_A', '', 'fdbpiPNZt3Q:APA91bGxOctloV7bWTbdTSIc8G2v4779L6qNJBEznON5HA5TnXmgc-2Puqk5gkDTk7V1BryX85UMPrfFxcizx-Uz64yJ_uLfXWgZ6ppHXZiKHg5kSBpBRRk3c4yqywVwvxyi5HhyKqVUlXaNh0Luoiuk6ucPpCIx_A', 'dIDPaPlvebw:APA91bGqaulISFFpoFiSFit7kTr_ITdlH3cqdzqwtf7PTUwjB0FrHT_fKPG7ywTp_Y3N-eHSBp6ryW_3oFMm-Y2rorkL1TvmJAO5Ch13tAjaCP1ZNDQwum_fvS9OtjmxDzehMtTSPg9F_t-CcJJV_fT42wafAxOjnQ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fcm_notifi`
--

CREATE TABLE `fcm_notifi` (
  `id` int(255) NOT NULL,
  `title` varchar(10000) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(10000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fcm_notifi`
--

INSERT INTO `fcm_notifi` (`id`, `title`, `body`) VALUES
(1, 'title message', 'body message'),
(2, '123', 'body message'),
(3, 'title message', 'body message'),
(4, 'title message', 'body message'),
(5, 'title message', 'body message'),
(6, 'title android', 'body android'),
(7, 'title ios', 'body ios'),
(8, 'title message', 'body message');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `fcm_info`
--
ALTER TABLE `fcm_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `fcm_notifi`
--
ALTER TABLE `fcm_notifi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `fcm_info`
--
ALTER TABLE `fcm_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `fcm_notifi`
--
ALTER TABLE `fcm_notifi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
