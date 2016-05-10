-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 05:17 PM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_bl_ins`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_info`
--

CREATE TABLE IF NOT EXISTS `address_info` (
  `MSISDN` varchar(16) DEFAULT NULL,
  `ADDRESS` text,
  `THANA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `a_id` int(11) NOT NULL,
  `a_fullname` varchar(500) NOT NULL,
  `a_username` varchar(100) NOT NULL,
  `a_password` varchar(100) NOT NULL,
  `a_role` int(11) NOT NULL COMMENT '0=Admin,1=Customer care,2=Finance,3=Distributor'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_fullname`, `a_username`, `a_password`, `a_role`) VALUES
(2, 'Alexis Beasley', 'qihatyd', 'Pa$$w0rd!', 2),
(3, 'Sarah Conner', 'nawovumo', 'Pa$$w0rd!', 1),
(4, 'Julian Moody', 'leterifoz', 'Pa$$w0rd!', 0),
(5, 'khan', 'admin', '1234', 0),
(6, 'samual', 'sam', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bd_thana_list`
--

CREATE TABLE IF NOT EXISTS `bd_thana_list` (
  `ID` int(11) DEFAULT NULL,
  `THANA` varchar(100) DEFAULT NULL,
  `DISTRICT` varchar(100) DEFAULT NULL,
  `DIVISION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE IF NOT EXISTS `event_log` (
  `ID` bigint(20) DEFAULT NULL,
  `MSISDN` varchar(16) DEFAULT NULL,
  `TIME` datetime DEFAULT NULL,
  `MESSAGE` text,
  `GATEWAY` varchar(4) DEFAULT NULL,
  `TYPE` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gui_reg_history`
--

CREATE TABLE IF NOT EXISTS `gui_reg_history` (
  `MSISDN` varchar(16) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL,
  `USER_ID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gui_reg_history`
--

INSERT INTO `gui_reg_history` (`MSISDN`, `DATE`, `USER_ID`) VALUES
('01935834011', '2015-10-18 07:55:54', '5'),
('01935834011', '2015-10-18 08:15:41', '5'),
('01935834011', '2015-10-18 08:36:56', '5'),
('01935834011', '2015-10-18 08:45:24', '5'),
('01935734011', '2015-10-18 08:50:32', '5'),
('01926087526', '2015-10-25 07:56:59', '5'),
('01926087526', '2015-10-25 08:53:08', '5'),
('8801915580403', '2015-11-09 17:03:06', '0');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_pack_info`
--

CREATE TABLE IF NOT EXISTS `insurance_pack_info` (
  `ID` int(11) NOT NULL,
  `INSURANCE_TYPE` int(11) NOT NULL,
  `INSURANCE_VALUE` int(11) NOT NULL,
  `INSURANCE_PACK` text NOT NULL,
  `POINT` int(11) NOT NULL,
  `REPLY` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_pack_info`
--

INSERT INTO `insurance_pack_info` (`ID`, `INSURANCE_TYPE`, `INSURANCE_VALUE`, `INSURANCE_PACK`, `POINT`, `REPLY`) VALUES
(1, 1, 15000, 'Tk.15000 for 30 Points per month', 30, 'Poroborti mash theke apni 30 prize point er binimoye  pacchen tk.15000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 30 point orjon korun'),
(2, 1, 20000, 'Tk.20000 for 35 Points per month', 35, 'Poroborti mash theke apni 35 prize point er binimoye pacchen tk.20000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 35 point orjon korun'),
(3, 1, 30000, 'Tk.30000 for 45 Points per month', 45, 'Agami mash theke apni 45 prize point er binimoye pacchen tk30000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 45 point orjon korun'),
(4, 1, 50000, 'Tk.50000 for 95 Points per month', 95, 'Agami mash theke apni 95 prize point er binimoye pacchen tk50000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 95 point orjon korun'),
(5, 1, 100000, 'Tk.100000 for 200 Points per month', 200, 'Poroborti mash theke apni 200 prize point er binimoye pacchen tk100000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 200 point orjon korun'),
(6, 1, 1000000, 'Tk.1000000 for 2000 Points per month', 2000, 'Poroborti mash theke apni 2000 prize point er binimoye pacchen tk10 Lac er insurance coverage.Insurance coverage chalu rakhte proti mashe 2000 point orjon korun'),
(7, 2, 15000, 'Tk.15000 for 30 Points per month', 30, 'Poroborti mash theke apni 30 prize point er binimoye  pacchen tk.15000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 30 point orjon korun'),
(8, 2, 20000, 'Tk.20000 for 35 Points per month', 35, 'Poroborti mash theke apni 35 prize point er binimoye pacchen tk.20000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 35 point orjon korun'),
(9, 2, 30000, 'Tk.30000 for 45 Points per month', 45, 'Agami mash theke apni 45 prize point er binimoye pacchen tk30000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 45 point orjon korun'),
(10, 2, 50000, 'Tk.50000 for 95 Points per month', 95, 'Agami mash theke apni 95 prize point er binimoye pacchen tk50000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 95 point orjon korun'),
(11, 2, 100000, 'Tk.100000 for 200 Points per month', 200, 'Poroborti mash theke apni 200 prize point er binimoye pacchen tk100000 er insurance coverage.Insurance coverage chalu rakhte proti mashe 200 point orjon korun'),
(12, 2, 1000000, 'Tk.1000000 for 2000 Points per month', 2000, 'Poroborti mash theke apni 2000 prize point er binimoye pacchen tk10 Lac er insurance coverage.Insurance coverage chalu rakhte proti mashe 2000 point orjon korun'),
(13, 3, 0, 'No Pacakage', 0, 'No pacakage taken');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_type_info`
--

CREATE TABLE IF NOT EXISTS `insurance_type_info` (
  `ID` int(11) NOT NULL,
  `INSURANCE_TYPE` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_type_info`
--

INSERT INTO `insurance_type_info` (`ID`, `INSURANCE_TYPE`) VALUES
(1, 'Islamic Life Insurance'),
(2, 'General Life Insurance'),
(3, 'No Pacakage');

-- --------------------------------------------------------

--
-- Table structure for table `nominee_info`
--

CREATE TABLE IF NOT EXISTS `nominee_info` (
  `MSISDN` varchar(16) NOT NULL,
  `NAME` varchar(155) DEFAULT NULL,
  `NID` varchar(15) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `RELATION` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominee_info`
--

INSERT INTO `nominee_info` (`MSISDN`, `NAME`, `NID`, `AGE`, `RELATION`) VALUES
('01926087526', 'jakel', '.', 18, 'brother'),
('8801915580403', 'hudai', NULL, 22, 'brother');

-- --------------------------------------------------------

--
-- Table structure for table `retailer_referral_info`
--

CREATE TABLE IF NOT EXISTS `retailer_referral_info` (
  `NO` bigint(20) DEFAULT NULL,
  `DATE` datetime DEFAULT NULL,
  `MSISDN` varchar(16) DEFAULT NULL,
  `REFERRAL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `thana_suggestion`
--

CREATE TABLE IF NOT EXISTS `thana_suggestion` (
  `ID` bigint(20) DEFAULT NULL,
  `MSISDN` varchar(16) DEFAULT NULL,
  `SUGGESTION` int(11) DEFAULT NULL,
  `THANA` varchar(100) DEFAULT NULL,
  `KEYWORD` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1

;

-- --------------------------------------------------------

--
-- Table structure for table `thana_suggestion_archive`
--

CREATE TABLE IF NOT EXISTS `thana_suggestion_archive` (
  `ID` bigint(20) DEFAULT NULL,
  `MSISDN` varchar(16) NOT NULL,
  `SUGGESTION` int(11) DEFAULT NULL,
  `THANA` varchar(100) DEFAULT NULL,
  `KEYWORD` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1

;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
  `ID` bigint(20) NOT NULL,
  `NAME` varchar(155) DEFAULT NULL,
  `NID` varchar(20) DEFAULT NULL,
  `AGE` int(11) DEFAULT NULL,
  `DATEOFBIRTH` varchar(12) DEFAULT NULL,
  `STATUS` int(11) DEFAULT NULL,
  `DECLARATION` int(11) DEFAULT NULL,
  `INSURANCE_PACK` int(11) NOT NULL,
  `REGISTRATION_DATE` datetime DEFAULT NULL,
  `ACTIVATION_DATE` datetime DEFAULT NULL,
  `MSISDN` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`ID`, `NAME`, `NID`, `AGE`, `DATEOFBIRTH`, `STATUS`, `DECLARATION`, `INSURANCE_PACK`, `REGISTRATION_DATE`, `ACTIVATION_DATE`, `MSISDN`) VALUES
(1, 'sam', '1111111111111', 22, '.', 5, 0, 13, '2015-10-25 08:53:09', '2015-10-25 08:53:09', '01926087526'),
(2, 'sam', '1111111111111', 22, NULL, 5, 0, 1, '2015-11-09 17:03:07', '2015-11-09 17:03:07', '8801915580403');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `insurance_pack_info`
--
ALTER TABLE `insurance_pack_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `insurance_type_info`
--
ALTER TABLE `insurance_type_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `insurance_pack_info`
--
ALTER TABLE `insurance_pack_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `insurance_type_info`
--
ALTER TABLE `insurance_type_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `Run_daily_proc` ON SCHEDULE EVERY 1 DAY STARTS '2014-06-16 00:00:00' ON COMPLETION PRESERVE ENABLE DO call daily_user_dump(day)$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
