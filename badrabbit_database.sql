-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2021 at 01:59 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `badrabbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Girls'),
(2, 'Boys'),
(7, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) NOT NULL,
  `color_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Green'),
(4, 'Yellow'),
(6, 'White'),
(7, 'Black'),
(8, 'Pink');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `postcode` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(10) DEFAULT NULL,
  `products_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `phone`, `email`, `address1`, `address2`, `postcode`, `city`, `country`, `payment_type`, `order_date`, `user_id`, `products_id`) VALUES
(5, 'Marius', 'Cretu', '+447459917350', 'marius_cretu12@yahoo.com', '23 Woods Court', 'asdasdasd', 'CO45YR', 'Colchester', 'United Kingdom', 'PayPal', '2020-12-02 15:45:47', 1, 'a:2:{i:0;s:5:\"20021\";i:1;s:4:\"1002\";}'),
(6, 'new user', 'new user2', '36346634', 'testnew@yahoo.com', 'address 1', 'address 2', 'co45yr', 'col', 'roma', 'PayPal', '2021-01-03 12:48:52', 10, 'a:2:{i:0;s:2:\"02\";i:1;s:2:\"03\";}'),
(7, 'Alexandra', 'Necula', '0332409157', 'necularares@gmail.com', 'Strada Frumoasa, Nr. 2, Bloc 918, Tronson 1, Ap. 24', '1 Dockers Tanner Road', '700729', 'Iasi', 'România', 'PayPal', '2021-01-03 13:16:48', 10, 'a:2:{i:0;s:2:\"02\";i:1;s:2:\"05\";}'),
(8, 'Rares-Ciprian', 'Necula', '07983899555', 'rares_cip@yahoo.com', '264 Westferry Road', '1 Dockers Tanner Road', 'E143AG', 'Greater London', 'Regatul Unit', 'PayPal', '2021-01-03 13:17:06', 10, 'a:2:{i:0;s:2:\"02\";i:1;s:2:\"05\";}'),
(9, 'Rares-Ciprian', 'Necula', '07983899555', 'necularares@gmail.com', 'Flat 38 Kingsbridge Court', '1 Dockers Tanner Road', 'E14 9WB', 'Greater London', 'Regatul Unit', 'PayPal', '2021-01-03 13:45:01', 0, 'a:2:{i:0;s:2:\"03\";i:1;s:2:\"02\";}'),
(10, 'Rares-Ciprian', 'Necula', '07983899555', 'rares_cip@yahoo.com', '264 Westferry Road', '1 Dockers Tanner Road', 'E143AG', 'Greater London', 'Regatul Unit', 'PayPal', '2021-01-03 13:46:16', 11, 'a:2:{i:0;s:2:\"03\";i:1;s:2:\"02\";}'),
(11, 'Rares', 'Necula', '07983899555', 'necularares@gmail.com', 'Flat 17 Kingsbridge Court', '1 Dockers Tanner Road', 'E14 9WB', 'London', 'Regatul Unit', 'PayPal', '2021-01-03 13:49:24', 11, 'a:2:{i:0;s:2:\"03\";i:1;s:2:\"02\";}'),
(12, 'Rares-Ciprian', 'Necula', '07983899555', 'necularares@gmail.com', 'Flat 38 Kingsbridge Court', '1 Dockers Tanner Road', 'E14 9WB', 'Greater London', 'Regatul Unit', 'PayPal', '2021-01-03 13:52:41', 1, 'a:4:{i:0;s:2:\"02\";i:1;s:2:\"12\";i:2;s:2:\"12\";i:3;s:2:\"12\";}'),
(13, 'Rares', 'Necula', '07983899555', 'necularares@gmail.com', 'Flat 17 Kingsbridge Court', '1 Dockers Tanner Road', 'E14 9WB', 'London', 'Regatul Unit', 'PayPal', '2021-01-04 06:11:13', 12, 'a:3:{i:0;s:2:\"02\";i:1;s:2:\"03\";i:2;s:2:\"04\";}');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(200) DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `short_desc` varchar(200) DEFAULT NULL,
  `long_desc` text DEFAULT NULL,
  `color_id` int(10) DEFAULT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `size_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `image_link2` text DEFAULT NULL,
  `image_link3` text DEFAULT NULL,
  `image_link4` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `short_desc`, `long_desc`, `color_id`, `sku`, `size_id`, `category_id`, `image_link`, `image_link2`, `image_link3`, `image_link4`) VALUES
(1, 'Sculpture Head Sweatshirt', 35.00, 'Yellow Must Have Hoodie with Sculpture Head', 'Material: 65% Cotton 35% Polyester\r\nDensity: 320 g/m2\r\nWashable at 40° C\r\nPrinting method: DTG\r\nStraight cut with side seams\r\nDrawcord hood with lining\r\nInner back neckline with a shell color tape\r\nKangaroo patch pocket\r\n2:2 rib knit bottom hem and cuffs with 5 % elastane\r\nBrushed inner side', 4, '01', 1, 2, 'images\\products\\boys\\boys_2_yellow\\011.jpg', 'images\\products\\boys\\boys_1_yellow\\Bad_Rabbit-0014.jpg', 'images\\products\\boys\\boys_2_yellow\\008_2.jpg', NULL),
(2, 'Abstract Sculpture Sweatshirt', 35.00, 'Yellow Must Have Hoodie with Abstract Sculpture', 'Material: 65% Cotton 35% Polyester\r\nDensity: 320 g/m2\r\nWashable at 40° C\r\nPrinting method: DTG\r\nStraight cut with side seams\r\nDrawcord hood with lining\r\nInner back neckline with a shell colour tape\r\nKangaroo patch pocket\r\n2:2 rib knit bottom hem and cuffs with 5 % elastane\r\nBrushed inner side', 4, '02', 1, 2, 'images\\products\\boys\\boys_1_yellow\\008.jpg', NULL, NULL, NULL),
(3, 'BadRabbit Label Sweatshirt', 30.00, 'White Must Have BadRabbit Label Hoodie', 'Material: 65% Cotton 35% Polyester\r\nDensity: 300 g/m2\r\nWashable at 40° C\r\nPrinting method: cut & print\r\nFrench terry, brushed inner side, 65 % cotton, 35 % polyester\r\nStraight cut with side seams\r\n1:1 rib knit bottom hem, cuffs and neckline with 5 % elastane\r\nBrushed inner side', 6, '03', 1, 2, 'images\\products\\boys\\boys_1_white\\004.jpg', 'images\\products\\boys\\boys_1_white\\1R9A0692.jpg', 'images\\products\\boys\\boys_1_white\\004_2.jpg', 'images\\products\\boys\\boys_1_white\\1R9A0698.jpg'),
(4, 'Big Bad Rabbit Sweatshirt', 30.00, 'White Must Have Big Bad Rabbit Hoodie', 'Material: 65% Cotton 35% Polyester\r\nDensity: 300 g/m2\r\nWashable at 40° C\r\nPrinting method: cut & print\r\nFrench terry, brushed inner side, 65 % cotton, 35 % polyester\r\nStraight cut with side seams\r\n1:1 rib knit bottom hem, cuffs and neckline with 5 % elastane\r\nBrushed inner side', 6, '04', 1, 2, 'images\\products\\boys\\boys_2_white\\005.jpg', NULL, NULL, NULL),
(5, '\"Follow Me\" Sweatshirt', 30.00, 'White Must Have \"Follow Me\" Hoodie', 'Material: 65% Cotton 35% Polyester\r\nDensity: 300 g/m2\r\nWashable at 40° C\r\nPrinting method: cut & print\r\nFrench terry, brushed inner side, 65 % cotton, 35 % polyester\r\nStraight cut with side seams\r\n1:1 rib knit bottom hem, cuffs and neckline with 5 % elastane\r\nBrushed inner side', 6, '05', 1, 2, 'images\\products\\boys\\boys_6_white\\012.jpg', NULL, NULL, NULL),
(6, '\"Chaos\" Sweatshirt', 30.00, 'White Must Have \"Chaos\" Hoodie', 'Material: 65% Cotton 35% Polyester\r\nDensity: 300 g/m2\r\nWashable at 40° C\r\nPrinting method: cut & print\r\nFrench terry, brushed inner side, 65 % cotton, 35 % polyester\r\nStraight cut with side seams\r\n1:1 rib knit bottom hem, cuffs and neckline with 5 % elastane\r\nBrushed inner side', 6, '06', 1, 2, 'images\\products\\boys\\boys_4_white\\009.jpg', NULL, NULL, NULL),
(7, '\"Get S#it Done\" Sweatshirt', 35.00, 'White Must Have \"Get S#it Done\" Hoodie', 'Material: 65% Cotton 35% Polyester\r\nDensity: 300 g/m2\r\nWashable at 40° C\r\nPrinting method: cut & print\r\nFrench terry, brushed inner side, 65 % cotton, 35 % polyester\r\nStraight cut with side seams\r\n1:1 rib knit bottom hem, cuffs and neckline with 5 % elastane\r\nBrushed inner side', 6, '07', 1, 2, 'images\\products\\boys\\boys_3_white\\006.jpg', NULL, NULL, NULL),
(8, '\"Social Media\" Sweatshirt', 30.00, 'White Must Have \"Social Media\" Hoodie', 'Material: 65% Cotton 35% Polyester\r\nDensity: 300 g/m2\r\nWashable at 40° C\r\nPrinting method: cut & print\r\nFrench terry, brushed inner side, 65 % cotton, 35 % polyester\r\nStraight cut with side seams\r\n1:1 rib knit bottom hem, cuffs and neckline with 5 % elastane\r\nBrushed inner side', 6, '08', 1, 2, 'images\\products\\boys\\boys_5_white\\010.jpg', NULL, NULL, NULL),
(12, 'Yellow Rabbit Ears Hoodie', 20.00, 'Yellow Must Have Rabbit Ears Hoodie', 'Material: 35% Cotton 65% Polyester\r\nDensity: 160 g/m2\r\nWashable at 30° C\r\nStraight cut with side seams\r\nDrawcord hood with lining\r\nKangaroo patch pocket\r\n1:1 rib knit bottom hem and cuffs\r\nBrushed inner side', 4, '11', 1, 1, 'images\\products\\girls\\girls_yellow\\003.jpg', NULL, NULL, NULL),
(13, 'Black Rabbit Ears Hoodie', 20.00, 'Black Must Have Rabbit Ears Hoodie', 'Material: 35% Cotton 65% Polyester\r\nDensity: 160 g/m2\r\nWashable at 30° C\r\nStraight cut with side seams\r\nDrawcord hood with lining\r\nKangaroo patch pocket\r\n1:1 rib knit bottom hem and cuffs\r\nBrushed inner side', 7, '12', 1, 1, 'images\\products\\girls\\girls_black\\1.jpg', NULL, NULL, NULL),
(14, 'Blue Rabbit Ears Hoodie', 20.00, 'Blue Must Have Rabbit Ears Hoodie', 'Material: 35% Cotton 65% Polyester\r\nDensity: 160 g/m2\r\nWashable at 30° C\r\nStraight cut with side seams\r\nDrawcord hood with lining\r\nKangaroo patch pocket\r\n1:1 rib knit bottom hem and cuffs\r\nBrushed inner side', 2, '13', 1, 1, 'images\\products\\girls\\girls_blue\\Blue rabbit ears hoodie-1.jpg', NULL, NULL, NULL),
(15, 'Pink Rabbit Ears Hoodie', 20.00, 'Pink Must Have Rabbit Ears Hoodie', 'Material: 35% Cotton 65% Polyester\r\nDensity: 160 g/m2\r\nWashable at 30° C\r\nStraight cut with side seams\r\nDrawcord hood with lining\r\nKangaroo patch pocket\r\n1:1 rib knit bottom hem and cuffs\r\nBrushed inner side', 8, '14', 1, 1, 'images\\products\\girls\\girls_pink\\1.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) NOT NULL,
  `size_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `is_admin` varchar(2) NOT NULL DEFAULT 'N',
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `is_admin`, `first_name`, `last_name`, `email`, `password`, `register_date`) VALUES
(1, 'Y', 'Rares', 'Rw', 'rares@yahoo.com', 'test123', '2020-12-10 22:34:36'),
(2, 'Y', 'marius', 'cretu', 'marius@yahoo.com', 'test', '2021-01-03 13:50:37'),
(3, 'Y', 'test', 'test', 'test@yahoo.com', 'test', '2020-12-17 03:14:57'),
(5, 'N', 'test1', 'test1', 'test1@yahoo.com', 'test', '2020-12-17 03:35:52'),
(6, 'N', 'test2', 'test2', 'test2@yahoo.com', 'test', '2020-12-17 03:14:53'),
(7, 'N', 'bogdan', 'stanciu', 'bg@yahoo.com', 'test123', '2020-12-10 22:34:36'),
(8, 'N', 'test123', 'test123', 'test@roehampton.ac.uk', 'test123', '2020-12-16 20:16:49'),
(9, 'N', 'ilona', 'craciun', 'ilona@yahoo.com', 'test123', '2020-12-26 09:23:01'),
(10, 'N', 'new', 'user', 'newuser@yahoo.com', '123123', '2021-01-03 10:53:51'),
(11, 'N', 'testtest', 'testtest', 'testtest@yahoo.com', '123123', '2021-01-03 13:45:54'),
(12, 'N', 'Rares', 'Necula', 'necularares@gmail.com', 'test123', '2021-01-04 06:03:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
