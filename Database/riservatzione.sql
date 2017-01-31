-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2017 at 05:49 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riservatzione`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationNumber` int(11) NOT NULL,
  `date` date NOT NULL,
  `timeIn` time NOT NULL,
  `timeOut` time NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'NEW',
  `roomNumber` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationNumber`, `date`, `timeIn`, `timeOut`, `status`, `roomNumber`) VALUES
(1, '2017-01-31', '11:00:00', '13:00:00', 'NEW', 1),
(3, '2017-02-02', '12:00:00', '15:00:00', 'NEW', 1),
(4, '2017-01-30', '10:00:00', '12:00:00', 'NEW', 1),
(5, '2017-01-31', '15:00:00', '17:00:00', 'NEW', 1),
(6, '2017-02-03', '09:00:00', '12:00:00', 'NEW', 1),
(23, '2017-01-30', '10:00:00', '13:00:00', 'NEW', 2),
(24, '2017-01-31', '11:00:00', '15:00:00', 'NEW', 3),
(25, '2017-01-30', '16:00:00', '18:00:00', 'NEW', 1),
(26, '2017-02-03', '09:00:00', '11:00:00', 'NEW', 1),
(27, '2017-02-03', '16:00:00', '18:00:00', 'NEW', 1),
(28, '2017-02-04', '13:00:00', '14:00:00', 'NEW', 1),
(29, '2017-01-30', '11:00:00', '14:00:00', 'NEW', 5),
(31, '2017-02-03', '13:00:00', '14:00:00', 'NEW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userNumber` int(11) NOT NULL,
  `studentNumber` int(11) DEFAULT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPasswordHash` varchar(30) NOT NULL,
  `rightEye` int(11) NOT NULL,
  `leftEye` int(11) NOT NULL,
  `widthFace` int(11) NOT NULL,
  `heightFace` int(11) NOT NULL,
  `roleID` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userNumber`, `studentNumber`, `userName`, `userEmail`, `userPasswordHash`, `rightEye`, `leftEye`, `widthFace`, `heightFace`, `roleID`) VALUES
(1, 481971, 'admin', 'admin@stenden.com', '21232f297a57a5a743894a0e4a801f', 0, 0, 0, 0, 1),
(2, 481991, 'Stone  ', 'stone@stenden.com', '5f4dcc3b5aa765d61d8327deb882cf', 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userreservation`
--

CREATE TABLE IF NOT EXISTS `userreservation` (
  `userNumber` int(11) NOT NULL,
  `reservationNumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userreservation`
--

INSERT INTO `userreservation` (`userNumber`, `reservationNumber`) VALUES
(1, 1),
(1, 3),
(1, 4),
(1, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `roleID` smallint(6) NOT NULL,
  `roleName` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`roleID`, `roleName`) VALUES
(1, 'Student');

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
  ADD KEY `roleID` (`roleID`);

--
-- Indexes for table `userreservation`
--
ALTER TABLE `userreservation`
  ADD PRIMARY KEY (`userNumber`,`reservationNumber`),
  ADD KEY `reservationNumber` (`reservationNumber`),
  ADD KEY `userNumber` (`userNumber`),
  ADD KEY `userNumber_2` (`userNumber`),
  ADD KEY `reservationNumber_2` (`reservationNumber`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservationNumber` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userNumber` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `roleID` smallint(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `userrole` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userreservation`
--
ALTER TABLE `userreservation`
  ADD CONSTRAINT `userReservation_ibfk_1` FOREIGN KEY (`userNumber`) REFERENCES `user` (`userNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userReservation_ibfk_2` FOREIGN KEY (`reservationNumber`) REFERENCES `reservation` (`reservationNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
