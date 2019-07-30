-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 30, 2019 lúc 02:05 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`username`, `password`, `name`) VALUES
('admin', 'admin', ''),
('tien', '12345', 'Tran Tien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `id` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `cus_id` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `total` float NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_bill_detail`
--

CREATE TABLE `tbl_bill_detail` (
  `bill_id` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `product_id` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `quantity` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brands`
--

INSERT INTO `tbl_brands` (`id`, `name`) VALUES
('B01', 'Apple'),
('B08', 'Asus'),
('B07', 'Dell'),
('B04', 'Huawei'),
('B06', 'Nokia'),
('B03', 'Oppo'),
('B02', 'Samsung'),
('B05', 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`) VALUES
('C01', 'Laptop'),
('C02', 'Smartphone'),
('C03', 'Smartwatch'),
('C04', 'Tablet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `username` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`username`, `password`, `name`, `email`, `phone`, `address`) VALUES
('tien', '12345', 'Tran Van Tien', 'tvtien2k@gmail.com', '19001009', 'Tuyen Quang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL,
  `category_id` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `brand_id` varchar(50) COLLATE utf8_vietnamese_ci NOT NULL,
  `price` float NOT NULL,
  `des` text COLLATE utf8_vietnamese_ci NOT NULL,
  `img` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `category_id`, `brand_id`, `price`, `des`, `img`, `time`) VALUES
('P001', 'Apple MacBook Pro MD313LL/A', 'C01', 'B01', 574, 'This is an Apple MacBook Pro 13\" MD313LL/A Laptop computer, featuring Intel i5-2435M 2.40GHz processor, Webcam, 16GB RAM, and a 500GB HDD. This machine is fully refurbished and will offer you years of computing, backed by our 90 Day Warranty!\r\n\r\n', 'https://images-na.ssl-images-amazon.com/images/I/71Tsx-mAl8L._SL1500_.jpg', '2019-07-27 14:04:27'),
('P002', 'Apple MacBook Pro Md313ll/a ', 'C01', 'B01', 498.95, 'The design is not the only thing that makes the MacBook Pro a MacBook Pro. Fastest mobile processors and up to a 60 percent boost in graphics performance endow you with incredible power to do more than ever. Faster than ever. The MacBook Pro is also loaded with powerful new features, such as blazing fast Thunderbolt I/O technology, FaceTime HD camera, Multi-Touch trackpad, 802.11n wireless technology, long lasting battery and more, making a great notebook even greater. The 13-inch MacBook Pro model features 2.4GHz Intel Core i5 â€” the fastest mobile dual-core processor. With Turbo Boost speeds up to 3.1GHz, these processors bring more power to everything you do.\r\n\r\n', 'https://images-na.ssl-images-amazon.com/images/I/61U7qsKh9SL._SL1500_.jpg', '2019-07-27 14:07:12'),
('P003', 'Apple MacBook Pro - Space Gray', 'C01', 'B01', 2149.96, 'MacBook Pro has a new eighth-generation quad-core Intel processor with Turbo Boost up to 4.1GHz. A brilliant and colorful Retina display with True Tone technology for a more true-to-life viewing experience. The latest Apple- designed keyboard. And the versatile Touch Bar for more ways to be productive. Itâ€™s Appleâ€™s most powerful 13-inch notebook. Pushed even further.', 'https://images-na.ssl-images-amazon.com/images/I/41Vfu8xPzpL.jpg', '2019-07-27 14:16:00'),
('P004', 'Apple MacBook Pro MLH12LL/A', 'C01', 'B01', 1249.99, 'The MacBook Pro \"Core i5\" 2.9 13-Inch (Late 2016 Retina Display, Touch Bar, Four Thunderbolt 3 Ports) features a 14 nm, 6th Generation \"Skylake\" 2.9 GHz Intel \"Core i5\" processor (6267U), with dual independent processor \"cores\" on a single silicon chip, a 4 MB shared level 3 cache, 8 GB of onboard 2133 MHz LPDDR3 SDRAM, 512 GB of PCIe-based flash storage, and an integrated Intel Iris Graphics 550 graphics processor that shares memory with the system. This notebook also has an integrated 720p FaceTime HD webcam, a thin, backlit \"second generation\" butterfly mechanism keyboard with an integrated new \"Touch Bar\" that replaces the traditional function keys with a touch-sensitive control that adapts for different applications and provides Touch ID login support, and a gigantic \"Force Touch\" trackpad. Additionally, it has a high-resolution LED-backlit 13.3\" widescreen 2560x1600 (227 ppi, 500 nits) \"Retina\" display, and a integrated battery that provides an Apple estimated 10 hours of runtime. This notebook is offered in either silver colored aluminum or a darker \"Silver\" colored aluminum housing (but not other colors) and weighs just a bit more than 3 pounds (1.37 kg). Connectivity includes 802.11ac Wi-Fi, Bluetooth 4.2, four \"Thunderbolt 3\" ports (USB-C connector), and a 3.5 mm headphone jack.\r\n\r\n', 'https://images-na.ssl-images-amazon.com/images/I/716-Qjp-i4L._SL1024_.jpg', '2019-07-27 14:23:27'),
('P005', 'Dell Inspiron 15 5000 Laptop Computer 2019', 'C01', 'B07', 499.99, '15.6 inch FHD Touchscreen Notebook, Intel Core i3-8130U 2.2Ghz, 8GB DDR4 RAM, 128GB SSD + 1TB HDD, DVD-RW, Backlit Keyboard, Wi-Fi, Webcam, Windows 10', 'https://images-na.ssl-images-amazon.com/images/I/71mJ6JTLWbL._SL1200_.jpg', '2019-07-27 14:45:32'),
('P006', 'Dell Inspiron 15 5000 Laptop Computer 2019', 'C01', 'B07', 519.99, '15.6 inch FHD Touchscreen Notebook, Intel Core i3-8130U 2.2Ghz, 12GB DDR4 RAM, 128GB SSD + 1TB HDD, DVD-RW, Backlit Keyboard, Wi-Fi, Webcam, Windows 10', 'https://images-na.ssl-images-amazon.com/images/I/71ZshKnn-vL._SL1200_.jpg', '2019-07-27 14:48:03'),
('P007', 'Premium New 2019 Dell Inspiron 17 7000', 'C01', 'B07', 659, 'This listing has upgraded configurations. If the computer has modifications (listed above), then the manufacturer box is opened for it to be tested and inspected and to install the upgrades to achieve the specifications as advertised. If no modifications are listed, the item is unopened and untested. Defects & blemishes are significantly reduced by our in depth inspection & testing.', 'https://images-na.ssl-images-amazon.com/images/I/51W8w5jidxL._SL1000_.jpg', '2019-07-27 14:52:53'),
('P008', 'ASUS ROG Strix Scar Edition GL703GE Gaming Laptop', 'C01', 'B08', 899.99, 'The new ROG Strix Scar Edition is built for the next generation of gamers looking to take their game to the next level thanks to up to an 8th-gen Intel Core i7 processor, GTX graphics, and a high refresh rate gaming display. The 8th-Generation Scar Edition brings several refinements to the series, including an AURA SYNC RGB keyboard and 12V fans with anti-dust cooling for improved thermal performance.', 'https://images-na.ssl-images-amazon.com/images/I/91diXhk3zGL._SL1500_.jpg', '2019-07-27 14:55:49'),
('P009', '2019 ASUS VivoBook F510QA', 'C01', 'B08', 588.92, '15.6â€ WideView FHD Laptop Computer, AMD Quad-Core A12-9720P up to 3.6GHz, 16GB DDR4 RAM, 256GB SSD + 1TB HDD , USB 3.0, 802.11ac WiFi, HDMI, Windows 10', 'https://images-na.ssl-images-amazon.com/images/I/81aneLOFx8L._SL1500_.jpg', '2019-07-27 14:57:30'),
('P010', 'Asus Premium VivoBook ', 'C01', 'B08', 249, '11.6-inch Touchscreen HD 2-in-1 Robust 360Â° Hinge Laptop PC, Intel Celeron N3350 up to 2.4GHz, 4GB RAM, 500GB HDD, Fingerprint Reader, Windows 10 (Renewed)', 'https://images-na.ssl-images-amazon.com/images/I/71YmexOFmBL._SL1500_.jpg', '2019-07-27 14:59:10'),
('P011', 'Apple iPhone X', 'C02', 'B01', 664.99, 'iPhone X features an all-screen design with a 5.8-inch Super Retina HD display with HDR and True Tone. Designed with the most durable glass ever in a smartphone and a surgical grade stainless steel band. Charges wirelessly. Resists water and dust. 12MP dual cameras with dual optical image stabilization for great low-light photos. True Depth camera with Portrait selfies and new Portrait Lighting. Face ID lets you unlock and use Apple Pay with just a glance. Powered by A11 Bionic, the most powerful and smartest chip ever in a smartphone. Supports augmented reality experiences in games and apps. With iPhone X, the next era of iPhone has begun.\r\n\r\n', 'https://images-na.ssl-images-amazon.com/images/I/71yMgOenT5L._SL1500_.jpg', '2019-07-27 15:03:42'),
('P012', 'Apple iPhone 8', 'C02', 'B01', 414.99, 'iPhone 8 introduces an allâ€‘new glass design. The worldâ€™s most popular camera, now even better. The most powerful and smartest chip ever in a smartphone. Wireless charging thatâ€™s truly effortless. And augmented reality experiences never before possible. iPhone 8. A new generation of iPhone. Augmented Reality: A11 Bionic powers extraordinary augmented reality apps and games that will change the way you see the world. Appleâ€‘Designed GPU: The new Appleâ€‘designed threeâ€‘core GPU is up to 30% faster than A10 Fusion. Faster CPU: Introducing A11 Bionic. With four efficiency cores that are up to 70 percent faster than A10 Fusion. And two performance cores that are up to 25% faster.\r\n\r\n', 'https://images-na.ssl-images-amazon.com/images/I/51OAgkyXX2L._SL1073_.jpg', '2019-07-27 15:10:59'),
('P013', 'Original Oppo K3', 'C02', 'B03', 348.88, 'Mobile Phone 4G LTE Android 9 Snapdragon 710 Octa Core 6.5\" AMOLED VOOC 3.0 Screen Fingerprint Support Google-by (CTM Global Store) (Purple 6G+64G)', 'https://images-na.ssl-images-amazon.com/images/I/41BYKz-YUXL.jpg', '2019-07-27 15:15:23'),
('P014', 'Oppo AX5s', 'C02', 'B03', 149.99, 'Wider your view The vibrant display features a striking 6.2-inch Corning Gorilla Glass screen, enabling you to view more of what you love in a truly immersive experience.', 'https://images-na.ssl-images-amazon.com/images/I/51eexQLg16L._SL1000_.jpg', '2019-07-27 15:13:26'),
('P015', 'Original Oppo Reno', 'C02', 'B03', 626, 'Original Oppo Reno 6GB+128GB Mobile Phone Snapdragon 710 Octa Core 48MP Camera Phone VOOC 3.0 Screen Fingerprint Cellphone Support Google by-ï¼ˆReal Star Technologyï¼‰(Green)', 'https://images-na.ssl-images-amazon.com/images/I/41Fzv9%2B29SL.jpg', '2019-07-27 15:18:36');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Chỉ mục cho bảng `tbl_bill_detail`
--
ALTER TABLE `tbl_bill_detail`
  ADD PRIMARY KEY (`bill_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`brand_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD CONSTRAINT `tbl_bill_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `tbl_customer` (`username`);

--
-- Các ràng buộc cho bảng `tbl_bill_detail`
--
ALTER TABLE `tbl_bill_detail`
  ADD CONSTRAINT `tbl_bill_detail_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `tbl_bill` (`id`),
  ADD CONSTRAINT `tbl_bill_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id`);

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`id`),
  ADD CONSTRAINT `tbl_products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
