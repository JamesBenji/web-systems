-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 11:08 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hima_tms_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tms_customer`
--

CREATE TABLE `tms_customer` (
  `customer_id` varchar(4) NOT NULL,
  `customer_name` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `customer_type` varchar(10) DEFAULT 'Business',
  `sex` char(1) DEFAULT NULL,
  `tel_no` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `location` varchar(100) NOT NULL
) ;

--
-- Dumping data for table `tms_customer`
--

INSERT INTO `tms_customer` (`customer_id`, `customer_name`, `name`, `customer_type`, `sex`, `tel_no`, `email`, `location`) VALUES
('011', 'Ethan Johnson', 'Ethan', 'Business', 'M', '777777777', 'ethan.johnson@g', '789 Pine St'),
('012', 'Mia Thompson', 'Mia', 'Individual', 'F', '888888888', 'mia.thompson@gm', '321 Oak St'),
('013', 'Samuel Rodrigue', 'Samuel', 'Business', 'M', '999999999', 'samuel.rodrigue', '456 Cedar Ln'),
('014', 'Lily Turner', 'Lily', 'Individual', 'F', '222111333', 'lily.turner@gma', '987 Maple Ave'),
('015', 'Benjamin Davis', 'Benjamin', 'Business', 'M', '333222111', 'benjamin.davis@', '654 Elm St'),
('016', 'Grace Martinez', 'Grace', 'Individual', 'F', '444333222', 'grace.martinez@', '789 Oak St'),
('017', 'Henry Wilson', 'Henry', 'Business', 'M', '555444333', 'henry.wilson@gm', '321 Pine Rd'),
('018', 'Scarlett Clark', 'Scarlett', 'Individual', 'F', '666555444', 'scarlett.clark@', '654 Cedar Ln');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tms_customer`
--
ALTER TABLE `tms_customer`
  ADD PRIMARY KEY (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
