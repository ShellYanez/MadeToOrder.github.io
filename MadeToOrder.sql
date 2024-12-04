-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 04, 2024 at 10:39 PM
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
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `CustomerID` int(11) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Passcode` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MenuItem`
--

CREATE TABLE `MenuItem` (
  `MenuItemID` int(11) NOT NULL,
  `ItemName` varchar(50) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Category` enum('breakfast','lunch','dinner','drinks') NOT NULL,
  `image` varchar(191) NOT NULL,
  `description` mediumtext NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `MenuItem`
--

INSERT INTO `MenuItem` (`MenuItemID`, `ItemName`, `Price`, `Category`, `image`, `description`, `createdAt`) VALUES
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
-- Table structure for table `Order`
--

CREATE TABLE `Order` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL COMMENT 'foreign key pointing to Customer table',
  `OrderTime` datetime NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `OrderDetail`
--

CREATE TABLE `OrderDetail` (
  `OrderID` int(11) NOT NULL,
  `MenuItemID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `PaymentID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `CardNumber` int(11) NOT NULL,
  `PaymentStatus` varchar(20) NOT NULL,
  `PaymentTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Passcode` (`Passcode`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `MenuItem`
--
ALTER TABLE `MenuItem`
  ADD PRIMARY KEY (`MenuItemID`);

--
-- Indexes for table `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`OrderID`,`CustomerID`) USING BTREE,
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD PRIMARY KEY (`OrderID`,`MenuItemID`),
  ADD KEY `FOREIGNKEYMenuItemID` (`MenuItemID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`PaymentID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `MenuItem`
--
ALTER TABLE `MenuItem`
  MODIFY `MenuItemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `Order`
--
ALTER TABLE `Order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `PaymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`);

--
-- Constraints for table `OrderDetail`
--
ALTER TABLE `OrderDetail`
  ADD CONSTRAINT `FOREIGNKEYMenuItemID` FOREIGN KEY (`MenuItemID`) REFERENCES `MenuItem` (`MenuItemID`),
  ADD CONSTRAINT `FOREIGNKEYOrderID` FOREIGN KEY (`OrderID`) REFERENCES `Order` (`OrderID`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `Order` (`OrderID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
