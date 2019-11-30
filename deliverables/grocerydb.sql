CREATE TABLE `ccard` (
 `c_id` int(11) DEFAULT NULL,
 `cc_expiration` varchar(256) DEFAULT NULL,
 `cvv` varchar(3) DEFAULT NULL,
 `address` varchar(100) NOT NULL,
 `cc_id` int(11) NOT NULL AUTO_INCREMENT,
 `cc_number` varchar(256) NOT NULL,
 PRIMARY KEY (`cc_id`),
 KEY `c_id` (`c_id`),
 CONSTRAINT `ccard_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4

CREATE TABLE `customer` (
 `c_id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(20) NOT NULL,
 `first` varchar(100) NOT NULL,
 `last` varchar(100) NOT NULL,
 `pword` varchar(100) NOT NULL,
 `balance` decimal(8,2) DEFAULT NULL CHECK (`balance` >= 0),
 `address` varchar(100) NOT NULL,
 PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4

CREATE TABLE `not_keyword_address` (
 `address_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `street_name` varchar(256) DEFAULT NULL,
 `city` varchar(256) DEFAULT NULL,
 `not_keyword_state` varchar(2) DEFAULT NULL,
 `zipcode` varchar(5) DEFAULT NULL,
 PRIMARY KEY (`address_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `not_keyword_order` (
 `c_id` int(11) DEFAULT NULL,
 `p_id` int(11) DEFAULT NULL,
 `not_keyword_status` varchar(10) DEFAULT NULL,
 KEY `c_id` (`c_id`),
 CONSTRAINT `not_keyword_order_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `customer` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `product` (
 `p_id` int(11) NOT NULL AUTO_INCREMENT,
 `p_name` varchar(256) DEFAULT NULL,
 `p_type` varchar(256) DEFAULT NULL,
 `p_image` varchar(256) DEFAULT NULL,
 `nutrition` varchar(256) DEFAULT NULL,
 `size` int(11) DEFAULT NULL CHECK (`size` > 0),
 `price` varchar(20) NOT NULL,
 PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4

CREATE TABLE `staff` (
 `s_id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(20) NOT NULL,
 `pword` varchar(100) NOT NULL,
 `first_name` varchar(20) NOT NULL,
 `last_name` varchar(20) NOT NULL,
 `address` varchar(100) DEFAULT NULL,
 `job_title` varchar(50) DEFAULT NULL,
 `salary` decimal(8,2) DEFAULT NULL,
 PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `stock` (
 `p_id` int(11) NOT NULL,
 `quantity` int(11) DEFAULT NULL CHECK (`quantity` >= 0),
 PRIMARY KEY (`p_id`),
 CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4

CREATE TABLE `warehouse` (
 `w_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
 `not_keyword_address` varchar(256) DEFAULT NULL,
 `quantity` int(11) DEFAULT NULL CHECK (`quantity` >= 0),
 PRIMARY KEY (`w_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4




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



-- SQL COMMANDS --
INSERT INTO stock (p_id, quantity)
SELECT p_id, 10
FROM product;

INSERT INTO `product` (`p_id`, `p_name`, `p_type`, `p_image`, `nutrition`, `size`, `price`) VALUES
(1, 'banana', 'Food', 'images/banana.jpg', 'images/bananainfo.jpg', 2, '$0.50'),
(2, 'strawberry', 'Food', 'images/strawberry.jpg', 'images/strawberryinfo.jpg', 1, '$0.90'),
(3, 'orange', 'Food', 'images/orange.jpg', 'images/orangeinfo.jpg', 2, '$0.50'),
(4, '2%milk', 'Drink', 'images/2milk.jpg', 'images/2%milkinfo.jpg', 2, '$2.50'),
(5, 'wholemilk', 'Drink', 'images/wholemilk.jpg', 'images/wholemilkinfo.jpg', 2, '$2.75'),
(6, 'apple', 'Food', 'images/apple.jpg', 'images/appleinfo.jpg', 2, '$0.75'),
(7, 'halfandhalfmilk', 'drink', 'images/half&half.jpg', 'images/half&halfinfo.jpg', 2, '$2.90'),
(8, 'chocolatemilk', 'drink', 'images/chocolatemilk.jpg', 'images/chocolatemilkinfo.jpg', 1, '$3.50'),
(9, 'applejuice', 'drink', 'images/applejuice.jpeg', 'images/applejuiceinfo.jpg', 2, '$1.50'),
(10, 'orangejuice', 'drink', 'images/orangejuice.jpg', 'images/orangejuiceinfo.jpg', 2, '$1.50'),
(11, 'pineapplejuice', 'drink', 'images/pineapplejuice.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$1.50'),
(12, 'grapejuice', 'drink', 'images/grapejuice.jpg', 'images/grapejuiceinfo.jpg', 2, '$1.50'),
(13, 'whitebread', 'food', 'images/whitebread.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$2.25'),
(14, 'wheatbread', 'food', 'images/wheatbread.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$2.50'),
(15, 'multigrainbread', 'food', 'images/multigrainbread.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$2.90'),
(16, 'bananabread', 'food', 'images/bananabread.jpg', 'images/pineapplejuiceinfo.jpg', 2, '$3.00'),
(17, 'beer', 'alcohol', 'images/beer.jpg', 'images/beerinfo.jpg', 2, '$2.00'),
(18, 'vodka', 'alcohol', 'images/vodka.jpg', 'images/vodkainfo.jpg', 2, '$20.00'),
(19, 'whiskey', 'alcohol', 'images/whiskey.jpg', 'images/whiskeyinfo.jpg', 2, '$15.00'),
(20, 'rum', 'alcohol', 'images/rum.jpg', 'images/ruminfo.jpg', 2, '$18.00');
