-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2019 at 04:31 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `a_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `NIC` varchar(10) DEFAULT NULL,
  `Contact` varchar(40) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time NOT NULL DEFAULT current_timestamp(),
  `d_id` int(11) DEFAULT NULL,
  `patients_doc` varchar(50) NOT NULL,
  `c_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`a_id`, `Name`, `NIC`, `Contact`, `date`, `time`, `d_id`, `patients_doc`, `c_id`) VALUES
(13, 'patiet test', '434343', '5199936991', '2019-12-25', '12:30:00', 1, 'Dr. Test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `fees` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `name`, `username`, `password`, `fees`) VALUES
(10, '', 'doctor', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lab_technician`
--

CREATE TABLE `lab_technician` (
  `t_id` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `multilogin`
--

CREATE TABLE `multilogin` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multilogin`
--

INSERT INTO `multilogin` (`ID`, `username`, `password`, `Role`) VALUES
(1, 'admin', '123', 'admin'),
(2, 'clerk', '123', 'clerk');

-- --------------------------------------------------------

--
-- Table structure for table `office_clerk`
--

CREATE TABLE `office_clerk` (
  `c_id` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `office_clerk`
--

INSERT INTO `office_clerk` (`c_id`, `name`, `username`, `password`) VALUES
(2, 'clerk', 'clerk2', '123');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `NIC` varchar(10) NOT NULL,
  `name` char(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

CREATE TABLE `patient_history` (
  `his_id` int(11) NOT NULL,
  `NIC` varchar(10) DEFAULT NULL,
  `date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `symtoms` varchar(150) DEFAULT NULL,
  `Diagnosis` char(200) DEFAULT NULL,
  `change details` char(200) DEFAULT NULL,
  `remarks` char(200) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `r_id` int(11) NOT NULL,
  `type` char(20) DEFAULT NULL,
  `results` varchar(100) DEFAULT NULL,
  `s_received_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `s_tested_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `technician_remarks` varchar(200) DEFAULT NULL,
  `fees` double DEFAULT NULL,
  `link_to_softcopy` varchar(200) DEFAULT NULL,
  `t_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `FK` (`d_id`,`c_id`,`NIC`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `lab_technician`
--
ALTER TABLE `lab_technician`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `multilogin`
--
ALTER TABLE `multilogin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `office_clerk`
--
ALTER TABLE `office_clerk`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`NIC`);

--
-- Indexes for table `patient_history`
--
ALTER TABLE `patient_history`
  ADD PRIMARY KEY (`his_id`),
  ADD KEY `FK` (`NIC`,`r_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `FK` (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `multilogin`
--
ALTER TABLE `multilogin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `office_clerk`
--
ALTER TABLE `office_clerk`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
