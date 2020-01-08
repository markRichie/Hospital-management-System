-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2020 at 03:08 PM
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
-- Database: `hospital_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE IF NOT EXISTS `admission` (
  `ad_no` int(11) NOT NULL AUTO_INCREMENT,
  `NIC` varchar(10) NOT NULL,
  `ward_no` int(11) NOT NULL,
  `bed_no` int(11) NOT NULL,
  `status` text NOT NULL,
  `d_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `tel_no` int(12) NOT NULL,
  PRIMARY KEY (`ad_no`)
) ENGINE=MyISAM AUTO_INCREMENT=4001 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`ad_no`, `NIC`, `ward_no`, `bed_no`, `status`, `d_id`, `name`, `tel_no`) VALUES
(4000, '123456789v', 4, 2, 'admitted', 2001, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `d_id` int(11) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  `NIC` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`a_id`),
  KEY `FK` (`d_id`,`c_id`,`NIC`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`a_id`, `date`, `time`, `d_id`, `c_id`, `NIC`) VALUES
(1, '2019-12-19', '2019-12-23 05:44:19', 1001, 1, '123456789v'),
(2, '2019-12-27', '2019-12-23 06:18:26', 1001, 1, '987654321v');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL,
  `fees` double DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1002 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `name`, `fees`) VALUES
(1000, 'sam perera', 1500),
(1001, 'john fernando', 1200);

-- --------------------------------------------------------

--
-- Table structure for table `front office clerk`
--

DROP TABLE IF EXISTS `front office clerk`;
CREATE TABLE IF NOT EXISTS `front office clerk` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `front office clerk`
--

INSERT INTO `front office clerk` (`c_id`, `name`) VALUES
(1, 'sanduni');

-- --------------------------------------------------------

--
-- Table structure for table `lab_technician`
--

DROP TABLE IF EXISTS `lab_technician`;
CREATE TABLE IF NOT EXISTS `lab_technician` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2002 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_technician`
--

INSERT INTO `lab_technician` (`t_id`, `name`) VALUES
(2000, 'sam wasantha'),
(2001, 'thilina kumara');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `password` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `role` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`password`, `username`, `role`, `id`) VALUES
('1234', 'doc1', 'doctor', 1001),
('1234', 'clerk1', 'front office clerk', 1),
('1234', 'lab1', 'lab_technician', 2000),
('1234', 'pharm1', 'pharmacist', 600);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

DROP TABLE IF EXISTS `medicine`;
CREATE TABLE IF NOT EXISTS `medicine` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`m_id`, `name`, `qty`, `price`) VALUES
(1, 'pandol', 189, 10),
(4, 'piriton', 300, 5),
(3, 'bandage', 45, 200),
(5, 'plaster', 50, 30);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `NIC` varchar(10) NOT NULL,
  `name` char(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`NIC`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`NIC`, `name`, `age`) VALUES
('123456789v', 'supun fernando', 21),
('987654321v', 'paul george', 16),
('102345678v', 'donald kumar', 42);

-- --------------------------------------------------------

--
-- Table structure for table `patient_history`
--

DROP TABLE IF EXISTS `patient_history`;
CREATE TABLE IF NOT EXISTS `patient_history` (
  `his_id` int(11) NOT NULL AUTO_INCREMENT,
  `NIC` varchar(10) DEFAULT NULL,
  `date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `symtoms` varchar(150) DEFAULT NULL,
  `Diagnosis` char(200) DEFAULT NULL,
  `change details` char(200) DEFAULT NULL,
  `remarks` char(200) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  `r_type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`his_id`),
  KEY `FK` (`NIC`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_history`
--

INSERT INTO `patient_history` (`his_id`, `NIC`, `date_Time`, `symtoms`, `Diagnosis`, `change details`, `remarks`, `p_id`, `r_type`) VALUES
(1, '123456789v', '2019-12-27 07:23:20', 'headache, vomitish, sneezing', 'viral fever', NULL, 'meet after 3 days', NULL, 'scan'),
(2, '987654321v', '2019-12-27 07:23:11', 'ankle pain, difficult to walk', 'ankle sprain', NULL, 'if pain exceeds 10 days take scan', NULL, 'scan'),
(3, '777888999v', '2019-12-27 07:22:43', 'fever, dizzyness', 'viral fever', NULL, 'meet me in 3 days if not well', NULL, 'scan'),
(21, '123456789v', '2019-12-21 17:44:24', 'headache', 'headache', '', '', NULL, 'scan'),
(23, '222111222v', '2019-12-21 18:12:30', 'fever', 'fever', NULL, NULL, NULL, NULL),
(25, '123456789v', '2019-12-29 07:25:03', 'ww', 'ee', 'rr', '', NULL, 'scan'),
(26, '123456789v', '2019-12-29 07:25:39', 'ww', 'ee', 'rr', '', NULL, 'scan'),
(27, '123456789v', '2019-12-29 10:05:34', 'qq', 'ww', '', 'aa', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

DROP TABLE IF EXISTS `pharmacist`;
CREATE TABLE IF NOT EXISTS `pharmacist` (
  `ph_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`ph_id`)
) ENGINE=MyISAM AUTO_INCREMENT=601 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`ph_id`, `name`) VALUES
(600, 'kumari');

-- --------------------------------------------------------

--
-- Table structure for table `presciption`
--

DROP TABLE IF EXISTS `presciption`;
CREATE TABLE IF NOT EXISTS `presciption` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `NIC` varchar(10) NOT NULL,
  `medicine` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7006 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presciption`
--

INSERT INTO `presciption` (`p_id`, `NIC`, `medicine`, `qty`, `order_no`) VALUES
(7000, '123456789v', 'pandol', 5, 0),
(7003, '123456789v', 'pandol', 4, 219064408),
(7004, '987654321v', 'pandol', 1, NULL),
(7005, '334444555v', 'pandol', 50000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(20) DEFAULT NULL,
  `results` varchar(100) DEFAULT NULL,
  `s_received_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `s_tested_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `technician_remarks` varchar(200) DEFAULT NULL,
  `fees` double DEFAULT NULL,
  `link_to_softcopy` varchar(200) DEFAULT NULL,
  `t_id` int(11) DEFAULT NULL,
  `NIC` varchar(10) NOT NULL,
  PRIMARY KEY (`r_id`),
  KEY `FK` (`t_id`),
  KEY `NIC` (`NIC`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`r_id`, `type`, `results`, `s_received_date`, `s_tested_date`, `technician_remarks`, `fees`, `link_to_softcopy`, `t_id`, `NIC`) VALUES
(1, 'scan', '', '2019-12-27 08:22:07', '2019-12-27 18:30:00', '', 2000, 'asceso.lab?id=123', 2001, '123456789v'),
(2, 'scan', NULL, '2019-12-04 18:30:00', '2019-12-30 18:30:00', 'everything is fine', 2000, 'asceso.lab?id=234', 2001, '987654321v'),
(3, 'scan', '', '2019-07-05 18:30:00', '2019-12-23 18:30:00', 'reports are normal', 1200, 'asceso.lab?id=001', 2000, '987654321v');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `b_id` int(11) NOT NULL AUTO_INCREMENT,
  `d_id` int(11) NOT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
