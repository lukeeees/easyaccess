-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2016 at 04:35 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyaccess`
--

-- --------------------------------------------------------

--
-- Table structure for table `borroweditemlist`
--

CREATE TABLE `borroweditemlist` (
  `transactionid` int(11) NOT NULL,
  `itemcode` varchar(45) NOT NULL,
  `quantity` int(11) NOT NULL,
  `releasedby` varchar(45) NOT NULL,
  `returntime` time NOT NULL,
  `status` varchar(45) NOT NULL,
  `remarks` varchar(45) NOT NULL,
  `receivedby` varchar(45) NOT NULL,
  `rentperhour` float NOT NULL,
  `totalrent` float NOT NULL,
  `datepaid` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `borrowers_info`
--

CREATE TABLE `borrowers_info` (
  `borrowers_id` int(11) NOT NULL,
  `borrowers_idnumber` varchar(45) NOT NULL,
  `borrowers_fname` varchar(45) NOT NULL,
  `borrowers_mname` varchar(45) NOT NULL,
  `borrowers_lname` varchar(45) NOT NULL,
  `year` varchar(45) NOT NULL,
  `course` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `schedule` varchar(45) NOT NULL,
  `instructor` varchar(45) NOT NULL,
  `tablenumber` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  `damaged_item` int(20) NOT NULL,
  `item_code` varchar(45) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `laboratory` varchar(45) NOT NULL,
  `custodian` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowers_info`
--

INSERT INTO `borrowers_info` (`borrowers_id`, `borrowers_idnumber`, `borrowers_fname`, `borrowers_mname`, `borrowers_lname`, `year`, `course`, `department`, `subject`, `schedule`, `instructor`, `tablenumber`, `quantity`, `damaged_item`, `item_code`, `item_name`, `laboratory`, `custodian`) VALUES
(22, '06031111', 'juliet', 'secret', 'mendez', '', '', '', 'cpe415', 'mwf 7:30-10:10', 'engr. pana', '04', '2', 0, '5', '', '', ''),
(23, '06305105', 'juliet', 'secret', 'mendez', '', '', '', 'cpe415', 'mwf 7:30-10:10', 'engr. pana', '05', '1', 0, '6', '', '', ''),
(24, '06305105', 'juliet', 'secret', 'mendez', '', '', '', 'cpe415', 'mwf 7:30-10:10', 'engr. uno', '04', '1', 0, '6', '', '', ''),
(25, '999', 'jj', 'jj', 'jj', '', '', '', 'jj', 'jj', 'jj', '09', '0', 0, '6', '', '', ''),
(26, '12121', 'kk', 'kk', 'kk', '', '', '', 'kk', 'kk', 'kk', '9', '2', 0, '3', '', '', ''),
(27, 'dd', 'dd', 'dd', 'dd', '', '', '', 'dd', 'dd', 'dd', '1', '1', 0, '3', '', '', ''),
(28, '11', '232', 'asdw', 'asd', '', '', '', 'sdf', 'fdsf', 'sfds', '31', '1', 0, '3', '', '', ''),
(29, '11', '232', 'asdw', 'asd', '', '', '', 'sdf', 'fdsf', 'sfds', '31', '1', 0, '3', '', '', ''),
(30, '111111', '111111', '111111', '111111111111', '', '', '', '111111', '111111', '111111', '111111', '1', 0, '9', '', '', ''),
(92, '12312', 'luffy', 'D.', 'monkey', '', 'BS-CHE', 'DCpE', 'qwiipw', 'qwepo', 'Ms. Juliet Mendez', '2', '1', 0, '1', 'sdfasdf', 'DCpE', 'milky');

-- --------------------------------------------------------

--
-- Table structure for table `borrowers_transaction`
--

CREATE TABLE `borrowers_transaction` (
  `transaction_id` int(11) NOT NULL,
  `borrowers_id` int(11) NOT NULL,
  `item_code` varchar(45) NOT NULL,
  `releasedby` int(11) NOT NULL,
  `date_borrowed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_status` varchar(45) NOT NULL,
  `returned_date` datetime DEFAULT NULL,
  `returnedby` int(11) DEFAULT NULL,
  `remarks` longtext NOT NULL,
  `laboratory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowers_transaction`
--

INSERT INTO `borrowers_transaction` (`transaction_id`, `borrowers_id`, `item_code`, `releasedby`, `date_borrowed`, `item_status`, `returned_date`, `returnedby`, `remarks`, `laboratory_id`) VALUES
(1, 0, '3', 2, '2016-10-05 19:32:20', '', NULL, NULL, '', 0),
(2, 0, '4', 2, '2016-10-05 19:32:45', '', NULL, NULL, '', 0),
(3, 0, '5', 2, '2016-10-06 02:49:51', '', NULL, NULL, '', 0),
(4, 0, '6', 2, '2016-10-06 02:50:27', '', NULL, NULL, '', 0),
(5, 0, '6', 2, '2016-10-06 02:52:26', '', NULL, NULL, '', 0),
(6, 0, '6', 2, '2016-10-06 02:54:10', '', NULL, NULL, '', 0),
(7, 0, '5', 2, '2016-10-07 10:43:48', '', NULL, NULL, '', 0),
(8, 0, '6', 2, '2016-10-07 15:23:45', '', NULL, NULL, '', 0),
(9, 0, '6', 0, '2016-10-07 21:26:53', '', '2016-10-07 15:26:53', 2, '', 0),
(10, 0, '6', 0, '2016-10-07 21:29:00', '', '2016-10-07 15:29:00', 2, '', 0),
(11, 0, '6', 0, '2016-10-07 21:29:16', '', '2016-10-07 15:29:16', 2, '', 0),
(12, 0, '6', 2, '2016-10-07 15:46:15', '', NULL, NULL, '', 0),
(13, 0, '6', 2, '2016-10-07 15:46:49', '', NULL, NULL, '', 0),
(14, 0, '6', 0, '2016-10-07 21:47:13', '', '2016-10-07 15:47:13', 2, '', 0),
(15, 0, '6', 0, '2016-10-07 21:47:58', '', '2016-10-07 15:47:58', 2, '', 0),
(16, 0, '6', 0, '2016-10-07 21:48:22', '', '2016-10-07 15:48:22', 2, '', 0),
(17, 0, '6', 0, '2016-10-07 21:48:36', '', '2016-10-07 15:48:36', 2, '', 0),
(18, 0, '6', 0, '2016-10-07 21:48:51', '', '2016-10-07 15:48:51', 2, '', 0),
(19, 0, '3', 2, '2016-10-07 16:36:47', '', NULL, NULL, '', 0),
(20, 0, '3', 2, '2016-10-07 16:56:37', '', NULL, NULL, '', 0),
(21, 0, '3', 2, '2016-10-07 16:56:37', '', NULL, NULL, '', 0),
(0, 0, '5', 32, '2016-10-09 20:50:30', '', NULL, NULL, '', 0),
(0, 0, '5', 32, '2016-10-09 20:51:25', '', NULL, NULL, '', 0),
(0, 0, '9', 32, '2016-10-09 20:56:06', '', NULL, NULL, '', 0),
(0, 0, '5', 32, '2016-10-09 20:57:28', '', NULL, NULL, '', 0),
(0, 0, '5', 32, '2016-10-09 20:57:45', '', NULL, NULL, '', 0),
(0, 0, '10', 32, '2016-10-09 21:37:41', '', NULL, NULL, '', 0),
(0, 0, '10', 32, '2016-10-09 21:37:41', '', NULL, NULL, '', 0),
(0, 0, '10', 32, '2016-10-09 21:40:25', '', NULL, NULL, '', 0),
(0, 0, '10', 32, '2016-10-09 22:11:15', '', NULL, NULL, '', 0),
(0, 0, '10', 32, '2016-10-09 22:11:33', '', NULL, NULL, '', 0),
(0, 0, '10', 32, '2016-10-09 22:11:33', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-09 22:43:58', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-09 22:44:49', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:34:59', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:34:59', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:35:00', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:35:00', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:35:00', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:35:00', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:35:01', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:41:36', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:42:40', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:42:40', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:42:40', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:42:41', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:42:41', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:42:58', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:42:58', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:42:58', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:42:58', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:43:26', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:43:27', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:43:27', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:43:41', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:43:41', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:43:41', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:46:57', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:46:57', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 00:46:58', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 23:37:10', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 23:37:49', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 23:43:46', '', NULL, NULL, '', 0),
(0, 0, '21', 32, '2016-10-10 23:49:45', '', NULL, NULL, '', 0),
(0, 0, '28', 32, '2016-10-11 01:03:08', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:11:23', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:11:23', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:13:33', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:13:33', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:21:32', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:21:32', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:24:21', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:24:21', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:35:25', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:35:25', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:36:06', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 08:36:06', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 09:31:53', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 09:31:53', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 10:39:06', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 10:39:06', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 10:47:01', '', NULL, NULL, '', 0),
(0, 0, '33', 32, '2016-10-12 10:47:01', '', NULL, NULL, '', 0),
(0, 0, '36', 42, '2016-10-13 11:04:08', '', NULL, NULL, '', 0),
(0, 0, '37', 32, '2016-10-15 13:37:54', '', NULL, NULL, '', 0),
(0, 0, '37', 32, '2016-10-15 13:37:54', '', NULL, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `rank` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `inventory` (
  `inventoryid` int(11) NOT NULL,
  `department` varchar(45) NOT NULL,
  `departmenthead` varchar(45) NOT NULL,
  `laboratory` varchar(45) NOT NULL,
  `laboratoryhead` varchar(45) NOT NULL,
  `buildingname` varchar(45) NOT NULL,
  `floor` varchar(45) NOT NULL,
  `custodian` varchar(45) NOT NULL,
  `campus` varchar(45) NOT NULL,
  `inventorydate` date NOT NULL,
  `position` varchar(45) NOT NULL,
  `preparedby` varchar(45) NOT NULL,
  `approvedby` varchar(45) NOT NULL,
  `csvFilename` varchar(45) NOT NULL,
  `createdby_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventoryid`, `department`, `departmenthead`, `laboratory`, `laboratoryhead`, `buildingname`, `floor`, `custodian`, `campus`, `inventorydate`, `position`, `preparedby`, `approvedby`, `csvFilename`, `createdby_id`) VALUES
(13, 'COMPUTER ENGINEERING', 'Gran S. Sabandal', 'Department (LB287)', 'Department (LB287)', 'BUNZEL', '2nd Floor', 'Mameh', 'Talamban Campus', '2016-10-09', 'Secretary', 'Analiza Laurino iii', 'Marlowe Burce', 'Department (LB287)_October_09_2016_10_35_48', ''),
(14, 'COMPUTER ENGINEERING', 'Gran S. Sabandal', 'Department (LB287)', 'Department (LB287)', 'BUNZEL', '2nd Floor', 'Mameh', 'Talamban Campus', '2016-10-09', 'Secretary', 'Analiza Laurino', 'Marlowe Burce', 'Department (LB287)_October_09_2016_10_37_11', ''),
(15, 'COMPUTER ENGINEERING', 'Gran S. Sabandal', '565432', '565432', 'BUNZEL', '2nd Floor', 'Analiza Laurino', 'Talamban Campus', '2016-10-09', 'Secretary', 'Analiza Laurino', 'Marlowe Burce', '565432_October_09_2016_10_37_28', ''),
(16, 'COMPUTER ENGINEERING', 'Gran S. Sabandal', '565432', '565432', 'BUNZEL', '2nd Floor', 'Analiza Laurino', 'Talamban Campus', '0000-00-00', 'Secretary', 'Analiza Laurino', 'Marlowe Burce', 'October_09_2016_06_52_53', ''),
(17, 'COMPUTER ENGINEERING', 'assddffggh', 'asdf', 'asdf', 'BUNZEL', 'sdfgh', 'asd', 'Talamban Campus', '2016-10-09', 'sdffghgj', 'Analiza Laurino 5', 'khjgfd', 'asdf_October_09_2016_10_37_44', ''),
(18, 'COMPUTER ENGINEERING', 'assddffggh', 'gran', 'gran', 'BUNZEL', 'sdfgh', 'asd', 'Talamban Campus', '2016-10-09', 'sdffghgj', 'Gran Sabandal II', 'khjgfd', 'gran_October_09_2016_10_50_50', ''),
(19, 'COMPUTER ENGINEERING', 'sdefr', 'asd', 'asd', 'BUNZEL', 'sd', 'asdasda', 'Talamban Campus', '0000-00-00', 'asdasda', 'dasdad', 'adas', 'October_09_2016_06_58_02', ''),
(20, 'COMPUTER ENGINEERING', 'sdefr', 'asd', 'asd', 'BUNZEL', 'sd', 'asdasda', 'Talamban Campus', '0000-00-00', 'asdasda', 'dasdad', 'adas', 'October_09_2016_06_58_02', ''),
(21, 'COMPUTER ENGINEERING', '66543', '2345', '2345', 'BUNZEL', '3244', '2345', 'Talamban Campus', '0000-00-00', '3245', '23', '213', 'October_09_2016_07_00_09', ''),
(22, 'COMPUTER ENGINEERING', '1234', 'cn', 'cn', 'BUNZEL', '345666', '234', 'Talamban Campus', '0000-00-00', '756453', '432', '3456', 'October_09_2016_07_08_43', ''),
(23, 'COMPUTER ENGINEERING', '1234', 'cn', 'cn', 'BUNZEL', '345666', '234', 'Talamban Campus', '0000-00-00', '756453', '432', '3456', 'October_09_2016_07_08_43', ''),
(24, 'COMPUTER ENGINEERING', 'dfgh', 'asdfg', 'asdfg', 'BUNZEL', 'dfdg', 'sdfg', 'Talamban Campus', '0000-00-00', 'dadff', 'dsffg', 'sadf', 'October_09_2016_07_09_51', ''),
(25, 'COMPUTER ENGINEERING', 'dfgh', 'asdfg', 'asdfg', 'BUNZEL', 'dfdg', 'sdfg', 'Talamban Campus', '0000-00-00', 'dadff', 'dsffg', 'sadf', 'October_09_2016_07_09_51', ''),
(26, 'COMPUTER ENGINEERING', 'dfgh', 'asdfg', 'asdfg', 'BUNZEL', 'dfdg', 'sdfg', 'Talamban Campus', '0000-00-00', 'dadff', 'dsffg', 'sadf', 'October_09_2016_07_09_51', ''),
(27, 'COMPUTER ENGINEERING', 'dfgh', 'asdfg', 'asdfg', 'BUNZEL', 'dfdg', 'sdfg', 'Talamban Campus', '0000-00-00', 'dadff', 'dsffg', 'sadf', 'October_09_2016_07_09_51', ''),
(28, 'COMPUTER ENGINEERING', 'dfgh', 'asdfg', 'asdfg', 'BUNZEL', 'dfdg', 'sdfg', 'Talamban Campus', '0000-00-00', 'dadff', 'dsffg', 'sadf', 'October_09_2016_07_09_51', ''),
(29, 'COMPUTER ENGINEERING', '1234', '32', '32', 'BUNZEL', '33444', '123', 'Talamban Campus', '2016-10-09', '24567', '432344', '3234455', 'October_09_2016_07_40_48', ''),
(30, 'COMPUTER ENGINEERING', '1234', '32', '32', 'BUNZEL', '33444', '123', 'Talamban Campus', '2016-10-09', '24567', '432344', '3234455', 'October_09_2016_07_40_48', ''),
(31, 'COMPUTER ENGINEERING', '6543', 'se', 'se', 'BUNZEL', '432', 'sdfg', 'Talamban Campus', '2016-10-09', 'sdsfghh', '2345', '2345', 'se_October_09_2016_08_51_44', ''),
(32, 'COMPUTER ENGINEERING', '23434', '5432', '5432', 'BUNZEL', '234', '12443', 'Talamban Campus', '2016-10-09', '543', '234566', '76543', '5432_October_09_2016_08_53_29', ''),
(33, 'COMPUTER ENGINEERING', '123456', 'pcb', 'pcb', 'BUNZEL', '12345', '123456', 'Talamban Campus', '2016-10-09', '23456', '123456', '12345', 'pcb_October_09_2016_09_13_40', ''),
(34, 'COMPUTER ENGINEERING', 'new1', 'ncr', 'ncr', 'BUNZEL', 'new1', 'Analiza Laurino', 'Talamban Campus', '2016-10-09', 'Secretary', 'Analiza Laurino', 'Marlowe Burce', 'ncr_October_09_2016_09_20_19', ''),
(35, 'COMPUTER ENGINEERING', '76543', '645342', '645342', 'BUNZEL', '23456', '3456', 'Talamban Campus', '2016-10-09', '2435465576', '3456', '23456', '645342_October_09_2016_09_43_45', ''),
(36, 'COMPUTER ENGINEERING', 'Gran S. Sabandal', 'Department (LB287)', 'Department (LB287)', 'BUNZEL', '2nd Floor', 'Mameh', 'Talamban Campus', '2016-10-09', 'Secretary', 'Analiza Laurino', 'Marlowe Burce', 'Department (LB287)_October_09_2016_10_21_44', ''),
(37, 'COMPUTER ENGINEERING', 'Gran S. Sabandal', 'Department (LB287)', 'Department (LB287)', 'BUNZEL', '2nd Floor', 'Mameh', 'Talamban Campus', '2016-10-09', 'Secretary', 'Gran Sabandal', 'Marlowe Burce', 'Department (LB287)_October_09_2016_10_22_52', ''),
(38, 'COMPUTER ENGINEERING', '23', 'SE LABORATORY', 'SE LABORATORY', 'BUNZEL', '2', '23', 'Talamban Campus', '2016-10-10', '23', '23', '23', 'SE LABORATORY_October_10_2016_01_54_09', '31'),
(39, 'COMPUTER ENGINEERING', 'blah', 'SE LABORATORY', 'SE LABORATORY', 'BUNZEL', '2', 'blah', 'Talamban Campus', '2016-10-10', 'blah', 'blah', 'blah', 'SE LABORATORY_October_10_2016_01_59_45', '31'),
(40, 'COMPUTER ENGINEERING', 'blahblah', 'SE LABORATORY', 'SE LABORATORY', 'BUNZEL', '2', 'blahblah', 'Talamban Campus', '2016-10-10', 'blahblah', 'blahblah', 'blahblah', 'SE LABORATORY_October_10_2016_02_04_11', '31'),
(41, 'COMPUTER ENGINEERING', 'new', 'DCpE', 'DCpE', 'BUNZEL', '1', 'new', 'Talamban Campus', '2016-10-10', 'new', '1', '1', 'DCpE_October_10_2016_02_05_43', '30'),
(42, 'COMPUTER ENGINEERING', 'Marlowe Burce', 'DCpE', 'DCpE', 'BUNZEL', '2', 'Analiza Laurino', 'Talamban Campus', '2016-10-10', 'Secretary', 'Cherl', 'Marlowe Edgar Burce', 'DCpE_October_10_2016_08_11_20', '30'),
(43, 'COMPUTER ENGINEERING', 'Dr, Roullo', 'DCpE', 'DCpE', 'BUNZEL', '2', 'Ms. Ann', 'Talamban Campus', '2016-10-10', 'Secretary', 'Dr. Roullo', 'Dr. Roullo', 'DCpE_October_10_2016_07_26_30', '30'),
(44, 'COMPUTER ENGINEERING', 'trikshot', 'DCpE', 'DCpE', 'BUNZEL', '2nd', 'Analiza', 'Talamban Campus', '2016-10-10', 'Faculty', 'Patrick', 'Burce', 'DCpE_October_10_2016_08_06_11', '30'),
(45, 'COMPUTER ENGINEERING', '31312312', 'SE LABORATORY', 'SE LABORATORY', 'BUNZEL', '2', '231', 'Talamban Campus', '2016-10-10', '12123', 'as', 'as', 'SE LABORATORY_October_10_2016_08_24_14', '31'),
(46, 'COMPUTER ENGINEERING', '2345', 'DCpE', 'DCpE', 'BUNZEL', '234', '312435', 'Talamban Campus', '2016-10-11', '12344', '5432', '4356', 'DCpE_October_11_2016_01_56_58', '30'),
(47, 'COMPUTER ENGINEERING', '1234', 'DCpE', 'DCpE', 'BUNZEL', '234', '2134', 'Talamban Campus', '2016-10-11', '2134', 'rex', 'rex', 'DCpE_October_11_2016_01_57_57', '30'),
(48, 'COMPUTER ENGINEERING', '2345', 'DCpE', 'DCpE', 'BUNZEL', '1234', '2345', 'Talamban Campus', '2016-10-11', '3456', 'rex1213', '234', 'DCpE_October_11_2016_02_04_02', '30'),
(49, 'COMPUTER ENGINEERING', '23', 'DCpE', 'DCpE', 'BUNZEL', '32', '213', 'Talamban Campus', '2016-10-11', '32', '123', '213', 'DCpE_October_11_2016_02_06_23', '30'),
(50, 'COMPUTER ENGINEERING', 'rex', 'DCpE', 'DCpE', 'BUNZEL', 'rex', 'rex', 'Talamban Campus', '2016-10-11', 'rex', 'rex', 'rex', 'DCpE_October_11_2016_06_21_46', '30'),
(51, 'COMPUTER ENGINEERING', 'xxxx', 'DCpE', 'DCpE', 'BUNZEL', 'xxxx', 'xxxx', 'Talamban Campus', '2016-10-11', 'xxxx', 'xxxx', 'xxxx', 'DCpE_October_11_2016_06_26_44', '30'),
(52, 'COMPUTER ENGINEERING', '3pops man', 'DCpE', 'DCpE', 'BUNZEL', '3p', '3p', 'Talamban Campus', '2016-10-11', '3p', '3p', '3p', 'DCpE_October_11_2016_07_27_06', '30'),
(53, 'COMPUTER ENGINEERING', '1234', 'SE LABORATORY', 'SE LABORATORY', 'BUNZEL', '23', '213', 'Talamban Campus', '2016-10-14', '1123', '12345', '234', 'SE LABORATORY_October_14_2016_07_02_45', '31');

-- --------------------------------------------------------

--
-- Table structure for table `inventoryitemlist`
--

CREATE TABLE `inventoryitemlist` (
  `inventoryid` int(11) NOT NULL,
  `itemcode` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `code` int(11) NOT NULL,
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
  `custodian` varchar(200) NOT NULL,
  `owner` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`code`, `name`, `description`, `previousstatus`, `currentstatus`, `serialnumber`, `partnumber`, `manufacturenumber`, `dateacquired`, `remarks`, `totalquantity`, `availablequantity`, `damagedquantity`, `custodian`, `owner`) VALUES
(1, 'sdfasdf', 'oh yeah', 'asdfg', 'asdf', 'zxcvbn1234', '1234567', '1234567', '2016-10-03', 'consumable', '2', '1', '2', '1', 'DCpE'),
(2, 'bottle', '1liter', 'none', 'empty', '45678', '78', '0987', '2016-10-05', 'consumable', '1', '0', 'ok', '', 'DCpE'),
(3, 'adf', 'adf', 'adf', 'adf', '456789', '456789', '6789', '2016-10-05', 'consumable', '1', '3', '3', '', 'DCpE'),
(4, 'dfghjk', 'fjk', 'fghjk', 'dfghjk', '23456789', '345678', '345678', '2016-10-07', 'consumable', '4', '4', 'none', '', 'DCpE'),
(5, ' ', ' ', ' ', ' ', '  ', ' ', ' ', '2016-10-07', ' ', ' ', '2', '0', '', 'DCpE'),
(6, ' ', ' ', ' ', ' ', '  ', ' ', ' ', '2016-10-07', '  ', ' ', '3', '0', '', 'DCpE'),
(7, ' ', 'tost', 'tost', 'tost', 'tost', 'tost', 'tost', '2016-10-07', 'tsot', '8', '10', '8', '', 'DCpE'),
(8, 'tust', ' ', 'tust', 'tust', 'tust', 'tust', 'tust', '2016-10-07', 'non-consumable', '5', '6', '5', '', 'DCpE'),
(9, 'TAAAST', 'tyst', 'tyst', 'tyst', 'tyst', 'tyst', 'tyst', '2016-10-07', 'non-consumable', '41', '4', '41', '', 'DCpE'),
(10, 'KI', 'assodifl', 'oasidjfalsjf', 'asdfjasoij', 'asdfjaso', 'asodijfas', 'asdofjas', '2016-10-07', 'non-consumable', 'sldjf', '1', '1', '', 'DCpE'),
(11, '1', '1', '1', '1', '1', '1', '11', '2016-10-12', '1', '1', '1', '1', '', 'DCpE'),
(12, '2', '22', '2', '2', '2', '2', '2', '2016-10-09', '2', '2', '2', '2', '', 'DCpE'),
(13, '3', '3', '3', '3', '3', '3', '3', '2016-10-09', '3', '3', '33', '3', '', 'DCpE'),
(14, '4', '4', '4', '4', '4', '44', '4', '2016-10-09', '4', '4', '4', '4', '', 'DCpE'),
(15, '5', '5', '5', '5', '5', '5', '5', '2016-10-09', '5', '5', '5', '5', '', 'DCpE'),
(16, '5', '5', '5', '5', '5', '5', '5', '2016-10-09', '5', '5', '5', '5', '', 'DCpE'),
(17, '6', '66', '6', '6', '6666', '6', '6', '2016-10-09', '6', '6', '6', '6', '', 'DCpE'),
(18, '2', '2', '2', '2', '2', '2', '2', '2016-10-09', '2', '2', '2', '2', '', 'DCpE'),
(19, '3', '3', '3', '3', '3', '3', '3', '2016-10-09', '3', '3', '3', '3', '123', 'DCpE'),
(20, '3', '3', '3', '3', '3', '3', '3', '2016-10-09', '3', '3', '3', '3', '', 'DCpE'),
(21, 'Resistor', '300 Ohms', 'Good', 'Good', '1212', '1212', '1212', '2016-10-10', 'Good Condition', '20', '20', '0', '123456', 'SE LABORATORY'),
(22, 'a', 'a', 'a', 'a', 'a', 'a', 'a', '1293-12-31', 'a', 'a', 'a', 'a', '', 'DCpE'),
(23, ' 1234', ' 2345', ' 234', ' 2345', ' 4235', ' 5', ' 3245', '2016-12-31', ' 324354', ' 32435', ' 12435', ' 55', '', 'DCpE'),
(24, 'laptop1', 'lenovo12', 'new', 'good condition', '123456', '76543', 'lenovo', '2016-10-12', 'not consomable', '1', '1', '0', 'engr. patrick uno`12', 'DCpE'),
(25, 'eew', 'wer', 'wqer', 'wer', 'ewr', 'wer', 'ewr', '2016-10-28', 'wer', 'er', 'wer', 'wer', 'wer', 'DCpE'),
(26, '3t', '234', '34', '234', '3244', '233', '3244', '2016-10-20', '132', '123', '32', '23', '2344', 'DCpE'),
(27, '1', '1', '1', '1', '1', '1', '1', '2016-10-26', '1', '1', '1', '1', '1', 'DCpE'),
(28, 'Chocolate', 'Chocolate', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2016-10-11', 'consumable', '15', '15', '0', 'Kit', 'SE LABORATORY'),
(29, 'two pops kit', 'two pops kit', 'two pops kit', 'two pops kit', 'two pops kit', 'two pops kit', 'two pops kit', '2016-10-12', 'consumable', '2', '2', '0', 'kit', 'DCpE'),
(30, '3 pops', '3 pops', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2016-10-12', 'consumable', '3', '3', '0', 'Kit', 'DCpE'),
(31, 'test paper', 'test paper', 'NA', 'NA', 'NA', 'NA', 'NA', '2016-09-28', 'consumable', '12', '12', '0', 'kit', 'SE LABORATORY'),
(32, 'Euls Scepter', 'Euls Scepter', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2016-10-11', 'consumable', '2', '2', '0', 'Kit', 'SE LABORATORY'),
(33, 'Euls Scepter', 'Euls Scepter', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2016-10-11', 'consumable', '3', '2', '0', 'Kit', 'SE LABORATORY'),
(34, 'mar roxas', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', '2016-10-12', 'non-consumable', '1', '1', '0', 'Kit', 'DCpE'),
(35, '5pops', '5pops', '5pops', '5pops', '5pops', '5pops', '5pops', '2016-10-19', 'consumable', '2', '2', '0', '1', 'DCpE'),
(36, ' ', ' ', ' ', ' ', ' ', ' ', ' ', '2015-12-31', 'consumable', '0', '0', '0', ' ', 'DCpE'),
(37, '1022831', 'for cleaning', 'new', 'functional', '194y1lk', '102310', '12318', '2016-10-14', 'consumable', '20', '20', '0', 'trikshot', 'SE Laboratory');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `code` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `room` varchar(45) NOT NULL,
  `head` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`code`, `name`, `room`, `head`) VALUES
(10, 'CN Laboratory', 'CN LAB', ''),
(11, 'SE Laboratory', 'SE LAB', ''),
(12, 'CISCO Laboratory', 'CISCO LAB', ''),
(13, 'NCR Laboratory', 'LB463TC', ''),
(14, 'engineering lab', 'lb623tc', ''),
(15, 'DM Laboratory', 'DML', ''),
(16, 'PCB Laboratory', 'PCB Lab', ''),
(19, 'DCpE', 'DCpE', ''),
(20, 'testingan2', 'testingan2', ''),
(21, 'asdfh', 'asdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(20) NOT NULL,
  `action` text NOT NULL,
  `laboratory` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`, `laboratory`, `date_added`, `seen`) VALUES
(1, 'Successfully added item(two pops kit).', 'DCpE', '2016-10-10 23:18:59', 1),
(2, 'Successfully added item(3 pops).', 'DCpE', '2016-10-10 23:24:57', 1),
(3, 'Successfully added report.', 'DCpE', '2016-10-10 23:26:49', 1),
(4, 'Successfully updated report.', 'DCpE', '2016-10-10 23:28:00', 1),
(5, 'Successfully added user(6969).', 'DCpE', '2016-10-10 23:31:11', 1),
(6, 'Successfully added user(007).', 'DCpE', '2016-10-10 23:31:37', 1),
(7, 'Successfully deleted user( ).', 'DCpE', '2016-10-10 23:36:36', 1),
(8, 'Successfully deleted user(2).', 'DCpE', '2016-10-10 23:37:05', 1),
(9, 'Successfully updated user(67896).', 'DCpE', '2016-10-10 23:38:11', 1),
(10, 'Successfully added laboratory(testingan).', 'DCpE', '2016-10-10 23:40:34', 1),
(11, 'Successfully updated laboratory().', 'DCpE', '2016-10-10 23:41:56', 1),
(12, 'Successfully added violation(3003).', 'DCpE', '2016-10-10 23:44:19', 1),
(13, 'Successfully updated violation(1030341).', 'DCpE', '2016-10-10 23:45:08', 1),
(14, 'Successfully added item(test paper).', 'SE LABORATORY', '2016-10-10 23:46:31', 1),
(15, 'Staff neil3 has successfully added item(Euls Scepter).', 'SE LABORATORY', '2016-10-11 00:30:14', 1),
(16, 'successfully added user(5001).', 'DCpE', '2016-10-11 00:31:26', 1),
(17, 'Staff pinoy has successfully added item(mar roxas).', 'DCpE', '2016-10-11 00:32:00', 1),
(18, 'successfully added item(5pops).', 'DCpE', '2016-10-11 00:54:41', 1),
(19, 'successfully updated user(141F74).', 'DCpE', '2016-10-11 00:55:46', 1),
(20, 'successfully updated user(141F7).', 'DCpE', '2016-10-11 01:20:48', 1),
(21, 'successfully added laboratory(asdfh).', 'DCpE', '2016-10-11 01:27:16', 1),
(22, 'successfully updated user(5001).', 'DCpE', '2016-10-11 01:27:45', 1),
(23, 'successfully updated violation(1030341).', 'DCpE', '2016-10-11 06:14:46', 1),
(24, 'successfully added item( ).', 'DCpE', '2016-10-11 06:16:03', 1),
(25, 'successfully updated user(333333).', 'SE LABORATORY', '2016-10-11 06:16:53', 1),
(26, 'successfully updated violation(1003).', 'SE LABORATORY', '2016-10-11 09:50:03', 1),
(27, 'successfully updated violation(1003).', 'SE LABORATORY', '2016-10-11 09:50:20', 1),
(28, 'successfully updated user(333333).', 'DCpE', '2016-10-11 09:52:33', 1),
(29, 'successfully updated user(333333).', 'SE LABORATORY', '2016-10-11 09:52:59', 1),
(30, 'successfully updated user(333333).', 'DCpE', '2016-10-11 10:26:29', 1),
(31, 'successfully added violation(56789).', 'DCpE', '2016-10-11 15:13:29', 1),
(32, 'successfully added violation(567890).', 'DCpE', '2016-10-11 15:15:15', 1),
(33, 'successfully added violation(567890).', 'DCpE', '2016-10-11 15:17:34', 1),
(34, 'successfully updated violation(567890).', 'DCpE', '2016-10-11 15:18:06', 1),
(35, 'successfully updated violation(1030341).', 'DCpE', '2016-10-11 15:18:39', 1),
(36, 'successfully updated violation(1030341).', 'DCpE', '2016-10-11 15:18:52', 1),
(37, 'successfully added violation(740118).', 'DCpE', '2016-10-11 15:20:05', 1),
(38, 'successfully added violation(1234098).', 'DCpE', '2016-10-11 15:22:15', 1),
(39, 'successfully updated violation(1234098).', 'DCpE', '2016-10-11 15:22:38', 1),
(40, 'successfully updated violation(1030341).', 'DCpE', '2016-10-11 15:22:46', 1),
(41, 'successfully updated violation(1234098).', 'DCpE', '2016-10-11 15:22:53', 1),
(42, 'successfully updated violation(1030341).', 'DCpE', '2016-10-11 16:33:25', 1),
(43, 'successfully added violation().', 'DCpE', '2016-10-11 17:04:38', 1),
(44, 'successfully added violation().', 'DCpE', '2016-10-11 17:05:23', 1),
(45, 'successfully updated violation().', 'DCpE', '2016-10-11 17:16:45', 1),
(46, 'successfully updated violation().', 'DCpE', '2016-10-11 17:25:08', 1),
(47, 'DCpE', 'DCpE', '2016-10-11 17:26:53', 1),
(48, 'successfully updated violation(1030341).', 'DCpE', '2016-10-11 17:29:26', 1),
(49, '.->userdata(''lab'').', 'DCpE', '2016-10-11 17:29:38', 1),
(50, 'successfully updated violation().', 'DCpE', '2016-10-11 17:30:28', 1),
(51, 'successfully updated violation().', 'DCpE', '2016-10-11 17:30:30', 1),
(52, 'successfully updated violation().', 'DCpE', '2016-10-11 17:30:54', 1),
(53, 'successfully updated violation().', 'DCpE', '2016-10-11 17:32:46', 1),
(54, 'successfully updated violation().', 'DCpE', '2016-10-11 17:32:50', 1),
(55, 'successfully updated violation().', 'DCpE', '2016-10-11 17:33:20', 1),
(56, 'successfully updated violation().', 'DCpE', '2016-10-11 17:34:24', 1),
(57, 'successfully updated violation().', 'DCpE', '2016-10-11 17:39:48', 1),
(58, 'Staff neil1 has successfully updated violation().', 'DCpE', '2016-10-11 17:41:57', 1),
(59, 'successfully updated violation(1030341).', 'DCpE', '2016-10-11 17:44:36', 1),
(60, 'Administratorneil1 has successfully updated violation().', 'DCpE', '2016-10-11 17:48:02', 1),
(61, '(DCpE)', 'DCpE', '2016-10-11 17:48:41', 1),
(62, 'Administrator neil1 has successfully updated violation().', 'DCpE', '2016-10-11 17:49:48', 1),
(63, '.->userdata(''lab'').', 'DCpE', '2016-10-11 17:50:03', 1),
(64, 'Administrator neil1 has successfully updated violation().', 'DCpE', '2016-10-11 17:52:29', 1),
(65, 'DCpE', 'DCpE', '2016-10-11 17:52:39', 1),
(66, 'Administrator neil1 has successfully updated violation().', 'DCpE', '2016-10-11 17:54:11', 1),
(67, 'Administrator neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-11 17:54:29', 1),
(68, 'Administrator neil1 has successfully updated violation).', 'DCpE', '2016-10-11 17:56:35', 1),
(69, 'Administrator neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-11 17:57:30', 1),
(70, 'Administrator neil1 has successfully updated violation().', 'DCpE', '2016-10-11 17:57:47', 1),
(71, 'successfully added violation(3456789).', 'DCpE', '2016-10-11 17:58:39', 1),
(72, 'successfully added violation(18301283).', 'DCpE', '2016-10-11 18:01:46', 1),
(73, 'successfully added violation(tyuiop).', 'DCpE', '2016-10-11 18:11:01', 1),
(74, 'Administrator neil1 has successfully added violation(1203u).', 'DCpE', '2016-10-11 18:12:50', 1),
(75, 'successfully updated violation().', 'SE LABORATORY', '2016-10-11 18:13:17', 1),
(76, 'successfully updated violation().', 'SE LABORATORY', '2016-10-11 18:16:45', 1),
(77, 'Administrator neil2 has successfully updated violation(050517).', 'SE LABORATORY', '2016-10-11 18:18:14', 1),
(78, 'Administrator neil2 has successfully updated violation().', 'SE LABORATORY', '2016-10-11 18:18:23', 1),
(79, 'SE LABORATORYneil2 has successfully updated violation(050517).', 'SE LABORATORY', '2016-10-11 18:20:56', 1),
(80, 'SE LABORATORY neil2 has successfully updated violation(050517).', 'SE LABORATORY', '2016-10-11 18:21:37', 1),
(81, 'successfully updated violation().', 'SE LABORATORY', '2016-10-11 18:24:22', 1),
(82, 'head neil2 has successfully updated violation(050517).', 'SE LABORATORY', '2016-10-11 18:24:49', 1),
(83, 'head neil2 has successfully updated violation().', 'SE LABORATORY', '2016-10-11 18:25:41', 1),
(84, 'successfully updated violation(050517).', 'SE Laboratory', '2016-10-12 01:52:20', 1),
(85, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-12 04:27:29', 1),
(86, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:28:40', 1),
(87, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-12 04:28:55', 1),
(88, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:29:03', 1),
(89, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-12 04:30:51', 1),
(90, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:30:54', 1),
(91, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-12 04:42:23', 1),
(92, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:42:30', 1),
(93, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-12 04:42:42', 1),
(94, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:48:02', 1),
(95, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-12 04:48:11', 1),
(96, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-12 04:48:16', 1),
(97, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:48:19', 1),
(98, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:48:23', 1),
(99, 'admin neil1 has successfully updated violation(29384).', 'DCpE', '2016-10-12 04:48:28', 1),
(100, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:48:41', 1),
(101, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:50:32', 1),
(102, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:52:30', 1),
(103, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-12 04:53:19', 1),
(104, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-12 04:55:26', 1),
(105, 'successfully added violation(924098).', 'SE Laboratory', '2016-10-12 06:35:25', 1),
(106, 'successfully added violation(924098).', 'SE Laboratory', '2016-10-12 06:36:06', 1),
(107, 'successfully added violation(456789).', 'SE Laboratory', '2016-10-12 06:42:15', 1),
(108, 'successfully added violation(873005).', 'SE Laboratory', '2016-10-12 07:31:53', 1),
(109, 'successfully added violation(4569).', 'SE Laboratory', '2016-10-12 08:39:06', 1),
(110, 'successfully added violation(567890).', 'SE Laboratory', '2016-10-12 08:47:01', 1),
(111, 'admin neil1 has successfully updated violation().', 'DCpE', '2016-10-13 04:50:55', 1),
(112, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-13 05:08:14', 1),
(113, 'admin neil1 has successfully updated violation()', 'DCpE', '2016-10-13 05:08:38', 1),
(114, 'admin neil1 has successfully updated violation(1030341).', 'DCpE', '2016-10-13 05:11:35', 1),
(115, 'admin neil1 has successfully updated violation()', 'DCpE', '2016-10-13 05:11:59', 1),
(116, 'admin neil1 has successfully updated violation()', 'DCpE', '2016-10-13 05:13:43', 1),
(117, 'successfully added user(141F141).', 'DCpE', '2016-10-13 08:58:23', 1),
(118, 'successfully added violation(0940312).', 'DCpE', '2016-10-13 09:01:42', 1),
(119, 'successfully added violation(12312).', 'DCpE', '2016-10-13 09:04:08', 1),
(120, 'successfully added report.', 'SE LABORATORY', '2016-10-14 11:03:05', 1),
(121, 'Staff neil3 has successfully added item(1022831).', 'SE Laboratory', '2016-10-14 12:20:28', 1),
(122, 'successfully added violation(456789).', 'SE Laboratory', '2016-10-15 11:37:54', 1),
(123, 'admin neil1 has successfully added violation(567890).', 'DCpE', '2016-10-15 11:59:06', 1),
(124, 'admin neil1 has successfully updated violation()', 'DCpE', '2016-10-15 12:00:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `laboratory` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `u_id` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `year` varchar(11) NOT NULL,
  `course` varchar(45) NOT NULL,
  `department` varchar(45) NOT NULL,
  `violation` varchar(45) NOT NULL,
  `laboratory` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `dateviolate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `u_id`, `lastname`, `name`, `middlename`, `year`, `course`, `department`, `violation`, `laboratory`, `status`, `dateviolate`) VALUES
(41, '1030341', 'locsin', 'cherl', 'mordeno', '1st Yr', 'BS-CpE', 'CpE', 'broken catalog', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(42, '56789', 'roullo', 'christian', 'b', '1st Yr', 'BS-CE', 'CpE', 'reckless driving', 'CEAC LAB', 'Cleared', '2016-10-15 11:55:59'),
(43, '141241', 'roullo', 'jennylyn', 'mercado', '1st Yr', 'BS-CE', 'CpE', 'student teacher relationship', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(44, '8888', 'roullo', 'arci', 'munoz', '1st Yr', 'BS-CE', 'CpE', 'student teacher relationship', 'CEAC LAB', 'Cleared', '2016-10-15 11:55:59'),
(45, '29384', 'ojjflskjf', 'ldajfs', 'lkjjdf', 'N/A', 'Faculty', 'CpE', 'spitting on the ground', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(46, 'zxc', 'zxc', 'zxc', 'zxc', '1st Yr', 'Faculty', 'CpE', 'orin', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(47, '123', '123', '123', '123', '1st Yr', 'BS-CE', 'CE', '123', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(48, '123', '123', '123', '123', '1st Yr', 'BS-CE', 'CE', '123', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(49, '87654', 'lkjhgf', 'lkjhgf', 'kjhgfd', 'N/A', 'Faculty', 'CpE', 'kjhgfd', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(50, '050517', 'Reyes', 'Kristie', 'B', 'N/A', 'Faculty', 'CpE', 'reckless driving', 'SE Laboratory', 'Cleared', '2016-10-15 11:55:59'),
(51, '23456', 'fghjk', 'ghjk', 'kghjk', 'N/A', 'Faculty', 'CpE', 'hjkl', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(52, '345678', 'ertyuio', 'tyuiop', 'ghjk', 'N/A', 'Faculty', 'CpE', 'fghjkl', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(53, '56789', 'Mendez', 'Juliet', 'S', 'N/A', 'Faculty', 'CpE', 'break glass', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(54, '56789', 'Uno', 'Patrick', 'G', 'N/A', 'Faculty', 'CpE', 'sliding tackle', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(55, '12312312', 'lukas', 'flukas', 'lukas', '1st Yr', 'BS-CHE', 'CHE', '213', 'CISCO Laboratory', 'Pending', '2016-10-15 11:55:59'),
(56, '123123', 'qwe', 'qwe', 'qwe', '2nd Yr', 'BS-CHE', 'CE', 'samok', 'CN Laboratory', 'Pending', '2016-10-15 11:55:59'),
(57, 'aasd', 'asd', 'asd', 'asd', '2nd Yr', 'BS-CHE', 'CpE', 'okay ah', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(58, '646468', 'Messi', 'Leonil', 'R', 'N/A', 'Faculty', 'CpE', 'handball sa camot', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(59, '46486', 'Ronlado', 'Christiano', 'M', 'N/A', 'Faculty', 'DCpE', 'tackle from behind', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(60, '98431', 'Do Silva', 'Neymar', 'M', 'N/A', 'Faculty', 'DCpE', 'nutmeg', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(61, '586465', 'Zidane', 'Zenidine', 'Z', 'N/A', 'Faculty', 'DCpE', 'head butt', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(62, '222', 'David', 'Neil', 'Angelo', '', '', '', '', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(63, ' ', ' ', ' ', ' ', ' ', ' ', ' ', '  ', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(64, '2222', '2222', '2222', '2222', '', '', '', 'Unreturned Item', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(71, 'rex', 'rex', 'rex', 'rex', '', '', '', '', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(72, 'john', 'john', 'john', 'john', 'asdfa', 'fasdfa', 'fasdf', 'asdfads', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(73, ' ', ' ', ' ', ' ', '2nd Yr', 'BS-CE', 'DCE', ' ', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(74, '1001', 'kit', 'kit', 'kit', '', '', '', '', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(75, '1001', 'tik', 'tik', 'tik', '', '', '', '', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(76, '1002', 'rex', 'rex', 'rex', '', '', '', '', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(77, '1002', 'rex', 'rex', 'rex', '', '', '', '', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(78, '1003', 'kit', 'kit', 'kit', '', '', '', '', 'SE LABORATORY', 'Cleared', '2016-10-15 11:55:59'),
(79, '3003', 'kit', 'kit', 'kit', '5th Yr', 'Faculty', 'DCpE', '2 pops student', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(80, '56789', 'Alba', 'Jordi', 'S', 'N/A', 'Faculty', 'DCpE', 'bicycle kick', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(81, '567890', 'Alves', 'Dani', 'S', 'N/A', 'Faculty', 'DCpE', '', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(82, '567890', 'Puyol', 'Carles', 'B', 'N/A', 'Faculty', 'DCpE', '', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(83, '740118', 'Abidal', 'Eric', 'B', 'N/A', 'Faculty', 'DCpE', 'Knee injury', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(84, '1234098', 'Rooney', 'Wayne', 'M', 'N/A', 'Faculty', 'DCpE', 'bicycle kick', 'DCpE', 'Cleared', '2016-10-15 11:55:59'),
(85, '3456789', 'Costa', 'Diego', 'B', 'N/A', 'Faculty', 'DCpE', 'bati ug nawong', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(86, '18301283', 'Mourniho', 'Jose', 'I', 'N/A', 'Faculty', 'DCpE', 'read between the lines', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(87, 'tyuiop', 'lasjdf', 'oaidj', 'oijsjdf', 'N/A', 'Faculty', 'DCpE', 'oiadsjf', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(88, '1203u', 'lkksjf', 'sljsfii', 'sdooifj', 'N/A', 'Faculty', 'DCpE', 'asdoifj', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(89, '924098', 'Mata', 'Jose', 'S', 'N/A', 'Faculty', 'DCpE', '', 'SE Laboratory', 'Cleared', '2016-10-15 11:55:59'),
(90, '456789', 'Labio', 'Krystle', 'M', 'N/A', 'Faculty', 'DCE', '', 'SE Laboratory', 'Cleared', '2016-10-15 11:55:59'),
(91, '873005', 'Uno', 'Patrick', 'G', 'N/A', 'Faculty', 'DCE', '', 'SE Laboratory', 'Cleared', '2016-10-15 11:55:59'),
(92, '4569', 'Locsin', 'Cherl', 'M', 'N/A', 'Faculty', 'DCE', '', 'SE Laboratory', 'Cleared', '2016-10-15 11:55:59'),
(93, '567890', 'shot', 'trik', 's', 'N/A', 'Faculty', 'DCE', '', 'SE Laboratory', 'Cleared', '2016-10-15 11:55:59'),
(94, '0940312', 'mokey', 'luffy', 'D.', '1st Yr', 'BS-CHE', 'DCpE', 'eating while the teacher is discussing', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(95, '12312', 'monkey', 'luffy', 'D.', '1st Yr', 'BS-CHE', 'DCpE', 'Unreturned Item', 'DCpE', 'Pending', '2016-10-15 11:55:59'),
(96, '456789', 'Zorro', 'Roronoa', 'O', 'N/A', 'Faculty', 'DCE', '', 'SE Laboratory', 'Cleared', '2016-10-15 11:55:59'),
(97, '567890', 'Chopper', 'Tony-Tony', 'O', 'N/A', 'Faculty', 'DCpE', 'Rumble', 'DCpE', 'Cleared', '2016-10-15 11:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
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
(16, 'laylolu', '72af0ac47777cd19028f04e02c819b37', 'admin', '141F7', 'Luke Nigel', 'Jumao-as', 'Laylo', 'DCpE'),
(20, 'cjmlabrador', '827ccb0eea8a706c4c34a16891f84e7b', 'head', '123456', 'chirstopher james', 'm', 'labrador', 'CEAC LAB'),
(21, 'astillo', '827ccb0eea8a706c4c34a16891f84e7b', 'head', '324234', 'philip', 'v', 'astillo', 'NCR LAB'),
(23, 'lindas', '827ccb0eea8a706c4c34a16891f84e7b', 'head', '456789', 'Linda', 'S', 'Saavedra', 'CN LABORATORY'),
(24, 'daday', '1f32aa4c9a1d2ea010adcf2348166a04', 'head', '67896', 'Christine', 'm', 'Ilagan', 'DCpE'),
(25, 'ajm', '827ccb0eea8a706c4c34a16891f84e7b', 'head', '45678', 'Alvin Josph', 'L', 'Macapagal', 'DM LAB'),
(26, 'rosana', '827ccb0eea8a706c4c34a16891f84e7b', 'head', '345678', 'Rosana', 'F', 'Feroline', 'CISCO LAB'),
(30, 'neil1', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '111111', 'Neil', 'test', 'David', 'DCpE'),
(31, 'neil2', 'e10adc3949ba59abbe56e057f20f883e', 'head', '222222', 'NEIL', 'test', 'DAVID', 'SE LABORATORY'),
(32, 'neil3', 'e10adc3949ba59abbe56e057f20f883e', 'staff', '333333', 'NEIL', 'test', 'DAVID', 'SE Laboratory'),
(33, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '123', 'admin', 'admin', 'admin', 'DCpE'),
(34, 'lab', 'f9664ea1803311b35f81d07d8c9e072d', 'head', 'lab', 'lab', 'lab', 'lab', 'CISCO Laboratory'),
(39, 'test', '098f6bcd4621d373cade4e832627b4f6', 'head', '6969', 'test', 'test', 'test', 'CISCO Laboratory'),
(40, '007', '9e94b15ed312fa42232fd87a55db0d39', 'staff', '007', '007', '007', '007', 'DM Laboratory'),
(41, 'pinoy', '827ccb0eea8a706c4c34a16891f84e7b', 'staff', '5001', 'pinoy', 'pinoy', 'pinoy', 'DCpE'),
(42, 'milky', '5844a15e76563fedd11840fd6f40ea7b', 'staff', '141F141', 'Milky Jane', 'B.', 'Balcado', 'DCpE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `borroweditemlist`
--
ALTER TABLE `borroweditemlist`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `borrowers_info`
--
ALTER TABLE `borrowers_info`
  ADD PRIMARY KEY (`borrowers_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventoryid`);

--
-- Indexes for table `inventoryitemlist`
--
ALTER TABLE `inventoryitemlist`
  ADD PRIMARY KEY (`inventoryid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `borroweditemlist`
--
ALTER TABLE `borroweditemlist`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `borrowers_info`
--
ALTER TABLE `borrowers_info`
  MODIFY `borrowers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `inventoryitemlist`
--
ALTER TABLE `inventoryitemlist`
  MODIFY `inventoryid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
