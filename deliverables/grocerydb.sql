-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 09:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ccard`
--

CREATE TABLE `ccard` (
  `c_id` int(11) DEFAULT NULL,
  `cc_expiration` varchar(256) DEFAULT NULL,
  `cvv` varchar(3) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `cc_id` int(11) NOT NULL,
  `cc_number` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `balance` decimal(8,2) DEFAULT NULL
) ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `username`, `first`, `last`, `pword`, `balance`, `address`) VALUES
(4, 'blesi', 'Bright', 'Lesi', '3272e8d867c65ce7b87d9dbeea9d6ed3', NULL, '3241 S wabash,Chicago,Illinois,60616');

-- --------------------------------------------------------

--
-- Table structure for table `not_keyword_address`
--

CREATE TABLE `not_keyword_address` (
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `street_name` varchar(256) DEFAULT NULL,
  `city` varchar(256) DEFAULT NULL,
  `not_keyword_state` varchar(2) DEFAULT NULL,
  `zipcode` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `not_keyword_order`
--

CREATE TABLE `not_keyword_order` (
  `c_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `not_keyword_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(256) DEFAULT NULL,
  `p_type` varchar(256) DEFAULT NULL,
  `p_image` varchar(256) DEFAULT NULL,
  `nutrition` varchar(256) DEFAULT NULL,
  `size` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `product`
--


INSERT INTO `product` (`p_id`, `p_name`, `p_type`, `p_image`, `nutrition`, `size`, `price`) VALUES
(1, 'banana', 'Food', 'images/banana.jpg', 'images/bananainfo.jpg', 2, '$0.50'),
(2, 'strawberry', 'Food', 'images/strawberry.jpg', 'images/strawberryinfo.jpg', 1, '$0.90'),
(3, 'orange', 'Food', 'images/orange.jpg', 'images/orangeinfo.jpg', 2, '$0.50'),
(4, '2% Milk', 'Drink', 'images/2milk.jpg', 'images/2%milkinfo.jpg', 2, '$2.50'),
(5, 'whole Milk', 'Drink', 'images/wholemilk.jpg', 'images/wholemilkinfo.jpg', 2, '$2.75'),
(6, 'apple', 'Food', 'images/apple.jpg', 'images/appleinfo.jpg', 2, '$0.75'),
(7, 'half and half milk', 'drink', 'images/half&half.jpg', 'images/half&halfinfo.jpg', 2, '$2.90'),
(8, 'chocolate milk', 'drink', 'images/chocolatemilk.jpg', 'images/chocolatemilkinfo.jpg', 1, '$3.50'),
(9, 'apple juice', 'drink', 'images/applejuice.jpeg', 'images/applejuiceinfo.jpg', 2, '$1.50'),
(10, 'orange juice', 'drink', 'images/orangejuice.jpg', 'images/orangejuiceinfo.jpg', 2, '$1.50'),
(11, 'pineapple juice', 'drink', 'images/pineapplejuice.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$1.50'),
(12, 'grape juice', 'drink', 'images/grapejuice.jpg', 'images/grapejuiceinfo.jpg', 2, '$1.50'),
(13, 'white bread', 'food', 'images/whitebread.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$2.25'),
(14, 'wheat bread', 'food', 'images/wheatbread.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$2.50'),
(15, 'multigrain bread', 'food', 'images/multigrainbread.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$2.90'),
(16, 'banana bread', 'food', 'images/bananabread.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$3.00'),
(17, 'beer', 'alcohol', 'images/beer.jpg', 'images/beerinfo.jpg', 2, '$2.00'),
(18, 'vodka', 'alcohol', 'images/vodka.jpg', 'images/vodkainfo.jpg', 2, '$20.00'),
(19, 'whiskey', 'alcohol', 'images/whiskey.jpg', 'images/whiskeyinfo.jpg', 2, '$15.00'),
(20, 'rum', 'alcohol', 'images/rum.jpg', 'images/ruminfo.jpg', 2, '$2.00');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `s_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pword` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `salary` decimal(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `p_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `w_id` bigint(20) UNSIGNED NOT NULL,
  `not_keyword_address` varchar(256) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ccard`
--
ALTER TABLE `ccard`
  ADD PRIMARY KEY (`cc_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `not_keyword_address`
--
ALTER TABLE `not_keyword_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `not_keyword_order`
--
ALTER TABLE `not_keyword_order`
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ccard`
--
ALTER TABLE `ccard`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `not_keyword_address`
--
ALTER TABLE `not_keyword_address`
  MODIFY `address_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `w_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ccard`
--
ALTER TABLE `ccard`
  ADD CONSTRAINT `ccard_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);

--
-- Constraints for table `not_keyword_order`
--
ALTER TABLE `not_keyword_order`
  ADD CONSTRAINT `not_keyword_order_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- ADDING PRODUCT TO DATABASE


