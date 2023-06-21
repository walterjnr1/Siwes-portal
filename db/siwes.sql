-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 08:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siwes`
--

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `ID` int(5) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `session_siwes` varchar(20) NOT NULL,
  `attendance_score` varchar(50) NOT NULL,
  `punctuality_score` varchar(50) NOT NULL,
  `performance_score` varchar(50) NOT NULL,
  `relationship_score` varchar(50) NOT NULL,
  `logbook_score` varchar(50) NOT NULL,
  `physicalpresence_score` varchar(50) NOT NULL,
  `interview_score` varchar(50) NOT NULL,
  `report_score` varchar(50) NOT NULL,
  `defense_score` varchar(50) NOT NULL,
  `total_score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblgroup`
--

CREATE TABLE `tblgroup` (
  `ID` int(4) NOT NULL,
  `groupname` varchar(44) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgroup`
--

INSERT INTO `tblgroup` (`ID`, `groupname`) VALUES
(2, 'Institution Supervisor'),
(3, 'Siwes Coordinator'),
(4, 'Industry Supervisor'),
(5, 'Nil');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `ID` int(5) NOT NULL,
  `reg_num` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `dept` varchar(100) NOT NULL,
  `siwes_place` varchar(300) NOT NULL,
  `siwes_supervisor` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `photo` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`ID`, `reg_num`, `password`, `fullname`, `email`, `address`, `state`, `dept`, `siwes_place`, `siwes_supervisor`, `status`, `photo`) VALUES
(17, 'CST/17/COM/01015', '12345678', 'OKON Usoro Joseph', 'asdmin@adminerre.com', 'DSDS', 'FCT', 'Computer Science', 'DSD', 'Dr. Sanni Adamu', '1', 'uploadImage/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `upload_logbook`
--

CREATE TABLE `upload_logbook` (
  `ID` int(4) NOT NULL,
  `log_week` varchar(3) NOT NULL,
  `date_upload` varchar(20) NOT NULL,
  `reg_num` varchar(20) NOT NULL,
  `topic` varchar(200) NOT NULL,
  `log_book` varchar(5000) NOT NULL,
  `comment` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `lastaccess` varchar(35) NOT NULL,
  `last_ip` varchar(20) NOT NULL,
  `groupname` varchar(40) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL,
  `photo` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `email`, `password`, `fullname`, `dept`, `lastaccess`, `last_ip`, `groupname`, `phone`, `status`, `photo`) VALUES
(2, 'goodgruy09@gmail.com', '12345678', 'Godwin Silas', 'Computer Science', '2023-06-08 09:29:01', '::1', 'Institution Supervisor', '0905963442', 'Active', 'uploadImage/a7.jpg'),
(3, 'admin@admin.com', 'admin123', 'Dr. Sanni Adamu', 'Computer Science', '2023-06-12 17:33:54', '::1', 'Siwes Coordinator', '08067361023', 'Active', 'uploadImage/5.png'),
(4, 'ibra@yahoo.com', '12345678', 'Solomon Ibrahim', 'Computer Science', '2023-06-12 18:17:49', '::1', 'Industry Supervisor', '0903787963', 'Active', 'uploadImage/a2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `websiteinfo`
--

CREATE TABLE `websiteinfo` (
  `ID` int(4) NOT NULL,
  `website_name` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phone1` varchar(15) NOT NULL,
  `phone2` varchar(15) NOT NULL,
  `address` varchar(300) NOT NULL,
  `url` varchar(100) NOT NULL,
  `logo` varchar(300) NOT NULL,
  `favicon` varchar(400) NOT NULL,
  `SMS_username` varchar(44) NOT NULL,
  `SMS_password` varchar(44) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `websiteinfo`
--

INSERT INTO `websiteinfo` (`ID`, `website_name`, `email`, `phone1`, `phone2`, `address`, `url`, `logo`, `favicon`, `SMS_username`, `SMS_password`) VALUES
(12, 'Design and implementation of SIWES system', 'Admin@siwes-bayero.edu', '+234712 292544', '08080934538', 'Kano', 'https://www.siwes.bayero.edu/', 'uploadImage/logo.jpg', 'uploadImage/logo.jpg', 'rexrolex0@gmail.com', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblgroup`
--
ALTER TABLE `tblgroup`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upload_logbook`
--
ALTER TABLE `upload_logbook`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblgroup`
--
ALTER TABLE `tblgroup`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `upload_logbook`
--
ALTER TABLE `upload_logbook`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `websiteinfo`
--
ALTER TABLE `websiteinfo`
  MODIFY `ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
