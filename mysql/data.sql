-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2021 lúc 05:05 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `idgh` int(10) NOT NULL,
  `username` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` int(10) NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluongsp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`idgh`, `username`, `name`, `sdt`, `id`, `diachi`, `trangthai`, `soluongsp`) VALUES
(36, 'user', 'Bùi Văn Linh', '0396032326', 1, 'Cấn Hữu - Quốc Oai - Hà Nội', 'Chờ duyệt', 1),
(37, 'user', 'Bùi Văn Linh', '0396032326', 20, 'Cấn Hữu - Quốc Oai - Hà Nội', 'Chờ duyệt', 5),
(38, 'user', 'Bùi Văn Linh', '0396032326', 1, 'Cấn Hữu - Quốc Oai - Hà Nội', 'Chờ duyệt', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luudonhang`
--

CREATE TABLE `luudonhang` (
  `idsp` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luuthongtindh`
--

CREATE TABLE `luuthongtindh` (
  `id` int(11) NOT NULL,
  `username` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluongsp` int(11) NOT NULL,
  `gia` decimal(10,0) NOT NULL,
  `datetime` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luuthongtindh`
--

INSERT INTO `luuthongtindh` (`id`, `username`, `name`, `soluongsp`, `gia`, `datetime`) VALUES
(4, 'user', 'Google Pixel 5 5G Mới 100% Nobox - Quốc tế (mỹ)', 1, '17790000', '2021-05-30 14:23:02'),
(5, 'user', 'ROG Phone 3 (12GB /512GB) Mới 100% Fullbox - Snapdragon 865 Plus', 1, '28490000', '2021-06-21 16:27:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `members`
--

CREATE TABLE `members` (
  `sdt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(65) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `members`
--

INSERT INTO `members` (`sdt`, `email`, `name`, `username`, `password`) VALUES
('0968516842', '', 'Quang Trường', 'admin', '0968516842'),
('0396032326', 'maxphe0235@gmail.com', 'Bùi Văn Linh', 'user', '0968516842');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `loai` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dungluong` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` blob NOT NULL,
  `domoi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` decimal(10,0) NOT NULL,
  `mieuta` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `loai`, `name`, `dungluong`, `img`, `domoi`, `gia`, `mieuta`, `soluong`) VALUES
(1, 'iphone', 'iPhone 12 Pro Max 128GB Chính Hãng Mới Fullbox - Chưa active', '128GB', 0x6970686f6e6531322e706e67, 'Mới 100%', '26690000', 'iPhone 12 ra mắt với vai trò mở ra một kỷ nguyên hoàn toàn mới. Tốc độ mạng 5G siêu tốc, bộ vi xử lý A14 Bionic nhanh nhất thế giới smartphone, màn hình OLED tràn cạnh tuyệt đẹp và camera siêu chụp đêm, tất cả đều có mặt trên iPhone 12', 35),
(2, 'iphone', 'iPhone 12 Pro Max 256GB Chính Hãng Mới Fullbox - Chưa active', '256GB', 0x6970686f6e6531322e706e67, 'Mới 100%', '28690000', 'Trùm cuối của dòng iPhone 12 đã xuất hiện. iPhone 12 Pro Max là chiếc iPhone có màn hình lớn nhất từ trước đến nay, mang trên mình bộ vi xử lý mạnh nhất, camera đẳng cấp pro cùng kết nối 5G siêu tốc, cho bạn những trải nghiệm tuyệt vời chưa từng có.', 10),
(5, 'mobile', 'Galaxy S10 Plus (8GB|128GB) Mới 100% Fullbox - Hàn Quốc', '8GB|128GB', 0x67616c6178792e6a7067, 'Mới 100%', '8490000', 'Samsung Galaxy S10 Plus (8GB|128GB) tại Mobile World là máy mới 100% Fullbox. Sản phẩm này được Mobile World nhập khẩu chính hãng Samsung đây là phiên bản sử dụng 1 SIM với RAM 8GB cùng bộ nhớ trong 128GB. Máy được trang bị con chip Exynos 9820 của Samsung. Mali-G76 MP12 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ, trải qua các quy trình kiểm tra nghiêm ngặt, kỹ lưỡng, đảm bảo sự ổn định trước khi đến tay khách hàng.', 20),
(9, 'mobile', 'Google Pixel 4a 5G Mới 100% Nobox - Quốc tế ( mỹ )', '128GB', 0x676f6f676c65322e6a706567, 'Mới 100%', '12990000', 'Pixel 4a 5G này tại Mobile World là máy mới 100% Nobox. Sản phẩm này được Mobile World nhập khẩu chính hãng Google với RAM 6GB cùng bộ nhớ trong 128GB. Máy được trang bị con chip Snapdragon 765 của Qualcomm. GPU Adreno 620 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 8),
(12, 'mobile', 'Xiaomi Mi 10 Ultra (16GB | 512GB) 5G Mới 100% Fullbox', '16GB|512GB', 0x7869616f6d692e6a7067, 'Mới 100%', '26990000', 'Xiaomi Mi 10 Ultra 5G này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Xiaomi đây là phiên bản sử dụng 2 SIM với RAM 16GB cùng bộ nhớ trong 512GB. Máy được trang bị con chip Snapdragon 865 của Qualcomm. GPU Adreno 650 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 30),
(13, 'mobile', 'Xiaomi Mi 10 Ultra (12GB | 256GB) 5G Mới 100% Fullbox', '16GB|256GB', 0x7869616f6d692e6a7067, 'Mới 100%', '20990000', 'Xiaomi Mi 10 Ultra 5G này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Xiaomi đây là phiên bản sử dụng 2 SIM với RAM 12GB cùng bộ nhớ trong 256GB. Máy được trang bị con chip Snapdragon 865 của Qualcomm. GPU Adreno 650 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 50),
(15, 'mobile', 'Xiaomi Mi 10 Ultra (8GB | 256GB) 5G Mới 100% Fullbox', '8GB|256GB', 0x7869616f6d69312e6a7067, 'Mới 100%', '18990000', 'Xiaomi Mi 10 Ultra 5G này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Xiaomi đây là phiên bản sử dụng 2 SIM với RAM 8GB cùng bộ nhớ trong 256GB. Máy được trang bị con chip Snapdragon 865 của Qualcomm. GPU Adreno 650 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 10),
(16, 'mobile', 'Redmi K40 Pro 5G (8GB | 256GB) Mới Fullbox', '8GB|256GB', 0x7265646d692e6a7067, 'Mới 100%', '13490000', 'Redmi K40 Pro này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Xiaomi đây là phiên bản với RAM 8GB cùng bộ nhớ trong 256GB. Máy được trang bị con chip Snapdragon 888 của Qualcomm. GPU Adreno 660 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 9),
(17, 'mobile', 'Galaxy Note 10 Plus 256GB Mới 100% Fullbox - Mỹ ( Chip Snapdragon 855 )', '256GB', 0x67616c61787931302e6a7067, 'Mới 100%', '10990000', 'Samsung Galaxy Note 10 Plus này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Samsung thị trường Mỹ đây là phiên bản sử dụng 1 sim với ram 12GB cùng bộ nhớ trong 256GB. Máy được trang bị con chip Snapdragon 855 của Qualcomm. GPU Adreno 640 giúp xử mọi đồ họa nặng một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 10),
(19, 'iphone', 'iPhone 11 Pro Max 256GB Mới 100% fullbox chính hãng LL/A ( Active online )', '256GB', 0x6970686f6e31312e706e67, 'Mới 100%', '24990000', 'Sản phẩm iPhone 11 Pro Max tại Mobile World là máy mới 100% Fullbox. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple dung lượng bộ nhớ trong 256GB. Máy được trang bị con chip A13 Bionic của Apple. Apple GPU giúp xử mọi đồ họa nặng một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ, trải qua các quy trình kiểm tra nghiêm ngặt, kỹ lưỡng, đảm bảo sự ổn định trước khi đến tay khách hàng.', 27),
(20, 'iphone', 'iPhone 11 Pro Max - 64GB - Mới chính hãng (Chưa Active)', '64GB', 0x6970686f6e6531312d79656c6c6f772e706e67, 'Mới 100%', '21990000', 'Sản phẩm iPhone 11 Pro Max tại Mobile World là máy mới 100% chưa kích hoạt. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple dung lượng bộ nhớ trong 64GB. Máy được trang bị con chip A13 Bionic của Apple. Apple GPU giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ sản phẩm.', 8),
(21, 'iphone', 'iPhone 11 Pro Max - 64GB - Mới chính hãng (Chưa Active)', '64GB', 0x6970686f6e6531312d7472616e672e706e67, 'Mới 100%', '24490000', 'Sản phẩm iPhone 11 Pro Max tại Mobile World là máy mới 100% chưa kích hoạt. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple dung lượng bộ nhớ trong 64GB. Máy được trang bị con chip A13 Bionic của Apple. Apple GPU giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ sản phẩm.', 29),
(22, 'iphone', 'iPhone 11 Pro Max Quốc tế 256GB ( LL/A ) máy 97%', '64GB', 0x6970686f6e6531312d64656e2e706e67, 'Mới 97%', '20490000', 'Sản phẩm iPhone 11 Pro Max tại Mobile World là máy mới 97% chưa qua sửa chữa. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple đây là phiên bản Quốc Tế dung lượng bộ nhớ trong 256GB. Máy được trang bị con chip A13 Bionic của Apple. Apple GPU giúp xử mọi đồ họa nặng một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ, trải qua các quy trình kiểm tra nghiêm ngặt, kỹ lưỡng, đảm bảo sự ổn định trước khi đến tay khách hàng.', 20),
(23, 'mobile', 'ROG Phone 3 (12GB /512GB) Mới 100% Fullbox - Snapdragon 865 Plus', '12GB|512GB', 0x726f672e6a7067, 'Mới 100%', '28490000', 'Sản phẩm ROG Phone 3 tại Mobile World là máy mới 100% Fullbox. Sản phẩm được Mobile World nhập khẩu chính hãng ASUS đây là phiên bản dung lượng RAM 12GB bộ nhớ trong 512GB. Máy được trang bị con chip Snapdragon 865 Plus của Qualcomm. Adreno 650 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ sản phẩm.', 18),
(26, 'tablet', 'Apple iPad 10.2 ( GEN 8 ) - (2020) LTE 128GB Mới 100% Fullbox', '128GB', 0x7461626c6574312e706e67, 'Mới 100%', '12990000', 'iPad 10.2 (2020) LTE này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple đây là phiên bản 4G (LTE) sử dụng 1 SIM với RAM 3GB cùng bộ nhớ trong 128GB. Máy được trang bị con chip A12 Bionic của Apple. GPU Apple GPU giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 26),
(27, 'tablet', 'iPad Air 4 (2020) Wifi 256GB Mới 100% Fullbox', '256GB', 0x7461626c6574322e706e67, 'Mới 100%', '4490000', 'iPad Air (2020) Wifi này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple đây là phiên bản bộ nhớ trong 256GB. Máy được trang bị con chip A14 Bionic của Apple. GPU Apple GPU giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 10),
(28, 'tablet', 'IPad Air 3 (2019) 4G(LTE) 64Gb mới chưa Active - Nobox', '64GB', 0x7461626c6574332e706e67, 'Mới 100%', '12990000', 'IPad Air 3 tại Mobile World là máy mới 100% chưa active. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple đây là phiên bản sử dụng 1 sim với ram 3Gb cùng bộ nhớ trong 64Gb. Máy được trang bị con chip A12 Bionic của Apple. Apple GPU giúp xử mọi đồ họa nặng một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 30),
(29, 'tablet', 'Sony Z Ultra Quốc Tế - Mới Nobox', '2GB', 0x7461626c6574342e706e67, 'Mới 100%', '1790000', 'Sony Z Ultra này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Sony đây là phiên bản sử dụng 1 sim với ram 2Gb cùng bộ nhớ trong 16Gb. Máy được trang bị con chip Snapdragon 800 của Qualcomm. Adreno 330 giúp xử đồ họa cực tốt. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ, trải qua các quy trình kiểm tra nghiêm ngặt, kỹ lưỡng, đảm bảo sự ổn định trước khi đến tay khách hàng.', 8),
(30, 'tablet', 'Xiaomi Mi Pad 4 LTE mới 100% Fullbox', '64GB', 0x7461626c6574352e706e67, 'Mới 100%', '4990000', 'Xiaomi Mi Pad 4 tại Mobile World là máy mới 100% Fullbox đầy đủ phụ kiện. Sản phẩm này được Mobile World nhập khẩu chính hãng Xiaomi là phiên bản sử dụng được dữ liệu mạng, ram 4Gb cùng bộ nhớ trong 64Gb. Máy được trang bị con chip Snapdragon 660 tầm trung của Qualcomm. GPU Adreno 512 giúp xử mọi đồ họa một cách mượt mà. Khi mua máy sẽ được kỹ thuật viên Mobile World hỗ trợ cài CH Play và cài đặt rom tiếng việt miễn phí sau 15 ngày kích hoạt máy.', 9),
(35, 'tainghe', 'Apple AirPods 2 (Sạc không dây) Mới Fullbox 100%', '', 0x7461696e676865306461792e6a7067, 'Mới 100%', '4190000', 'Apple AirPods 2 (Sạc không dây) này tại Mobile World là sản phẩm mới 100% Fullbox. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple sử dụng sạc dây Lightning và sạc không dây. Sản phẩm được trang bị con chip Apple H1 với nhiều cải tiến. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ sản phẩm.', 12),
(38, 'tainghe', 'Apple AirPods 2 (Sạc không dây) Mới Fullbox 100%', '', 0x7461696e676865312e6a7067, 'Mới 100%', '3990000', 'Apple AirPods 2 (Sạc thường) này tại Mobile World là sản phẩm mới 100% Fullbox. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple sử dụng sạc dây Lightning. Sản phẩm được trang bị con chip Apple H1 với nhiều cải tiến. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ sản phẩm.', 27),
(39, 'tainghe', 'Apple AirPods Pro Mới Fullbox 100%', '', 0x7461696e676865322e6a7067, 'Mới 100%', '5490000', 'Apple AirPods Pro này tại Mobile World là sản phẩm mới 100% Fullbox. Sản phẩm này được Mobile World nhập khẩu chính hãng Apple có Sạc Không Dây. Sản phẩm được trang bị con chip Apple H1 với nhiều cải tiến. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ sản phẩm.', 16),
(40, 'tainghe', 'Cáp Type C Zin Chính Hãng', '', 0x6361702e6a7067, 'Mới 100%', '100000', '', 19),
(41, 'daysac', 'Cáp Type-c to Type-c Samsung Note 10', '', 0x636170312e6a7067, 'Mới 100%', '200000', '', 5),
(42, 'daysac', 'Combo Sạc Cáp Type C Chính Hãng Samsung', '', 0x63757361632e6a7067, 'Mới 100%', '250000', '', 8),
(43, 'daysac', 'Củ sạc nhanh Samsung Galaxy Note10 25W', '', 0x6375736163312e6a7067, 'Mới 100%', '350000', '', 3),
(44, 'sacduphong', 'Pin Dự Phòng Chính Hãng Xiaomi 10.000 mAH', '', 0x736163647570686f6e672e6a7067, 'Mới 100%', '400000', '', 8),
(45, 'sacduphong', 'Tai Nghe Zin Sony EX300', '', 0x7461696e676865332e6a7067, 'Mới 100%', '200000', '', 9),
(46, 'tainghe', 'Tai Nghe Zin Theo Máy MH750', '', 0x7461696e676865342e6a7067, 'Mới 100%', '150000', '', 13),
(47, 'mobile', 'Galaxy Note 20 Ultra 5G Mới 100% Fullbox 128GB - 2 SIM Bản mỹ - ( Chip Snapdragon 865+)', '12GB|128GB', 0x6e6f7432302e6a7067, 'Mới 100%', '17990000', 'Samsung Galaxy Note 20 Ultra 5G này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Samsung thị trường Mỹ đây là phiên bản sử dụng 1 SIM với RAM 12GB cùng bộ nhớ trong 128GB. Máy được trang bị con chip Snapdragon 865 Plus của Qualcomm. GPU Adreno 650 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 16),
(62, 'mobile', 'Galaxy Note 20 256GB Mới 100% Fullbox - Chính hãng Việt Nam', '8GB|256GB', 0x6e6f646532302e6a7067, 'Mới 100%', '19990000', 'Samsung Galaxy Note 20 này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Samsung thị trường Việt Nam đây là phiên bản sử dụng 2 SIM với RAM 8GB cùng bộ nhớ trong 256GB. Máy được trang bị con chip Exynos 990 của Samsung. GPU Mali-G77 MP11 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 19),
(63, 'mobile', 'Galaxy Note 20 5G 128GB Mới 99% Like new - Mỹ ( Chip snapdragon 865+)', '8GB|128GB', 0x6e6f64653230312e6a7067, 'Mới 100%', '12990000', 'Samsung Galaxy Note 20 5G này tại Mobile World là máy mới 99%, nguyên bản chưa qua sửa chữa. Sản phẩm này được Mobile World nhập khẩu chính hãng Samsung thị trường Mỹ đây là phiên bản sử dụng 1 SIM với RAM 8GB cùng bộ nhớ trong 128GB. Máy được trang bị con chip Snapdragon 865 Plus của Qualcomm. GPU Adreno 650 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ, trải qua các quy trình kiểm tra nghiêm ngặt, kỹ lưỡng, đảm bảo sự ổn định trước khi đến tay khách hàng.', 8),
(64, 'mobile', 'Galaxy S20 Ultra 5G (12GB | 256GB) Mới 99% Like new - Hàn Quốc', '12GB|256GB', 0x7332302e6a7067, 'Mới 100%', '18390000', 'Samsung Galaxy S20 Ultra 5G này tại Mobile World là máy mới 100%. Sản phẩm này được Mobile World nhập khẩu chính hãng Samsung thị trường Hàn Quốc đây là phiên bản sử dụng 1 sim với ram 12GB cùng bộ nhớ trong 256GB. Máy được trang bị con chip Snapdragon 865 của Qualcomm. GPU Adreno 650 giúp xử mọi đồ họa một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất xứ.', 5),
(66, 'mobile', 'Galaxy S20 Plus (8GB | 128GB) Like new 99% Fullbox - Chính Hãng Việt Nam', '8GB|256GB', 0x733230312e706e67, 'Mới 99%', '11990000', 'Samsung Galaxy S20 Plus này tại Mobile World là máy mới 99% like new fullbox. Sản phẩm này được Mobile World nhập chính hãng Samsung thị trường Việt Nam đây là phiên bản sử dụng 2 sim với ram 8Gb cùng bộ nhớ trong 128Gb. Máy được trang bị con chip Exynos 990 của Samsung. GPU Mali-G77 MP11 giúp xử mọi đồ họa nặng một cách mượt mà. Sản phẩm được Mobile World cam kết 100% về nguồn gốc xuất sứ.', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `idsl` int(11) NOT NULL,
  `anh` blob NOT NULL,
  `tieude` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`idsl`, `anh`, `tieude`) VALUES
(1, 0x616e68312e6a7067, 'iphone 12'),
(2, 0x616e68322e6a7067, 'galaxy note 20'),
(3, 0x616e68332e6a7067, 'galaxy s20'),
(4, 0x616e68342e6a7067, 'iphone 11');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`idgh`),
  ADD KEY `fk_username` (`username`),
  ADD KEY `fk_id` (`id`);

--
-- Chỉ mục cho bảng `luudonhang`
--
ALTER TABLE `luudonhang`
  ADD PRIMARY KEY (`idsp`),
  ADD KEY `id` (`id`);

--
-- Chỉ mục cho bảng `luuthongtindh`
--
ALTER TABLE `luuthongtindh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`username`);

--
-- Chỉ mục cho bảng `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`idsl`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `idgh` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `luudonhang`
--
ALTER TABLE `luudonhang`
  MODIFY `idsp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `luuthongtindh`
--
ALTER TABLE `luuthongtindh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `idsl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_id` FOREIGN KEY (`id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `members` (`username`);

--
-- Các ràng buộc cho bảng `luudonhang`
--
ALTER TABLE `luudonhang`
  ADD CONSTRAINT `luudonhang_ibfk_1` FOREIGN KEY (`id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `luuthongtindh`
--
ALTER TABLE `luuthongtindh`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`username`) REFERENCES `members` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
