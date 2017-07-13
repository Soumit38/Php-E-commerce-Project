-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2017 at 05:34 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Soumit Kumar Kundu', 'admin', 'admin@gmail.com', '1234', 0),
(2, 'soumit', 'soumit', 'soumit@gmail.com', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE IF NOT EXISTS `tbl_brand` (
`brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(2, 'SAMSUNG'),
(3, 'Canon'),
(4, 'Dell'),
(5, 'HP'),
(6, 'ASUS'),
(7, 'Toshiba'),
(9, 'symphony-mobile'),
(10, 'Fast-track'),
(11, 'Piston'),
(12, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
`cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(1, 'kcv9uj6775j4d5p5ltfmif5606', 22, 'Wireless keyboard', 3000.00, 2, 'upload/dc749863d2.jpeg'),
(2, 'kcv9uj6775j4d5p5ltfmif5606', 18, 'AC', 60000.00, 1, 'upload/c555edb13f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
`catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(1, 'Desktop'),
(2, 'Mobile Phones'),
(3, 'Laptop'),
(4, 'Accessories'),
(5, 'Software'),
(6, 'Sports &amp; Fitness'),
(11, 'Beauty &amp; Health'),
(13, 'Desktop'),
(14, 'washing machine'),
(15, 'test'),
(16, 'Study');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE IF NOT EXISTS `tbl_customer` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `password`) VALUES
(1, 'Soumit', 'KUET', 'Khulna', 'Bangladesh', 9200, 1234, 'soumit@gmail.com', '1234'),
(2, 'souvik', '136/A ruppur aveneue', 'Rangpur', 'Bangladesh', 9200, 1234, 'souvik123@gmail.com', '1234'),
(3, 'kausar', 'uttara', 'dhaka', 'Bangladesh', 4500, 3546, 'kausar@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE IF NOT EXISTS `tbl_order` (
`id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`) VALUES
(3, 1, 18, 'AC', 2, 60000.00, 'upload/c555edb13f.jpg', '2017-06-27 21:27:23'),
(4, 1, 12, 'Speaker', 2, 3500.00, 'upload/72dad2e7b5.jpg', '2017-06-27 21:27:23'),
(5, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-06-27 21:41:44'),
(6, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-06-27 22:01:02'),
(7, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-06-27 22:05:12'),
(8, 1, 12, 'Speaker', 2, 7000.00, 'upload/72dad2e7b5.jpg', '2017-06-27 22:06:22'),
(9, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-27 22:06:22'),
(10, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-27 22:11:21'),
(11, 1, 12, 'Speaker', 1, 3500.00, 'upload/72dad2e7b5.jpg', '2017-06-27 22:11:21'),
(12, 1, 17, 'Iphone', 1, 49999.00, 'upload/9e65a7f666.png', '2017-06-27 22:11:21'),
(13, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-27 23:45:38'),
(14, 1, 12, 'Speaker', 1, 3500.00, 'upload/72dad2e7b5.jpg', '2017-06-27 23:45:38'),
(15, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-06-27 23:45:38'),
(16, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-29 09:41:44'),
(17, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-06-29 09:41:44'),
(18, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-29 09:46:05'),
(19, 1, 12, 'Speaker', 3, 10500.00, 'upload/72dad2e7b5.jpg', '2017-06-29 09:46:05'),
(20, 1, 17, 'Iphone', 1, 49999.00, 'upload/9e65a7f666.png', '2017-06-29 09:46:05'),
(21, 1, 12, 'Speaker', 2, 7000.00, 'upload/72dad2e7b5.jpg', '2017-06-29 09:47:13'),
(22, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-06-29 09:47:13'),
(23, 1, 16, 'Fridge', 2, 70000.90, 'upload/e121f4619a.png', '2017-06-29 09:47:13'),
(24, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-29 22:02:07'),
(25, 1, 12, 'Speaker', 3, 10500.00, 'upload/72dad2e7b5.jpg', '2017-06-29 22:02:07'),
(26, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-29 22:04:58'),
(27, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-06-29 22:16:20'),
(28, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-06-29 22:16:41'),
(29, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-29 22:18:45'),
(30, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-29 22:28:24'),
(31, 1, 12, 'Speaker', 4, 14000.00, 'upload/72dad2e7b5.jpg', '2017-06-29 22:28:24'),
(32, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-30 00:13:27'),
(33, 1, 18, 'AC', 2, 120000.00, 'upload/c555edb13f.jpg', '2017-06-30 00:18:29'),
(34, 1, 16, 'Fridge', 2, 70000.90, 'upload/e121f4619a.png', '2017-06-30 14:11:35'),
(35, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-06-30 14:11:35'),
(36, 1, 27, 'Router', 2, 6200.00, 'upload/9b4daa626b.jpg', '2017-07-04 23:23:11'),
(37, 1, 22, 'Wireless keyboard', 1, 3000.00, 'upload/dc749863d2.jpeg', '2017-07-04 23:23:11'),
(38, 1, 20, 'Watch', 2, 3200.00, 'upload/1f11ec300d.jpg', '2017-07-04 23:23:11'),
(39, 1, 8, 'Fan', 2, 4000.00, 'upload/c95ea0aebc.jpg', '2017-07-07 23:15:03'),
(40, 1, 20, 'Watch', 3, 4800.00, 'upload/1f11ec300d.jpg', '2017-07-07 23:15:03'),
(41, 1, 24, 'Printer', 1, 3600.00, 'upload/3864a0a46e.jpg', '2017-07-07 23:15:03'),
(42, 1, 25, 'Projector', 2, 82000.00, 'upload/60f0569388.png', '2017-07-07 23:16:38'),
(43, 1, 22, 'Wireless keyboard', 1, 3000.00, 'upload/dc749863d2.jpeg', '2017-07-07 23:16:39'),
(44, 1, 26, 'Headphone', 2, 3300.00, 'upload/4c57a03c22.jpg', '2017-07-07 23:38:48'),
(45, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-07-07 23:38:48'),
(46, 1, 26, 'Headphone', 1, 1650.00, 'upload/4c57a03c22.jpg', '2017-07-07 23:39:17'),
(47, 1, 20, 'Watch', 1, 1600.00, 'upload/1f11ec300d.jpg', '2017-07-07 23:39:17'),
(48, 1, 26, 'Headphone', 1, 1650.00, 'upload/4c57a03c22.jpg', '2017-07-07 23:42:35'),
(49, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-07-07 23:42:35'),
(50, 1, 26, 'Headphone', 1, 1650.00, 'upload/4c57a03c22.jpg', '2017-07-08 00:18:11'),
(51, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-07-08 00:18:12'),
(52, 1, 29, 'Webcam', 2, 7000.00, 'upload/90f42008fe.png', '2017-07-08 00:35:39'),
(53, 1, 27, 'Tablet pc', 2, 25200.00, 'upload/795c7d66aa.png', '2017-07-08 00:36:00'),
(54, 1, 29, 'Webcam', 1, 3500.00, 'upload/90f42008fe.png', '2017-07-08 00:36:19'),
(55, 1, 29, 'Webcam', 1, 3500.00, 'upload/90f42008fe.png', '2017-07-08 02:36:29'),
(56, 1, 27, 'Tablet pc', 2, 25200.00, 'upload/795c7d66aa.png', '2017-07-08 02:36:29'),
(57, 1, 26, 'Headphone', 1, 1650.00, 'upload/4c57a03c22.jpg', '2017-07-08 02:36:29'),
(58, 1, 22, 'Wireless keyboard', 1, 3000.00, 'upload/dc749863d2.jpeg', '2017-07-08 02:36:57'),
(59, 1, 27, 'Tablet pc', 3, 37800.00, 'upload/795c7d66aa.png', '2017-07-08 02:40:16'),
(60, 1, 26, 'Headphone', 2, 3300.00, 'upload/4c57a03c22.jpg', '2017-07-08 02:40:50'),
(61, 1, 22, 'Wireless keyboard', 1, 3000.00, 'upload/dc749863d2.jpeg', '2017-07-08 02:40:50'),
(62, 1, 27, 'Tablet pc', 2, 25200.00, 'upload/795c7d66aa.png', '2017-07-08 02:43:41'),
(63, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-07-08 02:43:41'),
(64, 1, 29, 'Webcam', 1, 3500.00, 'upload/90f42008fe.png', '2017-07-08 02:45:50'),
(65, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-07-08 02:45:50'),
(66, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-08 02:52:23'),
(67, 1, 27, 'Tablet pc', 3, 37800.00, 'upload/795c7d66aa.png', '2017-07-08 02:54:06'),
(68, 1, 16, 'Fridge', 2, 70000.90, 'upload/e121f4619a.png', '2017-07-08 02:54:06'),
(69, 1, 27, 'Tablet pc', 2, 25200.00, 'upload/795c7d66aa.png', '2017-07-08 03:10:27'),
(70, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-07-08 03:10:27'),
(71, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-08 03:10:55'),
(72, 1, 27, 'Tablet pc', 2, 25200.00, 'upload/795c7d66aa.png', '2017-07-08 03:10:55'),
(73, 1, 29, 'Webcam', 2, 7000.00, 'upload/90f42008fe.png', '2017-07-08 03:13:57'),
(74, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-08 03:13:57'),
(75, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-08 03:17:48'),
(76, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-08 03:17:48'),
(77, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-08 03:26:18'),
(78, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-08 03:26:18'),
(79, 1, 22, 'Wireless keyboard', 2, 6000.00, 'upload/dc749863d2.jpeg', '2017-07-08 14:27:13'),
(80, 1, 26, 'Headphone', 2, 3300.00, 'upload/4c57a03c22.jpg', '2017-07-08 14:27:13'),
(81, 1, 27, 'Tablet pc', 2, 25200.00, 'upload/795c7d66aa.png', '2017-07-08 14:43:56'),
(82, 1, 26, 'Headphone', 1, 1650.00, 'upload/4c57a03c22.jpg', '2017-07-08 14:43:56'),
(83, 1, 22, 'Wireless keyboard', 2, 6000.00, 'upload/dc749863d2.jpeg', '2017-07-08 14:57:15'),
(84, 1, 16, 'Fridge', 2, 70000.90, 'upload/e121f4619a.png', '2017-07-08 14:57:16'),
(85, 1, 22, 'Wireless keyboard', 2, 6000.00, 'upload/dc749863d2.jpeg', '2017-07-08 15:10:49'),
(86, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-08 15:10:49'),
(87, 1, 26, 'Headphone', 2, 3300.00, 'upload/4c57a03c22.jpg', '2017-07-09 01:33:02'),
(88, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-09 01:33:02'),
(89, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-07-09 01:33:02'),
(90, 1, 29, 'Webcam', 2, 7000.00, 'upload/90f42008fe.png', '2017-07-09 01:33:02'),
(91, 3, 27, 'Tablet pc', 2, 25200.00, 'upload/795c7d66aa.png', '2017-07-09 01:36:26'),
(92, 3, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-09 01:36:27'),
(93, 3, 26, 'Headphone', 1, 1650.00, 'upload/4c57a03c22.jpg', '2017-07-09 01:36:27'),
(94, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-09 10:10:31'),
(95, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-09 10:10:31'),
(96, 1, 26, 'Headphone', 1, 1650.00, 'upload/4c57a03c22.jpg', '2017-07-09 10:10:31'),
(97, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-09 10:11:18'),
(98, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-09 10:11:19'),
(99, 1, 26, 'Headphone', 1, 1650.00, 'upload/4c57a03c22.jpg', '2017-07-09 10:11:19'),
(100, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-09 11:50:09'),
(101, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-09 11:50:09'),
(102, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-09 11:50:45'),
(103, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-09 11:50:45'),
(104, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-09 12:01:25'),
(105, 1, 16, 'Fridge', 2, 70000.90, 'upload/e121f4619a.png', '2017-07-09 12:01:26'),
(106, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-09 12:03:21'),
(107, 1, 26, 'Headphone', 2, 3300.00, 'upload/4c57a03c22.jpg', '2017-07-09 12:03:21'),
(108, 1, 29, 'Webcam', 2, 7000.00, 'upload/90f42008fe.png', '2017-07-09 12:10:06'),
(109, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-07-09 12:10:06'),
(110, 1, 29, 'Webcam', 2, 7000.00, 'upload/90f42008fe.png', '2017-07-09 12:18:05'),
(111, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-07-09 12:18:05'),
(112, 1, 29, 'Webcam', 2, 7000.00, 'upload/90f42008fe.png', '2017-07-09 12:29:50'),
(113, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-07-09 12:29:50'),
(114, 1, 27, 'Tablet pc', 1, 12600.00, 'upload/795c7d66aa.png', '2017-07-09 12:45:38'),
(115, 1, 22, 'Wireless keyboard', 3, 9000.00, 'upload/dc749863d2.jpeg', '2017-07-09 12:45:38'),
(116, 1, 18, 'AC', 1, 60000.00, 'upload/c555edb13f.jpg', '2017-07-09 12:48:59'),
(117, 1, 16, 'Fridge', 2, 70000.90, 'upload/e121f4619a.png', '2017-07-09 12:48:59'),
(118, 1, 24, 'Printer', 2, 7200.00, 'upload/3864a0a46e.jpg', '2017-07-09 12:54:07'),
(119, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-07-09 12:54:07'),
(120, 1, 24, 'Printer', 2, 7200.00, 'upload/3864a0a46e.jpg', '2017-07-09 13:08:08'),
(121, 1, 16, 'Fridge', 1, 35000.45, 'upload/e121f4619a.png', '2017-07-09 13:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
`productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`, `time`) VALUES
(4, 'Blender', 4, 7, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 2000.00, 'upload/64ebe8774d.jpg', 2, '2017-06-30 08:02:45'),
(6, 'TV', 4, 7, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 24500.00, 'upload/969abf69ba.jpg', 2, '2017-06-30 08:02:45'),
(7, 'mobile', 4, 2, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 4440.00, 'upload/a40635feba.png', 2, '2017-06-30 08:02:45'),
(8, 'Fan', 4, 2, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 2000.00, 'upload/c95ea0aebc.jpg', 2, '2017-06-30 08:02:45'),
(12, 'Speaker', 4, 7, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32. The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 3500.00, 'upload/72dad2e7b5.jpg', 1, '2017-06-30 08:02:45'),
(13, 'Camera', 4, 3, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur', 23400.00, 'upload/bfb617141c.jpg', 2, '2017-06-30 08:02:45'),
(16, 'Fridge', 4, 2, 'Samsung Group is a South Korean multinational conglomerate headquartered in Samsung Town, Seoul. It comprises numerous affiliated businesses, most of them united under the Samsung brand, and is the largest South Korean chaebol', 35000.45, 'upload/e121f4619a.png', 2, '2017-06-30 08:02:45'),
(17, 'Iphone', 2, 5, 'Iphone laptop Looking for a great value or laptop deals? The HP Pavilion Laptop comes loaded with the features you need to make the most of every spark of inspiration. If you need versatility, HP''s 2 in 1 laptops are thin, light and versatile and delivers the battery life to get it done. HP and Pavilion X360 offer 4 modes of operation, but Spectre and Envy X360 families may be considered our best 2 in 1 laptops. The award-winning HP Spectre premium 360 is convertible with next-level features that give you all-day portability in a stunning, ultra-thin design.', 49999.00, 'upload/9e65a7f666.png', 2, '2017-06-30 08:02:45'),
(18, 'AC', 4, 2, 'Samsung lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus ad aliquid modi blanditiis provident, rem similique reprehenderit eligendi distinctio sint, animi ullam. Fugit sunt pariatur totam placeat animi voluptatibus facere.', 60000.00, 'upload/c555edb13f.jpg', 1, '2017-06-30 08:02:45'),
(24, 'Printer', 4, 3, 'Type: Fine cartridge Number of Nozzles: 1280 nozzles Ink Droplet Size: 2pl Ink End Sensor: Dot count Print Head Alignment: Manual Scanner Type: Flatbed Line Scanning Speed: 1.2ms per line at 300 DPI grayscale printing', 3600.00, 'upload/3864a0a46e.jpg', 2, '2017-06-30 08:02:45'),
(25, 'Projector', 4, 7, '50% BRIHTER THAN ORDINARY LED PROJECTOR: DBPOWER lcd mini projector is ideal for home entertainment in dark, more brighter than ordinary led projectors. NOT RECOMMEND for PPT or business presentation. \r\n UPDATED FAN SOUND AND SYSTEM: DBPOWER video projector is equipped with an innovative cooling system with heat dispersion, as well as the fan sound cut in half with noise suppression. \r\n AMAZING WATCHING EXPERIENCE: 32&amp;rdquo;-176&amp;rdquo; with projector distance 1.5m-5m, the best projector distance is about 2-2.5m with the image size of 130&amp;rdquo;, which can make you enjoy best watching experience. \r\n CONNECTING YOUR PHONE: With wireless HDMI dongle(not included), you can connect your smartphone (support MHL function)/ ipad to the projector, perfect and convenient for home entertainment.', 41000.00, 'upload/60f0569388.png', 1, '2017-06-30 08:02:45'),
(26, 'Headphone', 4, 11, 'Integrated microphone &amp;amp; call button \r\n Perfect in-ear seal blocks out external noise \r\n 1.2m long cable that is ideal for outdoor use \r\n Rubberized cable relief enhances durability', 1650.00, 'upload/4c57a03c22.jpg', 1, '2017-06-30 08:02:45'),
(29, 'Webcam', 4, 3, 'Full HD 1080p video calling (up to 1920 x 1080 pixels) with the latest version of Skype for Windows \r\n 720p HD video calling (up to 1280 x 720 pixels) with supported clients. Full HD video recording (up to 1920 x 1080 pixels) \r\n H.264 video compression, Built-in dual stereo mics with automatic noise reduction. Automatic low-light correction, Tripod-ready universal clip fits laptops, LCD or monitors \r\n H.264 video compression, Built-in dual stereo mics with automatic noise reduction. controls: Video and photo capture, Face tracking, Motion detection \r\n Compatible with: Windows 7, Windows 8, Windows 10 or later. Works in USB Video Device Class (UVC) mode: Mac OS 10.6 or later (HD 720p on FaceTime for Mac or other supported video-calling clients; Full HD 1080p video recording with QuickTime Player) Chrome OS,Android v 5.0 or above (with supported video-calling clients),USB port,Internet connection', 3500.00, 'upload/90f42008fe.png', 1, '2017-07-07 18:34:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
 ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
 ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
 ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=122;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
