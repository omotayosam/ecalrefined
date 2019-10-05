-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 05:06 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecal`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resident_address` longtext NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `state` text NOT NULL,
  `lga` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `resident_address`, `phone_number`, `state`, `lga`) VALUES
(1, 1, 'No. 59c Rumuagholu', '08124079283', 'Rivers State', 'Abuaâ€“Odual'),
(2, 1, 'No. 59c Rumuagholu off Rumuokoro Round-AboutNo. 59c Rumuagholu off Rumuokoro Round-About', '08124079283', 'Rivers State', 'Gokana'),
(3, 1, 'No. 59c Rumuagholu', '08124079283', 'Rivers State', 'Abuaâ€“Odual');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `username`) VALUES
(1, 'bienmoses@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'glitch'),
(2, 'omotayosam@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'omotayo');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_count` int(11) NOT NULL,
  `total_price` varchar(50) NOT NULL,
  `subtotal` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `user_id`, `item_count`, `total_price`, `subtotal`) VALUES
(1, 11, 1, 2, '18000', 9000),
(2, 10, 1, 2, '18000', 9000),
(3, 11, 0, 2, '18000', 9000),
(4, 12, 0, 1, '9000', 9000),
(5, 12, 1, 1, '9000', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `clothing`
--

CREATE TABLE `clothing` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clothing`
--

INSERT INTO `clothing` (`id`, `item_id`, `type`, `size`, `colour`, `gender`) VALUES
(1, 1, 'Coat', 'L', 'Red', ''),
(2, 2, 'Coat', 'L', 'Red', ''),
(3, 3, 'Coat', 'L', 'Red', ''),
(4, 4, 'Coat', 'L', 'Red', ''),
(6, 7, 'Coat', '', '', 'Unisex'),
(7, 8, 'Clothe', '', '', 'Female'),
(8, 11, 'Clothe', 'Medium', 'Brown', 'Female'),
(9, 0, 'Underclothe', 'Medium', 'White', 'Unisex');

-- --------------------------------------------------------

--
-- Table structure for table `footwears`
--

CREATE TABLE `footwears` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `headgear`
--

CREATE TABLE `headgear` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `gender` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_pic` varchar(255) NOT NULL,
  `item_slide_pics` varchar(255) NOT NULL,
  `item_category` varchar(60) NOT NULL,
  `item_class` varchar(255) NOT NULL,
  `item_info` varchar(255) NOT NULL,
  `item_details` text NOT NULL,
  `currency` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `no_item_left` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_pic`, `item_slide_pics`, `item_category`, `item_class`, `item_info`, `item_details`, `currency`, `price`, `no_item_left`) VALUES
(1, 'Red Coat', 'wwwroot\\img\\redcoat.jpg', 'wwwroot\\img\\redcoat.jpg', 'Fashion', 'Clothing', 'Red Coat for Summer (Unisex)', 'empty', '&#x20A6;', '10000', 0),
(2, 'Red Coat', 'wwwroot\\img\\redcoat.jpg', 'wwwroot\\img\\redcoat.jpg', 'Fashion', 'Clothing', 'Red Coat for Summer (Unisex)', 'empty', '&#x20A6;', '10000', 0),
(3, 'Red Coat', 'wwwroot\\img\\redcoat.jpg', 'wwwroot\\img\\redcoat.jpg', 'Fashion', 'Clothing', 'Red Coat for Summer (Unisex)', 'empty', '&#x20A6;', '10000', 0),
(4, 'Red Coat', 'wwwroot\\img\\redcoat.jpg', 'wwwroot\\img\\redcoat.jpg', 'Fashion', 'Clothing', 'Red Coat for Summer (Unisex)', 'empty', '&#x20A6;', '10000', 0),
(7, 'Mos', 'wwwroot/img/Fashion/10-01-2019-blouse.jpg', 'wwwroot/img/Fashion/10-01-2019-blouse.jpg, wwwroot/img/Fashion/10-01-2019-denim.jpg, wwwroot/img/Fashion/10-01-2019-redcoat.jpg, wwwroot\\img\\redcoat.jpg', 'Fashion', 'Clothing', 'Test det (Unisex)', 'Test desc', '&#x20A6;', '5', 0),
(8, 'Blouse', 'wwwroot/img/Fashion/10-01-2019-blouse.jpg', 'wwwroot/img/Fashion/10-01-2019-blouse.jpg', 'Fashion', 'Clothing', 'Test Det (Female)', 'Test Des', '&#x20A6;', '10500', 0),
(10, 'Food N Drinks', 'wwwroot/img/Food N Drinks/11-01-2019-foods&D - res.jpg', 'wwwroot/img/Food N Drinks/11-01-2019-foods&D - res.jpg, wwwroot/img/Food N Drinks/11-01-2019-foods&D.jpg', 'Food N Drinks', 'Grilled', 'Grilled Food', 'Grilled Food', '&#x20A6;', '10000', 0),
(11, 'Test Fashion', 'wwwroot/img/Fashion/11-01-2019-blouse.jpg', 'wwwroot/img/Fashion/11-01-2019-blouse.jpg, wwwroot/img/Fashion/11-01-2019-fashion.jpg', 'Fashion', 'Clothing', 'Test Details (Female)', 'Test Description', '&#x20A6;', '10000', 10),
(12, 'Test', 'wwwroot/img/Fashion/26-01-2019-__code____php_by_webblaster48_d1w23gs.jpg', 'wwwroot/img/Fashion/26-01-2019-__code____php_by_webblaster48_d1w23gs.jpg, wwwroot/img/Fashion/26-01-2019-430892.png, wwwroot/img/Fashion/26-01-2019-430917.jpg, wwwroot/img/Fashion/26-01-2019-499786.png, wwwroot/img/Fashion/26-01-2019-559128.jpg, wwwroot/i', 'Fashion', 'Clothing', 'Test (Unisex)', 'Test Des', '&#x20A6;', '10000', 10);

-- --------------------------------------------------------

--
-- Table structure for table `others`
--

CREATE TABLE `others` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `colour` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `others`
--

INSERT INTO `others` (`id`, `item_id`, `colour`) VALUES
(2, 10, '');

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed`
--

CREATE TABLE `recently_viewed` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recently_viewed`
--

INSERT INTO `recently_viewed` (`id`, `item_id`, `user_id`, `date`) VALUES
(1, 11, 1, '2019-01-13 08:55:12'),
(12, 1, 1, '2019-01-15 02:49:35'),
(13, 8, 1, '2019-01-15 02:52:02'),
(14, 10, 1, '2019-01-15 09:40:21'),
(15, 4, 1, '2019-01-21 03:59:41'),
(16, 12, 1, '2019-02-20 02:02:02'),
(17, 7, 0, '2019-03-12 10:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `recent_search`
--

CREATE TABLE `recent_search` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `recent_search` longtext NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `title` varchar(4) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` text NOT NULL,
  `sign-up-date` datetime NOT NULL,
  `activated` text NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `address_id`, `title`, `fname`, `lname`, `email`, `password`, `phone`, `gender`, `sign-up-date`, `activated`, `token`) VALUES
(1, 1, '', 'Nwinate', 'Bien', 'bienmoses@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '+234 8124079283', 'Male', '2018-12-26 05:07:22', 'Yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `item_id`, `user_id`, `total_price`) VALUES
(1, 11, 1, '10000'),
(3, 2, 1, '1000');

-- --------------------------------------------------------

--
-- Table structure for table `wristwear`
--

CREATE TABLE `wristwear` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `colour` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User-Cart` (`user_id`),
  ADD KEY `Item-Cart` (`item_id`);

--
-- Indexes for table `clothing`
--
ALTER TABLE `clothing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footwears`
--
ALTER TABLE `footwears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `headgear`
--
ALTER TABLE `headgear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `others`
--
ALTER TABLE `others`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recent_search`
--
ALTER TABLE `recent_search`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User-Cart` (`user_id`),
  ADD KEY `Item-Cart` (`item_id`);

--
-- Indexes for table `wristwear`
--
ALTER TABLE `wristwear`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clothing`
--
ALTER TABLE `clothing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `footwears`
--
ALTER TABLE `footwears`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `headgear`
--
ALTER TABLE `headgear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `others`
--
ALTER TABLE `others`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `recently_viewed`
--
ALTER TABLE `recently_viewed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recent_search`
--
ALTER TABLE `recent_search`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wristwear`
--
ALTER TABLE `wristwear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
