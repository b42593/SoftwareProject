-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 11, 2018 at 02:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(11) NOT NULL,
  `tableNO` int(11) NOT NULL,
  `people` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(5) NOT NULL,
  `customerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `tableNO`, `people`, `date`, `time`, `customerID`) VALUES
(2, 2, 3, '2018-05-24', '18:50', 1),
(3, 1, 5, '2018-05-23', '18:30', 6),
(4, 3, 2, '2018-05-10', '21:00', 3),
(5, 4, 1, '2018-05-31', '22:00', 2),
(6, 5, 9, '2018-05-12', '19:50', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `mobileNo` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `name`, `surname`, `mobileNo`, `username`, `password`, `email`) VALUES
(1, 'Joe', 'Borg', 79254637, 'vivajoey', 'yoyoilboy', '12345joey@gmail.com'),
(2, 'Genoveffa', 'Bugejja', 79123456, 'gennymaxxxx', 'xannahi?', 'jiengenny@gmail.com'),
(3, 'Kriss', 'Brincat', 79078974, 'kriss smoove', 'haaahaaa', 'smoove@gmail.com'),
(4, 'Akira', 'Toriyama', 79654321, 'youjustgotyamchad', 'NANI?', 'dbz@gmail.com'),
(5, 'Joseph', 'Grech', 79456123, 'yeahboi', 'ohmymalta?!', 'jgrech@gmail.com'),
(6, 'Justin', 'Schembri', 79123465, 'Justiny', 'noneofyobusiness', '2402jj@gmail.com'),
(7, 'Test', 'Tester', 79845613, 'testaccount', 'test', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `name`, `surname`, `username`, `password`) VALUES
(1, 'Martha', 'Borg Bonaci', 'bonacijja', 'inhobb1lg3l@t'),
(2, 'Leli', 'Camilleri', 'wowmehn', 'inhobb1lg@ll3tt'),
(3, 'Emmanuele', 'Bond', 'bondscleverdesigninkitchens', 'andigolftaqsam'),
(4, 'Naruto', 'Uzumaki', 'aspiringhokage', 'still a genin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customerID`) REFERENCES `customer` (`customerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
