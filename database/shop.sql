-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2018 at 03:48 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  `level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `level`) VALUES
(1, 'Ivan', 'admin', 'itusek.os@gmail.com', 'ab18905cb04578edcd175bd4ef9902ec', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`) VALUES
(1, 'Acer'),
(2, 'SAMSUNG'),
(3, 'CANON'),
(4, 'IPHONE'),
(5, 'NIKON'),
(6, 'NOKIA'),
(7, 'Lenovo');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `sId`, `productId`, `productName`, `price`, `quantity`, `image`) VALUES
(9, 'g5ghm7v63jbble8ojljqcrerb1', 7, 'Samsung 14\" Laptop', 300, 1, 'uploads/9bf756c416.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`) VALUES
(1, 'Mobile Phones'),
(2, 'Desktop'),
(3, 'Laptop'),
(4, 'Accessories'),
(5, 'Sport'),
(6, 'Cloth'),
(7, 'Software'),
(8, 'Footware'),
(9, 'Jewellery'),
(10, 'Toys, Kids &amp; Babies'),
(11, 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(2, 'Customer One', 'Zagrebacka 8', 'Osijek', 'Croatia', '31221', '09876543214', 'dead.night7@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `body` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `catId`, `brandId`, `body`, `price`, `image`, `type`) VALUES
(1, 'iphone 6s', 1, 4, '<p>product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here&nbsp;product details here v</p>', 250.00, 'uploads/72192e968f.png', 0),
(2, 'Fridge', 4, 2, '<p>product details here</p>', 505.00, 'uploads/258567a8de.jpg', 1),
(3, 'Canon camera', 4, 3, '<p>canon camera details</p>', 300.00, 'uploads/c979839b4f.png', 0),
(4, 'monitor', 2, 1, '<p>acer monitor 22\"</p>', 100.00, 'uploads/0d7300b9cf.jpg', 0),
(6, 'speakers', 4, 2, 'Speakers systems', 150.00, 'uploads/b4973dd629.jpg', 1),
(7, 'Samsung 14\" Laptop', 3, 2, 'samsung laptop,\n14\" screen, 1TB Hard Disk drive...', 300.00, 'uploads/9bf756c416.jpg', 0),
(8, 'Blender', 11, 2, '700 watt Blender,\n2 Power option,1 year warrenty', 30.00, 'uploads/43f93de583.png', 1),
(9, 'Surround Speakers', 11, 2, '<p>1000 watt surround home cinea, made in china, Remote controlled</p>', 250.00, 'uploads/918d314685.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `cmrId`, `productId`, `productName`, `quantity`, `price`, `image`, `date`, `status`) VALUES
(4, 2, 4, 'monitor', 1, 100.00, 'uploads/0d7300b9cf.jpg', '2018-02-27 12:44:59', 2),
(7, 2, 8, 'Blender', 4, 120.00, 'uploads/43f93de583.png', '2018-02-27 12:44:59', 0),
(8, 2, 9, 'Surround Speakers', 5, 1250.00, 'uploads/918d314685.jpg', '2018-02-27 12:44:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wlist`
--

CREATE TABLE `wlist` (
  `id` int(11) NOT NULL,
  `cmrId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wlist`
--

INSERT INTO `wlist` (`id`, `cmrId`, `productId`, `productName`, `price`, `image`) VALUES
(3, 2, 7, 'Samsung 14\" Laptop', 300.00, 'uploads/9bf756c416.jpg'),
(4, 2, 4, 'monitor', 100.00, 'uploads/0d7300b9cf.jpg'),
(5, 2, 3, 'Canon camera', 300.00, 'uploads/c979839b4f.png'),
(6, 2, 1, 'iphone 6s', 250.00, 'uploads/72192e968f.png'),
(7, 2, 9, 'Surround Speakers', 250.00, 'uploads/918d314685.jpg'),
(8, 2, 8, 'Blender', 30.00, 'uploads/43f93de583.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `compare`
--
ALTER TABLE `compare`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wlist`
--
ALTER TABLE `wlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `compare`
--
ALTER TABLE `compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `wlist`
--
ALTER TABLE `wlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
