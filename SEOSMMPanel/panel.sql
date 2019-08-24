-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 07:50 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `password`) VALUES
('Md.Moyez Uddin', 'moyez', 'moyez');

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE `name` (
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_information`
--

CREATE TABLE `order_information` (
  `id` int(5) NOT NULL,
  `user` varchar(50) NOT NULL,
  `order` varchar(200) NOT NULL,
  `catagory` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `start_count` int(10) NOT NULL,
  `quantity` int(5) NOT NULL,
  `end_count` int(10) NOT NULL,
  `price` int(5) NOT NULL,
  `status` varchar(50) NOT NULL,
  `create` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `s_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_information`
--

INSERT INTO `order_information` (`id`, `user`, `order`, `catagory`, `link`, `start_count`, `quantity`, `end_count`, `price`, `status`, `create`, `deadline`, `s_id`) VALUES
(54, 'moyez', 'Facebbo Post Likes', 'Facebook', 'iueryuwr', 0, 1200, 0, 7, 'Created', '2019-08-19 18:01:00', '2019-08-18 07:01:19', 4),
(55, 'moyez', 'Youtube Comment Fast', 'Youtube', 'http://localhost/SEOSMMPanel/User/service.php?id=4', 0, 60, 0, 7, 'Created', '2019-08-19 18:35:24', '2019-08-21 11:36:17', 7),
(56, 'moyez', 'Facebook Likes hh', 'Facebook', 'kwbkr', 0, 3000, 0, 18, 'Created', '2019-08-19 19:23:48', '2021-01-01 12:23:56', 3),
(57, 'moyez', 'Yotube commet', 'Youtube', 'werwe', 0, 23, 0, 2, 'Created', '2019-08-20 06:19:47', '2019-08-28 03:20:22', 6),
(58, 'moyez', 'Facebbo Post Likes', 'Facebook', 'dftdy', 0, 2345, 0, 14, 'Created', '2019-08-20 09:23:22', '2019-08-19 02:23:29', 4);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(5) NOT NULL,
  `name` varchar(200) NOT NULL,
  `min_order` int(3) NOT NULL,
  `price_per_k` int(5) NOT NULL,
  `delivery_per_day` int(5) NOT NULL,
  `max_order` int(3) NOT NULL,
  `catagory` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `min_order`, `price_per_k`, `delivery_per_day`, `max_order`, `catagory`) VALUES
(3, 'Facebook Likes hh', 1000, 6, 6, 100000, 'Facebook'),
(4, 'Facebbo Post Likes', 1000, 6, 1000, 100000, 'Facebook'),
(6, 'Yotube commet', 10, 100, 3, 100, 'Youtube'),
(7, 'Youtube Comment Fast', 10, 120, 30, 100, 'Youtube'),
(8, 'Soundcloud Likes', 100, 100, 50, 10000, 'Soundcloud');

-- --------------------------------------------------------

--
-- Table structure for table `soundcloud_account`
--

CREATE TABLE `soundcloud_account` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soundcloud_account`
--

INSERT INTO `soundcloud_account` (`username`, `password`) VALUES
('rim22315@aklqo.com', '123456789'),
('rim22315@aklqo.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phn_number` varchar(15) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`name`, `username`, `password`, `email`, `phn_number`, `country`) VALUES
('', '', '', '', '', ''),
('Md.Moyez Uddin', 'moyez', 'moyez', 'mo@gmail.com', '0176609898', 'Bangladesh'),
('Md.Moyez Uddin', 'moyeze', 'moyez', 'm@gmail.com', '01766098988', 'Bangladesh'),
('Md.Moyez Uddin', 'moyezh', 'moyez', 'm@gmail.com', '0176609898833', 'Bangladesh'),
('', 'moyezrrr', 'moyez', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `order_information`
--
ALTER TABLE `order_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `s_id` (`s_id`) USING BTREE;

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_information`
--
ALTER TABLE `order_information`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_information`
--
ALTER TABLE `order_information`
  ADD CONSTRAINT `order_information_ibfk_1` FOREIGN KEY (`s_id`) REFERENCES `service` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
