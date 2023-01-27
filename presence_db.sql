-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 10:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `presence_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `usertype` varchar(99) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `usertype`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec'),
(12344444, 'teacher', '1234RD', '02e952f0abcd9e4e6cf2a8a6ba7247f155bcc6ca6efc79d219634867e8932226b0b294feb4a750b1b05cf2c0c6eb4bf1d14751d98a5429c029f39e3b147c07dc'),
(192091996, 'student', 'TNHS1920RM', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79'),
(194422487, 'student', 'TNHS1944JA', '02e952f0abcd9e4e6cf2a8a6ba7247f155bcc6ca6efc79d219634867e8932226b0b294feb4a750b1b05cf2c0c6eb4bf1d14751d98a5429c029f39e3b147c07dc'),
(736483648, 'student', 'TNHS7364BB', '02e952f0abcd9e4e6cf2a8a6ba7247f155bcc6ca6efc79d219634867e8932226b0b294feb4a750b1b05cf2c0c6eb4bf1d14751d98a5429c029f39e3b147c07dc'),
(909090901, 'student', 'TNHS9090AL', '02e952f0abcd9e4e6cf2a8a6ba7247f155bcc6ca6efc79d219634867e8932226b0b294feb4a750b1b05cf2c0c6eb4bf1d14751d98a5429c029f39e3b147c07dc');

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `userID` varchar(99) NOT NULL,
  `FirstName` varchar(99) NOT NULL,
  `LastName` varchar(99) NOT NULL,
  `usertype` varchar(99) NOT NULL,
  `Activity` varchar(200) NOT NULL,
  `ordering` int(255) NOT NULL,
  `Date` varchar(99) NOT NULL,
  `Time` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`userID`, `FirstName`, `LastName`, `usertype`, `Activity`, `ordering`, `Date`, `Time`) VALUES
('12344444', 'Rhyan', 'De Loyola', 'Teacher', 'has logged in.', 186, '27/01/2023', '02:55:28pm'),
('12344444', 'Rhyan', 'De Loyola', 'Teacher', 'added an attendance.', 187, '27/01/2023', '02:56:04pm'),
('192091996', 'Raymond John', 'Managuit', 'Student', 'has logged in.', 188, '27/01/2023', '02:57:01pm'),
('192091996', 'Raymond John', 'Managuit', 'Student', 'changed password.', 189, '27/01/2023', '02:57:52pm'),
('192091996', 'Raymond John', 'Managuit', 'Student', 'has logged out.', 190, '27/01/2023', '02:57:57pm'),
('12344444', 'Rhyan', 'De Loyola', 'Teacher', 'has logged in.', 191, '27/01/2023', '03:31:42pm'),
('12344444', 'Rhyan', 'De Loyola', 'Teacher', 'has logged in.', 192, '27/01/2023', '04:11:35pm');

-- --------------------------------------------------------

--
-- Table structure for table `attendancelogs`
--

CREATE TABLE `attendancelogs` (
  `RFID` varchar(10) NOT NULL,
  `Date` varchar(99) NOT NULL,
  `Time` varchar(99) NOT NULL,
  `Subject` varchar(99) NOT NULL,
  `id` varchar(99) NOT NULL,
  `Ordering` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendancelogs`
--

INSERT INTO `attendancelogs` (`RFID`, `Date`, `Time`, `Subject`, `id`, `Ordering`) VALUES
('0005398538', '27/01/2023', '02:56:04pm', 'Mathematics', '12344444', 101);

-- --------------------------------------------------------

--
-- Table structure for table `datetrial`
--

CREATE TABLE `datetrial` (
  `DateTime` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datetrial`
--

INSERT INTO `datetrial` (`DateTime`) VALUES
('2023-01-10');

-- --------------------------------------------------------

--
-- Table structure for table `guardian_info`
--

CREATE TABLE `guardian_info` (
  `Stud_ID` varchar(10) DEFAULT NULL,
  `GuardianFirstName` varchar(20) DEFAULT NULL,
  `GuardianLastName` varchar(20) DEFAULT NULL,
  `TelPhone` varchar(99) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guardian_info`
--

INSERT INTO `guardian_info` (`Stud_ID`, `GuardianFirstName`, `GuardianLastName`, `TelPhone`) VALUES
('909090901', 'Josette', 'Lorayna', '09614753331'),
('192091996', 'Raymundo', 'Managuit', '09614753331'),
('736483648', 'Jojie', 'Besas', '09614753331'),
('194422487', 'Jessie Rose', 'Ausan', '09614753331');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentName` varchar(99) NOT NULL,
  `Time` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `studentin`
--

CREATE TABLE `studentin` (
  `Name` varchar(99) NOT NULL,
  `Date` varchar(99) NOT NULL,
  `Time` varchar(99) NOT NULL,
  `ordering` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentin`
--

INSERT INTO `studentin` (`Name`, `Date`, `Time`, `ordering`) VALUES
('Christian Marc Nico Alingasa', '27/01/2023', '02:18:54 PM', 10),
('Raymond John Managuit', '27/01/2023', '02:59:40 PM', 11),
('Raymond John Managuit', '27/01/2023', '03:16:07 PM', 12),
('Christian Marc Nico Alingasa', '27/01/2023', '03:41:57 PM', 13);

-- --------------------------------------------------------

--
-- Table structure for table `studentout`
--

CREATE TABLE `studentout` (
  `Name` varchar(99) NOT NULL,
  `Date` varchar(99) NOT NULL,
  `Time` varchar(99) NOT NULL,
  `ordering` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentout`
--

INSERT INTO `studentout` (`Name`, `Date`, `Time`, `ordering`) VALUES
('Christian Marc Nico Alingasa', '27/01/2023', '02:50:02 PM', 8),
('Raymond John Managuit', '27/01/2023', '03:14:32 PM', 9),
('Raymond John Managuit', '27/01/2023', '03:16:27 PM', 10);

-- --------------------------------------------------------

--
-- Table structure for table `student_archive`
--

CREATE TABLE `student_archive` (
  `StudentID` varchar(99) NOT NULL,
  `RFID` varchar(99) NOT NULL,
  `FirstName` varchar(99) NOT NULL,
  `LastName` varchar(99) NOT NULL,
  `Grade` varchar(99) NOT NULL,
  `Section` varchar(99) NOT NULL,
  `Address` varchar(99) NOT NULL,
  `GuardianFirstName` varchar(99) NOT NULL,
  `GuardianLastName` varchar(99) NOT NULL,
  `TelPhone` varchar(99) NOT NULL,
  `usertype` varchar(99) NOT NULL,
  `username` varchar(99) NOT NULL,
  `Date` varchar(99) NOT NULL,
  `Time` varchar(99) NOT NULL,
  `ordering` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_archive`
--

INSERT INTO `student_archive` (`StudentID`, `RFID`, `FirstName`, `LastName`, `Grade`, `Section`, `Address`, `GuardianFirstName`, `GuardianLastName`, `TelPhone`, `usertype`, `username`, `Date`, `Time`, `ordering`) VALUES
('192244487', '0626000843', 'Christian Marc Nico', 'Alingasa', 'Grade 12', '', 'Purok Matam-is', 'Stella', 'Santinor', '09614753331', 'student', 'TNHS1922CA', '27/01/2023', '02:54:33pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `StudentID` int(11) NOT NULL,
  `RFID` varchar(10) DEFAULT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `Grade` varchar(99) DEFAULT NULL,
  `Section` varchar(99) NOT NULL,
  `Address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`StudentID`, `RFID`, `FirstName`, `LastName`, `Grade`, `Section`, `Address`) VALUES
(192091996, '0021911914', 'Raymond John', 'Managuit', 'Grade 12', 'Ruby', 'Purok Chingchong'),
(194422487, '0626154219', 'John Marc Rico', 'Alingasa', 'Grade 12', 'Ruby', 'Purok Matam-is'),
(736483648, '0009899610', 'Bernie Mel', 'Besas', 'Grade 12', 'Amethyst', 'Purok Tamborong'),
(909090901, '0005398538', 'Alyssa Marie', 'Lorayna', 'Grade 12', 'Jade', 'Purok Diwata');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_archive`
--

CREATE TABLE `teacher_archive` (
  `TeacherID` varchar(99) NOT NULL,
  `FirstName` varchar(99) NOT NULL,
  `LastName` varchar(99) NOT NULL,
  `usertype` varchar(99) NOT NULL,
  `username` varchar(99) NOT NULL,
  `Date` varchar(99) NOT NULL,
  `Time` varchar(99) NOT NULL,
  `ordering` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `TeacherID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`TeacherID`, `FirstName`, `LastName`) VALUES
(12344444, 'Rhyan', 'De Loyola');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`ordering`);

--
-- Indexes for table `attendancelogs`
--
ALTER TABLE `attendancelogs`
  ADD PRIMARY KEY (`Ordering`);

--
-- Indexes for table `guardian_info`
--
ALTER TABLE `guardian_info`
  ADD UNIQUE KEY `Stud_ID` (`Stud_ID`);

--
-- Indexes for table `studentin`
--
ALTER TABLE `studentin`
  ADD PRIMARY KEY (`ordering`);

--
-- Indexes for table `studentout`
--
ALTER TABLE `studentout`
  ADD PRIMARY KEY (`ordering`);

--
-- Indexes for table `student_archive`
--
ALTER TABLE `student_archive`
  ADD PRIMARY KEY (`ordering`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `teacher_archive`
--
ALTER TABLE `teacher_archive`
  ADD PRIMARY KEY (`ordering`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `ordering` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `attendancelogs`
--
ALTER TABLE `attendancelogs`
  MODIFY `Ordering` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `studentin`
--
ALTER TABLE `studentin`
  MODIFY `ordering` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `studentout`
--
ALTER TABLE `studentout`
  MODIFY `ordering` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_archive`
--
ALTER TABLE `student_archive`
  MODIFY `ordering` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_archive`
--
ALTER TABLE `teacher_archive`
  MODIFY `ordering` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
