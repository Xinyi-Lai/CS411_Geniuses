-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Jul 30, 2020 at 02:55 PM
-- Server version: 8.0.20
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
  `SaleId` int DEFAULT NULL,
  `DatePost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Requests`
--

INSERT INTO `Requests` (`RequestId`, `BuyerId`, `ProductName`, `Tag`, `Description`, `Image`, `IntendedPrice`, `SaleId`, `DatePost`) VALUES
(1, 'xlai7', 'CS411 Textbook', 'textbook', 'CS411 Textbook', '', 20, NULL, '2020-07-25 12:58:13'),
(2, 'xlai7', 'Apple Pencil Tip', 'accessories', 'Apple Pencil Tip', '', 2, NULL, '2020-07-25 14:23:49'),
(3, 'yiru', 'Mathmatic text preparation material', 'test prep', 'The exercise book', 'images/yiru/20200725142556.jpg', 10, NULL, '2020-07-25 14:25:56'),
(4, 'xlai7', 'Notebook', 'stationery', 'loose leaf', '', 1, NULL, '2020-07-25 15:37:27'),
(5, 'xlai7', 'Toefl test prep book', 'test prep', 'Toefl', '', 5, NULL, '2020-07-25 15:39:36'),
(6, 'xlai7', 'GRE prep book', 'test prep', 'GRE', '', 5, NULL, '2020-07-25 15:41:15'),
(7, 'xinyi.17', 'Nail Clipper', 'tools', 'Nail Clipper', '', 3, NULL, '2020-07-25 15:45:10'),
(8, 'xinyi.17', 'Tennis Bat', 'sports', 'Tennis Bat', '', 15, NULL, '2020-07-26 03:32:39'),
(9, 'xinyi.17', '4B4B bedroom near ECEB', 'sublease', '4B4B bedroom near ECEB', '', 400, NULL, '2020-07-26 03:32:52'),
(10, 'xinyi.17', 'Tennis Ball', 'sports', 'Tennis Ball', '', 1, NULL, '2020-07-26 03:43:23'),
(11, 'xinyi.17', 'Yoga Mat', 'sports', 'Yoga Mat', '', 5, NULL, '2020-07-26 03:43:41'),
(12, 'xinyi', 'AirPods', 'electronics', 'AirPods or AirPods Pro', '', 200, NULL, '2020-07-26 03:44:52'),
(13, 'xinyi', 'Radio', 'electronics', 'Radio', '', 10, NULL, '2020-07-26 03:45:27'),
(14, 'xinyi', 'iPhone Charger', 'accessories', 'iPhone Charger', '', 5, NULL, '2020-07-26 03:46:01'),
(15, 'xinyi', 'back cushion', 'furniture', 'back cushion', '', 5, NULL, '2020-07-26 03:46:47'),
(16, 'xinyi', 'curtain', 'furniture', 'curtain', '', 10, NULL, '2020-07-26 03:47:22'),
(17, 'baozi008', 'Nintendo Switch', 'electronics', 'not lite. better with games', '', 150, NULL, '2020-07-26 18:40:55'),
(18, 'sunshine boy', 'mouse', 'textbook', 'good mouse', '', 15, 16, '2020-07-27 02:02:04'),
(20, 'zoej', 'Dyson vacuum cleaner', 'electronics', 'V8', '', 100, NULL, '2020-07-30 00:57:19'),
(21, 'zoej', 'Dyson hair dryer', 'electronics', '', '', 200, NULL, '2020-07-30 00:57:58'),
(22, 'zoej', 'Bookshelf', 'furniture', 'width less than 50cm', '', 20, NULL, '2020-07-30 01:00:16');

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
  `IntendedBuyerId` varchar(50) DEFAULT NULL,
  `DatePost` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Sales`
--

INSERT INTO `Sales` (`SaleId`, `SellerId`, `ProductName`, `Tag`, `Description`, `Image`, `IntendedPrice`, `OriginalPrice`, `Depreciation`, `IntendedBuyerId`, `DatePost`) VALUES
(5, 'Hxh123', 'Basketball', 'sports', 'A old basketball', 'images/Hxh123/20200725083423.jpg', 10, 20, 9, 'Haohao', '2020-07-25 08:34:23'),
(11, 'xinyi.17', 'lamp', 'furniture', 'Eye protective, warm yellow light', 'images/xinyi.17/20200725090352.jpg', 10, 15, 6, NULL, '2020-07-25 09:03:52'),
(14, 'xlai7', 'clock', 'furniture', 'A small alarm clock', 'images/xlai7/20200725091355.jpg', 2, 5, 5, NULL, '2020-07-25 09:13:55'),
(15, 'xlai7', 'Slow Cooker', 'furniture', 'A slow cooker, low in power, perfect for porridge or soup', 'images/xlai7/20200725091510.jpg', 50, 60, 8, NULL, '2020-07-25 09:15:10'),
(16, 'xlai7', 'Mouse', 'electronics', 'A Logit mouse', 'images/xlai7/20200725092840.jpg', 5, 7, 9, 'sunshine boy', '2020-07-25 09:28:40'),
(19, 'keruiz2', 'trash bin', 'furniture', 'two trash bins for garbage sorting', 'images/keruiz2/20200725093427.jpg', 5, 7, 8, NULL, '2020-07-25 09:34:27'),
(20, 'keruiz2', 'air conditioner', 'furniture', 'It can both heat and cool the room', 'images/keruiz2/20200725093705.jpg', 120, 150, 9, NULL, '2020-07-25 09:37:05'),
(33, 'xinyi', 'automatic sphygmomanometer', 'furniture', 'automatic sphygmomanometer', 'images/xinyi/20200725104200.jpg', 10, 15, 9, NULL, '2020-07-25 10:42:00'),
(35, 'xinyi', 'Guitar Kepma', 'other', 'Guitar Kepma', 'images/xinyi/20200725104424.jpg', 70, 100, 9, 'baozi008', '2020-07-25 10:44:24'),
(44, 'hxh123', 'Banana', 'food', 'A big banana', 'images/hxh123/20200725121809.jpg', 1, 2, 9, 'hahaGong', '2020-07-25 12:18:09'),
(45, 'hxh123', 'Mask', 'daily necessity', '10 maskes', 'images/hxh123/20200725123407.jpg', 10, 15, 9, 'zoej', '2020-07-25 12:34:07'),
(47, 'hxh123', 'Mouse', 'electronics', 'A blue mouse', 'images/hxh123/20200725123505.jpg', 5, 8, 7, 'hh', '2020-07-25 12:35:05'),
(48, 'hxh123', 'Magnetic sensor', 'electronics', 'A seneor', 'images/hxh123/20200725123537.jpg', 10, 20, 7, 'Haohao', '2020-07-25 12:35:37'),
(51, 'hxh123', 'A 3D printer', 'electronics', 'A 3D printer', 'images/hxh123/20200725123822.jpg', 200, 400, 7, NULL, '2020-07-25 12:38:22'),
(52, 'Barbara', 'vacuum cup', 'daily necessity', 'a new vaccum cup bought from Japan', 'images/Barbara/20200725130309.jpg', 20, 35, 8, NULL, '2020-07-25 13:03:09'),
(53, 'Barbara', 'Lancome Tonique Confort 50ml', 'makeup/personal care', 'new bottle', 'images/Barbara/20200725131148.jpg', 6, 7, 9, NULL, '2020-07-25 13:11:48'),
(54, 'Barbara', 'ALLIE UV GEL 90g', 'makeup/personal care', 'brand new bottle of UV GEL', 'images/Barbara/20200725131427.jpg', 18, 25, 9, 'hh', '2020-07-25 13:14:27'),
(55, 'Barbara', 'Tea tree witch hazel Spot Wand', 'makeup/personal care', 'brand new', 'images/Barbara/20200725131634.jpg', 3, 5, 9, NULL, '2020-07-25 13:16:34'),
(59, 'Barbara', 'Curel Foaming Wash', 'makeup/personal care', 'used two times', 'images/Barbara/20200725140948.jpg', 10, 20, 8, NULL, '2020-07-25 14:09:48'),
(60, 'Barbara', 'hat', 'clothing', 'new', 'images/Barbara/20200725141111.jpg', 10, 15, 9, NULL, '2020-07-25 14:11:11'),
(62, 'yiru', 'Mathmatics textbook', 'textbook', 'PKU publisher, new', 'images/yiru/20200725141831.jpg', 10, 15, 9, NULL, '2020-07-25 14:18:31'),
(68, 'Gavin', 'Fried Rice', 'food', 'Rice fried by handsome boy Panpan, with love.', 'images/Gavin/20200725151136.jpg', 5, 6, 9, 'hahaGong', '2020-07-25 15:02:21'),
(69, 'Gavin', 'Kongfu book', 'otherbooks', 'Broken book, but the last owner learned to fly from it.', 'images/Gavin/20200725151649.jfif', 5, 100, 1, 'sunshine boy', '2020-07-25 15:16:49'),
(70, 'LittleBiscuit', 'Octave 20Fall Sublease', 'sublease', '4-people apartment near UIUC', 'images/LittleBiscuit/20200725213612.png', 855, 855, 9, 'hh', '2020-07-25 21:36:12'),
(71, 'xinyi', 'Yoga Mat', 'sports', 'A Blue Yoga Mat', 'images/xinyi/20200726034933.jpg', 5, 7, 9, NULL, '2020-07-26 03:49:33'),
(73, 'genius', 'Analog and Digital Circuits', 'textbook', 'Analog and Digital Circuits', 'images/genius/20200726035852.png', 10, 20, 9, NULL, '2020-07-26 03:58:52'),
(74, 'genius', 'Calculus James Stewart', 'textbook', 'Calculus James Stewart, 7th edition', 'images/genius/20200726035939.png', 30, 50, 9, NULL, '2020-07-26 03:59:39'),
(75, 'genius', 'Campbell Biology', 'textbook', 'Campbell Biology, 10th edition', 'images/genius/20200726040014.png', 30, 50, 9, NULL, '2020-07-26 04:00:14'),
(76, 'genius', 'Discrete Mathematics, Rosen', 'textbook', 'Discrete Mathematics, Rosen, 7th edition', 'images/genius/20200726040055.png', 30, 50, 9, NULL, '2020-07-26 04:00:55'),
(77, 'genius', 'Digital Signal Processing', 'textbook', 'Digital Signal Processing, ECE310 textbook', 'images/genius/20200726040132.jpg', 5, 10, 9, NULL, '2020-07-26 04:01:32'),
(78, 'genius', 'Power Circuits', 'textbook', 'Power Circuits, ECE330 textbook', 'images/genius/20200726040156.jpg', 20, 30, 9, NULL, '2020-07-26 04:01:56'),
(79, 'genius', 'Solid States Electronic Devices', 'textbook', 'Solid States Electronic Devices, ECE340 textbook', 'images/genius/20200726040230.jpg', 30, 50, 9, NULL, '2020-07-26 04:02:30'),
(80, 'genius', 'Micro Electronic Circuits', 'textbook', 'Micro Electronic Circuits, ECE342 textbook', 'images/genius/20200726040304.png', 10, 20, 9, NULL, '2020-07-26 04:03:04'),
(82, 'genius', 'Foundations of Economics', 'textbook', 'Foundations of Economics', 'images/genius/20200726040413.png', 10, 20, 9, 'Haohao', '2020-07-26 04:04:13'),
(84, 'yiru', '9th battery*1', 'daily necessity', 'for touchPen', 'images/yiru/20200726112348.jpg', 2, 3, 9, NULL, '2020-07-26 11:23:48'),
(86, 'yiru', 'hairpin', 'jewelry', 'for each, hand make', 'images/yiru/20200726112625.jpg', 4, 6, 7, 'hh', '2020-07-26 11:26:25'),
(87, 'hahaGong', 'Xinjiang Grapes', 'food', 'bought yesterday', 'images/hahaGong/20200726113008.jpg', 5, 10, 7, 'hh', '2020-07-26 11:30:08'),
(89, 'hahaGong', 'Xibang beer 500ml', 'food', 'delicious', 'images/hahaGong/20200726113707.jpg', 3, 3.5, 9, 'zoej', '2020-07-26 11:37:07'),
(91, 'hahaGong', 'Domori Chocolate', 'food', '100% Criollo, out of sale now', 'images/hahaGong/20200726113943.jpg', 18, 15, 9, 'sunshine boy', '2020-07-26 11:39:43'),
(93, 'hahaGong', 'Three Squirrols food packs', 'food', 'with more than 20 kinds of foods', 'images/hahaGong/20200726114243.jpg', 20, 25, 8, 'zoej', '2020-07-26 11:42:43'),
(94, 'hahaGong', 'disposable gloves * 1 package', 'tools', '500 pairs in one package, 3 pairs used', 'images/hahaGong/20200726114636.jpg', 5, 7, 8, 'hahaGong', '2020-07-26 11:46:36'),
(95, 'hahaGong', 'fruit knife', 'tools', 'new', 'images/hahaGong/20200726114718.jpg', 3, 4, 8, 'hh', '2020-07-26 11:47:18'),
(96, 'hahaGong', 'traveling tableware', 'daily necessity', 'new', 'images/hahaGong/20200726114832.jpg', 3, 5, 8, NULL, '2020-07-26 11:48:32'),
(100, 'yiru', 'mop', 'tools', 'used for once', 'images/yiru/20200726115804.jpg', 7, 10, 8, NULL, '2020-07-26 11:58:04'),
(103, 'yiru', 'Tianmao Jinling sound', 'electronics', 'intelligent sound, used', 'images/yiru/20200726120319.jpg', 10, 15, 6, 'baozi008', '2020-07-26 12:03:19'),
(105, 'baozi008', 'GRE wordlist', 'test prep', 'brand new', 'images/baozi008/20200726174312.png', 10, 55, 9, NULL, '2020-07-26 17:43:12'),
(106, 'baozi008', 'GRE Essay Prep', 'test prep', 'e-edition', 'images/baozi008/20200726174758.png', 5, 30, 9, NULL, '2020-07-26 17:47:58'),
(107, 'baozi008', 'GRE verbal prep', 'test prep', 'e-edition', 'images/baozi008/20200726175119.png', 5, 40, 9, NULL, '2020-07-26 17:51:19'),
(110, 'baozi008', 'GRE TC exercise', 'test prep', 'e-edition', 'images/baozi008/20200726181953.png', 3, 15, 9, NULL, '2020-07-26 18:19:53'),
(116, 'Haohao', 'Cake', 'food', 'Small cakes', 'images/Haohao/20200729100205.jpeg', 1, 2, 9, 'zoej', '2020-07-29 10:02:05'),
(117, 'Haohao', 'KFC', 'food', 'Junk food', 'images/Haohao/20200729100327.jpeg', 10, 12, 9, 'sunshine boy', '2020-07-29 10:03:27'),
(118, 'Haohao', 'Milk', 'food', 'A bag of milk', 'images/Haohao/20200729100411.jpeg', 1, 2, 9, NULL, '2020-07-29 10:04:11'),
(119, 'Haohao', 'Watermelon', 'food', 'A big watermelon', 'images/Haohao/20200729100444.jpeg', 5, 8, 9, NULL, '2020-07-29 10:04:44'),
(120, 'Haohao', 'Basketball shoes', 'clothing', 'A pair of nike basketball shoes', 'images/Haohao/20200729100535.jpeg', 100, 150, 6, NULL, '2020-07-29 10:05:35'),
(121, 'Haohao', 'Beef with egg', 'food', 'Beef with egg', 'images/Haohao/20200729100605.jpeg', 10, 12, 9, 'sunshine boy', '2020-07-29 10:06:05'),
(122, 'Haohao', 'Strawberry', 'food', 'Strawberry', 'images/Haohao/20200729100723.jpeg', 20, 25, 9, 'zoej', '2020-07-29 10:07:23'),
(123, 'Haohao', 'DQ', 'food', 'French frices', 'images/Haohao/20200729100753.jpeg', 10, 15, 9, NULL, '2020-07-29 10:07:53'),
(124, 'Haohao', 'Orange', 'food', 'orange', 'images/Haohao/20200729100814.jpeg', 10, 18, 9, NULL, '2020-07-29 10:08:14'),
(125, 'hh', 'Basketball shoes', 'sports', 'A pair of nike basketball shoes', 'images/hh/20200729101645.jpeg', 200, 250, 9, NULL, '2020-07-29 10:16:45'),
(126, 'hh', 'A picture', 'other', 'An old picture', 'images/hh/20200729101918.jpeg', 100, 200, 9, NULL, '2020-07-29 10:19:18'),
(127, 'hh', 'A T-shirt', 'clothing', 'A T-shirt', 'images/hh/20200729102045.jpeg', 30, 40, 9, NULL, '2020-07-29 10:20:45'),
(128, 'hh', 'Cake', 'food', 'A big cake', 'images/hh/20200729102111.jpeg', 10, 15, 9, NULL, '2020-07-29 10:21:11'),
(129, 'hh', 'Bag', 'stationery', 'A small bag', 'images/hh/20200729102144.jpeg', 50, 80, 9, 'baozi008', '2020-07-29 10:21:44'),
(130, 'hh', 'Book', 'test prep', 'Sherlock Holmes', 'images/hh/20200729102218.jpeg', 10, 15, 9, NULL, '2020-07-29 10:22:18'),
(131, 'hh', 'Pig', 'other', 'A black pig', 'images/hh/20200729102256.jpeg', 100, 150, 9, NULL, '2020-07-29 10:22:56'),
(132, 'hh', 'Swan', 'other', 'A big white swan', 'images/hh/20200729102359.jpeg', 10, 20, 9, 'goodgirl', '2020-07-29 10:23:59'),
(133, 'hh', 'Rugby ball', 'sports', 'A UIUC rugby ball', 'images/hh/20200729102440.jpeg', 100, 150, 9, NULL, '2020-07-29 10:24:40'),
(134, 'jiaqil6', 'Laptop Bag', 'accessories', 'color: gray; size: 13 inch', 'images/jiaqil6/20200729150422.jpeg', 10, 15, 9, NULL, '2020-07-29 15:04:22'),
(136, 'goodgirl', 'Hat', 'clothing', 'Beautiful hat, suitable for both holiday and daily usage', 'images/goodgirl/20200729151139.jpeg', 12, 20, 8, NULL, '2020-07-29 15:11:39'),
(137, 'goodgirl', 'Chanel Makeup Bag', 'accessories', 'Red Chanel makeup bag, capable to put 4-5 lipsticks', 'images/goodgirl/20200729151352.jpeg', 35, 50, 9, NULL, '2020-07-29 15:13:52'),
(139, 'zoej', 'AirPods', 'electronics', 'old version', 'images/zoej/20200729202443.png', 50, 129, 9, 'sunshine boy', '2020-07-29 20:24:43'),
(140, 'zoej', 'Charles &amp; Keith bag', 'accessories', '40cm', 'images/zoej/20200729202739.png', 20, 50, 9, NULL, '2020-07-29 20:27:39'),
(141, 'zoej', 'Charles &amp; Keith Handbag', 'accessories', 'the pink one', 'images/zoej/20200729202856.png', 50, 80, 9, NULL, '2020-07-29 20:28:56'),
(142, 'zoej', 'Charles &amp; Keith backpack', 'accessories', 'medium size', 'images/zoej/20200729202929.png', 30, 60, 9, NULL, '2020-07-29 20:29:29'),
(144, 'zoej', 'Longman dictionary', 'otherbooks', 'never used', 'images/zoej/20200729203153.png', 35, 50.99, 9, NULL, '2020-07-29 20:31:53'),
(145, 'zoej', 'Oxford disctionary', 'otherbooks', 'new', 'images/zoej/20200729203300.png', 28, 44.82, 9, NULL, '2020-07-29 20:33:00'),
(147, 'zoej', 'microphone', 'electronics', 'shining with five different colors', 'images/zoej/20200729203512.png', 15, 50, 6, NULL, '2020-07-29 20:35:12'),
(148, 'zoej', 'maple syrup', 'food', 'new from Canada', 'images/zoej/20200729203555.png', 25, 30, 9, NULL, '2020-07-29 20:35:55'),
(149, 'zoej', 'hand soap', 'daily necessity', '1.65L', 'images/zoej/20200729203820.png', 8, 12, 9, NULL, '2020-07-29 20:38:20'),
(150, 'zoej', 'Mere Christianity', 'otherbooks', 'C.S. LEWIS', 'images/zoej/20200729203929.png', 15, 19.99, 9, NULL, '2020-07-29 20:39:29'),
(151, 'zoej', 'Rubik Cube', 'toys/games', 'a weird cube', 'images/zoej/20200729204142.png', 5, 15, 6, 'sunshine boy', '2020-07-29 20:41:42'),
(152, 'zoej', 'Never split the difference', 'otherbooks', 'forget the original price', 'images/zoej/20200729204227.png', 20, 50, 7, NULL, '2020-07-29 20:42:27'),
(153, 'zoej', 'A notebook', 'stationery', '80 pages with lines', 'images/zoej/20200729204303.png', 10, 20, 9, NULL, '2020-07-29 20:43:03'),
(154, 'zoej', 'Will in the World', 'otherbooks', 'Stephen Greenblatt', 'images/zoej/20200729204402.png', 8, 14.99, 9, NULL, '2020-07-29 20:44:02'),
(155, 'baozi008', 'GRE sentence analysis', 'test prep', 'e-edition', 'images/baozi008/20200730001300.png', 5, 10, 9, NULL, '2020-07-30 00:13:00'),
(156, 'baozi008', 'TOEFL wordlist', 'test prep', 'with a lot of notes', 'images/baozi008/20200730001455.png', 10, 40, 7, NULL, '2020-07-30 00:14:55'),
(157, 'baozi008', 'GRE wordlist and exercise', 'test prep', 'e-edition', 'images/baozi008/20200730001709.png', 5, 10, 9, NULL, '2020-07-30 00:17:09'),
(158, 'hanyins2', 'ANTH 103 Textbook', 'textbook', 'e-edition', 'images/hanyins2/20200730003943.png', 10, 20, 9, NULL, '2020-07-30 00:39:43'),
(159, 'hanyins2', 'CS 412 Textbook', 'textbook', 'Data mining', 'images/hanyins2/20200730004024.png', 5, 20, 9, 'sunshine boy', '2020-07-30 00:40:24'),
(160, 'hanyins2', 'MATH 213 textbook', 'textbook', 'discrete math', 'images/hanyins2/20200730004123.png', 5, 25, 9, NULL, '2020-07-30 00:41:23'),
(161, 'hanyins2', 'HDFS 105 Textbook', 'textbook', 'life-span development', 'images/hanyins2/20200730004207.png', 28, 45, 9, NULL, '2020-07-30 00:42:07'),
(162, 'hanyins2', 'RST 242 Textbook in Chinese', 'textbook', 'Chinese translation version', 'images/hanyins2/20200730004253.png', 20, 35, 9, NULL, '2020-07-30 00:42:53'),
(163, 'hanyins2', 'RST 242 Textbook', 'textbook', 'Wilderness and the American Mind', 'images/hanyins2/20200730004409.png', 10, 22.5, 9, 'jiaqil6', '2020-07-30 00:44:09'),
(164, 'baozi008', 'Invitation to Anthropology', 'otherbooks', 'in Chinese', 'images/baozi008/20200730004649.png', 10, 24, 9, NULL, '2020-07-30 00:46:49'),
(165, 'baozi008', 'Jigsaw puzzle', 'toys/games', 'very difficult', 'images/baozi008/20200730005110.png', 20, 50, 6, 'sunshine boy', '2020-07-30 00:51:10'),
(166, 'baozi008', 'dice puzzle', 'toys/games', 'difficult to solve', 'images/baozi008/20200730005212.png', 15, 38.5, 8, 'sunshine boy', '2020-07-30 00:52:12'),
(167, 'zoej', 'Bose Headphone', 'electronics', 'bought 3 months ago', 'images/zoej/20200730005420.png', 120, 220, 9, NULL, '2020-07-30 00:54:20');

-- --------------------------------------------------------

--
-- Stand-in structure for view `SRT_leftJoin`
-- (See below for the actual view)
--
CREATE TABLE `SRT_leftJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
,`cntTrans` bigint
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `SRT_rightJoin`
-- (See below for the actual view)
--
CREATE TABLE `SRT_rightJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
,`cntTrans` bigint
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `SR_fullJoin`
-- (See below for the actual view)
--
CREATE TABLE `SR_fullJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `SR_leftJoin`
-- (See below for the actual view)
--
CREATE TABLE `SR_leftJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `SR_rightJoin`
-- (See below for the actual view)
--
CREATE TABLE `SR_rightJoin` (
`Tag` varchar(50)
,`cntSales` bigint
,`cntRequests` bigint
);

-- --------------------------------------------------------

--
-- Table structure for table `Transactions`
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
-- Dumping data for table `Transactions`
--

INSERT INTO `Transactions` (`TransactionId`, `SellerId`, `BuyerId`, `ProductName`, `Price`, `Tag`, `Description`, `Date`) VALUES
(1, 'Hxh123', 'xinyi.17', 'Basketball', 10, 'sports', 'A old basketball', '2020-07-25 08:34:46'),
(2, 'xinyi.17', 'Hxh123', 'Badminton bat', 10, 'sports', 'Li Ning Badminton bat', '2020-07-25 08:35:18'),
(3, 'xlai7', 'Barbara', 'Small Shelf', 3, 'furniture', 'A good helper to keep your room organized', '2020-07-25 12:51:34'),
(5, 'young lady', 'xlai7', 'GRE vocabulary book', 3, 'otherbooks', 'good book', '2020-07-25 14:26:51'),
(6, 'xlai7', 'xinyi.17', 'iPhone Cable', 2, 'accessories', 'iPhone Cable', '2020-07-26 03:30:35'),
(7, 'xinyi.17', 'young lady', 'ECE310 textbook', 30, 'textbook', 'ECE310 textbook, digital signal processing', '2020-07-26 03:31:06'),
(8, 'xinyi.17', 'yiru', 'Uni-ball Pen', 10, 'stationery', 'A box of Uni-ball pen (12 pcs)', '2020-07-26 03:31:09'),
(9, 'xinyi', 'Gavin', 'Yoga Mat', 5, 'sports', 'A Blue Yoga mat', '2020-07-26 03:36:53'),
(10, 'xinyi', 'young lady', 'ECE330 textbook', 30, 'textbook', 'ECE330 textbook, Power Circuits', '2020-07-26 03:36:59'),
(11, 'xinyi', 'xinyi.17', 'Yoga String and Massaging Ball', 2, 'sports', 'Yoga String and Massaging Ball', '2020-07-26 03:37:05'),
(12, 'xinyi', 'young lady', 'cutter', 4, 'tools', 'helper for electronic labs (eg ECE385)', '2020-07-26 03:37:09'),
(13, 'xlai7', 'xinyi', 'Slippers', 3, 'daily necessity', 'A pair of slippers, brand new', '2020-07-26 03:42:00'),
(14, 'xlai7', 'xlai7', 'Book: Psychology of Crowds', 3, 'otherbooks', 'Psychology of Crowds / Psychologie des foules', '2020-07-26 03:42:04'),
(15, 'xinyi.17', 'xinyi', 'Toy#2', 3, 'toys/games', 'A lovely toy', '2020-07-26 03:42:36'),
(16, 'xinyi.17', 'xlai7', 'Stapler', 5, 'stationery', 'A brand new stapler', '2020-07-26 03:42:39'),
(17, 'genius', 'LittleBiscuit', 'Elements of Statistical Learning', 20, 'textbook', 'Elements of Statistical Learning', '2020-07-26 04:44:44'),
(18, 'yiru', 'young lady', 'Probability textbook', 7, 'textbook', 'ZJU publisher', '2020-07-26 11:18:08'),
(19, 'yiru', 'xlai7', 'Advanced Mathmatics', 25, 'textbook', 'Tongji University Publisher, new, two books', '2020-07-26 11:18:13'),
(20, 'Barbara', 'xlai7', 'scissor', 2, 'daily necessity', 'second hand but still sharp', '2020-07-26 12:03:58'),
(21, 'Barbara', 'xlai7', 'mobile phone holder', 1, 'daily necessity', 'new', '2020-07-26 12:04:03'),
(22, 'Barbara', 'yiru', 'White board', 5, 'stationery', 'for TOEFL and GRE home test', '2020-07-26 12:04:09'),
(23, 'xinyi.17', 'yiru', 'iPhone Earphone', 5, 'accessories', 'iPhone Earphone', '2020-07-26 12:12:03'),
(24, 'sunshine boy', 'xlai7', 'kickboard', 3, 'sports', 'Kickboard, help you learn swimming', '2020-07-27 02:03:47'),
(25, 'xlai7', 'sunshine boy', 'Calculus textbook', 20, 'textbook', 'Calculus textbook', '2020-07-27 02:05:37'),
(26, 'baozi008', 'Lynne', 'GRE sentence analysis', 5, 'test prep', 'e-edition', '2020-07-29 04:10:45'),
(27, 'baozi008', 'Lynne', 'TOEFL wordlist', 10, 'test prep', 'with a lot of notes', '2020-07-29 04:10:48'),
(28, 'hxh123', 'xinyi', 'Watch', 50, 'electronics', 'A Casio watch', '2020-07-29 08:51:17'),
(29, 'hxh123', 'xinyi', 'Umbrella', 10, 'daily necessity', 'A big umbrella', '2020-07-29 08:51:19'),
(30, 'hxh123', 'xinyi.17', 'Mechanical car', 100, 'toys/games', 'A constructive car', '2020-07-29 08:51:20'),
(31, 'hxh123', 'xinyi.17', 'A laptop', 100, 'electronics', 'A mac laptop', '2020-07-29 08:51:21'),
(32, 'xinyi', 'Hxh123', 'Foam Roller', 5, 'sports', 'Good for relaxing after exercising', '2020-07-29 09:02:41'),
(33, 'xinyi', 'Hxh123', 'Badminton Bat', 10, 'sports', 'Badminton Bat, LiNing', '2020-07-29 09:02:42'),
(34, 'xinyi.17', 'Hxh123', 'Hand Sanitizer', 6, 'daily necessity', 'Hand Sanitizer, fight with COVID19 together!', '2020-07-29 09:04:27'),
(35, 'Barbara', 'Haohao', 'sunshade umbrella', 13, 'tools', 'new', '2020-07-29 09:40:30'),
(36, 'yiru', 'Barbara', 'White board pen*5', 5, 'stationery', 'new', '2020-07-29 09:53:22'),
(37, 'yiru', 'Hxh123', 'Muji notebook', 5, 'stationery', 'new', '2020-07-29 09:53:24'),
(38, 'yiru', 'baozi008', 'Totoro', 7, 'toys/games', 'very large', '2020-07-29 09:53:26'),
(39, 'yiru', 'Barbara', 'mini decoration', 5, 'furniture', 'new', '2020-07-29 09:53:30'),
(40, 'yiru', 'Haohao', 'little bear humidifier', 10, 'tools', '2L water, used', '2020-07-29 09:53:35'),
(41, 'hahaGong', 'Hxh123', 'Yangmei', 8, 'food', 'bought yesterday', '2020-07-29 09:57:29'),
(42, 'hahaGong', 'Hxh123', 'Christmas Apple', 10, 'food', 'very large 500g', '2020-07-29 09:57:31'),
(43, 'hahaGong', 'Hxh123', 'Prima Taste Laksa soup', 5, 'food', '225g', '2020-07-29 09:57:34'),
(44, 'yiru', 'hahaGong', 'paper extraction *6', 6, 'daily necessity', '6 packages for one packet', '2020-07-29 10:00:12'),
(45, 'yiru', 'hahaGong', 'automatic apple sharper', 3, 'tools', 'used for 3 times', '2020-07-29 10:00:15'),
(46, 'Barbara', 'yiru', 'Power bank 10000mA', 7, 'electronics', 'second hand', '2020-07-29 10:00:45'),
(47, 'xlai7', 'Barbara', 'Paper Towel', 0.5, 'daily necessity', 'A roll of brand new paper towel', '2020-07-29 10:01:41'),
(48, 'xlai7', 'yiru', 'thermos cup', 6, 'daily necessity', 'stay warm, keep healthy', '2020-07-29 10:01:42'),
(49, 'xinyi', 'Haohao', 'Lego Technic 42093', 40, 'toys/games', 'Lego Technic 42093, 578pcs, 2 in 1', '2020-07-29 10:01:58'),
(50, 'xinyi', 'Barbara', 'Digital Weighing Scale', 10, 'furniture', 'Remind you of keeping fit!', '2020-07-29 10:01:59'),
(51, 'xinyi', 'Barbara', 'Medical Mask', 1, 'daily necessity', 'Medical Mask, 10pc, fight with COVID19 together!', '2020-07-29 10:02:00'),
(52, 'xinyi.17', 'yiru', 'Toy#1', 3, 'toys/games', 'A lovely toy', '2020-07-29 10:02:21'),
(53, 'xinyi.17', 'yiru', 'Pins', 1, 'stationery', 'A box of pins', '2020-07-29 10:02:22'),
(54, 'jiaqil6', 'hh', 'Yellow Luggage', 69, 'other', 'a yellow luggage, water proof', '2020-07-29 15:04:41'),
(55, 'baozi008', 'hh', 'GRE wordlist and exercise', 5, 'test prep', 'e-edition', '2020-07-30 00:11:28'),
(56, 'baozi008', 'yiru', 'Intro to Computing Systems', 20, 'textbook', 'textbook for ECE120 and ECE220 photocopy edition', '2020-07-30 00:11:30'),
(57, 'zoej', 'baozi008', 'Bose Headphone', 150, 'electronics', 'bought 3 months ago', '2020-07-30 00:24:55'),
(58, 'zoej', 'baozi008', 'a cute sheep', 45, 'toys/games', 'cute and soft', '2020-07-30 00:24:58'),
(59, 'hanyins2', 'Lynne', 'Washable Markers', 2, 'stationery', 'Two of them are used', '2020-07-30 00:38:30'),
(60, 'goodgirl', 'baozi008', 'A cute cup', 5, 'daily necessity', 'Pink cup', '2020-07-30 01:59:06'),
(61, 'goodgirl', 'baozi008', 'Cosmetic Brushes', 20, 'makeup/personal care', 'Easy to use, contain all kinds of brushes', '2020-07-30 01:59:13'),
(62, 'sunshine boy', 'xinyi.17', 'mask', 2, 'daily necessity', 'medical mask', '2020-07-30 13:05:43'),
(63, 'sunshine boy', 'xinyi.17', 'bone conduction headset', 50, 'electronics', 'wireless bone conduction headset, Aftershokz', '2020-07-30 13:05:46'),
(64, 'sunshine boy', 'Haohao', 'FPGA', 100, 'electronics', 'FPGA for ECE385 lab', '2020-07-30 13:05:50'),
(65, 'keruiz2', 'xinyi', 'closet', 100, 'furniture', 'wood closet, no smell', '2020-07-30 13:18:14'),
(66, 'keruiz2', 'xinyi', 'door', 60, 'furniture', 'Entrance only with an authorized card', '2020-07-30 13:18:18'),
(67, 'keruiz2', 'zoej', 'kettle', 3, 'furniture', 'common kettle, never used', '2020-07-30 13:18:22'),
(68, 'keruiz2', 'zoej', 'chair', 15, 'furniture', 'common chair', '2020-07-30 13:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
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
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`NetId`, `Password`, `Name`, `Email`, `Campus`, `Major`, `Year`, `DateJoin`) VALUES
('baozi008', 'baozi008', 'Hanyin', 'hanyin.17@intl.zju.edu.cn', 'ZJUIntl', 'CompE', 'Senior', '2020-07-26 17:38:08'),
('Barbara', 'Barbara', 'Barbara', '3170111549@zju.edu.cn', 'ZJUIntl', 'BMS', 'Junior', '2020-07-25 12:35:32'),
('cs411', 'cs411', 'Little Genius', 'cs411@genius.com', 'UIUC', 'CS', 'Junior', '2020-07-25 06:14:03'),
('Gavin', '123456', 'Haozhe Chen', 'Haozhe.18@intl.zju.edu.cn', 'ZJUIntl', 'CompE', 'Junior', '2020-07-25 14:42:54'),
('genius', 'genius', 'Real Genius', 'genius@genius.com', 'ZJU', 'Other', 'Graduate', '2020-07-25 07:03:09'),
('goodgirl', 'goodgirl', 'goodgirl', 'loujiaqi1998@126.com', 'UIUC', 'BMI', 'Freshman', '2020-07-29 15:06:10'),
('hahaGong', 'hahaGong', 'Gong', '304790320@qq.com', 'ZJUIntl', 'BMS', 'Junior', '2020-07-26 11:28:29'),
('hanyins2', 'hanyins2', 'Hanyin Shao', 'hanyins2@illinois.edu', 'UIUC', 'CompE', 'Junior', '2020-07-26 17:30:29'),
('Haohao', '123456789', 'Hao', 'hao.17@intl.zju.edu.cn', 'ZJUIntl', 'ME', 'Junior', '2020-07-29 09:05:00'),
('hh', '123456789', 'Hao', '666666@qq.com', 'ZJUIntl', 'ME', 'Junior', '2020-07-29 10:10:40'),
('Hxh123', '123456789', 'Hao', 'haoh4@illinois.edu', 'ZJUIntl', 'ME', 'Junior', '2020-07-25 08:21:19'),
('jiaqil6', 'jiaqil6', 'jiaqil6', 'jiaqil6@illinois.edu', 'ZJUIntl', 'EE', 'Junior', '2020-07-26 11:21:55'),
('keruiz2', 'keruiz2', 'Kerui Zhu', 'keruiz2@illinois.edu', 'UIUC', 'CS', 'Junior', '2020-07-25 09:25:18'),
('LittleBiscuit', 'fecbi5-kosrYz-focwyc', 'Yulin Li', 'yulin.17@intl.zju.edu.cn', 'UIUC', 'EE', 'Senior', '2020-07-25 21:27:42'),
('Lynne', 'dihpot-sawcYh-3xodxe', 'Yulin Li', 'yulin.17@intl.zju.edu.cn', 'ZJUIntl', 'EE', 'Senior', '2020-07-27 22:13:33'),
('sunshine boy', 'sb', 'Kerui Zhu', 'kerui.17@intl.zju.edu.cn', 'ZJUIntl', 'CompE', 'Junior', '2020-07-25 09:46:40'),
('Xinyi', 'xinyi', 'Xinyi', '3170111149@zju.edu.cn', 'ZJU', 'EE', 'Freshman', '2020-07-25 10:12:33'),
('xinyi.17', 'xinyi.17', 'Lai Xinyi', 'xinyi.17@intl.zju.edu.cn', 'ZJUIntl', 'EE', 'Senior', '2020-07-25 08:20:40'),
('xlai7', 'xlai7', 'Xinyi Lai', 'xlai7@illinois.edu', 'UIUC', 'EE', 'Senior', '2020-07-25 09:06:02'),
('yiru', 'yiru', 'Yiru', 'yiru.17@intl.zju.edu.cn', 'ZJUIntl', 'BMS', 'Junior', '2020-07-25 14:14:19'),
('young lady', 'young lady', 'young lady', 'younglady@intl.zju.edu.cn', 'ZJUIntl', 'ME', 'Freshman', '2020-07-25 14:16:43'),
('Zoej', 'zoej', 'Zoe', 'jcn9729@outlook.com', 'UIUC', 'BMS', 'Graduate', '2020-07-29 18:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `Visit`
--

CREATE TABLE `Visit` (
  `Visit` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure for view `SRT_leftJoin`
--
DROP TABLE IF EXISTS `SRT_leftJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SRT_leftJoin`  AS  select `SR_fullJoin`.`Tag` AS `Tag`,`SR_fullJoin`.`cntSales` AS `cntSales`,`SR_fullJoin`.`cntRequests` AS `cntRequests`,`tmp3`.`cntTrans` AS `cntTrans` from (`SR_fullJoin` left join (select `Transactions`.`Tag` AS `Tag`,count(0) AS `cntTrans` from `Transactions` group by `Transactions`.`Tag`) `tmp3` on((`SR_fullJoin`.`Tag` = `tmp3`.`Tag`))) ;

-- --------------------------------------------------------

--
-- Structure for view `SRT_rightJoin`
--
DROP TABLE IF EXISTS `SRT_rightJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SRT_rightJoin`  AS  select `tmp3`.`Tag` AS `Tag`,`SR_fullJoin`.`cntSales` AS `cntSales`,`SR_fullJoin`.`cntRequests` AS `cntRequests`,`tmp3`.`cntTrans` AS `cntTrans` from ((select `Transactions`.`Tag` AS `Tag`,count(0) AS `cntTrans` from `Transactions` group by `Transactions`.`Tag`) `tmp3` left join `SR_fullJoin` on((`SR_fullJoin`.`Tag` = `tmp3`.`Tag`))) ;

-- --------------------------------------------------------

--
-- Structure for view `SR_fullJoin`
--
DROP TABLE IF EXISTS `SR_fullJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SR_fullJoin`  AS  select `tmp`.`Tag` AS `Tag`,`tmp`.`cntSales` AS `cntSales`,`tmp`.`cntRequests` AS `cntRequests` from (select `SR_leftJoin`.`Tag` AS `Tag`,`SR_leftJoin`.`cntSales` AS `cntSales`,`SR_leftJoin`.`cntRequests` AS `cntRequests` from `SR_leftJoin` union select `SR_rightJoin`.`Tag` AS `Tag`,`SR_rightJoin`.`cntSales` AS `cntSales`,`SR_rightJoin`.`cntRequests` AS `cntRequests` from `SR_rightJoin`) `tmp` ;

-- --------------------------------------------------------

--
-- Structure for view `SR_leftJoin`
--
DROP TABLE IF EXISTS `SR_leftJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SR_leftJoin`  AS  select `tmp1`.`Tag` AS `Tag`,`tmp1`.`cntSales` AS `cntSales`,`tmp2`.`cntRequests` AS `cntRequests` from ((select `Sales`.`Tag` AS `Tag`,count(0) AS `cntSales` from `Sales` group by `Sales`.`Tag`) `tmp1` left join (select `Requests`.`Tag` AS `Tag`,count(0) AS `cntRequests` from `Requests` group by `Requests`.`Tag`) `tmp2` on((`tmp1`.`Tag` = `tmp2`.`Tag`))) ;

-- --------------------------------------------------------

--
-- Structure for view `SR_rightJoin`
--
DROP TABLE IF EXISTS `SR_rightJoin`;

CREATE ALGORITHM=UNDEFINED DEFINER=`Geniuses`@`%` SQL SECURITY DEFINER VIEW `SR_rightJoin`  AS  select `tmp2`.`Tag` AS `Tag`,`tmp1`.`cntSales` AS `cntSales`,`tmp2`.`cntRequests` AS `cntRequests` from ((select `Requests`.`Tag` AS `Tag`,count(0) AS `cntRequests` from `Requests` group by `Requests`.`Tag`) `tmp2` left join (select `Sales`.`Tag` AS `Tag`,count(0) AS `cntSales` from `Sales` group by `Sales`.`Tag`) `tmp1` on((`tmp1`.`Tag` = `tmp2`.`Tag`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Requests`
--
ALTER TABLE `Requests`
  ADD PRIMARY KEY (`RequestId`),
  ADD KEY `Requests_ibfk_1` (`BuyerId`),
  ADD KEY `Requests_ibfk_2` (`SaleId`);

--
-- Indexes for table `Sales`
--
ALTER TABLE `Sales`
  ADD PRIMARY KEY (`SaleId`),
  ADD KEY `Sales_ibfk_1` (`SellerId`),
  ADD KEY `Sales_ibfk_2` (`IntendedBuyerId`);

--
-- Indexes for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD PRIMARY KEY (`TransactionId`),
  ADD KEY `Transactions_ibfk_1` (`BuyerId`),
  ADD KEY `Transactions_ibfk_2` (`SellerId`);

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
  MODIFY `RequestId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Sales`
--
ALTER TABLE `Sales`
  MODIFY `SaleId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `Transactions`
--
ALTER TABLE `Transactions`
  MODIFY `TransactionId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Requests`
--
ALTER TABLE `Requests`
  ADD CONSTRAINT `Requests_ibfk_1` FOREIGN KEY (`BuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `Requests_ibfk_2` FOREIGN KEY (`SaleId`) REFERENCES `Sales` (`SaleId`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `Sales`
--
ALTER TABLE `Sales`
  ADD CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`SellerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `Sales_ibfk_2` FOREIGN KEY (`IntendedBuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `Transactions`
--
ALTER TABLE `Transactions`
  ADD CONSTRAINT `Transactions_ibfk_1` FOREIGN KEY (`BuyerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `Transactions_ibfk_2` FOREIGN KEY (`SellerId`) REFERENCES `Users` (`NetId`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
