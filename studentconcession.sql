-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2022 at 03:28 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
  `p_mob` int(11) NOT NULL,
  `p_dob` date NOT NULL,
  `p_address` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `p_state` varchar(30) NOT NULL,
  `p_sem` int(11) NOT NULL,
  `p_year` varchar(30) NOT NULL,
  `p_program` varchar(50) NOT NULL,
  `p_branch` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`p_mob`, `p_dob`, `p_address`, `city`, `p_state`, `p_sem`, `p_year`, `p_program`, `p_branch`) VALUES
(543, '0000-00-00', '$address', '$city', '$state', 5, '$year', '$program', '$branch');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `p_fname` varchar(50) DEFAULT NULL,
  `p_lname` varchar(50) DEFAULT NULL,
  `p_regid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `p_gender` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`p_fname`, `p_lname`, `p_regid`, `email`, `password`, `p_gender`) VALUES
('Saniya', 'Gupte', 201081007, 'abc@gmail.com', 'rose4567', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`p_regid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
