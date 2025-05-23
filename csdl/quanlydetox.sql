-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2025 lúc 03:35 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlydetox`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluansanpham`
--

CREATE TABLE `binhluansanpham` (
  `ID` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idSP` varchar(10) NOT NULL,
  `thoiGian` date NOT NULL DEFAULT current_timestamp(),
  `danhGia` int(11) NOT NULL,
  `noiDung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluantintuc`
--

CREATE TABLE `binhluantintuc` (
  `ID` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idTT` varchar(10) NOT NULL,
  `thoiGian` date NOT NULL DEFAULT current_timestamp(),
  `noiDung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `ID` int(11) NOT NULL,
  `idGH` varchar(10) NOT NULL,
  `idSP` varchar(10) NOT NULL,
  `soLuong` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `ID` int(11) NOT NULL,
  `idHD` varchar(10) NOT NULL,
  `idSP` varchar(10) NOT NULL,
  `soLuong` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ID` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `ngayTao` date NOT NULL DEFAULT current_timestamp(),
  `trangThai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: chưa thanh toán 1: đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `thoiGian` date NOT NULL DEFAULT current_timestamp(),
  `tongTien` double NOT NULL,
  `trangThai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: chưa thanh toán 1: đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `ID` varchar(10) NOT NULL,
  `ten` varchar(20) NOT NULL,
  `khaiNiem` text DEFAULT NULL,
  `thanhPhan` text DEFAULT NULL,
  `cachSuDung` text DEFAULT NULL,
  `cachBaoQuan` text DEFAULT NULL,
  `dungTich` varchar(20) DEFAULT NULL,
  `donGia` double NOT NULL,
  `imagePath` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `email` varchar(100) NOT NULL,
  `ten` varchar(50) NOT NULL,
  `matKhau` varchar(50) NOT NULL,
  `vaiTro` tinyint(1) NOT NULL COMMENT '0: người dùng 1: admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `ID` varchar(10) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `thoiGian` date NOT NULL DEFAULT current_timestamp(),
  `noiDung` text NOT NULL,
  `imagePath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluansanpham`
--
ALTER TABLE `binhluansanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`),
  ADD KEY `idSP` (`idSP`);

--
-- Chỉ mục cho bảng `binhluantintuc`
--
ALTER TABLE `binhluantintuc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`),
  ADD KEY `idTT` (`idTT`);

--
-- Chỉ mục cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idSP` (`idSP`),
  ADD KEY `idGH` (`idGH`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `idHD` (`idHD`),
  ADD KEY `idSP` (`idSP`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `email` (`email`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluansanpham`
--
ALTER TABLE `binhluansanpham`
  ADD CONSTRAINT `binhluansanpham_ibfk_1` FOREIGN KEY (`email`) REFERENCES `taikhoan` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `binhluansanpham_ibfk_2` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `binhluantintuc`
--
ALTER TABLE `binhluantintuc`
  ADD CONSTRAINT `binhluantintuc_ibfk_1` FOREIGN KEY (`email`) REFERENCES `taikhoan` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `binhluantintuc_ibfk_2` FOREIGN KEY (`idTT`) REFERENCES `tintuc` (`ID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`ID`),
  ADD CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`idGH`) REFERENCES `giohang` (`ID`);

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`idHD`) REFERENCES `hoadon` (`ID`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`ID`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`email`) REFERENCES `taikhoan` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
