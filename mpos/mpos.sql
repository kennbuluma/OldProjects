-- phpMyAdmin SQL Dump
-- version 4.6.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 08, 2016 at 11:24 AM
-- Server version: 5.6.27-2
-- PHP Version: 5.6.21-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobipos_2`
--
CREATE DATABASE IF NOT EXISTS `mobipos_2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mobipos_2`;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itm_id` varchar(50) NOT NULL,
  `itm_name` varchar(50) NOT NULL,
  `itm_unit_cost` decimal(50,0) NOT NULL,
  `itm_unit_price` decimal(50,0) NOT NULL,
  `itm_descript` varchar(50) NOT NULL,
  `itm_photo` int(50) NOT NULL,
  `itm_count` int(50) NOT NULL,
  `itm_date_added` date NOT NULL,
  `usr_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itm_id`, `itm_name`, `itm_unit_cost`, `itm_unit_price`, `itm_descript`, `itm_photo`, `itm_count`, `itm_date_added`, `usr_id`) VALUES
('B001', 'Belt', 50, 100, 'Leather, Regular', 1, 50, '2016-05-23', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sl_id` int(50) NOT NULL,
  `sl_date` date NOT NULL,
  `itm_id` varchar(50) NOT NULL,
  `usr_id` varchar(50) NOT NULL,
  `sl_itm_count` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sl_id`, `sl_date`, `itm_id`, `usr_id`, `sl_itm_count`) VALUES
(1, '2016-05-24', 'B001', '1234', '2');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `myid` varchar(30) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `adm` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_pass` varchar(50) NOT NULL,
  `usr_fname` varchar(50) NOT NULL,
  `usr_lname` varchar(50) NOT NULL,
  `usr_bsn` varchar(50) NOT NULL,
  `usr_photo` varchar(50) NOT NULL,
  `usr_phone` varchar(50) NOT NULL,
  `usr_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_pass`, `usr_fname`, `usr_lname`, `usr_bsn`, `usr_photo`, `usr_phone`, `usr_email`) VALUES
('hope', 'ken', 'bul', 'kenbul', '', '777666553', 'kenbul@email.com'),
('testpass', 'kenn', 'bulums', 'bsn1', '', '777777', 'kennbuluma@outlook.com'),
('1234', 'king', 'test', 'kingbiz', '', '969794646', 'king@test.com'),
('testpass', 'registration', 'user', 'regbsn', '', '999000777', 'reg@user.com'),
('jest', 'Test', 'Three', 'Bsnthree', '', '000000', 'testthree@test.com'),
('testpassword', 'test', 'user', 'businesstest', '', '999000', 'testuser@testrun.com'),
('mmm', 'user', 'second', 'bsn2', '', '6638353', 'usertwo@test.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itm_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_email`),
  ADD UNIQUE KEY `usr_email` (`usr_email`),
  ADD UNIQUE KEY `usr_email_2` (`usr_email`),
  ADD UNIQUE KEY `usr_email_3` (`usr_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sl_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
mobipos_2