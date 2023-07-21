-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 12:40 PM
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
-- Table structure for table `tms_delivery`
--

CREATE TABLE `tms_delivery` (
  `delivery_id` varchar(4) NOT NULL,
  `delivery_date_start` date NOT NULL,
  `delivery_date_end` date NOT NULL,
  `delivery_status` text DEFAULT 'Not completed',
  `order_id` varchar(4) NOT NULL,
  `emp_id` varchar(4) NOT NULL,
  `truck_no_plate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tms_delivery`
--

INSERT INTO `tms_delivery` (`delivery_id`, `delivery_date_start`, `delivery_date_end`, `delivery_status`, `order_id`, `emp_id`, `truck_no_plate`) VALUES
('D001', '2023-07-03', '2023-07-05', 'completed', 'EK02', 'E004', 'ABC123'),
('D002', '2023-11-06', '2023-11-08', 'ongoing', 'EK03', 'E005', 'DEF456'),
('D003', '2023-03-09', '2023-03-11', 'completed', 'EK04', 'E004', 'GHI789'),
('D004', '2023-07-04', '2023-07-06', 'completed', 'EK05', 'E004', 'JKL012'),
('D005', '2023-06-06', '2023-06-08', 'completed', 'EK06', 'E008', 'MNO345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tms_delivery`
--
ALTER TABLE `tms_delivery`
  ADD PRIMARY KEY (`delivery_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `emp_id` (`emp_id`),
  ADD KEY `truck_no_plate` (`truck_no_plate`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tms_delivery`
--
ALTER TABLE `tms_delivery`
  ADD CONSTRAINT `tms_delivery_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tms_order` (`order_id`),
  ADD CONSTRAINT `tms_delivery_ibfk_2` FOREIGN KEY (`emp_id`) REFERENCES `tms_driver` (`emp_id`),
  ADD CONSTRAINT `tms_delivery_ibfk_3` FOREIGN KEY (`truck_no_plate`) REFERENCES `tms_truck` (`no_plate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
