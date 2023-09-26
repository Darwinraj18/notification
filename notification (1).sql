-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 03:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notification`
--

-- --------------------------------------------------------

--
-- Table structure for table `mg_customer_entity`
--

CREATE TABLE `mg_customer_entity` (
  `entity_id` int(10) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `firstname` varchar(200) DEFAULT NULL,
  `lastname` varchar(200) DEFAULT NULL,
  `city` varchar(200) DEFAULT NULL,
  `zipcode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mg_customer_entity`
--

INSERT INTO `mg_customer_entity` (`entity_id`, `email`, `firstname`, `lastname`, `city`, `zipcode`) VALUES
(7, 'rahul@gmail.com', 'rahul', 'kumar', 'madurai', '1'),
(8, 'arun@gmail.com', 'arun', 'kumar', 'madurai', '1'),
(9, 'saran@gmail.com', 'saran', 'raj', 'kodai', '3'),
(10, 'prakash@gmail.com', 'prakash', 'raj', 'kodai', '3'),
(11, 'jhonewick@gmail.com', 'jhon', 'wick', 'coimbatore', '6'),
(12, 'pream@gmail.com', 'pream', 'kumar', 'coimbatore', '6'),
(13, 'gk@gmail.com', 'ganesh', 'kumar', 'chennai', '7');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `subcontent` varchar(200) NOT NULL,
  `img` varchar(200) NOT NULL,
  `des` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `subcontent`, `img`, `des`, `link`) VALUES
(4601, 'offer', 'C:\\xampp\\tmp\\phpDA09.tmp', 'laptops@70% offer', 'www.example.com'),
(4602, 'offer', 'C:\\xampp\\tmp\\phpC4BA.tmp', 'laptops@70% offer', 'www.example.com'),
(4603, 'offer', 'C:\\xampp\\tmp\\phpD1B1.tmp', 'laptops@70% offer', 'www.example.com'),
(4617, 'offer end soon', 'C:\\xampp\\tmp\\php486.tmp', 'earpods@50% offer', 'www.example.com'),
(4618, 'offer end soon', 'C:\\xampp\\tmp\\php47BB.tmp', 'earpods@50% offer', 'www.example.com'),
(4619, 'offer', 'C:\\xampp\\tmp\\php90B5.tmp', 'laptops@70% offer', 'www.example.com'),
(4620, 'offer', 'C:\\xampp\\tmp\\php4495.tmp', 'laptops@70% offer', 'www.example.com'),
(4621, 'offer', 'C:\\xampp\\tmp\\php98E2.tmp', 'laptops@70% offer', 'www.example.com'),
(4622, 'offer', 'C:\\xampp\\tmp\\phpF7BC.tmp', 'laptops@70% offer', 'www.example.com'),
(4623, 'offer', 'C:\\xampp\\tmp\\php749E.tmp', 'laptops@70% offer', 'www.example.com'),
(4624, 'offer', 'C:\\xampp\\tmp\\php9A91.tmp', 'laptops@70% offer', 'www.example.com'),
(4625, 'offer', 'C:\\xampp\\tmp\\php105E.tmp', 'laptops@70% offer', 'www.example.com'),
(4626, 'offer', 'C:\\xampp\\tmp\\php9B0.tmp', 'laptops@70% offer', 'www.example.com'),
(4627, 'offer', 'C:\\xampp\\tmp\\phpA57F.tmp', 'laptops@70% offer', 'www.example.com'),
(4628, 'offer', 'C:\\xampp\\tmp\\phpD327.tmp', 'laptops@70% offer', 'www.example.com'),
(4629, 'offer', 'C:\\xampp\\tmp\\phpB798.tmp', 'laptops@70% offer', 'www.example.com'),
(4630, 'offer', 'C:\\xampp\\tmp\\phpE730.tmp', 'laptops@70% offer', 'www.example.com'),
(4631, 'offer', 'C:\\xampp\\tmp\\php8F09.tmp', 'laptops@70% offer', 'www.example.com'),
(4632, 'offer', 'C:\\xampp\\tmp\\phpAAEF.tmp', 'laptops@70% offer', 'www.example.com'),
(4633, 'offer', 'C:\\xampp\\tmp\\php286D.tmp', 'laptops@70% offer', 'www.example.com'),
(4634, 'offer', 'C:\\xampp\\tmp\\php53D9.tmp', 'laptops@70% offer', 'www.example.com'),
(4635, 'offer', 'C:\\xampp\\tmp\\php633.tmp', 'laptops@70% offer', 'www.example.com'),
(4636, 'offer', 'C:\\xampp\\tmp\\phpF93E.tmp', 'laptops@70% offer', 'www.example.com'),
(4637, 'offer', 'C:\\xampp\\tmp\\php44C.tmp', 'laptops@70% offer', 'www.example.com'),
(4638, 'offer', 'C:\\xampp\\tmp\\php1904.tmp', 'laptops@70% offer', 'www.example.com'),
(4639, 'offer', 'C:\\xampp\\tmp\\php837.tmp', 'laptops@70% offer', 'www.example.com'),
(4640, 'offer', 'C:\\xampp\\tmp\\php22B0.tmp', 'laptops@70% offer', 'www.example.com'),
(4641, 'offer', 'C:\\xampp\\tmp\\php2377.tmp', 'laptops@70% offer', 'www.example.com'),
(4642, 'offer', 'C:\\xampp\\tmp\\php8F84.tmp', 'laptops@70% offer', 'www.example.com'),
(4643, 'offer', 'C:\\xampp\\tmp\\phpC8D0.tmp', 'laptops@70% offer', 'www.example.com'),
(4644, 'offer', 'C:\\xampp\\tmp\\phpA9C6.tmp', 'laptops@70% offer', 'www.example.com'),
(4645, 'offer', 'C:\\xampp\\tmp\\phpAD3D.tmp', 'laptops@70% offer', 'www.example.com'),
(4646, 'offer', 'C:\\xampp\\tmp\\php18A7.tmp', 'laptops@70% offer', 'www.example.com'),
(4647, 'offer', 'C:\\xampp\\tmp\\phpAA59.tmp', 'laptops@70% offer', 'www.example.com'),
(4648, 'offer', 'C:\\xampp\\tmp\\phpB22A.tmp', 'laptops@70% offer', 'www.example.com'),
(4649, 'offer', 'C:\\xampp\\tmp\\phpCE6B.tmp', 'laptops@70% offer', 'www.example.com'),
(4650, 'offer', 'C:\\xampp\\tmp\\php7C11.tmp', 'laptops@70% offer', 'www.example.com'),
(4651, 'offer', 'C:\\xampp\\tmp\\php9EE2.tmp', 'laptops@70% offer', 'www.example.com'),
(4652, 'offer', 'C:\\xampp\\tmp\\phpE524.tmp', 'laptops@70% offer', 'www.example.com'),
(4653, 'offer', 'C:\\xampp\\tmp\\php72A0.tmp', 'laptops@70% offer', 'www.example.com'),
(4654, 'offer', 'C:\\xampp\\tmp\\php346A.tmp', 'laptops@70% offer', 'www.example.com'),
(4655, 'offer', 'C:\\xampp\\tmp\\php8447.tmp', 'laptops@70% offer', 'www.example.com'),
(4656, 'offer', 'C:\\xampp\\tmp\\phpE544.tmp', 'laptops@70% offer', 'www.example.com'),
(4657, 'offer', 'C:\\xampp\\tmp\\php423A.tmp', 'laptops@70% offer', 'www.example.com'),
(4658, 'offer', 'C:\\xampp\\tmp\\php7369.tmp', 'laptops@70% offer', 'www.example.com'),
(4659, 'offer', 'C:\\xampp\\tmp\\php4CF2.tmp', 'laptops@70% offer', 'www.example.com'),
(4660, 'offer', 'C:\\xampp\\tmp\\php1350.tmp', 'laptops@70% offer', 'www.example.com'),
(4661, 'offer', 'C:\\xampp\\tmp\\php3BD2.tmp', 'laptops@70% offer', 'www.example.com'),
(4662, 'offer', 'C:\\xampp\\tmp\\phpAECE.tmp', 'laptops@70% offer', 'www.example.com'),
(4663, 'offer', 'C:\\xampp\\tmp\\php1AE3.tmp', 'laptops@70% offer', 'www.example.com'),
(4664, 'offer', 'C:\\xampp\\tmp\\php1B8B.tmp', 'laptops@70% offer', 'www.example.com'),
(4665, 'offer', 'C:\\xampp\\tmp\\php7FE4.tmp', 'laptops@70% offer', 'www.example.com'),
(4666, 'offer', 'C:\\xampp\\tmp\\php92E6.tmp', 'laptops@70% offer', 'www.example.com'),
(4667, 'offer', 'C:\\xampp\\tmp\\php4AA9.tmp', 'laptops@70% offer', 'www.example.com'),
(4668, 'offer', 'C:\\xampp\\tmp\\php1BC6.tmp', 'laptops@70% offer', 'www.example.com'),
(4669, 'offer', 'C:\\xampp\\tmp\\php6DCF.tmp', 'laptops@70% offer', 'www.example.com'),
(4670, 'offer', 'C:\\xampp\\tmp\\php8966.tmp', 'laptops@70% offer', 'www.example.com'),
(4671, 'offer', 'C:\\xampp\\tmp\\phpCF4A.tmp', 'laptops@70% offer', 'www.example.com'),
(4672, 'offer', 'C:\\xampp\\tmp\\phpF13.tmp', 'laptops@70% offer', 'www.example.com'),
(4673, 'offer', 'C:\\xampp\\tmp\\php44BA.tmp', 'laptops@70% offer', 'www.example.com'),
(4674, 'offer', 'C:\\xampp\\tmp\\php7BA5.tmp', 'laptops@70% offer', 'www.example.com'),
(4675, 'offer', 'C:\\xampp\\tmp\\php8599.tmp', 'laptops@70% offer', 'www.example.com');

-- --------------------------------------------------------

--
-- Table structure for table `usernotification`
--

CREATE TABLE `usernotification` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usernotification`
--

INSERT INTO `usernotification` (`id`, `user_id`, `notification_id`, `is_read`) VALUES
(127, 13, 4664, 0),
(128, 13, 4665, 0),
(129, 7, 4665, 0),
(130, 8, 4665, 0),
(131, 9, 4666, 0),
(132, 10, 4666, 0),
(133, 11, 4666, 0),
(134, 12, 4666, 0),
(135, 9, 4667, 0),
(136, 10, 4667, 0),
(137, 11, 4667, 0),
(138, 12, 4667, 0),
(139, 9, NULL, 0),
(140, 10, NULL, 0),
(141, 11, NULL, 0),
(142, 12, NULL, 0),
(143, 9, NULL, 0),
(144, 10, NULL, 0),
(145, 11, NULL, 0),
(146, 12, NULL, 0),
(147, 9, NULL, 0),
(148, 10, NULL, 0),
(149, 11, NULL, 0),
(150, 12, NULL, 0),
(151, 9, NULL, 0),
(152, 10, NULL, 0),
(153, 11, NULL, 0),
(154, 12, NULL, 0),
(155, 9, NULL, 0),
(156, 10, NULL, 0),
(157, 11, NULL, 0),
(158, 12, NULL, 0),
(159, 9, NULL, 0),
(160, 10, NULL, 0),
(161, 11, NULL, 0),
(162, 12, NULL, 0),
(163, 9, NULL, 0),
(164, 10, NULL, 0),
(165, 11, NULL, 0),
(166, 12, NULL, 0),
(167, 9, NULL, 0),
(168, 10, NULL, 0),
(169, 11, NULL, 0),
(170, 12, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mg_customer_entity`
--
ALTER TABLE `mg_customer_entity`
  ADD PRIMARY KEY (`entity_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usernotification`
--
ALTER TABLE `usernotification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usernotify_userid` (`user_id`),
  ADD KEY `fk_usernotify_notifyid` (`notification_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mg_customer_entity`
--
ALTER TABLE `mg_customer_entity`
  MODIFY `entity_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4676;

--
-- AUTO_INCREMENT for table `usernotification`
--
ALTER TABLE `usernotification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usernotification`
--
ALTER TABLE `usernotification`
  ADD CONSTRAINT `fk_usernotify_notifyid` FOREIGN KEY (`notification_id`) REFERENCES `notification` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_usernotify_userid` FOREIGN KEY (`user_id`) REFERENCES `mg_customer_entity` (`entity_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
