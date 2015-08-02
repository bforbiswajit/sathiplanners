-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2015 at 06:35 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

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
  `id` int(3) unsigned NOT NULL,
  `name` varchar(35) NOT NULL,
  `businessTitle` varchar(35) DEFAULT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `addressLine` varchar(160) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `PIN` varchar(6) NOT NULL,
  `dob` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `ma` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `registeredOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `notes` varchar(160) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `name`, `businessTitle`, `mobile`, `email`, `addressLine`, `city`, `district`, `state`, `PIN`, `dob`, `ma`, `registeredOn`, `notes`) VALUES
(1, 'A. K. Jha', 'Jha Stone Works', '9933101093', 'bforbiswajit@outlook.com', 'S1/4 Lane, S. K. Street', 'Koderma', 'Koderma', 'Jharkhand', '834008', NULL, NULL, '2015-08-01 19:38:36', ''),
(2, 'B. Tirkey', 'Jha Stone Works', '9709177778', 'bforbiswajit@outlook.com', 'S1/4 Lane, S. K. Street', 'Koderma', 'Koderma', 'Jharkhand', '834008', NULL, NULL, '2015-08-01 19:45:21', '');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(2) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL,
  `planId` int(10) unsigned NOT NULL,
  `type` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `doneBy` varchar(35) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mines`
--

CREATE TABLE IF NOT EXISTS `mines` (
  `id` int(4) unsigned NOT NULL,
  `area` float NOT NULL,
  `leasType` varchar(30) NOT NULL,
  `district` varchar(20) NOT NULL,
  `mouza` varchar(20) NOT NULL,
  `notes` varchar(160) DEFAULT NULL,
  `planId` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(5) unsigned NOT NULL,
  `amount` float unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mode` varchar(20) NOT NULL,
  `planId` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE IF NOT EXISTS `plan` (
  `id` int(10) unsigned NOT NULL,
  `type` varchar(15) NOT NULL,
  `applicantId` int(3) unsigned NOT NULL,
  `dateOfRegistration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RQP` varchar(35) NOT NULL,
  `amount` float NOT NULL,
  `fileNo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan_document`
--

CREATE TABLE IF NOT EXISTS `plan_document` (
  `id` int(5) unsigned NOT NULL,
  `planId` int(4) unsigned NOT NULL,
  `docId` int(2) unsigned NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `notes` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan_event`
--

CREATE TABLE IF NOT EXISTS `plan_event` (
  `id` int(5) unsigned NOT NULL,
  `planId` int(4) unsigned NOT NULL,
  `eventId` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`), ADD KEY `events_ibfk_1` (`planId`);

--
-- Indexes for table `mines`
--
ALTER TABLE `mines`
  ADD PRIMARY KEY (`id`), ADD KEY `mines_ibfk_1` (`planId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`), ADD KEY `payment_ibfk_1` (`planId`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `fileNo` (`fileNo`), ADD KEY `plan_ibfk_1` (`applicantId`);

--
-- Indexes for table `plan_document`
--
ALTER TABLE `plan_document`
  ADD PRIMARY KEY (`id`), ADD KEY `plan_document_ibfk_1` (`planId`), ADD KEY `plan_document_ibfk_2` (`docId`);

--
-- Indexes for table `plan_event`
--
ALTER TABLE `plan_event`
  ADD PRIMARY KEY (`id`), ADD KEY `plan_event_ibfk_1` (`planId`), ADD KEY `plan_event_ibfk_2` (`eventId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(2) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mines`
--
ALTER TABLE `mines`
  MODIFY `id` int(4) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan_document`
--
ALTER TABLE `plan_document`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `plan_event`
--
ALTER TABLE `plan_event`
  MODIFY `id` int(5) unsigned NOT NULL AUTO_INCREMENT;
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
