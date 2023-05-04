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
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `aboutme` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `following` int NOT NULL DEFAULT 0,
  `followers` int NOT NULL DEFAULT 0,
  `reviews` int NOT NULL DEFAULT 0,
  `profilePicURL` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM AUTO_INCREMENT=1005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `fname`, `lname`, `aboutme`, `following`, `followers`, `reviews`, `profilePicURL`) VALUES
(1001, 'SnackAttack', '$2y$10$YRo4B2hJQeYXzq0PaUA7ROQB48Qj3iShDTCrpTPbGD03eOhCIBPuW', 'snackattack@test.com', 'Snacker', 'Attacker', 'Snacks are made to be reviewed. No mercy from me, I will attack any snack!', 0, 0 ,0, 'SnackAttack.png'),
(1002, 'TraderGator', '$2y$10$YRo4B2hJQeYXzq0PaUA7ROQB48Qj3iShDTCrpTPbGD03eOhCIBPuW', 'tradergator@test.com', 'Trader', 'Gator', 'I go to the University of Florida and I just love Trader Joes snacks!', 0, 0 ,0, 'TraderGator.png'),
(1003, 'BillyBob', '$2y$10$YRo4B2hJQeYXzq0PaUA7ROQB48Qj3iShDTCrpTPbGD03eOhCIBPuW', 'billybob@test.com', 'Billy', 'Bob', 'I want to try new snacks and see what others have to say about them. If you are like that too, then give me a follow.', 0, 0 ,0, 'BillyBob.png'),
(1004, 'JaneDoe', '$2y$10$YRo4B2hJQeYXzq0PaUA7ROQB48Qj3iShDTCrpTPbGD03eOhCIBPuW', 'janedoe@test.com', 'Jane', 'Doe', 'Insta: @JaneDoe - Snap: @JaneDoe - Blog: JaneDoeFoodReviews.com', 0, 0 ,0, 'JaneDoe.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
