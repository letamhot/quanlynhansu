-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 12, 2023 lúc 02:11 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhansu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangchamcong`
--

CREATE TABLE `bangchamcong` (
  `id` int NOT NULL,
  `idNhanVien` int NOT NULL,
  `thangChamCong` int NOT NULL,
  `soNgayCong` int NOT NULL,
  `soNgayNghi` int NOT NULL,
  `luongThucNhan` double NOT NULL,
  `idDonVi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bangchamcong`
--

INSERT INTO `bangchamcong` (`id`, `idNhanVien`, `thangChamCong`, `soNgayCong`, `soNgayNghi`, `luongThucNhan`, `idDonVi`) VALUES
(5, 6, 3, 25, 1, 6576154, 5),
(7, 12, 1, 25, 1, 21851154, 7),
(8, 6, 1, 26, 0, 6590000, 1),
(9, 6, 2, 25, 0, 6336539, 5),
(10, 6, 9, 26, 0, 6590000, 5),
(11, 6, 4, 26, 0, 6590000, 5),
(13, 12, 9, 26, 0, 21865000, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `id` int NOT NULL,
  `tenChucVu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`id`, `tenChucVu`) VALUES
(1, 'Giám đốc'),
(2, 'Phó giám đốc'),
(3, 'Trưởng phòng'),
(4, 'Tổ trưởng'),
(5, 'Nhân viên'),
(6, 'Phó trưởng phòng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `id` int NOT NULL,
  `idCha` int NOT NULL,
  `tenDonVi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayThanhLap` date NOT NULL,
  `anhDV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diaChi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donvi`
--

INSERT INTO `donvi` (`id`, `idCha`, `tenDonVi`, `ngayThanhLap`, `anhDV`, `diaChi`) VALUES
(1, 0, 'Tập đoàn Viễn thông Việt Nam', '1958-08-15', '', 'Hà Nội'),
(4, 1, 'VNPT Quảng Bình', '2023-08-05', 'VNPT_Logo.png', '56 Lý Thường Kiệt'),
(5, 4, 'Trung tâm Công nghệ Thông tin', '2023-08-06', 'VNPT_Logo.png', '56 Lý Thường Kiệt'),
(6, 4, 'VNPT huyện Quảng Trạch', '2023-08-06', 'VNPT_Logo.png', 'Ba Đồn'),
(7, 4, 'Trung tâm điều hành thông tin', '2023-08-06', 'VNPT_Logo.png', '56 Lý Thường Kiệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hopdonglaodong`
--

CREATE TABLE `hopdonglaodong` (
  `id` int NOT NULL,
  `tenHDLD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaiHDLD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngayHDLD` date DEFAULT NULL,
  `daiDienCongTy_ky` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `daiDienNLD_ky` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noiDung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idNhanVien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hopdonglaodong`
--

INSERT INTO `hopdonglaodong` (`id`, `tenHDLD`, `loaiHDLD`, `ngayHDLD`, `daiDienCongTy_ky`, `daiDienNLD_ky`, `noiDung`, `idNhanVien`) VALUES
(2, 'Hợp đồng thuê lại', 'Cộng tác viên', '2021-06-01', 'Nguyễn Mậu Hải', 'Lê Văn Tám', 'Hợp đồng nhân viên', 6),
(3, 'Hợp đồng lao động chính thức', 'chính thức', '2023-01-01', 'Trần Danh Việt', 'Hoàng Tôn', 'Hợp đồng nhân viên', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khenthuong`
--

CREATE TABLE `khenthuong` (
  `id` int NOT NULL,
  `tenKhenThuong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soQuyetDinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngayKhenThuong` date DEFAULT NULL,
  `soTienKhenthuong` int DEFAULT NULL,
  `idNhanVien` int DEFAULT NULL,
  `idDonVi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `id` int NOT NULL,
  `heSoLuong` double NOT NULL,
  `luongCoBan` int NOT NULL,
  `phuCap` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`id`, `heSoLuong`, `luongCoBan`, `phuCap`) VALUES
(3, 1.4, 4450000, 360000),
(4, 3.91, 5500000, 360000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `id` int NOT NULL,
  `maNV` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenNV` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaySinh` date DEFAULT NULL,
  `diaChi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `soDienThoai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngayVaoLam` date DEFAULT NULL,
  `soQuyetDinh` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luong` int DEFAULT NULL,
  `trinhDoHocVan` int DEFAULT NULL,
  `congDoan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinhTrangHonNhan` int DEFAULT NULL,
  `trangThai` int DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CMND` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngayCap` date DEFAULT NULL,
  `noiCap` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioiTinh` int DEFAULT NULL,
  `chucvu` int DEFAULT NULL,
  `donvi` int DEFAULT NULL,
  `idRole` int NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`id`, `maNV`, `tenNV`, `ngaySinh`, `diaChi`, `soDienThoai`, `ngayVaoLam`, `soQuyetDinh`, `luong`, `trinhDoHocVan`, `congDoan`, `tinhTrangHonNhan`, `trangThai`, `email`, `CMND`, `ngayCap`, `noiCap`, `avatar`, `gioiTinh`, `chucvu`, `donvi`, `idRole`, `pass`) VALUES
(6, 'CTV068067', 'Lê Văn Tám', '1996-08-16', 'Lương Ninh, Quảng Ninh, Quảng Bình', '0949543496', '2021-06-01', 'QBH_002', 3, 4, 'Trung tâm Công nghệ thông tin', 1, 1, 'tamlv.qbh@vnpt.vn', '044096005677', '2021-12-21', 'Cục QLHCVTTXH', '120532097_338942490692475_406953282105259240_n.jpg', 0, 5, 5, 1, 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'admin', 'Administrator', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin.qbh@vnpt.vn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'QBH011011', 'Hoàng Tôn', '2000-01-01', 'Quảng Bình', '0915133224', '2023-02-01', 'QBH_003', 4, 5, 'Trung tâm Điều Hành Thông Tin', 1, 1, 'tonh.qbh@vnpt.vn', '044300001923', '2022-11-11', 'Cục QLHCVTTXH', 'VNPT_Logo.svg.png', 0, 5, 7, 2, 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'QBH011000', 'Kế toán', NULL, 'VNPT Quảng Bình', '0911223312', NULL, 'QBH_001', 4, 5, 'Điều hành thông tin', NULL, NULL, 'dhtt.qbh@vnpt.vn', NULL, NULL, NULL, NULL, NULL, 5, 7, 1, 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `roleName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `roleName`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trinhdohocvan`
--

CREATE TABLE `trinhdohocvan` (
  `id` int NOT NULL,
  `tenTrinhDoHocVan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trinhdohocvan`
--

INSERT INTO `trinhdohocvan` (`id`, `tenTrinhDoHocVan`) VALUES
(4, 'Đại học Công nghệ thông tin'),
(5, 'Đại học Điện tử viễn thông'),
(6, 'Thạc sĩ Công nghệ thông tin'),
(7, 'Đại học Kế toán'),
(8, 'Đại học Quảng Trị Kinh Doanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `roleId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `pass`, `roleId`) VALUES
(2, 'Administrator1', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(3, 'User ', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bangchamcong`
--
ALTER TABLE `bangchamcong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idNhanVien` (`idNhanVien`),
  ADD KEY `idDonVi` (`idDonVi`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCha` (`idCha`);

--
-- Chỉ mục cho bảng `hopdonglaodong`
--
ALTER TABLE `hopdonglaodong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idNhanVien` (`idNhanVien`);

--
-- Chỉ mục cho bảng `khenthuong`
--
ALTER TABLE `khenthuong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idNhanVien` (`idNhanVien`),
  ADD KEY `idDonVi` (`idDonVi`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `luong` (`luong`),
  ADD KEY `trinhDoHocVan` (`trinhDoHocVan`),
  ADD KEY `chucvu` (`chucvu`,`donvi`),
  ADD KEY `donvi` (`donvi`),
  ADD KEY `idUser` (`idRole`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trinhdohocvan`
--
ALTER TABLE `trinhdohocvan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_mail` (`email`),
  ADD KEY `roleId` (`roleId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bangchamcong`
--
ALTER TABLE `bangchamcong`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `donvi`
--
ALTER TABLE `donvi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hopdonglaodong`
--
ALTER TABLE `hopdonglaodong`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `trinhdohocvan`
--
ALTER TABLE `trinhdohocvan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bangchamcong`
--
ALTER TABLE `bangchamcong`
  ADD CONSTRAINT `bangchamcong_ibfk_1` FOREIGN KEY (`idNhanVien`) REFERENCES `nhanvien` (`id`),
  ADD CONSTRAINT `bangchamcong_ibfk_2` FOREIGN KEY (`idDonVi`) REFERENCES `donvi` (`id`);

--
-- Các ràng buộc cho bảng `hopdonglaodong`
--
ALTER TABLE `hopdonglaodong`
  ADD CONSTRAINT `hopdonglaodong_ibfk_1` FOREIGN KEY (`idNhanVien`) REFERENCES `nhanvien` (`id`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`luong`) REFERENCES `luong` (`id`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`trinhDoHocVan`) REFERENCES `trinhdohocvan` (`id`),
  ADD CONSTRAINT `nhanvien_ibfk_3` FOREIGN KEY (`chucvu`) REFERENCES `chucvu` (`id`),
  ADD CONSTRAINT `nhanvien_ibfk_4` FOREIGN KEY (`donvi`) REFERENCES `donvi` (`id`),
  ADD CONSTRAINT `nhanvien_ibfk_5` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
