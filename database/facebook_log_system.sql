-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2017 at 12:22 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook_log_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_tbl`
--

CREATE TABLE `log_tbl` (
  `id` int(1) NOT NULL,
  `name` varchar(200) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `gmail_address` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii;

--
-- Dumping data for table `log_tbl`
--

INSERT INTO `log_tbl` (`id`, `name`, `user_name`, `gmail_address`, `password`) VALUES
(19, 'Mahabubul ', 'alam', 'mahabubul45@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(20, 'mahabubul', 'mahabubl', 'alam12@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(21, 'alu', 'islam', 'alu@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(22, 'mahabubul', 'mahabub', 'mahabububl451@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(23, 'Ripon miah', 'ripom', 'ripon@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(24, 'Anowar Islam', 'anowar', 'anowar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_tbl`
--
ALTER TABLE `log_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_tbl`
--
ALTER TABLE `log_tbl`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
