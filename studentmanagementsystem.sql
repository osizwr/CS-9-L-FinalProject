-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 25, 2024 at 06:49 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradeID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `grade` decimal(2,0) NOT NULL,
  `semester` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `dateofbirth` date NOT NULL,
  `address` varchar(75) NOT NULL,
  `contactNo` int(11) NOT NULL,
  `email` varchar(75) NOT NULL,
  `enrollmentYear` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectID` int(11) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `subject Description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `userLogin` varchar(24) NOT NULL,
  `userPass` varchar(12) NOT NULL,
  `userRole` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceID`),
  ADD KEY `studentID` (`studentID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `subjectID` (`subjectID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`subjectID`) REFERENCES `subjects` (`subjectID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `StudentID` FOREIGN KEY (`studentID`) REFERENCES `grades` (`gradeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
