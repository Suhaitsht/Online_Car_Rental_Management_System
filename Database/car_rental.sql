-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2023 at 10:26 AM
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
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `U_id` int(25) NOT NULL,
  `U_name` varchar(25) NOT NULL,
  `U_password` varchar(25) NOT NULL,
  `U_email` varchar(25) NOT NULL,
  `U_mobile` int(15) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_id`, `U_name`, `U_password`, `U_email`, `U_mobile`, `role_as`) VALUES
(43, 'suhait', 'Suhait123', 'suhait@gmail.com', 713150509, 1),
(59, 'saman', 'Saman123', 'saman@gmail.com', 1235743566, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vbrand`
--

CREATE TABLE `vbrand` (
  `B_id` int(12) NOT NULL,
  `B_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vbrand`
--

INSERT INTO `vbrand` (`B_id`, `B_name`) VALUES
(12, ' Audi'),
(13, ' kamal'),
(14, ' ssssss'),
(15, ' Bmw');

-- --------------------------------------------------------

--
-- Table structure for table `v_details`
--

CREATE TABLE `v_details` (
  `v_id` int(50) NOT NULL,
  `vbrand` int(50) NOT NULL,
  `vname` varchar(50) NOT NULL,
  `v_price` int(25) NOT NULL,
  `v_description` varchar(50) NOT NULL,
  `v_seat_capacity` varchar(25) NOT NULL,
  `v_Fueltype` varchar(25) NOT NULL,
  `v_Transmission` varchar(25) NOT NULL,
  `v_Milage` int(25) NOT NULL,
  `v_luggage` int(25) NOT NULL,
  `v_image` varchar(50) NOT NULL,
  `v_Airconditions` int(25) NOT NULL,
  `v_Seat Belt` int(25) NOT NULL,
  `v_Audio input` int(25) NOT NULL,
  `v_Passenger Air Bags` int(25) NOT NULL,
  `v_AutoDoor` int(25) NOT NULL,
  `v_Climatecontrol` int(25) NOT NULL,
  `v_Car Kit` int(25) NOT NULL,
  `v_Remote control locking` int(25) NOT NULL,
  `vLuggage` int(25) NOT NULL,
  `v_GPS` int(25) NOT NULL,
  `v_Bluetooth` int(25) NOT NULL,
  `v_ABS Break` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_details`
--

INSERT INTO `v_details` (`v_id`, `vbrand`, `vname`, `v_price`, `v_description`, `v_seat_capacity`, `v_Fueltype`, `v_Transmission`, `v_Milage`, `v_luggage`, `v_image`, `v_Airconditions`, `v_Seat Belt`, `v_Audio input`, `v_Passenger Air Bags`, `v_AutoDoor`, `v_Climatecontrol`, `v_Car Kit`, `v_Remote control locking`, `vLuggage`, `v_GPS`, `v_Bluetooth`, `v_ABS Break`) VALUES
(121, 13, 'asd', 25, 'as', 'as', 'Diesel', 'Auto', 25, 0, 'car-1.jpg', 0, 1, 0, 1, 0, 1, 1, 1, 0, 1, 1, 0),
(122, 12, 'ssa', 25, 'ss', 'ss', 'Petrol', 'Auto', 25, 25, 'car-1.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(123, 13, 'bh', 250, 'fg', '2 ad', 'Petrol', 'Auto', 25, 52, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(124, 13, 'dd', 25, 'dd', 'dd', 'Diesel', 'Auto', 25, 25, 'car-1.jpg', 0, 0, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0),
(125, 14, 'geg', 25, 'ge', '25', 'Petrol', 'Auto', 25, 25, 'car-3.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(126, 13, 'b', 2, 'b', '25', 'Diesel', 'Auto', 25, 25, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(127, 12, 'wdwd', 25, 'ww', '25', 'Diesel', 'Manual', 25, 25, 'car-2.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(128, 14, 'fwfe', 25, 'fw', '25', 'Petrol', 'Manual', 25, 0, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(129, 12, 'sdf', 22, 'ds', '25', 'Petrol', 'Auto', 25, 25, 'car-1.jpg', 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0),
(130, 14, 'hg', 25, 'jkk', '25', 'Petrol', 'Auto', 25, 25, 'car-1.jpg', 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0),
(131, 13, 'ss', 25, 'dd', '25', 'Petrol', 'Manual', 25, 25, 'car-1.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0),
(132, 12, 'ds', 25, 'vsd', 'dvv', 'Petrol', 'Manual', 25, 25, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0),
(133, 13, 'dqwd', 25, 'dq', 'dw', 'Diesel', 'Auto', 25, 25, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(134, 14, 'sf', 25, 'ff', '25', 'Petrol', 'Manual', 25, 25, 'car-4.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(135, 14, 'bbb', 22, 'fw', '25', 'Diesel', 'Auto', 25, 25, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1),
(136, 12, 'sd', 25, 'scc', '25', 'Petrol', 'Auto', 25, 25, 'car-2.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(137, 13, 'wae', 25, 'dsc', '25', 'Petrol', 'Auto', 25, 25, 'image_4.jpg', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(138, 12, 'dv', 25, 'cs', '25', 'Petrol', 'Manual', 25, 25, 'car-2.jpg', 0, 1, 0, 0, 0, 1, 1, 0, 0, 1, 1, 0),
(139, 12, 'sdv', 25, 'vzs', '25', 'Petrol', 'Auto', 25, 25, 'car-2.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(140, 13, 'dcas', 25, 'cacs', 'sca', 'Diesel', 'Manual', 25, 25, 'car-2.jpg', 0, 1, 1, 1, 0, 1, 1, 0, 0, 0, 0, 0),
(141, 13, 'df', 25, 'vff', '25', 'Diesel', 'Auto', 25, 25, 'car-2.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(142, 14, 'cfw', 25, 'vcsd', '125', 'Petrol', 'Auto', 25, 25, 'car-1.jpg', 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0),
(143, 13, 'cac', 25, 'cs', '25', 'Petrol', 'Auto', 25, 25, 'car-1.jpg', 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0),
(144, 15, 'sdv', 252, ' ax', '25', 'Petrol', 'Manual', 250, 25, 'car-9.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(145, 13, 'wdw', 25, 'scxs', '25', 'Petrol', 'Manual', 25, 25, 'car-11.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(146, 13, 'dwd', 25, 'dw', '25', 'Diesel', 'Auto', 25, 25, 'car-2.jpg', 1, 1, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0),
(147, 13, 'df', 12, 'asca', '25', 'Diesel', 'Auto', 25, 25, 'image_4.jpg', 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 1, 1),
(148, 13, 'dff', 15, 'csa', '25', 'Diesel', 'Auto', 25, 25, 'image_5.jpg', 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0),
(149, 12, 'df', 250, 'sqw', '25', 'Diesel', 'Auto', 25, 25, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(150, 15, 'Sjhjdw', 22, 'fe', '25', 'Petrol', 'Auto', 25, 25, 'car-2.jpg', 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0),
(151, 12, 'ddw', 25, 'cd', '12', 'Petrol', 'Auto', 25, 25, 'car-4.jpg', 0, 1, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0),
(152, 12, 'suhaita', 25, 'de', '25', 'Diesel', 'Auto', 25, 25, 'image_1.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(153, 12, 'gger', 12, 'hfdh', '25', 'Petrol', 'Auto', 25, 25, 'car-2.jpg', 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0),
(154, 12, 'dcs', 25, 'vdsv', '258', 'Petrol', 'Auto', 25, 25, 'car-2.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(155, 13, 'we', 25, 'fwa', '25', 'Diesel', 'Auto', 25, 25, 'image_5.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(156, 13, 'dd', 22, 'c', 'cx', 'Petrol', 'Auto', 25, 25, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(157, 14, 'wdqw', 25, 'csac', '25', 'Petrol', 'Auto', 25, 25, 'car-3.jpg', 0, 1, 0, 0, 0, 1, 1, 0, 0, 0, 1, 0),
(158, 14, 'cfdcs', 2585, 'sacac', '23', 'Petrol', 'Auto', 25, 25, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(159, 12, 'ss', 23, 'sdvs', '25', 'Diesel', 'Auto', 25, 25, 'car-2.jpg', 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(160, 12, 's', 25, 'c', 'cc', 'Petrol', 'Manual', 25, 25, 'car-5.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(161, 13, 'cxc', 12, 'cc', '33', 'Petrol', 'Auto', 25, 23, 'car-1.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 1, 0),
(162, 14, 'ss', 12, 'ss', '25', 'Petrol', 'Auto', 23, 25, 'car-11.jpg', 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 1, 1),
(163, 12, 'sc', 12, 'zx', '23', 'Petrol', 'Auto', 12, 25, 'car-2.jpg', 0, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 0),
(164, 12, 'ss', 121, 'cs', 'cc', 'Petrol', 'Auto', 25, 25, 'car-5.jpg', 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0),
(165, 14, 'ss', 25, 'cs', '25', 'Diesel', 'Auto', 23, 23, 'car-1.jpg', 0, 1, 1, 1, 0, 1, 1, 0, 0, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`U_id`);

--
-- Indexes for table `vbrand`
--
ALTER TABLE `vbrand`
  ADD PRIMARY KEY (`B_id`);

--
-- Indexes for table `v_details`
--
ALTER TABLE `v_details`
  ADD PRIMARY KEY (`v_id`),
  ADD KEY `vbrand` (`vbrand`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `vbrand`
--
ALTER TABLE `vbrand`
  MODIFY `B_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `v_details`
--
ALTER TABLE `v_details`
  MODIFY `v_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `v_details`
--
ALTER TABLE `v_details`
  ADD CONSTRAINT `v_details_ibfk_1` FOREIGN KEY (`vbrand`) REFERENCES `vbrand` (`B_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
