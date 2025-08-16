-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 16, 2025 at 12:02 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ice-cream-shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `online-order`
--

DROP TABLE IF EXISTS `online-order`;
CREATE TABLE IF NOT EXISTS `online-order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `productid` bigint NOT NULL,
  `productname` varchar(2500) NOT NULL,
  `image_path` varchar(2500) NOT NULL,
  `quantity` int NOT NULL,
  `mobile` bigint NOT NULL,
  `delivery-time` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `bill` bigint NOT NULL,
  `payment` varchar(250) NOT NULL,
  `seller_id` bigint NOT NULL,
  `sellername` varchar(250) NOT NULL,
  `seller_mail` varchar(250) NOT NULL,
  `seller_mobile` bigint NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `online-order`
--

INSERT INTO `online-order` (`id`, `username`, `mail`, `productid`, `productname`, `image_path`, `quantity`, `mobile`, `delivery-time`, `status`, `bill`, `payment`, `seller_id`, `sellername`, `seller_mail`, `seller_mobile`, `time`) VALUES
(1, 'vinith', 'vinith356@gmail.com', 4, 'vanilla cake', '../../upload/imageimg.jpeg', 2, 936130789, '30 to 45', 'delivered', 2550, 'paid', 13, 'vinith', 'seller1@gmail.com', 9087315789, '2025-08-15 06:54:59'),
(2, 'vinith', 'academy56@gmail.com', 2, 'cup ice', '../../upload/imageimg7.jpeg', 3, 936130789, '15 to 30', 'taken', 428, 'not paid', 11, 'vinith', 'vinith3561401@gmail.com', 9087315789, '2025-08-16 11:09:08'),
(3, 'vinith', 'academy56@gmail.com', 4, 'vanilla cake', '../../upload/imageimg.jpeg', 5, 936130789, '30 to 45', 'delivered', 6375, 'paid', 13, 'vinith', 'seller1@gmail.com', 9087315789, '2025-08-16 11:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `online-product`
--

DROP TABLE IF EXISTS `online-product`;
CREATE TABLE IF NOT EXISTS `online-product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `seller_id` bigint NOT NULL,
  `image_path` varchar(2500) NOT NULL,
  `name` varchar(250) NOT NULL,
  `flavour` varchar(250) NOT NULL,
  `price` int NOT NULL,
  `discount` int NOT NULL,
  `brand` varchar(1000) NOT NULL,
  `time` varchar(200) NOT NULL,
  `shop_name` varchar(1500) NOT NULL,
  `location` varchar(5000) NOT NULL,
  `mail` varchar(2500) NOT NULL,
  `mobile` int NOT NULL,
  `status` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `online-product`
--

INSERT INTO `online-product` (`id`, `seller_id`, `image_path`, `name`, `flavour`, `price`, `discount`, `brand`, `time`, `shop_name`, `location`, `mail`, `mobile`, `status`, `created_at`) VALUES
(1, 13, '../../upload/imageimg9.jpeg', 'fruit ice cone', 'chocolate', 1500, 15, 'ibaco', '15 to 30', 'vinith', 'karur ', 'vinith@gmail.com', 123045687, 'approve', '2025-08-10 06:31:52'),
(2, 11, '../../upload/imageimg7.jpeg', 'cup ice', 'strawberry', 150, 5, 'new', '15 to 30', 'ice world', 'chennai', 'vinith35@gmail.com', 56767, 'approve', '2025-08-10 07:14:10'),
(3, 13, '../../upload/imageimg8.jpeg', 'chocolate ice', 'chocolate', 150, 5, 'new', '15 to 30', 'ice world', 'chennai', 'vinith35@gmail.com', 253236, 'approve', '2025-08-15 06:32:18'),
(4, 13, '../../upload/imageimg.jpeg', 'vanilla cake', 'vanilla', 1500, 15, 'amul', '30 to 45', 'ice world', 'chennai', 'vinith35@gmail.com', 252752, 'approve', '2025-08-15 06:33:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `mail` varchar(500) NOT NULL,
  `productid` bigint NOT NULL,
  `productname` varchar(500) NOT NULL,
  `quantity` int NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `bill` bigint NOT NULL,
  `payment` varchar(150) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `mail`, `productid`, `productname`, `quantity`, `image_path`, `status`, `bill`, `payment`, `order_date`) VALUES
(1, 'vinith', 'academy56@gmail.com', 2, 'Drak Art', 5, '../upload/imageimg8.jpeg', 'delivered\r\n', 2500, 'not paid', '2025-08-11 15:47:03'),
(2, 'vinith', 'academy56@gmail.com', 2, 'Drak Art', 2, '../upload/imageimg8.jpeg', 'delivered', 5000, 'paid', '2025-08-11 15:50:26'),
(3, 'vinith', 'academy56@gmail.com', 4, 'white ice', 5, '../upload/imageimg.jpeg', ' pending', 10000, 'not paid', '2025-08-11 15:57:37'),
(4, 'vinith', 'vinith356140@gmail.com', 4, 'white ice', 6, '../upload/imageimg.jpeg', ' pending', 12000, 'not paid', '2025-08-11 16:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `flavour` varchar(250) NOT NULL,
  `price` bigint NOT NULL,
  `discount` int NOT NULL,
  `type` varchar(250) NOT NULL,
  `brand` varchar(1000) NOT NULL,
  `image_path` longtext NOT NULL,
  `product-added-time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `flavour`, `price`, `discount`, `type`, `brand`, `image_path`, `product-added-time`) VALUES
(2, 'Drak Art', 'chocolate', 2000, 25, 'cups', 'ibaco', '../upload/imageimg8.jpeg', '2025-07-27 11:32:15');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
CREATE TABLE IF NOT EXISTS `register` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(230) NOT NULL,
  `password` varchar(50) NOT NULL,
  `number` bigint NOT NULL,
  `role` varchar(200) NOT NULL,
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `number`, `role`, `register_time`) VALUES
(1, 'vinith', 'vinith35614@gmail.com', '$2y$10$26RESj5Ff5CIrjG.69A2iO6xa5xZmJnAJpCidIGWaln', 2147483647, 'seller', '2025-07-26 06:38:31'),
(2, 'vinith', 'vinithvin35614@gmail.com', '$2y$10$IrpGTlBLxpHvhH6tBk9LBO.TwAyfLf2E4O5ddlP70wa', 2147483647, 'user', '2025-07-26 06:40:06'),
(3, 'vinith', 'mythili12345@gmail.com', '$2y$10$9U07VsEMkpEUIS5NmCWTnOhVfwyDP.YZLCqz/W6Rwmf', 9087315789, 'seller', '2025-07-26 06:42:49'),
(4, 'vinith', 'lll@gmail.com', '$2y$10$PykvNCm0uQA5hD5P4fSgn.QOn6TYP4FYY6ZAe23LxTK', 9087315789, 'user', '2025-07-26 06:50:35'),
(5, 'vinith', 'vinithmythili@gmail.com', '1230', 9087315789, 'seller', '2025-07-26 06:52:27'),
(6, 'vinith', 'hello123456@gmail.com', '1230', 9087315789, 'user', '2025-07-26 06:58:19'),
(7, 'vinith', 'academy@gmail.com', '12345', 123045678, 'user', '2025-07-26 08:18:50'),
(8, 'vinith', 'academy12@gmail.com', '1230', 9087315789, 'seller', '2025-07-26 08:22:10'),
(9, 'admin', 'admin123@gmail.com', 'admin123', 123456, 'admin', '2025-07-27 10:38:43'),
(10, 'vinith', 'vinith356140@gmail.com', '1230', 9087315789, 'user', '2025-07-28 05:54:04'),
(11, 'vinith', 'vinith3561401@gmail.com', '1230', 9087315789, 'seller', '2025-07-28 05:55:13'),
(12, 'vinith', 'academy56@gmail.com', '120', 9087315789, 'user', '2025-08-08 15:38:00'),
(13, 'vinith', 'seller1@gmail.com', '1230', 9087315789, 'seller', '2025-08-10 06:06:28'),
(14, 'vinith', 'vinith356@gmail.com', '1230', 9087315789, 'user', '2025-08-15 06:24:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
