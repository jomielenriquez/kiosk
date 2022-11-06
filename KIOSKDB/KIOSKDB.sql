-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2022 at 04:26 AM
-- Server version: 10.5.15-MariaDB-0+deb11u1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KIOSKDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcontent`
--

CREATE TABLE `tblcontent` (
  `cid` int(11) NOT NULL,
  `filetype` varchar(10) NOT NULL,
  `filelocation` varchar(250) DEFAULT NULL,
  `filename` varchar(500) DEFAULT NULL,
  `textheader` varchar(50) DEFAULT NULL,
  `textcontent` varchar(50) DEFAULT NULL,
  `bc` varchar(50) DEFAULT NULL,
  `textcolor` varchar(50) DEFAULT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsystemparameter`
--

CREATE TABLE `tblsystemparameter` (
  `paraid` int(11) NOT NULL,
  `parameter` varchar(50) NOT NULL,
  `paravalue` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsystemparameter`
--

INSERT INTO `tblsystemparameter` (`paraid`, `parameter`, `paravalue`) VALUES
(1, 'PASS', 'ADMIN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcontent`
--
ALTER TABLE `tblcontent`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `tblsystemparameter`
--
ALTER TABLE `tblsystemparameter`
  ADD PRIMARY KEY (`paraid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcontent`
--
ALTER TABLE `tblcontent`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsystemparameter`
--
ALTER TABLE `tblsystemparameter`
  MODIFY `paraid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
