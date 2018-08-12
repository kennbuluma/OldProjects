-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2015 at 03:02 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `last_log_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Firstname`, `Surname`, `Email`, `username`, `password`, `date_added`, `last_log_date`) VALUES
(2, 'Stephen', 'Kaveke', 'skaveke@gmail.com', 'user', 'user', '2015-01-02', '0000-00-00'),
(3, 'Steve', 'Kav', 'skaveke@yahoo.com', 'admin', 'admin', '2015-01-03', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `ItemName` varchar(255) NOT NULL,
  `Product_ID` varchar(255) NOT NULL,
  `ItemDetails` varchar(255) NOT NULL,
  `UnitPrice` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Total` double NOT NULL,
  `User` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `transaction_id`, `ItemName`, `Product_ID`, `ItemDetails`, `UnitPrice`, `Quantity`, `Total`, `User`, `date_added`) VALUES
(1, 'TRN1426346852912', 'HP HDD', 'JHGF*8576', 'External Harddrive\r\n1TB ', 7000, 1, 7000, 'skaveke@gmail.com', '2015-03-14'),
(2, 'TRN1426346852912', 'Flashdisk', 'JHGFJHG654', '64 GB', 400, 1, 400, 'skaveke@gmail.com', '2015-03-14'),
(3, 'TRN1426347059461', 'Acer L123', 'UH87576', '120 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 25000, 1, 25000, 'skaveke@gmail.com', '2015-03-14'),
(4, 'TRN1426347059461', 'Keyboard', 'HF5566', 'Wireless', 650, 1, 650, 'skaveke@gmail.com', '2015-03-14'),
(5, 'TRN1426347305614', 'Memory Card', 'HJGFHGJ677', '2GB', 500, 1, 500, 'skaveke@gmail.com', '2015-03-14'),
(6, 'TRN1426347305614', 'Mouse', 'YT548', 'Wireless', 340, 1, 340, 'skaveke@gmail.com', '2015-03-14'),
(7, 'TRN142634750469', 'Keyboard', 'HF5566', 'Wireless', 650, 1, 650, 'skaveke@gmail.com', '2015-03-14'),
(8, 'TRN142634750469', 'Apple I2', 'HF554', '500 GB Harddisk\r\n4GB Memory\r\n4GHZ Pocessor', 6000, 1, 6000, 'skaveke@gmail.com', '2015-03-14'),
(9, 'TRN1426347622776', 'HP Printer', 'GFF77', 'Colored', 4500, 1, 4500, 'skaveke@gmail.com', '2015-03-14'),
(10, 'TRN1426347622776', 'Apple I2', 'HF554', '500 GB Harddisk\r\n4GB Memory\r\n4GHZ Pocessor', 6000, 1, 6000, 'skaveke@gmail.com', '2015-03-14'),
(11, 'TRN1426347895675', 'Dell L655', 'UG234523', '320 GB Harddisk\r\n2GB Memory\r\n2GHZ Pocessor', 30000, 1, 30000, 'skaveke@gmail.com', '2015-03-14'),
(12, 'TRN1426347895675', 'HP small Printer', 'HF556', 'Colored Printer', 3400, 1, 3400, 'skaveke@gmail.com', '2015-03-14'),
(13, 'TRN1426347895675', 'Desktop Monitor', 'JGFHG9687', 'TFT 17"\r\nColored', 4500, 1, 4500, 'skaveke@gmail.com', '2015-03-14'),
(14, 'TRN1427490894271', 'Dell B43', 'YT545', '500 GB Harddisk\r\n4GB Memory\r\n4GHZ Pocessor', 45000, 1, 45000, 'skaveke@gmail.com', '2015-03-28'),
(15, 'TRN1427490894271', 'Apple I2', 'HF554', '500 GB Harddisk\r\n4GB Memory\r\n4GHZ Pocessor', 6000, 1, 6000, 'skaveke@gmail.com', '2015-03-28'),
(16, 'TRN1427705353464', 'HP L1706', 'IH985JH', '80 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 15000, 1, 15000, 'fatma@mail.com', '2015-03-30'),
(17, 'TRN1427705353464', 'Acer L123', 'UH87576', '120 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 25000, 1, 25000, 'fatma@mail.com', '2015-03-30'),
(18, 'TRN1427708077711', 'Ubuntu', 'HBJ87687', 'Mint', 15000, 1, 15000, 'skaveke@gmail.com', '2015-03-30'),
(19, 'TRN1427708077711', 'Flashdisk', 'JHGFJHG654', '64 GB', 400, 1, 400, 'skaveke@gmail.com', '2015-03-30'),
(20, 'TRN1427709553123', 'HP L1706', 'IH985JH', '80 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 15000, 1, 15000, 'skaveke@gmail.com', '2015-03-30'),
(21, 'TRN1427709553123', 'Kerspersky ', 'BHJH09', '10 user key', 1500, 1, 1500, 'skaveke@gmail.com', '2015-03-30'),
(22, 'TRN142771076137', 'Acer L123', 'UH87576', '120 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 25000, 1, 25000, 'skaveke@gmail.com', '2015-03-30'),
(23, 'TRN1427716129340', 'HP L1706', 'IH985JH', '80 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 15000, 2, 30000, 'skaveke@gmail.com', '2015-03-30'),
(24, 'TRN142771621312', 'HP L1706', 'IH985JH', '80 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 15000, 2, 30000, 'skaveke@gmail.com', '2015-03-30'),
(25, 'TRN1427717591918', 'hp printer', 'yguygfu', 'colored printer', 4500, 2, 9000, 'skaveke@gmail.com', '2015-03-30'),
(26, 'TRN1427720071817', 'hp printer', 'yguygfu', 'colored printer', 4500, 10, 45000, 'saumu@mail.com', '2015-03-30'),
(27, 'TRN1427720337850', 'HP L1706', 'IH985JH', '80 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 15000, 1, 15000, 'skaveke@gmail.com', '2015-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `Category_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`Category_ID`),
  UNIQUE KEY `Category_Name` (`Category_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Category_ID`, `Category_Name`, `date_added`) VALUES
(1, 'Computers', '2015-03-14'),
(2, 'Software', '2015-03-14'),
(3, 'Accessories', '2015-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Telephone` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Address_Street` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Email` (`Email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `Firstname`, `Lastname`, `Email`, `password`, `Telephone`, `Country`, `City`, `Address_Street`, `Address`, `date_added`) VALUES
(1, 'Stephen', 'Kaveke', 'skaveke@gmail.com', 'admin', '+254702133727', 'Kenya', 'Mombasa', 'Mtwapa', '582 - 80100', '2015-03-14'),
(2, 'fatma', 'moha', 'fatma@mail.com', 'fatma', '765743', 'Kenya', 'msa', 'kgf', '8767656', '2015-03-30'),
(3, 'saumu', 'moha', 'saumu@mail.com', '1234', '09988965', 'kenya', 'msa', '34', '86534', '2015-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Sender` varchar(255) NOT NULL,
  `Receiver` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`id`, `Sender`, `Receiver`, `Message`, `Status`, `date_added`) VALUES
(1, 'support@ishop.com', 'skaveke@gmail.com', 'Your Transaction with transaction no TRN1426347059461 was completed successfully. Thank you for shopping with us!', 'Read', '2015-03-14 18:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `Name`, `Email`, `Message`, `date_added`, `status`) VALUES
(1, 'Stephen kaveke', 'skaveke@gmail.com', 'Hi, I shopped using Ishop!', '2015-03-14', 'Read');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(16) NOT NULL,
  `details` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `qt` int(11) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `price`, `details`, `category`, `subcategory`, `qt`, `date_added`) VALUES
(1, 'IH985JH', 'HP L1706', '15000', '80 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 'Computers', 'Desktops', 2, '2015-03-14'),
(2, 'UH87576', 'Acer L123', '25000', '120 GB Harddisk\r\n1GB Memory\r\n1GHZ Pocessor', 'Computers', 'Desktops', 2, '2015-03-14'),
(3, 'UG234523', 'Dell L655', '30000', '320 GB Harddisk\r\n2GB Memory\r\n2GHZ Pocessor', 'Computers', 'Desktops', 5, '2015-03-14'),
(4, 'YTRY554', 'Toshiba C35', '34000', '320 GB Harddisk\r\n2GB Memory\r\n2GHZ Pocessor', 'Computers', 'Laptops', 5, '2015-03-14'),
(5, 'YT545', 'Dell B43', '45000', '500 GB Harddisk\r\n4GB Memory\r\n4GHZ Pocessor', 'Computers', 'Laptops', 7, '2015-03-14'),
(6, 'HF554', 'Apple I2', '6000', '500 GB Harddisk\r\n4GB Memory\r\n4GHZ Pocessor', 'Computers', 'Laptops', 7, '2015-03-14'),
(7, 'GFF77', 'HP Printer', '4500', 'Colored', '', '', 6, '2015-03-14'),
(8, 'GFF78', 'HP Scanner', '5000', 'Scanner And Printer', 'Accessories', 'Input Devices', 8, '2015-03-14'),
(9, 'HF556', 'HP small Printer', '3400', 'Colored Printer', 'Accessories', 'Output Devices', 4, '2015-03-14'),
(10, 'YT548', 'Mouse', '340', 'Wireless', 'Accessories', 'Input Devices', 5, '2015-03-14'),
(11, 'HF5566', 'Keyboard', '650', 'Wireless', 'Accessories', 'Input Devices', 6, '2015-03-14'),
(12, 'GFTT454', 'Wireless Mouse', '1500', 'Bluetooth Mouse', 'Accessories', 'Input Devices', 7, '2015-03-14'),
(13, 'GFHF878', 'Wired Keyboard', '800', 'Wired Keyboard', 'Accessories', 'Input Devices', 8, '2015-03-14'),
(14, 'HGF78', 'Laptop Charger', '1500', 'Toshiba Charger', 'Accessories', 'Chargers', 2, '2015-03-14'),
(15, 'HGH9878', 'Charger ', '1200', 'HP Laptop Charger', 'Accessories', 'Chargers', 4, '2015-03-14'),
(16, 'HGFHYFD87', 'Monitor', '5000', '17 Inches \r\nFlat screen', 'Accessories', 'Output Devices', 9, '2015-03-14'),
(17, 'JGFHG9687', 'Desktop Monitor', '4500', 'TFT 17"\r\nColored', 'Accessories', 'Output Devices', 5, '2015-03-14'),
(18, 'UFYTFY88', 'Toshiba HDD', '5000', 'External Harddrive\r\n500GB', 'Accessories', 'Storage Drives', 1, '2015-03-14'),
(19, 'JHGF*8576', 'HP HDD', '7000', 'External Harddrive\r\n1TB ', 'Accessories', 'Storage Drives', 10, '2015-03-14'),
(20, 'JHGFJHG654', 'Flashdisk', '400', '64 GB', 'Accessories', 'Storage Drives', 12, '2015-03-14'),
(21, 'HJGFHGJ677', 'Memory Card', '500', '2GB', 'Accessories', 'Storage Drives', 13, '2015-03-14'),
(22, 'JHFGH87656', 'Windows 7 ', '20000', 'Ultimate with Product Key', 'Software', 'Operating System', 14, '2015-03-14'),
(23, 'HBJ87687', 'Ubuntu', '15000', 'Mint', 'Software', 'Operating System', 15, '2015-03-14'),
(24, 'BHJH09', 'Kerspersky ', '1500', '10 user key', 'Software', 'Antivirus', 16, '2015-03-14'),
(25, 'HJBJH8567', 'Microsoft Office 2013', '5000', 'Professional Plus with product Key', 'Software', 'Office', 78, '2015-03-14'),
(26, 'yguygfu', 'hp printer', '4500', 'colored printer', 'Accessories', 'Output Devices', 13, '2015-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `Subcategory_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category_Name` varchar(255) NOT NULL,
  `Subcategory_Name` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`Subcategory_ID`),
  UNIQUE KEY `Subcategory_Name` (`Subcategory_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`Subcategory_ID`, `Category_Name`, `Subcategory_Name`, `date_added`) VALUES
(1, 'Computers & Laptops', 'Desktops', '2015-03-14'),
(2, 'Computers & Laptops', 'Laptops', '2015-03-14'),
(3, 'Software', 'Antivirus', '2015-03-14'),
(4, 'Software', 'Office', '2015-03-14'),
(5, 'Software', 'Operating System', '2015-03-14'),
(6, 'Accessories', 'Input Devices', '2015-03-14'),
(7, 'Accessories', 'Output Devices', '2015-03-14'),
(8, 'Accessories', 'Chargers', '2015-03-14'),
(9, 'Accessories', 'Storage Drives', '2015-03-14');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `Payment_Mode` varchar(255) NOT NULL,
  `Payment_Transaction_No` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `status` varchar(15) NOT NULL,
  `Type` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `transaction_id`, `user`, `total`, `Payment_Mode`, `Payment_Transaction_No`, `date_added`, `status`, `Type`) VALUES
(1, 'TRN1426346852912', 'skaveke@gmail.com', 7400, 'Order', 'NULL', '2015-03-14', 'Confirmed', 'Order'),
(2, 'TRN1426347059461', 'skaveke@gmail.com', 25650, 'M-Pesa', 'HCH7656', '2015-03-14', 'Confirmed', 'Cash'),
(3, 'TRN1426347305614', 'skaveke@gmail.com', 840, 'M-Pesa', 'UTYFYT243', '2015-03-14', 'Confirmed', 'Cash'),
(4, 'TRN142634750469', 'skaveke@gmail.com', 6650, 'Airtel', 'JHFH55', '2015-03-14', 'Confirmed', 'Cash'),
(5, 'TRN1426347622776', 'skaveke@gmail.com', 10500, 'M-Pesa', 'JHFHG878', '2015-03-14', 'Confirmed', 'Cash'),
(6, 'TRN1426347895675', 'skaveke@gmail.com', 37900, 'Equitel', 'KJGJ65345', '2015-03-14', 'Confirmed', 'Cash'),
(7, 'TRN1427490894271', 'skaveke@gmail.com', 51000, 'M-Pesa', 'jygj', '2015-03-28', 'Confirmed', 'Cash'),
(8, 'TRN1427705353464', 'fatma@mail.com', 40000, 'M-Pesa', 'iitdgnnljl', '2015-03-30', 'Confirmed', 'Cash'),
(9, 'TRN1427708077711', 'skaveke@gmail.com', 15400, 'M-Pesa', 'ert', '2015-03-30', 'Confirmed', 'Cash'),
(10, 'TRN1427709553123', 'skaveke@gmail.com', 16500, 'Order', 'NULL', '2015-03-30', 'Confirmed', 'Order'),
(11, 'TRN142771076137', 'skaveke@gmail.com', 25000, 'M-Pesa', 'jkhv;gkjgk', '2015-03-30', 'Pending', 'Cash'),
(12, 'TRN1427716129340', 'skaveke@gmail.com', 30000, 'M-Pesa', 'iygi', '2015-03-30', 'Pending', 'Cash'),
(13, 'TRN142771621312', 'skaveke@gmail.com', 30000, 'M-Pesa', 'kgh', '2015-03-30', 'Pending', 'Cash'),
(14, 'TRN1427717591918', 'skaveke@gmail.com', 9000, 'Airtel', 'asf', '2015-03-30', 'Pending', 'Cash'),
(15, 'TRN1427720071817', 'saumu@mail.com', 45000, 'M-Pesa', 'uutyfrtgh,kjk', '2015-03-30', 'Confirmed', 'Cash'),
(16, 'TRN1427720337850', 'skaveke@gmail.com', 15000, 'M-Pesa', 'dfg', '2015-03-30', 'Pending', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `mc_gross` varchar(255) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `txn_type` varchar(255) NOT NULL,
  `payer_status` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_state` varchar(255) NOT NULL,
  `address_zip` varchar(255) NOT NULL,
  `address_country` varchar(255) NOT NULL,
  `address_status` varchar(255) NOT NULL,
  `notify_version` varchar(255) NOT NULL,
  `verify_sign` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `mc_currency` varchar(255) NOT NULL,
  `mc_fee` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `txn_id` (`txn_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `transactions`
--

