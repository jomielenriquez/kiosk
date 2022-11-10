-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2022 at 08:20 AM
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

--
-- Dumping data for table `tblcontent`
--

INSERT INTO `tblcontent` (`cid`, `filetype`, `filelocation`, `filename`, `textheader`, `textcontent`, `bc`, `textcolor`, `order`) VALUES
(3, 'IMG', ' ', 'https://images.examples.com/wp-content/uploads/2018/10/Vintage-Concert-Poster-Template.jpg', ' ', ' ', ' ', ' ', 1),
(5, 'IMG', ' ', 'https://venngage-wordpress.s3.amazonaws.com/uploads/2018/11/Blue-Conservation-Creative-Poster-Example-Template.jpg', ' ', ' ', ' ', ' ', 3),
(6, 'IMG', ' ', 'https://img.freepik.com/free-vector/music-event-poster-with-photo_52683-42061.jpg?w=2000', ' ', ' ', ' ', ' ', 4),
(7, 'IMG', ' ', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/birthday-celebration-poster-design-template-c5004390166467beb97bda3cd476bb87_screen.jpg?ts=1633119555', ' ', ' ', ' ', ' ', 5),
(8, 'IMG', ' ', 'https://cdn.dribbble.com/users/5702172/screenshots/13243989/goodluckexam.png', ' ', ' ', ' ', ' ', 6),
(9, 'IMG', ' ', 'https://c8.alamy.com/comp/2BG7H7E/attention-please-vector-poster-with-voice-megaphone-speech-announcement-poster-alert-message-from-bullhorn-illustration-2BG7H7E.jpg', ' ', ' ', ' ', ' ', 7),
(10, 'IMG', ' ', 'https://pub-static.fotor.com/assets/projects/pages/5ba2936e-e825-4333-8bdf-3374328b4047/300w/yellow-news-announcement-1146f834-dcf9-4bb0-adbc-1e78ed1a391e.jpg', ' ', ' ', ' ', ' ', 8),
(11, 'IMG', ' ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3UTLW1wXqLazzYWqnV3kWyEMyfnCrEWrwlNZnn4CO4TIUPtXX4YyKU4UKgA3F-5Ejzwo&usqp=CAU', ' ', ' ', ' ', ' ', 9),
(13, 'VID', ' ', 'https://media.w3.org/2010/05/sintel/trailer.mp4', ' ', ' ', ' ', ' ', 11),
(14, 'IMG', ' ', '/img/malvar-rm.png', ' ', ' ', ' ', ' ', 12),
(15, 'TXT', ' ', ' ', 'header', 'This is a test', 'black', 'white', 13),
(17, 'VID', ' ', '/img/2022-10-07 13-20-47.mp4', '', '', '#000000', '#ffffff', 0),
(22, 'TXT', ' ', '/img/', 'TEST', 'TEST', '#00663a', '#ffffff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblsystemparameter`
--

CREATE TABLE `tblsystemparameter` (
  `paraid` int(11) NOT NULL,
  `parameter` varchar(50) NOT NULL,
  `paravalue` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsystemparameter`
--

INSERT INTO `tblsystemparameter` (`paraid`, `parameter`, `paravalue`) VALUES
(1, 'PASS', 'ADMIN'),
(3, 'NAME', 'MALVAR SENIOR HIGH SCHOOL'),
(4, 'UPD', '0');

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
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tblsystemparameter`
--
ALTER TABLE `tblsystemparameter`
  MODIFY `paraid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
