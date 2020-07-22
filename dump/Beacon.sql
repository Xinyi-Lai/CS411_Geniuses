-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Jul 22, 2020 at 12:33 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `NetId` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `Name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NetId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
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
  `RequestId` int NOT NULL,
  `BuyerId` varchar(50) DEFAULT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `Tag` varchar(50) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `IntendedPrice` double DEFAULT NULL,
  `SaleId` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Requests`
--

INSERT INTO `Requests` (`RequestId`, `BuyerId`, `ProductName`, `Tag`, `Description`, `Image`, `IntendedPrice`, `SaleId`) VALUES
(1, 'cs411', 'Island', 'Food', 'Beautiful', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Sales`
--

CREATE TABLE `Sales` (
  `SaleId` int NOT NULL,
  `SellerId` varchar(50) DEFAULT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `Tag` varchar(50) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `IntendedPrice` double DEFAULT NULL,
  `OriginalPrice` double DEFAULT NULL,
  `Depreciation` int DEFAULT NULL,
  `IntendedBuyerId` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`SaleId`, `SellerId`, `ProductName`, `Tag`, `Description`, `Image`, `IntendedPrice`, `OriginalPrice`, `Depreciation`, `IntendedBuyerId`) VALUES
(1, 'cs411', 'Island', 'Necessity', 'Beautiful', 'images/cs411/20200722122839.jpg', 1000, 1200, 9, 'xlai7'),
(3, 'cs411', 'Genius', 'Toy', 'Smart and sharp', 'images/cs411/20200722123008.jpeg', 200, 100, 9, 'xlai7'),
(4, 'cs411', 'Another genius', 'Toy', 'Sleepy and stupid', 'images/cs411/20200722123249.png', 1, 100, 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `NetId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Campus` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Major` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Year` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`NetId`, `Password`, `Campus`, `Name`, `Email`, `Major`, `Year`) VALUES
('123', '123', 'ZJUIntl', '123', '123@123.123', 'other', 'graduate'),
('cs411', 'cs411', 'UIUC', 'Little Genius', 'cs411@geniuses.com', 'CS', 'Freshman'),
('hanyins2', 'hanyins2', 'UIUC', 'Hanyin Shao', 'hanyins2@illinois.edu', 'ME', 'Freshman'),
('jiaqil6', 'jiaqil6', 'ZJUIntl', 'Jiaqi Lou', 'jiaqil6@illinois.edu', 'ECE', 'Junior'),
('keruiz2', 'keruiz2', 'ZJUIntl', 'Kerui Zhu', 'keruiz2@illinois.edu', 'ECE', 'Junior'),
('xlai7', 'xlai7', 'ZJUIntl', 'Xinyi Lai', 'xlai7@illinois.edu', 'EE', 'Senior');

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
  ADD KEY `BuyerId` (`BuyerId`),
  ADD KEY `SaleId` (`SaleId`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`SaleId`),
  ADD KEY `SellerId` (`SellerId`),
  ADD KEY `IntendedBuyerId` (`IntendedBuyerId`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`NetId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Requests`
--
ALTER TABLE `Requests`
  MODIFY `RequestId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
  MODIFY `SaleId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Requests`
--
ALTER TABLE `Requests`
  ADD CONSTRAINT `Requests_ibfk_1` FOREIGN KEY (`BuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE,
  ADD CONSTRAINT `Requests_ibfk_2` FOREIGN KEY (`SaleId`) REFERENCES `Sales` (`SaleId`) ON DELETE SET NULL;

--
-- Constraints for table `Sales`
--
ALTER TABLE `Sales`
  ADD CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`SellerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE,
  ADD CONSTRAINT `Sales_ibfk_2` FOREIGN KEY (`IntendedBuyerId`) REFERENCES `Users` (`NetId`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
