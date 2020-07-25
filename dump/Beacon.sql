-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： database
-- 生成日期： 2020-07-25 13:35:26
-- 服务器版本： 8.0.20
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
(1, 'xlai7', 'CS411 Textbook', 'textbook', '', '', 0, NULL, '2020-07-25 12:58:13');

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
(1, 'xinyi.17', 'ECE310 textbook', 'textbook', 'ECE310 textbook, digital signal processing', 'images/xinyi.17/20200725082851.png', 30, 50, 9, NULL, '2020-07-25 08:28:51'),
(5, 'Hxh123', 'Basketball', 'sports', 'A old basketball', 'images/Hxh123/20200725083423.jpg', 10, 20, 9, NULL, '2020-07-25 08:34:23'),
(6, 'xinyi.17', 'Toy#1', 'toys/games', 'A lovely toy', 'images/xinyi.17/20200725085554.jpg', 3, 5, 7, NULL, '2020-07-25 08:55:54'),
(7, 'xinyi.17', 'Toy#2', 'toys/games', 'A lovely toy', 'images/xinyi.17/20200725085630.jpg', 3, 5, 7, NULL, '2020-07-25 08:56:30'),
(8, 'xinyi.17', 'Uni-ball Pen', 'stationery', 'A box of Uni-ball pen (12 pcs)', 'images/xinyi.17/20200725085957.jpg', 10, 15, 9, NULL, '2020-07-25 08:59:57'),
(9, 'xinyi.17', 'Stapler', 'stationery', 'A brand new stapler', 'images/xinyi.17/20200725090043.jpg', 5, 8, 9, NULL, '2020-07-25 09:00:43'),
(10, 'xinyi.17', 'Pins', 'stationery', 'A box of pins', 'images/xinyi.17/20200725090225.jpg', 1, 2, 9, NULL, '2020-07-25 09:02:25'),
(11, 'xinyi.17', 'lamp', 'furniture', 'Eye protective, warm yellow light', 'images/xinyi.17/20200725090352.jpg', 10, 15, 6, NULL, '2020-07-25 09:03:52'),
(12, 'xlai7', 'Paper Towel', 'daily necessity', 'A roll of brand new paper towel', 'images/xlai7/20200725090918.jpg', 0.5, 1, 9, NULL, '2020-07-25 09:09:18'),
(13, 'xlai7', 'Slippers', 'daily necessity', 'A pair of slippers, brand new', 'images/xlai7/20200725091024.jpg', 5, 7, 9, NULL, '2020-07-25 09:10:24'),
(14, 'xlai7', 'clock', 'furniture', 'A small alarm clock', 'images/xlai7/20200725091355.jpg', 2, 5, 5, NULL, '2020-07-25 09:13:55'),
(15, 'xlai7', 'Slow Cooker', 'furniture', 'A slow cooker, low in power, perfect for porridge or soup', 'images/xlai7/20200725091510.jpg', 50, 60, 8, NULL, '2020-07-25 09:15:10'),
(16, 'xlai7', 'Mouse', 'electronics', 'A Logit mouse', 'images/xlai7/20200725092840.jpg', 5, 7, 9, NULL, '2020-07-25 09:28:40'),
(18, 'keruiz2', 'closet', 'furniture', 'wood closet, no smell', 'images/keruiz2/20200725093248.jpg', 100, 130, 9, NULL, '2020-07-25 09:32:48'),
(19, 'keruiz2', 'trash bin', 'furniture', 'two trash bins for garbage sorting', 'images/keruiz2/20200725093427.jpg', 5, 7, 8, NULL, '2020-07-25 09:34:27'),
(20, 'keruiz2', 'air conditioner', 'furniture', 'It can both heat and cool the room', 'images/keruiz2/20200725093705.jpg', 120, 150, 9, NULL, '2020-07-25 09:37:05'),
(21, 'keruiz2', 'door', 'furniture', 'Entrance only with an authorized card', 'images/keruiz2/20200725094034.jpg', 60, 75, 8, NULL, '2020-07-25 09:40:34'),
(22, 'keruiz2', 'kettle', 'furniture', 'common kettle, never used', 'images/keruiz2/20200725094218.jpg', 3, 4, 9, NULL, '2020-07-25 09:42:18'),
(23, 'keruiz2', 'chair', 'furniture', 'common chair', 'images/keruiz2/20200725094414.jpg', 15, 30, 7, NULL, '2020-07-25 09:44:14'),
(24, 'sunshine boy', 'mask', 'daily necessity', 'medical mask', 'images/sunshine boy/20200725095851.jpg', 2, 2.5, 9, NULL, '2020-07-25 09:58:51'),
(25, 'sunshine boy', 'bone conduction headset', 'electronics', 'wireless bone conduction headset, Aftershokz', 'images/sunshine boy/20200725100043.jpg', 50, 65, 8, NULL, '2020-07-25 10:00:43'),
(26, 'sunshine boy', 'FPGA', 'electronics', 'FPGA for ECE385 lab', 'images/sunshine boy/20200725100301.jpg', 100, 150, 9, NULL, '2020-07-25 10:03:01'),
(27, 'xinyi', 'Lego Technic 42093', 'toys/games', 'Lego Technic 42093, 578pcs, 2 in 1', 'images/xinyi/20200725103009.jpg', 40, 50, 9, NULL, '2020-07-25 10:30:09'),
(28, 'xinyi', 'cutter', 'tools', 'helper for electronic labs (eg ECE385)', 'images/xinyi/20200725103235.jpg', 4, 7, 9, NULL, '2020-07-25 10:32:35'),
(29, 'xinyi', 'Digital Weighing Scale', 'furniture', 'Remind you of keeping fit!', 'images/xinyi/20200725103418.jpg', 10, 15, 9, NULL, '2020-07-25 10:34:18'),
(30, 'xinyi', 'Yoga String and Massaging Ball', 'sports', 'Yoga String and Massaging Ball', 'images/xinyi/20200725103759.jpg', 2, 5, 9, NULL, '2020-07-25 10:37:59'),
(31, 'xinyi', 'Foam Roller', 'sports', 'Good for relaxing after exercising', 'images/xinyi/20200725103846.jpg', 5, 7, 9, NULL, '2020-07-25 10:38:46'),
(32, 'xinyi', 'Yoga Mat', 'sports', 'A Blue Yoga mat', 'images/xinyi/20200725104007.jpg', 5, 7, 9, NULL, '2020-07-25 10:40:07'),
(33, 'xinyi', 'automatic sphygmomanometer', 'furniture', 'automatic sphygmomanometer', 'images/xinyi/20200725104200.jpg', 10, 15, 9, NULL, '2020-07-25 10:42:00'),
(34, 'xinyi', 'ECE330 textbook', 'textbook', 'ECE330 textbook, Power Circuits', 'images/xinyi/20200725104332.jpg', 30, 50, 6, NULL, '2020-07-25 10:43:32'),
(35, 'xinyi', 'Guitar Kepma', 'other', 'Guitar Kepma', 'images/xinyi/20200725104424.jpg', 70, 100, 9, NULL, '2020-07-25 10:44:24'),
(36, 'xinyi', 'Medical Mask', 'daily necessity', 'Medical Mask, 10pc, fight with COVID19 together!', 'images/xinyi/20200725104523.jpg', 1, 2, 9, NULL, '2020-07-25 10:45:23'),
(37, 'xlai7', 'iPhone Cable', 'accessories', 'iPhone Cable', 'images/xlai7/20200725105130.jpg', 2, 5, 7, NULL, '2020-07-25 10:51:30'),
(38, 'xinyi.17', 'iPhone Earphone', 'accessories', 'iPhone Earphone', 'images/xinyi.17/20200725110246.jpg', 5, 7, 9, NULL, '2020-07-25 11:02:46'),
(39, 'xinyi.17', 'Hand Sanitizer', 'daily necessity', 'Hand Sanitizer, fight with COVID19 together!', 'images/xinyi.17/20200725110632.jpg', 6, 9, 9, NULL, '2020-07-25 11:06:32'),
(40, 'xlai7', 'thermos cup', 'daily necessity', 'stay warm, keep healthy', 'images/xlai7/20200725111447.jpg', 6, 9, 9, NULL, '2020-07-25 11:14:47'),
(41, 'xlai7', 'Book: HongKong study', 'otherbooks', 'A Social Science book about HK', 'images/xlai7/20200725111619.jpg', 3, 5, 9, NULL, '2020-07-25 11:16:19'),
(42, 'xlai7', 'Book: Psychology of Crowds', 'otherbooks', 'Psychology of Crowds / Psychologie des foules', 'images/xlai7/20200725111809.jpg', 3, 5, 9, NULL, '2020-07-25 11:18:09'),
(43, 'hxh123', 'Watch', 'electronics', 'A Casio watch', 'images/hxh123/20200725121737.jpg', 50, 280, 9, NULL, '2020-07-25 12:17:37'),
(44, 'hxh123', 'Banana', 'food', 'A big banana', 'images/hxh123/20200725121809.jpg', 1, 2, 9, NULL, '2020-07-25 12:18:09'),
(45, 'hxh123', 'Mask', 'daily necessity', '10 maskes', 'images/hxh123/20200725123407.jpg', 10, 15, 9, NULL, '2020-07-25 12:34:07'),
(46, 'hxh123', 'Umbrella', 'daily necessity', 'A big umbrella', 'images/hxh123/20200725123435.jpg', 10, 20, 9, NULL, '2020-07-25 12:34:35'),
(47, 'hxh123', 'Mouse', 'electronics', 'A blue mouse', 'images/hxh123/20200725123505.jpg', 5, 8, 7, NULL, '2020-07-25 12:35:05'),
(48, 'hxh123', 'Magnetic sensor', 'electronics', 'A seneor', 'images/hxh123/20200725123537.jpg', 10, 20, 7, NULL, '2020-07-25 12:35:37'),
(49, 'hxh123', 'Mechanical car', 'toys/games', 'A constructive car', 'images/hxh123/20200725123728.jpg', 100, 200, 7, NULL, '2020-07-25 12:37:28'),
(50, 'hxh123', 'A laptop', 'electronics', 'A mac laptop', 'images/hxh123/20200725123753.jpg', 100, 200, 4, NULL, '2020-07-25 12:37:53'),
(51, 'hxh123', 'A 3D printer', 'electronics', 'A 3D printer', 'images/hxh123/20200725123822.jpg', 200, 400, 7, NULL, '2020-07-25 12:38:22'),
(52, 'Barbara', 'vacuum cup', 'daily necessity', 'a new vaccum cup bought from Japan', 'images/Barbara/20200725130309.jpg', 20, 35, 8, NULL, '2020-07-25 13:03:09'),
(53, 'Barbara', 'Lancome Tonique Confort 50ml', 'makeup/personal care', 'new bottle', 'images/Barbara/20200725131148.jpg', 6, 7, 9, NULL, '2020-07-25 13:11:48'),
(54, 'Barbara', 'ALLIE UV GEL 90g', 'makeup/personal care', 'brand new bottle of UV GEL', 'images/Barbara/20200725131427.jpg', 18, 25, 9, NULL, '2020-07-25 13:14:27'),
(55, 'Barbara', 'Tea tree witch hazel Spot Wand', 'makeup/personal care', 'brand new', 'images/Barbara/20200725131634.jpg', 3, 5, 9, NULL, '2020-07-25 13:16:34'),
(56, 'Barbara', 'scissor', 'daily necessity', 'second hand but still sharp', 'images/Barbara/20200725131834.jpg', 2, 3, 6, NULL, '2020-07-25 13:18:34'),
(57, 'Barbara', 'Power bank 10000mA', 'electronics', 'second hand', 'images/Barbara/20200725132810.jpg', 7, 14, 5, NULL, '2020-07-25 13:28:10'),
(58, 'Barbara', 'mobile phone holder', 'daily necessity', 'new', 'images/Barbara/20200725133308.jpg', 1, 1.5, 9, NULL, '2020-07-25 13:33:08');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SRT_leftJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SRT_leftJoin` (
`cntRequests` bigint
,`cntSales` bigint
,`cntTrans` bigint
,`Tag` varchar(50)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SRT_rightJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SRT_rightJoin` (
`cntRequests` bigint
,`cntSales` bigint
,`cntTrans` bigint
,`Tag` varchar(50)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SR_fullJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SR_fullJoin` (
`cntRequests` bigint
,`cntSales` bigint
,`Tag` varchar(50)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SR_leftJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SR_leftJoin` (
`cntRequests` bigint
,`cntSales` bigint
,`Tag` varchar(50)
);

-- --------------------------------------------------------

--
-- 替换视图以便查看 `SR_rightJoin`
-- （参见下面的实际视图）
--
CREATE TABLE `SR_rightJoin` (
`cntRequests` bigint
,`cntSales` bigint
,`Tag` varchar(50)
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
(1, 'Hxh123', 'xinyi.17', 'Basketball', 10, 'sports', 'A old basketball', '2020-07-25 08:34:46'),
(2, 'xinyi.17', 'Hxh123', 'Badminton bat', 10, 'sports', 'Li Ning Badminton bat', '2020-07-25 08:35:18'),
(3, 'xlai7', 'Barbara', 'Small Shelf', 3, 'furniture', 'A good helper to keep your room organized', '2020-07-25 12:51:34');

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
('Barbara', 'Barbara', 'Barbara', '3170111549@zju.edu.cn', 'ZJUIntl', 'BMS', 'Junior', '2020-07-25 12:35:32'),
('cs411', 'cs411', 'Little Genius', 'cs411@genius.com', 'UIUC', 'CS', 'Junior', '2020-07-25 06:14:03'),
('genius', 'genius', 'Real Genius', 'genius@genius.com', 'ZJU', 'Other', 'Graduate', '2020-07-25 07:03:09'),
('Hxh123', '123456789', 'Hao', 'haoh4@illinois.edu', 'ZJUIntl', 'ME', 'Junior', '2020-07-25 08:21:19'),
('keruiz2', 'keruiz2', 'Kerui Zhu', 'keruiz2@illinois.edu', 'UIUC', 'CS', 'Junior', '2020-07-25 09:25:18'),
('sunshine boy', 'sb', 'Kerui Zhu', 'kerui.17@intl.zju.edu.cn', 'ZJUIntl', 'CompE', 'Junior', '2020-07-25 09:46:40'),
('Xinyi', 'xinyi', 'Xinyi', '3170111149@zju.edu.cn', 'ZJU', 'EE', 'Freshman', '2020-07-25 10:12:33'),
('xinyi.17', 'xinyi.17', 'Lai Xinyi', 'xinyi.17@intl.zju.edu.cn', 'ZJUIntl', 'EE', 'Senior', '2020-07-25 08:20:40'),
('xlai7', 'xlai7', 'Xinyi Lai', 'xlai7@illinois.edu', 'UIUC', 'EE', 'Senior', '2020-07-25 09:06:02');

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
  MODIFY `RequestId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `Sales`
--
ALTER TABLE `Sales`
  MODIFY `SaleId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- 使用表AUTO_INCREMENT `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `TransactionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
