-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 06:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `inquires`
--

CREATE TABLE `inquires` (
  `inquiry_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `inquiry` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquires`
--

INSERT INTO `inquires` (`inquiry_id`, `name`, `email`, `inquiry`) VALUES
(1, 'Dilanka', 'supun@gmail.com', 'jksgfigsfugdgck'),
(2, 'Dilanka Wickramasinghe', 'dilankasupun333@gmail.com', 'bxgisdggduigudskuzsuyfgdkb'),
(3, 'Dilanka Wickramasinghe', 'dilankasupun333@gmail.com', 'sgfhvdhicsvhjdshckvds\r\n'),
(4, 'Dilanka Wickramasinghe', 'dilankasupun333@gmail.com', 'khjugsdgfuksgdlfvilsglc');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_image`, `product_name`, `price`, `quantity`) VALUES
(44, '../images_for dashbrd/stockimgpower-on.png', 'Power Button', 3000.00, 7600),
(45, '../images_for dashbrd/stockimgScreenshot 2024-08-24 171003.png', 'Valorant', 800.00, 5),
(46, '../images_for dashbrd/stockimgScreenshot 2024-08-24 171003.png', 'Valorant', 800.00, 5),
(47, '../images_for dashbrd/stockimgcute-girl-kitten-3840x2160-12421.jpg', 'Desktop', 50.00, 100),
(48, '../images_for dashbrd/stockimgcute-girl-kitten-3840x2160-12421.jpg', 'Desktop', 50.00, 150),
(49, '../images_for dashbrd/stockimgwholesale.png', 'WareHouse', 8000.00, 50);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_orders`
--

CREATE TABLE `purchase_orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `order_status` enum('pending','incomplete','complete') DEFAULT 'pending',
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_orders`
--

INSERT INTO `purchase_orders` (`order_id`, `product_id`, `product_name`, `quantity`, `order_status`, `order_date`) VALUES
(1, 1, 'Product A', 50, 'incomplete', '2024-09-18 09:18:37'),
(2, 4, 'Product 4', 10, 'complete', '2024-09-18 17:22:22'),
(3, 4, 'Product 4', 10, 'complete', '2024-09-18 17:22:51'),
(4, 5, 'Product 5', 10, 'complete', '2024-09-18 17:25:28'),
(21, 4, 'Product y', 8, 'complete', '2024-09-19 20:24:13'),
(38, 44, 'Power Button', 80, 'complete', '2024-09-20 09:12:57'),
(39, 44, 'Power Button', 800, 'complete', '2024-09-20 09:14:00'),
(40, 44, 'Power Button', 8000, 'complete', '2024-09-20 09:21:30'),
(41, 43, 'PowerButton', 56, 'incomplete', '2024-09-20 11:27:50'),
(42, 44, 'PowerButton', 100, 'complete', '2024-09-20 11:28:26'),
(43, 4, 'Product 4', 50, 'complete', '2024-09-20 12:54:13'),
(44, 4, 'Product 4', 34, 'complete', '2024-09-20 12:55:05'),
(45, 8, 'Power Button', 12, 'complete', '2024-09-20 12:57:06'),
(46, 8, 'Power Button', 12, 'complete', '2024-09-20 12:57:48'),
(47, 8, 'Power Button', 12, 'complete', '2024-09-20 12:58:37'),
(48, 8, 'Power Button', 12, 'complete', '2024-09-20 12:59:37'),
(49, 8, 'Power Button', 12, 'complete', '2024-09-20 13:00:18'),
(50, 44, 'Power Button', 100, 'complete', '2024-09-20 14:45:37'),
(51, 48, 'Desktop', 79, 'complete', '2024-09-20 15:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `revenue` decimal(10,2) NOT NULL,
  `sale_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `product_id`, `quantity`, `revenue`, `sale_date`) VALUES
(1, 44, 80, 40000.00, '2024-09-20 09:34:01'),
(2, 44, 80, 240000.00, '2024-09-20 10:09:20'),
(3, 44, 20, 60000.00, '2024-09-20 11:27:18'),
(4, 44, 100, 300000.00, '2024-09-20 11:46:52'),
(5, 48, 29, 1450.00, '2024-09-20 15:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `display_name` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`display_name`, `username`, `profile_image`, `is_admin`, `user_password`) VALUES
('Dilanka', 'admin111', 'me.jfif', 1, '111111'),
('Ashen', 'ashen456', 'usericon.png', 0, '456456'),
('Dilanka Supun', 'dil', 'usericon.png', 0, '1234'),
('jydxgvhjc', 'dilanka', 'usericon.png', 0, '1234'),
('Ashen Watte', 'dilankaodjjfsk', 'usericon.png', 0, '7789789'),
('Samantha Mami', 'ginsama', 'usericon.png', 0, '15'),
('seggsh', 'gsgdfgrh', 'usericon.png', 0, '1'),
('hashen', 'hashen123', 'usericon.png', 0, '789789'),
('nhch', 'hg', 'usericon.png', 0, '1'),
('Samantha Mami', 'sama', 'usericon.png', 0, '78'),
('Sasanjali Mam', 'sasa43', 'usericon.png', 0, '434343'),
('fszdfbnbg', 'uf', 'usericon.png', 0, 'wad'),
('Umaya', 'umaya123', 'usericon.png', 0, '1777777'),
('Dilanka Wickramasinghe', 'user123', 'usericon.png', 0, '123321'),
('Venuki', 'venuki', 'usericon.png', 0, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquires`
--
ALTER TABLE `inquires`
  ADD PRIMARY KEY (`inquiry_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquires`
--
ALTER TABLE `inquires`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `purchase_orders`
--
ALTER TABLE `purchase_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
