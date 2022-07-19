-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2022 at 10:23 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_seller`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `u_id`, `p_id`, `quantity`, `timestamp`) VALUES
(19, 9, 4, 2, '2022-02-22 02:56:48'),
(20, 9, 11, 3, '2022-02-22 02:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category`, `timestamp`) VALUES
(1, 'mobile', '2022-02-19 23:20:37'),
(3, 'rice', '2022-02-19 23:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tb`
--

CREATE TABLE `customer_tb` (
  `cust_id` int(100) NOT NULL,
  `logid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `f_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`f_id`, `p_id`, `c_id`, `timestamp`) VALUES
(1, 2, 3, '2022-02-17 15:11:02'),
(4, 1, 2, '2022-02-17 15:11:23'),
(6, 2, 2, '2022-02-22 01:19:06'),
(7, 4, 9, '2022-02-22 01:19:31'),
(9, 11, 9, '2022-02-22 01:20:30'),
(13, 16, 16, '2022-03-14 12:04:24'),
(16, 16, 17, '2022-03-14 12:08:59');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `feedback`, `sender_id`, `reciever_id`, `timestamp`) VALUES
(1, 'yevaaava', 4, 3, '2022-02-21 16:34:56'),
(2, 'star rating: 4.0 \nmy feedback ', 9, 3, '2022-02-22 03:40:58'),
(3, 'star rating: 4.0 \ngood', 16, 14, '2022-03-14 12:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `feed_id` int(100) NOT NULL,
  `logid` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_tb`
--

INSERT INTO `feedback_tb` (`feed_id`, `logid`, `username`, `feedback`) VALUES
(1, 2, 'seller1', 'feedback1');

-- --------------------------------------------------------

--
-- Table structure for table `login_tb`
--

CREATE TABLE `login_tb` (
  `logid` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tb`
--

INSERT INTO `login_tb` (`logid`, `username`, `password`, `role`) VALUES
(1, 'admin', 'test@12345', '0');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'placed',
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `p_id`, `u_id`, `quantity`, `timestamp`, `status`, `amount`) VALUES
(14, 7, 4, 2, '2022-02-19 21:48:40', 'placed', 87000),
(15, 9, 4, 2, '2022-02-19 21:48:40', 'delivered', 87000),
(20, 11, 9, 2, '2022-02-22 02:16:25', 'placed', 58000),
(21, 9, 9, 3, '2022-02-22 02:16:25', 'placed', 87000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `product` varchar(30) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image_url` varchar(50) NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `product`, `category`, `price`, `stock`, `image_url`, `shop_id`) VALUES
(4, 'realme x3', 'mobile', 29000, 34, 'uploads/img50.png', 3),
(9, 'samsung j6', 'mobile', 29000, 42, 'uploads/gall7.jpg', 3),
(11, 'samsung s3', 'mobile', 29000, 42, 'uploads/gall8.jpg', 3),
(12, 'ammini', 'rice', 45, 25, 'uploads/image_picker1221274374271808664.jpg', 0),
(13, 'mm 05', 'mobile', 4500, 4, 'uploads/image_picker5149314750996206124.jpg', 0),
(15, 'sample', 'rice', 2580, 45, 'uploads/image_picker7588341140899982146.jpg', 10),
(16, 'jam', 'mobile', 20, 100, 'uploads/image_picker3271115296151810706.jpg', 14),
(17, 'shvh', 'mobile', 126, 12, 'uploads/image_picker1400227029.jpg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `register_tb`
--

CREATE TABLE `register_tb` (
  `s_register_id` int(100) NOT NULL,
  `logid` int(100) NOT NULL DEFAULT 0,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `username` char(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(100) NOT NULL DEFAULT 1 COMMENT '1-shop,2-customer',
  `approval_status` int(100) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register_tb`
--

INSERT INTO `register_tb` (`s_register_id`, `logid`, `name`, `address`, `phone`, `username`, `password`, `email`, `role`, `approval_status`) VALUES
(4, 0, 'customorin', 'nil', 9876543292, 'costomer', '123456', 'aswcust@gmail.com', 2, 1),
(6, 0, 'custom2', 'nil', 9876543223, 'cust2', '123456', 'aswcust2@gmail.com', 2, 1),
(7, 0, 'aswin', 'nil', 9995395852, 'aswcustomer@gmail.com', '123456', 'aswcustomer@gmail.com', 2, 1),
(8, 0, 'new customer ', 'nil', 9995395454, 'customer@gmail.com', '123456', 'customer@gmail.com', 2, 1),
(9, 0, 'customer 3', 'nil', 9995395875, 'customer3@gmail.com', '123456', 'customer3@gmail.com', 2, 1),
(10, 0, 'shop3', 'nil', 98754213048, 'shop3@gmail.com', '123456', 'shop3@gmail.com', 1, 1),
(11, 0, 'shop9', 'fhbgi', 99966663338, 'shop9@gmail.com', 'qwe', 'shop9@gmail.com', 1, 1),
(12, 0, 'Aishu', 'Palakkad', 7994564659, 'aiswaryasankar345@gmail.com', 'Aishusankar1', 'aiswaryasankar345@gmail.com', 1, 1),
(14, 0, 'shop', 'pkd', 9999999999, 'shop0@gmail.com', 'qwe', 'shop0@gmail.com', 1, 1),
(16, 0, 'monisha', 'pkd', 9876543210, 'monisha@gmail.com', '123', 'monisha@gmail.com', 2, 1),
(19, 0, 'shopping ', 'jcnj', 8869842305, 'shopx@gmail.com', '123', 'shopx@gmail.com', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `u_id` (`u_id`,`p_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `customer_tb`
--
ALTER TABLE `customer_tb`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`f_id`),
  ADD UNIQUE KEY `p_id` (`p_id`,`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `login_tb`
--
ALTER TABLE `login_tb`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `product` (`product`,`shop_id`);

--
-- Indexes for table `register_tb`
--
ALTER TABLE `register_tb`
  ADD PRIMARY KEY (`s_register_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_tb`
--
ALTER TABLE `customer_tb`
  MODIFY `cust_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `feed_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_tb`
--
ALTER TABLE `login_tb`
  MODIFY `logid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `register_tb`
--
ALTER TABLE `register_tb`
  MODIFY `s_register_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
