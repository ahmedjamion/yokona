-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 07:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `first_name`, `last_name`, `gender`, `address`, `contact_number`, `profile_picture`) VALUES
(66, 'Albert', 'Einstein', 'Male', 'Sta. Maria', '1234', NULL),
(67, 'Nikola', 'Tesla', 'Male', 'Putik', '4433', NULL),
(68, 'Mike', 'Tyson', 'Male', 'Talo-talon', '5432', NULL),
(70, 'Andrew', 'Tate', 'Male', 'Pasonanca', '2233', NULL),
(71, 'Marie', 'Curie', 'Female', 'Pasonanca', '123123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `gender`, `address`, `contact_number`, `type_id`, `profile_picture`) VALUES
(19, 'Jane', 'Doe', 'Female', 'Baliwasan', '1111', 1, NULL),
(20, 'John', 'Doe', 'Male', 'San Roque', '2222', 2, NULL),
(23, 'Gojo', 'Satoru', 'Male', 'Shibuya', '221122', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_type`
--

CREATE TABLE `employee_type` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `salary` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_type`
--

INSERT INTO `employee_type` (`id`, `title`, `salary`) VALUES
(1, 'Manager', 20000.00),
(2, 'Sales', 15000.00),
(3, 'Checker', 12000.00),
(4, 'Staff', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('Standard','Organic','Cage-Free','Free-Range') NOT NULL,
  `chicken_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`id`, `name`, `type`, `chicken_count`) VALUES
(1, 'Standard', 'Standard', 20),
(2, 'Organic', 'Organic', 20),
(3, 'Cage-Free', 'Cage-Free', 20),
(4, 'Free-Range', 'Free-Range', 20);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_paid` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `date_created`, `user_id`, `customer_id`, `date_paid`) VALUES
(12, '2024-05-13 08:40:23', 13, 66, NULL),
(15, '2024-05-14 16:23:29', 13, 67, NULL),
(16, '2024-05-15 16:30:05', 13, 70, NULL),
(17, '2024-05-16 16:30:21', 13, 67, NULL),
(18, '2024-05-17 16:30:35', 13, 68, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float(10,2) NOT NULL,
  `sub_total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `sub_total`) VALUES
(25, 12, 59, 9, 200.00, 1800.00),
(26, 12, 61, 7, 160.00, 1120.00),
(27, 12, 62, 3, 140.00, 420.00),
(32, 15, 59, 10, 200.00, 2000.00),
(33, 15, 61, 7, 160.00, 1120.00),
(34, 15, 62, 3, 140.00, 420.00),
(35, 16, 60, 6, 180.00, 1080.00),
(36, 16, 59, 5, 200.00, 1000.00),
(37, 16, 62, 3, 140.00, 420.00),
(38, 17, 60, 4, 180.00, 720.00),
(39, 17, 59, 7, 200.00, 1400.00),
(40, 17, 62, 5, 140.00, 700.00),
(41, 18, 60, 5, 180.00, 900.00),
(42, 18, 59, 7, 200.00, 1400.00),
(43, 18, 62, 4, 140.00, 560.00);

-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `produce_date` datetime NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produce`
--

INSERT INTO `produce` (`id`, `quantity`, `produce_date`, `product_id`) VALUES
(23, 100, '2024-05-01 16:00:00', 59),
(24, 40, '2024-05-01 16:00:00', 60),
(25, 220, '2024-05-01 16:00:00', 61),
(26, 25, '2024-05-01 16:00:00', 62),
(27, 70, '2024-05-02 16:00:00', 59),
(28, 35, '2024-05-02 16:00:00', 60),
(29, 23, '2024-05-02 16:00:00', 61),
(30, 16, '2024-05-02 16:00:00', 62),
(31, 99, '2024-05-03 16:00:00', 59),
(32, 36, '2024-05-03 16:00:00', 60),
(33, 29, '2024-05-03 16:00:00', 61),
(34, 24, '2024-05-03 16:00:00', 62),
(35, 78, '2024-05-04 16:00:00', 59),
(36, 47, '2024-05-04 16:00:00', 60),
(37, 29, '2024-05-04 16:00:00', 61),
(38, 18, '2024-05-04 16:00:00', 62),
(39, 99, '2024-05-05 16:00:00', 59),
(40, 41, '2024-05-05 16:00:00', 60),
(41, 32, '2024-05-05 16:00:00', 61),
(42, 17, '2024-05-05 16:00:00', 62),
(43, 120, '2024-05-06 16:00:00', 59),
(44, 40, '2024-05-06 16:00:00', 60),
(45, 35, '2024-05-06 16:00:00', 61),
(46, 20, '2024-05-06 19:06:00', 62),
(47, 123, '2024-05-07 16:00:00', 59),
(48, 46, '2024-05-07 16:00:00', 60),
(49, 28, '2024-05-07 16:00:00', 61),
(50, 22, '2024-05-07 16:00:00', 62),
(56, 19, '2024-05-17 20:11:00', 59),
(58, 12, '2024-05-18 21:28:00', 59);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `size` enum('Small','Medium','Large','Extra-Large','Jumbo','Super-Jumbo') NOT NULL,
  `type` enum('Standard','Organic','Cage-Free','Free-Range') NOT NULL,
  `tray_size` enum('30','15','10','6') NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `product_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `size`, `type`, `tray_size`, `price`, `product_picture`) VALUES
(59, 'Itlog na Pula', 'Small', 'Standard', '30', 200.00, NULL),
(60, 'Itlog na Brown', 'Medium', 'Organic', '15', 180.00, NULL),
(61, 'Itlog na Puti', 'Large', 'Cage-Free', '10', 160.00, NULL),
(62, 'Itlog ng Manok', 'Extra-Large', 'Free-Range', '6', 140.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `repair`
--

CREATE TABLE `repair` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','inventory','order','monitoring') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `employee_id`, `username`, `password`, `role`) VALUES
(13, 19, 'admin', '$2y$10$IKExEJtt5hI/kKN2iOiBZeaBUNxJHzLE8X9Zs9A7A1BXNbzeFjnVK', 'admin'),
(14, 20, 'johndoe69', '$2y$12$E2pxT4IDbXonnQqFz8wnD.6D2UY2feTPUfpVon2cGe/LCXeiL5acC', 'order'),
(20, 23, 'strongest', '$2y$12$wOxh/43B5uiCTOQ9EUrheOPrH3TDygeoyPmt8dCdJM7xahowHgvxO', 'inventory');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_type_id_fk` (`type_id`);

--
-- Indexes for table `employee_type`
--
ALTER TABLE `employee_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_employee_id_fk` (`user_id`),
  ADD KEY `order_customer_id_fk` (`customer_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_item_order_id` (`order_id`),
  ADD KEY `order_item_product_id` (`product_id`);

--
-- Indexes for table `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produce_product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repair`
--
ALTER TABLE `repair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_employee_id_fk` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee_type`
--
ALTER TABLE `employee_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `produce`
--
ALTER TABLE `produce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `repair`
--
ALTER TABLE `repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_type_id_fk` FOREIGN KEY (`type_id`) REFERENCES `employee_type` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_customer_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `order_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_order_id` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produce`
--
ALTER TABLE `produce`
  ADD CONSTRAINT `produce_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_employee_id_fk` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
