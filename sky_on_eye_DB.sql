-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 03:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sky_on_eye`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `resID` int(11) NOT NULL,
  `rating1` enum('1','2','3','4','5') NOT NULL,
  `rating2` enum('1','2','3','4','5') NOT NULL,
  `rating3` enum('1','2','3','4','5') NOT NULL,
  `comments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `resID`, `rating1`, `rating2`, `rating3`, `comments`) VALUES
(2, 1, '4', '4', '4', 'My Feedback'),
(4, 5, '5', '4', '3', 'Great Movie');

-- --------------------------------------------------------

--
-- Table structure for table `moviehalldetails`
--

CREATE TABLE `moviehalldetails` (
  `HallID` int(50) NOT NULL,
  `HallName` varchar(50) NOT NULL,
  `NoOfSeats` int(50) NOT NULL,
  `avaiable3D` tinyint(1) NOT NULL,
  `StreetAddress` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `moviehalldetails`
--

INSERT INTO `moviehalldetails` (`HallID`, `HallName`, `NoOfSeats`, `avaiable3D`, `StreetAddress`, `City`) VALUES
(1, 'SK Cinema', 150, 0, 'Kotuwegoda', 'Matara'),
(2, 'New Cinema', 100, 0, 'Akuressa Rd', 'Matara'),
(3, 'SkyLight', 90, 0, 'Bus Stand', 'Matara');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movID` int(11) NOT NULL,
  `movName` varchar(150) NOT NULL,
  `movLang` varchar(50) NOT NULL,
  `movRelYear` int(11) NOT NULL,
  `movGenre` varchar(50) NOT NULL,
  `movShowTimings` varchar(255) NOT NULL,
  `movHallID` int(11) NOT NULL,
  `movTicketPrice` int(11) NOT NULL,
  `posterPath` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movID`, `movName`, `movLang`, `movRelYear`, `movGenre`, `movShowTimings`, `movHallID`, `movTicketPrice`, `posterPath`) VALUES
(1, 'Guardians Of The Galaxy Vol. 3', 'English', 2023, 'Action', '9:30 AM', 2, 1000, 'assets/uploads/r2J02Z2OpNTctfOSN1Ydgii51I3.jpg'),
(2, 'John Wick Chapter 4', 'English', 2023, 'Action', '9:30 AM', 3, 1200, 'assets/uploads/download.jpeg'),
(3, 'Fast X', 'English', 2023, 'Action', '12:30 PM', 1, 800, 'assets/uploads/download (1).jpeg'),
(4, 'Ant-Man and the Wasp: Quantumania', 'English', 2023, 'Action', '12:30 PM', 2, 800, 'assets/uploads/ac157eea8c32a389c14069796a106105.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `rId` int(11) NOT NULL,
  `uId` int(11) NOT NULL,
  `mId` int(11) NOT NULL,
  `hId` int(11) NOT NULL,
  `seatCount` int(11) NOT NULL,
  `rDate` date NOT NULL,
  `rTime` varchar(50) NOT NULL,
  `amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`rId`, `uId`, `mId`, `hId`, `seatCount`, `rDate`, `rTime`, `amount`) VALUES
(1, 8, 1, 2, 2, '2023-05-28', '9:30 AM', '2500'),
(4, 8, 2, 3, 5, '2023-05-29', '9:30 AM', '6000'),
(5, 9, 1, 2, 3, '2023-05-29', '9:30 AM', '2400');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_seatno`
--

CREATE TABLE `reservation_seatno` (
  `rId` int(11) NOT NULL,
  `seatNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation_seatno`
--

INSERT INTO `reservation_seatno` (`rId`, `seatNo`) VALUES
(1, 'S2'),
(1, 'S3'),
(4, 'S96'),
(4, 'S97'),
(4, 'S98'),
(4, 'S99'),
(4, 'S100'),
(5, 'S87'),
(5, 'S88'),
(5, 'S89');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNo` varchar(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phoneNo`, `password`, `type`) VALUES
(1, 'Admin', 'admin_123', 'admin@gmail.com', '0776565656', 'admin123', 1),
(2, 'Theater', 'theater_123', 'theater@gmail.com', '0777777778', 'theater123', 2),
(8, 'john', 'john_123', 'john@gmail.com', '0772222333', 'john123', 0),
(9, 'Sam', 'sam_123', 'sam@gmail.com', '0772226753', 'sam123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `moviehalldetails`
--
ALTER TABLE `moviehalldetails`
  ADD PRIMARY KEY (`HallID`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movID`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `moviehalldetails`
--
ALTER TABLE `moviehalldetails`
  MODIFY `HallID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `rId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
