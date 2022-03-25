-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2017 at 02:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `selfie_buyandselldogs`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `dog_name` varchar(20) NOT NULL,
  `date_created` varchar(20) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `instagram` varchar(30) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `image_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `dog_name`, `date_created`, `facebook`, `instagram`, `twitter`, `image_name`, `email`, `mobile`) VALUES
(1, 'korede', 'sdkjk', '1495791862', 'shonubijerry', 'shonubijerry', 'shonubijerry', '320501495792010.jpg', 'koredujar@gmail.com', '8131616439'),
(2, 'Shonubi', 'khkjhjhjk', '1495791904', 'shomuk', 'Shonubi korede', '', '217971495791883.jpg', 'korede.hot@gmail.com', '813161643'),
(3, 'Shonubi', 'hjgjhghj', '1495791991', 'sdfasd', '@fdsgf', 'sadfs', '193551495702713.jpg', 'lagoshotel@mail.com', '81316164'),
(4, 'sho', 'maaa', '1495795003', 'asdfsa', '', 'sdfaasd', '140741495791931.jpg', 'shonubijerry@yahoo.com', '8616439'),
(5, 'nubi', 'dsgs', '1495795030', '', 'Shonubi korede', 'dsafsds', '293551495702712.jpg', 'shonubijerry@gmail.com', '816439'),
(6, 'memm', 'sdjds', '1495795405', '', 'Shonubi korede', 'sfsd', '320501495792010.jpg', 'lagoshotel@mak.com', '813161639'),
(7, 'Shubi', 'hjgjhghj', '1495795460', 'asdfs', 'Shonubi korede', 'asfsd', '212061495795695.jpg', 'koredujar@gmail.co', '831616439'),
(8, 'Komd', 'kjjjii', '1495795925', '', '', '', '217971495791883.jpg', 'abo@mail.com', '09011111'),
(9, 'mmdkl', 'kkdd', '1495796241', '', '', '', '180181495796269.jpg', 'ade@mail.c', '0008887766');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
