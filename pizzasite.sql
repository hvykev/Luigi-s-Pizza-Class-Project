-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2016 at 07:28 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzasite`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasta`
--

CREATE TABLE `pasta` (
  `NoodleType` varchar(15) NOT NULL,
  `Sauce` varchar(40) NOT NULL,
  `Description` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasta`
--

INSERT INTO `pasta` (`NoodleType`, `Sauce`, `Description`, `Quantity`, `Price`) VALUES
('Rigatoni', 'Lemon-Chile Pesto', 'Rigatoni with Lemon-Chile Pesto and Grated Egg', 30, 3.99),
('Fettuccine', 'None', 'Fettuccine with Shiitakes and Asparagus', 30, 4.5),
('Fettuccine', 'Mushroom', 'SPINACH FETTUCCINE WITH WHITE MUSHROOM SAUCE', 25, 3.99),
('Rigatoni', 'Diablo Clam', 'RIGATONI WITH DIABLO CLAM SAUCE', 20, 4.5),
('Farfalle', 'Zucchini and Lemon Cream', 'Farfalle Pasta with Zucchini and Lemon-Cream Sauce Recipe', 30, 2.99),
('Farfalle', 'Butternut Squash', 'FARFALLE PASTA with Butternut Squash Sauce and Bacon Flakes', 25, 3.5),
('Penne', 'Alfredo', 'Chicken Alfredo Baked Ziti', 30, 3.99),
('Penne', 'None', 'Pancetta Bacon and Mushroom', 45, 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `sides`
--

CREATE TABLE `sides` (
  `Name` varchar(15) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `Description` text NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sides`
--

INSERT INTO `sides` (`Name`, `Type`, `Description`, `Quantity`, `Price`, `Id`) VALUES
('Sprite', 'Soda', 'Lemon-lime soda 100% Natural Flavors', 350, 1.99, 1),
('Fanta Strwbrry', 'Soda', 'Strawberry flavored soda with other natural flavors', 350, 1.99, 2),
('Mini Baguette', 'Bread', 'Baguettes are a very popular type of French bread, characterized by their long tube-like shape', 200, 0.99, 3),
('Sourdough', 'Bread', 'Sourdough bread is baked with certain bacteria that produce lactic acid and create a sour taste', 200, 0.99, 4),
('Asian Caramel', 'Wings', 'None', 250, 3.99, 5),
('Bacon Cheddar', 'Wings', 'It’s like a bacon cheeseburger in delicious wing form', 250, 3.99, 6),
('Choco Chip Pie', 'Dessert', 'Chocolate Chip Dessert Pizza', 150, 4.99, 7),
('Cinna Sticks', 'Dessert', 'A freshly-baked treat, loaded with cinnamon and sugar. Served with white icing', 200, 2.99, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sides`
--
ALTER TABLE `sides`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sides`
--
ALTER TABLE `sides`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
