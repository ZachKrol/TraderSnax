
-- @block
SELECT * FROM snacks;

-- @block
SELECT * FROM users;

-- @block
SELECT * FROM reviews;

-- @block
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
--
-- Database: `tradersnax`
--
-- --------------------------------------------------------




-- @block
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
(1000, 'test', '$2y$10$YRo4B2hJQeYXzq0PaUA7ROQB48Qj3iShDTCrpTPbGD03eOhCIBPuW', 'test@test.com', 'testFirstName', 'testLastName', 'just testing things', 233, 221 ,4, 'default.png'),
(1001, 'SnackerAttacker', '$2y$10$YRo4B2hJQeYXzq0PaUA7ROQB48Qj3iShDTCrpTPbGD03eOhCIBPuW', 'snackattack@test.com', 'Snacker', 'Attacker', 'Snacks are made to be reviewed. No mercy from me, I will attack any snack!', 0, 0 ,0, 'SnackerAttacker.png'),
(1002, 'TraderGator', '$2y$10$YRo4B2hJQeYXzq0PaUA7ROQB48Qj3iShDTCrpTPbGD03eOhCIBPuW', 'tradergator@test.com', 'Trader', 'Gator', 'I go to the University of Florida and I just love Trader Joes snacks!', 0, 0 ,0, 'TraderGator.png'),
(1003, 'BillyBob', '$2y$10$YRo4B2hJQeYXzq0PaUA7ROQB48Qj3iShDTCrpTPbGD03eOhCIBPuW', 'billybob@test.com', 'Billy', 'Bob', 'I want to try new snacks and see what others have to say about them. If you are like that too, then give me a follow.', 0, 0 ,0, 'BillyBob.png'),
(1004, 'JaneDoe', '$2y$10$YRo4B2hJQeYXzq0PaUA7ROQB48Qj3iShDTCrpTPbGD03eOhCIBPuW', 'janedoe@test.com', 'Jane', 'Doe', 'Insta: @JaneDoe - Snap: @JaneDoe - Blog: JaneDoeFoodReviews.com', 0, 0 ,0, 'JaneDoe.png');
COMMIT;





-- @block

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







-- @block
--
-- Table structure for table `snacks`
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
) ENGINE=MyISAM AUTO_INCREMENT=1007 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `snacks`
--

INSERT INTO `snacks` (`ID`, `snackID`, `pictureURL`, `name`, `description`, `rating`, `type`) VALUES
(190, 'Milk Chocolate Peanut Butter Cups', 'milk-chocolate-peanut-butter-cup.webp', 'Milk Chocolate Peanut Butter Cups', 'Our Peanut Butter Cups are bite-sized treats dipped in creamy Milk Chocolate. When you compare these to the national brand, we’ll bet on our PB Cups any day.', '0.0', 'Candies and Cookies'),
(194, 'Pretzel Slims', 'pretzel-slims.webp', 'Pretzel Slims', 'Trader Joe’s Pretzel Slims take the same salty, crunchy, hard mini-pretzels you love as a bar snack, and flattens them into a chip-like “Slim” shape. Each one-two-bite- sized Pretzel Slim is thin, crispy, and studded with coarse crystal of salt, just like a classic pretzel.', '0.0', 'Chips and Crackers'),
(195, 'Oven-Baked Cheese Bites', 'oven-baked-cheese-bites.webp', 'Oven-Baked Cheese Bites', 'Made with a tangy blend of semi-aged cheeses, Trader Joe’s Oven-Baked Cheese Bites are a snack-lover’s paradise. Originally the brainchild of a historic, Italian dairy and a well-known cheesemaker, these extra-crunchy nuggets are boldly cheesy, packed with protein (15 grams per serving), and all but carb-free (less than one gram per serving).', '0.0', 'Chips and Crackers'),
(196, 'Organic Naan Crackers', 'organic-naan-crackers.webp', 'Organic Naan Crackers', 'Our supplier carefully crafts each Organic Naan Cracker to resemble a miniaturized naan, complete with raised bubbles and browned edges. They make an excellent accessory to charcuterie boards and cheese plates, where their mild flavor and homey notes of ghee work together to accentuate more savory flavors.', '0.0', 'Chips and Crackers'),
(197, 'Dark Chocolate Peanut Butter Cups', 'dark-chocolate-peanut-butter-cup.webp', 'Dark Chocolate Peanut Butter Cups', 'Dark Chocolate Peanut Butter Cups are made with real peanut butter that’s made with slowly roasted and ground Virginia peanuts. The luscious, smooth, rich, dark chocolate enveloping that peanut butter is crafted from high quality cacao beans.', '0.0', 'Candies and Cookies'),
(198, 'Raw Almonds', 'raw-almonds.webp', 'Raw Almonds', 'Trader Joe’s Raw Almonds are teeming with terrific dietary benefits such as heart-healthy unsaturated fats, fiber, protein; and minerals such as calcium, iron, and potassium in every serving!', '0.0', 'Nuts, Dried Fruits, Seeds'),
(200, 'Tangy Turtles', 'tangy-turtles.webp', 'Tangy Turtles', 'Each bite is soft, chewy, and fruity, with natural flavors that include lemon, black currant, apple, blueberry, cherry, and passion-peach. And true to their title, each bite is also Tangy, with just enough tart to tastefully tickle your tongue.', '0.0', 'Candies and Cookies'),
(199, 'Plantain Chips', 'plantain-chips.webp', 'Plantain Chips', 'Our Plantain Chips come from Peru, where the plantains are picked when they are just ripe enough to be slightly sweet. They are sliced and cooked in sunflower oil, then dusted with salt. They eat like sort-of-sweet, thick-cut potato chips, but with less fat than typical potato chips.', '0.0', 'Chips and Crackers'),
(202, 'Soft and Juicy Mango', 'soft-and-juicy-mango.webp', 'Soft and Juicy Mango', 'This is Chokanan mango, grown in Thailand, where it is harvested at the peak of ripeness, then peeled and sliced into strips (it’s the same type of mango you’ll find in our Chile Spiced Mango). The drying process is unique in that it uses vegetable-based glycerin to keep the mango soft – but never mushy – and mango juice is added in to give it a little extra moisture and further intensify the mango flavor.', '0.0', 'Nuts, Dried Fruits, Seeds'),
(203, 'Organic Blue Corn Tortilla Chips', 'organic-blue-corn-tortilla-chips.webp', 'Organic Blue Corn Tortilla Chips', 'Trader Joe’s Organic Blue Corn Tortilla Chips aren’t just good; they’re consistently good, offering up a reliable, high-quality snacking experience in every bag. In other words, these Blue Chips have earned their blue chip reputation.', '0.0', 'Chips and Crackers'),
(205, 'Slightly Coated Dark Chocolate Almonds', 'slightly-coated-dark-chocolate-almonds.webp', 'Slightly Coated Dark Chocolate Almonds', 'Our supplier dry-roasts California Almonds, then pans them (tumbles them in a barrel with chocolate), and finishes them with a dusting of cocoa powder and sea salt. The chocolate-to-nut ratio ends up being about 20/80. (Typically, chocolate covered nuts are around 66/33.)\r\nThis means each Slightly Coated Dark Chocolate Almond that you pop in your mouth has a delightful crunch, with enough salty sweetness to more-than-slightly satisfy your snack cravings!', '0.0', 'Candies and Cookies'),
(208, 'Sour Cream and Onion Flavored Rings', 'sour-cream-and-onion-flavored-rings.webp', 'Sour Cream and Onion Flavored Rings', 'While these Rings are indeed round, they don’t actually contain a ring of onion. Instead, these mini (about two-bite-sized) snacks are made using red lentils and rice meal. Not only does this mean they are gluten free, it also makes them wonderfully crunchy. They are baked (not fried) and infused with a Sour Cream and Onion seasoning that includes buttermilk solids, onion and sour cream powders, and yeast extract—all of which combine to create an irresistible and inviting flavor. As snacks come, you might say this one’s a “ringer”!', '0.0', 'Chips and Crackers'),
(209, 'Ube Tea Cookies', 'ube-tea-cookies.webp', 'Ube Tea Cookies', 'Like our Ube Pancake Mix, Trader Joe’s Ube Tea Cookies take their name, their hue, and their flavor profile from ube (ooo-beh), a purple yam originating in the Philippines. The same brilliant bakers responsible for our Key Lime Tea Cookies blend an all-butter shortbread dough with vibrantly colored ube powder, warm cinnamon, and natural vanilla flavor to create the Cookies; as tea cookie tradition commands, after baking, they’re generously dusted with powdered sugar. The resulting two-bite Tea Cookies are ready to enjoy with a glass of iced tea, crumble over ice cream, or serve solo as a simple picnic dessert.', '0.0', 'Candies and Cookies'),
(210, 'Crispy Crunchy Peanut Butter Cookies', 'crispy-crunchy-peanut-butter-cookies.webp', 'Crispy Crunchy Peanut Butter Cookies', 'Trader Joe’s Crispy Crunchy Peanut Butter Cookies are everything a cookie-craving, peanut-butter-loving person would appreciate. These round, golden-brown Cookies are, indeed, Crispy and Crunchy, like their Crispy Crunchy Chocolate Chip Cookie cousin. Here, instead of chocolate chips, you’ll find a power- trio of blanched peanuts, dry roasted peanuts, and peanut butter. This triple peanutty perspective is concocted with the usual cookie-recipe suspects (sugar, flour, eggs, etc.), including salted butter, which brings with it a richness, a smoothness, a...buttery-ness.', '0.0', 'Candies and Cookies'),
(211, 'Oat Chocolate Bars', 'oat-chocolate-bars.webp', 'Oat Chocolate Bars', 'These Oat Chocolate Bars are made by our bean-to-bar supplier in Colombia who combines cane sugar, cocoa butter, and 40% cocoa mass (which is more than the 25%-35% typically found in milk chocolate) to create a very delicious chocolate bar. The trickiest part is that they use a combination of ground oats and rice syrup (think oat “milk”) to make it lusciously creamy, just like milk chocolate. Only, there’s no milk! Nor is there any soy or gluten in these totally vegan Oat Chocolate Bars.', '0.0', 'Candies and Cookies'),
(212, 'Belgian Butter Waffle Cookies', 'belgian-butter-waffle-cookies.webp', 'Belgian Butter Waffle Cookies', 'Each all-butter wafer is baked to a crispy golden brown that creates a straightforward, delicious waffle cookie ready to enjoy at any time. The flavor is somewhere between a freshly baked waffle cone and shortbread cookie and is as simple as cookies come, but oh, so delicious. Super buttery, with the ideal amount of sweetness, these Belgian Butter Waffle Cookies are more versatile than you may expect. Whether you are looking for an authentic European snack to accompany a cup of tea or a mug of coffee, a companion for ice cream, or a counterpart to cheese, cured meats, and peppers, Trader Joe’s Belgian Butter Waffle Cookies have a place in your shopping cart, your pantry, and your tummy.', '0.0', 'Candies and Cookies'),
(213, 'Dark Chocolate Orange Sticks', 'dark-chocolate-orange-sticks.webp', 'Dark Chocolate Orange Sticks', 'New Trader Joe\'s Dark Chocolate Orange Sticks are short, chubby \"sticks\" of orange-flavored jelly smothered in rich, dark chocolate. Their jelly centers are soft, but not at all gooey, and their gelatinous softness presents a delightful contrast to the Sticks\' thick, chocolate-y exteriors-a real textural treat. Also, per usual, our Dark Chocolate Orange Sticks don\'t contain any artificial flavors. Instead, they get their bright, citrusy punch from real orange juice concentrate.', '0.0', 'Candies and Cookies'),
(214, 'Freeze Dried Strawberries', 'freeze-dried-strawberries.webp', 'Freeze Dried Strawberries', 'Trader Joe’s Freeze Dried Strawberries are strawberry slices that have undergone a special freeze-drying process so they remain extremely flavorful, but unlike so many conventionally dried berries, they’re free of added sugar and they pack a bit of a crunch. They’re great for snacking anytime – we’ve discovered that kids, especially, find them not only delicious but fascinating as well. Lest you think they’re only for kids, we’ll go on record as grown-up fans of these crunchy little berries – they’re especially delightful added to cereals for a little extra flavor and crunch. Of course, given their history as a backpacking staple, they’re perfectly at home on the trail, as part of a mix or on their own.', '0.0', 'Nuts, Dried Fruits, Seeds'),
(215, 'Crunchy Chili Onion Peanuts', 'crunchy-chili-onion-peanuts.webp', 'Crunchy Chili Onion Peanuts', 'As you’ll discover with every bite of Trader Joe’s Crunchy Chili Onion Peanuts, the subtly savory nuttiness of peanuts provides both an ideal method of delivery for our Crunchy Chili Onion, and adds yet another layer of flavor complexity to its marvelous mix of garlic, umami, and spice. They’re super satisfying to munch on during a sporting event or weekend movie marathon, and also make a great garnish for salads, stir fries, or sesame noodles. Just be sure to keep a cool drink on hand—it’s a slow-building heat, but one that can easily catch up with you.', '0.0', 'Nuts, Dried Fruits, Seeds'),
(217, 'Candied Pecans', 'candied-pecans.webp', 'Candied Pecans', 'Sweet, salty, and with a rapturously resounding crunch, Trader Joe’s Candied Pecans can be counted on to provide a welcome pop of flavor and texture to any number of culinary situations. From a leafy green salad in need of an unconventional crouton, to baked goods in need of a sweet and nutty accent, or even just a regular old snack attack in need of something to munch on, these Candied Pecans are endlessly dependable. They’re made for us the old fashioned way, using simple methods and simple ingredients to achieve a simply delicious result: our supplier lightly coats the pecans in sugar before roasting them in a bit of oil until they’re nice and toasty, then gives them a light dusting of salt. They’re just the right balance of savory and sweet, and their oh-so-craveable crunch will keep you coming back for more, bite after bite.', '0.0', 'Nuts, Dried Fruits, Seeds'),
(218, 'Thai Lime and Chili Cashews', 'thai-lime-and-chili-cashews.webp', 'Thai Lime and Chili Cashews', 'For this superbly spicy snack, we found ourselves inspired by the fearless flavor combo of chilis and lime found in such timeless Thai dishes as Tom Yum Soup. They’re made for us a by a supplier in Thailand, who seasons whole, crunchy cashews with a mix of chili powder, dried Thai lime leaves, and salt, to create a flavor sensation that starts with a serious kick of spice, and only builds in heat the more you eat.', '0.0', 'Nuts, Dried Fruits, Seeds'),
(219, 'Garlic and Onion Pistachios', 'garlic-and-onion-pistachios.webp', 'Garlic and Onion Pistachios', 'Irresistible is exactly how we\'ll describe Trader Joe\'s Garlic and Onion Pistachios. These are California-grown, in-shell pistachios, dry roasted and dusted with a robust blend of garlic, onion, and sea salt. Some folks like to pop whole pistachios into their mouths, shell and all, to make sure they get all the flavor. Other folks prefer to remove the shell first. We make no judgements, other than the only proper pistachio proclamation... yum!', '0.0', 'Nuts, Dried Fruits, Seeds'),
(220, 'Almond Butter Filled Pretzel Nuggets', 'almond-butter-filled-pretzel-nuggets.webp', 'Almond Butter Filled Pretzel Nuggets', 'Discovering Trader Joe’s Almond Butter Filled Pretzel Nuggets may make you feel as though you’ve struck snack gold, in the form of about-an-inch long, crunchy pretzel nuggets, whose golden exterior is generously crusted with rock salt. Inside, it’s an almond butter abondanza. Really. More than 35% of the recipe here is almond butter, made from almonds grown in California’s Central Valley. Like their PBP (that’s Peanut Butter Pretzel) cousins, every bite is crunchy (outside) and creamy (inside); salty (outside) and a little sweet (inside). This makes them a particularly satisfying solo snack, and a likewise excellent addition to your favorite TJ’s trail mix—you won’t regret keeping a bag in your desk drawer or backpack for either purpose. And if you’re looking for a pairing partner, a crisp lager, hot tea, or cold glass of lemonade will do the trick.', '0.0', 'Chips and Crackers'),
(221, 'Sea Salted Saddle Potato Crisps', 'sea-salted-saddle-potato-crisps.webp', 'Sea Salted Saddle Potato Crisps', 'They\'re cooked in sunflower oil to peak addictive crispiness, then Sea Salted juuust right for a snacking experience that will have you singing a sanguine tune of your own. A super solo snack, they\'re also superb with a scoop of salsa and a sprinkle of cheese.', '0.0', 'Chips and Crackers'),
(222, 'Mini Banana Bread Biscotti', 'mini-banana-bread-biscotti.webp', 'Mini Banana Bread Biscotti', 'Trader Joe’s Mini Banana Bread Biscotti with Walnuts are a banana-bread-loving cookie connoisseur’s dream come true. Made with banana purée, chewy bits of dehydrated banana, and crushed walnut pieces, they really do deliver the perfect combo of big, banana flavor and captivating crunchiness—in two-to-three-bite-sized, twice-baked cookie form! But if these Biscotti sound a-peel-ing, get thee to a Trader Joe’s pronto, because once they’re gone, they’re gone...', '0.0', 'Candies and Cookies');
COMMIT;

-- @block
SELECT snacks.snackID, COUNT(reviews.snackID) AS review_count
FROM snacks
INNER JOIN reviews ON snacks.snackID = reviews.snackID
GROUP BY snacks.snackID;