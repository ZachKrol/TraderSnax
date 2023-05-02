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

DROP TABLE IF EXISTS `snacks`;
CREATE TABLE IF NOT EXISTS `snacks` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `snackID` varchar(50) NOT NULL,
  `pictureURL` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `name` varchar(50) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `rating` decimal(3,1) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=1005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `snacks` (`ID`, `snackID`, `pictureURL`, `name`, `description`, `rating`, `type`) VALUES
(190, 'Milk Chocolate Peanut Butter Cups', 'milk-chocolate-peanut-butter-cup.webp', 'Milk Chocolate Peanut Butter Cups', 'Our Peanut Butter Cups are bite-sized treats dipped in creamy Milk Chocolate. When you compare these to the national brand, we’ll bet on our PB Cups any day.', '4.0', 'Candies and Cookies'),
(194, 'Pretzel Slims', 'pretzel-slims.webp', 'Pretzel Slims', 'Trader Joe’s Pretzel Slims take the same salty, crunchy, hard mini-pretzels you love as a bar snack, and flattens them into a chip-like “Slim” shape. Each one-two-bite- sized Pretzel Slim is thin, crispy, and studded with coarse crystal of salt, just like a classic pretzel.', '4.5', 'Chips and Crackers'),
(195, 'Oven-Baked Cheese Bites', 'oven-baked-cheese-bites.webp', 'Oven-Baked Cheese Bites', 'Made with a tangy blend of semi-aged cheeses, Trader Joe’s Oven-Baked Cheese Bites are a snack-lover’s paradise. Originally the brainchild of a historic, Italian dairy and a well-known cheesemaker, these extra-crunchy nuggets are boldly cheesy, packed with protein (15 grams per serving), and all but carb-free (less than one gram per serving).', '4.7', 'Chips and Crackers'),
(196, 'Organic Naan Crackers', 'organic-naan-crackers.webp', 'Organic Naan Crackers', 'Our supplier carefully crafts each Organic Naan Cracker to resemble a miniaturized naan, complete with raised bubbles and browned edges. They make an excellent accessory to charcuterie boards and cheese plates, where their mild flavor and homey notes of ghee work together to accentuate more savory flavors.', '4.3', 'Chips and Crackers'),
(197, 'Dark Chocolate Peanut Butter Cups', 'dark-chocolate-peanut-butter-cup.webp', 'Dark Chocolate Peanut Butter Cups', 'Dark Chocolate Peanut Butter Cups are made with real peanut butter that’s made with slowly roasted and ground Virginia peanuts. The luscious, smooth, rich, dark chocolate enveloping that peanut butter is crafted from high quality cacao beans.', '4.9', 'Candies and Cookies'),
(198, 'Raw Almonds', 'raw-almonds.webp', 'Raw Almonds', 'Trader Joe’s Raw Almonds are teeming with terrific dietary benefits such as heart-healthy unsaturated fats, fiber, protein; and minerals such as calcium, iron, and potassium in every serving!', '4.8', 'Nuts, Dried Fruits, Seeds'),
(200, 'Tangy Turtles', 'tangy-turtles.webp', 'Tangy Turtles', 'Each bite is soft, chewy, and fruity, with natural flavors that include lemon, black currant, apple, blueberry, cherry, and passion-peach. And true to their title, each bite is also Tangy, with just enough tart to tastefully tickle your tongue.', '4.9', 'Candies and Cookies'),
(199, 'Plantain Chips', 'plantain-chips.webp', 'Plantain Chips', 'Our Plantain Chips come from Peru, where the plantains are picked when they are just ripe enough to be slightly sweet. They are sliced and cooked in sunflower oil, then dusted with salt. They eat like sort-of-sweet, thick-cut potato chips, but with less fat than typical potato chips.', '4.9', 'Chips and Crackers'),
(202, 'Soft & Juicy Mango', 'soft-and-juicy-mango.webp', 'Soft & Juicy Mango', 'This is Chokanan mango, grown in Thailand, where it is harvested at the peak of ripeness, then peeled and sliced into strips (it’s the same type of mango you’ll find in our Chile Spiced Mango). The drying process is unique in that it uses vegetable-based glycerin to keep the mango soft – but never mushy – and mango juice is added in to give it a little extra moisture and further intensify the mango flavor.', '4.6', 'Nuts, Dried Fruits, Seeds'),
(203, 'Organic Blue Corn Tortilla Chips', 'organic-blue-corn-tortilla-chips.webp', 'Organic Blue Corn Tortilla Chips', 'Trader Joe’s Organic Blue Corn Tortilla Chips aren’t just good; they’re consistently good, offering up a reliable, high-quality snacking experience in every bag. In other words, these Blue Chips have earned their blue chip reputation.', '3.2', 'Chips and Crackers'),
(205, 'Slightly Coated Dark Chocolate Almonds', 'slightly-coated-dark-chocolate-almonds.webp', 'Slightly Coated Dark Chocolate Almonds', 'Our supplier dry-roasts California Almonds, then pans them (tumbles them in a barrel with chocolate), and finishes them with a dusting of cocoa powder and sea salt. The chocolate-to-nut ratio ends up being about 20/80. (Typically, chocolate covered nuts are around 66/33.)\r\nThis means each Slightly Coated Dark Chocolate Almond that you pop in your mouth has a delightful crunch, with enough salty sweetness to more-than-slightly satisfy your snack cravings!', '4.1', 'Candies and Cookies'),
(208, 'Sour Cream & Onion Flavored Rings', 'sour-cream-and-onion-flavored-rings.webp', 'Sour Cream & Onion Flavored Rings', 'While these Rings are indeed round, they don’t actually contain a ring of onion. Instead, these mini (about two-bite-sized) snacks are made using red lentils and rice meal. Not only does this mean they are gluten free, it also makes them wonderfully crunchy. They are baked (not fried) and infused with a Sour Cream & Onion seasoning that includes buttermilk solids, onion & sour cream powders, and yeast extract—all of which combine to create an irresistible and inviting flavor. As snacks come, you might say this one’s a “ringer”!', '3.2', 'Chips and Crackers'),
(209, 'Ube Tea Cookies', 'ube-tea-cookies.webp', 'Ube Tea Cookies', 'Like our Ube Pancake Mix, Trader Joe’s Ube Tea Cookies take their name, their hue, and their flavor profile from ube (ooo-beh), a purple yam originating in the Philippines. The same brilliant bakers responsible for our Key Lime Tea Cookies blend an all-butter shortbread dough with vibrantly colored ube powder, warm cinnamon, and natural vanilla flavor to create the Cookies; as tea cookie tradition commands, after baking, they’re generously dusted with powdered sugar. The resulting two-bite Tea Cookies are ready to enjoy with a glass of iced tea, crumble over ice cream, or serve solo as a simple picnic dessert.', '4.3', 'Candies and Cookies'),
(210, 'Crispy Crunchy Peanut Butter Cookies', 'crispy-crunchy-peanut-butter-cookies.webp', 'Crispy Crunchy Peanut Butter Cookies', 'Trader Joe’s Crispy Crunchy Peanut Butter Cookies are everything a cookie-craving, peanut-butter-loving person would appreciate. These round, golden-brown Cookies are, indeed, Crispy and Crunchy, like their Crispy Crunchy Chocolate Chip Cookie cousin. Here, instead of chocolate chips, you’ll find a power- trio of blanched peanuts, dry roasted peanuts, and peanut butter. This triple peanutty perspective is concocted with the usual cookie-recipe suspects (sugar, flour, eggs, etc.), including salted butter, which brings with it a richness, a smoothness, a...buttery-ness.', '3.2', 'Candies and Cookies'),
(211, 'Oat Chocolate Bars', 'oat-chocolate-bars.webp', 'Oat Chocolate Bars', 'These Oat Chocolate Bars are made by our bean-to-bar supplier in Colombia who combines cane sugar, cocoa butter, and 40% cocoa mass (which is more than the 25%-35% typically found in milk chocolate) to create a very delicious chocolate bar. The trickiest part is that they use a combination of ground oats and rice syrup (think oat “milk”) to make it lusciously creamy, just like milk chocolate. Only, there’s no milk! Nor is there any soy or gluten in these totally vegan Oat Chocolate Bars.', '2.5', 'Candies and Cookies'),
(212, 'Belgian Butter Waffle Cookies', 'belgian-butter-waffle-cookies.webp', 'Belgian Butter Waffle Cookies', 'Each all-butter wafer is baked to a crispy golden brown that creates a straightforward, delicious waffle cookie ready to enjoy at any time. The flavor is somewhere between a freshly baked waffle cone and shortbread cookie and is as simple as cookies come, but oh, so delicious. Super buttery, with the ideal amount of sweetness, these Belgian Butter Waffle Cookies are more versatile than you may expect. Whether you are looking for an authentic European snack to accompany a cup of tea or a mug of coffee, a companion for ice cream, or a counterpart to cheese, cured meats, and peppers, Trader Joe’s Belgian Butter Waffle Cookies have a place in your shopping cart, your pantry, and your tummy.', '4.9', 'Candies and Cookies'),
(213, 'Dark Chocolate Orange Sticks', 'dark-chocolate-orange-sticks.webp', 'Dark Chocolate Orange Sticks', 'New Trader Joe\'s Dark Chocolate Orange Sticks are short, chubby \"sticks\" of orange-flavored jelly smothered in rich, dark chocolate. Their jelly centers are soft, but not at all gooey, and their gelatinous softness presents a delightful contrast to the Sticks\' thick, chocolate-y exteriors-a real textural treat. Also, per usual, our Dark Chocolate Orange Sticks don\'t contain any artificial flavors. Instead, they get their bright, citrusy punch from real orange juice concentrate.', '4.9', 'Candies and Cookies'),
(214, 'Freeze Dried Strawberries', 'freeze-dried-strawberries.webp', 'Freeze Dried Strawberries', 'Trader Joe’s Freeze Dried Strawberries are strawberry slices that have undergone a special freeze-drying process so they remain extremely flavorful, but unlike so many conventionally dried berries, they’re free of added sugar and they pack a bit of a crunch. They’re great for snacking anytime – we’ve discovered that kids, especially, find them not only delicious but fascinating as well. Lest you think they’re only for kids, we’ll go on record as grown-up fans of these crunchy little berries – they’re especially delightful added to cereals for a little extra flavor and crunch. Of course, given their history as a backpacking staple, they’re perfectly at home on the trail, as part of a mix or on their own.', '4.5', 'Nuts, Dried Fruits, Seeds'),
(215, 'Crunchy Chili Onion Peanuts', 'crunchy-chili-onion-peanuts.webp', 'Crunchy Chili Onion Peanuts', 'As you’ll discover with every bite of Trader Joe’s Crunchy Chili Onion Peanuts, the subtly savory nuttiness of peanuts provides both an ideal method of delivery for our Crunchy Chili Onion, and adds yet another layer of flavor complexity to its marvelous mix of garlic, umami, and spice. They’re super satisfying to munch on during a sporting event or weekend movie marathon, and also make a great garnish for salads, stir fries, or sesame noodles. Just be sure to keep a cool drink on hand—it’s a slow-building heat, but one that can easily catch up with you.', '3.2', 'Nuts, Dried Fruits, Seeds'),
(217, 'Candied Pecans', 'candied-pecans.webp', 'Candied Pecans', 'Sweet, salty, and with a rapturously resounding crunch, Trader Joe’s Candied Pecans can be counted on to provide a welcome pop of flavor and texture to any number of culinary situations. From a leafy green salad in need of an unconventional crouton, to baked goods in need of a sweet and nutty accent, or even just a regular old snack attack in need of something to munch on, these Candied Pecans are endlessly dependable. They’re made for us the old fashioned way, using simple methods and simple ingredients to achieve a simply delicious result: our supplier lightly coats the pecans in sugar before roasting them in a bit of oil until they’re nice and toasty, then gives them a light dusting of salt. They’re just the right balance of savory and sweet, and their oh-so-craveable crunch will keep you coming back for more, bite after bite.', '3.2', 'Nuts, Dried Fruits, Seeds'),
(218, 'Thai Lime & Chili Cashews', 'thai-lime-and-chili-cashews.webp', 'Thai Lime & Chili Cashews', 'For this superbly spicy snack, we found ourselves inspired by the fearless flavor combo of chilis and lime found in such timeless Thai dishes as Tom Yum Soup. They’re made for us a by a supplier in Thailand, who seasons whole, crunchy cashews with a mix of chili powder, dried Thai lime leaves, and salt, to create a flavor sensation that starts with a serious kick of spice, and only builds in heat the more you eat.', '4.7', 'Nuts, Dried Fruits, Seeds'),
(219, 'Garlic & Onion Pistachios', 'garlic-and-onion-pistachios.webp', 'Garlic & Onion Pistachios', 'Irresistible is exactly how we\'ll describe Trader Joe\'s Garlic & Onion Pistachios. These are California-grown, in-shell pistachios, dry roasted and dusted with a robust blend of garlic, onion, and sea salt. Some folks like to pop whole pistachios into their mouths, shell and all, to make sure they get all the flavor. Other folks prefer to remove the shell first. We make no judgements, other than the only proper pistachio proclamation... yum!', '4.3', 'Nuts, Dried Fruits, Seeds'),
(220, 'Almond Butter Filled Pretzel Nuggets', 'almond-butter-filled-pretzel-nuggets.webp', 'Almond Butter Filled Pretzel Nuggets', 'Discovering Trader Joe’s Almond Butter Filled Pretzel Nuggets may make you feel as though you’ve struck snack gold, in the form of about-an-inch long, crunchy pretzel nuggets, whose golden exterior is generously crusted with rock salt. Inside, it’s an almond butter abondanza. Really. More than 35% of the recipe here is almond butter, made from almonds grown in California’s Central Valley. Like their PBP (that’s Peanut Butter Pretzel) cousins, every bite is crunchy (outside) and creamy (inside); salty (outside) and a little sweet (inside). This makes them a particularly satisfying solo snack, and a likewise excellent addition to your favorite TJ’s trail mix—you won’t regret keeping a bag in your desk drawer or backpack for either purpose. And if you’re looking for a pairing partner, a crisp lager, hot tea, or cold glass of lemonade will do the trick.', '4.7', 'Chips and Crackers'),
(221, 'Sea Salted Saddle Potato Crisps', 'sea-salted-saddle-potato-crisps.webp', 'Sea Salted Saddle Potato Crisps', 'They\'re cooked in sunflower oil to peak addictive crispiness, then Sea Salted juuust right for a snacking experience that will have you singing a sanguine tune of your own. A super solo snack, they\'re also superb with a scoop of salsa and a sprinkle of cheese.', '4.3', 'Chips and Crackers'),
(222, 'Mini Banana Bread Biscotti', 'mini-banana-bread-biscotti.webp', 'Mini Banana Bread Biscotti', 'Trader Joe’s Mini Banana Bread Biscotti with Walnuts are a banana-bread-loving cookie connoisseur’s dream come true. Made with banana purée, chewy bits of dehydrated banana, and crushed walnut pieces, they really do deliver the perfect combo of big, banana flavor and captivating crunchiness—in two-to-three-bite-sized, twice-baked cookie form! But if these Biscotti sound a-peel-ing, get thee to a Trader Joe’s pronto, because once they’re gone, they’re gone...', '4.9', 'Candies and Cookies');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;