-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2018 at 04:28 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Jewellery'),
(2, 'Cosmetics'),
(3, 'Apparels'),
(4, 'Garments'),
(5, 'Handmade'),
(6, 'Kitchen Assesories'),
(7, 'Socks'),
(8, 'Interiors');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `vendor` varchar(50) NOT NULL,
  `order_bitcoin_address` text NOT NULL,
  `order_unique_id` varchar(500) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` float NOT NULL,
  `order_total` float NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `order_address` text NOT NULL,
  `order_additional_info` text NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `ordered_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `vendor`, `order_bitcoin_address`, `order_unique_id`, `product_id`, `price`, `quantity`, `order_total`, `payment_method_id`, `order_address`, `order_additional_info`, `order_status`, `ordered_at`) VALUES
(45, '0', 'aliusmanabbasi', '2Mwc86AVfCJ2SzC4TCqeHW1wXgWkQMMigNw', '23nassuhroontoisabbanamsuila20180321084330', 23, 0.2, 1, 0.2, 1, 'qweqweq', 'weqeqe', 'pending', '2018-03-21 08:43:37'),
(46, '0', 'aliusmanabbasi', '2NFbEpmdwW5FxUEJuG3ymAoBcZK6HX1NCgc', '23nassuhroontoisabbanamsuila20180321101851', 23, 0.2, 1, 0, 1, 'ad', 'asdasd', 'pending', '2018-03-21 10:18:55'),
(47, '0', 'aliusmanabbasi', '2N8JA1sRedzLRDYzJN5r13oztyiGADnDv5s', '23nassuhroontoisabbanamsuila20180324074928', 23, 0.2, 5, 0, 1, '151515', '15151515', 'pending', '2018-03-24 07:49:38'),
(48, 'test2', 'aliusmanabbasi', '2NAFLvA5dFiYAapqzcBTt3PArTKMtV2eYzw', '232tsettoisabbanamsuila20180330124148', 23, 0.2, 1, 0.2, 1, 'test 123', 'test123', 'pending', '2018-03-30 12:42:02'),
(49, 'test2', 'aliusmanabbasi', '2NDE3csb4t17rhb8SJHpfF6Rf5xzq2an5Nb', '232tsettoisabbanamsuila20180330124222', 23, 0.2, 1, 0.2, 1, 'test123', 'test123', 'pending', '2018-03-30 12:42:33'),
(50, 'test2', 'aliusmanabbasi', '2N7EzuQaTQ6jkCgoXxaGedVeVsu5h7sJEgZ', '242tsettoisabbanamsuila20180330124249', 24, 23, 1, 23, 1, 'test123', '', 'pending', '2018-03-30 12:42:57'),
(51, 'test2', 'aliusmanabbasi', '2My3Ae3UimvcLKjDa7TFsftnfx7o8E5qQqh', '232tsettoisabbanamsuila20180330124325', 23, 0.2, 1, 0.2, 1, 'kllk', '', 'pending', '2018-03-30 12:43:30'),
(52, 'test2', 'aliusmanabbasi', '2N9mkJxooLkDR2Ts5VE71s2W2gCb7QL9Bqm', '232tsettoisabbanamsuila20180330124343', 23, 0.2, 1, 0.2, 1, 'test123', '', 'pending', '2018-03-30 12:43:50'),
(53, 'test2', 'test2', '2N1tZrwpNbFKxG6gzxDkMjiTzoqMYQ9TJPk', '342tsetto2tset20180330124539', 34, 0.002, 1, 0.002, 1, '123test ave.', '', 'pending', '2018-03-30 12:45:56'),
(54, 'test2', 'test2', '2MzxckCjWqWYvNe9vndnnkXBgC6Wx4Zvg28', '342tsetto2tset20180330124610', 34, 0.002, 1, 0.002, 1, 'test4556', '', 'pending', '2018-03-30 01:33:08'),
(55, 'test2', 'aliusmanabbasi', '2N94qcmDAusRuPwNX94bz8dksW3cWUjkLup', '232tsettoisabbanamsuila20180401055501', 23, 0.2, 1, 0.2, 1, 'test', '', 'pending', '2018-04-01 05:55:14'),
(56, 'test2', 'aliusmanabbasi', '2NBHcTCoYNd8kKbKcd8FJRq4W9FRTnPWNFS', '232tsettoisabbanamsuila20180403071704', 23, 0.2, 1, 0.2, 1, 'test', '', 'pending', '2018-04-03 07:17:14'),
(57, 'noorhussan', 'aliusmanabbasi', '2Mx4HgMMpnqscKBgRJGH1RtjcW8XpjfSGp5', '23nassuhroontoisabbanamsuila20180403120221', 23, 0.2, 4, 0.8, 1, 'add', 'in', 'pending', '2018-04-03 12:02:29'),
(58, 'test2', 'aliusmanabbasi', '2MtTADgaFjtF8QeUrYcLwutABn5ptPpf6WR', '232tsettoisabbanamsuila20180404113734', 23, 0.2, 1, 0.2, 1, 't', '', 'pending', '2018-04-04 11:37:43'),
(59, 'test2', 'aliusmanabbasi', '2N5hAPj9MFMDCngL45LXaWG8UUG1dSSSJEg', '232tsettoisabbanamsuila20180404113827', 23, 0.2, 1, 0.2, 1, '4', '', 'pending', '2018-04-04 11:38:35'),
(60, 'noorhussan', 'aliusmanabbasi', '2MwjktDDwxqFo67hekccuHwLiWJpAMkNKV6', '23nassuhroontoisabbanamsuila20180407041755', 23, 0.2, 5, 1, 1, 'qweqewqwe', '13123123', 'pending', '2018-04-07 04:18:00'),
(61, 'aliusmanabbasi', 'aliusmanabbasi', '2N5wntrFwfSnmPmTg7FDPpa9foBJ8HBZYf9', '23isabbanamsuilatoisabbanamsuila20180418090439', 23, 0.2, 1, 0.2, 1, 'qweqwe', 'qweqweqe', 'pending', '2018-04-18 09:04:44'),
(62, 'test2', 'test2', '2N8mZpQdgYcqohVQaMD6tcahMveTNgwKVZV', '342tsetto2tset20180501032924', 34, 0.002, 1, 0.002, 1, 'test', '', 'pending', '2018-05-01 03:29:38'),
(63, 'test2', 'aliusmanabbasi', '2NBY9B8SnXXSQTKzqJqWYAKf2pk1kQC2DaZ', '232tsettoisabbanamsuila20180501033736', 23, 0.2, 1, 0.2, 1, 'test', '', 'pending', '2018-05-01 03:37:43'),
(64, 'test3', 'aliusmanabbasi', '38eUAfKbnDNQcY4HV4xzy5AaVf6TP6Vq5N', '233tsettoisabbanamsuila20180501040207', 23, 0.2, 1, 0.2, 1, 'test', 'test', 'pending', '2018-05-01 04:02:23'),
(65, 'test2', 'aliusmanabbasi', '3LEu4Mi8PJbWvZN6cgcxF6bLLQ39hvrZoK', '272tsettoisabbanamsuila20180501041516', 27, 15, 1, 15, 1, 'test', 'test', 'pending', '2018-05-01 04:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_reviews`
--

CREATE TABLE `order_reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `vendor_id` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `items_delivered` tinyint(1) NOT NULL,
  `review_title` varchar(250) NOT NULL,
  `review_description` varchar(500) NOT NULL,
  `review_rating` int(11) NOT NULL,
  `rated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_reviews`
--

INSERT INTO `order_reviews` (`review_id`, `user_id`, `vendor_id`, `product_id`, `items_delivered`, `review_title`, `review_description`, `review_rating`, `rated_on`) VALUES
(1, '2', '3', 4, 1, 'Awesome Product', 'This is an awesome beginner minimalist mechanical keyboard. I\'m already getting the hang of the fn keys for the arrows and such, and its way worth it for the minimalist. Driver CD came with it, but it already works great out of the box.', 5, '2018-03-19 00:00:00'),
(2, 'noorhussan', 'aliusmanabbasi', 23, 1, 'Great Quality Product', 'This is an awesome beginner minimalist mechanical keyboard. I\'m already getting the hang of the fn keys for the arrows and such, and its way worth it for the minimalist. Driver CD came with it, but it already works great out of the box.', 1, '2018-03-26 10:49:45'),
(3, 'noorhussan', 'aliusmanabbasi', 23, 1, 'WOW!!! Amazing Product', 'This is an awesome beginner minimalist mechanical keyboard. I\'m already getting the hang of the fn keys for the arrows and such, and its way worth it for the minimalist. Driver CD came with it, but it already works great out of the box.', 5, '2018-03-26 01:38:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `short_description` varchar(200) DEFAULT NULL,
  `meta_tags` varchar(250) DEFAULT NULL,
  `vendor` varchar(150) NOT NULL,
  `requires_fe` tinyint(1) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `price`, `description`, `short_description`, `meta_tags`, `vendor`, `requires_fe`, `product_type`, `category_id`) VALUES
(23, 'Sephla 14k White Gold Plated Forever Lover Heart Pendant Necklace', '5a480361773cf4-49125897.jpg', 0.2, 'This item does not ship to . Please check other sellers who may ship internationally. Learn more\r\nSold by sephla and Fulfilled by us. Gift-wrap available.', 'High polish finish and set with flawless cubic zir', 'necklace, pendant', 'aliusmanabbasi', 1, 'physical', 1),
(24, 'The Design of Design: Essays from a Computer Scientist 1st Edition', '5a48b07dcbf589-88460846.jpg', 23, 'Ships from and sold by us. Gift-wrap available.\r\nThis item ships to PK. Learn more', 'Making Sense of Design\r\nEffective design is at the', 'books, text, for sale,', 'aliusmanabbasi', 1, 'physical', 2),
(25, 'Breville BES870XL Barista Express Espresso Machine', '5a48b3e2a6aaa2-30901539.jpg', 430, 'Available from these sellers.\r\nPackaging may reveal contents. Choose Conceal Package at checkout.\r\nColor: Stainless Steel', '15 Bar Italian Pump and 1600W Thermo coil heating ', 'coffee, kitchen', 'aliusmanabbasi', 1, 'physical', 3),
(26, 'handmade Genuine Leather case for iphone 7 plus /8 plus leather case for iphone 7 / 8 leather wallet for iphone X', '5a48b532594401-41125377.jpg', 39, 'This phone wallet case is made from high-quality genuine distressed cowhide ,Hand sew with thick waxed thread ,so the amazing hand stitch is the one of most feature for this phone wallet', '****************************************\r\nThis pho', 'leather, handmade', 'aliusmanabbasi', 1, 'physical', 4),
(27, 'NIKE Performance Cushion Crew Socks with Band (6 Pairs)', '5a48b5808e3b70-18569079.jpg', 15, 'Get $50 off instantly: Pay $0.00 upon approval for the Amazon Rewards Visa Card.', 'Get $50 off instantly: Pay $0.00 upon approval for', 'socks, nike', 'aliusmanabbasi', 1, 'physical', 5),
(28, 'Durafit Seat Covers 2004-2008 Ford F150 Xcab Front 40/20/40.Seat belts come from top of seat, NOT FOR DOUBLE CAB XD3 Waterproof Camo Endura', '5a48b5b70b0925-20186162.jpg', 119, 'Get $50 off instantly: Pay $69.00 upon approval for the abc Rewards Visa Card.\r\nOnly 12 left in stock - order soon.\r\nThis item ships to us\r\nShips from and sold by Durafit Seat Covers.', '2004-2008 Ford F150 XLT Super Cab Exact Fit Seat C', 'seats, interior', 'aliusmanabbasi', 1, 'physical', 6),
(29, 'eGift Cards', '5a4a283eca0385-03989676.png', 200, 'cards', 'New Year cards ', 'cards, new year', 'aliusmanabbasi', 1, 'physical', 5),
(31, 'eGift Cards NEW', '5a4a29d3bdcc05-58640463.png', 25, 'cards', 'new year cards', 'cards', 'aliusmanabbasi', 1, 'physical', 5),
(32, 'eGift Cards NEW 02', '5a4a2bb927eb60-41640687.png', 25, 'cards', 'new year cards', 'cards', 'aliusmanabbasi', 1, 'physical', 5),
(33, 'test', '', 10, 'test', 'test', '', 'test2', 0, 'physical', 1),
(34, 'test22', '', 0.002, 'test', 'test', '', 'test2', 0, 'physical', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_meta`
--

CREATE TABLE `product_meta` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `meta_key` varchar(50) NOT NULL,
  `meta_value` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_meta`
--

INSERT INTO `product_meta` (`id`, `product_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'quantity', '15'),
(2, 32, 'quantity', '25'),
(3, 33, 'quantity', '1'),
(4, 34, 'quantity', '10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `password_hash` varchar(250) NOT NULL,
  `pin` varchar(20) DEFAULT NULL,
  `public_key` varchar(8000) DEFAULT NULL,
  `referral_code` varchar(150) DEFAULT NULL,
  `2fa_enabled` tinyint(1) DEFAULT NULL,
  `profile_image` varchar(250) DEFAULT NULL,
  `referral` varchar(150) DEFAULT NULL,
  `btc_payment_address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password_hash`, `pin`, `public_key`, `referral_code`, `2fa_enabled`, `profile_image`, `referral`, `btc_payment_address`) VALUES
(27, 'romeo', '$2y$10$gq4VIUJkM/BSChYAZw6CbuHLmueH4NRks0XVDsK7U1GlzORrvoMt.', '1234', '-----BEGIN PGP PUBLIC KEY BLOCK-----\r\n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\r\n/8TDmfQoQ+zIMTmcQLklbME=\r\n=WffV\r\n-----END PGP PUBLIC KEY BLOCK-----\r\n', 'aliusman', 1, NULL, 'romeo5', 'A222SUT7PckXnL39ok1ra5wzuUCrEHu1S00 '),
(28, 'test1', '$2y$10$gq4VIUJkM/BSChYAZw6CbuHLmueH4NRks0XVDsK7U1GlzORrvoMt.', '1234', '-----BEGIN PGP PUBLIC KEY BLOCK-----\r\n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\r\n/8TDmfQoQ+zIMTmcQLklbME=\r\n=WffV\r\n-----END PGP PUBLIC KEY BLOCK-----\r\n', '', 1, '', 'test111', 'A222SUT7PckXnL39ok1ra5wzuUCrEHu1S00 '),
(29, 'aliusman', '$2y$10$ZRSunhkMVJQJrhwNkLP0mupRzY3lBqtxDUZwJ7ogxoqT3OXvn0TeK', '8800', NULL, 'romeo', NULL, '', 'aliusman11', 'A222SUT7PckXnL39ok1ra5wzuUCrEHu1S00 '),
(32, 'rsp.stealth', '$2y$10$fQhf7CKEhZO5KYZf4u4cpeEtGw7S.g0Wpur1ZvwvEECSkTFQ19mwC', '8800', NULL, '', NULL, NULL, 'rsp.stealth11', 'A222SUT7PckXnL39ok1ra5wzuUCrEHu1S00 '),
(33, 'aliusman2018', '$2y$10$RqAX.JXfDfZV98ImZ9B2Q.4OLKigJpJLRxhq.3PghKcwLe6cPilOS', '8800', NULL, '', NULL, NULL, 'aliusman201814', 'A222SUT7PckXnL39ok1ra5wzuUCrEHu1S00 '),
(34, 'aliusmanabbasi', '$2y$10$D6uYVxFmY/9by6qeLtmef.SKQCaTwOceJlm4/Hcl0d3T6Bmljt1cG', '8800', NULL, '', NULL, '5a3f50bf055df2.33907106.png', 'aliusmanabbasi13', 'A222SUT7PckXnL39ok1ra5wzuUCrEHu1S00 '),
(36, 'romeostealth', '$2y$10$qe7bSVoaNN/fCTxFYGJnrOBTraYzfvqibAIYhr4U4LVsf6yAq0z3q', '8800', NULL, '', NULL, NULL, 'romeostealth15', 'A222SUT7PckXnL39ok1ra5wzuUCrEHu1S00 '),
(37, 'noorhussan', '$2y$10$HGT06DIWW2QwZh6Tn3uXhO.XGNJaHgIukBcpsFc6XIdl2FCzCZc3a', '8800', NULL, '', NULL, NULL, 'noorhussan8', 'A222SUT7PckXnL39ok1ra5wzuUCrEHu1S00 '),
(38, 'peero', '$2y$10$YAi//vfEMXiTEUCN31albudGTo6n4UAMTDNWncu1r2gM59QCyqjxC', '9900', NULL, '', NULL, NULL, 'peero15', '2NEkawVj3S8XzxFytYDPHvK1yBvxYvkVuBR'),
(39, 'test3', '$2y$10$wii0/W1vky9BaQmP2RKTEeIKolgF3HztDpWv6UqA3nKskHl1Y9AqC', '0000', NULL, '', NULL, NULL, 'test39', '3LTrZNTdQBRGW9mVnWvcBzgsnnVZZ1rJpZ'),
(40, 'test2', '$2y$10$X88OYyoBnqfwVmeBQPzjoua3Cd4J1BitF64kMQ9co/d5Ks.2/RUiq', '1234', NULL, '', NULL, NULL, 'test28', '3LW7uhnuSm1rG4K8Lkzax9RXJnFkg3nJWp');

-- --------------------------------------------------------

--
-- Table structure for table `user_feedbacks`
--

CREATE TABLE `user_feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `vendor_id` varchar(250) NOT NULL,
  `feedback_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_feedbacks`
--

INSERT INTO `user_feedbacks` (`id`, `user_id`, `vendor_id`, `feedback_value`) VALUES
(1, 'noorhussan', 'aliusmanabbasi', 2),
(2, 'aliusman', 'aliusmanabbasi', 2),
(3, 'romeo', 'aliusmanabbasi', 1),
(4, 'rsp.stealth', 'aliusmanabbasi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `meta_key` varchar(50) NOT NULL,
  `meta_value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 34, 'user_description', 'manufactures exact fit seats covers for 2000 vehicles to every detail of their interiors. So you have an interior, which is easy to clean, maintain and look good.. So check if there is a listing for your vehicle and get a well protected interior for a very competative price, direct from the factory.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_reviews`
--
ALTER TABLE `order_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `product_meta`
--
ALTER TABLE `product_meta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_feedbacks`
--
ALTER TABLE `user_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `order_reviews`
--
ALTER TABLE `order_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `product_meta`
--
ALTER TABLE `product_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user_feedbacks`
--
ALTER TABLE `user_feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_meta`
--
ALTER TABLE `user_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
