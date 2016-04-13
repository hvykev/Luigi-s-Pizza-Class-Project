-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2016 at 11:24 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luigipizzadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pizza_bases`
--

CREATE TABLE `pizza_bases` (
  `ID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Price` float NOT NULL,
  `CRUST` varchar(20) NOT NULL,
  `SIZE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza_bases`
--

INSERT INTO `pizza_bases` (`ID`, `Name`, `Price`, `CRUST`, `SIZE`) VALUES
(1, 'Small Thin Crust', 5.75, 'THIN', 'SMALL'),
(2, 'Small Standard Crust', 5.75, 'STANDARD', 'SMALL'),
(3, 'Small Deep-Dish', 6.75, 'DEEP-DISH', 'SMALL'),
(4, 'Small Gluten-Free', 6.75, 'GLUTEN FREE', 'SMALL');

-- --------------------------------------------------------

--
-- Table structure for table `sides`
--

CREATE TABLE `sides` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` float UNSIGNED NOT NULL,
  `Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `toppings`
--

CREATE TABLE `toppings` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Price` float NOT NULL,
  `Type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toppings`
--

INSERT INTO `toppings` (`ID`, `Name`, `Price`, `Type`) VALUES
(1, 'Pepperoni', 0.25, 'MEAT'),
(2, 'Onions', 0.25, 'VEGETABLE'),
(3, 'Mushrooms', 0.35, 'VEGETABLE'),
(4, 'Cheddar', 0.15, 'CHEESE'),
(5, 'Motzerella', 0.15, 'CHEESE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pizza_bases`
--
ALTER TABLE `pizza_bases`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sides`
--
ALTER TABLE `sides`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `toppings`
--
ALTER TABLE `toppings`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pizza_bases`
--
ALTER TABLE `pizza_bases`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sides`
--
ALTER TABLE `sides`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `toppings`
--
ALTER TABLE `toppings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
