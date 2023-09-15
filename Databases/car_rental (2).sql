-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 06:23 PM
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
-- Table structure for table `car_booking`
--

CREATE TABLE `car_booking` (
  `B_id` int(25) NOT NULL,
  `v_id` int(25) NOT NULL,
  `u_id` int(25) NOT NULL,
  `Pick_location` varchar(50) NOT NULL,
  `Drop_loaction` varchar(50) NOT NULL,
  `pick_date` varchar(25) NOT NULL,
  `drop_date` varchar(100) NOT NULL,
  `pick_time` varchar(25) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `v_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_booking`
--

INSERT INTO `car_booking` (`B_id`, `v_id`, `u_id`, `Pick_location`, `Drop_loaction`, `pick_date`, `drop_date`, `pick_time`, `order_id`, `v_price`) VALUES
(9, 194, 59, 'kekirawa', 'dambulla', '7/6/2023', '7/9/2023', '12:00am', '64a6470ecfa72', 45000),
(10, 194, 59, 'dambulla', 'kekirawa', '7/1/2023', '7/3/2023', '12:30am', '64a65cd23d555', 45000);

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
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `reset_token` varchar(50) DEFAULT NULL,
  `resettokenexpaire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`U_id`, `U_name`, `U_password`, `U_email`, `U_mobile`, `role_as`, `reset_token`, `resettokenexpaire`) VALUES
(43, 'admin', 'Admin1234', 'suhaitsuhait58@gmail.com', 713150509, 1, '546e8b176025cb882d5b81f449bb4fe7', '2023-07-01'),
(59, 'saman', 'Saman123', 'nm.suhaitsuhait@gmail.com', 1235743566, 0, NULL, NULL);

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
(12, 'Audi'),
(13, 'BMW'),
(47, ' Benz'),
(48, ' Toyota');

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
  `v_Seat_Belt` int(25) NOT NULL,
  `v_Audio_input` int(25) NOT NULL,
  `v_Passenger_Air_Bags` int(25) NOT NULL,
  `v_AutoDoor` int(25) NOT NULL,
  `v_Climatecontrol` int(25) NOT NULL,
  `v_Car_Kit` int(25) NOT NULL,
  `v_Remote_controllocking` int(25) NOT NULL,
  `vLuggage` int(25) NOT NULL,
  `v_GPS` int(25) NOT NULL,
  `v_Bluetooth` int(25) NOT NULL,
  `v_ABS_Break` int(25) NOT NULL,
  `v_Feeature` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `v_details`
--

INSERT INTO `v_details` (`v_id`, `vbrand`, `vname`, `v_price`, `v_description`, `v_seat_capacity`, `v_Fueltype`, `v_Transmission`, `v_Milage`, `v_luggage`, `v_image`, `v_Airconditions`, `v_Seat_Belt`, `v_Audio_input`, `v_Passenger_Air_Bags`, `v_AutoDoor`, `v_Climatecontrol`, `v_Car_Kit`, `v_Remote_controllocking`, `vLuggage`, `v_GPS`, `v_Bluetooth`, `v_ABS_Break`, `v_Feeature`) VALUES
(194, 12, 'MercedesGrandSedan', 45000, 'gdfdf', '5 Ault', 'Petrol', 'Auto', 65, 5, 'Upload/car-5.jpg', 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 0, 1),
(196, 12, 'willow trees', 250, 'gh', '3', 'Petrol', 'Auto', 65, 5, 'upload/car-3.jpg', 1, 0, 1, 0, 1, 0, 1, 0, 1, 1, 1, 0, 0),
(197, 13, 'Merce', 45000, 'hwhefiwufhw', '6', 'Diesel', 'Manual', 65, 5, 'upload/car-1.jpg', 1, 1, 0, 0, 1, 1, 0, 0, 1, 1, 1, 0, 0),
(198, 12, 'Mer', 25000, 'dfwfw', '5', 'Petrol', 'Auto', 65, 5, 'Upload/car-9.jpg', 1, 0, 0, 1, 1, 0, 0, 1, 1, 0, 0, 0, 0),
(202, 12, 'MercedesGrandSedan', 55000, 'best condition', '5', 'Diesel', 'Auto', 43, 5, 'upload/car-2.jpg', 1, 1, 0, 0, 1, 0, 0, 1, 0, 1, 0, 1, 0),
(204, 12, 'MercedesGrandSedan AG', 25000, 'Mercedes Benz Grou It develops, manufactures and d', '4 Adult', 'Diesel', 'Auto', 25, 5, 'upload/car-12.jpg', 0, 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 1),
(205, 48, 'Toyota corolla nkr 165', 45000, 'ModelDAA NKE165\r\nDimension 4400 16951460mm\r\nBody T', '5 adult', 'Petrol', 'Auto', 30, 5, 'Upload/10101065_201504a.jpg', 1, 1, 1, 0, 1, 1, 1, 0, 1, 1, 1, 0, 0),
(206, 48, 'Toyota Aqua GR Sport', 35000, ' Toyota Aqua GR Sport Revealed With Sporty Visual ', '4 Adult', 'Petrol', 'Auto', 23, 2, 'upload/2023-toyota-aqua-gr-sport.jpg', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_booking`
--
ALTER TABLE `car_booking`
  ADD PRIMARY KEY (`B_id`),
  ADD KEY `car_bookin_ibfk_1` (`v_id`),
  ADD KEY `u_id` (`u_id`);

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
-- AUTO_INCREMENT for table `car_booking`
--
ALTER TABLE `car_booking`
  MODIFY `B_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `U_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `vbrand`
--
ALTER TABLE `vbrand`
  MODIFY `B_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `v_details`
--
ALTER TABLE `v_details`
  MODIFY `v_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car_booking`
--
ALTER TABLE `car_booking`
  ADD CONSTRAINT `car_booking_ibfk_1` FOREIGN KEY (`v_id`) REFERENCES `v_details` (`v_id`),
  ADD CONSTRAINT `car_booking_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`U_id`);

--
-- Constraints for table `v_details`
--
ALTER TABLE `v_details`
  ADD CONSTRAINT `v_details_ibfk_1` FOREIGN KEY (`vbrand`) REFERENCES `vbrand` (`B_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
