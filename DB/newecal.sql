-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 12:06 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(3, 'moses', 'biennwinate@gmail.com', '$2y$10$Z1DnKbJRDFUTHMI7y1vSqeU3.Y9cgDyC4AeWx4.ucH34z/mkzL2E.', '0'),
(4, 'ayo', 'ajfuzzylogic@gmail.com', '$2y$10$UGzx/ODNB4ZSFruRF8BN2eC/NNE.6MBhfTTYKtUo.k4ZVHZFD85DO', '0');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Hp'),
(2, 'Samsung'),
(3, 'Apple'),
(4, 'Sony'),
(5, 'LG'),
(6, 'Nike'),
(7, 'Chrysolite'),
(8, 'Adidas'),
(9, 'Honda'),
(10, 'Toyota'),
(11, 'Ford'),
(12, 'coca-cola');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(1, 1, '::1', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(12, 'Electronics'),
(13, 'Men Fashion'),
(14, 'women fashion'),
(15, 'Luggages'),
(16, 'Girls Fashion'),
(17, 'Boys Fashion'),
(18, 'Baby'),
(19, 'Automotive'),
(20, 'Automobile'),
(21, 'Health & Household'),
(22, 'Toys & Games'),
(23, 'Like New Products'),
(24, 'Home & Kitchen'),
(25, 'Arts & Crafts'),
(26, 'Beauty & Personal Care'),
(27, 'Industrial & Scientific'),
(28, 'Computers');

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
  `no_item_left` int(11) NOT NULL,
  `item_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_pic`, `item_slide_pics`, `item_category`, `item_class`, `item_info`, `item_details`, `currency`, `price`, `no_item_left`, `item_keywords`) VALUES
(9, 'Red', 'wwwroot/img/1569193974_1569193769_autoM.jpg', '', '12', '1', '', 'Fo', '', '2', 1, 'key'),
(10, 'red', 'wwwroot/img/1569194071_1569192186_redcoat.jpg', '', '12', '2', '', 'eee', '', '4', 1, 'key');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `trx_id` varchar(255) NOT NULL,
  `p_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `item_id`, `qty`, `trx_id`, `p_status`) VALUES
(1, 1, 1, 1, '9L434522M7706801A', 'Completed'),
(2, 1, 2, 1, '9L434522M7706801A', 'Completed'),
(3, 1, 3, 1, '9L434522M7706801A', 'Completed'),
(4, 1, 1, 1, '8AT7125245323433N', 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_keywords`) VALUES
(1, 12, 2, 'Samsung Galaxy S10', 10000, 50, 'Its a good phone', '1552670517_sumsung galaxy s8.png', 'samsung, mobile, galaxy'),
(2, 12, 3, 'Iphone 7 plus', 40000, 5000, 'Iphone is a good phone', '1552670718_iphone-7-plus.jpg', 'apple, iphone, mobile'),
(4, 12, 2, 'Samsung Galaxy S6', 5000, 100, 'Samsung is a good phone', '1552670857_samsung galaxy s6.jpg', 'samsung, mobile, s6'),
(5, 12, 2, 'Samsung Galaxy S10', 5000, 5000, 'Samsung Galaxy S10', '1552671096_7-2-samsung-mobile-phone-png-clipart-thumb.png', 'samsung, mobile, s10');

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
(1, 1, '', 'Nwinate', 'Bien', 'bienmoses@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '+234 8124079283', 'Male', '2018-12-26 05:07:22', 'Yes', ''),
(2, 0, '', 'omotayo', 'samson', 'omotayo.a.samson@gmail.com', '17a2492b75d5aee0b62ed69703e6433b', '07056223621', 'Male', '2019-09-20 15:35:54', 'No', 'rKzQFcW7fvN8ElPYbayM');

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_cat` (`product_cat`),
  ADD KEY `fk_product_brand` (`product_brand`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
