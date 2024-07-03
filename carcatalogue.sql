-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 06:20 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carcatalogue`
--

-- --------------------------------------------------------

--
-- Table structure for table `carcatalogue`
--

CREATE TABLE `carcatalogue` (
  `car_id` int(11) NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `fuel_type` varchar(50) NOT NULL,
  `car_year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carcatalogue`
--

INSERT INTO `carcatalogue` (`car_id`, `manufacturer`, `model`, `engine`, `fuel_type`, `car_year`) VALUES
(1, 'Toyota', 'Corolla', '2.0L', 'Gasoline', 2020),
(2, 'Honda', 'Civic', '2.0L', 'Gasoline', 2019),
(3, 'Ford', 'Mustang', '5.0L', 'Gasoline', 2021),
(4, 'Chevrolet', 'Impala', '3.6L', 'Gasoline', 2018),
(5, 'Nissan', 'Altima', '2.5L', 'Gasoline', 2022),
(6, 'Hyundai', 'Elantra', '2.0L', 'Gasoline', 2020),
(7, 'Kia', 'Soul', '1.6L', 'Gasoline', 2019),
(8, 'Mazda', 'CX-5', '2.5L', 'Gasoline', 2021),
(9, 'BMW', 'X5', '3.0L', 'Diesel', 2020),
(10, 'Audi', 'A4', '2.0L', 'Gasoline', 2018),
(11, 'Mercedes-Benz', 'C-Class', '2.0L', 'Gasoline', 2021),
(12, 'Volkswagen', 'Jetta', '1.4L', 'Gasoline', 2022),
(13, 'Subaru', 'Outback', '2.5L', 'Gasoline', 2020),
(14, 'Tesla', 'Model 3', 'Electric', 'Electric', 2021),
(15, 'Volvo', 'XC60', '2.0L', 'Hybrid', 2019),
(16, 'Jeep', 'Wrangler', '3.6L', 'Gasoline', 2018),
(17, 'Dodge', 'Charger', '5.7L', 'Gasoline', 2020),
(18, 'Chevrolet', 'Malibu', '1.5L', 'Gasoline', 2021),
(19, 'Ford', 'Escape', '1.5L', 'Gasoline', 2022),
(20, 'Toyota', 'Camry', '2.5L', 'Gasoline', 2019),
(21, 'Audi', 'A6', '2.0L', 'Diesel', 2014),
(22, 'Audi', 'A3', '2.0L', 'Gasoline', 2008),
(24, '', '', '', '', 0000),
(25, '', '', '', '', 0000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carcatalogue`
--
ALTER TABLE `carcatalogue`
  ADD PRIMARY KEY (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carcatalogue`
--
ALTER TABLE `carcatalogue`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
