-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 04:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `search`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `username` varchar(5) NOT NULL,
  `password` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(9) NOT NULL,
  `Pname` varchar(30) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `thumbimg` varchar(50) NOT NULL,
  `category` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Pname`, `price`, `description`, `thumbimg`, `category`) VALUES
(6, 'Hoodie', 30, 'New arrivals! Have Fur of premium quality.\r\nFor Women&#39;s.', 'womens hoodie.jpg', 'Clothing'),
(7, 'Unisex Hoodie', 25, 'New arrivals! Have Fur of premium quality.\r\nUnisex!', 'mens hoodie.jpg', 'Clothing'),
(8, 'Men&#39;s Pants/Trousers', 44.99, 'Premium quality pants from Nepal.\r\nNew Arrivals!', 'mens pant.jpg', 'Clothing'),
(9, 'Women&#39;s Pants/Trousers', 70, 'Eco-Friendly disposable pants from vietnam.\r\nNew Arrivals!', 'womens pant.jpg', 'Clothing'),
(10, 'Cap', 11, 'Made is England.', 'cap.jpg', 'Clothing'),
(11, 'T-shirt', 10, 'Silk Fabrics', 'shirt.jpg', 'Clothing'),
(13, 'Ipad Pro', 2300, 'Newly arrived. High in demand!\r\n2021 14 Inches display.', '2021 ipad pro.jpg', 'Electronics'),
(14, 'ASUS Laptop', 2100, 'Newly arrived. Best performing gaming Laptop with 1TB of SSD and DDR5 Ram. I7 11 Generation.', 'ASUS ROG GX800.jpg', 'Electronics'),
(15, 'MacBook Pro', 2400, 'Newly arrived. High in demand! 2021 16 Inches display.', 'macbook-pro.jpg', 'Electronics'),
(16, 'Samsung Smart TV', 2700, 'Samsung Gulf 98inch Neo QLED 4K SmartTV', 'Samsung-Gulf.jpg', 'Electronics'),
(18, 'Leather-sofa', 700, 'Synthetic Leather from vietnam is used.', 'leather-sofa.jpg', 'Furniture'),
(19, 'Nepali Daraj', 700, 'Made is Nepal, premium sal wood from Nepal and India is used.', 'daraj.jpg', 'Furniture'),
(20, 'Dining Table', 500, 'Comfortable for up to six persons. Dining Table', 'table.jpg', 'Furniture'),
(21, 'Sofa Set', 850, 'Luxurious Sofa made of Premium wood of Sisau is used. Made in Nepal.', 'sofaset.jpg', 'Furniture'),
(22, 'Sofa', 200, 'For 2 persons. Made is Nepal, premium Sal wood from Nepal and India is used.', 'sofa.jpg', 'Furniture'),
(24, 'Iphone 10 Pro Max', 700, 'Stock clearance, 512 GB Rose Gold.', '10ProMax.jpg', 'Electronics'),
(26, 'Iphone 14 Pro Max', 1200, 'Matt Black 512GB, New Arrivals', 'iphone 14 pro max.jpg', 'Electronics'),
(27, 'Iphone 13 Pro Max', 1100, 'Both 256 and 512GB varient available, with free phone case.', 'download.jpg', 'Electronics'),
(28, 'Iphone 10 Pro Max', 700, 'Stock clearance, 512 GB Rose Gold.', '10ProMax.jpg', 'Electronics'),
(29, 'Ipad Pro', 1400, 'Very Good for graphics designing varient 512GB white', '2021 ipad pro.jpg', 'Electronics');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(8) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `yyyy` int(4) NOT NULL,
  `mm` varchar(10) NOT NULL,
  `dd` int(2) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `firstname`, `lastname`, `username`, `password`, `email`, `address`, `country`, `yyyy`, `mm`, `dd`, `gender`) VALUES
(1, 'Kapil', 'Aryal', 'kapilAryal', 'd61d91528c18bdc508a30d7274dedd6c', 'email@gmail.com', 'Gatthaghar-15, bhaktapur', 'Nepal', 2001, 'August', 18, 'Male'),
(3, 'Kushal', 'Aryal', 'kushalAryal', 'd61d91528c18bdc508a30d7274dedd6c', 'edit@gmail.com', 'Gatthaghar-15, bhaktapur', 'Nepal', 1940, 'January', 1, 'Male'),
(4, 'Kushal', 'Aryal', 'kuAryal', 'd61d91528c18bdc508a30d7274dedd6c', 'edit@gmail.com', 'Gatthaghar-15, bhaktapur', 'Nepal', 2001, 'August', 18, 'Male'),
(6, 'Kushal', 'Aryal', 'ku_Aryal', 'd61d91528c18bdc508a30d7274dedd6c', 'edit@gmail.com', 'Gatthaghar-15, bhaktapur', 'Nepal', 2004, 'March', 18, 'Male'),
(8, 'Kapil', 'Aryal', 'kapil01212', 'd61d91528c18bdc508a30d7274dedd6c', 'email@gmail.com', 'Gatthaghar-15, bhaktapur', 'Nepal', 1940, 'January', 1, 'Male'),
(9, 'Kapil', 'Aryal', 'kapil0121234', 'd61d91528c18bdc508a30d7274dedd6c', 'email@gmail.com', 'Gatthaghar-15, bhaktapur', 'Nepal', 1940, 'January', 1, 'Male'),
(10, 'Kapil', 'Aryal', 'kapil012123', 'd61d91528c18bdc508a30d7274dedd6c', 'email@gmail.com', 'Gatthaghar-15, bhaktapur', 'Nepal', 1940, 'January', 1, 'Male'),
(11, 'Kapil', 'Aryal', 'kapil.aryal', 'd61d91528c18bdc508a30d7274dedd6c', 'akapil21@tbc.edu.np', 'Gatthaghar', 'Nepal', 1940, 'January', 1, 'Others');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
