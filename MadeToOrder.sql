-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2024 at 04:22 AM
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
-- Database: `MadeToOrder`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(191) NOT NULL,
  `quantity` int(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `MenuItemID` int(11) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Category` enum('breakfast','lunch','dinner','drinks') NOT NULL,
  `image` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`MenuItemID`, `ItemName`, `Price`, `Category`, `image`, `description`, `createdAt`) VALUES
(39, 'Homestyle 4-Stack Pancake', 6.00, 'breakfast', '1733272975.jpeg', 'Indulge in a towering stack of four golden, fluffy pancakes, made from our signature batter for the perfect balance of lightness and sweetness. Served warm and topped with a pat of creamy butter, this stack is ready to be drizzled with maple syrup.', '2024-12-04 00:42:55'),
(40, 'Linked-List Sausage', 5.00, 'breakfast', '1733273092.jpeg', 'Experience the timeless flavor of our Linked-List Sausage! These savory sausages are handcrafted and linked with care, offering a perfect balance of juicy, spiced goodness. Grilled to golden perfection, they’re bursting with flavor in every bite.', '2024-12-04 00:44:52'),
(44, 'Regs Scrambled Eggs', 3.00, 'breakfast', '1733339850.jpeg', 'Start your day with a timeless breakfast favorite! Our scrambled eggs are made fresh to order with farm-fresh eggs, whisked to fluffy perfection and cooked to a creamy, golden finish. Perfect for breakfast, brunch, or any time you\'re craving comfort on a plate!', '2024-12-04 19:17:30'),
(45, 'Loopy Soup of the Day', 4.00, 'lunch', '1733339940.jpeg', 'Warm up with our Soup of the Day, made fresh daily with the finest ingredients! Each day brings a new, seasonal flavor crafted to delight your taste buds. Whether it\'s a hearty, savory classic or a light, refreshing option, our soup is the perfect comfort. Call our number to ask about today\'s delicious choice!', '2024-12-04 19:19:00'),
(46, 'Sorted Sandwich', 6.00, 'lunch', '1733340087.jpeg', 'Savor the simplicity and freshness of our Handcrafted LS Sandwich! This delicious sandwich features tender, roasted turkey piled high with crisp lettuce and ripe, juicy tomatoes, all nestled between two slices of soft, toasted bread. Perfectly balanced with flavors, it\'s a satisfying option for any time of day', '2024-12-04 19:21:27'),
(47, 'Chicken Fingers', 8.00, 'dinner', '1733340379.jpeg', 'Enjoy the crispy perfection of our Chicken Fingers with Fries! Tender, breaded chicken strips, golden-fried to a crispy crunch, paired with a side of hot, seasoned fries. A timeless favorite that\'s sure to satisfy any craving!', '2024-12-04 19:26:19'),
(48, 'Char Cheeseburger', 11.00, 'dinner', '1733340523.jpeg', 'Indulge in the ultimate comfort meal with our Char Cheeseburger with Fries! A juicy, perfectly grilled beef patty topped with a slice of melted cheese, served on a soft, toasted bun. Accompanied by a generous portion of crispy, golden fries, this classic combo is the perfect choice for any burger lover.', '2024-12-04 19:28:43'),
(49, 'Break Steak', 16.00, 'dinner', '1733340586.jpeg', 'Indulge in our perfectly cooked Juicy Steak with Roasted Potatoes, a hearty meal that’s sure to satisfy. Our premium steak is seared to your liking, offering a tender and flavorful bite with every cut. Paired with crispy, golden roasted potatoes seasoned to perfection, this dish is the ultimate comfort food.', '2024-12-04 19:29:46'),
(50, 'String Spaghetti', 14.00, 'dinner', '1733340634.jpeg', 'Dive into a plate of our String Spaghetti Marinara, featuring perfectly cooked al dente pasta tossed in a rich, savory tomato sauce. Made with ripe tomatoes, fresh herbs, and a hint of garlic, this comforting dish is topped with a sprinkle of Parmesan cheese for the perfect finishing touch.', '2024-12-04 19:30:34'),
(51, 'Java Drink', 2.00, 'drinks', '1733340759.jpeg', 'Start your day with a cup of our rich and aromatic Freshly Brewed Coffee. Made from premium, hand-selected beans and brewed to perfection, it offers a bold, full-bodied flavor with just the right amount of smoothness.', '2024-12-04 19:32:39'),
(52, 'Fresh Lemonade', 2.00, 'drinks', '1733340786.jpeg', 'Quench your thirst with our Freshly Squeezed Lemonade, made with zesty, hand-squeezed lemons and just the right amount of sweetness.', '2024-12-04 19:33:06'),
(53, 'Coding Coke', 2.00, 'drinks', '1733340807.jpeg', 'Enjoy the timeless refreshment of an ice-cold Coke! With its perfect blend of bold, crisp flavors and just the right amount of sweetness, this classic soft drink is the ultimate thirst-quencher.', '2024-12-04 19:33:27');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(11) NOT NULL,
  `MenuItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `customerName` varchar(55) NOT NULL,
  `customerEmail` varchar(200) NOT NULL,
  `customerPhone` varchar(15) NOT NULL,
  `CreditCard` varchar(20) NOT NULL,
  `OrderTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TotalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`MenuItemID`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`MenuItemID`),
  ADD KEY `FOREIGNKEYMenuID` (`MenuItemID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menuitem`
--
ALTER TABLE `menuitem`
  MODIFY `MenuItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `FOREIGNKEYID` FOREIGN KEY (`id`) REFERENCES `menuitem` (`MenuItemID`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `FOREIGNKEYMenuID` FOREIGN KEY (`MenuItemID`) REFERENCES `menuitem` (`MenuItemID`),
  ADD CONSTRAINT `FOREIGNKEYOrderID` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;