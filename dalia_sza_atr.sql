-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 04:08 PM
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
-- Database: `dalia'sza'atr`
--

-- --------------------------------------------------------

--
-- Table structure for table `confirmation`
--

CREATE TABLE `confirmation` (
  `confirmation_id` int(11) NOT NULL,
  `Customer_id` int(11) DEFAULT NULL,
  `Payment_method` varchar(255) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customer_id` int(11) NOT NULL,
  `Customer_name` varchar(255) DEFAULT NULL,
  `Customer_Username` varchar(255) DEFAULT NULL,
  `Customer_Email` varchar(255) DEFAULT NULL,
  `Customer_pass` varchar(255) DEFAULT NULL,
  `Customer_phone_num` varchar(20) DEFAULT NULL,
  `Customer_ship_address` varchar(255) DEFAULT NULL,
  `Customer_city` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customer_id`, `Customer_name`, `Customer_Username`, `Customer_Email`, `Customer_pass`, `Customer_phone_num`, `Customer_ship_address`, `Customer_city`) VALUES
(1, 'Taibah khalid', 'Panhdsjbd', '1daliya100@gmail.com', 'Waffle123', '0106607803', 'University of nottingham ', 'kuala lumpur'),
(2, 'Dal Ahmed', 'Pan', '1daliya100@gmail.com', 'Cancan', '03332116263', 'A-2, Al-Sadiq view apartments, block 6, gulshan e iqbal, behind zohra apartments', 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `Employee_id` int(11) NOT NULL,
  `Employee_Username` varchar(255) DEFAULT NULL,
  `Employee_Pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `Customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--



-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `product_availabilityStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`product_id`, `product_name`, `product_price`, `product_availabilityStatus`) VALUES
(1, 'Seafood Platter', 65.00, 0),
(2, 'Stuffed Golden Chicken\r\n', 39.90, 0),
(3, 'Creamy Chicken Sweet Corn Soup', 10.90, 0),
(4, 'Cream of Mushroom Soup', 8.50, 1),
(5, 'Chicken Cream Soup', 8.50, 1),
(6, 'Morroccan Harira Soup', 11.50, 1),
(7, 'Olive Salad', 7.90, 1),
(8, 'Tabbouleh', 7.90, 1),
(9, 'Fettush Eggplant', 7.90, 1),
(10, 'Dalias Zaatar Salad', 7.90, 1),
(11, 'Khibeh', 10.00, 1),
(12, 'Sambosa', 9.50, 1),
(13, 'Falafel', 10.00, 1),
(14, 'Fouul', 12.30, 1),
(15, 'Baba Ghanoush', 12.00, 1),
(16, 'Hummus', 11.00, 1),
(17, 'Mandi Rice', 15.00, 1),
(18, 'Maqlouba Chicken', 35.00, 1),
(19, 'Tangine', 26.00, 1),
(20, 'Kabsa Chicken', 40.00, 1),
(21, 'Fahsa', 23.00, 1),
(22, 'Shish Kebab served with Rice', 35.00, 1),
(23, 'Kharij Lamb Set', 65.00, 1),
(24, 'Mandi Rice Set', 15.00, 1),
(25, 'Mixed Grill', 37.90, 1),
(26, 'Lamb Chop', 42.00, 1),
(27, 'Dalias Zaatar Mixed Grill Special', 18.90, 1),
(28, 'Spicy Shish Tawook', 11.00, 1),
(29, 'Grilled Spring Chicken', 12.50, 1),
(30, 'Basbosa', 6.00, 1),
(31, 'Kunafa (Cheese)', 17.90, 1),
(32, 'Baklava', 13.50, 1),
(33, 'Turkish Delight', 13.50, 1),
(34, 'Watermelon Juice', 6.00, 1),
(35, 'Lemon Juice', 4.00, 1),
(36, 'Lemon Mint Juice', 6.00, 1),
(37, 'Mango Juice', 7.50, 1),
(38, 'Orange Juice', 5.00, 1),
(39, 'Chocolate Milkshake', 8.00, 1),
(40, 'Vanilla Milkshake', 8.00, 1),
(41, 'Oreo Milkshake', 9.50, 1),
(42, 'Chai', 6.00, 1),
(43, 'Cafe Latte', 8.00, 1),
(44, 'Turkish Coffee', 9.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurantorders`
--

CREATE TABLE `restaurantorders` (
  `order_id` int(11) NOT NULL,
  `Customer_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `orderStatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurantorders`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD PRIMARY KEY (`confirmation_id`),
  ADD KEY `Customer_id` (`Customer_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customer_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`Employee_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `restaurantorders`
--
ALTER TABLE `restaurantorders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `confirmation`
--
ALTER TABLE `confirmation`
  MODIFY `confirmation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `Employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `restaurantorders`
--
ALTER TABLE `restaurantorders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `confirmation`
--
ALTER TABLE `confirmation`
  ADD CONSTRAINT `confirmation_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customers` (`Customer_id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customers` (`Customer_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `productdetails` (`product_id`);

--
-- Constraints for table `restaurantorders`
--
ALTER TABLE `restaurantorders`
  ADD CONSTRAINT `restaurantorders_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `customers` (`Customer_id`),
  ADD CONSTRAINT `restaurantorders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `productdetails` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
