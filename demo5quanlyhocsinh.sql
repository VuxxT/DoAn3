-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 15, 2023 lúc 02:32 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo5quanlyhocsinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `roles`, `password`) VALUES
(1, 'Admin@gmail.com', '[]', '$2y$13$o1hO7wq2YaZouBOWKrbhleke2b/DNhzMfd//VbasYMeZWjQl5P3pO'),
(13, 'user123@gmail.com', '[]', '$2y$13$vdZrDrVTHE1T9NgO6RsUP.gPohV7YVJ4r94vE1FYxDi009zWcJEru');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `id` int(11) NOT NULL,
  `ten_hk_id` int(11) DEFAULT NULL,
  `ten_mon_hoc_id` int(11) DEFAULT NULL,
  `ten_hs_id` int(11) DEFAULT NULL,
  `diem_tra_bai` double NOT NULL,
  `diem_ktra15phut` double NOT NULL,
  `diem_ktra1tiet` double NOT NULL,
  `diem_thi` double NOT NULL,
  `diem_tb` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`id`, `ten_hk_id`, `ten_mon_hoc_id`, `ten_hs_id`, `diem_tra_bai`, `diem_ktra15phut`, `diem_ktra1tiet`, `diem_thi`, `diem_tb`) VALUES
(1, 1, 1, 1, 4, 4, 7, 8, 6.5),
(2, 1, 5, 4, 10, 7, 8, 7, 7.7),
(3, 1, 2, 9, 10, 9, 8.5, 8, 8.6),
(5, 1, 13, 8, 7, 9, 8, 7, 7.6),
(6, 1, 6, 10, 10, 10, 7.5, 9.3, 9),
(7, 1, 10, 14, 8, 9, 7.3, 8.5, 8.2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_ky`
--

CREATE TABLE `hoc_ky` (
  `id` int(11) NOT NULL,
  `ten_hk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_ky`
--

INSERT INTO `hoc_ky` (`id`, `ten_hk`) VALUES
(1, 'Học Kỳ I'),
(4, 'Học Kỳ II');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoc_sinh`
--

CREATE TABLE `hoc_sinh` (
  `id` int(11) NOT NULL,
  `ten_lop_id` int(11) DEFAULT NULL,
  `ten_hs` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia_chi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_phu_huynh` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtph` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoc_sinh`
--

INSERT INTO `hoc_sinh` (`id`, `ten_lop_id`, `ten_hs`, `email`, `sdt`, `dia_chi`, `ten_phu_huynh`, `sdtph`) VALUES
(1, 1, 'Nguyễn Văn Anh', 'nva10a1@student.gmail.com', '0939113322', 'Cần Thơ', 'Trường Hoàng Vũ', '0939552220'),
(2, 1, 'Nguyễn Văn Tín', 'nvt10a1@student.gmail.com', '0939113328', 'Vĩnh Long', 'Nguyễn Văn B', '0939556558'),
(3, 1, 'Lê Thanh Bình', 'ltb10a1@student.gmail.com', '0939113113', 'Vĩnh Long', 'Lê Bình An', '0939552220'),
(4, 3, 'Huỳnh Kim Chi', 'hkc10a3@student.gmail.com', '0913123124', 'Vĩnh Long', 'Huỳnh Tấn Phú', '0931239981'),
(5, 3, 'Hồ Thanh Bình', 'htb10a3@student.gmail.com', '0999123234', 'Cần Thơ', 'Hồ Quý Ly', '0939552299'),
(6, 2, 'Nguyễn Minh Vương', 'nmv10a2@student.gmail.com', '0939113399', 'Vĩnh Long', 'Nguyễn Minh Phúc', '0939552255'),
(8, 2, 'Nguyễn Ngọc Ý', 'nny10a2@student.gmail.com', '0939113444', 'Vĩnh Long', 'Nguyễn Văn Bảy', '0939556720'),
(9, 2, 'Vũ Văn Thanh', 'vvt10a2@student.gmail.com', '0998877129', 'Cần Thơ', 'Vũ Văn Trường', '0939555720'),
(10, 4, 'Thái Ngọc Khánh', 'tnk11a1@student.gmail.com', '0987654378', 'Cần Thơ', 'Thái Phú Bình', '098889977'),
(11, 5, 'Nguyễn Như Bình', 'nnb11a2@student.gmail.com', '0999888555', 'Cần Thơ', 'Nguyễn Thành Minh', '0939556556'),
(14, 11, 'Lý Thanh Thanh', 'ltt12a2@student.com', '093125125', 'Cà Mau', 'Đặng Thị Ngữ', '0939552220');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_hoc`
--

CREATE TABLE `lich_hoc` (
  `id` int(11) NOT NULL,
  `ten_mon_hoc_id` int(11) DEFAULT NULL,
  `ten_lop_id` int(11) DEFAULT NULL,
  `so_tiet` int(11) NOT NULL,
  `ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lich_hoc`
--

INSERT INTO `lich_hoc` (`id`, `ten_mon_hoc_id`, `ten_lop_id`, `so_tiet`, `ngay`) VALUES
(1, 1, 1, 1, '2023-06-06'),
(2, 2, 1, 2, '2023-11-06'),
(3, 1, 1, 1, '2023-11-06'),
(4, 4, 1, 1, '2023-11-06'),
(5, 5, 7, 2, '2023-11-13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(11) NOT NULL,
  `ten_lop` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `si_so` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `ten_lop`, `si_so`) VALUES
(1, '10A1', 28),
(2, '10A2', 30),
(3, '10A3', 30),
(4, '11A1', 28),
(5, '11A2', 28),
(6, '11A3', 30),
(7, '12A1', 30),
(11, '12A2', 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mon_hoc`
--

CREATE TABLE `mon_hoc` (
  `id` int(11) NOT NULL,
  `ten_mon_hoc` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_hoc`
--

INSERT INTO `mon_hoc` (`id`, `ten_mon_hoc`) VALUES
(1, 'Giáo Dục Công Dân'),
(2, 'Toán'),
(4, 'Tin Học'),
(5, 'Ngữ Văn'),
(6, 'Vật Lý'),
(7, 'Hóa Học'),
(8, 'Công Nghệ'),
(9, 'Lịch Sử'),
(10, 'Địa Lý'),
(11, 'Sinh Học'),
(13, 'Tiếng Anh');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_880E0D76E7927C74` (`email`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F98FCDE02979F59E` (`ten_hk_id`),
  ADD KEY `IDX_F98FCDE0E3E87926` (`ten_mon_hoc_id`),
  ADD KEY `IDX_F98FCDE0BCD48AEE` (`ten_hs_id`);

--
-- Chỉ mục cho bảng `hoc_ky`
--
ALTER TABLE `hoc_ky`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A96A2D1B8C4B31AB` (`ten_lop_id`);

--
-- Chỉ mục cho bảng `lich_hoc`
--
ALTER TABLE `lich_hoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_381EE035E3E87926` (`ten_mon_hoc_id`),
  ADD KEY `IDX_381EE0358C4B31AB` (`ten_lop_id`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Chỉ mục cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hoc_ky`
--
ALTER TABLE `hoc_ky`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `lich_hoc`
--
ALTER TABLE `lich_hoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mon_hoc`
--
ALTER TABLE `mon_hoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diem`
--
ALTER TABLE `diem`
  ADD CONSTRAINT `FK_F98FCDE02979F59E` FOREIGN KEY (`ten_hk_id`) REFERENCES `hoc_ky` (`id`),
  ADD CONSTRAINT `FK_F98FCDE0BCD48AEE` FOREIGN KEY (`ten_hs_id`) REFERENCES `hoc_sinh` (`id`),
  ADD CONSTRAINT `FK_F98FCDE0E3E87926` FOREIGN KEY (`ten_mon_hoc_id`) REFERENCES `mon_hoc` (`id`);

--
-- Các ràng buộc cho bảng `hoc_sinh`
--
ALTER TABLE `hoc_sinh`
  ADD CONSTRAINT `FK_A96A2D1B8C4B31AB` FOREIGN KEY (`ten_lop_id`) REFERENCES `lop` (`id`);

--
-- Các ràng buộc cho bảng `lich_hoc`
--
ALTER TABLE `lich_hoc`
  ADD CONSTRAINT `FK_381EE0358C4B31AB` FOREIGN KEY (`ten_lop_id`) REFERENCES `lop` (`id`),
  ADD CONSTRAINT `FK_381EE035E3E87926` FOREIGN KEY (`ten_mon_hoc_id`) REFERENCES `mon_hoc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
