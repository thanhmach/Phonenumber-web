-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2023 lúc 04:36 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `danhba`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `MaAD` varchar(10) NOT NULL,
  `TenAD` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `MaTB` varchar(10) NOT NULL,
  `TongDiem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`MaTB`, `TongDiem`) VALUES
('TB01', 400),
('TB02', 600);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` varchar(10) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `TenKH` varchar(20) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `CCCD` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `MaNV`, `TenKH`, `DiaChi`, `CCCD`) VALUES
('KH01', 'AD01', 'Thanh', 'Binh Tan', 2147483647);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(10) NOT NULL,
  `TenNV` varchar(20) NOT NULL,
  `SDT` int(20) NOT NULL,
  `Gmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `SDT`, `Gmail`) VALUES
('NV01', '1111', 1111, '1111');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MaQuyen` varchar(10) NOT NULL,
  `TenQuyen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MaQuyen`, `TenQuyen`) VALUES
('0', 'admin'),
('1', 'staff'),
('2', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sdt`
--

CREATE TABLE `sdt` (
  `MaKH` varchar(10) NOT NULL,
  `MaTB` varchar(10) NOT NULL,
  `SDT` text NOT NULL,
  `NgayDK` date NOT NULL,
  `NgayHH` date NOT NULL,
  `DiemTong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sdt`
--

INSERT INTO `sdt` (`MaKH`, `MaTB`, `SDT`, `NgayDK`, `NgayHH`, `DiemTong`) VALUES
('KH01', 'TB01', '0909090909', '2023-11-29', '2023-12-29', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaQuyen` varchar(10) NOT NULL,
  `MaTK` varchar(10) NOT NULL,
  `TenTK` varchar(20) NOT NULL,
  `MatKhau` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaQuyen`, `MaTK`, `TenTK`, `MatKhau`) VALUES
('0', 'AD01', 'admin', 'admin'),
('1', 'NV01', 'NV01', 'NV01'),
('2', 'KH01', 'KH01', 'KH01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuebao`
--

CREATE TABLE `thuebao` (
  `MaTB` varchar(10) NOT NULL,
  `TenTB` varchar(20) NOT NULL,
  `ThoiHan` varchar(10) NOT NULL,
  `Diem` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuebao`
--

INSERT INTO `thuebao` (`MaTB`, `TenTB`, `ThoiHan`, `Diem`) VALUES
('TB01', 'TB01', '1 tháng', 20),
('TB02', 'TB02', '1 năm', 30),
('TB03', 'TB03', '1 ngày', 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`MaAD`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`MaTB`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`,`MaNV`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `sdt`
--
ALTER TABLE `sdt`
  ADD PRIMARY KEY (`MaKH`,`MaTB`),
  ADD KEY `MaTB` (`MaTB`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaQuyen`,`MaTK`);

--
-- Chỉ mục cho bảng `thuebao`
--
ALTER TABLE `thuebao`
  ADD PRIMARY KEY (`MaTB`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sdt`
--
ALTER TABLE `sdt`
  ADD CONSTRAINT `sdt_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `sdt_ibfk_2` FOREIGN KEY (`MaTB`) REFERENCES `thuebao` (`MaTB`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MaQuyen`) REFERENCES `quyen` (`MaQuyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
