-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2016 at 04:28 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `easyaccess`
--
CREATE DATABASE IF NOT EXISTS `easyaccess` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `easyaccess`;

-- --------------------------------------------------------

--
-- Table structure for table `borroweditemlist`
--

CREATE TABLE IF NOT EXISTS `borroweditemlist` (
  `transactionid` int(11) NOT NULL AUTO_INCREMENT,
  `itemcode` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL,
  `releasedby` varchar(45) NOT NULL,
  `returntime` time NOT NULL,
  `status` varchar(45) NOT NULL,
  `remarks` varchar(45) NOT NULL,
  `receivedby` varchar(45) NOT NULL,
  `rentperhour` float NOT NULL,
  `totalrent` float NOT NULL,
  `datepaid` date NOT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `borrowerlist`
--

CREATE TABLE IF NOT EXISTS `borrowerlist` (
  `transactionid` int(11) NOT NULL AUTO_INCREMENT,
  `borrowersid` int(11) NOT NULL,
  PRIMARY KEY (`transactionid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `borrowtransaction`
--

CREATE TABLE IF NOT EXISTS `borrowtransaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `subject` varchar(45) NOT NULL,
  `schedule` varchar(45) NOT NULL,
  `purpose` varchar(45) NOT NULL,
  `tablenumber` int(11) NOT NULL,
  `totalamount` float NOT NULL,
  `status` varchar(45) NOT NULL,
  `laboratory` varchar(45) NOT NULL,
  `instructor` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `rank` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `rank`, `department`) VALUES
(1, 'admin', '1', 'compe'),
(2, 'admin', '1', 'compe');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inventoryid` int(11) NOT NULL AUTO_INCREMENT,
  `laboratory` varchar(45) NOT NULL,
  `laboratoryhead` varchar(45) NOT NULL,
  `custodian` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `departmenthead` varchar(45) NOT NULL,
  `buildingname` varchar(45) NOT NULL,
  `campus` varchar(45) NOT NULL,
  `inventorydate` date NOT NULL,
  `preparedby` varchar(45) NOT NULL,
  `approvedby` varchar(45) NOT NULL,
  PRIMARY KEY (`inventoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventoryitemlist`
--

CREATE TABLE IF NOT EXISTS `inventoryitemlist` (
  `inventoryid` int(11) NOT NULL AUTO_INCREMENT,
  `itemcode` varchar(45) NOT NULL,
  PRIMARY KEY (`inventoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL,
  `previousstatus` varchar(45) NOT NULL,
  `currentstatus` varchar(45) NOT NULL,
  `serialnumber` varchar(45) NOT NULL,
  `partnumber` varchar(45) NOT NULL,
  `manufacturenumber` varchar(45) NOT NULL,
  `dateacquired` date NOT NULL,
  `remarks` varchar(45) NOT NULL,
  `totalquantity` varchar(45) NOT NULL,
  `availablequantity` varchar(45) NOT NULL,
  `damagedquantity` varchar(45) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE IF NOT EXISTS `laboratory` (
  `code` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `room` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`code`, `name`, `room`, `status`) VALUES
(1, 'ceac', '268', 2);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `data` longtext NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laboratory` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `year` varchar(11) NOT NULL,
  `course` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `violation` varchar(45) NOT NULL,
  `laboratory` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `u_id`, `lastname`, `name`, `middlename`, `year`, `course`, `department`, `violation`, `laboratory`, `status`) VALUES
(22, 873005, 'Uno', 'Patrick', 'G', '1', 'BS-CE', 'CPE', 'reckless driving', 'CEAC1', 'see dept chair'),
(23, 1311032, 'Uno', 'Patrick', 'Gamaliel', '5', 'BS-IE', 'IE', 'break the glass', 'DML285', 'please see lab head');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `idnumber` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `type`, `idnumber`, `firstname`, `middlename`, `lastname`, `department`) VALUES
(1, 'panare', '5166123324eaa8e4863a7c505c792d21', 'admin', '151F000', 'Rex', 'John', 'Pana', 'Computer Engineering'),
(2, 'mendezju', '5f4dcc3b5aa765d61d8327deb882cf99', 'staff', '151F001', 'Juliet', 'Sugarol', 'Mendez', 'Computer Engineering'),
(3, 'roulloch', '5f4dcc3b5aa765d61d8327deb882cf99', 'head', '141F002', 'Christian', 'Kit', 'Roullo', 'Computer Engineering');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
