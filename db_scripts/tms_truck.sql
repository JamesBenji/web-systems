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
-- Table structure for table `tms_truck`
--

CREATE TABLE `tms_truck` (
  `no_plate` varchar(10) NOT NULL,
  `max_capacity` varchar(10) NOT NULL,
  `model` varchar(10) NOT NULL,
  `current_status` text DEFAULT 'Parked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tms_truck`
--

INSERT INTO `tms_truck` (`no_plate`, `max_capacity`, `model`, `current_status`) VALUES
('ABC123', '10 tons', 'Model A', 'In Transit'),
('BCD890', '8 tons', 'Model J', 'Parked'),
('DEF456', '8 tons', 'Model B', 'Parked'),
('EFG123', '13 tons', 'Model K', 'In Repair'),
('GHI789', '12 tons', 'Model C', 'In Repair'),
('HIJ456', '9 tons', 'Model L', 'Parked'),
('JKL012', '6 tons', 'Model D', 'Parked'),
('KLM789', '11 tons', 'Model M', 'In Transit'),
('MNO345', '15 tons', 'Model E', 'In Transit'),
('NOP012', '5 tons', 'Model N', 'Parked'),
('PQR678', '9 tons', 'Model F', 'Parked'),
('QRS345', '10 tons', 'Model O', 'In Repair'),
('STU901', '11 tons', 'Model G', 'In Repair'),
('VWX234', '7 tons', 'Model H', 'Parked'),
('YZA567', '14 tons', 'Model I', 'In Transit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tms_truck`
--
ALTER TABLE `tms_truck`
  ADD PRIMARY KEY (`no_plate`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
