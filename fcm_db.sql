-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 21, 2018 lúc 04:12 PM
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
  `nameuser` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fcm_info`
--

INSERT INTO `fcm_info` (`id`, `token`, `nameuser`) VALUES
(1, 'c3HiUKsNzeE:APA91bEU4cqSXZQyrTw-8Xleqj_ttHa1D-olQ20wPGrY5xki4K4uf5VPTrvBM7hDpH04trNvp6aYCTCyqi1CMHVc5ka_5XyBBIO5daJABMFVavbOnu59mjsisWFB3lBqlnlaSNLvfVdb7c0dwGr55OLP0EtmQGE0tQ', 'duy'),
(2, 'f1u9lJDS6o0:APA91bEDjKUm8rOmPREhiKCc6WBNred23kEPJRhVyzBr8Y8ihi9ywL_8SnHSH2hgGvHG9_llrWyQUMTa0ac5s-ic7pigBBOvQsVfYY8Qp5BouBrXf0RRj1CF_H9lB6kTY1gChDm06aMJqvVe3Ro4Vc9Zr3hI0aAhjA', 'tab10'),
(3, 'cOEA5SG7VB8:APA91bFNZ8sqJ1DNPUQtpLvYAMYqJwAqeH2zywMMXPIei_b411W0hq7dxuOj_x28SVGwksCEv4wpaxNerhChMF2Cqt8kl1lECtp-evmZkiqySNPblQuVVqfAsToviyA2zTmtDAr3Qp1aZLQ8VBOEDnFjWQg6iMgIVw', 'phone4.4'),
(4, '841415151', '');

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
(2, 'title message', 'body message'),
(3, 'title message', 'body message');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `fcm_notifi`
--
ALTER TABLE `fcm_notifi`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
