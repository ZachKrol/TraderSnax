-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 26, 2023 at 03:28 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tradersnax`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `reviewID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `snackID` varchar(50) NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `reviewText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pictureURL` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci, -- possibly take this out?
  `likes` int NOT NULL,
  PRIMARY KEY (`reviewID`)
) ENGINE=MyISAM AUTO_INCREMENT=1005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `username`, `snackID`, `rating`, `reviewText`, `pictureURL`, `likes`) VALUES
(1000, 'test', 'Milk Chocolate Peanut Butter Cups', 4.0, 'example review', 'milk-chocolate-peanut-butter-cup.webp', 1),
(1001, 'test', 'Spanish Style Rice', 3.0, 'example review', 'spanish-style-rice.webp', 1),
(1002, 'test', 'Instant Boba Kit', 4.0, 'example review', 'instant-boba-kit.webp', 1),
(1003, 'test', 'Buffalo Style Chickenless Wings', 5.0, 'example review', 'buffalo-style-chickenless-wings.webp', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
