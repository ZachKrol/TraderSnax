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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `aboutme` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `following` int NOT NULL,
  `followers` int NOT NULL,
  `reviews` int NOT NULL, -- PROFILE PIC
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=1005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `fname`, `lname`, `aboutme`, `following`, `followers`, `reviews`) VALUES
(1000, 'test', 'test', 'test@test.com', 'Daniel', 'Dos Santos', 'just testing tings', 233, 221 ,4),
(1001, 'test2', 'test2', 'test2@test.com', 'test', 'ing', NULL, 0, 0, 0),
(1002, 'testing1', '$2y$10$7B7A1NWNfm4auRXK4IvEhOBSrZkZbtRJvNzDzrRR279', 'test@test.com', 'Nehemie', 'Yacinthe', NULL, 0, 0, 0),
(1003, 'testing2', '$2y$10$TWsCnpCZnT4EHMxc.qDmsu43o8xWQIhGuzRM6KCFwVf', 'test@test.com', 'Yacinthe', 'Nehemie', NULL, 0, 0, 0),
(1004, 'test34', '$2y$10$PlCyJ4GPkTl9UelkkAJWo.9SJeJgbQQp.yUdET8QmJ/', 'test@test.com', 'test', 'test', NULL, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
