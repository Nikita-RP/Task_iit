-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 07:03 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weatherb`
--

-- --------------------------------------------------------

--
-- Table structure for table `weatherb`
--

CREATE TABLE `weatherb` (
  `ID` int(20) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Time` varchar(100) NOT NULL,
  `Temperature` double NOT NULL,
  `Humidity` double NOT NULL,
  `Pressure` double NOT NULL,
  `Rainfall` double NOT NULL,
  `Wind speed` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weatherb`
--

INSERT INTO `weatherb` (`ID`, `Date`, `Time`, `Temperature`, `Humidity`, `Pressure`, `Rainfall`, `Wind speed`) VALUES
(1, '09-03-2022', '12:40', 26, 35, 34, 24, 67),
(2, '09-03-2022', '1:40', 27, 38, 48, 18, 24),
(3, '09-03-2022', '2:40', 21, 29, 30, 42, 56),
(4, '09-03-2022', '3:40', 20, 38, 46, 36, 26);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
