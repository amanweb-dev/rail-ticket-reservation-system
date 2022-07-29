-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 04:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_email`, `admin_pass`) VALUES
('admin', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `booked_seat`
--

CREATE TABLE `booked_seat` (
  `booking_id` int(11) NOT NULL,
  `rd_id` int(11) NOT NULL,
  `coach_name` varchar(255) NOT NULL,
  `total_seat_no` varchar(255) NOT NULL,
  `psngr_name` varchar(255) NOT NULL,
  `psngr_email` varchar(255) DEFAULT NULL,
  `psngr_gender` varchar(255) DEFAULT NULL,
  `psngr_address` varchar(255) DEFAULT NULL,
  `psngr_pay_method` varchar(255) NOT NULL,
  `psngr_mobile` varchar(255) NOT NULL,
  `psngr_age` varchar(255) NOT NULL,
  `psngr_nid` varchar(255) DEFAULT NULL,
  `psngr_nationality` varchar(255) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `journey_date` varchar(255) NOT NULL,
  `total_fare` varchar(255) NOT NULL,
  `psngr_payment_number` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_info`
--

CREATE TABLE `passenger_info` (
  `psngr_id` int(11) NOT NULL,
  `psngr_name` varchar(255) NOT NULL,
  `psngr_email` varchar(255) NOT NULL,
  `psngr_gender` varchar(255) NOT NULL,
  `psngr_address` varchar(255) NOT NULL,
  `psngr_mobile` varchar(255) NOT NULL,
  `psngr_age` varchar(255) NOT NULL,
  `psngr_nid` varchar(255) NOT NULL,
  `psngr_nationality` varchar(255) NOT NULL,
  `psngr_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `route_details`
--

CREATE TABLE `route_details` (
  `rd_id` int(11) NOT NULL,
  `rd_boarding_point` varchar(255) NOT NULL,
  `rd_dropping_point` varchar(255) NOT NULL,
  `rd_start_timing` varchar(255) NOT NULL,
  `rd_end_timing` varchar(255) NOT NULL,
  `rd_fare_per_km` varchar(255) NOT NULL,
  `rd_distance` varchar(255) NOT NULL,
  `rd_total_fare` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route_details`
--

INSERT INTO `route_details` (`rd_id`, `rd_boarding_point`, `rd_dropping_point`, `rd_start_timing`, `rd_end_timing`, `rd_fare_per_km`, `rd_distance`, `rd_total_fare`) VALUES
(1, 'Uttara North', 'Uttara Center', '05.00-AM', '05.04-AM', '2.4', '3.5', '8.4'),
(2, 'Uttara North', 'Uttara South', '05.00-AM', '05.08-AM', '2.4', '6', '14.4'),
(3, 'Uttara North', 'Pallabi', '05.00-AM', '05.12-AM', '2.4', '20', '48'),
(4, 'Uttara North', 'Mirpur 11', '05.00-AM', '05.16-AM', '2.4', '21.8', '52.32'),
(5, 'Uttara North', 'Mirpur 10', '05.00-AM', '05.20-AM', '2.4', '22.9', '54.96'),
(6, 'Uttara North', 'Kazipara', '05.00-AM', '05.24-AM', '2.4', '25', '60'),
(7, 'Uttara North', 'Shewrapara', '05.00-AM', '05.28-AM', '2.4', '26.4', '63.36'),
(8, 'Uttara North', 'Agargaow', '05.00-AM', '05.32-AM', '2.4', '29', '69.6'),
(9, 'Uttara North', 'Bijoy Sarani', '05.00-AM', '05.36-AM', '2.4', '32.6', '78.24'),
(10, 'Uttara North', 'Framgate', '05.00-AM', '05.40-AM', '2.4', '34.3', '82.32'),
(11, 'Uttara North', 'KawranBazar', '05.00-AM', '05.44-AM', '2.4', '36.6', '87.84'),
(12, 'Uttara North', 'Shahbagh', '05.00-AM', '05.48-AM', '2.4', '39.1', '93.84'),
(13, 'Uttara North', 'Dhaka University', '05.00-AM', '05.52-AM', '2.4', '40.2', '96.48'),
(14, 'Uttara North', 'Bangladesh Secretariat', '05.00-AM', '05.56-AM', '2.4', '42.6', '102.24'),
(15, 'Uttara North', 'Motijheel', '05.00-AM', '06.00-AM', '2.4', '44', '105.6'),
(16, 'Uttara Center', 'Uttara South', '05.04-AM', '05.08-AM', '2.4', '2.5', '6'),
(17, 'Uttara Center', 'Pallabi', '05.04-AM', '05.12-AM', '2.4', '16.5', '39.6'),
(18, 'Uttara Center', 'Mirpur 11', '05.04-AM', '05.16-AM', '2.4', '18.3', '43.92'),
(19, 'Uttara Center', 'Mirpur 10', '05.04-AM', '05.20-AM', '2.4', '19.4', '46.56'),
(20, 'Uttara Center', 'Kazipara', '05.04-AM', '05.24-AM', '2.4', '21.5', '51.6'),
(21, 'Uttara Center', 'Shewrapara', '05.04-AM', '05.28-AM', '2.4', '22.9', '54.96'),
(22, 'Uttara Center', 'Agargaow', '05.04-AM', '05.32-AM', '2.4', '25.5', '61.2'),
(23, 'Uttara Center', 'Bijoy Sarani', '05.04-AM', '05.36-AM', '2.4', '29.1', '69.84'),
(24, 'Uttara Center', 'Framgate', '05.04-AM', '05.40-AM', '2.4', '30.8', '73.92'),
(25, 'Uttara Center', 'KawranBazar', '05.04-AM', '05.44-AM', '2.4', '33.1', '79.44'),
(26, 'Uttara Center', 'Shahbagh', '05.04-AM', '05.48-AM', '2.4', '35.6', '85.44'),
(27, 'Uttara Center', 'Dhaka University', '05.04-AM', '05.52-AM', '2.4', '36.7', '88.08'),
(28, 'Uttara Center', 'Bangladesh Secretariat', '05.04-AM', '05.56-AM', '2.4', '39.1', '93.84'),
(29, 'Uttara Center', 'Motijheel', '05.04-AM', '06.00-AM', '2.4', '40.5', '97.2'),
(30, 'Uttara South', 'Pallabi', '05.08-AM', '05.12-AM', '2.4', '14', '33.6'),
(31, 'Uttara South', 'Mirpur 11', '05.08-AM', '05.16-AM', '2.4', '15.8', '37.92'),
(32, 'Uttara South', 'Mirpur 10', '05.08-AM', '05.20-AM', '2.4', '16.9', '40.56'),
(33, 'Uttara South', 'Kazipara', '05.08-AM', '05.24-AM', '2.4', '19', '45.6'),
(34, 'Uttara South', 'Shewrapara', '05.08-AM', '05.28-AM', '2.4', '20.4', '48.96'),
(35, 'Uttara South', 'Agargaow', '05.08-AM', '05.32-AM', '2.4', '23', '55.2'),
(36, 'Uttara South', 'Bijoy Sarani', '05.08-AM', '05.36-AM', '2.4', '26.6', '63.84'),
(37, 'Uttara South', 'Framgate', '05.08-AM', '05.40-AM', '2.4', '28.3', '67.92'),
(38, 'Uttara South', 'KawranBazar', '05.08-AM', '05.44-AM', '2.4', '30.6', '73.44'),
(39, 'Uttara South', 'Shahbagh', '05.08-AM', '05.48-AM', '2.4', '33.1', '79.44'),
(40, 'Uttara South', 'Dhaka University', '05.08-AM', '05.52-AM', '2.4', '34.2', '82.08'),
(41, 'Uttara South', 'Bangladesh Secretariat', '05.08-AM', '05.56-AM', '2.4', '36.6', '87.84'),
(42, 'Uttara South', 'Motijheel', '05.08-AM', '06.00-AM', '2.4', '38', '91.2'),
(43, 'Pallabi', 'Mirpur 11', '05.12-AM', '05.16-AM', '2.4', '1.8', '4.32'),
(44, 'Pallabi', 'Mirpur 10', '05.12-AM', '05.20-AM', '2.4', '2.9', '6.96'),
(45, 'Pallabi', 'Kazipara', '05.12-AM', '05.24-AM', '2.4', '5', '12'),
(46, 'Pallabi', 'Shewrapara', '05.12-AM', '05.28-AM', '2.4', '6.4', '15.36'),
(47, 'Pallabi', 'Agargaow', '05.12-AM', '05.32-AM', '2.4', '9', '21.6'),
(48, 'Pallabi', 'Bijoy Sarani', '05.12-AM', '05.36-AM', '2.4', '12.6', '30.24'),
(49, 'Pallabi', 'Framgate', '05.12-AM', '05.40-AM', '2.4', '14.3', '34.32'),
(50, 'Pallabi', 'KawranBazar', '05.12-AM', '05.44-AM', '2.4', '16.6', '39.84'),
(51, 'Pallabi', 'Shahbagh', '05.12-AM', '05.48-AM', '2.4', '19.1', '45.84'),
(52, 'Pallabi', 'Dhaka University', '05.12-AM', '05.52-AM', '2.4', '20.2', '48.48'),
(53, 'Pallabi', 'Bangladesh Secretariat', '05.12-AM', '05.56-AM', '2.4', '22.6', '54.24'),
(54, 'Pallabi', 'Motijheel', '05.12-AM', '06.00-AM', '2.4', '24', '57.6'),
(55, 'Mirpur 11', 'Mirpur 10', '05.16-AM', '05.20-AM', '2.4', '1.1', '2.64'),
(56, 'Mirpur 11', 'Kazipara', '05.16-AM', '05.24-AM', '2.4', '3.2', '7.68'),
(57, 'Mirpur 11', 'Shewrapara', '05.16-AM', '05.28-AM', '2.4', '4.6', '11.04'),
(58, 'Mirpur 11', 'Agargaow', '05.16-AM', '05.32-AM', '2.4', '7.2', '17.28'),
(59, 'Mirpur 11', 'Bijoy Sarani', '05.16-AM', '05.36-AM', '2.4', '10.8', '25.92'),
(60, 'Mirpur 11', 'Framgate', '05.16-AM', '05.40-AM', '2.4', '12.5', '30'),
(61, 'Mirpur 11', 'KawranBazar', '05.16-AM', '05.44-AM', '2.4', '14.8', '35.52'),
(62, 'Mirpur 11', 'Shahbagh', '05.16-AM', '05.48-AM', '2.4', '17.3', '41.52'),
(63, 'Mirpur 11', 'Dhaka University', '05.16-AM', '05.52-AM', '2.4', '18.4', '44.16'),
(64, 'Mirpur 11', 'Bangladesh Secretariat', '05.16-AM', '05.56-AM', '2.4', '20.8', '49.92'),
(65, 'Mirpur 11', 'Motijheel', '05.16-AM', '06.00-AM', '2.4', '22.2', '53.28'),
(66, 'Mirpur 10', 'Kazipara', '05.20-AM', '05.24-AM', '2.4', '2.1', '5.04'),
(67, 'Mirpur 10', 'Shewrapara', '05.20-AM', '05.28-AM', '2.4', '3.5', '8.4'),
(68, 'Mirpur 10', 'Agargaow', '05.20-AM', '05.32-AM', '2.4', '6.1', '14.64'),
(69, 'Mirpur 10', 'Bijoy Sarani', '05.20-AM', '05.36-AM', '2.4', '9.7', '23.28'),
(70, 'Mirpur 10', 'Framgate', '05.20-AM', '05.40-AM', '2.4', '11.4', '27.36'),
(71, 'Mirpur 10', 'KawranBazar', '05.20-AM', '05.44-AM', '2.4', '13.7', '32.88'),
(72, 'Mirpur 10', 'Shahbagh', '05.20-AM', '05.48-AM', '2.4', '16.2', '38.88'),
(73, 'Mirpur 10', 'Dhaka University', '05.20-AM', '05.52-AM', '2.4', '17.3', '41.52'),
(74, 'Mirpur 10', 'Bangladesh Secretariat', '05.20-AM', '05.56-AM', '2.4', '19.7', '47.28'),
(75, 'Mirpur 10', 'Motijheel', '05.20-AM', '06.00-AM', '2.4', '21.1', '50.64'),
(76, 'Kazipara', 'Shewrapara', '05.24-AM', '05.28-AM', '2.4', '1.4', '3.36'),
(77, 'Kazipara', 'Agargaow', '05.24-AM', '05.32-AM', '2.4', '4', '9.6'),
(78, 'Kazipara', 'Bijoy Sarani', '05.24-AM', '05.36-AM', '2.4', '7.6', '18.24'),
(79, 'Kazipara', 'Framgate', '05.24-AM', '05.40-AM', '2.4', '9.3', '22.32'),
(80, 'Kazipara', 'KawranBazar', '05.24-AM', '05.44-AM', '2.4', '11.6', '27.84'),
(81, 'Kazipara', 'Shahbagh', '05.24-AM', '05.48-AM', '2.4', '14.1', '33.84'),
(82, 'Kazipara', 'Dhaka University', '05.24-AM', '05.52-AM', '2.4', '15.2', '36.48'),
(83, 'Kazipara', 'Bangladesh Secretariat', '05.24-AM', '05.56-AM', '2.4', '17.6', '42.24'),
(84, 'Kazipara', 'Motijheel', '05.24-AM', '06.00-AM', '2.4', '19', '45.6'),
(85, 'Shewrapara', 'Agargaow', '05.28-AM', '05.32-AM', '2.4', '2.6', '6.24'),
(86, 'Shewrapara', 'Bijoy Sarani', '05.28-AM', '05.36-AM', '2.4', '6.2', '14.88'),
(87, 'Shewrapara', 'Framgate', '05.28-AM', '05.40-AM', '2.4', '7.9', '18.96'),
(88, 'Shewrapara', 'KawranBazar', '05.28-AM', '05.44-AM', '2.4', '10.2', '24.48'),
(89, 'Shewrapara', 'Shahbagh', '05.28-AM', '05.48-AM', '2.4', '12.7', '30.48'),
(90, 'Shewrapara', 'Dhaka University', '05.28-AM', '05.52-AM', '2.4', '13.8', '33.12'),
(91, 'Shewrapara', 'Bangladesh Secretariat', '05.28-AM', '05.56-AM', '2.4', '16.2', '38.88'),
(92, 'Shewrapara', 'Motijheel', '05.28-AM', '06.00-AM', '2.4', '17.6', '42.24'),
(93, 'Agargaow', 'Bijoy Sarani', '05.32-AM', '05.36-AM', '2.4', '3.6', '8.64'),
(94, 'Agargaow', 'Framgate', '05.32-AM', '05.40-AM', '2.4', '5.3', '12.72'),
(95, 'Agargaow', 'KawranBazar', '05.32-AM', '05.44-AM', '2.4', '7.6', '18.24'),
(96, 'Agargaow', 'Shahbagh', '05.32-AM', '05.48-AM', '2.4', '10.1', '24.24'),
(97, 'Agargaow', 'Dhaka University', '05.32-AM', '05.52-AM', '2.4', '11.2', '26.88'),
(98, 'Agargaow', 'Bangladesh Secretariat', '05.32-AM', '05.56-AM', '2.4', '13.6', '32.64'),
(99, 'Agargaow', 'Motijheel', '05.32-AM', '06.00-AM', '2.4', '15', '36'),
(100, 'Bijoy Sarani', 'Framgate', '05.36-AM', '05.40-AM', '2.4', '1.7', '4.08'),
(101, 'Bijoy Sarani', 'KawranBazar', '05.36-AM', '05.44-AM', '2.4', '4', '9.6'),
(102, 'Bijoy Sarani', 'Shahbagh', '05.36-AM', '05.48-AM', '2.4', '6.5', '15.6'),
(103, 'Bijoy Sarani', 'Dhaka University', '05.36-AM', '05.52-AM', '2.4', '7.6', '18.24'),
(104, 'Bijoy Sarani', 'Bangladesh Secretariat', '05.36-AM', '05.56-AM', '2.4', '10', '24'),
(105, 'Bijoy Sarani', 'Motijheel', '05.36-AM', '06.00-AM', '2.4', '11.4', '27.36'),
(106, 'Framgate', 'KawranBazar', '05.40-AM', '05.44-AM', '2.4', '2.3', '5.52'),
(107, 'Framgate', 'Shahbagh', '05.40-AM', '05.48-AM', '2.4', '4.8', '11.52'),
(108, 'Framgate', 'Dhaka University', '05.40-AM', '05.52-AM', '2.4', '5.9', '14.16'),
(109, 'Framgate', 'Bangladesh Secretariat', '05.40-AM', '05.56-AM', '2.4', '8.3', '19.92'),
(110, 'Framgate', 'Motijheel', '05.40-AM', '06.00-AM', '2.4', '9.4', '22.56'),
(111, 'KawranBazar', 'Shahbagh', '05.44-AM', '05.48-AM', '2.4', '2.5', '6'),
(112, 'KawranBazar', 'Dhaka University', '05.44-AM', '05.52-AM', '2.4', '3.6', '8.64'),
(113, 'KawranBazar', 'Bangladesh Secretariat', '05.44-AM', '05.56-AM', '2.4', '6', '14.4'),
(114, 'KawranBazar', 'Motijheel', '05.44-AM', '06.00-AM', '2.4', '7.4', '17.76'),
(115, 'Shahbagh', 'Dhaka University', '05.48-AM', '05.52-AM', '2.4', '1.1', '2.64'),
(116, 'Shahbagh', 'Bangladesh Secretariat', '05.48-AM', '05.56-AM', '2.4', '3.5', '8.4'),
(117, 'Shahbagh', 'Motijheel', '05.48-AM', '06.00-AM', '2.4', '4.9', '11.76'),
(118, 'Dhaka University', 'Bangladesh Secretariat', '05.52-AM', '05.56-AM', '2.4', '2.4', '5.76'),
(119, 'Dhaka University', 'Motijheel', '05.52-AM', '06.00-AM', '2.4', '3.8', '9.12'),
(120, 'Bangladesh Secretariat', 'Motijheel', '05.56-AM', '06.00-AM', '2.4', '1.4', '3.36'),
(121, 'Motijheel', 'Bangladesh Secretariat', '06.00-AM', '06.04-AM', '2.4', '1.4', '3.36'),
(122, 'Motijheel', 'Dhaka University', '06.00-AM', '06.08-AM', '2.4', '3.8', '9.12'),
(123, 'Motijheel', 'Shahbagh', '06.00-AM', '06.12-AM', '2.4', '4.9', '11.76'),
(124, 'Motijheel', 'KawranBazar', '06.00-AM', '06.16-AM', '2.4', '7.4', '17.76'),
(125, 'Motijheel', 'Framgate', '06.00-AM', '06.20-AM', '2.4', '9.7', '23.28'),
(126, 'Motijheel', 'Bijoy Sarani', '06.00-AM', '06.24-AM', '2.4', '11.4', '27.36'),
(127, 'Motijheel', 'Agargaow', '06.00-AM', '06.28-AM', '2.4', '15', '36'),
(128, 'Motijheel', 'Shewrapara', '06.00-AM', '06.32-AM', '2.4', '17.6', '42.24'),
(129, 'Motijheel', 'Kazipara', '06.00-AM', '06.36-AM', '2.4', '19', '45.6'),
(130, 'Motijheel', 'Mirpur 10', '06.00-AM', '06.40-AM', '2.4', '21.1', '50.64'),
(131, 'Motijheel', 'Mirpur 11', '06.00-AM', '06.44-AM', '2.4', '22.2', '53.28'),
(132, 'Motijheel', 'Pallabi', '06.00-AM', '06.48-AM', '2.4', '24', '57.6'),
(133, 'Motijheel', 'Uttara South', '06.00-AM', '06.52-AM', '2.4', '38', '91.2'),
(134, 'Motijheel', 'Uttara Center', '06.00-AM', '06.56-AM', '2.4', '40.5', '97.2'),
(135, 'Motijheel', 'Uttara North', '06.00-AM', '07.00-AM', '2.4', '44', '105.6'),
(136, 'Bangladesh Secretariat', 'Dhaka University', '06.04-AM', '06.08-AM', '2.4', '2.4', '5.76'),
(137, 'Bangladesh Secretariat', 'Shahbagh', '06.04-AM', '06.12-AM', '2.4', '3.5', '8.4'),
(138, 'Bangladesh Secretariat', 'KawranBazar', '06.04-AM', '06.16-AM', '2.4', '6', '14.4'),
(139, 'Bangladesh Secretariat', 'Framgate', '06.04-AM', '06.20-AM', '2.4', '8.3', '19.92'),
(140, 'Bangladesh Secretariat', 'Bijoy Sarani', '06.04-AM', '06.24-AM', '2.4', '10', '24'),
(141, 'Bangladesh Secretariat', 'Agargaow', '06.04-AM', '06.28-AM', '2.4', '13.6', '32.64'),
(142, 'Bangladesh Secretariat', 'Shewrapara', '06.04-AM', '06.32-AM', '2.4', '16.2', '38.88'),
(143, 'Bangladesh Secretariat', 'Kazipara', '06.04-AM', '06.36-AM', '2.4', '17.6', '42.24'),
(144, 'Bangladesh Secretariat', 'Mirpur 10', '06.04-AM', '06.40-AM', '2.4', '19.7', '47.28'),
(145, 'Bangladesh Secretariat', 'Mirpur 11', '06.04-AM', '06.44-AM', '2.4', '20.8', '49.92'),
(146, 'Bangladesh Secretariat', 'Pallabi', '06.04-AM', '06.48-AM', '2.4', '22.6', '54.24'),
(147, 'Bangladesh Secretariat', 'Uttara South', '06.04-AM', '06.52-AM', '2.4', '36.6', '87.84'),
(148, 'Bangladesh Secretariat', 'Uttara Center', '06.04-AM', '06.56-AM', '2.4', '39.1', '93.84'),
(149, 'Bangladesh Secretariat', 'Uttara North', '06.04-AM', '07.00-AM', '2.4', '42.6', '102.24'),
(150, 'Dhaka University', 'Shahbagh', '06.08-AM', '06.12-AM', '2.4', '1.1', '2.64'),
(151, 'Dhaka University', 'KawranBazar', '06.08-AM', '06.16-AM', '2.4', '3.6', '8.64'),
(152, 'Dhaka University', 'Framgate', '06.08-AM', '06.20-AM', '2.4', '5.9', '14.16'),
(153, 'Dhaka University', 'Bijoy Sarani', '06.08-AM', '06.24-AM', '2.4', '7.6', '18.24'),
(154, 'Dhaka University', 'Agargaow', '06.08-AM', '06.28-AM', '2.4', '11.2', '26.88'),
(155, 'Dhaka University', 'Shewrapara', '06.08-AM', '06.32-AM', '2.4', '13.8', '33.12'),
(156, 'Dhaka University', 'Kazipara', '06.08-AM', '06.36-AM', '2.4', '15.2', '36.48'),
(157, 'Dhaka University', 'Mirpur 10', '06.08-AM', '06.40-AM', '2.4', '17.3', '41.52'),
(158, 'Dhaka University', 'Mirpur 11', '06.08-AM', '06.44-AM', '2.4', '18.4', '44.16'),
(159, 'Dhaka University', 'Pallabi', '06.08-AM', '06.48-AM', '2.4', '20.2', '48.48'),
(160, 'Dhaka University', 'Uttara South', '06.08-AM', '06.52-AM', '2.4', '34.2', '82.08'),
(161, 'Dhaka University', 'Uttara Center', '06.08-AM', '06.56-AM', '2.4', '36.7', '88.08'),
(162, 'Dhaka University', 'Uttara North', '06.08-AM', '07.00-AM', '2.4', '40.2', '96.48'),
(163, 'Shahbagh', 'KawranBazar', '06.12-AM', '06.16-AM', '2.4', '2.5', '6'),
(164, 'Shahbagh', 'Framgate', '06.12-AM', '06.20-AM', '2.4', '4.8', '11.52'),
(165, 'Shahbagh', 'Bijoy Sarani', '06.12-AM', '06.24-AM', '2.4', '6.5', '15.6'),
(166, 'Shahbagh', 'Agargaow', '06.12-AM', '06.28-AM', '2.4', '10.1', '24.24'),
(167, 'Shahbagh', 'Shewrapara', '06.12-AM', '06.32-AM', '2.4', '12.7', '30.48'),
(168, 'Shahbagh', 'Kazipara', '06.12-AM', '06.36-AM', '2.4', '14.1', '33.84'),
(169, 'Shahbagh', 'Mirpur 10', '06.12-AM', '06.40-AM', '2.4', '16.2', '38.88'),
(170, 'Shahbagh', 'Mirpur 11', '06.12-AM', '06.44-AM', '2.4', '17.3', '41.52'),
(171, 'Shahbagh', 'Pallabi', '06.12-AM', '06.48-AM', '2.4', '19.1', '45.84'),
(172, 'Shahbagh', 'Uttara South', '06.12-AM', '06.52-AM', '2.4', '33.1', '79.44'),
(173, 'Shahbagh', 'Uttara Center', '06.12-AM', '06.56-AM', '2.4', '35.6', '85.44'),
(174, 'Shahbagh', 'Uttara North', '06.12-AM', '07.00-AM', '2.4', '39.1', '93.84'),
(175, 'KawranBazar', 'Framgate', '06.16-AM', '06.20-AM', '2.4', '2.3', '5.52'),
(176, 'KawranBazar', 'Bijoy Sarani', '06.16-AM', '06.24-AM', '2.4', '4', '9.6'),
(177, 'KawranBazar', 'Agargaow', '06.16-AM', '06.28-AM', '2.4', '7.6', '18.24'),
(178, 'KawranBazar', 'Shewrapara', '06.16-AM', '06.32-AM', '2.4', '10.2', '24.48'),
(179, 'KawranBazar', 'Kazipara', '06.16-AM', '06.36-AM', '2.4', '11.6', '27.84'),
(180, 'KawranBazar', 'Mirpur 10', '06.16-AM', '06.40-AM', '2.4', '13.7', '32.88'),
(181, 'KawranBazar', 'Mirpur 11', '06.16-AM', '06.44-AM', '2.4', '14.8', '35.52'),
(182, 'KawranBazar', 'Pallabi', '06.16-AM', '06.48-AM', '2.4', '16.6', '39.84'),
(183, 'KawranBazar', 'Uttara South', '06.16-AM', '06.52-AM', '2.4', '30.6', '73.44'),
(184, 'KawranBazar', 'Uttara Center', '06.16-AM', '06.56-AM', '2.4', '33.1', '79.44'),
(185, 'KawranBazar', 'Uttara North', '06.16-AM', '07.00-AM', '2.4', '36.6', '87.84'),
(186, 'Framgate', 'Bijoy Sarani', '06.20-AM', '06.24-AM', '2.4', '1.7', '4.08'),
(187, 'Framgate', 'Agargaow', '06.20-AM', '06.28-AM', '2.4', '5.3', '12.72'),
(188, 'Framgate', 'Shewrapara', '06.20-AM', '06.32-AM', '2.4', '7.9', '18.96'),
(189, 'Framgate', 'Kazipara', '06.20-AM', '06.36-AM', '2.4', '9.3', '22.32'),
(190, 'Framgate', 'Mirpur 10', '06.20-AM', '06.40-AM', '2.4', '11.4', '27.36'),
(191, 'Framgate', 'Mirpur 11', '06.20-AM', '06.44-AM', '2.4', '12.5', '30'),
(192, 'Framgate', 'Pallabi', '06.20-AM', '06.48-AM', '2.4', '14.3', '34.32'),
(193, 'Framgate', 'Uttara South', '06.20-AM', '06.52-AM', '2.4', '28.3', '67.92'),
(194, 'Framgate', 'Uttara Center', '06.20-AM', '06.56-AM', '2.4', '30.8', '73.92'),
(195, 'Framgate', 'Uttara North', '06.20-AM', '07.00-AM', '2.4', '34.3', '82.32'),
(196, 'Bijoy Sarani', 'Agargaow', '06.24-AM', '06.28-AM', '2.4', '3.6', '8.64'),
(197, 'Bijoy Sarani', 'Shewrapara', '06.24-AM', '06.32-AM', '2.4', '6.2', '14.88'),
(198, 'Bijoy Sarani', 'Kazipara', '06.24-AM', '06.36-AM', '2.4', '7.6', '18.24'),
(199, 'Bijoy Sarani', 'Mirpur 10', '06.24-AM', '06.40-AM', '2.4', '9.7', '23.28'),
(200, 'Bijoy Sarani', 'Mirpur 11', '06.24-AM', '06.44-AM', '2.4', '10.8', '25.92'),
(201, 'Bijoy Sarani', 'Pallabi', '06.24-AM', '06.48-AM', '2.4', '12.6', '30.24'),
(202, 'Bijoy Sarani', 'Uttara South', '06.24-AM', '06.52-AM', '2.4', '26.6', '63.84'),
(203, 'Bijoy Sarani', 'Uttara Center', '06.24-AM', '06.56-AM', '2.4', '29.1', '69.84'),
(204, 'Bijoy Sarani', 'Uttara North', '06.24-AM', '07.00-AM', '2.4', '32.6', '78.24'),
(205, 'Agargaow', 'Shewrapara', '06.28-AM', '06.32-AM', '2.4', '2.6', '6.24'),
(206, 'Agargaow', 'Kazipara', '06.28-AM', '06.36-AM', '2.4', '4', '9.6'),
(207, 'Agargaow', 'Mirpur 10', '06.28-AM', '06.40-AM', '2.4', '6.1', '14.64'),
(208, 'Agargaow', 'Mirpur 11', '06.28-AM', '06.44-AM', '2.4', '7.2', '17.28'),
(209, 'Agargaow', 'Pallabi', '06.28-AM', '06.48-AM', '2.4', '9', '21.6'),
(210, 'Agargaow', 'Uttara South', '06.28-AM', '06.52-AM', '2.4', '23', '55.2'),
(211, 'Agargaow', 'Uttara Center', '06.28-AM', '06.56-AM', '2.4', '25.5', '61.2'),
(212, 'Agargaow', 'Uttara North', '06.28-AM', '07.00-AM', '2.4', '29', '69.6'),
(213, 'Shewrapara', 'Kazipara', '06.32-AM', '06.36-AM', '2.4', '1.4', '3.36'),
(214, 'Shewrapara', 'Mirpur 10', '06.32-AM', '06.40-AM', '2.4', '3.5', '8.4'),
(215, 'Shewrapara', 'Mirpur 11', '06.32-AM', '06.44-AM', '2.4', '4.6', '11.04'),
(216, 'Shewrapara', 'Pallabi', '06.32-AM', '06.48-AM', '2.4', '6.4', '15.36'),
(217, 'Shewrapara', 'Uttara South', '06.32-AM', '06.52-AM', '2.4', '20.4', '48.96'),
(218, 'Shewrapara', 'Uttara Center', '06.32-AM', '06.56-AM', '2.4', '22.9', '54.96'),
(219, 'Shewrapara', 'Uttara North', '06.32-AM', '07.00-AM', '2.4', '26.4', '63.36'),
(220, 'Kazipara', 'Mirpur 10', '06.36-AM', '06.40-AM', '2.4', '2.1', '5.04'),
(221, 'Kazipara', 'Mirpur 11', '06.36-AM', '06.44-AM', '2.4', '3.2', '7.68'),
(222, 'Kazipara', 'Pallabi', '06.36-AM', '06.48-AM', '2.4', '5', '12'),
(223, 'Kazipara', 'Uttara South', '06.36-AM', '06.52-AM', '2.4', '19', '45.6'),
(224, 'Kazipara', 'Uttara Center', '06.36-AM', '06.56-AM', '2.4', '21.5', '51.6'),
(225, 'Kazipara', 'Uttara North', '06.36-AM', '07.00-AM', '2.4', '25', '60'),
(226, 'Mirpur 10', 'Mirpur 11', '06.40-AM', '06.44-AM', '2.4', '1.1', '2.64'),
(227, 'Mirpur 10', 'Pallabi', '06.40-AM', '06.48-AM', '2.4', '2.9', '6.96'),
(228, 'Mirpur 10', 'Uttara South', '06.40-AM', '06.52-AM', '2.4', '16.9', '40.56'),
(229, 'Mirpur 10', 'Uttara Center', '06.40-AM', '06.56-AM', '2.4', '19.4', '46.56'),
(230, 'Mirpur 10', 'Uttara North', '06.40-AM', '07.00-AM', '2.4', '22.9', '54.96'),
(231, 'Mirpur 11', 'Pallabi', '06.44-AM', '06.48-AM', '2.4', '1.8', '4.32'),
(232, 'Mirpur 11', 'Uttara South', '06.44-AM', '06.52-AM', '2.4', '15.8', '37.92'),
(233, 'Mirpur 11', 'Uttara Center', '06.44-AM', '06.56-AM', '2.4', '18.3', '43.92'),
(234, 'Mirpur 11', 'Uttara North', '06.44-AM', '07.00-AM', '2.4', '21.8', '52.32'),
(235, 'Pallabi', 'Uttara South', '06.48-AM', '06.52-AM', '2.4', '14', '33.6'),
(236, 'Pallabi', 'Uttara Center', '06.48-AM', '06.56-AM', '2.4', '16.5', '39.6'),
(237, 'Pallabi', 'Uttara North', '06.48-AM', '07.00-AM', '2.4', '20', '48'),
(238, 'Uttara South', 'Uttara Center', '06.52-AM', '06.56-AM', '2.4', '2.5', '6'),
(239, 'Uttara South', 'Uttara North', '06.52-AM', '07.00-AM', '2.4', '6', '14.4'),
(240, 'Uttara Center', 'Uttara North', '06.56-AM', '07.00-AM', '2.4', '3.5', '8.4'),
(243, 'test', 'test1', '02.00-PM', '02.04-PM', '2.4', '4', '9.6'),
(244, 'test', 'test1', '03.00-PM', '03.04-PM', '2.4', '4', '9.6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_seat`
--
ALTER TABLE `booked_seat`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `passenger_info`
--
ALTER TABLE `passenger_info`
  ADD PRIMARY KEY (`psngr_id`);

--
-- Indexes for table `route_details`
--
ALTER TABLE `route_details`
  ADD PRIMARY KEY (`rd_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_seat`
--
ALTER TABLE `booked_seat`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `passenger_info`
--
ALTER TABLE `passenger_info`
  MODIFY `psngr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `route_details`
--
ALTER TABLE `route_details`
  MODIFY `rd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
