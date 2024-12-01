-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 05:37 PM
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
-- Database: `phpadminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Admin', 'Panel', 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(2, '::1', 2),
(9, '::1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Mens Wear', '1', '2024-01-16 21:31:10', '2024-01-16 16:01:10'),
(5, 'WOMAN GARMENTS', '1', '2024-01-16 21:37:00', '2024-01-24 16:25:33'),
(7, 'kids', '1', '2024-01-16 22:23:08', '2024-01-16 16:53:08'),
(8, 'Man', '1', '2024-01-25 22:13:53', '2024-01-25 16:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `interview`
--

CREATE TABLE `interview` (
  `id` int(11) NOT NULL,
  `number` text NOT NULL,
  `color` text NOT NULL,
  `order_by` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interview`
--

INSERT INTO `interview` (`id`, `number`, `color`, `order_by`) VALUES
(698, '1', '#419911', ''),
(699, '6', '#bf6b53', ''),
(700, '3', '#e3cfe2', ''),
(701, '10', '#2ff9fa', ''),
(702, '8', '#66ece1', ''),
(703, '9', '#523680', ''),
(704, '4', '#f16148', ''),
(705, '2', '#5d6de7', ''),
(706, '5', '#48c5fa', ''),
(707, '7', '#36fc3b', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `image` varchar(400) NOT NULL,
  `photo` varchar(400) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `catname` varchar(255) NOT NULL,
  `subid` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `pstatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `image`, `photo`, `pname`, `catname`, `subid`, `price`, `pstatus`) VALUES
(2, 'winterkids.webp', 'winterkids1.jpg,winterkids2.jpg,winterkids3.jpg,wi...', 'Boys jersey', '5', '3', '700', '1'),
(9, 'winterkids.webp', 'winterkids1.jpg,winterkids2.jpg,winterkids3.jpg,winterkids4.jpg', 'Winter Wear for Babies & Kids', '7', '6', '579', '1'),
(10, 'saree10.jpg', 'saree1.jpg,saree2.jpg,saree3.jpg,saree4.webp', 'Woman Stylish Saree', '5', '4', '749', '1'),
(11, 'shoes-4.webp', 'shoes-1.jpg,shoes-2.jpg,shoes-3.jpeg,shoes-4.webp', 'High-quality men footwear', '8', '5', '999', '1'),
(12, 't-shirt1.webp', 't-shirt.webp,t-shirt1.webp,t-shirt4.webp,t-shirts3.webp', 'Round neck T-Shirts', '4', '2', '1400', '1'),
(13, 'kidstrack.jpg', 'kidstrack1.jpg,kidstrack2.jpg,kidstrack3.jpg,kidstrack4.jpg', 'Boys Track Suits at lowest prices ', '7', '8', '599', '1'),
(14, 'kids t shirt3.webp', 'kids t shirt3.webp,kids t-shirt2.jpg,kids t-shirt4.jpg', 'T-shirt at lowest prices', '7', '7', '549', '1'),
(15, 'mens1.jpg', 'mens2.jpg,mens3.jpg,mens4.jpg,mens5.jpg', 'Boys Formal Dresses', '8', '3', '1500', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `sid` int(11) NOT NULL,
  `subname` varchar(100) NOT NULL,
  `catid` varchar(100) NOT NULL,
  `substatus` varchar(100) NOT NULL,
  `created_at` varchar(100) DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`sid`, `subname`, `catid`, `substatus`, `created_at`, `updated_at`) VALUES
(2, 'T-shirt', '4', '1', '2024-01-16 23:34:09', '2024-01-16 18:04:09'),
(3, 'Mans Formal cloth', '4', '1', '2024-01-17 00:50:08', '2024-01-25 15:54:56'),
(4, 'Woman Saree', '5', '1', '2024-01-17 00:51:58', '2024-01-25 15:53:48'),
(5, 'Man Shoes', '5', '1', '2024-01-17 00:52:31', '2024-01-25 15:54:02'),
(6, 'Kids Winter', '7', '1', '2024-01-17 00:52:45', '2024-01-25 15:51:21'),
(7, 'Kids T-shirt', '7', '1', '2024-01-17 00:53:04', '2024-01-25 15:54:28'),
(8, 'Kids Track Suit', '', '1', '2024-01-25 21:58:12', '2024-01-25 16:47:54'),
(9, 'Baby Summer', '', '1', '2024-01-26 15:51:37', '2024-01-26 10:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `user_name`
--

CREATE TABLE `user_name` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_name`
--

INSERT INTO `user_name` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Arpit', 'Singh', 'arpit@gmail.com', '123456'),
(2, 'sundara', 'suresh', 'arpit@gmail.com', 'arpit123'),
(3, 'Arpit', 'singh', 'arpitkushwaha6@gmail.com', 'arpit@123'),
(4, 'kulu', 'singh', 'suresh@gmail.com', 'shyam'),
(8, 'Akash', 'Singh', 'akash@gmail.com', '$2y$10$LDVX3jH/xW3ROd6pVXEskemLkKEsArxVs1v865NyOJkPS/CERlK52');

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `uid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`uid`, `fname`, `lname`, `email`, `password`, `user_ip`, `role`, `gender`, `image`) VALUES
(1, 'Arpit Singh', '', 'arpit@gmail.com', '123', '123', 'user', 'Male', 'narmadeshwar shivlinga.jpg'),
(2, 'Arpit ', 'Singh', 'arpitsingh@gmail.com', '123', '123', 'Admin', 'Male', 'apple.jpg'),
(3, 'mannu', 'kushwaha', 'arpitkushwaha@gmail.com', '123', '123', 'Admin', 'Male', ''),
(4, 'Archana', 'kushwahaa', 'archana@gmail.com', '123456', '123456', 'Admin', 'Female', 'apple.jpg'),
(5, 'Vaishnavi', 'singh', 'vaishu@gmail.com', '123', '123', 'user', 'Male', 'WhatsApp Image 2023-11-24 at 10.29.18 PM.jpeg'),
(6, 'Vaishu', 'Singh', 'vaishusingh@gmail.com', '123', '::1', 'Admin', 'Female', 'WhatsApp Image 2023-11-24 at 12.41.32 PM (1).jpeg'),
(7, 'pal', 'pal', 'pal@gmail.com', '12', '::1', 'user', 'Male', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminuser`
--
ALTER TABLE `adminuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `interview`
--
ALTER TABLE `interview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user_name`
--
ALTER TABLE `user_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminuser`
--
ALTER TABLE `adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `interview`
--
ALTER TABLE `interview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=708;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_name`
--
ALTER TABLE `user_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
