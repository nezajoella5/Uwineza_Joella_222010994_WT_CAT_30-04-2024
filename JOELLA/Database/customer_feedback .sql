-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 04:51 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `customer_feedback`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `addressid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`addressid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressid`, `customerid`, `city`, `country`) VALUES
(1, 1, 'New York', 'USA'),
(2, 2, 'London', 'UK'),
(4, 5, 'goma', 'congo'),
(5, 6, 'gggt', 'rrrew');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `idNumber` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `martialStatus` varchar(20) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customerid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  PRIMARY KEY (`customerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerid`, `firstname`, `lastname`, `email`, `gender`) VALUES
(1, 'Jaar', 'Faer', 'hhe@gmail.com', 'F'),
(3, '', '', '', ''),
(4, '', '', '', ''),
(5, '', '', '', ''),
(6, 'Joella', 'NSHUTI', 'nezajoella5@gmail.com', 'F'),
(7, 'Jonathan', 'NSHUTI', 'jonathan@gmail.com', 'M'),
(8, 'jolly', 'UWASE', 'jolly@gmail.com', 'F');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `feedbackid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT NULL,
  `comments` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`feedbackid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `customerid`, `comments`, `date`) VALUES
(1, 1, 'Great service, very satisfied!', '2024-02-18'),
(2, 2, 'Could improve delivery times.', '2024-02-17'),
(4, 4, 'good quality', '2020-03-04'),
(5, 5, 'bad quality', '2020-03-04');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `customerid` int(11) DEFAULT NULL,
  `totalamount` decimal(10,2) DEFAULT NULL,
  `orderdate` date DEFAULT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `totalamount`, `orderdate`) VALUES
(1, 1, 150.00, '2024-02-18'),
(2, 2, 250.00, '2024-02-17'),
(3, 1, 100.00, '2024-02-03'),
(4, 2, 100.00, '2023-02-02'),
(5, 3, 2000.00, '2023-03-04'),
(6, 2, 200.00, '2023-02-03'),
(8, 5, 5000.00, '2012-02-11'),
(9, 7, 500.00, '2023-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `productid` int(11) NOT NULL AUTO_INCREMENT,
  `productname` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `price`) VALUES
(1, 'Smartphone', 599.99),
(2, 'Laptop', 1099.99),
(3, 'hhh', 200.00),
(4, 'hhh', 550.00),
(6, 'uuut', 200.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
