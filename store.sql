-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 08:03 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products` text NOT NULL,
  `total_cost` float(20,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `shipment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `products`, `total_cost`, `address`, `payment_status`, `shipment_status`) VALUES
(20, 1, 'a:1:{i:0;a:8:{s:10:\"product_id\";s:2:\"14\";s:5:\"color\";s:3:\"red\";s:4:\"size\";s:1:\"S\";s:8:\"quantity\";s:1:\"1\";s:4:\"name\";s:15:\"Mens Red Hoodie\";s:5:\"price\";s:7:\"1000.00\";s:5:\"image\";s:17:\"6467aab135886.jpg\";s:6:\"exists\";b:1;}}', 1000.00, '', 'Pending', 'Pending'),
(21, 8, 'a:1:{i:0;a:8:{s:10:\"product_id\";s:2:\"16\";s:5:\"color\";s:5:\"black\";s:4:\"size\";s:1:\"M\";s:8:\"quantity\";s:1:\"2\";s:4:\"name\";s:19:\"Womens Jogging Suit\";s:5:\"price\";s:6:\"500.00\";s:5:\"image\";s:17:\"6467ab80106f6.jpg\";s:6:\"exists\";b:1;}}', 1000.00, 'abc', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `categories` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `sizes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `colors` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `inventory` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `categories`, `sku`, `sizes`, `colors`, `inventory`, `description`, `image`, `added_on`) VALUES
(12, 'Crop T-Shirt and Pant', 1500.00, 'a:3:{i:0;s:5:\"women\";i:1;s:6:\"tshirt\";i:2;s:4:\"pant\";}', 'WTP1', 'a:5:{i:0;s:1:\"S\";i:1;s:1:\"M\";i:2;s:1:\"L\";i:3;s:2:\"XL\";i:4;s:3:\"XXL\";}', 'a:3:{i:0;s:5:\"white\";i:1;s:5:\"black\";i:2;s:6:\"silver\";}', 100, 'Show yourself a little love. Crafted from soft cotton, this roomy tee features a fun cropped design for added comfort and breezy style.', '6467a76c7ab59.jpg', '2023-05-19 16:44:28'),
(13, 'Womens Printed Leggings', 500.00, 'a:2:{i:0;s:5:\"women\";i:1;s:4:\"pant\";}', 'WHPL1', 'a:5:{i:0;s:1:\"S\";i:1;s:1:\"M\";i:2;s:1:\"L\";i:3;s:2:\"XL\";i:4;s:3:\"XXL\";}', 'a:3:{i:0;s:5:\"brown\";i:1;s:5:\"white\";i:2;s:5:\"black\";}', 90, 'Made to stretch and support, these high-waisted leggings sit higher on your hips for a fit that stays in place. Soft and smooth against your skin, the jersey cotton blend breathes so you can stay comfortable all day long.', '6467a7df01ac8.jpg', '2023-05-19 16:46:23'),
(14, 'Mens Red Hoodie', 1000.00, 'a:2:{i:0;s:3:\"men\";i:1;s:6:\"hoodie\";}', 'MRH12', 'a:5:{i:0;s:1:\"S\";i:1;s:1:\"M\";i:2;s:1:\"L\";i:3;s:2:\"XL\";i:4;s:3:\"XXL\";}', 'a:2:{i:0;s:3:\"red\";i:1;s:5:\"black\";}', 50, 'Show yourself a little love. Crafted from soft cotton, this roomy tee features a fun cropped design for added comfort and breezy style.', '6467aab135886.jpg', '2023-05-19 16:58:25'),
(15, 'Mens Jogging Suit', 500.00, 'a:2:{i:0;s:3:\"men\";i:1;s:4:\"suit\";}', 'MJS3', 'a:5:{i:0;s:1:\"S\";i:1;s:1:\"M\";i:2;s:1:\"L\";i:3;s:2:\"XL\";i:4;s:3:\"XXL\";}', 'a:3:{i:0;s:6:\"yellow\";i:1;s:5:\"black\";i:2;s:4:\"blue\";}', 100, 'Show yourself a little love. Crafted from soft cotton, this roomy tee features a fun cropped design for added comfort and breezy style.', '6467ab1fb8a10.jpg', '2023-05-19 17:00:15'),
(16, 'Womens Jogging Suit', 500.00, 'a:2:{i:0;s:5:\"women\";i:1;s:4:\"suit\";}', 'WJS332', 'a:5:{i:0;s:1:\"S\";i:1;s:1:\"M\";i:2;s:1:\"L\";i:3;s:2:\"XL\";i:4;s:3:\"XXL\";}', 'a:2:{i:0;s:6:\"silver\";i:1;s:5:\"black\";}', 50, 'Show yourself a little love. Crafted from soft cotton, this roomy tee features a fun cropped design for added comfort and breezy style.', '6467ab80106f6.jpg', '2023-05-19 17:01:52'),
(17, 'Mens Nike T-shirt', 1000.00, 'a:2:{i:0;s:3:\"men\";i:1;s:6:\"tshirt\";}', 'MNT42', 'a:5:{i:0;s:1:\"S\";i:1;s:1:\"M\";i:2;s:1:\"L\";i:3;s:2:\"XL\";i:4;s:3:\"XXL\";}', 'a:3:{i:0;s:6:\"orange\";i:1;s:5:\"black\";i:2;s:4:\"blue\";}', 200, 'Show yourself a little love. Crafted from soft cotton, this roomy tee features a fun cropped design for added comfort and breezy style.', '6467abb8b9f13.jpg', '2023-05-19 17:02:48'),
(18, 'Mens Gym Suit', 600.00, 'a:2:{i:0;s:3:\"men\";i:1;s:4:\"suit\";}', 'MGS12', 'a:5:{i:0;s:1:\"S\";i:1;s:1:\"M\";i:2;s:1:\"L\";i:3;s:2:\"XL\";i:4;s:3:\"XXL\";}', 'a:3:{i:0;s:6:\"yellow\";i:1;s:6:\"orange\";i:2;s:5:\"black\";}', 90, 'Show yourself a little love. Crafted from soft cotton, this roomy tee features a fun cropped design for added comfort and breezy style.', '6467abe9632e6.jpg', '2023-05-19 17:03:37'),
(19, 'Men Premium Jersey', 900.00, 'a:2:{i:0;s:3:\"men\";i:1;s:6:\"jersey\";}', 'MPS675', 'a:5:{i:0;s:1:\"S\";i:1;s:1:\"M\";i:2;s:1:\"L\";i:3;s:2:\"XL\";i:4;s:3:\"XXL\";}', 'a:3:{i:0;s:5:\"black\";i:1;s:4:\"blue\";i:2;s:3:\"red\";}', 50, 'Show yourself a little love. Crafted from soft cotton, this roomy tee features a fun cropped design for added comfort and breezy style.', '6467ac7bd860f.jpg', '2023-05-19 17:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `address`, `role`) VALUES
(1, 'a', 'sajid@gmail.com', 'b', '', 'user'),
(6, 'admin', 'admin@gmail.com', 'admin', '', 'admin'),
(7, 'salim', 's@b', 'sakim', '', 'user'),
(8, 'x', 'y@gmail.com', 'z', 'abc', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
