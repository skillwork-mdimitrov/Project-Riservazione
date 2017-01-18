-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2017 at 01:54 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservationNumber` smallint(6) NOT NULL,
  `dateIn` datetime NOT NULL,
  `dateOut` datetime NOT NULL,
  `roomNumber` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomNumber` varchar(10) NOT NULL,
  `roomName` varchar(30) NOT NULL,
  `roomCapacity` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userNumber` smallint(6) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userImage` blob NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPasswordSH` char(20) NOT NULL,
  `userPasswordSalt` char(20) NOT NULL,
  `roleID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userreservation`
--

CREATE TABLE `userreservation` (
  `userNumber` smallint(6) NOT NULL,
  `reservationNumber` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `roleID` smallint(6) NOT NULL,
  `roleName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservationNumber`),
  ADD KEY `roomNumber` (`roomNumber`),
  ADD KEY `roomNumber_2` (`roomNumber`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomNumber`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userNumber`),
  ADD KEY `roleID` (`roleID`);

--
-- Indexes for table `userreservation`
--
ALTER TABLE `userreservation`
  ADD PRIMARY KEY (`userNumber`,`reservationNumber`),
  ADD KEY `userNumber` (`userNumber`),
  ADD KEY `reservationNumber` (`reservationNumber`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`roleID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`roomNumber`) REFERENCES `room` (`roomNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `userrole` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userreservation`
--
ALTER TABLE `userreservation`
  ADD CONSTRAINT `userreservation_ibfk_1` FOREIGN KEY (`userNumber`) REFERENCES `user` (`userNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userreservation_ibfk_2` FOREIGN KEY (`reservationNumber`) REFERENCES `reservation` (`reservationNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
