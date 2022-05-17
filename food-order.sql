-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2022 at 05:50 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(15, '123', '123', '202cb962ac59075b964b07152d234b70'),
(19, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL COMMENT 'This is for displaying on home page or not.',
  `active` varchar(10) NOT NULL COMMENT 'This is for active or not active food for ordering.',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Soft Drinks', 'Soft_Drinks.jpg', 'Yes', 'Yes'),
(11, 'Pasta', 'Creamy-Spinach-Tomato-Pasta-bowl-500x500.jpg', 'Yes', 'Yes'),
(9, 'Cocktails', 'Cocktails.jpg', 'No', 'Yes'),
(10, 'Alcoholic Beverages', 'alcoholic_beverages.jpg', 'No', 'Yes'),
(12, 'Salads', 'saladss.jpg', 'Yes', 'Yes'),
(13, 'Pizzas', 'menu-pizza.jpg', 'Yes', 'Yes'),
(14, 'Seafood', 'ting-tian-_79ZJS8pV70-unsplash.jpg', 'No', 'Yes'),
(15, 'Sushi', 'sushi.jpg', 'Yes', 'Yes'),
(16, 'Dessert', 'bar-dessert.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

DROP TABLE IF EXISTS `tbl_food`;
CREATE TABLE IF NOT EXISTS `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(23, 'Tajarin al Tartufo', 'Tajarin (pronounced <tie-yah-REEN>), is the Piemontese version of tagliatelle. Unlike other types of egg pasta, these thin, golden strands are made with a higher proportion of egg yolks, resulting in a delicate texture and rich flavor. Paired with the prized white truffle, they make a decadent primo piatto.', '12.00', 'rsz_anh-nguye.jpg', 11, 'Yes', 'Yes'),
(21, 'Cappy Pulpy', 'ÐÐ°Ð´ 60 Ð³. Cappy Ð¿Ñ€Ð°Ð²Ð¸ Ð½Ð°Ð¹-Ð²ÐºÑƒÑÐ½Ð¸Ñ‚Ðµ ÑÐ¾ÐºÐ¾Ð²Ðµ - Coca-Cola', '4.00', 'cappy-pulpy.jpeg', 1, 'Yes', 'Yes'),
(22, 'Aquafina Water', 'As far as taste, one tiny sip of Aquafina conjures a noticeable chemical taste with mild notes of plastic bits.', '3.00', 'Aquafina.jpg', 1, 'Yes', 'Yes'),
(18, 'Dr Pepper', 'Dr Pepper has expanded their drink range with flavor variations and diet versions of their sodas.', '6.00', 'Dr Pepper.jpg', 1, 'Yes', 'Yes'),
(19, 'Pepsi', 'It comes in many sizes and variations but most describe Pepsi as having a sweeter taste than Coke and they are correct. A can of Pepsi has 41 grams of sugar while Coke has 34 grams.', '5.00', 'pepsi.jpg', 1, 'Yes', 'Yes'),
(20, 'Coca Cola', 'There are always flavor variations coming and going, and even entirely new drink categories based on the cola flavor. They do not all have the same caffeine amounts.', '5.00', 'coca.jpg', 1, 'Yes', 'Yes'),
(24, 'Ravioli di Zucca', 'Sweet butternut squash ravioli, nutty browned butter, and fragrant sage are a classic, consistently delicious pairing, not to mention the ultimate Fall meal. The secret ingredient? Crushed amaretti cookies give the filling extra depth. Bonus: it will make your kitchen smell amazing!', '15.00', 'ravioli.jpg', 11, 'Yes', 'Yes'),
(25, 'Pasta al Tonno', 'A coastal classic with origins in Calabria, pasta with tuna is a simple yet satisfying main dish that works as well for a quick weeknight dinner as it does for a lazy Sunday feast. With the addition of salty capers and spicy Calabrian chili peppers, this plate has the power to transport you to the Mediterranean seaside.', '14.00', 'bucatini-al-tonno-tuna-pasta.jpg', 11, 'Yes', 'Yes'),
(26, 'Lo Spaghetto al Pomodoro', 'Five simple ingredients, one revolutionary meal. If there is any dish that is truly iconic of Italian cuisine, this is it. For our tenth anniversary, our chefs in Italy spent months testing, tasting, and experimenting with different ingredients from our marketplace in order to create the perfect lo spaghetto al pomodoro â€“ check out the recipe, and the full story behind it.', '18.00', 'spagthitti.jpg', 11, 'Yes', 'Yes'),
(27, 'Tagliatelle alla Bolognese', 'Our top pasta recipe? It had to be ragÃ¹ served over silken egg tagliatelle, a signature dish of Bologna, the food-loving capital city of Emilia-Romagna. In fact, this rich, meaty tomato ragÃ¹ is so closely associated with Bologna that any dish described as Bolognese will be cloaked in it.', '20.00', 'bolognese.jpg', 11, 'Yes', 'Yes'),
(28, 'Apple Martini', 'The Apple Martini or â€œAppletiniâ€ adds a twist to the typical dry martini. Vodka is used as opposed to gin as the basis of the cocktail and apple schnapps is added for a sweet but slightly sour twist. The cocktail is usually finished with lemon juice and garnished with a slice of apple, simple but tasty.', '8.00', 'green-apple-martini-recipe-coastal-wandering-6s.jpg', 9, 'Yes', 'Yes'),
(29, 'Californication', 'Californication as used by the Red Hot Chili Peppers means the mixing of different cultures. The cocktail reflects this with the various spirits used within the cocktail from all over the world.', '9.00', 'california.jpg', 9, 'Yes', 'Yes'),
(30, 'Pina Colada', 'The classic tropical cocktail, with a distinctive look and taste. More of a smoothie as opposed to an alcoholic beverage. The modest yet perfect blend of coconut milk, rum and pineapple juice has been a firm favourite throughout the years.', '10.00', 'pina colada.jpg', 9, 'Yes', 'Yes'),
(31, 'Margarita', 'The simple mixture of tequila, triple sec and lime juice is often blended with ice but is traditionally served on the rocks. The cocktail is generally presented in a salt rimmed glass.', '7.00', 'margarita.jpg', 9, 'Yes', 'Yes'),
(32, 'Corona Beer', 'ÐšÐ¾Ñ€Ð¾Ð½Ð° Ðµ Ð¼Ð°Ñ€ÐºÐ° Ð¼ÐµÐºÑÐ¸ÐºÐ°Ð½ÑÐºÐ° Ð±Ð¸Ñ€Ð°, Ð² ÑÑ‚Ð¸Ð» Ð°Ð¼ÐµÑ€Ð¸ÐºÐ°Ð½ÑÐºÐ¸ Ð»Ð°Ð³ÐµÑ€, ÐºÐ¾ÑÑ‚Ð¾ ÑÐµ Ð¿Ñ€Ð¾Ð¸Ð·Ð²ÐµÐ¶Ð´Ð° Ð¾Ñ‚ Ð¼ÐµÐºÑÐ¸ÐºÐ°Ð½ÑÐºÐ°Ñ‚Ð° Ð¿Ð¸Ð²Ð¾Ð²Ð°Ñ€Ð½Ð° â€žÐ“Ñ€ÑƒÐ¿Ð¾ ÐœÐ¾Ð´ÐµÐ»Ð¾â€œ.', '5.00', 'Corona Beer.jpg', 10, 'Yes', 'Yes'),
(33, 'Merlo Red Wine', 'Best Merlo in the world', '15.00', 'Merlo Red Wine.jpg', 10, 'Yes', 'Yes'),
(34, 'Grands', 'Cheapest  whiskey', '20.00', 'Grands.jpg', 10, 'Yes', 'Yes'),
(35, 'Summer Asian Slaw', 'Make this salad for your next picnic, and itâ€™ll be a guaranteed hit. A tahini miso dressing gives it a creamy umami coating, while peaches add juicy pops of sweetness. I finish it with toasted pepitas for crunch.', '12.00', 'Salad Alasipreza.jpg', 12, 'Yes', 'Yes'),
(36, 'Best Broccoli Salad', 'You wonâ€™t miss the bacon in this lightened-up take on classic broccoli salad. Smoky roasted nuts take its place, adding delectable savory bites. A lightly creamy, sweet & tangy dressing takes the whole thing over the top.', '20.00', 'broccoli-salad.jpg', 12, 'Yes', 'Yes'),
(37, 'Easy Pasta Salad', 'As its name suggests, this one is a breeze to make. Just whisk together the zippy lemon dressing at the bottom of a big bowl, add the other ingredients, and toss to create a heavenly tangy/creamy/crunchy/fresh summer combo.', '19.00', 'pasta-salad.jpg', 12, 'Yes', 'Yes'),
(38, 'Greek Salad', 'I love how big cubes of feta, juicy tomatoes, olives, herbs, bell peppers, and cucumber tumble together in this stunning summer salad with a homemade Greek salad dressing.', '23.00', 'greek-salad-2.jpg', 12, 'Yes', 'Yes'),
(39, 'Proof Pizza', 'Proper wood fired pizza with the oven bringing vibrancy and a wonderful smell to the whole room as soon as you walk in the door. Take into account their a great wine list and this is the sort of place that youâ€™ll never want to leave.', '25.00', 'proof.png', 13, 'Yes', 'Yes'),
(40, 'Gazzo', 'Gazzo is a sourdough craft-pizza restaurant in NeukÃ¶lln who believe in sourcing artisanal produce â€“ local when available, but always delicious, sustainable and natural. The end result is a unique blend of German precision with Italian flair. An absolute joy of a restaurant.', '26.00', 'gazoo.png', 13, 'Yes', 'Yes'),
(41, 'Nea Pizza', 'They make their own dough to be incredibly light and airy, so much so that it could lift up and float away from the table at any moment. Their toppings are original, unique and exciting and terrific service and gorgeous room are just the cherry on top.\r\n\r\n', '24.00', 'nea.jpg', 13, 'Yes', 'Yes'),
(42, 'Masanielli', 'For truly autentic Campania pizza, thereâ€™s no better place to visit than the province of Caserta. Situated just north of Naples, this sleepy garden-filled town is the personification of Southern Italy charm.', '23.00', 'Pizzeria-I-Masanielli-1024x583.jpg', 13, 'Yes', 'Yes'),
(43, 'Spaghetti with Clams and Garlic', 'Nice taste of spaghetti and seafood', '30.00', 'sea.jpg', 14, 'Yes', 'Yes'),
(44, 'Langoustines alla Busara', 'Langoustines alla Busara', '31.00', 'download (1).jpg', 14, 'Yes', 'Yes'),
(45, 'Nugatsu Mix', '5 kinds of sushi', '35.00', 'Nugatsu.jpg', 15, 'Yes', 'Yes'),
(46, 'Spicy Sushi', '5 diff kinds of spicy sushi', '33.00', 'Spicy Juicy Mix.jpg', 15, 'Yes', 'Yes'),
(47, 'Melba With Fruits', 'cranberry, gooseberry, redcurrant, grape.', '15.00', 'Melba With Fruits.jpg', 16, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE IF NOT EXISTS `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'Cappy Pulpy', '4.00', 326, '1304.00', '2022-04-25 14:22:34', 'Delivered', 'Callum Sweet', '+1 (733) 802-2765', 'cilu@mailinator.com', 'Tempora accusamus id'),
(2, 'Coca Cola', '5.00', 2, '10.00', '2022-04-25 14:23:12', 'Cancelled', 'Madaline Glenn', '+1 (555) 677-5717', 'vavecep@mailinator.com', 'Qui cumque praesenti'),
(3, 'Cappy Pulpy', '4.00', 1, '4.00', '2022-04-25 14:25:41', 'On Delivery', 'Nasim Pickett', '+1 (902) 287-4425', 'kojan@mailinator.com', 'Voluptas sit deleni'),
(4, 'Tajarin al Tartufo', '12.00', 1, '12.00', '2022-04-25 14:26:03', 'Ordered', 'Bell Santiago', '+1 (329) 371-5497', 'sapyd@mailinator.com', 'Debitis magni conseq');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
