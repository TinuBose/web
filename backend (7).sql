-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 02:01 PM
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
-- Database: `backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `restaurantname` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `people` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_option` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ckt`
--

CREATE TABLE `ckt` (
  `order_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_option` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ckt_items`
--

CREATE TABLE `ckt_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `message`) VALUES
('nice', 'thanks'),
('super', 'nice'),
('admin ', 'aaaaaa'),
('adithyan', 'nice site');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(50) NOT NULL,
  `meal_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `meal_name`, `category`, `image`, `description`, `price`) VALUES
(2, 'chicken', 'all', 'cake.jpg', 'chicken biriyani ', 150),
(3, 'cake', 'all', 'cake.jpg', 'crab cake', 500),
(4, 'bread', 'all', 'bread-barrel.jpg', 'bread', 100),
(5, 'beef', 'all', 'tuscan-grilled.jpg', 'fry', 110);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_photo` varchar(255) NOT NULL,
  `item_details` text NOT NULL,
  `item_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `item_name`, `item_price`, `item_photo`, `item_details`, `item_category`) VALUES
(1, 'Chicken', 150.00, 'tuscan-grilled.jpg', 'Broiler', 'Starters'),
(2, 'lobster', 290.00, 'lobster-bisque.jpg', 'lobster', 'Starters'),
(3, 'salad', 100.00, 'greek-salad.jpg', 'greek salad', 'Starters'),
(4, 'chicken fry', 290.00, 'tuscan-grilled.jpg', 'nice', 'Starters'),
(5, 'biriyani', 150.00, 'menu_images/caesar.jpg', 'biriyani', 'Salads');

-- --------------------------------------------------------

--
-- Table structure for table `ord`
--

CREATE TABLE `ord` (
  `order_id` int(11) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `payment_option` varchar(50) NOT NULL,
  `cart_data` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `user_email` varchar(255) NOT NULL,
  `order_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_option` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`user_email`, `order_id`, `address`, `payment_option`) VALUES
('parthivpradeepmvk@gmail.com', 25, 'mavelikara', 'credit-card'),
('parthivpradeepmvk@gmail.com', 26, 'kailas', 'cash-on-delivery'),
('parthivpradeepmvk@gmail.com', 27, 'mavelikara', 'cash-on-delivery'),
('parthivpradeepmvk@gmail.com', 28, 'kailas', 'cash-on-delivery'),
('parthivpradeepmvk@gmail.com', 29, 'kailas', 'cash-on-delivery'),
('parthivpradeepmvk@gmail.com', 30, 'kailas', 'cash-on-delivery'),
('parthivpradeepmvk@gmail.com', 31, 'kailas,Thazhakara p.o. ,mavelikara', 'cash-on-delivery'),
('parthivpradeepmvk@gmail.com', 32, 'kailas', 'credit-card'),
('parthivpradeepmvk@gmail.com', 33, 'mavelikara', 'UPI');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_total_price` decimal(10,2) NOT NULL,
  `sum` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `item_name`, `item_price`, `item_quantity`, `item_total_price`, `sum`) VALUES
(37, 25, 'Chicken', 150.00, 2, 300.00, 0),
(38, 26, 'salad', 100.00, 1, 100.00, 0),
(39, 26, 'lobster', 290.00, 2, 580.00, 0),
(40, 26, 'chicken fry', 290.00, 1, 290.00, 0),
(41, 27, 'Chicken', 150.00, 1, 150.00, 0),
(42, 27, 'salad', 100.00, 2, 200.00, 0),
(43, 28, 'Chicken', 150.00, 1, 150.00, 0),
(44, 28, 'lobster', 290.00, 2, 580.00, 0),
(45, 28, 'salad', 100.00, 1, 100.00, 0),
(46, 29, 'Chicken', 150.00, 1, 150.00, 0),
(47, 29, 'lobster', 290.00, 2, 580.00, 0),
(48, 29, 'salad', 100.00, 1, 100.00, 0),
(49, 30, 'Chicken', 150.00, 1, 150.00, 0),
(50, 30, 'salad', 100.00, 2, 200.00, 0),
(51, 30, 'lobster', 290.00, 1, 290.00, 0),
(52, 31, 'Chicken', 150.00, 1, 150.00, 0),
(53, 31, 'salad', 100.00, 2, 200.00, 0),
(54, 31, 'lobster', 290.00, 3, 870.00, 0),
(55, 32, 'Chicken', 150.00, 1, 150.00, 0),
(56, 32, 'lobster', 290.00, 2, 580.00, 0),
(57, 32, 'salad', 100.00, 1, 100.00, 0),
(58, 33, 'Chicken', 150.00, 2, 300.00, 0),
(59, 33, 'lobster', 290.00, 1, 290.00, 0),
(60, 33, 'salad', 100.00, 1, 100.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `restaurant_name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `people` int(50) NOT NULL,
  `table_number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_name`, `user_email`, `restaurant_name`, `phone`, `date`, `time`, `people`, `table_number`) VALUES
(1, 'parthiv', 'parthivpradeepmvk@gmail.com', 'Manoj Hotel', '7025378179', '2023-07-05', '01:03', 2, NULL),
(2, 'parthiv', 'parthivpradeepmvk@gmail.com', 'manoj', '7025378179', '2030-02-22', '02:02', 2, NULL),
(3, 'appu', 'adithyan@gmail.com', 'Manoj Hotel', '7025378179', '2023-02-07', '03:02', 1, NULL),
(4, 'pranav', 'pranav@gmail.com', 'Manoj Hotel', '7025378179', '2022-12-31', '06:08', 1, NULL),
(5, 'parthiv', 'parthivpradeepmvk@gmail.com', 'Manoj Hotel', '7025378179', '2003-02-03', '03:02', 2, NULL),
(6, 'parthiv', 'parthivpradeepmvk@gmail.com', 'thaza', '7025378179', '2003-02-03', '03:02', 2, NULL),
(7, 'parthiv', 'parthivpradeepmvk@gmail.com', 'swiggy', '7025378179', '3222-03-03', '02:03', 3, NULL),
(8, 'parthiv', 'parthivpradeepmvk@gmail.com', 'swiggy', '8089994501', '2333-02-03', '02:03', 2, NULL),
(9, 'parthiv', 'parthivpradeepmvk@gmail.com', 'swiggy', '7025378179', '3333-03-03', '02:03', 2, 1),
(10, 'parthiv', 'parthivpradeepmvk@gmail.com', 'palace', '8089994501', '2023-01-19', '18:45', 1, 2),
(11, 'parthiv', 'parthivpradeepmvk@gmail.com', 'taza', '8089994501', '2023-09-13', '12:00', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`name`, `email`, `password`) VALUES
('appu', 'adithyan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('akash', 'akash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('gautham krishna', 'gautham22krishna@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
('parthiv', 'j@gamil.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('jayakrishnan', 'j@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('khfjgkjyyh', 'jfj@gmail.com', 'a384b6463fc216a5f8ecb6670f86456a'),
('parthiv', 'parthivpradeepmvk@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
('prnv', 'r@gmail.com', '202cb962ac59075b964b07152d234b70'),
('parthiv', 'sad@gmil.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `name` varchar(200) DEFAULT NULL,
  `restaurantname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(200) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `people` int(200) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`name`, `restaurantname`, `email`, `phone`, `date`, `time`, `people`, `message`) VALUES
('j', '', 'j@gamil.com', 634636546, '0000-00-00', '00:00:02.000000', 4, 'vfgjfw'),
(NULL, '', '', 0, '0000-00-00', '00:00:00.000000', 0, ''),
('parthiv', '', '', 0, '0000-00-00', '00:00:00.000000', 0, ''),
('parthiv', 'hh', 'parthivpradeepmvk@gmail.com', 2147483647, '0000-00-00', '00:00:02.000000', 22, '22'),
('gautham', 'manoj hotel', 'gautham22krishna@gmail.com', 2147483647, '0000-00-00', '00:00:02.000000', 22, '22'),
('asdfg', 'manoj', 'j@gamil.com', 2147483647, '0000-00-00', '00:00:23.000000', 3, 'sdsddsd'),
('asdfg', 'manoj', 'j@gamil.com', 0, '0000-00-00', '00:00:23.000000', 3, 'sdsddsd'),
('asdfg', 'manoj', 'j@gamil.com', 0, '0000-00-00', '00:00:23.000000', 3, 'sdsddsd'),
('', '', '', 0, '0000-00-00', '00:00:00.000000', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ckt`
--
ALTER TABLE `ckt`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ckt_items`
--
ALTER TABLE `ckt_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ord`
--
ALTER TABLE `ord`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ckt`
--
ALTER TABLE `ckt`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ckt_items`
--
ALTER TABLE `ckt_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ord`
--
ALTER TABLE `ord`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ckt_items`
--
ALTER TABLE `ckt_items`
  ADD CONSTRAINT `ckt_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
