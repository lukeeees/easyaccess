-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2016 at 01:34 PM
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
  `status` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `u_id`, `lastname`, `name`, `middlename`, `year`, `course`, `department`, `violation`, `laboratory`, `status`) VALUES
(29, '123', 'aldfj', 'aldjf', 'asldfj', '1', 'BS-CE', 'CE', 'adjflkj', 'CEAC1', 'asldjfj'),
(30, '2345', 'ljoih', 'oihoio', 'ouip', '2', 'BS-CHE', 'CHE', 'adjjfo', 'CEAC2', 'iadsj'),
(31, '9823', 'joadjfo', 'aslkdkf', 'oiadsf', '3', 'BS-CpE', 'CpE', 'lasdf', 'CEAC3', 'llajsdfp9'),
(32, '6876', 'asdjf', 'lssdjf', 'lksadjfi', '4', 'BS-ECE', 'EEE', 'asdlfpi', 'CISCO', 'lkdjsfa'),
(33, '3402', 'asdfj', 'oidf', 'lkssdjf', '5', 'BS-EE', 'EEE', 'ladjfiwpq', 'CNLAB', 'daslfkjdf'),
(34, '349609982', 'ladsfm', 'duhas', 'asdifjj', '1', 'BS-IE', 'IE', 'lkadjfi', 'DML285', 'ldakfpia'),
(35, '1201283', 'oaisdjfiw', 'assdfasdfo', 'sdkfja', '5', 'BS-CE', 'CE', 'adfadkf', 'DML286', 'ladf9ie'),
(36, '308833', 'asdf0iwef', 'aldfj', 'saldfj', '4', 'BS-CHE', 'CHE', 'adlfkjaid', 'NCRLAB', 'aldsfnoi'),
(37, '771013', 'oadfoa', 'adfakj', 'asddfj', '3', 'BS-CpE', 'CpE', 'assdife', 'PCBLAB', 'ladfjiaf'),
(38, '10231', 'adlf;ladskf', 'iadflakj', 'asdfij', '2', 'BS-ECE', 'EEE', 'adfjadp', 'SELAB', 'adfjiwiiie'),
(39, '873005', 'Uno', 'Patrick', 'Gamaliel', '1', 'BS-CpE', 'CpE', 'reckless driving', 'DCpE', 'For Approval'),
(40, '96114572', 'Uno', 'Solpatrick', 'G', '4', 'BS-IE', 'IE', 'vandalizing', 'LB267TC', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
