-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2020 at 07:40 AM
-- Server version: 8.0.22-0ubuntu0.20.04.2
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_bota`
--

-- --------------------------------------------------------

--
-- Table structure for table `bota_product`
--

CREATE TABLE `bota_product` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bota_product`
--

INSERT INTO `bota_product` (`id`, `title`, `description`, `img`, `price`, `user_id`) VALUES
(8, 'Sản phẩm 6', 'Mô tả sản phẩm 6', 'img1.jpeg', 400001, 1),
(10, 'Sản phẩm 7', 'Mô tả sản phẩm 7 ', 'img3.jpeg', 600000, 1),
(11, 'Sản phẩm 1 ', 'Mô tả sp 1 ', 'img1.jpeg', 111111, 2),
(12, 'Sản phẩm mới 1', 'mô tả sp mới 1 ', 'img3.jpeg', 500000, 3),
(13, 'Sản phẩm mới 2', 'Mô tả sản phẩm mới 2', 'img2.jpeg', 310000, 3),
(14, 'Sản phẩm mẫu 1', 'Mô tả sản phẩm mẫu 1', 'img1.jpeg', 150000, 1),
(15, 'Sản phẩm mẫu 1', 'Mô tả sản phẩm mẫu 1', 'img2.jpeg', 110000, 1),
(16, 'Sản phẩm mẫu 2', 'Mô tả sản phẩm mẫu 2', 'img3.jpeg', 190000, 2),
(17, 'Sản phẩm mẫu 3', 'Mô tả sản phẩm mẫu 3', 'img3.jpeg', 150000, 1),
(18, 'Sản phẩm mẫu 4', 'Mô tả sản phẩm mẫu 4', 'img4.jpg', 200000, 1),
(19, 'Sản phẩm mẫu 5', 'Mô tả sản phẩm mẫu 5', 'img4.jpg', 170000, 1),
(20, 'Sản phẩm mẫu 6', 'Mô tả sản phẩm mẫu 6', 'img3.jpeg', 180000, 1),
(21, 'Sản phẩm mẫu 7', 'Mô tả sản phẩm mẫu 7', 'img2.jpeg', 300000, 1),
(22, 'Sản phẩm mẫu 8', 'Mô tả sản phẩm mẫu 8', 'img1.jpeg', 400000, 1),
(23, 'Sản phẩm mẫu 9', 'Mô tả sản phẩm mẫu 9', 'img1.jpeg', 340000, 1),
(24, 'Sản phẩm mẫu 10', 'Mô tả sản phẩm mẫu 10', 'img2.jpeg', 150000, 1),
(25, 'Sản phẩm mẫu 11', 'Mô tả sản phẩm mẫu 11', 'img3.jpeg', 90000, 1),
(26, 'Sản phẩm mẫu 12', 'Mô tả sản phẩm mẫu 12', 'img4.jpg', 180000, 1),
(27, 'Sản phẩm mẫu 13', 'Mô tả sản phẩm mẫu 13', 'img1.jpeg', 230000, 1),
(28, 'Sản phẩm mẫu 14', 'Mô tả sản phẩm mẫu 14', 'img2.jpeg', 420000, 1),
(29, 'Sản phẩm mẫu 15', 'Mô tả sản phẩm mẫu 15', 'img3.jpeg', 540000, 1),
(30, 'Sản phẩm mẫu 16', 'Mô tả sản phẩm mẫu 16', 'img4.jpg', 520000, 1),
(31, 'Sản phẩm mẫu 17', 'Mô tả sản phẩm mẫu 17', 'img4.jpg', 540000, 1),
(32, 'Sản phẩm mẫu 18', 'Mô tả sản phẩm mẫu 1', 'img1.jpeg', 110000, 1),
(33, 'Sản phẩm mẫu 31', 'Mô tả sản phẩm mẫu 31', 'img2.jpeg', 650000, 2),
(34, 'Sản phẩm mẫu 3', 'Mô tả sản phẩm mẫu 3', 'img4.jpg', 150000, 1),
(35, 'Sản phẩm mẫu 19', 'Mô tả sản phẩm mẫu 19', 'img1.jpeg', 200000, 1),
(36, 'Sản phẩm mẫu 20', 'Mô tả sản phẩm mẫu 20', 'img3.jpeg', 1210000, 1),
(37, 'Sản phẩm mẫu 21', 'Mô tả sản phẩm mẫu 21', 'img2.jpeg', 630000, 1),
(38, 'Sản phẩm mẫu 22', 'Mô tả sản phẩm mẫu 22', 'img2.jpeg', 300000, 1),
(39, 'Sản phẩm mẫu 23', 'Mô tả sản phẩm mẫu 23', 'img4.jpg', 400000, 1),
(40, 'Sản phẩm mẫu 9', 'Mô tả sản phẩm mẫu 9', 'img4.jpg', 340000, 1),
(41, 'Sản phẩm mẫu 24', 'Mô tả sản phẩm mẫu 24', 'img1.jpeg', 150000, 1),
(65, 'Velit in ut consequa', 'Perspiciatis porro ', 'img1.jpeg', 87, 1),
(68, 'Perspiciatis culpa', 'Rerum sunt deserunt ', 'img2.jpeg', 2, 1),
(69, 'Quisquam sed ratione', 'Magnam officia aut a', 'img1.jpeg', 94, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Member',
  `password` varchar(50) NOT NULL,
  `function` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `role`, `password`, `function`) VALUES
(1, 'user1@gmail.com', 'Admin', 'adminadmin', NULL),
(2, 'user2@gmail.com', 'CTV', 'adminadmin', NULL),
(3, 'user3@gmail.com', 'CTV', 'adminadmin', NULL),
(4, 'user4@gmail.com', 'Member', 'adminadmin', NULL),
(5, 'user5@gmail.com', 'Member', 'adminadmin', NULL),
(6, 'user6@gmail.com', 'Member', 'a', NULL),
(7, 'user7@gmail.com', 'Member', 'adminadmin', NULL),
(8, 'user8@gmail.com', 'Member', 'adminadmin', NULL),
(15, 'user9@gmail.com', 'Member', 'adminadmin', NULL),
(16, 'user12@gmail.com', 'Member', 'adminadmin', NULL),
(11112234, '886565438818846', 'Member', '886565438818846', NULL),
(11112242, 'nguyenvando510@gmail.com', 'Member', 'nguyenvando510@gmail.com', 'google'),
(11112243, 'buihuong20101998@gmail.com', 'Member', 'buihuong20101998@gmail.com', 'google');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bota_product`
--
ALTER TABLE `bota_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bota_product`
--
ALTER TABLE `bota_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11112244;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bota_product`
--
ALTER TABLE `bota_product`
  ADD CONSTRAINT `bota_product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
