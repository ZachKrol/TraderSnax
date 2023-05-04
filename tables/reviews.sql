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
  `rating` decimal(3,1) NOT NULL DEFAULT 0.0,
  `reviewText` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `pictureURL` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci, -- possibly take this out?
  `likes` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`reviewID`)
) ENGINE=MyISAM AUTO_INCREMENT=1005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `username`, `snackID`, `rating`, `reviewText`, `pictureURL`, `likes`) VALUES
(1000, 'test', 'Milk Chocolate Peanut Butter Cups', 4.0, 'example review', 'milk-chocolate-peanut-butter-cup.webp', 1),
(1001, 'test', 'Spanish Style Rice', 3.0, 'example review', 'spanish-style-rice.webp', 1),
(1002, 'test', 'Instant Boba Kit', 4.0, 'example review', 'instant-boba-kit.webp', 1),
(1003, 'test', 'Buffalo Style Chickenless Wings', 5.0, 'example review', 'buffalo-style-chickenless-wings.webp', 1),
(1004, 'test', 'Plantain Chips', 2.0, 'These plantain chips suck', 'plantain-chips.webp', 0),
(1005, 'SnackerAttacker', 'Plantain Chips', 1.0, 'These are like rocks! yuck!', 'plantain-chips.webp', 0),
(1006, 'TraderGator', 'Plantain Chips', 5.0, 'These rock! yum!', 'plantain-chips.webp', 0),
(1007, 'BillyBob', 'Plantain Chips', 3.0, '', 'plantain-chips.webp', 0),
(1008, 'JaneDoe', 'Plantain Chips', 4.0, 'These are great on the side of a nice lunch :)', 'plantain-chips.webp', 0),
(1009, 'SnackerAttacker', 'Milk Chocolate Peanut Butter Cups', 2.0, 'I have never thrown up so fast after eating a food before!', 'milk-chocolate-peanut-butter-cup.webp', 0),
(1010, 'TraderGator', 'Milk Chocolate Peanut Butter Cups', 5.0, 'WOW! I love these, I am a big fan of peanut butter and cups so this is perfect 10/10', 'milk-chocolate-peanut-butter-cup.webp', 0),
(1011, 'BillyBob', 'Pretzel Slims', 4.0, '', 'pretzel-slims.webp', 0),
(1012, 'JaneDoe', 'Pretzel Slims', 2.0, 'Nothing special about these. I could get these anywhere.', 'pretzel-slims.webp', 0),
(1013, 'SnackerAttacker', 'Oven-Baked Cheese Bites', 3.0, 'This one was not that bad, but still needs improvement', 'oven-baked-cheese-bites.webp', 0),
(1014, 'TraderGator', 'Organic Naan Crackers', 4.0, 'I am headed to the store to get some more right now! See you soon Butler Plaza!', 'organic-naan-crackers.webp', 0),
(1015, 'BillyBob', 'Dark Chocolate Peanut Butter Cups', 3.0, '', 'dark-chocolate-peanut-butter-cup.webp', 0),
(1016, 'JaneDoe', 'Tangy Turtles', 5.0, 'Now this is amazing. I am going to write about this in my food blog. Check it out on my profile!', 'tangy-turtles.webp', 0),
(1017, 'SnackerAttacker', 'Tangy Turtles', 1.0, 'Tangy Turtles? More like Terrible Turtles!', 'tangy-turtles.webp', 0),
(1018, 'TraderGator', 'Tangy Turtles', 4.0, 'They were Tangy for sure! So much flavor I could not stop eating them', 'tangy-turtles.webp', 0),
(1019, 'BillyBob', 'Soft and Juicy Mango', 5.0, '', 'soft-and-juicy-mango.webp', 0),
(1020, 'JaneDoe', 'Organic Blue Corn Tortilla Chips', 4.0, 'Yummy with a nice side of queso or guacamole.', 'organic-blue-corn-tortilla-chips.webp', 0),
(1021, 'SnackerAttacker', 'Slightly Coated Dark Chocolate Almonds', 2.0, 'Only slightly bad', 'slightly-coated-dark-chocolate-almonds.webp', 0),
(1022, 'TraderGator', 'Ube Tea Cookies', 5.0, 'Ube-betcha that these were 5 STARS!!!!', 'ube-tea-cookies.webp', 0),
(1023, 'BillyBob', 'Crispy Crunchy Peanut Butter Cookies', 1.0, '', 'crispy-crunchy-peanut-butter-cookies.webp', 0),
(1024, 'JaneDoe', 'Oat Chocolate Bars', 3.0, 'I tried these as my new Saturday Snack, but they were just okay', 'oat-chocolate-bars.webp', 0),
(1025, 'SnackerAttacker', 'Belgian Butter Waffle Cookies', 1.0, '*thumbs down*', 'belgian-butter-waffle-cookies.webp', 0),
(1026, 'TraderGator', 'Crunchy Chili Onion Peanuts', 5.0, ':DDD', 'crunchy-chili-onion-peanuts.webp', 0),
(1027, 'BillyBob', 'Thai Lime and Chili Cashews', 3.0, '', 'thai-lime-and-chili-cashews.webp', 0),
(1028, 'JaneDoe', 'Almond Butter Filled Pretzel Nuggets', 1.0, 'I choked on them and almost died! Would not recommend.', 'almond-butter-filled-pretzel-nuggets.webp', 0),
(1029, 'JaneDoe', 'Sea Salted Saddle Potato Crisps', 1.0, 'Only giving these a 1-star because of how unhealthy they are. They were actually very good :D', 'sea-salted-saddle-potato-crisps.webp', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
