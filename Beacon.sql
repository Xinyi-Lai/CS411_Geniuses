-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-07-18 14:47:51
-- 服务器版本： 5.7.11
-- PHP 版本： 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `Beacon`
--

-- --------------------------------------------------------

--
-- 表的结构 `Accounts`
--

CREATE TABLE `Accounts` (
  `NetId` varchar(15) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `Accounts`
--

INSERT INTO `Accounts` (`NetId`, `Name`, `Email`) VALUES
('hanyins2', 'Hanyin Shao', 'hanyins2@illinois.edu'),
('jiaqil6', 'Jiaqi Lou', 'jiaqil6@illinois.edu'),
('keruiz2', 'Kerui Zhu', 'keruiz2@illinois.edu');

-- --------------------------------------------------------

--
-- 表的结构 `Group_Mem`
--

CREATE TABLE `Group_Mem` (
  `Name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NetId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `Group_Mem`
--

INSERT INTO `Group_Mem` (`Name`, `NetId`) VALUES
('Hanyin Shao', 'hanyins2'),
('Jiaqi Lou', 'jiaqil6'),
('Kerui Zhu', 'keruiz2'),
('Xinyi Lai', 'xlai7');

-- --------------------------------------------------------

--
-- 表的结构 `Requests`
--

CREATE TABLE `Requests` (
  `RequestId` int NOT NULL,
  `BuyerId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProductName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IntendedPrice` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `Requests`
--

INSERT INTO `Requests` (`RequestId`, `BuyerId`, `ProductName`, `Tag`, `Description`, `IntendedPrice`) VALUES
(1, 'keruiz2', 'toothbrush', 'tag_2', 'Hard to describe', 0.1);

-- --------------------------------------------------------

--
-- 表的结构 `Sales`
--

CREATE TABLE `Sales` (
  `SaleId` int NOT NULL,
  `SellerId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProductName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IntendedPrice` double DEFAULT NULL,
  `OriginalPrice` double DEFAULT NULL,
  `Depreciation` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `Sales`
--

INSERT INTO `Sales` (`SaleId`, `SellerId`, `ProductName`, `Tag`, `Description`, `IntendedPrice`, `OriginalPrice`, `Depreciation`) VALUES
(0, 'keruiz2', 'iclicker 2', 'tag_1', 'Can\'t tell', 250, 251, 10);

-- --------------------------------------------------------

--
-- 表的结构 `Transactions`
--

CREATE TABLE `Transactions` (
  `TransactionId` int NOT NULL,
  `SellerId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BuyerId` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProductName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tag` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `Users`
--

CREATE TABLE `Users` (
  `NetId` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Campus` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Major` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Year` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `Users`
--

INSERT INTO `Users` (`NetId`, `Password`, `Campus`, `Name`, `Email`, `Major`, `Year`) VALUES
('123', '123', 'ZJUIntl', '123', '123@123.123', 'other', 'graduate'),
('cs411', 'cs411', 'UIUC', 'Little Genius', 'cs411@geniuses.com', 'CS', 'Freshman'),
('hanyins2', 'hanyins2', 'UIUC', 'Hanyin Shao', 'hanyins2@illinois.edu', 'ME', 'Freshman'),
('jiaqil6', 'jiaqil6', 'ZJUIntl', 'Jiaqi Lou', 'jiaqil6@illinois.edu', 'ECE', 'Junior'),
('keruiz2', 'keruiz2', 'ZJUIntl', 'Kerui Zhu', 'keruiz2@illinois.edu', 'ECE', 'Junior'),
('xlai7', 'xlai7', 'ZJUIntl', 'Xinyi Lai', 'xlai7@illinois.edu', 'EE', 'Senior');

--
-- 转储表的索引
--

--
-- 表的索引 `Accounts`
--
ALTER TABLE `Accounts`
  ADD PRIMARY KEY (`NetId`);

--
-- 表的索引 `Group_Mem`
--
ALTER TABLE `Group_Mem`
  ADD PRIMARY KEY (`NetId`);

--
-- 表的索引 `Requests`
--
ALTER TABLE `Requests`
  ADD PRIMARY KEY (`RequestId`),
  ADD KEY `BuyerId` (`BuyerId`);

--
-- 表的索引 `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`SaleId`),
  ADD KEY `SellerId` (`SellerId`);

--
-- 表的索引 `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`TransactionId`),
  ADD KEY `SellerId` (`SellerId`),
  ADD KEY `BuyerId` (`BuyerId`);

--
-- 表的索引 `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`NetId`);

--
-- 限制导出的表
--

--
-- 限制表 `Requests`
--
ALTER TABLE `Requests`
  ADD CONSTRAINT `Requests_ibfk_1` FOREIGN KEY (`BuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE;

--
-- 限制表 `Sales`
--
ALTER TABLE `Sales`
  ADD CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`SellerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE;

--
-- 限制表 `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `Transactions_ibfk_1` FOREIGN KEY (`SellerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE,
  ADD CONSTRAINT `Transactions_ibfk_2` FOREIGN KEY (`BuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
