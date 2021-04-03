-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 12:58 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(3) NOT NULL,
  `firstname` text DEFAULT NULL,
  `lastname` text DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `contact` varchar(13) DEFAULT NULL,
  `commission` int(8) DEFAULT NULL,
  `salary` int(7) DEFAULT NULL,
  `hireDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `firstname`, `lastname`, `location`, `contact`, `commission`, `salary`, `hireDate`) VALUES
(3, 'Agent', '654', 'North State, Wakanda', '123-456-789', 13, 3800, '2020-03-27'),
(4, 'Agent', '741', 'East State, Wakanda', '561-135-519', 19, 3400, '2020-01-06'),
(5, 'Agent', '431', 'South State, Wakanda', '128-268-131', 12, 4200, '2019-11-26'),
(6, 'Agent', '047', 'West State, Wakanda', '121-565-513', 16, 4500, '2019-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(5) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `prodId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `email`, `prodId`) VALUES
(10, 'pogu@gmail.com ', 21);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(5) NOT NULL,
  `prodId` int(3) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `comment` text NOT NULL,
  `time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `prodId`, `email`, `comment`, `time`) VALUES
(57, 20, 'pogu@gmail.com ', 'Fantastic house too bad i cannot get a raise', '2020-11-21 11:52:43');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `type` text DEFAULT NULL,
  `description` varchar(350) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `images` varchar(30) DEFAULT NULL,
  `buy` int(10) DEFAULT NULL,
  `rent` int(10) DEFAULT NULL,
  `down` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type`, `description`, `location`, `images`, `buy`, `rent`, `down`) VALUES
(19, 'house', '<p>2 bed - 4 bath</p>\r\n<p>Master Bathroom has walk-in shower, dual sinks, granite vanity.  Kitchen Open to Family Room, Breakfast Area</p>\r\n\r\n', 'North State, Wakanda', 'todd-kent.jpg', 258000, 1700, 12900),
(20, 'house', '<p>4 bed - 4 bath</p>\r\n<p>Rich views through large windows from the kitchen, living, and master bedroom face the outdoor living area and fairway</p>\r\n\r\n', 'North East State, Wakanda', 'micah-carlson.jpg', 351000, 3000, 17550),
(21, 'house', '<p>3 bed - 2 bath</p>\r\n<p>Updated kitchen has gorgeous Knotty Alder custom cabinets with hidden wine storage, abundant storage spaces, expansive stainless steel appliances, induction cooktop, granite counters, French door refrigerator. Spacious living room offers a cozy gas log fireplace, gorgeous wood floors & plantation shutters</p>', 'West State, Wakanda', 'ann-wallace.jpg', 216000, 5000, 10800),
(22, 'house', '<p>5 bed - 3 bath</p>\r\n<p>Check out this spacious townhome with a private backyard and convenient access to the lake.</p>', 'East State, Wakanda', 'abbilyn-zavgorodniaia.jpg', 400000, 8000, 20000),
(23, 'house', '<p>3 bed - 3 bath</p>\r\n<p>Beautiful home with swimming pool, immaculately cared-for by original owners</p>\r\n<p>Open light, bright living, kitchen, & breakfast nook are the heart of this home. Cozy corner fireplace with gas logs in the family room are a favorite. Formal living room could easily convert to full downstairs study. </p>\r\n', 'South West, Wakanda', 'aubrey-odom.jpg', 254000, 3000, 12700),
(32, 'apartment', '<p>great community</p>\r\n<p>some furniture is already provided for</p>\r\n<p>This recently renovated condo sits on the top floor of a modern high-rise building</p>', 'South State, Wakanda', 'naomi-hebert.jpg', 15000, 1200, 750),
(33, 'apartment', '<p>High-speed internet ready</p>\r\n<p>Washer/dryer</p>\r\n<p>Hardwood-Style Flooring</p>\r\n<p>Large Soaking Tubs</p>\r\n<p>Large Walk-in Closets</p>\r\n\r\n', 'North State, Wakanda', 'fran-hogan.jpg', 12000, 1600, 600);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `firstname` text DEFAULT NULL,
  `lastname` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(6, 'f', 'f', 'f@email.com ', '8fa14cdd754f91cc6554c9e71929cce7'),
(25, 'pogu', 'working', 'pogu@gmail.com ', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`prodId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodId` (`prodId`),
  ADD KEY `prodId_2` (`prodId`),
  ADD KEY `prodId_3` (`prodId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `test` FOREIGN KEY (`prodId`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
