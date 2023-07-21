-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2023 at 12:41 PM
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
-- Table structure for table `tms_order`
--

CREATE TABLE `tms_order` (
  `order_id` varchar(4) NOT NULL,
  `order_qty` int(11) NOT NULL,
  `order_desc` text NOT NULL,
  `order_date` date NOT NULL,
  `due_date` date NOT NULL,
  `delivery_location` varchar(100) NOT NULL,
  `order_status` text DEFAULT 'Unassigned',
  `customer_id` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tms_order`
--

INSERT INTO `tms_order` (`order_id`, `order_qty`, `order_desc`, `order_date`, `due_date`, `delivery_location`, `order_status`, `customer_id`) VALUES
('EK01', 500, 'DELIVERY TO HAM CONSTRUCTION SITE', '2023-06-06', '2023-06-23', 'Kampala, Kamapla road', 'completed', '011'),
('EK02', 450, 'DELIVERY TO ROKO CONSTRUCTIONS', '2023-07-03', '2023-07-07', 'Nsambya, Kevian road', 'not completed', '012'),
('EK03', 280, 'DELIVERY TO MUKWANO INDUSTRIES', '2023-11-06', '2023-11-11', 'Kampala, Mukwano road', 'not completed', '014'),
('EK04', 1000, 'DELIVERY TO HOPE CLINIC EXTENSION SITE', '2023-03-09', '2023-03-12', 'Kampala, Makindye road', 'completed', '013'),
('EK05', 700, 'DELIVERY TO NSAMBYA HOSPITAL NEW WING', '2023-07-04', '2023-07-07', 'Nsambya, Nsambya road', 'not completed', '016'),
('EK06', 3900, 'DELIVERY TO CRANE TOWERS', '2023-06-06', '2023-06-08', 'Kampala, Jinja road', 'completed', '013'),
('EK07', 523, 'DELIVERY TO KABOJJA', '2023-08-06', '2023-08-10', 'Busega, Konge road', 'not completed', '014'),
('EK08', 5023, 'DELIVERY TO MUYENGA BUILDING SITE', '2023-01-06', '2023-01-08', 'Kampala, Muyenga road', 'completed', '012'),
('EK09', 50, 'DELIVERY TO JOMAYI ESTATES', '2023-06-04', '2023-06-06', 'Masaka, Masaka road', 'completed', '017'),
('EK10', 540, 'DELIVERY TO MIREMBE VILLAS', '2023-06-03', '2023-06-10', 'Kigo, Kigo road', 'completed', '018'),
('EK11', 130, 'DELIVERY TO KPC ', '2023-06-06', '2023-06-09', 'Kansanga, Rohn road', 'not completed', '013');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tms_order`
--
ALTER TABLE `tms_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tms_order`
--
ALTER TABLE `tms_order`
  ADD CONSTRAINT `tms_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tms_customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
