-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2015 at 02:30 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sathiplanners`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE IF NOT EXISTS `applicant` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(35) NOT NULL,
  `businessTitle` varchar(35) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `addressLine` varchar(160) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `PIN` varchar(6) NOT NULL,
  `dob` date DEFAULT NULL,
  `ma` date DEFAULT NULL,
  `registeredOn` date NOT NULL,
  `notes` varchar(160) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `name`, `businessTitle`, `mobile`, `email`, `addressLine`, `city`, `district`, `state`, `PIN`, `dob`, `ma`, `registeredOn`, `notes`) VALUES
(1, 'test', 'test', '1234567890', NULL, NULL, 'test', 'test', 'test', '123456', NULL, NULL, '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `planId` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doneBy` varchar(35) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `events_ibfk_1` (`planId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mines`
--

CREATE TABLE IF NOT EXISTS `mines` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `area` float NOT NULL,
  `leasType` varchar(30) NOT NULL,
  `district` varchar(20) NOT NULL,
  `mouza` varchar(20) NOT NULL,
  `notes` varchar(160) DEFAULT NULL,
  `planId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mines_ibfk_1` (`planId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `amount` float unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mode` varchar(20) NOT NULL,
  `planId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_ibfk_1` (`planId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(15) NOT NULL,
  `applicantId` int(3) unsigned NOT NULL,
  `dateOfRegistration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RQP` varchar(35) NOT NULL,
  `amount` float NOT NULL,
  `fileNo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fileNo` (`fileNo`),
  KEY `plan_ibfk_1` (`applicantId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plan_document`
--

CREATE TABLE IF NOT EXISTS `plan_document` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `planId` int(4) unsigned NOT NULL,
  `docId` int(2) unsigned NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notes` varchar(160) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_document_ibfk_1` (`planId`),
  KEY `plan_document_ibfk_2` (`docId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `plan_event`
--

CREATE TABLE IF NOT EXISTS `plan_event` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `planId` int(4) unsigned NOT NULL,
  `eventId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_event_ibfk_1` (`planId`),
  KEY `plan_event_ibfk_2` (`eventId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `type` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(160) NOT NULL,
  `lastLogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `type`, `email`, `password`, `lastLogin`) VALUES
(1, 'Biswajit Bardhan', 'staff', 'bforbiswajit@outlook.com', '8bgbH0nI97cgE', '2015-08-06 12:30:39');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`planId`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mines`
--
ALTER TABLE `mines`
  ADD CONSTRAINT `mines_ibfk_1` FOREIGN KEY (`planId`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`planId`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`applicantId`) REFERENCES `applicant` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_document`
--
ALTER TABLE `plan_document`
  ADD CONSTRAINT `plan_document_ibfk_1` FOREIGN KEY (`planId`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_document_ibfk_2` FOREIGN KEY (`docId`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan_event`
--
ALTER TABLE `plan_event`
  ADD CONSTRAINT `plan_event_ibfk_1` FOREIGN KEY (`planId`) REFERENCES `plan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `plan_event_ibfk_2` FOREIGN KEY (`eventId`) REFERENCES `events` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
