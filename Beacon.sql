-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 03:12 PM
-- Server version: 5.7.11
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Beacon`
--

-- --------------------------------------------------------

--
-- Table structure for table `Accounts`
--

CREATE TABLE `Accounts` (
  `NetId` varchar(15) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`NetId`, `Name`, `Email`) VALUES
('hanyins2', 'Hanyin Shao', 'hanyins2@illinois.edu'),
('jiaqil6', 'Jiaqi Lou', 'jiaqil6@illinois.edu'),
('keruiz2', 'Kerui Zhu', 'keruiz2@illinois.edu');

-- --------------------------------------------------------

--
-- Table structure for table `Group_Mem`
--

CREATE TABLE `Group_Mem` (
  `Name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NetId` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Group_Mem`
--

INSERT INTO `Group_Mem` (`Name`, `NetId`) VALUES
('Hanyin Shao', 'hanyins2'),
('Jiaqi Lou', 'jiaqil6'),
('Kerui Zhu', 'keruiz2'),
('Xinyi Lai', 'xlai7');

-- --------------------------------------------------------

--
-- Table structure for table `Requests`
--

CREATE TABLE `Requests` (
  `RequestId` int(11) NOT NULL,
  `BuyerId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProductName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tag` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IntendedPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Requests`
--

INSERT INTO `Requests` (`RequestId`, `BuyerId`, `ProductName`, `Tag`, `Description`, `IntendedPrice`) VALUES
(1, 'keruiz2', 'toothbrush', 'tag_2', 'Hard to describe', 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `SaleId` int(11) NOT NULL,
  `SellerId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProductName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tag` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IntendedPrice` double DEFAULT NULL,
  `OriginalPrice` double DEFAULT NULL,
  `Depreciation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`SaleId`, `SellerId`, `ProductName`, `Tag`, `Description`, `IntendedPrice`, `OriginalPrice`, `Depreciation`) VALUES
(0, 'keruiz2', 'iclicker 2', 'tag_1', 'Can\'t tell', 250, 251, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
--

CREATE TABLE `Transactions` (
  `TransactionId` int(11) NOT NULL,
  `SellerId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BuyerId` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProductName` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tag` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `NetId` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `School` int(11) DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Major` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`NetId`, `Password`, `School`, `Name`, `Email`, `Major`, `Year`) VALUES
('cs411', 'cs411', 1, 'Little Genius', 'cs411@geniuses.com', 2, 1),
('hanyins2', 'hanyins2', 1, 'Hanyin Shao', 'hanyins2@illinois.edu', 4, 1),
('jiaqil6', 'jiaqil6', 3, 'Jiaqi Lou', 'jiaqil6@illinois.edu', 3, 3),
('keruiz2', 'keruiz2', 3, 'Kerui Zhu', 'keruiz2@illinois.edu', 2, 3),
('xlai7', 'xlai7', 2, 'Xinyi Lai', 'xlai7@illinois.edu', 3, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Accounts`
--
ALTER TABLE `Accounts`
  ADD PRIMARY KEY (`NetId`);

--
-- Indexes for table `Group_Mem`
--
ALTER TABLE `Group_Mem`
  ADD PRIMARY KEY (`NetId`);

--
-- Indexes for table `Requests`
--
ALTER TABLE `Requests`
  ADD PRIMARY KEY (`RequestId`),
  ADD KEY `BuyerId` (`BuyerId`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`SaleId`),
  ADD KEY `SellerId` (`SellerId`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`TransactionId`),
  ADD KEY `SellerId` (`SellerId`),
  ADD KEY `BuyerId` (`BuyerId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`NetId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Requests`
--
ALTER TABLE `Requests`
  ADD CONSTRAINT `Requests_ibfk_1` FOREIGN KEY (`BuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE;

--
-- Constraints for table `Sales`
--
ALTER TABLE `Sales`
  ADD CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`SellerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE;

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `Transactions_ibfk_1` FOREIGN KEY (`SellerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE,
  ADD CONSTRAINT `Transactions_ibfk_2` FOREIGN KEY (`BuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
