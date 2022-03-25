-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 07:04 PM
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
-- Database: `jaipur`
--

-- --------------------------------------------------------

--
-- Table structure for table `jaipur`
--

CREATE TABLE `jaipur` (
  `ID` int(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Temperature` double NOT NULL,
  `pressure` double NOT NULL,
  `Rainfall` double NOT NULL,
  `Wind speed` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jaipur`
--

INSERT INTO `jaipur` (`ID`, `Date`, `Time`, `Temperature`, `pressure`, `Rainfall`, `Wind speed`) VALUES
(1, '09-03-2022', '11:30', 23, 67, 44, 45),
(2, '09-03-2022', '11:40', 29, 24, 40, 24),
(3, '09-03-2022', '11:50', 38, 29, 27, 65),
(4, '09-03-2022', '12:00', 34, 60, 36, 26);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
