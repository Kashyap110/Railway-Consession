-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2023 at 10:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentconcession`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `p_id` int(11) NOT NULL,
  `p_mob` varchar(12) NOT NULL,
  `p_dob` date NOT NULL,
  `p_address` varchar(70) NOT NULL,
  `p_city` varchar(30) NOT NULL,
  `p_state` varchar(30) NOT NULL,
  `p_sem` int(11) NOT NULL,
  `p_year` varchar(30) NOT NULL,
  `p_program` varchar(30) NOT NULL,
  `p_branch` varchar(30) NOT NULL,
  `p_regid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`p_id`, `p_mob`, `p_dob`, `p_address`, `p_city`, `p_state`, `p_sem`, `p_year`, `p_program`, `p_branch`, `p_regid`) VALUES
(6, '9769514275', '2002-12-06', 'Jasmine,Sundarvan Park, Samta Nagar, Shirwadkar road', 'Thane', 'Maharashtra', 5, 'Third Year', 'B.Tech', 'Information Technology', 201081007);

-- --------------------------------------------------------

--
-- Table structure for table `passdetails`
--

CREATE TABLE `passdetails` (
  `p_tk` varchar(30) NOT NULL,
  `p_class` text NOT NULL,
  `prev_startstation` varchar(50) NOT NULL,
  `prev_endstation` varchar(30) NOT NULL,
  `p_startdate` date NOT NULL,
  `end_date` date NOT NULL,
  `curr_startstation` varchar(50) NOT NULL,
  `curr_endstation` varchar(30) NOT NULL,
  `p_period` varchar(10) NOT NULL,
  `curr_class` varchar(10) NOT NULL,
  `p_regid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passdetails`
--

INSERT INTO `passdetails` (`p_tk`, `p_class`, `prev_startstation`, `prev_endstation`, `p_startdate`, `end_date`, `curr_startstation`, `curr_endstation`, `p_period`, `curr_class`, `p_regid`) VALUES
('674548', 'First', 'Thane', 'Dadar', '2022-11-24', '2023-02-02', 'Thane', 'Dadar', 'Quarterly', 'First', 201081007);

-- --------------------------------------------------------

--
-- Table structure for table `requestnew`
--

CREATE TABLE `requestnew` (
  `pid` int(11) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `degree` varchar(50) NOT NULL,
  `years` text NOT NULL,
  `duration` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `sfrom` varchar(100) NOT NULL,
  `sto` varchar(100) NOT NULL,
  `adhar` varchar(200) NOT NULL,
  `id` varchar(200) NOT NULL,
  `stat` varchar(100) NOT NULL,
  `expire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestnew`
--

INSERT INTO `requestnew` (`pid`, `surname`, `fname`, `dob`, `degree`, `years`, `duration`, `class`, `sfrom`, `sto`, `adhar`, `id`, `stat`, `expire`) VALUES
(1, 'Chavhan', 'Kashyap', '0000-00-00', 'Diploma', 'FY', 'Monthly', '1st Class', 'dadar', 'mil', 'uploads/jb.png', 'uploads/jb2.png', 'Approved', ''),
(4, 'xyz', 'abc', '0000-00-00', 'M.Tech', 'TY', 'Quarterly', '2nd Class', 'Virar', 'Kalyan', 'uploads/adhar1.jpg', 'uploads/collegid1.jpg', 'Approved', ''),
(5, 'Shetty', 'Kartik', '0000-00-00', 'Diploma', 'FINAL YR.', 'Monthly', '1st Class', 'andheri', 'wadala', 'uploads/adhar2.jpg', 'uploads/collegid1.jpg', 'Disapproved', ''),
(6, 'b', 'a', '0000-00-00', 'M.Tech', 'SY', 'Monthly', '2nd Class', 'virar', 'dadar', 'uploads/adhar1.jpg', 'uploads/collegid1.jpg', 'Approved', '2023/02/14'),
(7, 'c', 'd', '0000-00-00', 'M.Tech', 'SY', 'Monthly', '1st Class', 'dadar', 'kalyan', 'uploads/adhar1.jpg', 'uploads/collegid1.jpg', 'Pending', ''),
(8, 'Chavhan', 'Kashyap', '0000-00-00', 'M.Tech', 'SY', 'Quarterly', '2nd Class', 'dadar', 'panvel', 'uploads/adhar1.jpg', 'uploads/collegid1.jpg', 'Approved', '2023/02/14');

-- --------------------------------------------------------

--
-- Table structure for table `requestrenew`
--

CREATE TABLE `requestrenew` (
  `ticketno` varchar(250) NOT NULL,
  `ticketfile` varchar(200) NOT NULL,
  `stat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestrenew`
--

INSERT INTO `requestrenew` (`ticketno`, `ticketfile`, `stat`) VALUES
('1', 'uploads/bhj.png', 'Disapproved'),
('322', 'uploads/Local-Train-Ticket.jpg', 'Approved'),
('5664656', 'uploads/bhj.png', 'Approved'),
('5664657', 'uploads/bhj.png', ''),
('5664658', 'uploads/bhj.png', ''),
('5664659', 'uploads/bhj.png', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `p_fname` varchar(30) NOT NULL,
  `p_lname` varchar(30) NOT NULL,
  `p_regid` int(11) NOT NULL,
  `p_email` varchar(30) NOT NULL,
  `p_password` varchar(10) NOT NULL,
  `p_gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`p_fname`, `p_lname`, `p_regid`, `p_email`, `p_password`, `p_gender`) VALUES
('Kashyap', 'Chavhan', 201080013, 'kashyapchavhan1106@gmail.com', 'Kashyap@12', 'male'),
('Saniya', 'Gupte', 201081007, 'sugupte_b20@it.vjti.ac.in', '12345678', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_regid_fk` (`p_regid`);

--
-- Indexes for table `passdetails`
--
ALTER TABLE `passdetails`
  ADD PRIMARY KEY (`p_tk`),
  ADD KEY `p_regid_fk` (`p_regid`);

--
-- Indexes for table `requestnew`
--
ALTER TABLE `requestnew`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `requestrenew`
--
ALTER TABLE `requestrenew`
  ADD PRIMARY KEY (`ticketno`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`p_regid`),
  ADD UNIQUE KEY `p_email` (`p_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requestnew`
--
ALTER TABLE `requestnew`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `details`
--
ALTER TABLE `details`
  ADD CONSTRAINT `details_ibfk_1` FOREIGN KEY (`p_regid`) REFERENCES `students` (`p_regid`);

--
-- Constraints for table `passdetails`
--
ALTER TABLE `passdetails`
  ADD CONSTRAINT `passdetails_ibfk_1` FOREIGN KEY (`p_regid`) REFERENCES `students` (`p_regid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
