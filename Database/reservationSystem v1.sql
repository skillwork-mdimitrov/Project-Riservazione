-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 30, 2017 at 10:34 PM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.10.1
-- PHP Version: 7.0.13-0ubuntu0.16.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationNumber` int(11) NOT NULL,
  `date` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `roomNumber` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NEW'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userNumber` int(11) NOT NULL,
  `studentNumber` int(11) DEFAULT NULL,
  `userDetailsID` int(11) NOT NULL,
  `userEmail` varchar(45) NOT NULL,
  `userPasswordHash` varchar(30) NOT NULL,
  `roleID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userDetails`
--

CREATE TABLE `userDetails` (
  `userDetailsID` int(11) NOT NULL,
  `rightEye` int(11) NOT NULL,
  `leftEye` int(11) NOT NULL,
  `widthFace` int(11) NOT NULL,
  `heightFace` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userReservation`
--

CREATE TABLE `userReservation` (
  `userNumber` int(11) NOT NULL,
  `reservationNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userRole`
--

CREATE TABLE `userRole` (
  `roleID` smallint(6) NOT NULL,
  `roleName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationNumber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userNumber`),
  ADD KEY `roleID` (`roleID`),
  ADD KEY `userDetailsID` (`userDetailsID`);

--
-- Indexes for table `userDetails`
--
ALTER TABLE `userDetails`
  ADD PRIMARY KEY (`userDetailsID`);

--
-- Indexes for table `userReservation`
--
ALTER TABLE `userReservation`
  ADD PRIMARY KEY (`reservationNumber`,`userNumber`),
  ADD KEY `userNumber` (`userNumber`);

--
-- Indexes for table `userRole`
--
ALTER TABLE `userRole`
  ADD PRIMARY KEY (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userNumber` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userDetails`
--
ALTER TABLE `userDetails`
  MODIFY `userDetailsID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userRole`
--
ALTER TABLE `userRole`
  MODIFY `roleID` smallint(6) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `userRole` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`userDetailsID`) REFERENCES `userDetails` (`userDetailsID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userReservation`
--
ALTER TABLE `userReservation`
  ADD CONSTRAINT `userReservation_ibfk_1` FOREIGN KEY (`userNumber`) REFERENCES `user` (`userNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userReservation_ibfk_2` FOREIGN KEY (`reservationNumber`) REFERENCES `reservation` (`reservationNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
