-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2021 at 08:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--
CREATE DATABASE IF NOT EXISTS `task` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `task`;

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `billno` int(10) NOT NULL,
  `date` datetime NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`billno`, `date`, `deleted`) VALUES
(500, '2021-02-04 20:05:37', 0),
(501, '2021-02-04 20:08:02', 0),
(502, '2021-02-04 20:15:18', 0),
(503, '2021-02-04 20:19:59', 0),
(504, '2021-02-05 08:14:06', 0),
(505, '2021-02-06 11:11:25', 0),
(506, '2021-02-06 14:07:56', 0),
(507, '2021-02-06 21:07:20', 0),
(508, '2021-02-07 10:15:49', 0),
(509, '2021-02-08 20:38:41', 0),
(510, '2021-02-09 15:49:30', 0),
(511, '2021-02-10 20:56:58', 0),
(512, '2021-02-11 16:55:13', 0),
(513, '2021-02-11 23:10:01', 0),
(514, '2021-02-11 23:10:04', 0),
(515, '2021-02-11 23:10:52', 0),
(516, '2021-02-11 23:31:28', 0),
(517, '2021-02-12 08:56:18', 0),
(518, '2021-02-12 09:03:52', 0),
(519, '2021-02-12 17:02:31', 0),
(520, '2021-02-12 18:42:52', 0),
(521, '2021-02-12 18:50:33', 0),
(522, '2021-02-13 00:16:39', 0),
(523, '2021-02-13 00:34:23', 0),
(524, '2021-02-13 01:14:38', 0),
(525, '2021-02-13 01:15:46', 0),
(526, '2021-02-13 01:20:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cheflogin`
--

CREATE TABLE `cheflogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT 'name',
  `gender` varchar(255) NOT NULL DEFAULT 'gender',
  `phonenumber` varchar(255) NOT NULL DEFAULT '1234567895',
  `address` varchar(255) NOT NULL DEFAULT 'karur',
  `username` varchar(255) NOT NULL DEFAULT 'amma',
  `password` varchar(11) NOT NULL DEFAULT '123',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheflogin`
--

INSERT INTO `cheflogin` (`id`, `name`, `gender`, `phonenumber`, `address`, `username`, `password`, `deleted`) VALUES
(1, 'manoj', 'Male', '123456789', 'karur', 'manoj@gmail.com', '123', 0),
(3, 'Elavarasan', 'Male', '1234567890', 'Karur', 'elavarasan@', '123', 1),
(4, 'elavarasan', 'Male', '1234567895', 'karur', 'elavarasan@gmail.com', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cheforder`
--

CREATE TABLE `cheforder` (
  `id` int(11) NOT NULL,
  `tno` varchar(10) DEFAULT NULL,
  `items` varchar(255) DEFAULT NULL,
  `qty` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cheforder`
--

INSERT INTO `cheforder` (`id`, `tno`, `items`, `qty`, `date`, `deleted`) VALUES
(1, 't3', 'doas', '1', '2021-02-11', 0),
(2, 't3', 'mano', '2', '2021-02-11', 0),
(3, 't3', 'doas', '2', '2021-02-11', 0),
(4, 't3', 'mano', '3', '2021-02-11', 0),
(5, 't3', 'doas,mano', '2,2', '2021-02-11', 0),
(6, 't3', 'doas,mano', '2,2', '2021-02-11', 0),
(7, 't3', 'doas,mano,doas,mano', '2,2,1,1', '2021-02-11', 0),
(8, 't3', 'doas,mano', '2,2', '2021-02-11', 0),
(9, 't3', 'doas,mano,mano,doas', '2,2,2,1', '2021-02-11', 0),
(10, 't3', 'doas,mano,mano,doas,masala poori', '2,2,2,1,2', '2021-02-11', 0),
(11, 't3', 'doas,mano,mano,doas,masala poori,mano', '2,2,2,1,2,2', '2021-02-11', 0),
(12, 't3', 'doas,mano,mano,doas,masala poori,mano,doas', '2,2,2,1,2,2,2', '2021-02-11', 0),
(13, 't3', 'doas,mano', '2,2', '2021-02-11', 0),
(14, 't3', 'doas,mano,doas,mano', '2,2,2,2', '2021-02-11', 0),
(15, 't3', 'doas,mano', '2,2', '2021-02-11', 0),
(16, 't3', 'doas,mano,doas', '2,2,5', '2021-02-11', 0),
(17, 't3', 'doas,mano', '2,2', '2021-02-11', 0),
(18, 't3', 'parota', '2', '2021-02-12', 0),
(19, 't3', 'itly,parota', '2,2', '2021-02-12', 0),
(20, 't3', 'itly,parota,parota', '2,2,2', '2021-02-12', 0),
(21, 't3', '[object NodeList]', '[object NodeList]', '2021-02-12', 1),
(22, 't3', '2', 'itly', '2021-02-12', 1),
(23, 't3', '2,2', 'itly,poori', '2021-02-12', 1),
(24, 't3', '2', 'parota', '2021-02-12', 1),
(25, 't3', '2', 'poori', '2021-02-12', 1),
(26, 't3', '2', 'itly', '2021-02-12', 1),
(27, 't3', '2', 'parota', '2021-02-12', 1),
(28, 't3', 'parota', '2', '2021-02-12', 0),
(29, 't3', 'itly', '2', '2021-02-12', 0),
(30, 't3', 'itly', '2', '2021-02-12', 0),
(31, 't3', 'itly', '2', '2021-02-12', 0),
(32, 't3', 'poori', '2', '2021-02-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) NOT NULL,
  `billno` int(10) NOT NULL DEFAULT '0',
  `item` varchar(255) NOT NULL DEFAULT 'no',
  `qty` varchar(255) NOT NULL DEFAULT '0',
  `total` mediumint(9) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `billno`, `item`, `qty`, `total`, `date`, `time`, `deleted`) VALUES
(1, 512, '{\"doas\":5,\"mano\":6,\"masala poori\":\"2\"}', '0', 0, '2021-02-11', '00:00:00', 0),
(2, 512, '{\"doas\":5,\"mano\":6,\"masala poori\":\"2\"}', '0', 0, '2021-02-11', '00:00:00', 0),
(3, 512, '{\"doas\":4,\"mano\":4}', '80', 0, '2021-02-11', '00:00:00', 0),
(4, 512, '{\"doas\":\"2\",\"mano\":\"2\"}', '40', 0, '2021-02-11', '00:00:00', 0),
(5, 512, '{\"doas\":\"2\",\"mano\":\"2\"}', '40,40', 0, '2021-02-11', '00:00:00', 0),
(6, 512, '{\"doas\":\"2\",\"mano\":\"2\"}', '40,40', 0, '2021-02-11', '00:00:00', 0),
(7, 512, '{\"doas\":\"2\",\"mano\":\"2\"}', '40,40', 80, '2021-02-11', '19:56:49', 0),
(8, 515, '{}', '', 0, '2021-02-11', '23:26:39', 0),
(9, 517, '{\"itly\":\"2\"}', '10', 10, '2021-02-12', '09:23:05', 1),
(10, 517, '{\"itly\":12,\"parota\":\"2\"}', '60,40', 210, '2021-02-12', '09:59:34', 0),
(11, 517, '{\"itly\":\"2\"}', '10', 10, '2021-02-12', '10:14:26', 0),
(12, 517, '{\"itly\":4,\"poori\":\"2\"}', '20,30', 60, '2021-02-12', '10:44:38', 0),
(13, 517, '{\"itly\":4,\"poori\":\"2\"}', '20,30', 60, '2021-02-12', '10:49:28', 0),
(14, 517, '{\"itly\":4,\"poori\":\"2\"}', '20,30', 60, '2021-02-12', '10:52:08', 0),
(15, 517, '{\"itly\":4,\"poori\":\"2\"}', '20,30', 60, '2021-02-12', '10:52:46', 0),
(16, 517, '{\"parota\":\"2\"}', '40', 40, '2021-02-12', '10:54:07', 0),
(17, 517, '{\"parota\":\"2\",\"poori\":\"2\"}', '40,30', 70, '2021-02-12', '10:55:32', 0),
(18, 517, '{\"itly\":\"2\"}', '10', 10, '2021-02-12', '17:52:23', 0),
(19, 517, '{}', '', 0, '2021-02-12', '18:32:40', 0),
(20, 520, '{}', '', 0, '2021-02-12', '18:44:24', 0),
(21, 522, '{\"poori\":\"2\"}', '30', 30, '2021-02-13', '00:20:04', 0),
(22, 523, '{}', '', 0, '2021-02-13', '01:14:24', 0),
(23, 524, '{}', '', 0, '2021-02-13', '01:14:47', 0),
(24, 525, '{}', '', 0, '2021-02-13', '01:15:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tablelogin`
--

CREATE TABLE `tablelogin` (
  `id` int(10) NOT NULL,
  `tabno` varchar(10) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablelogin`
--

INSERT INTO `tablelogin` (`id`, `tabno`, `password`) VALUES
(1, 't3', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `todayspl`
--

CREATE TABLE `todayspl` (
  `id` int(10) NOT NULL,
  `food` varchar(255) NOT NULL DEFAULT 'none',
  `date` date DEFAULT NULL,
  `price` int(10) NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `todayspl`
--

INSERT INTO `todayspl` (`id`, `food`, `date`, `price`, `deleted`) VALUES
(51, 'idly', '2021-02-09', 10, 0),
(52, 'dosa', '2021-02-09', 0, 0),
(53, 'poori', '2021-02-09', 25, 0),
(54, 'manuchurian', '2021-02-09', 100, 0),
(55, 'kothu', '2021-02-09', 100, 0),
(56, 'egg', '2021-02-09', 10, 0),
(57, 'sfwef', '2021-02-09', 100, 0),
(58, 'qdqw', '2021-02-09', 20, 0),
(59, 'mNO', '2021-02-09', 2, 0),
(60, 'elava', '2021-02-09', 20, 0),
(61, 'manohj', '2021-02-09', 2, 0),
(62, 'hsgd', '2021-02-09', 2, 0),
(63, 'sddd', '2021-02-09', 2, 0),
(64, 'doas', '2021-02-11', 20, 0),
(65, 'masala%20poori', '2021-02-11', 25, 0),
(66, 'mano', '2021-02-11', 20, 0),
(67, 'itly', '2021-02-12', 5, 1),
(68, 'parota', '2021-02-12', 20, 0),
(69, 'poori', '2021-02-12', 15, 0),
(70, 'itly', '2021-02-13', 5, 1),
(71, 'poori', '2021-02-13', 15, 0),
(72, 'chappathi', '2021-02-13', 10, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`billno`);

--
-- Indexes for table `cheflogin`
--
ALTER TABLE `cheflogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheforder`
--
ALTER TABLE `cheforder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tablelogin`
--
ALTER TABLE `tablelogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todayspl`
--
ALTER TABLE `todayspl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `billno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=527;

--
-- AUTO_INCREMENT for table `cheflogin`
--
ALTER TABLE `cheflogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cheforder`
--
ALTER TABLE `cheforder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tablelogin`
--
ALTER TABLE `tablelogin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `todayspl`
--
ALTER TABLE `todayspl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
