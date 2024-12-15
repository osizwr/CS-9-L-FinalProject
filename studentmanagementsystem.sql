-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 15, 2024 at 09:11 PM
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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradeID` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `description` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`gradeID`, `grade`, `description`) VALUES
(1, '1.00', 'Excellent'),
(2, '1.25', 'Very Good'),
(3, '1.50', 'Very Good'),
(4, '1.75', 'Good'),
(5, '2.00', 'Good'),
(6, '1.25', 'Good'),
(7, '2.50', 'Fair'),
(8, '2.75', 'Fair'),
(9, '3.00', 'Pass'),
(10, '4.00', 'Conditional'),
(11, '5.00', 'Failure'),
(12, 'INC', 'Incomplete'),
(13, 'OD', 'Oficially Dropped'),
(14, 'UD', 'Unoficially Dropped'),
(15, 'NC', 'No Credit');

-- --------------------------------------------------------

--
-- Table structure for table `studentgrades`
--

CREATE TABLE `studentgrades` (
  `studentGradeID` int(11) NOT NULL,
  `studentSubjectID` int(11) NOT NULL,
  `gradeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `dateofbirth` date NOT NULL,
  `contactNo` varchar(15) NOT NULL,
  `email` varchar(75) NOT NULL,
  `street` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `city_province` varchar(50) DEFAULT NULL,
  `yearLevel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `firstName`, `lastName`, `middleName`, `dateofbirth`, `contactNo`, `email`, `street`, `barangay`, `city_province`, `yearLevel`) VALUES
(202040173, 'Mark Philip', 'Cacacha', '', '2024-12-01', '09063458583', '202040173@psu.palawan.edu.ph', NULL, NULL, NULL, '1st Year'),
(202040174, 'Zaria', 'Cajilo', '', '2024-12-02', '09064319066', '202040174@psu.palawan.edu.ph', '', '', '', '3rd Year'),
(202040175, 'Marvin Joseph', 'Cajilo', '', '0000-00-00', '09064319066', '202040175@psu.palawan.edu.ph', NULL, NULL, NULL, '1st Year'),
(202280208, 'Cyrus', 'Reyes', '', '2003-11-13', '09064319066', '202080208@psu.palawan.edu.ph', 'Purok Sariling Sikap', 'Bacungan', 'Puerto Princesa', '2nd Year');

-- --------------------------------------------------------

--
-- Table structure for table `studentsubjects`
--

CREATE TABLE `studentsubjects` (
  `studentSubjectID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `registrationDate` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentsubjects`
--

INSERT INTO `studentsubjects` (`studentSubjectID`, `studentID`, `subjectID`, `registrationDate`) VALUES
(4, 202280208, 14, '2024-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectID` int(11) NOT NULL,
  `subjectCode` varchar(25) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `subjectDescription` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectID`, `subjectCode`, `subjectName`, `subjectDescription`) VALUES
(14, 'CS 9/L', 'Advanced Database Systems', 'Advanced database systems try to meet the requirements of present-day database applications by offering advanced functionality in terms of data modeling, multimedia data type support, data integration'),
(15, 'CS E1/L', 'CS Elective 1', 'N/A'),
(16, 'dsa', 'CS Elective 1', ''),
(17, 'dsa', 'ds', 'ds'),
(19, 'session', 'sessionrrr', 'session');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(10) NOT NULL,
  `userLogin` varchar(75) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userRole` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userLogin`, `userPass`, `userRole`) VALUES
(4, '202040174@psu.palawan.edu.ph', 'Cajilo', 'Student'),
(6, '202040173@psu.palawan.edu.ph', 'Cacacha', 'Student'),
(17, '202280208@psu.palawan.edu.ph', 'Reyes', 'Student'),
(23, '202040175@psu.palawan.edu.ph', '$2y$10$pPNcnRrWDj5Hy173RQJ9M.CP9uuemueJ/opsj4sJjf73Uy887m86m', 'Student'),
(24, 'admin@admin.com', '$2y$10$qzmxXj7BwMMIDu0SrWVeteB3ktFd9IFkw.Thlx9e//d3wehLeeH9C', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeID`);

--
-- Indexes for table `studentgrades`
--
ALTER TABLE `studentgrades`
  ADD PRIMARY KEY (`studentGradeID`),
  ADD KEY `studentSubjectID` (`studentSubjectID`),
  ADD KEY `gradeID` (`gradeID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `studentID` (`studentID`,`contactNo`,`email`);

--
-- Indexes for table `studentsubjects`
--
ALTER TABLE `studentsubjects`
  ADD PRIMARY KEY (`studentSubjectID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `subjectID` (`subjectID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `studentgrades`
--
ALTER TABLE `studentgrades`
  MODIFY `studentGradeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `studentsubjects`
--
ALTER TABLE `studentsubjects`
  MODIFY `studentSubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentgrades`
--
ALTER TABLE `studentgrades`
  ADD CONSTRAINT `studentgrades_ibfk_1` FOREIGN KEY (`studentSubjectID`) REFERENCES `studentsubjects` (`studentSubjectID`),
  ADD CONSTRAINT `studentgrades_ibfk_2` FOREIGN KEY (`gradeID`) REFERENCES `grades` (`gradeID`);

--
-- Constraints for table `studentsubjects`
--
ALTER TABLE `studentsubjects`
  ADD CONSTRAINT `studentsubjects_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `studentsubjects_ibfk_2` FOREIGN KEY (`subjectID`) REFERENCES `subjects` (`subjectID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
