-- MySQL dump 10.16  Distrib 10.1.24-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: recipe
-- ------------------------------------------------------
-- Server version	10.1.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `category_title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `flag` tinyint(2) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_name` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'appetizer','Appetizer',1,'2017-07-19 00:00:00','2017-07-20 11:47:33'),(2,'main-dish','Main Dish',1,'2017-07-19 00:00:00','2017-07-20 11:47:38'),(3,'desserts','Desserts',1,'2017-07-19 00:00:00','2017-07-20 11:47:42'),(4,'soup','Soup',1,'2017-07-20 00:00:00','2017-07-20 11:47:46');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipe` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `title_key` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `recipe_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `img_path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `recipe_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `publish_date` date NOT NULL,
  `flag` tinyint(2) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe`
--

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
INSERT INTO `recipe` VALUES (2,'desserts','cup-cakes','Cup Cakes','cup-cakes/3d5dc27fb59d5f0c314b7cd11d0dbb17.jpg','&lt;ul&gt;\r\n&lt;li&gt;test\r\n&lt;ul&gt;\r\n&lt;li&gt;test&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;/ul&gt;','2017-07-20',0,'2017-07-20 08:51:04','2017-07-20 09:56:38'),(3,'appetizer','peach-salsas','Peach Salsas','peach-salsas/26a6082b7641cc2f646cacc5f84b90fa.jpg','&lt;h2 class=&quot;heading__h2--gutters recipe-ingredients__header&quot;&gt;Ingredients&lt;/h2&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;1 ripe peach - peeled, pitted, and diced&lt;/li&gt;\r\n&lt;li&gt;&lt;span class=&quot;recipe-ingred_txt added&quot; data-id=&quot;5103&quot; data-nameid=&quot;5103&quot;&gt;1 kiwi, peeled and diced&lt;/span&gt;&lt;/li&gt;\r\n&lt;/ul&gt;','2017-07-20',0,'2017-07-20 10:21:53','2017-07-20 11:02:30'),(4,'main-dish','fresh-tomato-sausage-and-pecorino-pasta','Fresh Tomato, Sausage, and Pecorino Pasta','fresh-tomato,-sausage,-and-pecorino-pasta/daff6629b10d474e85edb859bdf97a2d.jpg','&lt;div class=&quot;sidebar padded-mobile padding-8 grid-item grid-4-of-16&quot;&gt;\r\n&lt;div class=&quot;partial recipe-ingredients&quot;&gt;\r\n&lt;h3&gt;Ingredients&lt;/h3&gt;\r\n&lt;div class=&quot;ingredients&quot;&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;8 ounces uncooked penne&lt;/li&gt;\r\n&lt;li&gt;8 ounces sweet Italian sausage&lt;/li&gt;\r\n&lt;li&gt;2 teaspoons olive oil&lt;/li&gt;\r\n&lt;li&gt;1 cup vertically sliced onion&lt;/li&gt;\r\n&lt;li&gt;2 teaspoons minced garlic&lt;/li&gt;\r\n&lt;li&gt;1 1/4 pounds tomatoes, chopped&lt;/li&gt;\r\n&lt;li&gt;6 tablespoons grated fresh pecorino Romano cheese, divided&lt;/li&gt;\r\n&lt;li&gt;1/4 teaspoon salt&lt;/li&gt;\r\n&lt;li&gt;1/8 teaspoon black pepper&lt;/li&gt;\r\n&lt;li&gt;1/4 cup torn fresh basil leaves&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;chicory-order-ingredients margin-48-bottom&quot;&gt;&nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;padded-mobile padding-8-tb float-left grid-item grid-7-of-16 padding-24-bottom&quot;&gt;\r\n&lt;div class=&quot;recipe-instructions margin-0-auto&quot;&gt;\r\n&lt;h3 class=&quot;margin-0-auto&quot;&gt;&lt;br&gt;How to Make It&lt;/h3&gt;\r\n&lt;div class=&quot;step&quot;&gt;\r\n&lt;div class=&quot;title-text&quot;&gt;Step 1&lt;/div&gt;\r\n&lt;p&gt;Cook pasta according to package directions, omitting salt and fat; drain.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;step&quot;&gt;\r\n&lt;div class=&quot;title-text&quot;&gt;Step 2&lt;/div&gt;\r\n&lt;p&gt;&nbsp;&lt;/p&gt;\r\n&lt;p&gt;Heat a large nonstick skillet over medium-high heat. Remove casings from sausage. Add oil to pan; swirl to coat. Add sausage and onion to pan; cook 4 minutes, stirring to crumble sausage. Add garlic; cook 2 minutes. Stir in tomatoes; cook 2 minutes. Remove from heat; stir in pasta, 2 tablespoons cheese, salt, and pepper. Sprinkle with remaining 1/4 cup cheese and basil.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;','2017-07-20',0,'2017-07-20 13:27:58','2017-07-20 11:45:25'),(5,'soup','tomato-soup-recipe','Tomato Soup Recipe','tomato-soup-recipe/6e066a66e1fa7eff3b710ad047a92c69.jpg','&lt;div class=&quot;itr-ingredients&quot;&gt;\r\n&lt;h2&gt;YOU WILL NEED&lt;/h2&gt;\r\n&lt;p&gt;4 tablespoons unsalted butter&lt;/p&gt;\r\n&lt;p&gt;1/2 large onion, cut into large wedges&lt;/p&gt;\r\n&lt;p&gt;1 (28-ounce) can tomatoes, we prefer to use whole peeled or crushed&lt;/p&gt;\r\n&lt;p&gt;1 1/2 cups water or&nbsp;&lt;a href=&quot;http://www.inspiredtaste.net/4719/homemade-chicken-stock/&quot;&gt;low-sodium chicken stock&lt;/a&gt;&lt;/p&gt;\r\n&lt;p&gt;1 teaspoon kosher salt, or more to taste&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;itr-directions&quot;&gt;\r\n&lt;h2&gt;DIRECTIONS&lt;/h2&gt;\r\n&lt;p&gt;Melt butter over medium heat in a Dutch oven or large saucepan. Add onion wedges, water, can of tomatoes with their juices, and the salt. Bring to a simmer. Cook, uncovered, for about 40 minutes. Stir occasionally and add additional salt as needed.&lt;/p&gt;\r\n&lt;p&gt;Blend the soup &mdash; it doesn&rsquo;t need to be ultra-smooth, some texture is a nice touch. An immersion blender makes quick work of this or use a blender. If you use a regular blender, it is best to blend in batches and not fill the blender as much as you usually would since the soup is so hot. We like to remove the center insert of the lid and cover it with a kitchen towel while blending &mdash; this helps some of the steam release and prevents the lid from popping off (which can be a big, hot mess).&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&nbsp;&lt;/p&gt;','2017-07-20',0,'2017-07-20 13:37:05','2017-07-20 11:37:05'),(6,'appetizer','chickpea-sundal','CHICKPEA SUNDAL','chickpea-sundal/84915e377c9e9d8bce22950c00fe91ce.jpg','&lt;div class=&quot;ingredients-info&quot;&gt;\r\n&lt;h2 class=&quot;section-title&quot;&gt;INGREDIENTS&lt;/h2&gt;\r\n&lt;ol class=&quot;ingredient-groups&quot;&gt;\r\n&lt;li class=&quot;ingredient-group&quot;&gt;\r\n&lt;ul class=&quot;ingredients&quot;&gt;\r\n&lt;li class=&quot;ingredient&quot;&gt;1 tablespoon virgin coconut oil or vegetable oil&lt;/li&gt;\r\n&lt;li class=&quot;ingredient&quot;&gt;2 teaspoons black or brown mustard seeds&lt;/li&gt;\r\n&lt;li class=&quot;ingredient&quot;&gt;6 fresh curry leaves&lt;/li&gt;\r\n&lt;li class=&quot;ingredient&quot;&gt;3 dried Kashmiri or guajillo chiles, broken into pieces, seeds removed&lt;/li&gt;\r\n&lt;li class=&quot;ingredient&quot;&gt;1/4 teaspoon asafetida (optional)&lt;/li&gt;\r\n&lt;li class=&quot;ingredient&quot;&gt;2 (15-ounce) cans chickpeas, rinsed&lt;/li&gt;\r\n&lt;li class=&quot;ingredient&quot;&gt;Kosher salt&lt;/li&gt;\r\n&lt;li class=&quot;ingredient&quot;&gt;1/4 cup freshly grated coconut or unsweetened shredded coconut&lt;/li&gt;\r\n&lt;li class=&quot;ingredient&quot;&gt;Lime wedges (for serving)&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;div class=&quot;popcart-buy-button&quot;&gt;&nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;instructions&quot;&gt;\r\n&lt;h2 class=&quot;section-title&quot;&gt;PREPARATION&lt;/h2&gt;\r\n&lt;ol class=&quot;preparation-groups&quot;&gt;\r\n&lt;li class=&quot;preparation-group&quot;&gt;\r\n&lt;ol class=&quot;preparation-steps&quot;&gt;\r\n&lt;li class=&quot;preparation-step&quot;&gt;Heat oil in a large skillet over medium-high. Cook mustard seeds, swirling pan occasionally, until oil begins to sputter. Add curry leaves, chiles, and asafetida (if using) and cook, stirring occasionally, until curry leaves are slightly darkened, about 45 seconds. Add chickpeas; cook, tossing often, just until warmed through, about 3 minutes. Let cool; season with salt.&lt;/li&gt;\r\n&lt;li class=&quot;preparation-step&quot;&gt;Scoop sundal into a bowl; top with coconut. Serve with lime wedges.&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;/li&gt;\r\n&lt;/ol&gt;\r\n&lt;/div&gt;','2017-07-20',0,'2017-07-20 15:15:25','2017-07-20 13:15:57');
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-20 21:24:03
