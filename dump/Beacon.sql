-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： database
-- 生成日期： 2020-07-25 02:57:05
-- 服务器版本： 8.0.21
-- PHP 版本： 7.4.6

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
-- 表的结构 `Requests`
--

CREATE TABLE `Requests` (
  `RequestId` int NOT NULL,
  `BuyerId` varchar(50) DEFAULT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `Tag` varchar(50) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `IntendedPrice` double DEFAULT NULL,
  `SaleId` int DEFAULT NULL,
  `DatePost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `Requests`
--

INSERT INTO `Requests` (`RequestId`, `BuyerId`, `ProductName`, `Tag`, `Description`, `Image`, `IntendedPrice`, `SaleId`, `DatePost`) VALUES
(1, 'baozi008', 'baozi008', 'textbook', 'genius', '', 60, NULL, '2020-07-24 20:30:39');

-- --------------------------------------------------------

--
-- 表的结构 `Sales`
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
  `IntendedBuyerId` varchar(50) DEFAULT NULL,
  `DatePost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `Sales`
--

INSERT INTO `Sales` (`SaleId`, `SellerId`, `ProductName`, `Tag`, `Description`, `Image`, `IntendedPrice`, `OriginalPrice`, `Depreciation`, `IntendedBuyerId`, `DatePost`) VALUES
(2, 'baozi008', 'gre OG', 'test prep', 'new', 'images/baozi008/20200724191852.jpg', 50, 250, 9, NULL, '2020-07-24 19:18:52'),
(3, 'baozi008', 'toefl', 'textbook', 'new', 'images/baozi008/20200724191915.jpg', 10, 1, 8, NULL, '2020-07-24 19:19:15'),
(4, 'baozi008', 'foundation', 'makeup', 'new', 'images/baozi008/20200724191936.jpg', 60, 100, 9, NULL, '2020-07-24 19:19:36'),
(5, 'baozi008', 'genius', 'toys/games', 'true genius', 'images/baozi008/20200724191955.jpg', 1, 10, 9, NULL, '2020-07-24 19:19:55'),
(7, 'baozi008', 'baozi008', 'clothing', 'a delicious baozi', 'images/baozi008/20200724201425.jpg', 1, 1, 9, NULL, '2020-07-24 20:14:25'),
(8, 'baozi008', 'baozi008', 'other', 'genius', 'images/baozi008/20200724201441.jpg', 1, 10, 9, NULL, '2020-07-24 20:14:41'),
(9, 'baozi008', 'baozi', 'stationery', 'a delicious baozi', 'images/baozi008/20200724201516.jpg', 60, 100, 9, NULL, '2020-07-24 20:15:16'),
(10, 'baozi008', 'f', 'furniture', 'f', 'images/baozi008/20200724201546.jpg', 1, 10000000000000, 9, NULL, '2020-07-24 20:15:46'),
(11, 'baozi008', 's', 'otherbooks', 's', 'images/baozi008/20200724201614.jpg', 1, 1, 3, NULL, '2020-07-24 20:16:14'),
(12, 'baozi008', 'toefl og', 'test prep', 'a', 'images/baozi008/20200725003204.jpg', 20, 60, 9, NULL, '2020-07-25 00:32:04');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SRT_leftJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SRT_leftJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
,`cntTrans` bigint
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SRT_rightJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SRT_rightJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
,`cntTrans` bigint
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SR_fullJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SR_fullJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SR_leftJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SR_leftJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SR_rightJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SR_rightJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
);

-- --------------------------------------------------------

--
-- 表的结构 `Transactions`
--

CREATE TABLE `Transactions` (
  `TransactionId` int NOT NULL,
  `SellerId` varchar(50) DEFAULT NULL,
  `BuyerId` varchar(50) DEFAULT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Tag` varchar(50) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `Transactions`
--

INSERT INTO `Transactions` (`TransactionId`, `SellerId`, `BuyerId`, `ProductName`, `Price`, `Tag`, `Description`, `Date`) VALUES
(1, 'baozi008', 'baozi008', 'baozi', 10000, 'food', 'a delicious baozi', '2020-07-24 21:33:00');

-- --------------------------------------------------------

--
-- 表的结构 `Users`
--

CREATE TABLE `Users` (
  `NetId` varchar(50) NOT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Campus` varchar(10) DEFAULT NULL,
  `Major` varchar(10) DEFAULT NULL,
  `Year` varchar(10) DEFAULT NULL,
  `DateJoin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- 转存表中的数据 `Users`
--

INSERT INTO `Users` (`NetId`, `Password`, `Name`, `Email`, `Campus`, `Major`, `Year`, `DateJoin`) VALUES
('baozi008', 'baozi008', 'baozi', 'baozi008@illinois.edu', 'ZJUIntl', 'CompE', 'Senior', '2020-07-24 19:15:10');

-- --------------------------------------------------------

--
-- 表的结构 `Visit`
--

CREATE TABLE `Visit` (
  `Visit` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- 视图结构 `SRT_leftJoin`
--
DROP TABLE IF EXISTS `SRT_leftJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SRT_leftJoin`  AS  select `SR_fullJoin`.`Tag` AS `Tag`,`SR_fullJoin`.`cntSales` AS `cntSales`,`SR_fullJoin`.`cntRequests` AS `cntRequests`,`tmp3`.`cntTrans` AS `cntTrans` from (`SR_fullJoin` left join (select `Transactions`.`Tag` AS `Tag`,count(0) AS `cntTrans` from `Transactions` group by `Transactions`.`Tag`) `tmp3` on((`SR_fullJoin`.`Tag` = `tmp3`.`Tag`))) ;

-- --------------------------------------------------------

--
-- 视图结构 `SRT_rightJoin`
--
DROP TABLE IF EXISTS `SRT_rightJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SRT_rightJoin`  AS  select `tmp3`.`Tag` AS `Tag`,`SR_fullJoin`.`cntSales` AS `cntSales`,`SR_fullJoin`.`cntRequests` AS `cntRequests`,`tmp3`.`cntTrans` AS `cntTrans` from ((select `Transactions`.`Tag` AS `Tag`,count(0) AS `cntTrans` from `Transactions` group by `Transactions`.`Tag`) `tmp3` left join `SR_fullJoin` on((`SR_fullJoin`.`Tag` = `tmp3`.`Tag`))) ;

-- --------------------------------------------------------

--
-- 视图结构 `SR_fullJoin`
--
DROP TABLE IF EXISTS `SR_fullJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SR_fullJoin`  AS  select `tmp`.`Tag` AS `Tag`,`tmp`.`cntSales` AS `cntSales`,`tmp`.`cntRequests` AS `cntRequests` from (select `SR_leftJoin`.`Tag` AS `Tag`,`SR_leftJoin`.`cntSales` AS `cntSales`,`SR_leftJoin`.`cntRequests` AS `cntRequests` from `SR_leftJoin` union select `SR_rightJoin`.`Tag` AS `Tag`,`SR_rightJoin`.`cntSales` AS `cntSales`,`SR_rightJoin`.`cntRequests` AS `cntRequests` from `SR_rightJoin`) `tmp` ;

-- --------------------------------------------------------

--
-- 视图结构 `SR_leftJoin`
--
DROP TABLE IF EXISTS `SR_leftJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SR_leftJoin`  AS  select `tmp1`.`Tag` AS `Tag`,`tmp1`.`cntSales` AS `cntSales`,`tmp2`.`cntRequests` AS `cntRequests` from ((select `Sales`.`Tag` AS `Tag`,count(0) AS `cntSales` from `Sales` group by `Sales`.`Tag`) `tmp1` left join (select `Requests`.`Tag` AS `Tag`,count(0) AS `cntRequests` from `Requests` group by `Requests`.`Tag`) `tmp2` on((`tmp1`.`Tag` = `tmp2`.`Tag`))) ;

-- --------------------------------------------------------

--
-- 视图结构 `SR_rightJoin`
--
DROP TABLE IF EXISTS `SR_rightJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SR_rightJoin`  AS  select `tmp2`.`Tag` AS `Tag`,`tmp1`.`cntSales` AS `cntSales`,`tmp2`.`cntRequests` AS `cntRequests` from ((select `Requests`.`Tag` AS `Tag`,count(0) AS `cntRequests` from `Requests` group by `Requests`.`Tag`) `tmp2` left join (select `Sales`.`Tag` AS `Tag`,count(0) AS `cntSales` from `Sales` group by `Sales`.`Tag`) `tmp1` on((`tmp1`.`Tag` = `tmp2`.`Tag`))) ;

--
-- 转储表的索引
--

--
-- 表的索引 `Requests`
--
ALTER TABLE `Requests`
  ADD PRIMARY KEY (`RequestId`),
  ADD KEY `Requests_ibfk_1` (`BuyerId`),
  ADD KEY `Requests_ibfk_2` (`SaleId`);

--
-- 表的索引 `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`SaleId`),
  ADD KEY `Sales_ibfk_1` (`SellerId`),
  ADD KEY `Sales_ibfk_2` (`IntendedBuyerId`);

--
-- 表的索引 `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`TransactionId`),
  ADD KEY `Transactions_ibfk_1` (`BuyerId`),
  ADD KEY `Transactions_ibfk_2` (`SellerId`);

--
-- 表的索引 `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`NetId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `Requests`
--
ALTER TABLE `Requests`
  MODIFY `RequestId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `Sales`
--
ALTER TABLE `Sales`
  MODIFY `SaleId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用表AUTO_INCREMENT `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `TransactionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 限制导出的表
--

--
-- 限制表 `Requests`
--
ALTER TABLE `Requests`
  ADD CONSTRAINT `Requests_ibfk_1` FOREIGN KEY (`BuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `Requests_ibfk_2` FOREIGN KEY (`SaleId`) REFERENCES `Sales` (`SaleId`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- 限制表 `Sales`
--
ALTER TABLE `Sales`
  ADD CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`SellerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `Sales_ibfk_2` FOREIGN KEY (`IntendedBuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- 限制表 `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `Transactions_ibfk_1` FOREIGN KEY (`BuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `Transactions_ibfk_2` FOREIGN KEY (`SellerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
